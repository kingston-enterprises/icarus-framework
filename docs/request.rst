Request
=======

.. code-block:: console

  `kingston\icarus\Request`
  `class Request`

Controlling class for all system http requests.

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| array              | $routeParams                           | http route parameters                                      |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function getMethod() : string

get server request method

*Parameters*

  *none*


*return*

    string

* * *

.. code-block:: console

    public function getUrl() : string

get server request URI

*Parameters*

  *none*


*return*

    string

* * *

.. code-block:: console

    public function isGet() : bool

confirm http method is GET

*Parameters*

  *none*


*return*

    bool

* * *

.. code-block:: console

    public function isPost() : bool

confirm http method is POST

*Parameters*

  *none*


*return*

    bool

* * *

.. code-block:: console

    public function getBody() : array

get http request data `$_GET` or `$_POST`

*Parameters*

  *none*


*return*

    array

* * *

.. code-block:: console

    public function setRouteParams($params) : self

set http route parameters

*Parameters*

    +--------------------+----------------------------------------+
    | mixed              | $params                                |
    +--------------------+----------------------------------------+


*return*

    self

* * *

.. code-block:: console

    public function getRouteParams() : array

get all http route parameters

*Parameters*

    *none*


*return*

    array

* * *

.. code-block:: console

    public function getRouteParam($param, $default = null) : string

get a single http route parameter

*Parameters*

    +--------------------+----------------------------------------+
    | string             | $param                                 |
    +--------------------+----------------------------------------+
    | null               | $default                               |
    +--------------------+----------------------------------------+


*return*

    string

* * *