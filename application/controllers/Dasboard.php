<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Dashboard_modal'); 
                $this->load->model('Register');
                $this->load->library('session');
                }
	public function index()
	{
	   $userids=$this->session->userdata('userids');
       if(!$userids){
        redirect(base_url().'login', 'refresh');//redirect page link
       }
       $query['userdata']=$this->Register->getUserData($userids);
	   $this->load->view('header',$query);
       $this->load->view('sidebar');
		$this->load->view('dashboard',$query);
        $this->load->view('footer');
	}
    
   
 }