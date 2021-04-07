<script type="text/javascript">
	    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-investigation').disable([".action"]);
        $("button[title='investigation']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'radiology/validate_investigation'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-investigation').enable([".action"]);
        $("button[title='add_investigation']").html("Save changes");
        if (returnData != 'success') {
            $('#add-investigation').enable([".action"]);
            $("button[title='add_investigation']").html("Save changes");
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

    function save_investigation(formData) {
        $("button[title='add_investigation']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'radiology/save_investigation'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('radiology/investigations'); ?>";
        });
    }

    function form_routes_investigation(action) {
        if (action == 'add_investigation') {
            var formData = $('#add-investigation').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add New',
                    content: 'Are you sure you want to save?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_investigation(formData);
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

    function delete_investigation(rowIndex) {
        $.confirm({
            title: 'Delete Item',
            content: 'Are you sure you want to delete this Item?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'radiology/delete_investigation'; ?>", {
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