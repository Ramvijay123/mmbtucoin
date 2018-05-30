<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
                function __construct() {
                    parent::__construct();
               $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Register'); 
                $this->load->library('session');
                }

	public function index()
	{
	   $query['aboutusget']=$this->Register->aboutusget();
       $query['tokenget']=$this->Register->tokenget();
       $query['roadmap']=$this->Register->roadmap();
       $query['faq']=$this->Register->faq();
       $query['team']=$this->Register->team();
       $query['advisors']=$this->Register->advisors();
       $query['newss']=$this->Register->newss();
		$this->load->view('index',$query);
	}
}
