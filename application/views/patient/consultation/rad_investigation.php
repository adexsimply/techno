 <div class="tab-pane" id="rad_investigation">
     <h6>Radiological Results</h6>
     <div class="tab-pane table-responsive" id="radiology">
         <button class="btn btn-success m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Radiology for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_radiology/' . $patient->vital_id) ?>">
             <i class="fa fa-plus-circle"></i> Add New
         </button>
         <table class="table table-bordered table-striped table-hover dataTable js-exportable">
             <thead class="thead-success">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1;
                    foreach ($radiologies as $radiology) { ?>
                     <tr>
                         <td><?php echo $i++ ?></td>
                         <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($radiology->date_added)) ?></span></td>
                         <td><span class="list-name"><?php echo date('h:i:sa', strtotime($radiology->date_added)) ?></span></td>
                         <td>
                             <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Radiology Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_radiology/' . $radiology->radiology_test_unique_id) ?>">
                                 <i class="fa fa-pencil"></i>
                             </button>
                             <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Radiology Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_radiology/' . $radiology->radiology_test_unique_id) ?>">
                                 <i class="fa fa-eye"></i>
                             </button>
                             <button class="btn btn-dark" type="button" onclick="delete_radiology(<?php echo $radiology->radiology_test_unique_id ?>)">
                                 <i class="fa fa-trash"></i>
                             </button>
                         </td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
 </div>