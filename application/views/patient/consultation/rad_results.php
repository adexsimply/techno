<style>
#rad_results thead th, #rad_results tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
</style>
 <div class="tab-pane" id="rad_results">
     <h6>Radiological Results</h6>
         <table class="table table-bordered table-striped table-hover dataTable js-exportable">
             <thead class="thead-success">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Status</th>
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
                         <td><span class="list-name"><?php if ($radiology->status == "Pending") { ?>
                                                                            <span class="badge badge-warning"><?php echo $radiology->status ?></span>
                                                                        <?php } else if ($radiology->status == "Treated") { ?>
                                                                            <span class="badge badge-success"><?php echo $radiology->status ?></span>
                                                                        <?php }  ?></span></td>
                         <td>
                             <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Radiology Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('radiology/view_request/' . $radiology->id) ?>">
                                 <i class="fa fa-eye"></i>
                             </button>
                            <!--  <button class="btn btn-dark" type="button" onclick="delete_radiology(<?php echo $radiology->radiology_test_unique_id ?>)">
                                 <i class="fa fa-trash"></i>
                             </button> -->
                         </td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>