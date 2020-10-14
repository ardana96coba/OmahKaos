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

		
			
			$data['stok_view'] = $this->Stok_model->stok_view();
			$data['content'] ='v_stok/index';

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}



}
?>