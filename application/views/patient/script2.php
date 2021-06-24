<script type="text/javascript">

    //Validate Patient

    // function validate(formData) {
    //     var returnData;
    //     $('#add-patient').disable([".action"]);
    //     $("button[title='patient']").html("Validating data, please wait...");
    //     $.ajax({
    //         url: "<?php echo base_url() . 'patient/validate_patient'; ?>",
    //         async: false,
    //         type: 'POST',
    //         data: formData,
    //         success: function(data, textStatus, jqXHR) {
    //             returnData = data;
    //         }
    //     });

    //     $('#add-patient').enable([".action"]);
    //     $("button[title='add_patient']").html("Save changes");
    //     if (returnData != 'success') {
    //         $('#add-patient').enable([".action"]);
    //         $("button[title='add_patient']").html("Save changes");
    //         $('.form-control-feedback').html('');
    //         $('.form-control-feedback').each(function() {
    //             for (var key in returnData) {
    //                 if ($(this).attr('data-field') == key) {
    //                     $(this).html(returnData[key]);
    //                 }
    //             }
    //         });
    //     } else {
    //         return 'success';
    //     }
    //     console.log(returnData);
    // }

    // function save_patient_test(formData) {
    //     $("button[title='add_patient']").html("Saving data, please wait...");
    //     //console.log(formData)
    //     $.post("<?php echo base_url() . 'patient/upload_patient'; ?>", formData).done(function(data) {
    //         console.log(data);

    //         window.location = "<?php echo base_url('patient'); ?>";
    //     });
    // }

    // function form_routes_patient(action) {
    //     if (action == 'add_patient') {
    //         var formData = $('#add-patient').serialize();
    //         if (validate(formData) == 'success') {
    //             $.confirm({
    //                 title: 'Add patient',
    //                 content: 'Are you sure you want to Save?',
    //                 icon: 'fa fa-check-circle',
    //                 type: 'green',
    //                 buttons: {
    //                     yes: function() {
    //                         save_patient_test(formData);
    //                     },
    //                     no: function() {

    //                     }
    //                 }
    //             });
    //         }
    //     } else {
    //         cancel();
    //     }
    // }

        //$(document).ready(function() {
    $("#add-patient").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($("#add-patient")[0]);

        $.ajax({
            url: $("#add-patient").attr('action'),
            dataType: 'json',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {



                $.confirm({
                    title: 'Patient Info',
                    content: 'Are you sure you want to Save?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {

                        console.log(resp);
                        $('.error').html('');
                        if (resp.status == false) {
                            $.each(resp.message, function(i, m) {
                                $('.' + i).text(m);
                            });
                        } else {

                                window.location = "<?php echo base_url('patient'); ?>";
                        }


                        },
                        no: function() {

                        }
                    }
                });


            }
        });
    });

    function delete_patient(rowIndex) {
        $.confirm({
            title: 'Discontinue Patient',
            content: 'Are you sure you want to Proceed?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/discontinue_patient'; ?>", {
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
</script>