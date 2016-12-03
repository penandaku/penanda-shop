<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  /* fungsi login */
	function checking_login($table,$field1,$field2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1);
        $this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}
	/* end fungsi auth */

  /* label */
  function count_label()
  {
    return $this->db->get('tbl_label');
  }

  function index_label($halaman,$batas)
  {
      $query = "SELECT * FROM tbl_label limit $halaman, $batas";
      return $this->db->query($query);
  }

  function edit_label($id_label)
  {
      $id_label  =  array('id_label'=>$id_label);
      return $this->db->get_where('tbl_label',$id_label);
  }  
  /* label */

  /* products */
  function count_products()
  {
      return $this->db->get('tbl_products');
  }

  function index_products($halaman,$batas)
  {
      $query = "SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label ORDER BY a.id_products DESC limit $halaman, $batas";
      return $this->db->query($query);
  }

  function label_products()
  {
    $this->db->order_by('nama_label ASC');
    return $this->db->get('tbl_label');
  }

  function edit_products($id_products)
  {
      $id_products  =  array('id_products'=> $id_products);
      return $this->db->get_where('tbl_products',$id_products);
  }
  /* products */

  /* contact */
  function count_contact()
  {
      return $this->db->get('tbl_contact');
  }

  function index_contact($halaman,$batas)
  {
      $query = "SELECT * FROM tbl_contact  ORDER BY id_contact DESC limit $halaman, $batas";
      return $this->db->query($query);
  }
  /* contact */

  /* featured*/
  function index_featured()
  {
    $query = "SELECT * FROM tbl_featured";
    return $this->db->query($query);
  }
  /* featured*/

  function get_url($url)
  {
    $query = $this->db->query("");

    if($query->num_rows() > 0)
    {
      return $query->row();
    }else
    {
      return NULL;
    }
  }

  /* fungsi restrict halaman */
  function auth_id()
  {
    return $this->session->userdata('auth_id');
  }

  function username()
  {
    return $this->session->userdata('username');
  }

  function password()
  {
    return $this->session->userdata('password');
  }
	/* end fungsi restrict */

  /* fungsi logout */
	function logout()
	{
		$this->session->sess_destroy();
	}
	/* end fungsi logout */

}
