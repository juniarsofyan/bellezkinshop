<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>










<div class="w3-row">
    <div class="w3-half w3-container">
        <h3>Profile</h3>
        nama : <?php echo $customer['nama']; ?> <br />
        tgl_lahir : <?php echo $customer['tgl_lahir']; ?> <br />
        jenis_kelamin : <?php echo $customer['jenis_kelamin']; ?> <br />
        telepon : <?php echo $customer['telepon']; ?> <br />
        email : <?php echo $customer['email']; ?> <br />
    </div>
    <div class="w3-half w3-container">
        <h3>Shipping Address</h3>
        <?php 
        foreach ($shipping_address as $item) :
            echo "Nama : " . $item['nama'] . "<br /><br />";
            echo "Telepon : " . $item['telepon'] . "<br />";
            echo "Provinsi : " . $item['provinsi'] . "<br />";
            echo "Kota : " . $item['kota'] . "<br />";
            echo "Kecamatan : " . $item['kecamatan'] . "<br />";
            echo "Alamat : " . $item['alamat'] . "<br /><br />";
            echo "Kode pos : " . $item['kode_pos'] . "<br />";
            echo (($item['is_default'] == 1) ? "<b> Default </b><br /> " : "");
            echo "<hr/>";
            echo "<br/>";
        endforeach;
        ?>
    </div>
</div>
<div class="w3-row">
    <div class="w3-third w3-container">
        <!-- jika ada error validasi -->
        <?php if (validation_errors()) : ?>
        <div class="alert alert-info text-center">
            <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>

        <h3>Add New Address</h3>
        <form method="POST" action="<?php echo base_url('customers/add_shipping_address'); ?>">
            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
            <label for="nama">Nama</label><br />
            <input type="text" name="nama" id="nama" value="<?php echo set_value('nama'); ?>"><br /><br /><br />
            <label for="telepon">Telepon</label><br />
            <input type="text" name="telepon" id="telepon" value="<?php echo set_value('telepon'); ?>"><br /><br /><br />
            <label for="provinsi">Provinsi</label><br />
            <input type="text" name="provinsi" id="provinsi" value="<?php echo set_value('provinsi'); ?>"><br /><br /><br />
            <label for="kota">Kota</label><br />
            <input type="text" name="kota" id="kota" value="<?php echo set_value('kota'); ?>"><br /><br /><br />
            <label for="kecamatan">Kecamatan</label><br />
            <input type="text" name="kecamatan" id="kecamatan" value="<?php echo set_value('kecamatan'); ?>"><br /><br /><br />
            <label for="alamat">Alamat</label><br />
            <input type="text" name="alamat" id="alamat" value="<?php echo set_value('alamat'); ?>"><br /><br /><br />
            <label for="kode_pos">Kode Pos</label><br />
            <input type="text" name="kode_pos" id="kode_pos" value="<?php echo set_value('kode_pos'); ?>"><br /><br /><br />
            <label for="is_default">Set Default</label><br />
            <input type="checkbox" name="is_default" id="is_default" value="1" <?php echo set_radio('is_default', 1); ?>><br /><br />
            <input type="submit" name="save" value="Save" class="btn btn-primary">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
        </form>
    </div>
</div>

<!-- banner -->
<?php
if (isset($_GET['ch']) && $_GET['ch'] == "shop" || !isset($_GET['ch'])) {
    $this->load->view('includes/banner');
}
?>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 