<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Provincias_model extends CI_Model {



	public function getProvincias()

	{

		$resultados = $this->db->get('regiones');

		return $resultados->result();

	}

	public function getComunas(){

		$resultados = $this->db->get('comunas');

		return $resultados->result();

	}

	public function getComuna($id)

	{

		$this->db->where("id_regiones", $id);

		$resultados = $this->db->get('comunas');

		return $resultados->result();

	}



}



/* End of file provincias_model.php */

/* Location: ./application/models/provincias_model.php */