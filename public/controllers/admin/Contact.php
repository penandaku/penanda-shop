<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('admin');

    }

    public function index()
    {
        if ($this->admin->auth_id())
        {
            //config pagination
            $config['base_url'] = base_url().'admin/contact/index/';
            $config['total_rows'] = $this->admin->count_contact()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman            =  $this->uri->segment(4);
            $halaman            =  $halaman==''? 0 : $halaman;
            //create data array
            $data = array(
                'title'         => 'Contact · Penanda Shop - Where Programmer and Developer Shopping',
                'keywords'      => 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
                'descriptions'  => 'Penanda Shop adalah toko online untuk para programmer dan developer',
                'contact'       => TRUE,
                'data_contact'  => $this->admin->index_contact($halaman,$config['per_page']),
                'paging'    	=> $this->pagination->create_links()
            );
            $this->load->view('part/header', $data);
            $this->load->view('part/sidebar');
            $this->load->view('layout/admin/contact/data');
            $this->load->view('part/footer');
        } else {
            //show 404
            show_404();
            return FALSE;
        }
    }
}