<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-eye-clinic">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($vital_details)
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <?php if ($this->uri->segment(3) && isset($vital_details->eye_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="eye_id" value="<?php echo $vital_details->eye_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                    <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                <?php } ?>

                                <input type="" class="form-control date" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->eye_id)) { echo date('jS \of F Y', strtotime($vital_details->date)); }else{ echo date('d M Y'); } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->eye_id)) { echo $vital_details->patient_id_num; }else{ echo $vital_details->patient_id_num; } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->eye_id)) { echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y; }else{ echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y; }?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Account Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_status)) { echo $vital_details->patient_status; }else{ $vital_details->patient_status; } ?>">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_name)) { echo $vital_details->patient_name; }else{ echo $vital_details->patient_name; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Sex</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_gender)) { echo $vital_details->patient_gender; }else{ echo $vital_details->patient_gender; } ?>" disabled="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Complaint</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->complaint)) { echo $vital_details->complaint; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="complaint"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>History of Presenting Complaint</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="presenting_complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->presenting_complaint)) { echo $vital_details->presenting_complaint; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="presenting_complaint"></code>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Past Medical History</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="past_medical_history" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->past_medical_history)) { echo $vital_details->past_medical_history; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="past_medical_history"></code>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Opthalmic History</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="opthalmic_history" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->opthalmic_history)) { echo $vital_details->opthalmic_history; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="opthalmic_history"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Family/Social HX</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="family_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->family_hx)) { echo $vital_details->family_hx; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="family_hx"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>VA</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="VA" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->VA)) { echo $vital_details->VA; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="VA"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>IOP</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="IOP" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->IOP)) { echo $vital_details->IOP; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="IOP"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Results</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="result" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->result)) { echo $vital_details->result; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="result"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Refraction</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="refraction" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->refraction)) { echo $vital_details->refraction; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="refraction"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>External Examination</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="external_examination" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->external_examination)) { echo $vital_details->external_examination; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="external_examination"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Ophthalmoscopy</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="ophthalmoscopy" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->ophthalmoscopy)) { echo $vital_details->ophthalmoscopy; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="ophthalmoscopy"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Slt Lamp</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="slt_lamp" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->slt_lamp)) { echo $vital_details->slt_lamp; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="slt_lamp"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Diagnosis</b>
                            <div class="input-group">
                            <textarea rows="" cols="" name="diagosis" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->diagosis)) { echo $vital_details->diagosis; } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="diagosis"></code>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_eye_clinic('add_eye_clinic')" title="add_eye_clinic">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('patient/new_eye_clinic_script'); ?>