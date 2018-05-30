<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
        $admin['getabout'] = $this->loginmodel->getabout();
					//$this->load->view('admin/header',$admin);
				$this->load->view('admin/about',$admin);
				//$this->load->view('admin/footer');
	}
    public function aboutdata($ids=''){
      $name=$this->input->post('title');
      $description=$this->input->post('description');
        $file_type=$_FILES['userfile']['name'];
              if(!empty($file_type)){
              $config['upload_path'] = 'uploads/about';
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
                        'image'=>$picture,
                        'title'=>$name,
                        'description'=>$description,
                        );
                    }else{
                         $data=array(
                        'title'=>$name,
                        'description'=>$description,
                        );
                    } 
        if($ids){
            $query=$this->loginmodel->updatedata($ids,$data);
        }else{
             $query=$this->loginmodel->logindata($data);
        }
        redirect(base_url().'admin/About', 'refresh');//redirect page link
    }
   	
}
