<style type="text/css">
	.error {
		font-size: 11px;
	}
</style>
<div class="col-12">
	<div class="card box-margin">
		<div class="card-body" style="padding:0;">
			<form id="add-patient" action="<?php echo base_url('patient/upload_patient'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
				<div class="row clearfix">
					<div class="col-lg-10 col-md-12" style="border-right: 1px solid #ced4da;">
						<fieldset style="border: 1px solid #01b2c6; padding: 0px 20px 6px 20px">
							<input hidden name="patient_id" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->p_id; ?>" <?php } ?> class="form-control" id="patient_id" placeholder="">
							<div class="form-row mt-2">
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-4"><span style="color: red">*</span>Hospital&nbsp;Number:&nbsp;</label>
									<input type="text" name="patient_id_num" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_id_num; ?>" <?php } ?> class="form-control col-md-8" id="patient_id_num" placeholder="HMS/0001/005" tabindex="1">
									<label class="col-md-4"></label><span style="color:#ff0000;" class="error patient_id_num col-md-8"></span>
								</div>
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-2">Reg&nbsp;Date:</label>
									<div class="input-group date col-md-10" id="regDatePicker" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input id="patient_reg_date" type="date" name="patient_reg_date" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_reg_date; ?>" <?php } ?> class="form-control datetimepicker-input" tabindex="2"/>
									</div>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_reg_date col-md-10"></span>
								</div>
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-2">Expires&nbsp;on: </label>
									<div class="input-group date col-md-10" id="casedatepicker1" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input type="date" name="patient_expiry_date" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_expiry_date; ?>" <?php } ?> class="form-control datetimepicker-input" tabindex="3" />
									</div>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_expiry_date col-md-10"></span>
								</div>
							</div>

						</fieldset>
						<fieldset style="border: 1px solid #01b2c6; padding: 0px 20px 5px 20px">
							<legend style="font-size: 18px;"><strong>Personal Info:</strong></legend>
							<div class="form-row mt-2">
								<div class="form-inline col-md-2">
									<label for="docName" class="col-md-3"><span style="color: red">*</span>Title</label>
									<select class="form-control col-md-9" name="patient_title" id="exampleFormControlSelect1" tabindex="4">
										<option value="">Select Title</option>
										<?php foreach ($salutations as $salutation) { ?>
										<option value="<?php echo $salutation->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_title == $salutation->id) { ?> selected <?php } 	} ?>><?php echo $salutation->title; ?></option>
										<?php } ?>
										
									</select>
									<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_title col-md-9"></span>
								</div>
								<div class="form-inline col-md-5">
									<label for="docName" class="col-md-2"><span style="color: red">*</span>SurnName</label>
									<input type="text" class="form-control col-md-10" id="patient_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_name; ?>" <?php } ?> name="patient_name" placeholder="Enter Name" tabindex="5">
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_name col-md-10"></span>
								</div>
								<div class="form-inline col-md-5">
									<label for="docEmail" class="col-md-3"><span style="color: red">*</span>Other&nbsp;Names</label>
									<input type="text" class="form-control col-md-9" id="patient_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_name; ?>" <?php } ?> name="patient_other_names" placeholder="Enter Name" tabindex="6">
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_other_names col-md-10"></span>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-inline col-md-3">
									<label for="docpassword" class="col-md-3"><span style="color: red">*</span>Date&nbsp;of&nbsp;Birth</label>
									<div class="input-group date col-md-9" id="casedatepicker1" data-target-input="nearest">
										<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
										<input onchange="calculate_age()" type="date" id="dob" name="patient_dob" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_dob; ?>" <?php } ?> class="form-control datetimepicker-input" tabindex="7" />
									</div>
									<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_dob col-md-9"></span>
								</div>
								<div class="form-inline col-md-2">
									<label class="col-md-4">Age&nbsp;(Yrs)</label>
									<input disabled type="text" id="age" <?php if ($this->uri->segment(3)) { ?> value =" <?php echo $this->patient_m->calculate_age2($patient_details->patient_dob);  } ?>" class="form-control datetimepicker-input col-md-8" />
								</div>
								<div class="form-inline col-md-3">
									<label for="docName" class="col-md-2">Sex</label>
									<select class="form-control col-md-10" name="patient_gender" id="exampleFormControlSelect2" tabindex="8">
										<option value="">Select Gender</option>
										<option value="Male" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_gender == 'Male') { ?> selected <?php } 											} ?>>Male</option>
										<option value="Female" <?php if ($this->uri->segment(3)) {
																	if ($patient_details->patient_gender == 'Female') { ?> selected <?php } 										} ?>>Female</option>
									</select>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_gender col-md-10"></span>
								</div>
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-3">Marital&nbsp;Status</label>
									<select class="form-control col-md-9" name="marital_status" id="exampleFormControlSelect2" tabindex="9">
										<option value="">Select Status</option>
										<option <?php if ($this->uri->segment(3)) { if ($patient_details->patient_marital_status == 'Single') { ?> selected <?php } 	} ?> value="Single">Single</option>
										<option <?php if ($this->uri->segment(3)) { if ($patient_details->patient_marital_status == 'Married') { ?> selected <?php } 	} ?> value="Married">Married</option>
									</select>
									<label class="col-md-3"></label><span style="color:#ff0000;" class="error marital_status col-md-9"></span>
								</div>
							</div>

							<div class="form-row mt-2">
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-3">Email&nbsp;Address</label>
									<input type="email" class="form-control col-md-9" id="patient_email" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_email; ?>" <?php } ?> name="patient_email" placeholder="Enter Email Address" tabindex="10">
								</div>
								<div class="form-inline col-md-4">
									<label for="docName" class="col-md-2">Religion</label>
									<select class="form-control col-md-10" name="patient_religion" id="exampleFormControlSelect5" tabindex="11">
										<option value="">Select Religion</option>
										<?php foreach ($religions as $religion) { ?>
										<option value="<?php echo $religion->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_religion == $religion->id) { ?> selected <?php } } ?>><?php echo $religion->religion_name; ?></option>
										<?php } ?>
									</select>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_religion col-md-10"></span>
								</div>
								<div class="form-inline col-md-4">
									<label for="docEmail" class="col-md-3">Occupation</label>
									<select class="form-control col-md-9" name="patient_occupation" id="patient_occupation" tabindex="12">
										<option value="">Select Occupation</option>
										<?php foreach ($occupations as $occupation) { ?>
										<option value="<?php echo $occupation->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_occupation == $occupation->id) { ?> selected <?php } 	} ?>><?php echo $occupation->occupation_name; ?></option>
										<?php } ?>
										
									</select>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="form-inline col-md-6">
									<label for="docName" class="col-md-2">Tribe: </label>
									<select class="form-control col-md-10" name="patient_tribe" id="exampleFormControlSelect4" tabindex="13">
										<option value="">Select Tribe</option>
										<?php foreach ($tribes as $tribe) { ?>
										<option value="<?php echo $tribe->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_tribe == $tribe->id) { ?> selected <?php }  } ?>><?php echo $tribe->tribe_name; ?></option>
										<?php } ?>
									</select>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_tribe col-md-10"></span>
								</div>
								<div class="form-inline col-md-6">
									<label for="docName" class="col-md-2">Reg Type: </label>
									<select class="form-control col-md-10" name="patient_regtype" id="exampleFormControlSelect7" tabindex="14">
										<option value="">Select Reg Type</option>
										<option value="Walk-In" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_regtype == 'Walk-In') { ?> selected <?php }																				} ?>>Walk-In</option>
										<option value="Outpatient" <?php if ($this->uri->segment(3)) {
																		if ($patient_details->patient_regtype == 'Outpatient') { ?> selected <?php }														} ?>>Outpatient</option>
									</select>
									<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_regtype col-md-10"></span>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-lg-2 col-md-12">
						<div id="results" style="font-size: 12px;">Your captured image will appear here...</div>
						<!-- A button for taking snaps -->
						<div id="my_camera"></div>

						<button type=button class="btn btn-primary" id="openCamera" onClick="take_snapshot2()"><i class="fa fa-camera"></i> Open Camera </button>
						<button style="display: none;" id="takeSnapshot" type=button class="btn btn-warning" onClick="take_snapshot()"><i class="fa fa-camera-retro"></i> Take Snapshot </button>
						<!-- <input type=button value="Take Snapshot 2" onClick="take_snapshot()"> -->
						<h5>OR</h5>
						<?php if ($this->uri->segment(3)) { if (isset($patient_details->patient_photo)) { ?>
							<input hidden type="text" name="patient_image" value="<?php echo $patient_details->patient_photo; ?>">
						<?php } } ?> 
						<input type='file' class="form-control" name="image" id="user_image" onchange="readURL(this);" />
						<img id="blah" src="<?php if ($this->uri->segment(3)) { if (isset($patient_details->patient_photo)) { echo base_url('uploads/' . $patient_details->patient_photo); } } ?>" alt="" class="mt-3" />
					</div>
					<div class="col-lg-12 col-md-12">

						<fieldset class="my-3" style="border: 1px solid #01b2c6; padding: 0px 20px 5px 20px">
							<legend style="font-size: 18px;"><strong> Address & other contact information</strong></legend>

							<div class="row clearfix">
								<div class="col-lg-6 col-md-12">

									<div class="form-inline col-md-12">
										<label for="docEmail" class="col-md-3"><span style="color: red">*</span>Res&nbsp;Address</label>
										<textarea class="form-control col-md-9" id="patient_address" name="patient_address" tabindex="15"><?php if ($this->uri->segment(3)) { ?><?php echo $patient_details->patient_address; ?> <?php } ?></textarea>
										<label class="col-md-2"></label><span style="color:#ff0000;" class="error patient_address col-md-10"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docName" class="col-md-3"><span style="color: red">*</span>Next&nbsp;of&nbsp;Kin</label>
										<input type="text" class="form-control col-md-9" id="nok_name" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_name; ?>" <?php } ?> name="nok_name" placeholder="Enter Name" tabindex="17">
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error nok_name col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docEmail" class="col-md-3"><span style="color: red">*</span>Next of Kin Address</label>
										<input type="text" name="nok_address" class="form-control col-md-9" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_address; ?>" <?php } ?> id="nok_address" placeholder="Enter Address" tabindex="18">
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error nok_address col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docName" class="col-md-3"><span style="color: red">*</span>Next of Kin Tel: </label>
										<input type="text" maxlength="11" class="form-control col-md-9" id="nok_phone" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->nok_phone; ?>" <?php } ?> name="nok_phone" placeholder="Enter Number" tabindex="19">
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error nok_phone col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docEmail" class="col-md-3"><span style="color: red">*</span>Next&nbsp;of&nbsp;Kin&nbsp;R/ship:</label>
										<select class="form-control col-md-9"  name="nok_relationship" id="nok_relationship" tabindex="20">
											<option value="">Select Relationship</option>
											<?php foreach ($next_of_kin_rel as $relationship) { ?>
												<option value="<?php echo $relationship->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->nok_relationship == $relationship->id) { ?> selected <?php } } ?>><?php echo $relationship->rel_name; ?></option>
											<?php } ?>
										</select>
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error nok_relationship col-md-9"></span>
									</div>

								</div>
								<div class="col-lg-6 col-md-12">

									<div class="form-inline col-md-12">
										<label for="docEmail" class="col-md-3">Phone&nbsp;Number: </label>
										<input maxlength="11" type="text" class="form-control col-md-9" id="patient_phone" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_phone; ?>" <?php } ?> name="patient_phone" placeholder="Enter Number" tabindex="16">
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_phone col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docEmail" class="col-md-3">City Area</label>
										<input type="text" class="form-control col-md-9" id="patient_city" <?php if ($this->uri->segment(3)) { ?>value="<?php echo $patient_details->patient_city; ?>" <?php } ?> name="patient_city" placeholder="Area" tabindex="21">
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_city col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docEmail" class="col-md-3">Country: </label>
										<select class="form-control col-md-9" name="patient_country" id="exampleFormControlSelect6" tabindex="22">
											<option value="">Select Country</option>
											<?php foreach ($countries as $country) { ?>
												<option <?php if ($country->id=='156'){ echo "selected"; } ?> value="<?php echo $country->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_country == $country->id) { ?> selected <?php }																			} ?>><?php echo $country->name; ?></option>
											<?php } ?>
										</select>
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_country col-md-9"></span>
									</div>

									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docEmail" class="col-md-3">State: </label>
										<select class="form-control col-md-9" name="patient_state" id="exampleFormControlSelect6" tabindex="23">
											<option value="">Select State</option>
											<?php foreach ($states as $state) { ?>
												<option value="<?php echo $state->id; ?>" <?php if ($this->uri->segment(3)) { if ($patient_details->patient_state == $state->id) { ?> selected <?php }																				} ?>><?php echo $state->name; ?></option>
											<?php } ?>
										</select>
										<label class="col-md-3"></label><span style="color:#ff0000;" class="error patient_state col-md-9"></span>
									</div>
									<div class="form-inline col-md-12" style="margin-top: 5px; ">
										<label for="docName" class="col-md-3">Outside Nigeria: </label>
										<input type="text" maxlength="11" class="form-control col-md-9" id="outside" name="outside" placeholder="" tabindex="24">
									</div>

								</div>

							</div>
						</fieldset>

						<fieldset class="my-3" style="border: 1px solid #01b2c6; padding: 0px 20px 5px 20px;">
							<legend style="font-size: 18px"><strong>Patient Category</strong></legend>
							<div class="form-row mt-2" tabindex="25">
								<div class="form-group col-md-3">
									<label class="fancy-radio">
										<input type="radio" <?php if ($this->uri->segment(3) && $patient_details->patient_status == 'Private') { ?> checked <?php } ?> name="patient_status" onclick="toggleRadio(false)" value="private">
										<span><i></i>Private</span>
									</label>
								</div>
							</div>
							<div class="form-row mt-2" tabindex="26">
								<div class="form-group col-md-3">
									<label class="fancy-radio">
										<input type="radio" <?php if ($this->uri->segment(3) && $patient_details->patient_status != 'Private') { ?> checked <?php } ?> name="patient_status" onclick="toggleRadio(true)" value="Retainer/HMO">
										<span><i></i>Retainer/HMO</span>
									</label>
									<p id="error-radio"></p>
								</div>
								<div class="form-group col-md-9" tabindex="27">
									<select class="form-control" disabled="" name="patient_status2" id="patient_status">
										<option value="">Select Retainer</option>
										<option value="A">Lawyer</option>
									</select>
								</div>
							</div>
							<div class="form-row mt-2" tabindex="28">
								<div class="form-group">
									<label class="fancy-checkbox">
										<input type="checkbox" onclick="togglenhis()" id="nhis" name="managed_healthcare">
										<span>Managed Health Care (NHIS/Others)</span>
									</label>
								</div>
							</div>
							<div class="form-row mt-2" tabindex="29">
								<div class="form-group col-md-4">
									<label for="docName">Enrollee Type</label>
									<select class="form-control" name="enrollee_type" disabled="" id="enrollee_type">
										<option value="">Select Enrollee Type</option>
										<?php foreach ($enrollee_type_list as $enrollee) { ?>
											<option value="<?php echo $enrollee->id; ?>"><?php echo $enrollee->enrollee_type_name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-4" tabindex="30">
									<label for="docName">Company/Ministry</label>
									<input type="text" class="form-control" id="company" disabled="" name="company" placeholder="Enter Name">
								</div>
								<div class="form-group col-md-4" tabindex="31">
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
            $('#age').val(data);


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