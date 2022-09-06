<?php
$target_dir = "images/user/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$errors = "";
$success = "";
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["btnsubmit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $errors = "1";
    $error_message = "File is not an image";
    //echo "File is not an image.";
    $uploadOk = 0;
  }

    // Check if file already exists
    if (file_exists($target_file)) {
        $errors = "1";
        $error_message = "Sorry, file already exists";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $errors = "1";
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $errors = "1";
        $error_message = "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors = 1;
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if (!empty($_POST["firstname"]) && !empty($_POST["middlename"])) {
            include "config.php";   

            $bday = mysqli_real_escape_string($con, $_POST['bday']);
            $bdayyear = date("Y",strtotime($bday));
            $currentyear = date("Y");

            $userbday = $currentyear - $bdayyear;

            $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
            $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
            $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
            $age = mysqli_real_escape_string($con, $_POST['age']);
            $sex = mysqli_real_escape_string($con, $_POST['sex']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $userpassword = mysqli_real_escape_string($con, $_POST['password']);
            $password = password_hash($userpassword, PASSWORD_DEFAULT);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $pin = mysqli_real_escape_string($con, $_POST['pin']);
            $photo = mysqli_real_escape_string($con, $target_file);

            $mobilenumber = mysqli_real_escape_string($con, $_POST['number']);
            $startno = "+63";
            $number = $startno.$mobilenumber;
            
            $userlevel = "farmer";
            $stat = "active";
            $status = "pending";

            $sql = "INSERT INTO tbl_accounts (name, middlename, lastname, number, email, password, userlevel, address, sex, age, status, photo,stat,bday,pin) 
                    VALUES ('".$firstname."', '".$middlename."', '".$lastname."', '".$number."', '".$email."', '".$password."', '".$userlevel."', '".$address."', '".$sex."', '".$userbday."','".$status."', '".$photo."','".$stat."','".$bday."','".$pin."')";
                if(mysqli_query($con, $sql)){
                    $success = "1";
                    $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                } else{
                    $errors = "1";
                    $error_message = "Error submitting the form. Please try again.";
                }
        } else{
            $errors = "1";
            $error_message = "Please check if all the forms are complete.";
        }
        
        
    } else {
        $errors = "1";
        $error_message = "Sorry, there was an error uploading your file.";
    }
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
    <title>REGISTER</title>
</head>
<style>
    .regcard{
        overflow:auto;
    }
</style>
<body>
    <section>
        <div class="flex flex-row">
            <div class="basis-full flex justify-center items-center p-2.5 md:basis-1/2 h-screen left-div">
                <div class="card flex flex-col w-full h-5/6 p-10 gap-5 md:w-4/5 md:h-5/6 regcard">
                    <h3 class="text-2xl text-center text-white">REGISTER</h3>
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
                      
                    <form action="" method="POST" class="flex flex-col gap-5" enctype="multipart/form-data">
                        <div class="first_row flex flex-col md:flex-row gap-5">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">First Name</label>
                                <input type="text" name="firstname" id="" class="form-input w-full" placeholder="First Name">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-input w-full" placeholder="Middle Name">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-input w-full" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Contact Number</label>
                                <input 
                                    type="number" 
                                    name="number" 
                                    id="" 
                                    class="form-input w-full" 
                                    placeholder="Ex. 9175048769" 
                                    oninput="this.value=this.value.slice(0,this.maxLength)"
                                    maxlength="10">
                            </div>
                            <!--div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Age</label>
                                <input type="number" name="age" id="" class="form-input w-full" placeholder="Age">
                            </div-->
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Birthday</label>
                                <input type="date" name="bday" id="" class="form-input w-full">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Sex</label>
                                <select name="sex" id="" class="form-input w-full">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Email</label>
                                <input type="email" name="email" id="" class="form-input" placeholder="Email">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Password</label>
                                <input type="password" name="password" id="" class="form-input" placeholder="Password">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Pin</label>
                                <input type="password" name="pin" id="" class="form-input" placeholder="Pin" maxlength="4">
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Address</label>
                                <textarea name="address" id="" class="form-input" cols="30" rows="2" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Upload Image</label>
                                <input type="file" name="fileToUpload" id="">
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="Register Account">
                    </form>
                    <div class="card-footer flex flex-col justify-end h-full gap-5">
                        <div class="register flex flex-col items-center ">
                            <p class="text-white text-center">Already have an account?</p>
                            <a href="index.php">Login</a>
                        </div>
                        <div class="forgot flex flex-col items-center ">
                            <p class="text-white text-center">Forgot your password?</p>
                            <a href="forgot.php">Forgot Password</a>
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
</body>
</html>
