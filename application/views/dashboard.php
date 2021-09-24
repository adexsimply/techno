<?php $this->load->view('includes/head'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>            
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small>Patients</small>
                                <h6 class="mb-0 mt-1"><i class="icon-user"></i> 30</h6>
                            </div>
                            <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>On Admission</small>
                                <h6 class="mb-0 mt-1"><i class="fa fa-wheelchair"></i> 5</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Waiting List</small>
                                <h6 class="mb-0 mt-1"><i class="fa fa-plus-square"></i> 3</h6>
                            </div>
                            <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div id="top_counter1" class="carousel vert slide" data-ride="carousel" data-interval="2500">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-user"></i> </div>
                                                <div class="content">
                                                    <div class="text">Total Patients</div>
                                                    <h5 class="number">215</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-user"></i> </div>
                                                <div class="content">
                                                    <div class="text">New Patients</div>
                                                    <h5 class="number">21</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="top_counter2" class="carousel vert slide" data-ride="carousel" data-interval="2100">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-user-md"></i> </div>
                                                <div class="content">
                                                    <div class="text">Operations</div>
                                                    <h5 class="number">6</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-user-md"></i> </div>
                                                <div class="content">
                                                    <div class="text">Waiting List</div>
                                                    <h5 class="number">4</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-user-md"></i> </div>
                                                <div class="content">
                                                    <div class="text">Nursing Care</div>
                                                    <h5 class="number">23</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div id="top_counter3" class="carousel vert slide" data-ride="carousel" data-interval="2300">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-eye"></i> </div>
                                                <div class="content">
                                                    <div class="text">Appointments</div>
                                                    <h5 class="number">10</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-file-archive-o"></i> </div>
                                                <div class="content">
                                                    <div class="text">Laboratory Requests</div>
                                                    <h5 class="number">42</h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-file-archive-o"></i> </div>
                                                <div class="content">
                                                    <div class="text">Prescription Requests</div>
                                                    <h5 class="number">87</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <hr>
                                    <div class="icon"><i class="fa fa-file-archive-o"></i> </div>
                                    <div class="content">
                                        <div class="text">Radiology Requests</div>
                                        <h5 class="number">18</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon"><i class="fa fa-sign-in"></i> </div>
                                    <div class="content">
                                        <div class="text">Procedures</div>
                                        <h5 class="number">52</h5>
                                    </div>
                                    <hr>
                                    <div class="icon"><i class="fa fa-smile-o"></i> </div>
                                    <div class="content">
                                        <div class="text">Dental Clinic</div>
                                        <h5 class="number">28</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Revenue</h2>
                            <ul class="header-dropdown">
                                <li><a class="tab_btn" href="javascript:void(0);" title="Weekly">W</a></li>
                                <li><a class="tab_btn" href="javascript:void(0);" title="Monthly">M</a></li>
                                <li><a class="tab_btn active" href="javascript:void(0);" title="Yearly">Y</a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="body bg-success text-light">
                                        <h4><i class="icon-wallet"></i> ₦7,000,000</h4>
                                        <span>Pharmacy</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="body bg-warning text-light">
                                        <h4><i class="icon-wallet"></i> ₦1,000,000</h4>
                                        <span>Laboratory</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="body bg-danger text-light">
                                        <h4><i class="icon-wallet"></i> ₦17,000,000</h4>
                                        <span>Radilogy</span>
                                    </div>
                                </div>
                            </div>
                            <div id="total_revenue" class="ct-chart m-t-20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Patients' Statistics</h2>
                            <ul class="header-dropdown">
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                                <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="Visitors_chart" class="flot-chart m-b-20"></div>
                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div id="Visitors_chart1" class="carousel slide" data-ride="carousel" data-interval="2000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="body xl-turquoise">
                                                    <h4>25</h4>
                                                    <span>Abuja</span>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="body xl-parpl">
                                                    <h4>10</h4>
                                                    <span>Osun</span>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="body xl-salmon">
                                                    <h4>8</h4>
                                                    <span>Lagos</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div id="Visitors_chart2" class="carousel slide" data-ride="carousel" data-interval="2200">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="body xl-parpl">
                                                    <h4>25</h4>
                                                    <span>Kaduna</span>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="body xl-slategray">
                                                    <h4>2</h4>
                                                    <span>Katsina</span>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="body xl-khaki">
                                                    <h4>18</h4>
                                                    <span>Jos</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="body xl-salmon">                                        
                                        <h4>45</h4>
                                        <span>Kano</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="body xl-slategray">                                        
                                        <h4>3</h4>
                                        <span>Kogi</span>
                                    </div>
                                </div>                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Latest Patients</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive table_middel">
                                <table class="table m-b-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Patient Name</th>
                                                <th>Hosp. NO</th>
                                                <th>Age</th>
                                                <th>Sex</th>
                                                <th>Acc Status</th>
                                                <th>MobileNo</th>
                                                <th>RegDate</th>
                                                <th>Active</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer'); ?>