DbModel
===========

.. code-block:: console

  `kingston\icarus\DbModel`
  `abstract class DbModel extends Model`

Parent class for database models for interacting with database tables

Properties
----------

*none*

Methods
-------


.. code-block:: console

    abstract public static function tableName(): string;

return database table name

*Parameters*

    *none*

*return*

    string

* * *

.. code-block:: console

    abstract public function getDisplayName(): string;

return database Model Display name

*Parameters*

    *none*

*return*

    string

* * *

.. code-block:: console

    public function primaryKey(): string

return databasetable primary key

*Parameters*

    *none*

*return*

    string

* * *

.. code-block:: console

    public function save(): bool

save new record to databse

*Parameters*

    *none*

*return*

    bool

* * *

.. code-block:: console

    protected static function merge($arr1, $arr2): array

merge to arrays while filling in the missing elements

*Parameters*

    +--------------------+--------------------+
    | array              | $arr1              | 
    +--------------------+--------------------+
    | array              | $arr2              | 
    +--------------------+--------------------+

*return*

    array

* * *

.. code-block:: console

    public function update(int $id): bool

update record in the database

*Parameters*

    +--------------------+--------------------+
    | int                | $id                | 
    +--------------------+--------------------+

*return*

    bool

* * *

.. code-block:: console

    public static function prepare($sql): \PDOStatement

prepare sql query

*Parameters*

    +--------------------+--------------------+
    | strung             | $sql                | 
    +--------------------+--------------------+

*return*

    PDOStatement

* * *

.. code-block:: console

    public static function getAll(): array

select all records from table

*Parameters*

    *none*

*return*

    array

* * *

.. code-block:: console

    public static function findAll($where): array

select all records from table that meet condition

*Parameters*

    +--------------------+--------------------+
    | array              | $where             | 
    +--------------------+--------------------+

*return*

    array

* * *

.. code-block:: console

    public static function findOne($where): object|false

select a single record from database table

*Parameters*

    +--------------------+--------------------+
    | array              | $where             | 
    +--------------------+--------------------+

*return*

    object|false

* * *