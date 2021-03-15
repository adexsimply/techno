<div class="tab-pane" id="prescription" style="min-height: 300px;">
<?php //var_dump($patient); ?>
<input hidden="" type="text" id="patient_id2" value="<?php echo $patient->patient_id; ?>" name="">
<input hidden="" type="text" id="vital_id" value="<?php echo $patient->vital_id; ?>" name="">
    <?php //if ($patient->appointment_id != NULL && $prescriptions == Null) { ?>
        <button class="btn btn-warning m-b-15 m-t-15" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="" data-title="Prescription for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/add_prescription/' . $patient->vital_id) ?>">
            <i class="fa fa-plus-circle"></i> Add New Prescription
        </button>
    <?php //} ?>
    <table class="table m-b-0 table-hover">
        <thead class="thead-warning">
            <tr>
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tr>
        </thead>
        <tbody id="prescriptionsList">
       <!--      <?php $i = 1;
            foreach ($prescriptions as $prescription) { ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><span class="list-name"><?php echo date('jS \of F Y', strtotime($prescription->date_added)) ?></span></td>
                    <td><span class="list-name"><?php echo date('h:i:sa', strtotime($prescription->date_added)) ?></span></td>
                    <td><span class="list-name">
                            <?php if ($prescription->status == "Pending") { ?>
                                <span class="badge badge-warning"><?php echo $prescription->status ?></span>
                            <?php } else if ($prescription->status == "Treated") { ?>
                                <span class="badge badge-success"><?php echo $prescription->status ?></span>
                            <?php } else if ($prescription->status == "Prescription") { ?>
                                <span class="badge badge-primary"><?php echo $prescription->status ?></span>
                            <?php } ?>
                    </td>
                    <td>
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription2/' . $prescription->prescription_unique_id) ?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                       <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription/' . $prescription->prescription_unique_id) ?>">
																			<i class="fa fa-pencil"></i>
																		</button>
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="View prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/view_prescription/' . $prescription->prescription_unique_id) ?>">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-dark" type="button" onclick="delete_prescription(<?php echo $prescription->prescription_unique_id ?>)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?> -->
        </tbody>
    </table>
</div>

<script type="text/javascript">
    listDefaultPrescriptionByPatient(); 
    
function listDefaultPrescriptionByPatient() {
    var patient_id = document.getElementById('patient_id2').value;
    var vital_id = document.getElementById('vital_id').value;
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
       // console.log(response)
        var html = '';
        var i;
        var sn =1;
       for(i=0; i<response.length; i++){

        //Badge colors
         if (response[i].status == "Pending") { 
            var status = '<span class="badge badge-warning">'+ response[i].status +'</span>'
        }
            else if (response[i].status == "Treated") {
                var status = '<span class="badge badge-success">'+ response[i].status +'</span>'
            }
            else if (response[i].status == "Prescription") {
                var status = '<span class="badge badge-primary">'+ response[i].status +'</span>'
            }

            var buttons = '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="Prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription2/'); ?>' + response[i].prescription_unique_id+ '"> <i class="fa fa-pencil"></i> </button>'+' '+
                '<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="l" data-title="View prescription Test for <?php echo $patient->patient_name; ?>" href="<?php echo base_url('patient/edit_prescription2/'); ?>' + response[i].prescription_unique_id+ '">  <i class="fa fa-eye"></i></button>'+' '+
                '<button class="btn btn-dark" type="button" onclick="delete_prescription('+ response[i].prescription_unique_id+ ')"> <i class="fa fa-trash"></i></button>'

            html += '<tr id="'+ response[i].prescription_unique_id +'"><td>' + sn++ + '</td> <td>' + response[i].appointment_date +
              '</td> <td>' + response[i].appointment_time +
              '</td> <td>' + status +
              //'</td><td>' + vital_status +
              '</td><td>' + buttons + '</td> </tr>';
         }
          $('#prescriptionsList').html(html);
        }

      });

    }
</script>