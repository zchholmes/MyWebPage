<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ZCHHolmes Technology Educations</title>
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
	<h3>
		ZCHHolmes Techonology Educations, where your dream starts.
	</h3>
	<p>
		Enter your username and password<br/>
		
	</p>
	<form action = "../PHPLib/password.php" method = "post">
		<table border = "0">
			<tr>
				<td colspan = "2">
					Username:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "USERNAME" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					Password:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "PASSWORD" type = "password" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					<input type = "submit" name = "Submit" value = "submit" />
			</tr>
		</table>
		<br/><br/>
		
	</form>
	<footer>
			Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>