<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <div class="modal-body edit-doc-profile">
                <div class="form-group col-12">
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10 padding-0">
                        <div class="tab-pane table-responsive active show" id="All">
                            <table class="table table-bordered table-striped table-hover dataTable" id="js-exportable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S/N</th>
                                        <th>IMG</th>
                                        <th>Title</th>
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Blood Group</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Acc Status</th>
                                        <th>Contact</th>
                                        <th>Appointment Date</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($appointment_list as $patient_list) {
                                        // var_dump($patient_list);
                                    ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><span class="list-icon"><img class="patients-img" src="<?php echo base_url('uploads/') . $patient_list->patient_photo; ?>" alt=""></span></td>
                                            <td><?php echo $patient_list->patient_title; ?></td>
                                            <td><span class="list-name"><?php echo $patient_list->patient_id_num; ?></span></td>
                                            <td><?php echo $patient_list->patient_name; ?></td>
                                            <td><?php echo $patient_list->patient_blood_group; ?></td>
                                            <td><?php echo date_diff(date_create($patient_list->patient_dob), date_create('today'))->y; ?></td>
                                            <td><?php echo $patient_list->patient_gender; ?></td>
                                            <td><?php echo $patient_list->patient_status ?></td>
                                            <td><?php echo $patient_list->patient_phone; ?></td>
                                            <td>
                                                <span class="list-name">
                                                    <?php $ini_date = date_create($patient_list->date_added);
                                                    echo date_format($ini_date, "D M d, Y"); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-icon btn-pure btn-success on-default m-r-5 button-edit" onclick="shiNew(event)" data-type="purple" data-size="m" data-title="Take Vital for <?php echo $patient_list->patient_name; ?>" href="<?php echo base_url('nursing/take_vital/' . $patient_list->p_id); ?>">Take Vital</button>
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
<script type="text/javascript">
    $(function() {
        $('#js-basic-example').DataTable();

        //Exportable table
        $('#js-exportable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<?php //$this->load->view('includes/footer_2'); 
?>