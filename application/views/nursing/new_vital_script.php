<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-vital').disable([".action"]);
        $("button[title='add_vital']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'nursing/validate_new'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                returnData = data;
            }
        });



        $('#add-vital').enable([".action"]);
        $("button[title='add_vital']").html("Create vital");
        if (returnData != 'success') {
            $('#add-vital').enable([".action"]);
            $("button[title='add_vital']").html("Create vital");
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

    function save_vital_name(formData) {
        $("button[title='add_vital']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'nursing/add_vital'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('nursing/vitals'); ?>";
        });
    }

    function form_routes_vital(action) {
        if (action == 'add_vital') {
            var formData = $('#add-vital').serialize();
            console.log(formData)
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Take Vital',
                    content: 'Are you sure you want to add take vital?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_vital_name(formData);
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