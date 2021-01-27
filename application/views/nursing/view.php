<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
				<div class="wrapper">
					<div id="main-content" class="profilepage_1">
				        <div class="container-fluid">
				            <div class="block-header">
				                <div class="row">
				                    <div class="col-lg-6 col-md-8 col-sm-12">
				                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Patient Profile</h2>
				                        <ul class="breadcrumb">
				                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
				                            <li class="breadcrumb-item">Patient</li>
				                            <li class="breadcrumb-item active">Patient Profile</li>
				                        </ul>
				                    </div>            
				                </div>
				            </div>

				            <div class="row clearfix">
				                <div class="col-lg-4 col-md-12">
				                    <div class="card member-card">
				                        <div class="header l-coral">
				                            <h4 class="m-t-10 text-light"><?php echo $patient->patient_title." ".$patient->patient_name ?></h4>
				                        </div>
				                        <div class="member-img">
				                            <a href="patient-invoice.html">
				                            <img src="<?php echo base_url(); ?>uploads/<?php echo $patient->patient_photo; ?>" class="rounded-circle" alt="profile-image">
				                            </a>
				                        </div>
				                        <div class="body">
				                            <div class="col-12">
				                                <ul class="social-links list-unstyled">
				                            <h4 class="m-t-8"><?php echo $patient->patient_id_num; ?></h4><br/>
				                                    <li><?php echo $patient->patient_gender; ?></li>,
				                                    <li>Age : <?php echo date_diff(date_create($patient->patient_dob ), date_create('today'))->y; ?></li>,
				                                    <li>Blood Group : <?php echo $patient->patient_blood_group; ?></li>
				                                    <li>Tribe : <?php echo $patient->patient_tribe; ?></li><br>
				                                    <li>Account Type: <?php echo $patient->patient_status; ?></li>
				                                </ul>                            
				                            </div>
				                            <hr>
				                            <strong>Occupation</strong>
				                            <p><?php echo $patient->patient_occupation; ?></p>
				                            <strong>Email ID</strong>
				                            <p><?php echo $patient->patient_email; ?></p>
				                            <strong>Phone</strong>
				                            <p><?php echo $patient->patient_phone; ?></p>
				                            <hr>
				                            <strong>Address</strong>
				                            <address><?php echo $patient->patient_address; ?>--<?php echo $patient->patient_origin; ?></address>
				                            <hr>
				                            <strong>Next of Kin</strong>
				                            <ul class="social-links list-unstyled">
					                            <li>Name : <?php echo $patient->nok_title." ".$patient->nok_name; ?></li><br>
					                            <li>Address : <?php echo $patient->nok_address; ?></li><br>
					                            <li>Relationship : <?php echo $patient->nok_relationship; ?></li>
				                        	</ul>
				                        </div>
				                    </div>
				                    <!-- <div class="card">
				                        <div class="header">
				                            <h2>General Report</h2>
				                        </div>
				                        <div class="body">
				                            <ul class="list-unstyled">
				                                <li>
				                                    <div>Blood Pressure</div>
				                                    <div class="progress m-b-20">
				                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
				                                    </div>
				                                </li>
				                                <li>
				                                    <div>Heart Beat</div>
				                                    <div class="progress m-b-20">
				                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
				                                    </div>
				                                </li>
				                                <li>
				                                    <div>Haemoglobin</div>
				                                    <div class="progress m-b-20">
				                                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
				                                    </div>
				                                </li>
				                                <li>
				                                    <div>Sugar</div>
				                                    <div class="progress">
				                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
				                                    </div>
				                                </li>
				                            </ul>
				                        </div>
				                    </div> -->
				                </div>
				                <div class="col-lg-8 col-md-12">
				                    <div class="card">
				                        <div class="body">
				                            <ul class="nav nav-tabs-new2">                                
				                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#billings">Billings</a></li>
				                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#documents">Documents</a></li>
				                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#otherdocuments">Other Documents</a></li>
				                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#requests">Requests</a></li>
				                            </ul>                        
				                            <div class="tab-content mt-3">
				        
				                                <div class="tab-pane" id="documents">
				                                   
												    <div class="row clearfix">
												        <div class="col-md-12">
												            <div class="card patients-list">
												                <div class="body">
												                    <!-- Nav tabs -->
												                    <ul class="nav nav-tabs-new2">
												                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#general">General Consultation</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#eye">Eye Clinic</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#anc">ANC</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dental">Dental Clinc</a></li>
												                    </ul>
												                        
												                    <!-- Tab panes -->
												                    <div class="tab-content m-t-10 padding-0">
												                        <div class="tab-pane table-responsive active show" id="general">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-dark">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>                            
												                        </div>
												                        <div class="tab-pane table-responsive" id="eye">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-success">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="anc">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="dental">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                    </div>
												                </div>
												            </div>
												        </div>
												    </div>
				                                </div>
				                                <div class="tab-pane" id="requests">
				                                   
												    <div class="row clearfix">
												        <div class="col-md-12">
												            <div class="card patients-list">
												                <div class="body">
												                    <!-- Nav tabs -->
												                    <ul class="nav nav-tabs-new2">
												                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#laboratory">Laboratory</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#radiology">Radiology</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prescriptions">Prescriptions</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#admission">Admission</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#procedures">Procedures</a></li>
												                    </ul>
												                        
												                    <!-- Tab panes -->
												                    <div class="tab-content m-t-10 padding-0">
												                        <div class="tab-pane table-responsive active show" id="laboratory">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-dark">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>                            
												                        </div>
												                        <div class="tab-pane table-responsive" id="radiology">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-success">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="prescriptions">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="admission">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="procedures">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                    </div>
												                </div>
												            </div>
												        </div>
												    </div>
				                                </div>
				        
				                                <div class="tab-pane" id="otherdocuments">
				                                   
												    <div class="row clearfix">
												        <div class="col-md-12">
												            <div class="card patients-list">
												                <div class="body">
												                    <!-- Nav tabs -->
												                    <ul class="nav nav-tabs-new2">
												                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#med">Med Reports</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pdf">PDF Files</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images">Images</a></li>
												                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#indexing">Indexing & Coding</a></li>
												                    </ul>
												                        
												                    <!-- Tab panes -->
												                    <div class="tab-content m-t-10 padding-0">
												                        <div class="tab-pane table-responsive active show" id="med">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-dark">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>                            
												                        </div>
												                        <div class="tab-pane table-responsive" id="pdf">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-success">
												                                    <tr>                                       
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar1.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00598</span></td>
												                                        <td>Daniel</td>
												                                        <td>32</td>
												                                        <td>71 Pilgrim Avenue Chevy Chase, MD 20815</td>
												                                        <td>404-447-6013</td>
												                                        <td>11 Jan 2018</td>
												                                        <td><span class="badge badge-success">Approved</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="images">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                        <div class="tab-pane table-responsive" id="indexing">
												                            <table class="table m-b-0 table-hover">
												                                <thead class="thead-warning">
												                                    <tr>
												                                        <th>Media</th>
												                                        <th>Patients ID</th>
												                                        <th>Name</th>
												                                        <th>Age</th>
												                                        <th>Address</th>
												                                        <th>Number</th>
												                                        <th>Last Visit</th>
												                                        <th>Status</th>
												                                    </tr>
												                                </thead>
												                                <tbody>
												                                    <tr>
												                                        <td><span class="list-icon"><img class="patients-img" src="../assets/images/xs/avatar4.jpg" alt=""></span></td>
												                                        <td><span class="list-name">KU 00951</span></td>
												                                        <td>James</td>
												                                        <td>32</td>
												                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
												                                        <td>404-447-6013</td>
												                                        <td>22 Jan 2018</td>
												                                        <td><span class="badge badge-warning">Pending</span></td>
												                                    </tr>
												                                </tbody>
												                            </table>
												                        </div>
												                    </div>
												                </div>
												            </div>
												        </div>
												    </div>
				                                </div>
				        
				                                <div class="tab-pane active" id="billings">

				                                    <div>
				                                       <!--   <h6>Payment Method</h6>
				                                       <div class="payment-info">
				                                            <h3 class="payment-name"><i class="fa fa-paypal"></i> PayPal ****2222</h3>
				                                            <span>Next billing charged $29</span>
				                                            <br>
				                                            <em class="text-muted">Autopay on May 12, 2018</em>
				                                            <a href="javascript:void(0);" class="edit-payment-info">Edit Payment Info</a>
				                                        </div> -->
				                                        <p class="margin-top-30"><a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add Payment</a></p>
				                                    </div>
											            <div class="row clearfix">
											                <div class="col-lg-12">
											                    <div class="card">
											                        <!-- <div class="header">
											                            <h2>Basic Table <small>Basic example without any additional modification classes</small> </h2>                            
											                        </div> -->
											                        <div class="body">
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
											                    </div>
											                </div>
											            </div>

				                                </div>
				        
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>

				</div>
	<?php $this->load->view('patient/patient-history-modal'); ?>
	<?php $this->load->view('includes/footer_2'); ?>
	<?php $this->load->view('patient/script'); ?>