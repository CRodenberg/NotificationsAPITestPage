<?php

	$customerID = $_REQUEST['customerID'];

	//If customerID = 37456, send the customer's notifications
	//Test case: Customer with 10 notifications.
	if($customerID == "37456" || $_GET['customerID'] == "37456"){
		$json = array(['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "+30 Rewards Points!",'startDate' => "08/21/17", 'link' => "www.newbalance.com", 'body' => "Congratulations! Learn How To Earn More Points.", 'readFlag' => "true", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "30% Off Shirts",'startDate' => "08/21/17", 'link' => "www.newbalance.com", 'body' => "Fall Savings!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "true", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "true", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "true", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"]);
		header('Content-Type: application/json');
		print_r(json_encode($json));
	}

	//If customerID = 34758, send the customer's notifications
	//Test case: Customer with 2 notifications.
	else if($customerID == "34758"){
		$json = array(['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"], 
			['title' => "20% Off On Shoes",'startDate' => "08/20/17", 'link' => "www.newbalance.com", 'body' => "Get these exclusive back to school prices!", 'readFlag' => "false", 'notificationType' => "sale", 'globalFlag' => "false"]);
		header('Content-Type: application/json');
		print_r(json_encode($json));
	}	






	//If customerID = 36782, send the customer's notifications
	//Test case: Customer with 0 notifications.
	else if($customerID == "36782"){
		$json = "";
		header('Content-Type: application/json');
		print_r(json_encode($json));
	}	
?>