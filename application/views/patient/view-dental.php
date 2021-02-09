<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-dental">
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

                                <input type="" class="form-control date" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                echo date('d M Y', strtotime($vital_details->date));
                                                                                            } else {
                                                                                                echo date('d M Y');
                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                        echo $vital_details->patient_id_num;
                                                                                                    } else {
                                                                                                        echo $vital_details->patient_id_num;
                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                        echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                    } else {
                                                                                                        echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                    } ?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Account Status</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_status)) {
                                                                                                        echo $vital_details->patient_status;
                                                                                                    } else {
                                                                                                        $vital_details->patient_status;
                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_name)) {
                                                                                            echo $vital_details->patient_name;
                                                                                        } else {
                                                                                            echo $vital_details->patient_name;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Sex</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_gender)) {
                                                                                            echo $vital_details->patient_gender;
                                                                                        } else {
                                                                                            echo $vital_details->patient_gender;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Clinic</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->clinic_name)) {
                                                                                            echo $vital_details->clinic_name;
                                                                                        } else {
                                                                                            echo $vital_details->clinic_name;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Weight(kg)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly placeholder="75" value="<?php if ($this->uri->segment(3) && isset($vital_details->weight)) {
                                                                                                                            echo $vital_details->weight;
                                                                                                                        } else {
                                                                                                                            echo $vital_details->weight;
                                                                                                                        } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Height(m)</b>
                            <div class="input-group">
                                <input type="number" class="form-control numbersOnly" readonly name="height" id="height2" placeholder="1.75" value="<?php if ($this->uri->segment(3) && isset($vital_details->height)) {
                                                                                                                                                        echo $vital_details->height;
                                                                                                                                                    } else {
                                                                                                                                                        echo $vital_details->height;
                                                                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Temp</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($vital_details->temp)) {
                                                                                                        echo $vital_details->temp;
                                                                                                    } else {
                                                                                                        echo $vital_details->temp;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>BP</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($vital_details->BP)) {
                                                                                                        echo $vital_details->BP;
                                                                                                    } else {
                                                                                                        echo $vital_details->BP;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Pulse</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($vital_details->paulse)) {
                                                                                                        echo $vital_details->paulse;
                                                                                                    } else {
                                                                                                        echo $vital_details->paulse;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>HC</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($vital_details->HC)) {
                                                                                                        echo $vital_details->HC;
                                                                                                    } else {
                                                                                                        echo $vital_details->HC;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Respiration</b>
                            <div class="input-group">
                                <input type="text" class="form-control numbersOnly" readonly value="<?php if ($this->uri->segment(3) && isset($vital_details->respiration)) {
                                                                                                        echo $vital_details->respiration;
                                                                                                    } else {
                                                                                                        echo $vital_details->respiration;
                                                                                                    } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Complaint</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->complaint)) {
                                                                                                    echo $vital_details->complaint;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="complaint"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>HX of Presenting Complaint</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="presenting_complaint" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->presenting_complaint)) {
                                                                                                                echo $vital_details->presenting_complaint;
                                                                                                            } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="presenting_complaint"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Past Dental HX</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="past_dental_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->past_dental_hx)) {
                                                                                                            echo $vital_details->past_dental_hx;
                                                                                                        } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="past_dental_hx"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Drug HX</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="drug_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->drug_hx)) {
                                                                                                    echo $vital_details->drug_hx;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="drug_hx"></code>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Past Medical HX</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="past_medical_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->past_medical_hx)) {
                                                                                                            echo $vital_details->past_medical_hx;
                                                                                                        } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="past_medical_hx"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Family HX</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="family_hx" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->family_hx)) {
                                                                                                    echo $vital_details->family_hx;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="family_hx"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Examination</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="examination" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->examination)) {
                                                                                                        echo $vital_details->examination;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="examination"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Impression</b></b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="impression" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->impression)) {
                                                                                                        echo $vital_details->impression;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="impression"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Assignment/Diagnosis</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="assignment" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->assignment)) {
                                                                                                        echo $vital_details->assignment;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="assignment"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Treatment</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="treatment" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->treatment)) {
                                                                                                    echo $vital_details->treatment;
                                                                                                } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="treatment"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Investigation</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="investigation" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->investigation)) {
                                                                                                        echo $vital_details->investigation;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="investigation"></code>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Management</b>
                            <div class="input-group">
                                <textarea rows="" cols="" name="management" class="form-control"><?php if ($this->uri->segment(3) && isset($vital_details->management)) {
                                                                                                        echo $vital_details->management;
                                                                                                    } ?></textarea>
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="management"></code>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_dental('add_dental')" title="add_dental">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('patient/new_dental_script'); ?>