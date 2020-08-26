<?php
if (!  defined('BASEPATH')) exit ('No direct script access allowed');

class Masuk_model extends CI_Model{

	function masuk_view(){
		$sql = "SELECT *
		FROM masuk m, baju b, size s, motif f, warna w

		WHERE m.baju_id = b.baju_id AND
		m.size_id = s.size_id AND
		b.motif_id = f.motif_id AND 
		b.warna_id = w.warna_id



		        	  ";

		return $this->db->query($sql)->result();
	}

	function masuk_add($params)
	{

		$this->db->insert('masuk',$params);
		return $this->db->insert_id();
	}

	function masuk_getid($masuk_id)
	{
		$sql = "SELECT * FROM masuk WHERE masuk_id='$masuk_id'";

		return $this->db->query($sql)->row_array();
	}

	function masuk_update($masuk_id, $params){

		$this->db->where('masuk_id', $masuk_id);
		return $this->db->update('masuk',$params);
	}

	function masuk_delete($masuk_id)
	{
		return $this->db->delete('masuk',array('masuk_id'=>$masuk_id));
	}

	function masuk_view_industri($industri_id){
		$sql = "SELECT * FROM masuk p, industri i, kategori k
		        WHERE (p.industri_id = i.industri_id) AND
		        	  (p.industri_id = '$industri_id') AND
		        	  (p.kategori_id = k.kategori_id)";

		return $this->db->query($sql)->result();
	}

	function kode_otomatis()
    {

        $this->db->select('Right(masuk.masuk_id,4) as kode ',false);
        $this->db->order_by('masuk_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('masuk');
        
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