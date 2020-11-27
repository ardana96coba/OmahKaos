<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	function __construct()

	{
		parent::__construct();
		$this->sesnama = $this->session->userdata('usersnama');
		$this->sesusername = $this->session->userdata('usersusername');
		$this->sesstatus = $this->session->userdata('status');
		$this->sesuserlevel = $this->session->userdata('userslevel');
		$this->sesusertingcode = $this->session->userdata('userstingcode');

		if ($this->sesstatus != 'login')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "stok";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$level = $this->sesuserlevel;

		$size_id = "";
		$baju_id = "";
		$data['baju_view'] = $this->Baju_model->baju_view();
		$data['size_view'] = $this->Masuk_model->size_view();
			
			$data['stok_view'] = $this->Stok_model->stok_view($size_id, $baju_id);
			$data['content'] ='v_stok/index';

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}


	public function view()
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "stok";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$level = $this->sesuserlevel;

		$data['baju_view'] = $this->Baju_model->baju_view();
		$data['size_view'] = $this->Masuk_model->size_view();

		$baju_id =$this->input->post('baju_id');
		$size_id = $this->input->post('size_id');
		

		var_dump($size_id);
			$data['stok_view'] = $this->Stok_model->stok_view($size_id, $baju_id);
			$data['content'] ='v_stok/index';

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}
}
?>