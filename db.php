function function_db_connect() {	
	try {
	    $conn = new PDO('mysql:host='.getenv('dbendpoint').';dbname=p2schema', getenv('dbusername'), getenv('dbpassword'));
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
	    return $conn;
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}	
}
