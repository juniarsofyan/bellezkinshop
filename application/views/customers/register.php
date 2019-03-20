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

        <h3 class="text-center">Register Form</h3>
        <form method="POST" action="<?php echo base_url() . 'customers/register'; ?>">
            <label for="nama">Nama:</label> <br />
            <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
            <br /> <br />
            <label for="tgl_lahir">Tanggal Lahir:</label> <br />
            <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>">
            <br /> <br />
            <label for="jenis_kelamin">Jenis Kelamin:</label> <br />
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="PRIA"> PRIA <br />
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="WANITA"> WANITA
            <br /> <br />
            <label for="telepon">Telepon:</label> <br />
            <input type="text" id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>">
            <br /> <br />
            <label for="email">Email:</label> <br />
            <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>">
            <br /> <br />
            <label for="password">Password:</label> <br />
            <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>">
            <br /> <br />
            <label for="password_confirm">Password:</label> <br />
            <input type="password" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>">
            <br /> <br />
            <button type="submit" name="save" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 