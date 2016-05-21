<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// check for post data
if (isset($_POST["username"])) {
	
    	$uname = $_POST["username"];

	// include db connect class
	require_once __DIR__ . '/db_connect.php';
	
	// connecting to db
	$db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("SELECT * FROM tbl_restaurant WHERE username LIKE '%$uname%'");
    
    // check for empty result
	if (mysql_num_rows($result) > 0) {
	
		$result = mysql_fetch_array($result);

            	$response["username"] = $result["username"];
		// success
		$response["success"] = 1;

		// echoing JSON response
		echo json_encode($response);
	} else {
		// no restaurants found
		$response["success"] = 0;
		$response["message"] = "No Restaurant found";
		
		// echoing JSON response
        	echo json_encode($response);
	}
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>