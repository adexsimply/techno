<script type="text/javascript">
    /////Add Session form begins
    function save_update(formData) {
        $("button[title='update_request']").html("Saving data, please wait...");
        $.post("<?php echo base_url('radiology/update_request'); ?>", formData).done(function(data) {
            console.log(data)
            //window.location = "<?php echo base_url('radiology/requests'); ?>";
        });
    }

    function form_routes_request(action) {
        if (action == 'update_request') {
            var formData = $('#update-request').serialize();
            $.confirm({
                title: 'Update Request',
                content: 'Are you sure you want to Save Request?',
                icon: 'fa fa-check-circle',
                type: 'green',
                buttons: {
                    yes: function() {
                        save_update(formData);
                    },
                    no: function() {

                    }
                }
            });
        } else {
            cancel();
        }
    }
</script>