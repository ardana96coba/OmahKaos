<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login/index');
	}

	function auth()
	{
		$username = $this->input->post('username');
		$password = MD5($this->input->post('password'));

		$Cek = $this->Login_model->cek_login_users($username, $password);

		if ($Cek >= 1)
		{
			$users = $this->Login_model->get_data_users($username,$password);
			foreach ($users as $data) 
			{
			$this->session->set_userdata('usersid', $data->admin_id);
			$this->session->set_userdata('usersnama', $data->admin_nama);
			$this->session->set_userdata('usersusername', $data->admin_username);
			$this->session->set_userdata('userslevel', $data->admin_level);
			//$this->session->set_userdata('userstingcode', $data->users_tingcode);
			$this->session->set_userdata('status','login' );

			// $level = $data->level_id;

			// 	if ($level == 1){

			// 		redirect('penjualan');
			// 	} else if($level == 2) {
			// 		redirect('produk');
			// 	}else{
			// 		redirect('penjualan');
			// 	}
			redirect('dashboard');

			}
		}	else {


			redirect('login');
		}
		

	}
}
?>