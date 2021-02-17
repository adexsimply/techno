<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-batch">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <input type="hidden" class="form-control" name="drug_id" value="<?php echo $drug_details->id; ?>">
                        <?php //var_dump($drug_details)
                        ?>

                        <?php if ($this->uri->segment(3) && isset($drug_details->drug_id)) { ?>
                            <input type="hidden" name="drug_id" value="<?php echo $drug_details->drug_id ?>">
                            <input type="hidden" name="id" value="<?php echo $drug_details->id ?>">
                        <?php } ?>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="" disabled class="form-control" value="<?php if ($this->uri->segment(3) && isset($drug_details->drug_id)) {
                                                                                            echo date('d M Y', strtotime($drug_details->date_added));
                                                                                        } else {
                                                                                            echo date('d M Y');
                                                                                        } ?>">">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Expire Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="expire_date" value="<?php if ($this->uri->segment(3) && isset($drug_details->drug_id)) {
                                                                                                            echo $drug_details->expire_date;
                                                                                                        } ?>" placeholder="">
                                    <code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="expire_date"></code>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Batch Number</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="batch_number" value="<?php if ($this->uri->segment(3) && isset($drug_details->drug_id)) {
                                                                                                                echo $drug_details->batch_number;
                                                                                                            } ?>" placeholder="1657356">
                                    <code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="batch_number"></code>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="text-right">
                                <button class="btn btn-success" type="button" onclick="form_routes_batch('add_batch')" title="add_batch">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('setting/drug-add-batch-script'); ?>