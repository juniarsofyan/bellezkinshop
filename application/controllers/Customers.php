<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    public function index()
    {
        echo "halo";
    }

    public function profile()
    {
        // $this->session->set_userdata('userdata', $user_array);
        // $customer = $this->session->userdata('userdata');
        // $id = $this->uri->segment(3);
        $customer_id = 1;

        $data = array();
        $data['page_title'] = "My Account";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => '', 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'My Account', 'url' => '', 'active' => 'yes');
        $data['data'] = $this->customers_model->get($id);

        $this->load->view('index', $data);
    }

    public function register()
    {
        if (!isset($_POST['save'])) {
            $data = array();
            $data['page_title'] = "Register";
            $data['breadcrumb'][] = array('label' => 'Home', 'url' => '', 'active' => 'no');
            $data['breadcrumb'][] = array('label' => 'Register', 'url' => '', 'active' => 'yes');

            $this->load->view('customers/register', $data);
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == false) {
                $this->load->view('customers/register');
                // echo "validation failed";
            } else {

                //generate simple random code
                $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = substr(str_shuffle($set), 0, 12);

                $data['nama']             = $this->input->post('nama');
                $data['tgl_lahir']        = $this->input->post('tgl_lahir');
                $data['jenis_kelamin']    = $this->input->post('jenis_kelamin');
                $data['telepon']          = $this->input->post('telepon');
                $data['email']            = $this->input->post('email');
                $data['password']         = $this->input->post('password');
                $data['activation_token'] = $code;

                $id = $this->customers_model->insert($data);

                // set up email
                $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.mailtrap.io',
                    'smtp_port' => 465,
                    // 'smtp_user' => '<a href="mailto:testsourcecodester@gmail.com" rel="nofollow">testsourcecodester@gmail.com</a>', // change it to yours
                    'smtp_user' => '8bb9747a9e628f',   // change it to yours
                    'smtp_pass' => '7d57713fd0be13',   // change it to yours
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'newline'   => "\r\n",
                    'wordwrap'  => true
                );

                $message = "
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: " . $data['email'] . "</p>
 	 						 < p>Password: " . $data['password'] . "</ p >
							 < p>Please click the link below to activate your account.</p>
							<h4><a href='" . base_url() . "customers/activate/" . $id . "/" . $code . "'> Activate My Account</a></h4>
						</body>
                        </html>";

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user']);
                $this->email->to($data['email']);
                $this->email->subject('Signup Verification Email');
                $this->email->message($message);

                //sending email
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Silahkan check email dan klik link aktivasi akun');
                } else {
                    $this->session->set_flashdata('message', $this->email->print_debugger());
                }

                redirect('customers/register');
            }
        }



        /* // $logged_in = $this->session->userdata('user_data');
        $logged_in = true;

        if (empty($logged_in)) :
            // redirect('welcome');
            echo "lala";
        else :
            if (isset($_POST['save'])) {
                $this->load->model('customers_model');
                $this->customers_model->register($data);
                redirect('welcome');
            }

            $data = array();
            $data['page_title'] = "My Account";
            $data['breadcrumb'][] = array('label' => 'Home', 'url' => '', 'active' => 'no');
            $data['breadcrumb'][] = array('label' => 'My Account', 'url' => '', 'active' => 'yes');

            $this->load->view('customers/register', $data);
        endif; */
    }

    public function activate()
    {
        $id =  $this->uri->segment(3);
        $activation_token = $this->uri->segment(4);
        $customer = $this->customers_model->get($id);

        // jika kode aktivasi cocok
        if ($customer['activation_token'] == $activation_token) {
            //up date user active status
            $data['activation_token'] = '';
            $data['tanggal_registrasi'] = date('Y-m-d H:i:s');
            $query = $this->customers_model->activate($data, $id);

            if ($query) {
                $this->session->set_flashdata('message', 'User activated successfully');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect('customers/register');
    }

    function update()
    {
        $logged_in = true;
        if (!$logged_in) :
            redirect('auth_admin');
        else :
            $customer_id = 1;

            $data = array();

            if (isset($_POST['save'])) {
                if ($this->save('update', $customer_id)) {
                    $this->data['message'] = 'Update Berhasil';
                } else {
                    $this->data['message'] = 'Update Gagal';
                }
            }

            redirect('customers/profile');
        endif;
    }

    function save($type = 'create', $id = 0)
    {
        // set up validation
        $this->form_validation->set_rules($this->kelas_model->validation);

        $tingkat     = $this->input->post('tingkat_kelas');
        $jurusan     = $this->input->post('subjek_kelas');
        $nomor_kelas = $this->input->post('nomor_kelas');

        $nama_kelas = $tingkat . " " . $jurusan . " " . $nomor_kelas;

        // process the form
        if ($this->form_validation->run() != false) :
            $this->data['post'] = array();
            $this->data['post']['class_name'] = $nama_kelas;
            // $this->data['post']['wali_kelas'] = $this->input->post('wali_kelas');

            if ($type == 'create') {
                $id = $this->kelas_model->create($this->data['post']);

                if (is_numeric($id)) {
                    $result = $id;
                } else {
                    $result = false;
                }
            } elseif ($type == 'update') {
                $result = $this->kelas_model->update($id, $this->data['post']);
            } else {
                return false;
            }

            return $result;
        endif;
    }
}
