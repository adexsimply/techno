<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

listDefaultPatientsWL(); 

var waitingList = $('#waitingList').DataTable({
   dom: 'lrtip',
   "lengthChange": false,
   "oLanguage": {
        "sEmptyTable": "There are no Patients at the moment"
    }


});
    // #myInput is a <input type="text"> element
    $('#wlSearchInput').on( 'keyup', function () {
        waitingList.search( this.value ).draw();
    } );


function listDefaultPatientsWL() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('appointment/get_default_vitals'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(response)
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){


            if (response[i].vital_id != null) {
              var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
              var vital_status = '<span class="badge badge-success">Treated</span>';
            } else {
              var fullname = "";
              var vital_status = '<span class="badge badge-warning">Pending</span>';
            }
            // if (response[i].vital_id) {
            //   var buttons = '<span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#EditVital' + response[i].vital_id + '" style="cursor: pointer;">Edit Vitals</span>' +
            //     '<span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#ViewVital' + response[i].vital_id + '" style="cursor: pointer;">View Vitals</span>' +
            //     '<span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(' + response[i].vital_id + ')" style="cursor: pointer;">Delete Vitals</span>';
            // } else {
            //   var buttons = '<button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for " href="<?php echo base_url('nursing/take_vital/'); ?>' + response[i].app_id + '"><i class="icon wb-plus" aria-hidden="true"></i> Take Vitals </button>';
            // }
            var buttons = '<button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="' + response[i].patient_title + ' ' + response[i].patient_name + '" href="<?php echo base_url('patient/view/'); ?>' + response[i].patient_id+"/" +response[i].vital_id+ '"><i class="icon-eye" aria-hidden="true"></i></button>';

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].appointment_date +
              '</td> <td>' + response[i].appointment_time +
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filtered_vitals').html(html);
        }

      });

    }


});

  function filter_vitals() {
    $('#waitingList').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#waitingList').dataTable().fnDraw();
    $('#waitingList').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
    //var status = document.getElementById('status').value;
    var doctor_id = document.getElementById('doctor_id').value;
    var clinic_id = document.getElementById('clinic_id').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listPatients();

    //$('#filteredPatients').show();
     var prescriptionTable =  $('#prescriptionMasterList').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#myInput').on( 'keyup', function () {
        prescriptionTable.search( this.value ).draw();
    } );  


    // list all employee in datatable
    function listPatients() {

      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('appointment/filter_appointmentWL'); ?>',
      data: {
          //status: status,
          doctor_id: doctor_id,
          date_range_from: date_range_from,
          date_range_to: date_range_to,
          clinic_id: clinic_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){


            if (response[i].vital_id != null) {
              var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
              var vital_status = '<span class="badge badge-success">Treated</span>';
            } else {
              var fullname = "";
              var vital_status = '<span class="badge badge-warning">Pending</span>';
            }
            // if (response[i].vital_id) {
            //   var buttons = '<span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#EditVital' + response[i].vital_id + '" style="cursor: pointer;">Edit Vitals</span>' +
            //     '<span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#ViewVital' + response[i].vital_id + '" style="cursor: pointer;">View Vitals</span>' +
            //     '<span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(' + response[i].vital_id + ')" style="cursor: pointer;">Delete Vitals</span>';
            // } else {
            //   var buttons = '<button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for " href="<?php echo base_url('nursing/take_vital/'); ?>' + response[i].app_id + '"><i class="icon wb-plus" aria-hidden="true"></i> Take Vitals </button>';
            // }

            var buttons = '<button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="' + response[i].patient_title + ' ' + response[i].patient_name + '" href="<?php echo base_url('patient/view/'); ?>' + response[i].patient_id + '"><i class="icon-eye" aria-hidden="true"></i></button>';

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].appointment_date +
              '</td> <td>' + response[i].appointment_time +
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filtered_vitals').html(html);
        }

      });
    }


  }

</script>

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>