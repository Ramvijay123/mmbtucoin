<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Model{
function __construct() {
$this->userTbl = 'user';        
}
public function userRegister($data){
    $this->db->insert('user',$data);
    return $this->db->insert_id();
}
public function loginCheck($email,$password){
    $this->db->from('user');
    //$this->db->where('email',$email);
    $this->db->where("(email = '$email' OR username = '$email')");
    $this->db->where('password',$password);
    $query = $this->db->get()->result();
    //$resultCount=$query->num_rows();exit;
    //$resultCount=$this->db->count_all_results();
    //return $resultCount;exit;
    if($query){
            $GetRemovalClass=get_object_vars($query[0]);
            $ids=$GetRemovalClass['id'];
            $two_fa=$GetRemovalClass['two_fa'];
            $status=$GetRemovalClass['status'];
            $datasetArray=array("ids"=>$ids,"two_fa"=>$two_fa,"status"=>$status);
            return $datasetArray;
    }else{
        return false;
    }
 }
 public function forgot_password($data){
    $this->db->from('user');
    $this->db->where('email',$data);
    $query=$this->db->get()->result();
    if($query){
            $GetRemovalClass=get_object_vars($query[0]);
            $password=$GetRemovalClass['password'];
            return $password;
    }else{
        return false;
    }
     }
 public function getUserData($data){
    $this->db->from('user');
    $this->db->where('id',$data);
    return $this->db->get()->result();
 }
 public function getpasswordmatch($ids){
    $this->db->from('user');
    $this->db->where('id',$ids);
    $query=$this->db->get()->result();
    $RemovalClass=get_object_vars($query[0]);
    return $password=$RemovalClass['password'];
 }
 public function makeupdatedata($data,$id){
    $this->db->where('id',$id);
    $this->db->update('user',$data);
    return true;

 }

 public function uservarified($ids){

    $data=array('status'=>1);

    $this->db->where('id',$ids);

    $this->db->update('user',$data);

    return true;

 }

 public function mmbtucoin_price(){

   $this->db->from('coin_price');

    return $this->db->get()->result();

}

public function buytoken($data){

    $this->db->insert('buy',$data);

     return $this->db->insert_id();

}
public function tokenstatus($ids,$status){
    $data=array('status'=>$status);
    $this->db->where('id',$ids);
    $this->db->update('buy',$data);
    return true;
}

public function selltoken($data){

    $this->db->insert('sell',$data);

     return $this->db->insert_id();

}

public function updateTokenBlance($update,$userids){

    $this->db->where('id',$userids);

    $this->db->update('user',$update);

    return true;

}

public function created_token($data){

     $this->db->insert('support',$data);

     return $this->db->insert_id();

}

public function getalltoken($userids){

    $this->db->from('support');

     $this->db->where('user_id',$userids);

     $query=$this->db->get()->result();

    return $query;

}

public function deletetoken($ids){

    $this -> db -> where('id', $ids);

  $this -> db -> delete('support');

}

public function ip_detalisget($data){

    $this->db->insert('login_ipdetails',$data);

     return $this->db->insert_id();

}

public function updateIpdetails($dataip,$userids){

     $this->db->where('id',$userids);

    $this->db->update('user',$dataip);

    return true;

}

public function insertMessage($data){

    $this->db->insert('support_message',$data);

     return $this->db->insert_id();

}

public function getMessage($ids){

    $this->db->from('support_message');

     $this->db->where('support_id',$ids);

     $this->db->where('user_ids',$this->session->userdata('userids'));

     $query=$this->db->get()->result();

    return $query;

}

public function checkbalance(){

    $this->db->from('user');

     //$this->db->where('support_id',$ids);

     $this->db->where('id',$this->session->userdata('userids'));

     $query=$this->db->get()->result();

    return $query;

}

public function transfer_insert($data){

    $this->db->insert('transfer_amt',$data);

     return $this->db->insert_id();

}

public function transferUser(){
    $this->db->from('transfer_amt');
     $this->db->where('user_id',$this->session->userdata('userids'));
     $query=$this->db->get()->result();
    return $query;
}
public function depositUser(){
    $this->db->from('deposit_user');
     $this->db->where('user_id',$this->session->userdata('userids'));
     $query=$this->db->get()->result();
    return $query;
}
public function withdrawalUser(){
    $this->db->from('withdrawal_details_bank');
     $this->db->where('user_id',$this->session->userdata('userids'));
     $query=$this->db->get()->result();
    return $query;
}
 public function getalluser(){

    $this->db->from('user');

    return $this->db->get()->result();

 }

 public function deposit_insert($data){

    $this->db->insert('deposit_user',$data);

     return $this->db->insert_id();

 }
 

  public function withdrawal_insert($data){
    $this->db->insert('withdrawal_user',$data);
     return $this->db->insert_id();

 }
    public function tokenstatuspayment($ids,$status){
        $data=array('status'=>$status);
         $this->db->where('id',$ids);
        $this->db->update('deposit_user',$data);
        return true;
    }
    public function addwalletamt($ids){
        $this->db->from('deposit_user');
        $this->db->where('id',$ids);
        $query=$this->db->get()->result();
        $StdClassRemoval=get_object_vars($query[0]);
        $amount=$StdClassRemoval['amount'];
        $ids12=$StdClassRemoval['user_id'];
        
        $this->db->from('user');
        $this->db->where('id',$ids12);
        $query12=$this->db->get()->result();
        $StdClassRemoval12=get_object_vars($query12[0]);
        $blance=$StdClassRemoval12['blance'];
        $ids123=$StdClassRemoval12['id'];
        $amountTotal=$blance+$amount;
        $dataArray=array(
        'blance'=>$amountTotal,
        );
         $this->db->where('id',$ids123);
        $this->db->update('user',$dataArray);
        return true;
    }
    public function withdrawalData($data){
         $this->db->insert('withdrawal_details_bank',$data);
     return $this->db->insert_id();
    }
    public function update_transfer($transfer_from,$transfer_to,$transfer_amount){
        /*subtract start here*/
        $this->db->from('user');
        $this->db->where('wallet_address',$transfer_from);
        $query12=$this->db->get()->result();
        $StdClassRemoval12=get_object_vars($query12[0]);
        $blance=$StdClassRemoval12['blance'];
        $ids123=$StdClassRemoval12['id'];
        $amountTotal=$blance-$transfer_amount;
        $dataArray=array(
        'blance'=>$amountTotal,
        );
         $this->db->where('id',$ids123);
        $this->db->update('user',$dataArray);
        /*subtract end here*/
        /*add start here*/
        $this->db->from('user');
        $this->db->where('wallet_address',$transfer_to);
        $query123=$this->db->get()->result();
        $StdClassRemoval122=get_object_vars($query123[0]);
        $blance12=$StdClassRemoval122['blance'];
        $ids1234=$StdClassRemoval122['id'];
        $amountTotal12=$blance12+$transfer_amount;
        $dataArray1=array(
        'blance'=>$amountTotal12,
        );
         $this->db->where('id',$ids1234);
        $this->db->update('user',$dataArray1);
        return true;
        /*add end here*/
    }
 public function aboutusget(){
    $this->db->from('about_us');
     $query=$this->db->get()->result();
    return $query;
}
 public function tokenget(){
    $this->db->from('ico_token');
     $query=$this->db->get()->result();
    return $query;
}
 public function roadmap(){
    $this->db->from('roadmap');
     $query=$this->db->get()->result();
    return $query;
}
public function faq(){
    $this->db->from('faq');
     $query=$this->db->get()->result();
    return $query;
}
public function team(){
    $this->db->from('team');
     $query=$this->db->get()->result();
    return $query;
}
public function advisors(){
    $this->db->from('advisor');
     $query=$this->db->get()->result();
    return $query;
}
public function newss(){
    $this->db->from('new_section');
     $query=$this->db->get()->result();
    return $query;
}
}

?>