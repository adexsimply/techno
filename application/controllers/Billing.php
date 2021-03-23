<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		
		parent::__construct();

		$this->load->model('department_m');
        $this->load->model('nursing_m');
        $this->load->model('staff_m');
        $this->load->model('request_m');
        $this->load->model('drug_m');
        $this->load->model('patient_m');
        $this->load->model('setting_m');
        $this->load->model('billing_m');
        $this->data['menu_id'] = 'billing';

	}



    public function payment ()
    {   
        $this->data['title'] = 'Payment List';
        $this->data['payment_list'] =  $this->billing_m->get_patient_payment();
        $this->data['patient_billings'] =  $this->patient_m->get_patient_billings(9);
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('billing/payment', $this->data);

    }
    public function receipt ()
    {   
        $this->data['title'] = 'Payment List';
        $this->data['payment_list'] =  $this->billing_m->get_patient_payment();
        $this->data['patient_billings'] =  $this->patient_m->get_patient_billings(9);
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('billing/receipt', $this->data);

    }

    public function cash_payment()
    {


        if ($this->uri->segment(3)) {

            $this->data['patient_invoice'] = $this->billing_m->get_patient_billings_by_invoice($this->uri->segment(3));

            $patient_id = $this->billing_m->get_patient_id_from_invoice($this->uri->segment(3));

            $this->data['patient_details'] = $this->patient_m->get_patient_by_id($patient_id->patient_id);
        }
        $this->load->view('billing/payment_modal', $this->data);
    }


    public function get_payment_list_default()
    {
        $payment_list = $this->billing_m->get_patient_payment();
        echo json_encode($payment_list);
    }
    public function get_payment_list_filtered()
    {
        $payment_list = $this->billing_m->get_patient_payment_filtered();
        echo json_encode($payment_list);
    }
    public function get_payment_list_default_receipt()
    {
        $payment_list = $this->billing_m->get_patient_payment_receipt();
        echo json_encode($payment_list);
    }
    public function get_payment_list_filtered_receipt()
    {
        $payment_list = $this->billing_m->get_patient_payment_filtered();
        echo json_encode($payment_list);
    }
    public function invoice_total()
    {
        $patient_id = $this->input->post('patient_id');
        $invoice_id = $this->input->post('invoice_id');
        $get_invoice_total = $this->db->select_sum('amount')->from('billings b')->where('patient_id', $patient_id)->where('invoice_id', $invoice_id)->get();
        $invoice_total = $get_invoice_total->row();
       // $payment_list = $this->billing_m->get_patient_payment();
        echo json_encode($invoice_total);
    }

    function save_payment()
    {
        echo json_encode($this->billing_m->save_payment());
    }

}
