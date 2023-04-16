Session
=======

.. code-block:: console

  `kingston\icarus\Session`
  `class Session`

Controlling class for all system session and related data.

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | FLASH_KEY                              | session flash messages key                                 |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function __construct()

start new session and mark old flash messages to be removed

*Parameters*

  *none*


*return*

    void

* * *

.. code-block:: console

    public function setFlash($key, $message) : void

set new flash message

*Parameters*

  +--------------------+--------------------+
  | string             | $key               | 
  +--------------------+--------------------+
  | string             | $message           | 
  +--------------------+--------------------+


*return*

    string

* * *

.. code-block:: console

    public function getFlash($key) : string|bool

get flash message 

*Parameters*

  +--------------------+--------------------+
  | string             | $key               | 
  +--------------------+--------------------+


*return*

    string|bool

* * *

.. code-block:: console

    public function set($key, $value) : void

set session variable

*Parameters*

  +--------------------+--------------------+
  | string             | $key               | 
  +--------------------+--------------------+
  | string             | $value             | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function get($key) : string|bool

get session variable

*Parameters*

  +--------------------+--------------------+
  | string             | $key               | 
  +--------------------+--------------------+


*return*

    string|bool

* * *

.. code-block:: console

    public function remove($key) : void

unset session variable

*Parameters*

  +--------------------+--------------------+
  | string             | $key               | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function __destruct()

destroy flash messages in instance

*Parameters*

  *none*


*return*

    void

* * *

.. code-block:: console

    private function removeFlashMessages() : void

remove all flash messages

*Parameters*

  *none*


*return*

    void

* * *