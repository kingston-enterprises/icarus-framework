<?php


class m0001_migration_test {
    public function up()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS migration_test (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(55)
                ) ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS migration_test;";
        $db->pdo->exec($SQL);
    }
}
