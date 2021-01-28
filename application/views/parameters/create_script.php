<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-params').disable([".action"]);
        $("button[title='add_params']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'parameters/validate'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-params').enable([".action"]);
        $("button[title='add_params']").html("Save changes");
        if (returnData != 'success') {
            $('#add-params').enable([".action"]);
            $("button[title='add_params']").html("Save changes");
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

    function save_params_name(formData) {
        $("button[title='add_params']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'parameters/add_new_parameter'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('parameters'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_params') {
            var formData = $('#add-params').serialize();
            if (validate(formData) == 'success') {

                $.confirm({
                    title: 'Add Parameter',
                    content: 'Are you sure you want to add new Parameter?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_params_name(formData);
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