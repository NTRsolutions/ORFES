<?php

/*
 * Following code will list all the products
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
	
	//Check Start
	// input misspelled word
	$input = $search_string;
	
	$words = array();

	// array of words to check against
	$savedSQL = "SELECT name, username FROM `tbl_restaurant`";
	$savedQuery = mysql_query($savedSQL);
	while($savedResult = mysql_fetch_array($savedQuery)) {
		$words[] = $savedResult["name"];
		$words[] = $savedResult["username"];
	}

	// no shortest distance found, yet
	$shortest = -1;

	// loop through words to find the closest
	foreach ($words as $word) {

		// calculate the distance between the input word,
		// and the current word
		$lev = levenshtein($input, $word);

		// check for an exact match
		if ($lev == 0) {

			// closest word is this one (exact match)
			$closest = $word;
			$shortest = 0;

			// break out of the loop; we've found an exact match
			break;
		}

		// if this distance is less than the next found shortest
		// distance, OR if a next shortest word has not yet been found
		if ($lev <= $shortest || $shortest < 0) {
			// set the closest match, and shortest distance
			$closest  = $word;
			$shortest = $lev;
		}
	}


	if ($shortest == 0) {
		//echo "Exact match found: $closest\n";
	} else {
		//echo "Did you mean: $closest?\n";
		$var_1 = $input; 
		$var_2 = $closest; 

		similar_text($var_1, $var_2, $percent); 

		//echo $percent; 
		
		if($percent >= 70) {
			$search_string = $closest;
		}
	}
	//Check End

	// get all restaurants from products table
	$result = mysql_query("SELECT T1.name, T1.username, T2.address, T2.opening_time, T2.hotline_number FROM tbl_restaurant T1 INNER JOIN tbl_information T2 ON T1.restaurant_id = T2.restaurant_id WHERE T1.name LIKE  '%$search_string%'") or die(mysql_error());

	// check for empty result
	if (mysql_num_rows($result) > 0) {
		// looping through all results
		// restaurants node
		$response["restaurants"] = array();
		
		while ($row = mysql_fetch_array($result)) {
			// temp user array
			$rest_array = array();
			
			$rest_array["name"] = $row["name"];
			$rest_array["username"] = $row["username"];
			$rest_array["address"] = $row["address"];
			$rest_array["opening_time"] = $row["opening_time"];
			$rest_array["hotline_number"] = $row["hotline_number"];
			
			$rest_array["logo"] = "http://getmenucard.com/assets/images/logo/logo.jpg";
			
			// push single restaurant into final response array
			array_push($response["restaurants"], $rest_array);
		}
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