<body class="hold-transition sidebar-mini layout-fixed">

<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
  echo $message;
  $this->session->unset_userdata('msg_sweetalert');
}

?>

<div class="wrapper">
  <!-- Sidebar -->
  <?= $sidebar ?>

  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper pb-3">
	    <section class="content">
	    	<div class="container-fluid">

                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Profil</h3><hr>

                                    <?php if($getOwner->photo_toko == ''){ ?>

                                    <center><img src="<?= base_url('assets/images/no-image.png') ?>" class="img-fluid" style="height: 250px;"></center>

                                    <?php }else{ ?>

                                    <center><img src="<?= base_url('assets/images/logo-toko/'.$getOwner->photo_toko) ?>" class="img-fluid" style="height: 250px;"></center>

                                    <?php } ?>

                                    <center><a href="#modalUploadFoto" data-toggle="modal" class="btn btn-primary btn-sm mt-2">Upload Foto</a></center><hr>

                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname">Nama Depan</label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nama Depan" value="<?= $getUser->firstname ?>">
                                                    <?php echo form_error('firstname', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lastname">Nama Belakang</label>
                                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nama Belakang" value="<?= $getUser->lastname ?>">
                                                    <?php echo form_error('lastname', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $getUser->email ?>" disabled>
                                            <?php echo form_error('email', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div><hr>

                                        <h5>Data Toko</h5>
                                        <div class="form-group">
                                            <label for="nama_toko">Nama Toko</label>
                                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" value="<?= $getOwner->nama_toko ?>">
                                            <?php echo form_error('nama_toko', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Nomor HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?= $getOwner->no_hp ?>">
                                            <?php echo form_error('no_hp', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe_toko">Tipe Toko</label>
                                            <input type="text" class="form-control" id="tipe_toko" name="tipe_toko" placeholder="Tipe Toko" value="<?= $getOwner->tipe_toko ?>">
                                            <?php echo form_error('tipe_toko', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="slogan_toko">Slogan Toko</label>
                                            <input type="text" class="form-control" id="slogan_toko" name="slogan_toko" placeholder="Slogan Toko" value="<?= $getOwner->slogan_toko ?>">
                                            <?php echo form_error('slogan_toko', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_toko">Alamat Toko</label>
                                            <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" placeholder="Alamat Toko" value="<?= $getOwner->alamat_toko ?>">
                                            <?php echo form_error('alamat_toko', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Data Payment</h5><hr>

                                    <div class="form-group">
                                        <label for="bankName">Bank Name</label>
                                        <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Bank Name" value="<?= $getOwner->bankName ?>">
                                        <?php echo form_error('bankName', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="bankBranch">Bank Branch</label>
                                        <input type="text" class="form-control" id="bankBranch" name="bankBranch" placeholder="Bank Branch" value="<?= $getOwner->bankBranch ?>">
                                        <?php echo form_error('bankBranch', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="bankAccountNumber">Bank Account Number</label>
                                        <input type="text" class="form-control" id="bankAccountNumber" name="bankAccountNumber" placeholder="Bank Name" value="<?= $getOwner->bankAccountNumber ?>">
                                        <?php echo form_error('bankAccountNumber', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="bankAccountName">Bank Account Name</label>
                                        <input type="text" class="form-control" id="bankAccountName" name="bankAccountName" placeholder="Bank Name" value="<?= $getOwner->bankAccountName ?>">
                                        <?php echo form_error('bankAccountName', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

	    	</div>
	    </section>
	</div>
</div>

<!-- Modal Keluar -->
<div class="modal fade" id="modalUploadFoto" data-backdrop="static">
  <div class="modal-dialog">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fotoProfil" name="fotoProfil" onchange="previewFile('fotoProfil', 'label_fotoProfil')" required accept="image/*">
                <label class="custom-file-label" id="label_fotoProfil">Pilih Foto</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="uploadFoto" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Keluar</button>
        </div>
        </div>
    </form>
  </div>
</div>