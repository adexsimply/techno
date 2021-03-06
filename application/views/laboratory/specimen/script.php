<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-specimen').disable([".action"]);
        $("button[title='specimen']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'laboratory/validate_specimen'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-specimen').enable([".action"]);
        $("button[title='add_specimen']").html("Save changes");
        if (returnData != 'success') {
            $('#add-specimen').enable([".action"]);
            $("button[title='add_specimen']").html("Save changes");
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

    function save_specimen_test(formData) {
        $("button[title='add_specimen']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'laboratory/save_specimen'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('laboratory/specimens'); ?>";
            $("button[title='add_specimen']").html("specimen Added");
        });
    }

    function form_routes_specimen(action) {
        if (action == 'add_specimen') {
            var formData = $('#add-specimen').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Save Specimen',
                    content: 'Are you sure you want to save Specimen?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_specimen_test(formData);

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

    function delete_specimen(rowIndex) {
        $.confirm({
            title: 'Delete Specimen',
            content: 'Are you sure you want to delete specimen?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'laboratory/delete_specimen'; ?>", {
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
    //////////////Add session form ends
</script>