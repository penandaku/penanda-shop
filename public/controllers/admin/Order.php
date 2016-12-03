<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
					'title' 		=> 'Order · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'order'			=> TRUE
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/order/data');
			$this->load->view('part/footer');
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}
}