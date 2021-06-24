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
            </div>
            <!-- Nav tabs -->

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
                                    <li><a href="<?php echo base_url('appointment/waiting_list') ?>">Waiting List</a></li>
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
                                    <li><a href="<?php echo base_url('nursing/ward_occupation') ?>">Ward Occupation</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'billing') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-money"></i>Billing</a>
                                <ul>
                                    <li><a href="<?php echo base_url('billing/payment') ?>">Payment</a></li>
                                    <li><a href="<?php echo base_url('billing/receipt') ?>">Receipt</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'pharmacy') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-plus"></i><span>Pharmacy</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('pharmacy/drugs') ?>">Drugs</a></li>
                                    <li><a href="<?php echo base_url('nursing/bulk_requests') ?>">Main Store Requests</a></li>
                                    <li><a href="<?php echo base_url('pharmacy/prescription_requests') ?>">Prescription Requests</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-flask"></i><span>Laboratory</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('setting/tests') ?>">Tests</a></li>
                                    <li><a href="<?php echo base_url('setting/ranges') ?>">Range</a></li>
                                    <li><a href="<?php echo base_url('laboratory/specimens') ?>">Specimen</a></li>
                                    <li><a href="<?php echo base_url('laboratory/requests_results') ?>">Requests & Results</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'radiology') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-bolt"></i><span>Radiology</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('radiology/investigations') ?>">Investigations</a></li>
                                    <li><a href="<?php echo base_url('radiology/requests') ?>">Requests & Results</a></li>
                                </ul>
                            </li>
                            <li <?php if ($menu_id == 'settings') { ?> class="active" <?php } ?>><a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i><span>Settings</span> </a>
                                <ul>
                                    <li><a href="<?php echo base_url('department') ?>">Departments</a></li>
                                    <li><a href="<?php echo base_url('parameters') ?>">Parameters</a></li>
                                    <li><a href="<?php echo base_url('retainer') ?>">Retainers</a></li>
                                    <li><a href="<?php echo base_url('service/charges') ?>">Service Charges</a></li>
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

                        </ul>
                    </nav>
                </div>
        </div>
    </div>
    </div>