<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
                function __construct() {
                    parent::__construct();
                $this->load->helper('url');
                $this->load->library('form_validation');
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
       $query['tokenuser']=$this->Register->getalltoken($userids);
	   $this->load->view('header',$query);
       $this->load->view('sidebar');
		$this->load->view('support',$query);
        $this->load->view('footer');
	} 
    
    public function created_ticket(){
                           function getToken($length){
                             $token = "";
                             $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                             $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                             $codeAlphabet.= "0123456789";
                             $max = strlen($codeAlphabet); // edited
                        
                            for ($i=0; $i < $length; $i++) {
                                $token .= $codeAlphabet[random_int(0, $max-1)];
                            }
                        
                            return $token;
                        }
                        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d');
         $userids=$this->session->userdata('userids');
         $title=$this->input->post('title');
         $problrm_type=$this->input->post('problrm_type');
         $message=$this->input->post('message');
         $token=getToken(8);
         $data=array(
         'user_id'=>$userids,
         'title'=>$title,
         'token'=>$token,
         'problem_type'=>$problrm_type,
         'message	'=>$message,
         'created_date'=>$date,
         'status'=>'0',
         );
         $query=$this->Register->created_token($data);
         if($query){
                $this->session->set_flashdata('login_error', 'Successfully created you token');
                redirect(base_url().'Support/', 'refresh');
         }else{
            $this->session->set_flashdata('login_error', 'Token Cannot be Created..Please Try Again Later');
                redirect(base_url().'Support/', 'refresh');
         }
    }
    public function deleteticket($ids){
        $query=$this->Register->deletetoken($ids);
        $this->session->set_flashdata('login_error', 'Token Successfully Deleted');
        redirect(base_url().'Support/', 'refresh');
        
    } 
    public function insertMessage(){
         $ids=$this->input->post('ids');
         $message=$this->input->post('message');
         date_default_timezone_set('Africa/Nairobi');
         $date = date('Y-m-d');
         $userids=$this->session->userdata('userids');
         $data=array(
         'user_ids'=>$userids,
         'support_id'=>$ids, 
         'message'=>$message,
         'type'=>'user',
         'created_date'=>$date,
         );
          $query=$this->Register->insertMessage($data);
           if($query){
                $this->session->set_flashdata('login_error', 'Successfully send your message');
                redirect(base_url().'Support/', 'refresh');
         }else{
            $this->session->set_flashdata('login_error', 'Cannot be Send..Please Try Again Later');
                redirect(base_url().'Support/', 'refresh');
         }
    }
    public function GetMessage(){
        $support_id=$this->input->post('support_id');
        $query=$this->Register->getMessage($support_id);
        $data_hold='';
        foreach($query as $data_get){
            if($data_get->type=='user'){
                $set_style='';
            }else{
                $set_style='style=float:right';
            }
            $data_hold.='<li '.$set_style.'><p><i class="fa fa-calendar"></i> '.$data_get->created_date.'</p><p>'.$data_get->message.'</p></li>';
        }
        echo $data_hold;
    }
 }