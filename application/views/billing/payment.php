<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" rel="stylesheet">
<style type="text/css">
    
#paymentListTable thead th, #paymentListTable tbody td {
//font-size: 0.6em;
  padding: 1px !important;
  height: 15px;
}
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Payment</h2>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2>Raise Receipts</h2>
                        </div>
                        <div class="body">               <div class="box">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Date and time range -->
                                                <div class="col-md-2">
                                                    <label>From</label>
                                                    <input type="date" placeholder="From" class="form-control" onchange="filter_payment_list()" id="date_range_from" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
                                                   <!--  <input type="" class="form-control" name="dates" placeholder="Select Date Range" onchange="filter_vitals()" id="date_range"> -->
                                                </div>
                                                <div class="col-md-2"> 
                                                    <label>To</label>
                                                    <input type="date" class="form-control" onchange="filter_payment_list()" id="date_range_to" placeholder="From" name="" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>"> 
                                                </div>


                                                <!-- Currency -->
                                                <div class="col-md-4">
                                                    <label for="currency">Status</label>
                                                    <select class="form-control select2" onchange="filter_payment_list()" name="currency" id="status">
                                                        <option value="all">All</option>
                                                            <option selected="" value="Pending">Pending</option>
                                                            <option value="Paid">Paid</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="currency">Search</label>
                                                   <input type="text" class="form-control" placeholder="Start Typing" id="paymentListSearch" name="">
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
                           			 <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="paymentListTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Hospital Number</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="paymentList">
                                            <!--Prescription Lists from Ajax call shows here-->
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
    
<?php $this->load->view('billing/script'); ?>
<?php $this->load->view('includes/footer_2'); ?>