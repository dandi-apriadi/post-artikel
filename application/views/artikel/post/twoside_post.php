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
    <!-- Section: Design Block -->
    <section class="mb-32">
      <h2 class="mb-16 text-center text-2xl font-bold"><?=$artikel->judul_artikel?></h2>
  
      <div class="mb-16 flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="<?=base_url('assets/images/detail_artikel/'.$artikel->sampul);?>" class="w-full"/>
            <a href="<?=base_url('assets/images/detail_artikel/'.$artikel->sampul);?>">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 lg:pl-6">
          <div class="mb-4 flex items-center text-sm font-medium text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" class="mr-2 h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
            <?=$artikel->kategori?>
          </div>
          <p class="mb-6 text-sm text-neutral-500 dark:text-neutral-400">
            Published <?=tanggal($artikel->tanggal);?> by
            <a href="<?=base_url('penulis/'.$penulis->username);?>"><?=$penulis->firstname?> <?=$penulis->lastname?></a>
          </p>
          <div class="text-neutral-500 dark:text-neutral-300">
          <?=html_entity_decode($artikel->deskripsi)?>
          </div>
        </div>
      </div>
      
      <?php foreach ($detail->result() as $items): ?>
        <?php 
        $index++;
        if ($index % 2 == 0) {
            $align = "mb-16 flex flex-wrap lg:flex-row-reverse";
            $properti = "shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pl-6";
            $properti2 = "shrink-0 grow-0 basis-auto lg:w-6/12 lg:pr-6";
        } else {
            $align = "grid grid-cols-1  md:grid-cols-2";
            $properti = "";
            $properti2 = "px-5";
        }
            ?>
      <div class="<?=$align?>">
        <div class="mb-6 w-full <?=$properti?>">
          <div
            class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
            data-te-ripple-init data-te-ripple-color="light">
            <img src="<?=base_url('assets/images/detail_artikel/'.$items->image);?>" class="w-full"/>
            <a href="<?=base_url('assets/images/detail_artikel/'.$items->image);?>">
              <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
              </div>
            </a>
          </div>
        </div>
  
        <div class="w-full <?=$properti2?>">
          <h3 class="mb-4 text-2xl font-bold"><?=$items->title_image?></h3>
          <div class="text-neutral-500 dark:text-neutral-300">
            <?=html_entity_decode($items->text)?>
          </div>
        </div>
      </div>
  
    <?php endforeach; ?>
      
    </section>
    <!-- Section: Design Block -->
  </div>    
</body>
</html>