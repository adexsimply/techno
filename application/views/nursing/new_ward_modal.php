<!-- Add new history Modal -->
<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-ward">
                <div class="row clearfix">
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <?php //var_dump($ward); ?>
                            <label for="inputPassword" class="form-label">Group:</label>
                            <select class="form-control" name="ward_type">
                                <option value="">Select Group</option>
                                <?php foreach($wards_type_list as $wards_type){ ?>
                                <option <?php if (isset($ward) && $wards_type->id == $ward->ward_type_id) { ?> selected <?php } ?> value="<?php echo $wards_type->id; ?>"><?php echo $wards_type->ward_type_name; ?></option>
                                <?php } ?>
                            </select>
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="ward_type"></code>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword" class="form-label">Name:</label>
                            <input type="hidden" class="form-control" name="ward_id" value="<?php if (isset($ward) && $ward->ward_id) { echo $ward->ward_id; } ?>">
                            <input type="text" class="form-control" name="ward_name" value="<?php if (isset($ward) && $ward->ward_name) { echo $ward->ward_name; } ?>" placeholder="Ward Name">
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="ward_name"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword" class="form-label">Doc/Nurse Fee:</label>
                            <input type="text" class="form-control" name="doc_nurse_fee" value="<?php if (isset($ward) && $ward->doctor_nurse_fee) { echo $ward->doctor_nurse_fee; } ?>" placeholder="Doc/Nurse Fee">
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="doc_nurse_fee"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword" class="form-label">Feeding:</label>
                            <input type="text" class="form-control" name="feeding" value="<?php if (isset($ward) && $ward->feeding) { echo $ward->feeding; } ?>" placeholder="Feeding">
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="feeding"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword" class="form-label">Utility:</label>
                            <input type="text" class="form-control" name="utility" value="<?php if (isset($ward) && $ward->utility) { echo $ward->utility; } ?>" placeholder="Utility">
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="utility"></code>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword" class="form-label">Ward Rate:</label>
                            <input type="text" class="form-control" name="ward_rate" value="<?php if (isset($ward) && $ward->ward_rate) { echo $ward->ward_rate; } ?>" placeholder="Ward Rate">
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="ward_rate"></code>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword" class="form-label">Account:</label>
                            <select class="form-control" name="sub_group">
                                <option value="">Select</option>
                                <option selected value="Accomodation">Accomodation</option>
                            </select>
                            <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="sub_group"></code>
                        </div>
                    </div>
                </div>
                <!-- <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_service('add_service_charge')" title="add_service_charge">Save</button>
                </div> -->
            </form>
        </div>
    </div>
</div>
<?php //$this->load->view('service/script'); ?>