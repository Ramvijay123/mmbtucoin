<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Security_modal extends CI_Model{
function __construct() {
$this->userTbl = 'user';        
}
public function enableSecurity($data){
    $this->db->where('id',$this->session->userdata('userids'));
    $this->db->update('user',$data);
    return true;
}
public function forgotSecurity($dataSet,$data){
    $this->db->where('id',$data);
    $this->db->update('user',$dataSet);
    return true;
}
}
?>