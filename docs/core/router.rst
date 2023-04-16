Router
======

.. code-block:: console

  `kingston\icarus\Router`
  `class Router`

Custom URL router

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| Request            | $request                               | the Request instance                                       |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Response           | $response                              | the Response instance                                      |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array              | $routeMap                              | request route map                                          |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function get(string $url, $callback) : void

set get method URL and callback function

*Parameters*

  +--------------------+--------------------+
  | string             | $url               | 
  +--------------------+--------------------+
  | array              | $callback          | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function post(string $url, $callback) : void

set post method URL and callback function

*Parameters*

  +--------------------+--------------------+
  | string             | $url               | 
  +--------------------+--------------------+
  | array              | $callback          | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function getRouteMap($method) : array

return route map

*Parameters*

  +--------------------+--------------------+
  | string             | $method            | 
  +--------------------+--------------------+


*return*

    array

* * *

.. code-block:: console

    public function getCallback() : string|bool

get route callback funtion

*Parameters*

  *none*


*return*

    string|bool

* * *

.. code-block:: console

    public function resolve() : mixed

call route callback function

*Parameters*

  *none*


*return*

    mixed



.. code-block:: console

    public function renderView($view, $params = []) : string

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

    public function renderViewOnly($view, $params = []) : string

render route view content only

*Parameters*

  +--------------------+--------------------+
  | string             | $view              | 
  +--------------------+--------------------+
  | array              | $params            | 
  +--------------------+--------------------+


*return*

    string

* * *