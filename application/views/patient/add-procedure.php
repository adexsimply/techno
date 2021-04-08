<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-procedure">
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
                                <div id="items_procedure">

                                    <?php if (isset($procedure_tests) && $procedure_tests != null) {
                                        //var_dump($procedure_tests);
                                        foreach ($procedure_tests as $procedure_test) {
                                            echo "<input type='hidden' name='procedure_id[]' value='" . $procedure_test->test_id . "' id='test_procedure" . $procedure_test->test_id . "'>";
                                        }
                                    }
                                    //var_dump($vital_details);
                                    ?>
                                </div>
                                <?php if ($this->uri->segment(3) && isset($vital_details->procedure_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="edit_procedure_id" value="<?php echo $vital_details->procedure_test_unique_id ?>">
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
                                    <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback procedure_error" id="procedure_error" data-field="procedure_error"></code>
                                </div>
                                <b>Select Procedure Item</b>
                                <div class="body" style="max-height: 200px; overflow: scroll;">
                                    <input type="text" class="form-control mb-3" id="procedureSearch" placeholder="Start typing a Procedure Item Name">
                                    <?php //var_dump($procedure_items); 
                                    ?>
                                    <div class="dataTables_wrapper" id="example_procedure">
                                        <table class="table table-bordered table-striped table-hover dataTable" id="procedureTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Item Name</th>
                                                    <th>Cost</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($procedure_items as $procedure_item) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $procedure_item->Name; ?></td>
                                                        <td><?php echo $procedure_item->service_charge_cost; ?></td>
                                                        <td><button type="button" class="btn btn-sm btn-success" onclick="testAdd(this, <?php echo $procedure_item->id; ?>)">Add</button></td>
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
                                <b>Summary</b>
                                <div class="body" style="max-height: 200px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table id="testTable_procedure" class="table table-bordered table-striped table-hover dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th width='25%'>Price</th>
                                                    <th width='10%'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($procedure_tests) && $procedure_tests != null) {
                                                    //var_dump($procedure_tests);
                                                    foreach ($procedure_tests as $procedure_test) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $procedure_test->Name; ?></td>
                                                            <td><button type='button' onclick='testDelete_radiology(this, <?php echo $procedure_test->test_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td>
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

                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <b>Instruction</b>
                            <div class="input-group">
                                <textarea class="form-control" name="instuction"><?php if ($this->uri->segment(3) && isset($vital_details->instuction)) {
                                                                                        echo $vital_details->instuction;
                                                                                    } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_procedure('add_procedure')" title="add_procedure">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        var procedureTable = $('#procedureTable').DataTable({
            dom: 'lrtip'
        });
        if ($('#example_procedure').is(':visible')) {
            $('#example_procedure').hide();
        }
        //$('#example_procedure').hide();


        $('#procedureSearch').keyup(function() {

            if (document.getElementById('procedureSearch').value != '') {
                //$('#example_procedure').removeAttr("style");
                $('#example_procedure').show();
                procedureTable.search($(this).val()).draw();
            } else {
                $('#example_procedure').hide();

            }
        });

    });

    // var _row = null;
    // $(document).ready(function() {
    //     var eventFired = function(type) {
    //         var n = $('#demo_info')[0];
    //     }

    //     $('#example_procedure')
    //         .on('order.dt', function() {
    //             eventFired('Order');
    //         })
    //         .on('search.dt', function() {
    //             eventFired('Search');
    //         })
    //         .on('page.dt', function() {
    //             eventFired('Page');
    //         })
    //         .DataTable();
    // });

    function testAdd(ctl, id) {
        _row = $(ctl).parents("tr");
        var cols = _row.children("td");
        $("#items_procedure").append("<input type='hidden' name='procedure_id[]' value='" + id + "' id='test_procedure" + id + "'>");

        $("#testTable_procedure tbody").append("<tr>" +
            "<td>" + $(cols[1]).text() + "</td>" +
            "<td width='25%'>" + $(cols[2]).text() + "</td>" +
            "<td width='10%'><button type='button' onclick='testDelete_procedure(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
            "</tr>");
    }

    function testDelete_procedure(ctl, id) {
        $("#test_procedure" + id + "").remove();
        $(ctl).parents("tr").remove();
    }
</script>

<?php $this->load->view('patient/new_procedure_script'); ?>