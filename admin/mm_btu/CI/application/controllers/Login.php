<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register'); 
                $this->load->library('session');
                }
	public function index()
	{
		$this->load->view('login');
	}
    	public function register()
	{
		$this->load->view('register');
	}
    public function forgetpassword()
	{
		$this->load->view('forgetpassword');
	}
    public function userDetail(){
        $name=$this->input->post('name');
        $email=$this->input->post('emial');
        $password=$this->input->post('password');
        $country=$this->input->post('country');
        $phone=$this->input->post('phone');
        $data=array(
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'country'=>$country,
        'phone'=>$phone,
        );
        $query=$this->Register->userRegister($data);
        if($query){
            redirect(base_url().'login/index', 'refresh');
        }else{
            echo 'Error..Please try again later';
        }
    }
    public function login_user(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data=array(
        'email'=>$email,
        'password'=>$password,
        );
        $query=$this->Register->loginCheck($email,$password);
        if($query){
            $this->session->set_userdata('userids',$query);
            redirect(base_url().'index', 'refresh');//redirect page link
        }else{
            $this->session->set_flashdata('login_error', 'Username or Password Incorrect');
            redirect(base_url().'login/index', 'refresh');
        }
    }
 public function forgot_password(){
    $email=$this->input->post('email');
    $query=$this->Register->forgot_password($email);
    if($query){
            
                   /* $this->load->library('email');
                    $htmlContent = '<h1>Forgot Password Request</h1>';
                    $htmlContent .= '<p>Here is your login detail for our User Panel.</p>';
                    $htmlContent .= '<p><strong>Username: </strong>&nbsp;'.$email.'</p>';
                    $htmlContent .= '<p><strong>Password: </strong>&nbsp;'.$query.'</p>';
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                    $this->email->to($email);
                    $this->email->from('info@mmbtucoin.com','MMBTU_COIN');
                    $this->email->subject('Forgot Password Request');
                    $this->email->message($htmlContent);
                    $this->email->send();*/
                    
            
            redirect(base_url().'index', 'refresh');//redirect page link
        }else{
            $this->session->set_flashdata('login_error', 'Email not Registered');
            redirect(base_url().'login/forgetpassword', 'refresh');
        }
 }
 }