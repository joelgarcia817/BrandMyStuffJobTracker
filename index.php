<!DOCTYPE html> 
<html> 
<head> 
	<title>Order Manager</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="http://cdn.rawgit.com/arschmitz/jquery-mobile-datepicker-wrapper/v0.1.1/jquery.mobile.datepicker.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <script src="http://cdn.rawgit.com/jquery/jquery-ui/1.10.4/ui/jquery.ui.datepicker.js"></script>
  <script id="mobile-datepicker" src="http://cdn.rawgit.com/arschmitz/jquery-mobile-datepicker-wrapper/v0.1.1/jquery.mobile.datepicker.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head> 
<body> 

<div data-role="page" id="main">	

	<div data-role="header" data-position="fixed">
		<h1>Job Tracker</h1>
    <a href="#add-edit" data-icon="plus" data-theme="d" class="ui-btn-right">Add Job</a>
	</div><!-- /header -->

	<div data-role="content">	
		<div data-role="navbar">
      <ul>
        <li><a href="#" class="date-range ui-btn-active">This Week</a></li>
        <li><a href="#" class="date-range">Next Week</a></li>
      </ul>
    </div><!-- /navbar -->

    <div class="show-jobs">
      <h3  class="job-date-header">Monday (5/4)</h3>
      <hr/>

      <div class="job">
        <span class="job-name">Programmathon Jerseys</span>
        <span class="job-type">(Screen Print)</span>
        <div class="ui-grid-b pad-top">
          <div class="ui-block-a">Inv#: 1234567</div>
          <div class="ui-block-b">Qty: 18</div>
          <div class="ui-block-c">Ordered: 4/15/15</div>
        </div><!-- /grid-b -->
        <div class="ui-field-contain">
          <label for="ddlStatus-1">Status:</label>
          <select name="ddlStatus-1" id="ddlStatus-1" data-native-menu="false" data-mini="true">
              <option value="1">Not Started</option>
              <option value="2">Artwork Created</option>
              <option value="3">Artwork Approved</option>
              <option value="4">Job Completed</option>
          </select>
        </div><!-- selector -->
        <hr/>
      </div>
      

      <div class="job">
        <span class="job-name">Polos For Labatt Food Show</span>
        <span class="job-type">(Embroidery)</span>
        <div class="ui-grid-b pad-top">
          <div class="ui-block-a">Inv#: 1234567</div>
          <div class="ui-block-b">Qty: 122</div>
          <div class="ui-block-c">Ordered: 12/22/22</div>
        </div><!-- /grid-b -->
        <div class="ui-field-contain">
          <label for="ddlStatus-2">Status:</label>
          <select name="ddlStatus-2" id="ddlStatus-2" data-native-menu="false" data-mini="true">
              <option value="1">Not Started</option>
              <option value="2">Artwork Created</option>
              <option value="3">Artwork Approved</option>
              <option value="4">Job Completed</option>
          </select>
        </div><!-- selector -->
        <hr/>
      </div>
      

      <h3 class="job-date-header">Tuesday (5/5)</h3>
      <hr/>

      <div class="job">
        <span class="job-name">Programmathon Jerseys</span>
        <span class="job-type">(Screen Print)</span>
        <div class="ui-grid-b pad-top">
          <div class="ui-block-a">Inv#: 1234567</div>
          <div class="ui-block-b">Qty: 18</div>
          <div class="ui-block-c">Ordered: 4/15/15</div>
        </div><!-- /grid-b -->
        <div class="ui-field-contain">
          <label for="ddlStatus-3">Status:</label>
          <select name="ddlStatus-3" id="ddlStatus-3" data-native-menu="false" data-mini="true">
              <option value="1">Not Started</option>
              <option value="2">Artwork Created</option>
              <option value="3">Artwork Approved</option>
              <option value="4">Job Completed</option>
          </select>
        </div><!-- selector -->
        <hr/>
      </div>   

      <div class="job">
        <span class="job-name">Polos For Labatt Food Show</span>
        <span class="job-type">(Embroidery)</span>
        <div class="ui-grid-b pad-top">
          <div class="ui-block-a">Inv#: 1234567</div>
          <div class="ui-block-b">Qty: 122</div>
          <div class="ui-block-c">Ordered: 12/15/15</div>
        </div><!-- /grid-b -->
        <div class="ui-field-contain">
          <label for="ddlStatus-4">Status:</label>
          <select name="ddlStatus-4" id="ddlStatus-4" data-native-menu="false" data-mini="true">
              <option value="1">Not Started</option>
              <option value="2">Artwork Created</option>
              <option value="3">Artwork Approved</option>
              <option value="4">Job Completed</option>
          </select>
        </div><!-- selector -->
        <hr/>
      </div>   

    </div>
		
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="add-edit">  
  <div data-role="header">
    <h1>Add/Edit Job</h1>
    <a href="#main" data-icon="home" data-theme="d" class="ui-btn-right">Home</a>
  </div><!-- /header -->

  <div data-role="content">
    <label for="ae-job-name">Name:</label>
    <input type="text" name="ae-job-name" id="ae-job-name" value="" >
    <label for="ae-job-type" class="select">Type:</label>
    <select name="ae-job-type" id="ae-job-type" data-native-menu="false">  
      <option value="1">Screen Print</option>
      <option value="2">Embroidery</option>
    </select>
    <label for="ae-job-qty">Quantity:</label>
    <input type="text" name="ae-job-qty" id="ae-job-qty" value="" >
    <label for="ae-job-orderdate">Order Date:</label>
    <input type="text" name="ae-job-orderdate" id="ae-job-orderdate" data-role="date">
    
    <button class="ui-btn ui-btn-active add-edit-save-button">Save</button>
  </div>
</div>

</body>
</html>