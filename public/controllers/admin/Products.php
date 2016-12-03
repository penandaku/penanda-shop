<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
            $config['base_url'] = base_url().'admin/products/index/';
            $config['total_rows'] = $this->admin->count_products()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman            =  $this->uri->segment(4);
            $halaman            =  $halaman==''? 0 : $halaman;
			//create data array
			$data = array(
					'title' 		=> 'Products · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		=> 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	=> 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'products'		=> TRUE,
                    'data_products' => $this->admin->index_products($halaman,$config['per_page']),
                    'paging'    	=> $this->pagination->create_links()
				);
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/products/data');
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
					'title' 		    => 'Products · Penanda Shop - Where Programmer and Developer Shopping',
					'keywords'		    => 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
					'descriptions'	    => 'Penandaku Shop adalah toko online untuk para programmer dan developer',
					'products'		    => TRUE,
					'label_products'	=> $this->admin->label_products(),
                    'data_js'           => '<script type="text/javascript" src="'.base_url().'resources/ckeditor/ckeditor.js"></script>'
				);
            //create sub data array
            $sub_data = array(
                        'type'              => 'add',
                        'id_products'       => '',
                        'thumbnail'         => 'userfile',
                        'thumbnail_value'   => ''
            );
			$this->load->view('part/header', $data);
			$this->load->view('part/sidebar');
			$this->load->view('layout/admin/products/add', $sub_data);
			$this->load->view('part/footer');	
		}else{
			//show 404
			show_404();
			return FALSE;
		}
	}

	public function edit($id_products)
	{
		if($this->admin->auth_id())
		{
		    $id_products    = $this->encryption->decode($id_products);
            //create data array
            $data = array(
                'title' 		    => 'Products · Penanda Shop - Where Programmer and Developer Shopping',
                'keywords'		    => 'Geek Style, Programmer, Developer, Engineer, Shopping, Kaos Programmer, Kaos Developer, Kaos Geek, Tshirt Programmer, Tshirt Developer',
                'descriptions'	    => 'Penandaku Shop adalah toko online untuk para programmer dan developer',
                'products'		    => TRUE,
                'label_products'	=> $this->admin->label_products(),
                'data_products'     => $this->admin->edit_products($id_products)->row_array(),
                'data_js'           => '<script type="text/javascript" src="'.base_url().'resources/ckeditor/ckeditor.js"></script>'
            );
            //create sub data array
            $sub_data = array(
                'type'              => 'edit',
                'id_products'       => '',
                'thumbnail'         => 'userfile',
                'thumbnail_value'   => ''
            );
            $this->load->view('part/header', $data);
            $this->load->view('part/sidebar');
            $this->load->view('layout/admin/products/edit', $sub_data);
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
            //get form
            $type               = $this->input->post("type");
            $id['id_products']  = $this->encryption->decode($this->input->post("id"));
            $size               = implode(',',  $this->input->post("size"));

            //kondisi
            if($type == "add")
            {
                //config upload
                $config = array(
                    'upload_path'   => realpath('resources/products/'),
                    'allowed_types' =>'jpg|png|jpeg',
                    'encrypt_name'  =>TRUE,
                    'remove_spaces' =>TRUE,
                    'overwrite'     =>TRUE,
                    'max_size'      =>'5000',
                    'max_width'     =>'5000',
                    'max_height'    =>'5000'
                );
                //load library upload
                $this->load->library("upload",$config);
                //load library lib image
                $this->load->library("image_lib");

                $this->upload->initialize($config);
                if($this->upload->do_upload("userfile"))
                {
                    $data_upload    = $this->upload->data();

                    /* PATH */
                    $source             = realpath('resources/products/'.$data_upload['file_name']);
                    $destination_thumb  = realpath('resources/products/thumb/');

                    // Permission Configuration
                    chmod($source, 0777) ;

                    /* Resizing Processing */
                    // Configuration Of Image Manipulation :: Static
                    $img['image_library'] = 'GD2';
                    $img['create_thumb']  = TRUE;
                    $img['maintain_ratio']= TRUE;

                    /// Limit Width Resize
                    $limit_thumb    = 600 ;

                    // Size Image Limit was using (LIMIT TOP)
                    $limit_use  = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'] ;

                    // Percentase Resize
                    if ($limit_use > $limit_thumb) {
                        $percent_thumb  = $limit_thumb/$limit_use ;
                    }

                    //// Making THUMBNAIL ///////
                    $img['width']  = $limit_use > $limit_thumb ?  $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'] ;
                    $img['height'] = $limit_use > $limit_thumb ?  $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'] ;

                    // Configuration Of Image Manipulation :: Dynamic
                    $img['thumb_marker'] = '';
                    $img['quality']      = '100%' ;
                    $img['source_image'] = $source ;
                    $img['new_image']    = $destination_thumb ;

                    // Do Resizing
                    $this->image_lib->initialize($img);
                    $this->image_lib->resize();
                    $this->image_lib->clear() ;

                    $insert = array(
                                'nama_products'         => $this->input->post("nama"),
                                'slug_products'         => url_title(strtolower($this->input->post("nama"))),
                                'label_id'              => $this->input->post("label"),
                                'harga_products'        => $this->input->post("harga"),
                                'size_products'         => $size,
                                'stock_products'        => $this->input->post("stock"),
                                'descriptions_products' => $this->input->post("descriptions"),
                                'link_tokopedia'        => $this->input->post("link_toped"),
                                'link_bukalapak'        => $this->input->post("link_bl"),
                                'link_shopee'           => $this->input->post("link_shopee"),
                                'thumbnail'             => $data_upload['file_name']
                    );
                    $this->db->insert("tbl_products",$insert);
                    //deklarasi session flashdata
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                                </div>');
                    //redirect halaman
                    redirect('admin/products/');
                }else{
                    $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Gagal Disimpan '.$this->upload->display_errors('').'
			                                                </div>');
                    redirect('admin/products/');
                }

            }elseif($type == "edit"){
                //
                if(empty($_FILES['userfile']['name']))
                {
                    $update = array(
                        'nama_products'         => $this->input->post("nama"),
                        'slug_products'         => url_title(strtolower($this->input->post("nama"))),
                        'label_id'              => $this->input->post("label"),
                        'harga_products'        => $this->input->post("harga"),
                        'size_products'         => $size,
                        'stock_products'        => $this->input->post("stock"),
                        'descriptions_products' => $this->input->post("descriptions"),
                        'link_tokopedia'        => $this->input->post("link_toped"),
                        'link_bukalapak'        => $this->input->post("link_bl"),
                        'link_shopee'           => $this->input->post("link_shopee")
                    );
                    $this->db->update("tbl_products",$update, $id);
                    //deklarasi session flashdata
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                    redirect('admin/products/');
                }else {
                    //config upload
                    $config = array(
                        'upload_path' => realpath('resources/products/'),
                        'allowed_types' => 'jpg|png|jpeg',
                        'encrypt_name' => TRUE,
                        'remove_spaces' => TRUE,
                        'overwrite' => TRUE,
                        'max_size' => '5000',
                        'max_width' => '5000',
                        'max_height' => '5000'
                    );
                    //load library upload
                    $this->load->library("upload", $config);
                    //load library lib image
                    $this->load->library("image_lib");

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload("userfile")) {
                        $data_upload = $this->upload->data();

                        /* PATH */
                        $source = realpath('resources/products/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/products/thumb/');
                        $source_old = realpath('resources/products/thumb/' . $foto_thumbnail . '');

                        // Permission Configuration
                        chmod($source, 0777);

                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $img['image_library'] = 'GD2';
                        $img['create_thumb'] = TRUE;
                        $img['maintain_ratio'] = TRUE;

                        /// Limit Width Resize
                        $limit_thumb = 600;

                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'];

                        // Percentase Resize
                        if ($limit_use > $limit_thumb) {
                            $percent_thumb = $limit_thumb / $limit_use;
                        }

                        //// Making THUMBNAIL ///////
                        $img['width'] = $limit_use > $limit_thumb ? $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'];
                        $img['height'] = $limit_use > $limit_thumb ? $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'];

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality'] = '100%';
                        $img['source_image'] = $source;
                        $img['new_image'] = $destination_thumb;

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                        $update = array(
                            'nama_products' => $this->input->post("nama"),
                            'slug_products' => url_title(strtolower($this->input->post("nama"))),
                            'label_id' => $this->input->post("label"),
                            'harga_products' => $this->input->post("harga"),
                            'size_products' => $size,
                            'stock_products' => $this->input->post("stock"),
                            'descriptions_products' => $this->input->post("descriptions"),
                            'link_tokopedia' => $this->input->post("link_toped"),
                            'link_bukalapak' => $this->input->post("link_bl"),
                            'link_shopee' => $this->input->post("link_shopee"),
                            'thumbnail' => $data_upload['file_name']
                        );
                        $this->db->update("tbl_products", $update, $id);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                        //redirect halaman
                        redirect('admin/products/');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" style="font-family:Roboto">
					                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                                                    <i class="fa fa-check"></i> Data Gagal Diupdate ' . $this->upload->display_errors('') . '
			                                                </div>');
                        redirect('admin/products/');
                    }
                }
            }else{
                //
                echo 'No Type value';
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