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
        $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num, SUM(b.amount) as amount_total')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where('DATE(b.date_added)',$curr_date)->where('b.status','Pending')->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }
    public function get_patient_payment_receipt()
    {
         $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $get_patient_billings = $this->db->select('i.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('invoices i')->join('billings as b', 'i.invoice_id=b.invoice_id', 'left')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where('DATE(i.date_added)',$curr_date)->get();
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

        $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num,SUM(b.amount) as amount_total')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where($cond)->where($date_range)->get();
        // $get_patient_billings = $this->db->select('b.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('billings b')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where($cond)->where($date_range)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }

    public function get_patient_payment_filtered_receipt()
    {

        // if ($this->input->post('status')) {

        //    $status = $this->input->post('status');
        //     //$status = "Pending";
        //     if ($status != 'all') {
        //         $cond = 'b.status IN (SELECT status FROM billings WHERE status="'. $status . '")';
        //     } else {
        //         $cond = '1=1';
        //     }
        // }

        

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {
            //
            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('DATE(i.date_added) >=' => $first_date, 'DATE(i.date_added) <=' => $second_date);
        } else {

           $date_range = array('DATE(i.date_added)' => $today_date);

        }

        $get_patient_billings = $this->db->select('i.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num')->from('invoices i')->join('billings as b', 'i.invoice_id=b.invoice_id', 'left')->join('patient_details as p', 'p.id=b.patient_id', 'left')->group_by('b.invoice_id')->where($date_range)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }


    public function get_prescription_request_list()
    {
        $get_pharmacy_request = $this->db->select('pr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('prescription_requests pr')->join('patient_details as p', 'p.id=pr.patient_id', 'left')->join('request_destinations as rd', 'rd.id=pr.request_destination_id', 'left')->join('staff as s', 's.user_id=pr.request_by')->where('patient_id IS NOT NULL')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;
    }

    public function get_default_receipt_list()
    {
        $get_pharmacy_request = $this->db->select('*')->from('receipt_grid')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;
    }

    public function save_payment () {

            //  $get

            foreach ($this->input->post('billing_id[]') as $billing) {
               
                $data3 = array(
                    'status' => 'Paid',
                );
                $this->db->where('id', $billing);
                $this->db->update('billings', $data3);


                $this->db->where('invoice_id', $this->input->post('invoice_id'));
                $this->db->update('invoices', array('amount_paid' => $this->input->post('displayed_total'),'payment_mode' => $this->input->post('payas')));

                ///Activate patient after registration payment
                if ($this->input->post('description') =='Registration') {

                $data_status = array(
                    'status' => '1',
                );
                $this->db->where('id', $this->input->post('patient_id'));
                $this->db->update('patient_details', $data_status);


               
                $data3 = array(
                    'Registration' => $this->input->post('displayed_total'),
                    'PatientID' => $this->input->post('patient_id')
                );
                $insert = $this->db->insert('receipt_grid', $data3);


                }
                elseif($this->input->post('description') =='Consultation')  {

                $data_appointment = array(
                    'paid' => 'Yes',
                );
                $this->db->where('patient_id', $this->input->post('patient_id'));
                $this->db->update('patient_appointments', $data_appointment);


                $data3 = array(
                    'Consultation' => $this->input->post('displayed_total'),
                    'PatientID' => $this->input->post('patient_id')
                );
                $insert = $this->db->insert('receipt_grid', $data3);

                }



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

    public function save_manual_payment () {


               
                $data3 = array(
                    'Description' => $this->input->post('service'),
                    'Debit' => $this->input->post('debit'),
                    'patient_id' => $this->input->post('patient_id')
                );
                $insert = $this->db->insert('patient_ledger', $data3);
                return $insert;

    }

    public function save_bill() {


            $invoice_id = rand(10000,10000000);
            $check_if_invoice_exists = $this->db->select('*')->from('invoices')->where('invoice_id',$invoice_id)->get();
            if ($check_if_invoice_exists->num_rows() > 0) {
                $invoice_id = rand(10000,10000000);
            }
             $data_invoice = array(
                    'invoice_id' => $invoice_id,
                    'amount_paid' => $this->input->post('total_bill_cum')
                );
            $insert_invoice = $this->db->insert('invoices', $data_invoice);
            $item_id = $this->input->post('item_id');
            $quantity = $this->input->post('quantity');
            $item_name = $this->input->post('item_name');
            $cost = $this->input->post('cost');
            $food_id = $this->input->post('food_id');
            $service_type = $this->input->post('service_type');
            $patient_id = $this->input->post('patient_id');
            $i=0;
            foreach ($food_id as $key => $val) {
              if ($service_type[$key]=='drug') {


                $get = $this->db->select('*')->from('drug_items')->where('id', $item_id[$key])->get();
                $result = $get->row();
                $data3 = array(
                    'quantity_in_stock' => $result->quantity_in_stock - $quantity[$key],
                );
                $this->db->where('id', $item_id[$key]);
                $this->db->update('drug_items', $data3);


                    $data2 = array(
                        'drug_id' => $item_id[$key],
                        'particular' => 'Drug Prescription',
                        'drug_in_out' => 'drug_out',
                        'quantity' => $quantity[$key],
                        'balance' => $result->quantity_in_stock - $quantity[$key],
                    );
                    $insert = $this->db->insert('drug_activities', $data2);
              }

                // $this->db->where('patient_id', $this->input->post('patient_id'));
                // $this->db->where('prescription_unique_id', $this->input->post('prescription_unique_id'));
                // $this->db->where('prescription_id', $array[0]);
                // $this->db->update('patient_prescriptions2', array('qty_given' => $array[1]));

                //$get_drug_name = $this->db->select('drug_item_name')->from('drug_items')->where('invoice_id',$invoice_id)->get()
              if ($service_type[$key]=='drug') {
                $category = "Prescription";
              }
              elseif ($service_type[$key]=='general') {
                $category = "General";
              }
              else {
                $category = "Laboratory";
              }

            
                $data[$i]['patient_id']   = $patient_id;
                $data[$i]['invoice_id']   = $invoice_id;
                $data[$i]['item_name']     = $item_name[$key];
                $data[$i]['category']     = $category;
                $data[$i]['billing_type'] = "Debit";
                $data[$i]['amount']       = $cost[$key] * $quantity[$key];
                $data[$i]['billed_by']    = $this->session->userdata('active_user')->id;

                $data2[$i]['patient_id'] = $patient_id;
                $data2[$i]['Description'] = $item_name[$key];
                $data2[$i]['Debit'] = $cost[$key] * $quantity[$key];

                $i++;
            }

         $this->db->insert_batch('billings', $data);
         $this->db->insert_batch('patient_ledger', $data2);
         
             $data_ledger = array(
                    'Credit' => $this->input->post('total_bill_cum'),
                    'patient_id' => $this->input->post('patient_id'),
                    'Description' => 'Cash Payment(...)'
                );
            $insert_ledger = $this->db->insert('patient_ledger', $data_ledger);
            return $service_type;
    }

}
