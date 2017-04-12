<?php
	extract( $_POST );
	if (!$USERNAME || !$PASSWORD){
		emptyInfo();
		die();
	}
	else {
		if (validate($USERNAME, $PASSWORD)){
			validInfo();
		}
		else {
			invalidInfo();
			die();
		}
	}
	
	function validate($user, $pass){
		$ret = false;
		if (!($file = fopen("../txtSrc/admin.txt", "r"))){
		print("<title>Access Denied</title><body><strong>ERROR: Verification file DNE.</strong></body>");
			die();
		}
		else {
			if (!feof($file)){
				$line = fgets($file, 255);
				$line = chop($line);
				$strAry = explode(",", $line, 2);	// split was DEPRECATED after PHP7.0
				if ($user == $strAry[0] && $pass == $strAry[1]){
					$ret = true;
				}
			}
			fclose($file);
		}
		return $ret;
	}
	function emptyInfo(){
		print("<title>Access Denied</title><body><strong>Please don't leave your USERNAME or PASSWORD empty.</strong></body>");
	}
	function invalidInfo(){
		print("<title>Access Denied</title><body><strong>Invalid USERNAME or PASSWORD.</strong></body>");
	}
	function validInfo(){
		require_once("LoadFile.php");
		print ("<title>Thank You!</title><body><strong>Login Successfully! Enjoy!</br></strong><p>Here is the user list:</p></br></body>");
		printFile("../txtSrc/userlist.txt");
	}
?>