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
            <form id="update-request-specimen" method="post">

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

                        <input type="text" value="<?php echo $this->uri->segment(3); ?>" hidden name="lab_request_id">

                        <div class="table-responsive mb-3" style="margin-top: 20px;">
                            <table class="table table-bordered js-basic-example dataTable table-custom" id="mprDetailDataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="1%">S/N</th>
                                        <th width="15%">Test Name</th>
                                        <th width="50%">Result</th>
                                        <th width="1%">Measure</th>
                                        <th>Range</th>
                                    </tr>
                                <tbody>

                                    <?php $j = 1;
                                    //var_dump($tests);
                                   // foreach ($tests as $test) { 
                                        $test_name ="";
                                        if ($tests->has_subgroup=='No') {
                                            $ranges = $this->laboratory_m->get_ranges($tests->id); 
                                            if (count($ranges)==0) {
                                                //$test_name = $tests->lab_test_name;

                                                ?> 
                                                <tr class="request">
                                                    <td><input type="text" name="test_result_id[]" value="<?php echo $this->uri->segment(3); ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><?php echo $tests->lab_test_name; ?>
                                                    </td>
                                                    <td width="40%">
                                                    <input type="text" hidden value="2" name="food_id[]">
                                                    <input type="text" hidden value="<?php echo $tests->id; ?>" name="lab_test_id[]">

                                                        <textarea class="form-control" name="results[]" rows="3"><?php //echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <?php echo $tests->measure ?>
                                                     <!--    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Test Details" href="<?php echo base_url('setting/edit_test/' . $test->lab_test_unique_id) ?>">
                                                            View Details
                                                        </button> -->
                                                    </td>
                                                    <td>-
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            else {
                                                ////For tests with no Sub-groups but with custom Ranges
                                                //foreach ($ranges as $range) {

                                                ?>
                                                <tr class="request">
                                                    <td><input type="text" hidden name="test_result_id[]" value="<?php echo $this->uri->segment(3);?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td><?php echo $tests->lab_test_name; ?>
                                                    </td>
                                                    <td width="40%">
                                                    <input type="text" hidden value="2" name="food_id[]">
                                                    <input type="text" hidden value="<?php echo $tests->id; ?>" name="lab_test_id[]">
                                                        <textarea class="form-control" name="results[]" rows="3"><?php //echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <?php echo $tests->measure ?>
                                                    </td>
                                                    <td> <?php foreach ($ranges as $range) {
                                                            echo rtrim($range->name.":".$range->low."-".$range->high.",", ", ");
                                                        } ?>
                                                    </td>

                                                </tr>

                                                <?php

                                                //}
                                                ///End of tests with no Sub-groups but with custom Ranges
                                            }         // foreach ($ranges as $range) {
                                                        //     echo rtrim($range->name.":".$range->low."-".$range->high.",", ", ");
                                                        // }


                                        }

                                            else { 
                                                $lab_subgroups =  $this->laboratory_m->get_lab_subgroup($tests->id); 
                                                foreach($lab_subgroups as $lab_group) {

                                                ?>
                                        <tr class="request">
                                                    <td><input type="text" name="test_result_id[]" value="<?php echo $this->uri->segment(3); ?>"></td>
                                                    <td><?php echo $j++ ?></td>
                                                    <td>
                                                        <?php echo $lab_group->lab_test_subgroup_name;  ?>
                                                    </td>
                                                    <td width="40%">
                                                    <input type="text" hidden value="2" name="food_id[]">
                                                    <input type="text" hidden value="<?php echo $tests->id; ?>" name="lab_test_id[]">

                                                    <input type="text" hidden value="<?php echo $lab_group->id; ?>" name="lab_test_subgroup_id[]">
                                                        <textarea class="form-control" name="results[]" rows="3"><?php //echo $test->result ?></textarea>
                                                    </td>
                                                    <td>
                                                        <?php echo $lab_group->Measure ?>
                                                    </td>
                                                    <td>
                                                        <?php $ranges = $this->laboratory_m->get_ranges($lab_group->id); 
                                                        if (count($ranges)==0) {
                                                            echo "-";
                                                        }
                                                        else {
                                                        foreach ($ranges as $range) {
                                                            echo rtrim($range->name.":".$range->low."-".$range->high.",", ", ");
                                                        }

                                                            
                                                        }
                                                         ?>
                                                    </td>

                                                </tr>
                                                <?php
                                                
                                                }
                                            }
                                               

                                        ?>
                                    <?php 

                               // } 
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- <hr>
                    <h5>Investigation Required</h5>
                    <hr> -->
                    <div class="col-lg-12 col-md-12">
                    </div>
                <div class="text-right">
                    <button type="button" onclick="form_routes_request_s('update_request_specimen')" title="update_request" class="btn btn-primary px-4 m-2">Save</button>
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