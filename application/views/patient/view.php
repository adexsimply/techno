<style type="text/css">
	.member-card .header {
    min-height: 50px;
}
.member-card .member-img img {
    width: 100px;
}
.member-card .member-img {
    position: relative;
    margin-top: -20px;
}
.card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#billingList thead th, #billingList tbody td {
//font-size: 0.6em;
  padding: 1px !important;
  height: 15px;
}

.body thead th, .body tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
</style>
<div class="container-fluid">

	<div class="row clearfix">
		<?php //var_dump($patient) 
		?>
		<div class="col-lg-3 col-md-12">
			<div class="card member-card">
				<div class="header l-coral">
					<h4 class="m-t-10 text-light" style="font-size: 1.2rem"><?php echo $patient->title . " " . $patient->patient_name ?></h4>
				</div>
				<div class="member-img">
					<a href="patient-invoice.html">
						<img src="<?php if (!empty($patient->patient_photo)) { echo base_url('uploads/').$patient->patient_photo; } else { echo base_url('assets/images/ppph.jpg'); } ?>" class="rounded-circle" alt="profile-image">
					</a>
				</div>
				<div class="body">
					<div class="col-12">
						<ul class="social-links list-unstyled">
							<h4 class="m-t-8"><?php echo $patient->patient_id_num; ?></h4>
							<li>Gender : <?php echo $patient->patient_gender; ?></li>,
							<li>Age : <?php echo date_diff(date_create($patient->patient_dob), date_create('today'))->y; ?></li>,
							<li>Blood Group : <?php echo $patient->patient_blood_group; ?></li>
							<li>Tribe : <?php echo $patient->patient_tribe; ?></li><br>
							<li>Account Type: <?php echo $patient->patient_status; ?></li>
						</ul>
					</div>
					<hr>
					<strong>Occupation</strong>
					<p><?php echo $patient->patient_occupation; ?></p>
					<strong>Email ID</strong>
					<p><?php echo $patient->patient_email; ?></p>
					<strong>Phone</strong>
					<p><?php echo $patient->patient_phone; ?></p>
					<hr>
					<strong>Address</strong>
					<address><?php echo $patient->patient_address; ?>--<?php echo $patient->patient_origin; ?></address>
					<hr>
					<strong>Next of Kin</strong>
					<ul class="social-links list-unstyled">
						<li>Name : <?php echo $patient->nok_name; ?></li><br>
						<li>Address : <?php echo $patient->nok_address; ?></li><br>
						<li>Relationship : <?php echo $patient->nok_relationship; ?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-9 col-md-12">
			<div class="card">

				<div class="body">
					<ul class="nav nav-tabs-new2">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" onclick="listDefaultConsultationByPatient()" href="#documents">Documents</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#otherdocuments">Other Documents</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#requests">Requests</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#billings">Billings</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#account">Account</a></li>
					</ul>
					<div class="tab-content mt-3">

						<div class="tab-pane active" id="documents">

							<div class="row clearfix">
								<div class="col-md-12">
									<div class="card patients-list">
										<div class="body">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs-new2">
												<li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#general">General Consultation</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#eye">Eye Clinic</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#anc">ANC</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dental">Dental Clinc</a></li>
											</ul>

											<!-- Tab panes -->
											<div class="tab-content m-t-10 padding-0">
												<input type="text" hidden="" id="patient_id2" value="<?php echo $patient->patient_id; ?>" name="">
												<input type="text" hidden id="vital_id" value="<?php echo $patient->vital_id; ?>" name="">
												<div class="tab-pane table-responsive active show" id="general">
													<?php if ($patient->appointment_id != NULL && $consultations == Null) { ?>
														<button class="btn btn-dark m-b-15 m-t-15" type="button" title="add_consultation_btn" data-toggle="modal" data-target="#takeVitals" onclick="consultation_dialog(event)" data-type="black" data-size="l" data-title="New Consultation for <?php echo $patient->patient_name.' '.$patient->appointment_date.' '.$patient->appointment_time; ?>" href="<?php echo base_url('patient/add_consultation/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add Consultation
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-dark">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<!-- <th>Time</th> -->
																<th>Doctor</th>
																<th>Complaint</th>
																<th>Dioagnosis</th>
																<th>Test</th>
																<th>Treatment</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody id="consultationList">
													<!-- 		<?php $i = 1;
															//var_dump($consultations);
															foreach ($consultations as $consultation) { ?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($consultation->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($consultation->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo $consultation->staff_firstname . " " . $consultation->staff_lastname . " " . $consultation->staff_middlename; ?></span></td>
																	<td><?php echo $consultation->complaint ?></td>
																	<td><?php echo $consultation->assignment ?></td>
																	<td><?php //echo $consultation->test 
																		?></td>
																	<td><?php echo substr($consultation->treatment, 0,15);  ?></td>
																	<td>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="consultation_dialog(event)" data-type="black" data-size="l" data-title="Edit Consultation for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_consultation/' . $consultation->con_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View Consultation" href="<?php echo base_url('patient/view_consultation/' . $consultation->con_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>
																		<button class="btn btn-dark" type="button" onclick="delete_consultation(<?php echo $consultation->con_id ?>)">
																			<i class="fa fa-trash"></i>
																		</button>
																	</td>

																</tr>
															<?php } ?> -->
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="eye">
													<?php if ($patient->appointment_id != NULL && $eye_clinics == Null) { ?>
														<button class="btn btn-success m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="<?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_eye_clinic/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-success">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Doctor</th>
																<th>Complaint</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1;
															foreach ($eye_clinics as $eye_clinic) { ?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($eye_clinic->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($eye_clinic->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo $eye_clinic->staff_firstname . " " . $eye_clinic->staff_lastname . " " . $eye_clinic->staff_middlename; ?></span></td>
																	<td><?php echo $eye_clinic->complaint ?></td>
																	<td>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Eye Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_eye_clinic/' . $eye_clinic->eye_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View  Eye Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_eye_clinic/' . $eye_clinic->eye_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>
																		<button class="btn btn-dark" type="button" onclick="delete_eye_clinic(<?php echo $eye_clinic->eye_id ?>)">
																			<i class="fa fa-trash"></i>
																		</button>
																	</td>
																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="anc">
													<?php if ($patient->appointment_id != NULL) { ?>
														<button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_dental/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-warning">
															<tr>
																<th>Media</th>
																<th>Patients ID</th>
																<th>Name</th>
																<th>Age</th>
																<th>Address</th>
																<th>Number</th>
																<th>Last Visit</th>
																<th>Status</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="dental">
													<?php if ($patient->appointment_id != NULL && $dental_clinics == Null) { ?>
														<button class="btn btn-primary m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_dental/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-primary">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Doctor</th>
																<th>Complaint</th>
																<th>Dioagnosis</th>
																<th>Test</th>
																<th>Treatment</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
														<tbody>
															<?php $i = 1;
															foreach ($dental_clinics as $dental_clinic) {
																//var_dump($dental_clinic); 
															?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($dental_clinic->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($dental_clinic->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo $dental_clinic->staff_firstname . " " . $dental_clinic->staff_lastname . " " . $dental_clinic->staff_middlename; ?></span></td>
																	<td><?php echo $dental_clinic->complaint ?></td>
																	<td><?php echo $dental_clinic->assignment ?></td>
																	<td><?php //echo $dental_clinic->test 
																		?></td>
																	<td><?php echo $dental_clinic->treatment ?></td>
																	<td>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_dental_clinic/' . $dental_clinic->dental_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Dental Clinic" href="<?php echo base_url('patient/view_dental_clinic/' . $dental_clinic->dental_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>
																		<button class="btn btn-dark" type="button" onclick="delete_dental_clinic(<?php echo $dental_clinic->dental_id ?>)">
																			<i class="fa fa-trash"></i>
																		</button>
																	</td>

																</tr>
															<?php } ?>
														</tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="requests">

							<div class="row clearfix">
								<div class="col-md-12">
									<div class="card patients-list">
										<div class="body">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs-new2">
												<li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#laboratory">Laboratory</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#radiology">Radiology</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="listDefaultPrescriptionByPatient()" href="#prescriptions">Prescriptions</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#admission">Admission</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#procedures">Procedures</a></li>
											</ul>

											<!-- Tab panes -->
											<div class="tab-content m-t-10 padding-0">
												<div class="tab-pane table-responsive active show" id="laboratory" style="max-height: 400px;">
													<?php if ($patient->appointment_id != NULL && $lab_tests == Null) { ?>
														<button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Laboratory for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_lab/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<?php //var_dump($lab_tests)
													?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-dark">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Status</th>
																<!-- <th>Price</th> -->
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1;
															foreach ($lab_tests as $lab_test) {
																//var_dump($lab_test);

															 ?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($lab_test->date_created)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($lab_test->date_created)) ?></span></td>
																	<!-- <td><?php echo $lab_test->lab_test_name;  ?></td> -->
																	<td>
																		<?php if ($lab_test->status == "Pending") { ?>
																			<span class="badge badge-warning"><?php echo $lab_test->status ?></span>
																		<?php } else if ($lab_test->status == "Treated") { ?>
																			<span class="badge badge-success"><?php echo $lab_test->status ?></span>
																		<?php } else if ($lab_test->status == "Specimen") { ?>
																			<span class="badge badge-primary"><?php echo $lab_test->status ?></span>
																		<?php } else if ($lab_test->status == "Review") { ?>
																			<span class="badge badge-info"><?php echo $lab_test->status ?></span>
																		<?php } else if ($lab_test->status == "Incomplete") { ?>
																			<span class="badge badge-primary"><?php echo $lab_test->status ?></span>
																		<?php } ?>
																	</td>
																	<td>

																		<?php if($lab_test->status == "Treated" || $lab_test->status == "Review") {?>
																		<button class="btn btn-dark" type="button" data-show="No" data-toggle="modal" data-target="#takeVitals" data-status="Treated" onclick="shiNew(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_treated/'.$lab_test->lab_test_id); ?>"> <i class="fa fa-eye"></i></button>
																		<?php } else  { ?> 
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_lab_test/' . $lab_test->lab_test_group_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>

																		<?php } ?>
																		<!-- <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View  Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_lab_test/' . $lab_test->lab_test_group_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button> -->
																		<!-- <button class="btn btn-dark" type="button" onclick="delete_lab_test(<?php echo $lab_test->lab_test_unique_id; ?>)">
																			<i class="fa fa-trash"></i>
																		</button> -->
																	</td>
																<?php } ?>
																</tr>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="radiology">
													<?php if ($patient->appointment_id != NULL && $radiologies == Null) { ?>
														<button class="btn btn-success m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Radiology for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_radiology/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-success">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1;
															foreach ($radiologies as $radiology) { ?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($radiology->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($radiology->date_added)) ?></span></td>
																	<td>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Radiology Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_radiology/' . $radiology->radiology_test_unique_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Radiology Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_radiology/' . $radiology->radiology_test_unique_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>
																		<button class="btn btn-dark" type="button" onclick="delete_radiology(<?php echo $radiology->radiology_test_unique_id ?>)">
																			<i class="fa fa-trash"></i>
																		</button>
																	</td>
																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="prescriptions">
													<?php if ($patient->appointment_id != NULL && $prescriptions == Null) { ?>
														<button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Prescription for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_prescription/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>

														    <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table m-b-0 table-hover">
														        <thead class="thead-warning">
														            <tr>
														            <tr>
														                <th>S/N</th>
														                <th>Date</th>
														                <th>Status</th>
														                <th>Action</th>
														            </tr>
														            </tr>
														        </thead>
														        <tbody id="prescriptionsList">

														        </tbody>
														    </table>
												</div>
												<div class="tab-pane table-responsive" id="admission">
													
														<button class="btn btn-warning m-b-15 m-t-15" onclick="admission_dialog(event)" data-type="black" data-size="l" data-title="Admission/Surgical Procedure Request" href="<?php echo base_url('patient/add_admission');?>">
															<i class="fa fa-bed"></i> Create
														</button>
													<table class="table m-b-0 table-hover">
														<thead class="thead-warning">
															<tr>
																<th>Date</th>
																<th>Sender</th>
																<th>Diagnosis</th>
																<th>Status</th>			
																<th>Actions</th>	
															</tr>
														</thead>
														<tbody>
															<?php foreach($patient_admissions as $admission)
															{
															 ?>
															<tr>
																<td><?php echo date('jS \of F Y', strtotime($admission->request_date)); ?></td>
																<td><?php echo $admission->staff_firstname . " " . $admission->staff_lastname; ?></td>
																<td><?php echo $admission->diagnosis; ?></td>
																<td><?php echo $admission->admission_status; ?></td>
																<td> <button title="Edit Patient" class="btn btn-sm btn-icon btn-pure btn-info" onclick="admission_dialog(event)" data-type="purple" data-size="l" data-title="Edit" href="<?php echo base_url('patient/add_admission/'.$admission->admission_id);?>"><i class="icon-pencil"></i></button>
                                                    <button title="Delete" class="btn btn-sm btn-icon btn-pure btn-danger" onclick="delete_admission(<?php echo $admission->admission_id; ?>)"><i class="icon-trash"></i></button></td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="procedures">
													<?php if ($patient->appointment_id != NULL) { ?>
														<button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_procedure/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table m-b-0 table-hover">
														<thead class="thead-warning">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Name</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $i = 1;
															foreach ($procedures as $procedure) { ?>
																<tr>
																	<td><?php echo $i++ ?></td>
																	<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($procedure->date_added)) ?></span></td>
																	<td><span class="list-name"><?php echo date('h:i:sa', strtotime($procedure->date_added)) ?></span></td>
																	<td><span class="list-name"> <?php echo $procedure->Name; ?>
																		<!-- 	<?php if ($procedure->status == "Pending") { ?>
																				<span class="badge badge-warning"><?php echo $procedure->status ?></span>
																			<?php } else if ($procedure->status == "Treated") { ?>
																				<span class="badge badge-success"><?php echo $procedure->status ?></span>
																			<?php } ?> -->
																	</td>
																	<td>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Procedure Items for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_procedure/' . $procedure->procedure_test_unique_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
																		<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Procedure Items for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_procedure/' . $procedure->procedure_test_unique_id) ?>">
																			<i class="fa fa-eye"></i>
																		</button>
																		<button class="btn btn-dark" type="button" onclick="delete_procedure(<?php echo $procedure->procedure_test_unique_id ?>)">
																			<i class="fa fa-trash"></i>
																		</button>
																	</td>
																</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="otherdocuments">

							<div class="row clearfix">
								<div class="col-md-12">
									<div class="card patients-list">
										<div class="body">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs-new2">
												<li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#med">Med Reports</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pdf">PDF Files</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images">Images</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#indexing">Indexing & Coding</a></li>
											</ul>

											<!-- Tab panes -->
											<div class="tab-content m-t-10 padding-0">
												<div class="tab-pane table-responsive active show" id="med">
													<?php if ($patient->appointment_id != NULL && $med_reports == Null) { ?>
														<button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Medical Report for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_med_report/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table table-bordered table-striped table-hover dataTable js-exportable">
														<thead class="thead-dark">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Doctor</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr>

																<?php $i = 1;
																foreach ($med_reports as $med_report) {
																	//var_dump($med_report);
																?>
															<tr>
																<td><?php echo $i++ ?></td>
																<td><span class="list-name"><?php echo date('jS \of F Y', strtotime($med_report->date_added)) ?></span></td>
																<td><span class="list-name"><?php echo date('h:i:sa', strtotime($med_report->date_added)) ?></span></td>
																<td><span class="list-name"><?php echo $med_report->staff_firstname . " " . $med_report->staff_lastname . " " . $med_report->staff_middlename; ?></span></td>
																<td>
																	<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Dental Clinic for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_med_report/' . $med_report->med_report_id) ?>">
																		<i class="fa fa-pencil"></i>
																	</button>
																	<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View Dental Clinic" href="<?php echo base_url('patient/view_med_report/' . $med_report->med_report_id) ?>">
																		<i class="fa fa-eye"></i>
																	</button>
																	<button class="btn btn-dark" type="button" onclick="delete_med_report(<?php echo $med_report->med_report_id ?>)">
																		<i class="fa fa-trash"></i>
																	</button>
																</td>

															</tr>
														<?php } ?>
														</tr>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="pdf">
													<?php if ($patient->appointment_id != NULL) { ?>
														<button class="btn btn-success m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add PDF for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_pdf/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table m-b-0 table-hover">
														<thead class="thead-success">
															<tr>
																<th>S/N</th>
																<th>Date</th>
																<th>Time</th>
																<th>Description</th>
																<th>EntryBy</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<tr>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="images">
													<?php if ($patient->appointment_id != NULL) { ?>
														<button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Image for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_image/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table m-b-0 table-hover">
														<thead class="thead-warning">
															<tr>
																<th>Media</th>
																<th>Patients ID</th>
																<th>Name</th>
																<th>Age</th>
																<th>Address</th>
																<th>Number</th>
																<th>Last Visit</th>
																<th>Status</th>
															</tr>
														</thead>
														<tbody>
															<tr>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="tab-pane table-responsive" id="indexing">
													<?php if ($patient->appointment_id != NULL) { ?>
														<button class="btn btn-dark m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Add Consultation for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_consultation/' . $patient->vital_id) ?>">
															<i class="fa fa-plus-circle"></i> Add New
														</button>
													<?php } ?>
													<table class="table m-b-0 table-hover">
														<thead class="thead-warning">
															<tr>
																<th>Media</th>
																<th>Patients ID</th>
																<th>Name</th>
																<th>Age</th>
																<th>Address</th>
																<th>Number</th>
																<th>Last Visit</th>
																<th>Status</th>
															</tr>
														</thead>
														<tbody>
															<tr>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="billings">

							<div>
								  <!-- <h6>Payment Method</h6>
				                                       <div class="payment-info">
				                                            <h3 class="payment-name"><i class="fa fa-paypal"></i> PayPal ****2222</h3>
				                                            <span>Next billing charged $29</span>
				                                            <br>
				                                            <em class="text-muted">Autopay on May 12, 2018</em>
				                                            <a href="javascript:void(0);" class="edit-payment-info">Edit Payment Info</a>
				                                        </div> -->
								<!-- <p class="margin-top-30"><a data-toggle="modal" data-target="#addPayment"><i class="fa fa-plus-circle"></i> Add Payment</a></p> -->
							</div>
							<!-- AddPayment Modal -->
							<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
								<form id="add-patient-history" action="#" method="post" >	
										<div class="modal-header">
											<h6 class="modal-title text-primary">Enter Amount</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body edit-doc-profile">
												<div class="form-group col-12">
													<label for="caseDate">Amount</label>
													<input type="number" name="case_prescription" class="form-control" id="amount" placeholder="1200">
													<span style="color:#ff0000;" class="error case_description"></span>
												</div>
										</div>
										<div class="modal-footer">
											<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
											<input type="submit" title="add_patient_history" class="btn btn-primary px-4 m-2" value="Confirm Payment">
										</div>
										</form>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-lg-12">
									<div class="card" style="max-height: 500px; overflow: scroll;">

										<button class="btn btn-success m-b-15 m-t-15" type="button" data-patient="<?php echo $patient->patient_name; ?>" data-toggle="modal" data-target="#takeVitals" onclick="bill_dialog(event)" data-type="black" data-size="m" data-title="Service Request" href="<?php echo base_url('billing/manual_billing/' . $patient->p_id) ?>">New Bill</button>
										<!-- <div class="header">
											                            <h2>Basic Table <small>Basic example without any additional modification classes</small> </h2>                            
											                        </div> -->
										<div class="body">
											<div class="table-responsive">
												<table id="billingList" style="font-size: 13px;padding: 0;" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th>S/N</th>
															<th>Date</th>
															<th>Service</th>
															<th>Receipt No</th>
															<th>Status</th>
															<th>Total</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 1;
														$debit = 0;
														$credit = 0;
														foreach ($patient_billings as $patient_billing) {
															if ($patient_billing->billing_type == 'Debit') {
																$debit += $patient_billing->amount;
															} elseif ($patient_billing->billing_type == 'Credit') {
																$credit += $patient_billing->amount;
															}
														?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php $ini_date = date_create($patient_billing->date_added);
																	echo date_format($ini_date, "d-M-Y h:i a"); ?></td>
																<td><?php echo $patient_billing->item_name; ?></td>
																<td><?php echo $patient_billing->invoice_id; ?></td>
																<td><?php echo $patient_billing->status; ?></td>
																<td><?php echo $patient_billing->amount; ?></td>
															</tr>
														<?php $i++;
														} ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- <h6>Balance:<span style="color: red"><?php echo $credit - $debit; ?> </span> </h6> -->
								</div>
							</div>

						</div>


						<div class="tab-pane" id="account">
							<div class="row clearfix">
								<div class="col-lg-12">
									<div class="card" style="max-height: 500px; overflow: scroll;">

										<div class="body">
											<div class="table-responsive">
												<table id="billingList" style="font-size: 13px;padding: 0;" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th>S/N</th>
															<th>Date</th>
															<th>Particulars</th>
															<th>Amount Billed</th>
															<th>Amount Paid</th>
															<th>Balance</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 1;
														$debit = 0;
														$credit = 0;
														$amount =0;
														foreach ($patient_ledger as $ledger) {
															// if ($patient_billing->billing_type == 'Debit') {
															$amount += $ledger->Debit; 
															$amount -=$ledger->Credit;
															// 	$debit += $patient_billing->amount;
															// } elseif ($patient_billing->billing_type == 'Credit') {
															// 	$credit += $patient_billing->amount;
															// }
														?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php $ini_date = date_create($ledger->Date);
																	echo date_format($ini_date, "d-M-Y h:i a"); ?></td>
																<td><?php echo $ledger->Description; ?></td>
																<td><?php echo $ledger->Debit; ?></td>
																<td><?php echo $ledger->Credit; ?></td>
																<td><?php echo $amount ?></td>
															</tr>
														<?php $i++;
														} ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- <h6>Balance:<span style="color: red"><?php echo $credit - $debit; ?> </span> </h6> -->
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('patient/all_script'); ?>
<?php $this->load->view('patient/new_consultation_script'); ?>
<?php $this->load->view('patient/new_eye_clinic_script'); ?>
<?php $this->load->view('patient/new_dental_script'); ?>
<?php $this->load->view('patient/new_med_report_script'); ?>
<?php $this->load->view('patient/new_radiolody_script'); ?>
<?php //$this->load->view('patient/new_prescription_script'); ?>
<?php $this->load->view('patient/new_lab_test_script'); ?>
<?php $this->load->view('patient/new_procedure_script'); ?>