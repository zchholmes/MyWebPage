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
			require_once("../PHPLib/CookieUtility.php");
			require_once("../PHPLib/RenderProductDetails.php");
			$list = catchRecent();
			if (!empty($list)){
				foreach ($list as $item){
					showProductDetailSamll($item);
				}
			}
		?>
	</p>
	
	</br></br>
	
	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

