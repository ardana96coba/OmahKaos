<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Kategori_model extends CI_Model{

	function kategori_view(){
		$sql = "SELECT * FROM kategori";

		return $this->db->query($sql)->result();
	}

	function kategori_add($params)
	{

		$this->db->insert('kategori',$params);
		return $this->db->insert_id();
	}

	function kategori_getid($kategori_id)
	{
		$sql = "SELECT * FROM kategori WHERE kategori_id='$kategori_id'";

		return $this->db->query($sql)->row_array();
	}

	function kategori_update($kategori_id, $params){

		$this->db->where('kategori_id', $kategori_id);
		return $this->db->update('kategori',$params);
	}

	function kategori_delete($kategori_id)
	{
		return $this->db->delete('kategori',array('kategori_id'=>$kategori_id));
	}
}

?>