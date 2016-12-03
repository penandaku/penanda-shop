<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured extends CI_Controller {

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
					'title' 		=> 'Featured · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'featured'		=> TRUE,
					'data_featured'	=> $this->admin->index_featured()
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/featured/data');
			$this->load->view('part/footer');
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	function update()
	{
		if($this->admin->auth_id())
		{
              $upload_conf = array(
                  'upload_path'   => realpath('resources/featured/'),
                  'allowed_types' => 'jpg|png|jpeg',
                  'encrypt_name'  => true,
                  'max_size'      => '50000'
                  );

              $this->upload->initialize( $upload_conf );

              // Change $_FILES to new vars and loop them
              foreach($_FILES['userfile'] as $key=>$val)
              {
                  $i = 1;
                  foreach($val as $v)
                  {
                      $field_name = "file_".$i;
                      $_FILES[$field_name][$key] = $v;
                      $i++;
                  }
              }
              // Unset the useless one ;)
              unset($_FILES['userfile']);

              // Put each errors and upload data to an array
              $error = array();
              $success = array();

              // main action to upload each file
              foreach($_FILES as $field_name => $file)
              {
                  if ( ! $this->upload->do_upload($field_name))
                  {
                      // if upload fail, grab error
                      $error['upload'][] = $this->upload->display_errors();
                  }
                  else
                  {

                      // otherwise, put the upload datas here.
                      // if you want to use database, put insert query in this loop
                       $upload_data = $this->upload->data();
                      // set the resize config
                      $resize_conf = array(
                          // it's something like "/full/path/to/the/image.jpg" maybe
                          'image_library' => 'gd2',
                          'source_image'  => $upload_data['full_path'],
                          // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                          // or you can use 'create_thumbs' => true option instead
                          'new_image'     => $upload_data['file_path'].'featured_'.$upload_data['file_name']
                          );
                      // initializing
                      $this->image_lib->initialize($resize_conf);
                      $pic = 'featured_'.$upload_data['file_name'];
                      $query = $this->db->query("SELECT image_featured FROM tbl_featured WHERE image_featured='$pic'");
                      if(!$query->num_rows()>0){
                      $id['id_featured']			= $this->encryption->decode($this->input->post('id'));
                      $update['image_featured'] 	= $pic;
                      $update['link_featured'] 		= $this->input->post('link');
                      $this->db->update("tbl_featured", $update, $id);
                      }
                      // do it!
                      if (!$this->image_lib->resize())
                      {
                          // if got fail.
                          $error['resize'][] = $this->image_lib->display_errors();
                      }
                      else
                      {
                          // otherwise, put each upload data to an array.
                          $this->image_lib->watermark();
                          $this->image_lib->clear();
                          $success[] = $upload_data;
                          $sukses .= $pic.'<br/>';
                      }
                      unlink(realpath('resources/featured/'.$upload_data['file_name']));
                  }
              }

              // see what we get
              if(count($error) > 0)
              {
                  $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Gagal Disimpan '.$this->upload->display_errors('').'
			                                              </div>');
              }
              else
              {
                  $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                              </div>');
              }

              redirect('admin/featured/');
		}else{
			//show 404
			show_404();
			return FALSE;
		}		
	}

}