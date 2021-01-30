<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Roles</h2>
                    <!--  <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active">Jquery Datatable</li>
                        </ul> -->
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 text-right">

                    <button class="btn btn-primary m-b-15 pull-right" type="button" onclick="shiNew(event)" data-type="purple" data-size="s" data-title="Add New Staff" href="<?php echo base_url('staff/new_staff') ?>">
                        <i class="icon-users" aria-hidden="true"></i> Add Staff
                    </button>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12">
                <!-- <button class="btn btn-primary m-b-15 pull-right" type="button" onclick="shiNew(event)" data-type="purple" data-size="s" data-title="Add New Staff" href="<?php echo base_url('staff/new_staff') ?>">
                                <i class="icon-users" aria-hidden="true"></i> Add Staff
                            </button> -->
                <div class="card">
                    <div class="body">
                        <table class="table table-bordered table-hover table-striped" cellspacing="0" id="staffListing">
                            <thead>
                                <tr>
                                    <th style="max-width:10px;">S/N</th>
                                    <th style="max-width:15px;">Title</th>
                                    <th><i class="fa fa-vcard" aria-hidden="true"></i> Name</th>
                                    <th><i class="fa fa-mars-stroke-v" aria-hidden="true"></i> Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th style="width: 1%">Can&nbsp;Consult</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="listStaff">
                                <?php
                                $i = 1;
                                foreach ($staff_list as $staff) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $staff->staff_title; ?></td>
                                        <td><?php echo $staff->staff_lastname . ", " . $staff->staff_middlename . " " . $staff->staff_firstname; ?></td>
                                        <td><?php echo $staff->staff_gender; ?></td>
                                        <td><?php echo $staff->staff_phone; ?></td>
                                        <td><?php echo $staff->staff_email; ?></td>
                                        <td><?php echo $staff->staff_state; ?></td>
                                        <td><?php echo $staff->can_consult; ?></td>
                                        <td class="actions">
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit" onclick="get_staff_data('<?php echo $staff->s_id; ?>')"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></a></button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove" onclick="delete_role_name('<?php echo $staff->s_id; ?>')"><i class="icon-trash" aria-hidden="true"></i></a></button>
                                            <!-- <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove" onclick="delete_role_name('<?php echo $staff->s_id; ?>')"><i class="icon-trash" aria-hidden="true"></i></a></button> -->
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('staff/script'); ?>