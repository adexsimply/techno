<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

listDefaultPatients(); 

listDefaultAdmissionRequests(); 

$('#employeeListing').DataTable({
"oLanguage": {
        "sEmptyTable": "There are no Patients at the moment"
    }


});

$('#admissionRequestTable').DataTable({
"oLanguage": {
        "sEmptyTable": "There are no requests at the moment"
    }


});
/////
var wardTable =  $('#wardTable').DataTable({
        });

function listDefaultPatients() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('nursing/get_default_vitals'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
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
            if (response[i].vital_id) {
              var buttons = '<span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#EditVital' + response[i].vital_id + '" style="cursor: pointer;">Edit Vitals</span>' +
                '<span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#ViewVital' + response[i].vital_id + '" style="cursor: pointer;">View Vitals</span>' +
                '<span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(' + response[i].vital_id + ')" style="cursor: pointer;">Delete Vitals</span>';
            } else {
              var buttons = '<button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for " href="<?php echo base_url('nursing/take_vital/'); ?>' + response[i].app_id + '"><i class="icon wb-plus" aria-hidden="true"></i> Take Vitals </button>';
            }

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].appointment_date +
              '</td> <td>' + response[i].appointment_time +
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              '</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filtered_vitals').html(html);
        }

      });

    }


function listDefaultAdmissionRequests() {
      $.ajax({
      type  : 'ajax',
      url   : '<?php echo base_url('nursing/get_default_admission_requests'); ?>',
      async : false,
      dataType : 'json',
      success : function(response){
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){


            var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
            var buttons = '<span class="badge badge-success"><a onclick="admit_dialog(event)" data-type="black" data-size="l" data-title="Admission Register" href="<?php echo base_url('nursing/admit_patient/');?>'+ response[i].admission_id +'">Option</a></span>';

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].request_date +
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filtered_admission_requests').html(html);
        }

      });

    }


});

  // $('input[name="dates"]').daterangepicker({
  //   autoUpdateInput: false
  // });
  // $('yourinput').daterangepicker({
  //   autoUpdateInput: false
  // }
  function delete_vital_now(rowIndex) {
    swal({
        title: "Are you sure want to delete this Vital?",
        text: "Deleted Vital can not be restored!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancel",
        confirmButtonText: "Proceed",
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          console.log(rowIndex)
          $.post("<?php echo base_url() . 'nursing/delete_vital'; ?>", {
            id: rowIndex
          }).done(function(data) {
            location.reload();
          });

        }
      })
  }

  ////////

  ////// Dialog for Adding New Ward
  function ward_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var size = element.data('size');

