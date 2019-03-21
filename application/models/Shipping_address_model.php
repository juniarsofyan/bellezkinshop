<?php defined('BASEPATH') or exit('No direct script access allowed');

class Shipping_address_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($customer_id)
    {
        $this->db->select('id, nama, telepon, provinsi, kota, kecamatan, alamat, kode_pos, is_default');
        $query = $this->db->get_where('cn_shipping_address', array('customer_id' => $customer_id));
        return $query->result_array();
    }

    public function get($id)
    {
        $this->db->select('id, nama, telepon, provinsi, kota, kecamatan, alamat, kode_pos, is_default');
        $query = $this->db->get_where('cn_shipping_address', array('id' => $id));
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('cn_shipping_address', $data);
        return $insert_id = $this->db->insert_id();
    }

    public function remove_default($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        return $this->db->update('cn_shipping_address', array('is_default' => ''));
    }
}

/* End of file Shipping_address_model.php */
