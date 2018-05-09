<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

	public function login($username='', $password='')
	{
		$this->db->where("(users.loginUsers = '$username' OR users.email = '$username')");
		$this->db->where("passUsers", $password);
		$resultados = $this->db->get("users");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}else{
			return false;
		}
	}

	public function getusers()
	{
		$this->db->select('users.*, roles.nombre as tipo_user');
		$this->db->join('roles', 'users.rol_id = roles.id');
		$this->db->from('users');
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function save($data)
	{
		return $this->db->insert('users', $data);
	}

	public function getUser($id)
	{
		$this->db->where('id', $id);
		$resultados = $this->db->get('users');
		return $resultados->row();
	}



	public function update($id, $data)

	{

		$this->db->where('id', $id);

		return $this->db->update('users', $data);

	}




	public function typeDucument()

	{

		$resultados = $this->db->get('type_document');

		return $resultados->result();

	}



	public function getRoles()
	{
		$resultados = $this->db->get('roles');
		return $resultados->result();
	}


	public function getMenus()
	{
		$resultados = $this->db->get('menus');
		return $resultados->result();
	}

	public function insert_permisos($data)
	{
		return $this->db->insert('permisos', $data);
	}


	public function valid_permiso($rol, $menu)
	{
		$this->db->where('menu_id', $menu);
		$this->db->where('rol_id', $rol);
		$resultados  = $this->db->get('permisos');
		return $resultados->row();
	}

	public function update_permiso($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('permisos', $data);
	}
	


	public function getPermisos()
	{
		$this->db->select('p.*, m.nombre as menu, r.nombre as rol');
		$this->db->from('permisos p');
		$this->db->join('roles r', 'p.rol_id = r.id');
		$this->db->join('menus m', 'p.menu_id = m.id');
		$this->db->order_by('r.nombre', 'asc');
		$resultados = $this->db->get();
		return $resultados->result();
	}


	
	public function getPermiso($idpermiso)
	{
		$this->db->select('p.*, m.nombre as menu, m.id as menuid, r.nombre as rol, r.id as rolid');
		$this->db->from('permisos p');
		$this->db->join('roles r', 'p.rol_id = r.id');
		$this->db->join('menus m', 'p.menu_id = m.id');
		$this->db->where('p.id', $idpermiso);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function delete_permiso($id)
	{
		$this->db->where('id', $id);
		$resultado = $this->db->delete('permisos');
		return $resultado;
	}


	public function lastID()
	{
		return $this->db->insert_id();
	}



}



/* End of file users_model.php */

/* Location: ./application/models/users_model.php */