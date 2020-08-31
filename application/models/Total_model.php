<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Total_model extends CI_Model{

	function total_view(){
		$sql = "SELECT *
		FROM total_saldo";

		return $this->db->query($sql)->result();
	}


}

?>