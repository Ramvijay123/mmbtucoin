<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
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
    				$this->load->view('admin/profile',$admin);
	}
    public function UpdateProfileDetails($ids){
         $file_type=$_FILES['userfile']['name'];
              if(!empty($file_type)){
              $config['upload_path'] = 'uploads/admin';
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
               $name=$this->input->post('name'); 
               $email=$this->input->post('email'); 
               $phone=$this->input->post('phone'); 
               $username=$this->input->post('username'); 
               if($picture){
                    $data=array(
                       'name'=>$name,
                       'email'=>$email,
                       'phone'=>$phone,
                       'username'=>$username,
                        'pic'=>$picture,
                   );
               }else{
                    $data=array(
                       'name'=>$name,
                       'email'=>$email,
                       'phone'=>$phone,
                       'username'=>$username,
                   );
               }               
        $query=$this->loginmodel->UpdateProfileDetails($data,$ids);
        redirect(base_url().'admin/Profile', 'refresh');//redirect page link
    }
	

	
		
}
