<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-vital">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php 
                        $age = date_diff(date_create($vital_details->patient_dob), date_create('today'))->y; 
                        ?>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                <?php if ($this->uri->segment(3) && isset($vital_details->appointment_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->p_id ?>">
                                <?php } ?>

                                <?php if ($this->uri->segment(3) && isset($vital_details->vital_id)) { ?>
                                    <input type="hidden" name="edit_vital_id" value="<?php echo $vital_details->vital_id ?>">
                                <?php } ?>
                                <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">

                                <input type="" class="form-control date" disabled="" value="<?php echo date('d M Y') ?>">
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
                                <input type="text" class="form-control time12" value="<?php echo $vital_details->patient_name; ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y; ?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Weight(kg)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" onkeypress="weight_not_empty()" name="weight" id="weight2" <?php if ($this->uri->segment(3) && isset($vital_details->weight)) { ?>value="<?php echo $vital_details->weight; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Height(m)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" onkeydown="not_empty()" onblur="calc_bmi()" name="height" id="height2" <?php if ($this->uri->segment(3) && isset($vital_details->height)) { ?>value="<?php echo $vital_details->height; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="height"></code>
                            <span style="color: #ff0000;font-size: 12px;" id="error-h"></span>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>BMI</b>
                            <div class="input-group">
                                <input type="number" class="form-control money-dollar" readonly="" name="BMI" id="bmi2" <?php if ($this->uri->segment(3) && isset($vital_details->BMI)) { ?>value="<?php echo $vital_details->BMI; ?>" <?php } ?>>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>BMI Remark</b>
                            <div class="input-group">
                                <input type="text" class="form-control ip" readonly="" name="bmi_remark" id="bmi_remark2" <?php if ($this->uri->segment(3) && isset($vital_details->bmi_remark)) { ?>value="<?php echo $vital_details->bmi_remark; ?>" <?php } ?>>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>HC</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" <?php if ($age > 5) { echo "disabled"; } ?> name="HC" id="HC" <?php if ($this->uri->segment(3) && isset($vital_details->HC)) { ?>value="<?php echo $vital_details->HC; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>MUAC (Paed.)</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="MUAC" <?php if ($age > 5) { echo "disabled"; } ?> id="MUAC" <?php if ($this->uri->segment(3) && isset($vital_details->MUAC)) { ?>value="<?php echo $vital_details->MUAC; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="MUAC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Nutritional Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" <?php if ($age > 5) { echo "disabled"; } ?> name="nutritional_status" id="nutritional_status" <?php if ($this->uri->segment(3) && isset($vital_details->nutritional_status)) { ?>value="<?php echo $vital_details->nutritional_status; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="nutritional_status"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>BP(Systolic/Diastolic)</b>
                            <div class="input-group">
                                <?php if ($this->uri->segment(3) && isset($vital_details->BP)) { $bp1 = explode("/", $vital_details->BP);
                                                                            }
                                        //$bp2 
                                 ?>
                                <input type="text" class="form-control numbersOnly bp_input_tag" maxlength="3" name="BP1" id="BP1" <?php if ($this->uri->segment(3) && isset($vital_details->BP)) { ?>value="<?php echo $bp1[0]; ?>" <?php } ?>>&nbsp;&nbsp;/&nbsp;&nbsp;
                                <input type="text" class="form-control numbersOnly bp_input_tag" maxlength="3" name="BP2" id="BP2" <?php if ($this->uri->segment(3) && isset($vital_details->BP)) { ?>value="<?php echo $bp1[1]; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP1"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Temp</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="temp" id="temp" <?php if ($this->uri->segment(3) && isset($vital_details->temp)) { ?>value="<?php echo $vital_details->temp; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Urine(ANC)</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="ANC" id="ANC" <?php if ($this->uri->segment(3) && isset($vital_details->ANC)) { ?>value="<?php echo $vital_details->ANC; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="ANC"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Respiration</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="respiration" id="respiration" <?php if ($this->uri->segment(3) && isset($vital_details->respiration)) { ?>value="<?php echo $vital_details->respiration; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Pulse</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="paulse" id="paulse" <?php if ($this->uri->segment(3) && isset($vital_details->paulse)) { ?>value="<?php echo $vital_details->paulse; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>SPO2</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="SPO2" id="SPO2" <?php if ($this->uri->segment(3) && isset($vital_details->SPO2)) { ?>value="<?php echo $vital_details->SPO2; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="SPO2"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <small>Eye Clinic Visual Acuity </small><br>
                            <b>RE</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="RE" id="RE" <?php if ($this->uri->segment(3) && isset($vital_details->RE)) { ?>value="<?php echo $vital_details->RE; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="RE"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3"><br>
                            <b>LE</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" name="LE" id="LE" <?php if ($this->uri->segment(3) && isset($vital_details->LE)) { ?>value="<?php echo $vital_details->LE; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LE"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>LMP</b>
                            <div class="input-group">
                                <input type="date" class="form-control numbersOnly" <?php if($vital_details->patient_gender=='Male') { ?>disabled=""<?php } ?> onblur="get_ega_edd()" placeholder="45" name="LMP" id="LMP2" <?php if ($this->uri->segment(3) && isset($vital_details->LMP)) { ?>value="<?php echo $vital_details->LMP; ?>" <?php } ?>>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LMP"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>EDD</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly id="edd" name="EDD" <?php if ($this->uri->segment(3) && isset($vital_details->EDD)) { ?>value="<?php echo $vital_details->EDD; ?>" <?php } ?>>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>EGA</b>
                            <div class="input-group">
                                <input type="text" class="form-control key" readonly id="ega" placeholder="60" name="EGA" <?php if ($this->uri->segment(3) && isset($vital_details->EGA)) { ?>value="<?php echo $vital_details->EGA; ?>" <?php } ?>>
                                <span style="color:#ff0000;" class="error appointment_date"></span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-3">
                            <b>To See</b>
                            <div class="input-group">
                                <select class="form-control" name="doctor_id" id="doctor_id">
                                    <option value="">Select Doctor</option>
                                    <?php foreach ($doctors_list as $doctor) { ?>
                                        <option value="<?php echo $doctor->user_id; ?>" 
                                            <?php if ($this->uri->segment(3) && isset($vital_details->doctor_id) && $doctor->user_id == $vital_details->doctor_id) { echo 'selected'; } ?>><?php echo "Dr. " . $doctor->staff_firstname . " " . $doctor->staff_lastname; ?>
                                                
                                            </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="doctor_id"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Password</b>
                            <div class="input-group">
                                <input type="password" class="form-control key" id="password" name="password">

                            </div>
                        </div>
                        <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="password"></code>

                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_vital('add_vital')" title="add_vital">Save Vital</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('nursing/new_vital_script'); ?>