<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			//create data array
			$data = array(
					'title' 		=> 'Dashboard · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'dashboard'		=> TRUE
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/dashboard');
			$this->load->view('part/footer');
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	public function logout()
	{
		if($this->admin->auth_id())
		{
			//
			$this->admin->logout();
			redirect('/');
		}else{
			show_404();
			return FALSE;
		}
	}
}
