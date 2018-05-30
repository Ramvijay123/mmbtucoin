<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Security_modal'); 
                $this->load->model('Register');
                $this->load->library('session');
                $this->load->library('GoogleAuthenticator');
                }
	public function index()
	{
	   $userids=$this->session->userdata('userids');
       if(!$userids){
        redirect(base_url().'login', 'refresh');//redirect page link
       }
       $secret = $this->googleauthenticator->createSecret();
       $query['QRCode'] = $this->googleauthenticator->getQRCodeGoogleUrl('Service Name', 'user@email.com', $secret);
        $query['secret_code']=$secret;
       
       $query['userdata']=$this->Register->getUserData($userids);
	   $this->load->view('header',$query);
       $this->load->view('sidebar');
		$this->load->view('security',$query);
        $this->load->view('footer');
	}
    public function enabledsecurity(){
         $entercode=$this->input->post('entercode');
         $secretids=$this->input->post('secretids');
         $checkResult = $this->googleauthenticator->verifyCode($secretids, $entercode, 2); // 2 = 2*30sec clock tolerance
         if ($checkResult) {
            $dataSet=array(
            'two_fa'=>'1',
            'two_secretcode'=>$secretids,
            );
            $this->Security_modal->enableSecurity($dataSet);
            echo 'OK';
         } else {
            echo 'FAILED';
         }
    }
    public function disabledsecurity(){
        $secretcode=$this->input->post('secretcode');
        $varificationcode=$this->input->post('varificationcode');
        $checkResult = $this->googleauthenticator->verifyCode($secretcode, $varificationcode, 2); // 2 = 2*30sec clock tolerance
        if ($checkResult) {
            $dataSet=array(
            'two_fa'=>'0',
            'two_secretcode'=>$secretcode,
            );
            $this->Security_modal->enableSecurity($dataSet);
            echo 'OK';
         } else {
            echo 'FAILED';
         }
    }
   
 }