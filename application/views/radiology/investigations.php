<?php $this->load->view('includes/head_2'); ?>
<?php $this->load->view('includes/sidebar') ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Lab Test</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2>Investigations</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <button class="btn btn-info m-b-15" type="button" data-toggle="modal" data-target="#takeVitals78" onclick="shiNew(event)" data-type="black" data-size="s" data-title="Add New" href="<?php echo base_url('radiology/add_investigation') ?>">
                            <i class="icon wb-plus" aria-hidden="true"></i> Add New
                        </button>
                        <!-- Tab panes -->
                        <div class="tab-content m-t-10 padding-0">
                            <div class="tab-pane table-responsive active show" id="All">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="radiologyInvestigationTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Item Name</th>
                                            <th>Cost</th>
                                            <th>Subgroup</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //var_dump($doctors_list);
                                        $i = 1;
                                        foreach ($radiology_investigation_list as $radiology_investigation) {
                                            //var_dump($operation);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $radiology_investigation->Name; ?></span></td>
                                                <td><?php echo $radiology_investigation->service_charge_cost; ?></td>
                                               <!--  <td><input type="checkbox" name=""></td> -->
                                                <td><?php echo $this->radiology_m->get_subgroup_name($radiology_investigation->ChargeSubGroupID)->Name ?></td>
                                                <td>
                                                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#takeVitals" onclick="shiNew(event)" data-type="black" data-size="m" data-title="Edit <?php echo $radiology_investigation->Name; ?>" href="<?php echo base_url('radiology/add_investigation/' . $radiology_investigation->id) ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-dark" type="button" onclick="delete_investigation(<?php echo $radiology_investigation->id ?>)">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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

<?php $this->load->view('radiology/script'); ?>
<?php $this->load->view('includes/footer_2'); ?>
<script type="text/javascript">
    
     var radiologyInvestigationTable =  $('#radiologyInvestigationTable').DataTable({
            //"lengthChange": false
        });

</script>