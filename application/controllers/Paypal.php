<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
     }
     
    function success(){
        // Get the transaction data
        $paypalInfo = $this->input->get();
        
        $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];
        
        // Pass the transaction data to view
        $this->load->view('paypal/success', $data);
    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        // Paypal return transaction details array
        $paypalInfo = $this->input->post();

        $data['user_id']     = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result     = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        
        // Check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            // Insert the transaction data into the database
            $this->product->insertTransaction($data);
        }
    }
}