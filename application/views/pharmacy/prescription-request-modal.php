<!-- Add new history Modal -->
    <div class="modal fade" id="prescriptionRequest" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
        <form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">   
                <div class="modal-header">
                    <h6 class="modal-title text-primary">Operation -  Janet Jackson</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body edit-doc-profile">   


                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <b>Date</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control date" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <b>Hospital Number</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Provisional Diagnosis</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <b>Name</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" disabled="" placeholder="Janet Jackson">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <b>Anesthesia</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                       
                                </div> 
                                <hr>
                                <h5>Account</h5>
                                <hr>
                                <div class="body" style="height: 210px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example dataTable table-custom">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Item</th>
                                                    <th>Payment Type</th>
                                                    <th>Amount</th>
                                                    <th>Discount</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Item</th>
                                                    <th>Payment Type</th>
                                                    <th>Amount</th>
                                                    <th>Discount</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                $i =1;
                                                $debit =0;
                                                $credit = 0;
                                                foreach($patient_billings as $patient_billing) { 
                                                    if ($patient_billing->billing_type =='Debit') {
                                                        $debit += $patient_billing->amount;
                                                    }
                                                    elseif ($patient_billing->billing_type =='Credit') {
                                                        $credit += $patient_billing->amount;
                                                    }
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php $ini_date = date_create($patient_billing->date_added); echo date_format($ini_date,"D M d,Y h:i a"); ?></td>
                                                    <td><?php echo $patient_billing->category; ?></td>
                                                    <td><?php echo $patient_billing->billing_type; ?></td>
                                                    <td><?php echo $patient_billing->amount; ?></td>
                                                    <td><?php echo $patient_billing->discount; ?></td>
                                                </tr>
                                            <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                        <h5>Balance: <?php echo $credit - $debit; ?> </h5>
                                    </div>
                                </div>

                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">This Prescription</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Consultants</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Vital Signs</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">All Pres Requests</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">Comments</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="Home">

                                <div class="body" style="height: 210px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example dataTable table-custom">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Drug</th>
                                                    <th>Stock</th>
                                                    <th>Qty Given</th>
                                                    <th>Unit Cost</th>
                                                    <th>Prescription</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i =1;
                                                $debit =0;
                                                $credit = 0;
                                                foreach($patient_billings as $patient_billing) { 
                                                    if ($patient_billing->billing_type =='Debit') {
                                                        $debit += $patient_billing->amount;
                                                    }
                                                    elseif ($patient_billing->billing_type =='Credit') {
                                                        $credit += $patient_billing->amount;
                                                    }
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php $ini_date = date_create($patient_billing->date_added); echo date_format($ini_date,"D M d,Y h:i a"); ?></td>
                                                    <td><?php echo $patient_billing->category; ?></td>
                                                    <td><?php echo $patient_billing->billing_type; ?></td>
                                                    <td><?php echo $patient_billing->amount; ?></td>
                                                    <td><?php echo $patient_billing->discount; ?></td>
                                                    <td><?php echo $patient_billing->discount; ?></td>
                                                </tr>
                                            <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane" id="Profile">
                                   
                                </div>
                                <div class="tab-pane" id="Contact">
                                 
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <input type="submit" title="add_appointment" class="btn btn-primary px-4 m-2" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>