<!-- Add new history Modal -->
	<div class="modal fade" id="addNewCaseHistory" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
		<form id="add-patient-history" action="<?php echo base_url('patient/add_history'); ?>" method="post" >	
				<div class="modal-header">
					<h6 class="modal-title text-primary">Add Case History</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body edit-doc-profile">	
						<div class="form-group col-12">
							<label for="caseTitle">Title</label>
							<input type="text" name="patient_id" hidden="" value="<?php echo $this->uri->segment(3); ?>">
							<input type="text" class="form-control" id="case_title" name="case_title" placeholder="Enter Case Title">
							<span style="color:#ff0000;" class="error case_title"></span>
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Date</label>
							<div class="input-group date" id="casedatepicker1" data-target-input="nearest">
								<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fas fa-calendar    "></i></div>
								</div>
								<input type="date" id="case_date" name="case_date" class="form-control datetimepicker-input"/>
								
							</div>
								<span style="color:#ff0000;" class="error case_date"></span>
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Prescription</label>
							<input type="text" name="case_prescription" class="form-control" id="case_prescription" placeholder="Enter Prescription">
							<span style="color:#ff0000;" class="error case_description"></span>
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Remark</label>
							<input type="text" class="form-control" id="case_remark" name="case_remark" placeholder="Enter Remark">
							<span style="color:#ff0000;" class="error case_remark"></span>
						</div>
						<div class="form-group col-12">
							<label for="caseDate">Description</label>
							<textarea class="form-control" id="case_description" name="case_description" placeholder="Enter Description"></textarea>
							<span style="color:#ff0000;" class="error case_description"></span>
						</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<input type="submit" title="add_patient_history" class="btn btn-primary px-4 m-2" value="Add New Case">
				</div>
				</form>
			</div>
		</div>
	</div>