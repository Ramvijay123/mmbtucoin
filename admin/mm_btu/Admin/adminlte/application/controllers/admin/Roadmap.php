<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roadmap extends CI_Controller {

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
        $admin['roadmap'] = $this->loginmodel->roadmapdata();
					//$this->load->view('admin/header',$admin);
				$this->load->view('admin/roadmap',$admin);
				//$this->load->view('admin/footer');
	}
    public function roadmapdata($ids=''){
        $title1=$this->input->post('title1');
        $content1=$this->input->post('content1');
        $title2=$this->input->post('title2');
        $content2=$this->input->post('content2');
        $title3=$this->input->post('title3');
        $content3=$this->input->post('content3');
        $title4=$this->input->post('title4');
        $content4=$this->input->post('content4');
        $title5=$this->input->post('title5');
        $content5=$this->input->post('content5');
        $title6=$this->input->post('title6');
        $content6=$this->input->post('content6');
        $title7=$this->input->post('title7');
        $content7=$this->input->post('content7');
        $data=array(
        'title1'=>$title1,
        'content1'=>$content1,
        'title2'=>$title2,
        'content2'=>$content2,
        'title3'=>$title3,
        'content3'=>$content3,
        'title4'=>$title4,
        'content4'=>$content4,
        'title5'=>$title5,
        'content5'=>$content5,
        'title6'=>$title6,
        'content6'=>$content6,
        'title7'=>$title7,
        'content7'=>$content7,
        );
        if($ids){
             $this->loginmodel->updateroadmap($ids,$data);
        }else{
            $this->loginmodel->insertroadmap($data);
        }
        redirect(base_url().'admin/Roadmap', 'refresh');//redirect page link
    }
   	
}
