<?php //var_dump($admission_details); ?>
<div class="tab-pane table-responsive active show" id="anc">
		<button class="btn btn-outline-info  btn-sm" type="button" title="add_consultation_btn" data-toggle="modal" data-target="#takeVitals" onclick="anc_dialog(event)" href="<?php echo base_url('nursing/anc/').$admission_details->patient_id; ?>" data-type="black" data-size="xl" data-title="ANC">
			<i class="fa fa-plus-circle"></i> Add ANC
		</button>
	<table class="table table-bordered table-striped table-hover dataTable js-exportable">
		<thead class="thead-info">
			<tr>
				<th>S/N</th>
				<th>BookDate</th>
				<th>LMP</th>
				<th>EDD</th>
				<th>Gravida</th>
				<th>Para</th>
				<th>DeliveryStatus</th>
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