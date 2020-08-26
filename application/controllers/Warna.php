<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warna extends CI_Controller {

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
		$data['judul'] = "warna";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";

		$data['warna_view'] = $this->Warna_model->warna_view();

		$data['ses_level'] = $this->sesuserlevel;


		$data['content'] ='v_warna/index';
		$this->load->view('template',$data);
	}

	function warna_add()
	{
		$params = array(
			'warna_nama'=>strtoupper($this->input->post('warna_nama'))
		);

		$this->Warna_model->warna_add($params);
		redirect('warna');
	}


	function warna_edit($warna_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "warna";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		
		$data['ses_level'] = $this->sesuserlevel;
		$data['warna'] = $this->Warna_model->warna_getid($warna_id);
		$data['content'] ='v_warna/edit';
		
		$this->load->view('template',$data);
	}

	function warna_update($warna_id){
		$params = array (

			'warna_nama'=>strtoupper($this->input->post('warna_nama'))
			);

		$this->Warna_model->warna_update($warna_id, $params);
		redirect('warna');
	}

	function warna_delete($warna_id)
	{
		$warna = $this->Warna_model->warna_getid($warna_id);

		if(isset($warna['warna_id']))
		{

			$this->warna_model->warna_delete($warna_id);
			redirect('warna');

		} else {

			show_error('');
		}
	
	}

}
?>