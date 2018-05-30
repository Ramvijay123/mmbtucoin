<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('loginmodel'); 
                
                }

	public function index()
	{    
			$this->load->model('loginmodel');
            $userids=$this->session->userdata('adminID'); 
            if(!$userids){
                redirect(base_url().'admin/login', 'refresh');//redirect page link
            }
		$admin['details'] = $this->loginmodel->getdatastore($userids);
        $admin['countdata'] = $this->loginmodel->getcountdatadashboard();
					$this->load->view('admin/header',$admin);
				$this->load->view('admin/dashboard_view');
				$this->load->view('admin/footer');
	}
	
	
		
}
