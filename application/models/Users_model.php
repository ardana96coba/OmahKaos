<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Users_model extends CI_Model
{

	function users_view()
	{
		$sql = "SELECT *
				FROM users as u, level as l
				WHERE 	(u.level_id = l.level_id) ";

				return $this->db->query($sql)->result();
	}

	function users_add($params)
	{

		$this->db->insert('users',$params);
		return $this->db->insert_id();
	}

	function users_delete($users_id)
	{
		return $this->db->delete('users',array('users_id'=>$users_id));
	}

	function users_getid($users_id)
	{
		$sql = "SELECT * FROM users WHERE users_id='$users_id'";

		return $this->db->query($sql)->row_array();
	}

	function users_update($users_id, $params)
	{

		$this->db->where('users_id', $users_id);
		return $this->db->update('users',$params);
	}
	
}
?>