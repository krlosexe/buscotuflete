<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			//$this->valid = $this->valid_perfil->valid();
			//$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
		}

	}
	public function index()
	{
		// $this->load->helper('cookie');
		// echo $this->input->cookie('user');
		// $control  = $this->permisos;
		// $valid    = $this->valid;
		// $opciones = array('opciones'   => $control["opciones"]);
		$id_user  = $this->session->userdata("id");
		$data     = array('user'  => $this->users_model->getUser($id_user),
						 // 'valid' => $valid
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/top_menu', $data);
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard/dashboard');
		$this->load->view('layouts/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */