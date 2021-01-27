<script type="text/javascript">

/////Add Session form begins
    function validate(formData) {
        var returnData;
        $('#add-assessment').disable([".action"]);
        $("button[title='add_assessment']").html("Validating data, please wait...");
        $.ajax({
            url: "<?php echo base_url() . 'assessment/validate_assessment'; ?>", async: false, type: 'POST', data: formData,
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
          url: '<?php echo base_url('assessment/get_question_details')?>',
          dataType : 'json',
          data: {id: idr},
          success: function(data){
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

          window.location = "<?php echo base_url().'assessment/view_questions/'.$this->uri->segment(3); ?>";
           // console.log(data);

        });
    }

      $(document).ready(function() {
        $("#add-patient").submit(function(e){
            e.preventDefault();
            var formData = new FormData($("#add-patient")[0]);

            $.ajax({
                url : $("#add-patient").attr('action'),
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


                            swal("Done", "Patient has been added", "success").then(function (){
                              window.location = "<?php echo base_url('patient');?>";
                             })



                     }
                }
            });
        });
    });


      //$(document).ready(function() {
        $("#add-patient-history").submit(function(e){
            e.preventDefault();
            var formData = new FormData($("#add-patient-history")[0]);

            $.ajax({
                url : $("#add-patient-history").attr('action'),
                dataType : 'json',
                type : 'POST',
                data : formData,
                contentType : false,
                processData : false,
                success: function(resp) {
                    console.log(resp);
                    $('.error').html('');
                    if(resp.status == false) {
                      $.each(resp.message,function(i,m){
                          $('.'+i).text(m);
                      });
                     }
                     else {


                            swal("Done", "Patient history has been added", "success").then(function (){
                              window.location = "<?php echo base_url('patient/view/').$this->uri->segment(3);?>";
                             })



                     }
                }
            });
        });
    //});

</script>