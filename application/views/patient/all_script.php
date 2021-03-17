<script type="text/javascript">
get_pres_lab();
//console.log($("input[name='patient_id']").value());

   $(document).ready(function() {


        var table = $('#example_prescription_filter').DataTable({
            dom: 'lrtip',
            'lengthChange': false
        });
        if ($('#example_wrapper').is(':visible')) {
            $('#example_wrapper').hide();
        }
        //$('#example_wrapper').hide();


        $('#mySearch').keyup(function() {

            if (document.getElementById('mySearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#example_wrapper').show();
                table.search($(this).val()).draw();
            } else {
                $('#example_wrapper').hide();

            }
        });

    });
    
function listDefaultConsultationByPatient() {
    var patient_id = document.getElementById('patient_id2').value;
    var vital_id = document.getElementById('vital_id').value;
    //console.log(patient_id+vital_id);
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('patient/get_consultation_by_vital_id'); ?>',
      data: {
          //status: status,
          patient_id: patient_id,
          vital_id: vital_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
      // console.log(response)
        var html = '';
        var i;
        var sn =1;
       for(i=0; i<response.length; i++){



            if (response[i].vital_id != null) {
              var fullname = response[i].staff_firstname + ' ' + response[i].staff_lastname;
            } else {
              var fullname = "";
            }


            //  '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="prescription_dialog(event)" data-type="black" data-size="l" data-title="Prescription Test for '+response[i].patient_name+'" href="<?php //echo base_url('patient/edit_prescription/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i> </button>'+' '+
               var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="consultation_dialog(event)" data-type="black" data-size="l" data-title="Edit Consultation for '+response[i].patient_name+'" href="<?php echo base_url('patient/edit_consultation/'); ?>' +response[i].con_id +'"><i class="fa fa-pencil"></i></button> '+
               '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View Consultation" href="<?php echo base_url('patient/view_consultation/'); ?>' +response[i].con_id +'"><i class="fa fa-eye"></i></button> '+
                '<button class="btn btn-dark" type="button" onclick="delete_consultation('+response[i].con_id +')"><i class="fa fa-trash"></i></button>'

            html += '<tr><td>' + sn++ + '</td> <td>' + response[i].date_added +
              '</td> <td>' + fullname +
              '</td> <td>' + response[i].complaint +
              '</td> <td>' + response[i].assignment +
              '</td> <td>' + response[i].investigation.substring(1, 15)+'...' +
              '</td><td>' + response[i].treatment.substring(1, 15)+'...' +
              '</td><td>' + buttons + '</td> </tr>';
         }
          $('#consultationList').html(html);
        }

      });

    }   

    /////Delete

function delete_consultation(rowIndex) {
	$.confirm({
                    title: 'Delete Consultation',
                    content: 'Are you sure you want to delete Consultation?',
                    icon: 'fa fa-check-circle',
                    type: 'red',
                    buttons: {
                        yes: function() {
							$.post("<?php echo base_url() . 'patient/delete_consultation'; ?>", {
								id: rowIndex
							}).done(function(data) {
								listDefaultConsultationByPatient();
							});
                        },
                        no: function() {

                        }
                    }
                });
  }
  ////// 
function listDefaultPrescriptionByPatient() {
    var patient_id = document.getElementById('patient_id2').value;
    var vital_id = document.getElementById('vital_id').value;
    //console.log(patient_id+vital_id);
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('patient/get_prescription_by_vital_id'); ?>',
      data: {
          //status: status,
          patient_id: patient_id,
          vital_id: vital_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
      //console.log(response)
        var html = '';
        var i;
        var sn =1;
       for(i=0; i<response.length; i++){

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

               var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription2/'); ?>' + response[i].prescription_unique_id+ '">  <i class="fa fa-eye"></i></button>'+' '+
                '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id+ ')"> <i class="fa fa-trash"></i></button>'

            html += '<tr id="'+ response[i].prescription_unique_id +'"><td>' + sn++ + '</td> <td>' + response[i].prescription_date +
              '</td> <td>' + status +
              '</td><td>' + buttons + '</td> </tr>';
         }
          $('#prescriptionsList').html(html);
        }

      });

    }
  ////// 
