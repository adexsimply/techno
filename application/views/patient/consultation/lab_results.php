 <div class="tab-pane" id="lab_results">
     <div class="tab-pane table-responsive active show" id="laboratory">
         <h6>Laboratory Results</h6>
         <button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Laboratory for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_lab/' . $patient->vital_id) ?>">
             <i class="fa fa-plus-circle"></i> Add New
         </button>
         <?php //var_dump($lab_tests)
            ?>
         <table class="table table-bordered table-striped table-hover dataTable js-exportable mb-4">
             <thead class="thead-dark">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1;
                    foreach ($lab_tests as $lab_test) { ?>
                     <tr>
                         <td><?php echo $i++ ?></td>
                         <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($lab_test->date_added)) ?></span></td>
                         <td><span class="list-name"><?php echo date('h:i:sa', strtotime($lab_test->date_added)) ?></span></td>
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