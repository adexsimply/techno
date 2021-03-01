<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
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

                            <?php if (isset($patient_prescriptions) && $patient_prescriptions != null) {
                                //var_dump($patient_prescription_tests);
                                foreach ($patient_prescriptions as $patient_prescription_test) {
                                    echo "<input type='hidden' name='drug_id[]' value='" . $patient_prescription_test->drug_id . "'>";
                                }
                            }
                            ?>

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
                            <legend><b>My Prescription</b></legend>
                            <div class="body" style="height: 200px; overflow: scroll;">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-striped table-hover dataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Drug Name</th>
                                                <th>My Prescription</th>
                                                <!-- <th>Drug Expiry Date</th>
                                                    <th>Price</th> -->
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($patient_prescriptions) && $patient_prescriptions != null) {
                                                //var_dump($patient_prescriptions);
                                                foreach ($patient_prescriptions as $patient_prescription_test) {
                                            ?>
                                                    <tr>
                                                        <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($patient_prescription_test->date_added)) ?></span></td>
                                                        <td><?php echo $patient_prescription_test->drug_item_name; ?></td>
                                                        <td><?php echo $patient_prescription_test->prescription; ?></td>
                                                        <!-- <td><button type='button' onclick='testDelete_prescription(this, <?php echo $patient_prescription_test->prescription_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td> -->
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
                        <fieldset>
                            <legend><b>Summarry</b></legend>
                            <div class="body" style="height: 200px; overflow: scroll;">
                                <div class="table-responsive">
                                    <table id="testTable_prescription" class="table table-bordered table-striped table-hover dataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Drug Name</th>
                                                <th>Stock Quantity</th>
                                                <th>Quantity Given</th>
                                                <th>Unit Cost</th>
                                                <th>Prescription</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($patient_prescriptions) && $patient_prescriptions != null) {
                                                //var_dump($patient_prescriptions);
                                                foreach ($patient_prescriptions as $patient_prescription_test) {
                                            ?>
                                                    <tr id="tr-summarry">
                                                        <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($patient_prescription_test->date_added)) ?></span></td>
                                                        <td><?php echo $patient_prescription_test->drug_item_name; ?></td>
                                                        <td><?php echo $patient_prescription_test->quantity_in_stock; ?></td>

                                                        <?php if ($vital_details->status == "Prescription" || $vital_details->status == "Treated") { ?>
                                                            <td><?php echo $patient_prescription_test->qty_given; ?></td>
                                                        <?php } else { ?>
                                                            <td <?php if ($patient_prescription_test->quantity_in_stock > 0) {
                                                                    echo 'contenteditable="true" id="by"';
                                                                } ?>><?php if ($patient_prescription_test->quantity_in_stock <= 0) {
                                                                            echo '0';
                                                                        } ?></td>
                                                        <?php } ?>
                                                        <td id="amounts" class="amounts"><?php echo $patient_prescription_test->drug_sell; ?></td>
                                                        <td id="drug_id"><?php echo $patient_prescription_test->prescription; ?></td>
                                                        <!-- <td><button type='button' onclick='testDelete_prescription(this, <?php echo $patient_prescription_test->prescription_id; ?>);' class='btn btn-sm btn-danger'>Remove</button></td> -->
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
            <div class="row col-lg-12 col-md-12 mb-3 mt-2">
                <div class="col-6">
                    <?php if ($vital_details->status == "Pending") { ?>
                        <button type="button" class="btn btn-primary" id="get-bill">Get Bill</button>
                        <h3>Total: ₦<span id="amount"></span></h3>
                        <div class="text-danger" id="amt_error"></div>
                    <?php } ?>
                </div>
                <div class="col-6 text-right">
                    <form id="send-payment">
                        <div id="items_prescription">
                        </div>

                        <?php if ($this->uri->segment(3) && isset($vital_details->prescription_id)) {
                            //var_dump($vital_details) 
                        ?>
                            <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                            <input type="hidden" name="prescription_unique_id" id="prescription_unique_id" value="<?php echo $vital_details->prescription_unique_id ?>">
                            <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                            <input type="hidden" name="prescription_id" value="<?php echo $vital_details->prescription_id ?>">
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $vital_details->patient_id ?>">
                        <?php } ?>
                        <?php if ($vital_details->status == "Pending") { ?>
                            <input type="hidden" name="Pending" id="patient_id" value="Pending">
                        <?php } ?>
                        <?php if ($vital_details->status == "Prescription") { ?>
                            <input type="hidden" name="Prescription" id="patient_id" value="Prescription">
                        <?php } ?>
                        <input type="hidden" id="main_amount" name="main_amount">
                        <?php if ($vital_details->status == "Pending") { ?>
                            <button type="button" class="btn btn-success" onclick="send_for_payment('send_payment')" title="send_payment">Send For Payment</button>
                        <?php } else if ($vital_details->status == "Prescription") { ?>
                            <button type="button" class="btn btn-success" onclick="treated('send_payment')" title="send_payment">Treat Prescription</button>
                        <?php } else if ($vital_details->status == "Treated") { ?>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $("#get-bill").click(function(drug_id, qty_given) {
        var sum = 0;
        var rtotal = 0;
        $('#testTable_prescription tr:not(:first)').each(function() {
            var tds = $(this).find('td');
            var rtotal = parseFloat($(tds[3]).text()) * parseFloat($(tds[4]).text());
            sum += rtotal;
            $("#items_prescription").append("<input type='hidden' name='drug_ids[]' value='" + $(tds[6]).text() + "," + $(tds[3]).text() + "' >")
        });
        console.log(sum)
        $('#amount').text(sum + ".00");
        $('#main_amount').val(sum);
    })

    function send_for_payment(action) {
        if (action == 'send_payment') {
            var formData = $('#send-payment').serialize();
            var amount = $("#main_amount").val()
            if (amount != '' && amount > 0) {
                $.confirm({
                    title: 'Send For Payment',
                    content: 'Are you sure you want to Send Payment?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            $.post("<?php echo base_url() .  'patient/save_billing'; ?>", formData).done(function(data) {
                                //console.log(data);
                                window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
                            });
                        },
                        no: function() {

                        }
                    }
                });
            } else {
                $("#amt_error").text('Total must greater than zero (0)')
            }
        }
    }

    function treated(action) {
        if (action == 'send_payment') {
            var formData = $('#send-payment').serialize();
            $.confirm({
                title: 'Treat Prescription',
                content: 'Are you sure?',
                icon: 'fa fa-check-circle',
                type: 'green',
                buttons: {
                    yes: function() {
                        $.post("<?php echo base_url() .  'patient/save_billing'; ?>", formData).done(function(data) {
                            //console.log(data);
                            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
                        });
                    },
                    no: function() {

                    }
                }
            });
        }
    }
</script>
<?php $this->load->view('patient/new_prescription_script'); ?>