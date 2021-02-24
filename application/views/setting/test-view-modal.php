<div class="col-12">
    <div class="card box-margin">
        <div class="card-body">
            <form id="add-test">
                <div class="col-lg-12 col-md-12 mb-3 mt-2" id="footer-links">
                    <div class="card">
                        <div class="">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#new">Add New</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#range">Range</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#parameter">Parameters</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="new">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control time12" name="name" value="<?php echo $lab_test->lab_test_name; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Group:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control time12" name="name" value="<?php echo $lab_test->lab_group_name; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-4 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Measure:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control time12" name="name" value="<?php echo $lab_test->measure; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Cost:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control time12" name="name" value="<?php echo $lab_test->cost; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="range">
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable" id="example">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Low</th>
                                                        <th>High</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($lab_test_range != null) {
                                                        $i = 1;
                                                        foreach ($lab_test_range as $range) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $range->name; ?></td>
                                                                <td><?php echo $range->low; ?></td>
                                                                <td><?php echo $range->high; ?></td>
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="parameter">
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable parameterTable" id="parameterTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Name</th>
                                                        <th>Measure</th>
                                                        <th>RangeValue</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($lab_test_parameter != null) {
                                                        $i = 1;
                                                        //var_dump($lab_test_parameter);
                                                        foreach ($lab_test_parameter as $parameter) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $parameter->name; ?></td>
                                                                <td><?php echo $parameter->measure; ?></td>
                                                                <td><?php echo $parameter->range_value; ?></td>
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>