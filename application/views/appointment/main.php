<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Appointments</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Appointments</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="New Appointment" href="<?php echo base_url('appointment/new_appointment') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Create Appointment
                        </button>

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Hospital No</th>
                                            <th>Patient Name</th>
                                            <th>B/G</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Acc Status</th>
                                            <th>To See</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($appointment_list as $appointment) {
                                            //var_dump($appointment);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $appointment->patient_id_num; ?></span></td>
                                                <td><?php echo $appointment->patient_title . " " . $appointment->patient_name;; ?></td>
                                                <td><?php echo $appointment->patient_blood_group; ?></td>
                                                <td><?php echo date_diff(date_create($appointment->patient_dob), date_create('today'))->y; ?></td>
                                                <td><?php echo $appointment->patient_gender; ?></td>
                                                <td><?php echo $appointment->patient_status ?></td>
                                                <td><?php echo $appointment->staff_firstname; ?></td>
                                                <td><?php if ($appointment->appointment_status == 'Treated') { ?>
                                                        <span class="badge badge-success"><?php echo $appointment->appointment_status; ?></span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning"><?php echo $appointment->appointment_status; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <span data-toggle="modal" data-target="#view<?php echo $appointment->app_id ?>" class="badge badge-success" style="cursor:pointer">View</span>
                                                    <span onclick="delete_appointment_name(<?php echo $appointment->app_id ?>)" class="badge badge-danger" style="cursor:pointer">Delete</span>
                                                </td>
                                                <!-- <td>
                                                    <span class="badge badge-success"><a href="<?php echo base_url('patient/view/') . $appointment->id; ?>">View Patient</a>
                                                    </span>
                                                </td> -->
                                            </tr>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="view<?php echo $appointment->app_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Patient Name</label>
                                                                    <input type="text" class="form-control" readonly value="<?php echo $appointment->patient_title . " " . $appointment->patient_name;; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Appointment Date</label>
                                                                    <input type="text" class="form-control" readonly value="<?php $ini_date = date_create($appointment->appointment_date);
                                                                                                                            echo date_format($ini_date, "D M d, Y"); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Appointment Time</label>
                                                                    <input type="text" class="form-control" readonly value="<?php $ini_date = date_create($appointment->appointment_time);
                                                                                                                            echo date_format($ini_date, "h:i A"); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Clinic</label>
                                                                    <input type="text" class="form-control" readonly value="<?php echo $appointment->clinic_name; ?>">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
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

<?php $this->load->view('appointment/appointment-modal'); ?>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('appointment/script'); ?>
<?php $this->load->view('appointment/add_appointment_script'); ?>