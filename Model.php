<?php

/** created by : kingston-5 @ 6/01/23 **/

namespace kingston\icarus;


/** @class Model: parent class to interface with database tables
 * @no-named-arguments
 */
class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';
    const RULE_MIN = 'min';
    const RULE_MAX = 'max';
    const RULE_MATCH = 'match';
    const RULE_UNIQUE = 'unique';

    protected array $errors = [];
    protected array $attributes = [];
    protected array $labels = [];
    protected array $rules = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key) && !empty($value)) {
                $this->{$key} = $value;
            }
        }
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    public function getLabel($attribute)
    {
        return $this->labels[$attribute] ?? $attribute;
    }

    public function setRules($rules)
    {
        foreach ($rules as $key => $rule) {
            if (!property_exists($this, $key)) {
                unset($rules[$key]);
            }
        }
        $this->rules = $rules;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function validate(array $ignore = [])
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

    public function errorMessages()
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

    public function errorMessage($rule)
    {
        return $this->errorMessages()[$rule];
    }

    protected function addErrorByRule(string $attribute, string $rule, $params = [])
    {
        $params['field'] ??= $attribute;
        $errorMessage = $this->errorMessage($rule);
        foreach ($params as $key => $value) {
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }

    public function addError(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }
}
