<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsection extends CI_Controller {
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
        $admin['getnew'] = $this->loginmodel->getnew();
		$this->load->view('admin/new',$admin);
	}
   public function insertnews(){
    $name=$this->input->post('name');
    $designation=$this->input->post('designation');
    $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/new';
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
          'title'=>$name,
          'description'=>$designation,
          'image'=>$picture,
        );
    }else{
        $data=array(
          'title'=>$name,
          'description'=>$designation,
        );
    }
        
       $query=$this->loginmodel->addnewmodal($data);
   redirect(base_url().'admin/Newsection', 'refresh');//redirect page link
   }
   public function editnews(){
    $id=$this->input->post('updateids');
        $name=$this->input->post('name');
        $designation=$this->input->post('designation');
        $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/new';
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
          'title'=>$name,
          'description'=>$designation,
          'image'=>$picture,
        );
    }else{
        $data=array(
          'title'=>$name,
          'description'=>$designation,
        );
    }
    $query=$this->loginmodel->editnewsmodal($data,$id);
       redirect(base_url().'admin/Newsection', 'refresh');//redirect page link
   }
   public function deletenews(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->Deletedeletenews($ids);
       redirect(base_url().'admin/Newsection', 'refresh');//redirect page link
    }	
}
