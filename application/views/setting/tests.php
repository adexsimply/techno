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
                            <h2>Lab Tests</h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#labTest" onclick="clear_textbox()">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add Test
                            </button>

<!-- 
                <td><input type='text' class='name' id='name' ></td>
                <td><input type='text' class='email' id='email' ></td> -->
 
                            <!-- Tab panes -->
                            <div class="tab-content m-t-10 padding-0">
                                <div class="tab-pane table-responsive active show" id="All">
                           			 <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Test Name</th>
                                                <th>Range Value</th>
                                                <th>Measure</th>
                                                <th>Discontinue</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //var_dump($doctors_list);
                                            $i=1;
                                             foreach ($lab_test_list as $lab_test) { 
                                                //var_dump($operation);
                                                ?>
                                            <tr>
                                            	<td><?php echo $i; ?></td>
                                                <td><span class="list-name"><?php echo $lab_test->lab_test_name;?></span></td>
                                                <td><?php echo $lab_test->range_value; ?></td>
                                                <td><?php echo $lab_test->measure; ?></td>
                                                <td><input type="checkbox" name=""></td>
                                                <td><?php echo $lab_test->lab_group_name; ?></td>
                                                <td><span class="badge badge-success"><a href="#" data-toggle="modal" data-target="#admission" onclick="clear_textbox()">Delete</a></span></td>
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
    
<?php $this->load->view('setting/test-modal'); ?>
<?php $this->load->view('includes/footer_2'); ?>
<?php $this->load->view('setting/script'); ?>