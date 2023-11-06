<body class="hold-transition sidebar-mini layout-fixed">
 
<?php 
 
$message = $this->session->flashdata('msg_sweetalert');
 
if (isset($message)) {
  echo $message;
  $this->session->unset_userdata('msg_sweetalert');
}
 
?>

 <div class="wrapper">
    <?= $sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-3">
          <section class="content">
              <div class="container-fluid"> 
                    <div class="card">
                      <div class="card-body">
                        <h1 class="">Input Data Barang</h1> <hr>
                        <form method="post" action="" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="namaBarang">Nama Barang:</label>
                            <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Masukkan Nama Barang" value="<?= set_value('namaBarang') ?>">
                            <?php echo form_error('namaBarang', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" value="<?= set_value('harga') ?>">
                            <?php echo form_error('harga', '<small class="text-muted"><font color="red">', '</font></small>'); ?> 
                          </div>
                          <div class="form-group">
                            <label for="stok">Stok Awal:</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Awal" value="<?= set_value('stok') ?>">
                            <?php echo form_error('stok', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="gambar">Gambar:</label>
                            <input type="file"  id="gambar" class="form-control-file" name="gambar">
                            <?php echo form_error('gambar', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukkan Deskripsi"><?=set_value('deskripsi')?></textarea>
                            <?php echo form_error('deskripsi', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                </div>
          </div>
      </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>