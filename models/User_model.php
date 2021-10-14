<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	public function __construct(){
    parent::__construct();
}  

public function add($data){
    $this->db->insert('questionnaire', $data);
}

public function update($where, $data){
    $this->db->update('questionnaire', $data, $where);
}

}
