<!-- Add new history Modal -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">
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


                        <h5>Tests</h5>
                        <hr>
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

                                    <?php $i = 1;
                                    //var_dump($tests);
                                    foreach ($tests as $test) { ?>
                                        <tr class="data">
                                            <td><?php echo $i++ ?></td>
                                            <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_created)) ?></span></td>
                                            <td>
                                                <?php echo $test->lab_test_name ?>
                                            </td>
                                            <td width="15%"><input type="checkbox" name="sample"></td>
                                            <td><?php echo $test->status ?></td>
                                            <td width="20%">
                                                <select class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($lab_specimens_list as $specimen) { ?>
                                                        <option value="<?php echo $specimen->id; ?>"><?php echo $specimen->specimen_name; ?></option>
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
                                <textarea rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <hr>
                    <h5>Investigation Required</h5>
                    <hr>
                    <div class="body" style="height: 210px; overflow: scroll;">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Test Name</th>
                                        <th>Test Done By</th>
                                        <th>Result Entry By</th>
                                        <th>Time Requested</th>
                                        <th>Time Treated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Test Results</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Notes(Histology, Cytology etc_</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="Home">

                                <div class="body" style="height: 210px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Test</th>
                                                    <th>Result</th>
                                                    <th>Measure</th>
                                                    <th>Range</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Profile">

                            </div>
                            <div class="tab-pane" id="Contact">

                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary px-4 m-2" onclick="get()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function get() {
        //alert()
        $("#mprDetailDataTable tr:gt(0)").each(function() {
            var this_row = $(this);
            var productId = $.trim(this_row.find('td:eq(0)').html()); //td:eq(0) means first td of this row
            var product = $.trim(this_row.find('td:eq(1)').html())
            var Quantity = $(this).parent('td:eq(1)').find('input').val();
            console.log(Quantity)
        });
    }
</script>