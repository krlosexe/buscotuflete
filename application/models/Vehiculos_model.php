<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos_model extends CI_Model {

	public function getTransportes()
	{
		$id_user  = $this->session->userdata("id");
		$this->db->select('transportes.*, tipos_vehiculos.descripcion as tipodevehiculo, tipos_capacidad_cargas.descripcion as tipocapacidadcarga,');
		$this->db->join('tipos_vehiculos', 'tipos_vehiculos.id = transportes.id_tipo_vehiculo');
		$this->db->join('tipos_capacidad_cargas', 'tipos_capacidad_cargas.id = transportes.id_tipo_capacidad_carga');
		$this->db->where('id_users', $id_user);
		$result = $this->db->get('transportes');
		return $result->result();
	}

	public function save($data)
	{
		return  $this->db->insert('transportes', $data);

	}


	public function getTypeVehiculos()
	{
		$result = $this->db->get('tipos_vehiculos');
		return $result->result();
	}


	public function getTypeCapacidad()
	{
		$result = $this->db->get('tipos_capacidad_cargas');
		return $result->result();
	}


	

	

}

/* End of file Vehiculos_model.php */
/* Location: ./application/models/Vehiculos_model.php */