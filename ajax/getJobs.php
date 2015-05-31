<?php

    mysql_connect("localhost", "pazde", "joel123456") or die(mysql_error());
    mysql_select_db("pazde_AttendanceManager") or die(mysql_error());

    $results = mysql_query("SELECT * FROM Jobs") or die(mysql_error());
    $num_of_rows = mysql_numrows($results);
    $html = "";

    if ($num_of_rows > 0) {
	    $html = "<div class='center-block'>No jobs found</div>";
	} else {
	    while ($row = mysql_fetch_array($results))
		{
		     echo $row['id'] . " " . $row['name'] . " " . $row['email'] . " "  . $row['logged_on'] . "<br/>";
		}
	}    




	function get_week_start_date($date) {
	    $ts = strtotime($date);
	    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
	    return date('Y-m-d', $start);
	}

	date_default_timezone_set('America/Chicago');
	$date = date('m/d/Y h:i:s a', time());

	$sunday_date = get_week_start_date($date);
	echo $sunday_date;
	echo date('Y-m-d', strtotime($sunday_date. ' + 13 days'));
                
    return $html;
?>		