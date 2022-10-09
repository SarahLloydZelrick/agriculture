<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <title>ABOUT</title>
</head>
<style>
    .header-image{
        background-image: url("images/header.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        padding:10px;
    }
</style>
<body>
  <header>
     <?php
        include "homenav.php";
     ?>
    <div class="header-image h-4/5">
        <div class="header-text p-32">
            <p class="text-6xl">
                About us
            </p>
        </div>

    </div>
  </header>
  
  
  <div class="px-5 py-2 md:px-32 md:py-10">
        <!-- SECTION 1 -->
        <div class="flex flex-col pb-5">
                <p class="text-3xl font-bold text-[#009a4e]">Lorem ipsum dolor</p>
                <p class="pt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus quam non sollicitudin sollicitudin. In auctor est et commodo faucibus. Phasellus rhoncus dolor ut mi molestie dapibus. </p>
                <p>Mauris sit amet nibh ut turpis sagittis volutpat. Proin consectetur dignissim massa quis mattis.</p>
                <br>
                <p>Morbi quis erat ac turpis pharetra blandit sit amet nec tellus. Etiam rhoncus scelerisque massa at egestas. Mauris maximus turpis euismod vulputate imperdiet. Ut pellentesque tortor quis consectetur pellentesque. Sed elementum tincidunt ipsum efficitur sollicitudin. Morbi eget erat eget dolor ullamcorper interdum vitae fermentum libero. Curabitur bibendum tristique lectus pharetra suscipit.</p>
        </div>
        <div class="flex flex-col md:flex-row justify-between pt-10">
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!">
                    <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                    <p class="text-gray-700 text-base mb-4">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                    </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!">
                    <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                    <p class="text-gray-700 text-base mb-4">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                    </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!">
                    <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                    <p class="text-gray-700 text-base mb-4">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <div class="text-center text-gray-700 p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-gray-800">Agriculture</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');


    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

</script>
</html>