<!-- Add new history Modal -->
	<div class="modal fade" id="addappointment" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
		<form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">	
				<div class="modal-header">
					<h6 class="modal-title text-primary">New Appointment</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body edit-doc-profile">	

                  <!--   <div class="ui-widget">
                      <label for="city">Your city: </label>
                      <input id="city">
                      Powered by <a href="http://geonames.org">geonames.org</a>
                    </div>

                    <div class="ui-widget" style="margin-top:2em; font-family:Arial">
                      Result:
                      <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
                    </div> -->

						<div class="form-group col-12">
							<label for="caseDate">Patient Name</label>
							<input type="text" name="appointment_id" hidden="">
							<input type="text" name="case_prescription" class="form-control" id="city" placeholder="Start Typing">
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Appointment Date</label>
							<input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Enter Remark">
							<input type="text" id="patient_id" hidden="" name="patient_id">
							<span style="color:#ff0000;" class="error appointment_date"></span>
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Appointment Time</label>
							<input type="time" class="form-control" id="appointment_time" name="appointment_time" placeholder="Enter Remark">
							<span style="color:#ff0000;" class="error appointment_time"></span>
						</div>
                            <div  class="form-group col-12">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" id="vital_signs" name="vital_signs">
                                    <span>Send for Vital Signs</span>
                                </label>
                            </div>
							<div class="form-group col-12">
							  	<label for="docName">Clinic</label>
								<select class="form-control" name="clinic" id="clinic">
									<option value="">Select Clinic</option>
									<?php foreach($clinic_list as $clinic) { ?>
									<option value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
									<?php } ?>
								</select>
							<span style="color:#ff0000;" class="error clinic"></span>
							</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<input type="submit" title="add_appointment" class="btn btn-primary px-4 m-2" value="Add New Case">
				</div>
				</form>
			</div>
		</div>
	</div>