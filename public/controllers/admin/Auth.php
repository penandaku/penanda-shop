<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct()
{
	parent::__construct();
	//load library
	$this->load->library('form_validation');
	//load model
	$this->load->model('admin');

}

	public function index()
	{
		//cek status user
		if($this->admin->auth_id())
		{
			//redirect
			redirect('admin/dashboard');
		}else{
			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			//set messege 
      		$this->form_validation->set_message('required', '<div class="alert alert-danger" style="font-family:Roboto">
                                                          <i class="fa fa-exclamation-circle"></i> {field} harus diisi.
                                                       </div>');	
            if($this->form_validation->run() == TRUE)
            {
            	//login
            	$username = $this->input->post("username", TRUE);
            	$password = SHA1(MD5(MD5(SHA1($this->input->post("password", TRUE)))));
            	//checking
            	$checking = $this->admin->checking_login('tbl_admin', array('username' => $username), array('password' => $password));
            	if($checking == TRUE)
            	{
            		//loop data
            		foreach($checking as $admin)
            		{
            			//set session data
			            $this->session->set_userdata(array(
			            								'auth_id'	=> $admin->id_admin,
			                							'username'  => $admin->username,
			                 							'nama' 		=> $admin->nama,
			                 							'foto' 		=> $admin->foto
			            ));
                        // buat session
                        session_start();
                        $_SESSION['ses_kcfinder']=  array();
                        $_SESSION['ses_kcfinder']['disabled'] = false;
                        $_SESSION['ses_kcfinder']['uploadURL'] = "./products";
                        //redirect
			            redirect('admin/dashboard/');
            		}
            	}else{
			        //create data array
			        $data = array(
			                    'error' => '<div class="alert alert-danger" style="font-family:Roboto">
			                                    <i class="fa fa-exclamation-circle"></i> Username dan Password tidak ditemukan.
			                                  </div>',
			                    'title'         => 'Login · Penanda Shop - Where Programmer and Developer Shopping',

			                    'descriptions'  => '',
			                    'keywords'      => ''
			        );
			        $this->load->view('layout/admin/auth/login', $data);            		
            	}
            }else{
		        //create data array
		        $data = array(
		                    'title'         => 'Login · Penanda Shop - Where Programmer and Developer Shopping',
		                    'descriptions'  => '',
		                    'keywords'      => ''
		        );
		        $this->load->view('layout/admin/auth/login', $data);
            }	
		}
	}
}
