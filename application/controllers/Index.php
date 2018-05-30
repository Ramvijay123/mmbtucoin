<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register'); 
                $this->load->library('session');
                }
	public function index()
	{
	   if($this->session->userdata('userids')){
	       $userids=$this->session->userdata('userids');
       $query['userdata']=$this->Register->getUserData($userids);
	   }
	   
       
		//$this->load->view('index',$query);
	}
 }
    ?>