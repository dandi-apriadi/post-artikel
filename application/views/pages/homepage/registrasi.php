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
   <body class="">
      <div class="login">
         <img src="<?=base_url('assets/styles/loginAsset/img/login-bg.png')?>" alt="image" class="login__bg">

         <form action="" method="post" class="login__form">
            <h1 class="login__title">Registrasi Akun</h1>

            <div class="login__inputs">

               <div class="login__box">
                  <input type="email" id="email" name="email" required autocomplete="off" placeholder="someone@gmail.com" class="login__input" value="<?= set_value('email') ?>">
                  <i class="ri-mail-fill"></i>
               </div>
               <?php echo form_error('email', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>

               <div class="login__box">
                  <input type="password" id="password" name="password" required autocomplete="off" placeholder="Password" class="login__input" >
                  <i class="ri-lock-2-fill"></i>
               </div>
               <?php echo form_error('password', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>


               <div class="login__box">
                  <input type="password" id="confirm-password" required name="confirm-password" autocomplete="off" placeholder="Konfirmasi" class="login__input">
                  <i id="lock-logo" class="ri-lock-2-fill"></i>
                  <i id="correct-logo" class="fa-solid fa-check hidden"></i>
                  <i id="wrong-logo" class="fa-solid fa-xmark hidden"></i>
               </div>
               <?php echo form_error('confirm-password', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>


            </div>
            
            <div class="login__check">
               <a href="<?=base_url('forgotpass');?>" class="login__forgot mx-auto">Forgot Password?</a>
            </div>

            <button id="submit-button" type="submit" class="absolute left-0 right-0 login__button hover:bg-[#3C2A80]">Daftar</button>

            <div class="login__register mt-24">
               sudah punya akun? <a href="<?=base_url('login');?>">masuk</a>
            </div>
         </form>
      </div>
   </body>
</html>

<script>

var submitButton = document.getElementById("submitButton");

$(document).ready(function(){
    confirm = $("#confirm-password");
    password = $("#password");
    correct = $('#correct-logo');
    wrong = $('#wrong-logo');
    lock = $('#lock-logo');

    confirm.keyup(function(){
      checkPassword();
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
      checkPassword();
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

function checkPassword() {
   var password = document.getElementById("password").value;
   var confirmPassword = document.getElementById("confirm-password").value;
   var submitButton = document.getElementById("submit-button");

   if (password !== confirmPassword) {
         submitButton.disabled = true;
   } else {
         submitButton.disabled = false;
   }
}


</script>

<script src="<?= base_url('assets/dashboard/dist/js/adminlte.min.js') ?>"></script>
   