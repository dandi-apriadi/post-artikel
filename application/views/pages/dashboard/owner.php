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
	    		
		    	<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								askdoaskod
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								askdoaskod
							</div>
						</div>
					</div>
				</div>

	    	</div>
	    </section>
	</div>
</div>