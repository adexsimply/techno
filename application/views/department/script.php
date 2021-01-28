<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-department').disable([".action"]);
        $("button[title='add_department']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'department/validate_department_name'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-department').enable([".action"]);
        $("button[title='add_department']").html("Save changes");
        if (returnData != 'success') {
            $('#add-department').enable([".action"]);
            $("button[title='add_department']").html("Save changes");
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

    function save_department_name(formData) {
        $("button[title='add_department']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'department/add_department_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('department'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_department') {
            var formData = $('#add-department').serialize();
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
                            save_department_name(formData);

                        }
                    }
                );
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends



    function delete_department_name(rowIndex) {
        swal({
                title: "Are you sure want to delete this data?",
                text: "Deleted data can not be restored!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Cancel",
                confirmButtonText: "Proceed",
                closeOnConfirm: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.post("<?php echo base_url() . 'department/delete_department_name'; ?>", {
                        id: rowIndex
                    }).done(function(data) {
                        location.reload();
                    });

                }
            });
    }

    ////Function to show form for session editing
    function get_department_data(idr) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('department/get_department_details') ?>',
            dataType: 'json',
            data: {
                id: idr
            },
            success: function(data) {

                var department_name = data[0].department_name;
                // var class_id = data[0].id;
                $('[name="department_name"]').val(department_name);
                $('[name="department_id"]').val(idr);
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