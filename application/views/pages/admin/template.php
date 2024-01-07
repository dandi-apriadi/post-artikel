<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
	echo $message;
	$this->session->unset_userdata('msg_sweetalert');
}

?>

<!DOCTYPE html>
<html lang="en" :class="isDark ? 'dark' : 'light'" x-data="{ isDark: false }">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Dandi Apriadi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <meta name="author" content="Dandi Apriadi">
    <title><?=$title?></title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-montserrat text-sm bg-white dark:bg-zinc-900 " >
    <div class="flex min-h-screen  2xl:mx-auto 2xl:border-x-2 2xl:border-gray-200 dark:2xl:border-zinc-700 ">
        <!-- Left Sidebar -->
        <?=$sidebar?>
        <!-- Left Sidebar -->

        <main class=" flex-1 py-10  px-5 sm:px-10 ">
            <header class=" font-bold text-lg flex items-center  gap-x-3 md:hidden mb-12 relative pl-10">
                <span id="button-sidebar" onclick="MenuSidebar();" class="mr-6 transition-all duraton-1000 hover:text-red z-50 absolute left-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                      </svg>
                </span>

            </header>
            <section class="relative">
                <nav class="flex space-x-6 text-gray-400 font-medium">
                    <a onclick="Menu1();" id="menu1" class="hover:text-gray-700 cursor-pointer text-gray-700 dark:hover:text-white">Template</a>
                    <a onclick="Menu2();" id="menu2" class="hover:text-gray-700 cursor-pointer dark:text-white font-semibold">Tambah</a>
                </nav>
           
                <div id="news-element">
 
                </div>

            </section>
        </main>
    </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>
var indicatorSidebar = $("#menu-indicator-sidebar");
var sidebar = $("#sidebar");
var buttonSidebar = $("#button-sidebar");

    document.addEventListener('DOMContentLoaded', function() {
        Menu1();
    });

    function MenuSidebar(){
        if(indicatorSidebar.val() == 0){
            sidebar.css("left","1px")
            buttonSidebar.css('left','200px')
            indicatorSidebar.val(1);
        }else{
            sidebar.css("left","")
            buttonSidebar.css('left','')
            indicatorSidebar.val(0);
        }
    }

    function Menu1(){
        $("#menu1").addClass('text-gray-700');
        $("#menu2").removeClass('text-gray-700');
        showTemplate();
    }
    function Menu2(){
        $("#menu2").addClass('text-gray-700');
        $("#menu1").removeClass('text-gray-700');
        addTemplate();
    }

    function showTemplate(){
        $.ajax({
            url: "<?php echo base_url('Admin/getTemplate'); ?>",
            type: "GET",
            dataType: 'json',
            data: {},
            success: function(response) {
                $("#news-element").empty();
                $("#news-element").append(`
                    <div class="items-center w-96 right-3 top-10 z-50 absolute content-center flex ">
                        <span class="text-gray-400 absolute left-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" value="" class="text-xs ring-1 bg-white ring-gray-200 dark:ring-zinc-600 focus:ring-red-300 pl-10 pr-5 text-gray-600 dark:text-white  py-3 rounded-full w-full outline-none focus:ring-1" placeholder="Search Template...">
                    </div>
                    <h2 class="mt-14 md:mt-10 font-semibold text-gray-600 text-lg">Template Artikel</h2>
                    <div  class="w-full h-screen relative overflow-scroll px-1 scrollbar">
                        <div id="list-template" class="mt-7 grid grid-cols-2 sm:grid-cols-4 gap-x-5 gap-y-5"> 
                        Hello
                        </div>
                    </div>
                `);
            
                $.each(response.data, function(index, item) {
                    $("#list-template").append(`
                    <div class="bg-white p-4 rounded-lg border shadow-md">
                            <img src="https://placekitten.com/400/200" alt="Artikel 1" class="mb-4 rounded-lg">
                            <h2 class="text-xl font-semibold mb-2">Two Side Artikel</h2>
                            <p class="text-gray-600">Artikel Minimalis dengan 2 Bagian Berita.</p>
                            <a href="<?=base_url('news-template');?>" class="text-blue-500 mt-2 inline-block">gunakan template</a>
                        </div>
                        `
                    );
                });
            }
        });
    }

    function addTemplate(){
        $("#news-element").empty();
        $("#news-element").append(`
            <div  class="w-full h-screen mt-10 relative overflow-scroll px-1 scrollbar">

            <div class="bg-white p-5 rounded-lg border shadow-lg w-full">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Input Template</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                       <div>
                            <div class="mb-3">
                                <label for="nama_template" class="block text-sm font-medium text-gray-600 mb-2">Nama Template</label>
                                <input value="<?= set_value('nama_file') ?>" placeholder="Nama Template" type="text" id="nama_template" name="nama_template" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300">
                                <?php echo form_error('nama_template', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                            </div>
                           
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-600 mb-2">Deskripsi</label>
                                <textarea placeholder="Deskripsi Template .." id="deskripsi" name="deskripsi" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300" rows="10"></textarea>
                            </div>
                       </div>
                       <div class="grid grid-cols-1 gap-2">
                        <div class="mb-3">
                            <label for="file_artikel" class="block text-sm font-medium text-gray-600 mb-2">File Artikel</label>
                            <input value="<?= set_value('file_artikel') ?>" placeholder="File Artikel" type="text" id="file_artikel" name="file_artikel" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300">
                            <?php echo form_error('file_artikel', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="file_post" class="block text-sm font-medium text-gray-600 mb-2">File Post</label>
                            <input value="<?= set_value('file_post') ?>" placeholder="File Post Artikel" type="text" id="file_post" name="file_post" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300">
                            <?php echo form_error('file_post', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="file_editing" class="block text-sm font-medium text-gray-600 mb-2">File Editing</label>
                            <input value="<?= set_value('file_editing') ?>" placeholder="File Editing Artikel" type="text" id="file_editing" name="file_editing" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300">
                            <?php echo form_error('file_editing', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="file_create" class="block text-sm font-medium text-gray-600 mb-2">File Create</label>
                            <input value="<?= set_value('file_create') ?>" placeholder="File Create Artikel" type="text" id="file_create" name="file_create" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300">
                            <?php echo form_error('file_create', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="sampul_template" class="block text-sm font-medium text-gray-600 mb-2">Sampul Template</label>
                            <input type="file" id="sampul_template" name="sampul_template" class="form-input w-full px-4 py-2 rounded-md border focus:outline-none focus:border-purple-300" accept="image/*">
                            <?php echo form_error('sampul_template', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>  

                       </div>
                       
                    </div>
                    <div class="flex justify-center">
                            <button type="submit" class="bg-purple-500 text-white px-6 py-2 rounded-md hover:bg-purple-600 focus:outline-none focus:ring focus:border-purple-300">Simpan</button>
                        </div>
                </form>
            </div>


            </div>
        `);
    }

    function displayFileName() {
        const fileInput = document.getElementById('file');
        const fileNameDisplay = document.getElementById('file-name');

        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = 'Choose a file';
        }
    }

</script>