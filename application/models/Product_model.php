<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($product_code)
    {
        $this->db->select('nama, h_nomem, diskon');
        $query = $this->db->get_where('tb_barang', array('kode_barang' => $product_code));
        return $query->row_array();
    }
}

/* End of file Product_model.php */
