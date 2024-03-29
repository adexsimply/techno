<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#employeeListing thead th, #employeeListing tbody td {
  font-size: 0.89em;
  padding: 1px !important;
  height: 15px;
}
</style>
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" rel="stylesheet">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2> Vital Signs</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
               <!--      <?php //var_dump($this->session->userdata('active_user')); 
                    ?>
                    <div class="header">
                        <h2>Vital Signs</h2>
                        <?php //echo $this->session->userdata('active_user')->role_id 
                        ?>
                    </div> -->
                    <div class="body">
                        <!-- Nav tabs -->
                        <!--    <button class="btn btn-primary m-b-15" type="button" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="Appointment List" href="<?php echo base_url('nursing/vital_appointments') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button> -->
                        <!-- <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="clear_textbox()">
                            <i class="icon wb-plus" aria-hidden="true"></i> Take Vitals
                        </button> -->

                        <!-- Tab panes -->

                        <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Date and time range -->
                                                <div class="col-md-2">
                                                    <label>From</label>
                                                    <input type="date" placeholder="From" class="form-control" onchange="filter_vitals()" id="date_range_from" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                                                   <!--  <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range"> -->
                                                </div>
                                                <div class="col-md-2"> 
                                                    <label>To</label>
                                                    <input type="date" class="form-control" onchange="filter_vitals()" id="date_range_to" placeholder="From" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>"> 
                                                </div>


                                                <!-- Currency -->
                                                <div class="col-md-4">
                                                    <label for="currency">Clinic</label>
                                                    <select class="form-control select2" onchange="filter_vitals()" name="currency" id="clinic_id">
                                                        <option value="all" selected>All</option>
                                                        <?php foreach ($clinic_list as $clinic) { ?>
                                                            <option value="<?php echo $clinic->id ?>"><?php echo $clinic->clinic_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="status">Status</label>
                                                    <select onchange="filter_vitals()" class="form-control select2" name="status" id="status">
                                                        <option value="all">All</option>
                                                        <option value="Pending" selected="">Pending</option>
                                                        <option value="Treated">Treated</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php //var_dump($vitals_list); ?>
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
<?php $this->load->view('nursing/edit_vital'); ?>
<?php $this->load->view('nursing/script'); ?>
<?php $this->load->view('includes/footer_2'); ?>