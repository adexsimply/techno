<div class="col-12">
	<div class="card box-margin">
		<div class="card-body">

			<form id="add-drug">
				<div class="modal-body edit-doc-profile">
					<div class="row clearfix">
						<?php //var_dump($drug)
						//var_dump($this->session->userdata('active_user')->fullname);
						if (isset($drug->id)) { ?>
							<input type="hidden" class="form-control" name="id" value="<?php echo $drug->id; ?> ">

						<?php
						}
						?>
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Drug Name</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="name" value="<?php if (isset($drug->drug_item_name)) {
																									echo $drug->drug_item_name;
																								} ?> ">
									<code style=" color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="name"></code>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Quantity in Stock</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" name="quantity" value="<?php if (isset($drug->quantity_in_stock)) {
																											echo $drug->quantity_in_stock;
																										} ?>" placeholder="150">
									<code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="quantity"></code>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Cost</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" name="cost" value="<?php if (isset($drug->drug_cost)) {
																										echo $drug->drug_cost;
																									} ?>" placeholder="150">
									<code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="cost"></code>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Group</label>
								<div class="col-sm-10">
									<select class="form-control" name="group" id="request_destination">
										<option value="">Select Group</option>
										<?php foreach ($drug_groups_list as $drug_group) { ?>
											<option value="<?php echo $drug_group->id; ?>" <?php if (isset($drug->id) && $drug_group->id == $drug->drug_group_id) {
																								echo "selected";
																							} ?>><?php echo $drug_group->drug_group_name; ?></option>
										<?php } ?>
									</select>
									<code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" data-field="group"></code>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="text-right">
								<button class="btn btn-success" type="button" onclick="form_routes_drug('add_drug')" title="add_drug">Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('setting/drug-script'); ?>