<style type="text/css">
    .selected {
    background-color: brown;
    color: #FFF;
}
</style>
<form id="admit-patient">	
	<div class="modal-body edit-doc-profile">	
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6">
                    <b>Date</b>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                        </div>
                        <input type="date" id="admit_date" name="admit_date" class="form-control date" placeholder="Ex: 30/07/2016">
                        <input type="text" hidden name="admission_id" <?php if ($this->uri->segment(3)) { ?> value="<?php echo $admission_details->admission_id; ?>" <?php } ?>>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <b>Name</b>
                    <div class="input-group mb-3">
                        <input type="text" id="patient_name" <?php if ($this->uri->segment(3)) { ?> value="<?php echo $admission_details->patient_name; ?>" <?php } ?> disabled="" class="form-control time12" disabled="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <b>Clinic</b>
                    <div class="input-group mb-3">
						<select class="form-control" name="clinic" id="clinic">
							<option value="">Select Clinic</option>
							<?php foreach($clinic_list as $clinic) { ?>
							<option <?php if ($this->uri->segment(3)) { if ($admission_details->clinic_id == $clinic->id) { ?> selected <?php } }?> value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
							<?php } ?>
						</select>
                    </div>
                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="clinic"></code>
                </div>
                <div class="col-lg-6 col-md-6">
                    <b>Ward</b>
                    <div class="input-group mb-3">
						<select class="form-control" name="ward" id="ward">
							<option value="">Select Ward</option>
							<?php foreach($available_wards as $available_ward) { ?>
							<option value="<?php echo $available_ward->id; ?>"><?php echo $available_ward->ward_name; ?></option>
							<?php } ?>
						</select>
                    </div>
                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="ward"></code>
                </div>
                <div class="col-lg-12 col-md-6">
                    <b>Diagnosis</b>
                    <div class="input-group mb-3">
						<textarea name="diagnosis" class="form-control"><?php if ($this->uri->segment(3)) { echo $admission_details->diagnosis; } ?></textarea>
                    </div>
                </div>
            </div>


            <?php if (!$this->uri->segment(3)) { ?>
            <div class="col-lg-12 col-md-6 mb-3">
                <b>Find Patient...</b>
                <div class="input-group">
                    <input type="text" class="form-control" name="search_patient" id="mySearch" placeholder="Enter Patient Name...">
                </div>
            </div>
            <div class="form-group col-12" style="height: 300px; border: 1px solid grey;">
                   <div class="dataTables_wrapper no-footer" id="patientForAppointment">
                            <style type="text/css">
                                #js-exportable4 td, #js-exportable4 th {
                                     padding: .2rem; 
                                }
                                #js-exportable4 td {
                                    padding: .2rem;

                                }
                            </style>                            
                        <div class="tab-content m-t-10 padding-0" style="max-height: 280px; overflow: scroll;">
                            <div class="tab-pane table-responsive active show" id="All">
                                 <table class="table" id="js-exportable4" style="font-size: 13px;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="patient_idtd">w</th>
                                            <th style="width: 1%;">S/N</th>
                                            <th>Title</th>
                                            <th>Hosp No.</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Account</th>
                                            <th>x</th>
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
                                            <td><span class="list-name"><?php echo substr($patient_list->patient_id_num, 0,1); ?></span></td>
                                            <td id="p_name<?php echo $patient_list->p_id; ?>"><?php echo $patient_list->patient_name; ?></td>
                                            <td><?php echo substr($patient_list->patient_gender, 0,1); ?></td>
                                            <td><?php echo $patient_list->patient_status ?></td>
                                            <td>
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
            <?php  } ?>
	</div>
</form>
<script type="text/javascript">
    var today = '<?php echo date('Y-m-d'); ?>';
    $('#admit_date').val(today);

    $(document).ready(function() {
      $(".patient_idtd").hide();

        var today = '<?php echo date('Y-m-d'); ?>';
        var current_time = '<?php echo date('H:m'); ?>';
            $('#appointment_date').val(today);
            $('#appointment_time').val(current_time);


        var tableNow = $('#js-exportable4').DataTable({     
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
    $("#js-exportable4 tr").click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');   
       var value=$(this).find('td:first').html();
       $("#select_patient"+value).prop("checked", true);

       var patient_name = document.getElementById("p_name"+value).innerHTML;
       $('#patient_name').val(patient_name)
       //alert(x);    
    });
</script>