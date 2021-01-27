<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

  $(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }

    $( "#city" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "<?php echo base_url('appointment/get_patient_list'); ?>",
          type: 'post',
          dataType: "json",
          data: {
            q: request.term,request:1
          },
          success: function( data ) {
            response( data );
           // console.log(data);
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
                        $(this).val(ui.item.label)
                        var userid = ui.item.id; // selected id to input

                        // AJAX
                        $.ajax({
                            url: '<?php echo base_url('appointment/get_patient_list2'); ?>',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response2){
                                console.log(response2);
                                
                                var len = response2.length;

                                if(len > 0){
                                    var id = userid;
                                    var name = response2[0]['name'];
                                    var email = response2[0]['email'];
                                    var patient_id = response2[0]['id'];
                                    // var age = response[0]['age'];
                                    // var salary = response[0]['salary'];

                                    document.getElementById('patient_id').value = patient_id;
                                    //document.getElementById('age_'+index).value = age;
                                    document.getElementById('email').value = email;
                                    //document.getElementById('salary_'+index).value = salary;
                                    
                                }
                                
                            }
                        });

                        return false;
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });

   function toggleRadio(flag){
      if(!flag) {
        document.getElementById('patient_status').setAttribute("disabled", "true");
      } else {
        document.getElementById('patient_status').removeAttribute("disabled");
        document.getElementById('patient_status').focus();
      }
      
    }
   function togglenhis(){
      var nhis = document.getElementById("nhis");
        if (nhis.checked == true){
        document.getElementById('enrollee_type').removeAttribute("disabled");
        document.getElementById('enrollee_no').removeAttribute("disabled");
        document.getElementById('company').removeAttribute("disabled");
        document.getElementById('enrollee_type').focus();
      } else {
        document.getElementById('enrollee_type').setAttribute("disabled", "true");
        document.getElementById('enrollee_no').setAttribute("disabled", "true");
        document.getElementById('company').setAttribute("disabled", "true");
      }
      
    }

      $(document).ready(function() {
        $("#add-appointment").submit(function(e){
            e.preventDefault();
            var formData = new FormData($("#add-appointment")[0]);

            $.ajax({
                url : $("#add-appointment").attr('action'),
                dataType : 'json',
                type : 'POST',
                data : formData,
                contentType : false,
                processData : false,
                success: function(resp) {
                   // console.log(resp);
                    $('.error').html('');
                    if(resp.status == false) {
                      $.each(resp.message,function(i,m){
                          $('.'+i).text(m);
                      });
                     }
                     else {
                      swal({   
                    title: "Done",   
                    text: "Appointment has been added",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    cancelButtonText: "Cancel",
                    confirmButtonText: "Save",
                    closeOnConfirm: true 
                },
                function (isConfirm) {
                if (isConfirm) {
                              window.location = "<?php echo base_url('appointment');?>";

                  }
                }
                ); 


                     }
                }
            });
        });
    });


         ///This clears textbox on modal toggle
          function clear_textbox() {
            $('input[type=text]').each(function() {
                $(this).val('');
            });
          }

</script>