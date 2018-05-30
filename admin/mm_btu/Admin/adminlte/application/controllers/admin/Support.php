<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Support extends CI_Controller {
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
                    $admin['user_tickets'] = $this->loginmodel->getTicketall();
                    $admin['getAllUser'] = $this->loginmodel->getAllUser();
					//$this->load->view('admin/header',$admin);
    				$this->load->view('admin/support',$admin);
    				//$this->load->view('admin/footer');
	}
    public function DeleteSupport(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->DeleteSupport($ids);
        redirect(base_url().'admin/Support', 'refresh');//redirect page link
    }
	public function Logout(){
	   $this->session->sess_destroy();
       redirect(base_url().'admin/login', 'refresh');//redirect page link
	}
    public function supportmessage(){
        $ids=$this->input->post('ids');
        $query=$this->loginmodel->support_message($ids);
        $dataHold='';
        foreach($query as $message){
            $dataHold.='<ul><li><p><i class="fa fa-calendar"></i> '.$message->created_date.'</p><p>'.$message->message.'</p></li></ul>';
        }
        echo $dataHold;
    }
    public function insertMessage(){
        $ids=$this->input->post('ids');
        $message=$this->input->post('message');
        $user_ids=$this->input->post('user_ids');
        date_default_timezone_set('America/Los_Angeles'); 
        $date=date('Y-m-d');
        $data=array(
        'user_ids'=>$user_ids,
        'support_id'=>$ids,
        'message'=>$message,
        'type'=>'admin',
        'created_date'=>$date,
        );
        $querydata=$this->loginmodel->insert_support($data);
        redirect(base_url().'admin/Support', 'refresh');//redirect page link
    }

	
		
}
