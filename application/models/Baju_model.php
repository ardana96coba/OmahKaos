<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Baju_model extends CI_Model{

	function baju_view(){
		$sql = "SELECT w.warna_nama, m.motif_nama, b.baju_id, b.baju_photo
		FROM baju b
		LEFT JOIN warna w
		ON b.warna_id = w.warna_id

		LEFT JOIN motif m
		ON b.motif_id = m.motif_id
		        	  ";

		return $this->db->query($sql)->result();
	}

	function baju_add($params)
	{

		$this->db->insert('baju',$params);
		return $this->db->insert_id();
	}

	function baju_getid($baju_id)
	{
		$sql = "SELECT * FROM baju WHERE baju_id='$baju_id'";

		return $this->db->query($sql)->row_array();
	}

	function baju_update($baju_id, $params){

		$this->db->where('baju_id', $baju_id);
		return $this->db->update('baju',$params);
	}

	function baju_delete($baju_id)
	{
		return $this->db->delete('baju',array('baju_id'=>$baju_id));
	}

	function baju_view_industri($industri_id){
		$sql = "SELECT * FROM baju p, industri i, kategori k
		        WHERE (p.industri_id = i.industri_id) AND
		        	  (p.industri_id = '$industri_id') AND
		        	  (p.kategori_id = k.kategori_id)";

		return $this->db->query($sql)->result();
	}

	function kode_otomatis()
    {

        $this->db->select('Right(baju.baju_id,4) as kode ',false);
        $this->db->order_by('baju_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('baju');
        
        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        } else {
            $kode = 1;
        }
                
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "B".$kodemax;

        return $kodejadi;

    }
}

?>