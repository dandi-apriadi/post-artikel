
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <style>
    ::-webkit-scrollbar {
    width: 10px; /* Lebar scrollbar */
    background-color: transparent; /* Warna latar belakang scrollbar */
  }
  
  ::-webkit-scrollbar-thumb {
    background-color: transparent; /* Warna thumb (bagian yang dapat digerakkan) scrollbar */
  }
  
  ::-webkit-scrollbar-track {
    background-color: transparent; /* Warna track (bagian yang tidak dapat digerakkan) scrollbar */
  }
  .scrollbar {
    scrollbar-color: transparent transparent; /* Warna thumb dan track scrollbar */
    scrollbar-width: thin; /* Lebar scrollbar */
  }

  .course-card{
    background-color: #F3F4F6;
  }
  .course-image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .swiper-slide {
    background-size: cover;
    background-position: center;
    text-align: center;
  }

  .my-popup-size {
  width: 400px;
  height: 150px;
  font-size: 12px;
  }

  </style>
</head>
<body class="bg-gray-100">
  
  <section class="w-full md:px-10">
    <!-- search box -->

    <div class="pt-4 text-gray-800">
      <div class="w-full mx-auto">
        <div class="md:flex md:flex-row-reverse md:items-center">
          <div class="relative md:w-80">
            <input type="text" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Cari...">
            <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="py-4 w-full mx-auto">
    <h1 class="text-3xl font-bold ml-2 md:ml-10">Katergori</h1>
        <div class="scroller bg-gray-100" data-speed="slow">
          <ul class="tag-list scroller__inner">
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 1</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 2</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 3</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 4</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 5</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 6</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 7</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 8</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 9</li>
              </a>
              <a href="" class="cursor-pointer hover:scale-125 transition-all duration-1000">
                <li class="border rounded-lg shadow-md">Kategori 10</li>
              </a>
          </ul>
        </div>
    </div>

    <div id="main-content w-full mx-auto" class="mb-7">
          <!-- Trending -->
          <div class="w-full overflow-hidden">
          <h1 class="text-3xl font-bold ml-2 mb-4 md:ml-10">Berita Trending</h1>

          <!-- md -->
          <div class="swiper-container hidden md:block lg:hidden">
                <div class="swiper-wrapper">
                  <!-- Slide 1 -->
                  <div class="swiper-slide grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

                      <div class="bg-white relative rounded-lg shadow-md w-full h-auto">
                        <div class="h-full mb-20 pb-10 relative">
                          <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                          <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white">Skor: 45%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto">24 Desember 2023, 14:50</div>
                          <div>
                          <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                          <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto px-2 py-2 pb-10 mb-3">
                              <div class="grid grid-cols-3">
                                <div><i class="fa-solid fa-eye"></i> 56</div>
                                <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                                <div><i class="fa-solid fa-comment"></i> 23</div>
                              </div>
                              <div class="text-center">
                                <hr class="my-2 bg-blue-500 h-1">
                                  <h1 class="font-semibold">Kesehatan</h1>  
                              </div>
                          </div>
                        </div>
                        </div>
                      </div>

                      
                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                  </div>

                  <div class="swiper-slide grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>


                  </div>
                
                </div>
              </div>
                  <!-- md -->
          
            <!-- native -->
            <div class="swiper-container border md:hidden">
                <div class="swiper-wrapper">
                  <!-- Slide 1 -->
                  <div class="swiper-slide grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                  </div>

                  <div class="swiper-slide grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                  </div>
                
                </div>
              </div>
                  <!-- native -->

            <!-- lg -->
            <div class="swiper-container pb-10 hidden lg:block">
                <div class="swiper-wrapper">
                  <!-- Slide 1 -->
                  <div class="swiper-slide grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>


                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>


                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>


                             <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="https://source.unsplash.com/random/800x600/?start up">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">24 Desember 2023, 14:50</div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                      <button id="toggleButton" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2">Berita Random hari ini</h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

                  </div>

                
                </div>
              </div>
                  <!-- lg -->
    
          </div>

          <div class="my-10 bg-white"></div>
          
          <h1 class="text-3xl font-bold ml-2 md:ml-10">Berita Terbaru</h1>

          <div class="w-full h-auto overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-5 md:px-4 py-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

          <?php foreach ($beritaBaru->result() as $item): ?>
              <div class="bg-white border  custom-card relative rounded-lg shadow-md w-full h-auto">
                <div class="h-full mb-20 pb-10 relative">
                  <img class="h-72 w-full rounded-t-lg border" src="<?=base_url('assets/images/detail_artikel/'.$item->sampul);?>">
                  <div class="bg-red-500 rounded-md absolute top-1 right-1 px-1 w-20 text-white z-50">Skor: 45%</div>
                  <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50"><?=tanggal($item->tanggal);?></div>
                  <div class='overlay h-72'>
                      <div class='overlay-content'>
                        <a href="<?=base_url('artikel/'.$item->slug);?>" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Selengkapnya</a>
                      </div>
                  </div>
                  <div>
                  <h1 class="text-xl font-bold ml-2"><?=$item->judul_artikel?></h1>
                  <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
                      <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                        <div><i class="fa-solid fa-eye"></i> 56</div>
                        <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                        <div><i class="fa-solid fa-comment"></i> 23</div>
                      </div>
                      <div class="text-center">
                         <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold"><?=$item->kategori?></h1>  
                      </div>
                  </div>
                </div>
                </div>
              </div>

              <?php endforeach; ?>


            </div>
          
          <!-- news -->
    </div>

    
  </section>
</body>
</html>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    // add data-animated="true" to every `.scroller` on the page
    scroller.setAttribute("data-animated", true);

    // Make an array from the elements within `.scroller-inner`
    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // For each item in the array, clone it
    // add aria-hidden to it
    // add it into the `.scroller-inner`
    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}

var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 3000, // 1 detik
        disableOnInteraction: false,
      },
    });

</script>