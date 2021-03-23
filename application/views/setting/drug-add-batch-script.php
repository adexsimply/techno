<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-batch').disable([".action"]);
        $("button[title='batch']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'setting/validate_batch'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-batch').enable([".action"]);
        $("button[title='add_batch']").html("Save changes");
        if (returnData != 'success') {
            $('#add-batch').enable([".action"]);
            $("button[title='add_batch']").html("Save changes");
            $('.form-control-feedback').html('');
            $('.form-control-feedback').each(function() {
                for (var key in returnData) {
                    if ($(this).attr('data-field') == key) {
                        $(this).html(returnData[key]);
                    }
                }
            });
        } else {
            return 'success';
        }
        console.log(returnData);
    }

    function save_batch(formData) {
        $("button[title='add_batch']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'setting/save_drug_batch'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('setting/drugs'); ?>";
        });
    }

    function form_routes_batch(action) {
        if (action == 'add_batch') {
            var formData = $('#add-batch').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Save Drug Batch',
                    content: 'Are you sure you want to save Drug Batch and Expire Date?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_batch(formData);
                        },
                        no: function() {

                        }
                    }
                });
            }
        } else {
            cancel();
        }
    }

    function delete_batch(rowIndex) {
        $.confirm({
            title: 'Delete Drug Batch',
            content: 'Are you sure you want to delete batch?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_batch'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        location.reload();
                    });
                },
                no: function() {

                }
            }
        });
    }

    function delete_bin_card(rowIndex) {
        $.confirm({
            title: 'Delete Drug Bin Card',
            content: 'Are you sure you want to Drug Bin Card?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_bin_card'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        location.reload();
                    });
                },
                no: function() {

                }
            }
        });
    }
    //////////////Add session form ends
</script>