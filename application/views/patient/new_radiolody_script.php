<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-radiology').disable([".action"]);
        $("button[title='radiology']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_radiology'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-radiology').enable([".action"]);
        $('#radiology_error').html('');
        if (returnData != 'success') {
            $('#radiology_error').html('At least one Radiology Test must be added');
        } else {
            $('#radiology_error').html('');
            return 'success';
        }
        console.log(returnData);
    }

    function save_radiology_test(formData) {
        $("button[title='add_radiology']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_radiology'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_radiology(action) {
        if (action == 'add_radiology') {
            var formData = $('#add-radiology').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add Radiology Test',
                    content: 'Are you sure you want to add new Radiology Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_radiology_test(formData);
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

    function delete_radiology(rowIndex) {
        $.confirm({
            title: 'Delete Radiology Test',
            content: 'Are you sure you want to delete Radiology Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_radiology_test'; ?>", {
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