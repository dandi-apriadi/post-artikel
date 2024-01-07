<?php
// Mendapatkan alamat IP publik pengguna
$ipinfo = file_get_contents('http://ipinfo.io');
$ip_details = json_decode($ipinfo);

// Menampilkan alamat IP publik
echo 'Alamat IP Publik Anda: ' . $ip_details->ip;

?>