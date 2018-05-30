<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisors extends CI_Controller {

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
        $admin['user_advisor'] = $this->loginmodel->getadvisor();
		$this->load->view('admin/advisors',$admin);
	}
    public function addadvisor(){
        $name=$this->input->post('name');
        $designation=$this->input->post('designation');
        $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/advisor';
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
          'name'=>$name,
          'designation'=>$designation,
          'image'=>$picture,
        );
    }else{
        $data=array(
          'name'=>$name,
          'designation'=>$designation,
        );
    }
        
       $query=$this->loginmodel->addadvisormodal($data);
       redirect(base_url().'admin/advisors', 'refresh');//redirect page link
    }
    public function AdvisorsPackage(){
        $ids=$this->input->post('delete_member');
        $query=$this->loginmodel->Deleteadvisors($ids);
       redirect(base_url().'admin/advisors', 'refresh');//redirect page link
    }
    public function editadvisor(){
        $id=$this->input->post('updateids');
        $name=$this->input->post('name');
        $designation=$this->input->post('designation');
        $file_type=$_FILES['userfile']['name'];
      if(!empty($file_type)){
      $config['upload_path'] = 'uploads/advisor';
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
          'name'=>$name,
          'designation'=>$designation,
          'image'=>$picture,
        );
    }else{
        $data=array(
          'name'=>$name,
          'designation'=>$designation,
        );
    }
    $query=$this->loginmodel->editadvisormodal($data,$id);
       redirect(base_url().'admin/advisors', 'refresh');//redirect page link
    }	
   	
}
