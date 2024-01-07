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
  <title><?=$title?></title>
  <style>

  .swiper-slide {
    background-size: cover;
    background-position: center;
    text-align: center;
    color: #fff;
  }

  .my-popup-size {
  width: 400px;
  height: 150px;
  font-size: 12px;
  }

  </style>
</head>
<body>
  <section class="w-full md:px-10">
    <!-- search box -->

    <div class="py-4">
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

    <div id="main-content w-full mx-auto" class="mb-10">
          <!-- Trending -->
          <div class="w-full overflow-hidden">
          <h1 class="text-3xl relative font-bold ml-2 md:ml-10">Berita Trending</h1>
            <div class="swiper-container">

                <div class="swiper-wrapper  flex items-center">

                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 1</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 2</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>


                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 3</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>


                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 4</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>


                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 5</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>


                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 6</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 7</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>


                <div class="swiper-slide h-[80vh] md:h-auto relative left-0 right-0 mx-auto pb-6">
                    <div class="text-black border-2 shadow-lg mx-auto w-full lg:w-[65%] grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg h-auto md:h-[42vh]">
                        <div class="h-full px-1 pb-10 py-1 relative">
                          <img class="h-[36vh] w-full rounded-lg border shadow-lg" src="https://source.unsplash.com/random/800x600/?company">
                          <div class="bg-green-500 rounded-md absolute top-2 right-2 w-20 text-white">Skor: 70%</div>
                          <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-2 left-2 w-auto">24 Desember 2023, 14:50</div>
                          <hr class="my-2 bg-blue-500 h-1">
                          <h1 class="font-semibold">Kesehatan</h1>
                        </div>                          
                        <div>
                          <h1 class="text-xl font-bold ml-2">Berita 8</h1>
                          <p class="text-justify px-1 py-1 overflow-scroll h-40 md:h-80">Lorem ipsum dolor, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ullam impedit dolores facere tempore fugiat sapiente molestias aliquam ex, necessitatibus maxime eaque ut dolorum quidem, dignissimos blanditiis illum voluptatum totam nobis quibusdam maiores? Possimus nisi voluptatibus placeat vel nobis minus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, amet! sit amet consectetur adipisicing elit. Doloremque hic tenetur nulla velit facere, ipsam nobis ab ad, excepturi doloribus explicabo autem nihil temporibus! Debitis qui non et cumque odit placeat reiciendis ipsum harum doloremque facere. Tempora explicabo architecto autem!</p>
                          <div class="h-6 w-full relative grid grid-cols-4 -mt-2 px-10 py-2 pb-10">
                              <div><i class="fa-solid fa-eye"></i> 56</div>
                              <div><i class="fa-solid fa-thumbs-up"></i> 25</div>
                              <div><i class="fa-solid fa-comment"></i> 23</div>
                              <div> <button id="toggleButton" class="-mt-3 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Selengkapnya
                      </button></div>
                          </div>
                          
                        </div>
                    </div>
                </div>
                  </div>

              </div>

            </div>

          </div>
          <div class="my-10"></div>
          <h1 class="text-3xl font-bold ml-2 md:ml-10">Berita Terbaru</h1>

          <div class="w-full h-auto overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-5 md:px-4 py-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">


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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
                  <h1 class="text-xl font-bold ml-2">Free Palestine dari gempuran israel yang durjana dan pasti masuk neraka</h1>
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
          
          <!-- news -->
    </div>

    
  </section>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
 var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            delay: 3000, // Geser setiap 2 detik
        },
    });
</script>