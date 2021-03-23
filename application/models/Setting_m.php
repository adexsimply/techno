<?php
class Setting_m extends CI_Model
{

    public function get_lab_tests()
    {
        $get_lab_tests_list = $this->db->select('lt.*,lg.lab_group_name')->from('lab_tests lt')->join('lab_group as lg', 'lg.id=lt.lab_group_id')->where('lt.lab_test_name IS NOT NULL')->order_by('lt.lab_test_name', 'ASC')->get();
        $lab_tests_list = $get_lab_tests_list->result();
        return $lab_tests_list;
    }
    public function get_lab_test_by_id($id)
    {
        $get_lab_tests_list = $this->db->select('lt.*,lg.lab_group_name')->from('lab_tests lt')->join('lab_group as lg', 'lg.id=lt.lab_group_id')->where('lt.lab_test_name IS NOT NULL')->where('lt.id', $id)->get();
        $lab_tests_list = $get_lab_tests_list->row();
        return $lab_tests_list;
    }
    public function get_lab_test_range()
    {
        $get_drug_groups_list = $this->db->select('*')->from('lab_test_range')->order_by('id', 'DESC')->get();
        $drug_groups_list = $get_drug_groups_list->result();
        return $drug_groups_list;
    }
    public function get_lab_test_range_by_lab_id($id)
    {
        $get_get_lab_test_range_by_id = $this->db->select('*')->from('lab_test_range_by_test')->where('lab_test_id', $id)->get();
        $details = $get_get_lab_test_range_by_id->result();
        return $details;
    }
    public function get_lab_test_parameter_by_lab_id($id)
    {
        $get_get_lab_test_range_by_id = $this->db->select('*')->from('lab_test_parameters')->where('lab_test_id', $id)->get();
        $details = $get_get_lab_test_range_by_id->result();
        return $details;
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
    public function get_rad_services()
    {
        $get_drug_by_id = $this->db->select('*')->from('radiology_services')->order_by('id', 'DESC')->get();
        $drug_details = $get_drug_by_id->result();
        return $drug_details;
    }
    function get_rad_services_by_id($id)
    {
        $get_get_lab_test_range_by_id = $this->db->select('r.*')->from('radiology_services r')->where('r.id', $id)->get();
        $details = $get_get_lab_test_range_by_id->row();
        return $details;
    }
    public function get_drug_bin_card_by_id($id)
    {
        $get_drug_by_id = $this->db->select('d.*')->from('drug_activities d')->where('d.id', $id)->get();
        $drug_details = $get_drug_by_id->row();
        return $drug_details;
    }
    function get_lab_test_range_by_id($id)
    {
        $get_get_lab_test_range_by_id = $this->db->select('*')->from('lab_test_range')->where('id', $id)->get();
        $details = $get_get_lab_test_range_by_id->row();
        return $details;
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
    function adjust_drug()
    {
        $data = array(
            'quantity_in_stock' => $this->input->post('adjust_to'),
        );
        $this->db->where('id', $this->input->post('id'));
        $update = $this->db->update('drug_items', $data);

        if (($this->input->post('qty_in_stock')) > ($this->input->post('adjust_to'))) {
            $drug_in_out = 'drug_out';
        }
        else {
            $drug_in_out = 'drug_in';
        }

        $data2 = array(
            'drug_id' => $this->input->post('id'),
            'particular' => 'Stock Adjustment - ' . $this->input->post('reason'),
            'drug_in_out' => $drug_in_out,
            'quantity' => $this->input->post('adjust_to'),
            'balance' => $this->input->post('adjust_to'),
        );
        $insert = $this->db->insert('drug_activities', $data2);

        return $insert;
    }

    function save_drug()
    {
        if ($this->input->post('id')) {
            $data = array(
                'drug_item_name' => $this->input->post('name'),
                'quantity_in_stock' => $this->input->post('quantity'),
                'drug_group_id' => $this->input->post('group'),
                'drug_cost' => $this->input->post('cost'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('drug_items', $data);
        } else {
            $data = array(
                'drug_item_name' => $this->input->post('name'),
                'quantity_in_stock' => $this->input->post('quantity'),
                'drug_group_id' => $this->input->post('group'),
                'drug_cost' => $this->input->post('cost'),
            );
            $insert = $this->db->insert('drug_items', $data);
            return $insert;
        }
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
    function save_service()
    {
        if ($this->input->post('id')) {
            $data = array(
                'type' => $this->input->post('type'),
                'cost' => $this->input->post('cost'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('radiology_services', $data);
        } else {
            $data = array(
                'type' => $this->input->post('type'),
                'cost' => $this->input->post('cost'),
            );
            $insert = $this->db->insert('radiology_services', $data);
            return $insert;
        }
    }
    function save_range()
    {
        if ($this->input->post('id')) {
            $data = array(
                'name' => $this->input->post('name'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('lab_test_range', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
            );
            $insert = $this->db->insert('lab_test_range', $data);
            return $insert;
        }
    }
    function save_test()
    {
        if ($this->input->post('id')) {
            $lab_test_id = $this->input->post('id');
            $data = array(
                'lab_test_name' => $this->input->post('name'),
                'lab_group_id' => $this->input->post('group'),
                'measure' => $this->input->post('measure'),
                'cost' => $this->input->post('cost'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('lab_tests', $data);

            if ($this->input->post('range_id') && $this->input->post('range_id') != null) {
                foreach ($this->input->post('range_id') as $range) {
                    $array = explode(',', $range);
                    //print_r($array);
                    $data = array(
                        'lab_test_id' => $lab_test_id,
                        'name' => $array[0],
                        'low' => $array[1],
                        'high' => $array[2],
                    );
                    $insert = $this->db->insert('lab_test_range_by_test', $data);
                }
            }

            if ($this->input->post('parameter_id') && $this->input->post('parameter_id') != null) {
                foreach ($this->input->post('parameter_id') as $parameter) {
                    $array = explode(',', $parameter);
                    //print_r($array);
                    $data = array(
                        'lab_test_id' => $lab_test_id,
                        'name' => $array[0],
                        'measure' => $array[1],
                        'range_value' => $array[2],
                    );
                    $insert = $this->db->insert('lab_test_parameters', $data);
                }
            }
        } else {
            $data = array(
                'lab_test_name' => $this->input->post('name'),
                'lab_group_id' => $this->input->post('group'),
                'measure' => $this->input->post('measure'),
                'cost' => $this->input->post('cost'),
            );
            $insert = $this->db->insert('lab_tests', $data);
            $lab_test_id = $this->db->insert_id();
            if ($this->input->post('range_id') && $this->input->post('range_id') != null) {
                foreach ($this->input->post('range_id') as $range) {
                    $array = explode(',', $range);
                    //print_r($array);
                    $data = array(
                        'lab_test_id' => $lab_test_id,
                        'name' => $array[0],
                        'low' => $array[1],
                        'high' => $array[2],
                    );
                    $insert = $this->db->insert('lab_test_range_by_test', $data);
                }
            }

            if ($this->input->post('parameter_id') && $this->input->post('parameter_id') != null) {
                foreach ($this->input->post('parameter_id') as $parameter) {
                    $array = explode(',', $parameter);
                    //print_r($array);
                    $data = array(
                        'lab_test_id' => $lab_test_id,
                        'name' => $array[0],
                        'measure' => $array[1],
                        'range_value' => $array[2],
                    );
                    $insert = $this->db->insert('lab_test_parameters', $data);
                }
            }
        }
    }
}
