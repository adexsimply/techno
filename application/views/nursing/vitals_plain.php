<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table id="babel">
	<thead>
		
	<tr>
		<th>
			1
		</th>
		<th>Name</th>
		<th>Address</th>
		<th>Address</th>
		<th>Address</th>
		<th>Address</th>
	</tr>
	</thead>
	<tbody id="brothel">
		<!-- <tr>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
			<td>1</td>
		</tr> -->



	</tbody>
	
</table>
</body>
</html>
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
	
$(document).ready(function () {

listDefaultPatients(); 
$('#babel').DataTable();




function listDefaultPatients() {
  //     $.ajax({
  //       url: '<?php echo base_url('nursing/get_default_vitals'); ?>',
  //       type: 'ajax',
  //       dataType: 'json',
  //       success: function(response) {
  //       var html = '';
  //       var i;
  //       console.log(response);
  //       for(i=1; i<response.length; i++){

  //       	html +='<tr><td>'+i+'</td>'+
		// 	'<td>Name</td>'+
		//     '<td>Address</td>'+
		//     '<td>Address</td>'+
		//     '<td>Address</td>'+
		//     '<td>Address</td></tr>';

		// }
  //         $('#brothel').html(html);
  //       }
  //     });

    $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('nursing/get_default_vitals'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        var html = '';
        var i;
        for(i=1; i<response.length; i++){
              	html +='<tr><td>'+i+'</td>'+
			'<td>Name</td>'+
		    '<td>Address</td>'+
		    '<td>Address</td>'+
		    '<td>Address</td>'+
		    '<td>Address</td></tr>';

		}
          $('#brothel').html(html);       
      }

    });

}


	});
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>