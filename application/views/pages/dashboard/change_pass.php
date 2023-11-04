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
  <div class="content-wrapper">
    <section class="content">
    	<div class="container-fluid">
    		
        	<div class="row justify-content-md-center">
        		<div class="col-md-7">
        			<div class="card">
				    		<div class="card-body">
				    			<h4>Edit Password</h4>
	                <p style="color: red;">Jika berhasil mengubah password, maka Anda akan otomatis keluar.</p>
				    			
				    			<form action="" method="post">
	                  <div class="form-group">
	                      <label for="pass_old">Password Lama</label>
	                      <input type="password" name="pass_old" id="pass_old" class="form-control" placeholder="Masukkan Password Lama">
	                      <?php echo form_error('pass_old', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
	                  </div>
	                  <div class="form-group">
	                      <label for="pass_new">Password Baru</label>
	                      <input type="password" name="pass_new" id="pass_new" class="form-control" placeholder="Masukkan Password Baru">
	                      <?php echo form_error('pass_new', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
	                  </div>
	                  <div class="form-group">
	                      <label for="confirm_pass_new">Konfirmasi Password Baru</label>
	                      <input type="password" name="confirm_pass_new" id="confirm_pass_new" class="form-control" placeholder="Konfirmasi Password Baru">
	                      <?php echo form_error('confirm_pass_new', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
	                  </div>
				    				<div class="row">
				    					<div class="col-md-4">
				    						<button type="submit" name="save" class="btn btn-primary btn-block">Simpan</button>
				    					</div>
				    					<div class="col-md-4">
				    						<a href="<?= base_url('dashboard') ?>" class="btn btn-danger btn-block">Kembali</a>
				    					</div>
				    				</div>
				    			</form>
				    		</div>
				    	</div>
        		</div>
        	</div>

    	</div>
    </section>
  </div> <!-- /.content-wrapper -->
</div>