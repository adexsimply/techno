<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends Base_Controller
{

    /**
     * Index Page for this controller.s
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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

        $this->load->model('service_m');
        $this->data['menu_id'] = 'service';
    }

    public function charges()
    {
        if ($this->uri->segment(3)) {
            $this->data['service_sub_group'] = $this->service_m->get_service_sub_group();
            $this->data['service'] = $t =  $this->service_m->get_service_charges_by_id($this->uri->segment(3));
            $this->load->view('service/add', $this->data);
        } else {
            $this->data['title'] = 'Service Charges';
            $this->data['service_charges'] =  $this->service_m->get_service_charges();
            $this->load->view('service/charges', $this->data);
        }
    }

    public function validate_service_charge()
    {
        $rules = [
            [
                'field' => 'service_name',
                'label' => 'Service Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'cost',
                'label' => 'Service Cost',
                'rules' => 'trim|numeric|required'
            ],
        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run()) {
            header("Content-type:application/json");
            echo json_encode('success');
        } else {
            header("Content-type:application/json");
            echo json_encode($this->form_validation->get_all_errors());
        }
    }


    function save_service_charge()
    {
        $this->service_m->save_service_charge();
    }

}
