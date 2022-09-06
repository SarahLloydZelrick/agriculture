<?php
session_start();
$useremail = $_SESSION['useremail'];
$userotp = $_SESSION['otp'];

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
                    
                    <form action="" method="POST" class="flex flex-col gap-5" id="stepTwo">
                        <h3 class="text-2xl text-center text-white">Enter OTP</h3>
                        <input type="password" name="" id="otp_sess" class="form-input" value="<?php echo $userotp;?>" style="display:none;" maxlength="4">
                        <input type="password" name="" id="otp_input" class="form-input" placeholder="Enter OTP" maxlength="4">
                        <button class="w-full mt-2 btn-pass"
                                disabled="true"
                                style="background-color:gray;" 
                                name="btn_submit"
                                id="btnsubmit" 
                                type="button"
                                onclick="location.href = 'change-forgot.php';">
                                Submit
                        </button>
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
            <div class="hidden flex flex-col basis-full justify-center items-center md:basis-1/2 h-screen  md:block right_div ">
                <div class="title flex flex-col items-center p-10 gap-5 ">
                    <img src="images/Icons/logo_doa.png" class="w-60" alt="Agriculture">
                    <h1 class="text-3xl text-center text-white">Department of Agriculture in Candelaria, Quezon Province</h1>
                    <div class="flex flex-col gap-5 pt-5">
                        <div class="flex flex-col gap-2 items-center">
                            <h2 class="font-bold text-lg text-[#fbad1b]">Mandate</h2>
                            <p class="text-white text-sm">The Office of the Municipal Agriculture is an agency of the Philippine government responsible for the promotion of the Agriculture & Fisheries development and growth. In partnership with the Department of Agriculture, provide benefits of development to the poor, especially in the rural areas</p>
                        </div>
                        <div class="flex gap-5">
                            <div class="flex flex-col gap-2 w-1/2">
                                <h2 class="font-bold text-lg text-[#fbad1b]">Mission</h2>
                                <p class="text-white text-sm">Increase income of farmers & fisherfolks, thereby contributing to the achievement of national goal of alleviating poverty, generating productive opportunities, fostering social justice and equity, and promoting sustainable economic growth</p>
                            </div>
                            <div class="flex flex-col gap-2 w-1/2">
                                <h2 class="font-bold text-lg text-[#fbad1b]">Vision</h2>
                                <p class="text-white text-sm">Prosperous rural communities built on profitable farms that provide surplus for agro-industry and guarantees food security</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script>
        $("#otp_input").keyup(function() {
            var user_otp = $("#otp_sess").val();
            var user_otp2 = $("#otp_input").val();
            //var enter = $("#enter").val();

            if (user_otp == user_otp2) {
                $("#btnsubmit").css("background","#fbad1b");
                $("#btnsubmit").prop('disabled',false)//use prop()
            } else {
                $("#btnsubmit").css("background","gray");
                $("#btnsubmit").prop('disabled',true)//use prop()
            }

        });
    </script>
</body>
</html>



