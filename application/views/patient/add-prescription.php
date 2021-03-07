<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-prescription">
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
                                <div id="items_prescription">

                                    <?php if (isset($patient_prescription_tests) && $patient_prescription_tests != null) {
                                        //var_dump($patient_prescription_tests);
                                        foreach ($patient_prescription_tests as $patient_prescription_test) {
                                            echo "<input type='hidden' name='prescription_id[]' value='" . $patient_prescription_test->prescription_id . "' id='test_prescription" . $patient_prescription_test->prescription_id . "'>";
                                        }
                                    }
                                    ?>
                                </div>
                                <?php if ($this->uri->segment(3) && isset($vital_details->prescription_id)) { ?>
                                    <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                                    <input type="hidden" name="edit_prescription_id" value="<?php echo $vital_details->prescription_unique_id ?>">
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
                                    <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="prescription_id[]"></code>
                                </div>
                                <legend><b>Choose Drug For Prescription</b></legend>
                                <div class="body" style="height: 300px; overflow: scroll;">

                                    <!--                    <div class="container">
                                              <input type="text" id="mySearch" placeholder="custom search">

                                              <div id="example_wrapper" style="display: none;">
                                                <table border="1" id="example_prescription_filter" >
                                                <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                  
                                                  
                                                  

                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Technical Author</td>
                                                    <td>66</td>
                                                    <td>2009</td>

                                                  </tr>
                                                  <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Director</td>
                                                    <td>63</td>
                                                    <td>300</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>205</td>
                                                  </tr>
                                              </tbody>
                                              </table>
                                            </div>
                                        </div> -->

                                    <input type="text" class="form-control" id="mySearch" placeholder="custom search">

                                    <div class="dataTables_wrapper no-footer" id="example_wrapper">
                                        <style type="text/css">
                                            #example_prescription_filter td {
                                                padding: .2rem;

                                            }
                                        </style>
                                        <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table table-bordered" id="example_prescription_filter">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Drug Name</th>
                                                    <th>QtyinStock</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($drugs as $drug) {

                                                ?>
                                                    <tr <?php if ($drug->quantity_in_stock == 0) { ?> style="background-color:#FF0000" <?php } ?>>
                                                        <td><?php echo $drug->drug_item_name; ?></td>
                                                        <td><?php echo $drug->quantity_in_stock; ?></td>
                                                        <td><button type="button" data-app="<?php echo $vital_details->appointment_id ?>" class="btn btn-outline-success" <?php if ($drug->quantity_in_stock == 0) { ?> disabled <?php } ?> onclick="add_prescription(this, <?php echo $drug->id; ?>)">
                                                                <span class="sr-only">Add</span><i class="fa fa-plus"></i></button></td>
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
                                <legend><b>My Prescription</b></legend>
                                <div class="body" style="height: 200px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table id="testTable_prescription" class="table table-bordered table-striped table-hover dataTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Drug Name</th>
                                                    <th>My Prescription</th>
                                                    <!-- <th>Drug Expiry Date</th>
                                                    <th>Price</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($patient_prescriptions) && $patient_prescriptions != null) {
                                                    // var_dump($patient_prescriptions);
                                                    foreach ($patient_prescriptions as $patient_prescription_test) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $patient_prescription_test->drug_item_name; ?></td>
                                                            <td></td>
                                                            <!--  <td><?php echo $patient_prescription_test->drug_expiry_date; ?></td>
                                                            <td><span class='text-success'>₦<?php echo $drug->drug_cost; ?></span></td> -->
                                                            <td><button type='button' onclick='testDelete_prescription(this, <?php echo $patient_prescription_test->prescription_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td>
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

                        <!--  <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset>
                                <legend><b>My Prescription</b></legend>
                                <textarea class="form-control" id="textarea" name="prescription" rows="7"><?php if ($this->uri->segment(3) && isset($patient_prescriptions)) {
                                                                                                                echo $patient_prescriptions[0]->prescription;
                                                                                                            } ?></textarea>
                                <code style="color: #ff0000;font-size: 14px;" class="text-center form-control-feedback" data-field="prescription"></code>
                            </fieldset>
                        </div> -->
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-success" onclick="form_routes_prescription('add_prescription')" title="add_prescription">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {


        var table = $('#example_prescription_filter').DataTable({
            dom: 'lrtip'
        });
        if ($('#example_wrapper').is(':visible')) {
            $('#example_wrapper').hide();
        }
        //$('#example_wrapper').hide();


        $('#mySearch').keyup(function() {

            if (document.getElementById('mySearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#example_wrapper').show();
                table.search($(this).val()).draw();
            } else {
                $('#example_wrapper').hide();

            }
        });

    });


    var _row = null;
    $(document).ready(function() {
        var eventFired = function(type) {
            var n = $('#demo_info')[0];
        }

        $('#example_prescription')
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
        $("#items_prescription").append("<input type='hidden' name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");

        $("#testTable_prescription tbody").append("<tr>" +
            "<td>" + $(cols[1]).text() + "</td>" +
            "<td width='25%'>" + $(cols[2]).text() + "</td>" +
            "<td width='25%'>" + $(cols[3]).text() + "</td>" +
            "<td width='25%'><span class='text-success'>" + $(cols[4]).text() + "</span></td>" +
            "<td width='10%'><button type='button' onclick='testDelete_prescription(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
            "</tr>");
    }

    function testDelete_prescription(ctl, id) {
        $("#test_prescription" + id + "").remove();
        $(ctl).parents("tr").remove();
    }
    //////
    /////Popup for prescription


    function add_prescription(condi, id) {

        _row = $(condi).parents("tr");
        var cols = _row.children("td");

        console.log(cols)
        event.preventDefault();
        /*var element = $(event.target).is('a') ? $(event.target) : $(event.target).parents('a');*/
        var element = $(event.currentTarget);
        var title = $(cols[0]).text();
        // var retainer_id = element.data('retainer');
        // var item_id = element.data('item1');
        // var item_type_id = element.data('item2');
        $.confirm({
            title: title,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>My Prescription</label>' +
                '<input type="text" placeholder="Prescription" class="price form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var price = this.$content.find('.price').val();
                        if (!price) {
                            $.alert('Enter Prescription');
                            return false;
                        }

                        //$.alert('Your name is ' + price);

                        $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#testTable_prescription tbody").append("<tr>" +
                            "<td width='25%'>" + $(cols[0]).text() + "</td>" +
                            "<td width='25%'>" + price + "</td>" +
                            "<td width='10%'><button type='button' onclick='testDelete_prescription(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                            "</tr>");







                    }
                },
                cancel: function() {
                    //close
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }
</script>
<?php $this->load->view('patient/new_prescription_script'); ?>