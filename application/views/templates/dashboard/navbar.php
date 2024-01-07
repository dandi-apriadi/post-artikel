
<!DOCTYPE html>
<html lang="en" class="dark">
<body >
<header id="head" class="dark:bg-slate-800 relative bg-transparent transition-all duration-1000 w-full z-50 dark:text-slate-100 border-b  border-gray-300 ">
  <div class="w-full hidden md:block mx-auto px-20">
    <nav class="flex items-center justify-between py-4">
      <div class="flex items-center">
        <div>
          <h1 class=" text-3xl font-bold ">The Truth</h1>
          <p class="text-sm">Berita Terkini, Kebenaran di Tangan Anda.</p>
        </div>
      </div>
      <div class="flex items-center font-semibold gap-4">
        <div class="group text-center">
          <a href="<?=base_url('/')?>">Home</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group text-center">
          <a href="<?=base_url('/artikels')?>">Artikel</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group text-center">
          <a href="<?=base_url('/about')?>">About</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group text-center">
          <a href="<?=base_url('/kontak')?>">Kontak</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group text-center">
          <a href="<?=base_url('/support')?>">Support Us</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>

        <?php 
            if ($_SESSION['logged_in'] == true){
        ?>
            <a href="<?=base_url('/dashboard')?>" class="">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 border rounded-full  " viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>     
            </a>
        <?php 
          } else {?>
        <div class="bg-white border border-blue-500 hover:bg-blue-600 cursor-pointer hover:text-white text-gray-800 px-4 py-1 transition-all duration-700 rounded-full text-center">

            <a href="<?=base_url('/login')?>" class="">Login</a>
        <?php 
          }
        ?>

          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <!-- <div class="group mb-4 rounded-full px-2 py-2 hover:bg-gray-500 text-center mx-auto w-9 h-9 mt-3">
          <a href="#" onclick="darkMode()">
            <svg id="dark-mode" class="text-white" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512"><path d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"/></svg>
            <svg id="light-mode" class="hidden" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512"><path d="M144.7 98.7c-21 34.1-33.1 74.3-33.1 117.3c0 98 62.8 181.4 150.4 211.7c-12.4 2.8-25.3 4.3-38.6 4.3C126.6 432 48 353.3 48 256c0-68.9 39.4-128.4 96.8-157.3zm62.1-66C91.1 41.2 0 137.9 0 256C0 379.7 100 480 223.5 480c47.8 0 92-15 128.4-40.6c1.9-1.3 3.7-2.7 5.5-4c4.8-3.6 9.4-7.4 13.9-11.4c2.7-2.4 5.3-4.8 7.9-7.3c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-3.7 .6-7.4 1.2-11.1 1.6c-5 .5-10.1 .9-15.3 1c-1.2 0-2.5 0-3.7 0c-.1 0-.2 0-.3 0c-96.8-.2-175.2-78.9-175.2-176c0-54.8 24.9-103.7 64.1-136c1-.9 2.1-1.7 3.2-2.6c4-3.2 8.2-6.2 12.5-9c3.1-2 6.3-4 9.6-5.8c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-3.6-.3-7.1-.5-10.7-.6c-2.7-.1-5.5-.1-8.2-.1c-3.3 0-6.5 .1-9.8 .2c-2.3 .1-4.6 .2-6.9 .4z"/></svg>
          </a>
        </div> -->
      </div>
    </nav>
  </div>

  <!-- Mobile -->
  <div class="md:hidden  px-2">
  <nav class="flex items-center justify-between py-4">
      <div class="flex items-center">
        <div>
          <h1 class=" text-3xl font-bold ">The Truth</h1>
          <p class="text-sm">Berita Terkini, Kebenaran di Tangan Anda.</p>
        </div>
      </div>
      <div class="flex items-center font-semibold gap-4">
        <a onclick = "Menu()">
        <svg id="button-1" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        <svg id="button-2" class="hidden" xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>  
        </a>
        </div>
      </div>
    </nav>
    <div id="sub-menu" class="w-1/2 z-50 h-auto dark:bg-slate-800 dark:text-slate-100 text-center md:hidden py-4 px-4 font-semibold text-md shadow-md shadow-gray-600 rounded-b-md transition-all duration-700 border bg-white border-t-blue-500 fixed -right-96 ">
      <div class="group mb-4 text-center">
        <a href="<?=base_url('/')?>">Home</a>
        <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
       </div>
       <div class="group mb-4 text-center">
          <a href="<?=base_url('/artikels')?>">Artikel</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group mb-4 text-center">
          <a href="<?=base_url('/about')?>">About</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group mb-4 text-center">
          <a href="<?=base_url('/kontak')?>">Kontak</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>
        <div class="group mb-4 text-center">
          <a href="<?=base_url('/support')?>">Support Us</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div>

        <?php 
            if ($_SESSION['logged_in'] == true){
        ?>
            <a href="<?=base_url('/dashboard')?>" class="">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 mx-auto w-8 border rounded-full  " viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>     
            </a>
        <?php 
          } else {?>
        <div class="bg-white border border-blue-500 hover:bg-blue-600 cursor-pointer hover:text-white text-gray-800 px-4 py-1 transition-all duration-700 rounded-full text-center">
            <a href="<?=base_url('/login')?>" class="">Login</a>
        <?php 
          }
        ?>

        <!-- <div class="bg-white border border-blue-500 hover:bg-blue-600 cursor-pointer hover:text-white text-gray-800 px-4 py-1 transition-all duration-700 rounded-full text-center">
          <a href="<?=base_url('/login')?>" class="">Login</a>
          <div class="w-0 transition-all duration-500 mx-auto rounded-lg text-center h-1 bg-blue-500 group-hover:w-full"></div>
        </div> -->

    </div>
  </div>
</header>

<input type="number" value="0" class="hidden" id="menu-indicator">
<script>
var indicator = $("#menu-indicator");
var submenu = $("#sub-menu");
var button1 = $("#button-1");
var button2 = $("#button-2");

  $(document).ready(function() {
    // Tangkap event scroll
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) { 
        submenu.css("right","")
        button2.css("display","none")
        button1.css("display","block")
        indicator.val(0);
      } else {
        submenu.css("right","")
        indicator.val(0);
      }
    });
  });

  function Menu(){
    if(indicator.val() == 0){
      submenu.css("right","1px")
      button2.css("display","block")
      button1.css("display","none")
      indicator.val(1);
    }else{
      submenu.css("right","")
      button2.css("display","none")
      button1.css("display","block")
      indicator.val(0);
    }
  }
</script>

</body>
</html>