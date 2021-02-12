<script type="text/javascript">
    /////Add Session form begins
    function save_med_report_name(formData) {
        $("button[title='add_med_report']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/save_med_report'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_med_report(action) {
        if (action == 'add_med_report') {
            var formData = $('#add-med-report').serialize();
            $.confirm({
                title: 'Save Med Report',
                content: 'Are you sure you want to save Med Report?',
                icon: 'fa fa-check-circle',
                type: 'green',
                buttons: {
                    yes: function() {
                        save_med_report_name(formData);
                    },
                    no: function() {

                    }
                }
            });
        } else {
            cancel();
        }
    }

    function delete_med_report(rowIndex) {
        $.confirm({
            title: 'Delete Med Report',
            content: 'Are you sure you want to delete Med Report?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_med_report'; ?>", {
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