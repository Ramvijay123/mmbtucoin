<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->model('Account_modal'); 
                $this->load->model('Register');
                $this->load->library('session');
                }
	public function index()
	{
	   $userids=$this->session->userdata('userids');
       if(!$userids){
        redirect(base_url().'login', 'refresh');//redirect page link
       }
       $query['userdata']=$this->Register->getUserData($userids);
	   $this->load->view('header',$query);
       $this->load->view('sidebar');
		$this->load->view('account',$query);
        $this->load->view('footer');
	}
   public function updatedata($ids){
   
    $name=$this->input->post('name');
    $phone=$this->input->post('phone');
    $email=$this->input->post('email');
    $country=$this->input->post('country');
    
    $current=$this->input->post('current');
    $newpass=$this->input->post('newpass');
    $confpass=$this->input->post('confpass');
    
       $file_type=$_FILES['userfile']['name'];
              if(!empty($file_type)){
              $config['upload_path'] = 'upload/profile';
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
                    /*profile start here*/
                    if($current){
        $data=array(
          'name'=>$name,
          'phone'=>$phone,
          'email'=>$email,
          'country'=>$country,
           'password'=>$newpass,
           'profile'=>$picture
        );
        $password=$this->Register->getpasswordmatch($ids);
            if($current==$password){
                if($newpass==$confpass){
                    $password=$this->Register->makeupdatedata($data,$ids);
                    $this->session->set_flashdata('password_error', '<p style="color:green">Successfully Updated Your Information</p>');
                }else{
                  $this->session->set_flashdata('password_error', '<p style="color:red">New Password and Confirm New Password must be same</p>');    
                }
            }else{
               $this->session->set_flashdata('password_error', '<p style="color:red">Current Password Not match in Our Database</p>');  
            }
    }else{
        $data=array(
          'name'=>$name,
          'phone'=>$phone,
          'email'=>$email,
          'country'=>$country,
          'profile'=>$picture
        );
        $password=$this->Register->makeupdatedata($data,$ids);
        $this->session->set_flashdata('password_error', '<p style="green">Successfully Updated Your Information</p>');
    }
                    /*profile end here*/
                  }else{
                    /*profile start here*/
                    if($current){
        $data=array(
          'name'=>$name,
          'phone'=>$phone,
          'email'=>$email,
          'country'=>$country,
           'password'=>$newpass
        );
        $password=$this->Register->getpasswordmatch($ids);
           if($current==$password){
                if($newpass==$confpass){
                    $password=$this->Register->makeupdatedata($data,$ids);
                    $this->session->set_flashdata('password_error', '<p style="color:green">Successfully Updated Your Information</p>');
                }else{
                  $this->session->set_flashdata('password_error', '<p style="color:red">New Password and Confirm New Password must be same</p>');    
                }
            }else{
               $this->session->set_flashdata('password_error', '<p style="color:red">Current Password Not match in Our Database</p>');  
            }
    }else{
        $data=array(
          'name'=>$name,
          'phone'=>$phone,
          'email'=>$email,
          'country'=>$country
        );
        $password=$this->Register->makeupdatedata($data,$ids);
        $this->session->set_flashdata('password_error', '<p style="color:green">Successfully Updated Your Information</p>');
    }
                    /*profile end here*/
                  }       
    
    redirect(base_url().'account', 'refresh');//redirect page link
   }
   
 }