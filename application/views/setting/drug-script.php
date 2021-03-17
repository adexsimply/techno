<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-drug').disable([".action"]);
        $("button[title='drug']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'setting/validate_drug'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-drug').enable([".action"]);
        $("button[title='add_drug']").html("Save changes");
        if (returnData != 'success') {
            $('#add-drug').enable([".action"]);
            $("button[title='add_drug']").html("Save changes");
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

    function save_drug(formData) {
        $("button[title='add_drug']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'setting/save_drug'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('setting/drugs'); ?>";
        });
    }

    function form_routes_drug(action) {
        if (action == 'add_drug') {
            var formData = $('#add-drug').serialize();
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Save Drug',
                    content: 'Are you sure you want to save Drug?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_drug(formData);
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

    function delete_drug(rowIndex) {
        $.confirm({
            title: 'Delete Drug drug',
            content: 'Are you sure you want to delete drug?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_drug'; ?>", {
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

    function delete_bin_card(rowIndex) {
        $.confirm({
            title: 'Delete Drug Bin Card',
            content: 'Are you sure you want to Drug Bin Card?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_bin_card'; ?>", {
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
</script>s