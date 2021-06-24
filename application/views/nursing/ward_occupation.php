<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<style type="text/css">
    
#wardTable thead th, #wardTable tbody td {
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
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Ward Occupation Matrix</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Ward Occupation Matrix</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#takeVitals" onclick="ward_dialog(event)" data-type="black" data-size="m" data-title="New Ward" href="<?php echo base_url('nursing/add_ward') ?>">
                            <i class="fa fa-bed" aria-hidden="true"></i> Add New
                        </button>

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover" id="wardTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Ward Type</th>
                                            <th>DocNurseFee</th>
                                            <th>Utility</th>
                                            <th>Feeding</th>
                                            <th>WardRate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($wards_occupation_list as $service) {
                                           // var_dump($service);

                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $service->ward_name; ?></span></td>
                                                <td><?php echo $service->status; ?></td>
                                                <td><?php echo $service->ward_type_name; ?></td>
                                                <td><span class="list-name"><?php echo $service->doctor_nurse_fee; ?></span></td>
                                                <td><?php echo $service->utility; ?></td>
                                                <td><?php echo $service->feeding; ?></td>
                                                <td><?php echo $service->ward_rate; ?></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="ward_dialog(event)" data-type="black" data-size="m" data-title="Edit <?php echo $service->ward_name; ?>" href="<?php echo base_url('nursing/add_ward/' . $service->id) ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-dark" type="button" onclick="delete_ward(<?php echo $service->id ?>)">
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
<?php $this->load->view('nursing/script'); ?>