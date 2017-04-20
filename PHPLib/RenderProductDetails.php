<?php
	function showProductDetail($productID){
		$data = findProductDetail($productID);
		if (count($data) <=0){
			emptyResult($productID);
			die();
		}
		else {
			renderProductDetail($data);
		}
	}
	
	function showProductDetailSamll($productID){
		$data = findProductDetail($productID);
		if (count($data) <=0){
			emptyResult($productID);
			die();
		}
		else {
			renderProductDetailSmall($data);
		}
	}

	function showProductDetailSamllWithCount($productID, $countNum){
		$data = findProductDetail($productID);
		if (count($data) <=0){
			emptyResult($productID);
			die();
		}
		else {
			renderProductDetailSmallWithCount($data, $countNum);
		}
	}
	
	function findProductDetail($productID){
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
	
	function renderProductDetail($data){
		print("<h3>Course Information</h3>");
		foreach ($data as $row){
			print("<div>");
			print("<div><img src=\"" . $row["largePicUrl"] . "\" alt=\"product picture\" height=150px></div>");
			print("<div>Course Name: " . $row["productName"] . "</div>");
			print("<div>Price: $" . $row["priceNew"] . "</div>");
			print("<div>Quantity: " . $row["quantity"] . "</div>");
			print("</br><div>Description: " . $row["description"] . "</div></br>");
			print("</div>");
		}
	}
	
	function renderProductDetailSmall($data){
		foreach ($data as $row){
			print("<div class=\"productList\">");
			print("<a href=\"/Template/product_detail.php?productID=" . $row["productID"] . "\">");
			print("<img src=\"" . $row["largePicUrl"] . "\" alt=\"" . $row["productName"] . " logo\" class=\"productPic\"></a>");
			print("<div style='margin-left:15%;'>");
			print("<a href=\"/Template/product_detail.php?productID=" . $row["productID"] . "\">");
			print("<h4>" . $row["productName"] . "</h4></a>");
			print("</div></div>");
		}
	}
	
	function renderProductDetailSmallWithCount($data, $countNum){
		foreach ($data as $row){
			print("<div class=\"productList\">");
			print("<a href=\"/Template/product_detail.php?productID=" . $row["productID"] . "\">");
			print("<img src=\"" . $row["largePicUrl"] . "\" alt=\"" . $row["productName"] . " logo\" class=\"productPic\"></a>");
			print("<div style='margin-left:15%;'>");
			print("<a href=\"/Template/product_detail.php?productID=" . $row["productID"] . "\">");
			print("<h4>" . $row["productName"] . "</h4></a>");
			print("<div>Viewed: " . $countNum . "</div>");
			print("</div></div>");
		}
	}
	
	function emptyResult($productID){
		print("<p>We are sorry, but we can't provide any information for the target product." . $productID ."</p>");
	}
	
?>