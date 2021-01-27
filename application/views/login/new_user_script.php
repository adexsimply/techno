<script type="text/javascript">
	/////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-user').disable([".action"]);
        $("button[title='add_user']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'staff/validate_user_name'; ?>", async: false, type: 'POST', data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-user').enable([".action"]);
        $("button[title='add_user']").html("Save changes");
        if (returnData != 'success') {
            $('#add-user').enable([".action"]);
            $("button[title='add_user']").html("Save changes");
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

    function save_user_name(formData) {
        $("button[title='add_user']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'staff/add_user_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('staff/login'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_user') {
            var formData = $('#add-user').serialize();
            if (validate(formData) == 'success') {
                // swal({   
                //     title: "Please check your data",   
                //     text: "",
                //     type: "warning",
                //     showCancelButton: true,
                //     confirmButtonColor: "#DD6B55",
                //     cancelButtonText: "Cancel",
                //     confirmButtonText: "Save",
                //     closeOnConfirm: true 
                // },
                // function (isConfirm) {
                // if (isConfirm) {
                //     save_user_name(formData);

                //   }
                // }
                // ); 

            $.confirm({
                            title:'Add User',
                            content:'Are you sure you want to submit?',
                            icon:'fa fa-check-circle',
                            type:'green',
                            buttons:{
                                yes:function(){
                                    save_user_name(formData);
                                },
                                no:function(){
                                    
                                }
                            }
                        });
            }
        } else {
            cancel();
        }
    }
    //////////////Add session form ends
</script>