<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />	  
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <title>Stage One</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
   <div class="pt-10 md:ml-60 ">
        <div class="flex justify-center">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-xl">Pest and Diseases</p>
                <p>Choose pest or disease</p>
                <a href="stage_camera.php">
                    <div class="flex w-32 rounded-lg bg-white shadow-lg p-5 cursor-pointer">
                        Pest
                    </div>
                </a>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
   </div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>

