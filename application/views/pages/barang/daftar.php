<body class="hold-transition py-5 sidebar-mini layout-fixed">

<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
  echo $message;
  $this->session->unset_userdata('msg_sweetalert');
}

?>

<!-- https://source.unsplash.com/600x401/?nutmeg -->


<div class="wrapper">
  <!-- Sidebar -->
  <?= $sidebar ?>

  <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="">Daftar Barang</h1> <hr>
                <div class="row">

                <?php foreach ($barang as $item): ?>
                    
                    <div class="col-md-4">
                        
                        <div class="card mb-4">
                            <img src="<?php echo base_url('assets/images/barang/'.$item->gambar); ?>" class="card-img-top" style="height:250px;" alt="<?php echo $item->nama_barang; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item->nama_barang; ?></h5>
                                <p class="card-text">Rp.<?php echo number_format($item->harga,0,',','.');?></p>
                                <a href="<?php echo base_url('/barang/detail/'.$item->id)?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                   


                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>