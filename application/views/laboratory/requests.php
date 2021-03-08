<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Laboratory Requests & Results</h2>
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
                                                        <option value="Specimen">Specimen</option>
                                                        <option value="Review">Review</option>
                                                        <option value="Treated">Treated</option>
                                                        <option value="Incomplete">Incomplete</option>
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
                        <!-- Nav tabs -->
                        <!--  <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="clear_textbox()">
                                <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                            </button> -->

                        <!-- 
                <td><input type='text' class='name' id='name' ></td>
                <td><input type='text' class='email' id='email' ></td> -->

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
                                            <th>Diagnosis</th>
                                            <!-- <th>Status</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($doctors_list);
                                        $i = 1;
                                        foreach ($lab_requests_list as $lab_request) {
                                            //var_dump($lab_request);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php $ini_date = date_create($lab_request->date_created);
                                                                            echo date_format($ini_date, "D M d, Y"); ?></span></td>
                                                <td><?php echo $lab_request->patient_title . " " . $lab_request->patient_name; ?></td>
                                                <td><?php echo $lab_request->patient_gender; ?></td>
                                                <td><?php echo $lab_request->patient_id_num; ?></td>
                                                <td><?php echo $lab_request->patient_status ?></td>
                                                <td><?php echo $lab_request->clinic_name ?></td>
                                                <td><?php echo $lab_request->staff_firstname . " " . $lab_request->staff_lastname; ?></td>
                                                <td><?php echo $lab_request->diagnosis; ?></td>
                                                <!-- <td>
                                                    <?php if ($lab_request->status == "Pending") { ?>
                                                        <span class="badge badge-warning"><?php echo $lab_request->status ?></span>
                                                    <?php } else if ($lab_request->status == "Treated") { ?>
                                                        <span class="badge badge-success"><?php echo $lab_request->status ?></span>
                                                    <?php } else if ($lab_request->status == "Specimen") { ?>
                                                        <span class="badge badge-primary"><?php echo $lab_request->status ?></span>
                                                    <?php } else if ($lab_request->status == "Review") { ?>
                                                        <span class="badge badge-primary"><?php echo $lab_request->status ?></span>
                                                    <?php } else if ($lab_request->status == "Incomplete") { ?>
                                                        <span class="badge badge-primary"><?php echo $lab_request->status ?></span>
                                                    <?php } ?>
                                                </td> -->
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Request <?php echo $lab_request->patient_name; ?>" href="<?php echo base_url('laboratory/view_request/' . $lab_request->id) ?>">
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
<?php $this->load->view('laboratory/script'); ?>