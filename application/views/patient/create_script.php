<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-patient').disable([".action"]);
        $("button[title='add_patient']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/patient_validate'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-patient').enable([".action"]);
        $("button[title='add_patient']").html("Save changes");
        if (returnData != 'success') {
            $('#add-patient').enable([".action"]);
            $("button[title='add_patient']").html("Save changes");
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

    function validate_image(formData) {
        var returnData;
        $('#add-patient').disable([".action"]);
        $("button[title='add_patient']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_image'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
                console.log(returnData);
            }
        });
    }

    function save_patient_name(formData) {
        $("button[title='add_patient']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'parameters/add_new_parameter'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('parameters'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_patient') {
            var formData = $('#add-patient').serialize();
            if (validate(formData) == 'success') {

                if (validate_image(formData) == 'success') {}
                // $.confirm({
                //     title: 'Add Parameter',
                //     content: 'Are you sure you want to add new Parameter?',
                //     icon: 'fa fa-check-circle',
                //     type: 'green',
                //     buttons: {
                //         yes: function() {
                //             save_patient_name(formData);
                //         },
                //         no: function() {

                //         }
                //     }
                // });
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends
</script>