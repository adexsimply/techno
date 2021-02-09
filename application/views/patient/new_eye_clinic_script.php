<script type="text/javascript">
    /////Add Session form begins
    function save_eye_clinic_name(formData) {
        $("button[title='add_eye_clinic']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/save_eye_clinic'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_eye_clinic(action) {
        if (action == 'add_eye_clinic') {
            var formData = $('#add-eye-clinic').serialize();
                $.confirm({
                    title: 'Save Eye Clinic',
                    content: 'Are you sure you want to save Eye Clinic?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_eye_clinic_name(formData);
                        },
                        no: function() {

                        }
                    }
                });
        } else {
            cancel();
        }
    }
    
function delete_eye_clinic(rowIndex) {
	$.confirm({
                    title: 'Delete Eye Clinic',
                    content: 'Are you sure you want to delete Eye Clinic?',
                    icon: 'fa fa-check-circle',
                    type: 'red',
                    buttons: {
                        yes: function() {
							$.post("<?php echo base_url() . 'patient/delete_eye_clinic'; ?>", {
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