<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet extends CI_Controller {
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
                    $admin['getwallettransfer'] = $this->loginmodel->getwallettransfer();
                    $admin['getwalletdeposit'] = $this->loginmodel->getwalletdeposit();
                    $admin['getwalletwithdrawal'] = $this->loginmodel->getwalletwithdrawal();
                    $admin['getallfrontuser'] = $this->loginmodel->getallfrontuser();
					//$this->load->view('admin/header',$admin);
    				$this->load->view('admin/walletuser',$admin);
    				//$this->load->view('admin/footer');
	}
    public function deleteUser(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->deleteUser($ids);
        redirect(base_url().'admin/Usermanagement', 'refresh');//redirect page link
    }	
}
