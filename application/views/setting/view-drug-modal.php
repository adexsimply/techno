<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">

            <form id="add-prescription">
                <div class="modal-body edit-doc-profile">
                    <div class="row clearfix">
                        <?php //var_dump($drug_details)
                        //var_dump($this->session->userdata('active_user')->fullname);
                        ?>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Drug Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" value="<?php echo $drug_details->drug_item_name; ?>" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity in Stock</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="qty_value2" value="<?php echo $drug_details->quantity_in_stock; ?>">
                                    <input type="number" class="form-control" id="qty_value" name="qty_value" value="<?php echo $drug_details->quantity_in_stock; ?>" placeholder="150">
                                    <code style="color: #ff0000;font-size: 15x;" class="form-control-feedback" id="qty_value_error"></code>
                                    <code style="color: green;font-size: 15x;" class="form-control-feedback" id="qty_value_success"></code>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn btn-success" type="button" onclick="qty_update(<?php echo $drug_details->id; ?>)">Adjust</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Show From - To</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn btn-success">Retrive</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="bin-card-tab" data-toggle="tab" href="#bin-card" role="tab" aria-controls="bin-card" aria-selected="true">Bin Card</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="expire-and-batch-no-tab" data-toggle="tab" href="#expire-and-batch-no" role="tab" aria-controls="expire-and-batch-no" aria-selected="false">Expire and Batch Number</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="">
                                <div class="tab-pane fade show active" id="bin-card" role="tabpanel" aria-labelledby="bin-card-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable" id="">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Particular</th>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Balance</th>
                                                    <th>View</th>
                                                </tr>

                                            <tbody>
                                                <?php //var_dump($drug_bin_cards);
                                                $i = 1;
                                                foreach ($drug_bin_cards as $drug_bin_card) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo date('d M Y', strtotime($drug_bin_card->date_added)); ?></td>
                                                        <td><?php echo $drug_bin_card->particular; ?></td>
                                                        <td><?php echo $drug_bin_card->drug_in; ?></td>
                                                        <td><?php echo $drug_bin_card->drug_out; ?></td>
                                                        <td><?php echo $drug_bin_card->balance; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="View Bin Card Details" href="<?php echo base_url('setting/view_bin_card/' . $drug_bin_card->id) ?>">
                                                                View
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" type="button" onclick="delete_bin_card(<?php echo $drug_bin_card->id ?>)">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="expire-and-batch-no" role="tabpanel" aria-labelledby="expire-and-batch-no-tab">
                                    <button class="btn btn-success m-b-15" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Add New" href="<?php echo base_url('setting/add_drug_batch_and_expire_number/' . $drug_details->id) ?>">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Add New
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable" id="">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date Added</th>
                                                    <th>Expire Date</th>
                                                    <th>Batch Number</th>
                                                    <th>View</th>
                                                </tr>
                                            <tbody>
                                                <?php //var_dump($drug_batches);
                                                $i = 1;
                                                foreach ($drug_batches as $drug_batch) {
                                                ?>

                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo date('d M Y', strtotime($drug_batch->date_added)); ?></td>
                                                        <td><?php echo date('d M Y', strtotime($drug_batch->expire_date)); ?></td>
                                                        <td><?php echo $drug_batch->batch_number; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Edit" href="<?php echo base_url('setting/edit_drug_batch_and_expire_number/' . $drug_details->id) ?>">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" type="button" onclick="delete_batch(<?php echo $drug_batch->id ?>)">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('setting/drug-add-batch-script'); ?>
<script>
    var _row = null;

    function qty_update(id) {
        var qty_value = $("#qty_value").val();
        var qty_value2 = $("#qty_value2").val();
        if (qty_value != '') {
            if (qty_value >= 0) {
                $("#qty_value_error").text('')
                $.ajax({
                    url: "<?php echo base_url() . 'setting/qty_update'; ?>",
                    async: false,
                    type: 'POST',
                    data: {
                        id: id,
                        value: qty_value,
                        value2: qty_value2
                    },
                    success: function(response) {
                        $("#qty_value_success").text('');
                        if (response = true) {
                            console.log(response)
                            // $("#qty_value_success").text('Successfully Saved').fadeOut(3000);
                            alert('Successfully Saved')
                        } else {
                            alert('Not Save')
                            // $("#qty_value_error").text('Not Save').fadeOut(3000);

                        }
                    }
                });
            } else {
                console.log(qty_value, id)
                $("#qty_value_error").text('Quatity in Stock can not be less than zero (0)')
            }
        } else {
            console.log(qty_value, id)
            $("#qty_value_error").text('Quatity in Stock is required');
        }
    }

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
</script>