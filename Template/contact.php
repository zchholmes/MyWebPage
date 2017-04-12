<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
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
	
	<h1>Contact Information</h1>
	
	<div id="content">
		<?php
			require_once("../PHPLib/LoadFile.php");
			printFile("../txtSrc/contact.txt");
		?>
	</div>

	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

