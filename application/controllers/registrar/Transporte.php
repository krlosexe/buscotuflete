<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			//$this->valid = $this->valid_perfil->valid();
			//$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
			$this->load->model('vehiculos_model');
		}
	}
	public function index()
	{
		$id_user  = $this->session->userdata("id");
		$data     = array('user'           => $this->users_model->getUser($id_user),
						  'vehiculos'      => $this->vehiculos_model->getTransportes()
						 // 'valid' => $valid
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/top_menu', $data);
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard/registrar/transporte/list');
		$this->load->view('layouts/footer');
	}

	public function add($value='')
	{
		$id_user  = $this->session->userdata("id");
		$data     = array('user'           => $this->users_model->getUser($id_user),
						  'type_vehiculos' => $this->vehiculos_model->getTypeVehiculos(),
						  'type_capacidad' => $this->vehiculos_model->getTypeCapacidad()
						 // 'valid' => $valid
						);
		$this->load->view('layouts/header');
		$this->load->view('layouts/top_menu', $data);
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard/registrar/transporte/add');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$id_tipo_vehiculo        = $this->input->post("id_tipo_vehiculo");
    	$id_tipo_capacidad_carga = $this->input->post("id_tipo_capacidad_carga");
    	$ano_fabricacion 		 = $this->input->post("ano_fabricacion");
    	$marca  				 = $this->input->post("marca");
    	$modelo 				 = $this->input->post("modelo");
    	$permiso_circulacion 	 = $this->input->post("permiso_circulacion");
    	$revision_tecnica  		 = $this->input->post("revision_tecnica");
    	$seguro_obligatorio 	 = $this->input->post("seguro_obligatorio");
    	$licencia_conducir 	     = $this->input->post("licencia_conducir");
    	$cedula_identidad 		 = $this->input->post("cedula_identidad");

    	$id_user                 = $this->session->userdata("id");
    	$datas = array(
    		'id_users'                => $id_user,
			'id_tipo_vehiculo'        => $id_tipo_vehiculo,
			'id_tipo_capacidad_carga' => $id_tipo_capacidad_carga,
			'ano_fabricacion'	      => $ano_fabricacion,
			'marca'  			      => $marca,
			'modelo'				  => $modelo,
			'permiso_circulacion'     => $permiso_circulacion,
			'revision_tecnica'  	  => $revision_tecnica,
			'seguro_obligatorio'	  => $seguro_obligatorio,
			'licencia_conducir'       => $licencia_conducir,
			'cedula_identidad'        => $cedula_identidad,
		);

		$this->form_validation->set_data($datas);
    	$this->form_validation->set_rules('id_tipo_vehiculo', 'tipo de vehiculo', 'required');
		$this->form_validation->set_rules('id_tipo_capacidad_carga', 'tipo de carga', 'required');
		$this->form_validation->set_rules('ano_fabricacion', 'año de fabricacion', 'required');
		$this->form_validation->set_rules('marca', 'marca', 'required');
		$this->form_validation->set_rules('modelo', 'modelo', 'required');
		

		if ($this->form_validation->run()) {
			$mi_archivo              = 'permiso_circulacion';
	        $config['upload_path']   = "uploads/soportes/transporte";
	        $config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($mi_archivo)){
				//*** ocurrio un error
	            $data['uploadError'] = $this->upload->display_errors();
	            $this->session->set_flashdata('error', $this->upload->display_errors());
	          	$this->add();
	            return;
			}else{
				$foto1 = $this->upload->data();

				$mi_archivo              = 'revision_tecnica';
		        $config['upload_path']   = "uploads/soportes/transporte";
		        $config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload($mi_archivo)){
					//*** ocurrio un error
		            $data['uploadError'] = $this->upload->display_errors();
		            $this->session->set_flashdata('error', $this->upload->display_errors());
		          	$this->add();
		            return;
				}else{
					$foto2 = $this->upload->data();

					$mi_archivo              = 'seguro_obligatorio';
			        $config['upload_path']   = "uploads/soportes/transporte";
			        $config['allowed_types'] = 'gif|jpg|png';
					
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload($mi_archivo)){
						//*** ocurrio un error
			            $data['uploadError'] = $this->upload->display_errors();
			            $this->session->set_flashdata('error', $this->upload->display_errors());
			          	$this->add();
			            return;
					}else{
						$foto3 = $this->upload->data();

						$mi_archivo              = 'licencia_conducir';
				        $config['upload_path']   = "uploads/soportes/transporte";
				        $config['allowed_types'] = 'gif|jpg|png';
						
						$this->load->library('upload', $config);

						if (!$this->upload->do_upload($mi_archivo)){
							//*** ocurrio un error
				            $data['uploadError'] = $this->upload->display_errors();
				            $this->session->set_flashdata('error', $this->upload->display_errors());
				          	$this->add();
				            return;
						}else{
							$foto4 = $this->upload->data();

							$mi_archivo              = 'cedula_identidad';
					        $config['upload_path']   = "uploads/soportes/transporte";
					        $config['allowed_types'] = 'gif|jpg|png';
							
							$this->load->library('upload', $config);

							if (!$this->upload->do_upload($mi_archivo)){
								//*** ocurrio un error
					            $data['uploadError'] = $this->upload->display_errors();
					            $this->session->set_flashdata('error', $this->upload->display_errors());
					          	$this->add();
					            return;
							}else{
								$foto5 = $this->upload->data();
							}
						}
					}
				}
			}


			$db = array(
		    		'id_users'                => $id_user,
					'id_tipo_vehiculo'        => $id_tipo_vehiculo,
					'id_tipo_capacidad_carga' => $id_tipo_capacidad_carga,
					'ano_fabricacion'	      => $ano_fabricacion,
					'marca'  			      => $marca,
					'modelo'				  => $modelo,
					'permiso_circulacion'     => $foto1["file_name"],
					'revision_tecnica'        => $foto2["file_name"],
					'seguro_obligatorio'      => $foto3["file_name"],
					'licencia_conducir'       => $foto4["file_name"],
					'cedula_identidad'        => $foto5["file_name"]
				);

				if ($this->vehiculos_model->save($db)) {
					$this->session->set_flashdata('valid',"Operacion Exitosa");
					redirect(base_url()."registrar/transporte");
				}else{
					$this->session->set_flashdata('valid',"A ocurrido un Error");
					redirect(base_url()."registrar/transporte/add");
				}		
			
			
		}else{
	    	$this->session->set_flashdata('error', validation_errors());
	    	$this->add();
	    	// redirect(base_url()."registrar/transporte/add");
	    	
		}
	}

}

/* End of file Transporte.php */
/* Location: ./application/controllers/solicitudes/Transporte.php */