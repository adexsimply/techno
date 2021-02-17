<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-batch">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <input type="hidden" class="form-control" name="drug_id" value="<?php //echo $drug_details->id; 
                                                                                        ?>">
                        <?php //var_dump($drug_bin_card_details)
                        ?>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Date:</label>
                                <div class="col-sm-9">
                                    <p class="mt-2"><?php echo date('d M Y', strtotime($drug_bin_card_details->date_added)); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($drug_bin_card_details->particular)) { ?>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Particulars:</label>
                                    <div class="col-sm-9">
                                        <p class="mt-2"><?php echo $drug_bin_card_details->particular; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($drug_bin_card_details->drug_in)) { ?>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">In:</label>
                                    <div class="col-sm-9">
                                        <p class="mt-2"><?php echo $drug_bin_card_details->drug_in; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($drug_bin_card_details->drug_out)) { ?>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Out:</label>
                                    <div class="col-sm-9">
                                        <p class="mt-2"><?php echo $drug_bin_card_details->drug_out; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (isset($drug_bin_card_details->balance)) { ?>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Balance:</label>
                                    <div class="col-sm-9">
                                        <p class="mt-2"><?php echo $drug_bin_card_details->balance; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>