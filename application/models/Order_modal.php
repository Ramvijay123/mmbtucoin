<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_modal extends CI_Model{
function __construct() {
$this->userTbl = 'user';        
}
public function getselldata($data){
    $this->db->from('sell');
    $this->db->where('user_id',$data);
    return $this->db->get()->result();
}
public function getbuydata($data){
    $this->db->from('buy');
    $this->db->where('user_id',$data);
    return $this->db->get()->result();
}
}
?>