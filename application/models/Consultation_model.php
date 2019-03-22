<?php defined('BASEPATH') or exit('No direct script access allowed');

class Consultation_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('cn_consultation', $data);
        return $insert_id = $this->db->insert_id();
    }
}

/* End of file Consultation_model.php */
