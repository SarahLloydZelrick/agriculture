<?php
$errors = "";

if(isset($_POST["btnsubmit"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        session_start();
        $foruserlevel = $_POST["userlevel"];
        include "config.php";
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        $stmt = $con->prepare("SELECT id, CONCAT(name,' ',middlename,' ',lastname) as name, email, password, userlevel,photo,pin,number,barangay FROM tbl_accounts WHERE email = ? AND status = 'approved' AND stat = 'active' AND userlevel = '".$foruserlevel."'");
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $password, $userlevel, $photo, $pin,$number,$barangay);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = $name;
                $_SESSION['id'] = $id;
                $_SESSION['userlevel'] = $userlevel;
                $_SESSION['photo'] = $photo;
                $_SESSION['pin'] = $pin;
                $_SESSION['number'] = $number;
                $_SESSION['barangay'] = $barangay;
                header('Location: home.php');
            } else {
                // Incorrect password
                $errors = "1";
                $error_message = "Incorrect password!";
            }
        } else {
            // Incorrect username
            $errors = "1";
           $error_message = "Email doesnt exist!";
        }

    } else {
    // Empty forms.
    $errors = "1";
	$error_message = 'Please fill both the email and password fields!';
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
    <title>LOGIN</title>
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
                    <h3 class="text-2xl text-center text-white">LOGIN</h3>
                    <form action="" method="POST" class="flex flex-col gap-5">
                        <select name="userlevel" id="" class="form-input">
                            <option value="superuser">Super User</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="farmer">Farmer</option>
                        </select>
                        <input type="email" name="email" id="email" class="form-input" placeholder="Email address">
                        <div class="flex flex-col gap-5">
                            <input type="password" name="password" id="password" class="form-input" placeholder="Password">
                            <div class="flex gap-2">
                                <input type="checkbox" onclick="showPassword()"> 
                                <p class="text-white">Show Password</p>
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="SIGN IN">
                    </form>
                    <div class="card-footer flex flex-col justify-end h-full gap-5">
                        <div class="register flex flex-col items-center ">
                            <p class="text-white text-center">Dont have an account?</p>
                            <a class="loginbtn" href="register.php">Register</a>
                        </div>
                        <div class="forgot flex flex-col items-center ">
                            <p class="text-white text-center">Forgot your password?</p>
                            <a class="loginbtn" href="forgot.php">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden flex flex-col basis-full justify-center items-center md:basis-1/2 h-screen  md:block right_div ">
                <div class="title flex flex-col items-center p-10 gap-5 ">
                    <img src="images/Icons/logo_doa.png" class="w-60" alt="Agriculture">
                    <h1 class="text-3xl text-center text-white">Office of the Municipal Agriculturist Candelaria, Quezon Province</h1>
                    <div class="flex flex-col gap-5 pt-5">
                        <div class="flex flex-col gap-2 items-center">
                            <h2 class="font-bold text-lg text-[#fbad1b]">Mandate</h2>
                            <p class="text-white text-sm">Formulate measures and provide technical assistance, support to the delivery of basic services, and provision of adequate facilities relative to agricultural services, and develops plans and strategies on agricultural programs and projects (Local Government Code, 1991)</p>
                        </div>
                        <div class="flex gap-5">
                            <div class="flex flex-col gap-2 w-1/2">
                                <h2 class="font-bold text-lg text-[#fbad1b]">Mission</h2>
                                <p class="text-white text-sm">To increase productivity and real income of farmers thereby contributing to agricultural development and growth of the municipality, support the development of farmers, rural women, and youth organizations, help ensure food security, extend the support services necessary to make agriculture and agri-based initiatives profitable and help spread the development to those in the rural areas.</p>
                            </div>
                            <div class="flex flex-col gap-2 w-1/2">
                                <h2 class="font-bold text-lg text-[#fbad1b]">Vision</h2>
                                <p class="text-white text-sm">An agricultural community with efficient allocation and effective utilization of resources, favorable interaction of all sectors, and sound agricultural growth.</p>
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

<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


