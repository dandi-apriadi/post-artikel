<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
	echo $message;
	$this->session->unset_userdata('msg_sweetalert');
}

?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="<?=base_url('assets/styles/loginAsset/css/styles.css')?>">

      <title><?=$title?></title>
   </head>
   <body class="absolute top-0 w-full">
      <div class="login">
         <img src="<?=base_url('assets/styles/loginAsset/img/login-bg.png')?>" alt="image" class="login__bg">

         <form action="" method="post" class="login__form relative">
            <h1 class="login__title">Login</h1>

            <div class="login__inputs">

               <div class="login__box">
                  <input type="email" id="email" name="email" placeholder="someone@gmail.com" autocomplete="off" required class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

               <a href="<?=base_url('forgotpass');?>" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="absolute left-0 right-0 login__button hover:bg-[#3C2A80]">Masuk</button>

            <div class="login__register mt-24">
                belum punya akun? <a href="<?=base_url('registrasi');?>">registrasi</a>
            </div>
         </form>
      </div>
   </body>
</html>

<script src="<?= base_url('assets/dashboard/dist/js/adminlte.min.js') ?>"></script>
