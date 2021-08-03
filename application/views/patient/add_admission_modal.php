<style type="text/css">
    
#availableWard thead th, #availableWard tbody td {
  font-size: 0.9em;
  padding: 1px !important;
  height: 15px;
}
</style>
<div class="col-12">
	<div class="card box-margin">
		<div class="card-body">
			<form id="add-admission">
				<div class="row clearfix">
					<div class="col-lg-7 col-md-12" style="border-right: 1px solid #ced4da;">
						<fieldset style="border: 1px solid #01b2c6; padding: 20px;">
							<div class="form-row mt-2">
								<div class="form-group col-md-6">
									<label for="docEmail">Date</label>
										<input type="date" id="admission_date" name="request_date" <?php if ($this->uri->segment(4)) { ?>value="<?php echo $admission_details->request_date; ?>" <?php } ?> class="form-control datetimepicker-input" />
										<input type="text" hidden name="admission_id" value="<?php echo $this->uri->segment(4); ?>">
										<input type="text" hidden name="patient_id" value="<?php echo $this->uri->segment(3); ?>">
                                		<code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="request_date"></code>
								</div>
								<div class="form-group col-md-6">
							  	<label for="docName">Clinic</label>
								<select class="form-control" name="clinic" id="clinic">
									<option value="">Select Clinic</option>
									<?php foreach($clinic_list as $clinic) { ?>
									<option <?php if ($this->uri->segment(4)) { if ($admission_details->clinic_id == $clinic->id) { ?> selected <?php } }?> value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
									<?php } ?>
								</select>
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="clinic"></code>
								</div>
							</div>
						</fieldset>
						<fieldset style="border: 1px solid #01b2c6; padding: 0px 10px 10px 5px;">
							<legend>Select:</legend>
                                    <label class="fancy-radio"><input <?php if ($this->uri->segment(4)) { if ($admission_details->admission_type == 'For Admission Only') { ?> checked <?php } } ?> name="admission_type" value="For Admission Only" type="radio" checked=""><span><i></i>For Admission Only</span></label><br>
                                    <label class="fancy-radio"><input <?php if ($this->uri->segment(4)) { if ($admission_details->admission_type == 'For Admission & Surgical Procedure') { ?> checked <?php } } ?> name="admission_type" value="For Admission & Surgical Procedure" type="radio"><span><i></i>For Admission & Surgical Procedure</span></label><br>
                                    <label class="fancy-radio"><input <?php if ($this->uri->segment(4)) { if ($admission_details->admission_type == 'For Surgical Procedure Only') { ?> checked <?php } } ?> name="admission_type" value="For Surgical Procedure Only" type="radio"><span><i></i>For Surgical Procedure Only</span></label>
                                	<code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="admission_type"></code>
						</fieldset>
					</div>
					<div class="col-lg-5 col-md-12">
						<div id="results">Available Beds for Admission</div>
						<?php //var_dump($available_wards); ?>
                                <table id="availableWard" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ward</th>
                                            <th>Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($available_wards as $available_ward) { ?>
                                        <tr>
                                            <td><?php echo $available_ward->ward_type_name; ?></td>
                                            <td><?php echo $available_ward->num_avail; ?></td>
                                        </tr>
                                    	<?php } ?>
                                    </tbody>
                                </table>
						<!-- A button for taking snaps -->
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12" style="border-right: 1px solid #ced4da;">
						<fieldset style="border: 1px solid #01b2c6; padding: 0px 10px 10px 5px;">
							<legend>Provisional Diagnosis:</legend>
								<textarea class="form-control" name="diagnosis"> <?php if ($this->uri->segment(4)) { echo $admission_details->diagnosis; } ?></textarea>
                                <code style="color: #ff0000;font-size: 14px;" class="form-control-feedback" data-field="diagnosis"></code>
						</fieldset>

						<fieldset style="border: 1px solid #01b2c6; padding: 0px 10px 10px 5px;">
							<legend>Operations</legend>
								<input type="text" class="form-control" <?php if ($this->uri->segment(4)) { ?> value="<?php echo $admission_details->operation; ?>" <?php } ?> name="operations">
						</fieldset>

						<fieldset style="border: 1px solid #01b2c6; padding: 0px 10px 10px 5px;">
							<legend>Remarks:</legend>
								<textarea class="form-control" name="remarks"> <?php if ($this->uri->segment(4)) { echo $admission_details->remarks; } ?></textarea>
						</fieldset>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('patient/script2'); ?>
<script type="text/javascript">
	
	$(document).ready(function(){
		var today = '<?php echo date('Y-m-d'); ?>'
  			$('#admission_date').val(today);
});
</script>