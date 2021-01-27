<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Menus</h2>
                       <!--  <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active">Jquery Datatable</li>
                        </ul> -->
                    </div>            
               <!--      <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small>Visitors</small>
                                <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                            </div>
                            <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Visits</small>
                                <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Chats</small>
                                <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                            </div>
                            <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                        </div>
                    </div> -->
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>Departments</h2>                       
                        </div> -->
                        <div class="body">
                            <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#addmenu" onclick="clear_textbox()">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add Menu
                            </button>

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>Parent Menus</h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover m-b-0">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Menu Name</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $i=1;
                                                            foreach ($menu_list as $menu) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $i; ?>
                                                                </td>
                                                                <td> 
                                                                   <a href="<?php echo base_url('menu/view/').$menu->id; ?>"> <?php echo $menu->menu_parent_name; ?></a>
                                                                </td>
                                                                <td class="text-right">
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                                    data-toggle="tooltip" data-original-title="Edit" onclick="get_menu_data('<?php echo $menu->id; ?>')"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addcontact"></i></a>
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                                    data-toggle="tooltip" data-original-title="Remove" onclick="delete_menu_name('<?php echo $menu->id; ?>')"><i class="icon-trash" aria-hidden="true"></i></a>
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-original-title="Remove" data-toggle="modal" data-target="#addsubmenu" onclick="get_menu_id(<?php echo $menu->id ?>)"><i class="icon-plus" aria-hidden="true"></i> Add Sub-Menu</a>

                                                                </td>
                                                            </tr>
                                                         <?php $i++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>Sub-Menus</h2>
                                            </div>
                                            <?php if ($this->uri->segment(3)) { ?>
                                            <div class="body">
                                                <div class="table-responsive social_media_table">   
                                                    <table class="table table-hover m-b-0">
                                                        <thead>
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Menu Name</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $j=1;
                                                            foreach ($menu_child_list as $menu_child) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $j; ?>
                                                                </td>
                                                                <td> 
                                                                   <a href="<?php echo base_url('menu/view/').$menu->id; ?>"> <?php echo $menu_child->menu_child_name; ?></a>
                                                                </td>
                                                                <td class="text-right">
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                                    data-toggle="tooltip" data-original-title="Edit" onclick="get_menu_child_data('<?php echo $menu_child->id; ?>')"><i class="icon-pencil" aria-hidden="true" data-toggle="modal" data-target="#addcontact"></i></a>
                                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                                    data-toggle="tooltip" data-original-title="Remove" onclick="delete_menu_child_name('<?php echo $menu_child->id; ?>')"><i class="icon-trash" aria-hidden="true"></i></a>

                                                                </td>
                                                            </tr>
                                                         <?php $j++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>
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
<?php $this->load->view('menu/script'); ?>