<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div id="main-content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Parameter</h2>
                        <button class="btn btn-sm btn-primary mt-3" data-toggle="modal" data-target="#create">Add New</button>

                        <!-- Modal -->
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Parameter</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add-params" onsubmit="return false;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="" placeholder="Enter Name">
                                                <code style="color: #ff0000;" class="form-control-feedback" data-field="name"></code>
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                            </div>
                                            <button type="button" onclick="form_routes_add('add_params')" title='add_params' class="btn btn-primary">Submit</button>
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
                                    <?php if (isset($parameters_list) && $parameters_list != null) { ?>
                                        <?php foreach ($parameters_list as $parameter) { ?>
                                            <tr>
                                                <td><?php echo $sn++ ?></td>
                                                <td><a href="<?php base_url() ?>parameters/view/<?php echo $parameter->id ?>"><?php echo $parameter->name ?></a></td>
                                                <td class="text-center">
                                                    <a class="badge badge-success" style="cursor:pointer" href="<?php base_url() ?>parameters/view/<?php echo $parameter->id ?>">View</a>
                                                    <span data-toggle="modal" data-target="#edit<?php echo $parameter->id ?>" class="badge badge-success" style="cursor:pointer">Edit</span>
                                                    <span data-toggle="modal" data-target="#delete<?php echo $parameter->id ?>" class="badge badge-warning" style="cursor:pointer">Delete</span>
                                                </td>
                                            </tr>


                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?php echo $parameter->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $parameter->name ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="update_form_now<?php echo $parameter->id ?>" onsubmit="update(<?php echo $parameter->id ?>); return false;">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input type="hidden" value="<?php echo $parameter->id ?>" id="id" name="id">
                                                                    <input type="text" class="form-control" name="update_name" id="update_name" aria-describedby="emailHelp" value="<?php echo $parameter->name ?>">
                                                                    <code style="color: #ff0000;" class="form-control-feedback_update" data-field="update_name"></code>
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
                                            <div class="modal fade" id="delete<?php echo $parameter->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h4 class="text-center mt-3">Are you sure you want to delete <?php echo $parameter->name ?> and it Sub Parameters?</h4>
                                                            <div class="text-center mb-3">
                                                                <form method="POST" action="<?= base_url('/parameters/delete_parameter') ?>">
                                                                    <input type="hidden" value="<?php echo $parameter->id ?>" name="id">
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
<?php $this->load->view('parameters/create_script'); ?>
<?php $this->load->view('parameters/update_script'); ?>