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
                                                        <?php
                                                            $i = 1;
                                                            foreach ($lab_tests as $lab_test) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $lab_test->lab_test_name; ?></td>
                                                                <td><span class='text-success'>₦5000</span></td>
                                                                <td><span class='text-success'>₦5000</span></td>
                                                                <td><button type="button" class="btn btn-sm btn-success" onclick="testAdd(this, <?php echo $lab_test->id; ?>)">Add</button></td>
                                                            </tr>
                                                        <?php $i++;
                                                            } ?>
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