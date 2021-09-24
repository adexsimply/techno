<style type="text/css">
  .my-card
    {
        position:absolute;
        //left:40%;
        top:-20px;
        border-radius:50%;
    }
    .accordion .card-header .btn {
      padding: 5px 10px;
      font-size: 13px;
    }
    .card {
      margin-bottom: 5px;
      margin-top: 0px;
    }
    .ui-dialog .ui-dialog-content {
    padding: 0;
    margin: 0;
    }​
    .mt-3, .my-3 {
        /* margin-top: 1rem!important; */
    }
    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: .7rem;
    }.p-3 {
        padding: .3rem!important;
    }
    p {
      margin-bottom: 1px;
    }
    .card-body .active {
      background-color: #f4f7f6;
    }
    /*Table resizing*/
    .tab-content {
      padding: 10px 0px 0px 0px;
    }
    .tab-content thead th, .tab-content tbody td {
      font-size: 0.89em;
      padding: 1px !important;
      height: 15px;
    }
</style>
<div class="container" style="min-height: 400px;">
    <div class="row">
        <div class="col-3" style="min-height: 400px;">

              <div class="accordion" id="accordionExample">
                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;" onclick="openFirst()">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Documents
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="nav card-body">

                          <a class="card" data-toggle="tab" href="#generalConsultation">
                              <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url() ?>assets/img/icons/client.png" ></h4></div>
                              <div class="text-info text-center mt-2"><p>General Consultation</p></div>
                          </a>

                          <a class="card" data-toggle="tab" href="#anc">
                              <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url() ?>assets/img/icons/pregnant.png" ></h4></div>
                              <div class="text-info text-center mt-2"><p>ANC</p></div>
                          </a>

                          <a class="card" data-toggle="tab" href="#ward_notes">
                              <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url() ?>assets/img/icons/medical-room.png" ></h4></div>
                              <div class="text-info text-center mt-2"><p>Ward Round Notes</p></div>
                          </a>

                          <a class="card" data-toggle="tab" href="#documentation">
                              <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url() ?>assets/img/icons/document.png" ></h4></div>
                              <div class="text-info text-center mt-2"><p>Initial Documentation</p></div>
                          </a>



                    </div>
                  </div>
                </div>



                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;" onclick="openSecond()">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Other&nbsp;Documents
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="nav card-body">

                        
                          <a class="card" data-toggle="tab" href="#med_report">
                              <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/medical-report.png" ></h4></div>
                              <div class="text-info text-center mt-2"><p>Med. Reports</p></div>
                          </a>

                      <a class="card" data-toggle="tab" href="#pdf_files">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/pdf-file.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>PDF Files</p></div>
                        </a>
                     

                      <a class="card" data-toggle="tab" href="#images">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/image-gallery.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Images</p></div>
                      </a>

                      <a class="card" data-toggle="tab" href="#indexing">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/list-2.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Indexing & Coding</p></div>
                     </a>

                    </div>
                  </div>
                </div>

                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;" onclick="openThird()">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Requests
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">

                      <a class="card" data-toggle="tab" href="#laboratory">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/microscope.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Laboratory</p></div>
                     </a>

                      <a class="card" data-toggle="tab" href="#radiology">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/x-rays.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Radiology</p></div>
                      </a>

                      <a class="card" data-toggle="tab" href="#prescriptions">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/prescription.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Prescriptions</p></div>
                      </a>

                      <a class="card" data-toggle="tab" href="#procedures">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/gear.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Procedures</p></div>
                      </a>

                    </div>
                  </div>
                </div>

                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;" onclick="openFourth()">
                  <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Billing
                      </button>
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">

                      <a class="card" data-toggle="tab" href="#bills">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/bill.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Bills</p></div>
                     </a>

                    </div>
                  </div>
                </div>

                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;" onclick="openFifth()">
                  <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Nursing Charts
                      </button>
                    </h2>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">

                      <a class="card" data-toggle="tab" href="#treatment">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/first-aid-kit.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Treatment Chart</p></div>
                      </a>

                      <a class="card" data-toggle="tab" href="#observation">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/monitoring.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Observation Chart</p></div>
                      </a>

                      
                      <a class="card" data-toggle="tab" href="#fluid_balance">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/fluid.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Fluid Balance</p></div>
                      </a>

                      <a class="card" data-toggle="tab" href="#daily_report">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/medical-history.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Daily Report</p></div>
                      </a>

                    </div>
                  </div>
                </div>

                <div class="card0" style="border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; " onclick="openSixth()">
                  <div class="card-header" id="headingNurseOthers">
                    <h2 class="mb-0">
                      <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNurseOthers" aria-expanded="false" aria-controls="collapseNurseOthers">
                        Nursing Others
                      </button>
                    </h2>
                  </div>
                  <div id="collapseNurseOthers" class="collapse" aria-labelledby="headingNurseOthers" data-parent="#accordionExample">
                    <div class="card-body">

                      <a class="card" data-toggle="tab" href="#diet">
                          <div class="text-info text-center mt-3"><h4><img class="img-responsive rounded-circle" style="max-height: 40px; max-width: 40px; background-color:#D8D8D8;" src="<?php echo base_url(); ?>assets/img/icons/apple.png" ></h4></div>
                          <div class="text-info text-center mt-2"><p>Diet</p></div>
                      </a>

                    </div>
                  </div>
                </div>

              </div>
        </div>


        <div class="col-9" style="border:1px solid #D8D8D8;">
            <div class="tab-content" id="firstTab">
                <div class="tab-pane show active" id="Home">
                </div>
                <div class="tab-pane fade" id="generalConsultation">
                    <?php $this->load->view('nursing/inpatient/main/general_consultation') ?>
                </div>
                <div class="tab-pane fade" id="anc">
                    <?php $this->load->view('nursing/inpatient/main/anc') ?>
                </div>
                <div class="tab-pane fade" id="ward_notes">
                    <?php $this->load->view('nursing/inpatient/main/ward_notes') ?>
                </div>
                <div class="tab-pane fade" id="documentation">
                    <?php $this->load->view('nursing/inpatient/main/documentation') ?>
                </div>
            </div>


            <div class="tab-content" id="secondTab">


                <div class="tab-pane" id="med_report">
                    <?php $this->load->view('nursing/inpatient/main/med_report') ?>

                </div>
                <div class="tab-pane" id="pdf_files">
                  <h1>PDF Files</h1>

                </div>
                <div class="tab-pane" id="images">
                  <h1>Imaging</h1>

                </div>
                <div class="tab-pane" id="indexing">
                  <h1>Indexing</h1>
                </div>
            </div>


            <div class="tab-content" id="thirdTab">


                <div class="tab-pane" id="laboratory">
                  <h1>Laboratory</h1>

                </div>
                <div class="tab-pane" id="radiology">
                  <h1>Radiology</h1>

                </div>
                <div class="tab-pane" id="prescriptions">
                  <h1>Prescriptions</h1>

                </div>
                <div class="tab-pane" id="procedures">
                  <h1>Procedures</h1>
                </div>


            </div>

            <div class="tab-content" id="fourthTab">
                <div class="tab-pane" id="bills">
                  <h1>Bills</h1>

                </div>
            </div>


            <div class="tab-content" id="fifthTab">
                <div class="tab-pane" id="treatment">
                  <h1>Treatment Chart</h1>

                </div>
                <div class="tab-pane" id="observation">
                  <h1>Observation</h1>

                </div>
                <div class="tab-pane" id="fluid_balance">
                  <h1>Fluid Balance</h1>

                </div>
                <div class="tab-pane" id="daily_report">
                  <h1>Daily Report</h1>
                </div>
            </div>


            <div class="tab-content" id="sixthTab">
                <div class="tab-pane" id="diet">
                  <h1>Diet</h1>

                </div>
            </div>



        </div>
    </div>
</div>
<!-- Javascript in script.php -->
