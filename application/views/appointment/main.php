<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    .ui-autocomplete {
  position: absolute;
  top: 100%;
  left: 0;
  float: left;
  display: none;
  min-width: 160px;
  _width: 160px;
  padding: 4px 0;
  margin: 2px 0 0 0;
  list-style: none;
  background-color: #ffffff;
  border-color: #ccc;
  border-color: rgba(0, 0, 0, 0.2);
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  *border-right-width: 2px;
  *border-bottom-width: 2px;

  .ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;

    &.ui-state-hover, &.ui-state-active {
      color: #ffffff;
      text-decoration: none;
      background-color: #0088cc;
      border-radius: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      background-image: none;
    }
  }
}
.ui-autocomplete {
z-index: 2150000000;
}
</style>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Appointments</h2>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2>Appointments</h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#addappointment" onclick="clear_textbox()">
                                <i class="icon wb-plus" aria-hidden="true"></i> Create Appointment
                            </button>

<!-- 
                <td><input type='text' class='name' id='name' ></td>
                <td><input type='text' class='email' id='email' ></td> -->
 
                            <!-- Tab panes -->
                            <div class="tab-content m-t-10 padding-0">
                                <div class="tab-pane table-responsive active show" id="All">
                           			 <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Hospital No</th>
                                                <th>Patient Name</th>
                                                <th>B/G</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Acc Status</th>
                                                <th>To See</th>
                                                <th>Status</th>
                                                <th>Vitals</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                             foreach ($appointment_list as $appointment) { 
                                                //var_dump($appointment);
                                                ?>
                                            <tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $appointment->patient_id_num; ?></span></td>
                                                <td><?php echo $appointment->patient_title." ".$appointment->patient_name;; ?></td>
                                                <td><?php echo $appointment->patient_blood_group; ?></td>
                                                <td><?php echo date_diff(date_create($appointment->patient_dob ), date_create('today'))->y; ?></td>
                                                <td><?php echo $appointment->patient_gender; ?></td>
                                                <td><?php echo $appointment->patient_status ?></td>
                                                <td><?php echo $appointment->staff_firstname; ?></td>
                                                <td><?php echo $appointment->appointment_status; ?></td>
                                                <td><?php 
                                                if (!empty($this->appointment_m->get_vitals_by_appointment_id($appointment->app_id)->vitals_request_status)){
                                                $vitals_request = $this->appointment_m->get_vitals_by_appointment_id($appointment->app_id)->vitals_request_status;
                                                echo $vitals_request;

                                                }
                                                else {
                                                    echo "Not Requested <button>Request</button>";

                                                } ?></td>
                                                <td><span class="badge badge-success"><a href="<?php echo base_url('patient/view/').$appointment->id; ?>">View Patient</a></span></td>
                                            </tr>
                                               <?php 
                                               $i++;
                                           } ?>
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
    
<?php $this->load->view('appointment/appointment-modal'); ?>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('appointment/script'); ?>