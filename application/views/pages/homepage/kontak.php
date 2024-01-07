<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body class="">

    <section class="scrollbar py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 text-center mb-3">Chat with Us</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

                <!-- Form Section -->
                <div class="flex flex-col justify-between bg-white border rounded-lg shadow-md p-6">
                    <div>
                        <h3 class="text-2xl font-semibold mb-4">Get in Touch</h3>
                        <p class="text-black mb-4">Have a question or just want to say hi? Send us a message and we'll get back to you as soon as possible.</p>
                        <form method="post">
                            <!-- Form Inputs -->
                            <div class="mb-4">
                                <label for="name" class="block text-black font-semibold mb-2">Name</label>
                                <input type="text" id="name" placeholder="Someone" name="name" class="w-full border border-gray-300 rounded-lg p-2">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-black font-semibold mb-2">Email</label>
                                <input type="email" id="email" placeholder="your@email.com" name="email" class="w-full border border-gray-300 rounded-lg p-2">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-black font-semibold mb-2">Message</label>
                                <textarea id="message" name="message" placeholder="your message here" class="w-full border border-gray-300 rounded-lg p-2"></textarea>
                            </div>
                            <input type="submit" name="send" value="Send Message" class="bg-blue-500 cursor-pointer text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                        </form>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-black font-semibold mb-4">Connect with Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-black hover:text-[#966f29] transition duration-200"><i class="fab fa-facebook fa-2x"></i></a>
                            <a href="#" class="text-black hover:text-[#966f29] transition duration-200"><i class="fab fa-instagram fa-2x"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Chat Section -->
                <div class="bg-white border rounded-lg shadow-md">
                    <div class="relative p-4 border-b border-gray-200">
                        <h4 class="text-black font-semibold mb-4">Chat with Us</h4>
                    </div>
                    <div class="p-4 h-[50vh] scrollbar overflow-y-scroll space-y-4">

                        <!-- Chat Messages -->
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                            <div class='flex items-end gap-1 relative justify-end'>
                                <div class='p-2 rounded-t-lg rounded-bl-lg max-w-[82%] border text-gray-800 animate__animated animate__fadeIn'>isi pesan pengguna Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor dicta magni non dolorum temporibus, saepe aspernatur nulla dolore esse perferendis.</div>
                              <div class="border rounded-full bg-white h-10 w-10"></div>
                            </div>

                            <div class='flex items-start gap-1'>
                            <div class="border rounded-full bg-white h-10 w-10"></div>
                                <div class='bg-gray-100 rounded-b-lg rounded-tr-lg p-2 max-w-[82%] animate__animated animate__fadeIn'>isi pesan admin Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum maxime officia ipsa excepturi quae quas, voluptates explicabo sint atque, vero, veniam totam aperiam. Laboriosam, consequatur dolorem, provident laborum quis quidem aliquam temporibus aspernatur voluptas natus molestiae enim rem vero voluptate.</div>
                            </div>
                        <?php } ?>

                    </div>
                    <form class="mt-4" method="post">
                        <div class="flex items-center m-4 rounded-md">
                            <input type="text" name="message" required placeholder="Type your message" class="flex-1 border border-gray-300 rounded-lg p-2">
                            <input type="submit" name="chat" value="Kirim" class="bg-blue-500 text-white font-semibold ml-1 py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 ml-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
