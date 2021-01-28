<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Retainers</h2>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
            <a class="btn btn-primary m-b-15 pull-right" onclick="shiNew(event)" data-type="purple" data-size="l" data-title="New Retainer" href="<?php echo base_url('retainer/add_retainer') ?>"><i class="icon-notebook"></i> Add Retainer</a>
                    <div class="card patients-list">
                        <div class="header">
                            <h2>Retainers List</h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                                
                            <!-- Tab panes -->
                            <div class="tab-content m-t-10 padding-0">
                                <div class="tab-pane table-responsive active show" id="All">
                           			 <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Phone</th>
                                                <th>Bill Group</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Contract Date</th>
                                                <th>Has Pricelist</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                             foreach ($retainers_list as $retainer) { ?>
                                            <tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><?php echo $retainer->retainer_name; ?></td>
                                                <td><span class="list-name"><?php echo $retainer->retainer_contact; ?></span></td>
                                                <td><?php echo $retainer->retainer_phone; ?></td>
                                                <td><?php echo $retainer->bill_group; ?></td>
                                                <td><?php echo $retainer->retainer_email; ?></td>
                                                <td><?php echo $retainer->retainer_address; ?></td>
                                                <td><?php echo date_diff(date_create($retainer->contract_date), date_create('today'))->y; ?></td>
                                                <td><input type="checkbox" name=""></td>
                                                <td>
                                                    <!-- <span class="badge badge-success"><a href="<?php echo base_url('retainer/view/').$retainer->id; ?>">View More</a></span>  -->
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiEdit(event)" data-type="purple" data-size="l" data-title="Edit <?php echo $retainer->retainer_name; ?>" href="<?php echo base_url('retainer/view/').$retainer->id; ?>"><i class="icon-eye" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiEdit(event)" data-type="purple" data-size="l" data-title="Edit <?php echo $retainer->retainer_name; ?>" href="<?php echo base_url('retainer/add_retainer/'.$retainer->id); ?>"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="l" data-title="Manage Price for <?php echo $retainer->retainer_name; ?>" href="<?php echo base_url('retainer/manage_price/'.$retainer->id); ?>"><i class="fa fa-money" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-delete" onclick="delete_patient(event)" data-type="purple" data-size="xl" data-title="Edit <?php echo $retainer->retainer_name; ?>" href="<?php echo base_url('patient/add_patient/'.$retainer->id); ?>"><i class="icon-trash" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
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
<?php $this->load->view('menu/menu-modal'); ?>
<?php $this->load->view('menu/submenu-modal'); ?>
<?php $this->load->view('includes/footer_2'); ?>