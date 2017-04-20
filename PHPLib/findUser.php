<?php

extract( $_POST );
if (!$NAME && !$EMAIL && !$PHONENUMBER){
	emptyInfo();
	die();
}
else {
	findUserFromDatabase($NAME, $EMAIL, $PHONENUMBER);
}

function emptyInfo(){
	print("<title>Access Denied</title><body><strong>Please fill in at least one field to search. Don't leave all fields blank.</strong><br/><br/><a href=\"/Template/user.php\">back</a></body>");
}
function emptyResult(){
	print("<title>No Result</title><body><strong>Sorry, we can't find any result.</strong><br/><br/><a href=\"/Template/user.php\">back</a></body>");
}
function render($data){
	
	print("<title>Search Result</title><body><table border =\"1\"><caption>User Found</caption><tr><th>First Name</th><th>Last Name</th><th>email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>");
	
	foreach( $data as $row ) {
		print("<tr>");
		foreach ($row as $key => $value) {
			print("<td>$value</td>");
		}
		print("</tr>");
	}
	
	print("</table><br/><br/><a href=\"/Template/user.php\">back</a></body>");
}

function findUserFromDatabase($name, $email, $phone){
	if ($name !=""){
		$where[] = " CONCAT(firstName, ',', lastName) LIKE '%$name%'";
	}
	if ($email !=""){
		$where[] = " email LIKE '%$email%'";
	}
	if ($phone !=""){
		$where[] = " CONCAT(homePhone, ',', cellPhone) LIKE '%$phone%'";
	}
	
	$where_clause = implode(' AND ', $where);
	
	$query = "SELECT firstName, lastName, email, homeAddress, homePhone, cellPhone FROM User WHERE $where_clause";
	
	try {
		// $con = new PDO ("mysql:host=54.67.4.28:3306;dbname=cmpe272", "cmpe272", "cmpe272pw");
		$con = new PDO ("mysql:host=localhost;dbname=cmpe272", "cmpe272", "cmpe272pw");
		$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

		$stmt = $con->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll( PDO::FETCH_ASSOC );
		
		if (count($data) <=0){
			emptyResult();
			die();
		}
		else {
			render($data);
		}
		
	} catch (PDOException $ex){
		echo $ex->getMessage();
	}
}

?>