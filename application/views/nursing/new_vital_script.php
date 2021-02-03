<script type="text/javascript">
    /////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-vital').disable([".action"]);
        $("button[title='add_vital']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'nursing/validate_new'; ?>",
            async: false,
            type: 'POST',
            enctype: 'multipart/form-data',
            data: formData,
            success: function(data, textStatus, jqXHR) {
                // console.log(data);
                returnData = data;
            }
        });



        $('#add-vital').enable([".action"]);
        $("button[title='add_vital']").html("Save vital");
        if (returnData != 'success') {
            $('#add-vital').enable([".action"]);
            $("button[title='add_vital']").html("Save vital");
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

    function save_vital_name(formData) {
        $("button[title='add_vital']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'nursing/add_vital'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('nursing/vitals'); ?>";
        });
    }

    function form_routes_vital(action) {
        if (action == 'add_vital') {
            var formData = $('#add-vital').serialize();
            // console.log(formData)
            if (validate(formData) == 'success') {
                $.confirm({
                    title: 'Save Vital',
                    content: 'Are you sure you want to save vital?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_vital_name(formData);
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
    //////////////Add session form ends

    //Number only
    jQuery('.numbersOnly').keyup(function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });

    $('.bp_input_tag').keyup(function() {
        var foo = $(this).val().split("/").join(""); // remove hyphens  if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,2}', 'g')).join("/");
        $(this).val(foo);
    }, );

    function weight_not_empty() {
        document.getElementById('error-h').innerHTML = "";
    }

    function not_empty() {
        var weight = document.getElementById('weight2').value;
        if (weight == '') {
            document.getElementById('height2').value = '';
            document.getElementById('error-h').innerHTML = "Weight field needs to be filled first";
            return false;
        } else if (weight !== null && weight !== '') {
            document.getElementById('error-h').innerHTML = "";
            return true;
        }
    }

    function calc_bmi() {
        var weight = document.getElementById('weight2').value;
        var height = document.getElementById('height2').value;

        if ((weight !== null && weight !== '') && (height !== null && height !== '')) {

            var bmi = (weight / (Math.pow(height, 2))).toFixed(2);
            if (bmi < 18.5) {
                var bmi_remark = "Underweight";
            } else if (bmi > 18.5 && bmi < 25) {
                var bmi_remark = "Normal";
            } else if (bmi >= 25 && bmi < 30) {
                var bmi_remark = "Overweight";
            } else if (bmi >= 30 && bmi < 40) {
                var bmi_remark = "Obese";
            } else if (bmi >= 40) {
                var bmi_remark = "Extremly Obese";
            } else {

                var bmi_remark = "Error";
            }


            $('#bmi2').val(bmi);
            $('#bmi_remark2').val(bmi_remark);

            // console.log(bmi);
        }
    }

    /////

    ////Function to show form for session editing
    function get_ega_edd() {

        var lmp = document.getElementById('LMP2').value;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . 'nursing/get_ega_edd'; ?>',
            dataType: 'json',
            data: {
                lmp: lmp
            },
            success: function(data) {
                // console.log(data);
                //return data;

                $('#ega').val(data.ega);
                $('#edd').val(data.edd);


            }
        });

    }
</script>