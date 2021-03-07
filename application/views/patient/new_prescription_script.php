<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-prescription').disable([".action"]);
        $("button[title='prescription']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_prescription'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-prescription').enable([".action"]);
        $("button[title='add_prescription']").html("Save changes");
        if (returnData != 'success') {
            $('#add-prescription').enable([".action"]);
            $("button[title='add_prescription']").html("Save changes");
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

    function save_prescription_test(formData) {
        $("button[title='add_prescription']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_prescription'; ?>", formData).done(function(data) {
            //console.log(data);

            //window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
            $("button[title='add_prescription']").html("Prescription Added");
        });
    }

    function form_routes_prescription(action) {
        if (action == 'add_prescription') {
            var formData = $('#add-prescription').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add Prescription Test',
                    content: 'Are you sure you want to add new Prescription Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_prescription_test(formData);

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

    function delete_prescription(rowIndex) {
        $.confirm({
            title: 'Delete Prescription Test',
            content: 'Are you sure you want to delete Prescription Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_prescription_test'; ?>", {
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