<?php
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Commodity</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";

       $tbl = "tbl_";
       $brgy = $_GET['barangay'];
       $brgyname = $tbl.$brgy;
       $farmerid = $_GET['farmerid'];
       include "config.php";
        $sql = "SELECT * FROM $brgyname WHERE `farmerId` = '$farmerid'";
        $result = mysqli_query($con, $sql);
                        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $fullname = $row["surname"]." ".$row["firstname"]." ".$row["middlename"];
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
                $organicepractionerb2 = mysqli_real_escape_string($con, $_POST['organicepractionerb2']);
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
                $sizec5 = mysqli_real_escape_string($con, $row['userlevel']);
                $noofheadc5 = mysqli_real_escape_string($con, $row['sizec5']);
                $farmtypec5 = mysqli_real_escape_string($con, $row['farmtypec5']);
                $organicepractionerc5 = mysqli_real_escape_string($con, $row['organicepractionerc5']);
                $remarksc5 = mysqli_real_escape_string($con, $row['remarksc5']);

            }
        }else{

        }

        if(isset($_POST["btnupdate"])) {

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
            $organicepractionerc3 = mysqli_real_escape_string($con, $row['organicepractionerc3']);
            $remarksc3 = mysqli_real_escape_string($con, $row['remarksc3']);
            $cropc4 = mysqli_real_escape_string($con, $_POST['cropc4']);
            $sizec4 = mysqli_real_escape_string($con, $_POST['sizec4']);
            $noofheadc4 = mysqli_real_escape_string($con, $_POST['noofheadc4']);
            $farmtypec4 = mysqli_real_escape_string($con, $_POST['farmtypec4']);
            $organicepractionerc4 = mysqli_real_escape_string($con, $_POST['organicepractionerc4']);
            $remarksc4 = mysqli_real_escape_string($con, $row['remarksc4']);
            $cropc5 = mysqli_real_escape_string($con, $_POST['cropc5']);
            $sizec5 = mysqli_real_escape_string($con, $_POST['userlevel']);
            $noofheadc5 = mysqli_real_escape_string($con, $_POST['sizec5']);
            $farmtypec5 = mysqli_real_escape_string($con, $_POST['farmtypec5']);
            $organicepractionerc5 = mysqli_real_escape_string($con, $_POST['organicepractionerc5']);
            $remarksc5 = mysqli_real_escape_string($con, $_POST['remarksc5']);

            $sqlupdate = "UPDATE `tbl_poblacion` SET `nooffarmparcels`='".$nooffarmparcels."',`p1`='".$p1."',`p2`='".$p2."',`p3`='".$p3."',`farmbarangay1`='".$farmbarangay1."',`farmcity1`='".$farmcity1."',`farmarea1`='".$farmarea1."',`ancestral1`='".$ancestral1."',`agrarlan1`='".$agrarlan1."',`idno1`='".$idno1."',`ownershiptype1`='".$ownershiptype1."',`ownershiptypename1`='".$ownershiptypename1."',`cropa1`='".$cropa1."',`sizea1`='".$sizea1."',`noofheada1`='".$noofheada1."',`farmtypea1`='".$farmtypea1."',`organicepractionera1`='".$organicepractionera1."',`remarksa1`='".$remarksa1."',`cropa2`='".$cropa2."',`sizea2`='".$sizea2."',`noofheada2`='".$noofheada2."',`farmtypea2`='".$farmtypea2."',`organicepractionera2`='".$organicepractionera2."',`remarksa2`='".$remarksa2."',`cropa3`='".$cropa3."',`sizea3`='".$sizea3."',`noofheada3`='".$noofheada3."',`farmtypea3`='".$farmtypea3."',`organicepractionera3`='".$organicepractionera3."',`remarksa3`='".$remarksa3."',`cropa4`='".$cropa3."',`sizea4`='".$sizea4."',`noofheada4`='".$noofheada4."',`farmtypea4`='".$farmtypea4."',`organicepractionera4`='".$organicepractionera4."',`remarksa4`='".$remarksa4."',`cropa5`='".$cropa5."',`sizea5`='".$sizea5."',`noofheada5`='".$noofheada5."',`farmtypea5`='".$farmtypea5."',`organicepractionera5`='".$organicepractionerb1."',`remarksa5`='".$remarksa5."',`farmbarangay2`='".$farmbarangay2."',`farmcity2`='".$farmcity2."',`farmarea2`='".$farmarea2."',`agrarlan2`='".$agrarlan2."',`idno2`='".$idno2."',`ownershiptype2`='".$ownershiptype2."',`ownershiptypename2`='".$ownershiptypename2."',`cropb1`='".$cropb1."',`sizeb1`='".$sizeb1."',`noofheadb1`='".$noofheadb1."',`farmtypeb1`='".$farmtypeb1."',`organicepractionerb1`='".$organicepractionerb1."',`remarksb1`='".$remarksb1."',`cropb2`='".$cropb2."',`sizeb2`='".$sizeb2."',`noofheadb2`='".$noofheadb2."',`farmtypeb2`='".$farmtypeb2."',`organicepractionerb2`='".$organicepractionerb2."',`remarksb2`='".$remarksb2."',`cropb3`='".$cropb3."',`sizeb3`='".$sizeb3."',`noofheadb3`='".$noofheadb3."',`farmtypeb3`='".$farmtypeb3."',`organicepractionerb3`='".$organicepractionerb3."',`remarksb3`='".$remarksb3."',`cropb4`='".$cropb4."',`sizeb4`='".$sizeb4."',`noofheadb4`='".$noofheadb4."',`farmtypeb4`='".$farmtypeb4."',`organicepractionerb4`='".$organicepractionerb4."',`remarksb4`='".$remarksb4."',`cropb5`='".$cropb5."',`sizeb5`='".$sizeb5."',`noofheadb5`='".$noofheadb5."',`farmtypeb5`='".$farmtypeb5."',`organicepractionerb5`='".$organicepractionerb5."',`remarksb5`='".$remarksb5."',`farmbarangay3`='".$farmbarangay3."',`farmcity3`='".$farmcity3."',`farmarea3`='".$farmarea3."',`ancestral3`='".$ancestral3."',`agrarlan3`='".$agrarlan3."',`idno3`='".$idno3."',`ownershiptype3`='".$ownershiptype3."',`ownershiptypename3`='".$ownershiptypename3."',`cropc1`='".$cropc1."',`sizec1`='".$sizec1."',`noofheadc1`='".$noofheadc1."',`farmtypec1`='".$farmtypec1."',`organicepractionerc1`='".$organicepractionerc1."',`remarksc1`='".$remarksc1."',`cropc2`='".$cropc2."',`sizec2`='".$sizec2."',`noofheadc2`='".$noofheadc2."',`farmtypec2`='".$farmtypec2."',`organicepractionerc2`='".$organicepractionerc2."',`remarksc2`='".$remarksc2."',`cropc3`='".$cropc3."',`sizec3`='".$sizec3."',`noofheadc3`='".$noofheadc3."',`farmtypec3`='".$farmtypec3."',`organicepractionerc3`='".$organicepractionerc3."',`remarksc3`='".$remarksc3."',`cropc4`='".$cropc4."',`sizec4`='".$sizec4."',`noofheadc4`='".$noofheadc4."',`farmtypec4`='".$farmtypec4."',`organicepractionerc4`='".$organicepractionerc4."',`remarksc4`='".$remarksc4."',`cropc5`='".$cropc5."',`sizec5`='".$sizec5."',`noofheadc5`='".$noofheadc5."',`farmtypec5`='".$farmtypec5."',`organicepractionerc5`='".$organicepractionerc5."',`remarksc5`='".$remarksc5."' WHERE `farmerId` = '".$farmerid."'";
            if (mysqli_query($con, $sqlupdate)) {
                echo "
                    <script>
                    Swal.fire({
                        title: 'Account updated successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function(){
                        window.location.href = window.location.href;
                    })
                    </script>
                ";
            }else{
                echo "Error updating record: " . mysqli_error($con);
            }
            mysqli_close($con);
        }
    ?>
    <div class="container w-full ml-0 pb-12  md:ml-60  md:w-4/5">
        <div class="table_container p-14 gap-5 flex flex-col">
            <h2 class="text-2xl font-bold">Commodity for <?php echo $fullname; ?> </h2>
                <form action="" method="post">
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">No. of Farm Parcels:</label>
                            <input type="number" class="form-input w-full" name="nooffarmparcels" placeholder="No. of farm parcels" value="<?php echo $nooffarmparcels; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Name of Farmer/s in Rotation(P1)</label>
                            <input type="text" class="form-input w-full" name="p1" placeholder="P1" value="<?php echo $p1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Name of Farmer/s in Rotation(P2)</label>
                            <input type="text" class="form-input w-full" name="p2" placeholder="P2" value="<?php echo $p2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Name of Farmer/s in Rotation(P3)</label>
                            <input type="text" class="form-input w-full" name="p3" placeholder="P3" value="<?php echo $p3; ?>">
                        </div>
                    </div>
                    <label for="" class="text-lg font-bold">Farm Parcel No. 1</label>
                    <p class="text-lg">Farm Location</p>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Barangay</label>
                            <input type="text" class="form-input w-full" name="farmbarangay1" placeholder="Farm Barangay"  value="<?php echo $farmbarangay1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">City/Municipality</label>
                            <input type="text" class="form-input w-full" name="farmcity1" placeholder="Farm City/Municipality"  value="<?php echo $farmcity1; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Total Farm Area (In hectares)</label>
                            <input type="number" class="form-input w-full" name="farmarea1" placeholder="Total Farm Area (In hectares)"  value="<?php echo $farmarea1; ?>">
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
                            <input type="number" class="form-input w-full" name="idno1" placeholder="Ownership Document Number" value="<?php echo $idno1; ?>">
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
                                <input type="text" class="form-input w-full" name="ownershiptypename1" placeholder=""  value="<?php echo $ownershiptypename1; ?>">
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Crop/Commodity | For Livestock & Poultry</label>
                            <input type="text" class="form-input w-full" name="cropa1" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropa1; ?>" >
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Size (ha)</label>
                            <input type="text" class="form-input w-full" name="sizea1" placeholder="Size (ha)" value="<?php echo $sizea1; ?>" >
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">No. of head</label>
                            <input type="text" class="form-input w-full" name="noofheada1" placeholder="Number of head (for livestock property)" value="<?php echo $noofheada1; ?>" >
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Farm Type</label>
                            <input type="text" class="form-input w-full" name="farmtypea1" placeholder="Farm Type" value="<?php echo $farmtypea1; ?>" >
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Ogranic Practioner</label>
                            <input type="text" class="form-input w-full" name="organicepractionera1" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionera1; ?>" >
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Remarks</label>
                            <input type="text" class="form-input w-full" name="remarksa1" placeholder="Remarks" value="<?php echo $remarksa1; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropa2" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropa2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizea2" placeholder="Size (ha)" value="<?php echo $sizea2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheada2" placeholder="Number of head (for livestock property)" value="<?php echo $noofheada2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypea2" placeholder="Farm Type" value="<?php echo $farmtypea2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionera2" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionera2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksa2" placeholder="Remarks" value="<?php echo $remarksa2; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropa3" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropa3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizea3" placeholder="Size (ha)" value="<?php echo $sizea3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheada3" placeholder="Number of head (for livestock property)" value="<?php echo $noofheada3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypea3" placeholder="Farm Type" value="<?php echo $farmtypea3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionera3" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionera3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksa3" placeholder="Remarks" value="<?php echo $remarksa3; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropa4" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropa4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizea4" placeholder="Size (ha)" value="<?php echo $sizea4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheada4" placeholder="Number of head (for livestock property)" value="<?php echo $noofheada4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypea4" placeholder="Farm Type" value="<?php echo $farmtypea4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionera4" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionera4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksa4" placeholder="Remarks" value="<?php echo $remarksa4; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropa5" placeholder="Crop/Commodity | For Livestock & Poultry"  value="<?php echo $cropa5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizea5" placeholder="Size (ha)"  value="<?php echo $sizea5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheada5" placeholder="Number of head (for livestock property)"  value="<?php echo $noofheada5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypea5" placeholder="Farm Type"  value="<?php echo $farmtypea5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionera5" placeholder="Ogranic Practioner(Y/N)"  value="<?php echo $organicepractionera5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksa5" placeholder="Remarks"  value="<?php echo $remarksa5; ?>">
                        </div>
                    </div>
                    <label for="" class="text-lg font-bold">Farm Parcel No. 2</label>
                    <p class="text-lg">Farm Location</p>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Barangay</label>
                            <input type="text" class="form-input w-full" name="farmbarangay2" placeholder="Farm Barangay" value="<?php echo $farmbarangay2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">City/Municipality</label>
                            <input type="text" class="form-input w-full" name="farmcity2" placeholder="Farm City/Municipality" value="<?php echo $farmcity2; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Total Farm Area (In hectares)</label>
                            <input type="number" class="form-input w-full" name="farmarea2" placeholder="Total Farm Area (In hectares)" value="<?php echo $farmarea2; ?>">
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
                            <input type="number" class="form-input w-full" name="idno2" placeholder="Ownership Document Number" value="<?php echo $idno2; ?>">
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
                                <input type="text" class="form-input w-full" name="ownershiptypename2" placeholder="" value="<?php echo $ownershiptypename2; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Crop/Commodity | For Livestock & Poultry</label>
                            <input type="text" class="form-input w-full" name="cropb1" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropb1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Size (ha)</label>
                            <input type="text" class="form-input w-full" name="sizeb1" placeholder="Size (ha)" value="<?php echo $sizeb1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">No. of head</label>
                            <input type="text" class="form-input w-full" name="noofheadb1" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadb1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Farm Type</label>
                            <input type="text" class="form-input w-full" name="farmtypeb1" placeholder="Farm Type" value="<?php echo $farmtypeb1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Ogranic Practioner</label>
                            <input type="text" class="form-input w-full" name="organicepractionerb1" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerb1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Remarks</label>
                            <input type="text" class="form-input w-full" name="remarksb1" placeholder="Remarks" value="<?php echo $remarksb1; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropb2" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropb2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizeb2" placeholder="Size (ha)" value="<?php echo $sizeb2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadb2" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadb2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypeb2" placeholder="Farm Type" value="<?php echo $farmtypeb2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerb2" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerb2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksb2" placeholder="Remarks" value="<?php echo $remarksb2; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropb3" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropb3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizeb3" placeholder="Size (ha)" value="<?php echo $sizeb3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadb3" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadb3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypeb3" placeholder="Farm Type" value="<?php echo $farmtypeb3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerb3" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerb3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksb3" placeholder="Remarks" value="<?php echo $remarksb3; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropb4" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropb4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizeb4" placeholder="Size (ha)" value="<?php echo $sizeb4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadb4" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadb4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypeb4" placeholder="Farm Type" value="<?php echo $farmtypeb4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerb4" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerb4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksb4" placeholder="Remarks" value="<?php echo $remarksb4; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropb5" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropb5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizeb5" placeholder="Size (ha)" value="<?php echo $sizeb5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadb5" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadb5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypeb5" placeholder="Farm Type" value="<?php echo $farmtypeb5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerb5" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerb5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksb5" placeholder="Remarks" value="<?php echo $remarksb5; ?>">
                        </div>
                    </div>
                    <label for="" class="text-lg font-bold">Farm Parcel No. 3</label>
                    <p class="text-lg">Farm Location</p>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Barangay</label>
                            <input type="text" class="form-input w-full" name="farmbarangay3" placeholder="Farm Barangay" value="<?php echo $farmbarangay3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">City/Municipality</label>
                            <input type="text" class="form-input w-full" name="farmcity3" placeholder="Farm City/Municipality" value="<?php echo $farmcity3; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="flex flex-col gap-2 w-full p-2">
                            <label for="">Total Farm Area (In hectares)</label>
                            <input type="number" class="form-input w-full" name="farmarea3" placeholder="Total Farm Area (In hectares)" value="<?php echo $farmarea3; ?>">
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
                            <input type="number" class="form-input w-full" name="idno3" placeholder="Ownership Document Number" value="<?php echo $idno3; ?>">
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
                                <input type="text" class="form-input w-full" name="ownershiptypename3" placeholder="" value="<?php echo $ownershiptypename3; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Crop/Commodity | For Livestock & Poultry</label>
                            <input type="text" class="form-input w-full" name="cropc1" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropc1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Size (ha)</label>
                            <input type="text" class="form-input w-full" name="sizec1" placeholder="Size (ha)" value="<?php echo $sizec1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">No. of head</label>
                            <input type="text" class="form-input w-full" name="noofheadc1" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadc1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Farm Type</label>
                            <input type="text" class="form-input w-full" name="farmtypec1" placeholder="Farm Type" value="<?php echo $farmtypec1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Ogranic Practioner</label>
                            <input type="text" class="form-input w-full" name="organicepractionerc1" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerc1; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <label for="">Remarks</label>
                            <input type="text" class="form-input w-full" name="remarksc1" placeholder="Remarks" value="<?php echo $remarksc1; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropc2" placeholder="Crop/Commodity | For Livestock & Poultry"  value="<?php echo $cropc2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizec2" placeholder="Size (ha)"  value="<?php echo $sizec2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadc2" placeholder="Number of head (for livestock property)"  value="<?php echo $noofheadc2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypec2" placeholder="Farm Type"  value="<?php echo $farmtypec2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerc2" placeholder="Ogranic Practioner(Y/N)"  value="<?php echo $organicepractionerc2; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksc2" placeholder="Remarks"  value="<?php echo $remarksc2; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropc3" placeholder="Crop/Commodity | For Livestock & Poultry"  value="<?php echo $cropc3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizec3" placeholder="Size (ha)"  value="<?php echo $sizec3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadc3" placeholder="Number of head (for livestock property)"  value="<?php echo $noofheadc3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypec3" placeholder="Farm Type"  value="<?php echo $farmtypec3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerc3" placeholder="Ogranic Practioner(Y/N)"  value="<?php echo $organicepractionerc3; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksc3" placeholder="Remarks"  value="<?php echo $remarksc3; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropc4" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropc4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizec4" placeholder="Size (ha)" value="<?php echo $sizec4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadc4" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadc4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypec4" placeholder="Farm Type" value="<?php echo $farmtypec4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerc4" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerc4; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksc4" placeholder="Remarks" value="<?php echo $remarksc4; ?>">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full h-full">
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="cropc5" placeholder="Crop/Commodity | For Livestock & Poultry" value="<?php echo $cropc5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="sizec5" placeholder="Size (ha)" value="<?php echo $sizec5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="noofheadc5" placeholder="Number of head (for livestock property)" value="<?php echo $noofheadc5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="farmtypec5" placeholder="Farm Type" value="<?php echo $farmtypec5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="organicepractionerc5" placeholder="Ogranic Practioner(Y/N)" value="<?php echo $organicepractionerc5; ?>">
                        </div>
                        <div class="flex flex-col gap-2 w-full p-2 justify-end">
                            <input type="text" class="form-input w-full" name="remarksc5" placeholder="Remarks" value="<?php echo $remarksc5; ?>">
                        </div>
                    </div>
                    <div class="flex flex-row gap-5 pt-5">
                        <a href="javascript:history.go(-1)" class="btn-secondary" value="Back">Back</a>
                        <button class="btn-primary" type="submit" name="btnupdate">Update</button>
                    </div>
                </form>
            
        </div>
        <?php
            include "footer.php";
        ?>
    </div>  
    <script>
        $(document).ready( function () {
            $('#master_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true
                }
            );
        } );

        var table = document.getElementById('master_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("master_id").value = this.cells[0].innerHTML;
                document.getElementById("master_id_two").value = this.cells[0].innerHTML;
                document.getElementById("master_farmid").value = this.cells[1].innerHTML;
                document.getElementById("master_farmid_two").value = this.cells[1].innerHTML;
                document.getElementById("master_name").value = this.cells[2].innerHTML;
                document.getElementById("master_name_two").value = this.cells[2].innerHTML;
                document.getElementById("master_barangay").value = this.cells[3].innerHTML;
                document.getElementById("master_barangay_two").value = this.cells[3].innerHTML;
                document.getElementById("master_crop").value = this.cells[4].innerHTML;
                document.getElementById("master_crop_two").value = this.cells[4].innerHTML;
                document.getElementById("master_size").value = this.cells[5].innerHTML;
                document.getElementById("master_size_two").value = this.cells[5].innerHTML;
                document.getElementById("master_amount").value = this.cells[6].innerHTML;
                document.getElementById("master_amount_two").value = this.cells[6].innerHTML;
                document.getElementById("master_status").value = this.cells[7].innerHTML;
                document.getElementById("master_status_two").value = this.cells[7].innerHTML;

            };

        }   
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    
    <script>
        //Master - Received
        $("#reg_confirm_pass_pending").blur(function() {
            var user_pass_pending = $("#reg_pass_pending").val();
            var user_pass2_pending = $("#reg_confirm_pass_pending").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_pending").css("background","blue");
                $("#btn_pending").prop('disabled',false)//use prop()
            } else {
                $("#btn_pending").css("background","gray");
                $("#btn_pending").prop('disabled',true)//use prop()
            }

        });
       
    </script>
</body>
</html>


