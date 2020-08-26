<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

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
		$data['judul'] = "masuk";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$level = $this->sesuserlevel;

		
			
			$data['masuk_view'] = $this->Masuk_model->masuk_view();
			$data['masuk_id'] = $this->Masuk_model->kode_otomatis();
			$data['content'] ='v_masuk/index';
		
		$data['baju_view'] = $this->Baju_model->baju_view();
		$data['size_view'] = $this->Masuk_model->size_view();

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}

	function masuk_add()
	{

			$tgl=date('Y-m-d');
			$tgl_edit = "0000-00-00";
      		var_dump($this->input->post('baju_id'));

				$params = array(
						
						'baju_id'=>$this->input->post('baju_id'),
						'size_id'=>$this->input->post('size_id'),
						'masuk_jumlah'=>$this->input->post('masuk_jumlah'),
						'admin_nama'=>$this->sesnama,
						'masuk_tanggal' => $tgl,
						'masuk_tanggal_edit' => $tgl_edit
						
				);

				$this->Masuk_model->masuk_add($params);
				redirect('masuk');
		
	}


	function masuk_edit($masuk_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "fakultas";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$data['motif_view'] = $this->Motif_model->motif_view();
		$data['warna_view'] = $this->Warna_model->warna_view();
		$data['ses_level'] = $this->sesuserlevel;
		$data['baju_view'] = $this->Baju_model->baju_view();

		$data['size_view'] = $this->Masuk_model->size_view();
		$data['masuk'] = $this->Masuk_model->masuk_getid($masuk_id);
		$data['content'] ='v_masuk/edit';
		
		$this->load->view('template',$data);
	}

	function masuk_update($masuk_id){

		$tgl_edit=date('Y-m-d');
		$params = array (

			//'masuk_id'=>$this->input->post('masuk_id'),		
			'baju_id'=>$this->input->post('baju_id'),
			'size_id'=>$this->input->post('size_id'),
			'masuk_jumlah'=>$this->input->post('masuk_jumlah'),
			'admin_nama'=>$this->sesnama,
			'masuk_tanggal_edit' => $tgl_edit

			);

		$this->Masuk_model->masuk_update($masuk_id, $params);
		redirect('masuk');
	}


	function masuk_edit_photo($masuk_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "Ganti Foto masuk";
		
		$data['ses_level'] = $this->sesuserlevel;
		$data['masuk'] = $this->Masuk_model->masuk_getid($masuk_id);
		$data['content'] ='v_masuk/edit_photo';
		
		$this->load->view('template',$data);
	}

	function masuk_update_photo($masuk_id)
	{
		$masuk = $this->Masuk_model->masuk_getid($masuk_id);

		if(isset($masuk['masuk_id']))
		{

                $config['upload_path']      = './images/masuk';
                $config['allowed_types']    = 'jpg|jpeg';
                $config['file_name']        = 'masuk-'.trim(str_replace(" ","",date('dmYHis')));
                $config['max_size']         = '1000';
		 
		        $this->load->library('upload');
		        $this->upload->initialize($config);

		       	if(!empty($_FILES['filephoto']['name']))
		        { 
			        if (!$this->upload->do_upload('filephoto'))
			        {
				        $error = array('error' => $this->upload->display_errors());
				        $this->load->view('v_masuk/edit_photo', $error);
			            
			        } else {

		    	        $gbr = $this->upload->data();

		                $config['image_library']='gd2';
		                $config['source_image']='./images/masuk'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '70%';
		                $config['new_image']= './images/masuk'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

						$params = array(
							'masuk_photo' => $gbr['file_name']
				    	);

				    	
			        }

			      

			        $this->Masuk_model->masuk_update($masuk_id,$params);
					redirect('masuk');

		        } else {

					redirect('masuk');					
					
		        }

		} else {

			show_error('');
		}
	}



	function masuk_delete($masuk_id)
	{
		$masuk = $this->Masuk_model->masuk_getid($masuk_id);

		if(isset($masuk['masuk_id']))
		{

			$this->Masuk_model->masuk_delete($masuk_id);
			redirect('masuk');

		} else {

			show_error('');
		}
	
	}


}
?>