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
                <p class="text-3xl font-bold text-[#009a4e]">Mission</p>
                <p class="pt-5">To increase productivity and real income of farmers thereby contributing to agricultural development and growth of the municipality, support the development of farmers, rural women, and youth organizations, help ensure food security, extend the support services necessary to make agriculture and agri-based initiatives profitable and help spread development to those in the rural areas. </p>
            </div>
            <div class="flex basis-full md:basis-1/2 justify-end">
                <img src="images/home1.jpg" style="width:400px;"alt="">
            </div>
        </div>
        <div class="flex justify-between pt-5">
            <div class="flex basis-full md:basis-1/2 justify-start">
                <img src="images/home2.jpg" style="width:400px;"alt="">
            </div>
            <div class="flex flex-col basis-full md:basis-1/2">
                <p class="text-3xl font-bold text-[#009a4e]">Vision</p>
                <p class="pt-5">An agricultural community with efficient allocation and effective utilization of resources, favourable interaction of all sectors, and sound agricultural growth.</p>
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