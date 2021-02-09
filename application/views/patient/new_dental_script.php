<script type="text/javascript">
    /////Add Session form begins
    function save_dental_name(formData) {
        $("button[title='add_dental']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/save_dental'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_dental(action) {
        if (action == 'add_dental') {
            var formData = $('#add-dental').serialize();
            $.confirm({
                title: 'Save Dental Clinic',
                content: 'Are you sure you want to save Dental Clinic?',
                icon: 'fa fa-check-circle',
                type: 'green',
                buttons: {
                    yes: function() {
                        save_dental_name(formData);
                    },
                    no: function() {

                    }
                }
            });
        } else {
            cancel();
        }
    }

    function delete_dental_clinic(rowIndex) {
        $.confirm({
            title: 'Delete Dental',
            content: 'Are you sure you want to delete Dental?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_dental_clinic'; ?>", {
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