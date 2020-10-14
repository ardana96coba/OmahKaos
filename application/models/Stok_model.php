<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Stok_model extends CI_Model{

	function stok_view(){
		$sql = "SELECT *
		FROM s_total";

		return $this->db->query($sql)->result();
	}


}

?>