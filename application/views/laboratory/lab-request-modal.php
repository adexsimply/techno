<style type="text/css">

#lab-request .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#lab-request .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#lab-request thead th, #lab-request tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}

#patientSearchBill tr.selected {
    background-color: #e92929 !important;
    color:#fff;
    vertical-align: middle;
    padding: 1.5em;
}
#lab-request .form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 1px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#lab-request select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<!-- Add new history Modal -->
<div class="col-12" id="lab-request">
    <div class="card">
        <div class="card-body">
            <form id="update-request" method="post">

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

                        <!-- Wait Here -->


                        <div class="table-responsive mb-3" style="margin-top: 20px;">
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

                    <!-- <hr>
                    <h5>Investigation Required</h5>
                    <hr> -->
                    <div class="col-lg-12 col-md-12">
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
       // $('tr.request td:nth-child(1)').hide();
    });
</script>