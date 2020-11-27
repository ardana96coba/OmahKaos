<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Stok_model extends CI_Model{

	function stok_view($size_id, $baju_id){
		var_dump($baju_id);
		if ($size_id == 0 && $baju_id=="" )
			$sql = "SELECT *FROM s_total";

		else if ($size_id !=0  && $baju_id=="")
			$sql = "SELECT *FROM s_total WHERE size_id = '$size_id'";
		else if ($baju_id !="" && $size_id ==0 )
			$sql = "SELECT *FROM s_total WHERE baju_id = '$baju_id'";
		else 
			$sql = "SELECT *FROM s_total WHERE size_id = '$size_id' AND  baju_id = '$baju_id'";

		
		

		return $this->db->query($sql)->result();
	}


}

?>