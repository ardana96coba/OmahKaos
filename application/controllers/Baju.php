<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baju extends CI_Controller {

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
		$data['judul'] = "Input Baju";
		$data['judul_top'] = "Baju | Omah Kaos";
		$level = $this->sesuserlevel;

		
			
			$data['baju_view'] = $this->Baju_model->baju_view();
			$data['baju_id'] = $this->Baju_model->kode_otomatis();
			$data['content'] ='v_baju/index_industri';
		
		$data['motif_view'] = $this->Motif_model->motif_view();
		$data['warna_view'] = $this->Warna_model->warna_view();

		$data['ses_level'] = $this->sesuserlevel;


		
		$this->load->view('template',$data);
	}

	function baju_add()
	{


        $config['upload_path']      = './images/baju';
        $config['allowed_types']    = 'jpg|jpeg';
        $config['file_name']        = 'baju-'.trim(str_replace(" ","",date('dmYHis')));
        //$config['file_name']        = $this->input->post('filephoto');
        $config['max_size']         = '1000';
		 
		$this->load->library('upload');
		$this->upload->initialize($config);

		if(!empty($_FILES['filephoto']['name']))
		{
			if ($this->upload->do_upload('filephoto'))
            {
    	        $gbr = $this->upload->data();

                $config['image_library']='gd2';
                $config['source_image']='./images/baju'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '70%';
                $config['new_image']= './images/baju'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

				$params = array(
				    	'baju_id'=>$this->input->post('baju_id'),
						
						'motif_id'=>$this->input->post('motif_id'),
						'warna_id'=>$this->input->post('warna_id'),
						'admin_nama'=>$this->sesnama,
						'baju_genre'=>$this->input->post('baju_genre'),
						'baju_jenis'=>$this->input->post('baju_jenis'),
						'baju_harga'=>$this->input->post('baju_harga'),
						'baju_keterangan'=>$this->input->post('baju_keterangan'),
						'baju_photo' => $gbr['file_name']
				);

				$this->Baju_model->baju_add($params);
				redirect('baju');
			}

		} else {

				redirect('baju');
		}
	}


	function baju_edit($baju_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "Edit Baju";
		$data['judul_top'] = "Edit Baju | Omah Kaos";
		$data['motif_view'] = $this->Motif_model->motif_view();
		$data['warna_view'] = $this->Warna_model->warna_view();
		$data['ses_level'] = $this->sesuserlevel;
		$data['baju'] = $this->Baju_model->baju_getid($baju_id);
		$data['content'] ='v_baju/edit';
		
		$this->load->view('template',$data);
	}

	function baju_update($baju_id){
		$params = array (

			//'baju_id'=>$this->input->post('baju_id'),		
			'motif_id'=>$this->input->post('motif_id'),
			'warna_id'=>$this->input->post('warna_id'),
			'admin_nama'=> $this->sesnama,
			'baju_genre'=>$this->input->post('baju_genre'),
			'baju_jenis'=>$this->input->post('baju_jenis'),
			'baju_harga'=>$this->input->post('baju_harga'),
			'baju_keterangan'=>$this->input->post('baju_keterangan')

			);

		$this->Baju_model->baju_update($baju_id, $params);
		redirect('baju');
	}


	function baju_edit_photo($baju_id)
	{
		$data['ses_nama'] = $this->sesnama;
		$data['ses_username'] = $this->sesusername;
		$data['judul'] = "Ganti Foto baju";
		
		$data['ses_level'] = $this->sesuserlevel;
		$data['baju'] = $this->Baju_model->baju_getid($baju_id);
		$data['content'] ='v_baju/edit_photo';
		
		$this->load->view('template',$data);
	}

	function baju_update_photo($baju_id)
	{
		$baju = $this->Baju_model->baju_getid($baju_id);

		if(isset($baju['baju_id']))
		{

                $config['upload_path']      = './images/baju';
                $config['allowed_types']    = 'jpg|jpeg';
                $config['file_name']        = 'baju-'.trim(str_replace(" ","",date('dmYHis')));
                $config['max_size']         = '1000';
		 
		        $this->load->library('upload');
		        $this->upload->initialize($config);

		       	if(!empty($_FILES['filephoto']['name']))
		        { 
			        if (!$this->upload->do_upload('filephoto'))
			        {
				        $error = array('error' => $this->upload->display_errors());
				        $this->load->view('v_baju/edit_photo', $error);
			            
			        } else {

		    	        $gbr = $this->upload->data();

		                $config['image_library']='gd2';
		                $config['source_image']='./images/baju'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '70%';
		                $config['new_image']= './images/baju'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

						$params = array(
							'baju_photo' => $gbr['file_name']
				    	);

				    	
			        }

			      

			        $this->Baju_model->baju_update($baju_id,$params);
					redirect('baju');

		        } else {

					redirect('baju');					
					
		        }

		} else {

			show_error('');
		}
	}



	function baju_delete($baju_id)
	{
		$baju = $this->Baju_model->baju_getid($baju_id);

		if(isset($baju['baju_id']))
		{

			$this->Baju_model->baju_delete($baju_id);
			redirect('baju');

		} else {

			show_error('');
		}
	
	}


}
?>