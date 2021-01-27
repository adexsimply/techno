<!-- Add new history Modal -->
	<div class="modal fade" id="pharmacyRequest" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
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
                                        <b>To be Used</b>
                                        <div class="input-group mb-3">
											<select class="form-control" name="request_destination" id="request_destination">
												<option value="">Select Destination</option>
												<?php foreach($request_destinations_list as $request_destinations) { ?>
												<option value="<?php echo $request_destinations->id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>


                           			 <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Drug Item</th>
                                                <th>Quantity Instock</th>
                                                <th>Drug Group</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //var_dump($doctors_list);
                                            $i=1;
                                             foreach ($drug_list as $drug) { 
                                                //var_dump($appointment);
                                                ?>
                                            <tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $drug->drug_item_name;?></span></td>
                                                <td><span class="list-name"><?php echo $drug->quantity_in_stock; ?></span></td>
                                                <td><?php echo $drug->drug_group_name; ?></td>
                                                <td><span class="badge badge-success"><a href="#" data-toggle="modal" data-target="#takeVitals">Add</a></span></td>
                                            </tr>
                                               <?php 
                                               $i++;
                                           } ?>
                                        </tbody>
                                    </table>    

                                <section>
                                    <p>
                                <table class="table table-hover m-b-0 c_list">
                                    <thead>
                                        <tr>
                                            <th>Drug Name</th>                                    
                                            <th>QTY</th>     
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                            	Paracetamol
                                            </td>
                                            <td>
                                                5
                                            </td>  
                                            <td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                    	
                                    </p>
                                </section>


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

