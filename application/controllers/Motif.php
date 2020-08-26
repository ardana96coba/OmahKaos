<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motif extends CI_Controller {

	function __construct()

	{
		parent::__construct();
		$this->sesnama = $this->session->userdata('usersnama');
		$this->sesusername = $this->session->userdata('usersusername');
		$this->sesstatus = $this->session->userdata('status');
		$this->sesuserlevel = $this->session->userdata('userslevel');

		if ($this->sesstatus != 'login')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "motif";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";

		$data['motif_view'] = $this->Motif_model->motif_view();

		$data['ses_level'] = $this->sesuserlevel;


		$data['content'] ='v_motif/index';
		$this->load->view('template',$data);
	}

	function motif_add()
	{
		$params = array(
			'motif_nama'=>strtoupper($this->input->post('motif_nama'))
		);

		$this->Motif_model->motif_add($params);
		redirect('motif');
	}


	function motif_edit($motif_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "motif";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		
		$data['ses_level'] = $this->sesuserlevel;
		$data['motif'] = $this->Motif_model->motif_getid($motif_id);
		$data['content'] ='v_motif/edit';
		
		$this->load->view('template',$data);
	}

	function motif_update($motif_id){
		$params = array (

			'motif_nama'=>strtoupper($this->input->post('motif_nama'))
			);

		$this->Motif_model->motif_update($motif_id, $params);
		redirect('motif');
	}

	function motif_delete($motif_id)
	{
		$motif = $this->Motif_model->motif_getid($motif_id);

		if(isset($motif['motif_id']))
		{

			$this->Motif_model->motif_delete($motif_id);
			redirect('motif');

		} else {

			show_error('');
		}
	
	}

}
?>