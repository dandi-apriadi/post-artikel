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

         <form action="" class="login__form relative">
            <h1 class="login__title">Lupa Password?</h1>

            <div class="login__inputs">

               <div class="login__box">
                  <input type="email" placeholder="someone@gmail.com" autocomplete="off" required class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="text" placeholder="Kode Validasi" autocomplete="off" required class="login__input text-center">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check ">
               <a onclick="kirimkode();" class="login__forgot mx-auto underline text-center">Kirim Kode</a>
            </div>

            <button type="submit" class="absolute left-0 right-0 login__button hover:bg-[#3C2A80]">Kirim</button>

            <div class="login__register mt-24">
                belum punya akun? <a href="<?=base_url('registrasi');?>">registrasi</a>
            </div>
         </form>
      </div>
   </body>
</html>


<script>
    function kirimkode() {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Kode Validasi dikirimkan ke alamat Email anda",
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          popup: 'my-popup-size' // Nama kelas CSS kustom
        }
      });

    }
</script>