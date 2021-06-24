<div class="col-12">
	<div class="card box-margin">
		<div class="card-body">
			<form id="add-patient" action="<?php echo base_url('patient/upload_patient'); ?>" method="post" enctype="multipart/form-data">
				<div class="row clearfix">
					<div class="col-lg-10 col-md-12" style="border-right: 1px solid #ced4da;">
						<fieldset style="border: 1px solid #01b2c6; padding: 20px;">
							<input hidden name="patient_id" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->p_id; ?>" <?php } ?> class="form-control" id="patient_id" placeholder="">
							<div class="form-row mt-2">
								<div class="form-group col-md-3">
									<label for="docEmail">Hospital Number</label><span style="color: red">*</span>
									<input type="text" name="patient_id_num" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_id_num; ?>" <?php } ?> class="form-control" id="patient_id_num" placeholder="HMS/0001/005">
									<span style="color:#ff0000;" class="error patient_id_num"></span>
								</div>
								<div class="form-group col-md-3">
									<label for="docEmail">Reg Date</label>
									<div class="input-group date" id="regDatePicker" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input id="patient_reg_date" type="date" name="patient_reg_date" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_reg_date; ?>" <?php } ?> class="form-control datetimepicker-input" />
									</div>
									<span style="color:#ff0000;" class="error patient_reg_date"></span>
								</div>
								<div class="form-group col-md-3">
									<label for="docEmail">Expiry Date</label>
									<div class="input-group date" id="casedatepicker1" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input type="date" name="patient_expiry_date" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_expiry_date; ?>" <?php } ?> class="form-control datetimepicker-input" />
									</div>
									<span style="color:#ff0000;" class="error patient_expiry_date"></span>
								</div>
								<div class="form-group col-md-3">
									<label for="docName">Gender</label>
									<select class="form-control" name="patient_gender" id="exampleFormControlSelect2">
										<option value="">Select Gender</option>
										<option value="Male" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_gender == 'Male') { ?> selected <?php } 											} ?>>Male</option>
										<option value="Female" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_gender == 'Female') { ?> selected <?php } 										} ?>>Female</option>
									</select>
									<span style="color:#ff0000;" class="error patient_gender"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_gender"></code>
								</div>
							</div>

						</fieldset>
						<fieldset style="border: 1px solid #01b2c6; padding: 20px;">
							<legend>Personal Details:</legend>
							<div class="form-row mt-2">
								<div class="form-group col-md-4">
									<label for="docName">Title</label><span style="color: red">*</span>
									<select class="form-control" name="patient_title" id="exampleFormControlSelect1">
										<option value="">Select Title</option>
										<?php foreach ($salutations as $salutation) { ?>
										<option value="<?php echo $salutation->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_title == $salutation->id) { ?> selected <?php } 	} ?>><?php echo $salutation->title; ?></option>
										<?php } ?>
										
									</select>
									<span style="color:#ff0000;" class="error patient_title"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_title"></code>
								</div>
								<div class="form-group col-md-4">
									<label for="docName">SurnName</label><span style="color: red">*</span>
									<input type="text" class="form-control" id="patient_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_name; ?>" <?php } ?> name="patient_name" placeholder="Enter Name">
									<span style="color:#ff0000;" class="error patient_name"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_name"></code>
								</div>
								<div class="form-group col-md-4">
									<label for="docEmail">Marital Status</label>
									<select class="form-control" name="marital_status" id="exampleFormControlSelect2">
										<option value="">Select Status</option>
										<option <?php if ($this->uri->segment(3)) { if ($patient_details->patient_marital_status == 'Single') { ?> selected <?php } 	} ?> value="Single">Single</option>
										<option <?php if ($this->uri->segment(3)) { if ($patient_details->patient_marital_status == 'Married') { ?> selected <?php } 	} ?> value="Married">Married</option>
									</select>
									<span style="color:#ff0000;" class="error marital_status"></span>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-group col-md-4">
									<label for="docEmail">Other Names</label><span style="color: red">*</span>
									<input type="text" class="form-control" id="patient_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_name; ?>" <?php } ?> name="patient_other_names" placeholder="Enter Name">
									<span style="color:#ff0000;" class="error patient_other_names"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_other_names"></code>
								</div>
								<div class="form-group col-md-4">
									<label for="docName">Tribe</label>
									<select class="form-control" name="patient_tribe" id="exampleFormControlSelect4">
										<option value="">Select Tribe</option>
										<?php foreach ($tribes as $tribe) { ?>
										<option value="<?php echo $tribe->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_tribe == $tribe->id) { ?> selected <?php }  } ?>><?php echo $tribe->tribe_name; ?></option>
										<?php } ?>
									</select>
									<span style="color:#ff0000;" class="error patient_tribe"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_tribe"></code>
								</div>
								<div class="form-group col-md-3">
									<label for="docpassword">Date of Birth</label>
									<div class="input-group date" id="casedatepicker1" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input onchange="calculate_age()" type="date" id="dob" name="patient_dob" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_dob; ?>" <?php } ?> class="form-control datetimepicker-input" />
									</div>
									<span style="color:#ff0000;" class="error patient_dob"></span>
								</div>
								<div class="form-group col-md-1">
									<label>&nbsp;</label>
									<div id="age" style="color:#ff0000;"><?php if ($this->uri->segment(3)) { echo $this->patient_m->calculate_age2($patient_details->patient_dob);  } ?> Yr(s)</div>
								</div>
								<div class="form-group col-md-3">
									<label for="docEmail">Email Address</label>
									<input type="email" class="form-control" id="patient_email" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_email; ?>" <?php } ?> name="patient_email" placeholder="Enter Email Address">
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_email"></code>
								</div>
								<div class="form-group col-md-3">
									<label for="docName">Religion</label>
									<select class="form-control" name="patient_religion" id="exampleFormControlSelect5">
										<option value="">Select Religion</option>
										<?php foreach ($religions as $religion) { ?>
										<option value="<?php echo $religion->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_religion == $religion->id) { ?> selected <?php } } ?>><?php echo $religion->religion_name; ?></option>
										<?php } ?>
									</select>
									<span style="color:#ff0000;" class="error patient_religion"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_religion"></code>
								</div>
								<div class="form-group col-md-3">
									<label for="docName">Reg Type</label>
									<select class="form-control" name="patient_regtype" id="exampleFormControlSelect7">
										<option value="">Select Reg Type</option>
										<option value="Walk-In" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_regtype == 'Walk-In') { ?> selected <?php }																				} ?>>Walk-In</option>
										<option value="Outpatient" <?php if ($this->uri->segment(3)) {
																		if ($patient_details->patient_regtype == 'Outpatient') { ?> selected <?php }														} ?>>Outpatient</option>
									</select>
									<span style="color:#ff0000;" class="error patient_regtype"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_regtype"></code>
								</div>
							<!-- 	<div class="form-group col-md-4">
									<label for="docEmail">Blood Group</label>
									<input type="text" class="form-control" id="patient_blood_group" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_blood_group; ?>" <?php } ?> name="patient_blood_group" placeholder="Enter Patient Blood Group">
								</div> -->
								<div class="form-group col-md-3">
									<label for="docEmail">Occupation</label>
									<select class="form-control" name="patient_occupation" id="patient_occupation">
										<option value="">Select Occupation</option>
										<?php foreach ($occupations as $occupation) { ?>
										<option value="<?php echo $occupation->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_occupation == $occupation->id) { ?> selected <?php } 	} ?>><?php echo $occupation->occupation_name; ?></option>
										<?php } ?>
										
									</select>
									<!-- <input type="text" class="form-control" id="patient_occupation" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_occupation; ?>" <?php } ?> name="patient_occupation" placeholder="Enter Patient Occupation"> -->
								</div>
							</div>
						</fieldset>

						<fieldset class="my-3" style="border: 1px solid #01b2c6; padding: 20px;">
							<legend> Address & other contact information</legend>
							<div class="form-row mt-2">
								<div class="form-group col-md-6">
									<label for="docEmail">Phone Number</label>
									<input maxlength="11" type="text" class="form-control" id="patient_phone" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_phone; ?>" <?php } ?> name="patient_phone" placeholder="Enter Number">
									<span style="color:#ff0000;" class="error patient_phone"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="docName">Next of Kin Title</label><span style="color: red">*</span>
									<select class="form-control" name="nok_title" id="exampleFormControlSelect1">
										<option value="">Select Title</option>
										<?php foreach ($salutations as $salutation) { ?>
										<option value="<?php echo $salutation->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->nok_title == $salutation->id) { ?> selected <?php } 	} ?>><?php echo $salutation->title; ?></option>
										<?php } ?>
									</select>
									<span style="color:#ff0000;" class="error nok_title"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="nok_title"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docEmail">City Area</label>
									<input type="text" class="form-control" id="patient_city" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_city; ?>" <?php } ?> name="patient_city" placeholder="Area">
									<span style="color:#ff0000;" class="error patient_city"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_city"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docName">Next of Kin Name</label><span style="color: red">*</span>
									<input type="text" class="form-control" id="nok_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_name; ?>" <?php } ?> name="nok_name" placeholder="Enter Name">
									<span style="color:#ff0000;" class="error nok_name"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="nok_name"></code>
								</div>
								<!-- <div class="form-group col-md-6">
									<label for="docEmail">Occupation</label>
									<select class="form-control" name="patient_occupation" id="patient_occupation">
										<option value="">Select Status</option>
										<option value="Lawyer" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_occupation == 'Lawyer') { ?> selected <?php }
																																} ?>>Lawyer</option>
										<option value="Soldier" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_occupation == 'Soldier') { ?> selected <?php }
																																	} ?>>Soldier</option>
										<option value="Farmer" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_occupation == 'Farmer') { ?> selected <?php }
																																} ?>>Farmer</option>
										<option value="A" <?php if ($this->uri->segment(3)) {
																if ($patient_details->patient_occupation == 'A') { ?> selected <?php }
																														} ?>>A</option>
									</select>
									<span style="color:#ff0000;" class="error patient_occupation"></span>
								</div> -->
								<div class="form-group col-md-6">
									<label for="docEmail">State</label>
									<select class="form-control" name="patient_state" id="exampleFormControlSelect6">
										<option value="">Select State</option>
										<?php foreach ($states as $state) { ?>
											<option value="<?php echo $state->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_state == $state->id) { ?> selected <?php }																				} ?>><?php echo $state->name; ?></option>
										<?php } ?>
									</select>
									<span style="color:#ff0000;" class="error patient_state"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_state"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docEmail">Next of Kin Relationship</label><span style="color: red">*</span>
									<select class="form-control"  name="nok_relationship" id="nok_relationship">
										<option value="">Select Relationship</option>
										<?php foreach ($next_of_kin_rel as $relationship) { ?>
											<option value="<?php echo $relationship->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->nok_relationship == $relationship->id) { ?> selected <?php } } ?>><?php echo $relationship->rel_name; ?></option>
										<?php } ?>
									</select>
									<!-- <input type="text" name="nok_relationship" class="form-control" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_relationship; ?>" <?php } ?> id="nok_relationship" placeholder="Enter Relationship"> -->
									<span style="color:#ff0000;" class="error nok_relationship"></span>
								</div>
								<div class="form-group col-md-6">
									<label for="docEmail">Country</label>
									<select class="form-control" name="patient_country" id="exampleFormControlSelect6">
										<option value="">Select Country</option>
										<?php foreach ($countries as $country) { ?>
											<option value="<?php echo $country->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_country == $country->id) { ?> selected <?php }																			} ?>><?php echo $country->name; ?></option>
										<?php } ?>
									</select>
									<span style="color:#ff0000;" class="error patient_country"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_country"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docName">Next of Kin Number</label><span style="color: red">*</span>
									<input type="text" maxlength="11" class="form-control" id="nok_phone" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_phone; ?>" <?php } ?> name="nok_phone" placeholder="Enter Number">
									<span style="color:#ff0000;" class="error nok_phone"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="nok_phone"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docEmail">Address</label>
									<textarea class="form-control" id="patient_address" name="patient_address"><?php if ($this->uri->segment(3)) { ?><?php echo $patient_details->patient_address; ?> <?php } ?></textarea>
									<!-- <input type="text" class="form-control" id="patient_address" name="patient_address" placeholder="Enter Address"> -->
									<span style="color:#ff0000;" class="error patient_address"></span>
									<code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="patient_address"></code>
								</div>
								<div class="form-group col-md-6">
									<label for="docEmail">Next of Kin Address</label><span style="color: red">*</span>
									<input type="text" name="nok_address" class="form-control" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_address; ?>" <?php } ?> id="nok_address" placeholder="Enter Address">
									<span style="color:#ff0000;" class="error nok_address"></span>
								</div>
							</div>
						</fieldset>

						<fieldset class="my-3" style="border: 1px solid #01b2c6; padding: 20px;">
							<legend>Account Status</legend>
							<div class="form-row mt-2">
								<div class="form-group col-md-3">
									<label class="fancy-radio">
										<input type="radio" <?php if ($this->uri->segment(3) && $patient_details->patient_status == 'Private') { ?> checked <?php } ?> name="patient_status" onclick="toggleRadio(false)" value="private">
										<span><i></i>Private</span>
									</label>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-group col-md-3">
									<label class="fancy-radio">
										<input type="radio" <?php if ($this->uri->segment(3) && $patient_details->patient_status != 'Private') { ?> checked <?php } ?> name="patient_status" onclick="toggleRadio(true)" value="Retainer/HMO">
										<span><i></i>Retainer/HMO</span>
									</label>
									<p id="error-radio"></p>
								</div>
								<div class="form-group col-md-9">
									<select class="form-control" disabled="" name="patient_status2" id="patient_status">
										<option value="">Select Retainer</option>
										<option value="A">Lawyer</option>
									</select>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-group">
									<label class="fancy-checkbox">
										<input type="checkbox" onclick="togglenhis()" id="nhis" name="managed_healthcare">
										<span>Managed Health Care (NHIS/Others)</span>
									</label>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-group col-md-4">
									<label for="docName">Enrollee Type</label>
									<select class="form-control" name="enrollee_type" disabled="" id="enrollee_type">
										<option value="">Select Enrollee Type</option>
										<?php foreach ($enrollee_type_list as $enrollee) { ?>
											<option value="<?php echo $enrollee->id; ?>"><?php echo $enrollee->enrollee_type_name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="docName">Company/Ministry</label>
									<input type="text" class="form-control" id="company" disabled="" name="company" placeholder="Enter Name">
								</div>
								<div class="form-group col-md-4">
									<label for="docEmail">Enrollee No</label>
									<input type="text" name="enrollee_no" class="form-control" disabled="" id="enrollee_no" placeholder="Enrollee No">
								</div>
							</div>
						</fieldset>

						<div class="d-flex justify-content-end">
							<!-- <input type="submit" title="add_patient" class="btn btn-primary px-4 m-2" value="Save"> -->
							<button type="submit" class="btn btn-primary px-4 m-2" title="add_patient">Save</button>
						</div>
					</div>
					<div class="col-lg-2 col-md-12">
						<div id="results">Your captured image will appear here...</div>
						<!-- A button for taking snaps -->
						<div id="my_camera"></div>

						<button type=button class="btn btn-primary" id="openCamera" onClick="take_snapshot2()"><i class="fa fa-camera"></i> Open Camera </button>
						<button style="display: none;" id="takeSnapshot" type=button class="btn btn-warning" onClick="take_snapshot()"><i class="fa fa-camera-retro"></i> Take Snapshot </button>
						<hr>
						<!-- <input type=button value="Take Snapshot 2" onClick="take_snapshot()"> -->
						<h2>OR</h2>
						<hr>
						<?php if ($this->uri->segment(3)) { if (isset($patient_details->patient_photo)) { ?>
							<input hidden type="text" name="patient_image" value="<?php echo $patient_details->patient_photo; ?>">
						<?php } } ?> 
						<input type='file' class="form-control" name="image" id="user_image" onchange="readURL(this);" />
						<img id="blah" src="<?php if ($this->uri->segment(3)) {
												if (isset($patient_details->patient_photo)) {
													echo base_url('uploads/' . $patient_details->patient_photo);
												}
											} ?>" alt="" class="mt-3" />
					</div>
			</form>
		</div>
	</div>
