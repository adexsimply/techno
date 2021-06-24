<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-assessment').disable([".action"]);
        $("button[title='add_assessment']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'assessment/validate_assessment'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });



        $('#add-assessment').enable([".action"]);
        $("button[title='add_assessment']").html("Save changes");
        if (returnData != 'success') {
            $('#add-assessment').enable([".action"]);
            $("button[title='add_assessment']").html("Save changes");
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
    }

    ////Function to show form for session editing
    function get_question_data(idr) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('assessment/get_question_details') ?>',
            dataType: 'json',
            data: {
                id: idr
            },
            success: function(data) {
                console.log(data);
                var question = data[0].question;
                var option1 = data[0].option1;
                var option2 = data[0].option2;
                var option3 = data[0].option3;
                var option4 = data[0].option4;
                var answer = data[0].answer;

                $('[name="question"]').val(question);
                $('[name="option1"]').val(option1);
                $('[name="option2"]').val(option2);
                $('[name="option3"]').val(option3);
                $('[name="option4"]').val(option4);
                $('[name="answer"]').val(answer);
                $('[name="question_id"]').val(idr);
            }
        });
    }



    /////Add Session form begins

    function update_question(formData) {
        $("button[title='update_question']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'assessment/update_question'; ?>", formData).done(function(data) {

            //location.reload();

            window.location = "<?php echo base_url() . 'assessment/view_questions/' . $this->uri->segment(3); ?>";
            // console.log(data);

        });
    }

    $(document).ready(function() {
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
                    // console.log(resp);
                    $('.error').html('');
                    if (resp.status == false) {
                        $.each(resp.message, function(i, m) {
                            $('.' + i).text(m);
                        });
                    } else {


                        swal("Done", "Patient has been added", "success").then(function() {
                            window.location = "<?php echo base_url('patient'); ?>";
                        })



                    }
                }
            });
        });
    });


    //$(document).ready(function() {
    $("#add-patient-history").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($("#add-patient-history")[0]);

        $.ajax({
            url: $("#add-patient-history").attr('action'),
            dataType: 'json',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                console.log(resp);
                $('.error').html('');
                if (resp.status == false) {
                    $.each(resp.message, function(i, m) {
                        $('.' + i).text(m);
                    });
                } else {


                    swal("Done", "Patient history has been added", "success").then(function() {
                        window.location = "<?php echo base_url('patient/view/') . $this->uri->segment(3); ?>";
                    })



                }
            }
        });
    });
    //});


    //Validate Patient

    function validate_patient(formData) {
        var returnData;
        $('#add-patient').disable([".action"]);
        $("button[title='patient']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'patient/validate_patient'; ?>",
            async: false,
            type: 'POST',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                returnData = data;
            }
        });

        $('#add-patient').enable([".action"]);
        $("button[title='add_patient']").html("Save changes");
        if (returnData != 'success') {
            $('#add-patient').enable([".action"]);
            $("button[title='add_patient']").html("Save changes");
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

    function save_patient_test(formData) {
        $("button[title='add_patient']").html("Saving data, please wait...");
        //console.log(formData)
        $.post("<?php echo base_url() . 'patient/save_patient'; ?>", formData).done(function(data) {
            console.log(data);

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_patient(action) {
        if (action == 'add_patient') {
            var formData = $('#add-patient').serialize();
            console.log(formData);
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Add patient',
                    content: 'Are you sure you want to Save?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_patient_test(formData);
                        },
                        no: function() {

                        }
                    }
                });
            }
        } else {
            cancel();
        }
    }

    function delete_patient(rowIndex) {
        $.confirm({
            title: 'Delete patient Test',
            content: 'Are you sure you want to delete patient Test?',
            icon: 'fa fa-check-circle',
            type: 'red',
            buttons: {
                yes: function() {
                    $.post("<?php echo base_url() . 'patient/delete_patient_test'; ?>", {
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