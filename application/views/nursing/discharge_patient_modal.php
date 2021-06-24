<form id="discharge-patient">	
	<div class="modal-body edit-doc-profile">	
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6">
                    <b>Date</b>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                        </div>
                        <input type="date" id="discharge_date" value="<?php echo date('Y-m-d'); ?>" name="discharge_date" class="form-control date" placeholder="Ex: 30/07/2016">
                        <input type="text" hidden name="admission_id" <?php if ($this->uri->segment(3)) { ?> value="<?php echo $this->uri->segment(3); ?>" <?php } ?>>
                    </div>
                        <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="discharge_date"></code>

                </div>
                <div class="col-lg-6 col-md-6">
                    <b>Name</b>
                    <div class="input-group mb-3">
                        <input type="text" <?php if ($this->uri->segment(3)) { ?> value="<?php echo $admission_details->patient_name; ?>" <?php } ?> class="form-control time12" disabled="">
                    </div>
                </div>
              <!--   <div class="col-lg-6 col-md-6">
                    <b>Clinic</b>
                    <div class="input-group mb-3">
						<select class="form-control" name="clinic" id="clinic">
							<option value="">Select Clinic</option>
							<?php foreach($clinic_list as $clinic) { ?>
							<option <?php if ($this->uri->segment(3)) { if ($admission_details->clinic_id == $clinic->id) { ?> selected <?php } }?> value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
							<?php } ?>
						</select>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-6">
                    <b>Discharge Comments</b>
                    <div class="input-group mb-3">
						<textarea name="discharge_comments" class="form-control"></textarea>
                    </div>
                        <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="discharge_comments"></code>
                </div>
                <div class="col-lg-12 col-md-6">
                    <b>Discharge Type</b>
                    <div class="input-group mb-3">
						<select class="form-control" name="discharge_type" id="discharge_type">
							<option value="">Select Type</option>
							<?php foreach($discharge_types as $discharge_type) { ?>
							<option value="<?php echo $discharge_type->id; ?>"><?php echo $discharge_type->discharge_type_name; ?></option>
							<?php } ?>
						</select>
                    </div>
                        <code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="discharge_type"></code>
                </div>
            </div>
	</div>
</form>
<script type="text/javascript">
        var today = '<?php echo date('Y-m-d'); ?>';
            $('#admit_date').val(today);
</script>