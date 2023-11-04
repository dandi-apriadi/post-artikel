ss<body class="hold-transition sidebar-mini layout-fixed">

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
	    		
		    	<div class="card">
		    		<div class="card-body">
		    			<h3>Data Karyawan</h3>
		    			<div>Data Karyawan yang telah Terdaftar di Toko Anda</div><hr/>

		    			<table id="table" class="table text-center table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Karyawan</th>
										<th>Email Karyawan</th>
										<th>No Hp</th>
										<th>Status Karyawan</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody id="showdata" class="text-center"></tbody>
							</table>
		    		</div>
		    	</div>

	    	</div>
	    </section>
	</div>
</div>
<script src="<?= base_url('assets/library/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/library/datatables/js/dataTables.min.js') ?>"></script>
<script type="text/javascript">
	$('#table').DataTable({

		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('Karyawan/listApi') ?>",
			"type": "POST"
		},

		"columnDefs": [
			{
				"targets": [0],
				"ordertable": false
			}
		]

	});
</script>