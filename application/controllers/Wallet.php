<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register');
                $this->load->library('paypal_lib');
                $this->load->library('session');
                }
	public function index()
	{ 
	    $userids=$this->session->userdata('userids');
       if(!$userids){
        redirect(base_url().'login', 'refresh');//redirect page link
       }
       $query['userdata']=$this->Register->getUserData($userids);
       $query['tokenuser']=$this->Register->getalltoken($userids);
       $query['transferUser']=$this->Register->transferUser($userids);
       $query['depositUser']=$this->Register->depositUser($userids);
       $query['withdrawalUser']=$this->Register->withdrawalUser($userids);
       $query['getalluser']=$this->Register->getalluser($userids);
	   //$this->load->view('header',$query);
       $this->load->view('sidebar');
		$this->load->view('wallet',$query);
        //$this->load->view('footer');
	} 
    public function checkBalance(){
        $amount=$this->input->post('amount');
        $userids=$this->session->userdata('userids');
        $getAmount=$this->Register->checkbalance();
        $RemovalClass=get_object_vars($getAmount[0]);
        $currentAmount=$RemovalClass['blance'];
        if($amount<=$currentAmount){
            echo 'available';
        }else{
             echo 'Insufficient';
        }
    }
 public function transfer_insert($ids){
    $transfer_from=$this->input->post('transfer_from');
    $transfer_to=$this->input->post('transfer_to');
    $transfer_amount=$this->input->post('transfer_amount');
    $userids=$this->session->userdata('userids');
    
    $transactionget=$this->Register->update_transfer($transfer_from,$transfer_to,$transfer_amount);
    date_default_timezone_set('America/Los_Angeles'); 
    $date=date('Y/m/d');
      $min=666666;
      $max=99999999;
    $wallettoken= rand($min,$max);
        $data=array(
            'user_id'=>$userids,
            'transfer_from'=>$transfer_from,
            'transfer_to'=>$transfer_to,
            'amount'=>$transfer_amount,
            'created_date'=>$date,
            'status'=>'success',
            'trans_id'=>$wallettoken,
            'type'=>'transfer',
        );
     $query=$this->Register->transfer_insert($data);
     if($query){
            $this->session->set_flashdata('wallet_error', '<p style="color:green;margin-left: 20px;">Successfully transfer you amount..Wait for Administration Confirmation</p>');
            redirect(base_url().'Wallet', 'refresh');
     }else{
            $this->session->set_flashdata('wallet_error', '<p style="color:red;margin-left: 20px;">Server error..Please Try Again Later</p>');
            redirect(base_url().'Wallet', 'refresh');
     }
 }
 public function deposit_insert(){
    //$deposit_to=$this->input->post('depositwalletto');
    $deposit_from=$this->input->post('depositwalletfrom');
    $depositwalletAmt=$this->input->post('depositwalletAmt');
    $userids=$this->session->userdata('userids');
    $this->load->library('paypal_lib');
    date_default_timezone_set('America/Los_Angeles'); 
    $date=date('Y/m/d');
      $min=666666;
      $max=99999999;
    $wallettoken= rand($min,$max);
    
    $data=array(
    'user_id'=>$userids,
    'transfer_from'=>$deposit_from,
    //'transfer_to'=>$deposit_to,
    'amount'=>$depositwalletAmt,
    'trans_id'=>$wallettoken,
    'created_date'=>$date,
    'status'=>'unsuccess',
    );
  $query=$this->Register->deposit_insert($data);
        $this->paypal_lib->add_field('return', 'http://mmbtucoin.com/mmbtucoin/Wallet/paypalreturn/'.$query);
        $this->paypal_lib->add_field('cancel_return', 'http://mmbtucoin.com/mmbtucoin/Wallet/paypalcancel/'.$query);
        //$this->paypal_lib->add_field('notify_url', 'notify');
        $this->paypal_lib->add_field('item_name', $deposit_from);
        $this->paypal_lib->add_field('custom', $userids);
        $this->paypal_lib->add_field('item_number',  $query);
        $this->paypal_lib->add_field('amount',  $depositwalletAmt);
        
        // Load paypal form
        $this->paypal_lib->paypal_auto_form();
     if($query){
            $this->session->set_flashdata('wallet_error', 'Successfully Deposit your amount..Wait for Administration Confirmation');
            redirect(base_url().'Wallet', 'refresh');
     }else{
            $this->session->set_flashdata('wallet_error', 'Server error..Please Try Again Later');
            redirect(base_url().'Wallet', 'refresh');
     }
 }  
 public function paypalreturn($ids){
    $data_credit=$this->Register->addwalletamt($ids);
    $query=$this->Register->tokenstatuspayment($ids,'success');
        $this->session->set_flashdata('wallet_error', 'Your Account Have Been Credited to Your Account');
        redirect(base_url().'Wallet', 'refresh');
 }
 public function paypalcancel($ids){
    $query=$this->Register->tokenstatuspayment($ids,'error');
        $this->session->set_flashdata('wallet_error', 'Your Transaction is Unsuccessfull');
        redirect(base_url().'Wallet', 'refresh');
 }
 public function withdrawal_insert(){
    $walletto=$this->input->post('walletto');
    $walletfrom=$this->input->post('walletfrom');
    $amountto=$this->input->post('amountto');
    $userids=$this->session->userdata('userids');
    date_default_timezone_set('America/Los_Angeles'); 
    $date=date('Y/m/d');
      $min=666666;
      $max=99999999;
    $wallettoken= rand($min,$max);
    
    $data=array(
    'user_id'=>$userids,
    'walletfrom'=>$walletfrom,
    'walletto'=>$walletto,
    'amountto'=>$amountto,
    'trans_id'=>$wallettoken,
    'created_date'=>$date,
    'status'=>'0',
    );
  $query=$this->Register->withdrawal_insert($data);
     if($query){
            $this->session->set_flashdata('wallet_error', 'Successfully Withdrawal your amount..Wait for Administration Confirmation');
            redirect(base_url().'Wallet', 'refresh');
     }else{
            $this->session->set_flashdata('wallet_error', 'Server error..Please Try Again Later');
            redirect(base_url().'Wallet', 'refresh');
     }
 }
 
 public function withdrawalData(){
    $walletaddress=$this->input->post('walletaddress');
    $bankname=$this->input->post('Bankname');
    $accountno=$this->input->post('accountno');
    $ifscode=$this->input->post('ifscode');
    $amount=$this->input->post('amount');
    $user_id=$this->session->userdata('userids');
    $min=666666;
      $max=99999999;
    $wallettoken= rand($min,$max);
    date_default_timezone_set('America/Los_Angeles'); 
    $date=date('Y/m/d');
    $data=array(
       'walletaddress'=>$walletaddress,
       'bankname'=>$bankname,
       'accountno'=>$accountno,
       'ifscode'=>$ifscode,
       'amount'=>$amount,
       'user_id'=>$user_id,
       'trans_id'=>$wallettoken,
       'status'=>'request',
       'created_date'=>$date
    );
    $query=$this->Register->withdrawalData($data);
     if($query){
            $this->session->set_flashdata('wallet_error', '<p style="color:green">Your Request for Withdrawal is send..Wait for Administration Confirmation</p>');
            redirect(base_url().'Wallet', 'refresh');
     }else{
            $this->session->set_flashdata('wallet_error', '<p style="color:red">Your Request cannot be make..Please Try Again Later</p>');
            redirect(base_url().'Wallet', 'refresh');
     }
 }
 }