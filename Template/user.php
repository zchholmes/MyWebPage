<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
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
	
	<h1>User</h1>
	<p>
	<h2>New User</h2>
	<form action = "../PHPLib/createUser.php" method = "post">
		<table border = "0">
			<tr>
				<td colspan = "2">
					First Name:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "FIRSTNAME" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					Last Name:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "LASTNAME" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					email:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "EMAIL" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					Home Address:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "HOMEADDRESS" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					Home Phone:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "HOMEPHONE" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					Cell Phone:
			</tr>
			<tr>
				<td colspan = "2">
					<input size = "40" name = "CELLPHONE" />
				</td>
			</tr>
			<tr>
				<td colspan = "2">
					<input type = "submit" name = "Submit" value = "Create" />
			</tr>
		</table>
		<br/><br/>
		
	</form>
	</p>
	<p>
		<h2>Find User</h2>
		<form action = "../PHPLib/findUser.php" method = "post">
			<table border = "0">
				<tr>
					<td colspan = "2">
						Name:
				</tr>
				<tr>
					<td colspan = "2">
						<input size = "40" name = "NAME" />
					</td>
				</tr>
				<tr>
					<td colspan = "2">
						email:
				</tr>
				<tr>
					<td colspan = "2">
						<input size = "40" name = "EMAIL" />
					</td>
				</tr>
				<tr>
					<td colspan = "2">
						Phone Number:
				</tr>
				<tr>
					<td colspan = "2">
						<input size = "40" name = "PHONENUMBER" />
					</td>
				</tr>
				<tr>
					<td colspan = "2">
						<input type = "submit" name = "Submit" value = "Search" />
				</tr>
			</table>
			<br/><br/>
		
		</form>
		
	</p>
	
	<footer>
		Copyright © 2017 ZCHHolmes All Rights Reserved.
	</footer>
</body>
</html>

