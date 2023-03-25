Form
====

BaseField
=========

.. code-block:: console

  `kingston\icarus\form\BaseField`
  `abstract class BaseField`

BaseField Class

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| Model              | $model                                 | the Model instance                                         |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $attribute                             | field attribute                                            |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string|null        | $placeholder                           | field placeholder                                          |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $type                                  | field type                                                 |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------

.. code-block:: console

    public function __construct(Model $model, string $attribute, string $placeholder = null)

start instances

*Parameters*

  +--------------------+--------------------+
  | Model              | $model             | 
  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+
  | string             | $placeholder       | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function __toString()

print out basefield HTML

*Parameters*

  *none*


*return*

    string

* * *

.. code-block:: console

    abstract public function renderInput();

render input field


Field
=========

.. code-block:: console

  `kingston\icarus\form`
  `class Field extends BaseField

Field Class

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| const              | TYPE_TEXT                              | text type                                                  |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const              | TYPE_PASSWORD                          | password type                                              |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const              | TYPE_DATETIME                          | datetime-local type                                        |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------

.. code-block:: console

    public function __construct(Model $model, string $attribute, $placeholder)

start parent class instance 

*Parameters*

  +--------------------+--------------------+
  | Model              | $model             | 
  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+
  | string             | $placeholder       | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function renderInput() : string

render input

*Parameters*

  *none*


*return*

    string

* * *

.. code-block:: console

    public function passwordField() : Field

render password field

*Parameters*

  *none*


*return*

    Field

* * *

.. code-block:: console

    public function dateTimeField() : Field

render datetimefield

*Parameters*

  *none*


*return*

    Field

* * *


Form
=========

.. code-block:: console

  `kingston\icarus\form\Form`
  `class Form

Form Class

Properties
----------

*none*

Methods
-------

.. code-block:: console

    public static function begin($action, $method, $options = [])

start form output

*Parameters*

  +--------------------+--------------------+
  | string             | $action            | 
  +--------------------+--------------------+
  | string             | $method            | 
  +--------------------+--------------------+
  | array              | $options           | 
  +--------------------+--------------------+


*return*

    Form

* * *

.. code-block:: console

    public static function end() : void

end form output

*Parameters*

  *none*


*return*

    void

* * *

.. code-block:: console

    public function field(Model $model, $attribute, $placeholder = null)

 start field instance

*Parameters*

    +--------------------+--------------------+
    | Model              | $model             | 
    +--------------------+--------------------+
    | string             | $attribute         | 
    +--------------------+--------------------+
    | string             | $placeholder       | 
    +--------------------+--------------------+


*return*

    Field

* * *

.. code-block:: console

    public function textArea(Model $model, $attribute, $placeholder = null, $rows)

start textArea instance

*Parameters*

    +--------------------+--------------------+
    | Model              | $model             | 
    +--------------------+--------------------+
    | string             | $attribute         | 
    +--------------------+--------------------+
    | string             | $placeholder       | 
    +--------------------+--------------------+

*return*

    TextArea

* * *

TextArea
=========

.. code-block:: console

  `kingston\icarus\form`
  `class TextArea extends BaseField`

TextArea Class

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| const              | TYPE_TEXT                              | text type                                                  |
+--------------------+----------------------------------------+------------------------------------------------------------+
| int                | $rows                                  | text area rows                                             |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------

.. code-block:: console

    public function __construct(Model $model, string $attribute, $placeholder)

start parent class instance 

*Parameters*

  +--------------------+--------------------+
  | Model              | $model             | 
  +--------------------+--------------------+
  | string             | $attribute         | 
  +--------------------+--------------------+
  | string             | $placeholder       | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function renderInput() : string

render TextArea

*Parameters*

  *none*


*return*

    string

* * *