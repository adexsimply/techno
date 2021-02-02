<!-- Add new history Modal -->
<!-- <div class="modal fade" id="takeVitals" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        </div>
    </div>
</div> -->

<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-vital">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                <input type="hidden" name="appointment_id" value="<?php echo $vital_details->p_id ?>">
                                <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                <input type="" class="form-control date" disabled="" value="<?php echo date('l jS \of F Y h:i:s A') ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Clinic</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $vital_details->clinic_name ?>">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php echo $vital_details->patient_name ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php echo $vital_details->patient_dob; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Weight(kg)</b>
                            <div class="input-group">
                                <input type="number" class="form-control" name="weight" id="weight" placeholder="75">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Height(m)</b>
                            <div class="input-group">
                                <input type="number" class="form-control" name="height" id="height" placeholder="1.75">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="height"></code>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6">
                            <b>BMI</b>
                            <div class="input-group">
                                <input type="number" class="form-control money-dollar" disabled="" placeholder="22.9">
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3 col-md-6">
                            <b>BMI Remark</b>
                            <div class="input-group">
                                <input type="text" class="form-control ip" disabled="" placeholder="Obese">
                            </div>
                        </div> -->
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>HC</b>
                            <div class="input-group">
                                <input type="text" class="form-control credit-card" placeholder="46" name="HC" id="HC">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>MUAC (Paed.)</b>
                            <div class="input-group">
                                <input type="text" class="form-control email" placeholder="75" name="MUAC" id="MUAC">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="MUAC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Nutritional Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" placeholder="60" name="nutritional_status" id="nutritional_status">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="nutritional_status"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>BP</b>
                            <div class="input-group">
                                <input type="text" class="form-control bp_input_tag" maxlength="5" placeholder="10/39" name="BP" id="BP">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Temp</b>
                            <div class="input-group">
                                <input type="text" class="form-control email" placeholder="75" name="temp" id="temp">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Urine(ANC)</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" placeholder="60" name="ANC" id="ANC">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="ANC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Respiration</b>
                            <div class="input-group">
                                <input type="text" class="form-control credit-card" placeholder="45" name="respiration" id="respiration">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Pulse</b>
                            <div class="input-group">
                                <input type="text" class="form-control email" placeholder="75" name="paulse" id="paulse">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>SPO2</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" placeholder="60" name="SPO2" id="SPO2">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="SPO2"></code>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3">
                            <small>Eye Clinic Visual Acuity </small><br>
                            <b>RE</b>
                            <div class="input-group">
                                <input type="text" class="form-control email" placeholder="75" name="RE" id="RE">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="RE"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3"><br>
                            <b>LE</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" placeholder="60" name="LE" id="LE">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LE"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <br>LMP</>
                            <div class="input-group">
                                <input type="date" class="form-control credit-card" placeholder="45" name="LMP" id="LMP">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LMP"></code>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6">
                            <b>EDD</b>
                            <div class="input-group">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <b>EGA</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" placeholder="60">
                                <span style="color:#ff0000;" class="error appointment_date"></span>
                            </div>
                        </div> -->
                        <div class="col-lg-12 col-md-6 mb-3">
                            <b>To See</b>
                            <div class="input-group">
                                <select class="form-control" name="doctor_id" id="doctor_id">
                                    <option value="">Select Doctor</option>
                                    <?php foreach ($doctors_list as $doctor) { ?>
                                        <option value="<?php echo $doctor->user_id; ?>"><?php echo "Dr. " . $doctor->staff_firstname . " " . $doctor->staff_lastname; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="doctor_id"></code>
                        </div>

                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_vital('add_vital')" title="add_vital">Take Vital</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.bp_input_tag').keyup(function() {
        var foo = $(this).val().split("/").join(""); // remove hyphens  if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,2}', 'g')).join("/");
        $(this).val(foo);
    }, );
</script>

<?php $this->load->view('nursing/new_vital_script'); ?>