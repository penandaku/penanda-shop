<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('web');
        //load library
        $this->load->library('disqus');

    }

	public function index()
	{
		//create data array
		$data = array(
				'title' 		=> 'Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
				'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer'
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/products/homepage');
		$this->load->view('part/footer');
	}

	public function detail($url)
	{
	    $category = $this->web->get_url($url)->nama_label;
		//create data array
		$data = array(
                'data_products' => $this->web->get_url($url),
				'title' 		=> $this->web->get_url($url)->nama_products. ' · ' .'Penanda Shop - Where Programmer and Developer Shopping',
				'keywords'		=> '',
				'descriptions'	=> $this->web->get_url($url)->descriptions_products,
                'products'      => TRUE,
                'disqus'        => $data['disqus']  = $this->disqus->get_html()
			);
		$this->load->view('part/header', $data);
		$this->load->view('layout/home/products/detail');
		$this->load->view('part/footer');		
	}

	public function category($category)
    {
        //create data array
        $data = array(
            'data_products' => $this->web->index_category($category),
            'title' 		=> $this->web->get_category($category)->nama_label. ' · ' .'Penanda Shop - Where Programmer and Developer Shopping',
            'keywords'		=> '',
            'descriptions'	=> $this->web->get_category($category)->descriptions,
            'products'      => TRUE
        );
        $this->load->view('part/header', $data);
        $this->load->view('layout/home/products/category');
        $this->load->view('part/footer');
    }

    public function search($keywords)
    {
        //create data array
        $data = array(
            'data_products' => $this->web->index_search($keywords),
            'title' 		=> $this->web->get_search($keywords)->nama_products. ' · ' .'Penanda Shop - Where Programmer and Developer Shopping',
            'keywords'		=> '',
            'descriptions'	=> $this->web->get_search($keywords)->descriptions_products,
            'products'      => TRUE
        );
        $this->load->view('part/header', $data);
        $this->load->view('layout/home/products/search');
        $this->load->view('part/footer');
    }
}
