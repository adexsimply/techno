<style type="text/css">
	
#invoiceList thead th, #invoiceList tbody td {
font-size: 13px;
  padding: 1px !important;
  height: 15px;
}
</style>
    <div class="card box-margin">
      <form id="add-payment">
        <div class="card-body" style="padding: 1px;">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($patient_details)
                        ?>

                       
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Hospital Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $patient_details->patient_id_num; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Receipt Number</b>
                            <div class="input-group">
                                <input type="text" class="form-control time24" disabled="" value="<?php echo $this->uri->segment(3); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Name</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="<?php echo $patient_details->patient_name; ?>" disabled="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Amount Due</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" value="₦<?php echo number_format($this->billing_m->invoice_total2($this->uri->segment(3))); ?>" disabled="">
                            </div>
                        </div>
                        <hr>


              						<table id="invoiceList" style="font-size: 13px;padding: 0;" class="table table-striped">
              							<thead class="thead-dark">
              								<tr>
              									<th>Date</th>
              									<th>Amount Due</th>
              									<th>Description</th>
              									<th>Pay</th>
              								</tr>
              							</thead>
              							<tbody>
              								<?php
              								$i = 1;
              								foreach ($patient_invoice as $invoice) {
              								?>
              									<tr>
              										<td><?php $ini_date = date_create($invoice->date_added);
              											echo date_format($ini_date, "d-M-Y h:i a"); ?></td>
              										<td><?php echo $invoice->amount; ?></td>
              										<td><?php echo $invoice->item_name; ?><input type="text" value="<?php echo $invoice->item_name; ?>" hidden name="description"></td>
              										<td><input type="text" name="patient_id" hidden value="<?php echo $invoice->patient_id; ?>"><input type="" name="billing_id[]" hidden value="<?php echo $invoice->id; ?>"><input type="checkbox" class="checkbox_check" id="<?php echo "inv".$invoice->id; ?>" onclick="toggle_total_pay(<?php echo $invoice->id.",".$invoice->amount; ?>)" checked name=""></td>
              									</tr>
              								<?php $i++;
              								} ?>
              							</tbody>
              						</table>
                </div>
                <div class="row clearfix">
                   
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Pay As</b>
                            <div class="input-group">
                              <select class="form-control" name="payas" id="payas">
                                <option value=""></option>
                                <option selected="" value="cash">Cash</option>
                              </select>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Full Payment</b>
                            <div class="input-group"><input type="" hidden name="invoice_id" value="<?php echo $this->uri->segment(3); ?>"><input type="text" hidden="" id="total_payment" value="<?php echo $this->billing_m->invoice_total2($this->uri->segment(3)); ?>"  name="displayed_total">
                                <input type="text" class="form-control time12" id="displayed_total" value="₦<?php echo number_format($this->billing_m->invoice_total2($this->uri->segment(3))); ?>" disabled="">
                            </div>
                        </div>
                </div>
        </div>
            </form>
    </div>
<script type="text/javascript">
	function toggle_total_pay(id,amount){
		var new_id = "inv"+id
		var checkBox = document.getElementById(new_id);
		//console.log(checkBox);
  		var total = document.getElementById('total_payment').value
  		if (checkBox.checked == true) {
  			var new_total = Number(total) + Number(amount)
  			//console.log(total)

  		$('#displayed_total').val('');
  		$('#total_payment').val('');
  		$('#displayed_total').val(new_total);
  		$('#total_payment').val(new_total);
  		}
  		else {
  			var new_total = Number(total) - Number(amount)
  			//console.log(new_total);
  		$('#displayed_total').val('');
  		$('#total_payment').val('');
  		$('#displayed_total').val(new_total);
  		$('#total_payment').val(new_total);
  		}

  	}
</script>