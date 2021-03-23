<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
<link src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Drugs List</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Drugs</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <!-- <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#drug" onclick="clear_textbox()">
                            <i class="icon wb-plus" aria-hidden="true"></i> Add Drug
                        </button> -->

                        <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add New" href="<?php echo base_url('setting/add_drug') ?>">
                            Add Drug
                        </button>

                        <!-- 
                <td><input type='text' class='name' id='name' ></td>
                <td><input type='text' class='email' id='email' ></td> -->

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="drugsListTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Drug</th>
                                            <th>Quantity</th>
                                            <th>Sale</th>
                                            <th>Cost</th>
                                            <th>Group</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($drug_list);
                                        $i = 1;
                                        foreach ($drug_list as $drug) {
                                            //var_dump($drug);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><a data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="<?php echo $drug->id; ?>" href="<?php echo base_url('setting/view_drug_details/' . $drug->id) ?>"><?php echo $drug->drug_item_name; ?></a></span></td>
                                                <td><?php echo $drug->quantity_in_stock; ?></td>
                                                <td><?php echo $drug->drug_sell; ?></td>
                                                <td><?php echo $drug->drug_cost; ?></td>
                                                <td><?php echo $drug->drug_group_name; ?></td>
                                                <td><input type="checkbox" name=""></td>
                                                <td>
                                                    <button class="badge badge-danger" type="button" onclick="delete_drug(<?php echo $drug->id; ?>)">
                                                        Delete
                                                    </button>
                                                    <button class="badge badge-primary" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="<?php echo $drug->drug_item_name; ?>" href="<?php echo base_url('setting/add_drug/' . $drug->id) ?>">
                                                        Edit
                                                    </button>
                                                    <button class="badge badge-success" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="<?php echo $drug->drug_item_name; ?>" href="<?php echo base_url('setting/view_drug_details/' . $drug->id) ?>">
                                                        View
                                                    </button>
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

<?php $this->load->view('setting/drug-script'); ?>
<?php $this->load->view('setting/script');?>
<?php $this->load->view('includes/footer_2'); ?>