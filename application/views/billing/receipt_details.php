<style type="text/css">
    
#receiptDetailsTable thead th, #receiptDetailsTable tbody td {
//font-size: 0.6em;
  padding: 1px !important;
  height: 15px;
}
</style>
 <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="receiptDetailsTable">
	<thead class="thead-dark">
	    <tr>
	        <th>Service</th>
	        <th>Rate</th>
	    </tr>
	</thead>
<tbody id="receiptDetails">
    <!--Prescription Lists from Ajax call shows here-->
    <?php foreach ($receipt_details as $receipt_detail) { ?>
    	<tr>
    		<td><?php echo $receipt_detail->category; ?></td>
    		<td><?php echo $receipt_detail->amount; ?></td>
    	</tr>
    <?php } ?>
</tbody>
</table>    

<label id="total_amount_receipt"></label>

<script type="text/javascript">
	
     var receiptDetailsTable =  $('#receiptDetailsTable').DataTable({
        dom: 'Br',
        buttons: [
        	'csv', 'print'
        ],
            "lengthChange": false
        });
</script>