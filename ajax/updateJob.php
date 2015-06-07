<?php

	function sql_encode_string($str) {
		return str_replace("'", "''", $str);
	}

    $invoice_num = trim(sql_encode_string($_POST['invoice']));   
    $name = trim(sql_encode_string($_POST['name'])); 
    $quantity = trim($_POST['quantity']);  
	$due_date = date('Y-m-d', strtotime(trim($_POST['duedate'])));

	mysql_connect("data.brandmystuff.com", "joelgarcia", "ilovegod777") or die(mysql_error());
    mysql_select_db("brandmystuff1") or die(mysql_error());

    mysql_query("UPDATE Jobs SET name='". $name. "', quantity=". $quantity. ", due_date='". $due_date. "' ".
    	        "WHERE invoice_num='". $invoice_num. "';") or die(mysql_error());
?>		