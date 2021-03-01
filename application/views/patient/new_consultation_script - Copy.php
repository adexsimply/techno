<script type="text/javascript">
    /////Add Session form begins
    function save_consultation_name(formData) {
        $("button[title='add_consultation']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/save_consultation'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_consultation(action) {
        if (action == 'add_consultation') {
            var formData = $('#add-consultation').serialize();
                $.confirm({
                    title: 'Save Consultation',
                    content: 'Are you sure you want to save Consultation?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_consultation_name(formData);
                        },
                        no: function() {

                        }
                    }
                });
        } else {
            cancel();
        }
    }
    
function delete_consultation(rowIndex) {
	$.confirm({
                    title: 'Delete Consultation',
                    content: 'Are you sure you want to delete Consultation?',
                    icon: 'fa fa-check-circle',
                    type: 'red',
                    buttons: {
                        yes: function() {
							$.post("<?php echo base_url() . 'patient/delete_consultation'; ?>", {
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