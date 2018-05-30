<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lending extends CI_Controller {
    function __construct() {
        parent::__construct();
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Lending_modal'); 
    $this->load->model('Register');
    $this->load->library('session');
    }
  public function index(){
       $userids=$this->session->userdata('userids');
           if(!$userids){
                redirect(base_url().'login', 'refresh');//redirect page link
           }
       $query['userdata']=$this->Register->getUserData($userids);
       $query['packageall']=$this->Lending_modal->getlendingdata($userids);
       $query['package']=$this->Lending_modal->getpackagedata();
	   $this->load->view('header',$query);
        $this->load->view('sidebar');
    $this->load->view('lending');
    $this->load->view('footer',$query);
  }
 public function getpackage(){
    $package=$this->input->post('package');
    $dataget=$this->Lending_modal->getselectedpackage($package);
    $holdHtml='';
    foreach($dataget as $data){
        $rangefrom=$data->rangefrom;
        $rangeto=$data->rangeto;
        $amount=$data->amount;
        $interest=$data->interest;
        $period_time=$data->period_time;
        $range_ids=$data->id;
        $showrange=$rangefrom.' - '.$rangeto;
        $holdHtml.='<tr>
                    <td>'.$showrange.'</td>
                    <td>'.$interest.'</td>
                    <td>'.$period_time.'</td>
                    <td><input type="checkbox" data-period="'.$period_time.'" data-interest="'.$interest.'" class="selectthis idthis_'.$range_ids.'" value="'.$range_ids.'" name="selectthis"/></td>
                  </tr>';
    }
    echo $holdHtml;
 }
 public function saveuserpackage(){
    $userids=$this->session->userdata('userids');
    $package_id=$this->input->post('dataplanid');
    $amount_entered=$this->input->post('amount_entered');
    $amount_interest=$this->input->post('amount_interest');
    $time_period=$this->input->post('time_period');
    date_default_timezone_set('Australia/Melbourne');
    $date = date('Y-m-d');
    $expire_timestamp = strtotime(date("Y-m-d", strtotime($date)) . " +".$time_period."days");
    $expire_time=date('Y-m-d',$expire_timestamp);
      $data=array(
      'user_id'=>$userids,
      'mmbtu_amt'=>$amount_entered,
      'package_type'=>$package_id,
      'created_dare'=>$date,
      'expire_time'=>$expire_time,
      'interset'=>$amount_interest,
      );
      $queryset=$this->Lending_modal->savedataset($data);
      redirect(base_url().'lending', 'refresh');//redirect page link
 }
}