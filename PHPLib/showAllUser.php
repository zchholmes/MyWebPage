<?php

	function showUserList($url){
		$data =json_decode(catchUserData($url));
		renderUserTable($data);
	}

	function catchUserData($url){
		// create curl resource 
		$ch = curl_init(); 

		// set url 
		curl_setopt($ch, CURLOPT_URL, $url); 

		//return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		// $output contains the output string 
		$output = curl_exec($ch); 

		// close curl resource to free up system resources 
		curl_close($ch);
		
		return $output;
	}

	function renderUserTable($data){
		print("<table border =\"1\"><caption>User Found</caption><tr><th>First Name</th><th>Last Name</th><th>email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>");
	
		foreach( $data as $row ) {
			print("<tr>");
			foreach ($row as $key => $value) {
				if ($key != "password"){
					print("<td>$value</td>");
				}
			}
			print("</tr>");
		}
	
		print("</table><br/>");
	}
?>