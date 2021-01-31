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

            <form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6">
                            <b>Date</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control date" disabled="" value="<?php echo date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <b>Clinic</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $vital_details->clinic_name ?>">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <b>Name</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time12" value="<?php echo $vital_details->patient_name ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Age</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control datetime" disabled="" value="<?php echo $vital_details->patient_dob; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Weight(kg)</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control mobile-phone-number" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Height(m)</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control phone-number" placeholder="1.75">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>BMI</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control money-dollar" disabled="" placeholder="22.9">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>BMI Remark</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control ip" disabled="" placeholder="Obese">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>HC</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control credit-card" placeholder="46">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>MUAC (Paed.)</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Nutritional Status</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control key" placeholder="60">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>BP</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control credit-card" placeholder="45">/
                                <input type="text" class="form-control credit-card" placeholder="100">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Temp</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Urine(ANC)</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control key" placeholder="60">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Respiration</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control credit-card" placeholder="45">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>Pulse</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>SPO2</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control key" placeholder="60">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <small>Eye Clinic Visual Acuity </small><br>
                            <b>RE</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6"><br>
                            <b>LE</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control key" placeholder="60">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>LMP</b>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control credit-card" placeholder="45">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>EDD</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control email" placeholder="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <b>EGA</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control key" placeholder="60">
                                <span style="color:#ff0000;" class="error appointment_date"></span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <b>To See</b>
                            <div class="input-group mb-3">
                                <select class="form-control" name="clinic" id="clinic">
                                    <option value="">Select Doctor</option>
                                    <?php foreach ($doctors_list as $doctor) { ?>
                                        <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_title . " " . $doctor->staff_firstname . " " . $doctor->staff_lastname; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" title="">Take Vital</button>
                </div>
            </form>
        </div>
    </div>
</div>