<!-- Add new history Modal -->
<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-service">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Service Type:</label>
                        <input type="hidden" class="form-control" name="id" value="<?php if (isset($service) && $service->id) {
                                                                                        echo $service->id;
                                                                                    } ?>">
                        <input type="text" class="form-control" name="type" value="<?php if (isset($service) && $service->type) {
                                                                                        echo $service->type;
                                                                                    } ?>" placeholder="Service Type">
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="type"></code>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Service Cost:</label>
                        <input type="number" class="form-control" name="cost" value="<?php if (isset($service) && $service->cost) {
                                                                                        echo $service->cost;
                                                                                    } ?>" placeholder="Service Cost">
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="cost"></code>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_service('add_service')" title="add_service">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('setting/services/script'); ?>