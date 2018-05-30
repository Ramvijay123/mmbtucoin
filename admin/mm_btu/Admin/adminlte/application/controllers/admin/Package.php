<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

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
        $admin['user_package'] = $this->loginmodel->getPackage();
					//$this->load->view('admin/header',$admin);
				$this->load->view('admin/package',$admin);
				//$this->load->view('admin/footer');
	}
    public function addpackages(){
        $name=$this->input->post('name');
        $pricefrom=$this->input->post('pricefrom');
        $priceto=$this->input->post('priceto');
        $amount=$this->input->post('amount');
        $interest=$this->input->post('interest');
        $timeperiod=$this->input->post('timeperiod');
        $data=array(
          'package'=>$name,
          'rangefrom'=>$pricefrom,
          'rangeto'=>$priceto,
          'amount'=>$amount,
          'interest'=>$interest,
          'period_time'=>$timeperiod,
        );
       $query=$this->loginmodel->addpackagemodal($data);
       redirect(base_url().'admin/package', 'refresh');//redirect page link
    }
    public function DeletePackage(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->DeletePackage($ids);
       redirect(base_url().'admin/package', 'refresh');//redirect page link
    }
    public function UpdatePackage($ids){
        $userids=$this->session->userdata('adminID'); 
        $admin['details'] = $this->loginmodel->getdatastore($userids);
        $admin['updatepackagequery'] = $this->loginmodel->updatepackagequery($ids);
        $this->load->view('admin/packageupdate',$admin);
    }	
    public function lendingUpdate($ids){
        $data=array(
          'package'=>$this->input->post('title'),
          'rangefrom'=>$this->input->post('rangefrom'),
          'rangeto'=>$this->input->post('rangeto'),
          'amount'=>$this->input->post('amount'),
          'interest'=>$this->input->post('interest'),
          'period_time'=>$this->input->post('timeperiod'),
        );
        $query=$this->loginmodel->lendingUpdate($data,$ids);
        redirect(base_url().'admin/package', 'refresh');//redirect page link
    }	
}
