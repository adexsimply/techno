<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
  $('input[name="dates"]').daterangepicker({
    autoUpdateInput: false
  });
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

  $(function() {
    function log(message) {
      $("<div>").text(message).prependTo("#log");
      $("#log").scrollTop(0);
    }

    $("#city").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "<?php echo base_url('appointment/get_patient_list'); ?>",
          type: 'post',
          dataType: "json",
          data: {
            q: request.term,
            request: 1
          },
          success: function(data) {
            response(data);
            // console.log(data);
          }
        });
      },
      minLength: 1,
      select: function(event, ui) {
        $(this).val(ui.item.label)
        var userid = ui.item.id; // selected id to input

        // AJAX
        $.ajax({
          url: '<?php echo base_url('appointment/get_patient_list2'); ?>',
          type: 'post',
          data: {
            userid: userid,
            request: 2
          },
          dataType: 'json',
          success: function(response2) {
            console.log(response2);

            var len = response2.length;

            if (len > 0) {
              var id = userid;
              var name = response2[0]['name'];
              var email = response2[0]['email'];
              var patient_id = response2[0]['id'];
              // var age = response[0]['age'];
              // var salary = response[0]['salary'];

              document.getElementById('patient_id').value = patient_id;
              //document.getElementById('age_'+index).value = age;
              document.getElementById('email').value = email;
              //document.getElementById('salary_'+index).value = salary;

            }

          }
        });

        return false;
      },
      open: function() {
        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
      },
      close: function() {
        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
      }
    });
  });




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
    var status = document.getElementById('status').value;
    var doctor_id = document.getElementById('doctor_id').value;
    var clinic_id = document.getElementById('clinic_id').value;
    var date_range = document.getElementById('date_range').value;
    console.log(date_range);
    listPatients();
    // var table = $('#employeeListing').dataTable({     
    //   "bPaginate": true,
    //   "bInfo": true,
    //   "bFilter": true,
    //   "bLengthChange": true,
    //   "pageLength": 10   
    // }); 


    // list all employee in datatable
    function listPatients() {
      $.ajax({
        url: '<?php echo base_url('nursing/filter_appointment'); ?>',
        type: 'post',
        data: {
          status: status,
          doctor_id: doctor_id,
          clinic_id: clinic_id,
          date_range: date_range
        },
        dataType: 'json',
        success: function(response) {
          console.log(response);
          var html = '';
          var sn = 1;
          var i;
          for (i = 0; i < response.length; i++) {

            //           $.ajax({
            //   url: "<?php echo base_url('user/get_student_details3'); ?>",
            //   type: "get", //send it through get method
            //   data: { 
            //     student_id: response[i].user_id, 
            //   },
            //   success: function(response2) {
            //     console.log(response2)
            //   },
            //   error: function(xhr) {
            //     console.log(xhr);
            //     //Do Something to handle error
            //   }

            // });
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
              '</td> <td>' + response[i].patient_title + ' ' + response[i].patient_name +
              '</td> <td>' + response[i].patient_gender +
              '</td> <td>' + response[i].patient_id_num +
              '</td> <td>' + response[i].patient_name +
              '</td> <td>' + response[i].clinic_name +
              '</td><td>' + fullname +
              '</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
          }
          $('#filterd_vitals').html(html);
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