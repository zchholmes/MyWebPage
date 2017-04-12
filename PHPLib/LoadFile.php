<?php
	function printFile($fileName){
		$contactFile = fopen($fileName, "r") or die("Unable to open file!");
		echo fread($contactFile, filesize($fileName));
		fclose($contactFile);	
	}
?>