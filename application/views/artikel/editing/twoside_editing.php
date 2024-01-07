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
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
<!-- Container for demo purpose -->

<div class="container my-10 px-2 relative mx-auto md:px-6">
  <form method="post" action="" enctype="multipart/form-data">
    <!-- save button -->
    <button class="bg-transparent  md:absolute right-0 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
    Simpan Artikel
    </button>

    <input type="number" name="element" readonly value="3" id="element" class="hidden">    

    <section id="main-element" class="mb-32 mt-2">
      <div class="mx-auto text-center mb-4">
        <input required class="relative w-full md:w-[80%] px-4 outline-blue-500 py-2 left-0 right-0 mx-auto border text-center text-2xl font-semibold rounded-lg" type="text" name="artikel-title" id="artikel-title" placeholder="Judul Artikel Anda" value="<?=$artikel->judul_artikel?>">
        <?php echo form_error('artikel-title', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>
      </div>
     
    <!--Element 1-->
      <div id="element-1" class="mb-16 flex flex-wrap">
        <!-- left image -->
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
          <div class="relative">
              <div class="ripple mb-2 relative overflow-hidden rounded-lg border h-96 bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20">
                  <div id="text-1" class="absolute w-full text-center mt-40 font-semibold text-gray-400/70 text-2xl h-full">
                      <h2>Silahkan Memilih Gambar</h2> <span class="text-sm font-normal">Maximal 5Mb</span>
                  </div>
                  <img id="preview-image-1" src="<?=base_url('assets/images/detail_artikel/'.$artikel->sampul);?>" alt="Preview Gambar" class="w-full max-h-96">
                  <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
              </div>
              <div class="z-50 mx-auto">
                  <!-- <input type="text" class="hidden" name="sampul_before" value="<?=$artikel->sampul?>"> -->
                  <input type="file" accept=".jpeg, .jpg, .png" name="Image-1" class="hidden" id="Image-1" onchange="previewImage(1)">
                  <label class="bg-transparent md:absolute right-0 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded" for="Image-1">Pilih Sampul Artikel</label>
              </div>
            </div>
        </div>
        <!-- left image -->

        <!-- left deskription -->
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          
          <!-- kategori -->
          <div class="grid grid-cols-2 gap-2">
          <div class="mb-2">
            <select id="artikel-kategori" name="artikel-kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="<?=$artikel->kategori?>"><?=$artikel->kategori?></option>
              <option disabled>----------------</option>
              <option value="Politik">Politik</option>
              <option value="Pendidikan">Pendidikan</option>
              <option value="Budaya">Budaya</option>
              <option value="Kesehatan">Kesehatan</option>
            </select>
          </div>
          <div class="">
            <select id="artikel-status" name="artikel-status" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="<?=$artikel->status?>"><?=$artikel->status?></option>
              <option disabled>----------------</option>
              <option value="Publish">Publish</option>
              <option value="Private">Private</option>
            </select>
          </div>
          </div>
          <!-- Deskripsi -->
          <div class="mb-3">
            <textarea required name="artikel-deskripsi-1" id="artikel-deskripsi-1" cols="30" rows="10" placeholder="Deskripsi Artikel Anda.." class="relative w-full px-1 outline-blue-500 py-1 border text-left pl-3 text-md font-semibold rounded-lg"><?=$artikel->deskripsi?></textarea>
          </div>
        </div>

      </div>

        <!-- <div class="border-t h-10 my-10">
          <div class="z-50 mx-auto">
              <div class="bg-transparent cursor-pointer md:absolute right-6 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Hapus</div>
          </div>
        </div> -->

        <?php foreach ($detail->result() as $items): ?>
            <?php 
            $index++;
            if ($index % 2 == 0) {
                $align = "mb-16 flex flex-wrap lg:flex-row-reverse";
                $properti = "shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pl-6";
                $properti2 = "shrink-0 grow-0 basis-auto lg:w-6/12 lg:pr-6";
            } else {
                $align = "grid grid-cols-1 gap-2 md:grid-cols-2";
                $properti = "";
                $properti2 = "px-5";
            }
                ?>
            <div class="<?=$align?>">
            <div class="mb-6 w-full <?=$properti?>">
              <div
                class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
                data-te-ripple-init data-te-ripple-color="light">
                <img id="preview-image-<?=$index?>" src="<?=base_url('assets/images/detail_artikel/'.$items->image);?>" alt="Preview Gambar" class="w-full max-h-96">
                    <div id="text-<?=$index?>" class="absolute w-full text-center mt-40 font-semibold text-gray-400/70 text-2xl h-full">
                        <h2>Silahkan Memilih Gambar</h2> <span class="text-sm font-normal">Maximal 5Mb</span>
                    </div>
                    <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
              </div>
              <div class="z-50 mx-auto relative mt-3">
                    <input type="file" accept=".jpeg, .jpg, .png" name="Image-<?=$index?>" class="hidden" id="Image-<?=$index?>" onchange="previewImage(<?=$index?>)">
                    <label class="bg-transparent  md:absolute right-0 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded" for="Image-<?=$index?>">Pilih Gambar</label>
                </div>
            </div>

            <div class="w-full <?=$properti2?>">
                <div class="mb-4">
                  <input value="<?=$items->title_image?>" required class="relative w-full md:w-[80%] px-1 outline-blue-500 py-1 border text-left pl-3 text-lg font-semibold rounded-lg" type="text" name="image-title-<?=$index?>" id="image-title-<?=$index?>" placeholder="Judul Gambar" value="<?= set_value('image-title-'.$index)?>">
                  <?php echo form_error('image-title-'.$index, '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>
                </div>
                <div class="mb-3">
                <textarea required name="artikel-deskripsi-<?=$index?>" id="artikel-deskripsi-2" cols="30" rows="10"><?=html_entity_decode($items->text)?></textarea>
                </div>
              </div>
            </div>

        <?php endforeach; ?>

      </div>


    </section>
    <!-- <div class="border-t h-10 my-10">
          <div class="z-50 mx-auto">
              <div onclick="addElement();" class="bg-transparent cursor-pointer md:absolute left-6 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Tambah</div>
          </div>
        </div> -->
    <!-- Section: Design Block -->
  </form>
  </div>
</body>
</html>
<script>
    CKEDITOR.replace('artikel-deskripsi-1');
    CKEDITOR.replace('artikel-deskripsi-2');
    CKEDITOR.replace('artikel-deskripsi-3');

    function addElement(){
        var element = $("#element");
        var mainElement = $("#main-element");
        var countElement = parseInt(element.val());
        
        if(countElement < 10){
          countElement = countElement + 1;
        if (countElement % 2 === 0) {
          var align = "mb-16 flex flex-wrap lg:flex-row-reverse";
        } else {
          var align = "flex flex-wrap";
        }
        element.val(countElement);
        mainElement.append(`
        <div class="border-t h-10 my-10">
          <div class="z-50 mx-auto">
              <div class="bg-transparent cursor-pointer md:absolute left-6 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Hapus</div>
          </div>
        </div>

      <!-- Element ${countElement} -->
      <div id="element-${countElement}" class="${align}">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
            <div class="relative">
              <div class="ripple mb-2 relative overflow-hidden rounded-lg border h-96 bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20">
                 <img id="preview-image-${countElement}" src="#" alt="Preview Gambar" class="hidden w-full h-full">
                  <div id="text-3" class="absolute w-full text-center mt-40 font-semibold text-gray-400/70 text-2xl h-full">
                            <h2>Silahkan Memilih Gambar</h2> <span class="text-sm font-normal">Maximal 5Mb</span>
                  </div>
                  <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
              </div>
              <div class="z-50 mx-auto">
                  <input type="file" accept=".jpeg, .jpg, .png" required name="Image-${countElement}" class="hidden" id="Image-${countElement}" onchange="previewImage(${countElement})">
                  <label class="bg-transparent  md:absolute right-0 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded" for="Image-3">Pilih Gambar</label>
              </div>
            </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          <div class="mb-4">
            <input required class="relative w-full md:w-[80%] px-1 outline-blue-500 py-1 border text-left pl-3 text-lg font-semibold rounded-lg" type="text" name="image-title-${countElement}" id="image-title-${countElement}" placeholder="Judul Gambar" value="">
          </div>
          <div class="mb-3">
            <textarea required name="artikel-deskripsi-${countElement}" id="artikel-deskripsi-${countElement}" cols="30" rows="10"></textarea>
          </div>
        </div>

      </div>
        `);
      CKEDITOR.replace('artikel-deskripsi-'+countElement);
        }else{
          Swal.fire({
                title: "Gagal Menambahkan",
                text: "hanya bisa menggunakan 10 Element",
                icon: "error",})
        }

    }

    function previewImage(data) {
        var input = document.getElementById('Image-'+data);
        var preview = document.getElementById('preview-image-'+data);
        var text = document.getElementById('text-'+data);
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            text.style.display="none";
        };

        reader.readAsDataURL(file);
    }

</script>
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
