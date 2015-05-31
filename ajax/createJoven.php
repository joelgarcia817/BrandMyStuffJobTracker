<?php

    mysql_connect("localhost", "pazde", "joel123456") or die(mysql_error());
    mysql_select_db("pazde_AttendanceManager") or die(mysql_error());
    
    $first_name = $_POST['firstName'];   
    $last_name = $_POST['lastName'];

    mysql_query("INSERT INTO joven (first_name, last_name, time_added) VALUES ('"
                . $first_name . "','" . $last_name . "', NOW())") or die(mysql_error());  
                
    return true;
?>		