<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
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
        $admin['getfaq'] = $this->loginmodel->getfaq();
		$this->load->view('admin/faq',$admin);
	}
   public function inserfaq($id=''){
    $title=$this->input->post('title');
    $description=$this->input->post('description');
    $title2=$this->input->post('title2');
    $description2=$this->input->post('description2');
    $title3=$this->input->post('title3');
    $description3=$this->input->post('description3');
       $data=array(
                     'title'=>$title,
                     'description'=>$description,
                     'title2'=>$title2,
                     'description2'=>$description2,
                     'title3'=>$title3,
                     'description3'=>$description3,
                   );
      if($id){
        $query=$this->loginmodel->updatefaqdata($id,$data);
      }else{
        $query=$this->loginmodel->inserfaqdata($data);
      }
   redirect(base_url().'admin/Faq', 'refresh');//redirect page link
   }	
}
