<div class="card-body">
    <form id="suspend-user">
        <div class="col-12">
            <hr>
            <h4>User's Details</h4>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="text" hidden="" name="user_id" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->id; ?>" <?php } ?>>
                <label>Username</label>
                <input type="text" name="username" readonly <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->username; ?>" <?php } ?> class="form-control" placeholder="Username">
                <code style="color: #ff0000;font-size: 9px;" class="form-control-feedback" data-field="username"></code>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="username" readonly <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->fullname; ?>" <?php } ?> class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="username" readonly <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->fullname; ?>" <?php } ?> class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="caseDate">Suspend User Till?</label>
                <input type="datetime-local" class="form-control" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $user_details->suspension_time; ?>" <?php } ?> id="suspension_time" name="suspension_time" placeholder="">
                <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="suspension_time"></code>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" title="suspend_user" onclick="form_routes_suspend('suspend_user')">Save</button>
</div>
</form>
</div>
<?php $this->load->view('login/suspend_user_script'); ?>