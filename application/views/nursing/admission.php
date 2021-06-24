<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#admissionRequestTable thead th, #admissionRequestTable tbody td {
  font-size: 0.9em;
  padding: 1px !important;
  height: 15px;
}    
#admissionRequestTableOA thead th, #admissionRequestTableOA tbody td {
  font-size: 0.9em;
  padding: 1px !important;
  height: 15px;
}
</style>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Admission Register</h2>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <a class="btn btn-primary m-b-15 pull-right" onclick="admit_dialog(event)" data-type="black" data-size="l" data-title="Admission Register" href="<?php echo base_url('nursing/admit_patient/');?>"><i class="fa fa-wheelchair"></i> Add New</a>
                    <div class="card patients-list">
                        <div class="header">
                            <h2>Admission Register</h2>
                        </div>
                        <div class="body">

                            

                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Date and time range -->
                                                <div class="col-md-2">
                                                    <label>From</label>
                                                    <input type="date" placeholder="From" class="form-control" onchange="filter_admission()" id="date_range_from" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                                                   <!--  <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range"> -->
                                                </div>
                                                <div class="col-md-2"> 
                                                    <label>To</label>
                                                    <input type="date" class="form-control" onchange="filter_admission()" id="date_range_to" placeholder="From" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>"> 
                                                </div>


                                                <!-- Currency -->
                                           <!--      <div class="col-md-4">
                                                    <label for="currency">Clinic</label>
                                                    <select class="form-control select2" onchange="filter_admission()" name="currency" id="clinic_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($clinic_list as $clinic) { ?>
                                                            <option value="<?php echo $clinic->id ?>"><?php echo $clinic->clinic_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div> -->

                                                <div class="col-md-4">
                                                    <label for="status">Status</label>
                                                    <select onchange="filter_admission()" class="form-control select2" name="status" id="status">
                                                        <option value="all">All</option>
                                                        <option value="Pending" selected="">Pending</option>
                                                        <option value="On Admission">On Admission</option>
                                                        <option value="Discharged">Discharged</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
 
                            <!-- Tab panes -->
                            <div class="tab-content m-t-10 padding-0" id="pend">
                                <div class="tab-pane table-responsive active show" id="All">
                                     <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="admissionRequestTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Hospital No</th>
                                                <th>Account Status</th>
                                                <th>Clinic</th>
                                                <th>Sender</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="filtered_admission_requests">
                                            <?php 
                                            //var_dump($doctors_list);
                                            $i=1;
                                             foreach ($admission_requests_list as $operation) { 
                                                //var_dump($operation);
                                                ?>
                                         <!--    <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php  $ini_date = date_create( $operation->ad_date); echo date_format($ini_date,"D M d, Y");?></span></td>
                                                <td><?php echo $operation->patient_title." ".$operation->patient_name;; ?></td>
                                                <td><?php echo $operation->patient_gender; ?></td>
                                                <td><?php echo $operation->patient_id_num; ?></td>
                                                <td><?php echo $operation->patient_status ?></td>
                                                <td><?php echo $operation->clinic_name; ?></td>
                                                <td><span class="list-name"><?php echo $operation->staff_firstname; ?></span></td>
                                                <td><span class="badge badge-success"><a onclick="admit_dialog(event)" data-type="black" data-size="l" data-title="Admission Register" href="<?php echo base_url('nursing/admit_patient/'.$operation->admission_id);?>">Option</a></span></td>
                                            </tr> -->
                                               <?php 
                                               $i++;
                                           } ?>
                                        </tbody>
                                    </table>                            
                                </div>
                            </div>
                            <!-- Tab panes  OnAdmission Table-->
                            <div class="tab-content m-t-10 padding-0" id="OA" style="display: none;">
                                <div class="tab-pane table-responsive active show" id="All">
                                     <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="admissionRequestTableOA">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Admitted</th>
                                                <th>Discharged</th>
                                                <th>Name</th>
                                                <th>Hospital No</th>
                                                <th>Account Status</th>
                                                <th>Ward</th>
                                                <th>Diagnosis</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="filtered_admission_requestsOA">
                                        </tbody>
                                    </table>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('nursing/script'); ?>