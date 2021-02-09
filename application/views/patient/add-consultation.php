<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-consultation">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($consultation_details)
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <?php if ($this->uri->segment(3) && isset($consultation_details->con_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $consultation_details->appointment_id ?>">
                                    <input type="hidden" name="con_id" value="<?php echo $consultation_details->con_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $consultation_details->vital_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $consultation_details->doctor_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $consultation_details->patient_id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                    <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                <?php } ?>

                                <input type="" class="form-control date" disabled="" value="<?php if ($this->uri->segment(3) && isset($consultation_details->con_id)) { echo date('jS \of F Y', strtotime($consultation_details->date)); }else{ echo date('d M Y'); } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(3) && isset($consultation_details->con_id)) { echo $consultation_details->patient_id_num; }else{ echo $vital_details->patient_id_num; } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($consultation_details->con_id)) { echo date_diff(date_create($consultation_details->patient_dob), date_create('today'))->y; }else{ echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y; }?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Account Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($consultation_details->patient_status)) { echo $consultation_details->patient_status; }else{ $vital_details->patient_status; } ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($consultation_details->patient_name)) { echo $consultation_details->patient_name; }else{ echo $vital_details->patient_name; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Sex</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($consultation_details->patient_gender)) { echo $consultation_details->patient_gender; }else{ echo $vital_details->patient_gender; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Clinic</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($consultation_details->clinic_name)) { echo $consultation_details->clinic_name; }else{ echo $vital_details->clinic_name ; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Weight(kg)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly placeholder="75" value="<?php if ($this->uri->segment(3) && isset($consultation_details->weight)) { echo $consultation_details->weight; }else{ echo $vital_details->weight; } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Height(m)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly name="height" id="height2" placeholder="1.75" value="<?php if ($this->uri->segment(3) && isset($consultation_details->height)) { echo $consultation_details->height; }else{ echo $vital_details->height; } ?>" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Temp</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($consultation_details->temp)) { echo $consultation_details->temp; }else{ echo $vital_details->temp; }?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>BP</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($consultation_details->BP)) { echo $consultation_details->BP; }else{ echo $vital_details->BP; }?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Pulse</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($consultation_details->paulse)) { echo $consultation_details->paulse; }else{ echo $vital_details->paulse; }?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>HC</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($consultation_details->HC)) { echo $consultation_details->HC; }else{ echo $vital_details->HC; }?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Respiration</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($consultation_details->respiration)) { echo $consultation_details->respiration; }else{ echo $vital_details->respiration; }?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Complaint</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->complaint)) { echo $consultation_details->complaint; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="complaint"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>HX of Presenting Complaint</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="presenting_complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->presenting_complaint)) { echo $consultation_details->presenting_complaint; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="presenting_complaint"></code>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Past Medical HX</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="past_medical_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->past_medical_hx)) { echo $consultation_details->past_medical_hx; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="past_medical_hx"></code>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Immunization HX</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="immunization_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->immunization_hx)) { echo $consultation_details->immunization_hx; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="immunization_hx"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Family HX</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="family_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->family_hx)) { echo $consultation_details->family_hx; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="family_hx"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Diet/Drug/Social HX</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="diet" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->diet)) { echo $consultation_details->diet; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="diet"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Examination</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="examination" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->examination)) { echo $consultation_details->examination; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="examination"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Results</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="result" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->result)) { echo $consultation_details->result; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="result"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Assignment/Diagnosis</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="assignment" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->assignment)) { echo $consultation_details->assignment; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="assignment"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Investigation</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="investigation" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->investigation)) { echo $consultation_details->investigation; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="investigation"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Treatment</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="treatment" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->treatment)) { echo $consultation_details->treatment; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="treatment"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Summary</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="summary" class="form-control"><?php if ($this->uri->segment(3) && isset($consultation_details->summary)) { echo $consultation_details->summary; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="summary"></code>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_consultation('add_consultation')" title="add_consultation">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('patient/new_consultation_script'); ?>