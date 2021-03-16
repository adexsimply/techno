<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Prescription Request</h2>
                    </div>            
                </div>
            </div>
            <button onclick="toggle_confirm()">Toggggg</button>
            <button onclick="confirm3()">Toggggg</button>
        </div>
    </div>
    
<script type="text/javascript">
    function confirm3 () {
        $.confirm({
    title: 'Confirm!',
    content: 'Simple confirm!',
    buttons: {
        confirm: function () {
            $.alert('Confirmed!');
        },
        cancel: function () {
            $.alert('Canceled!');
        },
        somethingElse: {
            text: 'Something else',
            btnClass: 'btn-blue',
            keys: ['enter', 'shift'],
            action: function(){
                $.alert('Something else?');
            }
        }
    }
});
    }
    function toggle_confirm () {

                            $.confirm({
                                title: 'Prompt!',
                                columnClass:'xl',
                                content: '' +
                                '<form action="" id="add-role" class="formName">' +
                                '<div class="form-group">' +
                                '<label>Enter something here</label>' +
                                '<input type="text" placeholder="Your name" name="role_name" class="name form-control" required />' +
                                '<code style="color: #ff0000;" class="form-control-feedback" data-field="role_name"></code>'+
                                '</div>' +
                                '</form>',
                                buttons: {
                                    formSubmit: {
                                        text: 'Submit',
                                        btnClass: 'btn-blue',
                                        action: function () {

                                             var formData = $('#add-role').serialize();

                                                        var returnData;

                                             validate(formData);
                                                    function validate(formData) {
                                                        // $('#add-role').disable([".action"]);
                                                        // $("button[title='add_role']").html("Validating data, please wait...");
                                                        $.ajax({
                                                            url: "<?php echo base_url() . 'role/validate_role_name'; ?>", async: false, type: 'POST', data: formData,
                                                            success: function(data, textStatus, jqXHR) {
                                                                returnData = data;
                                                                console.log(returnData);
                                                            }
                                                        });



                                                        //$('#add-role').enable([".action"]);
                                                       // $("button[title='add_role']").html("Save changes");
                                                        if (returnData != 'success') {
                                                           // $('#add-role').enable([".action"]);
                                                            //$("button[title='add_role']").html("Save changes");
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
                                                    if (returnData != 'success') {
                                                        // $.confirm({
                                                        //         title: 'Confirm!',
                                                        //         content: 'Simple confirm!',
                                                        //         buttons: {
                                                        //             confirm: function () {
                                                        //                 $.alert('Confirmed!');
                                                        //             },
                                                        //             cancel: function () {
                                                        //                 $.alert('Canceled!');
                                                        //             },
                                                        //             somethingElse: {
                                                        //                 text: 'Something else',
                                                        //                 btnClass: 'btn-blue',
                                                        //                 keys: ['enter', 'shift'],
                                                        //                 action: function(){
                                                        //                     $.alert('Something else?');
                                                        //                 }
                                                        //             }
                                                        //         }
                                                        //     });
                                                        return false
                                                    }
                                                    else {

                                                $.post("<?php echo base_url() . 'role/add_role_name'; ?>", formData).done(function(data) {

                                                    //window.location = "<?php echo base_url('role'); ?>";
                                                });
                                                    }

                                            //$("button[title='add_role']").html("Saving data, please wait...");


                                                  
                                                    //return false
                                        }
                                    },
                                    cancel: function () {
                                        //close
                                        //return false;
                                    },
                                },

                                  onAction: function (formSubmit33) {
                                     alert('onAction: ' + formSubmit33);
                                            // when a button is clicked, with the button name
                                    $.alert({
                                                            title: 'Alert!',
                                                            content: 'Simple alert!',
                                                        });
                                        },
                                // onClose: function () {  
                                // },
                                onContentReady: function () {
                                    // bind to events
                                    var jc = this;
                                    this.$content.find('form').on('submit', function (e) {

                                        // if the user submits the form by pressing enter in the field.
                                        e.preventDefault();
                                        jc.$$formSubmit.trigger('click'); // reference the button and click it
                                    });
                                }
                            });
//     $.confirm({
//     closeIcon: true, // explicitly show the close icon
//     buttons: {
//         buttonA: {
//             text: 'button a',
//             action: function (buttonA) {
//                 this.buttons.resetButton.setText('reset button!!!');
//                 this.buttons.resetButton.disable();
//                 this.buttons.resetButton.enable();
//                 this.buttons.resetButton.hide();
//                 this.buttons.resetButton.show();
//                 this.buttons.resetButton.addClass('btn-red');
//                 this.buttons.resetButton.removeClass('btn-red');
//                 // or
//                 this.$$resetButton // button's jquery element reference, go crazy
//                 this.buttons.buttonA == buttonA // both are the same.
//                 return false; // prevent the modal from closing
//             }
//         },
//         resetButton: function (resetButton) {
//         }
//     }
// });

    }
</script>
<?php $this->load->view('includes/footer_2'); ?>