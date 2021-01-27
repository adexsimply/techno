<!-- Add new history Modal -->
	<div class="modal fade" id="operation" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
		<form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">	
				<div class="modal-header">
					<h6 class="modal-title text-primary">Operation -  Janet Jackson</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body edit-doc-profile">	


                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <b>Date</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control date" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <b>Hospital Number</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Provisional Diagnosis</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <b>Name</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" disabled="" placeholder="Janet Jackson">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <b>Anesthesia</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Staff</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Patient Images</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Operation Notes</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Post OP Orders</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Drug Prescriptions</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="Home">
                                   
                                    <div class="col-lg-12 col-md-6">
                                        <b>Surgeon</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_firstname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Anaesthetics</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_firstname; ?>></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Scrub Nurse</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_firstname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Circulating Nurse</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_firstname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Assistant</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $doctor->staff_firstname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Profile">
                                   
                                </div>
                                <div class="tab-pane" id="Contact">
                                 
                                </div>
                            </div>
                        </div>

                                </div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<input type="submit" title="add_appointment" class="btn btn-primary px-4 m-2" value="Save">
				</div>
				</form>
			</div>
		</div>
	</div>