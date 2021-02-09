<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Patients</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <a class="btn btn-primary m-b-15 pull-right" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="Add New Patient" href="<?php echo base_url('patient/add_patient') ?>"><i class="fa fa-wheelchair"></i> Add Patient</a>
                <div class="card patients-list">
                    <div class="header">
                        <h2>Patients List</h2>
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
                                            <th>Title</th>
                                            <th>Patient ID</th>
                                            <th>Patient Name</th>
                                            <th>Blood Group</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Acc Status</th>
                                            <th>Contact</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($patients_list as $patient_list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <!-- <td><span class="list-icon"><img class="patients-img" src="<?php echo base_url('uploads/') . $patient_list->patient_photo; ?>" alt=""></span></td> -->
                                                <td><?php echo $patient_list->patient_title; ?></td>
                                                <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                                <td><?php echo $patient_list->patient_name; ?></td>
                                                <td><?php echo $patient_list->patient_blood_group; ?></td>
                                                <td><?php echo date_diff(date_create($patient_list->patient_dob), date_create('today'))->y; ?></td>
                                                <td><?php echo $patient_list->patient_gender; ?></td>
                                                <td><?php echo $patient_list->patient_status ?></td>
                                                <td><?php echo $patient_list->patient_phone; ?></td>
                                                <td>
                                                   <!--  <span class="badge badge-success"><a href="<?php echo base_url('patient/view/') . $patient_list->p_id; ?>">View More</a></span> -->
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="xl" data-title="<?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('patient/view/') . $patient_list->p_id; ?>"><i class="icon-eye" aria-hidden="true"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiEdit(event)" data-type="purple" data-size="xl" data-title="Edit <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('patient/add_patient/' . $patient_list->p_id); ?>"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addstaff"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="delete_patient(event)" data-type="purple" data-size="xl" data-title="Edit <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('patient/add_patient/' . $patient_list->p_id); ?>"><i class="icon-trash" aria-hidden="true" data-toggle="modal" data-target="#deletestaff"></i></button>
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