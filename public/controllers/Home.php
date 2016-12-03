<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('web');

    }

	public function index()
	{
		//create data array
		$data = array(
				'title' 		=> 'Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
				'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
                'data_products' => $this->web->index_products(),
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/homepage');
		$this->load->view('part/footer');
	}
}