function listDefaultPrescriptionByPatient2() {
    var patient_id = document.getElementById('patient_id2').value;
    var vital_id = document.getElementById('vital_id').value;
    //console.log(patient_id+vital_id);
      $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('patient/get_prescription_by_vital_id'); ?>',
      data: {
          //status: status,
          patient_id: patient_id,
          vital_id: vital_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
      //console.log(response)
        var html = '';
        var i;
        var sn =1;
       for(i=0; i<response.length; i++){

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

               var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for '+response[i].patient_name+'" href="<?php echo base_url('patient/view_prescription2/'); ?>' + response[i].prescription_unique_id+ '">  <i class="fa fa-eye"></i></button>'+' '+
                '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id+ ')"> <i class="fa fa-trash"></i></button>'

            html += '<tr id="'+ response[i].prescription_unique_id +'"><td>' + sn++ + '</td> <td>' + response[i].prescription_date +
              '</td> <td>' + status +
              '</td><td>' + buttons + '</td> </tr>';
         }
          $('#prescriptionsList3').html(html);
        }

      });

    }

  //////
  function consultation_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');

////
   var consultationDialog = $.confirm({
        title: 'Prompt!',
        columnClass:'col-md-12',
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

            consultationSubmit: {
                text: "Add Consultation",
                btnClass: "btn-dark",
                action: function () {

                  var confirmsir = "No"
                  


                          ////
                            var formData = $('#send-payment').serialize();
                            var amount = $("#main_amount").val()

                            this.buttons.consultationSubmit.setText('Saving Consultation....');

            					var formData = $('#add-consultation').serialize();
                                $.confirm({
                                    title: 'Save Consultation',
                                    content: 'Are you sure you want to save Consultation?',
                                    icon: 'fa fa-check-circle',
                                    type: 'green',
                                    buttons: {
                                        yes: function() {
                                            $.post("<?php echo base_url() .  'patient/save_consultation'; ?>", formData).done(function(data) {
                                            });
                                            ///Close Big Dialog

											listDefaultConsultationByPatient();
                                            consultationDialog.close();
                                            ///Refresh Prescription Table
                                        },
                                        no: function() {

                                        }
                                    }
                                });

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


//////
  function prescription_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');

////
   var prescriptionDialog = $.confirm({
        title: title,
        columnClass:'col-md-12',
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

            prescriptionSubmit: {
                text: "Add Prescription",
                btnClass: "btn-blue",
                action: function () {

                  var confirmsir = "No"

                          ////
                            
            				var formData = $('#add-prescription').serialize();
                            ///
                            var returnData;
                            ///
                         	validate(formData);

                                function validate(formData) {
								        $.ajax({
								            url: "<?php echo base_url() . 'patient/validate_prescription'; ?>",
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
			                                    title: 'Save Prescription',
			                                    content: 'Are you sure you want to save Prescription?',
			                                    icon: 'fa fa-check-circle',
			                                    type: 'green',
			                                    buttons: {
			                                        yes: function() {

											        $.post("<?php echo base_url() . 'patient/save_prescription'; ?>", formData).done(function(data) {
											        	listDefaultPrescriptionByPatient();
											        	get_pres_lab()
			                 							prescriptionDialog.close();

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
//////
// $( document ).ready(function() {
    function get_pres_lab() {
    var vital_id = $("input[name=vital_id]").val();
    var patient_id = $("input[name=patient_id]").val();
    //console.log(patient_id);
       $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('patient/get_prescription_by_vital_id'); ?>',
      data: {
          //status: status,
          patient_id: patient_id,
          vital_id: vital_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        //console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){

            html += response[i].drug_item_name+' - '+response[i].prescription
            //console.log(html);

          }
          $('textarea#treatment').val(html);
        }

      });
    }


    var _row = null;
    $(document).ready(function() {
        var eventFired = function(type) {
            var n = $('#demo_info')[0];
        }

        $('#example_prescription')
            .on('order.dt', function() {
                eventFired('Order');
            })
            .on('search.dt', function() {
                eventFired('Search');
            })
            .on('page.dt', function() {
                eventFired('Page');
            })
            .DataTable();
    });

    function testAdd(ctl, id) {
        _row = $(ctl).parents("tr");
        var cols = _row.children("td");
        $("#items_prescription").append("<input type='hidden' name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");

        $("#testTable_prescription tbody").append("<tr>" +
            "<td>" + $(cols[1]).text() + "</td>" +
            "<td width='25%'>" + $(cols[2]).text() + "</td>" +
            "<td width='25%'>" + $(cols[3]).text() + "</td>" +
            "<td width='25%'><span class='text-success'>" + $(cols[4]).text() + "</span></td>" +
            "<td width='10%'><button type='button' onclick='testDelete_prescription(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
            "</tr>");
    }

    function testDelete_prescription(ctl, id) {
        $("#test_prescription" + id + "").remove();
        $(ctl).parents("tr").remove();
    }
    //////
    /////Popup for prescription


    function add_prescription(condi, id) {

            $('#example_wrapper').hide();
            //document.getElementById('mySearch').value('');

        _row = $(condi).parents("tr");
        var cols = _row.children("td");

        //console.log(cols)
        event.preventDefault();
        /*var element = $(event.target).is('a') ? $(event.target) : $(event.target).parents('a');*/
        var element = $(event.currentTarget);
        var title = $(cols[0]).text();
        // var retainer_id = element.data('retainer');
        // var item_id = element.data('item1');
        // var item_type_id = element.data('item2');
        $.confirm({
            title: title,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>My Prescription</label>' +
                '<input type="text" placeholder="Prescription" class="price form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var price = this.$content.find('.price').val();
                        if (!price) {
                            $.alert('Enter Prescription');
                            return false;
                        }

                        //$.alert('Your name is ' + price);

                        $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#testTable_prescription tbody").append("<tr>" +
                            "<td width='25%'>" + $(cols[0]).text() + "</td>" +
                            "<td width='25%'>" + price + "</td>" +
                            "<td width='10%'><button type='button' onclick='testDelete_prescription(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                            "</tr>");







                    }
                },
                cancel: function() {
                    //close
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }
///////


    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-prescription').disable([".action"]);
        $("button[title='prescription']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_prescription'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-prescription').enable([".action"]);
        $("button[title='add_prescription']").html("Save changes");
        if (returnData != 'success') {
            $('#add-prescription').enable([".action"]);
            $("button[title='add_prescription']").html("Save changes");
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

    function save_prescription_test(formData) {
        $("button[title='add_prescription']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_prescription'; ?>", formData).done(function(data) {
            //console.log(data);

            ///List all prescriptions in Prescription Tab

           // listDefaultPrescriptionByPatient(); 
           jesus.close();

            //window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
            $("button[title='add_prescription']").html("Prescription Added");
        });
    }

    function form_routes_prescription(action) {
        if (action == 'add_prescription') {
            var formData = $('#add-prescription').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add Prescription Test',
                    content: 'Are you sure you want to add new Prescription Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_prescription_test(formData);

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

    function delete_prescription(rowIndex) {
        $('#rowIndex').remove();
        $.confirm({
            title: 'Delete Prescription Test',
            content: 'Are you sure you want to delete Prescription Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_prescription_test'; ?>", {
                        id: rowIndex
                    }).done(function(data) {

                    	listDefaultPrescriptionByPatient();
                        //location.reload();
                    });
                },
                no: function() {

                }
            }
        });
    }


</script>