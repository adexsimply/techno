<script type="text/javascript">
$(document).ready(function () {


listDefaultLabList(); 
//listDefaultReceiptList(); 

     var labListTable =  $('#labListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#labListSearch').on( 'keyup', function () {
        labListTable.search( this.value ).draw();
    } );
/////


function listDefaultLabList() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('laboratory/get_request_list_default'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(response)
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

            if (response[i].status=='Specimen') {

            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_specimen/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if (response[i].status=='Review') {

            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_review/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if (response[i].status=='Treated') {

            var buttons = '<button class="btn btn-dark" type="button" data-show="yes" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_treated/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if(response[i].status=='Pending'){
            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '
            }

            html += '<tr><td>' + sn++ +
              '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].status +
              '</td> <td>' + response[i].clinic_name+
              '</td> <td>' + response[i].staff_firstname+' '+response[i].staff_lastname+
              '</td> <td>' + response[i].diagnosis+
              '</td> <td>' + status+
              '</td> <td>' + response[i].lab_test_name +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#labList').html(html);
        }

      });

    }



});


  function filter_lab_request() {
    $('#labListTable').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#labListTable').dataTable().fnDraw();
    $('#labListTable').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
   var status = document.getElementById('status').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    //console.log(date_range_to);

    listLabRequest();

    //$('#filteredPatients').show();
    //var prescriptionTable = $('#prescriptionMasterList').DataTable()    


   var labListTable =  $('#labListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
    // #myInput is a <input type="text"> element
    $('#labListSearch').on( 'keyup', function () {
        labListTable.search( this.value ).draw();
    } );


   
function listLabRequest() {
     
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('laboratory/get_request_list_filtered'); ?>',
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


            if (response[i].status=='Specimen') {

            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_specimen/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if (response[i].status=='Review') {

            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_review/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if (response[i].status=='Treated') {

            var buttons = '<button class="btn btn-dark" type="button" data-show="yes" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_treated/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '

            }
            else if(response[i].status=='Pending'){
            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="laboratory_dialog(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request/'); ?>' + response[i].lab_request_id+ '"> <i class="fa fa-pencil"></i></button> '
            }

            html += '<tr><td>' + sn++ +
              '</td> <td>' + response3 +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].status +
              '</td> <td>' + response[i].clinic_name+
              '</td> <td>' + response[i].staff_firstname+' '+response[i].staff_lastname+
              '</td> <td>' + response[i].diagnosis+
              '</td> <td>' + status+
              '</td> <td>' + response[i].lab_test_name +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#labList').html(html);
        }

      });

    }

  }


    /////Add Session form begins
    function save_eye_clinic_name(formData) {
        $("button[title='update_request']").html("Saving data, please wait...");
        $.post("<?php echo base_url('laboratory/update_request'); ?>", formData).done(function(data) {
            //console.log(data)
            //window.location = "<?php echo base_url('laboratory/requests_results'); ?>";
        });
    }

    function form_routes_request(action) {
        if (action == 'update_request') {
            var formData = $('#update-request').serialize();

                        save_eye_clinic_name(formData);
            // $.confirm({
            //     title: 'Update Request',
            //     content: 'Are you sure you want to Save Request?',
            //     icon: 'fa fa-check-circle',
            //     type: 'green',
            //     buttons: {
            //         yes: function() {
            //             save_eye_clinic_name(formData);
            //         },
            //         no: function() {

            //         }
            //     }
            // });
        } else {
            cancel();
        }
    }
    /////Add Session form begins
    function save_lab_result_details(formData) {
        $("button[title='update_request']").html("Saving data, please wait...");
        $.post("<?php echo base_url('laboratory/save_lab_result_details'); ?>", formData).done(function(data) {
           // console.log(data)
            //window.location = "<?php echo base_url('laboratory/requests_results'); ?>";
        });
    }

    function form_routes_request_s(action) {
        if (action == 'update_request_specimen') {
            var formData = $('#update-request-specimen').serialize();
                //console.log(formData);
                    save_lab_result_details(formData);
            // $.confirm({
            //     title: 'Update Request',
            //     content: 'Are you sure you want to Save Request?',
            //     icon: 'fa fa-check-circle',
            //     type: 'green',
            //     buttons: {
            //         yes: function() {
            //             save_eye_clinic_name(formData);
            //         },
            //         no: function() {

            //         }
            //     }
            // });
        } 
        else if(action == 'update_request_review') {
            var lab_request_id = document.getElementById('lab_request_id').value;
            console.log(lab_request_id);

                $.ajax({
              type  : 'post',
              url   : '<?php echo base_url('laboratory/change_lab_request_to_treated'); ?>',
              data: {
                  lab_request_id: lab_request_id,
                },
              async : false,
              dataType : 'json',
              success : function(response2){
                console.log(response2);
                }

              });

        }
        else {
            cancel();
        }
    }


/////

function laboratory_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var status = element.data('status');
    var size = element.data('size');
    var show = element.data('show');

    //console.log(status);
    var btn_text = "Save"
    var btn_color = "btn-blue"

   var laboratoryDialog = $.confirm({
        title: 'Prompt!',
        columnClass:size,
        content: function () {
                  var self = this;
                  return $.ajax({
                      url: url,
                      method: 'get',
                  }).done(function (data) {
                      self.setContent(data);
                      self.setTitle(title);
                  }).fail(function(){
                      self.setContent('Something went wrong');
                  });
              },
        buttons: {

            labSubmit: {
                text: btn_text,
                btnClass: btn_color,
                action: function () {

                  var confirmsir = "No"
                    //return false;

                            // if (amount != '') {
                                $.confirm({
                                    title: 'Save',
                                    content: 'Are you sure you want to Save?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                          buttons: {
                                              yes: function() {

                                                if (status=='Specimen') {
                                                form_routes_request_s('update_request_specimen');

                                                }
                                                else if (status=='Review') {
                                                form_routes_request_s('update_request_review');
                                            }

                                                else {

                                                form_routes_request('update_request');
                                                }
                  

                                                //alert('Done');
                                                 filter_lab_request()

                                                laboratoryDialog.close();
                                              },
                                              no: function() {

                                              }
                                          }
                                });
                            // } else {
                            //    // $("#amt_error").text('Total must greater than zero (0)')

                            //     return false
                            // }

                        //console.log(confirmsir);
                  if (confirmsir=='No') {
                    return false;
                  }
                  else {
                    return true;
                  }


                }
            },
            Close: function () {
                //close
                //return false;
            },
        },
        onContentReady: function () {
            console.log("zssss");

            if (status=='Treated') {

            this.buttons.labSubmit.hide();
            }
            if (show=='No') {

            this.buttons.labSubmit.hide();
            }

            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {

                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$labSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
  //end of dialog if..else

}
</script>