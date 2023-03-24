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
properties:

+----------+----------+----------+
| Header 1 | Header 2 | Header 3 |
+==========+==========+==========+
| | Item 1 |          |          |
| | Item 2 |          |          |
+----------+----------+----------+

Methods
-------

.. code-block:: console
    public function run(): void

try to show the requested view

return

    void

***

.. code-block:: console
    public function triggerEvent($eventName): void

Call or trigger an event`s callback function

Parameters

+--------------------+--------------------+
|                    |                    |
+====================+====================+
| string             | $eventName         | 
+--------------------+--------------------+


return

    void

***
