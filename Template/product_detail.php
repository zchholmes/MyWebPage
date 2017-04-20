<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Detail</title>
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
	<br/>
	<a href="/Template/product_recent.php">To View Recent Viewed Courses</a>
	<br/>
	<a href="/Template/product_most.php">To View Most Viewed Courses</a>
	<div>
		<?php
			require_once("../PHPLib/LoadFile.php");
			printFile("../txtSrc/contact.txt");
			if(!empty($_GET["productID"])){
				if ($_GET["productID"] === "" || $_GET["productID"] === null){
					print("<h3>Empty Parameter.</h3>");
				}
				else {
					if (!ctype_digit($_GET["productID"])){
						print("<h3>Invalid Parameter.</h3>");
					}
					else {
						require_once("../PHPlib/cookieUtility.php");
						require_once("../PHPlib/renderProductDetails.php");
						saveToCookie($_GET["productID"]);
						showProductDetail($_GET["productID"]);
					}
				}
			}
			else {
				print("<h3>Incorrect Parameter.</h3>");
			}
		?>
	</div>
	
	<br/><br/>
	
	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

