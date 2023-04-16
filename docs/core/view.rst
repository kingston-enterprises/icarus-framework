View
====

.. code-block:: console

  `kingston\icarus\View`
  `class View`

View Render class

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $title                                 | view title                                                 |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function renderView($view, array $params) : string

render Route full view

*Parameters*

  +--------------------+--------------------+
  | string             | $view              | 
  +--------------------+--------------------+
  | array              | $params            | 
  +--------------------+--------------------+


*return*

    string

* * *

.. code-block:: console

    public function renderViewOnly($view, array $params) : string

render route view content

*Parameters*

  +--------------------+--------------------+
  | string             | $view              | 
  +--------------------+--------------------+
  | array              | $params            | 
  +--------------------+--------------------+


*return*

    string

* * *