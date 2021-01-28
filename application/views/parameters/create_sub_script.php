<script type="text/javascript">
    /////Add Session form begins

    function validate(formData) {
        var returnData;
        $('#add-sub-params').disable([".action"]);
        $("button[title='add_sub_params']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'parameters/sub_validate'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-sub-params').enable([".action"]);
        $("button[title='add_sub_params']").html("Save changes");
        if (returnData != 'success') {
            $('#add-sub-params').enable([".action"]);
            $("button[title='add_sub_params']").html("Save changes");
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

    function check() {
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/sub_param_check_now2'; ?>",
            data: $('#add-sub-params').serialize(),
            success: function(response2) {
                console.log(response2)
                if (response2 == 'success') {
                    $('.form-control-feedback').html('');
                    return 'success';
                } else {
                    $('.form-control-feedback').html('The Name has already exist');
                }
            }
        });
    }

    function save_sub_params_name(formData) {
        $("button[title='add_sub_params']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'parameters/add_new_sub_parameter'; ?>", formData).done(function(data) {

            window.location.reload();
        });
    }

    function form_routes_add(action) {
        if (action == 'add_sub_params') {
            var formData = $('#add-sub-params').serialize();
            if (validate(formData) == 'success') {
                console.log('enter')
                $.ajax({
                    type: "Post",
                    url: "<?php echo base_url() . 'parameters/sub_param_check_now2'; ?>",
                    data: $('#add-sub-params').serialize(),
                    success: function(response2) {
                        console.log(response2)
                        if (response2 == 'success') {
                            $.confirm({
                                title: 'Add Sub Parameter',
                                content: 'Are you sure you want to add new Sub Parameter?',
                                icon: 'fa fa-check-circle',
                                type: 'green',
                                buttons: {
                                    yes: function() {
                                        save_sub_params_name(formData);
                                    },
                                    no: function() {

                                    }
                                }
                            });
                        } else {
                            $('.form-control-feedback').html('The Name has already exist');
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