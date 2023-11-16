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
	    		
		    	<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								<h3>Profil</h3><hr>

								<?php if($getKaryawan->photo_karyawan == '-'){ ?>

								<center><img src="<?= base_url('assets/images/no-image.png') ?>" class="img-fluid" style="height: 150px;"></center>

								<?php }else{ ?>

								<center><img src="<?= base_url('assets/images/profile/'.$getKaryawan->photo_karyawan) ?>" class="img-fluid" style="height: 150px;border-radius: 50%;"></center>

								<?php } ?>

								<h3 class="mt-3" align="center"><?= $getUser->firstname.' '.$getUser->lastname ?></h3>
								<h5 align="center"><?= ucwords($getKaryawan->status_karyawan) ?></h5><hr>

								<table style="width: 100%;">
									<tbody>
										<tr><td>Email</td>
											<td>:</td>
											<td><?= $getUser->email ?></td>
										</tr>
										<tr>
											<td>Nomor HP</td>
											<td>:</td>
											<td><?= $getKaryawan->no_hp ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

	    	</div>
	    </section>
	</div>
</div>