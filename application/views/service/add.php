<!-- Add new history Modal -->
<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-service-charge">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Service Name:</label>
                        <input type="hidden" class="form-control" name="id" value="<?php if (isset($service) && $service->id) {
                                                                                        echo $service->id;
                                                                                    } ?>">
                        <input type="text" class="form-control" name="service_name" value="<?php if (isset($service) && $service->item_name) {
                                                                                        echo $service->item_name;
                                                                                    } ?>" placeholder="Service Name">
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="service_name"></code>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Service Sub-Group:</label>
                        <select class="form-control" name="sub_group">
                            <option value="">Select</option>
                            <?php foreach($service_sub_group as $sub_group){ ?>
                            <option <?php if (isset($service) && $sub_group->ChargeSubGroupID == $service->subgroup_id) { ?> selected <?php } ?> value="<?php echo $sub_group->ChargeSubGroupID; ?>"><?php echo $sub_group->Name; ?></option>
                            <?php } ?>
                        </select>
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="sub_group"></code>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Service Cost:</label>
                        <input type="number" class="form-control" name="cost" value="<?php if (isset($service) && $service->service_charge_cost) {
                                                                                        echo $service->service_charge_cost;
                                                                                    } ?>" placeholder="Service Cost">
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="cost"></code>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_service('add_service_charge')" title="add_service_charge">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php //$this->load->view('service/script'); ?>