<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-appointment1').disable([".action"]);
        $("button[title='add_appointment1']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'appointment/validate_new'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                returnData = data;
            }
        });



        $('#add-appointment1').enable([".action"]);
        $("button[title='add_appointment1']").html("Create Appointment");
        if (returnData != 'success') {
            $('#add-appointment').enable([".action"]);
            $("button[title='add_appointment1']").html("Create Appointment");
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
    }

    function save_appointment_name(formData) {
        $("button[title='add_appointment1']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'appointment/add_appointment'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment'); ?>";
        });
    }

    function form_routes_appointment(action) {
        if (action == 'add_appointment1') {
            var formData = $('#add-appointment1').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Create Appointment',
                    content: 'Are you sure you want to add create Appointment?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_appointment_name(formData);
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
    //////////////Add session form ends

</script>