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
          <div class="row">
            <div class="col-lg-8">
                <!-- Bagian Daftar Produk -->
                <div class="card">
                    <div class="card-header">Daftar Produk</div>
                        <div class="col-lg-6 mt-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row">

                        <?php foreach ($barang as $item): ?>
                        
                                    <div class="col-md-4">
                                        <div class="card px-2 py-1">
                                            <div class="product-card">
                                                <img class="product-image" style="height:250px;" src="<?=base_url('assets/images/barang/'.$item->gambar)?>" alt="<?=$item->nama_barang?>">
                                                <h4><?=$item->nama_barang?></h4>
                                                <p>Harga: Rp. <?=number_format($item->harga, 0, '.', ',');?></p>
                                                <p>Stok Tersisa: <?=$item->stok?></p>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button id="decrement" class="btn btn-outline-secondary" type="button">-</button>
                                                    </div>
                                                    <input id="quantity" type="number" readonly class="form-control text-center" value="1">
                                                    <div class="input-group-append">
                                                        <button id="increment" class="btn btn-outline-secondary" type="button">+</button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-1 btn-block">Tambah</button>
                                            </div>
                                        </div>
                                    </div>

                        <?php endforeach; ?>
                        </div>

                        <!-- Isi dengan daftar produk -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Bagian Struk Pesanan -->
                <div class="card">
                    <div class="card-header">Struk Pesanan</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Tampilkan daftar pesanan di sini -->
                        </ul>
                        <hr>
                        <p>Total: $100</p>
                        <button class="btn btn-primary btn-block">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>


<script>
        // Mengambil elemen-elemen yang diperlukan
        const decrementButton = document.getElementById("decrement");
        const incrementButton = document.getElementById("increment");
        const quantityInput = document.getElementById("quantity");

        // Menambahkan event listener untuk tombol pengurangan
        decrementButton.addEventListener("click", () => {
            let currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        });

        // Menambahkan event listener untuk tombol penambahan
        incrementButton.addEventListener("click", () => {
            let currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
        });
    </script>