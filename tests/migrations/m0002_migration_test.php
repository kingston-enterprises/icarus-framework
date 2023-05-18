<?php


class m0002_migration_test {
    public function up()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "INSERT INTO migration_test (`fullname`) VALUES ('Kingston Enterprises')";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = kingston\icarus\Application::$app->db;
        $SQL = "DELETE FROM migration_test WHERE `column` = 'Kingston_Enterprises';";
        $db->pdo->exec($SQL);
    }
}
