<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ico_token extends CI_Controller {
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
        $admin['geticotoken'] = $this->loginmodel->geticotoken();
		$this->load->view('admin/icotoken',$admin);
	}
   public function insertoken($id=''){
    $title=$this->input->post('title');
    $description=$this->input->post('description');
    $advisor=$this->input->post('advisor');
    $ico=$this->input->post('ico');
    $founder=$this->input->post('founder');
    $privatesale=$this->input->post('privatesale');
    $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/icotoken';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = $file_type;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $img = "userfile"; // input name="img"
    if($this->upload->do_upload($img)){
    $uploadData = $this->upload->data();
    $picture = $uploadData['file_name'];
    }else{
        $picture = '';
    }
    $error = array('error' => $this->upload->display_errors());
    }else{
        $picture = '';
    }
    if($picture){
        $data=array(
                    'title'=>$title,
                    'description'=>$description,
                    'advisor'=>$advisor,
                    'ico'=>$ico,
                    'founder'=>$founder,
                    'privatesale'=>$privatesale,
                    'image'=>$picture,
                    );
    }else{
                $data=array(
                    'title'=>$title,
                    'description'=>$description,
                    'advisor'=>$advisor,
                    'ico'=>$ico,
                    'founder'=>$founder,
                    'privatesale'=>$privatesale,
               );
    }
    if($id){
         $query=$this->loginmodel->updateicodata($id,$data);
    }else{
         $query=$this->loginmodel->insericodata($data);
    }
   redirect(base_url().'admin/Ico_token', 'refresh');//redirect page link
   }	
}
