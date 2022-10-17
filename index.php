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
    <title>HOME</title>
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
                Lorem ipsum dolor sit amet.
            </p>
            <p class="text-xl">
            Mauris sit amet nibh ut turpis sagittis volutpat. Proin consectetur dignissim massa quis mattis. Vivamus vel erat massa. Vestibulum at ornare elit. 
            </p>
        </div>

    </div>
  </header>
  
  
  <div class="px-32 py-10">
        <!-- SECTION 1 -->
        <div class="flex justify-between pb-5">
            <div class="flex flex-col basis-full md:basis-1/2">
                <p class="text-3xl font-bold text-[#009a4e]">Lorem ipsum dolor</p>
                <p class="pt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus quam non sollicitudin sollicitudin. In auctor est et commodo faucibus. Phasellus rhoncus dolor ut mi molestie dapibus. </p>
                <p>Mauris sit amet nibh ut turpis sagittis volutpat. Proin consectetur dignissim massa quis mattis.</p>
                <br>
                <p>Morbi quis erat ac turpis pharetra blandit sit amet nec tellus. Etiam rhoncus scelerisque massa at egestas. Mauris maximus turpis euismod vulputate imperdiet. Ut pellentesque tortor quis consectetur pellentesque. Sed elementum tincidunt ipsum efficitur sollicitudin. Morbi eget erat eget dolor ullamcorper interdum vitae fermentum libero. Curabitur bibendum tristique lectus pharetra suscipit.</p>
            </div>
<<<<<<< HEAD
            <div class="flex basis-full md:basis-1/2 justify-end">
                <img src="images/home1.jpg" style="width:400px;"alt="">
=======

>>>>>>> 2b93fe0a0cd32c45ed5ace1349f5626c86777557
            </div>
        </div>
        <div class="flex justify-between pt-5">
            <div class="flex basis-full md:basis-1/2 justify-start">
                <img src="images/home2.jpg" style="width:400px;"alt="">
            </div>
            <div class="flex flex-col basis-full md:basis-1/2">
                <p class="text-3xl font-bold text-[#009a4e]">Lorem ipsum dolor</p>
                <p class="pt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus quam non sollicitudin sollicitudin. In auctor est et commodo faucibus. Phasellus rhoncus dolor ut mi molestie dapibus. </p>
                <p>Mauris sit amet nibh ut turpis sagittis volutpat. Proin consectetur dignissim massa quis mattis.</p>
                <br>
                <p>Morbi quis erat ac turpis pharetra blandit sit amet nec tellus. Etiam rhoncus scelerisque massa at egestas. Mauris maximus turpis euismod vulputate imperdiet. Ut pellentesque tortor quis consectetur pellentesque. Sed elementum tincidunt ipsum efficitur sollicitudin. Morbi eget erat eget dolor ullamcorper interdum vitae fermentum libero. Curabitur bibendum tristique lectus pharetra suscipit.</p>
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