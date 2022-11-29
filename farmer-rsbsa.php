<?php
//ini_set('display_errors', 1);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
    $session_barangay = "tbl_".$_SESSION['barangay'];
    $session_number = $_SESSION['number'];

    include "config.php";
    $sqlId = "SELECT `farmerId` FROM $session_barangay WHERE number = '".$session_number."'";
    $resultId = mysqli_query($con, $sqlId);
    if (mysqli_num_rows($resultId) > 0) {
        while($rowId = mysqli_fetch_assoc($resultId)) {
            $_SESSION['farmerId'] = $rowId['farmerId'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My RSBSA</title>
    <link rel="stylesheet" href="css/style.css" />	  
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
    <?php
                        $sql = "SELECT * FROM $session_barangay WHERE farmerId = '".$_SESSION['farmerId']."'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                              $enrollmenttype = mysqli_real_escape_string($con, $row['enrollmenttype']);
                              $dateadminstered = mysqli_real_escape_string($con, $row['dateadminstered']);
                              $refnumber = mysqli_real_escape_string($con, $row['refnumber']);
                              $surname = mysqli_real_escape_string($con, $row['surname']);
                              $firstname = mysqli_real_escape_string($con, $row['firstname']);
                              $middlename = mysqli_real_escape_string($con, $row['middlename']);
                              $extentionname = mysqli_real_escape_string($con, $row['extentionname']);
                              $purok = mysqli_real_escape_string($con, $row['purok']);
                              $street = mysqli_real_escape_string($con, $row['street']);
                              $barangay = mysqli_real_escape_string($con, $row['barangay']);
                              $city = mysqli_real_escape_string($con, $row['city']);
                              $province = mysqli_real_escape_string($con, $row['province']);
                              $region = mysqli_real_escape_string($con, $row['region']);
                              $bday = mysqli_real_escape_string($con, $row['bday']);
                              $birthmunicipality = mysqli_real_escape_string($con, $row['birthmunicipality']);
                              $birthprovince = mysqli_real_escape_string($con, $row['birthprovince']);
                              $birthcountry = mysqli_real_escape_string($con, $row['birthcountry']);
                              $gender = mysqli_real_escape_string($con, $row['gender']);
                              $religion = mysqli_real_escape_string($con, $row['religion']);
                              $religionother = mysqli_real_escape_string($con, $row['religionother']);
                              $civil = mysqli_real_escape_string($con, $row['civil']);
                              $maiden = mysqli_real_escape_string($con, $row['maiden']);
                              $nameofspouse = mysqli_real_escape_string($con, $row['nameofspouse']);
                              $education = mysqli_real_escape_string($con, $row['education']);
                              $pwd = mysqli_real_escape_string($con, $row['pwd']);
                              if($row['fourps'] == NULL || $row['fourps'] == ""){
                                $fourps = "";
                              }else{
                                $fourps = mysqli_real_escape_string($con, $row['fourps']);
                              }
                              $indgenous = mysqli_real_escape_string($con, $row['indgenous']);
                              $indgenousspecify = mysqli_real_escape_string($con, $row['indgenousspecify']);
                              $gov = mysqli_real_escape_string($con, $row['gov']);
                              $idtype = mysqli_real_escape_string($con, $row['idtype']);
                              $idno = mysqli_real_escape_string($con, $row['idno']);
                              $householdhead = mysqli_real_escape_string($con, $row['householdhead']);
                              $householdname = mysqli_real_escape_string($con, $row['householdname']);
                              $householdrel = mysqli_real_escape_string($con, $row['householdrel']);
                              if($_POST['noOfmembers'] == NULL || $_POST['noOfmembers'] = ""){
                                $noOfmembers = "";
                              }else{
                                $noOfmembers = mysqli_real_escape_string($con, $_POST['noOfmembers']);
                              }
                              $nomale = mysqli_real_escape_string($con, $row['nomale']);
                              $nofemale = mysqli_real_escape_string($con, $row['nofemale']);
                              $emergencyname = mysqli_real_escape_string($con, $row['emergencyname']);
                              $emergencyno = mysqli_real_escape_string($con, $row['emergencyno']);
                              $memberoffarm = mysqli_real_escape_string($con, $row['memberoffarm']);
                              $memberoffarmspecify = mysqli_real_escape_string($con, $row['memberoffarmspecify']);
                  
                              //$mainlivelihood = mysqli_real_escape_string($con, $_POST['mainlivelihood']);
                              //$farmingactivity = mysqli_real_escape_string($con, $_POST['farmingactivity']);
                              $mainlivelihood = explode(',', $row['mainlivelihood']);
                              $farmingactivity = explode(',', $row['farmingactivity']);
                              $farmingactivityothers = mysqli_real_escape_string($con, $row['farmingactivityothers']);
                              $farmingactivitylivestock = mysqli_real_escape_string($con, $row['farmingactivitylivestock']);
                              $farmingactivitypoultry = mysqli_real_escape_string($con, $row['farmingactivitypoultry']);
                              //$kindofwork = mysqli_real_escape_string($con, $_POST['kindofwork']);
      
                              //$farmingactivitypoultry = implode(',', $_POST['farmingactivity']);
                              //$farmingactivitylivestock = implode(',', $_POST['farmingactivitypoultry']);
      
                              $kindofwork = explode(',', $row['kindofwork']);
                              $kindofworkothers = mysqli_real_escape_string($con, $row['kindofworkothers']);
                              //$typeoffishing = mysqli_real_escape_string($con, $_POST['typeoffishing']);
                              $typeoffishingothers = mysqli_real_escape_string($con, $row['typeoffishingothers']);
                              //$typeofinvolment = mysqli_real_escape_string($con, $_POST['typeofinvolment']);
                              $typeoffishing = explode(',', $row['typeoffishing']);
                              $typeofinvolment = explode(',', $row['typeofinvolment']);
                  
                              $typeofinvolmentothers = mysqli_real_escape_string($con, $row['typeofinvolmentothers']);
                              $grossfarming = mysqli_real_escape_string($con, $row['grossfarming']);
                              $grossnonfarming = mysqli_real_escape_string($con, $row['grossnonfarming']);
                              $nooffarmparcels = mysqli_real_escape_string($con, $row['nooffarmparcels']);
                              $p1 = mysqli_real_escape_string($con, $row['p1']);
                              $p2 = mysqli_real_escape_string($con, $row['p2']);
                              $p3 = mysqli_real_escape_string($con, $row['p3']);
                              $farmbarangay1 = mysqli_real_escape_string($con, $row['farmbarangay1']);
                              $farmcity1 = mysqli_real_escape_string($con, $row['farmcity1']);
                              $farmarea1 = mysqli_real_escape_string($con, $row['farmarea1']);
                              $ancestral1 = mysqli_real_escape_string($con, $row['ancestral1']);
                              $agrarlan1 = mysqli_real_escape_string($con, $row['agrarlan1']);
                              $idno1 = mysqli_real_escape_string($con, $row['idno1']);
                              $ownershiptype1 = mysqli_real_escape_string($con, $row['ownershiptype1']);
                              $ownershiptypename1 = mysqli_real_escape_string($con, $row['ownershiptypename1']);
                              $cropa1 = mysqli_real_escape_string($con, $row['cropa1']);
                              $sizea1 = mysqli_real_escape_string($con, $row['sizea1']);
                              $noofheada1 = mysqli_real_escape_string($con, $row['noofheada1']);
                              $farmtypea1 = mysqli_real_escape_string($con, $row['farmtypea1']);
                              $organicepractionera1 = mysqli_real_escape_string($con, $row['organicepractionera1']);
                              $remarksa1 = mysqli_real_escape_string($con, $row['remarksa1']);
                              $cropa2 = mysqli_real_escape_string($con, $row['cropa2']);
                              $sizea2 = mysqli_real_escape_string($con, $row['sizea2']);
                              $noofheada2 = mysqli_real_escape_string($con, $row['noofheada2']);
                              $farmtypea2 = mysqli_real_escape_string($con, $row['farmtypea2']);
                              $organicepractionera2 = mysqli_real_escape_string($con, $row['organicepractionera2']);
                              $remarksa2 = mysqli_real_escape_string($con, $row['remarksa2']);
                              $cropa3 = mysqli_real_escape_string($con, $row['cropa3']);
                              $sizea3 = mysqli_real_escape_string($con, $row['sizea3']);
                              $noofheada3 = mysqli_real_escape_string($con, $row['noofheada3']);
                              $farmtypea3 = mysqli_real_escape_string($con, $row['farmtypea3']);
                              $organicepractionera3 = mysqli_real_escape_string($con, $row['organicepractionera3']);
                              $remarksa3 = mysqli_real_escape_string($con, $row['remarksa3']);
                              $cropa4 = mysqli_real_escape_string($con, $row['cropa4']);
                              $sizea4 = mysqli_real_escape_string($con, $row['sizea4']);
                              $noofheada4 = mysqli_real_escape_string($con, $row['noofheada4']);
                              $farmtypea4 = mysqli_real_escape_string($con, $row['farmtypea4']);
                              $organicepractionera4 = mysqli_real_escape_string($con, $row['organicepractionera4']);
                              $remarksa4 = mysqli_real_escape_string($con, $row['remarksa4']);
                              $cropa5 = mysqli_real_escape_string($con, $row['cropa5']);
                              $sizea5 = mysqli_real_escape_string($con, $row['sizea5']);
                              $noofheada5 = mysqli_real_escape_string($con, $row['noofheada5']);
                              $farmtypea5 = mysqli_real_escape_string($con, $row['farmtypea5']);
                              $organicepractionera5 = mysqli_real_escape_string($con, $row['organicepractionera5']);
                              $remarksa5 = mysqli_real_escape_string($con, $row['remarksa5']);
                              $farmbarangay2 = mysqli_real_escape_string($con, $row['farmbarangay2']);
                              $farmcity2 = mysqli_real_escape_string($con, $row['farmcity2']);
                              $farmarea2 = mysqli_real_escape_string($con, $row['farmarea2']);
                              $ancestral2 = mysqli_real_escape_string($con, $row['ancestral2']);
                              $agrarlan2 = mysqli_real_escape_string($con, $row['agrarlan2']);
                              $idno2 = mysqli_real_escape_string($con, $row['idno2']);
                              $ownershiptype2 = mysqli_real_escape_string($con, $row['ownershiptype2']);
                              $ownershiptypename2 = mysqli_real_escape_string($con, $row['ownershiptypename2']);
                              $cropb1 = mysqli_real_escape_string($con, $row['cropb1']);
                              $sizeb1 = mysqli_real_escape_string($con, $row['sizeb1']);
                              $noofheadb1 = mysqli_real_escape_string($con, $row['noofheadb1']);
                              $farmtypeb1 = mysqli_real_escape_string($con, $row['farmtypeb1']);
                              $organicepractionerb1 = mysqli_real_escape_string($con, $row['organicepractionerb1']);
                              $remarksb1 = mysqli_real_escape_string($con, $row['remarksb1']);
                              $cropb2 = mysqli_real_escape_string($con, $row['cropb2']);
                              $sizeb2 = mysqli_real_escape_string($con, $row['sizeb2']);
                              $noofheadb2 = mysqli_real_escape_string($con, $row['noofheadb2']);
                              $farmtypeb2 = mysqli_real_escape_string($con, $row['farmtypeb2']);
                              $organicepractionerb2 = mysqli_real_escape_string($con, $row['organicepractionerb2']);
                              $remarksb2 = mysqli_real_escape_string($con, $row['remarksb2']);
                              $cropb3 = mysqli_real_escape_string($con, $row['cropb3']);
                              $sizeb3 = mysqli_real_escape_string($con, $row['sizeb3']);
                              $noofheadb3 = mysqli_real_escape_string($con, $row['noofheadb3']);
                              $farmtypeb3 = mysqli_real_escape_string($con, $row['farmtypeb3']);
                              $organicepractionerb3 = mysqli_real_escape_string($con, $row['organicepractionerb3']);
                              $remarksb3 = mysqli_real_escape_string($con, $row['remarksb3']);
                              $cropb4 = mysqli_real_escape_string($con, $row['cropb4']);
                              $sizeb4 = mysqli_real_escape_string($con, $row['sizeb4']);
                              $noofheadb4 = mysqli_real_escape_string($con, $row['noofheadb4']);
                              $farmtypeb4 = mysqli_real_escape_string($con, $row['farmtypeb4']);
                              $organicepractionerb4 = mysqli_real_escape_string($con, $row['organicepractionerb4']);
                              $remarksb4 = mysqli_real_escape_string($con, $row['remarksb4']);
                              $cropb5 = mysqli_real_escape_string($con, $row['cropb5']);
                              $sizeb5 = mysqli_real_escape_string($con, $row['sizeb5']);
                              $noofheadb5 = mysqli_real_escape_string($con, $row['noofheadb5']);
                              $farmtypeb5 = mysqli_real_escape_string($con, $row['farmtypeb5']);
                              $organicepractionerb5 = mysqli_real_escape_string($con, $row['organicepractionerb5']);
                              $remarksb5 = mysqli_real_escape_string($con, $row['remarksb5']);
                              $farmbarangay3 = mysqli_real_escape_string($con, $row['farmbarangay3']);
                              $farmcity3 = mysqli_real_escape_string($con, $row['farmcity3']);
                              $farmarea3 = mysqli_real_escape_string($con, $row['farmarea3']);
                              $ancestral3 = mysqli_real_escape_string($con, $row['ancestral3']);
                              $agrarlan3 = mysqli_real_escape_string($con, $row['agrarlan3']);
                              $idno3 = mysqli_real_escape_string($con, $row['idno3']);
                              $ownershiptype3 = mysqli_real_escape_string($con, $row['ownershiptype3']);
                              $ownershiptypename3 = mysqli_real_escape_string($con, $row['ownershiptypename3']);
                              $cropc1 = mysqli_real_escape_string($con, $row['cropc1']);
                              $sizec1 = mysqli_real_escape_string($con, $row['sizec1']);
                              $noofheadc1 = mysqli_real_escape_string($con, $row['noofheadc1']);
                              $farmtypec1 = mysqli_real_escape_string($con, $row['farmtypec1']);
                              $organicepractionerc1 = mysqli_real_escape_string($con, $row['organicepractionerc1']);
                              $remarksc1 = mysqli_real_escape_string($con, $row['remarksc1']);
                              $cropc2 = mysqli_real_escape_string($con, $row['cropc2']);
                              $sizec2 = mysqli_real_escape_string($con, $row['sizec2']);
                              $noofheadc2 = mysqli_real_escape_string($con, $row['noofheadc2']);
                              $farmtypec2 = mysqli_real_escape_string($con, $row['farmtypec2']);
                              $organicepractionerc2 = mysqli_real_escape_string($con, $row['organicepractionerc2']);
                              $remarksc2 = mysqli_real_escape_string($con, $row['remarksc2']);
                              $cropc3 = mysqli_real_escape_string($con, $row['cropc3']);
                              $sizec3 = mysqli_real_escape_string($con, $row['sizec3']);
                              $noofheadc3 = mysqli_real_escape_string($con, $row['noofheadc3']);
                              $farmtypec3 = mysqli_real_escape_string($con, $row['farmtypec3']);
                              $organicepractionerc3 = mysqli_real_escape_string($con, $row['organicepractionerc3']);
                              $remarksc3 = mysqli_real_escape_string($con, $row['remarksc3']);
                              $cropc4 = mysqli_real_escape_string($con, $row['cropc4']);
                              $sizec4 = mysqli_real_escape_string($con, $row['sizec4']);
                              $noofheadc4 = mysqli_real_escape_string($con, $row['noofheadc4']);
                              $farmtypec4 = mysqli_real_escape_string($con, $row['farmtypec4']);
                              $organicepractionerc4 = mysqli_real_escape_string($con, $row['organicepractionerc4']);
                              $remarksc4 = mysqli_real_escape_string($con, $row['remarksc4']);
                              $cropc5 = mysqli_real_escape_string($con, $row['cropc5']);
                              $sizec5 = mysqli_real_escape_string($con, $row['sizec5']);
                              $noofheadc5 = mysqli_real_escape_string($con, $row['noofheadc5']);
                              $farmtypec5 = mysqli_real_escape_string($con, $row['farmtypec5']);
                              $organicepractionerc5 = mysqli_real_escape_string($con, $row['organicepractionerc5']);
                              $remarksc5 = mysqli_real_escape_string($con, $row['remarksc5']);
                              $farmerId = mysqli_real_escape_string($con, $row['farmerId']);

                              $farmerimage = mysqli_real_escape_string($con, $row['uploadFile2x2']);
                            }
                        } else {
                        echo "0 results";
                        }
                        ?>
                        <fieldset disabled="disabled">
                          <?php
                            include "tablefarmer.php";
                          ?>
                        </fieldset>
    </div>
</body>
</html>