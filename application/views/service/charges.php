<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#serviceChargeTable thead th, #serviceChargeTable tbody td {
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
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Service Charges</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Service Charges</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Add New" href="<?php echo base_url('service/charges/add') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Add New
                        </button>

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover" id="serviceChargeTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Service Name</th>
                                            <th>Cost</th>
                                            <th>SubGroup</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($service_charges as $service) {
                                           // var_dump($service);

                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $service->item_name; ?></span></td>
                                                <td><span class="list-name"><?php echo $service->service_charge_cost; ?></span></td>
                                                <td><span class="list-name"><?php echo $service->subgroup_name; ?></span></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Edit <?php echo $service->item_name; ?>" href="<?php echo base_url('service/charges/' . $service->id) ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-dark" type="button" onclick="delete_service(<?php echo $service->id ?>)">
                                                        <i class="fa fa-trash"></i>
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

<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('service/script'); ?>