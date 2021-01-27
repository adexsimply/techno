<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Users</h2>

                    </div>      

                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                            <button class="btn btn-primary m-b-15 pull-right" type="button" onclick="shiNew(event)" data-type="purple" data-size="s" data-title="Add New User" href="<?php echo base_url('staff/new_user') ?>"></i> Add New
                            </button>
                    <div class="card">

                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Office</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Office</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach ($users_list as $user) { ?>
                                    <tr class="gradeA">
                                        <td><?php echo $i; ?></td>
                                        <td><?php if ($user->user_id==NULL) { echo $user->fullname; } else {  echo $user->staff_lastname.', '.$user->staff_firstname; } ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->staff_gender; ?></td>
                                        <td><?php echo $user->role_name; ?></td>
                                        <td class="actions">
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                             onclick="shiEdit(event)" data-type="purple" data-size="s" data-title="Edit <?php echo $user->staff_lastname.', '.$user->staff_firstname; ?>" href="<?php echo base_url('staff/new_user/'.$user->id); ?>"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                            data-toggle="tooltip" data-original-title="Remove" onclick="delete_user('<?php echo $user->id; ?>')"><i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('login/script'); ?>