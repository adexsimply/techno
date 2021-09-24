<?php //var_dump($admission_details); ?>
<div class="tab-pane table-responsive active show" id="generalConsultation">
		<button class="btn btn-outline-dark  btn-sm" type="button" title="add_consultation_btn" data-toggle="modal" data-target="#takeVitals" onclick="consultation_dialog(event)" href="<?php echo base_url('nursing/general_consultation/').$admission_details->patient_id; ?>" data-type="black" data-size="xl" data-title="New Consultation">
			<i class="fa fa-plus-circle"></i> Add Consultation
		</button>
	<table class="table table-bordered table-striped table-hover dataTable js-exportable">
		<thead class="thead-dark">
			<tr>
				<th>S/N</th>
				<th>Date</th>
				<th>Doctor</th>
				<th>Complaint</th>
				<th>Dioagnosis</th>
				<th>Test</th>
				<th>Treatment</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="consultationList">
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<!-- Javascript in /script/general_consultation_script and included in ../script.php -->