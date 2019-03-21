<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model
{
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

    public function get_activation_code($id)
    {
        $this->db->select('activation_code');
        $query = $this->db->get_where('cn_customer', array('id' => $id));
        return $query->row_array();
    }

    public function get($login_token)
    {
        $this->db->select('id, nama, tgl_lahir, jenis_kelamin, telepon, email');
        $query = $this->db->get_where('cn_customer', array('login_token' => $login_token));
        return $query->row_array();
    }

    public function check_customer($email, $password)
    {
        $where_clause = array(
            'email' => $email,
            'password' => md5($password)
        );

        $query = $this->db->get_where('cn_customer', $where_clause);
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

    public function set_login_token($id, $data)
    {
        $this->db->where('cn_customer.id', $id);
        return $this->db->update('cn_customer', $data);
    }

    public function remove_login_token($login_token)
    {
        $this->db->where('cn_customer.login_token', $login_token);
        return $this->db->update('cn_customer', array('login_token' => ''));
    }
}

/* End of file kelas_model.php */
/* Location: ./application/models/kelas_model.php */
