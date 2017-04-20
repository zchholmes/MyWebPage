<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recent Viewed</title>
	<style>
		h4 {
			margin:0px;
		}

		.productPic {
			margin-left:2%;
			float:left; 
			height:75px;
		} 

		.productList {
			margin: 2% 0 5% 2%;
			width:100%;
			height:auto;
			padding:1%;
		}
	</style>
</head>
<body>
	<header>
		<img src = "">
	</header>
	
	<nav>
		<ul>
			<li><a href="/index.html">Home</a></li>
			<li><a href="/Template/products.php">Products</a></li>
			<li><a href="/Template/news.php">News</a></li>
			<li><a href="/Template/about.php">About</a></li>
			<li><a href="/Template/contact.php">Contact</a></li>
			<li><a href="/Template/password.php">UserList</a></li>
			<li><a href="/Template/user.php">User</a></li>
		</ul>
	</nav>
	
	<p>
		<h3>Recent Viewed List</h3>
	</p>
	
	<p>
		<?php
			$list = catchRecent();
			foreach ($list as $item){
				showProductDetailSamll($item);
			}
			
			function saveToCookie($productID){
				saveToViewed($productID);
				saveToRecent($productID);
			}

			function saveToViewed($productID){
				// Get the previous cookie if existed
				if(array_key_exists('views', $_COOKIE)) {
				    $cookie = $_COOKIE['views'];
				    $cookie = unserialize($cookie);
				} else {
				    $cookie = array();
				}
		
				// Check if previously viewed
				if (array_key_exists($productID, $cookie)){
					$cookie[$productID] +=1;
				}
				else {
					$cookie[$productID] =1;
				}
		
				// Sort to keep the most viewed at the top.
				arsort($cookie);
		
				// save the cookie
				$cookie = serialize($cookie);
				setcookie('views', $cookie, time()+432000);	// expire 5 after days
			}
	
	
			function saveToRecent($productID){
				// Get the previous cookie if existed
				if(array_key_exists('recentviews', $_COOKIE)) {
				    $cookie = $_COOKIE['recentviews'];
				    $cookie = unserialize($cookie);
				} else {
				    $cookie = array();
				}
		
				if (!in_array($productID, $cookie)){
					// try to keep the recent 5
					$cookie[] = $productID;
					if (count($cookie) >5){
						$cookie = array_slice($cookie, -5, 5);
					}
				}
				else {
					// try to update the list in order or most recent view
					$key = array_search($productID, $cookie);
					unset($cookie[$key]);
					$cookie[] = $productID;
				}
		
				// save the cookie
				$cookie = serialize($cookie);
				setcookie('recentviews', $cookie, time()+432000);	// expire 5 after days
			}
	
			function catchRecent(){
				if(array_key_exists('recentviews', $_COOKIE)) {
				    $cookie = $_COOKIE['recentviews'];
				    $cookie = unserialize($cookie);
					// take reverse to show most recent first
					$cookie = array_reverse($cookie);
			
					// foreach ($cookie as $productID){
					// 	print("<div>" . $productID . "</div><br/>");
					// }
			
					return $cookie;
				}
				else {
					print("<div>There's on recent views history from the cookie.</div>");
				}
			}
	
			function catchMostFive(){
				if(array_key_exists('views', $_COOKIE)) {
				    $cookie = $_COOKIE['views'];
				    $cookie = unserialize($cookie);
			
					// Pick the most 5 or less
					if (count($cookie) >5){
						$cookie = array_slice($cookie, 0, 5, true);
					}
			
					// foreach ($cookie as $key => $val){
					// 	print("<div>" . $key . " : " . $val ."</div><br/>");
					// }
			
					return $cookie;
				}
				else {
					print("<div>There's on most views history from the cookie.</div>");
				}
			}
			
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
	</p>
	
	</br></br>
	
	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

