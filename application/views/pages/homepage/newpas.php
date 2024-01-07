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
   <body class="">
      <div class="login">
         <img src="<?=base_url('assets/styles/loginAsset/img/login-bg.png')?>" alt="image" class="login__bg">

         <form action="" method="post" class="login__form">
            <h1 class="login__title">Masukkan Password</h1>

            <div class="login__inputs">

               <div class="login__box">
                  <input type="password" id="password" autocomplete="off" placeholder="Password Baru" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" id="confirm-password" autocomplete="off" placeholder="Konfirmasi Password" required class="login__input">
                  <i id="lock-logo" class="ri-lock-2-fill"></i>
                  <i id="correct-logo" class="fa-solid fa-check hidden"></i>
                  <i id="wrong-logo" class="fa-solid fa-xmark hidden"></i>
               </div>

            </div>
            <hr class="my-3 login__box">
            <button type="submit" class="absolute left-0 right-0 login__button hover:bg-[#3C2A80]">Simpan</button>

            <div class="login__register mt-24">
               belum punya akun? <a href="<?=base_url('registrasi');?>">daftar</a>
            </div>
         </form>
      </div>
   </body>
</html>

<script>

$(document).ready(function(){
    confirm = $("#confirm-password");
    password = $("#password");
    correct = $('#correct-logo');
    wrong = $('#wrong-logo');
    lock = $('#lock-logo');

    confirm.keyup(function(){
        if(confirm.val() != password.val()){
            wrong.css('display','block');
            lock.css('display','none');
            correct.css('display','none');
        }if (confirm.val() == password.val()) {
            wrong.css('display','none');
            lock.css('display','none');
            correct.css('display','block');
        }if(confirm.val(empty)){
            wrong.css('display','none');
            lock.css('display','block');
            correct.css('display','none');
        }if(password.val(empty)){
            wrong.css('display','none');
            lock.css('display','block');
            correct.css('display','none');
        }
    });

    password.keyup(function(){
        if(confirm.val() != password.val()){
            wrong.css('display','block');
            lock.css('display','none');
            correct.css('display','none');
        }if (confirm.val() == password.val()) {
            wrong.css('display','none');
            lock.css('display','none');
            correct.css('display','block');
        }if(confirm.val(empty)){
            wrong.css('display','none');
            lock.css('display','block');
            correct.css('display','none');
        }if(password.val(empty)){
            wrong.css('display','none');
            lock.css('display','block');
            correct.css('display','none');
        }
    });

});


</script>