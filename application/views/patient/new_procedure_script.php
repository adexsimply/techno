<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-procedure').disable([".action"]);
        $("button[title='procedure']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_procedure'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-procedure').enable([".action"]);
        $('#procedure_error').html('');
        if (returnData != 'success') {
            $('#procedure_error').html('At least one Procedure Test must be added');
        } else {
            $('#procedure_error').html('');
            return 'success';
        }
        console.log(returnData);
    }

    function save_procedure_test(formData) {
        $("button[title='add_procedure']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_procedure'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_procedure(action) {
        if (action == 'add_procedure') {
            var formData = $('#add-procedure').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add procedure Test',
                    content: 'Are you sure you want to add new procedure Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_procedure_test(formData);
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

    function delete_procedure(rowIndex) {
        $.confirm({
            title: 'Delete Procedure',
            content: 'Are you sure you want to delete procedure?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_procedure_test'; ?>", {
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