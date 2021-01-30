<div class="card-body">
        <form id="add-user">
         <!--    <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Staff</h6>
            </div> -->
                <div class="row clearfix">                    
                   <?php //var_dump($user_details); ?>
                   <?php if (!$this->uri->segment(3)) {  ?>
                     <div class="col-4">
                        <div class="form-group">   
                            <small id="fileHelp" class="form-text text-muted">&nbsp;</small>   
                            <label class="fancy-radio">
                                <input type="radio" name="patient_status" onclick="toggleName(false)" value="New">
                                <span><i></i>New User</span>
                            </label>
                        </div>
                    </div>
                     <div class="col-8">
                        <div class="form-group">   
                            <small id="fileHelp" class="form-text text-muted">Enter Name</small>   
                            <input type="text" disabled="" id="fullname" name="fullname" class="form-control" placeholder="Full Name">
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="fullname"></code>
                        </div>
                    </div>
                     <div class="col-4">
                        <label class="fancy-radio">
                            <input type="radio" name="patient_status" onclick="toggleName(true)" value="Staff">
                            <span><i></i>Select Staff</span>
                        </label>
                    </div>
                     <div class="col-8">
                        <div class="form-group">
                            <select disabled="" class="form-control" id="staff_name" name="staff_name">
                                <option value="">Select Name</option>
                                <?php foreach ($staff_list as $role) {  ?>
                                <option <?php if($role->user_id!=NULL) { ?>disabled="" <?php } ?> value="<?php echo $role->s_id; ?>"><?php echo $role->staff_firstname.' '.$role->staff_lastname; ?></option>
                                <?php } ?>
                            </select>
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="staff_name"></code>
                        </div>
                    </div>
                <?php } ?>
                   <!--  <div class="form-group col-md-6">
                        <label class="fancy-radio">
                            <input type="radio" name="patient_status" onclick="toggleRadio(false)" value="private">
                            <span><i></i>New User</span>
                        </label>
                        <label class="fancy-radio">
                            <input type="radio" name="patient_status" onclick="toggleRadio(true)" value="Retainer/HMO">
                            <span><i></i>Select Staff</span>
                        </label> 
                        <label class="fancy-radio">
                            <input type="radio" name="patient_status" onclick="toggleRadio(false)" value="private">
                            <span><i></i>New User</span>
                        </label>
                        <label class="fancy-radio">
                            <input type="radio" name="patient_status" onclick="toggleRadio(true)" value="Retainer/HMO">
                            <span><i></i>Select Staff</span>
                        </label>
                        <p id="error-radio"></p>
                    </div> -->
                    <div class="col-12">
                        <hr>
                    <h5>Login Information</h5>
                    </div>
                     <div class="col-6">
                        <div class="form-group">
                            <input type="text" hidden="" name="user_id" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->id; ?>"<?php } ?>  >                                    
                            <input type="text" name="username" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->username; ?>"<?php } ?>  class="form-control" placeholder="Username">
                            <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="username"></code>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-control" name="role">
                                <option value="">Select Role</option>
                                <?php foreach ($role_list as $role) {  ?>
                                <option <?php if ($this->uri->segment(3)) { if($role->id == $user_details->role_id) {  ?> selected <?php } } ?>   value="<?php echo $role->id; ?>"><?php echo $role->role_name ?></option>
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
                    </div>
                </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-primary" title="add_user" onclick="form_routes_add('add_user')">Submit</button>
            </div>
        </form>
    </div>
<?php $this->load->view('login/new_user_script'); ?>
<script type="text/javascript">
        
   function toggleName(flag){
      if(flag==true) {
        document.getElementById('staff_name').removeAttribute("disabled");
        //document.getElementById('staff_name').setAttribute("disabled", "true");
        document.getElementById('fullname').setAttribute("disabled", "true");
        $("#fullname").val('');   

      } else {
        document.getElementById('fullname').removeAttribute("disabled");
        //document.getElementById('staff_name').focus();
        document.getElementById('staff_name').setAttribute("disabled", "true");
        $("#staff_name").val('');
      }
      
    }
</script>