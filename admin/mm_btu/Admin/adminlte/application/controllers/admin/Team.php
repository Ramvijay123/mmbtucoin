<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
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
        $admin['getteamtoken'] = $this->loginmodel->getteamtoken();
		$this->load->view('admin/team',$admin);
	}
   public function inserteam($id=''){
    $title=$this->input->post('title');
    $description=$this->input->post('designation');
    $title2=$this->input->post('title2');
    $description2=$this->input->post('designation2');
    $title3=$this->input->post('title3');
    $description3=$this->input->post('designation3');
    
    $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/team1';
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
    
    $file_type=$_FILES['userfile2']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/team2';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = $file_type;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $img = "userfile2"; // input name="img"
    if($this->upload->do_upload($img)){
    $uploadData = $this->upload->data();
    $picture2 = $uploadData['file_name'];
    }else{
        $picture2 = '';
    }
    $error = array('error' => $this->upload->display_errors());
    }else{
        $picture2 = '';
    }
    
    $file_type=$_FILES['userfile3']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/team3';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = $file_type;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $img = "userfile3"; // input name="img"
    if($this->upload->do_upload($img)){
    $uploadData = $this->upload->data();
    $picture3 = $uploadData['file_name'];
    }else{
        $picture3 = '';
    }
    $error = array('error' => $this->upload->display_errors());
    }else{
        $picture3 = '';
    }
    
    if($picture){
        if($picture2){
           if($picture3){
             $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'image'=>$picture,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'image2'=>$picture2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
                    'image3'=>$picture3,
               );
           }else{
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'image'=>$picture,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'image2'=>$picture2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
               );
           } 
        }else{
             if($picture3){
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'image'=>$picture,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
                    'image3'=>$picture3,
               );
           }else{
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'image'=>$picture,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
               );
           } 
        }
    }else{
        if($picture2){
            if($picture3){
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'image2'=>$picture2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
                    'image3'=>$picture3,
               );
           }else{
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'image2'=>$picture2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
                    
               );
           } 
        }else{
            if($picture3){
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
                    'image3'=>$picture3,
               );
           }else{
            $data=array(
                    'title'=>$title,
                    'designation'=>$description,
                    'title2'=>$title2,
                    'designation2'=>$description2,
                    'title3'=>$title3,
                    'designation3'=>$description3,
               );
           } 
        }
    }
            
    if($id){
         $query=$this->loginmodel->updateteamdata($id,$data);
    }else{
         $query=$this->loginmodel->inserteamdata($data);
    }
   redirect(base_url().'admin/Team', 'refresh');//redirect page link
   }	
}
