<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Label extends CI_Controller {

public function __construct()
{
	parent::__construct();
	//load model
	$this->load->model('admin');

}
	public function index()
	{
		if($this->admin->auth_id())
		{
	        //config pagination
	        $config['base_url'] = base_url().'admin/label/index/';
	        $config['total_rows'] = $this->admin->count_label()->num_rows();
	        $config['per_page'] = 10;
	        //instalasi paging
	        $this->pagination->initialize($config);
	        //deklare halaman
	        $halaman            =  $this->uri->segment(4);
	        $halaman            =  $halaman==''? 0 : $halaman;			
			//create data array
			$data = array(
					'title' 		=> 'Label · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'label'			=> TRUE,
					'data_label'  	=> $this->admin->index_label($halaman,$config['per_page']),
					'paging'    	=> $this->pagination->create_links()
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/label/data');
			$this->load->view('part/footer');
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	public function add()
	{
		if($this->admin->auth_id())
		{
			//create data array
			$data = array(
					'title' 		=> 'Label · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'label'			=> TRUE,
					'type'			=> 'add'
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/label/add');
			$this->load->view('part/footer');			
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	public function edit($id_label)
	{
		if($this->admin->auth_id())
		{
			$id_label 	= $this->encryption->decode($id_label);
			//create data array
			$data = array(
					'title' 		=> 'Label · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'label'			=> TRUE,
					'type'			=> 'edit',
					'data_label'	=> $this->admin->edit_label($id_label)->row_array()
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/label/edit');
			$this->load->view('part/footer');
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	public function save()
	{
		if($this->admin->auth_id())
		{
			$id['id_label']   = $this->encryption->decode($this->input->post("id"));
			$type 			  = $this->input->post("type");

			if($type == "add")
			{
				//create data array
				$data = array(
							'nama_label' 	=> $this->input->post("nama"),
							'slug'			=> url_title(strtolower($this->input->post("nama"))),
							'descriptions'	=> $this->input->post("descriptions")
					);
				$this->db->insert('tbl_label', $data);
				//set flashdata
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                  </div>');
				redirect('admin/label/');

			}elseif($type == "edit"){
				//create data array
				$data = array(
							'nama_label' 	=> $this->input->post("nama"),
							'slug'		 	=> url_title(strtolower($this->input->post("nama"))),
							'descriptions'	=> $this->input->post("descriptions")
					);

				$this->db->update('tbl_label', $data, $id);
				//set flashdata
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                  </div>');
				redirect('admin/label/');
			}else{

				redirect('admin/label/');

			}
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}	

	public function delete()
	{
		if($this->admin->auth_id())
		{

		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}	

}