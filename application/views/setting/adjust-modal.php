<style type="text/css">
    #bin-card thead th, #bin-card tbody td {
font-size: 12px;
  padding: 1px !important;
  height: 15px;
}
#adjust_drug_modal .mb-3, .my-3 {
    margin-bottom: 5px!important; 
}
#adjust_drug_modal .form-group {
    margin-bottom: 1px;
}
#adjust_drug_modal .form-control {
    display: block;
    width: 100%;
     height: 30px; 
     padding: 3px; 
    font-size: 12px;
    font-weight: 400;
     line-height: 0.5; 
}
#adjust_drug_modal label {
    font-size: 13px;
}
</style>
<div class="col-12" id="adjust_drug_modal2">
    <div class="card box-margin" style="margin-bottom: 5px !important;">
        <div class="card-body" style="padding: 1px;">

            <form id="adjust_drug_modal">
                <div class="modal-body edit-doc-profile" style="padding: 1px;">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Stock Item</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" value="<?php echo $drug_details->drug_item_name; ?>" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Qty in Stock</label>
                                <div class="col-sm-3">
                                    <input type="text" hidden="" name="qty_in_stock" value="<?php echo $drug_details->quantity_in_stock; ?>">
                                    <input type="number" disabled="" class="form-control" id="qty_value" name="qty_value" value="<?php echo $drug_details->quantity_in_stock; ?>" placeholder="150">
                                </div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Adjust to</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="adjust_to" name="adjust_to" value="0">
                                    <code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" id="adjust_to_error"></code>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Reason for Adjustment</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="reason" name="reason" value="" placeholder="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
