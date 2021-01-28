<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

<div id="main-content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12">
					<h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Patients</h2>
				</div>
			</div>
		</div>

		<div class="row clearfix">
			<div class="col-md-12">
				<div class="card patients-list">
					<div class="header">
						<h2>Patient Record</h2>
					</div>
					<div class="body">

						<div class="card-body">
							<form id="add-patient" action="<?php echo base_url('patient/upload_patient'); ?>" method="post" enctype="multipart/form-data">
								<fieldset>
									<legend>Personal Details:</legend>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docName">Patient Title</label>
											<select class="form-control" name="patient_title" id="exampleFormControlSelect1">
												<option value="">Select Title</option>
												<option value="Mr">Mr</option>
												<option value="Miss">Miss</option>
											</select>
											<span style="color:#ff0000;" class="error patient_title"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Patient Name</label>
											<input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Name">
											<span style="color:#ff0000;" class="error patient_name"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Patient ID</label>
											<input type="text" name="patient_id_num" class="form-control" id="patient_id_num" placeholder="Enter ID">
											<span style="color:#ff0000;" class="error patient_id_num"></span>
										</div>
									</div>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docEmail">Email Address</label>
											<input type="email" class="form-control" id="patient_email" name="patient_email" placeholder="Enter Email Address">
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Patient Gender</label>
											<select class="form-control" name="patient_gender" id="exampleFormControlSelect1">
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
											<span style="color:#ff0000;" class="error patient_gender"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docpassword">Date of Birth</label>
											<div class="input-group date" id="casedatepicker1" data-target-input="nearest">
												<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fas fa-calendar    "></i></div>
												</div>
												<input type="date" name="patient_dob" class="form-control datetimepicker-input" />
											</div>
											<span style="color:#ff0000;" class="error patient_dob"></span>
										</div>
									</div>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docEmail">Patient Phone</label>
											<input type="text" class="form-control" id="patient_phone" name="patient_phone" placeholder="Enter Number">
											<span style="color:#ff0000;" class="error patient_phone"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Blood Group</label>
											<select class="form-control" name="patient_blood_group" id="exampleFormControlSelect1">
												<option value="">Select Blood Group</option>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
											<span style="color:#ff0000;" class="error patient_blood_group"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Patient Address</label>
											<input type="text" class="form-control" id="patient_address" name="patient_address" placeholder="Enter Address">
											<span style="color:#ff0000;" class="error patient_address"></span>
										</div>
									</div>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docName">Tribe</label>
											<select class="form-control" name="patient_tribe" id="exampleFormControlSelect1">
												<option value="">Select Tribe</option>
												<option value="Hause">Hausa</option>
												<option value="Igbo">Igbo</option>
											</select>
											<span style="color:#ff0000;" class="error patient_tribe"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Religion</label>
											<select class="form-control" name="patient_religion" id="exampleFormControlSelect1">
												<option value="">Select Religion</option>
												<option value="Christianity">Christianity</option>
												<option value="Islam">Islam</option>
											</select>
											<span style="color:#ff0000;" class="error patient_religion"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Place of Origin</label>
											<input type="text" class="form-control" id="patient_address" name="patient_origin" placeholder="Enter Origin">
											<span style="color:#ff0000;" class="error patient_origin"></span>
										</div>
									</div>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docEmail">Occupation</label>
											<select class="form-control" name="patient_occupation" id="exampleFormControlSelect1">
												<option value="">Select Status</option>
												<option value="A">Lawyer</option>
											</select>
											<span style="color:#ff0000;" class="error patient_occupation"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Reg Type</label>
											<select class="form-control" name="patient_regtype" id="exampleFormControlSelect1">
												<option value="">Select Reg Type</option>
												<option value="Walk-In">Walk-In</option>
												<option value="Outpatient">Outpatient</option>
											</select>
											<span style="color:#ff0000;" class="error patient_regtype"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Upload Photo</label>
											<input type="file" class="form-control" id="image" name="image" placeholder="Select Photo">
											<span style="color:#ff0000;" class="error image"></span>
										</div>
									</div>
								</fieldset>

								<fieldset class="my-3">
									<legend>Next of Kin Details</legend>
									<div class="form-row mt-2">
										<div class="form-group col-md-4">
											<label for="docName">Title</label>
											<select class="form-control" name="nok_title" id="nok_title">
												<option value="">Select Title</option>
												<option value="Mr">Mr</option>
											</select>
											<span style="color:#ff0000;" class="error nok_title"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Name</label>
											<input type="text" class="form-control" id="nok_name" name="nok_name" placeholder="Enter Name">
											<span style="color:#ff0000;" class="error nok_name"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Relationship</label>
											<input type="text" name="nok_relationship" class="form-control" id="nok_relationship" placeholder="Enter Relationship">
											<span style="color:#ff0000;" class="error nok_relationship"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docName">Contact Number</label>
											<input type="text" class="form-control" id="nok_phone" name="nok_phone" placeholder="Enter Number">
											<span style="color:#ff0000;" class="error nok_phone"></span>
										</div>
										<div class="form-group col-md-4">
											<label for="docEmail">Contact Address</label>
											<input type="text" name="nok_address" class="form-control" id="nok_address" placeholder="Enter Address">
											<span style="color:#ff0000;" class="error nok_address"></span>
										</div>
									</div>
								</fieldset>

								<fieldset class="my-3">
									<legend>Account Status</legend>
									<div class="form-row mt-2">
										<div class="form-group col-md-3">
											<label class="fancy-radio">
												<input type="radio" name="patient_status" onclick="toggleRadio(false)" value="private">
												<span><i></i>Private</span>
											</label>
											<label class="fancy-radio">
												<input type="radio" name="patient_status" onclick="toggleRadio(true)" value="Retainer/HMO">
												<span><i></i>Retainer/HMO</span>
											</label>
											<p id="error-radio"></p>
										</div>
										<div class="form-group col-md-3">
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
									<input type="submit" title="add_patient" class="btn btn-primary px-4 m-2" value="Register">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('patient/script'); ?>