<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model
{

    public $table = "cn_customer";

    public function __construct()
    {
        parent::__construct();
    }

    /* public function get($id)
    {
        $this->db->select('
            id,
            nama,
            tgl_lahir,
            telepon,
            email,
            jenis_kelamin,
            tanggal_registrasi
        ');

        $this->db->from($this->table);
        $this->db->order_by('nama', 'asc');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        }
    } */

    public function create($data)
    {
        $nama               = $this->input->post('nama');
        $tgl_lahir          = $this->input->post('tgl_lahir');
        $telepon            = $this->input->post('telepon');
        $email              = $this->input->post('email');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        // $tanggal_registrasi = $this->input->post('tanggal_registrasi');

        $data = array(
            "nama"               => $nama,
            "tgl_lahir"          => $tgl_lahir,
            "telepon"            => $telepon,
            "email"              => $email,
            "jenis_kelamin"      => $jenis_kelamin,
            // "tanggal_registrasi" => $tanggal_registrasi
        );

        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        if ($insert_id) {
            return $insert_id;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $nama               = $this->input->post('nama');
        $tgl_lahir          = $this->input->post('tgl_lahir');
        $telepon            = $this->input->post('telepon');
        $email              = $this->input->post('email');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');

        $data = array(
            "nama"               => $nama,
            "tgl_lahir"          => $tgl_lahir,
            "telepon"            => $telepon,
            "email"              => $email,
            "jenis_kelamin"      => $jenis_kelamin,
            // "tanggal_registrasi" => $tanggal_registrasi
        );

        if ($id) {
            $this->db->where('id', $id);
            $update = $this->db->update($this->table, $data);

            if ($update) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get($id)
    {
        $query = $this->db->get_where('cn_customer', array('id ' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('cn_customer', $data);
        return $insert_id = $this->db->insert_id();
    }

    public function activate($data, $id)
    {
        $this->db->where('cn_customer.id', $id);
        return $this->db->update('cn_customer', $data);
    }
}

/* End of file kelas_model.php */
/* Location: ./application/models/kelas_model.php */
