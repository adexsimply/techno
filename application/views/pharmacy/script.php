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



            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="prescription_dialog(event)" data-type="black" data-size="l" data-title="Prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/manage_prescription/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i></button> '
                           //'<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="prescription_dialog(event)" data-type="black" data-size="l" data-title="Edit prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '
                            // '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '+
                            // '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id +')"><i class="fa fa-trash"></i></button>';

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



            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="prescription_dialog(event)" data-type="black" data-size="l" data-title="Prescription Request for '+response[i].patient_name+'" href="<?php echo base_url('patient/manage_prescription/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i></button> '
                          //  '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="prescription_dialog(event)" data-type="black" data-size="l" data-title="Edit prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '
                            //'<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription/'); ?>' + response[i].prescription_unique_id+ '"><i class="fa fa-eye"></i></button> '+
                            // '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id +')"><i class="fa fa-trash"></i></button>';

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

function prescription_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var status = element.data('status');
    console.log(url);
    if (status=='Pending'){

    var btn_text = "Send for Payment"
    var btn_color = "btn-orange"
    }
    else if(status=='Prescription') {
      var btn_text = "Treat Prescription";
    var btn_color = "btn-blue"
    }

if (status=='Treated') {
  $.confirm({
        title: 'Prompt!',
        columnClass:'xl',
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
            Close: function () {
                //close
                //return false;
            },
        }
    });


}
else {

   var a = $.confirm({
        title: 'Prompt!',
        columnClass:'xl',
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

            formSubmit: {
                text: btn_text,
                btnClass: btn_color,
                action: function () {

                  var confirmsir = "No"
                  


                          ////
                            var formData = $('#send-payment').serialize();
                            var amount = $("#main_amount").val()
                            if (status=='Pending') {

                            if (amount != '') {
                                $.confirm({
                                    title: 'Send For Payment',
                                    content: 'Are you sure you want to Send Payment?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                    buttons: {
                                        yes: function() {
                                            $.post("<?php echo base_url() .  'patient/save_billing'; ?>", formData).done(function(data) {
                                            });
                                            ///Close Big Dialog
                                            a.close();
                                            ///Refresh Prescription Table
                                        filter_prescriptions()
                                        },
                                        no: function() {

                                        }
                                    }
                                });
                            } else {
                                $("#amt_error").text('Total must greater than zero (0)')

                                return false
                            }

                            }
                            else {
                                $.confirm({
                                    title: 'Send For Payment',
                                    content: 'Are you sure you want to Send Payment?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                    buttons: {
                                        yes: function() {
                                            $.post("<?php echo base_url() .  'patient/save_billing'; ?>", formData).done(function(data) {
                                            });
                                            ///Close Big Dialog
                                            a.close();
                                            ///Refresh Prescription Table
                                        filter_prescriptions()
                                        },
                                        no: function() {

                                        }
                                    }
                                });

                            }

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
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {

                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
  }
  //end of dialog if..else

}

</script>