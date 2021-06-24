<style type="text/css">

.mb-3, .my-3 {
     margin-bottom: 0!important; 
}
.card .body {
    color: #444;
    padding: 5px;
    font-weight: 400;
}
#manualBilling thead th, #manualBilling tbody td {
  padding: 1px !important;
  height: 12px;
  font-size: 12px;
}
#billDrugList thead th, #billDrugList tbody td {
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
#manualBilling .form-control {
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
#manualBilling select.form-control:not([size]):not([multiple]) {
    height: 30px;
}
</style>
<div class="col-12" id="manualBilling">
    <div class="card box-margin">
        <div class="card-body" style="padding: 1px;">

            <form id="add-bill">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($vital_details)
                        ?>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Date</b>
                            <div class="input-group">
                                <input type="date" value="<?php echo date('Y-m-d') ?>" name="billing_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <b>Select Patient</b>
                            <div class="input-group">
                                <input type="text" name="" class="form-control" name="search_patient" id="patientSearch" >
                            </div>
                        </div>


                    </div>

                    <div class="dataTables_wrapper no-footer" id="patientForBilling">

                            <div class="tab-content m-t-10 padding-0" style="max-height: 250px; overflow: scroll;">
                                <div class="tab-pane table-responsive active show" id="All">
                                     <table class="table table-bordered table-striped table-hover dataTable" id="patientSearchBill" style="font-size: 13px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="width: 1%;">S/N</th>
                                                <!-- <th>IMG</th> -->
                                                <th>Title</th>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <!-- <th>Blood Group</th> -->
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Acc Status</th>
                                                <th>Contact</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                             foreach ($patients_list as $patient_list) {

                                                //echo $this->uri->segment(3);


                                              ?>
                                            <tr id="<?php echo $patient_list->p_id; ?>" <?php if (($this->uri->segment(3)) == ($patient_list->p_id)) {  ?>class="selected" <?php } ?>>
                                                <td style="width: 1%;"><?php echo $i; ?></td>
                                                <!-- <td><span class="list-icon"><img class="patients-img" src="<?php echo base_url('uploads/').$patient_list->patient_photo; ?>" alt=""></span></td> -->
                                                <td><?php echo $patient_list->patient_title; ?></td>
                                                <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                                <td><?php echo $patient_list->patient_name; ?></td>
                                                <!-- <td><?php echo $patient_list->patient_blood_group; ?></td> -->
                                                <td><?php echo date_diff(date_create($patient_list->patient_dob ), date_create('today'))->y; ?></td>
                                                <td><?php echo $patient_list->patient_gender; ?></td>
                                                <td><?php echo $patient_list->patient_status ?></td>
                                                <td><?php echo $patient_list->patient_phone; ?></td>
                                                <td>
                                                    <button class="btn btn-pure btn-primary" type="button" id="select_patient_button<?php echo $patient_list->p_id; ?>" data-patient-name="<?php echo $patient_list->patient_name; ?>" onclick="select_patient(<?php echo $patient_list->p_id; ?>)"><i class="fa fa-check"></i> Select</button>
                                                </td>
                                            </tr>
                                               <?php 
                                               $i++;
                                           } ?>
                                        </tbody>
                                    </table>                            
                                </div>
                            </div>
                    </div>

                    <div class="input-group" style="margin-top: 10px;">
                        <b>Patient Name: &nbsp;</b>
                         <input type="text" id="patient_id" hidden class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id">
                         <input type="text" id="patient_name" disabled="" class="form-control" value="<?php echo $patient_details->patient_name; ?>" name="patient_name">
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <?php //var_dump($vital_details)
                        ?>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="input-group">
                            <b>Select Service:  &nbsp;</b>
                            <select name="select_service" id="select_service" onchange="toggle_service()" class="form-control">
                                <option value=""></option>
                                <option selected="" value="drugs">Drugs</option>
                                <option value="general">General</option>
                                <option value="laboratory">Laboratory</option>
                                
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3" id="drug_search">
                            <div class="input-group">
                                <b>Search:  &nbsp;</b><input type="text" name="" class="form-control" name="search_drug" id="drugSearch" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3" id="lab_search" style="display: none">
                            <div class="input-group">
                                <b>Search:  &nbsp;</b><input type="text" name="" class="form-control" name="search_lab" id="labSearch" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3" id="general_search" style="display: none">
                            <div class="input-group">
                                <b>Search:  &nbsp;</b><input type="text" name="" class="form-control" name="search_general" id="generalSearch" >
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 mb-3">
                            <button type="button" class="btn btn-xs btn-info btn-block" id="btn_add_manual<?php echo $this->uri->segment(3); ?>" onclick="add_manual_bill(<?php echo $this->uri->segment(3); ?>)"> Manual Bill...</button>
                        </div>


                    </div>

                    <div class="dataTables_wrapper no-footer" id="drugListWrapper" style="display: none">

                            <div class="tab-content m-t-10 padding-0" style="max-height: 200px; overflow: scroll;">
                                <div class="tab-pane table-responsive active show" id="AllDrug">

                                        <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table table-bordered" id="billDrugList">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($drugs as $drug) {

                                                ?>
                                                    <tr <?php if ($drug->quantity_in_stock < 1) { ?> style="background-color:#FF0000" <?php } ?>>
                                                        <td><?php echo $drug->drug_item_name; ?></td>
                                                        <td><?php echo $drug->drug_cost; ?></td>
                                                        <td><button type="button" id="btn_add_drug_bill<?php echo $drug->id; ?>" data-price="<?php echo $drug->drug_cost; ?>" data-drug="<?php echo $drug->drug_item_name; ?>" class="btn btn-outline-success" <?php if ($drug->quantity_in_stock < 0) { ?> disabled <?php } ?> onclick="add_drug_bill(<?php echo $drug->id; ?>)">
                                                                <span class="sr-only">Add</span><i class="fa fa-plus"></i>Add Service</button></td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>                          
                                </div>
                            </div>
                    </div>

                    <div class="dataTables_wrapper no-footer" id="generalListWrapper" style="display: none">

                            <div class="tab-content m-t-10 padding-0" style="max-height: 200px; overflow: scroll;">
                                <div class="tab-pane table-responsive active show" id="AllGeneral">

                                        <table class="table table-bordered table-striped table-hover dataTable" id="billGeneralList">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($service_charges as $service_charge) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $service_charge->Name; ?></td>
                                                        <td><span class='text-success'>₦<?php echo $service_charge->service_charge_cost; ?></span></td>
                                                        <td><button type="button" id="btn_add_general_bill<?php echo $service_charge->id; ?>" data-price="<?php echo $service_charge->service_charge_cost; ?>" data-general="<?php echo $service_charge->Name; ?>" class="btn btn-outline-success" onclick="add_general_bill(<?php echo $service_charge->id; ?>)"><span class="sr-only">Add</span><i class="fa fa-plus"></i>Add Service</button>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>
                                            </tbody>
                                        </table>                                
                                </div>
                            </div>
                    </div>

                    <div class="dataTables_wrapper no-footer" id="labListWrapper" style="display: none">

                            <div class="tab-content m-t-10 padding-0" style="max-height: 200px; overflow: scroll;">
                                <div class="tab-pane table-responsive active show" id="All">

                                        <table class="table table-bordered table-striped table-hover dataTable" id="billLabList">
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
                                                    if($lab_test->lab_test_name!='') {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lab_test->lab_test_name; ?></td>
                                                        <td><span class='text-success'>₦<?php echo $lab_test->cost; ?></span></td>
                                                        <td><button type="button" id="btn_add_lab_bill<?php echo $lab_test->id; ?>" data-price="<?php echo $lab_test->cost; ?>" data-lab="<?php echo $lab_test->lab_test_name; ?>" class="btn btn-outline-success" onclick="add_lab_bill(<?php echo $lab_test->id; ?>)"><span class="sr-only">Add</span><i class="fa fa-plus"></i>Add Service</button></td>
                                                    </tr>
                                                <?php $i++;
                                            }
                                                } ?>
                                            </tbody>
                                        </table>                         
                                </div>
                            </div>
                    </div>
                    <div id="billSummary" style="margin-top: 20px;">

                            <div class="tab-content m-t-10 padding-0" style="max-height: 200px; overflow: scroll;">
                                <div class="tab-pane table-responsive active show" id="All">

                                        <table class="table table-bordered" id="billSummaryList">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Service</th>
                                                    <th>Amount</th>
                                                    <th>Quantity</th>
                                                    <th>Payable</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>                         
                                </div>
                            </div>
                    </div>
                </div>

            <div class="row col-lg-12 col-md-12 mb-3 mt-2">
                <div class="col-4">
                        <button type="button" class="btn btn-primary" id="get-bill">Get Bill</button>
                        <h6>Total: ₦<span id="getamount"></span></h6>
                        <div class="text-danger" id="amt_error2"></div>
                </div>

                   
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Pay As</b>
                            <div class="input-group">
                                <select class="form-control" name="payas" id="payas">
                                    <option value=""></option>
                                    <option selected="" value="cash">Cash</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <b>Full Payment</b>
                            <div class="input-group">
                                <input type="text" class="form-control time12" id="total_bill" name="total_bill_cum" value="" readonly="">
                            </div>
                        </div>
            </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">

    $("#get-bill").click(function(drug_id, qty_given) {
        var sum = 0;
        var rtotal = 0;
        $('#billSummaryList tr:not(:first)').each(function() {
            var tds = $(this).find('td');
            var rtotal = ($(tds[3]).text());
            //console.log(tds)
            sum += Number(rtotal);
        });
        console.log(sum)
        $('#getamount').text(sum);
        $('#total_bill').val(sum);
    })

     $(document).ready(function() {


        var patientSearchTable = $('#patientSearchBill').DataTable({            
            "bLengthChange": false,
            dom: 'lrtip'
        });
        if ($('#patientForBilling').is(':visible')) {
            $('#patientForBilling').hide();
        }


        $('#patientSearch').keyup(function() {

            if (document.getElementById('patientSearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#patientForBilling').show();
                patientSearchTable.search($(this).val()).draw();
            } else {
                $('#patientForBilling').hide();

            }
        });

        var select_service = document.getElementById("select_service").value;
        //console.log(select_service);

        if (select_service=='drugs') {

        var drugSearchTable = $('#billDrugList').DataTable({            
            "bLengthChange": false,
            dom: 'lrtip'
        });
        if ($('#drugListWrapper').is(':visible')) {
            $('#drugListWrapper').hide();
        }
        //$('#example_wrapper').hide();

        $('#drugSearch').keyup(function() {

            if (document.getElementById('drugSearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#drugListWrapper').show();
                drugSearchTable.search($(this).val()).draw();
            } else {
                $('#drugListWrapper').hide();

            }
        });
        }

    });

