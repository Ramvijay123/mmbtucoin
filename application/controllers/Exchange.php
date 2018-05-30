<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register'); 
                $this->load->model('Crowdsale_modal');
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
       $query['mmbtucoin_price']=$this->Register->mmbtucoin_price();
       $this->load->view('header',$query);
       $this->load->view('sidebar');
       $this->load->view('exchange',$query);
		$this->load->view('footer',$query);
	}
	public function buytoken(){
	    $buy_rate=$this->input->post('buy_rate');
	     $totalrate=$this->input->post('totalrate');
	     $current_rate=$this->input->post('current_rate');
	     $userids=$this->session->userdata('userids');
         date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d H:i:s');
	     $data=array(
	          'user_id'=>$userids,
	          'price'=>$buy_rate,
	          'amount'=>$totalrate,
	          'currentmmbturate'=>$current_rate,
              'created_date'=>$date,
	         );
 	    $query=$this->Register->buytoken($data);
        $this->paypal_lib->add_field('return', 'http://mmbtucoin.com/mmbtucoin/Exchange/paypalreturn/'.$query);
        $this->paypal_lib->add_field('cancel_return', 'http://mmbtucoin.com/mmbtucoin/Exchange/paypalcancel/'.$query);
        //$this->paypal_lib->add_field('notify_url', 'notify');
        $this->paypal_lib->add_field('item_name', 'MMBtu');
        $this->paypal_lib->add_field('custom', $userids);
        $this->paypal_lib->add_field('item_number',  $query);
        $this->paypal_lib->add_field('amount',  $buy_rate);
        
        // Load paypal form
        $this->paypal_lib->paypal_auto_form();
        
	}
    public function paypalreturn($ids){
        $query=$this->Register->tokenstatus($ids,'success');
        redirect(base_url().'Exchange/index', 'refresh');
    }
    public function paypalcancel(){
        $query=$this->Register->tokenstatus($ids,'error');
        redirect(base_url().'Exchange/index', 'refresh');
    }
    
    public function selltoken(){
        $userids=$this->session->userdata('userids');
        $query['userdata']=$this->Register->getUserData($userids);
       
         $buy_rate=$this->input->post('sell_price');
	     $totalrate=$this->input->post('sell_total');
	     $current_rate=$this->input->post('current_rate');
         $currentMMbtuBlnce=$this->input->post('currentMMbtuBlnce');
         $updated_amount=$currentMMbtuBlnce-$totalrate;
         
         
	     date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d H:i:s');
	     $data=array(
	          'user_id'=>$userids,
	          'price'=>$buy_rate,
	          'amount'=>$totalrate,
	          'currentmmbturate'=>$current_rate,
              'created_date'=>$date,
	         );
 	  $query=$this->Register->selltoken($data);
      $update=array(
         'blance'=>$updated_amount,
      );
      $query=$this->Register->updateTokenBlance($update,$userids);
      $this->session->set_flashdata('login_error', 'You Have Successfully tranfer your Token');
      redirect(base_url().'Exchange', 'refresh');
    }
    
 }