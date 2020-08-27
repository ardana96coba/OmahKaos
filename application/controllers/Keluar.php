<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

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
		$data['judul'] = "keluar";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$level = $this->sesuserlevel;

		
			
			$data['keluar_view'] = $this->Keluar_model->keluar_view();
			$data['keluar_id'] = $this->Keluar_model->kode_otomatis();
			$data['content'] ='v_keluar/index';
		
		$data['baju_view'] = $this->Baju_model->baju_view();
		$data['size_view'] = $this->Keluar_model->size_view();

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}

	function keluar_add()
	{

			$tgl=date('Y-m-d');
			$tgl_edit = "0000-00-00";
      		var_dump($this->input->post('baju_id'));

				$params = array(
						
						'baju_id'=>$this->input->post('baju_id'),
						'size_id'=>$this->input->post('size_id'),
						'keluar_jumlah'=>$this->input->post('keluar_jumlah'),
						'admin_nama'=>$this->sesnama,
						'keluar_tanggal' => $tgl,
						'keluar_tanggal_edit' => $tgl_edit,
						'pending' => $this->input->post('pending'),
						'keluar_buyer' => $this->input->post('keluar_buyer')
						
				);

				$this->Keluar_model->keluar_add($params);
				redirect('keluar');
		
	}


	function keluar_edit($keluar_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "fakultas";
		$data['judul_top'] = "fakultas | Sistem Informasi Akademik";
		$data['motif_view'] = $this->Motif_model->motif_view();
		$data['warna_view'] = $this->Warna_model->warna_view();
		$data['ses_level'] = $this->sesuserlevel;
		$data['baju_view'] = $this->Baju_model->baju_view();

		$data['size_view'] = $this->Keluar_model->size_view();
		$data['keluar'] = $this->Keluar_model->keluar_getid($keluar_id);
		$data['content'] ='v_keluar/edit';
		
		$this->load->view('template',$data);
	}

	function keluar_update($keluar_id){

		$tgl_edit=date('Y-m-d');
		$params = array (

			//'keluar_id'=>$this->input->post('keluar_id'),		
			'baju_id'=>$this->input->post('baju_id'),
			'size_id'=>$this->input->post('size_id'),
			'keluar_jumlah'=>$this->input->post('keluar_jumlah'),
			'admin_nama'=>$this->sesnama,
			'keluar_tanggal_edit' => $tgl_edit,
			'pending' => $this->input->post('pending'),
			'keluar_buyer' => $this->input->post('keluar_buyer')

			);

		$this->Keluar_model->keluar_update($keluar_id, $params);
		redirect('keluar');
	}


	function keluar_edit_photo($keluar_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "Ganti Foto keluar";
		
		$data['ses_level'] = $this->sesuserlevel;
		$data['keluar'] = $this->Keluar_model->keluar_getid($keluar_id);
		$data['content'] ='v_keluar/edit_photo';
		
		$this->load->view('template',$data);
	}

	function keluar_update_photo($keluar_id)
	{
		$keluar = $this->Keluar_model->keluar_getid($keluar_id);

		if(isset($keluar['keluar_id']))
		{

                $config['upload_path']      = './images/keluar';
                $config['allowed_types']    = 'jpg|jpeg';
                $config['file_name']        = 'keluar-'.trim(str_replace(" ","",date('dmYHis')));
                $config['max_size']         = '1000';
		 
		        $this->load->library('upload');
		        $this->upload->initialize($config);

		       	if(!empty($_FILES['filephoto']['name']))
		        { 
			        if (!$this->upload->do_upload('filephoto'))
			        {
				        $error = array('error' => $this->upload->display_errors());
				        $this->load->view('v_keluar/edit_photo', $error);
			            
			        } else {

		    	        $gbr = $this->upload->data();

		                $config['image_library']='gd2';
		                $config['source_image']='./images/keluar'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '70%';
		                $config['new_image']= './images/keluar'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

						$params = array(
							'keluar_photo' => $gbr['file_name']
				    	);

				    	
			        }

			      

			        $this->Keluar_model->keluar_update($keluar_id,$params);
					redirect('keluar');

		        } else {

					redirect('keluar');					
					
		        }

		} else {

			show_error('');
		}
	}



	function keluar_delete($keluar_id)
	{
		$keluar = $this->Keluar_model->keluar_getid($keluar_id);

		if(isset($keluar['keluar_id']))
		{

			$this->Keluar_model->keluar_delete($keluar_id);
			redirect('keluar');

		} else {

			show_error('');
		}
	
	}


}
?>