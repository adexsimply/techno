<div class="col-12">
	<div class="card box-margin">
        <div class="card-body">
				<div class="modal-body edit-doc-profile">
                        <div class="box">
                            <div class="box-body">
                                <form>
                                    <div class="col-md-12">
                                        <div class="row text-center">
                                            <!-- Currency -->
                                            <div class="col-md-4 offset-md-4">
                                                <input type="text" class="form-control" name="search_patient" id="mySearch" style="height: 40px; border: 2px solid; border-radius: 5px; font-size:20px; text-align:center" placeholder="Enter Patient Name">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						<div class="form-group col-12">
							                            <!-- Tab panes -->
                               <div class="dataTables_wrapper no-footer" id="patientForAppointment">
                                        <style type="text/css">
                                            #js-exportable3 td {
                                                padding: .2rem;

                                            }
                                        </style>                            
                                    <div class="tab-content m-t-10 padding-0" style="max-height: 300px; overflow: scroll;">
                                        <div class="tab-pane table-responsive active show" id="All">
                                   			 <table class="table table-bordered table-striped table-hover dataTable" id="js-exportable3" style="font-size: 13px;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width: 1%;">S/N</th>
                                                        <th>IMG</th>
                                                        <th>Title</th>
                                                        <th>Patient ID</th>
                                                        <th>Patient Name</th>
                                                        <!-- <th>Blood Group</th> -->
                                                        <th>Age</th>
                                                        <th>Gender</th>
                                                        <th>Acc Status</th>
                                                        <th>Contact</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i=1;
                                                     foreach ($patients_list as $patient_list) { ?>
                                                    <tr>
                                                    	<td style="width: 1%;"><?php echo $i; ?></td>
                                                        <td><span class="list-icon"><img class="patients-img" src="<?php echo base_url('uploads/').$patient_list->patient_photo; ?>" alt=""></span></td>
                                                        <td><?php echo $patient_list->patient_title; ?></td>
                                                        <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                                        <td><?php echo $patient_list->patient_name; ?></td>
                                                        <!-- <td><?php echo $patient_list->patient_blood_group; ?></td> -->
                                                        <td><?php echo date_diff(date_create($patient_list->patient_dob ), date_create('today'))->y; ?></td>
                                                        <td><?php echo $patient_list->patient_gender; ?></td>
                                                        <td><?php echo $patient_list->patient_status ?></td>
                                                        <td><?php echo $patient_list->patient_phone; ?></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Create Appointment for <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('appointment/new_appointment2/'.$patient_list->p_id); ?>"><i class="icon-pencil" aria-hidden="true"></i>Create Appointment</button>
                                                        </td>
                                                    </tr>
                                                       <?php 
                                                       $i++;
                                                   } ?>
                                                </tbody>
                                            </table>                            
                                        </div>
                                    </div>
                            </div>
						</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
    $(document).ready(function() {


        var table = $('#js-exportable3').DataTable({
            dom: 'lrtip'
        });
        if ($('#patientForAppointment').is(':visible')) {
            $('#patientForAppointment').hide();
        }
        //$('#example_wrapper').hide();


        $('#mySearch').keyup(function() {

            if (document.getElementById('mySearch').value != '') {
                //$('#example_wrapper').removeAttr("style");
                $('#patientForAppointment').show();
                table.search($(this).val()).draw();
            } else {
                $('#patientForAppointment').hide();

            }
        });

    });


	$(function () {
    $('#js-basic-example').DataTable();

    //Exportable table
    $('#js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});



$(document).ready(function(){
        $("#search_patient").keyup(function(){
            var name = $("#search_patient").val();
            if(name == ''){
                $("#result").html('');
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'appointment/search_appointment'; ?>",
                    data: {
                        name: name
                    },
                    success: function(data) {
                        console.log(data)
                        $("#result").html(data).show()
                    }
                })
            }
        })
    })
</script>

<?php //$this->load->view('includes/footer_2'); ?>