function select_patient(id) {
    var abc = $('#select_patient_button'+id);
     var patient_name = abc.data("patient-name");
    $('.selected').removeClass('selected');
    $('#'+id).addClass("selected");
    //console.log(patient_name);

    $('#patient_id').val('')
    $('#patient_id').val(id)
    $('#patient_name').val('')
    $('#patient_name').val(patient_name)
    /////
    $('#patientForBilling').hide();

}
function toggle_service() {
    var select_service = document.getElementById("select_service").value;
    if (select_service=='laboratory') {

            $('#drug_search').hide();
            $('#general_search').hide();
            $('#drugListWrapper').hide();
            $('#generalListWrapper').hide();
            $('#lab_search').show();
        var labSearchTable = $('#billLabList').DataTable({            
            "bLengthChange": false,
            dom: 'lrtip'
        });
        if ($('#labListWrapper').is(':visible')) {
            $('#labListWrapper').hide();
        }
        //$('#example_wrapper').hide();

        $('#labSearch').keyup(function() {

            if (document.getElementById('labSearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#labListWrapper').show();
                labSearchTable.search($(this).val()).draw();
            } else {
                $('#labListWrapper').hide();

            }
        });

    }
    else if (select_service=='general') {

            $('#drug_search').hide();
            $('#lab_search').hide();
            $('#drugListWrapper').hide();
            $('#labListWrapper').hide();
            $('#general_search').show();
        var generalSearchTable = $('#billGeneralList').DataTable({            
            "bLengthChange": false,
            dom: 'lrtip'
        });
        if ($('#generalListWrapper').is(':visible')) {
            $('#generalListWrapper').hide();
        }
        //$('#example_wrapper').hide();

        $('#generalSearch').keyup(function() {

            if (document.getElementById('generalSearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#generalListWrapper').show();
                generalSearchTable.search($(this).val()).draw();
            } else {
                $('#generalListWrapper').hide();

            }
        });

    }
    else {
            $('#lab_search').hide();
            $('#general_search').hide();
            $('#general_search').hide();
            $('#generalListWrapper').hide();
            $('#labListWrapper').hide();
            $('#drug_search').show();


    }
}


    function add_drug_bill(id) {

    var dataInit = $('#btn_add_drug_bill'+id);
     var drug_name = dataInit.data("drug");
     var cost = dataInit.data("price");

        $.confirm({
            title: drug_name,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Quantity</label>' +
                '<input type="text" placeholder="Quantity" class="quantity form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var quantity = this.$content.find('.quantity').val();
                        if (!quantity) {
                            $.alert('Enter Prescription');
                            return false;
                        }
                        var payable = Number(cost) * Number(quantity)

                        //$.alert('Your name is ' + price);

                        // $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        // $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        // $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#billSummaryList tbody").append("<tr>" +
                            "<td width='25%' class='jaba'><input type='' hidden value='1' name='food_id[]'><input type='text' hidden name='service_type[]' value='drug'>" + drug_name+ "</td>" +
                            "<td width='25%'><input type='text' name='item_id[]' hidden value='"+id+"'>" + cost+ "</td>" +
                            "<td width='25%'><input type='text' name='quantity[]' hidden value='"+quantity+"'>" + quantity + "</td>" +
                            "<td width='25%'><input type='text' name='item_name[]' hidden value='"+drug_name+"'><input type='text' hidden name='cost[]' value='"+cost+"'>" + payable + "</td>" +
                            "<td width='10%'><button type='button' onclick='removeBill(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
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

    function add_manual_bill(id) {

    // var dataInit = $('#btn_add_drug_bill'+id);
    //  var drug_name = dataInit.data("drug");
    //  var cost = dataInit.data("price");

        $.confirm({
            title: " ",
            columnClass:"m",
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Service:</label>' +
                '<textarea class="service form-control" required /></textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Pay As:</label>' +
                '<select class="pay_as form-control" required ><option value="Deposit">Deposit</option></select>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Amount</label>' +
                '<input type="text" placeholder="Amount" class="quantity form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'OK',
                    btnClass: 'btn-blue',
                    action: function() {
                        var quantity = this.$content.find('.quantity').val();
                        var service = this.$content.find('.service').val();
                        var pay_as = this.$content.find('.pay_as').val();
                        if (!quantity) {
                            $.alert('Enter Amount');
                            return false;
                        }


                           $.ajax({
                          type  : 'post',
                          url   : '<?php echo base_url('billing/pay_manual_bill'); ?>',
                          data: {
                              //status: status,
                              patient_id: id,
                              service: service,
                              debit: quantity
                            },
                          async : false,
                          dataType : 'json',
                          success : function(response){
                            console.log(response);
                            }

                          });
                        //var payable = Number(cost) * Number(quantity)

                        //$.alert('Your name is ' + price);

                        // $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        // $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        // $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#billSummaryList tbody").append("<tr>" +
                            "<td width='25%' class='jaba'>" + service+ "</td>" +
                            "<td width='25%'>" + quantity+ "</td>" +
                            "<td width='25%'>1</td>" +
                            "<td width='25%'>" + quantity + "</td>" +
                            "<td width='10%'></td>" +
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

    function add_lab_bill(id) {

    var dataInit = $('#btn_add_lab_bill'+id);
     var lab_name = dataInit.data("lab");
     var cost = dataInit.data("price");


                        //$.alert('Your name is ' + price);

                        // $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        // $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        // $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#billSummaryList tbody").append("<tr>" +
                            "<td width='25%' class='jaba'><input type='' hidden value='1' name='food_id[]'><input type='text' hidden name='service_type[]' value='lab'>" + lab_name+ "</td>" +
                            "<td width='25%'><input type='text' name='item_id[]' hidden value='"+id+"'>" + cost+ "</td>" +
                            "<td width='25%'><input type='text' name='quantity[]' hidden value='1'>1</td>" +
                            "<td width='25%'><input type='text' name='item_name[]' hidden value='"+lab_name+"'><input type='text' name='cost[]' hidden value='"+cost+"'>" + cost + "</td>" +
                            "<td width='10%'><button type='button' onclick='removeBill(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                            "</tr>");

    }

    function add_general_bill(id) {

    var dataInit = $('#btn_add_general_bill'+id);
     var general_name = dataInit.data("general");
     var cost = dataInit.data("price");


                        //$.alert('Your name is ' + price);

                        // $("#items_prescription").append("<input type='' hidden value='1' name='food_id[]'>");
                        // $("#items_prescription").append("<input hidden name='prescription_id[]' value='" + id + "' id='test_prescription" + id + "'>");
                        // $("#items_prescription").append("<input hidden name='prescription_value[]' value='" + price + "' id='test_prescription2" + price + "'>");


                        $("#billSummaryList tbody").append("<tr>" +
                            "<td width='25%' class='jaba'><input type='' hidden value='1' name='food_id[]'><input type='text' hidden name='service_type[]' value='general'>" + general_name+ "</td>" +
                            "<td width='25%'><input type='text' name='item_id[]' hidden value='"+id+"'>" + cost+ "</td>" +
                            "<td width='25%'><input type='text' name='quantity[]' hidden value='1'>1</td>" +
                            "<td width='25%'><input type='text' name='item_name[]' hidden value='"+general_name+"'><input type='text' hidden name='cost[]' value='"+cost+"'>" + cost + "</td>" +
                            "<td width='10%'><button type='button' onclick='removeBill(this, " + id + ");' class='btn btn-sm btn-danger'>Remove</button></td>" +
                            "</tr>");

    }

    function removeBill(ctl, id) {
        $(ctl).parents("tr").remove();
    }
///////
</script>