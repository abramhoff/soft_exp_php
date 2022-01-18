<?php

namespace src\common;
use PDO;
use PDOException;

class Database {

   
    private static $conn = null;

    public static function dbInstance() {

        self::$conn = new PDO(
            'pgsql:host='.DATABASE_HOST.';'.
            'dbname='.DATABASE_DATABASE,
            DATABASE_USER,
            DATABASE_PASS,
            [PDO::ATTR_PERSISTENT => true]
        );

        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return self::$conn;
    }

    public static function getInstance()
	{

		if (!self::$conn) {
			self::$conn = self::dbInstance();
		}
		return self::$conn;
	}
   
    public static function close() : void
	{
      self::$conn = null;;
	}
 
}