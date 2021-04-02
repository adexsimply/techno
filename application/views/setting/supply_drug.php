
                        <div class="col-lg-12 col-md-12 mb-3 mt-2">
                            <fieldset style="margin-top: 20px;">
                                <div class="text-center mb-2">
                                    <code style="color: #ff0000;font-size: 13px;" class="text-center form-control-feedback" data-field="prescription_id[]"></code>
                                </div>
                                <legend style="font-size: 15px;"><strong>Choose Drug</strong>
                                    <input type="text" class="form-control" id="drugSearchSupply" placeholder="Start typing a drug name"></legend>
                                <div class="body" style="max-height: 200px; overflow: scroll; padding: 0;">


                                    <div class="dataTables_wrapper no-footer" id="example_wrapper_supply">

                                        <table style="font-size: 13px;padding: 0;" cellpadding="0" cellspacing="0" class="table table-bordered" id="example_drug_supply">
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
                                                        <td><button type="button" class="btn btn-outline-success" onclick="add_supply(this,<?php echo $drug->id; ?>)">
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

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script>
$(document)
    .ready(function () {


        var table = $('#example_drug_supply').DataTable({
            dom: 'lrtip',
            'lengthChange': false
        });
        if ($('#example_wrapper_supply').is(':visible')) {
            $('#example_wrapper_supply').hide();
        }
        //$('#example_wrapper').hide();


        $('#drugSearchSupply').keyup(function() {

            if (document.getElementById('drugSearchSupply').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#example_wrapper_supply').show();
                table.search($(this).val()).draw();
            } else {
                $('#example_wrapper_supply').hide();

            }
        });



});

 
    function add_supply(condi,id) {

        $('#example_wrapper').hide();

        
        _row = $(condi).parents("tr");
        var cols = _row.children("td");

        var old_quantity = $(cols[1]).text();   

       // console.log(quantity);
        event.preventDefault();
        /*var element = $(event.target).is('a') ? $(event.target) : $(event.target).parents('a');*/
        var element = $(event.currentTarget);
        var title = "Enter Quantity";

       var supply_drug = $.confirm({
            title: title,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<input type="number" placeholder="Quantity" class="price form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var price = this.$content.find('.price').val();
                        if (!price) {
                            $.alert('Enter Quantity');


                            return false;
                        }

                                $.ajax({
                                    url: "<?php echo base_url() . 'setting/add_drug_supply'; ?>",
                                    async: false,
                                    type: 'POST',
                                    data: {
                                        id: id,
                                        quantity: price,
                                        old_quantity: old_quantity
                                    },
                                    success: function(response) {
                                        if (response = true) {
                                            //console.log(response)
                                            // $("#qty_value_success").text('Successfully Saved').fadeOut(3000);
                                            alert('Successfully Saved')

                                        
                                            supply_drug.close();
                                            location.reload();

                                        } else {
                                            alert('Not Save')
                                            // $("#qty_value_error").text('Not Save').fadeOut(3000);

                                        }
                                    }
                                });




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
///////

</script>