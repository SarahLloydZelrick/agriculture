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
// Check if image file is a actual image or fake image
if(isset($_POST["btnsubmit"])) {
    include "config.php";
    $tbl = "tbl_";
    $farmbarangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $forbrgy = $tbl.$farmbarangay;
    $sql = "INSERT INTO tbl_barangay (`barangay`) 
            VALUES ('".$farmbarangay."')";
        if(mysqli_query($con, $sql)){
           
           $sqltbl = "CREATE TABLE `$forbrgy` (
                `id` int(50) NOT NULL,
                `farmerId` varchar(50) NOT NULL,
                `enrollmenttype` varchar(50) NOT NULL,
                `dateadminstered` varchar(50) NOT NULL,
                `refnumber` varchar(20) NOT NULL,
                `uploadFile2x2` varchar(200) NOT NULL,
                `surname` varchar(50) NOT NULL,
                `firstname` varchar(50) NOT NULL,
                `middlename` varchar(50) NOT NULL,
                `extentionname` varchar(50) NOT NULL,
                `purok` varchar(50) NOT NULL,
                `street` varchar(50) NOT NULL,
                `barangay` varchar(50) NOT NULL,
                `city` varchar(50) NOT NULL,
                `province` varchar(50) NOT NULL,
                `region` varchar(20) NOT NULL,
                `bday` varchar(20) NOT NULL,
                `birthmunicipality` varchar(20) NOT NULL,
                `birthprovince` varchar(20) NOT NULL,
                `birthcountry` varchar(20) NOT NULL,
                `gender` varchar(20) NOT NULL,
                `religion` varchar(20) NOT NULL,
                `religionother` varchar(20) DEFAULT NULL,
                `civil` varchar(20) NOT NULL,
                `maiden` varchar(100) NOT NULL,
                `nameofspouse` varchar(100) DEFAULT NULL,
                `education` varchar(50) NOT NULL,
                `pwd` varchar(10) NOT NULL,
                `4ps` varchar(10) NOT NULL,
                `indgenous` varchar(10) NOT NULL,
                `indgenousspecify` varchar(50) DEFAULT NULL,
                `gov` varchar(10) NOT NULL,
                `idtype` varchar(50) NOT NULL,
                `idno` varchar(50) NOT NULL,
                `householdhead` varchar(50) NOT NULL,
                `householdname` varchar(50) NOT NULL,
                `householdrel` varchar(50) NOT NULL,
                `noOfmembers` varchar(50) NOT NULL,
                `nomale` varchar(10) NOT NULL,
                `nofemale` varchar(10) NOT NULL,
                `emergencyname` varchar(100) NOT NULL,
                `emergencyno` varchar(50) NOT NULL,
                `memberoffarm` varchar(50) NOT NULL,
                `memberoffarmspecify` varchar(50) DEFAULT NULL,
                `mainlivelihood` varchar(50) DEFAULT NULL,
                `farmingactivity` varchar(50) DEFAULT NULL,
                `farmingactivityothers` varchar(50) DEFAULT NULL,
                `farmingactivitylivestock` varchar(50) DEFAULT NULL,
                `farmingactivitypoultry` varchar(50) DEFAULT NULL,
                `kindofwork` varchar(50) NOT NULL,
                `kindofworkothers` varchar(50) DEFAULT NULL,
                `typeoffishing` varchar(50) NOT NULL,
                `typeoffishingothers` varchar(50) DEFAULT NULL,
                `typeofinvolment` varchar(50) NOT NULL,
                `typeofinvolmentothers` varchar(50) DEFAULT NULL,
                `grossfarming` varchar(50) NOT NULL,
                `grossnonfarming` varchar(50) NOT NULL,
                `nooffarmparcels` varchar(50) NOT NULL,
                `p1` varchar(50) NOT NULL,
                `p2` varchar(50) NOT NULL,
                `p3` varchar(50) NOT NULL,
                `farmbarangay1` varchar(50) NOT NULL,
                `farmcity1` varchar(50) NOT NULL,
                `farmarea1` varchar(50) NOT NULL,
                `ancestral1` varchar(50) NOT NULL,
                `agrarlan1` varchar(50) NOT NULL,
                `idno1` varchar(50) NOT NULL,
                `ownershiptype1` varchar(50) NOT NULL,
                `ownershiptypename1` varchar(50) NOT NULL,
                `cropa1` varchar(50) NOT NULL,
                `sizea1` varchar(50) NOT NULL,
                `noofheada1` varchar(50) NOT NULL,
                `farmtypea1` varchar(50) NOT NULL,
                `organicepractionera1` varchar(50) NOT NULL,
                `remarksa1` varchar(50) NOT NULL,
                `cropa2` varchar(50) NOT NULL,
                `sizea2` varchar(50) NOT NULL,
                `noofheada2` varchar(50) NOT NULL,
                `farmtypea2` varchar(50) NOT NULL,
                `organicepractionera2` varchar(50) NOT NULL,
                `remarksa2` varchar(50) NOT NULL,
                `cropa3` varchar(50) NOT NULL,
                `sizea3` varchar(50) NOT NULL,
                `noofheada3` varchar(50) NOT NULL,
                `farmtypea3` varchar(50) NOT NULL,
                `organicepractionera3` varchar(50) NOT NULL,
                `remarksa3` varchar(50) NOT NULL,
                `cropa4` varchar(50) NOT NULL,
                `sizea4` varchar(50) NOT NULL,
                `noofheada4` varchar(50) NOT NULL,
                `farmtypea4` varchar(50) NOT NULL,
                `organicepractionera4` varchar(50) NOT NULL,
                `remarksa4` varchar(50) NOT NULL,
                `cropa5` varchar(50) NOT NULL,
                `sizea5` varchar(50) NOT NULL,
                `noofheada5` varchar(50) NOT NULL,
                `farmtypea5` varchar(50) NOT NULL,
                `organicepractionera5` varchar(50) NOT NULL,
                `remarksa5` varchar(50) NOT NULL,
                `farmbarangay2` varchar(50) NOT NULL,
                `farmcity2` varchar(50) NOT NULL,
                `farmarea2` varchar(50) NOT NULL,
                `agrarlan2` varchar(50) NOT NULL,
                `idno2` varchar(50) NOT NULL,
                `ownershiptype2` varchar(50) NOT NULL,
                `ownershiptypename2` varchar(50) NOT NULL,
                `cropb1` varchar(50) NOT NULL,
                `sizeb1` varchar(50) NOT NULL,
                `noofheadb1` varchar(50) NOT NULL,
                `farmtypeb1` varchar(50) NOT NULL,
                `organicepractionerb1` varchar(50) NOT NULL,
                `remarksb1` varchar(50) NOT NULL,
                `cropb2` varchar(50) NOT NULL,
                `sizeb2` varchar(50) NOT NULL,
                `noofheadb2` varchar(50) NOT NULL,
                `farmtypeb2` varchar(50) NOT NULL,
                `organicepractionerb2` varchar(50) NOT NULL,
                `remarksb2` varchar(50) NOT NULL,
                `cropb3` varchar(50) NOT NULL,
                `sizeb3` varchar(50) NOT NULL,
                `noofheadb3` varchar(50) NOT NULL,
                `farmtypeb3` varchar(50) NOT NULL,
                `organicepractionerb3` varchar(50) NOT NULL,
                `remarksb3` varchar(50) NOT NULL,
                `cropb4` varchar(50) NOT NULL,
                `sizeb4` varchar(50) NOT NULL,
                `noofheadb4` varchar(50) NOT NULL,
                `farmtypeb4` varchar(50) NOT NULL,
                `organicepractionerb4` varchar(50) NOT NULL,
                `remarksb4` varchar(50) NOT NULL,
                `cropb5` varchar(50) NOT NULL,
                `sizeb5` varchar(50) NOT NULL,
                `noofheadb5` varchar(50) NOT NULL,
                `farmtypeb5` varchar(50) NOT NULL,
                `organicepractionerb5` varchar(50) NOT NULL,
                `remarksb5` varchar(50) NOT NULL,
                `farmbarangay3` varchar(50) NOT NULL,
                `farmcity3` varchar(50) NOT NULL,
                `farmarea3` varchar(50) NOT NULL,
                `ancestral3` varchar(50) NOT NULL,
                `agrarlan3` varchar(50) NOT NULL,
                `idno3` varchar(50) NOT NULL,
                `ownershiptype3` varchar(50) NOT NULL,
                `ownershiptypename3` varchar(50) NOT NULL,
                `cropc1` varchar(50) NOT NULL,
                `sizec1` varchar(50) NOT NULL,
                `noofheadc1` varchar(50) NOT NULL,
                `farmtypec1` varchar(50) NOT NULL,
                `organicepractionerc1` varchar(50) NOT NULL,
                `remarksc1` varchar(50) NOT NULL,
                `cropc2` varchar(50) NOT NULL,
                `sizec2` varchar(50) NOT NULL,
                `noofheadc2` varchar(50) NOT NULL,
                `farmtypec2` varchar(50) NOT NULL,
                `organicepractionerc2` varchar(50) NOT NULL,
                `remarksc2` varchar(50) NOT NULL,
                `cropc3` varchar(50) NOT NULL,
                `sizec3` varchar(50) NOT NULL,
                `noofheadc3` varchar(50) NOT NULL,
                `farmtypec3` varchar(50) NOT NULL,
                `organicepractionerc3` varchar(50) NOT NULL,
                `remarksc3` varchar(50) NOT NULL,
                `cropc4` varchar(50) NOT NULL,
                `sizec4` varchar(50) NOT NULL,
                `noofheadc4` varchar(50) NOT NULL,
                `farmtypec4` varchar(50) NOT NULL,
                `organicepractionerc4` varchar(50) NOT NULL,
                `remarksc4` varchar(50) NOT NULL,
                `cropc5` varchar(50) NOT NULL,
                `sizec5` varchar(50) NOT NULL,
                `noofheadc5` varchar(50) NOT NULL,
                `farmtypec5` varchar(50) NOT NULL,
                `organicepractionerc5` varchar(50) NOT NULL,
                `remarksc5` varchar(50) NOT NULL,
                `landtitle` varchar(200) DEFAULT NULL,
                `landclearance` varchar(200) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
              if ($con->query($sqltbl) === TRUE) {
                    $success = "1";
                    $success_message = "Farm added successfully";
              } else {
                echo "Error creating table: " . $conn->error;
              }
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
    <link rel="stylesheet" href="css/style.css" />	  
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <title>Add Barangay</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
        <div class="flex justify-center pb-32 md:pb-0">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10">
            <h2 class="text-2xl font-bold">Add new barangay</h2>
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
                      
                <form action="" method="POST" class="flex flex-col gap-5">
                        <div class="first_row flex flex-row gap-5 w-full md:w-96">
                        <div class="flex flex-col gap-2 w-full">
                                <label for="">Barangay</label>
                                <!--input type="text" name="barangay" id="" class="form-input w-full" placeholder="Enter barangay ex. mayabobo"-->
                                <select name="barangay" id="" class="form-input">
                                    <option value="Buenavista_East">Buenavista East</option>
                                    <option value="Bukal_Norte">Bukal Norte</option>
                                    <option value="Bukal_Sur">Bukal Sur</option>
                                    <option value="Kinatihan_I">Kinatihan I</option>
                                    <option value="Kinatihan_II">Kinatihan II</option>
                                    <option value="Malabanan_Norte">Malabanban Norte</option>
                                    <option value="Malabanan_Sur">Malabanban Sur</option>
                                    <option value="Mangilag_Norte">Mangilag Norte</option>
                                    <option value="Mangilag_Sur">Mangilag Sur</option>
                                    <option value="Masalukot_I">Masalukot I</option>
                                    <option value="Masalukot_II">Masalukot II</option>
                                    <option value="Masalukot_III">Masalukot III</option>
                                    <option value="Masalukot_IV">Masalukot IV</option>
                                    <option value="Masalukot_V">Masalukot V</option>
                                    <option value="Masin_Norte">Masin Norte</option>
                                    <option value="Masin_Sur">Masin Sur</option>
                                    <option value="Mayabobo">Mayabobo</option>
                                    <option value="Pahinga_Norte">Pahinga Norte</option>
                                    <option value="Pahinga_Sur">Pahinga Sur</option>
                                    <option value="San_Andres">San Andres</option>
                                    <option value="San_Isidro">San Isidro</option>
                                    <option value="Sta_Catalina_Norte">Sta Catalina Norte</option>
                                    <option value="Sta_Catalina_Sur">Sta Catalina Sur</option>
                                </select>
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="Add baranagay">
                    </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>

