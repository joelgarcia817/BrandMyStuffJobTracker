<!DOCTYPE html>
<html>
<head>
	<title>Job Tracker</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/bootstrap.min.css">	
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">      
      			<a class="navbar-brand" href="#">Job Tracker</a>
      		</div>
      		<button type="button" class="btn btn-success navbar-btn pull-right" data-toggle="modal" data-target="#divAddEditModal">
      			Create New Job
  			</button>
		</div>
    </nav>

    <div class="main-content">

    	<?php
			function get_week_start_date($date) {
			    $ts = strtotime($date);
			    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
			    return date('Y-m-d', $start);
			}

			function get_job_type_string($type) {
				if ($type == 1) { return 'Screen Print'; }
			    elseif ($type == 2) { return 'Embroidery'; }
		    	elseif ($type == 3) { return 'Art Work'; }
	    		elseif ($type == 4) { return 'Digital Print'; }
			}

			function get_job_status_string($status) {
				if ($status == 0) { return 'Not Started'; }
			    elseif ($status == 1) { return 'Ordered'; }
		    	elseif ($status == 2) { return 'Art Work Created'; }
	    		elseif ($status == 3) { return 'Art Work Approved'; }
	    		elseif ($status == 4) { return 'Digitized Complete'; }
	    		elseif ($status == 5) { return 'Job Complete'; }
			}

			date_default_timezone_set('America/Chicago');

			$date = date('m/d/Y h:i:s a', time());

			$start_date = get_week_start_date($date);
			$stop_date = date('Y-m-d', strtotime($start_date. ' + 13 days'));
			$loop_date = $start_date;

			while (strtotime($loop_date) <= strtotime($stop_date)) {
				
				echo "<h3  class='job-date-header'>". date('l (m/d)', strtotime($loop_date)). "</h3>";

				mysql_connect("data.brandmystuff.com", "joelgarcia", "ilovegod777") or die(mysql_error());
			    mysql_select_db("brandmystuff1") or die(mysql_error());

			    $query = "SELECT * FROM Jobs WHERE due_date ='". $loop_date. "';";
			    $results = mysql_query($query) or die(mysql_error());
			    $num_of_rows = mysql_numrows($results);

		    	if ($num_of_rows == 0) {
	    			echo "<div class='center-block no-jobs'>No jobs found</div>";
		    	}
		    	else {
		    		echo '<table class="table table-hover table-condensed table-responsive">';
					echo '<tr class="jobs-header">';
					echo '<th>Name</th>';
					echo '<th>Type</th>';
					echo '<th>Inv#</th>';
					echo '<th>Qty</th>';
					echo '<th>Order Date</th>';
					echo '<th>Status</th>';
					echo '<th>&nbsp;</th>';
					echo '</tr>';

	    			while ($row = mysql_fetch_array($results))
					{
					    echo '<tr>';
						echo '<td>'. $row['name']. '</td>';
						echo '<td>'. get_job_type_string($row['type']). '</td>';
						echo '<td>'. $row['invoice_num']. '</td>';
						echo '<td>'. $row['quantity']. '</td>';
						echo '<td>'. $row['order_date']. '</td>';
						echo '<td>'. get_job_status_string($row['status']). '</td>';
						echo '<td>';
						echo '<button type="button" class="btn btn-link">Edit</button>';
						echo '<button type="button" class="btn btn-link">Delete</button>';
						echo '<button type="button" class="btn btn-link">Comments (2)</button>';
						echo '</td>';
						echo '</tr>';
					}
					echo '</table>';
		    	}

				$loop_date = date ("Y-m-d", strtotime("+1 day", strtotime($loop_date)));
			}
		?>	    	
	</div>

	<div id="divAddEditModal" class="modal fade">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">	        
  		  	<form>
			  <div class="form-group form-group-sm">
			    <label for="txtJobInvoiceNumber">Invoice #</label>
			    <input type="text" class="form-control" id="txtJobInvoiceNumber" placeholder="Invoice Number">
			  </div>
			  <div class="form-group form-group-sm">
			    <label for="txtJobName">Name</label>
			    <input type="text" class="form-control" id="txtJobName" placeholder="Name">
			  </div>
			  <div class="form-group form-group-sm">
			  	<label for="ddlJobType">Type</label>
			  	<select id="ddlJobType" class="form-control">
				  <option value="1">Screen Print</option>
				  <option value="2">Embroidery</option>
				  <option value="3">Art Work</option>
				  <option value="4">Digital Print</option>
				</select>
		  	  </div>
		  	  <div class="form-group form-group-sm">
			    <label for="txtQuantity">Quantity</label>
			    <input type="text" class="form-control" id="txtQuantity" placeholder="Quantity">
			  </div>
			  <div class="form-group form-group-sm">
			    <label for="txtDueDate">Due Date</label>
			    <input type="date" class="form-control" id="txtDueDate" placeholder="Due Date">
			  </div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-success">Save</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div id="divCommentsModal" class="modal fade">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Inv# 122343 - Programmathon Polo This Is A Very Long Name So Suck It</h4>
	      </div>
	      <div class="modal-body">	 
	      	
  			<p>I have problem that is driving me crazy. I have a simple DIV which I want to convert into a scrollable one. It have a table inside it and it should be very easy. I got a separated .html file with my code and it works well.</p>
  		  	<span class="pull-right comment-timestamp">5/30/15 9:20pm</span>
  		  	<div class="clearfix"></div>
  		  	<hr/>

  		  	<p>I have problem that is driving me crazy. I have a simple DIV which I want to convert into a scrollable one. It have a table inside it and it should be very easy. I got a separated .html file with my code and it works well.</p>
  		  	<span class="pull-right comment-timestamp">5/30/15 9:20pm</span>
  		  	<div class="clearfix"></div>
  		  	<hr/>
	  		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>