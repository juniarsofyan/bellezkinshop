<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    public function check_logged_in()
    {
        if (!isset($this->session->login_token)) {
            redirect('customers/login');
        }
    }

    public function index()
    {
        $this->check_logged_in();
        $this->load->model('shipping_address_model');

        $data = array();
        $data['page_title'] = "My Account";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'My Account', 'url' => '', 'active' => 'yes');
        $data['customer'] = $this->customers_model->get($this->session->login_token);
        $data['shipping_address'] = $this->shipping_address_model->get_all($data['customer']['id']);

        $this->load->view('customers/index', $data);
    }

    public function generate_code($length)
    {
        //generate simple random code
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, $length);
        return $code;
    }

    public function register()
    {
        if (isset($this->session->login_token)) {
            redirect('customers');
        }

        $data = array();
        $data['page_title'] = "Register";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'Register', 'url' => '', 'active' => 'yes');

        if (!isset($_POST['save'])) {
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
                $this->load->view('customers/register', $data);
            } else {
                $activation_code = $this->generate_code(12);

                $customer['nama']             = $this->input->post('nama');
                $customer['tgl_lahir']        = $this->input->post('tgl_lahir');
                $customer['jenis_kelamin']    = $this->input->post('jenis_kelamin');
                $customer['telepon']          = $this->input->post('telepon');
                $customer['email']            = $this->input->post('email');
                $customer['password']         = md5($this->input->post('password'));
                $customer['activation_code']  = $activation_code;

                $id = $this->customers_model->insert($customer);

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
                                <p>Please click the link below to activate your account.</p>
                                <h4><a href='" . base_url() . "customers/activate/" . $id . "/" . $activation_code . "'> Activate My Account</a></h4>
                            </body>
                        </html>";

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user']);
                $this->email->to($customer['email']);
                $this->email->subject('Signup Verification Email');
                $this->email->message($message);

                // kirim email konfirmasi
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Silahkan check email dan klik link aktivasi akun');
                } else {
                    $this->session->set_flashdata('message', $this->email->print_debugger());
                }

                redirect('customers/register');
            }
        }
    }

    public function activate()
    {
        $id =  $this->uri->segment(3);
        $activation_code = $this->uri->segment(4);
        $customer = $this->customers_model->get_activation_code($id);

        // jika kode aktivasi cocok 
        if ($customer['activation_code'] == $activation_code) {
            // hapus kode aktivasi, karena akun sudah aktif
            $data['activation_code'] = '';
            $data['tanggal_registrasi'] = date('Y-m-d H:i:s');
            $query = $this->customers_model->activate($data, $id);

            if ($query) {
                $this->session->set_flashdata('message', "Akun berhasil di aktifkan, silahkan login");
            } else {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect('customers/login');
    }

    public function login()
    {
        $data = array();
        $data['page_title'] = "Customer Login";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'Customer Login', 'url' => '', 'active' => 'yes');

        if (!isset($_POST['login'])) {
            $this->load->view('customers/login', $data);
        } else {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            $customer = $this->customers_model->check_customer($email, $password);

            if ($customer) {
                $login_token = $this->generate_code(10);
                $this->customers_model->set_login_token($customer['id'], array('login_token' => $login_token));

                $session_data = array(
                    'nama'        => $customer['nama'],
                    'login_token' => $login_token
                );

                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('message', 'Selamat datang ' . $customer['nama'] . "!");

                redirect('customers');
            } else {
                $this->session->set_flashdata('message', 'Email dan password tidak cocok');
                redirect('customers/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->customers_model->remove_login_token($this->session->login_token);
        $this->session->sess_destroy();
        redirect('welcome');
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

            redirect('customers');
        endif;
    }

    public function add_shipping_address()
    {
        $this->check_logged_in();
        $this->load->model('shipping_address_model');

        if (!isset($_POST['save'])) {
            redirect('customers');
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'numeric|required');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'numeric');

            $data = array();
            $data['page_title'] = "My Account";
            $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
            $data['breadcrumb'][] = array('label' => 'My Account', 'url' => '', 'active' => 'yes');
            $data['customer'] = $this->customers_model->get($this->session->login_token);
            $data['shipping_address'] = $this->shipping_address_model->get_all($data['customer']['id']);

            if ($this->form_validation->run() == false) {
                $this->load->view('customers/index', $data);
            } else {
                $customer['customer_id'] = $this->input->post('customer_id');
                $customer['nama']        = $this->input->post('nama');
                $customer['telepon']     = $this->input->post('telepon');
                $customer['provinsi']    = $this->input->post('provinsi');
                $customer['kota']        = $this->input->post('kota');
                $customer['kecamatan']   = $this->input->post('kecamatan');
                $customer['alamat']      = $this->input->post('alamat');
                $customer['kode_pos']    = $this->input->post('kode_pos');
                $customer['is_default']  = $this->input->post('is_default');

                if ($customer['is_default']) {
                    $this->shipping_address_model->remove_default($customer['customer_id']);
                }

                $id = $this->shipping_address_model->insert($customer);

                if ($id) {
                    $this->session->set_flashdata('message', 'Alamat berhasil ditambahkan');
                } else {
                    $this->session->set_flashdata('message', $this->email->print_debugger());
                }

                redirect('customers');
            }
        }
    }
}
