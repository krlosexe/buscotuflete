<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			//$this->valid = $this->valid_perfil->valid();
			//$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
			$this->load->model('provincias_model');
		}
	}

	public function index()
	{
		$id_user  = $this->session->userdata("id");
		$data     = array('user'           => $this->users_model->getUser($id_user),
						  'type_documents' => $this->users_model->typeDucument(),
	                  	  'provincias'     => $this->provincias_model->getProvincias(),
	                  	  'comunas'        => $this->provincias_model->getComunas()
						 // 'valid' => $valid
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/top_menu', $data);
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard/user/profile');
		$this->load->view('layouts/footer');
	}



	public function updatePerfilPersonales($id="")

    {

    	$name1         = $this->input->get("name1");
    	$name2         = $this->input->get("name2");
    	$lastname1     = $this->input->get("lastname1");
    	$lastname2     = $this->input->get("lastname2");
    	$type_document = $this->input->get("type_document");
    	$num_document  = $this->input->get("num_document");
    	$serie         = $this->input->get("serie");
    	$dia           = $this->input->get("dia");
    	$mes           = $this->input->get("mes");
    	$anio          = $this->input->get("anio");


    	$data = array(
			'name1'          => $name1,
			'name2'          => $name2,
			'lastname1'      => $lastname1,
			'lastname2'      => $lastname2,
			'type_document'  => $type_document,
			'num_document'   => $num_document,
			'serie'          => $serie,
		    'dia'            => $dia,
		    'mes'            => $mes,
		    'anio'           => $anio
		);



		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('name1', 'primer nombre', 'required');
		$this->form_validation->set_rules('name2', 'segundo nombre', 'required');
		$this->form_validation->set_rules('lastname1', 'primer apellido', 'required');
		$this->form_validation->set_rules('lastname2', 'segundo apellido', 'required');
		$this->form_validation->set_rules('type_document', 'tipo de documento', 'required');
		$this->form_validation->set_rules('num_document', 'numero de documento', 'required');

		if ($type_document == 2) {
			$this->form_validation->set_rules('serie', 'serie', 'required');
		}

		$this->form_validation->set_rules('dia', 'dia', 'required');
		$this->form_validation->set_rules('mes', 'mes', 'required');
		$this->form_validation->set_rules('anio', 'año', 'required');



		if ($this->form_validation->run()){

			if ($id != "") {
				$id_user = $id;
			}else{
				$id_user = $this->session->userdata("id");
			}



			$datos   = array('id_identidad' => $type_document,
							 'identidad'    => $num_document, 
							 'serie'        => $serie, 
				             'p_nombre'     => $name1,
							 's_nombre'     => $name2,
							 'p_apellido'   => $lastname1,
							 's_apellido'   => $lastname2,
							 'dia_nac'      => $dia,
							 'mes_nac'      => $mes,
						     'ano_nac'      => $anio);



			if ($this->users_model->update($id_user, $datos)) {
        		$errors = array('success' => true,
	                            'message' => 'Datos Actualizados exitosamente');
           		echo  json_encode($errors);
        	}else{
        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}

		}else{

		    $campos = array('name1'         => form_error("name1", "<span class='help-block'>","</span>"),
		                    'name2'         => form_error("name2", "<span class='help-block'>","</span>"),
		                    'lastname1'     => form_error("lastname1", "<span class='help-block'>","</span>"),
		                    'lastname2'     => form_error("lastname2", "<span class='help-block'>","</span>"),
		                    'type_document' => form_error("type_document", "<span class='help-block'>","</span>"),
		                	'num_document'  => form_error("num_document", "<span class='help-block'>","</span>"),
		                	'serie'         => form_error("serie", "<span class='help-block'>","</span>"),
		                    'dia'           => form_error("dia", "<span class='help-block'>","</span>"),
		                	'mes'           => form_error("mes", "<span class='help-block'>","</span>"),
		            		'anio'          => form_error("anio", "<span class='help-block'>","</span>"));



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



    public function updatePerfilContacto($id = "")
    {
    	if ($id != "") {
			$id_user = $id;
		}else{
			$id_user = $this->session->userdata("id");
		}
    	$email         = $this->input->get("email");
    	$telefono_casa = $this->input->get("telefono_casa");
    	$phone         = $this->input->get("phone");

    	$data = array(
			'email'          => $email,
			'telefono_casa'  => $telefono_casa,
			'phone'          => $phone
		);

		$this->form_validation->set_data($data);

    	$userActual = $this->users_model->getUser($id_user);
		if ($email == $userActual->email) {
			$unique="";
		}else{
			$unique = "|is_unique[users.email]";
		}

    	$this->form_validation->set_rules('email', 'email', 'required|valid_email'.$unique);
		$this->form_validation->set_rules('telefono_casa', 'telefono de casa', 'required');
		$this->form_validation->set_rules('phone', 'telefono movil', 'required');


		if ($this->form_validation->run()){
			$datos   = array('email'      => $email,
							 'telefono'   => $telefono_casa, 
				             'celular'    => $phone);


			if ($this->users_model->update($id_user, $datos)) {
        		$errors = array('success' => true,
	                            'message' => 'Datos Actualizados exitosamente');
           		echo  json_encode($errors);
        	}else{
        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}

		}else{

		    $campos = array('email'          => form_error("email", "<span class='help-block'>","</span>"),
		                    'telefono_casa'  => form_error("telefono_casa", "<span class='help-block'>","</span>"),
		                    'phone'     	 => form_error("phone", "<span class='help-block'>","</span>"));



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


    public function updatePerfilLocation($id="")

    {

    	if ($id != "") {
			$id_user = $id;
		}else{
			$id_user = $this->session->userdata("id");
		}

    	$provincias = $this->input->get("provincias");
    	$comunas    = $this->input->get("comunas");
    	$direccion  = $this->input->get("direccion");


    	$data = array(
			'provincias' => $provincias,
			'comunas'    => $comunas,
			'direccion'  => $direccion
		);

		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('provincias', 'region', 'required');
		$this->form_validation->set_rules('comunas', 'comunas', 'required');
		$this->form_validation->set_rules('direccion', 'direccion', 'required');


		if ($this->form_validation->run()){
			$datos   = array('id_region'  => $provincias,
							 'id_comuna'  => $comunas, 
				             'direccion'  => $direccion);

			if ($this->users_model->update($id_user, $datos)) {
        		$errors = array('success' => true,
	                            'message' => 'Datos Actualizados exitosamente');
           		echo  json_encode($errors);
        	}else{
        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}
		}else{

		    $campos = array('provincias' => form_error("provincias", "<span class='help-block'>","</span>"),
		                    'comunas'    => form_error("comunas", "<span class='help-block'>","</span>"),
		                    'direccion'  => form_error("direccion", "<span class='help-block'>","</span>"));

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


    public function getComunas()
    {
    	$id_provincia  = $this->input->get("id");
		$comunas       = $this->provincias_model->getComuna($id_provincia);

		$datos = array();
		foreach ($comunas as $value) {
			$datos["id"]     = $value->id;
			$datos["nombre"] = $value->descripcion;

		}
		echo json_encode($comunas);
    }


}

/* End of file Profile.php */
/* Location: ./application/controllers/user/Profile.php */