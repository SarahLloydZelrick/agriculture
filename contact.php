<?php
if (isset($_POST['btnsubmit'] )) {
    
    include "config.php";  

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $space = " ";
    $name = $firstname.$space.$lastname;

    $sql = "INSERT INTO tbl_contact (name, email, message) 
            VALUES ('".$name."','".$email."','".$message."')";
                if(mysqli_query($con, $sql)){
                    $success = "1";
                    $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                } else{
                    $errors = "1";
                    $error_message = "Error submitting the form. Please try again.";
                }
}
?>


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
                Get in touch
            </p>
        </div>
    </div>
  </header>
  <div class="px-5 py-2 md:px-32 md:py-10 flex justify-center">
        <!-- SECTION 1 -->
        <form class="w-full max-w-lg" action="" method="POST">
            <div class="form-text pb-5">
                <p class="text-xl text-[#009a4e]">Got any question? Feel free to contact us.</p>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    First Name
                </label>
                <input name="firstname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="Enter your first name">
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                </label>
                <input name="lastname" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Enter your last name">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    E-mail
                </label>
                <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="Enter your email address">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Message
                </label>
                <textarea name="message" class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="btnsubmit">
                    Send
                </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>
            </form>
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