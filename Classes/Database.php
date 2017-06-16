<?php namespace Classes\Database;

use \PDO;

Class Database {
  private $dbName = null, $dbHost = null, $dbPass = null, $dbUser = null, $dbh = null;
  private static $instance = null;
  private function __construct(array $dbDetails){
    $this->dbName = $dbDetails['db_name'];
    $this->dbHost = $dbDetails['db_host'];
    $this->dbUser = $dbDetails['db_user'];
    $this->dbPass = $dbDetails['db_pass'];
    $this->dbh = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName,
                          $this->dbUser, $this->dbPass,
                          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
  }
  public static function connect(){
    $dbDetails = array('db_name' => 'testdb',
                       'db_host' => 'localhost',
                       'db_user' => 'root',
                       'db_pass' => 'NEWPASSWORD');
    // Create instance with $dbDetails
    if(self::$instance == null) { self::$instance = new Database($dbDetails); }
    // Always return the instance
    return self::$instance->dbh;
  }
  private function __clone() { /* Stop clonning */ }
  private function __wakeup() { /* Stop unserializing */ }
}


