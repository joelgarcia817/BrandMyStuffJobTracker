
$(function() {

	eventWireUp();
})

function clearCreateNewJobFields() {
	$('#txtJobInvoiceNumber').val('');
	$('#txtJobName').val('');
	$('#ddlJobType').val('1');
	$('#txtQuantity').val('');
	$('#txtDueDate').val('');
}

function allCreateNewJobFieldsAreValid() {

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

	return true;
}

function createNewJobButtonClicked(e) {
	clearCreateNewJobFields();
}

function saveJobButtonClicked(e) {

	if (allCreateNewJobFieldsAreValid()) {

		var json = {invoice: $.trim($('#txtJobInvoiceNumber').val()),  
	                name: $.trim($('#txtJobName').val()), 
	                type: $.trim($('#ddlJobType').val()), 
	                quantity: $.trim($('#txtQuantity').val()), 
	                duedate: $.trim($('#txtDueDate').val())};

		$.ajax({ url: 'ajax/createJob.php', 
	             data: json,
	             type: 'POST',          
	             success: jobCreated, 
	             error: ajaxErrorHandler } );

		function jobCreated() { 
			$('#divAddEditModal').modal('hide');
			location.reload();
		}
	}
	e.preventDefault();
}

function eventWireUp() {
	$('.new-btn').on('click', createNewJobButtonClicked);
	$('.save-job-btn').on('click', saveJobButtonClicked);
}

function ajaxErrorHandler(err) {
	alert('Unexpected error: ' + err.responseText);
}

