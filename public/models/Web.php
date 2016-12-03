<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    function index_products()
    {
        $query = "SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label ORDER BY a.id_products DESC";
        return $this->db->query($query);
    }

    function get_url($url)
    {
        $query = $this->db->query("SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE a.slug_products='$url'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }


    function index_search($keywords)
    {
        $query = "SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE a.nama_products like '%". $keywords ."%'";
        return $this->db->query($query);
    }


    function get_search($keywords)
    {
        $query = $this->db->query("SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE a.nama_products like '%". $keywords ."%'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    function index_category($category)
    {
        $query = "SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE b.slug ='$category' ORDER BY a.id_products DESC";
        return $this->db->query($query);
    }

    function get_category($category)
    {
        $query = $this->db->query("SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE b.slug='$category'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    function get_other_products($category)
    {
        $query = "SELECT * FROM tbl_products as a join tbl_label as b ON a.label_id = b.id_label WHERE b.nama_label='$category' limit 0, 3";
        return $this->db->query($query);
    }

}