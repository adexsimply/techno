    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?php echo base_url(); ?>assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo strtoupper($active_user->username); ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="doctor-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
                <!--   <hr>
                <ul class="row list-unstyled">
                    <li class="col-4">
                        <small>Exp</small>
                        <h6>14</h6>
                    </li>
                    <li class="col-4">
                        <small>Awards</small>
                        <h6>13</h6>
                    </li>
                    <li class="col-4">
                        <small>Clients</small>
                        <h6>213</h6>
                    </li>
                </ul> -->
            </div>
            <!-- Nav tabs -->
            <!--  <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>                
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>                
            </ul> -->

            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0" style="height:80%;overflow-y: visible;">
                <div class="tab-pane active" id="menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li <?php if ($menu_id == 'dashboard') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
                            <!--  <li><a href="app-taskboard.html"><i class="icon-list"></i>Taskboard</a></li>
                            <li><a href="app-inbox.html"><i class="icon-home"></i>Inbox App</a></li>
                            <li><a href="app-chat.html"><i class="icon-bubbles"></i>Chat App</a></li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-user-follow"></i><span>Doctors</span> </a>
                                <ul>
                                    <li><a href="doctors-all.html">All Doctors</a></li>
                                    <li><a href="doctor-add.html">Add Doctor</a></li>
                                    <li><a href="doctor-profile.html">Doctor Profile</a></li>
                                    <li><a href="doctor-events.html">Doctor Schedule</a></li>
                                </ul>
                            </li> -->
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-wpforms"></i><span>Medical Records</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('patient') ?>">All Patients</a></li>
                                    <!-- <li><a href="<?php echo base_url('patient/add') ?>">Add Patient</a></li>
                                    <li><a href="patient-profile.html">Patient Profile</a></li>
                                    <li><a href="patient-invoice.html">Invoice</a></li> -->
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'personnel') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-users"></i><span>Personnel</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('menu') ?>">Menus</a></li>
                                    <li><a href="<?php echo base_url('menu/assign') ?>">Assign Roles</a></li>
                                    <li><a href="<?php echo base_url('staff') ?>">Staff List</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'appointment') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-calendar"></i>Appointment</a>
                                <ul>
                                    <li><a href="<?php echo base_url('appointment') ?>">View Appointments</a></li>
                                    <!-- <li><a href="<?php //echo base_url('appointment') 
                                                        ?>">Waiting List</a></li> -->
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'nursing') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-user-female"></i>Nursing Care</a>
                                <ul>
                                    <li><a href="<?php echo base_url('nursing/vitals') ?>">Vitals</a></li>
                                    <li><a href="<?php echo base_url('nursing/notes') ?>">Handover Notes</a></li>
                                    <li><a href="<?php echo base_url('nursing/bulk_requests') ?>">Main Store Requests</a></li>
                                    <li><a href="<?php echo base_url('nursing/pharmacy_requests') ?>">Pharmacy Requests</a></li>
                                    <li><a href="<?php echo base_url('nursing/store_requests') ?>">Injections</a></li>
                                    <li><a href="<?php echo base_url('nursing/operations') ?>">Operations</a></li>
                                    <li><a href="<?php echo base_url('nursing/admission') ?>">Admission Register</a></li>
                                    <li><a href="<?php echo base_url('nursing/store_requests') ?>">Ward Occupation</a></li>
                                    <!-- <li><a href="<?php //echo base_url('appointment') 
                                                        ?>">Waiting List</a></li> -->
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-plus"></i><span>Pharmacy</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('setting/drugs') ?>">Drugs</a></li>
                                    <li><a href="<?php echo base_url('nursing/bulk_requests') ?>">Main Store Requests</a></li>
                                    <li><a href="<?php echo base_url('pharmacy/prescription_requests') ?>">Prescription Requests</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-flask"></i><span>Laboratory</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('setting/tests') ?>">Tests</a></li>
                                    <li><a href="<?php echo base_url('laboratory/requests_results') ?>">Requests & Results</a></li>
                                    <li><a href="<?php echo base_url('pharmacy/prescription_requests') ?>">Prescription Requests</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-flask"></i><span>Radiology</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('setting/tests') ?>">Investigations</a></li>
                                    <li><a href="<?php echo base_url('laboratory/requests_results') ?>">Requests & Results</a></li>
                                    <li><a href="<?php echo base_url('pharmacy/prescription_requests') ?>">Prescription Requests</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'settings') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i><span>Settings</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('department') ?>">Departments</a></li>
                                    <li><a href="<?php echo base_url('parameters') ?>">Parameters</a></li>
                                    <li><a href="<?php echo base_url('retainer') ?>">Retainers</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'users') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-users"></i><span>Users</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('role') ?>">Roles</a></li>
                                    <li><a href="<?php echo base_url('menu') ?>">Menus</a></li>
                                    <li><a href="<?php echo base_url('menu/assign') ?>">Assign Roles</a></li>
                                    <li><a href="<?php echo base_url('staff') ?>">Staff List</a></li>
                                    <li><a href="<?php echo base_url('staff/login') ?>">System Users</a></li>
                                </ul>
                            </li>
                            <li style="margin-bottom: 30px;">&nbsp;</li>
                            <!--   <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-layers"></i><span>Departments</span> </a>
                                <ul>
                                    <li><a href="depa-add.html">Add</a></li>
                                    <li><a href="depa-all.html">All Departments</a></li>
                                    <li><a href="javascript:void(0);">Cardiology</a></li>
                                    <li><a href="javascript:void(0);">Pulmonology</a></li>
                                    <li><a href="javascript:void(0);">Gynecology</a></li>
                                    <li><a href="javascript:void(0);">Neurology</a></li>
                                    <li><a href="javascript:void(0);">Urology</a></li>
                                    <li><a href="javascript:void(0);">Gastrology</a></li>
                                    <li><a href="javascript:void(0);">Pediatrician</a></li>
                                    <li><a href="javascript:void(0);">Laboratory</a></li>
                                </ul>
                            </li>
                            <li><a href="our-centres.html"><i class="icon-pointer"></i>WorldWide Centres</a></li>
                             <li>
                                <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Authentication</span></a>
                                <ul>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-lockscreen.html">Lockscreen</a></li>
                                    <li><a href="page-forgot-password.html">Forgot Password</a></li>
                                    <li><a href="page-404.html">Page 404</a></li>
                                    <li><a href="page-403.html">Page 403</a></li>
                                    <li><a href="page-500.html">Page 500</a></li>
                                    <li><a href="page-503.html">Page 503</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i><span>Widgets</span></a>
                                <ul>
                                    <li><a href="widgets-statistics.html">Statistics Widgets</a></li>
                                    <li><a href="widgets-data.html">Data Widgets</a></li>
                                    <li><a href="widgets-chart.html">Chart Widgets</a></li>
                                    <li><a href="widgets-weather.html">Weather Widgets</a></li>
                                    <li><a href="widgets-social.html">Social Widgets</a></li>
                                </ul>
                            </li>
                         <li>
                                <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Extra Pages</span></a>
                                <ul>
                                    <li><a href="page-blank.html">Blank Page</a> </li>
                                    <li><a href="doctor-profile.html">Profile</a></li>
                                    <li><a href="page-gallery.html">Image Gallery <span class="badge badge-default float-right">v1</span></a> </li>
                                    <li><a href="page-gallery2.html">Image Gallery <span class="badge badge-warning float-right">v2</span></a> </li>
                                    <li><a href="page-timeline.html">Timeline</a></li>
                                    <li><a href="page-timeline-h.html">Horizontal Timeline</a></li>
                                    <li><a href="page-pricing.html">Pricing</a></li>
                                    <li><a href="page-search-results.html">Search Results</a></li>
                                    <li><a href="page-helper-class.html">Helper Classes</a></li>
                                    <li><a href="page-maintenance.html">Maintenance</a></li>
                                    <li><a href="page-testimonials.html">Testimonials</a></li>
                                    <li><a href="page-faq.html">FAQs</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </nav>
                </div>
                <!--    <div class="tab-pane" id="sub_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li>
                                <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI Elements</span></a>
                                <ul>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-tabs.html">Tabs</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                    <li><a href="ui-icons.html">Icons</a></li>
                                    <li><a href="ui-notifications.html">Notifications</a></li>
                                    <li><a href="ui-colors.html">Colors</a></li>
                                    <li><a href="ui-dialogs.html">Dialogs</a></li>                                    
                                    <li><a href="ui-list-group.html">List Group</a></li>
                                    <li><a href="ui-media-object.html">Media Object</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-nestable.html">Nestable</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                                    <li><a href="ui-treeview.html">Treeview</a></li>
                                </ul>
                            </li>                            
                            <li>
                                <a href="#forms" class="has-arrow"><i class="icon-pencil"></i> <span>Forms</span></a>
                                <ul>
                                    <li><a href="forms-validation.html">Form Validation</a></li>
                                    <li><a href="forms-advanced.html">Advanced Elements</a></li>
                                    <li><a href="forms-basic.html">Basic Elements</a></li>
                                    <li><a href="forms-wizard.html">Form Wizard</a></li>                                    
                                    <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>                                    
                                    <li><a href="forms-cropping.html">Image Cropping</a></li>
                                    <li><a href="forms-summernote.html">Summernote</a></li>
                                    <li><a href="forms-editors.html">CKEditor</a></li>
                                    <li><a href="forms-markdown.html">Markdown</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                                <ul>
                                    <li><a href="table-basic.html">Tables Example<span class="badge badge-info float-right">New</span></a> </li>
                                    <li><a href="table-normal.html">Normal Tables</a> </li>
                                    <li><a href="table-jquery-datatable.html">Jquery Datatables</a> </li>
                                    <li><a href="table-editable.html">Editable Tables</a> </li>
                                    <li><a href="table-color.html">Tables Color</a> </li>
                                    <li><a href="table-filter.html">Table Filter <span class="badge badge-info float-right">New</span></a> </li>
                                    <li><a href="table-dragger.html">Table dragger <span class="badge badge-info float-right">New</span></a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i> <span>Charts</span></a>
                                <ul>
                                    <li><a href="chart-e.html">E Charts</a> </li>
                                    <li><a href="chart-morris.html">Morris</a> </li>
                                    <li><a href="chart-flot.html">Flot</a> </li>
                                    <li><a href="chart-chartjs.html">ChartJS</a> </li>                                    
                                    <li><a href="chart-jquery-knob.html">Jquery Knob</a> </li>                                        
                                    <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                    <li><a href="chart-peity.html">Peity</a></li>
                                    <li><a href="chart-c3.html">C3 Charts</a></li>
                                    <li><a href="chart-gauges.html">Gauges</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                                <ul>
                                    <li><a href="map-google.html">Google Map</a></li>
                                    <li><a href="map-yandex.html">Yandex Map</a></li>
                                    <li><a href="map-jvectormap.html">jVector Map</a></li>
                                </ul>
                            </li> -->
                </ul>
                </nav>
            </div>
            <!--     <div class="tab-pane p-l-15 p-r-15" id="Chat">
                    <form>
                        <div class="input-group m-b-20">
                            <div class="input-group-prepend">
                                <span class="input-group-text" ><i class="icon-magnifier"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                    <ul class="right_chat list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo base_url(); ?>assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dr. Chris Fox</span>
                                        <span class="message">Dentist</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo base_url(); ?>assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dr. Joge Lucky</span>
                                        <span class="message">Gynecologist</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo base_url(); ?>assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dr. Isabella</span>
                                        <span class="message">CEO, WrapTheme</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo base_url(); ?>assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dr. Folisise Chosielie</span>
                                        <span class="message">Physical Therapy</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo base_url(); ?>assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dr. Alexander</span>
                                        <span class="message">Audiology</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
                <div class="tab-pane p-l-15 p-r-15" id="setting">
                    <h6>Choose Skin</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="cyan" class="active">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                            <span>Blush</span>
                        </li>
                    </ul>
                    <hr>
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Email Redirect</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Notifications</span>
                            </label>                      
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Auto Updates</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Offline</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Location Permission</span>
                            </label>
                        </li>
                    </ul>
                </div>   -->
        </div>
    </div>
    </div>