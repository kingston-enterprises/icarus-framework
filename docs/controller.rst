Controller
===========

.. code-block:: console

  `kingston\icarus\Controller`
  `class Controller`

Parent Class for all controllers
Controllers group related request handling logic into a single class

.. note:: Depracated since v23.03.22
    These elements have been Depracated:
    $action

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $layout                                | view layout file name                                      |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $action                                | controller action                                          |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function setLayout($layout) : void

Set controller layout

*Parameters*

  +--------------------+--------------------+
  |                    |                    |
  +====================+====================+
  | string             | $layout            | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function render($view, $params = []) : string

Render user view

*Parameters*

  +--------------------+--------------------+
  |                    |                    |
  +====================+====================+
  | string             | $view              | 
  +--------------------+--------------------+
  | array              | $params            | 
  +--------------------+--------------------+


*return*

    string

* * *