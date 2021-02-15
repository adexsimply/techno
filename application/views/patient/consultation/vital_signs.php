 <div class="tab-pane" id="vital_signs">
     <h6>Vital Signs</h6>
     <div class="tab-content m-t-10 padding-0">
         <div class="tab-pane table-responsive active show" id="All">
             <table id="employeeListing" class="table table-hover js-basic-example dataTable">
                 <thead class="thead-dark">
                     <tr>
                         <th>S/N</th>
                         <th>Date</th>
                         <th>Time</th>
                         <th>Name</th>
                         <th>Sex</th>
                         <th>Hospital No</th>
                         <th>Account Status</th>
                         <th>Clinic</th>
                         <th>Doctor To See</th>
                         <th>Vital Status</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody id="filtered_vitals">

                     <?php

                        $i = 1;
                        foreach ($vitals_list as $appointment) {

                        ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><span class="list-name"><?php echo date('jS \of M Y', strtotime($appointment->appointment_date)) ?></span></td>
                             <td><span class="list-name"><?php echo date('h:i:s A', strtotime($appointment->appointment_time)) ?></span></td>
                             <td><?php echo $appointment->patient_title . " " . $appointment->patient_name; ?></td>
                             <td><?php echo $appointment->patient_gender; ?></td>
                             <td><?php echo $appointment->patient_id_num; ?></td>
                             <td><?php echo $appointment->patient_status ?></td>
                             <td><?php echo $appointment->clinic_name; ?></td>
                             <td></td>

                             <td><span class="badge badge-warning">Pending</span></td>
                             <td>
                                 <?php if ($appointment->vital_id) { ?>
                                     <span class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" style="font-weight:bolder" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Edit Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/edit_vital/' . $appointment->id); ?>" style="cursor: pointer;">Edit Vitals</span>
                                     <span class="btn btn-sm btn-icon btn-pure btn-warning on-default m-r-5 button-edit" style="font-weight:bolder" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/view_vital/' . $appointment->id); ?>" style="cursor: pointer;">View Vitals</span>
                                     <span class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" style="font-weight:bolder" onclick="delete_vital_now(<?php echo $appointment->vital_id ?>)" style="cursor: pointer;">Delete Vitals</span>
                                 <?php  } else { ?>
                                     <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for <?php echo $appointment->patient_name; ?>" href="<?php echo base_url('nursing/take_vital/' . $appointment->app_id); ?>">
                                         <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                                     </button>

                                 <?php } ?>
                             </td>
                         </tr>

                     <?php
                            $i++;
                        } ?>
                 </tbody>
             </table>
         </div>
     </div>

 </div>