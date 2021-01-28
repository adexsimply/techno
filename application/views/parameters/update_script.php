<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script type="text/javascript">
    function update(id) {
        var returnData;
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/update_validate'; ?>",
            data: $('#update_form_now' + id).serialize(),
            success: function(response, textStatus, jqXHR) {
                console.log(response)
                returnData = response;
                if (response == 'success') {
                    check(id);
                } else {
                    $('.form-control-feedback_update').each(function() {
                        for (var key in returnData) {
                            if ($(this).attr('data-field') == key) {
                                $(this).html(returnData[key]);
                            }
                        }
                    });
                }
            }
        });
    }

    function check(id) {
        console.log('enter')
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/check_now'; ?>",
            data: $('#update_form_now' + id).serialize(),
            success: function(response2) {
                console.log(response2)
                if (response2 == 'success') {
                    $('.form-control-feedback_update').html('');
                    update_now(id);
                } else {
                    $('.form-control-feedback_update').html('The Name has already exist');
                }
            }
        });
    }

    function update_now(id) {
        console.log($('#update_form_now' + id).serialize())
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/update_parameter'; ?>",
            data: $('#update_form_now' + id).serialize(),
            success: function(response3) {
                console.log(response3)
                if (response3 == 'success') {
                    $('.form-control-feedback_update').html('');
                    window.location = "<?php echo base_url('parameters'); ?>";
                } else {
                    $('.form-control-feedback_update').html('Something went wrong, try again');
                }
            }
        });
    }
</script>