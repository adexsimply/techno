<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#js-exportable2 thead th, #js-exportable2 tbody td {
  font-size: 0.89em;
  padding: 1px !important;
  height: 15px;
}
</style>


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
                        <?php //var_dump($appointment_list); 
                        ?>
                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable2" id="js-exportable2">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th>S/N</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Hospital No</th>
                                            <th>Patient Name</th>
                                            <!-- <th>B/G</th> -->
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
                                                <td><span class="list-name"><?php if (date('jS \of F Y', strtotime($appointment->appointment_date)) == date('jS \of F Y')) {
                                                                                echo "Today ";
                                                                            } else {
                                                                                echo date('jS \of F Y', strtotime($appointment->appointment_date));
                                                                            } ?></span></td>
                                                <td><span class="list-name"><?php echo date('h:i:s A', strtotime($appointment->appointment_time)) ?></span></td>
                                                <td><span class="list-name"><?php echo $appointment->patient_id_num; ?></span></td>
                                                <td><?php echo $appointment->patient_title . " " . $appointment->patient_name;; ?></td>
                                                <!-- <td><?php echo $appointment->patient_blood_group; ?></td> -->
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
                                                    <!-- <span data-toggle="modal" data-target="#view<?php echo $appointment->app_id ?>" class="badge badge-success" style="cursor:pointer">View</span> -->
                                                    <span onclick="delete_appointment_name(<?php echo $appointment->app_id ?>)" class="badge badge-danger" style="cursor:pointer">Delete</span>
                                                </td>
                                                <!-- <td>
                                                    <span class="badge badge-success"><a href="<?php echo base_url('patient/view/') . $appointment->id; ?>">View Patient</a>
                                                    </span>
                                                </td> -->
                                            </tr>
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


<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('appointment/script'); ?>
<?php $this->load->view('appointment/add_appointment_script'); ?>