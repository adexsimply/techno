<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retainer extends Base_Controller
{

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
    public function __construct()
    {

        parent::__construct();

        $this->load->model('retainer_m');
        $this->data['menu_id'] = 'retainer';
    }
    public function index()
    {
        $this->data['title'] = "Retainers";
        $this->data['retainers_list'] =  $this->retainer_m->get_retainers_list();
        $this->load->view('retainer/main', $this->data);
    }
    public function add()
    {
        $this->load->view('patients/add_patient', $this->data);
    }
    public function add_retainer()
    {
        $this->data['title'] = "Add Retainer";
        //$this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();

        if ($this->uri->segment(3)) {

            $this->data['retainer_details'] = $this->retainer_m->get_retainer_by_id($this->uri->segment(3));
        }
        $this->load->view('retainer/new_retainer_modal', $this->data);
    }

    public function manage_price()
    {
        $this->data['title'] = "Manage Pricelist";
        //$this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();

        if ($this->uri->segment(3)) {

            $this->data['retainer_details'] = $this->retainer_m->get_retainer_by_id($this->uri->segment(3));
        }
        $this->load->view('retainer/manage_price_modal', $this->data);
    }

    public function view()
    {
        if ($this->uri->segment(3)) {

            $this->load->view('patients/view', $this->data);
        } else {
            show_404();
        }
    }


    public function submit_price()
    {
        $this->retainer_m->add_price();

        header('Content-Type: application/json');
        echo json_encode('success');
    }
}
