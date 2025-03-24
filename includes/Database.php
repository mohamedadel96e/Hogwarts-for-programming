<?php

namespace Includes;

use PDO;
use PDOException;
use Config\Config;

class Database
{
  private static $instance = null;
  private $connection;

  public function __construct()
  {
    try {
      $this->connection = new PDO(
          "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";port=" . Config::DB_PORT,
          Config::DB_USER,
          Config::DB_PASS
      );
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance->connection;
  }
}