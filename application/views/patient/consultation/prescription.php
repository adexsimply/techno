<style type="text/css">
   #prescription {
        font-size: 13px;
    }
   #prescription .tab-content {
     padding: 1px; 

}
.mb-3, .my-3 {
     margin-bottom: 0!important; 
}

#prescription .form-control {
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
#prescription .table td, #prescription  .table th {
    padding: 1px;
    }
</style>
<div class="tab-pane" id="prescription" style="min-height: 350px;">
<?php //var_dump($patient); ?>
<input hidden="" type="text" id="patient_id2" value="<?php echo $patient->patient_id; ?>" name="">
<input hidden="" type="text" id="vital_id" value="<?php echo $patient->vital_id; ?>" name="">
    <?php //if ($patient->appointment_id != NULL && $prescriptions == Null) { ?>
        <button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="prescription_dialog(event)" data-title="Prescription for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_prescription/' . $patient->vital_id) ?>">
            <i class="fa fa-plus-circle"></i> Add New Prescription
        </button>
    <?php //} ?>
    <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table m-b-0 table-hover">
        <thead class="thead-warning">
            <tr>
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tr>
        </thead>
        <tbody id="prescriptionsList">

        </tbody>
    </table>
</div>
