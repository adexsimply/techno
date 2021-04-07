<style type="text/css">
    
#lab_investigation thead th, #lab_investigation tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
</style>
<div class="tab-pane" id="lab_investigation">
    <h6>Laboratory Investigation</h6>
    <div class="tab-pane table-responsive active show" id="laboratory">
       <!--  <?php //if ($patient->appointment_id != NULL && $lab_tests == Null) { ?> -->
            <button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="laboratory_dialog(event)" data-type="black" data-size="m" data-title="Laboratory for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_lab/' . $patient->vital_id) ?>">
                <i class="fa fa-plus-circle"></i> Add New
            </button>
       <!--  <?php //} ?> -->
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <!-- <th>Price</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($lab_tests2 as $lab_test) { ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($lab_test->date_added)) ?></span></td>
                        <td><span class="list-name"><?php echo date('h:i:sa', strtotime($lab_test->date_added)) ?></span></td>
                        <!-- <td><?php echo $lab_test->lab_test_name;  ?></td> -->
                        <td><span class="list-name">
                                <?php if ($lab_test->status == "Pending") { ?>
                                    <span class="badge badge-warning"><?php echo $lab_test->status ?></span>
                                <?php } else if ($lab_test->status == "Treated") { ?>
                                    <span class="badge badge-success"><?php echo $lab_test->status ?></span>
                                <?php } else if ($lab_test->status == "Specimen") { ?>
                                    <span class="badge badge-primary"><?php echo $lab_test->status ?></span>
                                <?php } else if ($lab_test->status == "Review") { ?>
                                    <span class="badge badge-primary"><?php echo $lab_test->status ?></span>
                                <?php } else if ($lab_test->status == "Incomplete") { ?>
                                    <span class="badge badge-primary"><?php echo $lab_test->status ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_lab_test/' . $lab_test->lab_test_unique_id) ?>">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View  Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_lab_test/' . $lab_test->lab_test_unique_id) ?>">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-dark" type="button" onclick="delete_lab_test(<?php echo $lab_test->lab_test_unique_id ?>)">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>