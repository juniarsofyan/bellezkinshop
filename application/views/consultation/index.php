<?php $this->load->view('includes/header'); ?>

<!-- jika ada pesan -->
<?php if ($this->session->flashdata('message')) : ?>
<div class="alert alert-info text-center">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>

<!-- jika ada error validasi -->
<?php if (validation_errors()) : ?>
<div class="alert alert-info text-center">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<h2>Format Konsultasi</h2>
<form action="<?php echo base_url('consultation'); ?>" method="post">
    <h3>1 of 4 Perkenalan</h3>
    <label for="nama">Hi, Bagaimana kami memanggil anda?</label><br />
    <input type="text" name="nama" id="nama"><br /><br />
    <label for="jenis_kelamin">Ok, apakah anda pria atau wanita?</label><br />
    <select name="jenis_kelamin" id="jenis_kelamin"><br />
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
    </select><br /><br />
    <label for="usia">Berapakah usia anda?</label><br />
    <select name="usia" id="usia"><br />
        <option value="16-19">16-19 tahun</option>
        <option value="20-24">20-24 tahun</option>
        <option value="30-45">30-45 tahun</option>
        <option value="45 Tahun Keatas">45 Tahun Keatas</option>
    </select><br /><br />
    <hr />
    <h3>2 of 4 Analisa</h3>
    <label for="keluhan_kulit">Apakah keluhan utama kulit anda?</label><br />
    <select name="keluhan_kulit" id="keluhan_kulit"><br />
        <option value="Jerawat Ringan">Jerawat Ringan</option>
        <option value="Jerawat Banyak">Jerawat Banyak</option>
        <option value="Mencerahkan">Mencerahkan</option>
        <option value="Flek">Flek</option>
    </select><br /><br />
    <label for="tipe_kulit">Menurut anda, seperti apa tipe kulit anda?</label><br />
    <select name="tipe_kulit" id="tipe_kulit"><br />
        <option value="Berminyak">Berminyak</option>
        <option value="Berminyak di area tertentu">Berminyak di area tertentu</option>
        <option value="Normal">Normal</option>
        <option value="Kering">Kering</option>
    </select><br /><br />
    <label for="tingkat_kulit_sensitif">Apakah kulit anda sensitif?</label><br />
    <select name="tingkat_kulit_sensitif" id="tingkat_kulit_sensitif"><br />
        <option value="Tidak Sensitif">Tidak Sensitif</option>
        <option value="Sensitif">Sensitif</option>
        <option value="Sangat Sensitif">Sangat Sensitif</option>
    </select>
    <hr />
    <h3>3 of 4 Ceritakan lebih banyak</h3>
    <p>Agar kami bisa mengetahui lebih dalam, Anda bisa menceritakan lebih mengenai keluhan anda. <b><i>So, tell us more</i></b></p>
    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea><br /><br />
    <input type="submit" name="save" value="SUBMIT">
</form>
<!-- footer -->
<?php $this->load->view('includes/footer'); ?> 