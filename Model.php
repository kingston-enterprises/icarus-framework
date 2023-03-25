<?php

/** 
 * @author kingston-5 <qhawe@kingston-enterprises.net>
 * @package icarus
 * @license For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kingston\icarus;

/**
 * parent class to interface with database tables
 * 
 */
class Model
{
    /**
     * required field validation rule 
     *
     * @var string
     */
    const RULE_REQUIRED = 'required';

    /** RULE_EMAIL
     *
     * @var string
     */
    const RULE_EMAIL = 'email';

    /** field characters validation rule
     *
     * @var string
     */
    const RULE_MIN = 'min';

    /** max field validation characters rule 
     *
     * @var string
     */
    const RULE_MAX = 'max';

    /** matching field validation rule 
     *
     * @var string
     */
    const RULE_MATCH = 'match';

    /** unique field validation rule 
     *
     * @var string
     */
    const RULE_UNIQUE = 'unique';

    /** validation errors
     *
     * @var array
     */
    protected array $errors = [];

    /**
     * model attributes
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * form labels
     *
     * @var array
     */
    protected array $labels = [];

    /** 
     * validation rules
     * 
     * @var array
     */
    protected array $rules = [];

    /**
     * load data into model attributes
     *
     * @param array    $data data array
     * @return void
     */
    public function loadData($data) : void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key) && !empty($value)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * set model attributes that can be assigned
     *
     * @param array     $attributes attibutes array
     * @return void
     */
    public function setAttributes($attributes) : void
    {
        $this->attributes = $attributes;
    }

    /**
     * get model attributes
     *
     * @return array
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * set form labels
     *
     * @param array $labels
     * @return void
     */
    public function setLabels($labels) : void
    {
        $this->labels = $labels;
    }

    /**
     * get specific form label
     *
     * @param string $attribute attribute name
     * @return string
     */
    public function getLabel($attribute) : string
    {
        return $this->labels[$attribute] ?? $attribute;
    }

    /**
     * set form validation rules
     * @return void
     */
    public function setRules($rules) : void
    {
        foreach ($rules as $key) {
            if (!property_exists($this, $key)) {
                unset($rules[$key]);
            }
        }
        $this->rules = $rules;
    }

    /**
     * get form validation rules
     *
     * @return array
     */
    public function getRules() : array
    {
        return $this->rules;
    }

    /**
     * validation of form values to rules
     *
     * @param array     $ignore array of values to ignore
     * @return bool
     */
    public function validate(array $ignore = []) : bool
    {
        foreach ($this->getRules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && empty($value)) {
                    $this->addErrorByRule($attribute, self::RULE_REQUIRED, ['field' => $this->getLabel($attribute)]);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorByRule($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorByRule($attribute, self::RULE_MIN, ['min' => $rule['min']]);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorByRule($attribute, self::RULE_MAX, ['max' => $rule['max']]);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addErrorByRule($attribute, self::RULE_MATCH, ['match' => $rule['match']]);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $db = Application::$app->db;
                    $statement = $db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :$uniqueAttr");
                    $statement->bindValue(":$uniqueAttr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addErrorByRule($attribute, self::RULE_UNIQUE);
                    }
                }
                if (in_array($attribute, $ignore)) {
                    echo PHP_EOL . $attribute . "should be ignored";
                    array_pop($this->errors);
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * return all error messages for validation rules
     *
     * @return array
     */
    public function errorMessages() : array
    {
        return [
            self::RULE_REQUIRED => '{field} is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Minimum length of this field must be {min}',
            self::RULE_MAX => 'Maximum length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with with this {field} already exists',
        ];
    }

    /**
     * get specific error message
     *
     * @param string $rule
     * @return string
     */
    public function errorMessage($rule) : string
    {
        return $this->errorMessages()[$rule];
    }

    /**
     * add Error by failed validation rule
     *
     * @param string $attribute atribute under validation
     * @param string $rule  rule to validate attribute
     * @param array $params validation parameters to include in error message
     * @return void
     */
    protected function addErrorByRule(string $attribute, string $rule, $params = []) : void
    {
        $params['field'] ??= $attribute;
        $errorMessage = $this->errorMessage($rule);
        foreach ($params as $key => $value) {
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }

    /**
     * add error message to list of accrued errors during validation
     *
     * @param string $attribute attribute that vaied validation
     * @param string $message error message
     * @return void
     */
    public function addError(string $attribute, string $message) : void
    {
        $this->errors[$attribute][] = $message;
    }

    /**
     * check if attribute has error
     *
     * @param string $attribute
     * @return boolean
     */
    public function hasError($attribute) : bool
    {
        return $this->errors[$attribute] ?? false;
    }

    /**
     * get first error
     *
     * @param  string $attribute
     * @return string
     */
    public function getFirstError($attribute) : string
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }
}
