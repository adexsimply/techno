<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-lab').disable([".action"]);
        $("button[title='lab']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_lab'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-lab').enable([".action"]);
        $('#lab_id').html('');
        if (returnData != 'success') {
            $('#lab_id').html('At least one Laboratory Test must be added');
        } else {
            $('#lab_id').html('');
            return 'success';
        }
        console.log(returnData);
    }

    function save_lab_test(formData) {
        $("button[title='add_lab']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_lab'; ?>", formData).done(function(data) {
            console.log(data);

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_lab(action) {
        if (action == 'add_lab') {
            var formData = $('#add-lab').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add Laboratoty Test',
                    content: 'Are you sure you want to add new Laboratoty Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_lab_test(formData);
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

    function delete_lab_test(rowIndex) {
        $.confirm({
            title: 'Delete Laboratoty Test',
            content: 'Are you sure you want to delete Laboratoty Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_lab_test'; ?>", {
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