
$(function() {

	eventWireUp();
})

function clearCreateNewJobFields() {
	$('#txtJobInvoiceNumber').val('').attr('disabled', false);
	$('#txtJobName').val('');
	$('#ddlJobType').val('1').attr('disabled', false);
	$('#txtQuantity').val('');
	$('#txtDueDate').val('');
}

function allCreateNewJobFieldsAreValid() {

	var today = new Date();
	today.setHours(0,0,0,0);

	if ( $.trim($('#txtJobInvoiceNumber').val()) == '' ) {
		alert('Please enter a valid invoice number'); return false;
	}
	else if ( $.trim($('#txtJobName').val()) == '' ) {
		alert('Please enter a valid job name'); return false;
	}
	else if ( $.trim($('#txtQuantity').val()) == '' || ! $.isNumeric($('#txtQuantity').val()) ) {
		alert('Please enter a valid quantity'); return false;
	}
	else if ( $.trim($('#txtDueDate').val()) == '' ) {
		alert('Please enter a valid due date'); return false;
	}
	else if ( stringToDate($.trim($('#txtDueDate').val())) < today ) {
		alert('Due date cannot be in the past'); return false;
	}

	return true;
}

function createNewJobButtonClicked(e) {
	clearCreateNewJobFields();
	$('.save-job-btn').data('state', 'new');
}

function saveJobButtonClicked(e) {

	if (allCreateNewJobFieldsAreValid()) {

		var json = {invoice: $.trim($('#txtJobInvoiceNumber').val()),  
	                name: $.trim($('#txtJobName').val()), 
	                type: $.trim($('#ddlJobType').val()), 
	                quantity: $.trim($('#txtQuantity').val()), 
	                duedate: $.trim($('#txtDueDate').val())};

        var actionURL = ($(e.target).data('state') == 'new') ? 'ajax/createJob.php' : 'ajax/updateJob.php';

		$.ajax({ url: actionURL, 
	             data: json,
	             type: 'POST',          
	             success: saveComplete, 
	             error: ajaxErrorHandler } );

		function saveComplete() { 
			$('#divAddEditModal').modal('hide');
			location.reload();
		}
	}
	e.preventDefault();
}

function editButtonClicked(e) {
	var row = $(e.target).closest('tr.job-row');

	$('#txtJobInvoiceNumber').val(row.data('invoicenumber')).attr('disabled', true);
	$('#txtJobName').val(row.find('td.name').text());
	$('#ddlJobType').val(row.find('td.type').data('type')).attr('disabled', true);
	$('#txtQuantity').val(row.find('td.qty').text());
	$('#txtDueDate').val(row.data('duedate'));

	$('.save-job-btn').data('state', 'edit');
}

function jobDeleteButtonClicked(e) {
	var invc = $(e.target).closest('tr.job-row').data('invoicenumber');

	if(confirm("Are you sure you want to delete this job?")) {
		$.ajax({ url: 'ajax/deleteJob.php', 
	             data: {invoiceNumber: invc},
	             type: 'POST',          
	             success: jobDeleted, 
	             error: ajaxErrorHandler } );

		function jobDeleted() { 			
			location.reload();
		}
	}
	
	e.preventDefault();
}

function jobStatusChanged(e) {
	var invc = $(e.target).data('invoicenumber');
	var stat = $(e.target).val();

	$.ajax({ url: 'ajax/updateJobStatus.php', 
             data: {invoiceNumber: invc, newStatus: stat},
             type: 'POST',          
             success: jobUpdated, 
             error: ajaxErrorHandler } );

	function jobUpdated() { 			
		//do nothing
	}

	e.preventDefault();
}

function stringToDate(str) {
	var splt = str.split("-")
	return new Date(splt[0], parseInt(splt[1], 10) - 1, splt[2]);
}

function eventWireUp() {
	$('.new-btn').on('click', createNewJobButtonClicked);
	$('.save-job-btn').on('click', saveJobButtonClicked);
	$('.status-select').on('change', jobStatusChanged);
	$('.delete-button').on('click', jobDeleteButtonClicked);
	$('.edit-button').on('click', editButtonClicked);
}

function ajaxErrorHandler(err) {
	alert('Unexpected error: ' + err.responseText);
}

