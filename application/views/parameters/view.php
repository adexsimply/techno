<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div id="main-content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><?php echo $parameter_details->name  ?></h2>
                        <button class="btn btn-sm btn-primary mt-3" data-toggle="modal" data-target="#create">Add New</button>

                        <!-- Modal -->
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New <?php echo $parameter_details->name  ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add-sub-params" onsubmit="return false;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="hidden" name="parameter_id" value="<?php echo $parameter_details->id  ?>">
                                                <input type="text" class="form-control" name="name" aria-describedby="" value="" placeholder="Enter Name">
                                                <code style="color: #ff0000;" class="form-control-feedback" data-field="name"></code>
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                            </div>
                                            <button type="button" onclick="form_routes_add('add_sub_params')" title="add_sub_params" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="5%">S/N</th>
                                        <th>Name</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($sub_parameters) && $sub_parameters != null) { ?>
                                        <?php foreach ($sub_parameters as $sub_parameter) { ?>
                                            <tr>
                                                <td><?php echo $sn++ ?></td>
                                                <td><?php echo $sub_parameter->name ?></td>
                                                <td class="text-center">
                                                    <span data-toggle="modal" data-target="#edit<?php echo $sub_parameter->id ?>" class="badge badge-success" style="cursor:pointer">Edit</span>
                                                    <span data-toggle="modal" data-target="#delete<?php echo $sub_parameter->id ?>" class="badge badge-warning" style="cursor:pointer">Delete</span>
                                                </td>
                                            </tr>


                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?php echo $sub_parameter->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $sub_parameter->name ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="update_sub_parameter<?php echo $sub_parameter->id  ?>" onsubmit="update_sub_parameter(<?php echo $sub_parameter->id  ?>); return false;">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input type="hidden" name="parameter_id" value="<?php echo $parameter_details->id  ?>">
                                                                    <input type="hidden" value="<?php echo $sub_parameter->id ?>" name="id">
                                                                    <input type="text" class="form-control" name="update_name" id="update_name" aria-describedby="emailHelp" value="<?php echo $sub_parameter->name ?>">
                                                                    <code style="color: #ff0000;" class="form-control-feedback" data-field="update_name"></code>
                                                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?php echo $sub_parameter->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h4 class="text-center mt-3">Are you sure you want to delete <?php echo $sub_parameter->name ?>?</h4>
                                                            <div class="text-center mb-3">
                                                                <form method="POST" action="<?= base_url('/parameters/delete_sub_parameter') ?>">
                                                                    <input type="hidden" name="parameter_id" value="<?php echo $parameter_details->id  ?>">
                                                                    <input type="hidden" value="<?php echo $sub_parameter->id ?>" name="id">
                                                                    <input type="hidden" value="<?php echo $sub_parameter->parameter_id ?>" name="parameter_id">
                                                                    <button type="submit" class="btn btn-danger badge-danger mr-2">Delete</button>
                                                                </form>
                                                                <button type="submit" class="btn btn-warning badge-warning ml-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('parameters/create_sub_script'); ?>
<?php $this->load->view('parameters/update_sub_parameter'); ?>