<?php

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
?>