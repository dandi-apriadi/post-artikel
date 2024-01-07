<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Support Us - The Truth</title>
</head>
<body>

  <!-- Support Us Section -->
  <section class="container mx-auto my-8 px-4">
    <div class="flex flex-col items-center">
      <h2 class="text-3xl font-bold mb-4">Dukung Kami</h2>
      <p class="text-gray-700 text-center mb-8">
        Berikan dukungan kepada "The Truth" dan bantu kami terus menyajikan informasi yang akurat dan transparan.
        Pilih opsi transfer dana atau topup berikut untuk memberikan dukungan.
      </p>

      <!-- Opsi Transfer Dana -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Transfer Bank -->
        <a href="<?=base_url('/support-bank')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
            <div class="bg-blue-500 text-white rounded-full w-14 mx-auto p-3 mb-4">
                <i class="fas fa-university text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Transfer Bank</h3>
            <p class="text-gray-700">Dukung kami dengan mentransfer dana melalui rekening bank resmi kami.</p>
            </div>
        </a>

        <!-- Crypto -->
         <a href="<?=base_url('/support-crypto')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
                <div class="w-14 mx-auto p-3 mb-4">
                    <i class="fab fa-bitcoin text-2xl text-yellow-500 scale-[2]"></i>
                </div>
            <h3 class="text-xl font-semibold mb-2">Crypto</h3>
            <p class="text-gray-700">Gunakan mata uang kripto untuk mendukung kami secara instan dan aman.</p>
            </div>
        </a>

        <!-- E-Wallet -->
         <a href="<?=base_url('/support-ewallet')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
            <div class="bg-green-500 text-white rounded-full w-14 mx-auto p-3 mb-4">
                <i class="fas fa-wallet text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">E-Wallet</h3>
            <p class="text-gray-700">Topup melalui e-wallet favorit Anda dan dukung misi kami dengan mudah.</p>
            </div>
        </a>

         <a href="<?=base_url('/support-donasi')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
            <div class="bg-pink-500 text-white rounded-full w-14 mx-auto p-3 mb-4">
                <i class="fas fa-donate text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Donasi Langsung</h3>
            <p class="text-gray-700">Topup dana pada akun The Truth Anda dan Kirimkan ke Akun Official Kami dengan Mudah.</p>
            </div>
        </a>

        <!-- QR Code -->
         <a href="<?=base_url('/support-qrcode')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
            <div class="bg-indigo-500 text-white rounded-full w-14 mx-auto p-3 mb-4">
                <i class="fas fa-qrcode text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">QR Code</h3>
            <p class="text-gray-700">Pindai QR Code untuk transfer instan melalui aplikasi pembayaran.</p>
            </div>
        </a>

        <!-- Kartu Kredit/Debit -->
         <a href="<?=base_url('/support-debit')?>">
            <div class="bg-white p-6 rounded-md h-60 text-center cursor-pointer border shadow-lg transition-transform transform hover:scale-105 hover:shadow-md">
            <div class="bg-red-500 text-white rounded-full w-14 mx-auto p-3 mb-4">
                <i class="fas fa-credit-card text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Kartu Kredit/Debit</h3>
            <p class="text-gray-700">Beri dukungan dengan menggunakan kartu kredit atau debit Anda.</p>
            </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Font Awesome CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-BFgrBBZKdW3r+UgDR0kKf3QWsrDT2pbuqaa55LnFi9zAlf8eK7FCBwa+5pYYBnhL8s/M0RVoPdR75H0d5+2t4w==" crossorigin="anonymous"></script>

</body>
</html>
