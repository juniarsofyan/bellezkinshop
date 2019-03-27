<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>

<br />
<!-- 02002, 10003, 04001, 05003 -->
<input type="text" name="product_code" id="product_code" value="01001">
<input type="number" name="qty" id="qty"><br />
<button id="add" name="add">Add</button>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 