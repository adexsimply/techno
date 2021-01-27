<script type="text/javascript">
	/////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-staff').disable([".action"]);
        $("button[title='add_staff']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'staff/validate_staff_name'; ?>", async: false, type: 'POST', data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-staff').enable([".action"]);
        $("button[title='add_staff']").html("Save changes");
        if (returnData != 'success') {
            $('#add-staff').enable([".action"]);
            $("button[title='add_staff']").html("Save changes");
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

    function save_staff_name(formData) {
        $("button[title='add_staff']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'staff/add_staff_name'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('staff'); ?>";
        });
    }

    function form_routes_add(action) {
        if (action == 'add_staff') {
            var formData = $('#add-staff').serialize();
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
                //     save_staff_name(formData);

                //   }
                // }
                // ); 

            $.confirm({
                            title:'Add Staff',
                            content:'Are you sure you want to submit?',
                            icon:'fa fa-check-circle',
                            type:'green',
                            buttons:{
                                yes:function(){
                                    save_staff_name(formData);
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