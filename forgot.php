<?php
// Require the bundled autoload file - the path may need to change
                        // based on where you downloaded and unzipped the SDK
                        require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

                        // Use the REST API Client to make requests to the Twilio REST API
                        use Twilio\Rest\Client;
$errors = "";

if(isset($_POST["btnsubmit"])) {
    if (!empty($_POST["email"])) {
        session_start();
        include "config.php";
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        $stmt = $con->prepare("SELECT id,email,number FROM tbl_accounts WHERE email = ?");
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id,$email,$number);
            $stmt->fetch();
            //INSERT OTP
            $fourRandomDigit = rand(1000,9999);
            $sql = "UPDATE `tbl_accounts` SET `otp`= '".$fourRandomDigit."' WHERE  email = '".$_POST['email']."'";
                if(mysqli_query($con, $sql)){
                    $_SESSION['otp'] = $fourRandomDigit;
                        // Your Account SID and Auth Token from twilio.com/console
                        $sid = 'ACb342928f23470ab26a4f0daf8f4a0772';
                        $token = 'e109b328cfd33ef44fbef02354446452';
                        $client = new Client($sid, $token);

                        // Use the client to do fun stuff like send text messages!
                        $client->messages->create(
                            // the number you'd like to send the message to
                            $number,
                            [
                                // A Twilio phone number you purchased at twilio.com/console
                                'from' => '+18643651938',
                                // the body of the text message you'd like to send
                                'body' => "Change password request: To confirm and continue on changing your password, use this OTP $fourRandomDigit"
                            ]
                        );
                    $_SESSION['useremail'] = $_POST['email'];
                    header('Location: confirm-forgot.php');
                } else{
                    $errors = "1";
                    $error_message = "Something went wrong. Please try again.";
                }
            

        } else {
            // Incorrect username
            $errors = "1";
            $error_message = "Email doesnt exist!";
        }

    } else {
    // Empty forms.
    $errors = "1";
	$error_message = 'Please fill in the email field!';
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
                    ?>
                    <h3 class="text-2xl text-center text-white">Enter your email address</h3>
                    <form action="" method="POST" class="flex flex-col gap-5" id="stepOne">
                        <input type="email" name="email" id="email" class="form-input" placeholder="Email address">
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="Submit">
                    </form>
                    <form action="" method="POST" class="flex flex-col gap-5" id="stepTwo" style="display:none;">
                        <input type="password" name="otp" id="otp" class="form-input" placeholder="Enter OTP" maxlength="4">
                        <input class="btn-primary w-full mt-2" name="btnsubmitTwo" type="submit" value="Submit">
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
</body>
</html>



