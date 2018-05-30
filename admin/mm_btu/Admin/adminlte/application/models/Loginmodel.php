<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function getadmin($user_name){
		$query = $this->db->query(" select * from admin_user where username = '".$user_name."' ");
		$row = $query->row_array();
		return $row;
		
		}
	public function getdatastore($userids){
	   $this->db->from('admin_user');
       $this->db->where('id',$userids);
       return $this->db->get()->result();
	}	
    	public function getUserDetails(){
	   $this->db->from('user');
       return $this->db->get()->result();
	}
	public function deleteUser($ids){
       $this->db->where('id',$ids);
       $this->db->delete('user');
       return true;
	}
    public function getPackage(){
	   $this->db->from('lending');
       return $this->db->get()->result();
	}
    public function addpackagemodal($data){
        $this->db->insert('lending',$data);
        return true;
    }
    public function DeletePackage($ids){
        $this->db->where('id',$ids);
       $this->db->delete('lending');
       return true;
    }
    public function updatepackagequery($ids){
       $this->db->from('lending');
       $this->db->where('id',$ids);
       return $this->db->get()->result();
    }
    public function lendingUpdate($data,$ids){
        $this->db->where('id',$ids);
        $this->db->update('lending',$data);
        return true;
    }
  public function getTicketall(){
       $this->db->from('support');
       return $this->db->get()->result();
    }
     public function getAllUser(){
       $this->db->from('user');
       return $this->db->get()->result();
    }	
     public function DeleteSupport($ids){
        $this->db->where('id',$ids);
       $this->db->delete('support');
       return true;
    }
    public function profileget($userids){
         $this->db->from('admin_user');
         $this->db->where('id',$userids);
       return $this->db->get()->result();
    }
    public function UpdateProfileDetails($data,$ids){
        $this->db->where('id',$ids);
        $this->db->update('admin_user',$data);
        return true;
    }
       public function enableddisabledUser($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('user',$data);
        return true;
    }
    public function getwallettransfer(){
        $this->db->from('transfer_amt');
       return $this->db->get()->result();
    }
    public function getwalletdeposit(){
        $this->db->from('deposit_user');
       return $this->db->get()->result();
    }
    public function getwalletwithdrawal(){
        $this->db->from('withdrawal_details_bank');
       return $this->db->get()->result();
    }
     public function getallfrontuser(){
        $this->db->from('user');
       return $this->db->get()->result();
    }
    public function support_message($id){
        $this->db->from('support_message');
        $this->db->where('support_id',$id);
       return $this->db->get()->result();
    }
    public function insert_support($data){
         $this->db->insert('support_message',$data);
        return true;
    }
     public function logindata($data){
         $this->db->insert('about_us',$data);
        return true;
    }
    public function updatedata($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('about_us',$data);
        return true;
    }
    public function getabout(){
        $this->db->from('about_us');
       return $this->db->get()->result();
    }
    public function insertroadmap($data){
         $this->db->insert('roadmap',$data);
        return true;
    }
     public function roadmapdata(){
        $this->db->from('roadmap');
       return $this->db->get()->result();
    }
     public function updateroadmap($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('roadmap',$data);
        return true;
    }
     public function geticotoken(){
        $this->db->from('ico_token');
       return $this->db->get()->result();
    }
    public function insericodata($data){
         $this->db->insert('ico_token',$data);
        return true;
    }
     public function updateicodata($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('ico_token',$data);
        return true;
    }
     public function getteamtoken(){
        $this->db->from('team');
       return $this->db->get()->result();
    }
    public function inserteamdata($data){
         $this->db->insert('team',$data);
        return true;
    }
     public function updateteamdata($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('team',$data);
        return true;
    }
     public function getfaq(){
        $this->db->from('faq');
       return $this->db->get()->result();
    }
    public function inserfaqdata($data){
         $this->db->insert('faq',$data);
        return true;
    }
     public function updatefaqdata($ids,$data){
        $this->db->where('id',$ids);
        $this->db->update('faq',$data);
        return true;
    }
      public function addadvisormodal($data){
         $this->db->insert('advisor',$data);
        return true;
    }
     public function getadvisor(){
        $this->db->from('advisor');
       return $this->db->get()->result();
    }
     public function editadvisormodal($data,$id){
        $this->db->where('id',$id);
        $this->db->update('advisor',$data);
        return true;
    }
     public function Deleteadvisors($ids){
        $this->db->where('id',$ids);
       $this->db->delete('advisor');
       return true;
    }
     public function addnewmodal($data){
         $this->db->insert('new_section',$data);
        return true;
    }
     public function getnew(){
        $this->db->from('new_section');
       return $this->db->get()->result();
    }
    public function editnewsmodal($data,$id){
        $this->db->where('id',$id);
        $this->db->update('new_section',$data);
        return true;
    }
    public function Deletedeletenews($ids){
        $this->db->where('id',$ids);
       $this->db->delete('new_section');
       return true;
    }
    Public function getcountdatadashboard(){
         $this->db->from('buy');
         $buycoins=$this->db->get()->result();
         $buyHolder='';
         foreach($buycoins as $buy){
            $buyHolder=$buyHolder+$buy->amount;
         }
         $roundBuy=round($buyHolder);
         
         $this->db->from('sell');
         $sellcoins=$this->db->get()->result();
         $sellHolder='';
         foreach($sellcoins as $sell){
            $sellHolder=$sellHolder+$sell->amount;
         }
         $roundSell=round($sellHolder);
          
        $query = $this->db->query('SELECT * FROM user');
        $RegisteredUser=$query->num_rows();
         
        $query1 = $this->db->query("SELECT * FROM user where status='1'");
        $ActiveUser=$query1->num_rows();
        
         $data=array(
         'buyCoin'=>$roundBuy,
         'sellCoin'=>$roundSell,
         'RegisteredCoin'=>$RegisteredUser,
         'ActiveUser'=>$ActiveUser,
         );
         return $data;
    }
}
