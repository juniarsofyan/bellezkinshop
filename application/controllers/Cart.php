<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function add()
    {
        $product_id = $this->input->get('product_id');
        $qty        = $this->input->get('qty');

        if (!isset($this->session->cart)) {
            $sesion_data = array(
                'product_id' => $product_id,
                'qty'        => $qty
            );

            $this->session->set_userdata('cart', array($sesion_data));
        } else {
            $current_cart_items = $this->session->cart;

            foreach ($current_cart_items as $key => $item) {
                if ($item['product_id'] == $product_id) {
                    $current_cart_items[$key]['qty'] += $qty;
                    $this->session->set_userdata('cart', $current_cart_items);
                    return;
                }
            }

            $current_cart_items[] = array(
                'product_id' => $product_id,
                'qty'        => $qty
            );

            $this->session->set_userdata('cart', $current_cart_items);
        }
    }

    public function remove()
    {
        $product_id = $this->input->get('product_id');

        if (!isset($this->session->cart)) {
            return;
        } else {
            $current_cart_items = $this->session->cart;

            foreach ($current_cart_items as $key => $item) {
                if ($item['product_id'] == $product_id) {
                    if ($item['qty'] == 0) {
                        unset($current_cart_items[$key]);
                        $this->session->set_userdata('cart', $current_cart_items);
                        return;
                    } else {
                        $current_cart_items[$key]['qty'] -= 1;
                        $this->session->set_userdata('cart', $current_cart_items);
                        return;
                    }
                }
            }
        }
    }
}

/* End of file Cart.php */
