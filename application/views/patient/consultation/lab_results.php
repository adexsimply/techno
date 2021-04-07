 <div class="tab-pane" id="lab_results">

        <div class="col-12">
            <div class="card box-margin">
                <div class="card-body">

                    <form id="add-lab">
                        <div class="modal-body edit-doc-profile">
                            <div class="row clearfix">
                                <?php //var_dump($vital_details)
                                    ?>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <b>Date</b>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <div id="items">

                                            <?php if (isset($patient_lab_tests) && $patient_lab_tests != null) {
                                                    //var_dump($patient_lab_tests);
                                                    foreach ($patient_lab_tests as $patient_lab_test) {
                                                        echo "<input type='hidden' name='lab_id[]' value='" . $patient_lab_test->test_id . "' id='test" . $patient_lab_test->test_id . "'>";
                                                    }
                                                }
                                                ?>
                                        </div>
                                        <?php if ($this->uri->segment(3) && isset($vital_details->lab_test_id)) { ?>
                                            <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                            <input type="hidden" name="edit_lab_id" value="<?php echo $vital_details->lab_test_unique_id ?>">
                                            <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                            <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                            <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                        <?php } else { ?>
                                            <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                            <input type="hidden" name="patient_id" value="<?php echo $vital_details->patient_id ?>">
                                            <input type="hidden" name="doctor_id" value="<?php echo $vital_details->doctor_id ?>">
                                            <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                                            <input type="hidden" name="clinic_id" value="<?php echo $vital_details->clinic_id ?>">
                                        <?php } ?>

                                        <input type="" class="form-control date" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                            echo date('jS \of F Y', strtotime($vital_details->date));
                                                                                                        } else {
                                                                                                            echo date('d M Y');
                                                                                                        } ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <b>Hospital Number</b>
                                    <div class="input-group">
                                        <input type="text" class="form-control time24" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                                echo $vital_details->patient_id_num;
                                                                                                            } else {
                                                                                                                echo $vital_details->patient_id_num;
                                                                                                            } ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <b>Age</b>
                                    <div class="input-group">
                                        <input type="text" class="form-control datetime" disabled="" value="<?php if ($this->uri->segment(3) && isset($vital_details->dental_id)) {
                                                                                                                    echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                                } else {
                                                                                                                    echo date_diff(date_create($vital_details->patient_dob), date_create('today'))->y;
                                                                                                                } ?> years">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <b>Sex</b>
                                    <div class="input-group">
                                        <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_gender)) {
                                                                                                    echo $vital_details->patient_gender;
                                                                                                } else {
                                                                                                    echo $vital_details->patient_gender;
                                                                                                } ?>" disabled="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <b>Name</b>
                                    <div class="input-group">
                                        <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->patient_name)) {
                                                                                                    echo $vital_details->patient_name;
                                                                                                } else {
                                                                                                    echo $vital_details->patient_name;
                                                                                                } ?>" disabled="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <b>Clinic</b>
                                    <div class="input-group">
                                        <input type="text" class="form-control time12" value="<?php if ($this->uri->segment(3) && isset($vital_details->clinic_name)) {
                                                                                                    echo $vital_details->clinic_name;
                                                                                                } else {
                                                                                                    echo $vital_details->clinic_name;
                                                                                                } ?>" disabled="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-3 mt-2">
                                    <fieldset>
                                        <div class="text-center mb-2">
                                            <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback lab_id" id="lab_id" data-field="lab_id"></code>
                                        </div>
                                        <legend><b>Laboratory Investigation Result Table</b></legend>
                                        <div class="body" style="height: 300px; overflow: scroll;">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable" id="">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Date</th>
                                                            <th>Doctor</th>
                                                            <th>Lab Reg No</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $i = 1;
                                                            foreach ($lab_tests as $lab_test) {
                                                                //var_dump($lab_test);

                                                             ?>
                                                                <tr>
                                                                    <td><?php echo $i++ ?></td>
                                                                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($lab_test->date_created)) ?></span></td>
                                                                    <td><span class="list-name"><?php echo date('h:i:sa', strtotime($lab_test->date_created)) ?></span></td>
                                                                    <!-- <td><?php echo $lab_test->lab_test_name;  ?></td> -->
                                                                    <td>
                                                                        <?php if ($lab_test->status == "Pending") { ?>
                                                                            <span class="badge badge-warning"><?php echo $lab_test->status ?></span>
                                                                        <?php } else if ($lab_test->status == "Treated") { ?>
                                                                            <span class="badge badge-success"><?php echo $lab_test->status ?></span>
                                                                        <?php } else if ($lab_test->status == "Specimen") { ?>
                                                                            <span class="badge badge-primary"><?php echo $lab_test->status ?></span>
                                                                        <?php } else if ($lab_test->status == "Review") { ?>
                                                                            <span class="badge badge-info"><?php echo $lab_test->status ?></span>
                                                                        <?php } else if ($lab_test->status == "Incomplete") { ?>
                                                                            <span class="badge badge-primary"><?php echo $lab_test->status ?></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php if($lab_test->status == "Treated" || $lab_test->status == "Review") {?>
                                                                        <button class="btn btn-dark" type="button" data-show="No" data-toggle="modal" data-target="#takeVitals" data-status="'+response[i].status+'" onclick="shiNew(event)" data-type="black" data-size="xl" data-title="laboratory Request" href="<?php echo base_url('laboratory/view_request_treated/'.$lab_test->lab_test_id); ?>"> <i class="fa fa-eye"></i></button>
                                                                        <?php } else  { ?> 
                                                                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_lab_test/' . $lab_test->lab_test_group_id) ?>">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>

                                                                        <?php } ?>
                                                                        <!-- <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View  Laboratory Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_lab_test/' . $lab_test->lab_test_group_id) ?>">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button> -->
                                                                        <!-- <button class="btn btn-dark" type="button" onclick="delete_lab_test(<?php echo $lab_test->lab_test_unique_id; ?>)">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button> -->
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-success" onclick="form_routes_lab('add_lab')" title="add_lab">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script>
            var _row = null;
            $(document).ready(function() {
                var eventFired = function(type) {
                    var n = $('#demo_info')[0];
                }

                $('#example')
                    .on('order.dt', function() {
                        eventFired('Order');
                    })
                    .on('search.dt', function() {
                        eventFired('Search');
                    })
                    .on('page.dt', function() {
                        eventFired('Page');
                    })
                    .DataTable();
            });

            function testAdd(ctl, id) {
                _row = $(ctl).parents("tr");
                var cols = _row.children("td");
                $("#items").append("<input type='hidden' name='lab_id[]' value='" + id + "' id='test" + id + "'>");

                $("#testTable tbody").append("<tr>" +
                    "<td>" + $(cols[1]).text() + "</td>" +
                    "<td width='25%'>" + $(cols[2]).text() + "</td>" +
                    "<td width='10%'><button type='button' onclick='testDelete(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                    "</tr>");
            }

            function testDelete(ctl, id) {
                $("#test" + id + "").remove();
                $(ctl).parents("tr").remove();
            }
        </script>

        <?php $this->load->view('patient/new_lab_test_script'); ?>

 </div>