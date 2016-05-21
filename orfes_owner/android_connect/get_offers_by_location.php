<?php

/*
 * Following code will list all the Restaurants
 */

// array for JSON response
$response = array();

// check for post data
if (isset($_POST["search_string"])) {
	
    	$search_string = $_POST["search_string"];

	// include db connect class
	require_once __DIR__ . '/db_connect.php';
	
	// connecting to db
	$db = new DB_CONNECT();
	
	
	// get all restaurants from products table
	$result1 = mysql_query("SELECT T1.name, T1.username, T2.text FROM tbl_restaurant T1 INNER JOIN tbl_offer T2 ON T1.restaurant_id = T2.restaurant_id INNER JOIN tbl_information T3 ON T2.restaurant_id = T3.restaurant_id WHERE T3.police_station LIKE  '%$search_string%'") or die(mysql_error());
	
	$result2 = mysql_query("SELECT T1.name, T1.username, T2.text FROM tbl_restaurant T1 INNER JOIN tbl_offer T2 ON T1.restaurant_id = T2.restaurant_id INNER JOIN tbl_information T3 ON T2.restaurant_id = T3.restaurant_id WHERE T3.address LIKE  '%$search_string%'") or die(mysql_error());
	
	// restaurants node
	$response["restaurants"] = array();
	
	// check for empty result
	if (mysql_num_rows($result1) > 0) {
		// looping through all results
		
		while ($row = mysql_fetch_array($result1)) {
			// temp user array
			$rest_array = array();
			
			$rest_array["name"] = $row["name"];
			$rest_array["text"] = $row["text"];
			$rest_array["banner"] = "http://getmenucard.com/assets/images/offer_banner/banner.jpg";
			
			$rest_array["username"] = $row["username"];
			
			// push single restaurant into final response array
			array_push($response["restaurants"], $rest_array);
		}
		// success
		$response["success"] = 1;

		// echoing JSON response
		echo json_encode(array_unique($response));
		
	} else if (mysql_num_rows($result2) > 0) {
		// looping through all results
		// restaurants node
		//$response["restaurants"] = array();
		
		while ($row = mysql_fetch_array($result2)) {
			// temp user array
			$rest_array = array();
			
			$rest_array["name"] = $row["name"];
			$rest_array["text"] = $row["text"];
			$rest_array["banner"] = "http://getmenucard.com/assets/images/offer_banner/banner.jpg";
			
			$rest_array["username"] = $row["username"];
			
			// push single restaurant into final response array
			array_push($response["restaurants"], $rest_array);
		}
		// success
		$response["success"] = 1;

		// echoing JSON response
		echo json_encode(array_unique($response));
		
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