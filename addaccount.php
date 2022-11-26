<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

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

            $userlevel = mysqli_real_escape_string($con, $_POST['userlevel']);
            $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
            $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
            $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
            $number = mysqli_real_escape_string($con, $_POST['number']);

            $sex = mysqli_real_escape_string($con, $_POST['sex']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $userpassword = mysqli_real_escape_string($con, $_POST['password']);
            $password = password_hash($userpassword, PASSWORD_DEFAULT);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $pin = mysqli_real_escape_string($con, $_POST['pin']);
            $photo = mysqli_real_escape_string($con, $target_file);

            $stat = "active";
            $status = "approved";

            $sql = "INSERT INTO tbl_accounts (name, middlename, lastname, number, email, password, userlevel, address, sex, age, status, photo,stat,bday,pin) 
                    VALUES ('".$firstname."', '".$middlename."', '".$lastname."', '".$number."', '".$email."', '".$password."', '".$userlevel."', '".$address."', '".$sex."', '".$userbday."','".$status."', '".$photo."','".$stat."','".$bday."','".$pin."')";
                if(mysqli_query($con, $sql)){
                    $success = "1";
                    $success_message = "Account added successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <title>Add Accounts</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
        <div class="flex justify-center pb-32 md:pb-0">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10">
            <h2 class="text-2xl font-bold">Add new account</h2>
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
                                <label for="">User Level</label>
                                <select name="userlevel" id="" class="form-input">
                                    <option value="superuser">Super User</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                    <option value="farmer">Farmer</option>
                                </select>
                            </div>
                        </div>
                        <div class="first_row flex gap-5 flex-col md:flex-row">
                            <div class="flex flex-col gap-2">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" id="" class="form-input w-full md:w-44" placeholder="First Name">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-input w-full md:w-44" placeholder="Middle Name">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-input w-full md:w-44" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="second_row flex gap-5 flex-col md:flex-row">
                            <div class="flex flex-col gap-2">
                                <label for="">Contact Number</label>
                                <input type="number" name="number" id="" class="form-input w-full md:w-44" placeholder="Contact Number" maxlength="12">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Birthday</label>
                                <input type="date" name="bday" id="" class="form-input w-full">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="">Sex</label>
                                <select name="sex" id="" class="form-input w-full md:w-44">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="second_row flex gap-5 w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-input" placeholder="Email">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-input" placeholder="Password">
                                <div class="flex gap-2">
                                    <input type="checkbox" onclick="showPassword()"> 
                                    <p class="text-white">Show Password</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="text-white" for="">Pin</label>
                                <input type="password" name="pin" id="" class="form-input" placeholder="Pin" maxlength="4">
                                <div class="flex gap-2">
                                    <input type="checkbox" onclick="showPin()"> 
                                    <p class="text-white">Show Pin</p>
                                </div>
                            </div>
                        </div>
                        <div class="second_row flex flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-input" cols="30" rows="2" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="second_row flex flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Upload Image</label>
                                <input type="file" name="fileToUpload" id="">
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="Register Account">
                    </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
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
</script>
</body>
</html>

