// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  	$("[data-toggle=tooltip").tooltip();
  	
  	var table = $('#dataTable').DataTable();
 
	new $.fn.dataTable.Buttons( table, {
    buttons: [
         'View','Edit', 'Delete'
    ]
} );
});

