<?php
require_once 'database.php';

use Medoo\Database;

class Connect
{
    public $database;

    public static function conn()
    {
        $database = new Database([
          'database_type' => 'mysql',
          'database_name' => 'baanjane',
          'server' => 'localhost',
          'username' => 'root',
          'password' => '',
          'charset'=> 'utf8'
        ]);
        return $database;
    }
}
