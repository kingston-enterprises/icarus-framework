<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

use kingston\icarus\Application;
use kingston\icarus\Model;

/**
 * Parent class for database models for interacting with database tables
 * 
 * @abstract 
 * @extends \Model
 */
abstract class DbModel extends Model
{
    // TODO: add getters and setter for child classes` attributes

    /**
     * return database table name
     * @abstract
     * @return string
     */
    abstract public static function tableName(): string;

    /**
     * return database Model Display name
     * @abstract
     * @return string
     */
    abstract public function getDisplayName(): string;

    /**
     * return database table primary key
     * 
     * @return string
     */
    public static function primaryKey(): string
    {
        return 'id';
    }

    /**
     * save new record to database
     * 
     * @return bool
     */
    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->getAttributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }


    /**
     * merge to arrays whikl filling in the missing elements
     *
     * @param array     $arr1 array with missing elements
     * @param array     $arr2 array with new elements
     * @return array
     */
    protected static function merge($arr1, $arr2): array
    {
        // TODO: refactor

        /** @var array newly merged array */
        $new = array();
        for ($i = 0; $i < count($arr1); $i++) {
            array_push($new, $arr1[$i] . " = " . $arr2[$i]);
        }

        return $new;
    }

    /**
     * update record in the database
     *
     * @param integer $id id of record to be updated
     * @return bool
     */
    public function update(int $id): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->getAttributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $paramlist = $this->merge($attributes, $params);

        $statement = self::prepare("UPDATE $tableName SET " . implode(", ", $paramlist) . " WHERE id = " . $id . "");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    /**
     * delete record in the database
     *
     * @param integer $id id of record to be updated
     * @return bool
     */
    public function delete(int $id): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->getAttributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $paramlist = $this->merge($attributes, $params);

        $statement = self::prepare("DELETE from " . $tableName . " WHERE id = " . $id . "");
        $statement->execute();
        return true;
    }

    /**
     * prepare sql query
     *
     * @param sql $sql sql query
     * @return \PDOStatement
     */
    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    /**
     * select all records from table
     *
     * @return array
     */
    public static function getAll(): array
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }


    /**
     * select all records from table that meet condition
     *
     * @param array     $where 2D array of conditions
     * @return array
     */
    public static function findAll($where): array
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * select a single record from database table
     *
     * @param array     $where 2D array of conditions
     * @return object|false
     */
    public static function findOne($where): object|false
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}
