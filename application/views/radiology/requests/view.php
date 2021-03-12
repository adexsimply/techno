<!-- Add new history Modal -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form id="update-request" method="post">
                <div class="modal-body edit-doc-profile">
                    <?php //var_dump($radiology_request);
                    ?>


                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6">
                            <b>Date</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <input type="hidden" name="patient_id" value="<?php echo $radiology_request->patient_id; ?>">
                                <input type="text" disabled class="form-control date" value="<?php $ini_date = date_create($radiology_request->date_created);
                                                                                                echo date_format($ini_date, "D M d, Y"); ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Hospital Number</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $radiology_request->patient_id_num; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Clinic</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $radiology_request->clinic_name; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Account Status</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $radiology_request->patient_status; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <b>Name</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $radiology_request->patient_title . " " . $radiology_request->patient_name; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Age</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo date_diff(date_create($radiology_request->patient_dob), date_create('today'))->y; ?>y">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <b>Sender</b>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $radiology_request->staff_firstname . " " . $radiology_request->staff_lastname; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <b>special Instruction</b>
                            <div class="input-group mb-3">
                                <textarea rows="3" disabled class="form-control"><?php echo $radiology_request->special_instuction; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <hr>
                    <h5>Investigation Required</h5>
                    <hr> -->
                    <div class="col-lg-12 col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#pending">Pending Test</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#treated">Treated Test</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="pending">

                                <div class="table-responsive mb-3">
                                    <table class="table table-hover js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Test Name</th>
                                                <th>Status</th>
                                                <th>Result</th>
                                            </tr>
                                        <tbody>

                                            <?php $j = 1;
                                            //var_dump($pending_tests);
                                            foreach ($pending_tests as $test) { ?>
                                                <tr class="pending">
                                                    <td><input type="text" name="id[]" value="<?php echo $test->id ?>"></td>
                                                    <td><input type="text" name="radiology_test_id[]" value="<?php echo $test->radiology_test_id ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_added)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->rad_test_name ?>
                                                    </td>
                                                    <td><?php echo $test->status ?></td>
                                                    <td width="40%">
                                                        <textarea class="form-control" name="results[]"><?php if ($test->result != NULL) {
                                                                                                            echo $test->result;
                                                                                                        } ?></textarea>
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
                                            </tr>
                                        <tbody>

                                            <?php $sn = 1;
                                            //var_dump($treated_tests);
                                            foreach ($treated_tests as $test) { ?>
                                                <tr>
                                                    <td><?php echo $sn++ ?></td>
                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($test->date_added)) ?></span></td>
                                                    <td>
                                                        <?php echo $test->rad_test_name ?>
                                                    </td>
                                                    <td><?php echo $test->status ?></td>
                                                    <td width="40%">
                                                        <textarea class="form-control" readonly><?php if ($test->result != NULL) {
                                                                                                    echo $test->result;
                                                                                                } ?></textarea>
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
        $('tr.pending td:nth-child(1)').hide();
        $('tr.pending td:nth-child(2)').hide();
    });
</script>