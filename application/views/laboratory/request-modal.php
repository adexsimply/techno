<!-- Add new history Modal -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form id="update-request" method="post">
                <div class="modal-body edit-doc-profile">
                    <?php //var_dump($lab_requests);
                    ?>


                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6">
                            <b>Date</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="text" disabled class="form-control date" value="<?php $ini_date = date_create($lab_requests->date_created);
                                                                                                echo date_format($ini_date, "D M d, Y"); ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Hospital Number</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $lab_requests->patient_id_num; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Clinic</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $lab_requests->clinic_name; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Account Status</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $lab_requests->patient_status; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <b>Name</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $lab_requests->patient_title . " " . $lab_requests->patient_name; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Age</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo date_diff(date_create($lab_requests->patient_dob), date_create('today'))->y; ?>y">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Sender</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $lab_requests->staff_firstname . " " . $lab_requests->staff_lastname; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <b>Diagnosis</b>
                            <div class="input-group mb-3">
                                <textarea rows="3" disabled class="form-control"><?php echo $lab_requests->diagnosis; ?></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-12" style="height: 180px; overflow: scroll;">
                            <h6>Specimens Used</h6>
                            <?php foreach ($lab_specimens_list as $lab_specimen) { ?>
                                <div class="fancy-checkbox">
                                    <label><input type="checkbox"><span><?php echo $lab_specimen->specimen_name; ?></span></label>
                                </div>
                            <?php } ?>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                                                <b>Anesthesia</b>
                                                <div class="input-group mb-3">
                                                    <select class="form-control" name="clinic" id="clinic">
                                                        <option value="">Select</option>
                                                        <?php foreach ($doctors_list as $doctor) { ?>
                                                        <option value="<?php echo $doctor->user_id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div> -->

                    </div>

                    <!-- <hr>
                    <h5>Investigation Required</h5>
                    <hr> -->
                    <div class="col-lg-12 col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#result">Test Results</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#specimen">Specimen Mode</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Review Mode</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#treated">Treated</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="result">

                                <div class="table-responsive mb-3">
                                    <table class="table table-hover js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Test Name</th>
                                                <th>Collect Sample</th>
                                                <th>Status</th>
                                                <th>Sample Type</th>
                                            </tr>
                                        <tbody>

                                            <?php $j = 1;
                                            //var_dump($tests);
                                            foreach ($tests as $test) { ?>
                                                <tr class="request">
                                                    <td><input type="text" name="id[]" value="<?php echo $test->id ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_created)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->lab_test_name ?>
                                                    </td>
                                                    <td width="15%"><input type="checkbox" <?php if ($test->collect_sample != Null && $test->collect_sample == "on") {
                                                                                                echo "checked";
                                                                                            } ?> name="sample[]"></td>
                                                    <td><?php echo $test->status ?></td>
                                                    <td width="20%">
                                                        <select class="form-control" name="specimen[]">
                                                            <option value="">Select</option>
                                                            <?php foreach ($lab_specimens_list as $specimen) { ?>
                                                                <option value="<?php echo $specimen->id; ?>" <?php if ($specimen->id == $test->sample_type) {
                                                                                                                    echo "selected";
                                                                                                                } ?>><?php echo $specimen->specimen_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <b>Special Instruction</b>
                                    <div class="input-group mb-3">
                                        <textarea rows="3" class="form-control" name="special_instuction"><?php echo $lab_requests->special_instuction; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="specimen">
                                <div class="table-responsive mb-3">
                                    <table class="table table-hover js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Test Name</th>
                                                <!-- <th>Collect Sample</th> -->
                                                <th>Status</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        <tbody>

                                            <?php $j = 1;
                                            //var_dump($tests);
                                            foreach ($specimen_test_status as $test) { ?>
                                                <tr class="request">
                                                    <td><input type="text" name="test_result_id[]" value="<?php echo $test->id ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_created)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->lab_test_name ?>
                                                    </td>
                                                    <!-- <td width="15%"><input type="checkbox" <?php if ($test->collect_sample != Null && $test->collect_sample == "on") {
                                                                                                    echo "checked";
                                                                                                } ?> name="sample[]"></td> -->
                                                    <td><span class="badge badge-success"><?php echo $test->status ?></span></td>
                                                    <!-- <td width="20%">
                                                        <select class="form-control" name="specimen[]">
                                                            <option value="">Select</option>
                                                            <?php foreach ($lab_specimens_list as $specimen) { ?>
                                                                <option value="<?php echo $specimen->id; ?>" <?php if ($specimen->id == $test->sample_type) {
                                                                                                                    echo "selected";
                                                                                                                } ?>><?php echo $specimen->specimen_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td> -->
                                                    <td width="40%">
                                                        <textarea class="form-control" name="results[]" rows="3"><?php echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View <?php echo $test->lab_test_name; ?> Test Details" href="<?php echo base_url('setting/edit_test/' . $test->lab_test_unique_id) ?>">
                                                            View Details
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="review">
                                <div class="table-responsive mb-3">
                                    <table class="table table-hover js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Test Name</th>
                                                <th>Status</th>
                                                <th>Mark as Treated</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        <tbody>

                                            <?php $j = 1;
                                            //var_dump($tests);
                                            foreach ($review_test_status as $test) { ?>
                                                <tr class="request">
                                                    <td><input type="text" name="test_result_id[]" value="<?php echo $test->id ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_created)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->lab_test_name ?>
                                                    </td>
                                                    <td><span class="badge badge-success"><?php echo $test->status ?></span></td>
                                                    <td width="15%"><input type="checkbox" <?php if ($test->status != Null && $test->status == "Treated") {
                                                                                                echo "checked";
                                                                                            } ?> name="treated[]"></td>
                                                    <!-- <td width="20%">
                                                        <select class="form-control" name="specimen[]">
                                                            <option value="">Select</option>
                                                            <?php foreach ($lab_specimens_list as $specimen) { ?>
                                                                <option value="<?php echo $specimen->id; ?>" <?php if ($specimen->id == $test->sample_type) {
                                                                                                                    echo "selected";
                                                                                                                } ?>><?php echo $specimen->specimen_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td> -->
                                                    <td width="40%">
                                                        <textarea class="form-control" name="review[]" rows="3" readonly><?php echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View <?php echo $test->lab_test_name; ?> Test Details" href="<?php echo base_url('setting/edit_test/' . $test->lab_test_unique_id) ?>">
                                                            View Details
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="treated">
                                <div class="table-responsive mb-3">
                                    <table class="table table-hover js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Test Name</th>
                                                <th>Status</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        <tbody>

                                            <?php $j = 1;
                                            //var_dump($tests);
                                            foreach ($treated_test_status as $test) { ?>
                                                <tr class="request">
                                                    <td><input type="text" name="" value="<?php echo $test->id ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_created)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->lab_test_name ?>
                                                    </td>
                                                    <td><span class="badge badge-success"><?php echo $test->status ?></span></td>
                                                    <!-- <td width="20%">
                                                        <select class="form-control" name="specimen[]">
                                                            <option value="">Select</option>
                                                            <?php foreach ($lab_specimens_list as $specimen) { ?>
                                                                <option value="<?php echo $specimen->id; ?>" <?php if ($specimen->id == $test->sample_type) {
                                                                                                                    echo "selected";
                                                                                                                } ?>><?php echo $specimen->specimen_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td> -->
                                                    <td width="40%">
                                                        <textarea class="form-control" name="" rows="3" readonly><?php echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View <?php echo $test->lab_test_name; ?> Test Details" href="<?php echo base_url('setting/edit_test/' . $test->lab_test_unique_id) ?>">
                                                            View Details
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    <button type="button" onclick="form_routes_request('update_request')" title="update_request" class="btn btn-primary px-4 m-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       $('tr.request td:nth-child(1)').hide();
    });
</script>