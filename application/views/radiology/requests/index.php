<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">

#main-content .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#main-content .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#main-content thead th, #main-content tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}

#patientSearchBill tr.selected {
    background-color: #e92929 !important;
    color:#fff;
    vertical-align: middle;
    padding: 1.5em;
}
#main-content .form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 1px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#main-content select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Radiology Requests & Results</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Requests & Results</h2>
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
                                                    <input type="date" placeholder="From" class="form-control" onchange="filter_rad_request()" id="date_range_from" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                                                   <!--  <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range"> -->
                                                </div>
                                                <div class="col-md-2"> 
                                                    <label>To</label>
                                                    <input type="date" class="form-control" onchange="filter_rad_request()" id="date_range_to" placeholder="From" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>"> 
                                                </div>


                                                <!-- Currency -->
                                                <div class="col-md-4">
                                                    <label for="currency">Status</label>
                                                    <select class="form-control select2" onchange="filter_rad_request()" name="currency" id="status">
                                                        <option value="all">All</option>
                                                        <option selected="" value="Pending">Pending</option>
                                                        <option value="Treated">Treated</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="currency">Search</label>
                                                   <input type="text" class="form-control" placeholder="Start Typing" id="radListSearch" name="">
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="radListTable">
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="radList">
                           <!--              <?php
                                        $i = 1;
                                        foreach ($rad_requests_list as $rad_request) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php $ini_date = date_create($rad_request->date_created);
                                                                            echo date_format($ini_date, "D M d, Y"); ?></span></td>
                                                <td><?php echo $rad_request->patient_title . " " . $rad_request->patient_name; ?></td>
                                                <td><?php echo $rad_request->patient_gender; ?></td>
                                                <td><?php echo $rad_request->patient_id_num; ?></td>
                                                <td><?php echo $rad_request->patient_status ?></td>
                                                <td><?php echo $rad_request->clinic_name ?></td>
                                                <td><?php echo $rad_request->staff_firstname . " " . $rad_request->staff_lastname; ?></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Request <?php echo $rad_request->patient_name; ?>" href="<?php echo base_url('radiology/view_request/' . $rad_request->request_id) ?>"><i class="fa fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        } ?> -->

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
<?php $this->load->view('radiology/requests/script'); ?>