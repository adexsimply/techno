<!-- Add new history Modal -->
	<div class="modal fade" id="labTest" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
		<form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">	
				<div class="modal-header">
					<h6 class="modal-title text-primary">New</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body edit-doc-profile">	


                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-6">
                                        <b>Name</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" placeholder="Paracetamol">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Measure</b>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control time12" placeholder="Paracetamol">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Group</b>
                                        <div class="input-group mb-3">
											<select class="form-control" name="request_destination" id="request_destination">
												<option value="">Select Group</option>
												<?php foreach($lab_groups_list as $lab_group) { ?>
												<option value="<?php echo $lab_group->id; ?>"><?php echo $lab_group->lab_group_name; ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Range</b>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control time12" placeholder="5">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Cost</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" placeholder="40000">
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

