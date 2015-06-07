<?php

	function sql_encode_string($str) {
		return str_replace("'", "''", $str);
	}

	$invoice_num = trim(sql_encode_string($_POST['invoiceNumber']));   

	mysql_connect("data.brandmystuff.com", "joelgarcia", "ilovegod777") or die(mysql_error());
    mysql_select_db("brandmystuff1") or die(mysql_error());

    mysql_query("DELETE FROM Jobs WHERE invoice_num='". $invoice_num. "';") or die(mysql_error());

    mysql_query("DELETE FROM Comments WHERE invoice_num='". $invoice_num. "';") or die(mysql_error());

?>