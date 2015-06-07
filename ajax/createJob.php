<?php

	function sql_encode_string($str) {
		return str_replace("'", "''", $str);
	}

    $invoice_num = trim(sql_encode_string($_POST['invoice']));   
    $name = trim(sql_encode_string($_POST['name']));  
    $type = trim($_POST['type']);  
    $quantity = trim($_POST['quantity']);  
    $due_date_str = trim($_POST['duedate']);  

    date_default_timezone_set('America/Chicago');
	$order_date = date('Y-m-d', time());
	$due_date = date('Y-m-d', strtotime($due_date_str));

	mysql_connect("data.brandmystuff.com", "joelgarcia", "ilovegod777") or die(mysql_error());
    mysql_select_db("brandmystuff1") or die(mysql_error());

    mysql_query("INSERT INTO Jobs (invoice_num, name, type, quantity, status, order_date, due_date) ".
    	        "VALUES ('". $invoice_num. "', '". $name. "', ". $type. ", ". $quantity. 
    	        	    ", 0, '". $order_date. "', '". $due_date. "');") or die(mysql_error());
?>		