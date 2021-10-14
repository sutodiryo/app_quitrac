<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('log_valid') == FALSE) {
			redirect(base_url('login'));
		}
    $this->load->model("Admin_model");
    
	}

  public function index(){
    $data['page']    = 'Dashboard';
    $data['total']   = $this->db->query("SELECT * FROM perusahaan")->num_rows();
    $data['teliti']  = $this->db->query("SELECT * FROM perusahaan WHERE status = 2")->num_rows();
    $data['refer']   = $this->db->query("SELECT * FROM perusahaan WHERE status = 1")->num_rows();
    $this->load->view('admin/index',$data);
  }
  
  public function user(){
    $data['page']       = 'Daftar Pengguna';
    $data['perusahaan'] = $this->db->query("SELECT * FROM perusahaan WHERE id_perusahaan != 5 ORDER BY status DESC")->result();
    //$data['users']      = $this->db->query("SELECT * FROM users INNER JOIN perusahaan ON users.id_perusahaan = perusahaan.id_perusahaan WHERE id_user != 1 ORDER BY users.status DESC")->result();
    $query  = "SELECT (SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = users.id_perusahaan) AS nama_perusahaan,
                      id_user,id_perusahaan,jabatan,username,password,nama,no_hp,email,photo,status FROM users WHERE id_user != 1 ORDER BY status DESC";
    $data['users']      = $this->db->query($query)->result();
    $this->load->view('admin/user',$data);
  }

  public function ajax_user($id_user){
    $data = $this->db->query("SELECT (SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = users.id_perusahaan) AS nama_perusahaan,id_user,id_perusahaan,jabatan,username,password,nama,no_hp,email,photo,status FROM users WHERE id_user = '$id_user'")->row();
    echo json_encode($data);
  }

  public function add_user(){
    $data = array(
        'id_perusahaan'  => $this->input->post('id_perusahaan'),
        'jabatan'        => $this->input->post('jabatan'),
        'username'       => $this->input->post('username'),
        'password'       => md5($this->security->xss_clean($this->input->post('password'))),
        'nama'           => $this->input->post('nama'),
        'no_hp'          => $this->input->post('no_hp'),
        'email'          => $this->input->post('email'),
        'photo'          => $this->input->post('photo'),
        'status'         => $this->input->post('status')
        );
    $this->Admin_model->add($data,'users');

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Pengguna baru berhasil ditambahkan...</div>");
    redirect('admin/user');
  }
  
  public function update_user(){
    $data = array(
        'username'       => $this->input->post('username'),
        'nama'           => $this->input->post('nama'),
        'no_hp'          => $this->input->post('no_hp'),
        'email'          => $this->input->post('email'),
        'id_perusahaan'  => $this->input->post('id_perusahaan'),
        'jabatan'        => $this->input->post('jabatan')
      );
    $this->Admin_model->update_user(array('id_user' => $this->input->post('id_user')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> User Data Successfully Updated...</div>");
    redirect('admin/user');
  }

  public function nonaktif_user($id_user){
    $data = array(
      'status' => 0
      );
    $this->Admin_model->update_user(array('id_user' => $id_user), $data);
    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> User Dinonaktifkan...</div>");
    redirect('admin/user');
  }

  public function aktif_user($id_user){
    $data = array(
      'status' => 1
      );
    $this->Admin_model->update_user(array('id_user' => $id_user), $data);
    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> User Diaktifkan...</div>");
    redirect('admin/user');
  }

  public function perusahaan(){
    $data['page']       = 'Daftar Perusahaan';
    $data['perusahaan'] = $this->db->query("SELECT * FROM perusahaan WHERE id_perusahaan != 5 ORDER BY status DESC")->result();
    $data['diukur']     = $this->db->query("SELECT * FROM perusahaan WHERE status = 2 AND id_perusahaan != 5")->result();
    $data['referensi']  = $this->db->query("SELECT * FROM perusahaan WHERE status = 1 AND id_perusahaan != 5")->result();
    $data['nonaktif']   = $this->db->query("SELECT * FROM perusahaan WHERE status = 0 AND id_perusahaan != 5")->result();
    $this->load->view('admin/perusahaan',$data);
  }

  public function add_perusahaan(){
    $data = array(
      'nama_perusahaan' => $this->input->post('nama_perusahaan'),
      'keterangan'      => $this->input->post('keterangan'),
      'status'          => $this->input->post('status')
      );
    $this->Admin_model->add($data,'perusahaan');

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Perusahaan baru berhasil ditambahkan...</div>");
    redirect('admin/perusahaan');
  }

  public function ajax_perusahaan($id_perusahaan){
    $data = $this->Admin_model->get_perusahaan_row($id_perusahaan);
    echo json_encode($data);
  }

  public function edit_perusahaan(){
    $data = array(
        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
        'status'          => $this->input->post('status'),
        'keterangan'      => $this->input->post('keterangan')
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $this->input->post('id_perusahaan')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data Successfully Updated...</div>");
    redirect('admin/perusahaan');
  }

  public function set_diukur(){
    $data = array(
        'status'   => 0
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $this->input->post('id_perusahaan')), $data);

    $data = array(
        'status'   => 2
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $this->input->post('id_perusahaan_d')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data Successfully Updated...</div>");
    redirect('admin/perusahaan');
  }

  public function set_referensi(){
    $data = array(
        'status'       => 0
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $this->input->post('id_perusahaan')), $data);

    $data = array(
        'status'       => 1
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $this->input->post('id_perusahaan_r')), $data);


    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Perusahaan diaktifkan...</div>");
    redirect('admin/perusahaan');
  }

  public function nonaktif_perusahaan($id_perusahaan){
    $data = array(
        'status'       => 0
      );
    $this->Admin_model->update_perusahaan(array('id_perusahaan' => $id_perusahaan), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Perusahaan dinonaktifkan...</div>");
    redirect('admin/perusahaan');
  }



//KUISIONER
  public function derajat_kecanggihan(){
    $data['page'] = 'Derajat Kecanggihan';

    $data['dk']  = $this->db->query("SELECT quiz,
                                            (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                            derajat,
                                            (SELECT category FROM question WHERE id_question = questionnaire.id_question) AS
                                            category,
                                            (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) AS
                                            komponen,
                                            id_perusahaan,
                                            id_question
                                            FROM questionnaire
                                            WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 2)
                                            ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['dk2'] = $this->db->query("SELECT quiz,
                                            (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                            derajat
                                            FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 1)
                                            ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['matriks'] = $this->db->query("SELECT * FROM matriks")->result();
    
    $this->load->view('admin/_dk',$data);
  }

  public function tcc(){        
    $data['page']   = 'Nilai TCC';
    
    $data['diukur']     = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE status = 2")->result();
    $data['referensi']  = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE status = 1")->result();
    $data['tcc1']  = $this->db->query("SELECT quiz,
                                              (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                              derajat,
                                              (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) AS
                                              komponen
                                              FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 2)
                                              ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['tcc2']  = $this->db->query("SELECT quiz,
                                              (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                              derajat,
                                              (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) AS
                                              komponen
                                              FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 1)
                                              ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['bobot']  = $this->db->query("SELECT * FROM bobot")->result();

    $data['techno_1'] = $this->db->query("SELECT order_1 as a1, timbang_1 as b1, sortir_1 as c1, kemas_1 as d1, simpan_1 as e1, kirim_1 as f1 FROM kuisioner WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 2)")->result();

    $this->load->view('admin/_tcc',$data);
  }


	public function radar(){
    $data['page']           = 'Radar Diagram';
    
    $data['p1']             = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE status = 2")->result();
    $data['p2']             = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE status = 1")->result();

    $data['perusahaan_1']   = $this->db->query("SELECT quiz FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 2) 
                                                ORDER BY
                                                (SELECT id_category FROM question WHERE id_question = questionnaire.id_question) ASC,
                                                (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    $data['perusahaan_2']   = $this->db->query("SELECT quiz FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 1) ORDER BY (SELECT id_category FROM question WHERE id_question = questionnaire.id_question)")->result();
    $this->load->view('admin/_rdr',$data);
  }

  public function justifikasi(){
    $data['page']  = 'Justifikasi Investasi';

    $data['js1'] = $this->db->query("SELECT quiz,
                                            (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                            derajat,
                                            (SELECT category FROM question WHERE id_question = questionnaire.id_question) AS
                                            category,
                                            (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) AS
                                            komponen,
                                            id_perusahaan,
                                            id_question
                                            FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 2)
                                            ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['js2'] = $this->db->query("SELECT quiz,
                                            (SELECT derajat FROM matriks WHERE nilai = questionnaire.quiz AND komponen = (SELECT komponen FROM question WHERE id_question = questionnaire.id_question)) AS
                                            derajat,
                                            (SELECT category FROM question WHERE id_question = questionnaire.id_question) AS
                                            category,
                                            (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) AS
                                            komponen,
                                            id_perusahaan,
                                            id_question
                                            FROM questionnaire WHERE id_perusahaan IN (SELECT id_perusahaan FROM perusahaan WHERE status = 1)
                                            ORDER BY (SELECT komponen FROM question WHERE id_question = questionnaire.id_question) ASC, (SELECT category FROM question WHERE id_question = questionnaire.id_question) ASC")->result();
    
    $data['matriks'] = $this->db->query("SELECT * FROM matriks")->result();

    $this->load->view('admin/_jst',$data);
  }

  public function get_observasi($id_perusahaan,$id_question){
    $data = $this->db->query("SELECT  id_perusahaan,
                                      id_question,
                                      observasi,
                                      (SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = questionnaire.id_perusahaan) AS
                                      nama_perusahaan
                                      FROM questionnaire WHERE id_perusahaan = $id_perusahaan AND id_question = $id_question")->row();
    echo json_encode($data);
  }

  public function verify($id){
    $data = $this->Admin_model->get_verify_row($id);
    echo json_encode($data);
  }

  public function add_verify(){
    $data = array(
        'id_perusahaan' => $this->input->post('id_perusahaan_1'),
        'tabel'         => $this->input->post('tabel_1'),
        'verifikasi'    => $this->input->post('verifikasi_1')
        );
    $this->Admin_model->add($data,'verifikasi');

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> New Verification Successfully Added...</div>");
    redirect('admin/justifikasi');
  }
//END VERIFY

  public function bcr(){
    $data['page']         = 'Perhitungan Benefit Cost Ratio ';
    $data['perusahaan']   = $this->db->query("SELECT nama_perusahaan FROM perusahaan WHERE status=2")->result();
    $data['bcr']          = $this->db->query("SELECT * FROM bcr WHERE id_perusahaan = (SELECT id_perusahaan FROM perusahaan WHERE status=2)")->result();
    $this->load->view('admin/_bcr',$data);
  }

  public function get_bcr($id_perusahaan){
    $data = $this->Admin_model->get_bcr_row($id_perusahaan);
    echo json_encode($data);
  }

  public function act_add_bcr(){
    $query = $this->db->query("SELECT id_perusahaan FROM perusahaan WHERE status=2")->result();
    foreach ($query as $row) {
      $id_perusahaan = $row->id_perusahaan;
    };
    $data = array(
        'id_perusahaan' => $id_perusahaan,
        'bs'            => $this->input->post('bs'),
        'btk'           => $this->input->post('btk'),
        'be'            => $this->input->post('be'),
        'bi'            => $this->input->post('bi'),
        'ce'            => $this->input->post('ce'),
        'ci'            => $this->input->post('ci'),
        'cx'            => $this->input->post('cx'),
        'cm'            => $this->input->post('cm'),
        'com'           => $this->input->post('com'),
        'sv'            => $this->input->post('sv'),
        'n'             => $this->input->post('n'),
        'i'             => $this->input->post('i')
        );
    $this->Admin_model->add($data,'bcr');

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data telah disimpan...</div>");
    redirect('admin/bcr');
  }

  public function act_update_bcr(){
    $data = array(
      'bs'            => $this->input->post('bs'),
      'btk'           => $this->input->post('btk'),
      'be'            => $this->input->post('be'),
      'bi'            => $this->input->post('bi'),
      'ce'            => $this->input->post('ce'),
      'ci'            => $this->input->post('ci'),
      'cx'            => $this->input->post('cx'),
      'cm'            => $this->input->post('cm'),
      'com'           => $this->input->post('com'),
      'sv'            => $this->input->post('sv'),
      'n'             => $this->input->post('n'),
      'i'             => $this->input->post('i')
      );
    $this->Admin_model->update_bcr(array('id_perusahaan' => $this->input->post('id_perusahaan')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data Successfully Updated...</div>");
    redirect('admin/bcr');
  }

  public function get_order($id_perusahaan, $id_perusahaan2){
    $order = $this->db->query("SELECT order_1), order_2), order_3), order_4) FROM kuisioner WHERE id_perusahaan = $id_perusahaan")->result();
    echo json_encode($order);
  }

  public function radar_detail($id){
    if ($this->session->userdata('log_valid') == TRUE &&  $this->session->userdata('log_level') == "admin"){
      $data = $this->db->query("SELECT username,name FROM users ORDER BY id_user ASC")->result();
      foreach ($data as $d) {
        $username[] = $d->username." - ".$d->name;
      }
      echo json_encode($username); 
    } else {
      
    }
  }

  public function survey(){
    $data['page']       = 'Hasil Survey';
    $data['perusahaan'] = $this->db->query("SELECT * FROM questionnaire")->result();
    $this->load->view('admin/_survey',$data);
  }

//matriks
  public function matriks(){
    $data['page']         = 'Matriks Komponen Teknologi';
    $data['infoware']     = $this->db->query("SELECT * FROM matriks WHERE komponen = 1")->result();
    $data['orgaware']     = $this->db->query("SELECT * FROM matriks WHERE komponen = 2")->result();
    $data['technoware']   = $this->db->query("SELECT * FROM matriks WHERE komponen = 3")->result();    
    $data['humanware']    = $this->db->query("SELECT * FROM matriks WHERE komponen = 4")->result();
    
    $this->load->view('admin/matriks',$data);
  }

  public function ajax_matriks($id_matriks){
    $data = $this->Admin_model->get_matriks_row($id_matriks);
    echo json_encode($data);
  }

  public function act_update_matriks(){
    $data = array(
        'derajat'   => $this->input->post('derajat')
      );
    $this->Admin_model->update_matriks(array('id_matriks' => $this->input->post('id_matriks')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data Successfully Edited...</div>");
    redirect('admin/matriks');
  }
//matriks end

//bobot
  public function bobot(){
    $data['page']    = 'Pengaturan Bobot';
    $data['bobot']   = $this->db->query("SELECT * FROM bobot")->result(); 
    $this->load->view('admin/bobot',$data);
  }

  public function ajax_bobot($id_bobot){
    $data = $this->Admin_model->get_bobot_row($id_bobot);
    echo json_encode($data);
  }

    public function update_bobot(){
    $data = array(
        'variabel'      => $this->input->post('variabel'),
        'nilai'         => $this->input->post('nilai'),
        'keterangan'    => $this->input->post('keterangan')
        );
    $this->Admin_model->update_bobot(array('id_bobot' => $this->input->post('id_bobot')), $data);

    $this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Bobot berhasil diupdate...</div>");
    redirect('admin/bobot');
  }
//bobot end

//kuesioner
  public function question(){
    $data['page']       = 'Edit Pertanyaan Kuesioner';
    $data['question']   = $this->db->query("SELECT  id_question,id_category,question,option_1,option_2,option_3,option_4,option_5,option_6,name,komponen,category,status,
                                                    (SELECT nama_category FROM category WHERE id_category = question.id_category) AS
                                                    nama_category
                                                    FROM question")->result();
    $data['category']   = $this->db->query("SELECT * FROM category")->result();
    
    $this->load->view('admin/question',$data);
  }

  public function ajax_question($id_question){
    $data = $this->Admin_model->get_question_row($id_question);
    echo json_encode($data);
  }

  public function act_add(){
    $data = array(
        'question'     => $this->input->post('question'),
        'option_1'     => $this->input->post('option_1'),
        'option_2'     => $this->input->post('option_2'),
        'option_3'     => $this->input->post('option_3'),
        'option_4'     => $this->input->post('option_4'),
        'option_5'     => $this->input->post('option_5'),
        'option_6'     => $this->input->post('option_6'),
        'name'         => $this->input->post('name'),
        'category'     => $this->input->post('category')
        );
    $this->Admin_model->add($data,'question');

    $this->session->set_flashdata("sucess_report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> New Question Successfully Added...</div>");
    redirect('admin/edit_kuesioner');
  }

  public function act_update(){
    $data = array(
        'question'     => $this->input->post('question'),
        'option_1'     => $this->input->post('option_1'),
        'option_2'     => $this->input->post('option_2'),
        'option_3'     => $this->input->post('option_3'),
        'option_4'     => $this->input->post('option_4'),
        'option_5'     => $this->input->post('option_5'),
        'option_6'     => $this->input->post('option_6'),
        'name'         => $this->input->post('name'),
        'category'     => $this->input->post('category')
        );
    $this->Admin_model->update(array('id_question' => $this->input->post('id_question')), $data);

    $this->session->set_flashdata("sucess_report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Question Successfully Updated...</div>");
    redirect('admin/edit_kuesioner');
  }
//kuesioner end
}