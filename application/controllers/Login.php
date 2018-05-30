<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register'); 
                $this->load->library('session');
                $this->load->library('email');
                }
	public function index()
	{
	   $userids=$this->session->userdata('userids');
	    if($userids){
        redirect(base_url().'Dasboard', 'refresh');//redirect page link
       }
                             
		$this->load->view('login');
	}
    	public function register($username='')
	{
	   $query['username']=$username;
	   
		$this->load->view('register',$query);
	}
    public function forgetpassword()
	{
		$this->load->view('forgetpassword');
	}
    public function userDetail(){
        
          function getToken($length){
                             $token = "";
                             $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                             $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                             $codeAlphabet.= "0123456789";
                             $max = strlen($codeAlphabet); // edited
                        
                            for ($i=0; $i < $length; $i++) {
                                $token .= $codeAlphabet[random_int(0, $max-1)];
                            }
                        
                            return $token;
                        }
                        $wallettoken= getToken(16);
        
        $name=$this->input->post('name');
        $email=$this->input->post('emial');
        $password=$this->input->post('password');
        $country=$this->input->post('country');
        $phone=$this->input->post('phone');
        $username=$this->input->post('username');
        $refferer=$this->input->post('refferer');
        $data=array(
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'country'=>$country,
        'phone'=>$phone,
        'wallet_address'=>$wallettoken,
        'username'=>$username,
        'referrer'=>$refferer,
        'ip_details'=>$_SERVER['REMOTE_ADDR'],
        );
        $query=$this->Register->userRegister($data);
        if($query){
            $this->load->library('email');
                    $htmlContent =  '<div style="background:#e3e5e7; padding:20px 0;"><table cellspacing="0" cellpadding="0" width="600px" style="margin:0 auto; background:#fff; font-family:Arial, Helvetica, sans-serif; text-align:center;"><thead><tr>';
                    $htmlContent .= '<th style="padding:15px; background:#3965d0;"><img src="'.base_url().'assests/images/logo.png" alt="logo"></th></tr>';
                    $htmlContent .= '</thead><tbody><tr><td style="padding:44px 30px; background:#02020f; color:#fff; font-size:36px;">Email Vaification Link</td></tr><tr><td style="text-align:left;padding:30px 30px 15px;font-size: 19px;font-weight: bold;">Currently Your Account is Deacivate..please Click button to activate</td></tr><tr><td><table style="padding: 0px 30px;text-align:left; font-size:14px; font-weight:bold;"><tr><td width="25%" style="padding:12px 0; color:#555;">Account</td>';
                    $htmlContent .= '<td><a href="mailto:info@mmtucoin.com" style="color:#111;">info@mmtucoin.com</a></td></tr><tr><td width="25%" style="padding:12px 0 40px; color:#555;"></td>';
                    $htmlContent .= '<td style="padding:12px 0 40px;"></td></tr></table><td></tr></tbody><tfoot><tr><td style="padding:50px 30px; border-top:#ccc solid 1px;"><a href="'.base_url().'login/varification/'.$query.'" style="border-radius:30px; padding:15px 35px; font-size:17px; color:#fff; background:#2fb1cb; text-decoration:none; text-transform:uppercase;">VERIFY YOUR ACCOUNT</a></td></tr></tfoot></table></div>';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->to($email);
            $this->email->from('dwallcare@gmail.com','MMBtuCoin');
            $this->email->subject('Email Varification');
            $this->email->message($htmlContent);
            $this->email->send();
            $this->session->set_flashdata('login_error', 'Register successfully...Please Check Your Mail');
            redirect(base_url().'login/register', 'refresh');
        }else{
            echo 'Error..Please try again later';
        }
    }
    public function login_user(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $capchadetails=$this->input->post('g-recaptcha-response');
        
        $data=array(
        'email'=>$email,
        'password'=>$password,
        );
        $secret = '6LfVF1YUAAAAALanDGikLltHV0yTlQEdp2lopBhg';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        $removalStdClass=get_object_vars($responseData);
        $recpacha_val=$removalStdClass['success'];
        if($recpacha_val=='1'){
      
        $query=$this->Register->loginCheck($email,$password);
        $two_fa=$query['two_fa'];
        $ids=$query['ids'];
        $status=$query['status'];
        date_default_timezone_set('Africa/Nairobi');
         
                    
        if($ids){
            if($status=='1'){
                        $date = date('Y-m-d H:i:s');
                 $dataip=array(
                            'ip_address'=>$_SERVER['REMOTE_ADDR'],
                            'user_id'=>$ids,
                            'created_date'=>$date,
                              );
                $query_details=$this->Register->ip_detalisget($dataip);
                if($two_fa=='1'){
                            $dataip=array(
                            'ip_details'=>$_SERVER['REMOTE_ADDR'],
                            );
                            $this->Register->updateIpdetails($dataip,$ids);
                     $this->session->set_userdata('temp',$ids);
                redirect(base_url().'Security_login', 'refresh');//redirect page link 
                }else{
                          $dataip=array(
                            'ip_details'=>$_SERVER['REMOTE_ADDR'],
                            );
                            $this->Register->updateIpdetails($dataip,$ids);
                   $this->session->set_userdata('userids',$ids);
                    redirect(base_url().'Dasboard', 'refresh');//redirect page link
                }
            }else{
               $this->session->set_flashdata('login_error', 'Please Activate you Account First');
                redirect(base_url().'login/index', 'refresh');
            }
        }else{
            $s=1;
            /*Attemps Start here*/
           echo $attemps=$this->session->userdata('attemps');
            if($attemps){
                $tried=$attemps+1;
                $this->session->set_userdata('attemps',$tried);
                if($attemps>=3){
                    $this->load->library('email');
                    $htmlContent =  '<div style="background:#e3e5e7; padding:20px 0;"><table cellspacing="0" cellpadding="0" width="600px" style="margin:0 auto; background:#fff; font-family:Arial, Helvetica, sans-serif; text-align:center;"><thead><tr>';
                    $htmlContent .= '<th style="padding:15px; background:#3965d0;"><img src="'.base_url().'assests/images/logo.png" alt="logo"></th></tr>';
                    $htmlContent .= '</thead><tbody><tr><td style="padding:44px 30px; background:#02020f; color:#fff; font-size:36px;">Invalid Login Attemps</td></tr><tr><td style="text-align:left;padding:30px 30px 15px;font-size: 19px;font-weight: bold;">Your MMBTU Account Have Invalid Login Attemps For 3 times...</td></tr><tr><td><table style="padding: 0px 30px;text-align:left; font-size:14px; font-weight:bold;"><tr><td width="25%" style="padding:12px 0; color:#555;">Account</td>';
                    $htmlContent .= '<td><a href="mailto:info@mmtucoin.com" style="color:#111;">info@mmtucoin.com</a></td></tr><tr><td width="25%" style="padding:12px 0 40px; color:#555;"></td>';
                    $htmlContent .= '<td style="padding:12px 0 40px;"></td></tr></table><td></tr></tbody><tfoot><tr><td style="padding:50px 30px; border-top:#ccc solid 1px;"><a href="'.base_url().'login/" style="border-radius:30px; padding:15px 35px; font-size:17px; color:#fff; background:#2fb1cb; text-decoration:none; text-transform:uppercase;">YOUR ACCOUNT</a></td></tr></tfoot></table></div>';
                        $config['mailtype'] = 'html';
                        $this->email->initialize($config);
                        $this->email->to($email);
                        $this->email->from('dwallcare@gmail.com','MMBtuCoin');
                        $this->email->subject('Login Attemps');
                        $this->email->message($htmlContent);
                        $this->email->send();
                $this->session->set_flashdata('login_error', 'Username or Password Incorrect');
                redirect(base_url().'login/index', 'refresh');
                }
            }else{
                $this->session->set_userdata('attemps',$s);
            }
            /*Attemps End Here*/
            $this->session->set_flashdata('login_error', 'Username or Password Incorrect');
                redirect(base_url().'login/index', 'refresh');
        }
       }else{
         $this->session->set_flashdata('login_error', 'Capcha Incorrect...please try again');
                redirect(base_url().'login/index', 'refresh');
       }
    }
 public function forgot_detail(){
    $email=$this->input->post('email');
    $query=$this->Register->forgot_password($email);
    //$message = $this->load->view('email', $query,  TRUE);
    if($query){
            //$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            //$this->email->set_header('Content-type', 'text/html');
            $this->load->library('email');
                    $htmlContent =  '<div style="background:#e3e5e7; padding:20px 0;"><table cellspacing="0" cellpadding="0" width="600px" style="margin:0 auto; background:#fff; font-family:Arial, Helvetica, sans-serif; text-align:center;"><thead><tr>';
                    $htmlContent .= '<th style="padding:15px; background:#3965d0;"><img src="'.base_url().'assests/images/logo.png" alt="logo"></th></tr>';
                    $htmlContent .= '</thead><tbody><tr><td style="padding:44px 30px; background:#02020f; color:#fff; font-size:36px;">Forgot Password Request</td></tr><tr><td style="text-align:left;padding:30px 30px 15px;font-size: 19px;font-weight: bold;">Your Current Password</td></tr><tr><td><table style="padding: 0px 30px;text-align:left; font-size:14px; font-weight:bold;"><tr><td width="25%" style="padding:12px 0; color:#555;">Account</td>';
                    $htmlContent .= '<td><a href="mailto:info@mmtucoin.com" style="color:#111;">info@mmtucoin.com</a></td></tr><tr><td width="25%" style="padding:12px 0 40px; color:#555;"></td>';
                    $htmlContent .= '<td style="padding:12px 0 40px;">Your Password '.$query.'</td></tr></table><td></tr></tbody><tfoot><tr><td style="padding:50px 30px; border-top:#ccc solid 1px;"></td></tr></tfoot></table></div>';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->to($email);
            $this->email->from('dwallcare@gmail.com','MMBtuCoin');
            $this->email->subject('Forgot Password Request');
            $this->email->message($htmlContent);
            $this->email->send();
                   /* $this->load->library('email');
                    $htmlContent = '<h1>Hello</h1>';
                    $htmlContent .= '<p>Here is your login detail for our client panel login.</p>';
                    $htmlContent .= '<p><strong>Username: </strong>&nbsp;'.$query.'</p>';
                    $htmlContent .= '<p><strong>Password: </strong>&nbsp;'.$query.'</p>';
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                    $this->email->to('j.ankush300@gmail.com');
                    $this->email->from('hawkscodeteam@gmail.com','Booking Central');
                    $this->email->subject('Customer Login Detail');
                    $this->email->message($htmlContent);
                    $this->email->send();*/
                    
            $this->session->set_flashdata('login_error', 'Please Check Your Mail');
            redirect(base_url().'login/forgetpassword', 'refresh');
        }else{
            $this->session->set_flashdata('login_error', 'Email not Registered');
            redirect(base_url().'login/forgetpassword', 'refresh');
        }
 }
 public function logout(){
    $this->session->unset_userdata('userids');
    redirect(base_url().'login', 'refresh');//redirect page link
 }
 public function varification($ids){
    $query=$this->Register->uservarified($ids);
    redirect(base_url().'login', 'refresh');//redirect page link
 }
 }