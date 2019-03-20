<!-- header -->
<?php $this->load->view('includes/header'); ?>

<div class="w3-row">
    <div class="w3-col w3-container">
        <!-- jika ada error validasi -->
        <?php if (validation_errors()) : ?>
        <div class="alert alert-info text-center">
            <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>

        <!-- jika ada pesan -->
        <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-info text-center">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php endif; ?>

        <h3 class="text-center">Login Customer</h3>
        <form method="POST" action="<?php echo base_url() . 'customers/login'; ?>">
            <label for="email">Email:</label> <br />
            <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>">
            <br /> <br />
            <label for="password">Password:</label> <br />
            <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>">
            <br /> <br />
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 