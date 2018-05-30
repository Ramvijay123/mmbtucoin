<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_login extends CI_Controller {
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
	    $data=$this->session->userdata['temp'];
        $query['userdata']=$this->Register->getUserData($data);
        $this->load->view('security_login',$query);
	}
    	public function forgotTwoFA()
	{ 
	    $data=$this->session->userdata['temp'];
        $query['userdata']=$this->Register->getUserData($data);
        $this->load->view('secretforgot',$query);
	}
    public function login_user(){
        $code=$this->input->post('code');
        $secret_code=$this->input->post('secret_code');
        $temp=$this->session->userdata['temp'];
        $checkResult = $this->googleauthenticator->verifyCode($secret_code, $code, 2); // 2 = 2*30sec clock tolerance
        if ($checkResult) {
            $this->session->set_userdata('userids',$temp);
            redirect(base_url().'Dasboard', 'refresh');//redirect page link
         } else {
            $this->session->set_flashdata('twofa_error', 'Incorrect Authentication Code');
            redirect(base_url().'Security_login', 'refresh');//redirect page link
         }
    }
  public function forgot_user(){
    $userenter=$this->input->post('secret_code_enter');
    $secret_code=$this->input->post('secret_code');
    $data=$this->session->userdata['temp'];
    if($userenter==$secret_code){
        $dataSet=array(
        'two_secretcode'=>'',
        'two_fa'=>'0',
        );
        $this->Security_modal->forgotSecurity($dataSet,$data);
        redirect(base_url().'Dasboard', 'refresh');//redirect page link
    }else{
        $this->session->set_flashdata('secretfa_error', 'Incorrect Secret Code');
            redirect(base_url().'forgotTwoFA', 'refresh');//redirect page link
    }
  }
 
   
 }