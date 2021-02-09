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
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Waiting List</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Waiting List</h2>
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
                                                <div class="col-md-3">
                                                    <label>Date Range</label>
                                                    <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range">
                                                </div>


                                                <!-- Currency -->
                                                <div class="col-md-3">
                                                    <label for="currency">Clinic</label>
                                                    <select class="form-control select2" onchange="filter_vitals()" name="currency" id="clinic_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($clinic_list as $clinic) { ?>
                                                            <option value="<?php echo $clinic->id ?>"><?php echo $clinic->clinic_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="status">Status</label>
                                                    <select onchange="filter_vitals()" class="form-control select2" name="status" id="status">
                                                        <option value="all" selected>All</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Treated">Treated</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="status">Doctor</label>
                                                    <select class="form-control select2" onchange="filter_vitals()" name="doctor_id" id="doctor_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($doctors_list as $doctor) {
                                                        ?>
                                                            <option value="<?php echo $doctor->id ?>">Dr. <?php echo $doctor->staff_firstname ?> <?php echo $doctor->staff_middlename ?> <?php echo $doctor->staff_lastname ?></option>
                                                        <?php } ?>
                                                    </select>
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
                                            <th>Status</th>
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
                                                <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($appointment->date_added)) ?></span></td>
                                                <td><?php echo $appointment->patient_title . " " . $appointment->patient_name; ?></td>
                                                <td><?php echo $appointment->patient_gender; ?></td>
                                                <td><?php echo $appointment->patient_id_num; ?></td>
                                                <td><?php echo $appointment->patient_status ?></td>
                                                <td><?php echo $appointment->clinic_name; ?></td>
                                                <td><?php echo $appointment->staff_firstname . " " . $appointment->staff_lastname . " " . $appointment->staff_middlename; ?></td>

                                                <td>
                                                    <span class="badge badge-success">Treated</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="<?php echo $appointment->patient_name; ?>" href="<?php echo base_url('patient/view/') . $appointment->p_id; ?>"><i class="icon-eye" aria-hidden="true"></i></button>
                                                    <!-- <span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Edit Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/edit_vital/' . $appointment->id); ?>" style="cursor: pointer;">Edit Vitals</span>
                                                    <span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/view_vital/' . $appointment->id); ?>" style="cursor: pointer;">View Vitals</span>
                                                    <span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(<?php echo $appointment->id ?>)" style="cursor: pointer;">Delete Vitals</span> -->
                                                </td>
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
<script type="text/javascript">
    $("#date_range").val('');
</script>
<?php $this->load->view('nursing/script'); ?>
<?php $this->load->view('includes/footer_2'); ?>