</div>


<?php $this->load->view('patient/script2'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/webcam.js"></script>
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').show();
				$('#results').hide();

				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
		// console.log($('#user_image').val());
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		var today = '<?php echo date('Y-m-d'); ?>'
		if (document.getElementById("dob").value =='') {
  			$('#patient_reg_date').val(today);

		}
});
	function calculate_age() {
		var dob = document.getElementById("dob").value;


          $.ajax({
          type: "POST",
          url: '<?php echo base_url('patient/calculate_age')?>',
          dataType : 'json',
          data: {dob: dob},
          success: function(data){
            $('#age').text(data+" Yr(s)");


            console.log(data);
          }
      	  });
		//console.log(dob);
	}
	function take_snapshot2() {
		//Hide Button
		$('#openCamera').hide();
		$('#takeSnapshot').show();
		$('#user_image').val('');
		$('#blah').hide();


		Webcam.set({
			width: 250,
			height: 250,
			image_format: 'jpeg',
			jpeg_quality: 360
		});
		Webcam.attach('#my_camera');
	}

	function take_snapshot() {
		$('#user_image').val('');
		$('#blah').hide();
		$('#results').show();
		// take snapshot and get image data
		Webcam.snap(function(data_uri) {
			// display results in page


			Webcam.upload(data_uri, '<?php echo base_url('patient/webcam') ?>', function(code, text) {
				document.getElementById('results').innerHTML =

					'<img src="' + text + '"/>';
				$('[name="image_path"]').val(text);

			});
		});
	}

	function toggleRadio(flag) {
		if (!flag) {
			document.getElementById('patient_status').setAttribute("disabled", "true");
		} else {
			document.getElementById('patient_status').removeAttribute("disabled");
			document.getElementById('patient_status').focus();
		}

	}

	function togglenhis() {
		var nhis = document.getElementById("nhis");
		if (nhis.checked == true) {
			document.getElementById('enrollee_type').removeAttribute("disabled");
			document.getElementById('enrollee_no').removeAttribute("disabled");
			document.getElementById('company').removeAttribute("disabled");
			document.getElementById('enrollee_type').focus();
		} else {
			document.getElementById('enrollee_type').setAttribute("disabled", "true");
			document.getElementById('enrollee_no').setAttribute("disabled", "true");
			document.getElementById('company').setAttribute("disabled", "true");
		}

	}
</script>