<!-- Add new history Modal -->
<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-range">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 mb-4 row">
                        <label for="inputPassword" class="form-label">Name:</label>
                        <input type="hidden" class="form-control" name="id" value="<?php if (isset($lab_test_range) && $lab_test_range->id) {
                                                                                        echo $lab_test_range->id;
                                                                                    } ?>">
                        <input type="text" class="form-control" name="name" value="<?php if (isset($lab_test_range) && $lab_test_range->id) {
                                                                                        echo $lab_test_range->name;
                                                                                    } ?>" placeholder="Range Name">
                        <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" id="range_error"></code>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_range('add_range')" title="add_range">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>