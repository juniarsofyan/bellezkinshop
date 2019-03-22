<?php defined('BASEPATH') or exit('No direct script access allowed');

class Consultation extends CI_Controller
{

    public function index()
    {
        $data = array();
        $data['page_title'] = "Konsultasi BC";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'Contact BC', 'url' => '', 'active' => 'yes');

        if (!isset($_POST['save'])) {
            $this->load->view('consultation/index', $data);
        } else {
            $this->load->model('consultation_model');

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('usia', 'Usia', 'required');
            $this->form_validation->set_rules('keluhan_kulit', 'Keluhan kulit', 'required');
            $this->form_validation->set_rules('tipe_kulit', 'Tipe kulit', 'required');
            $this->form_validation->set_rules('tingkat_kulit_sensitif', 'Tingkat sensitifitas kulit', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('consultation/index', $data);
            } else {
                $customer['nama']                   = $this->input->post('nama');
                $customer['jenis_kelamin']          = $this->input->post('jenis_kelamin');
                $customer['usia']                   = $this->input->post('usia');
                $customer['keluhan_kulit']          = $this->input->post('keluhan_kulit');
                $customer['tipe_kulit']             = $this->input->post('tipe_kulit');
                $customer['tingkat_kulit_sensitif'] = $this->input->post('tingkat_kulit_sensitif');
                $customer['deskripsi']              = $this->input->post('deskripsi');

                $id = $this->consultation_model->insert($customer);

                if ($id) {
                    $message = "Terima kasih telah melengkapi informasi yang dibutuhkan, selanjutnya Beauty Consultant kami akan menghubungi Anda. <br />";
                    $message .= "Reschedule konsultasi bisa disampaikan jika Anda dalam waktu dan tempat yang sedang tidak memungkinkan.";
                    $this->session->set_flashdata('message', $message);
                } else {
                    $this->session->set_flashdata('message', $this->email->print_debugger());
                }

                redirect('consultation');
            }
        }
    }
}

/* End of file Consultation.php */
