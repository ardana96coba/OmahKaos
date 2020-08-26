<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Motif_model extends CI_Model{

	function motif_view(){
		$sql = "SELECT * FROM motif";

		return $this->db->query($sql)->result();
	}

	function motif_add($params)
	{

		$this->db->insert('motif',$params);
		return $this->db->insert_id();
	}

	function motif_getid($motif_id)
	{
		$sql = "SELECT * FROM motif WHERE motif_id='$motif_id'";

		return $this->db->query($sql)->row_array();
	}

	function motif_update($motif_id, $params){

		$this->db->where('motif_id', $motif_id);
		return $this->db->update('motif',$params);
	}

	function motif_delete($motif_id)
	{
		return $this->db->delete('motif',array('motif_id'=>$motif_id));
	}
}

?>