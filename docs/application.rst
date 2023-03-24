Application
===========

.. code-block:: console

  `kingston\icarus\Application`
  `class Application`

Main framework  backbone everything starts, ends or goes through here.
  
Application represents the lifecyle of the interaction with the app by the user
every major class is connected to this one.

example : starting the application - You want to do this in you `index.php`
    
.. code-block:: console

    $config = [ 'database' => [
        'dsn' => 'database_name',
        'user' => 'database_user',
        'password' => 'database_password',
        ]
    ];

    $app = new Application(dirname(__DIR__), $config);
    $app->run();

In this example all you have to do is define your config variables these are then passed along with the application root directory name to Application, and lastly you run the application.

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
|                    |                                        |                                                            |
+====================+========================================+============================================================+
| const string       | EVENT_BEFORE_REQUEST                   | Before app request event trigger                           |
+--------------------+----------------------------------------+------------------------------------------------------------+
| const string       | EVENT_AFTER_REQUEST                    | After app request event trigger                            |
+--------------------+----------------------------------------+------------------------------------------------------------+
| array              | $eventListeners                        | Application event listeners                                |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $ROOT_DIR                              | Application root directory                                 |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string|bool        | $api                                   | Users` PHP to web server inter face                        |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $userClass                             | Application User class instance                            |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Application        | $app                                   | The application instance.                                  |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Request            | $request                               | The request instance.                                      |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Router             | $router                                | The router instance.                                       |
+--------------------+----------------------------------------+------------------------------------------------------------+
| response           | $response                              | The response instance.                                     |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Controller|null    | $controller                            | The controller instance.                                   |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Database           | $db                                    | The database instance.                                     |
+--------------------+----------------------------------------+------------------------------------------------------------+
| Session            | $session                               | The session instance.                                      |
+--------------------+----------------------------------------+------------------------------------------------------------+
| string             | $layout                                | The default view layout                                    |
+--------------------+----------------------------------------+------------------------------------------------------------+


Methods
-------


.. code-block:: console

    public function __construct($rootDir, $config) : void

Create new Application instance

*Parameters*

  +--------------------+--------------------+
  |                    |                    |
  +====================+====================+
  | string             | $rootDir           | 
  +--------------------+--------------------+
  | string             | $config            |
  +--------------------+--------------------+


*return*

    void

* * *
.. code-block:: console

    public function run() : void

try to show the requested view

*return*

    void


* * *

.. code-block:: console

    public function triggerEvent($eventName): void

Call or trigger an event`s callback function

*Parameters*

  +--------------------+--------------------+
  |                    |                    |
  +====================+====================+
  | string             | $eventName         | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public function on($eventName, $callback) : void

assign callback function to event listener 

*Parameters*

  +--------------------+--------------------+
  |                    |                    |
  +====================+====================+
  | string             | $eventName         | 
  +--------------------+--------------------+
  | string             | $callback          | 
  +--------------------+--------------------+


*return*

    void

* * *

.. code-block:: console

    public static function isGuest() : bool

Check if user session exists


*Parameters*


*return*

    bool

* * *
