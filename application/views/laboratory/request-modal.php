<!-- Add new history Modal -->
    <div class="modal fade" id="requestResult" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
        <form id="add-appointment" action="<?php echo base_url('appointment/add_appointment'); ?>" method="post">   
                <div class="modal-header">
                    <h6 class="modal-title text-primary">Requests Result -  Janet Jackson</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body edit-doc-profile">   


                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <b>Date</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input type="date" class="form-control date" placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <b>Hospital Number</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Diagnosis</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time24" disabled="" placeholder="ANTE-NATAL">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <b>Name</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" disabled="" placeholder="Janet Jackson">
                                        </div>
                                        <b>Specimen Collected By</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control time12" disabled="" placeholder="Doctor Drake">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12" style="height: 140px; overflow: scroll;">
                                        <h6>Specimens Used</h6>
                                        <?php foreach ($lab_specimens_list as $lab_specimen) { ?>
                                        <div class="fancy-checkbox">
                                            <label><input type="checkbox"><span><?php echo $lab_specimen->specimen_name; ?></span></label>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-6">
                                        <b>Anesthesia</b>
                                        <div class="input-group mb-3">
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="">Select</option>
                                                <?php foreach($doctors_list as $doctor) { ?>
                                                <option value="<?php echo $doctor->user_id; ?>"><?php echo $request_destinations->request_destination_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> -->

                       
                                </div> 
                                <hr>
                                <h5>Investigation  Required</h5>
                                <hr>
                                <div class="body" style="height: 210px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-hover js-basic-example dataTable table-custom">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Test Name</th>
                                                    <th>Test Done By</th>
                                                    <th>Result Entry By</th>
                                                    <th>Time Requested</th>
                                                    <th>Time Treated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">Test Results</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">Notes(Histology, Cytology etc_</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="Home">

                                <div class="body" style="height: 210px; overflow: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Test</th>
                                                    <th>Result</th>
                                                    <th>Measure</th>
                                                    <th>Range</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane" id="Profile">
                                   
                                </div>
                                <div class="tab-pane" id="Contact">
                                 
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <input type="submit" title="add_appointment" class="btn btn-primary px-4 m-2" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>