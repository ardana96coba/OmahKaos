<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Keluar_model extends CI_Model{

	function keluar_view(){
		$sql = "SELECT *
		FROM keluar m, baju b, size s, motif f, warna w

		WHERE m.baju_id = b.baju_id AND
		m.size_id = s.size_id AND
		b.motif_id = f.motif_id AND 
		b.warna_id = w.warna_id



		        	  ";

		return $this->db->query($sql)->result();
	}

	function keluar_add($params)
	{

		$this->db->insert('keluar',$params);
		return $this->db->insert_id();
	}

	function keluar_getid($keluar_id)
	{
		$sql = "SELECT * FROM keluar WHERE keluar_id='$keluar_id'";

		return $this->db->query($sql)->row_array();
	}

	function keluar_update($keluar_id, $params){

		$this->db->where('keluar_id', $keluar_id);
		return $this->db->update('keluar',$params);
	}

	function keluar_delete($keluar_id)
	{
		return $this->db->delete('keluar',array('keluar_id'=>$keluar_id));
	}

	function keluar_view_industri($industri_id){
		$sql = "SELECT * FROM keluar p, industri i, kategori k
		        WHERE (p.industri_id = i.industri_id) AND
		        	  (p.industri_id = '$industri_id') AND
		        	  (p.kategori_id = k.kategori_id)";

		return $this->db->query($sql)->result();
	}

	function kode_otomatis()
    {

        $this->db->select('Right(keluar.keluar_id,4) as kode ',false);
        $this->db->order_by('keluar_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('keluar');
        
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

    function size_view(){
		$sql = "SELECT *
		FROM size
		        	  ";

		return $this->db->query($sql)->result();
	}
}

?>