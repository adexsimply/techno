 <div class="tab-pane" id="general_exam">
     <h6>General Medical Examination Results</h6>

     <div class="tab-pane table-responsive active show" id="med">
         <button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Medical Report for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_med_report/' . $patient->vital_id) ?>">
             <i class="fa fa-plus-circle"></i> Add New
         </button>
         <table class="table table-bordered table-striped table-hover dataTable js-exportable">
             <thead class="thead-dark">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Doctor</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>

                     <?php $i = 1;
                        foreach ($med_reports as $med_report) {
                            //var_dump($med_report);
                        ?>
                 <tr>
                     <td><?php echo $i++ ?></td>
                     <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($med_report->date_added)) ?></span></td>
                     <td><span class="list-name"><?php echo date('h:i:sa', strtotime($med_report->date_added)) ?></span></td>
                     <td><span class="list-name"><?php echo $med_report->staff_firstname . " " . $med_report->staff_lastname . " " . $med_report->staff_middlename; ?></span></td>
                     <td>
                         <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_med_report/' . $med_report->med_report_id) ?>">
                             <i class="fa fa-pencil"></i>
                         </button>
                         <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Dental Clinic" href="<?php echo base_url('patient/view_med_report/' . $med_report->med_report_id) ?>">
                             <i class="fa fa-eye"></i>
                         </button>
                         <button class="btn btn-dark" type="button" onclick="delete_med_report(<?php echo $med_report->med_report_id ?>)">
                             <i class="fa fa-trash"></i>
                         </button>
                     </td>

                 </tr>
             <?php } ?>
             </tr>
             </tbody>
         </table>
     </div>

 </div>