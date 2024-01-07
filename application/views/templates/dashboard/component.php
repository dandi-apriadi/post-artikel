<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolom Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-8 p-4">
        <!-- Artikel Content -->
        <div>
        <div class="flex items-center space-x-4">
            <a href="#" class="hover:text-gray-300">Like</a>
            <a href="#" class="hover:text-gray-300">Comment</a>
            <a href="#" class="hover:text-gray-300">Score</a>
            <a href="#" class="hover:text-gray-300">Sanggahan</a>
        </div>
        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Komentar</h2>
            <!-- Form Komentar -->
            <div class="mb-6">
                <div class="mb-6">
                    <textarea id="comment" class="mt-1 p-2 w-full border outline-blue-300 rounded-md resize-y" rows="3" placeholder="Tulis komentar..."></textarea>
                </div>
                <button onclick="sendComment();" class="px-4 py-2 bg-blue-500 text-white rounded-md">Kirim Komentar</button>
            </div>

            <!-- Daftar Komentar -->
            <div id="display-chat" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 overflow-auto scrollbar">

            </div>
        </div>
    </div>

</body>
</html>
<input type="text" value="<?=$_SESSION['logged_in']?>" class="hidden" id="login">
<input type="text" value="<?=$artikel->no_artikel?>" class="hidden" id="artikel">
<script>

    document.addEventListener('DOMContentLoaded', function() {
        showComment();
    });
    var login = $("#login").val();

    function sendComment(){
        var Artikel = $("#artikel").val();
        var Comment = $("#comment").val();
        if(login == ""){
                Swal.fire({
                title: "Gagal",
                text: "Anda Tidak Sedang Login",
                icon: "error"
                });
        }else{
            if(Comment == ""){
            Swal.fire({
                title: "Silahkan Memasukkan Komentar Anda",
                showClass: {
                    popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                    `
                },
                hideClass: {
                    popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                    `
                }
            });
        }else{
            $.ajax({
            url: "<?php echo base_url('Artikel/sendComment'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                artikel: Artikel,
                comment: Comment
            },
            success: function(response) {
                    showComment();
                    $("#comment").val("");
                }   
            });
        }
        }
    }

    function showComment(){
        var Artikel = $("#artikel").val();
        $.ajax({
            url: "<?php echo base_url('Artikel/showComment/'); ?>"+Artikel,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                $("#display-chat").empty();
                $.each(response.data, function(index, item) {
                    $("#display-chat").append(`
                    <div class="bg-white relative p-4 rounded-md shadow-md pb-16">
                    <input value="${item.id_comment}" class="hidden" id="comment-${index}" type="text">
                        <div class="flex items-center mb-4">
                            <img src="https://i.pravatar.cc/40" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                            <div>
                                <h3 class="text-sm font-semibold">${item.nama_pengguna}</h3>
                                <a href="${item.url_username}"><span class="text-xs text-gray-500">@${item.username}</span></a>
                            </div>
                            <div class="absolute right-2 top-1">
                            <span class="text-xs text-gray-600">${item.tanggal}</span>
                            </div>
                        </div>
                        <div class="h-auto w-full mb-2">
                        <p class="text-gray-700">${item.isi}</p>
                        </div>
                        <div id="comment-card-${index}" class="absolute bottom-0 text-center h-10 w-20 right-1 mx-auto ">
                        <i onclick="commentLike(${index});" class="${item.liked} hover:text-blue-500 cursor-pointer"></i> ${item.comment_likes}
                        </div>
                    </div>
                `);
                });
            }   
        });
    }

    function commentLike(id){
        var commentId = $("#comment-"+id).val();
        if(login == ""){
                Swal.fire({
                title: "Gagal",
                text: "Anda Tidak Sedang Login",
                icon: "error"
                });
        }else{
            $.ajax({
            url: "<?php echo base_url('Artikel/commentCheck'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                comment: commentId,
            },
            success: function(response) {
                $("#comment-card-"+id).empty();
                $("#comment-card-"+id).append(`
                <i onclick="commentLike(${id});" class="${response.liked} hover:text-blue-500 cursor-pointer"></i> ${response.like}
                `);
                }   
            });
        }
    }
</script>