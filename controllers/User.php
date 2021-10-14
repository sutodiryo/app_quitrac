<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public function observasi(){
		$id_perusahaan 		= $this->session->userdata('log_id_per');
		$data['page']   	= 'Observasi Penerapan Teknologi';
		$data['question'] 	= $this->db->query("SELECT (SELECT observasi FROM questionnaire WHERE id_question = question.id_question AND id_perusahaan = '$id_perusahaan') AS
														observasi,
														id_question,
														question,
														name,
														category,
														status 
														FROM question WHERE status = 0")->result();
		$this->load->view('user/observasi', $data);
	}

	public function quiz(){
		$id_perusahaan 		= $this->session->userdata('log_id_per');
		$data['page']   	= 'Form Kuesioner';
		$data['question'] 	= $this->db->query("SELECT (SELECT quiz FROM questionnaire WHERE id_question = question.id_question AND id_perusahaan = '$id_perusahaan') AS
														quiz,
														id_question,
														question,
														option_1,
														option_2,
														option_3,
														option_4,
														option_5,
														option_6,
														name,
														category,
														status
														FROM question WHERE status = 0")->result();
		$this->load->view('user/quiz', $data);
	}

	public function add_o(){
		$data = array(
			'id_perusahaan' => $this->input->post('id_perusahaan'),
			'id_question'   => $this->input->post('id_question'),
			'observasi'     => $this->input->post('observasi')
		);
		$this->User_model->add($data);
		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data observasi telah disimpan...</div>");
	redirect('user/observasi');
	}

	public function update_o(){
		
		$observasi 		= $this->input->post('observasi');
		$id_perusahaan	= $this->input->post('id_perusahaan');
		$id_question 	= $this->input->post('id_question');

		$this->db->query("UPDATE questionnaire SET observasi='$observasi' WHERE id_perusahaan=$id_perusahaan AND id_question=$id_question");

		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data observasi telah diupdate...</div>");
	
	redirect('user/observasi');
	}

	public function update_o_admin(){
		
		$observasi 		= $this->input->post('observasi');
		$id_perusahaan	= $this->input->post('id_perusahaan');
		$id_question 	= $this->input->post('id_question');

		$this->db->query("UPDATE questionnaire SET observasi='$observasi' WHERE id_perusahaan=$id_perusahaan AND id_question=$id_question");

		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data observasi telah diupdate...</div>");
	
	redirect('admin/justifikasi');
	}

	public function add_q(){
		$data = array(
			'id_perusahaan' => $this->input->post('id_perusahaan'),
			'id_question'   => $this->input->post('id_question'),
			'quiz'     		=> $this->input->post('quiz')
		);
		$this->User_model->add($data);
		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data quiz telah disimpan...</div>");
	redirect('user/quiz');
	}

	public function update_q(){

		$quiz 			= $this->input->post('quiz');
		$id_perusahaan	= $this->input->post('id_perusahaan');
		$id_question 	= $this->input->post('id_question');

		$this->db->query("UPDATE questionnaire SET quiz='$quiz' WHERE id_perusahaan=$id_perusahaan AND id_question=$id_question");

		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data quiz telah diupdate...</div>");
	
	redirect('user/quiz');
	}



	public function add_obs(){

		$data['id_kuisioner']   = $this->input->post('id_kuisioner');
		$data['id_perusahaan']  = $this->input->post('id_perusahaan');
		$data['id_user']	  	= $this->input->post('id_user');
		$data['order_1_obs']    = $this->input->post('order_1_obs');
		$data['order_2_obs']    = $this->input->post('order_2_obs');
		$data['order_3_obs']    = $this->input->post('order_3_obs');
		$data['order_4_obs']    = $this->input->post('order_4_obs');
		$data['timbang_1_obs']  = $this->input->post('timbang_1_obs');
		$data['timbang_2_obs']  = $this->input->post('timbang_2_obs');
		$data['timbang_3_obs']  = $this->input->post('timbang_3_obs');
		$data['timbang_4_obs']  = $this->input->post('timbang_4_obs');
		$data['timbang_5_obs']  = $this->input->post('timbang_5_obs');
		$data['sortir_1_obs']   = $this->input->post('sortir_1_obs');
		$data['sortir_2_obs']   = $this->input->post('sortir_2_obs');
		$data['sortir_3_obs']   = $this->input->post('sortir_3_obs');
		$data['sortir_4_obs']   = $this->input->post('sortir_4_obs');
		$data['sortir_5_obs']   = $this->input->post('sortir_5_obs');
		$data['kemas_1_obs']   	= $this->input->post('kemas_1_obs');
		$data['kemas_2_obs']   	= $this->input->post('kemas_2_obs');
		$data['kemas_3_obs']   	= $this->input->post('kemas_3_obs');
		$data['kemas_4_obs']   	= $this->input->post('kemas_4_obs');
		$data['kemas_5_obs']   	= $this->input->post('kemas_5_obs');
		$data['simpan_1_obs']   = $this->input->post('simpan_1_obs');
		$data['simpan_2_obs']   = $this->input->post('simpan_2_obs');
		$data['simpan_3_obs']   = $this->input->post('simpan_3_obs');
		$data['simpan_4_obs']   = $this->input->post('simpan_4_obs');
		$data['simpan_5_obs']   = $this->input->post('simpan_5_obs');
		$data['kirim_1_obs']   	= $this->input->post('kirim_1_obs');
		$data['kirim_2_obs']   	= $this->input->post('kirim_2_obs');
		$data['kirim_3_obs']   	= $this->input->post('kirim_3_obs');
		$data['kirim_4_obs']   	= $this->input->post('kirim_4_obs');
		$data['kirim_5_obs']   	= $this->input->post('kirim_5_obs');
		
		$this->User_model->save($data);

		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data telah disimpan...</div>");
    redirect('user/observasi');
	}

	public function kuesioner(){
		$data['page']    	= 'Form Kuesioner';
		$id_perusahaan 		= $this->session->userdata('log_id_per');
    	
		$data['question']   = $this->db->query('SELECT * FROM question')->result();
		$data['perusahaan'] = $this->db->query('SELECT * FROM perusahaan')->result();
		$data['kuisioner']  = $this->db->query("SELECT * FROM kuisioner WHERE id_perusahaan = $id_perusahaan")->result();
		$this->load->view('user/kuesioner', $data);
	}

	public function ajax_edit_kuisioner($id_perusahaan){
		$data = $this->db->query("SELECT (SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = users.id_perusahaan) AS nama_perusahaan, FROM users WHERE id_user = '$id_user'")->row();
		echo json_encode($data);
	}

	public function add_kuesioner(){
		$data = array(

			'order_1'   => $this->input->post('order_1'),
			'order_2'   => $this->input->post('order_2'),
			'order_3'   => $this->input->post('order_3'),
			'order_4'   => $this->input->post('order_4'),
			'timbang_1' => $this->input->post('timbang_1'),
			'timbang_2' => $this->input->post('timbang_2'),
			'timbang_3' => $this->input->post('timbang_3'),
			'timbang_4' => $this->input->post('timbang_4'),
			'timbang_5' => $this->input->post('timbang_5'),
			'sortir_1'  => $this->input->post('sortir_1'),
			'sortir_2'  => $this->input->post('sortir_2'),
			'sortir_3'  => $this->input->post('sortir_3'),
			'sortir_4'  => $this->input->post('sortir_4'),
			'sortir_5'  => $this->input->post('sortir_5'),
			'kemas_1'   => $this->input->post('kemas_1'),
			'kemas_2'   => $this->input->post('kemas_2'),
			'kemas_3'   => $this->input->post('kemas_3'),
			'kemas_4'   => $this->input->post('kemas_4'),
			'kemas_5'   => $this->input->post('kemas_5'),
			'simpan_1'  => $this->input->post('simpan_1'),
			'simpan_2'  => $this->input->post('simpan_2'),
			'simpan_3'  => $this->input->post('simpan_3'),
			'simpan_4'  => $this->input->post('simpan_4'),
			'simpan_5'  => $this->input->post('simpan_5'),
			'kirim_1'   => $this->input->post('kirim_1'),
			'kirim_2'   => $this->input->post('kirim_2'),
			'kirim_3'   => $this->input->post('kirim_3'),
			'kirim_4'   => $this->input->post('kirim_4'),
			'kirim_5'   => $this->input->post('kirim_5')

        );
		$this->User_model->update(array('id_perusahaan' => $this->input->post('id_perusahaan')), $data);		
		$this->session->set_flashdata("report", "<div class=\"alert alert-block alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"ace-icon fa fa-times\"></i></button><i class=\"ace-icon fa fa-check green\"></i> Data telah disimpan...</div>");
		redirect('user/kuesioner');
	}

  public function list_data($id){
    $data['page']  = 'List Data';
    $data['question']  	= $this->db->query("SELECT id_question,question FROM question WHERE status = 0")->result();
    $data['data']  		= $this->db->query("SELECT * FROM kuisioner WHERE id_perusahaan = $id")->result();
    $this->load->view('user/list_data',$data);
  }

}


