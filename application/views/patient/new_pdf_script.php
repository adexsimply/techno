<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-pdf').disable([".action"]);
        $("button[title='pdf']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_pdf_form'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-pdf').enable([".action"]);
        $("button[title='add_pdf']").html("Save changes");
        if (returnData != 'success') {
            $('#add-pdf').enable([".action"]);
            $("button[title='add_pdf']").html("Save changes");
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

    function validate_pdf(formData) {
        var returnData;
        $('#add-pdf').disable([".action"]);
        $("button[title='add_pdf']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_pdf'; ?>",
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

    function save_pdf_name(formData) {
        $("button[title='add_pdf']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/add_new_pdf'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_pdf(action) {
        if (action == 'add_pdf') {
            var formData = $('#add-pdf').serialize();
            if (validate(formData) == 'success') {
                if (validate_pdf(formData) == 'success') {
                    $.confirm({
                        title: 'Add Parameter',
                        content: 'Are you sure you want to add new Parameter?',
                        icon: 'fa fa-check-circle',
                        type: 'green',
                        buttons: {
                            yes: function() {
                                save_pdf_name(formData);
                            },
                            no: function() {

                            }
                        }
                    });
                }
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends
</script>