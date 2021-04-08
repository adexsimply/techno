<script type="text/javascript">
$(document).ready(function () {


listDefaultRadList(); 
//listDefaultReceiptList(); 

     var radListTable =  $('#radListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#radListSearch').on( 'keyup', function () {
        radListTable.search( this.value ).draw();
    } );
/////


function listDefaultRadList() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('radiology/get_request_list_default'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
       // console.log(response)
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

  
          
            $.ajax({
          type  : 'post',
          url   : '<?php echo base_url('pharmacy/convert_date'); ?>',
          data: {
              date: response[i].date_created,
            },
          async : false,
          dataType : 'json',
          success : function(response2){
            //console.log(response2);

            response3 = response2
            }

          });


            if (response[i].status=='Pending') {
                status = '<span class="badge badge-warning">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Treated') {
                status = '<span class="badge badge-success">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Specimen') {
                status = '<span class="badge badge-primary">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Review') {
                status = '<span class="badge badge-info">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Incomplete') {
                status = '<span class="badge badge-primary">'+response[i].status+'</span>'
            }


            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Request" href="<?php echo base_url('radiology/view_request/'); ?>' + response[i].request_id+ '"> <i class="fa fa-eye"></i></button> '


            html += '<tr><td>' + sn++ +
              '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].status +
              '</td> <td>' + response[i].clinic_name+
              '</td> <td>' + response[i].staff_firstname+' '+response[i].staff_lastname+
              '</td> <td>' + status+
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#radList').html(html);
        }

      });

    }



});


  function filter_rad_request() {
    $('#radListTable').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#radListTable').dataTable().fnDraw();
    $('#radListTable').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
   var status = document.getElementById('status').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listRadRequest();

    //$('#filteredPatients').show();
    //var prescriptionTable = $('#prescriptionMasterList').DataTable()    


   var radListTable =  $('#radListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#radListSearch').on( 'keyup', function () {
        radListTable.search( this.value ).draw();
    } );


   
function listRadRequest() {
     
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('radiology/get_request_list_filtered'); ?>',
      data: {
          status: status,
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
        for(i=0; i<response.length; i++){

          var patient_id = response[i].patient_id;
          var invoice_id = response[i].invoice_id;
          var response3 ="";

          
            $.ajax({
          type  : 'post',
          url   : '<?php echo base_url('pharmacy/convert_date'); ?>',
          data: {
              date: response[i].date_created,
            },
          async : false,
          dataType : 'json',
          success : function(response2){
            //console.log(response2);

            response3 = response2
            }

          });


            if (response[i].status=='Pending') {
                status = '<span class="badge badge-warning">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Treated') {
                status = '<span class="badge badge-success">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Specimen') {
                status = '<span class="badge badge-primary">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Review') {
                status = '<span class="badge badge-info">'+response[i].status+'</span>'
            }
            else if (response[i].status=='Incomplete') {
                status = '<span class="badge badge-primary">'+response[i].status+'</span>'
            }



            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Request" href="<?php echo base_url('radiology/view_request/'); ?>' + response[i].request_id+ '"> <i class="fa fa-eye"></i></button> '


            html += '<tr><td>' + sn++ +
              '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].status +
              '</td> <td>' + response[i].clinic_name+
              '</td> <td>' + response[i].staff_firstname+' '+response[i].staff_lastname+
              '</td> <td>' + status+
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#radList').html(html);
        }

      });

    }

  }


    /////Add Session form begins
    function save_update(formData) {
        $("button[title='update_request']").html("Saving data, please wait...");
        $.post("<?php echo base_url('radiology/update_request'); ?>", formData).done(function(data) {
            //console.log(data)
            window.location = "<?php echo base_url('radiology/requests'); ?>";
        });
    }

    function form_routes_request(action) {
        if (action == 'update_request') {
            var formData = $('#update-request').serialize();
            $.confirm({
                title: 'Update Request',
                content: 'Are you sure you want to Save Request?',
                icon: 'fa fa-check-circle',
                type: 'green',
                buttons: {
                    yes: function() {
                        save_update(formData);
                    },
                    no: function() {

                    }
                }
            });
        } else {
            cancel();
        }
    }
</script>