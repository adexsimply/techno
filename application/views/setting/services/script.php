<script>
    /////Add Session form begins
    function validate_service(formData) {
        var returnData;
        $('#add-service').disable([".action"]);
        $("button[title='service']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'setting/validate_service'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-service').enable([".action"]);
        $("button[title='add_service']").html("Save changes");
        if (returnData != 'success') {
            $('#add-service').enable([".action"]);
            $("button[title='add_service']").html("Save changes");
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
        //console.log(returnData);
    }

    function save_service_service(formData) {
        $("button[title='add_service']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'setting/save_service'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('setting/services'); ?>";
        });
    }

    function form_routes_service(action) {
        if (action == 'add_service') {
            var formData = $('#add-service').serialize();
            if (validate_service(formData) == 'success') {
                $.confirm({
                    title: 'Save service',
                    content: 'Are you sure you want to Save Service?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_service_service(formData);
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

    function delete_service(rowIndex) {
        $.confirm({
            title: 'Delete service',
            content: 'Are you sure you want to delete service?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_service'; ?>", {
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