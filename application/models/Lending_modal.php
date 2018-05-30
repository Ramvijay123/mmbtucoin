<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lending_modal extends CI_Model{
function __construct() {
$this->userTbl = 'user';        
}
public function getselectedpackage($data){
    $this->db->from('lending');
    $this->db->where('package',$data);
    return $this->db->get()->result();
}
public function savedataset($data){
    $this->db->insert('user_package',$data);
    return true;
}
public function getlendingdata($ids){
    $this->db->from('user_package');
    $this->db->where('user_id',$ids);
    return $this->db->get()->result();
}
public function getpackagedata(){
    $this->db->from('lending');
    return $this->db->get()->result();
}
}
?>