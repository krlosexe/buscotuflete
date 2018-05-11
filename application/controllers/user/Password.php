<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

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
		$id_user  = $this->session->userdata("id");
		$data     = array('user'           => $this->users_model->getUser($id_user),
						  'type_documents' => $this->users_model->typeDucument()
						 // 'valid' => $valid
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/top_menu', $data);
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard/user/password');
		$this->load->view('layouts/footer');
	}




	public function updatePass(){
    	$pass  = $this->input->get("pass");
    	$pass1 = $this->input->get("pass1");
    	$pass2 = $this->input->get("pass2");


    	$data = array(
			'pass'  => $pass,
			'pass1' => $pass1,
			'pass2' => $pass2
		);

		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('pass', 'contraseña actual', 'required');
		$this->form_validation->set_rules('pass1', 'nueva contraseña', 'required');
		$this->form_validation->set_rules('pass2', 'repita contraseña', 'required');


		if ($this->form_validation->run()) {
			$id_user = $this->session->userdata("id");
			$user    = $this->users_model->getUser($id_user);

			if ($user->passUsers != sha1($pass))  {
				$datos = array('success' => false,
		                       'message' => "La contraseña actual es incorrecta");
				echo  json_encode($datos);
			}else if ($pass1 != $pass2) {
				$datos = array('success' => false,
		                       'message' => "Las contraseñas no coinciden");
				echo  json_encode($datos);
			}else{
				$datos   = array('passUsers'  => sha1($pass1));

				if ($this->users_model->update($id_user, $datos)) {
        			$errors = array('success' => true,
	                                'message' => 'Contraseña Actualizada exitosamente');
	           		echo  json_encode($errors);
	        	}else{
	        		$datos = array('success' => false,
			                       'message' => 'A ocurrudo un error');
				    echo  json_encode($datos);
	        	}
			}
		}else{

			$campos = array('pass' => form_error("pass", "<span class='help-block'>","</span>"),
		                    'pass1'=> form_error("pass1", "<span class='help-block'>","</span>"),
		                    'pass2'=> form_error("pass2", "<span class='help-block'>","</span>"));

		    $campo = 0;
		    $error = 0;
		    foreach ($campos as $key => $value) {
		    	if ($value != "") {
		    		$campo = $key;
		    		$error = $value;
		    		break;
		    	}
		    }

	    	$datos = array('success' => false,
				           'valid'   => true,
				           'campos'  => $campos,
		                   'message' => "");
			echo  json_encode($datos);
		}
    }

}

/* End of file Password.php */
/* Location: ./application/controllers/user/Password.php */