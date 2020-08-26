<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Warna_model extends CI_Model{

	function warna_view(){
		$sql = "SELECT * FROM warna";

		return $this->db->query($sql)->result();
	}

	function warna_add($params)
	{

		$this->db->insert('warna',$params);
		return $this->db->insert_id();
	}

	function warna_getid($warna_id)
	{
		$sql = "SELECT * FROM warna WHERE warna_id='$warna_id'";

		return $this->db->query($sql)->row_array();
	}

	function warna_update($warna_id, $params){

		$this->db->where('warna_id', $warna_id);
		return $this->db->update('warna',$params);
	}

	function warna_delete($warna_id)
	{
		return $this->db->delete('warna',array('warna_id'=>$warna_id));
	}
}

?>