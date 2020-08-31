<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total extends CI_Controller {

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
		$data['judul'] = "total";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$level = $this->sesuserlevel;

		
			
			$data['total_view'] = $this->Total_model->total_view();
			$data['content'] ='v_total/index';

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}



}
?>