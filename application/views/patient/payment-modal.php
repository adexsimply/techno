<!-- Add new history Modal -->
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