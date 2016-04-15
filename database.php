<?php
class Database {		
	private $_connection;
	private static $_instance;
	private $_host = "";
	private $_username = "";
	private $_password = "";
	private $_database = "";

	public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private function __construct() {		
		$dotenv = new Dotenv\Dotenv(__DIR__);
		$dotenv->load();
		$this->_host = getenv("DBHOST");
		$this->_database = getenv("DBNAME");
		$this->_username = getenv("DBUSER");
		$this->_password = getenv("DBPASS");
		$this->_connection = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database, $this->_username, $this->_password);
	}
	
	private function __clone() { }
	
	public function getConnection() {
		return $this->_connection;
	}
}
?>