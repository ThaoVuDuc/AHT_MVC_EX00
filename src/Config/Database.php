<?php
namespace AHT\Config;

use \PDO;

class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=mvc_trainningaht;", 'root', '');
        }
        return self::$bdd;
    }
}
?>