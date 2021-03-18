<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script>
$(document)
    .ready(function () {

     var drugList =  $('#drugList').DataTable({
            "lengthChange": false
        });



     var prescriptionTable =  $('#drugsListTable').DataTable({
            //"lengthChange": false
        });
});

    /////Add Session form begins
    function validate_new_range(formData) {
        var returnData;
        $('#add-range').disable([".action"]);
        $("button[title='range']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'setting/validate_range'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-range').enable([".action"]);
        $('#range_error').html('');
        if (returnData != 'success') {
            $('#range_error').html('Range Name is required');
        } else {
            $('#range_error').html('');
            return 'success';
        }
        //console.log(returnData);
    }

    function save_range_test(formData) {
        $("button[title='add_range']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'setting/save_range'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('setting/ranges'); ?>";
        });
    }

    function form_routes_range(action) {
        if (action == 'add_range') {
            var formData = $('#add-range').serialize();
            if (validate_new_range(formData) == 'success') {
                $.confirm({
                    title: 'Save Range',
                    content: 'Are you sure you want to Save Laboratoty Test Range?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_range_test(formData);
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

    function delete_range_test(rowIndex) {
        $.confirm({
            title: 'Delete Laboratoty Test Range',
            content: 'Are you sure you want to delete Laboratoty Test Range?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_range_test'; ?>", {
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

    //Laboratory Test
    /////Add Session form begins
    function validate_test(formData) {
        var returnData;
        $('#add-test').disable([".action"]);
        $("button[title='test']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'setting/validate_test'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-test').enable([".action"]);
        $("button[title='add_test']").html("Save changes");
        if (returnData != 'success') {
            $('#add-test').enable([".action"]);
            $("button[title='add_test']").html("Save changes");
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

    function save_teste_test(formData) {
        $("button[title='add_teste']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'setting/save_test'; ?>", formData).done(function(data) {
            //console.log(data);

            window.location = "<?php echo base_url('setting/tests'); ?>";
        });
    }

    function form_routes_test(action) {
        if (action == 'add_test') {
            var formData = $('#add-test').serialize();
            if (validate_test(formData) == 'success') {
                $.confirm({
                    title: 'Save Test',
                    content: 'Are you sure you want to Save Laboratoty Test?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_teste_test(formData);
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

    function delete_test(rowIndex) {
        $.confirm({
            title: 'Delete Laboratoty Test',
            content: 'Are you sure you want to delete Laboratoty Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'setting/delete_test'; ?>", {
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