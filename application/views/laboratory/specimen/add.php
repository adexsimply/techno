<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-specimen">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($specimen)
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="input-group">
                                <?php if ($this->uri->segment(3) && isset($specimen->id)) { ?>
                                    <input type="hidden" name="specimen_id" value="<?php echo $specimen->id ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="<?php if ($this->uri->segment(3) && isset($specimen->specimen_name)) {
                                                                                                echo $specimen->specimen_name;
                                                                                            } ?>">
                            </div>
                            <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="name"></code>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_specimen('add_specimen')" title="add_specimen">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
</script>

<?php $this->load->view('laboratory/specimen/script'); ?>