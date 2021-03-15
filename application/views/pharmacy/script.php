
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {


listDefaultPrescriptionList(); 

     var prescriptionTable =  $('#prescriptionMasterList').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
		$('#myInput').on( 'keyup', function () {
		    prescriptionTable.search( this.value ).draw();
		} );


function listDefaultPrescriptionList() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('pharmacy/get_prescription_list_default'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(response)
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

        	var date = response[i].presc_date_added;
        	var response3 ="";

        	  $.ajax({
		      type  : 'post',
		      url   : '<?php echo base_url('pharmacy/convert_date'); ?>',
		      data: {
		          date: date,
		        },
		      async : false,
		      dataType : 'json',
		      success : function(response2){
		        //console.log(response2);

		        response3 = response2
		        }

		      });
        	  //console.log(response3)

            if (response[i].vital_id != null) {
              var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
              var vital_status = '<span class="badge badge-success">Treated</span>';
            } else {
              var fullname = "";
              var vital_status = '<span class="badge badge-warning">Pending</span>';
            }

        //Badge colors
         if (response[i].status == "Pending") { 
            var status = '<span class="badge badge-warning">'+ response[i].status +'</span>'
        	}
            else if (response[i].status == "Treated") {
                var status = '<span class="badge badge-success">'+ response[i].status +'</span>'
            }
            else if (response[i].status == "Prescription") {
                var status = '<span class="badge badge-primary">'+ response[i].status +'</span>'
            }



            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="Prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription2/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i></button> '+
                           '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="Edit prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-pencil"></i></button> '+
                            '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '+
                            '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id +')"><i class="fa fa-trash"></i></button>';

            html += '<tr><td>' + sn++ + '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].clinic_name +
              '</td> <td>' + status +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td><td>' + fullname +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filteredPrescriptions').html(html);
        }

      });

    }

});


////Filtered Prescription


  function filter_prescriptions() {
    $('#prescriptionMasterList').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#prescriptionMasterList').dataTable().fnDraw();
    $('#prescriptionMasterList').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
    var status = document.getElementById('status').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listPrescriptions();

    //$('#filteredPatients').show();
    //var prescriptionTable = $('#prescriptionMasterList').DataTable()    


     var prescriptionTable =  $('#prescriptionMasterList').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
		$('#myInput').on( 'keyup', function () {
		    prescriptionTable.search( this.value ).draw();
		} );


    // list all employee in datatable
    function listPrescriptions() {

      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('pharmacy/filter_prescriptions'); ?>',
      data: {
          status: status,
          //doctor_id: doctor_id,
          date_range_from: date_range_from,
          date_range_to: date_range_to,
          //clinic_id: clinic_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(date_range_from);
        //console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){var date = response[i].presc_date_added;
        	var response3 ="";

        	  $.ajax({
		      type  : 'post',
		      url   : '<?php echo base_url('pharmacy/convert_date'); ?>',
		      data: {
		          date: date,
		        },
		      async : false,
		      dataType : 'json',
		      success : function(response2){
		        //console.log(response2);

		        response3 = response2
		        }

		      });
        	  //console.log(response3)

            if (response[i].vital_id != null) {
              var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
              var vital_status = '<span class="badge badge-success">Treated</span>';
            } else {
              var fullname = "";
              var vital_status = '<span class="badge badge-warning">Pending</span>';
            }

        //Badge colors
         if (response[i].status == "Pending") { 
            var status = '<span class="badge badge-warning">'+ response[i].status +'</span>'
        	}
            else if (response[i].status == "Treated") {
                var status = '<span class="badge badge-success">'+ response[i].status +'</span>'
            }
            else if (response[i].status == "Prescription") {
                var status = '<span class="badge badge-primary">'+ response[i].status +'</span>'
            }



            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="Prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription2/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i></button> '+
                           '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="Edit prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-pencil"></i></button> '+
                            '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '+
                            '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id +')"><i class="fa fa-trash"></i></button>';

            html += '<tr><td>' + sn++ + '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].clinic_name +
              '</td> <td>' + status +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td><td>' + fullname +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filteredPrescriptions').html(html);
        }

      });
    }


  }



</script>