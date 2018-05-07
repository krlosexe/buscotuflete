<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('login/login');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$tipo_user  = $this->input->get("tipo_user");
		$username   = $this->input->get("username");
		$email      = $this->input->get("email");
		$password   = $this->input->get("password");

		$this->load->model('Users_model');

		$data = array(
		    'loginUsers'  => $username,
		    'email'       => $email,
		    'passUsers'   => sha1($password),
			'rol_id'      => $tipo_user
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('loginUsers', 'nombre de usuario', 'required|is_unique[users.loginUsers]');

		$this->form_validation->set_rules('email',  'email', 'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_rules('passUsers', 'contraseña', 'required');

		$this->form_validation->set_rules('rol_id', 'tipo de usuario', 'required');



		if ($this->form_validation->run()){
				if ($this->Users_model->save($data)){
					$datos = array('success' => true,
			                       'message' => "Registro exitoso ahora inicie sesion");
				    echo  json_encode($datos);
				}else{
					$datos = array('success' => false,
			                       'message' => "A oucurrido un error");
				    echo  json_encode($datos);
				}

		}else{
			$valid =  form_error("loginUsers", "<span>","</span><br><br>").
					  form_error("email", "<span>","</span><br><br>").
					  form_error("passUsers", "<span>","</span><br><br>").
					  form_error("rol_id", "<span>","</span><br><br>");


			$datos = array('success' => false,
		                   'message' => $valid);

			echo  json_encode($datos);

		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/login/auth.php */