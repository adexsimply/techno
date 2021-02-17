<?php
class Setting_m extends CI_Model
{

    public function get_lab_tests()
    {
        $get_lab_tests_list = $this->db->select('lt.*,lg.lab_group_name')->from('lab_tests lt')->join('lab_group as lg', 'lg.id=lt.lab_group_id')->where('lt.lab_test_name IS NOT NULL')->order_by('lt.lab_test_name', 'ASC')->get();
        $lab_tests_list = $get_lab_tests_list->result();
        return $lab_tests_list;
    }

    public function get_drug_groups()
    {
        $get_drug_groups_list = $this->db->select('*')->from('drug_group')->get();
        $drug_groups_list = $get_drug_groups_list->result();
        return $drug_groups_list;
    }
    public function get_lab_groups()
    {
        $get_lab_groups_list = $this->db->select('*')->from('lab_group')->get();
        $lab_groups_list = $get_lab_groups_list->result();
        return $lab_groups_list;
    }
    public function get_states()
    {
        $get_states_list = $this->db->select('*')->from('states')->get();
        $states_list = $get_states_list->result();
        return $states_list;
    }
    public function get_salutations()
    {
        $get_salutations_list = $this->db->select('*')->from('salutations')->get();
        $salutations_list = $get_salutations_list->result();
        return $salutations_list;
    }
    public function get_drug_by_id($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_items d')->where('id', $id)->get();
        $drug_details = $get_drug_by_id->row();
        return $drug_details;
    }
    public function get_drug_batches_by_id($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_batches d')->where('d.drug_id', $id)->get();
        $drug_details = $get_drug_by_id->result();
        return $drug_details;
    }

    public function get_drug_batches_by_id2($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_batches d')->where('d.drug_id', $id)->get();
        $drug_details = $get_drug_by_id->row();
        return $drug_details;
    }
    public function get_drug_bin_cards_by_id($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_activities d')->where('d.drug_id', $id)->get();
        $drug_details = $get_drug_by_id->result();
        return $drug_details;
    }
    public function get_drug_bin_card_by_id($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_activities d')->where('d.id', $id)->get();
        $drug_details = $get_drug_by_id->row();
        return $drug_details;
    }

    function qty_update()
    {
        $data = array(
            'quantity_in_stock' => $this->input->post('value'),
        );
        $this->db->where('id', $this->input->post('id'));
        $update = $this->db->update('drug_items', $data);

        $data2 = array(
            'drug_id' => $this->input->post('id'),
            'particular' => 'Drug added by ' . $this->session->userdata('active_user')->username . ' ' . $this->session->userdata('active_user')->fullname,
            'drug_in' => $this->input->post('value'),
            'balance' => $this->input->post('value'),
        );
        $insert = $this->db->insert('drug_activities', $data2);

        return $update;
    }
    function save_drug_batch()
    {
        if ($this->input->post('id')) {
            $data = array(
                'expire_date' => $this->input->post('expire_date'),
                'batch_number' => $this->input->post('batch_number'),
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->where('drug_id', $this->input->post('drug_id'));
            $update = $this->db->update('drug_batches', $data);
        } else {
            $data = array(
                'expire_date' => $this->input->post('expire_date'),
                'batch_number' => $this->input->post('batch_number'),
                'drug_id' => $this->input->post('drug_id'),
            );
            $insert = $this->db->insert('drug_batches', $data);
            return $insert;
        }
    }
}
