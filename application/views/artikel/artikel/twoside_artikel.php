<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
<!-- Container for demo purpose -->

<div class="container my-10 px-2 relative mx-auto md:px-6">
    <a href="<?=base_url('artikel-create/'.$template->slug);?>" class="bg-transparent absolute right-0 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
    Buat Artikel
    </a>
    <!-- Section: Design Block -->
    <section class="mb-32">
      <h2 class="mb-16 text-center text-2xl font-bold">Contoh Pembuatan Artikel</h2>
  
      <div class="mb-16 flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="<?=base_url('assets/images/templateartikel/template1-1.jpg');?>" class="w-full" alt="Louvre" />
            <a href="#!">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          <h3 class="mb-4 text-2xl font-bold">Gambar 1</h3>
          <div class="mb-4 flex items-center text-sm font-medium text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" class="mr-2 h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
            Kategori
          </div>
          <p class="mb-6 text-sm text-neutral-500 dark:text-neutral-400">
            Published <u>14.01.2022</u> by
            <a href="#!">Lisa McCartney</a>
          </p>
          <p class="mb-6 text-neutral-500 dark:text-neutral-300">
            deskripsi berita Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias, est quia. Quibusdam itaque id praesentium molestiae vitae earum quidem, voluptatem possimus! Ullam eligendi quas dolorum asperiores cumque blanditiis reprehenderit vel!
          </p>
          <p class="text-neutral-500 dark:text-neutral-300">
            deskripsi berikutnya Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio maiores omnis cum necessitatibus animi sunt nesciunt, velit non eos quaerat ex debitis ullam molestiae quasi consequatur earum laboriosam! Tempora, vel. Doloremque reiciendis quo ipsa incidunt delectus sunt autem quisquam error. Accusamus atque fuga incidunt quibusdam eius inventore eveniet a deleniti?
          </p>
        </div>
      </div>
  
      <div class="mb-16 flex flex-wrap lg:flex-row-reverse">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pl-6">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="<?=base_url('assets/images/templateartikel/template1-2.jpg');?>" class="w-full" alt="Louvre" />
            <a href="#!">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pr-6">
          <h3 class="mb-4 text-2xl font-bold">Gambar 2</h3>
          <p class="text-neutral-500 dark:text-neutral-300">
            Penjelasan Gambar 2 Duis sagittis, turpis in ullamcorper venenatis, ligula nibh porta
            dui, sit amet rutrum enim massa in ante. Curabitur in justo at
            lorem laoreet ultricies. Nunc ligula felis, sagittis eget nisi
            vitae, sodales vestibulum purus. Vestibulum nibh ipsum, rhoncus
            vel sagittis nec, placerat vel justo. Duis faucibus sapien eget
            tortor finibus, a eleifend lectus dictum. Cras tempor convallis
            magna id rhoncus. Suspendisse potenti. Nam mattis faucibus
            imperdiet. Proin tempor lorem at neque tempus aliquet. Phasellus
            at ex volutpat, varius arcu id, aliquam lectus. Vestibulum mattis
            felis quis ex pharetra luctus. Etiam luctus sagittis massa, sed
            iaculis est vehicula ut.
            <br> <br>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo ea in vero dicta cupiditate suscipit doloribus repellendus cumque autem omnis.
          </p>
        </div>
      </div>
  
      <div class="flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="<?=base_url('assets/images/templateartikel/template1-3.jpg');?>" class="w-full" alt="Louvre" />
            <a href="#!">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          <h3 class="mb-4 text-2xl font-bold">Gambar 3</h3>
          <p class="text-neutral-500 dark:text-neutral-300">
            Sed sollicitudin purus sed nulla dignissim ullamcorper. Aenean
            tincidunt vulputate libero, nec imperdiet sapien pulvinar id.
            Nullam scelerisque odio vel lacus faucibus, tincidunt feugiat
            augue ornare. Proin ac dui vel lectus eleifend vestibulum et
            lobortis risus. Nullam in commodo sapien. Curabitur ut erat congue
            sem finibus eleifend egestas eu metus. Sed ut dolor id magna
            rutrum ultrices ut eget libero. Duis vel porttitor odio. Ut
            pulvinar sed turpis ornare tincidunt. Donec luctus, mi euismod
            dignissim malesuada, lacus lorem commodo leo, tristique blandit
            ante mi id metus. Integer et vehicula leo, vitae interdum lectus.
            Praesent nulla purus, commodo at euismod nec, blandit ultrices
            erat. Aliquam eros ipsum, interdum et mattis vitae, faucibus vitae
            justo. Nulla condimentum hendrerit leo, in feugiat ipsum
            condimentum ac. Maecenas sed blandit dolor.
          </p>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  </div>    
</body>
</html>