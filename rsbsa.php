<?php
ini_set('display_errors', 1);
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
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script-->
    <title>RSBSA</title>
</head>

<?php
if(isset($_POST["btnsubmit"])) {
    $farmerId = $_POST['farmerId'];
    mkdir("images/user/".$farmerId."", 0777, true);

    $target_dir = "images/user/".$farmerId."/";
    //$targer_dir = "images/user/testfolder/";

    $target_file = $target_dir . basename($_FILES["uploadFile2x2"]["name"]);
    $target_filetwo = $target_dir . basename($_FILES["fileToUploadOne"]["name"]);
    $target_filethree = $target_dir . basename($_FILES["fileToUploadTwo"]["name"]);
    $uploadOk = 1;
    $errors = "";
    $success = "";
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageFileTypeone = strtolower(pathinfo($target_filetwo,PATHINFO_EXTENSION));
    $imageFileTypetwo = strtolower(pathinfo($target_filethree,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["uploadFile2x2"]["tmp_name"]);
    $checktwo = getimagesize($_FILES["fileToUploadOne"]["tmp_name"]);
    $checkthree = getimagesize($_FILES["fileToUploadTwo"]["tmp_name"]);
  if($check !== false | $checktwo !== false | $checkthree !== false ) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $errors = "1";
    $error_message = "File is not an image";
    //echo "File is not an image.";
    $uploadOk = 0;
  }

    // Check if file already exists
    if (file_exists($target_file) && file_exists($target_filetwo) && file_exists($target_filethree) ) {
        $errors = "1";
        $error_message = "Sorry, file already exists";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["uploadFile2x2"]["size"] > 500000 && $_FILES["fileToUploadOne"]["size"] > 500000 && $_FILES["fileToUploadTwo"]["size"] > 500000  ) {
        $errors = "1";
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileTypeone != "jpg" && $imageFileTypeone != "png" && $imageFileTypeone != "jpeg" && $imageFileTypetwo != "jpg" && $imageFileTypetwo != "png" && $imageFileTypetwo != "jpeg") {
        $errors = "1";
        $error_message = "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors = 1;
    } else {
    //if (move_uploaded_file($_FILES["uploadFile2x2"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["fileToUploadOne"]["tmp_name"], $target_filetwo) && move_uploaded_file($_FILES["fileToUploadTwo"]["tmp_name"], $target_filethree)) {
        if (move_uploaded_file($_FILES["uploadFile2x2"]["tmp_name"], $target_file) ){
            if(move_uploaded_file($_FILES["fileToUploadOne"]["tmp_name"], $target_filetwo)){
                if(move_uploaded_file($_FILES["fileToUploadTwo"]["tmp_name"], $target_filethree)){
                    //if (!empty($_POST["dateadminstered"]) && !empty($_POST["refnumber"]) && !empty($_POST["surname"]) && !empty($_POST["firstname"]) && !empty($_POST["middlename"]) && !empty($_POST["extentionname"])) {
                    if (!empty($_POST["dateadminstered"])) {
                        include "config.php";
                        $enrollmenttype = mysqli_real_escape_string($con, $_POST['enrollmenttype']);
                        $dateadminstered = mysqli_real_escape_string($con, $_POST['dateadminstered']);
                        $refnumber = mysqli_real_escape_string($con, $_POST['refnumber']);
                        $surname = mysqli_real_escape_string($con, $_POST['surname']);
                        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
                        $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
                        $extentionname = mysqli_real_escape_string($con, $_POST['extentionname']);
                        
                        //$farmerfullname = $firstname." ".$middlename." ".$surname.",".$extentionname;
                        $farmerfullname = "test";
                        $purok = mysqli_real_escape_string($con, $_POST['purok']);
                        $street = mysqli_real_escape_string($con, $_POST['street']);
                        $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
                        $city = mysqli_real_escape_string($con, $_POST['city']);
                        $province = mysqli_real_escape_string($con, $_POST['province']);
                        $region = mysqli_real_escape_string($con, $_POST['region']);
                        $bday = mysqli_real_escape_string($con, $_POST['bday']);
                        $birthmunicipality = mysqli_real_escape_string($con, $_POST['birthmunicipality']);
                        $birthprovince = mysqli_real_escape_string($con, $_POST['birthprovince']);
                        $birthcountry = mysqli_real_escape_string($con, $_POST['birthcountry']);
                        $gender = mysqli_real_escape_string($con, $_POST['gender']);
                        $religion = mysqli_real_escape_string($con, $_POST['religion']);
                        $religionother = mysqli_real_escape_string($con, $_POST['religionother']);
                        $civil = mysqli_real_escape_string($con, $_POST['civil']);
                        $maiden = mysqli_real_escape_string($con, $_POST['maiden']);
                        $nameofspouse = mysqli_real_escape_string($con, $_POST['nameofspouse']);
                        $education = mysqli_real_escape_string($con, $_POST['education']);
                        $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
                        $fourps = mysqli_real_escape_string($con, $_POST['fourps']);
                        $indgenous = mysqli_real_escape_string($con, $_POST['indgenous']);
                        $indgenousspecify = mysqli_real_escape_string($con, $_POST['indgenousspecify']);
                        $gov = mysqli_real_escape_string($con, $_POST['gov']);
                        $idtype = mysqli_real_escape_string($con, $_POST['idtype']);
                        $idno = mysqli_real_escape_string($con, $_POST['idno']);
                        $householdhead = mysqli_real_escape_string($con, $_POST['householdhead']);
                        $householdname = mysqli_real_escape_string($con, $_POST['householdname']);
                        $householdrel = mysqli_real_escape_string($con, $_POST['householdrel']);
                        $noOfmembers = mysqli_real_escape_string($con, $_POST['noOfmembers']);
                        $nomale = mysqli_real_escape_string($con, $_POST['nomale']);
                        $nofemale = mysqli_real_escape_string($con, $_POST['nofemale']);
                        $emergencyname = mysqli_real_escape_string($con, $_POST['emergencyname']);
                        $emergencyno = mysqli_real_escape_string($con, $_POST['emergencyno']);
                        $memberoffarm = mysqli_real_escape_string($con, $_POST['memberoffarm']);
                        $memberoffarmspecify = mysqli_real_escape_string($con, $_POST['memberoffarmspecify']);
            
                        //$mainlivelihood = mysqli_real_escape_string($con, $_POST['mainlivelihood']);
                        //$farmingactivity = mysqli_real_escape_string($con, $_POST['farmingactivity']);

                        /*

                        $mainlivelihood = implode(',', $_POST['mainlivelihood']);
                        $farmingactivity = implode(',', $_POST['farmingactivity']);
                        $farmingactivityothers = mysqli_real_escape_string($con, $_POST['farmingactivityothers']);
                        $farmingactivitylivestock = mysqli_real_escape_string($con, $_POST['farmingactivitylivestock']);
                        $farmingactivitypoultry = mysqli_real_escape_string($con, $_POST['farmingactivitypoultry']);
                        */

                        
                        //$kindofwork = mysqli_real_escape_string($con, $_POST['kindofwork']);

                        //$farmingactivitypoultry = implode(',', $_POST['farmingactivity']);
                        //$farmingactivitylivestock = implode(',', $_POST['farmingactivitypoultry']);

                        $kindofwork = implode(',', $_POST['kindofwork']);
                        $kindofworkothers = mysqli_real_escape_string($con, $_POST['kindofworkothers']);
                        //$typeoffishing = mysqli_real_escape_string($con, $_POST['typeoffishing']);
                        $typeoffishingothers = mysqli_real_escape_string($con, $_POST['typeoffishingothers']);
                        //$typeofinvolment = mysqli_real_escape_string($con, $_POST['typeofinvolment']);
                        $typeoffishing = implode(',', $_POST['typeoffishing']);
                        $typeofinvolment = implode(',', $_POST['typeofinvolment']);
            
                        $typeofinvolmentothers = mysqli_real_escape_string($con, $_POST['typeofinvolmentothers']);
                        $grossfarming = mysqli_real_escape_string($con, $_POST['grossfarming']);
                        $grossnonfarming = mysqli_real_escape_string($con, $_POST['grossnonfarming']);
                        $nooffarmparcels = mysqli_real_escape_string($con, $_POST['nooffarmparcels']);
                        $p1 = mysqli_real_escape_string($con, $_POST['p1']);
                        $p2 = mysqli_real_escape_string($con, $_POST['p2']);
                        $p3 = mysqli_real_escape_string($con, $_POST['p3']);
                        $farmbarangay1 = mysqli_real_escape_string($con, $_POST['farmbarangay1']);
                        $farmcity1 = mysqli_real_escape_string($con, $_POST['farmcity1']);
                        $farmarea1 = mysqli_real_escape_string($con, $_POST['farmarea1']);
                        $ancestral1 = mysqli_real_escape_string($con, $_POST['ancestral1']);
                        $agrarlan1 = mysqli_real_escape_string($con, $_POST['agrarlan1']);
                        $idno1 = mysqli_real_escape_string($con, $_POST['idno1']);
                        $ownershiptype1 = mysqli_real_escape_string($con, $_POST['ownershiptype1']);
                        $ownershiptypename1 = mysqli_real_escape_string($con, $_POST['ownershiptypename1']);
                        $cropa1 = mysqli_real_escape_string($con, $_POST['cropa1']);
                        $sizea1 = mysqli_real_escape_string($con, $_POST['sizea1']);
                        $noofheada1 = mysqli_real_escape_string($con, $_POST['noofheada1']);
                        $farmtypea1 = mysqli_real_escape_string($con, $_POST['farmtypea1']);
                        $organicepractionera1 = mysqli_real_escape_string($con, $_POST['organicepractionera1']);
                        $remarksa1 = mysqli_real_escape_string($con, $_POST['remarksa1']);
                        $cropa2 = mysqli_real_escape_string($con, $_POST['cropa2']);
                        $sizea2 = mysqli_real_escape_string($con, $_POST['sizea2']);
                        $noofheada2 = mysqli_real_escape_string($con, $_POST['noofheada2']);
                        $farmtypea2 = mysqli_real_escape_string($con, $_POST['farmtypea2']);
                        $organicepractionera2 = mysqli_real_escape_string($con, $_POST['organicepractionera2']);
                        $remarksa2 = mysqli_real_escape_string($con, $_POST['remarksa2']);
                        $cropa3 = mysqli_real_escape_string($con, $_POST['cropa3']);
                        $sizea3 = mysqli_real_escape_string($con, $_POST['sizea3']);
                        $noofheada3 = mysqli_real_escape_string($con, $_POST['noofheada3']);
                        $farmtypea3 = mysqli_real_escape_string($con, $_POST['farmtypea3']);
                        $organicepractionera3 = mysqli_real_escape_string($con, $_POST['organicepractionera3']);
                        $remarksa3 = mysqli_real_escape_string($con, $_POST['remarksa3']);
                        $cropa4 = mysqli_real_escape_string($con, $_POST['cropa4']);
                        $sizea4 = mysqli_real_escape_string($con, $_POST['sizea4']);
                        $noofheada4 = mysqli_real_escape_string($con, $_POST['noofheada4']);
                        $farmtypea4 = mysqli_real_escape_string($con, $_POST['farmtypea4']);
                        $organicepractionera4 = mysqli_real_escape_string($con, $_POST['organicepractionera4']);
                        $remarksa4 = mysqli_real_escape_string($con, $_POST['remarksa4']);
                        $cropa5 = mysqli_real_escape_string($con, $_POST['cropa5']);
                        $sizea5 = mysqli_real_escape_string($con, $_POST['sizea5']);
                        $noofheada5 = mysqli_real_escape_string($con, $_POST['noofheada5']);
                        $farmtypea5 = mysqli_real_escape_string($con, $_POST['farmtypea5']);
                        $organicepractionera5 = mysqli_real_escape_string($con, $_POST['organicepractionera5']);
                        $remarksa5 = mysqli_real_escape_string($con, $_POST['remarksa5']);
                        $farmbarangay2 = mysqli_real_escape_string($con, $_POST['farmbarangay2']);
                        $farmcity2 = mysqli_real_escape_string($con, $_POST['farmcity2']);
                        $farmarea2 = mysqli_real_escape_string($con, $_POST['farmarea2']);
                        $ancestral2 = mysqli_real_escape_string($con, $_POST['ancestral2']);
                        $agrarlan2 = mysqli_real_escape_string($con, $_POST['agrarlan2']);
                        $idno2 = mysqli_real_escape_string($con, $_POST['idno2']);
                        $ownershiptype2 = mysqli_real_escape_string($con, $_POST['ownershiptype2']);
                        $ownershiptypename2 = mysqli_real_escape_string($con, $_POST['ownershiptypename2']);
                        $cropb1 = mysqli_real_escape_string($con, $_POST['cropb1']);
                        $sizeb1 = mysqli_real_escape_string($con, $_POST['sizeb1']);
                        $noofheadb1 = mysqli_real_escape_string($con, $_POST['noofheadb1']);
                        $farmtypeb1 = mysqli_real_escape_string($con, $_POST['farmtypeb1']);
                        $organicepractionerb1 = mysqli_real_escape_string($con, $_POST['organicepractionerb1']);
                        $remarksb1 = mysqli_real_escape_string($con, $_POST['remarksb1']);
                        $cropb2 = mysqli_real_escape_string($con, $_POST['cropb2']);
                        $sizeb2 = mysqli_real_escape_string($con, $_POST['sizeb2']);
                        $noofheadb2 = mysqli_real_escape_string($con, $_POST['noofheadb2']);
                        $farmtypeb2 = mysqli_real_escape_string($con, $_POST['farmtypeb2']);
                        $organicepractionerb2 = mysqli_real_escape_string($con, $_POST['organicepractionerb2']);
                        $remarksb2 = mysqli_real_escape_string($con, $_POST['remarksb2']);
                        $cropb3 = mysqli_real_escape_string($con, $_POST['cropb3']);
                        $sizeb3 = mysqli_real_escape_string($con, $_POST['sizeb3']);
                        $noofheadb3 = mysqli_real_escape_string($con, $_POST['noofheadb3']);
                        $farmtypeb3 = mysqli_real_escape_string($con, $_POST['farmtypeb3']);
                        $organicepractionerb3 = mysqli_real_escape_string($con, $_POST['organicepractionerb3']);
                        $remarksb3 = mysqli_real_escape_string($con, $_POST['remarksb3']);
                        $cropb4 = mysqli_real_escape_string($con, $_POST['cropb4']);
                        $sizeb4 = mysqli_real_escape_string($con, $_POST['sizeb4']);
                        $noofheadb4 = mysqli_real_escape_string($con, $_POST['noofheadb4']);
                        $farmtypeb4 = mysqli_real_escape_string($con, $_POST['farmtypeb4']);
                        $organicepractionerb4 = mysqli_real_escape_string($con, $_POST['organicepractionerb4']);
                        $remarksb4 = mysqli_real_escape_string($con, $_POST['remarksb4']);
                        $cropb5 = mysqli_real_escape_string($con, $_POST['cropb5']);
                        $sizeb5 = mysqli_real_escape_string($con, $_POST['sizeb5']);
                        $noofheadb5 = mysqli_real_escape_string($con, $_POST['noofheadb5']);
                        $farmtypeb5 = mysqli_real_escape_string($con, $_POST['farmtypeb5']);
                        $organicepractionerb5 = mysqli_real_escape_string($con, $_POST['organicepractionerb5']);
                        $remarksb5 = mysqli_real_escape_string($con, $_POST['remarksb5']);
                        $farmbarangay3 = mysqli_real_escape_string($con, $_POST['farmbarangay3']);
                        $farmcity3 = mysqli_real_escape_string($con, $_POST['farmcity3']);
                        $farmarea3 = mysqli_real_escape_string($con, $_POST['farmarea3']);
                        $ancestral3 = mysqli_real_escape_string($con, $_POST['ancestral3']);
                        $agrarlan3 = mysqli_real_escape_string($con, $_POST['agrarlan3']);
                        $idno3 = mysqli_real_escape_string($con, $_POST['idno3']);
                        $ownershiptype3 = mysqli_real_escape_string($con, $_POST['ownershiptype3']);
                        $ownershiptypename3 = mysqli_real_escape_string($con, $_POST['ownershiptypename3']);
                        $cropc1 = mysqli_real_escape_string($con, $_POST['cropc1']);
                        $sizec1 = mysqli_real_escape_string($con, $_POST['sizec1']);
                        $noofheadc1 = mysqli_real_escape_string($con, $_POST['noofheadc1']);
                        $farmtypec1 = mysqli_real_escape_string($con, $_POST['farmtypec1']);
                        $organicepractionerc1 = mysqli_real_escape_string($con, $_POST['organicepractionerc1']);
                        $remarksc1 = mysqli_real_escape_string($con, $_POST['remarksc1']);
                        $cropc2 = mysqli_real_escape_string($con, $_POST['cropc2']);
                        $sizec2 = mysqli_real_escape_string($con, $_POST['sizec2']);
                        $noofheadc2 = mysqli_real_escape_string($con, $_POST['noofheadc2']);
                        $farmtypec2 = mysqli_real_escape_string($con, $_POST['farmtypec2']);
                        $organicepractionerc2 = mysqli_real_escape_string($con, $_POST['organicepractionerc2']);
                        $remarksc2 = mysqli_real_escape_string($con, $_POST['remarksc2']);
                        $cropc3 = mysqli_real_escape_string($con, $_POST['cropc3']);
                        $sizec3 = mysqli_real_escape_string($con, $_POST['sizec3']);
                        $noofheadc3 = mysqli_real_escape_string($con, $_POST['noofheadc3']);
                        $farmtypec3 = mysqli_real_escape_string($con, $_POST['farmtypec3']);
                        $organicepractionerc3 = mysqli_real_escape_string($con, $_POST['organicepractionerc3']);
                        $remarksc3 = mysqli_real_escape_string($con, $_POST['remarksc3']);
                        $cropc4 = mysqli_real_escape_string($con, $_POST['cropc4']);
                        $sizec4 = mysqli_real_escape_string($con, $_POST['sizec4']);
                        $noofheadc4 = mysqli_real_escape_string($con, $_POST['noofheadc4']);
                        $farmtypec4 = mysqli_real_escape_string($con, $_POST['farmtypec4']);
                        $organicepractionerc4 = mysqli_real_escape_string($con, $_POST['organicepractionerc4']);
                        $remarksc4 = mysqli_real_escape_string($con, $_POST['remarksc4']);
                        $cropc5 = mysqli_real_escape_string($con, $_POST['cropc5']);
                        $sizec5 = mysqli_real_escape_string($con, $_POST['sizec5']);
                        $noofheadc5 = mysqli_real_escape_string($con, $_POST['noofheadc5']);
                        $farmtypec5 = mysqli_real_escape_string($con, $_POST['farmtypec5']);
                        $organicepractionerc5 = mysqli_real_escape_string($con, $_POST['organicepractionerc5']);
                        $remarksc5 = mysqli_real_escape_string($con, $_POST['remarksc5']);
                        $farmerId = mysqli_real_escape_string($con, $_POST['farmerId']);
            
                      /*  $tbl = "tbl";
                        $under = "_";
                        $btgy = "barangay1";
                        $brgy111 = $tbl.$under.$bgry;
                        */
                        $fortbl = "tbl_";
                        $forbarangay = $fortbl.$barangay;
                        $farmstatus = "active";

                          $sql = "INSERT INTO $forbarangay(`farmerId`, `enrollmenttype`, `dateadminstered`, `refnumber`, `uploadFile2x2`, `surname`, `firstname`, `middlename`, `extentionname`, `purok`, `street`, `barangay`, `city`, `province`, `region`, `bday`, `birthmunicipality`, `birthprovince`, `birthcountry`, `gender`, `religion`, `religionother`, `civil`, `maiden`, `nameofspouse`, `education`, `pwd`, `4ps`, `indgenous`, `indgenousspecify`, `gov`, `idtype`, `idno`, `householdhead`, `householdname`, `householdrel`, `noOfmembers`, `nomale`, `nofemale`, `emergencyname`, `emergencyno`,`grossfarming`, `grossnonfarming`, `nooffarmparcels`, `p1`, `p2`, `p3`, `farmbarangay1`, `farmcity1`, `farmarea1`, `ancestral1`, `agrarlan1`, `idno1`, `ownershiptype1`, `ownershiptypename1`, `cropa1`, `sizea1`, `noofheada1`, `farmtypea1`, `organicepractionera1`, `remarksa1`, `cropa2`, `sizea2`, `noofheada2`, `farmtypea2`, `organicepractionera2`, `remarksa2`, `cropa3`, `sizea3`, `noofheada3`, `farmtypea3`, `organicepractionera3`, `remarksa3`, `cropa4`, `sizea4`, `noofheada4`, `farmtypea4`, `organicepractionera4`, `remarksa4`, `cropa5`, `sizea5`, `noofheada5`, `farmtypea5`, `organicepractionera5`, `remarksa5`, `farmbarangay2`, `farmcity2`, `farmarea2`, `agrarlan2`, `idno2`, `ownershiptype2`, `ownershiptypename2`, `cropb1`, `sizeb1`, `noofheadb1`, `farmtypeb1`, `organicepractionerb1`, `remarksb1`, `cropb2`, `sizeb2`, `noofheadb2`, `farmtypeb2`, `organicepractionerb2`, `remarksb2`, `cropb3`, `sizeb3`, `noofheadb3`, `farmtypeb3`, `organicepractionerb3`, `remarksb3`, `cropb4`, `sizeb4`, `noofheadb4`, `farmtypeb4`, `organicepractionerb4`, `remarksb4`, `cropb5`, `sizeb5`, `noofheadb5`, `farmtypeb5`, `organicepractionerb5`, `remarksb5`, `farmbarangay3`, `farmcity3`, `farmarea3`, `ancestral3`, `agrarlan3`, `idno3`, `ownershiptype3`, `ownershiptypename3`, `cropc1`, `sizec1`, `noofheadc1`, `farmtypec1`, `organicepractionerc1`, `remarksc1`, `cropc2`, `sizec2`, `noofheadc2`, `farmtypec2`, `organicepractionerc2`, `remarksc2`, `cropc3`, `sizec3`, `noofheadc3`, `farmtypec3`, `organicepractionerc3`, `remarksc3`, `cropc4`, `sizec4`, `noofheadc4`, `farmtypec4`, `organicepractionerc4`, `remarksc4`, `cropc5`, `sizec5`, `noofheadc5`, `farmtypec5`, `organicepractionerc5`, `remarksc5`, `landtitle`,`landclearance`) 
                                VALUES ('".$farmerId."','".$enrollmenttype."','".$dateadminstered."','".$refnumber."','".$target_file."','".$surname."','".$firstname."','".$middlename."','".$extentionname."','".$purok."','".$street."','".$barangay."','".$city."','".$province."','".$region."','".$bday."','".$birthmunicipality."','".$birthprovince."','".$birthcountry."','".$gender."','".$religion."','".$religionother."','".$civil."','".$maiden."','".$nameofspouse."','".$education."','".$pwd."','".$fourps."','".$indgenous."','".$indgenousspecify."','".$gov."','".$idtype."','".$idno."','".$householdhead."','".$householdname."','".$householdrel."','".$noOfmembers."','".$nomale."','".$nofemale."','".$emergencyname."','".$emergencyno."','".$grossfarming."','".$grossnonfarming."','".$nooffarmparcels."','".$p1."','".$p2."','".$p3."','".$farmbarangay1."','".$farmcity1."','".$farmarea1."','".$ancestral1."','".$agrarlan1."','".$idno1."','".$ownershiptype1."','".$ownershiptypename1."','".$cropa1."','".$sizea1."','".$noofheada1."','".$farmtypea1."','".$organicepractionera1."','".$remarksa1."','".$cropa2."','".$sizea2."','".$noofheada2."','".$farmtypea2."','".$organicepractionera2."','".$remarksa2."','".$cropa3."','".$sizea3."','".$noofheada3."','".$farmtypea3."','".$organicepractionera3."','".$remarksa3."','".$cropa4."','".$sizea4."','".$noofheada4."','".$farmtypea4."','".$organicepractionera4."','".$remarksa4."','".$cropa5."','".$sizea5."','".$noofheada5."','".$farmtypea5."','".$organicepractionera5."','".$remarksa5."','".$farmbarangay2."','".$farmcity2."','".$farmarea2."','".$agrarlan2."','".$idno2."','".$ownershiptype2."','".$ownershiptypename2."','".$cropb1."','".$sizeb1."','".$noofheadb1."','".$farmtypeb1."','".$organicepractionerb1."','".$remarksb1."','".$cropb2."','".$sizeb2."','".$noofheadb2."','".$farmtypeb2."','".$organicepractionerb2."','".$remarksb2."','".$cropb3."','".$sizeb3."','".$noofheadb3."','".$farmtypeb3."','".$organicepractionerb3."','".$remarksb3."','".$cropb4."','".$sizeb4."','".$noofheadb4."','".$farmtypeb4."','".$organicepractionerb4."','".$remarksb4."','".$cropb5."','".$sizeb5."','".$noofheadb5."','".$farmtypeb5."','".$organicepractionerb5."','".$remarksb5."','".$farmbarangay3."','".$farmcity3."','".$farmarea3."','".$ancestral3."','".$agrarlan3."','".$idno3."','".$ownershiptype3."','".$ownershiptypename3."','".$cropc1."','".$sizec1."','".$noofheadc1."','".$farmtypec1."','".$organicepractionerc1."','".$remarksc1."','".$cropc2."','".$sizec2."','".$noofheadc2."','".$farmtypec2."','".$organicepractionerc2."','".$remarksc2."','".$cropc3."','".$sizec3."','".$noofheadc3."','".$farmtypec3."','".$organicepractionerc3."','".$remarksc3."','".$cropc4."','".$sizec4."','".$noofheadc4."','".$farmtypec4."','".$organicepractionerc4."','".$remarksc4."','".$cropc5."','".$sizec5."','".$noofheadc5."','".$farmtypec5."','".$organicepractionerc5."','".$remarksc5."','".$target_filetwo."','".$target_filethree."')";
                       // $sql = "INSERT INTO $forbarangay(`farmerId`,`enrollmenttype`, `dateadminstered`, `refnumber`, `uploadFile2x2`, `surname`, `firstname`, `middlename`, `extentionname`, `purok`, `street`, `barangay`, `city`, `province`, `region`, `bday`, `birthmunicipality`, `birthprovince`, `birthcountry`, `gender`, `religion`, `religionother`, `civil`, `maiden`, `nameofspouse`, `education`, `pwd`, `4ps`, `indgenous`, `indgenousspecify`, `gov`, `idtype`, `idno`, `householdhead`, `householdname`, `householdrel`, `noOfmembers`, `nomale`, `nofemale`, `emergencyname`, `emergencyno`, `memberoffarm`, `memberoffarmspecify`, `mainlivelihood`, `farmingactivity`,`kindofwork`, `kindofworkothers`, `typeoffishing`, `typeoffishingothers`, `typeofinvolment`, `typeofinvolmentothers`, `grossfarming`, `grossnonfarming`, `nooffarmparcels`, `p1`, `p2`, `p3`, `farmbarangay1`, `farmcity1`, `farmarea1`, `ancestral1`, `agrarlan1`, `idno1`, `ownershiptype1`, `ownershiptypename1`, `cropa1`, `sizea1`, `noofheada1`, `farmtypea1`, `organicepractionera1`, `remarksa1`, `cropa2`, `sizea2`, `noofheada2`, `farmtypea2`, `organicepractionera2`, `remarksa2`, `cropa3`, `sizea3`, `noofheada3`, `farmtypea3`, `organicepractionera3`, `remarksa3`, `cropa4`, `sizea4`, `noofheada4`, `farmtypea4`, `organicepractionera4`, `remarksa4`, `cropa5`, `sizea5`, `noofheada5`, `farmtypea5`, `organicepractionera5`, `remarksa5`, `farmbarangay2`, `farmcity2`, `farmarea2`, `agrarlan2`, `idno2`, `ownershiptype2`, `ownershiptypename2`, `cropb1`, `sizeb1`, `noofheadb1`, `farmtypeb1`, `organicepractionerb1`, `remarksb1`, `cropb2`, `sizeb2`, `noofheadb2`, `farmtypeb2`, `organicepractionerb2`, `remarksb2`, `cropb3`, `sizeb3`, `noofheadb3`, `farmtypeb3`, `organicepractionerb3`, `remarksb3`, `cropb4`, `sizeb4`, `noofheadb4`, `farmtypeb4`, `organicepractionerb4`, `remarksb4`, `cropb5`, `sizeb5`, `noofheadb5`, `farmtypeb5`, `organicepractionerb5`, `remarksb5`, `farmbarangay3`, `farmcity3`, `farmarea3`, `ancestral3`, `agrarlan3`, `idno3`, `ownershiptype3`, `ownershiptypename3`, `cropc1`, `sizec1`, `noofheadc1`, `farmtypec1`, `organicepractionerc1`, `remarksc1`, `cropc2`, `sizec2`, `noofheadc2`, `farmtypec2`, `organicepractionerc2`, `remarksc2`, `cropc3`, `sizec3`, `noofheadc3`, `farmtypec3`, `organicepractionerc3`, `remarksc3`, `cropc4`, `sizec4`, `noofheadc4`, `farmtypec4`, `organicepractionerc4`, `remarksc4`, `cropc5`, `sizec5`, `noofheadc5`, `farmtypec5`, `organicepractionerc5`, `remarksc5`, `landtitle`,`landclearance`) 
                       //         VALUES ('".$farmerId."','".$enrollmenttype."','".$dateadminstered."','".$refnumber."','".$target_file."','".$surname."','".$firstname."','".$middlename."','".$extentionname."','".$purok."','".$street."','".$barangay."','".$city."','".$province."','".$region."','".$bday."','".$birthmunicipality."','".$birthprovince."','".$birthcountry."','".$gender."','".$religion."','".$religionother."','".$civil."','".$maiden."','".$nameofspouse."','".$education."','".$pwd."','".$fourps."','".$indgenous."','".$indgenousspecify."','".$gov."','".$idtype."','".$idno."','".$householdhead."','".$householdname."','".$householdrel."','".$noOfmembers."','".$nomale."','".$nofemale."','".$emergencyname."','".$emergencyno."','".$memberoffarm."','".$memberoffarmspecify."','".$mainlivelihood."','".$kindofwork."','".$kindofworkothers."','".$typeoffishing."','".$typeoffishingothers."','".$typeofinvolment."','".$typeofinvolmentothers."','".$grossfarming."','".$grossnonfarming."','".$nooffarmparcels."','".$p1."','".$p2."','".$p3."','".$farmbarangay1."','".$farmcity1."','".$farmarea1."','".$ancestral1."','".$agrarlan1."','".$idno1."','".$ownershiptype1."','".$ownershiptypename1."','".$cropa1."','".$sizea1."','".$noofheada1."','".$farmtypea1."','".$organicepractionera1."','".$remarksa1."','".$cropa2."','".$sizea2."','".$noofheada2."','".$farmtypea2."','".$organicepractionera2."','".$remarksa2."','".$cropa3."','".$sizea3."','".$noofheada3."','".$farmtypea3."','".$organicepractionera3."','".$remarksa3."','".$cropa4."','".$sizea4."','".$noofheada4."','".$farmtypea4."','".$organicepractionera4."','".$remarksa4."','".$cropa5."','".$sizea5."','".$noofheada5."','".$farmtypea5."','".$organicepractionera5."','".$remarksa5."','".$farmbarangay2."','".$farmcity2."','".$farmarea2."','".$ancestral2."','".$agrarlan2."','".$idno2."','".$ownershiptype2."','".$ownershiptypename2."','".$cropb1."','".$sizeb1."','".$noofheadb1."','".$farmtypeb1."','".$organicepractionerb1."','".$remarksb1."','".$cropb2."','".$sizeb2."','".$noofheadb2."','".$farmtypeb2."','".$organicepractionerb2."','".$remarksb2."','".$cropb3."','".$sizeb3."','".$noofheadb3."','".$farmtypeb3."','".$organicepractionerb3."','".$remarksb3."','".$cropb4."','".$sizeb4."','".$noofheadb4."','".$farmtypeb4."','".$organicepractionerb4."','".$remarksb4."','".$cropb5."','".$sizeb5."','".$noofheadb5."','".$farmtypeb5."','".$organicepractionerb5."','".$remarksb5."','".$farmbarangay3."','".$farmcity3."','".$farmarea3."','".$ancestral3."','".$agrarlan3."','".$idno3."','".$ownershiptype3."','".$ownershiptypename3."','".$cropc1."','".$sizec1."','".$noofheadc1."','".$farmtypec1."','".$organicepractionerc1."','".$remarksc1."','".$cropc2."','".$sizec2."','".$noofheadc2."','".$farmtypec2."','".$organicepractionerc2."','".$remarksc2."','".$cropc3."','".$sizec3."','".$noofheadc3."','".$farmtypec3."','".$organicepractionerc3."','".$remarksc3."','".$cropc4."','".$sizec4."','".$noofheadc4."','".$farmtypec4."','".$organicepractionerc4."','".$remarksc4."','".$cropc5."','".$sizec5."','".$noofheadc5."','".$farmtypec5."','".$organicepractionerc5."','".$remarksc5."','".$target_filetwo."','".$target_filethree."')";
                            if(mysqli_query($con, $sql)){

                                if(!empty($_POST["cropa1"]) && !empty($_POST["sizea1"])) {
                                    $sqla1 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay1."','".$cropa1."','".$sizea1."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqla1)){
                                        }
                                }
                                if(!empty($_POST["cropa2"]) && !empty($_POST["sizea2"])) {
                                    $sqla2 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay1."','".$cropa2."','".$sizea2."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqla2)){
                                        }
                                }
                                if(!empty($_POST["cropa3"]) && !empty($_POST["sizea3"])) {
                                    $sqla3 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay1."','".$cropa3."','".$sizea3."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqla3)){
                                        }
                                }
                                if(!empty($_POST["cropa4"]) && !empty($_POST["sizea4"])) {
                                    $sqla4 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay1."','".$cropa4."','".$sizea4."')";
                                        if(mysqli_query($con, $sqla4)){
                                        }
                                }
                                if(!empty($_POST["cropa5"]) && !empty($_POST["sizea5"])) {
                                    $sqla5 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay1."','".$cropa5."','".$sizea5."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqla5)){
                                        }
                                }
                                //Barangay 2
                                if(!empty($_POST["cropb1"]) && !empty($_POST["sizeb1"])) {
                                    $sqlb1 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay2."','".$cropb1."','".$sizeb1."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlb1)){
                                        }
                                }
                                if(!empty($_POST["cropb2"]) && !empty($_POST["sizeb2"])) {
                                    $sqlb2 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay2."','".$cropb2."','".$sizeb2."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlb2)){
                                        }
                                }
                                if(!empty($_POST["cropb3"]) && !empty($_POST["sizeb3"])) {
                                    $sqlb3 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay2."','".$cropb3."','".$sizeb3."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlb3)){
                                        }
                                }
                                if(!empty($_POST["cropb4"]) && !empty($_POST["sizeb4"])) {
                                    $sqlb4 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay2."','".$cropb4."','".$sizeb4."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlb4)){
                                        }
                                }
                                if(!empty($_POST["cropb5"]) && !empty($_POST["sizeb5"])) {
                                    $sqlb5 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay2."','".$cropb5."','".$sizeb5."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlb5)){
                                        }
                                }
                                //Barangay 3
                                if(!empty($_POST["cropc1"]) && !empty($_POST["sizec1"])) {
                                    $sqlc1 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay3."','".$cropc1."','".$sizec1."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlc1)){
                                        }
                                }
                                if(!empty($_POST["cropc2"]) && !empty($_POST["sizec2"])) {
                                    $sqlc2 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay3."','".$cropc2."','".$sizec2."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlc2)){
                                        }
                                }
                                if(!empty($_POST["cropc3"]) && !empty($_POST["sizec3"])) {
                                    $sqlc3 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay3."','".$cropc3."','".$sizec3."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlc3)){
                                        }
                                }
                                if(!empty($_POST["cropc4"]) && !empty($_POST["sizec4"])) {
                                    $sqlc4 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay3."','".$cropc4."','".$sizec4."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlc4)){
                                        }
                                }
                                if(!empty($_POST["cropc5"]) && !empty($_POST["sizec5"])) {
                                    $sqlc5 = "INSERT INTO `tbl_intervention`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`,`status`)
                                             VALUES ('".$farmerId."','".$farmerfullname."','".$farmbarangay3."','".$cropc5."','".$sizec5."','".$farmstatus."')";
                                        if(mysqli_query($con, $sqlc5)){
                                        }
                                }
                                $success = "1";
                                $success_message = "Form added successfully";
                                echo "<script>
                                        $(function(){
                                            $('#rsbsaModal').modal('show');
                                        });
                                    </script>";
                                
                            } else{
                                $errors = "1";
                                //$error_message = "Error submitting the form. Please try again.";
                                $error_message =  die(mysqli_error($con));
                            }
                    } else{
                        $errors = "1";
                        $error_message = "Please check if all the forms are complete.";
                    }
                }else{
                    $errors = "1";
                    $error_message = "Sorry, there was an error uploading your land clearance. Please try again. ";
                }
            }else{
                $errors = "1";
                $error_message = "Sorry, there was an error uploading your land title. Please try again.";
            }
        
    } else {
        $errors = "1";
        $error_message = "Sorry, there was an error uploading your 2x2 picture. Please try again.";
    }
    }
}
?>
    
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="rsbsa_container ml-0 pt-10  pb-32 md:pb-0 md:ml-60">
        <form action="" method="POST"  enctype="multipart/form-data">
            <ul class="nav nav-tabs flex flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabFill" role="tablist">
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step1Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    active
                    " id="tabs-step1-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step1Fill" role="tab"
                    aria-controls="tabs-step1Fill" aria-selected="true">Step 1</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step2Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    tab2
                    " id="tabs-step2-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step2Fill" role="tab"
                    aria-controls="tabs-step2Fill" aria-selected="false">Step 2</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step3Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    " id="tabs-step3-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step3Fill" role="tab"
                    aria-controls="tabs-step3Fill" aria-selected="false">Step 3</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step4Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    " id="tabs-step4-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step4Fill" role="tab"
                    aria-controls="tabs-step4Fill" aria-selected="false">Step 4</a>
                </li>
            </ul>
            <div class="tab-content p-10" id="tabs-tabContentFill">
                <div class="tab-pane fade show active" id="tabs-step1Fill" role="tabpanel" aria-labelledby="tastep1-tabFill">
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
                    <div class="personal_info flex flex-col gap-1">
                        <h3 class="text-xl font-bold">RSBSA ENROLLMENT FORM</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Enrollment Type</label>
                                <select name="enrollmenttype" class="form-input" id="">
                                    <option value="new">New</option>
                                    <option value="updating">Updating</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Date Administered</label>
                                <input type="date" class="form-input w-full" name="dateadminstered" value="02-08-2022">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2" style="display:none;">
                                <?php 
                                    $fourRandomDigit = rand(1000,9999);
                                    $forfarmid = "farmer"."-".$fourRandomDigit;
                                ?>
                                <label for="">Farmer ID</label>
                                <input type="text" class="form-input w-full" name="farmerId" value="<?php echo $forfarmid; ?>" readonly>
                            </div>
                        </div>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Reference Number</label>
                                <input type="number" class="form-input w-full" name="refnumber" placeholder="Enter Reference Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">2x2 Picture - Photo Taken within 6 months</label>
                                <input type="file" class="form-input w-full" name="uploadFile2x2" id="uploadFile2x2">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-20 h-20 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreview2x2"></div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Name</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Surname</label>
                                <input type="text" class="form-input w-full" name="surname" placeholder="Surname">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">First Name</label>
                                <input type="text" class="form-input w-full" name="firstname" placeholder="First name">
                            </div>
                        </div>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-input w-full" name="middlename" placeholder="Middle name">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Extention Name</label>
                                <input type="text" class="form-input w-full" name="extentionname" placeholder="Extention name">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Address</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">House/Lot/Bldg.No/Purok</label>
                                <input type="text" class="form-input w-full" name="purok" placeholder="House/Lot/Bldg.No/Purok">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Street/Sitio/Subdv.</label>
                                <input type="text" class="form-input w-full" name="street" placeholder="Street/Sitio/Subdv.">
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Barangay</label>
                                <select name="barangay" id="" class="form-input">
                                <?php
                                    include "config.php";
                                    $sqlbrgy = "SELECT * FROM `tbl_barangay`";
                                    $resultbrgy = mysqli_query($con, $sqlbrgy);
                                    if (mysqli_num_rows($resultbrgy) > 0) {
                                        while($rowbrgy = mysqli_fetch_assoc($resultbrgy)) {
                                ?>
                                         <option value="<?php echo $rowbrgy['barangay'];?>"><?php echo $rowbrgy['barangay']; ?></option>
                                <?php
                                        }
                                    } else {
                                    echo "0 results";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Municipality/City</label>
                                <input type="text" class="form-input w-full" name="city" placeholder="Municipality/City">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Province</label>
                                <input type="text" class="form-input w-full" name="province" placeholder="Province">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Region</label>
                                <input type="text" class="form-input w-full" name="region" placeholder="Region">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Date of Birth and Place of Birth</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-input w-full" name="bday">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Municipality</label>
                                <input type="text" class="form-input w-full" name="birthmunicipality" placeholder="Municipality">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Province</label>
                                <input type="text" class="form-input w-full" name="birthprovince" placeholder="Province">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Country</label>
                                <input type="text" class="form-input w-full" name="birthcountry" placeholder="Country">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Other Information</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Gender</label>
                                <select name="gender" class="form-input" id="">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Religion</label>
                                <select name="religion" class="form-input" id="" onchange="showReligion(this)">
                                    <option value="christianity">Christianity</option>
                                    <option value="islam">Islam</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div id="hidden_religion" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Other Religion</label>
                                    <input type="text" class="form-input w-full" name="religionother" placeholder="Other Religion">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Civil Status</label>
                                <select name="civil" class="form-input" id="" onchange="showCivil(this)">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="seperated">Seperated</option>
                                </select>
                            </div>
                            <div  id="hidden_spouse" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 ">
                                    <label for="">Name of Spouse</label>
                                    <input type="text" class="form-input w-full" name="nameofspouse" placeholder="Spouse name">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Mothers Maiden name</label>
                                <input type="text" class="form-input w-full" name="maiden" placeholder="Mothers Maiden name">
                            </div>
                        </div>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Highest Formal Education</label>
                                <select name="education" class="form-input" id="">
                                    <option value="preschool">Pre-School</option>
                                    <option value="elementary">Elementary</option>
                                    <option value="highschool">High School (non- K-12)</option>
                                    <option value="juniorhighschool">Junior High School (K-12)</option>
                                    <option value="seniorhighschool">Senior High School (K-12)</option>
                                    <option value="college">College</option>
                                    <option value="vocational">Vocational</option>
                                    <option value="postgrad">Post-graduate</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Person with Disability (PWD)</label>
                                <select name="pwd" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">4P's Beneficiary</label>
                                <select name="fourps" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Member of an Indigenous Group</label>
                                <select name="indgenous" class="form-input" id=""  onchange="hideGroup(this)">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div  id="hidden_group"  class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 ">
                                    <label for="">If yes, specify</label>
                                    <input type="text" class="form-input w-full" name="indgenousspecify" placeholder="Specify indigenous group">
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Government ID?</label>
                                <select name="gov" class="form-input" id="" onchange="hideGoverment(this)">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div  id="hidden_government" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If yes, specify ID Type</label>
                                    <input type="text" class="form-input w-full" name="idtype" placeholder="Enter ID Type">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">ID Number</label>
                                <input type="text" class="form-input w-full" name="idno" placeholder="ID Number">
                            </div>
                        </div>
                        <div class="flex justify-end pt-5">
                            <!--span onclick="myFunctionOneprev()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">PREVIOUS</span-->
                            <span onclick="myFunctionOne()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">NEXT</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-step2Fill" role="tabpanel" aria-labelledby="tabs-step2-tabFill">
                    <h3 class="text-xl font-bold">Other Information</h3>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Household head?</label>
                                <select name="householdhead" class="form-input" id="" onchange="hideHousehold(this)">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div  id="hidden_household" class=" w-full" style="display:none;">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If no, name of household head</label>
                                    <input type="text" class="form-input w-full" name="householdname" placeholder="Household head Name">
                                </div>
                            </div>
                            <div  id="hidden_householdtwo" class=" w-full" style="display:none;">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">Relationship</label>
                                    <input type="text" class="form-input w-full" name="householdrel" placeholder="Relationship">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of living household members</label>
                                <input type="text" class="form-input w-full" name="noOfmembers" placeholder="Number of living household members">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of male</label>
                                <input type="text" class="form-input w-full" name="nomale" placeholder="Number of male">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of female</label>
                                <input type="text" class="form-input w-full" name="nofemale" placeholder="Number of female">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Person to notify in case of emergency</label>
                                <input type="text" class="form-input w-full" name="emergencyname" placeholder="Emergency contact name">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Contact number</label>
                                <input type="number" class="form-input w-full" name="emergencyno" placeholder="Emergency contact number">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Member of any Farmers Association/Cooperative?</label>
                                <select name="memberoffarm" class="form-input" id="" onchange="hideFarmMember(this)">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div  id="hidden_farmmember" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If yes, specify</label>
                                    <input type="text" class="form-input w-full" name="memberoffarmspecify" placeholder="Specify member of any farmers association/cooperative">
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Farm Profile</h3>
                        <label for="" class="text-lg">Main Livelihood</label>
                        <div class="flex flex-col md:flex-row w-full pb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox1" value="Farmer" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Farmer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox2" value="Farmworker" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Farmworker/Laborer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox1" value="Fisherfolk" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fisherfolk</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox2" value="Agriyouth" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Agri Youth</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Farmers</label>
                            <label for="" class="">Type of Farming Activity</label>
                            <div class="flex flex-col md:flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Rice" name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Rice</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Corn" name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Corn</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="otherCrops" value="Others" name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Other crops</label>
                                </div>
                                <div class="px-2" id="otherCropsSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="farmingactivityothers" placeholder="Please specify">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="livestock" value="Livestock" name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Livestock</label>
                                </div>
                                <div class="px-2" id="livestockSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="farmingactivitylivestock" placeholder="Please specify">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="poultry" value="Poultry" name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Poultry</label>
                                </div>
                                <div class="px-2" id="poultrySpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="farmingactivitypoultry" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Farmworkers</label>
                            <label for="" class="">Kind of Work</label>
                            <div class="flex flex-col md:flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Land Preparation" name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Land Preparation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Planting/Transplanting" name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Planting/Transplanting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Cultivation" name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Cultivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Harvesting" name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Harvesting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="kindofwork" value="Others" name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="kindofworkSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="kindofworkothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Fisherfolk</label>
                            <p class="text-sm">The Lending Conduit shall coordinate with the Bureu of Fisheries and Aquatic Resouces (BFAR) in the issuance of a certification that the fisherfolk-borrower under PUNLA/PLEA is registered under the Municipal Registration (FishR)</p>
                            <label for="" class="">Type of Fishing Activity</label>
                            <div class="flex flex-col md:flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishCapture" name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Capture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Aquaculture" name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Aquaculture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Gleaning" name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Gleaning</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishProcessing" name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Processing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishVending" name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Vending</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" value="Others" name="typeoffishing[]" id="forfisherfolk">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="forfisherfolkSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="typeoffishingothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Agri youth</label>
                            <p class="text-sm">For the purposes of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>
                            <label for="" class="">Type of involment</label>
                            <div class="flex flex-col md:flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="partoffarminghousehold" name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Part of a farming household</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="attendingformal" name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Attending/attended formal agri-fishery related course</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="attendingnonformal" name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Attending/attended non-formal agri-fishery related course</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="participated" name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Participated in any agricultural activity/program</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="involment" value="others" name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="involmentSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" name="typeofinvolmentothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Gross Annual Income Last Year</h3>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Farming</label>
                                <input type="text" class="form-input w-full" name="grossfarming" placeholder="Gross annual income last year in farming">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Non-farming</label>
                                <input type="text" class="form-input w-full" name="grossnonfarming" placeholder="Gross annual income last year in non-farming">
                            </div>
                        </div>
                        <div class="flex justify-between pt-5">
                            <span onclick="myFunctionTwoprev()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">PREVIOUS</span>
                            <span onclick="myFunctionTwo()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">NEXT</span>
                        </div>
                </div>
                <div class="tab-pane fade" id="tabs-step3Fill" role="tabpanel" aria-labelledby="tabs-step3-tabFill">
                    <h3 class="text-xl font-bold">Farm Profile</h3>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of Farm Parcels:</label>
                                <input type="number" class="form-input w-full" name="nooffarmparcels" placeholder="No. of farm parcels">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P1)</label>
                                <input type="text" class="form-input w-full" name="p1" placeholder="P1">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P2)</label>
                                <input type="text" class="form-input w-full" name="p2" placeholder="P2">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P3)</label>
                                <input type="text" class="form-input w-full" name="p3" placeholder="P3">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 1</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay1" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity1" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea1" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <select name="ancestral1" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <select name="agrarlan1" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno1" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <select name="ownershiptype1" class="form-input" id="" onchange="showTenantOne(this)">
                                    <option value="owner">Registered Owner</option>
                                    <option value="tenant">Tenant</option>
                                    <option value="lessee">Lessee</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenantone" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename1" placeholder="">
                                </div>
                            </div>
                            
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropa1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizea1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheada1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypea1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionera1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksa1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa5" placeholder="Remarks">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 2</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay2" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity2" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea2" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <select name="ancestral2" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <select name="agrarlan2" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno2" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <select name="ownershiptype2" class="form-input" id="" onchange="showTenantTwo(this)">
                                    <option value="owner">Registered Owner</option>
                                    <option value="tenant">Tenant</option>
                                    <option value="lessee">Lessee</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenanttwo" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename2" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropb1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizeb1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheadb1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypeb1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionerb1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksb1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb5" placeholder="Remarks">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 3</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay3" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity3" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea3" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <select name="ancestral3" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <select name="agrarlan3" class="form-input" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno3" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <select name="ownershiptype3" class="form-input" id="" onchange="showTenantThree(this)">
                                    <option value="owner">Registered Owner</option>
                                    <option value="tenant">Tenant</option>
                                    <option value="lessee">Lessee</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenantthree" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename3" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropc1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizec1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheadc1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypec1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionerc1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksc1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc5" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex justify-between pt-5">
                            <span onclick="myFunctionThreeprev()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">PREVIOUS</span>
                            <span onclick="myFunctionThree()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">NEXT</span>
                        </div>

                </div>
                <div class="tab-pane fade" id="tabs-step4Fill" role="tabpanel" aria-labelledby="tabs-step4-tabFill">
                <h3 class="text-xl font-bold">Owner Document</h3>
                    <div class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="" class="font-bold">Upload Land Title</label>
                                <input type="file" id="uploadFileOne" type="file" name="fileToUploadOne" >
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-52 h-60 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreviewOne"></div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="" class="font-bold">Upload Land Clearance</label>
                                <input type="file" id="uploadFileTwo" type="file" name="fileToUploadTwo" >
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-52 h-60 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreviewTwo"></div>
                            </div>
                    </div>
                    <div class="flex flex-row justify-center pt-5">
                        <input class="btn-primary w-2/4 mt-2" name="btnsubmit" type="submit" value="Submit RSBSA form">
                    </div>
                    <div class="flex justify-start pt-5">
                            <span onclick="myFunctionFourprev()" class="cursor-pointer bg-stone-300 rounded-lg text-center w-24 p-2 md:w-32 md:p-5">PREVIOUS</span>
                        </div>
                </div>
            </div>
        </form>
        <?php
            include "footer.php";
        ?>
    </div>
    <!-- RSBSA FORM MODAL-->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="rsbsaModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="profileModalLabel">RSBSA FORM</h5>
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
                </div>
                <div class="modal-body relative p-4">
                    <?php
                        include "table.php";
                    ?>
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <input type="button" value="Print" class="p-2 rounded-lg bg-yellow-400 text-white w-20" onclick="printDiv('printableArea')"/>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(printableArea) {
            var printContents = document.getElementById("myDiv").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>

<script>
function myFunctionOne() {
$('#tabs-step2-tabFill')[0].click(); 
}
function myFunctionTwo() {
$('#tabs-step3-tabFill')[0].click(); 
}
function myFunctionThree() {
$('#tabs-step4-tabFill')[0].click(); 
}
function myFunctionTwoprev() {
$('#tabs-step1-tabFill')[0].click(); 
}
function myFunctionThreeprev() {
$('#tabs-step2-tabFill')[0].click(); 
}
function myFunctionFourprev() {
$('#tabs-step3-tabFill')[0].click(); 
}
</script>

<script>
    $(function() {
        $("#uploadFileOne").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreviewOne").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script>
    $(function() {
        $("#uploadFileTwo").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreviewTwo").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script>
    $(function() {
        $("#uploadFile2x2").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview2x2").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script type="text/javascript">
function showReligion(select){
   if(select.value=="others"){
    document.getElementById('hidden_religion').style.display = "block";
   } else{
    document.getElementById('hidden_religion').style.display = "none";
   }
};
function showCivil(select){
   if(select.value=="married"){
    document.getElementById('hidden_spouse').style.display = "block";
   } else{
    document.getElementById('hidden_spouse').style.display = "none";
   }
} 
function hideGroup(select){
   if(select.value=="yes"){
    document.getElementById('hidden_group').style.display = "block";
   } else{
    document.getElementById('hidden_group').style.display = "none";
   }
} 
function hideGoverment(select){
   if(select.value=="yes"){
    document.getElementById('hidden_government').style.display = "block";
   } else{
    document.getElementById('hidden_government').style.display = "none";
   }
} 
function hideHousehold(select){
   if(select.value=="no"){
    document.getElementById('hidden_household').style.display = "block";
    document.getElementById('hidden_householdtwo').style.display = "block";
   } else{
    document.getElementById('hidden_household').style.display = "none";
    document.getElementById('hidden_householdtwo').style.display = "none";
   }
}
function hideFarmMember(select){
   if(select.value=="yes"){
    document.getElementById('hidden_farmmember').style.display = "block";
   } else{
    document.getElementById('hidden_farmmember').style.display = "none";
   }
} 
$(function() {
    $('#otherCrops').change(function() {
        $('#otherCropsSpecify').toggle($(this).is(':checked'));
    });
});
$(function() {
    $('#poultry').change(function() {
        $('#poultrySpecify').toggle($(this).is(':checked'));
    });
});
$(function() {
    $('#livestock').change(function() {
        $('#livestockSpecify').toggle($(this).is(':checked'));
    });
});
$(function() {
    $('#kindofwork').change(function() {
        $('#kindofworkSpecify').toggle($(this).is(':checked'));
    });
});
$(function() {
    $('#forfisherfolk').change(function() {
        $('#forfisherfolkSpecify').toggle($(this).is(':checked'));
    });
});
$(function() {
    $('#involment').change(function() {
        $('#involmentSpecify').toggle($(this).is(':checked'));
    });
});
function showTenantOne(select){
   if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
    document.getElementById('hidden_tenantone').style.display = "block";
   } else{
    document.getElementById('hidden_tenantone').style.display = "none";
   }
};
function showTenantTwo(select){
   if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
    document.getElementById('hidden_tenanttwo').style.display = "block";
   } else{
    document.getElementById('hidden_tenanttwo').style.display = "none";
   }
};
function showTenantThree(select){
   if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
    document.getElementById('hidden_tenantthree').style.display = "block";
   } else{
    document.getElementById('hidden_tenantthree').style.display = "none";
   }
};
</script>
    