 <div class="tab-pane" id="pdf_docs">
     <h6>PDF Docs</h6>
     <div class="tab-pane table-responsive" id="pdf">
         <button class="btn btn-success m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add PDF for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_pdf/' . $patient->vital_id) ?>">
             <i class="fa fa-plus-circle"></i> Add New
         </button>
         <table class="table m-b-0 table-hover">
             <thead class="thead-success">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Description</th>
                     <th>EntryBy</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
                     <td><span class="list-name">KU 00598</span></td>
                     <td>Daniel</td>
                     <td>32</td>
                     <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
                     <td>404-447-6013</td>
                 </tr>
             </tbody>
         </table>
     </div>

 </div>