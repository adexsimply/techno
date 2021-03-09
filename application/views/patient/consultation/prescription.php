<div class="tab-pane" id="prescription">

    <?php if ($patient->appointment_id != NULL && $prescriptions == Null) { ?>
        <button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Prescription for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_prescription/' . $patient->vital_id) ?>">
            <i class="fa fa-plus-circle"></i> Add New
        </button>
    <?php } ?>
    <table class="table m-b-0 table-hover">
        <thead class="thead-warning">
            <tr>
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($prescriptions as $prescription) { ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($prescription->date_added)) ?></span></td>
                    <td><span class="list-name"><?php echo date('h:i:sa', strtotime($prescription->date_added)) ?></span></td>
                    <td><span class="list-name">
                            <?php if ($prescription->status == "Pending") { ?>
                                <span class="badge badge-warning"><?php echo $prescription->status ?></span>
                            <?php } else if ($prescription->status == "Treated") { ?>
                                <span class="badge badge-success"><?php echo $prescription->status ?></span>
                            <?php } else if ($prescription->status == "Prescription") { ?>
                                <span class="badge badge-primary"><?php echo $prescription->status ?></span>
                            <?php } ?>
                    </td>
                    <td>
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription2/' . $prescription->prescription_unique_id) ?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <!-- <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription/' . $prescription->prescription_unique_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button> -->
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_prescription/' . $prescription->prescription_unique_id) ?>">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-dark" type="button" onclick="delete_prescription(<?php echo $prescription->prescription_unique_id ?>)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>