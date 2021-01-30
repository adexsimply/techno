<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-role').disable([".action"]);
        $("button[title='add_role']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'role/validate_role_name'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-role').enable([".action"]);
        $("button[title='add_role']").html("Save changes");
        if (returnData != 'success') {
            $('#add-role').enable([".action"]);
            $("button[title='add_role']").html("Save changes");
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

    function save_role_name(formData) {
        $("button[title='add_role']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'role/add_role_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('role'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_role') {
            var formData = $('#add-role').serialize();
            if (validate(formData) == 'success') {
                swal({
                        title: "Please check your data",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        cancelButtonText: "Cancel",
                        confirmButtonText: "Save",
                        closeOnConfirm: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            save_role_name(formData);

                        }
                    }
                );
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends



    function delete_role_name(rowIndex) {
        swal({
                title: "Are you sure want to delete this User?",
                text: "Deleted User can not be restored!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Cancel",
                confirmButtonText: "Proceed",
                closeOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.post("<?php echo base_url() . 'staff/delete_role_name'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        console.log(data);
                        // location.reload();
                    });

                }
            });
    }

    function disable_user(rowIndex) {
        swal({
                title: "Are you sure want to Disable this user?",
                text: "Disabled user can not login!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Cancel",
                confirmButtonText: "Proceed",
                closeOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.post("<?php echo base_url() . 'staff/disable_staff_name'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        location.reload();
                    });

                }
            });
    }

    function enable_user(rowIndex) {
        swal({
                title: "Are you sure want to Enable this user?",
                text: "Enabled user can able to login!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Cancel",
                confirmButtonText: "Proceed",
                closeOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.post("<?php echo base_url() . 'staff/enable_staff_name'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        location.reload();
                    });

                }
            });
    }

    ////Function to show form for session editing
    function get_role_data(idr) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('role/get_role_details') ?>',
            dataType: 'json',
            data: {
                id: idr
            },
            success: function(data) {

                var role_name = data[0].role_name;
                // var class_id = data[0].id;
                $('[name="role_name"]').val(role_name);
                $('[name="role_id"]').val(idr);
            }
        });
    }

    ///This clears textbox on modal toggle
    function clear_textbox() {
        $('input[type=text]').each(function() {
            $(this).val('');
        });
    }
</script>