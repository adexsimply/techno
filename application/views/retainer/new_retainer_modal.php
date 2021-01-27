<div class="col-12">
	<div class="card box-margin">
        <div class="card-body">
			<form id="add-patient" action="<?php echo base_url('patient/upload_patient'); ?>" method="post" enctype="multipart/form-data">
				
				<div class="col-lg-12 col-md-12">

					<fieldset>

						<div class="form-row mt-2">
							<div class="form-group col-md-6">
							  	<label for="docName">Name</label><span style="color: red">*</span>
							  	<input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Name">
								<span style="color:#ff0000;" class="error patient_name"></span>


							  	<label for="docName">Contact</label>
							  	<input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Enter Name">
								<span style="color:#ff0000;" class="error patient_tribe"></span>

							</div>
							<div class="form-group col-md-6">
							  	<label for="docEmail">Address</label><span style="color: red">*</span>
							  	<textarea rows="4" class="form-control" id="patient_address" name="patient_address">
							  		
							  	</textarea>
								<span style="color:#ff0000;" class="error patient_other_names"></span>
							</div>
						</div>
						<div class="form-row mt-2">
							<div class="form-group col-md-6">
							  	<label for="docEmail">Phone Number</label>
							  	<input type="text" class="form-control" id="patient_phone" name="patient_phone" placeholder="Enter Number">
								<span style="color:#ff0000;" class="error patient_phone"></span>
								
							</div>
							<div class="form-group col-md-6">
							  	<label for="docEmail">Email Address</label>
							  	<input type="email" class="form-control" id="patient_email" name="patient_email" placeholder="Enter Email Address">
							</div>
						</div>
						<div class="form-row mt-2">
							<div class="form-group col-md-4">
							  	<label for="docName">Bill Group</label>
								<select class="form-control" name="bill_group" id="exampleFormControlSelect4">
									<option value="">Select</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
								</select>
								<span style="color:#ff0000;" class="error bill_group"></span>
							</div>

							<div class="form-group col-md-8">
							  	<label for="docpassword">Contract Date</label>
								<div class="input-group date" id="casedatepicker1" data-target-input="nearest">
									<div class="input-group-append" data-target="#casedatepicker1" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
									<input type="date" name="patient_dob" class="form-control datetimepicker-input"/>
								</div>
								<span style="color:#ff0000;" class="error patient_dob"></span>
							</div>
						</div>
					</fieldset>

					
					<div class="d-flex justify-content-end">
						<input type="submit" title="add_patient" class="btn btn-primary px-4 m-2" value="Submit">
					</div>

				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/webcam.js"></script>
 <!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	$('#blah').show();
            	$('#results').hide();

                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
       // console.log($('#user_image').val());
    }
</script>
									
<script type="text/javascript">    

	function take_snapshot2(){
	//Hide Button
	$('#openCamera').hide();
	$('#takeSnapshot').show();
	$('#user_image').val('');
	$('#blah').hide();


    Webcam.set({
        width: 250,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 360
    });
    Webcam.attach( '#my_camera' );
	}

    function take_snapshot() {
	$('#user_image').val('');
	$('#blah').hide();
    $('#results').show();
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            
                
            Webcam.upload( data_uri, '<?php echo base_url('patient/webcam') ?>', function(code, text) {
                document.getElementById('results').innerHTML =

                '<img src="'+text+'"/>';
                $('[name="image_path"]').val(text);

            } );    
        } );
    }
	
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
</script>