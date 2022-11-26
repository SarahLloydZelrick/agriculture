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
            $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
            $userlevel = mysqli_real_escape_string($con, $_POST['userlevel']);
            $stat = "active";
            $status = "pending";

            $sql = "INSERT INTO tbl_accounts (name, middlename, lastname, number, email, password, userlevel, address, sex, age, status, photo,stat,bday,pin,barangay) 
                    VALUES ('".$firstname."', '".$middlename."', '".$lastname."', '".$number."', '".$email."', '".$password."', '".$userlevel."', '".$address."', '".$sex."', '".$userbday."','".$status."', '".$photo."','".$stat."','".$bday."','".$pin."','".$barangay."')";
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
                        <div class="first_row flex flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="" class="text-white">User Level</label>
                                <select name="userlevel" id="" class="form-input"  onchange="showUserlevel(this)">
                                    <option value="staff">Staff</option>
                                    <option value="farmer">Farmer</option>
                                </select>
                            </div>
                        </div>
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
                                <label for="name" class="text-white">Contact Number</label>
                                <div>
                                    <label class="input-field inline-flex items-baseline border-none shadow-md bg-white p-3 form-input">
                                        <span class="flex-none text-dusty-blue-darker select-none leading-none">+63</span>
                                        <div class="flex-1 leading-none">
                                            <input id="handle" type="number" class="placeholder-blue w-full p-0 no-outline text-dusty-blue-darker" name="number" placeholder="9175048769" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="10">
                                        </div>
                                    </label>
                                </div>
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
                                <input type="password" name="password" id="password" class="form-input" placeholder="Password">
                                <div class="flex gap-2">
                                    <input type="checkbox" onclick="showPassword()"> 
                                    <p class="text-white">Show Password</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Pin</label>
                                <input type="password" name="pin" id="pin" class="form-input" placeholder="Pin" maxlength="4">
                                <div class="flex gap-2">
                                    <input type="checkbox" onclick="showPin()"> 
                                    <p class="text-white">Show Pin</p>
                                </div>
                            </div>
                        </div>
                        <div class="first_row flex flex-row gap-5 w-full" style="display:none;" id="hidden_barangay">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="" class="text-white">Barangay</label>
                                <select name="barangay" id="" class="form-input">
                                <?php
                                    include "config.php";
                                    $sql = "SELECT * FROM `tbl_barangay`";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                         <option value="<?php echo $row['barangay'];?>"><?php echo $row['barangay']; ?></option>
                                <?php
                                        }
                                    } else {
                                    echo "0 results";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Complete Address</label>
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
                    <h1 class="text-3xl text-center text-white">Office of the Municipal Agriculturist Candelaria, Quezon</h1>
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
    function showPin() {
        var x = document.getElementById("pin");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showUserlevel(select){
        if(select.value=="farmer"){
            document.getElementById('hidden_barangay').style.display = "block";
        } else{
            document.getElementById('hidden_barangay').style.display = "none";
        }
    };
</script>