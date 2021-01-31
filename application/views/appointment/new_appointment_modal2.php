<div class="col-12">
	<div class="card box-margin">
		<div class="card-body">

			<form id="add-appointment1">
				<div class="form-group col-12">
					<label for="caseDate">Patient Name</label>
					<input type="text" name="appointment_id" hidden="">
					<input type="text" value="<?php echo $patient_details->patient_name ?>" class="form-control" readonly placeholder="Start Typing">
				</div>
				<div class="form-group col-12">
					<label for="caseDate">Appointment Date</label>
					<input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Enter Remark">
					<input type="text" id="patient_id" hidden="" value="<?php echo $this->uri->segment(3); ?>" name="patient_id">
					<code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="appointment_date"></code>
				</div>
				<div class="form-group col-12">
					<label for="caseDate">Appointment Time</label>
					<input type="time" class="form-control" id="appointment_time" name="appointment_time" placeholder="Enter Remark">
					<code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="appointment_time"></code>
				</div>
				<div class="form-group col-12">
					<label for="docName">Clinic</label>
					<select class="form-control" name="clinic" id="clinic">
						<option value="">Select Clinic</option>
						<?php foreach ($clinic_list as $clinic) { ?>
							<option value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
						<?php } ?>
					</select>
					<code style="color: #ff0000;font-size: 12px;" class="form-control-feedback" data-field="clinic"></code>
				</div>

				<div class="modal-footer mt-2">
					<button type="button" class="btn btn-primary px-4 m-2" title="add_appointment1" onclick="form_routes_appointment('add_appointment1')" data-dismiss="modal">Create Appointment</button>
				</div>
			</form>

		</div>
	</div>
</div>