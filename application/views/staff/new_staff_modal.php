<div class="card-body">
    <form id="add-staff">
        <!--    <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Staff</h6>
            </div> -->
        <div class="row clearfix">
            <div class="col-6">
                <div class="form-group">
                    <select class="form-control" name="title">
                        <option value="">Select Title</option>
                        <?php foreach ($salutations_list as $salutation) { ?>
                            <option <?php if ($this->uri->segment(3)) {
                                        if ($salutation->id == $staff_details->staff_title) {  ?> selected <?php }
                                                                                                                                    } ?> value="<?php echo $salutation->id; ?>"><?php echo $salutation->title; ?></option>
                        <?php } ?>
                    </select>
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="title"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" hidden="" name="staff_id" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->s_id; ?>" <?php } ?> class="form-control" placeholder="staff_id">
                    <input type="text" name="firstname" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_firstname; ?>" <?php } ?> class="form-control" placeholder="First Name">
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="firstname"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_lastname; ?>" <?php } ?> placeholder="Last Name">
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="lastname"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="email" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_email; ?>" <?php } ?> name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_dob; ?>" <?php } ?> placeholder="Birthday" name="dob" class="form-control" onfocus="(this.type='date')">
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="dob"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="address" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_address; ?>" <?php } ?> class="form-control" placeholder="Address">
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="address"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select class="form-control" name="state">
                        <option value="">Select State</option>
                        <?php foreach ($states_list as $state) { ?>
                            <option <?php if ($this->uri->segment(3)) {
                                        if ($state->id == $staff_details->staff_state) {  ?> selected <?php }
                                                                                                                                } ?> value="<?php echo $state->id ?>"><?php echo $state->name; ?></option>
                        <?php } ?>
                    </select>
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="gender"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input type="number" name="phone" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $staff_details->staff_phone; ?>" <?php } ?> class="form-control" placeholder="Phone Number">
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="phone"></code>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option <?php if ($this->uri->segment(3)) {
                                    if ($staff_details->staff_gender == 'male') {  ?> selected <?php }
                                                                                                                    } ?> value="male">Male</option>
                        <option <?php if ($this->uri->segment(3)) {
                                    if ($staff_details->staff_gender == 'female') {  ?> selected <?php }
                                                                                                                        } ?> value="female">Female</option>
                    </select>
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="gender"></code>
                </div>
                <label class="fancy-checkbox">
                    <input id="can_consult1" type="hidden" name="can_consult" value="0">

                    <input id="can_consult2" type="checkbox" <?php if ($this->uri->segment(3)) {
                                                                    if ($staff_details->can_consult == '1') {  ?> checked <?php }
                                                                                                                                            } ?> name="can_consult" value="1">
                    <span>Can Consult</span>
                </label>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select class="form-control" name="department">
                        <option value="">Select Department</option>
                        <?php foreach ($department_list as $department) {  ?>
                            <option <?php if ($this->uri->segment(3)) {
                                        if ($department->id == $staff_details->department_id) {  ?> selected <?php }
                                                                                                                                    } ?> value="<?php echo $department->id; ?>"><?php echo $department->department_name ?></option>
                        <?php } ?>
                    </select>
                    <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="department"></code>
                </div>

            </div>
            <!--  <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" placeholder="Enter Address">
                        </div>
                    </div> -->
            <!-- <div class="col-12">
                        <hr>
                    <h5>Login Information</h5>
                    </div>
                     <div class="col-6">
                        <div class="form-group">                                    
                            <input type="text" name="username" class="form-control" placeholder="UserName">
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="username"></code>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-control" name="role">
                                <option value="">Select Role</option>
                                <?php foreach ($role_list as $role) {  ?>
                                <option value="<?php echo $role->id; ?>"><?php echo $role->role_name ?></option>
                                <?php } ?>
                            </select>
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="role"></code>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">   
                            <small id="fileHelp" class="form-text text-muted">Enter Password</small>                                 
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="password"></code>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <small id="fileHelp" class="form-text text-muted">Confirm Password</small>   
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="cpassword"></code>
                        </div>
                    </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" title="add_staff" onclick="form_routes_add('add_staff')">Submit</button>
        </div>
    </form>
</div>

<?php $this->load->view('staff/new_staff_script'); ?>