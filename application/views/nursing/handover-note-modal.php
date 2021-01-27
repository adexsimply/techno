<!-- Add new history Modal -->
	<div class="modal fade" id="handOver" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
		<form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">	
				<div class="modal-header">
					<h6 class="modal-title text-primary">New Pharmacy Request</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body edit-doc-profile">	


                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6">
                                        <b>Date</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control date" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <b>Shift</b>
                                        <div class="input-group mb-3">
											<select class="form-control" name="request_destination" id="request_destination">
												<option value="">Select Shift</option>
												<?php foreach($request_destinations_list as $request_destinations) { ?>
												<option value="<?php echo $request_destinations->id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Admission List</b>
                                        <div class="input-group mb-3">
											<select class="form-control" name="request_destination" id="request_destination">
												<option value="">Select Patient</option>
												<?php foreach($request_destinations_list as $request_destinations) { ?>
												<option value="<?php echo $request_destinations->id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <b>Note</b>
                                        <div class="input-group mb-3">
											<textarea class="form-control"></textarea>
                                        </div>
                                    </div>


                                </div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<input type="submit" title="add_appointment" class="btn btn-primary px-4 m-2" value="Confirm">
				</div>
				</form>
			</div>
		</div>
	</div>

