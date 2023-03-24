Controller
===========

.. code-block:: console

  `kingston\icarus\Database`
  `class Database`

Class Database

Properties
----------

+--------------------+----------------------------------------+------------------------------------------------------------+
| PDO                | $pdo                                   | PDO instance                                               |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
-------


.. code-block:: console

    public function __construct($dbConfig = [])

Start PDO instance

*Parameters*

  +--------------------+--------------------+
  | string             | $dbConfig          | 
  +--------------------+--------------------+


*return*

    void

* * *


.. code-block:: console

    public function applyMigrations()

apply any outstanding migrations

*Parameters*

  *none*


*return*

    void

* * *


.. code-block:: console

    protected function createMigrationsTable() : void

Create Migrations table

*Parameters*

  *none*


*return*

    void

* * *


.. code-block:: console

    protected function getAppliedMigrations() : void

Get Applied Migrations

*Parameters*

  *none*


*return*

    array|false

* * *


.. code-block:: console

  protected function saveMigrations(array $newMigrations)

insert applied migrations into table

*Parameters*

  +--------------------+--------------------+
  | array              | $newMigrations     | 
  +--------------------+--------------------+


*return*

    void

* * *


.. code-block:: console

    public function prepare($sql): \PDOStatement

Prepare SQL statement

*Parameters*

  +--------------------+--------------------+
  | string             | $sql               | 
  +--------------------+--------------------+


*return*

    PDOStatement

* * *


.. code-block:: console

    private function log($message)

log messages to output

*Parameters*

  +--------------------+--------------------+
  | string             | $message               | 
  +--------------------+--------------------+


*return*

    PDOStatement

* * *