include 'fetch.php';

function function_db_connect() {	
	try {
	    $conn = new PDO('mysql:host='$GLOBALS['dec_endpoint']';dbname=p2schema', $GLOBALS['dec_username'], $GLOBALS['dec_password']);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
	    return $conn;
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}	
}
