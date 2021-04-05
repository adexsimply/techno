<style type="text/css">

#add-lab-modal .mb-3, .my-3 {
     margin-bottom: 0!important; 
}
#add-lab-modal .card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#add-lab-modal thead th, #add-lab-modal tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}

#patientSearchBill tr.selected {
    background-color: #e92929 !important;
    color:#fff;
    vertical-align: middle;
    padding: 1.5em;
}
#add-lab-modal .form-control {
    display: block;
    width: 100%;
    height: 30px;
    padding: 1px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#add-lab-modal select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<div class="col-12" id="add-lab-modal">
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
                        <div class="col-lg-12 col-md-12 mb-3 mt-2" style="margin-top: 20px !important;">
                            <fieldset>
                                <div class="text-center mb-2">
                                    <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback lab_id" id="lab_id" data-field="lab_id"></code>
                                </div>
                                <legend style="font-size: 15px;"><strong>Choose Test</strong>
                                    <input type="text" class="form-control" id="labTestSearch" placeholder="Start typing a drug name"></legend>
                                <div class="body" style="max-height: 200px; overflow: scroll;">
                                    
                                    <div class="dataTables_wrapper no-footer" id="example_wrapper_lab">
                                        <table class="table table-bordered table-striped table-hover dataTable" id="labSearchTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Test</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
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
                                                        <td><span class='text-success'>₦<?php echo $lab_test->cost; ?></span></td>
                                                        <td><button type="button" class="btn btn-sm btn-primary" onclick="testAdd(this, <?php echo $lab_test->id; ?>)">Add</button></td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset>
                                <legend><b>Summary</b></legend>
                                <div class="body" style="max-height: 200px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table id="testTable" class="table table-bordered table-striped table-hover dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Test</th>
                                                    <th width='25%'>Price</th>
                                                    <th width='10%'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($patient_lab_tests) && $patient_lab_tests != null) {
                                                    //var_dump($patient_lab_tests);
                                                    foreach ($patient_lab_tests as $patient_lab_test) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $patient_lab_test->lab_test_name; ?></td>
                                                            <td><span class="text-success">₦<?php echo $patient_lab_test->cost; ?></span></td>
                                                            <td><button type='button' onclick='testDelete(this, <?php echo $patient_lab_test->test_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
              <!--   <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_lab('add_lab')" title="add_lab">Save</button>
                </div> -->
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

        // $('#example')
        //     .on('order.dt', function() {
        //         eventFired('Order');
        //     })
        //     .on('search.dt', function() {
        //         eventFired('Search');
        //     })
        //     .on('page.dt', function() {
        //         eventFired('Page');
        //     })
        //     .DataTable();

        var labSearchTable = $('#labSearchTable').DataTable({            
            "bLengthChange": false,
            dom: 'lrtip'
        });
        if ($('#example_wrapper_lab').is(':visible')) {
            $('#example_wrapper_lab').hide();
        }


        $('#labTestSearch').keyup(function() {

            if (document.getElementById('labTestSearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#example_wrapper_lab').show();
                labSearchTable.search($(this).val()).draw();
            } else {
                $('#example_wrapper_lab').hide();

            }
        });

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