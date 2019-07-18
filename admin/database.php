<?php
/*
 * ------------------------------------------------------------------------
 * Burger v.1.0
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 */

class Database {

    private static $dbHost = "localhost";
    private static $dbPort = "3306";
    private static $dbName = "burger";
    private static $dbUsername = "burger";
    private static $dbUserpassword = "{CHANGE_PASSWORD}";
    private static $connection = null;

    public static function connect() {
        if (self::$connection == null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";port=" . self::$dbPort . ";dbname=" . self::$dbName, self::$dbUsername, self::$dbUserpassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect() {
        self::$connection = null;
    }

}

?>
