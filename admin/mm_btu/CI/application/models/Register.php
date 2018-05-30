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
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $query = $this->db->get()->result();
    if($query){
            $GetRemovalClass=get_object_vars($query[0]);
            $ids=$GetRemovalClass['id'];
            return $ids;
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
}
?>