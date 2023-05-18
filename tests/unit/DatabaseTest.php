<?php

use \kingston\icarus\Database;
use \PHPUnit\Framework\TestCase;
use kingston\icarus\Application;

class DatabaseTest extends TestCase
{
    protected $config = [
        'db' => [
            'dsn' => 'mysql:host=localhost;port=3306;dbname=icarusBase',
            'user' => 'icarusAdmin',
            'password' => '@1caru5PA$$',
        ],
        'migrations' => '/migrations/'
    ];

    public \kingston\icarus\Application $app;
    public Database $db;

    public function setUp(): void
    {
        $this->app = new Application(dirname(__DIR__), $this->config);
        
    }

    /**
     * @test
     */
    public function test_Apply_Migrations()
    {
        $this->app->db->applyMigrations();

        $stmt = $this->app->db->pdo->prepare("select 1 from `migrations` LIMIT 1");
        $migrationTableExists = $stmt->execute();    


        $stmt = $this->app->db->pdo->prepare("select `id` from migration_test where `fullname` = 'Kingston_Enterprises';");
        $migrationTestTableExists = $stmt->execute();

        $this->assertTrue($migrationTableExists);
        $this->assertEquals($migrationTestTableExists, 1);
    }
}
