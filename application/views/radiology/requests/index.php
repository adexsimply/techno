<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Radiology Requests & Results</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Requests & Results</h2>
                    </div>
                    <div class="body">

                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Date and time range -->
                                                <!-- Date and time range -->
                                                <div class="col-md-3">
                                                    <label>From</label>
                                                    <input type="date" placeholder="From" class="form-control" onchange="filter_vitals()" id="date_range_from" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                                                    <!--  <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range"> -->
                                                </div>
                                                <div class="col-md-3">
                                                    <label>To</label>
                                                    <input type="date" class="form-control" onchange="filter_vitals()" id="date_range_to" placeholder="From" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
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

                                                <!-- <div class="col-md-3">
                                                    <label for="status">Status</label>
                                                    <select onchange="filter_vitals()" class="form-control select2" name="status" id="status">
                                                        <option value="all" selected>All</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Review">Review</option>
                                                        <option value="Treated">Treated</option>
                                                    </select>
                                                </div> -->

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

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Hospital No</th>
                                            <th>Account Status</th>
                                            <th>Clinic</th>
                                            <th>Sender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($doctors_list);
                                        $i = 1;
                                        foreach ($rad_requests_list as $rad_request) {
                                            //var_dump($rad_request);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php $ini_date = date_create($rad_request->date_created);
                                                                            echo date_format($ini_date, "D M d, Y"); ?></span></td>
                                                <td><?php echo $rad_request->patient_title . " " . $rad_request->patient_name; ?></td>
                                                <td><?php echo $rad_request->patient_gender; ?></td>
                                                <td><?php echo $rad_request->patient_id_num; ?></td>
                                                <td><?php echo $rad_request->patient_status ?></td>
                                                <td><?php echo $rad_request->clinic_name ?></td>
                                                <td><?php echo $rad_request->staff_firstname . " " . $rad_request->staff_lastname; ?></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Request <?php echo $rad_request->patient_name; ?>" href="<?php echo base_url('radiology/view_request/' . $rad_request->id) ?>">
                                                        View More
                                                    </button>
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

<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('radiology/requests/script'); ?>