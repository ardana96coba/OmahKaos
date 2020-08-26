<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Login_model extends CI_Model
{

	function cek_login_users($username, $password)
	{
		$sql = "SELECT *
				FROM admin AS a 
				WHERE 	(a.admin_username = '$username') AND 
						(a.admin_password = '$password') ";
				return $this->db->query($sql)->num_rows();
	}

	function get_data_users($username, $password)
	{
		$sql = "SELECT *
				FROM admin AS a 
				WHERE 	(a.admin_username = '$username') AND 
						(a.admin_password = '$password') 
				";
				return $this->db->query($sql)->result();

					}
}
?>