////
   var wardDialog = $.confirm({
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

            laboratorySubmit: {
                text: "Save",
                btnClass: "btn-dark",
                action: function () {

                  var confirmsir = "No"

                                    ////Validate form fields
                                    var formData = $('#add-ward').serialize();
                                      ///
                                      var returnData;
                                      ///
                                    validate(formData);

                                  function validate(formData) {
                                  
                                  $.ajax({
                                      url: "<?php echo base_url() . 'nursing/validate_ward'; ?>",
                                      async: false,
                                      type: 'POST',
                                      data: formData,
                                      success: function(data, textStatus, jqXHR) {
                                          returnData = data;
                                      }
                                  });

                                    // $('#add-prescription').enable([".action"]);
                                    // $("button[title='add_prescription']").html("Save changes");
                                    if (returnData != 'success') {
                                        // $('#add-prescription').enable([".action"]);
                                        // $("button[title='add_prescription']").html("Save changes");
                                        $('.form-control-feedback').html('');
                                        $('.form-control-feedback').each(function() {
                                            for (var key in returnData) {
                                                if ($(this).attr('data-field') == key) {
                                                    $(this).html(returnData[key]);
                                                }
                                            }
                                        });
                                    } else {
                                        return 'success';
                                    }
                                    //console.log(returnData);
                                }

                                if (returnData != 'success') {
                                      return false;
                                }
                                else {

                                      $.confirm({
                                          title: 'Ward',
                                          content: 'Are you sure you want to Proceed?',
                                          icon: 'fa fa-check-circle',
                                          type: 'green',
                                          buttons: {
                                              yes: function() {

                                                $.post("<?php echo base_url() . 'nursing/save_ward'; ?>", formData).done(function(data) {
                                                  wardDialog.close();

                                                });
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

  ////////

  ////// Dialog for Adding New Ward
  function admit_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var size = element.data('size');

////
   var admitDialog = $.confirm({
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

            admitSubmit: {
                text: "Save",
                btnClass: "btn-success",
                action: function () {

                  var confirmsir = "No"

                                    ////Validate form fields
                                    var formData = $('#admit-patient').serialize();
                                      ///
                                      var returnData;
                                      ///
                                    validate(formData);

                                  function validate(formData) {
                                  
                                  $.ajax({
                                      url: "<?php echo base_url() . 'nursing/validate_admit'; ?>",
                                      async: false,
                                      type: 'POST',
                                      data: formData,
                                      success: function(data, textStatus, jqXHR) {
                                          returnData = data;
                                      }
                                  });

                                    // $('#add-prescription').enable([".action"]);
                                    // $("button[title='add_prescription']").html("Save changes");
                                    if (returnData != 'success') {
                                        // $('#add-prescription').enable([".action"]);
                                        // $("button[title='add_prescription']").html("Save changes");
                                        $('.form-control-feedback').html('');
                                        $('.form-control-feedback').each(function() {
                                            for (var key in returnData) {
                                                if ($(this).attr('data-field') == key) {
                                                    $(this).html(returnData[key]);
                                                }
                                            }
                                        });
                                    } else {
                                        return 'success';
                                    }
                                    //console.log(returnData);
                                }

                                if (returnData != 'success') {
                                      return false;
                                }
                                else {

                                      $.confirm({
                                          title: 'Admission',
                                          content: 'Are you sure you want to Proceed?',
                                          icon: 'fa fa-check-circle',
                                          type: 'green',
                                          buttons: {
                                              yes: function() {

                                                $.post("<?php echo base_url() . 'nursing/save_admit'; ?>", formData).done(function(data) {
                                                  admitDialog.close();

                                                });
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

  ////// Dialog for Adding New Ward
  function discharge_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var size = element.data('size');

////
   var admitDialog = $.confirm({
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

            admitSubmit: {
                text: "Save",
                btnClass: "btn-success",
                action: function () {

                  var confirmsir = "No"

                                    ////Validate form fields
                                    var formData = $('#discharge-patient').serialize();
                                      ///
                                      var returnData;
                                      ///
                                    validate(formData);

                                  function validate(formData) {
                                  
                                  $.ajax({
                                      url: "<?php echo base_url() . 'nursing/validate_discharge'; ?>",
                                      async: false,
                                      type: 'POST',
                                      data: formData,
                                      success: function(data, textStatus, jqXHR) {
                                          returnData = data;
                                      }
                                  });

                                    // $('#add-prescription').enable([".action"]);
                                    // $("button[title='add_prescription']").html("Save changes");
                                    if (returnData != 'success') {
                                        // $('#add-prescription').enable([".action"]);
                                        // $("button[title='add_prescription']").html("Save changes");
                                        $('.form-control-feedback').html('');
                                        $('.form-control-feedback').each(function() {
                                            for (var key in returnData) {
                                                if ($(this).attr('data-field') == key) {
                                                    $(this).html(returnData[key]);
                                                }
                                            }
                                        });
                                    } else {
                                        return 'success';
                                    }
                                    //console.log(returnData);
                                }

                                if (returnData != 'success') {
                                      return false;
                                }
                                else {

                                      $.confirm({
                                          title: 'Admission',
                                          content: 'Are you sure you want to Proceed?',
                                          icon: 'fa fa-check-circle',
                                          type: 'green',
                                          buttons: {
                                              yes: function() {

                                                $.post("<?php echo base_url() . 'nursing/save_discharge'; ?>", formData).done(function(data) {
                                                  admitDialog.close();

                                                });
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

////////////////

  function toggleRadio(flag) {
    if (!flag) {
      document.getElementById('patient_status').setAttribute("disabled", "true");
    } else {
      document.getElementById('patient_status').removeAttribute("disabled");
      document.getElementById('patient_status').focus();
    }

  }

  function togglenhis() {
    var nhis = document.getElementById("nhis");
    if (nhis.checked == true) {
      document.getElementById('enrollee_type').removeAttribute("disabled");
      document.getElementById('enrollee_no').removeAttribute("disabled");
      document.getElementById('company').removeAttribute("disabled");
      document.getElementById('enrollee_type').focus();
    } else {
      document.getElementById('enrollee_type').setAttribute("disabled", "true");
      document.getElementById('enrollee_no').setAttribute("disabled", "true");
      document.getElementById('company').setAttribute("disabled", "true");
    }

  }

  $(document).ready(function() {
    $("#add-appointment").submit(function(e) {
      e.preventDefault();
      var formData = new FormData($("#add-appointment")[0]);

      $.ajax({
        url: $("#add-appointment").attr('action'),
        dataType: 'json',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(resp) {
          // console.log(resp);
          $('.error').html('');
          if (resp.status == false) {
            $.each(resp.message, function(i, m) {
              $('.' + i).text(m);
            });
          } else {
            swal({
                title: "Done",
                text: "Appointment has been added",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Cancel",
                confirmButtonText: "Save",
                closeOnConfirm: true
              },
              function(isConfirm) {
                if (isConfirm) {
                  window.location = "<?php echo base_url('appointment'); ?>";

                }
              }
            );


          }
        }
      });
    });
  });


  ///This clears textbox on modal toggle
  function clear_textbox() {
    $('input[type=text]').each(function() {
      $(this).val('');
    });
  }


  function filter_vitals() {
    $('#employeeListing').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#employeeListing').dataTable().fnDraw();
    $('#employeeListing').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
    var status = document.getElementById('status').value;
   // var doctor_id = document.getElementById('doctor_id').value;
    var clinic_id = document.getElementById('clinic_id').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;
    console.log(date_range_to);

    listPatients();

    //$('#filteredPatients').show();
    var table = $('#employeeListing').DataTable()    


    // list all employee in datatable
    function listPatients() {

      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('nursing/filter_appointment'); ?>',
      data: {
          status: status,
          //doctor_id: doctor_id,
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
            if (response[i].vital_id) {
              var buttons = '<span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#EditVital' + response[i].vital_id + '" style="cursor: pointer;">Edit Vitals</span>' +
                '<span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#ViewVital' + response[i].vital_id + '" style="cursor: pointer;">View Vitals</span>' +
                '<span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(' + response[i].vital_id + ')" style="cursor: pointer;">Delete Vitals</span>';
            } else {
              var buttons = '<button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for " href="<?php echo base_url('nursing/take_vital/'); ?>' + response[i].app_id + '"><i class="icon wb-plus" aria-hidden="true"></i> Take Vitals </button>';
            }

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].appointment_date +
              '</td> <td>' + response[i].appointment_time +
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_status +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              '</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filtered_vitals').html(html);
        }

      });
    }


  }



  function filter_admission() {
    $('#admissionRequestTable').dataTable().fnClearTable();
    //dataTable.fnClearTable();
    $('#admissionRequestTable').dataTable().fnDraw();
    $('#admissionRequestTable').dataTable().fnDestroy();
    //$('#defaultPatients').hide();
    var status = document.getElementById('status').value;
   // var doctor_id = document.getElementById('doctor_id').value;
   // var clinic_id = document.getElementById('clinic_id').value;
    var date_range_to = document.getElementById('date_range_to').value;
    var date_range_from = document.getElementById('date_range_from').value;

    listAdmissionRequests();

    //$('#filteredPatients').show();
    var table = $('#admissionRequestTable').DataTable()  
    var table2 = $('#admissionRequestTableOA').DataTable()    


    // list all employee in datatable
    function listAdmissionRequests() {

      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('nursing/filter_admission_requests'); ?>',
      data: {
          status: status,
          date_range_from: date_range_from,
          date_range_to: date_range_to,
         // clinic_id: clinic_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        console.log(response);
        var html = '';
        var i;
        var sn =1;
        if (status == 'Pending') {

            $('#pend').show();
            $('#OA').hide();

            for(i=0; i<response.length; i++){


                var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
                var buttons = '<span class="badge badge-success"><a onclick="admit_dialog(event)" data-type="black" data-size="l" data-title="Admission Register" href="<?php echo base_url('nursing/admit_patient/');?>'+ response[i].admission_id +'">Option</a></span>';

                html += '<tr><td>' + sn++ + '</td> <td>' + response[i].request_date +
                  '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
                  '</td> <td>' + response[i].patient_gender +
                  '</td> <td>' + response[i].patient_id_num +
                  '</td> <td>' + response[i].patient_status +
                  '</td> <td>' + response[i].clinic_name +
                  '</td><td>' + fullname +
                  '</td><td>' + buttons + '</td> </tr>';
              }
              $('#filtered_admission_requests').html(html);
          }
          else {
            $('#OA').show();
            $('#pend').hide();

            for(i=0; i<response.length; i++){
                if (response[i].discharged == null) { var discharged = '-' } else {var discharged = response[i].discharged } 

                var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
                var buttons = '<span class="badge badge-success"><a onclick="admit_dialog(event)" data-type="black" data-size="l" data-title="Admission Register" href="<?php echo base_url('nursing/admit_patient/');?>'+ response[i].admission_id +'">Option</a></span><span class="badge badge-info"><a onclick="discharge_dialog(event)" data-type="black" data-size="l" data-title="Discharge Patient" href="<?php echo base_url('nursing/discharge_patient/');?>'+ response[i].admission_id +'"><i class="fa fa-wheelchair"></i>Discharge</a></span>';

                html += '<tr><td>' + sn++ + '</td> <td>' + response[i].date_admitted +
                  '</td> <td>' + discharged +
                  '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
                  '</td> <td>' + response[i].patient_id_num +
                  '</td> <td>' + response[i].patient_status +
                  '</td> <td>' + response[i].ward_name +
                  '</td><td>' + response[i].diagnosis +
                  '</td><td>' + buttons + '</td> </tr>';
              }
              $('#filtered_admission_requestsOA').html(html);
          }

        }

      });
    }


  }

  function validate(formData) {
    var returnData;
    $('#edit-vital').disable([".action"]);
    $("button[title='edit_vital']").html("Validating data, please wait...");
    $.ajax({
      url: "<?php echo base_url() . 'nursing/validate_new'; ?>",
      async: false,
      type: 'POST',
      enctype: 'multipart/form-data',
      data: formData,
      success: function(data, textStatus, jqXHR) {
        console.log(data);
        returnData = data;
      }
    });



    $('#edit-vital').enable([".action"]);
    $("button[title='edit_vital']").html("Update vital");
    if (returnData != 'success') {
      $('#edit-vital').enable([".action"]);
      $("button[title='edit_vital']").html("Update vital");
      $('.form-control-feedback').html('');
      $('.form-control-feedback').each(function() {
        for (var key in returnData) {
          if ($(this).attr('data-field') == key) {
            $(this).html(returnData[key]);
          }
        }
      });
    } else {
      return 'success';
    }
  }

  function save_vital_name(formData) {
    $("button[title='edit_vital']").html("Saving data, please wait...");
    $.post("<?php echo base_url() . 'nursing/add_vital'; ?>", formData).done(function(data) {

      window.location = "<?php echo base_url('nursing/vitals'); ?>";
    });
  }

  function form_routes_vital(action) {
    if (action == 'edit_vital') {
      var formData = $('#edit-vital').serialize();
      console.log(formData)
      if (validate(formData) == 'success') {
        $.confirm({
          title: 'Update Vital',
          content: 'Are you sure you want to Update vital?',
          icon: 'fa fa-check-circle',
          type: 'green',
          buttons: {
            yes: function() {
              save_vital_name(formData);
            },
            no: function() {

            }
          }
        });
      }
    } else {
      cancel();
    }
  }
</script>