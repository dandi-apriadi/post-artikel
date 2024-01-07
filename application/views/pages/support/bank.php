<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
</head>
<body class="">

<section class="mx-auto my-8 px-1 md:px-10">
    <div class="flex flex-col items-center">
      <h2 class="text-3xl font-bold mb-4">Support Kami Melalui Bank</h2>
      <p class="text-gray-700 text-center mb-8">
        Berikan dukungan kepada "The Truth" melalui transfer bank. Pilih salah satu bank tujuan dan ikuti panduan pengiriman di bawah.
      </p>

      <!-- Informasi Bank -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-4">
        <!-- Bank BCA -->
        <a onclick="copyToClipboard('Bank BCA','Dandi A Mamonto')">
          <div class="cursor-pointer bg-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
            <img src="<?=base_url('assets/images/logo/bank/bca.png')?>" alt="Logo Bank BCA" class="mx-auto h-20 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank BCA</h3>
            <p class="text-gray-700">Nomor Rekening: 1234-5678-9012</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>

        <!-- Bank Mandiri -->
        <a onclick="copyToClipboard('1500029559711','Dandi A Mamonto')">
          <div class="cursor-pointer bg-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
            <img src="<?=base_url('assets/images/logo/bank/mandiri.png')?>" alt="Logo Bank Mandiri" class="mx-auto h-20 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank Mandiri</h3>
            <p class="text-gray-700">Nomor Rekening: 9876-5432-1098</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>

        <!-- Bank BRI -->
        <a onclick="copyToClipboard('Bank BRI','Dandi A Mamonto')">
          <div class="cursor-pointer bg-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
            <img src="<?=base_url('assets/images/logo/bank/bri.png')?>" alt="Logo Bank BRI" class="mx-auto h-20 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank BRI</h3>
            <p class="text-gray-700">Nomor Rekening: 6543-2109-8765</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>

        <!-- Bank BNI -->
        <a onclick="copyToClipboard('Bank BNI','Dandi A Mamonto')">
          <div class="cursor-pointer bg-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
            <img src="<?=base_url('assets/images/logo/bank/bni.png')?>" alt="Logo Bank BNI" class="mx-auto h-14 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank BNI</h3>
            <p class="text-gray-700">Nomor Rekening: 5678-9012-3456</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>

        <!-- Bank CIMB Niaga -->
        <a onclick="copyToClipboard('Bank Niaga','Dandi A Mamonto')">
          <div class="cursor-pointer bg-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
          <img src="<?=base_url('assets/images/logo/bank/niaga.png')?>" alt="Logo Bank CIMB Niaga" class="mx-auto h-14 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank CIMB Niaga</h3>
            <p class="text-gray-700">Nomor Rekening: 1234-5678-9012</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>

       <!-- Bank Sulut Go -->
       <a onclick="copyToClipboard('Bank Sulut','Dandi A Mamonto')">
        <div class="cursor-pointer g-white transition-transform transform hover:scale-105 hover:shadow-md p-6 rounded-md text-center border shadow-lg">
            <img src="<?=base_url('assets/images/logo/bank/bsg.png')?>" alt="Logo Bank Sulut Go" class="mx-auto h-14 w-full mb-4">
            <h3 class="text-xl font-semibold mb-2">Bank Sulut Go</h3>
            <p class="text-gray-700">Nomor Rekening: 1234-5678-9012</p>
            <p class="text-gray-700">Penerima: Dandi Apriadi Mamonto</p>
          </div>
        </a>
      </div>

      <!-- Panduan Pengiriman -->


      <div class="w-full">
      <hr class="h-1 bg-blue-500 my-2">

      <h2 class="text-3xl font-bold text-center mb-4">Panduan Pengiriman Dana</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:px-10 lg:px-20">
          <!-- ATM Guide -->
          <div class="border shadow-lg rounded-lg px-4 py-2 pb-4 transition-transform transform hover:scale-105 hover:shadow-md">
            <h3 class="text-2xl font-semibold mb-2">Panduan Pengiriman Dana via ATM</h3>
            <p class="text-gray-700">
              Jika Anda ingin memberikan dukungan melalui mesin ATM, ikuti langkah-langkah berikut:
            </p>  
            <ol class="list-decimal list-inside mt-4">
              <li>Masukkan kartu ATM dan masukkan PIN Anda.</li>
              <li>Pilih menu transfer dana.</li>
              <li>Masukkan nomor rekening tujuan: <input type="text" id="dataToCopy1" value="" class="text-gray-800 font-bold outline-none" readonly></li>
              <li>Pastikan Nama Penerima adalah: <input type="text" id="penerima1" value="" class="text-gray-800 font-bold outline-none" readonly></li>
              <li>Masukkan nominal yang ingin Anda kirim.</li>
              <li>Periksa kembali detail transaksi dan konfirmasikan.</li>
              <li>Selesaikan transaksi dan simpan bukti pembayaran.</li>
            </ol>
          </div>

          <!-- Mobile Banking Guide -->
          <div class="border shadow-lg rounded-lg px-4 py-2 pb-4 transition-transform transform hover:scale-105 hover:shadow-md">
            <h3 class="text-2xl font-semibold mb-2">Panduan Pengiriman Dana via Mobile Banking</h3>
            <p class="text-gray-700">
              Jika Anda menggunakan aplikasi perbankan seluler, ikuti langkah-langkah berikut:
            </p>
            <ol class="list-decimal list-inside mt-4">
              <li>Buka aplikasi perbankan seluler Anda.</li>
              <li>Pilih menu transfer dana atau setara.</li>
              <li>Masukkan nomor rekening tujuan: <input type="text" id="dataToCopy" value="" class="text-gray-800 font-bold outline-none" readonly></li>
              <li>Pastikan Nama Penerima adalah: <input type="text" id="penerima" value="" class="text-gray-800 font-bold outline-none" readonly></li>
              <li>Masukkan nominal yang ingin Anda kirim.</li>
              <li>Periksa kembali detail transaksi dan konfirmasikan.</li>
              <li>Selesaikan transaksi dan simpan bukti pembayaran.</li>
            </ol>
          </div>

        </div>


    </div>
    </div>
  </section>

  <!-- Font Awesome CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-BFgrBBZKdW3r+UgDR0kKf3QWsrDT2pbuqaa55LnFi9zAlf8eK7FCBwa+5pYYBnhL8s/M0RVoPdR75H0d5+2t4w==" crossorigin="anonymous"></script>
  
</body>
</html>

<script>
    function copyToClipboard(data,penerima) {
      // Pilih elemen input yang berisi data yang akan disalin
      $("#dataToCopy").val(data);
      $("#dataToCopy1").val(data);
      $("#penerima").val(penerima);
      $("#penerima1").val(penerima);

      var inputElement = document.getElementById('dataToCopy');
      // Pilih teks dalam elemen input
      inputElement.select();

      // Salin teks ke clipboard
      document.execCommand('copy');

      // Hapus pemilihan teks
      window.getSelection().removeAllRanges();

      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Rekening Bank di Copy",
        showConfirmButton: false,
        timer: 1000,
        customClass: {
          popup: 'my-popup-size' // Nama kelas CSS kustom
        }
      });

    }
  </script>
