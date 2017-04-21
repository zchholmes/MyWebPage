<?php
	define("DOMAINNAME", "http://cmpe272.zchholmes.cc");	
	// Check productID exist
	if (!empty($_GET["ID"])){
		// Check if productID is empty, i.e. no value
		if (!($_GET["ID"] === "" || $_GET["ID"] === null)){
			// Check if productID is in digit
			if (ctype_digit($_GET["ID"])){
				// Check if we have a 2nd parameter
				if (!empty($_GET["endID"])){
					if (!($_GET["endID"] === "" || $_GET["endID"] === null)){
						if (ctype_digit($_GET["endID"])){
							// Search in range i.e. ID <= productID <= endID
							$data = findProductsInfo($_GET["ID"], $_GET["endID"]);
							renderProductInfo($data);
						}
						else {
							print("{ \"Message\" : \"Invalid Parameter - endID\"}");
						}
					}
					else {
						print("{ \"Message\" : \"Empty Parameter - endID\"}");
					}
				}
				else {
					// Search exactly i.e. productID == ID
					$data = findProductInfo($_GET["ID"]);
					renderProductInfo($data);
				}
			}
			else {
				print("{ \"Message\" : \"Invalid Parameter - ID\"}");
			}
		}
		else {
			print("{ \"Message\" : \"Empty Parameter - ID\"}");
		}
	}
	else {
		print("{ \"Message\" : \"Incorrect Parameter - ID\"}");
	}
	
	function renderProductInfo($data){
		$output = "{ Products : [ ";
		foreach($data as $row){
			$output = $output . "{ "
				. "\"productID\" : " . $row["productID"] . ", "
				. "\"productName\" : \"" . $row["productName"] . "\", "
				. "\"description\" : \"" . $row["description"] . "\", "
				. "\"priceOrig\" : " . $row["priceOrig"] . ", "
				. "\"priceNew\" : " . $row["priceNew"] . ", "
				. "\"quantity\" : " . $row["quantity"] . ", "
				. "\"smallPicUrl\" : \"" . DOMAINNAME . $row["smallPicUrl"] . "\", "
				. "\"largePicUrl\" : \"" . DOMAINNAME . $row["largePicUrl"] . "\""
			. " },";
		}
		$output = substr($output, 0, (strlen($output) -1) ); 
		$output .=" ] }";
		
		print($output);
	}
	
	function findProductInfo($productID){
		$query = "SELECT productID, productName, description, priceOrig, priceNew, quantity, rate, rated, viewed, smallPicUrl, largePicUrl FROM Product WHERE productID = ?";
	
		try {
			// $con = new PDO ("mysql:host=54.67.4.28:3306;dbname=cmpe272", "cmpe272", "cmpe272pw");
			$con = new PDO ("mysql:host=localhost;dbname=cmpe272", "cmpe272", "cmpe272pw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute(array($productID));
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );
		
			return $data;
		
		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
	function findProductsInfo($startID, $endID){
		$query = "SELECT productID, productName, description, priceOrig, priceNew, quantity, rate, rated, viewed, smallPicUrl, largePicUrl FROM Product WHERE productID >= ? AND productID <= ?";
	
		try {
			// $con = new PDO ("mysql:host=54.67.4.28:3306;dbname=cmpe272", "cmpe272", "cmpe272pw");
			$con = new PDO ("mysql:host=localhost;dbname=cmpe272", "cmpe272", "cmpe272pw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute(array($startID, $endID));
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );
		
			return $data;
		
		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
?>