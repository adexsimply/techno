<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<!-- Javascript -->
<script>
    if ($("#add_parameter").length > 0) {
        $("#add_parameter").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 60,
                },
            },
            messages: {
                name: {
                    required: "Parameter's Name is required.",
                    maxlength: "The Name should be or equal to 60 chars.",
                },
            },
        })
    }

    // function update_validate(formData) {
    // var returnData;
    // $('#update-params').disable([".action"]);
    // $("button[title='update_params']").html("Validating data, please wait...");
    // $.ajax({
    // url: "<?php echo base_url() . 'parameters/update_validate'; ?>",
    // async: false,
    // type: 'POST',
    // data: formData,
    // success: function(data, textStatus, jqXHR) {
    // console.log(data);
    // returnData = data;
    // }
    // });



    // $('#update-params').enable([".action"]);
    // $("button[title='update_params']").html("Save changes");
    // console.log(returnData);
    // if (returnData != 'success') {
    // $('#update-params').enable([".action"]);
    // $("button[title='update_params']").html("Save changes");
    // $('.form-control-feedback_update').html('');
    // $('.form-control-feedback_update').each(function() {
    // for (var key in returnData) {
    // if ($(this).attr('data-field') == key) {
    // $(this).html(returnData[key]);
    // }
    // }
    // });
    // } else {
    // return 'success';
    // }
    // // console.log(returnData);
    // }

    // function check(formData) {
    // var returnData;
    // $('#update-params').disable([".action"]);
    // $("button[title='update_params']").html("Checking data, please wait...");
    // $.ajax({
    // url: "<?php echo base_url() . 'parameters/check_now'; ?>",
    // async: false,
    // type: 'POST',
    // data: formData,
    // success: function(data, textStatus, jqXHR) {
    // returnData = data;
    // }
    // });



    // $('#update-params').enable([".action"]);
    // $("button[title='update_params']").html("Update changes");
    // if (returnData != 'success') {
    // $('#update-params').enable([".action"]);
    // $("button[title='update_params']").html("Update changes");
    // $('.form-control-feedback_update').html('');
    // $('.form-control-feedback_update2').html('Name already exist');
    // } else {
    // $('.form-control-feedback_update2').html('');
    // return 'success';
    // }
    // console.log(returnData);
    // }

    // function update_params_name(formData) {
    // $("button[title='update_params']").html("Updating data, please wait...");
    // $.post("<?php echo base_url() . 'parameters/update_parameter'; ?>", formData).done(function(data) {

    // window.location = "<?php echo base_url('parameters'); ?>";
    // });
    // }

    // function form_routes_update(action) {
    // if (action == 'update_params') {
    // var formData = $('#update-params').serialize();
    // if (update_validate(formData) == 'success') {
    // // if (check(formData) == 'success') {
    // $.confirm({
    // title: 'Update Parameter',
    // content: 'Are you sure you want to update this Parameter?',
    // icon: 'fa fa-check-circle',
    // type: 'green',
    // buttons: {
    // yes: function() {
    // update_params_name(formData);
    // },
    // no: function() {

    // }
    // }
    // });
    // }
    // // }
    // } else {
    // cancel();
    // }
    // }
    //////////////Add session form ends
</script>