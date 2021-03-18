<?php
class Billing_m extends CI_Model
{


    public function invoice_total2($invoice_id)
    {
        $get_invoice_total = $this->db->select_sum('amount')->from('billings b')->where('invoice_id', $invoice_id)->get();
        $invoice_total = $get_invoice_total->row();
       // $payment_list = $this->billing_m->get_patient_payment();
        return $invoice_total->amount;
    }

    public function get_patient_payment()
    {
         $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where('DATE(b.date_added)',$curr_date)->where('b.status','Pending')->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }


    public function get_patient_billings_by_invoice($invoice_id)
    {
        $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->where('invoice_id', $invoice_id)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }
    public function get_patient_id_from_invoice($invoice_id)
    {
        $get_patient_id = $this->db->select('patient_id')->from('billings')->where('invoice_id', $invoice_id)->get();
        $patient_id = $get_patient_id->row();
        return $patient_id;
    }
    public function get_patient_id_from_prescription_unique($unique_id)
    {
        $get_patient_id = $this->db->select('patient_id')->from('patient_prescriptions2')->where('prescription_unique_id', $unique_id)->get();
        $patient_id = $get_patient_id->row();
        return $patient_id;
    }


    public function get_patient_payment_filtered()
    {

        if ($this->input->post('status')) {

           $status = $this->input->post('status');
            //$status = "Pending";
            if ($status != 'all') {
                $cond = 'b.status IN (SELECT status FROM billings WHERE status="'. $status . '")';
            } else {
                $cond = '1=1';
            }
        }

        

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {
            //
            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('DATE(b.date_added) >=' => $first_date, 'DATE(b.date_added) <=' => $second_date);
        } else {

           $date_range = array('DATE(b.date_added)' => $today_date);

        }

        $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where($cond)->where($date_range)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }


    public function get_prescription_request_list()
    {
        $get_pharmacy_request = $this->db->select('pr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('prescription_requests pr')->join('patient_details as p', 'p.id=pr.patient_id', 'left')->join('request_destinations as rd', 'rd.id=pr.request_destination_id', 'left')->join('staff as s', 's.user_id=pr.request_by')->where('patient_id IS NOT NULL')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;
    }

    public function save_payment () {

            foreach ($this->input->post('billing_id[]') as $billing) {
               
                $data3 = array(
                    'status' => 'Paid',
                );
                $this->db->where('id', $billing);
                $this->db->update('billings', $data3);

                $this->db->where('invoice_id', $this->input->post('invoice_id'));
                $this->db->update('invoices', array('amount_paid' => $this->input->post('displayed_total'),'payment_mode' => $this->input->post('payas')));

                //$get_drug_name = $this->db->select('drug_item_name')->from('drug_items')->where('invoice_id',$invoice_id)->get()

            // $data = array(
            //     'patient_id'   => $this->input->post('patient_id'),
            //     'invoice_id'   => $invoice_id,
            //     'item_name'     => $result->drug_item_name,
            //     'category'     => "Prescription",
            //     'billing_type' => "Debit",
            //     'amount'       => $array[1] * $result->drug_sell,
            //     'billed_by'    => $this->session->userdata('active_user')->id,
            // );

            // //echo json_encode($this->input->post('prescription_unique_id'));

            // $this->db->insert('billings', $data);

            }
    }

}
