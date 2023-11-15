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
	    		
				<!-- Teknisi -->
		    	<?php if($getKaryawan->status_karyawan == 'teknisi'){ ?>

				<h3>Hai, <?= $getUser->firstname.' '.$getUser->lastname ?></h3>
				<h6>Anda adalah Teknisi di <?= $getOwner->nama_toko ?></h6><hr/>

				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-body">
								<h3>Service</h3>
								<div>Total service yang masih diproses</div><hr/>
								
								<h2 align="center"><?= $serviceProses ?></h2>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-body bg-success">
								<h3><i class="fas fa-check"></i> Service</h3>
								<div>Total service yang telah selesai</div><hr/>
								
								<h2 align="center"><?= $serviceSelesai ?></h2>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-body bg-danger">
								<h3><i class="fas fa-times"></i> Service</h3>
								<div>Total service yang dibatalkan</div><hr/>
								
								<h2 align="center"><?= $serviceBatal ?></h2>
							</div>
						</div>
					</div>
				</div>
				
				<?php }else if($getKaryawan->status_karyawan == 'cashier'){ ?>
				
				<!-- Cashier -->
				
				<?php } ?>

	    	</div>
	    </section>
	</div>
</div>