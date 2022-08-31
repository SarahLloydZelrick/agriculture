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

if(isset($_POST["btnsubmit"])) {
    if(empty($_FILES['fileToUpload']["name"])){
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
            $emailacc = mysqli_real_escape_string($con, $_POST['emailacct']);
            $userpassword = mysqli_real_escape_string($con, $_POST['password']);
            $password = password_hash($userpassword, PASSWORD_DEFAULT);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $status = "approved";

            $sql = "UPDATE `tbl_accounts` SET `name`= '".$firstname."',`middlename`= '".$middlename."',`lastname`='".$lastname."',`number`='".$number."',`email`='".$emailacc."',`address`='".$address."',`sex`='".$sex."',`age`='".$userbday."',`bday`= '".$bday."' WHERE  id = '".$_SESSION['id']."'";
                if(mysqli_query($con, $sql)){
                    $success = "1";
                    $success_message = "Account updated successfully";
                } else{
                    $errors = "1";
                    $error_message = "Error updating your account. Please try again.";
                }
        } else{
            $errors = "1";
            $error_message = "Please check if all the forms are complete.";
        }
    }else{
        // Allow certain file formats
        $target_dir = "images/user/$fourRandomDigit";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $errors = "1";
            $error_message = "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }else{
            $target_dir = "images/user/$fourRandomDigit";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $fourRandomDigit = rand(1000,9999);
            $uploadOk = 1;
            $errors = "";
            $success = "";
            

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false or !empty($photo)) {
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

                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $errors = 1;
                } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    if (!empty($_POST["firstname"]) && !empty($_POST["middlename"])) {
                        include "config.php";
                        $userlevel = mysqli_real_escape_string($con, $_POST['userlevel']);
                        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
                        $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
                        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
                        $number = mysqli_real_escape_string($con, $_POST['number']);
                        $age = mysqli_real_escape_string($con, $_POST['age']);
                        $sex = mysqli_real_escape_string($con, $_POST['sex']);
                        $emailacc = mysqli_real_escape_string($con, $_POST['emailacct']);
                        $userpassword = mysqli_real_escape_string($con, $_POST['password']);
                        $password = password_hash($userpassword, PASSWORD_DEFAULT);
                        $address = mysqli_real_escape_string($con, $_POST['address']);
                        $photo = mysqli_real_escape_string($con, $target_file);
                        $status = "approved";

                        $sql = "UPDATE `tbl_accounts` SET `name`= '".$firstname."',`middlename`= '".$middlename."',`lastname`='".$lastname."',`number`='".$number."',`email`='".$emailacc."',`address`='".$address."',`sex`='".$sex."',`age`='".$age."',`photo`='".$photo."' WHERE id = '".$_SESSION['id']."'";
                            if(mysqli_query($con, $sql)){
                                $success = "1";
                                $success_message = "Account updated successfully";
                            } else{
                                $errors = "1";
                                $error_message = "Error updating your account. Please try again.";
                            }
                    } else{
                        $errors = "1";
                        $error_message = "Please check if all the forms are complete.";
                    }
                    
                    
                } else {
                    $errors = "1";
                    $error_message = "Sorry, there was an error uploading your photo.";
                }
            }
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
    <title>My Profile</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <?php
        include "config.php";
        $sql = "SELECT * FROM tbl_accounts WHERE id = '".$_SESSION['id']."'";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $fname = $row['name'];
            $mname = $row['middlename'];
            $lname = $row['lastname'];
            $number = $row['number'];
            $emailacc = $row['email'] ;
            $birthday = $row['bday'];
            $sex = $row['sex'];
            $address = $row['address'];
            $photo = $row['photo'];
          }
        } else {
          echo "0 results";
        }
        $con->close();
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
        <div class="flex justify-center pb-32 md:pb-0">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5">
            <h2 class="text-2xl font-bold">My Profile</h2>
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
                      
                <form action="" method="POST" class="flex flex-row gap-5 justify-between" enctype="multipart/form-data">
                    <div class="profile_inputs flex flex-col gap-5">
                        <div class="first_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" id="" class="form-input w-full" value="<?php echo $fname; ?>" readonly >
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-input w-full" value="<?php echo $mname; ?>" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-input w-full" value="<?php echo $lname; ?>" readonly>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5" w-full>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Contact Number</label>
                                <input type="number" name="number" id="" class="form-input w-full" value="<?php echo $number; ?>" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Birthdate</label>
                                <input type="text" name="bday" id="" class="form-input w-full" value="<?php echo $birthday; ?>" readonly>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Sex</label>
                                <input type="text" name="sex" id="" class="form-input w-full" value="<?php echo $sex; ?>" readonly>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Email</label>
                                <input type="email" name="emailacct" id="" class="form-input" value="<?php echo $emailacc; ?>" readonly>
                            </div>
                        </div>
                        <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-input" cols="30" rows="2" readonly><?php echo $address; ?></textarea>
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" type="button" value="Edit Account" data-bs-toggle="modal" data-bs-target="#profileModal">
                    </div>
                    <div class="profile_image">
                        <div class="user_image">
                            <img class="w-28 h-28 md:w-48 md:h-48 border-slate-800" src="<?php echo $photo; ?>" alt="User Image">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>  
<!-- MODAL -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
  id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="profileModalLabel">Edit Profile</h5>
        <button type="button"
          class=""
          data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
      </div>
      <div class="modal-body relative p-4">
        <form action="" method="POST" class="flex flex-col gap-5 justify-between" enctype="multipart/form-data">
            <div class="profile_image">
                <div class="user_image flex flex-col items-center">
                    <!--img class="w-48 h-48 border-slate-800" src="<!?php echo $photo; ?>" alt=""-->
                    <div class="w-28 h-28 md:w-48 md:h-48 border-slate-800" style="background-size:cover;background-image:url(<?php echo $photo; ?>)" id="imagePreview"></div>
                    <input id="uploadFile" type="file" name="fileToUpload" class="img mt-5" />
                </div>
            </div>
            <div class="profile_inputs flex flex-col gap-5">
                <div class="first_row flex flex-col md:flex-row gap-5 w-full">
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" id="" class="form-input w-full" value="<?php echo $fname; ?>"  >
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Middle Name</label>
                        <input type="text" name="middlename" id="" class="form-input w-full" value="<?php echo $mname; ?>" >
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" id="" class="form-input w-full" value="<?php echo $lname; ?>" >
                    </div>
                </div>
                <div class="second_row flex flex-col md:flex-row gap-5" w-full>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Contact Number</label>
                        <input type="number" name="number" id="" class="form-input w-full" value="<?php echo $number; ?>" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="10" >
                        
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Birthdate</label>
                        <input type="date" name="bday" id="" class="form-input w-full" value="<?php echo $birthday; ?>" >
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Sex</label>
                        <input type="text" name="sex" id="" class="form-input w-full" value="<?php echo $sex; ?>" >
                    </div>
                </div>
                <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Email</label>
                        <input type="email" name="emailacct" id="" class="form-input" value="<?php echo $emailacc; ?>" >
                    </div>
                </div>
                <div class="second_row flex flex-col md:flex-row gap-5 w-full">
                    <div class="flex flex-col gap-2 w-full">
                        <label for="">Address</label>
                        <textarea name="address" id="" class="form-input" cols="30" rows="2" ><?php echo $address; ?></textarea>
                    </div>
                </div>  
            </div>
            <input class="btn-primary w-full mt-2" type="submit" name="btnsubmit" value="Update Account" data-bs-toggle="modal" data-bs-target="#profileModal">
        </form>
      </div>
      <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>

<script>
    $(function() {
        $("#uploadFile").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader           support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>