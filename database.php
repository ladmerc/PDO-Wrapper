<?php
namespace App\database;


// try{
// 	$dbh = new \PDO('mysql:host=localhost;dbname=treehouse_movie_db', 'root', 'Edulyn33');
// 	echo "connected \n";
// 	foreach($dbh->query('SELECT * from actors') as $row) {
//         print_r($row);
//     }
// }
// catch (\PDOException $e) {
// 	echo $e->getMessage();
// 	die();
// }
// 

class Database
{

	private $db_host 	  = DB_HOST;
	private $db_name 	  = DB_NAME;
	private $db_user 	  = DB_USER;
	private $db_password  = DB_PASS;
	// private $dbh;

	public $persistent_db = true;
	public $db_exception = \PDO::ERRMODE_EXCEPTION;

	// set default connection options.
	// these can be overriden by specifying your own options array
	// when creating a new object
	public $options = array(
    	\PDO::ATTR_PERSISTENT 	=> true, // check [del]
    	\PDO::ATTR_ERRMODE 		=> \PDO::ERRMODE_EXCEPTION
	);


	public function __construct()
	{		
		// specify Database Source Name (DSN) 
		$dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name; // use DI [del]
		
		$this->connect();
	}

	public function __destruct()
	{
		$this->dbh = null; // return here [del]
	}

	private function connect()
	{
		try {

			// specify database handler
			$dbh = new \PDO($dsn, $this->db_user, $this->db_password, $this->options);	
			echo "Connected Successfully";
		}
		catch (\PDOException $e) 
		{
			echo $e->getMessage();
			die("Error Connecting");
		}
	}

}
