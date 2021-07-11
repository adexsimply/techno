<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#patientListTable thead th, #patientListTable tbody td {
  font-size: 0.89em;
  padding: 1px !important;
  height: 15px;
}
</style>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Patients</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <a class="btn btn-primary m-b-15 pull-right" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="Add New Patient" href="<?php echo base_url('patient/add_patient') ?>"><i class="fa fa-wheelchair"></i> Add Patient</a>
                <div class="card patients-list">
                    <div class="body">
                        <!-- Nav tabs -->

                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="card patients-list">
                                    
                                    <div class="body">               
                                        <div class="box">
                                            <div class="box-body">
                                                <form class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <!-- Date and time range -->
                                                                <!-- Currency -->
                                                                <div class="col-md-6">
                                                                    <label for="currency">Status</label>
                                                                    <select class="form-control select2" name="currency" id="status">
                                                                        <option value="All">All</option>
                                                                            <option selected="" value="Active">Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="currency">Search</label>
                                                                   <input type="text" class="form-control" placeholder="Start Typing" id="patientListSearch" name="">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Tab panes -->
                                        <div class="tab-content m-t-10 padding-0">
                                            <div class="tab-pane table-responsive active show" id="All">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="patientListTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Title</th>
                                                            <th>Patient Name</th>
                                                            <th>Hosp. NO</th>
                                                            <th>Age</th>
                                                            <th>Sex</th>
                                                            <th>Acc Status</th>
                                                            <th>MobileNo</th>
                                                            <th>RegDate</th>
                                                            <th>Active</th>
                                                            <th>Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        foreach ($patients_list as $patient_list) { ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <!-- <td><span class="list-icon"><img class="patients-img" src="<?php echo base_url('uploads/') . $patient_list->patient_photo; ?>" alt=""></span></td> -->
                                                                <td><?php echo $patient_list->title; ?></td>
                                                                <td><?php echo $patient_list->patient_name; ?></td>
                                                                <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                                                <td><?php echo date_diff(date_create($patient_list->patient_dob), date_create('today'))->y; ?></td>
                                                                <td><?php echo $patient_list->patient_gender; ?></td>
                                                                <td><?php echo $patient_list->patient_status ?></td>
                                                                <td><?php echo $patient_list->patient_phone; ?></td>
                                                                <td><?php
                                                                $date = date_create($patient_list->date_added);
                                                                 echo date_format($date, 'Y/m/d'); ?></td>
                                                                <td><?php if($patient_list->status==0) { echo "<span class='badge badge-danger'>Inactive</span>";}  else {echo "<span class='badge badge-success'>Active</span>"; } ?></td>
                                                                <td> 
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-secondary" title="View Patient" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="<?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('patient/view/') . $patient_list->p_id; ?>"><i class="icon-eye" aria-hidden="true"></i></button>
                                                                    <button title="Edit Patient" class="btn btn-sm btn-icon btn-pure btn-info" onclick="shiEdit(event)" data-type="purple" data-size="xl" data-title="Edit <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('patient/add_patient/' . $patient_list->p_id); ?>"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
                                                                   <!--  <button title="Discontinue Patient" class="btn btn-sm btn-icon btn-pure btn-danger" onclick="delete_patient(<?php echo $patient_list->p_id; ?>)"><i class="icon-ban"></i></button> -->
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
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
<?php $this->load->view('menu/menu-modal'); ?>
<?php $this->load->view('menu/submenu-modal'); ?>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('patient/script2'); ?>
<script type="text/javascript">
    
$(document).ready(function () {

     var patientListTable =  $('#patientListTable').DataTable({
            dom: 'lrtip',
            "lengthChange": false
        });
     var regex = '^Active$';
    patientListTable.columns(9).search(regex,true,false).draw();
    $('#patientListSearch').on( 'keyup', function () {
        patientListTable.search( this.value ).draw();
    } );
    $('#status').on('change', function () {
        if (this.value =="All") {
          var regex2 = "";
        }
        else {
        var regex2 = '^'+this.value+'$';
        }
        patientListTable.columns(9).search(regex2,true,false ).draw();
    } );

});
</script>