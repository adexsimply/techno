<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Vital Signs</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Vital Signs</h2>
                        <?php //echo $this->session->userdata('active_user')->role_id 
                        ?>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                     <!--    <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="Appointment List" href="<?php echo base_url('nursing/vital_appointments') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button> -->
                        <!-- <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="clear_textbox()">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button> -->

                        <!-- Tab panes -->

                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Date and time range -->
                                                <div class="col-md-2">
                                                    <label>Date Range</label>
                                                    <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range">
                                                </div>


                                                <!-- Currency -->
                                                <div class="col-md-2">
                                                    <label for="currency">Clinic</label>
                                                    <select class="form-control select2" onchange="filter_vitals()" name="currency" id="clinic_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($clinic_list as $clinic) { ?>
                                                            <option value="<?php echo $clinic->id ?>"><?php echo $clinic->clinic_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="status">Status</label>
                                                    <select onchange="filter_vitals()" class="form-control select2" name="status" id="status">
                                                        <option value="all" selected>All</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Treated">Treated</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="status">Doctor</label>
                                                    <select class="form-control select2" onchange="filter_vitals()" name="doctor_id" id="doctor_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($doctors_list as $doctor) {
                                                        ?>
                                                            <option value="<?php echo $doctor->id ?>">Dr. <?php echo $doctor->staff_firstname ?> <?php echo $doctor->staff_middlename ?> <?php echo $doctor->staff_lastname ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="input-group" style="margin-top: 25px;">
                                                        <button type="submit" name="btn" class="btn btn-primary btn-flat" id="btn">Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Date Added</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Hospital No</th>
                                            <th>Account Status</th>
                                            <th>Clinic</th>
                                            <th>Doctor To See</th>
                                            <th>Vital Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="filterd_vitals">
                                        <?php
                                        //var_dump($vitals_list);
                                        $i = 1;
                                        foreach ($vitals_list as $appointment) {
                                            //var_dump($appointment);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($appointment->appointment_date)) ?></span></td>
                                                <td><?php echo $appointment->patient_title . " " . $appointment->patient_name; ?></td>
                                                <td><?php echo $appointment->patient_gender; ?></td>
                                                <td><?php echo $appointment->patient_id_num; ?></td>
                                                <td><?php echo $appointment->patient_status ?></td>
                                                <td><?php echo $appointment->clinic_name; ?></td>
                                                <td><?php echo $appointment->staff_firstname . " " . $appointment->staff_lastname . " " . $appointment->staff_middlename; ?></td>

                                                <td><?php if ($appointment->vital_id) { ?>
                                                        <span class="badge badge-success">Treated</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning">Pending</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($appointment->vital_id) { ?>
                                                    <span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#EditVital<?php echo $appointment->vital_id; ?>" style="cursor: pointer;">Edit Vitals</span>
                                                    <span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" data-toggle="modal" data-target="#ViewVital<?php echo $appointment->vital_id; ?>" style="cursor: pointer;">View Vitals</span>
                                                    <span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(<?php echo $appointment->vital_id ?>)" style="cursor: pointer;">Delete Vitals</span>
                                                <?php  } else { ?>
                                                    <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/take_vital/' . $appointment->app_id); ?>">
                                                        <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                                                    </button>

                                                <?php } ?>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="EditVital<?php echo $appointment->vital_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="col-12">
                                                            <div class="card box-margin">
                                                                <div class="card-body">
                                                                    <form id="edit-vital">
                                                                        <div class="modal-body edit-doc-profile">
                                                                            <div class="row clearfix">
                                                                                <div class="col-lg-7 col-md-6 mb-3">
                                                                                    <b>Date</b>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                                                        </div>
                                                                                        <input type="hidden" name="edit_vital_id" value="<?php echo $appointment->vital_id ?>">
                                                                                        <input type="" class="form-control" disabled="" value="<?php echo date('l jS \of F Y h:i:s A', strtotime($appointment->date)) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-5 col-md-6 mb-3">
                                                                                    <b>Clinic</b>
                                                                                    <div class="input-group">
                                                                                    <input type="hidden" name="clinic_id" value="<?php echo $appointment->clinic_id ?>">
                                                                                    <input type="hidden" name="appointment_id" value="<?php echo $appointment->appointment_id ?>">
                                                                                    <input type="hidden" name="patient_id" value="<?php echo $appointment->patient_id ?>">
                                                                                        <input type="text" class="form-control time24" disabled="" value="<?php echo $appointment->clinic_name ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-8 col-md-6 mb-3">
                                                                                    <b>Name</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control time12" value="<?php echo $appointment->patient_title . " " . $appointment->patient_name ?>" disabled="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Age</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control datetime" disabled="" value="<?php echo date_diff(date_create($appointment->patient_dob), date_create('today'))->y; ?> years ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>Weight(kg)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control mobile-phone-number" name="weight" id="weight" value="<?php echo $appointment->weight; ?>">>
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>Height(m)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control phone-number" name="height" id="height" value="<?php echo $appointment->height; ?>">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="height"></code>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>BMI</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control money-dollar" disabled="" value="<?php echo $appointment->BMI; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>BMI Remark</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control ip" disabled="" value="<?php echo $appointment->bmi_remark; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>HC</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control credit-card" value="<?php echo $appointment->HC; ?>" name="HC" id="HC">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="HC"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>MUAC (Paed.)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" value="<?php echo $appointment->MUAC; ?>" name="MUAC" id="MUAC">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="MUAC"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Nutritional Status</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" value="<?php echo $appointment->nutritional_status; ?>" name="nutritional_status" id="nutritional_status">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="nutritional_status"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>BP</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control bp_input_tag" maxlength="5" value="<?php echo $appointment->BP; ?>" name="BP" id="BP">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="BP"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Temp</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" value="<?php echo $appointment->temp; ?>" name="temp" id="temp">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Urine(ANC)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" value="<?php echo $appointment->ANC; ?>" name="ANC" id="ANC">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="ANC"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Respiration</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control credit-card" value="<?php echo $appointment->respiration; ?>" name="respiration" id="respiration">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="respiration"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Pulse</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" value="<?php echo $appointment->paulse; ?>" name="paulse" id="paulse">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="paulse"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>SPO2</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" value="<?php echo $appointment->SPO2; ?>" name="SPO2" id="SPO2">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="SPO2"></code>
                                                                                </div>

                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <small>Eye Clinic Visual Acuity </small><br>
                                                                                    <b>RE</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" value="<?php echo $appointment->RE; ?>" name="RE" id="RE">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="RE"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3"><br>
                                                                                    <b>LE</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" value="<?php echo $appointment->LE; ?>" name="LE" id="LE">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LE"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3"><br>
                                                                                    <b>LMP</b>
                                                                                    <div class="input-group">
                                                                                        <input type="date" class="form-control credit-card" value="<?php echo $appointment->LMP; ?>" name="LMP" id="LMP">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="LMP"></code>
                                                                                </div>


                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>EDD</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->EDD ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>EGA</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->EGA ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-6 mb-3">
                                                                                    <b>To See</b>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control" name="doctor_id" id="doctor_id">
                                                                                            <option value="">Select Doctor</option>
                                                                                            <?php foreach ($doctors_list as $doctor) { ?>
                                                                                                <option value="<?php echo $doctor->user_id; ?>" <?php if ($doctor->user_id == $appointment->user_id) {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>><?php echo "Dr. " . $doctor->staff_firstname . " " . $doctor->staff_lastname; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="doctor_id"></code>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <button type="button" class="btn btn-success" onclick="form_routes_vital('edit_vital')" title="edit_vital">Update Vital</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="ViewVital<?php echo $appointment->vital_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="col-12">
                                                            <div class="card box-margin">
                                                                <div class="card-body">

                                                                    <form>
                                                                        <div class="modal-body edit-doc-profile">
                                                                            <div class="row clearfix">
                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>Date Added</b>
                                                                                    <div class="input-group">
                                                                                        <!-- <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                                                        </div> -->
                                                                                        <input type="hidden" name="id" value="<?php echo $appointment->vital_id ?>">
                                                                                        <input type="" class="form-control" disabled="" value="<?php echo date('l jS \of F Y h:i:s A', strtotime($appointment->date)) ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>Clinic</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control time24" disabled="" value="<?php echo $appointment->clinic_name ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-8 col-md-6 mb-3">
                                                                                    <b>Name</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control time12" value="<?php echo $appointment->patient_title . " " . $appointment->patient_name ?>" disabled="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Age</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control datetime" disabled="" value="<?php echo date_diff(date_create($appointment->patient_dob), date_create('today'))->y; ?> years ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>Weight(kg)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control mobile-phone-number" disabled="" value="<?php echo $appointment->weight; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>Height(m)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control phone-number" disabled="" value="<?php echo $appointment->height; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>BMI</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control money-dollar" disabled="" value="<?php echo $appointment->BMI; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-6 mb-3">
                                                                                    <b>BMI Remark</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control ip" disabled="" value="<?php echo $appointment->bmi_remark; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>HC</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control credit-card" disabled="" value="<?php echo $appointment->HC; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>MUAC (Paed.)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" disabled="" value="<?php echo $appointment->MUAC; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Nutritional Status</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" disabled="" value="<?php echo $appointment->nutritional_status; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>BP</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control bp_input_tag" disabled="" value="<?php echo $appointment->BP; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Temp</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control email" disabled="" placeholder="75" name="temp" id="temp">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="temp"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Urine(ANC)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" disabled="" value="<?php echo $appointment->ANC; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Respiration</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control credit-card" disabled="" value="<?php echo $appointment->respiration; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Pulse</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->paulse; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>SPO2</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" disabled="" value="<?php echo $appointment->SPO2; ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <small>Eye Clinic Visual Acuity </small><br>
                                                                                    <b>RE</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->RE; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 mb-3"><br>
                                                                                    <b>LE</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" disabled="" value="<?php echo $appointment->LE; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>LMP</b>
                                                                                    <div class="input-group">
                                                                                        <input type="" class="form-control credit-card" disabled="" value="<?php echo date('l jS \of F Y h:i:s A', strtotime($appointment->LMP)) ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>EDD</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->EDD ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                                    <b>EGA</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled="" value="<?php echo $appointment->EGA ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-12 mb-3">
                                                                                    <b>To See</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control key" disabled="" value="Dr. <?php echo $appointment->staff_firstname ?> <?php echo $appointment->staff_middlename ?> <?php echo $appointment->staff_lastname ?>" placeholder="60">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="text-right">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        </div>

    </div>
</div>
<script type="text/javascript">
    $("#date_range").val('');
</script>
<?php $this->load->view('nursing/script'); ?>
<?php $this->load->view('includes/footer_2'); ?>