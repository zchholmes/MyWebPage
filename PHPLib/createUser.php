<?php

extract( $_POST );
if (!$FIRSTNAME || !$LASTNAME || !$EMAIL || !$HOMEADDRESS || !$HOMEPHONE || !$CELLPHONE){
	emptyInfo();
	die();
}
else {
	$ifCont = false;
	if (filter_var($EMAIL, FILTER_VALIDATE_EMAIL)){
		if (validatePhoneNumber($HOMEPHONE) &&validatePhoneNumber($CELLPHONE)){
			$ifCont =true;
		}
		else {
			$ifCont =false;			
			invalidPhoneNumber();
		}
	}
	else {
		$ifCont =false;
		invalidEmail($EMAIL);
	}
	
	if ($ifCont){
		addToDatabase($FIRSTNAME, $LASTNAME, $EMAIL, $HOMEADDRESS, $HOMEPHONE, $CELLPHONE);
		compeleteMessage();
	}
	else {
		die();
	}
}

function validatePhoneNumber($number){
	// if (preg_match("/^[0-9]{10}$/", $number)){
	// if (preg_match("/^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/", $number)){
	if (preg_match("/^[0-9]{10}$/", $number)){
		return true;
	}
	else {
		return false;
	}

}

function emptyInfo(){
	print("<title>Access Denied</title><body><strong>Empty field(s) detected, please don't leave any field blank.</strong></body>");
}
function invalidEmail($email){
	print("<title>Access Denied</title><body><strong>Invalid email: $email.</strong></body>");
}
function invalidPhoneNumber(){
	print("<title>Access Denied</title><body><strong>Invalid phone number. Please enter 10 digits ONLY.</strong></body>");
}
function compeleteMessage(){
	print("<title>Complete</title><body><strong>New User Creation Complete.</strong></body>");
}
function addToDatabase($firstName, $lastName, $email, $homeAddress, $homePhone, $cellPhone){
	$query = "INSERT INTO User (firstName, lastName, email, homeAddress, homePhone, cellPhone) 
		VALUES (:firstName, :lastName, :email, :homeAddress, :homePhone, :cellPhone)";
	
	try {
		$con = new PDO ("mysql:host=localhost;dbname=cmpe272", "cmpe272", "cmpe272pw");
		$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

		$stmt = $con->prepare($query);
		$stmt->bindParam(':firstName', $firstName);
		$stmt->bindParam(':lastName', $lastName);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':homeAddress', $homeAddress);
		$stmt->bindParam(':homePhone', $homePhone);
		$stmt->bindParam(':cellPhone', $cellPhone);
		$stmt->execute();

		
	} catch (PDOException $ex){
		echo $ex->getMessage();
	}
}

?>