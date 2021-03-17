<style type="text/css">
   #editPrescription {
        font-size: 13px;
    }
   #editPrescription .tab-content {
     padding: 1px; 

}
.mb-3, .my-3 {
     margin-bottom: 0!important; 
}

#editPrescription .form-control {
    display: block;
    width: 100%;
     height: auto; 
    padding: 1%;
    font-size: 13px;
    font-weight: 400;
    line-height: 0.5;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#editPrescription .table td, #editPrescription .table th {
    padding: 1px;
    }
</style>
<div class="col-12" id="editPrescription">
    <div class="box-margin">
        <div class="card-body">
            <div class="modal-body edit-doc-profile">
                <div class="row clearfix">
                    <?php //var_dump($vital_details)
                    ?>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <b>Date</b>
                        <div class="input-group">

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
                            <legend style="font-size: 15px;"><strong>Summary</strong></legend>
                            <div class="body" style="max-height: 200px; overflow: scroll; scroll; padding: 0;">
                                <div class="table-responsive">
                                    <table id="testTable_prescription" class="table table-bordered table-striped table-hover dataTable" style="font-size: 13px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Drug</th>
                                                <th>Stock Qty</th>
                                                <th>Qty Given</th>
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
                                                        <td><?php echo $patient_prescription_test->drug_id ?></td>
                                                        <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($patient_prescription_test->date_added)) ?></span></td>
                                                        <td><?php echo $patient_prescription_test->drug_item_name; ?></td>
                                                        <td><?php echo $patient_prescription_test->quantity_in_stock; ?></td>

                                                        <?php if ($vital_details->status == "Prescription" || $vital_details->status == "Treated") { ?>
                                                            <td><?php echo $patient_prescription_test->qty_given; ?></td>
                                                        <?php } else { ?>
                                                            <td style="background-color: coral;" <?php if ($patient_prescription_test->quantity_in_stock > 0) {
                                                                    echo 'contenteditable="true" class="baraka" id="by"';
                                                                } ?>><?php if ($patient_prescription_test->quantity_in_stock <= 0) {
                                                                            echo '0';
                                                                        } ?><?php if ($patient_prescription_test->qty_given == 0) { echo "";} else {echo $patient_prescription_test->qty_given;} ?>
                                                            </td>
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
                        <h6>Total: ₦<span id="amount"></span></h6>
                        <div class="text-danger" id="amt_error"></div>
                    <?php } ?>
                </div>
                <div class="col-6 text-right">
                    <form id="send-payment">
                        <div id="items_prescription">
                        </div>

                        <?php
                        //var_dump($vital_details);
                        if ($this->uri->segment(3) && isset($vital_details->prescription_id)) {
                            //var_dump($vital_details)
                        ?>
                            <input type="hidden" name="appointment_id" value="<?php echo $vital_details->appointment_id ?>">
                            <input type="hidden" name="prescription_unique_id" id="prescription_unique_id" value="<?php echo $vital_details->prescription_unique_id ?>">
                            <input type="hidden" name="vital_id" value="<?php echo $vital_details->vital_id ?>">
                            <input type="hidden" name="prescription_id" value="<?php echo $vital_details->prescription_id ?>">
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $vital_details->patient_id ?>">
                        <?php } ?>
                        <?php if ($vital_details->status == "Pending") { ?>
                            <input type="hidden" name="Pending" id="patient_id2" value="Pending">
                        <?php } ?>
                        <?php if ($vital_details->status == "Prescription") { ?>
                            <input type="hidden" name="Prescription" id="patient_id" value="Prescription">
                        <?php } ?>
                        <input type="hidden" id="main_amount" name="main_amount">
                        <?php if ($vital_details->status == "Pending") { ?>
                            <!-- <button type="button" class="btn btn-success" onclick="send_for_payment('send_payment')" title="send_payment">Send For Payment</button> -->
                        <?php } else if ($vital_details->status == "Prescription") { ?>
                            <!-- <button type="button" class="btn btn-success" onclick="treated('send_payment')" title="send_payment">Treat Prescription</button> -->
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
<script>
    
    $(".baraka").keypress(function(e) {
    if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
        });
    $("#testTable_prescription td:nth-child(1)").hide();
    // $(".allow_numeric").on('keydown keyup blur', function(e) {
    //     this.value = this.value.replace(/[^0-9]/g, "")
    // })
    $("#get-bill").click(function(drug_id, qty_given) {
        var sum = 0;
        var rtotal = 0;
        $('#testTable_prescription tr:not(:first)').each(function() {
            var tds = $(this).find('td');
            var rtotal = ($(tds[4]).text()) * ($(tds[5]).text());
            //console.log(tds)
            sum += rtotal;
            $("#items_prescription").append("<input type='' hidden name='drug_ids[]' value='" + $(tds[0]).text() + "," + $(tds[4]).text() + "' >")
        });
        console.log(sum)
        $('#amount').text(sum + ".00");
        $('#main_amount').val(sum);
    })

    function send_for_payment(action) {
        if (action == 'send_payment') {
            var formData = $('#send-payment').serialize();
            var amount = $("#main_amount").val()
            if (amount != '') {
                $.confirm({
                    title: 'Send For Payment',
                    content: 'Are you sure you want to Send Payment?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            $.post("<?php echo base_url() .  'patient/save_billing'; ?>", formData).done(function(data) {
                                //console.log(data);
                                
                                 $.alert({
                                        title: 'Done!',
                                        content: 'Payment Made!',
                                        type: 'green',
                                        });
                                //window.location = "<?php //echo base_url('appointment/waiting_list'); ?>";
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