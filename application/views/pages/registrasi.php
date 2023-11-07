<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/library/fontawesome/css/all.min.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo_polimdo.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/library/sweetalert/sweetalert2.min.css') ?>" />

    <!-- Javascript Files -->
    <script src="<?= base_url('assets/library/sweetalert/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url('assets/dashboard/jquery/jquery.min.js') ?>"></script>

    <!-- Meta Tag SEO -->
    <meta name="author" content="Saskardigital">
    <meta name="description" content="BaDag - Your Privacy Is Our Priority">
    <meta name="keyword" content="aplikasi kasir, pos, point of sale, kasir, bantu dagang, badag, website, aplikasi berbasis web, web, toko, toko service">

    <!-- Meta Tag Open Graph -->
    <meta property="og:title" content="BaDag - Bantu Dagang" />
    <meta property="og:description" content="BaDag - Your Privacy Is Our Priority">
    <meta property="og:image" content="<?= base_url('assets/images/icon.png') ?>">
    <meta property="og:url" content="<?= base_url() ?>">

    <title>BaDag - Bantu Dagang</title>
    <style type="text/css">
      body{
        overflow-x: hidden;
      }

      .content-full{
        height: 100vh;
      }

      .content-left{
        background-color: #0f8cfd;
        color: white;
        padding-top: 100px;
        padding-bottom: 30px;
      }

      .content-right{
        padding-top: 100px;
        background-color: #f8f8f8;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
      }

      
    </style>
  </head>
<body>

  <?php 

  $message = $this->session->flashdata('msg_sweetalert');

  if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg_sweetalert');
  }

  ?>

  <div class="row content-full">
    <div class="col-md-6 content-left">

      <center><img src="<?= base_url('assets/images/badag.png') ?>" class="img-fluid" style="height: 250px;"></center><br/>

      <h3 align="center">BaDag - Pendaftaran Toko</h3>
      <h5 align="center">Kami siap membantu dagangan Anda</h5><br/>

      <center><a href="<?= base_url() ?>" class="btn btn-outline-light">Masuk Ke Akun anda <i class="fas fa-arrow-down"></i></a></center>
    </div>
    <div class="col-md-6 content-right">
      <h3>Selamat Datang di Aplikasi BaDag</h3>
      <h5><i>Your Privacy Is Our Priority</i></h5><hr style="width: 95%;" align="left" />

      <h4 class="mt-4">Registrasi</h4>
      <div>Silahkan Masukkan Data Anda</div>

      <div class="container mt-5">
        <form method="post" action="">

          <div class="row">
              <div class="col-md-6">
                <h2 class="text-center">Data Pengguna</h2>
                <div class="form-group mt-3">
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group mt-3">
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group mt-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="someone@gmail.com">
                </div>
                <div class="form-group mt-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-md-6">
                  <h2 class="text-center">Data Toko</h2>

                  <div class="form-group mt-3">
                      <input type="text" name="store_name" id="store_name" class="form-control" placeholder="Nama Toko" required>
                  </div>
                  <div class="form-group mt-3">
                      <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Nomor Telepon" required>
                  </div>
                  <div class="form-group mt-3">
                      <input type="text" name="store_type" id="store_type" class="form-control" placeholder="Tipe Toko" required>
                  </div>
                  <div class="form-group mt-3">
                      <input type="text" name="store_slogan" id="store_slogan" class="form-control" placeholder="Slogan Toko" required>
                  </div>
              </div>
              
          </div>
          <div class="form-group">
              <textarea name="store_address" id="store_address" rows="4" class="form-control"  placeholder="Alamat Toko" required></textarea>
          </div>

          <div class="row">
            <div class="col-md-4">
              <button type="submit" name="registrasi" class="btn btn-primary btn-block">Registrasi</button>
            </div>
          </div>

        </form><br/>

        <div align="center">Toko Anda sudah terdaftar? <a href="<?= base_url() ?>">Login Sekarang</a></div>
      </div>

    </div>
  </div>

  <script src="<?= base_url('assets/homepage/bootstrap/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/homepage/bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>

</body>
</html>