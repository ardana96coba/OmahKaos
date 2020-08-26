<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

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
		$data['judul'] = "Users";
		$data['judul_top'] = "Users | Sistem Informasi Akademik";
		$data['users_view'] = $this->Users_model->users_view();
		$data['level_view'] = $this->Level_model->level_view();
		$data['ses_level'] = $this->sesuserlevel;
		
		$data['content'] ='v_users/index';
		$this->load->view('template',$data);
	}

	function users_add()
	{
			

			$params = array(
				'level_id'=>$this->input->post('level_id'),
				'users_tingcode'=>$this->input->post('users_tingcode'),
				'users_nama'=>$this->input->post('users_nama'),
				'users_username'=>$this->input->post('users_username'),
				'users_password'=>MD5($this->input->post('users_password')),
				//'users_photo'=>$this->input->post('users_photo'),
				//'users_aktif'=>$this->input->post('users_aktif')

			
			);

			$this->Users_model->users_add($params);
			redirect('users');
	}


	function users_edit($users_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "Users";
		$data['judul_top'] = "Program Studi | Sistem Informasi Akademik";
		$data['level_view'] = $this->Level_model->level_view();
		$data['ses_level'] = $this->sesuserlevel;

		$data['users'] = $this->Users_model->users_getid($users_id);
		$data['content'] ='v_users/edit';
		
		$this->load->view('template',$data);
	}

	function users_update($users_id){
		$params = array(
				'level_id'=>$this->input->post('level_id'),
				'users_nama'=>$this->input->post('users_nama'),
				'users_tingcode'=>$this->input->post('users_tingcode'),
				'users_username'=>$this->input->post('users_username'),
				'users_password'=>$this->input->post('users_password'),
				'users_photo'=>$this->input->post('users_photo'),
				'users_aktif'=>$this->input->post('users_aktif')
			);

		$this->Users_model->users_update($users_id, $params);
		redirect('users');
	}

	function users_delete($users_id)
	{
		$users = $this->Users_model->users_getid($users_id);

		if(isset($users['users_id']))
		{

			$this->Users_model->users_delete($users_id);
			redirect('users');

		} else {

			show_error('');
		}
	
	}

}
?>