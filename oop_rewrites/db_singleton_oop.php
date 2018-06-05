<?php
/*a singleton for a dbconnection: https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php*/
class ConnectDB {

	private static $instance;
	private $connection;
	/*understand that this mires class in app context, but bear with me*/
	private $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
	private $username = 'mgs_user';
	private $password = 'pa55word';
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	private function __construct() {

		try {
			$this->connection = new PDO($this->dsn, $this->username, $tis->password, $this->options);
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			include();
			exit();
		}
		
	}
	
	public static getInstance() {
		
		if (empty(self::$instance)) {
			self::$instance = new ConnectDB();
		}
		return self::$instance;
		
	}
	
	public function getConnection() {
		
		return $this->connection;
		
	}
	
}

?>