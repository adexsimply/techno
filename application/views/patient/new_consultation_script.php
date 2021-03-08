<script type="text/javascript">

$( document ).ready(function() {
    var vital_id = $("input[name=vital_id]").val();
    var patient_id = $("input[name=patient_id]").val();
    console.log(vital_id);
       $.ajax({
      type  : 'post',
      url   : '<?php echo base_url('patient/get_prescription_by_vital_id'); ?>',
      data: {
          //status: status,
          patient_id: patient_id,
          vital_id: vital_id
        },
      async : false,
      dataType : 'json',
      success : function(response){
        console.log(response);
        var html = '';
        var i;
        var sn =1;
        for(i=0; i<response.length; i++){


          }
          $('#filtered_vitals').html(html);
        }

      });

    });

    /////Add Session form begins
    function save_consultation_name(formData) {
        $("button[title='add_consultation']").html("Saving data, please wait...");
        $.post("<?php echo base_url() . 'patient/save_consultation'; ?>", formData).done(function(data) {

            window.location = "<?php echo base_url('appointment/waiting_list'); ?>";
        });
    }

    function form_routes_consultation(action) {
        if (action == 'add_consultation') {
            var formData = $('#add-consultation').serialize();
                $.confirm({
                    title: 'Save Consultation',
                    content: 'Are you sure you want to save Consultation?',
                    icon: 'fa fa-check-circle',
                    type: 'green',
                    buttons: {
                        yes: function() {
                            save_consultation_name(formData);
                        },
                        no: function() {

                        }
                    }
                });
        } else {
            cancel();
        }
    }
    
function delete_consultation(rowIndex) {
	$.confirm({
                    title: 'Delete Consultation',
                    content: 'Are you sure you want to delete Consultation?',
                    icon: 'fa fa-check-circle',
                    type: 'red',
                    buttons: {
                        yes: function() {
							$.post("<?php echo base_url() . 'patient/delete_consultation'; ?>", {
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

    //////////////Add session form ends


</script>