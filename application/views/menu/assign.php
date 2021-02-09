<?php

foreach ($menu_list as $menu) {
$sub_menu = $this->menu_m->get_menu_child_list($menu->id);

//echo $menu->menu_parent_name."<br>";
//var_dump($sub_menu);
}
 ?>
 <?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Menus</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Select Role</h2>
                    </div>
                    <div class="body">
                      
                      <div class="form-row mt-2">
                        <div class="col-10">
							<select onchange="get_url()" class="form-control" name="patient_status2" id="role">
								<option value="">Select Role</option>
								<?php foreach ($role_list as $role) { ?>
								<option value="<?php echo $role->id; ?>"><?php echo $role->role_name; ?></option>
								<?php } ?>
							</select>
                        </div>

                        <div class="col-2">
							<button disabled="" id="select_btn" class="btn btn-primary" onclick="shiEdit(event)" data-type="purple" data-size="xl">Select</button>
						</div>
					</div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('menu/script'); ?>