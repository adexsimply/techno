<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Radiology Services</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Radiology Services</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Add New" href="<?php echo base_url('setting/services/add') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Add
                        </button>

                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Service Type</th>
                                            <th>Cost</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($doctors_list);
                                        $i = 1;
                                        foreach ($services as $service) {
                                            //var_dump($operation);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $service->type; ?></span></td>
                                                <td><span class="list-name"><?php echo $service->cost; ?></span></td>
                                                <td><span class="list-name"><?php $ini_date = date_create($service->date_added);
                                                                            echo date_format($ini_date, "D M d,Y h:i a"); ?></span></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Edit <?php echo $service->type; ?>" href="<?php echo base_url('setting/services/' . $service->id) ?>">
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
<?php $this->load->view('setting/services/script'); ?>