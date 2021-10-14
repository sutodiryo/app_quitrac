<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function login($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  
  function cek_id($id)
  {
    $this->db->select('*'); 
    $this->db->from('users');
    $this->db->where('id_user', $id);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function add($data,$table)
  {
    $this->db->insert($table, $data);
  }

  public function get_bcr_row($id_perusahaan)
  {
    $this->db->where('id_perusahaan',$id_perusahaan);
    $query = $this->db->get('bcr');
    return $query->row();
  }

  public function get_question_row($id_question)
  {
    $this->db->where('id_question',$id_question);
    $query = $this->db->get('question');
    return $query->row();
  }

  public function get_matriks_row($id_matriks){
    $this->db->where('id_matriks',$id_matriks);
    $query = $this->db->get('matriks');
    return $query->row();
  }

  public function get_perusahaan_row($id_perusahaan)
  {
    $this->db->where('id_perusahaan',$id_perusahaan);
    $query = $this->db->get('perusahaan');
    return $query->row();
  }

  public function get_bobot_row($id_bobot)
  {
    $this->db->where('id_bobot',$id_bobot);
    $query = $this->db->get('bobot');
    return $query->row();
  }

  public function get_verify_row($id)
  {
    $this->db->where('id_kuisioner',$id);
    $query = $this->db->get('kuisioner');
    return $query->row();
  }

  public function update($where, $data)
  {
    $this->db->update('question', $data, $where);
  }

  public function update_bobot($where, $data)
  {
    $this->db->update('bobot', $data, $where);
  }


  public function update_matriks($where, $data)
  {
    $this->db->update('matriks', $data, $where);
  }
  
  public function update_bcr($where, $data)
  {
    $this->db->update('bcr', $data, $where);
  }

  public function update_perusahaan($where, $data)
  {
    $this->db->update('perusahaan', $data, $where);
  }

  public function update_user($where, $data)
  {
    $this->db->update('users', $data, $where);
  }
}
