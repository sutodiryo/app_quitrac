<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
    }

    function index(){
        $this->load->view('admin/login');
    }

    public function process(){
        $username   = $this->security->xss_clean($this->input->post('username'));
        $password   = md5($this->security->xss_clean($this->input->post('password')));
        $query      = $this->db->query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'");
        $num_rows   = $query->num_rows();
        $row        = $query->row();

        if ($num_rows == 1) {
            $data_login = array(
                'log_id'        => $row->id_user,
                'log_id_per'    => $row->id_perusahaan,
                'log_name'      => $row->nama,
                'log_username'  => $row->username,
                'log_status'    => $row->status,
                'log_img'       => $row->photo,
                'log_valid'     => true
            );
        $this->session->set_userdata($data_login);
        redirect(base_url('admin'));
    } else {
        $this->session->set_flashdata("error_report", "<h4 class=\"header red lighter bigger\">Username atau Password Salah!</h4>");
        redirect(base_url('login'));
    }
}

public function logout(){
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }
}
