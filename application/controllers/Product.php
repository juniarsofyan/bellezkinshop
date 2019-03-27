<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function index()
    { }

    public function detail()
    {
        $data = array();
        $data['page_title'] = "";
        $data['breadcrumb'][] = array('label' => 'Home', 'url' => base_url(), 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'Brightening', 'url' => '', 'active' => 'no');
        $data['breadcrumb'][] = array('label' => 'Whitening Glow Series', 'url' => '', 'active' => 'yes');

        $this->load->view('products/detail', $data);
    }
}

/* End of file Product.php */
