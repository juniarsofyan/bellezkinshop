<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>

<br />

<?php if (!$cart) : ?>
<div class="alert">
    oops, no item in the cart
</div>
<?php else : ?>
<?php

echo "<pre>";
print_r($cart);
echo "</pre>";

?>

<table border="1">
    <tr>
        <td>Product</td>
        <td>Qty</td>
        <td>Price</td>
        <td>Discount</td>
        <td>Price after discount</td>
        <td>subtotal</td>
        <td>action</td>
    </tr>
    <?php 
    $i = 1;
    foreach ($cart as $item) :
        ?>
    <tr>
        <td><?php echo $item['name']; ?></td>
        <td><input type="number" product-code="<?php echo $item['product_code']; ?>" price-after-discount="<?php echo $item['price_after_discount']; ?>" class="cart-product-qty" value="<?php echo $item['qty']; ?>"></td>
        <td><strike><?php echo $item['price']; ?></strike></td>
        <td><?php echo $item['discount']; ?></td>
        <td><?php echo $item['price_after_discount']; ?></td>
        <td id="subtotal-<?php echo $item['product_code']; ?>"><?php echo $item['subtotal']; ?></td>
        <td><a href="#" product-code="<?php echo $item['product_code']; ?>" class="remove-item">hapus</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 