<?php

require_once("config.php");

class Database
{

    static private $host = DB_SERVER;
    static private $db_name = DB_NAME;
    static private $username = DB_USERNAME;
    static private $password = DB_PASSWORD;
    static public $conn;


    // get the database connection
    static public function getConnection()
    {

        self::$conn = null;

        try {
            self::$conn = new PDO("mysql:host=" . self::$host . "; dbname=" . self::$db_name, self::$username, self::$password);
            self::$conn->exec("set names utf8");
        } catch (PDOException $exception) {

            echo "Connection error: " . $exception->getMessage();
        }

        return self::$conn;
    }
}