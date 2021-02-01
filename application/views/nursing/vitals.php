<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" rel="stylesheet">
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
                        <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="Appointment List" href="<?php echo base_url('nursing/vital_appointments') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button>
                        <!-- <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="clear_textbox()">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button> -->

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="display table table-hover" id="example" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Hospital No</th>
                                            <th>Account Status</th>
                                            <th>Clinic</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($vitals_list);
                                        $i = 1;
                                        foreach ($vitals_list as $appointment) {
                                            //var_dump($appointment);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php $ini_date = date_create($appointment->appointment_date);
                                                                            echo date_format($ini_date, "D M d, Y"); ?></span></td>
                                                <td><span class="list-name"><?php echo $appointment->appointment_time; ?></span></td>
                                                <td><?php echo $appointment->patient_title . " " . $appointment->patient_name;; ?></td>
                                                <td><?php echo $appointment->patient_gender; ?></td>
                                                <td><?php echo $appointment->patient_id_num; ?></td>
                                                <td><?php echo $appointment->patient_status ?></td>
                                                <td><?php echo $appointment->clinic_name; ?></td>
                                                <td>
                                                    <!-- <span class="badge badge-primary" data-toggle="modal" data-target="#takeVitals" onclick="clear_textbox()" style="cursor: pointer;">Take Vitals</span> -->
                                                    <span class="badge badge-success" data-toggle="modal" data-target="#EditVital<?php echo $appointment->id; ?>" style="cursor: pointer;">Edit Vitals</span>
                                                    <span class="badge badge-warning" data-toggle="modal" data-target="#EditVital<?php echo $appointment->id; ?>" style="cursor: pointer;">View Vitals</span>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="EditVital<?php echo $appointment->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
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
                                                                                        <input type="hidden" name="id" value="<?php echo $appointment->id ?>">
                                                                                        <input type="date" class="form-control date" disabled="" value="<?php echo $appointment->appointment_date ?>">
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
                                                                                        <input type="text" class="form-control time12" value="<?php echo $appointment->patient_name ?>" disabled="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Age</b>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control datetime" disabled="" value="<?php echo $appointment->patient_dob; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Weight(kg)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control mobile-phone-number" name="weight" id="weight" placeholder="75">
                                                                                    </div>
                                                                                    <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="weight"></code>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-6 mb-3">
                                                                                    <b>Height(m)</b>
                                                                                    <div class="input-group">
                                                                                        <input type="number" class="form-control phone-number" name="height" id="height" placeholder="1.75">
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
                                                                                <div class="col-lg-12 col-md-6 mb-3">
                                                                                    <b>To See</b>
                                                                                    <div class="input-group">
                                                                                        <select class="form-control" name="doctor_id" id="doctor_id">
                                                                                            <option value="">Select Doctor</option>
                                                                                            <?php foreach ($doctors_list as $doctor) { ?>
                                                                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_title . " " . $doctor->staff_firstname . " " . $doctor->staff_lastname; ?></option>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example thead tr').clone(true).appendTo('#example thead');
        $('#example thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            paging: false,
            searching: false
        });
    });
</script>

<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('nursing/script'); ?>