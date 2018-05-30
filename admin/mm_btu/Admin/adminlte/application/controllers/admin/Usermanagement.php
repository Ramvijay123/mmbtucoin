<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usermanagement extends CI_Controller {
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
                    $admin['user_details'] = $this->loginmodel->getUserDetails();
					//$this->load->view('admin/header',$admin);
    				$this->load->view('admin/manage_user',$admin);
    				//$this->load->view('admin/footer');
	}
    public function deleteUser(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->deleteUser($ids);
        redirect(base_url().'admin/Usermanagement', 'refresh');//redirect page link
    }
    public function enableddisabledUser(){
        $ids=$this->input->post('delete_member');
        $status=$this->input->post('statusUser');
        $data=array('status'=>$status);
        $query=$this->loginmodel->enableddisabledUser($ids,$data);
        redirect(base_url().'admin/Usermanagement', 'refresh');//redirect page link
    }
	
	
		
}
