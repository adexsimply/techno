<script>
$(document).ready(function () {
     var serviceChargeTable =  $('#serviceChargeTable').DataTable({
        });

});


    /////Add Session form begins
    function validate_service_charge(formData) {
        var returnData;
        $('#add-service-charge').disable([".action"]);
        $("button[title='add_service_charge']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'service/validate_service_charge'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-service-charge').enable([".action"]);
        $("button[title='add_service_charge']").html("Save changes");
        if (returnData != 'success') {
            $('#add-service-charge').enable([".action"]);
            $("button[title='add_service_charge']").html("Save changes");
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

    function save_service_charge(formData) {
        $("button[title='add_service_charge']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'service/save_service_charge'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('service/charges'); ?>";
        });
    }

    function form_routes_service(action) {
        if (action == 'add_service_charge') {
            var formData = $('#add-service-charge').serialize();
            if (validate_service_charge(formData) == 'success') {
                $.confirm({
                    title: 'Save service',
                    content: 'Are you sure you want to Save Service?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_service_charge(formData);
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

    function ola()
    {
        alert()
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
</script>