<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script type="text/javascript">
    function update_sub_parameter(id) {
        var returnData;
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/update_sub_validate'; ?>",
            data: $('#update_sub_parameter' + id).serialize(),
            success: function(response, textStatus, jqXHR) {
                returnData = response;
                console.log(response)
                if (response == 'success') {
                    check(id);
                    console.log('test test test')
                } else {
                    $('.form-control-feedback').each(function() {
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
            url: "<?php echo base_url() . 'parameters/sub_param_check_now'; ?>",
            data: $('#update_sub_parameter' + id).serialize(),
            success: function(response2) {
                console.log(response2)
                if (response2 == 'success') {
                    $('.form-control-feedback').html('');
                    update(id);
                } else {
                    $('.form-control-feedback').html('The Name has already exist');
                }
            }
        });
    }

    function update(id) {
        console.log('enter')
        $.ajax({
            type: "Post",
            url: "<?php echo base_url() . 'parameters/update_sub_param'; ?>",
            data: $('#update_sub_parameter' + id).serialize(),
            success: function(response3) {
                console.log(response3)
                if (response3 == 'success') {
                    $('.form-control-feedback').html('');
                    window.location.reload();
                } else {
                    $('.form-control-feedback').html('Something went wrong, try again');
                }
            }
        });
    }
</script>