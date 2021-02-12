<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-image').disable([".action"]);
        $("button[title='image']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_image'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
                console.log(data)
            }
        });



        $('#add-image').enable([".action"]);
        $("button[title='add_image']").html("Save changes");
        if (returnData != 'success') {
            $('#add-image').enable([".action"]);
            $("button[title='add_image']").html("Save changes");
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
        $('#add-image').disable([".action"]);
        $("button[title='add_image']").html("Validating data, please wait...");
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

    function save_image_name(formData) {
        $("button[title='add_image']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/add_new_image'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_image(action) {
        if (action == 'add_image') {
            var formData = $('#add-image').serialize();
            // if (validate(formData) == 'success') {
            if (validate_image(formData) == 'success') {
                $.confirm({
                    title: 'Add Iamge',
                    content: 'Are you sure you want to add new Iamge?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_image_name(formData);
                        },
                        no: function() {

                        }
                    }
                });
                // }
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends
</script>