<style type="text/css">
   #prescriptionNew {
        font-size: 13px;
    }
   #prescriptionNew .tab-content {
     padding: 1px; 

}
.mb-3, .my-3 {
     margin-bottom: 0!important; 
}

#prescriptionNew .form-control {
    display: block;
    width: 100%;
     height: auto; 
    padding: 1%;
    font-size: 13px;
    font-weight: 400;
    line-height: 0.5;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#prescriptionNew .table td, #prescriptionNew  .table th {
    padding: 1px;
    }
</style>
<div class="col-12" id="prescriptionNew">
    <div class="card box-margin">
        <div class="card-body" style="padding: 1px;">

            <form id="add-prescription">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($vital_details)
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                                <div id="items_prescription">

                                    <?php if (isset($patient_prescription_tests) && $patient_prescription_tests != null) {
                                        //var_dump($patient_prescription_tests);
                                        foreach ($patient_prescription_tests as $patient_prescription_test) {
                                            echo "<input type='hidden' name='prescription_id[]' value='" . $patient_prescription_test->prescription_id . "' id='test_prescription" . $patient_prescription_test->prescription_id . "'>";
                                        }
                                    }
                                    ?>
                                </div>
                                <?php if ($this->uri->segment(3) && isset($vital_details->prescription_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="edit_prescription_id" value="<?php echo $vital_details->prescription_unique_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                    <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                    <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                    <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                <?php } ?>

                                <input type="" class="form-control date" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                echo date('jS \of F Y', strtotime($vital_details->date));
                                                                                            } else {
                                                                                                echo date('d M Y');
                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                        echo $vital_details->patient_id_num;
                                                                                                    } else {
                                                                                                        echo $vital_details->patient_id_num;
                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Age</b>
                            <div class="input-group">
                                <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                        echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                    } else {
                                                                                                        echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                    } ?> years">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <b>Sex</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_gender)) {
                                                                                            echo $vital_details->patient_gender;
                                                                                        } else {
                                                                                            echo $vital_details->patient_gender;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_name)) {
                                                                                            echo $vital_details->patient_name;
                                                                                        } else {
                                                                                            echo $vital_details->patient_name;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Clinic</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->clinic_name)) {
                                                                                            echo $vital_details->clinic_name;
                                                                                        } else {
                                                                                            echo $vital_details->clinic_name;
                                                                                        } ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset style="margin-top: 20px;">
                                <div class="text-center mb-2">
                                    <code style="color: #ff0000;font-size: 13px;" class="text-center form-control-feedback" data-field="prescription_id[]"></code>
                                </div>
                                <legend style="font-size: 15px;"><strong>Choose Drug</strong>
                                    <input type="text" class="form-control" id="mySearch" placeholder="Start typing a drug name"></legend>
                                <div class="body" style="max-height: 200px; overflow: scroll; padding: 0;">


                                    <div class="dataTables_wrapper no-footer" id="example_wrapper">

                                        <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table table-bordered" id="example_prescription_filter">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Drug Name</th>
                                                    <th>QtyinStock</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($drugs as $drug) {

                                                ?>
                                                    <tr <?php if ($drug->quantity_in_stock == 0) { ?> style="background-color:#FF0000" <?php } ?>>
                                                        <td><?php echo $drug->drug_item_name; ?></td>
                                                        <td><?php echo $drug->quantity_in_stock; ?></td>
                                                        <td><button type="button" data-app="<?php echo $vital_details->appointment_id ?>" class="btn btn-outline-success" <?php if ($drug->quantity_in_stock == 0) { ?> disabled <?php } ?> onclick="add_prescription(this, <?php echo $drug->id; ?>)">
                                                                <span class="sr-only">Add</span><i class="fa fa-plus"></i></button></td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset>
                                <legend style="font-size: 15px;"><strong>My Prescription</strong></legend>
                                <div class="body" style="max-height: 200px; overflow: scroll;padding: 0;">
                                    <div class="table-responsive">
                                        <table id="testTable_prescription" class="table table-bordered table-striped table-hover dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Drug Name</th>
                                                    <th>My Prescription</th>
                                                    <!-- <th>Drug Expiry Date</th>
                                                    <th>Price</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($patient_prescriptions) && $patient_prescriptions != null) {
                                                    // var_dump($patient_prescriptions);
                                                    foreach ($patient_prescriptions as $patient_prescription_test) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $patient_prescription_test->drug_item_name; ?></td>
                                                            <td></td>
                                                            <!--  <td><?php echo $patient_prescription_test->drug_expiry_date; ?></td>
                                                            <td><span class='text-success'>₦<?php echo $drug->drug_cost; ?></span></td> -->
                                                            <td><button type='button' onclick='testDelete_prescription(this, <?php echo $patient_prescription_test->prescription_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!--  <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset>
                                <legend><b>My Prescription</b></legend>
                                <textarea class="form-control" id="textarea" name="prescription" rows="7"><?php if ($this->uri->segment(3) && isset($patient_prescriptions)) {
                                                                                                                echo $patient_prescriptions[0]->prescription;
                                                                                                            } ?></textarea>
                                <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="prescription"></code>
                            </fieldset>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_prescription('add_prescription')" title="add_prescription">Save</button>
                </div> -->
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('patient/all_script'); ?>
