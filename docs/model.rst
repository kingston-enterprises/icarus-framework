Model
===========

.. code-block:: console

  `kingston\icarus\Model`
  `class Model`

Parent Class for all models


Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_REQUIRED                          | required field validation rule                             |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_EMAIL                             | email field validation rule                                |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_MIN                               | minimum field characters validation rule                   |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_MAX                               | maximum field characters validation rule                              |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_MATCH                             | matching field validation rule                             |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | RULE_UNIQUE                            | unique field validation rule                               |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array             | $errors                                 | validation errors                                          |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array             | $attributes                             | model attributes                                           |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array             | $labels                                 | form labels                                                |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array             | $rules                                  | validation rules                                           |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function loadData($data) : void

load data into model attributes

*Parameters*

  +--------------------+--------------------+
  | array              | $data              | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function getAttributes() : array

set model attributes that can be assigned

*Parameters*

  +--------------------+--------------------+
  | array              | $attributes        | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function setAttributes($attributes) : void

get model attributes

*Parameters*

  *none*


*return*

    array

* * *

.. code-block:: console

    public function setLabels($labels) : void

set form labels

*Parameters*

  +--------------------+--------------------+
  | array              | $labels            | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function getLabel($attribute) : string

get specific form label

*Parameters*

  +--------------------+--------------------+
  | array              | $attributes        | 
  +--------------------+--------------------+


*return*

    string

* * *

.. code-block:: console

    public function setRules($rules) : void

set form validation rules

*Parameters*

  +--------------------+--------------------+
  | array              | $rules             | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function getRules() : array

get form validation rules

*Parameters*

  *none*


*return*

    array

* * *

.. code-block:: console

    public function validate(array $ignore = []) : bool

validation of form values to rules

*Parameters*

  +--------------------+--------------------+
  | array              | $ignore            | 
  +--------------------+--------------------+


*return*

    bool

* * *

.. code-block:: console

    public function errorMessages() : array

return all error messages for validation rules

*Parameters*

  *none*


*return*

    array

* * *

.. code-block:: console

    public function errorMessage($rule) : string

get specific error message

*Parameters*

  +--------------------+--------------------+
  | string             | $rule              | 
  +--------------------+--------------------+


*return*

    string

* * *

.. code-block:: console

    protected function addErrorByRule(string $attribute, string $rule, $params = []) : void

add Error by failed validation rule

*Parameters*

  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+
  | string             | $rule              | 
  +--------------------+--------------------+
  | array              | $params            | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function addError(string $attribute, string $message) : void

add error message to list of accrued errors during validation

*Parameters*

  +--------------------+--------------------+
  | array              | $attribute         | 
  +--------------------+--------------------+
  | string             | $message           | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function hasError($attribute) : bool

check if attribute has error

*Parameters*

  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+


*return*

    bool



.. code-block:: console

    public function getFirstError($attribute) : string

get first error

*Parameters*

  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+


*return*

    string

* * ** * *