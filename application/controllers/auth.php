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
		$username   = $this->input->get("username");
		$email      = $this->input->get("email");
		$password   = $this->input->get("password");

		$this->load->model('Users_model');

		$data = array(
		    'loginUsers'  => $username,
		    'email'       => $email,
		    'passUsers'   => sha1($password),
			'rol_id'      => 2
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('loginUsers', 'nombre de usuario', 'required|is_unique[users.loginUsers]');

		$this->form_validation->set_rules('email',  'email', 'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_rules('passUsers', 'contraseña', 'required');




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
					  form_error("passUsers", "<span>","</span><br><br>");


			$datos = array('success' => false,
		                   'message' => $valid);

			echo  json_encode($datos);

		}
	}


	public function login()
	{
		$this->load->model('Users_model');
		$username = $this->input->get("username");
		$password = $this->input->get("password");

		$data = array(
			'user'      => $username,
		    'password'  => $password
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('user', 'usuario', 'required');
		$this->form_validation->set_rules('password', 'contraseña', 'required');

		if ($this->form_validation->run()){
			$res      = $this->Users_model->login($username, sha1($password));
			if (!$res) {
				$datos = array('success' => false,
	                           'message' => "Usuario o Contraseña incorrecto");
		   		 echo  json_encode($datos);
			}else{
				$data_login = array('id'        => $res->id,
				 					'name_user' => $res->loginUsers,
				 					'login'     => TRUE,
				 				    'rol'       => $res->rol_id);
				$this->session-> set_userdata($data_login);
				$datos = array('success' => true,
	                           'message' => "Bienvenido");
		   		 echo  json_encode($datos);
			}

		}else{
			$valid =  form_error("user", "<span>","</span><br><br>").
					  form_error("password", "<span>","</span><br><br>");

			$datos = array('success' => false,
				           'valid'   => true,
		                   'message' => $valid);

			echo  json_encode($datos);
		}
	}

	public function loguot()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/login/auth.php */