<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Crowdsale_modal extends CI_Model{
function __construct() {
$this->userTbl = 'user';        
}
public function mmbtucoin_price(){
    $this->db->from('coin_price');
    $this->db->where('id',1);
    $query=$this->db->result()->get();
    return $query;
}
}
?>