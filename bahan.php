
<!-- penting -->

<?php
// Mendapatkan alamat IP publik pengguna
$ipinfo = file_get_contents('http://ipinfo.io');
$ip_details = json_decode($ipinfo);

// Menampilkan alamat IP publik
echo 'Alamat IP Publik Anda: ' . $ip_details->ip;

?>

 <div  class="login__box relative">
                  <input type="text" id="username" autocomplete="off" placeholder="Username" required class="login__input">
                  <i class="fa-solid fa-user"></i>
               </div>
            
               <small class="text-muted ml-4 text-md -mt-4"><font class="text-blue-100">* email sudah terdaftar</font></small>

               <!-- penting -->

