<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>



<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 