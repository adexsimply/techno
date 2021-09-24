<style type="text/css">
   #consultation {
        font-size: 13px;
    }
   #consultation .tab-content {
     padding: 1px; 

}
.mb-3, .my-3 {
     margin-bottom: 0!important; 
}

#consultation .form-control {
    display: block;
    width: 100%;
     height: auto; 
    padding: 2%;
    font-size: 13px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="tab-pane show active" id="consultation">
    <div class="card box-margin">
        <div class="card-body" style="padding: 1px;">
            <form id="add-consultation">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($consultation_details)
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <?php if ($this->uri->segment(4) && isset($consultation_details->con_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $consultation_details->appointment_id ?>">
                                    <input type="hidden" name="con_id" value="<?php echo $consultation_details->con_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $consultation_details->vital_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $consultation_details->doctor_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $consultation_details->patient_id ?>">
                                <?php }?>

                                <input type="" class="form-control" value="<?php if ($this->uri->segment(4) && isset($consultation_details->con_id)) { echo date('jS \of F Y', strtotime($consultation_details->date)); } else { echo date('d M Y'); } ?>">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(4) && isset($consultation_details->con_id)) { echo $consultation_details->patient_id_num; } else { echo $patient_details->patient_id_num;  } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(4) && isset($consultation_details->con_id)) { echo date_diff(date_create($consultation_details->patient_dob), date_create('today'))->y; } else {  echo date_diff(date_create($patient_details->patient_dob), date_create('today'))->y; } ?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Account Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(4) && isset($consultation_details->patient_status)) { echo $consultation_details->patient_status; } else { $patient_details->patient_status;  } ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(4) && isset($consultation_details->patient_name)) {  echo $consultation_details->patient_name; } else { echo $patient_details->patient_name; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Sex</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(4) && isset($consultation_details->patient_gender)) { echo $consultation_details->patient_gender; } else { echo $patient_details->patient_gender; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Clinic</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(4) && isset($consultation_details->clinic_name)) { echo $consultation_details->clinic_name; } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-3">
                            <b>Weight(kg)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly placeholder="75" value="<?php if ($this->uri->segment(4) && isset($consultation_details->weight)) { echo $consultation_details->weight; } else { echo $patient_details->weight; } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-3">
                            <b>Height(m)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly name="height" id="height2" placeholder="1.75" value="<?php if ($this->uri->segment(4) && isset($consultation_details->height)) { echo $consultation_details->height; } else { echo $patient_details->height;  } ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-3">
                            <b>Temp</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(4) && isset($consultation_details->temp)) { echo $consultation_details->temp; } else { echo $patient_details->temp; } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-3">
                            <b>BP</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(4) && isset($consultation_details->BP)) { echo $consultation_details->BP; } else { echo $patient_details->BP; } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP"></code>
                        </div>
                        <div class="col-lg-1 col-md-6 mb-3">
                            <b>Pulse</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(4) && isset($consultation_details->paulse)) { echo $consultation_details->paulse; } else { echo $patient_details->paulse;  } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                        </div>
                        <div class="col-lg-1 col-md-6 mb-3">
                            <b>HC</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(4) && isset($consultation_details->HC)) {
                                                                                                        echo $consultation_details->HC;
                                                                                                    } else {
                                                                                                        echo $patient_details->HC;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                        </div>
                        <div class="col-lg-2 col-md-6 mb-3">
                            <b>Respiration</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(4) && isset($consultation_details->respiration)) {
                                                                                                        echo $consultation_details->respiration;
                                                                                                    } else {
                                                                                                        echo $patient_details->respiration;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Complaint</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="complaint" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->complaint)) {
                                                                                                    echo $consultation_details->complaint;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="complaint"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>HX of Presenting Complaint</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="presenting_complaint" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->presenting_complaint)) {
                                                                                                                echo $consultation_details->presenting_complaint;
                                                                                                            } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="presenting_complaint"></code>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Past Medical HX</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="past_medical_hx" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->past_medical_hx)) {
                                                                                                            echo $consultation_details->past_medical_hx;
                                                                                                        } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="past_medical_hx"></code>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Immunization HX</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="immunization_hx" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->immunization_hx)) {
                                                                                                            echo $consultation_details->immunization_hx;
                                                                                                        } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="immunization_hx"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Family HX</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="family_hx" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->family_hx)) {
                                                                                                    echo $consultation_details->family_hx;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="family_hx"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Diet/Drug/Social HX</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="diet" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->diet)) {
                                                                                                echo $consultation_details->diet;
                                                                                            } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="diet"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Examination</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="examination" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->examination)) {
                                                                                                        echo $consultation_details->examination;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="examination"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Results</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="result" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->result)) {
                                                                                                    echo $consultation_details->result;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="result"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Assignment/Diagnosis</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="assignment" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->assignment)) {
                                                                                                        echo $consultation_details->assignment;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="assignment"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Investigation</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="investigation" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->investigation)) {
                                                                                                        echo $consultation_details->investigation;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="investigation"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Treatment</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="treatment" id="treatment" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->treatment)) {
                                                                                                    echo $consultation_details->treatment;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="treatment"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Summary</b>
                            <div class="input-group">
                                <textarea rows="7" cols="" name="summary" class="form-control"><?php if ($this->uri->segment(4) && isset($consultation_details->summary)) {
                                                                                                    echo $consultation_details->summary;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="summary"></code>
                        </div>
                    </div>
                </div>
                <!-- <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_consultation('add_consultation')" title="add_consultation">Save Consultation</button>
                </div> -->
            </form>
        </div>
    </div>
</div>