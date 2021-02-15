<div class="col-12 mb-5" style="padding-bottom:3rem">
    <div class="tab-content">
        <?php $this->load->view('patient/consultation/consultation'); ?>
        <?php $this->load->view('patient/consultation/rad_results'); ?>
        <?php $this->load->view('patient/consultation/lab_results'); ?>
        <?php $this->load->view('patient/consultation/pres_hxs'); ?>
        <?php $this->load->view('patient/consultation/general_exam'); ?>
        <?php $this->load->view('patient/consultation/vital_signs'); ?>
        <?php $this->load->view('patient/consultation/diagnosis'); ?>
        <?php $this->load->view('patient/consultation/follow_up'); ?>
        <?php $this->load->view('patient/consultation/pdf_docs'); ?>
        <?php $this->load->view('patient/consultation/prescription'); ?>
        <?php $this->load->view('patient/consultation/lab_investigation'); ?>
        <?php $this->load->view('patient/consultation/rad_investigation'); ?>


    </div>


</div>

<style type="text/css">
    #footer-links {
        overflow: hidden;
        position: fixed;
        bottom: 40px;
        width: 93%;
    }

    .nav-tabs>li>a {
        font-weight: 300;
        font-size: 15px;
    }

    .nav-link {
        padding: .1rem .7rem;
    }
</style>

<div class="col-lg-12" id="footer-links">
    <div class="card">
        <div class="body">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#consultation">Consultation</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rad_results">Rad Results</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#lab_results">Lab Results</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pres_hxs">Pres Hxs</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#general_exam">General Medical Exams</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vital_signs">Vital Signs</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#diagnosis">Diagnosis</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#follow_up">Follow-up</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pdf_docs">PDF Docs</a></li>
            </ul>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prescription"><i class="fa fa-home"></i> Prescription</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#lab_investigation"><i class="fa fa-user"></i> Lab Investigation</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rad_investigation"><i class="fa fa-vcard"></i> Radiological Investigation</a></li>
            </ul>
        </div>
    </div>
</div>


<?php $this->load->view('patient/new_consultation_script'); ?>