<?php
session_start();
$useremail = $_SESSION['useremail'];
?>

<?php
$errors = "";
$success = "";
if(isset($_POST["btn_changepass"])) {
    if (!empty($_POST["new_password"])) {

        include "config.php";
        $userpassword = mysqli_real_escape_string($con, $_POST['new_password']);
        $password = password_hash($userpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE `tbl_accounts` SET `password`= '".$password."' WHERE  email = '".$useremail."'";
        if(mysqli_query($con, $sql)){
            $success = "1";
            $success_message = "Password changed successfully. You will be redirected after 5 seconds."
            ?>
             <script>
                var timer = setTimeout(function() {
                    window.location='index.php'
                }, 5000);
            </script>
            <?php
        } else{
            $errors = "1";
            $error_message = "Something went wrong. Please try again.";
        }

    } else {
    // Empty forms.
    $errors = "1";
	$error_message = 'Please fill in the password field!';
    }

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
    <title>Forgot Password</title>
</head>
<body>
    <section>
        <div class="flex flex-row">
            <div class="basis-full flex flex-row justify-center items-center p-2.5 md:basis-1/2 h-screen left-div">
                <div class="card flex flex-col w-full h-5/6 p-10 gap-5 md:w-4/5 md:h-4/6">
                    <?php
                    if(!empty($errors)){
                        ?>
                        <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                            <strong class="mr-1"><?php echo $error_message; ?></strong>
                            <button type="button" class=""  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                        <?php
                    }
                    if(!empty($success)){
                        ?>
                        <div class="alert bg-blue-100 rounded-lg py-5 px-6 mb-3 text-base text-blue-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                            <strong class="mr-1"><?php echo $success_message; ?></strong>
                            <button type="button"  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                        <?php
                    }
                    ?>
                    <form action="" method="POST" class="flex flex-col gap-5" id="stepThree">
                        <h3 class="text-2xl text-center text-white">Enter New Password</h3>
                        <label class="text-white">Enter new password</label>
                        <div class="flex flex-col gap-5">
                            <input type="password" name="new_password" id="n_password" class="form-input" placeholder="Enter Password">
                            <div class="flex gap-2">
                                <input type="checkbox" onclick="showPasswordone()"> 
                                <p class="text-white">Show Password</p>
                            </div>
                        </div>
                        <label class="text-white">Confirm new password</label>
                        <div class="flex flex-col gap-5">
                            <input type="password" name="confirm _password" id="c_password" class="form-input" placeholder="Confirm Password">
                            <div class="flex gap-2">
                                <input type="checkbox" onclick="showPasswordtwo()"> 
                                <p class="text-white">Show Password</p>
                            </div>
                        </div>
                        <input class="w-full mt-2 btn-pass" style="background-color:gray" id="btn_pass" name="btn_changepass" type="submit" disabled="true" value="Change Password">
                    </form>
                    <div class="card-footer flex flex-col justify-end h-full gap-5">
                        <div class="register flex flex-col items-center ">
                            <p class="text-white text-center">Dont have an account?</p>
                            <a class="loginbtn" href="register.php">Register</a>
                        </div>
                        <div class="forgot flex flex-col items-center ">
                            <p class="text-white text-center">Already have an account?</p>
                            <a class="loginbtn" href="index.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden flex flex-col basis-full justify-center items-center md:block md:basis-1/2 h-screen right_div">
                <div class="title flex flex-col items-center p-10 gap-5 ">
                    <img src="images/icons/logo_doa.png" class="w-72" alt="Agriculture">
                    <h1 class="text-4xl text-center text-white">Department of Agriculture in Candelaria, Quezon Province</h1>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script>
        $("#c_password").blur(function() {
            var user_pass = $("#n_password").val();
            var user_pass2 = $("#c_password").val();
            //var enter = $("#enter").val();

            if (user_pass == user_pass2) {
                $("#btn_pass").css("background","#fbad1b");
                $("#btn_pass").prop('disabled',false)//use prop()
            } else {
                $("#btn_pass").css("background","gray");
                $("#btn_pass").prop('disabled',true)//use prop()
            }

        });
    </script>
    <script>
    function showPasswordone() {
        var x = document.getElementById("n_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showPasswordtwo() {
        var x = document.getElementById("c_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

</body>
</html>



