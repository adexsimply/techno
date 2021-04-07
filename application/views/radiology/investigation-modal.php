<style>
#lab-test-modal .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#lab-test-modal .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#lab-test-modal thead th, #lab-test-modal tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
#lab-test-modal .form-group {
     margin-bottom: 1px; 
}
#lab-test-modal .form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 1px;
    font-size: 12px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#lab-test-modal select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<div class="col-12" id="investigation-modal">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-investigation">
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <label for="docName">Name</label>
                            <input type="text" name="id" value="<?php echo $this->uri->segment(3); ?>">
                                <input type="text" class="form-control time12" name="name" placeholder="CHLORIDE CL" value="<?php if (isset($investigation->Name)) { echo $investigation->Name; } ?>">
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="name"></code>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="docEmail">Group</label>
                                <select class="form-control" name="subgroup" id="subgroup">
                                    <option value="">Select Group</option>
                                    <?php foreach ($radiology_subgroups_list as $radiology_subgroup) { ?>
                                        <option value="<?php echo $radiology_subgroup->ChargeSubGroupID; ?>" <?php if (isset($investigation->sub_group_name) && $investigation->ChargeSubGroupID == $radiology_subgroup->ChargeSubGroupID) { echo "selected"; } ?>><?php echo $radiology_subgroup->Name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="group"></code>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="docEmail">Cost</label>
                                <input type="number" name="cost" class="form-control" placeholder="5000" value="<?php if (isset($investigation->service_charge_cost)) { echo $investigation->service_charge_cost; } ?>">
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="cost"></code>
                        </div>
                    </div>
                <div class="text-right">
                    <button type="button" class="btn btn-warning" onclick="form_routes_investigation('add_investigation')" title="add_investigation">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>