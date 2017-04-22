<?php

	echo json_encode(getAllUserData());


	function getAllUserData(){
		$query = "SELECT firstName, lastName, email, homeAddress, homePhone, cellPhone FROM User";

		try {
			$con = new PDO ("mysql:host=localhost;dbname=cmpe272", "cmpe272", "cmpe272pw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute();
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $data;

		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
?>