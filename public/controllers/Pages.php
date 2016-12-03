<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function About()
	{
		//create data array
		$data = array(
				'title' 		=> 'About · Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
				'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
				'about'			=> TRUE
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/pages/about');
		$this->load->view('part/footer');
	}

	public function help()
	{
		//create data array
		$data = array(
				'title' 		=> ' Help · Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
				'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
				'help'			=> TRUE
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/pages/help');
		$this->load->view('part/footer');
	}

	public function contact()
	{
		//create data array
		$data = array(
				'title' 		=> ' Contact · Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
				'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
				'contact'		=> TRUE
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/pages/contact');
		$this->load->view('part/footer');
	}

	public function save()
    {
        //
    }

}
