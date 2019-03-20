<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>

<!-- banner -->
<?php
if (isset($_GET['ch']) && $_GET['ch'] == "shop" || !isset($_GET['ch'])) {
    $this->load->view('includes/banner');
}
?>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 