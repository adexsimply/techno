<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#suspend-user').disable([".action"]);
        $("button[title='suspend_user']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'staff/validate_user_suspension'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#suspend-user').enable([".action"]);
        $("button[title='suspend_user']").html("Save changes");
        if (returnData != 'success') {
            $('#suspend-user').enable([".action"]);
            $("button[title='suspend_user']").html("Save changes");
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

    function save_user_name(formData) {
        $("button[title='suspend_user']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'staff/suspend_user_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('staff/login'); ?>";
        });
    }

    function form_routes_suspend(action) {
        if (action == 'suspend_user') {
            var formData = $('#suspend-user').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Suspend User',
                    content: 'Are you sure you want to suspend this User?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_user_name(formData);
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
    //////////////suspend session form ends
</script>