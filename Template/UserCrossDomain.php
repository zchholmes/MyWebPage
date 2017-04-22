<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User List cross Domains</title>
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
		<div>
			<h3>User List from local Domain</h3>
			<?php
				require_once("../PHPLib/showAllUser.php");
				showUserList("http://cmpe272.zchholmes.cc/Template/allUser.php");
			?>
			
		</div>
		
		<div>
			<h3>User List from www.syt123450.com</h3>
			<?php
				require_once("../PHPLib/showAllUser.php");
				showUserList("http://www.syt123450.com/phpLib/getUserInfo.php");
			?>
		</div>
	</p>
	
	</br></br>
	
	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

