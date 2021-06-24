<style type="text/css">
    .selected {
    background-color: brown;
    color: #FFF;
}
</style>
<div class="col-12">
	<div class="card box-margin">
        <div class="card-body">

            <form id="add-appointment1">   
    				<div class="modal-body edit-doc-profile">
                        <div class="row clearfix col-12" >
                            <div class="col-lg-3 col-md-6 mb-3">
                                <b>Find Patient...</b>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_patient" id="mySearch" placeholder="Enter Patient Name...">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <b>Appointment Date</b>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Enter Remark">
                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="appointment_date"></code>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <b>Appointment Time</b>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="appointment_time" name="appointment_time" placeholder="Enter Remark">
                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="appointment_time"></code>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-3">
                                <b>Clinic</b>
                                <div class="input-group">
                                    <select class="form-control" name="clinic" id="clinic">
                                        <option value="">Select Clinic</option>
                                        <?php foreach ($clinic_list as $clinic) { ?>
                                            <option value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="clinic"></code>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 mb-3">
                                <div class="input-group" style="margin-top: 15px;">
                                    <button type="button" class="btn btn-primary px-4 m-2" title="add_appointment1" onclick="form_routes_appointment('add_appointment1')" data-dismiss="modal">Send</button>
                                </div>
                            </div>
                        </div>


                    <!--         <div class="box">
                                <div class="box-body">
                                    <form>
                                        <div class="col-md-12">
                                            <div class="row text-center">
                                                <div class="col-md-4 offset-md-4">
                                                    <input type="text" class="form-control" name="search_patient" id="mySearch" style="height: 40px; border: 2px solid; border-radius: 5px; font-size:20px; text-align:center" placeholder="Enter Patient Name">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
    						<div class="form-group col-12" style="height: 300px; border: 1px solid grey;">
                                   <div class="dataTables_wrapper no-footer" id="patientForAppointment">
                                            <style type="text/css">
                                                #js-exportable3 td, #js-exportable3 th {
                                                     padding: .2rem; 
                                                }
                                                #js-exportable3 td {
                                                    padding: .2rem;

                                                }
                                            </style>                            
                                        <div class="tab-content m-t-10 padding-0" style="max-height: 280px; overflow: scroll;">
                                            <div class="tab-pane table-responsive active show" id="All">
                                       			 <table class="table" id="js-exportable3" style="font-size: 13px;">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th class="patient_idtd">w</th>
                                                            <th style="width: 1%;">S/N</th>
                                                            <th>Title</th>
                                                            <th>Hosp No.</th>
                                                            <th>Name</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Acc&nbsp;Status</th>
                                                            <th>Contact</th>
                                                            <th>Select</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $i=1;
                                                         foreach ($patients_list as $patient_list) { 
                                                            ?>
                                                        <tr>
                                                            <td class="patient_idtd"><?php echo $patient_list->p_id; ?></td>
                                                        	<td style="width: 1%;"><?php echo $i; ?></td>
                                                            <td><?php echo $patient_list->title; ?></td>
                                                            <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                                            <td><?php echo $patient_list->patient_name; ?></td>
                                                            <td><?php echo date_diff(date_create($patient_list->patient_dob ), date_create('today'))->y; ?></td>
                                                            <td><?php echo $patient_list->patient_gender; ?></td>
                                                            <td><?php echo $patient_list->patient_status ?></td>
                                                            <td><?php echo $patient_list->patient_phone; ?></td>
                                                            <td>
                                                             <!--  <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Create Appointment for <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('appointment/new_appointment2/'.$patient_list->p_id); ?>"><i class="icon-pencil" aria-hidden="true"></i>Create Appointment</button> -->


                                                              <input type="radio" id="select_patient<?php echo $patient_list->p_id; ?>" value="<?php echo $patient_list->p_id; ?>" name="select_patient">
                                                            </td>
                                                        </tr>
                                                           <?php 
                                                           $i++;
                                                       } ?>
                                                    </tbody>
                                                </table>                            
                                            </div>
                                        </div>
                                </div>
    						</div>
    				</div>
                </form>
			</div>
		</div>
	</div>
<script type="text/javascript">
    $(document).ready(function() {
      $(".patient_idtd").hide();

        var today = '<?php echo date('Y-m-d'); ?>';
        var current_time = '<?php echo date('H:m'); ?>';
            $('#appointment_date').val(today);
            $('#appointment_time').val(current_time);


        var tableNow = $('#js-exportable3').DataTable({     
            "bLengthChange": false,
            "ordering": false,
            dom: 'lrtip'
        });
        if ($('#patientForAppointment').is(':visible')) {
            $('#patientForAppointment').hide();
        }
        //$('#example_wrapper').hide();


        $('#mySearch').keyup(function() {

            if (document.getElementById('mySearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#patientForAppointment').show();
                tableNow.search($(this).val()).draw();
            } else {
                $('#patientForAppointment').hide();

            }
        });

    });

    //Select Table    
    $("#js-exportable3 tr").click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');    
       var value=$(this).find('td:first').html();
       $("#select_patient"+value).prop("checked", true);
       //alert(value);    
    });

	$(function () {
    $('#js-basic-example').DataTable();

    //Exportable table
    $('#js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});


/////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-appointment1').disable([".action"]);
        $("button[title='add_appointment1']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'appointment/validate_new'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                returnData = data;
            }
        });



        $('#add-appointment1').enable([".action"]);
        $("button[title='add_appointment1']").html("Confirm");
        if (returnData != 'success') {
            $('#add-appointment').enable([".action"]);
            $("button[title='add_appointment1']").html("Confirm");
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

    function save_appointment_name(formData) {
        $("button[title='add_appointment1']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'appointment/add_appointment'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment'); ?>";
        });
    }

    function form_routes_appointment(action) {
        if (action == 'add_appointment1') {
            var formData = $('#add-appointment1').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Create Appointment',
                    content: 'Are you sure you want to this?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_appointment_name(formData);
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
    //////////////Add session form ends

// $(document).ready(function(){
//         $("#search_patient").keyup(function(){
//             var name = $("#search_patient").val();
//             if(name == ''){
//                 $("#result").html('');
//             }else{
//                 $.ajax({
//                     type: "POST",
//                     url: "<?php echo base_url() . 'appointment/search_appointment'; ?>",
//                     data: {
//                         name: name
//                     },
//                     success: function(data) {
//                         console.log(data)
//                         $("#result").html(data).show()
//                     }
//                 })
//             }
//         })
//     })
</script>

<?php //$this->load->view('includes/footer_2'); ?>