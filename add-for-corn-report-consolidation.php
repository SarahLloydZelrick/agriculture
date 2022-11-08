<?php
ini_set('display_errors', 1);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
if($_GET["type"] == "view"){
    header("Location: for-corn-report-consolidation.php?dateto=".$_GET['dateto']."&datefrom=".$_GET['datefrom']."");
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
    <title>Add Corn Report Consolidation</title>

</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:10px;
        /*background-color:#d7d8d9;*/
    }
    .wbrgy{
        width:150px;
    }
    
</style>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
        include "config.php";

        $reporttype = "CornConsolidation";
        $todate = $_GET['dateto'];
        $fromdate = $_GET['datefrom'];

        if (isset($_POST['btnsave'] )) {

            $barangay1 = $_POST['barangay1'];
            $variety1 = $_POST['variety'];
            $nooffarmer1 = $_POST['nooffarmer1'];
            $areaplanted1 = $_POST['areaplanted1'];
            $areaharvested1 = $_POST['areaharvested1'];
            $production1 = $_POST['production1'];
            $stagesofcrop1 = $_POST['stagesofcrop1'];

            $barangay2 = $_POST['barangay2'];
            $variety2 = $_POST['variety'];
            $nooffarmer2 = $_POST['nooffarmer2'];
            $areaplanted2 = $_POST['areaplanted2'];
            $areaharvested2 = $_POST['areaharvested2'];
            $production2 = $_POST['production2'];
            $stagesofcrop2 = $_POST['stagesofcrop2'];

            $barangay3 = $_POST['barangay3'];
            $variety3 = $_POST['variety'];
            $nooffarmer3 = $_POST['nooffarmer3'];
            $areaplanted3 = $_POST['areaplanted3'];
            $areaharvested3 = $_POST['areaharvested3'];
            $production3 = $_POST['production3'];
            $stagesofcrop3 = $_POST['stagesofcrop3'];

            $barangay4 = $_POST['barangay4'];
            $variety4 = $_POST['variety'];
            $nooffarmer4 = $_POST['nooffarmer4'];
            $areaplanted4 = $_POST['areaplanted4'];
            $areaharvested4 = $_POST['areaharvested4'];
            $production4 = $_POST['production4'];
            $stagesofcrop4 = $_POST['stagesofcrop4'];

            $barangay5 = $_POST['barangay5'];
            $variety5 = $_POST['variety'];
            $nooffarmer5 = $_POST['nooffarmer5'];
            $areaplanted5 = $_POST['areaplanted5'];
            $areaharvested5 = $_POST['areaharvested5'];
            $production5 = $_POST['production5'];
            $stagesofcrop5 = $_POST['stagesofcrop5'];

            $barangay6 = $_POST['barangay6'];
            $variety6 = $_POST['variety'];
            $nooffarmer6 = $_POST['nooffarmer6'];
            $areaplanted6 = $_POST['areaplanted6'];
            $areaharvested6 = $_POST['areaharvested6'];
            $production6 = $_POST['production6'];
            $stagesofcrop6 = $_POST['stagesofcrop6'];

            $barangay7 = $_POST['barangay7'];
            $variety7 = $_POST['variety'];
            $nooffarmer7 = $_POST['nooffarmer7'];
            $areaplanted7 = $_POST['areaplanted7'];
            $areaharvested7 = $_POST['areaharvested7'];
            $production7 = $_POST['production7'];
            $stagesofcrop7 = $_POST['stagesofcrop7'];

            $barangay8 = $_POST['barangay8'];
            $variety8 = $_POST['variety'];
            $nooffarmer8 = $_POST['nooffarmer8'];
            $areaplanted8 = $_POST['areaplanted8'];
            $areaharvested8 = $_POST['areaharvested8'];
            $production8 = $_POST['production8'];
            $stagesofcrop8 = $_POST['stagesofcrop8'];

            $barangay9 = $_POST['barangay9'];
            $variety9 = $_POST['variety'];
            $nooffarmer9 = $_POST['nooffarmer9'];
            $areaplanted9 = $_POST['areaplanted9'];
            $areaharvested9 = $_POST['areaharvested9'];
            $production9 = $_POST['production9'];
            $stagesofcrop9 = $_POST['stagesofcrop9'];

            $barangay10 = $_POST['barangay10'];
            $variety10 = $_POST['variety'];
            $nooffarmer10 = $_POST['nooffarmer10'];
            $areaplanted10 = $_POST['areaplanted10'];
            $areaharvested10 = $_POST['areaharvested10'];
            $production10 = $_POST['production10'];
            $stagesofcrop10 = $_POST['stagesofcrop10'];

            $barangay11 = $_POST['barangay11'];
            $variety11 = $_POST['variety'];
            $nooffarmer11 = $_POST['nooffarmer11'];
            $areaplanted11 = $_POST['areaplanted11'];
            $areaharvested11 = $_POST['areaharvested11'];
            $production11 = $_POST['production11'];
            $stagesofcrop11 = $_POST['stagesofcrop11'];

            $barangay12 = $_POST['barangay12'];
            $variety12 = $_POST['variety'];
            $nooffarmer12 = $_POST['nooffarmer12'];
            $areaplanted12 = $_POST['areaplanted12'];
            $areaharvested12 = $_POST['areaharvested12'];
            $production12 = $_POST['production12'];
            $stagesofcrop12 = $_POST['stagesofcrop12'];

            $barangay13 = $_POST['barangay13'];
            $variety13 = $_POST['variety'];
            $nooffarmer13 = $_POST['nooffarmer13'];
            $areaplanted13 = $_POST['areaplanted13'];
            $areaharvested13 = $_POST['areaharvested13'];
            $production13 = $_POST['production13'];
            $stagesofcrop13 = $_POST['stagesofcrop13']; 

            $barangay14 = $_POST['barangay14'];
            $variety14 = $_POST['variety'];
            $nooffarmer14 = $_POST['nooffarmer14'];
            $areaplanted14 = $_POST['areaplanted14'];
            $areaharvested14 = $_POST['areaharvested14'];
            $production14 = $_POST['production14'];
            $stagesofcrop14 = $_POST['stagesofcrop14'];

            $barangay15 = $_POST['barangay15'];
            $variety15 = $_POST['variety'];
            $nooffarmer15 = $_POST['nooffarmer15'];
            $areaplanted15 = $_POST['areaplanted15'];
            $areaharvested15 = $_POST['areaharvested15'];
            $production15 = $_POST['production15'];
            $stagesofcrop15 = $_POST['stagesofcrop15'];

            $barangay16 = $_POST['barangay16'];
            $variety16 = $_POST['variety'];
            $nooffarmer16 = $_POST['nooffarmer16'];
            $areaplanted16 = $_POST['areaplanted16'];
            $areaharvested16 = $_POST['areaharvested16'];
            $production16 = $_POST['production16'];
            $stagesofcrop16 = $_POST['stagesofcrop16'];

            $barangay17 = $_POST['barangay17'];
            $variety17 = $_POST['variety'];
            $nooffarmer17 = $_POST['nooffarmer17'];
            $areaplanted17 = $_POST['areaplanted17'];
            $areaharvested17 = $_POST['areaharvested17'];
            $production17 = $_POST['production17'];
            $stagesofcrop17 = $_POST['stagesofcrop17'];

            $barangay18 = $_POST['barangay18'];
            $variety18 = $_POST['variety'];
            $nooffarmer18 = $_POST['nooffarmer18'];
            $areaplanted18 = $_POST['areaplanted18'];
            $areaharvested18 = $_POST['areaharvested18'];
            $production18 = $_POST['production18'];
            $stagesofcrop18 = $_POST['stagesofcrop18'];

            $barangay19 = $_POST['barangay19'];
            $variety19 = $_POST['variety'];
            $nooffarmer19 = $_POST['nooffarmer19'];
            $areaplanted19 = $_POST['areaplanted19'];
            $areaharvested19 = $_POST['areaharvested19'];
            $production19 = $_POST['production19'];
            $stagesofcrop19 = $_POST['stagesofcrop19'];

            $barangay20 = $_POST['barangay20'];
            $variety20 = $_POST['variety'];
            $nooffarmer20 = $_POST['nooffarmer20'];
            $areaplanted20 = $_POST['areaplanted20'];
            $areaharvested20 = $_POST['areaharvested20'];
            $production20 = $_POST['production20'];
            $stagesofcrop20 = $_POST['stagesofcrop20'];

            $barangay21 = $_POST['barangay21'];
            $variety21 = $_POST['variety'];
            $nooffarmer21 = $_POST['nooffarmer21'];
            $areaplanted21 = $_POST['areaplanted21'];
            $areaharvested21 = $_POST['areaharvested21'];
            $production21 = $_POST['production21'];
            $stagesofcrop21 = $_POST['stagesofcrop21'];
            
            $barangay22 = $_POST['barangay22'];
            $variety22 = $_POST['variety'];
            $nooffarmer22 = $_POST['nooffarmer22'];
            $areaplanted22 = $_POST['areaplanted22'];
            $areaharvested22 = $_POST['areaharvested22'];
            $production22 = $_POST['production22'];
            $stagesofcrop22 = $_POST['stagesofcrop22'];

            $barangay23 = $_POST['barangay23'];
            $variety23 = $_POST['variety'];
            $nooffarmer23 = $_POST['nooffarmer23'];
            $areaplanted23 = $_POST['areaplanted23'];
            $areaharvested23 = $_POST['areaharvested23'];
            $production23 = $_POST['production23'];
            $stagesofcrop23 = $_POST['stagesofcrop23'];

            $barangay24 = $_POST['barangay24'];
            $variety24 = $_POST['variety'];
            $nooffarmer24 = $_POST['nooffarmer24'];
            $areaplanted24 = $_POST['areaplanted24'];
            $areaharvested24 = $_POST['areaharvested24'];
            $production24 = $_POST['production24'];
            $stagesofcrop24 = $_POST['stagesofcrop24'];

            $barangay25 = $_POST['barangay25'];
            $variety25 = $_POST['variety'];
            $nooffarmer25 = $_POST['nooffarmer25'];
            $areaplanted25 = $_POST['areaplanted25'];
            $areaharvested25 = $_POST['areaharvested25'];
            $production25 = $_POST['production25'];
            $stagesofcrop25 = $_POST['stagesofcrop25'];

            if($nooffarmer1 != "" || $nooffarmer1 != "0")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow1a."','".$hybridyellow1b."','".$hybridyellow1c."','".$hybridwhite1a."','".$hybridwhite1b."','".$hybridwhite1c."','".$hybridcombine1a."','".$hybridcombine1b."','".$hybridcombine1c."','".$opvyellow1a."','".$opvyellow1b."','".$opvyellow1c."','".$opvwhite1a."','".$opvwhite1b."',,'".$opvwhite1c."','".$opvcombine1a."','".$opvcombine1b."','".$opvcombine1c."','".$grandyellow1a."','".$grandyellow1b."','".$grandyellow1c."','".$grandwhite1a."','".$grandwhite1b."','".$grandwhite1c."','".$grandtotal1a."','".$grandtotal1b."','".$grandtotal1c."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer2 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow2a."','".$hybridyellow2b."','".$hybridyellow2c."','".$hybridwhite2a."','".$hybridwhite2b."','".$hybridwhite2c."','".$hybridcombine2a."','".$hybridcombine2b."','".$hybridcombine2c."','".$opvyellow2a."','".$opvyellow2b."','".$opvyellow2c."','".$opvwhite2a."','".$opvwhite2b."',,'".$opvwhite2c."','".$opvcombine2a."','".$opvcombine2b."','".$opvcombine2c."','".$grandyellow2a."','".$grandyellow2b."','".$grandyellow2c."','".$grandwhite2a."','".$grandwhite2b."','".$grandwhite2c."','".$grandtotal2a."','".$grandtotal2b."','".$grandtotal2c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer3 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow3a."','".$hybridyellow3b."','".$hybridyellow3c."','".$hybridwhite3a."','".$hybridwhite3b."','".$hybridwhite3c."','".$hybridcombine3a."','".$hybridcombine3b."','".$hybridcombine3c."','".$opvyellow3a."','".$opvyellow3b."','".$opvyellow3c."','".$opvwhite3a."','".$opvwhite3b."',,'".$opvwhite3c."','".$opvcombine3a."','".$opvcombine3b."','".$opvcombine3c."','".$grandyellow3a."','".$grandyellow3b."','".$grandyellow3c."','".$grandwhite3a."','".$grandwhite3b."','".$grandwhite3c."','".$grandtotal3a."','".$grandtotal3b."','".$grandtotal3c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer4 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow4a."','".$hybridyellow4b."','".$hybridyellow4c."','".$hybridwhite4a."','".$hybridwhite4b."','".$hybridwhite4c."','".$hybridcombine4a."','".$hybridcombine4b."','".$hybridcombine4c."','".$opvyellow4a."','".$opvyellow4b."','".$opvyellow4c."','".$opvwhite4a."','".$opvwhite4b."',,'".$opvwhite4c."','".$opvcombine4a."','".$opvcombine4b."','".$opvcombine4c."','".$grandyellow4a."','".$grandyellow4b."','".$grandyellow4c."','".$grandwhite4a."','".$grandwhite4b."','".$grandwhite4c."','".$grandtotal4a."','".$grandtotal4b."','".$grandtotal4c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer5 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow5a."','".$hybridyellow5b."','".$hybridyellow5c."','".$hybridwhite5a."','".$hybridwhite5b."','".$hybridwhite5c."','".$hybridcombine5a."','".$hybridcombine5b."','".$hybridcombine5c."','".$opvyellow5a."','".$opvyellow5b."','".$opvyellow5c."','".$opvwhite5a."','".$opvwhite5b."',,'".$opvwhite5c."','".$opvcombine5a."','".$opvcombine5b."','".$opvcombine5c."','".$grandyellow5a."','".$grandyellow5b."','".$grandyellow5c."','".$grandwhite5a."','".$grandwhite5b."','".$grandwhite5c."','".$grandtotal5a."','".$grandtotal5b."','".$grandtotal5c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer6 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow6a."','".$hybridyellow6b."','".$hybridyellow6c."','".$hybridwhite6a."','".$hybridwhite6b."','".$hybridwhite6c."','".$hybridcombine6a."','".$hybridcombine6b."','".$hybridcombine6c."','".$opvyellow6a."','".$opvyellow6b."','".$opvyellow6c."','".$opvwhite6a."','".$opvwhite6b."',,'".$opvwhite6c."','".$opvcombine6a."','".$opvcombine6b."','".$opvcombine6c."','".$grandyellow6a."','".$grandyellow6b."','".$grandyellow6c."','".$grandwhite6a."','".$grandwhite6b."','".$grandwhite6c."','".$grandtotal6a."','".$grandtotal6b."','".$grandtotal6c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer7 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow7a."','".$hybridyellow7b."','".$hybridyellow7c."','".$hybridwhite7a."','".$hybridwhite7b."','".$hybridwhite7c."','".$hybridcombine7a."','".$hybridcombine7b."','".$hybridcombine7c."','".$opvyellow7a."','".$opvyellow7b."','".$opvyellow7c."','".$opvwhite7a."','".$opvwhite7b."',,'".$opvwhite7c."','".$opvcombine7a."','".$opvcombine7b."','".$opvcombine7c."','".$grandyellow7a."','".$grandyellow7b."','".$grandyellow7c."','".$grandwhite7a."','".$grandwhite7b."','".$grandwhite7c."','".$grandtotal7a."','".$grandtotal7b."','".$grandtotal7c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer8 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow8a."','".$hybridyellow8b."','".$hybridyellow8c."','".$hybridwhite8a."','".$hybridwhite8b."','".$hybridwhite8c."','".$hybridcombine8a."','".$hybridcombine8b."','".$hybridcombine8c."','".$opvyellow8a."','".$opvyellow8b."','".$opvyellow8c."','".$opvwhite8a."','".$opvwhite8b."',,'".$opvwhite8c."','".$opvcombine8a."','".$opvcombine8b."','".$opvcombine8c."','".$grandyellow8a."','".$grandyellow8b."','".$grandyellow8c."','".$grandwhite8a."','".$grandwhite8b."','".$grandwhite8c."','".$grandtotal8a."','".$grandtotal8b."','".$grandtotal8c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer9 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow9a."','".$hybridyellow9b."','".$hybridyellow9c."','".$hybridwhite9a."','".$hybridwhite9b."','".$hybridwhite9c."','".$hybridcombine9a."','".$hybridcombine9b."','".$hybridcombine9c."','".$opvyellow9a."','".$opvyellow9b."','".$opvyellow9c."','".$opvwhite9a."','".$opvwhite9b."',,'".$opvwhite9c."','".$opvcombine9a."','".$opvcombine9b."','".$opvcombine9c."','".$grandyellow9a."','".$grandyellow9b."','".$grandyellow9c."','".$grandwhite9a."','".$grandwhite9b."','".$grandwhite9c."','".$grandtotal9a."','".$grandtotal9b."','".$grandtotal9c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer10 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow10a."','".$hybridyellow10b."','".$hybridyellow10c."','".$hybridwhite10a."','".$hybridwhite10b."','".$hybridwhite10c."','".$hybridcombine10a."','".$hybridcombine10b."','".$hybridcombine10c."','".$opvyellow10a."','".$opvyellow10b."','".$opvyellow10c."','".$opvwhite10a."','".$opvwhite10b."',,'".$opvwhite10c."','".$opvcombine10a."','".$opvcombine10b."','".$opvcombine10c."','".$grandyellow10a."','".$grandyellow10b."','".$grandyellow10c."','".$grandwhite10a."','".$grandwhite10b."','".$grandwhite10c."','".$grandtotal10a."','".$grandtotal10b."','".$grandtotal10c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer11 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow11a."','".$hybridyellow11b."','".$hybridyellow11c."','".$hybridwhite11a."','".$hybridwhite11b."','".$hybridwhite11c."','".$hybridcombine11a."','".$hybridcombine11b."','".$hybridcombine11c."','".$opvyellow11a."','".$opvyellow11b."','".$opvyellow11c."','".$opvwhite11a."','".$opvwhite11b."',,'".$opvwhite11c."','".$opvcombine11a."','".$opvcombine11b."','".$opvcombine11c."','".$grandyellow11a."','".$grandyellow11b."','".$grandyellow11c."','".$grandwhite11a."','".$grandwhite11b."','".$grandwhite11c."','".$grandtotal11a."','".$grandtotal11b."','".$grandtotal11c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer12 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow12a."','".$hybridyellow12b."','".$hybridyellow12c."','".$hybridwhite12a."','".$hybridwhite12b."','".$hybridwhite12c."','".$hybridcombine12a."','".$hybridcombine12b."','".$hybridcombine12c."','".$opvyellow12a."','".$opvyellow12b."','".$opvyellow12c."','".$opvwhite12a."','".$opvwhite12b."',,'".$opvwhite12c."','".$opvcombine12a."','".$opvcombine12b."','".$opvcombine12c."','".$grandyellow12a."','".$grandyellow12b."','".$grandyellow12c."','".$grandwhite12a."','".$grandwhite12b."','".$grandwhite12c."','".$grandtotal12a."','".$grandtotal12b."','".$grandtotal12c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer13 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow13a."','".$hybridyellow13b."','".$hybridyellow13c."','".$hybridwhite13a."','".$hybridwhite13b."','".$hybridwhite13c."','".$hybridcombine13a."','".$hybridcombine13b."','".$hybridcombine13c."','".$opvyellow13a."','".$opvyellow13b."','".$opvyellow13c."','".$opvwhite13a."','".$opvwhite13b."',,'".$opvwhite13c."','".$opvcombine13a."','".$opvcombine13b."','".$opvcombine13c."','".$grandyellow13a."','".$grandyellow13b."','".$grandyellow13c."','".$grandwhite13a."','".$grandwhite13b."','".$grandwhite13c."','".$grandtotal13a."','".$grandtotal13b."','".$grandtotal13c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer14 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow14a."','".$hybridyellow14b."','".$hybridyellow14c."','".$hybridwhite14a."','".$hybridwhite14b."','".$hybridwhite14c."','".$hybridcombine14a."','".$hybridcombine14b."','".$hybridcombine14c."','".$opvyellow14a."','".$opvyellow14b."','".$opvyellow14c."','".$opvwhite14a."','".$opvwhite14b."',,'".$opvwhite14c."','".$opvcombine14a."','".$opvcombine14b."','".$opvcombine14c."','".$grandyellow14a."','".$grandyellow14b."','".$grandyellow14c."','".$grandwhite14a."','".$grandwhite14b."','".$grandwhite14c."','".$grandtotal14a."','".$grandtotal14b."','".$grandtotal14c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer15 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow15a."','".$hybridyellow15b."','".$hybridyellow15c."','".$hybridwhite15a."','".$hybridwhite15b."','".$hybridwhite15c."','".$hybridcombine15a."','".$hybridcombine15b."','".$hybridcombine15c."','".$opvyellow15a."','".$opvyellow15b."','".$opvyellow15c."','".$opvwhite15a."','".$opvwhite15b."',,'".$opvwhite15c."','".$opvcombine15a."','".$opvcombine15b."','".$opvcombine15c."','".$grandyellow15a."','".$grandyellow15b."','".$grandyellow15c."','".$grandwhite15a."','".$grandwhite15b."','".$grandwhite15c."','".$grandtotal15a."','".$grandtotal15b."','".$grandtotal15c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer16 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow16a."','".$hybridyellow16b."','".$hybridyellow16c."','".$hybridwhite16a."','".$hybridwhite16b."','".$hybridwhite16c."','".$hybridcombine16a."','".$hybridcombine16b."','".$hybridcombine16c."','".$opvyellow16a."','".$opvyellow16b."','".$opvyellow16c."','".$opvwhite16a."','".$opvwhite16b."',,'".$opvwhite16c."','".$opvcombine16a."','".$opvcombine16b."','".$opvcombine16c."','".$grandyellow16a."','".$grandyellow16b."','".$grandyellow16c."','".$grandwhite16a."','".$grandwhite16b."','".$grandwhite16c."','".$grandtotal16a."','".$grandtotal16b."','".$grandtotal16c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer17 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow17a."','".$hybridyellow17b."','".$hybridyellow17c."','".$hybridwhite17a."','".$hybridwhite17b."','".$hybridwhite17c."','".$hybridcombine17a."','".$hybridcombine17b."','".$hybridcombine17c."','".$opvyellow17a."','".$opvyellow17b."','".$opvyellow17c."','".$opvwhite17a."','".$opvwhite17b."',,'".$opvwhite17c."','".$opvcombine17a."','".$opvcombine17b."','".$opvcombine17c."','".$grandyellow17a."','".$grandyellow17b."','".$grandyellow17c."','".$grandwhite17a."','".$grandwhite17b."','".$grandwhite17c."','".$grandtotal17a."','".$grandtotal17b."','".$grandtotal17c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer18 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow18a."','".$hybridyellow18b."','".$hybridyellow18c."','".$hybridwhite18a."','".$hybridwhite18b."','".$hybridwhite18c."','".$hybridcombine18a."','".$hybridcombine18b."','".$hybridcombine18c."','".$opvyellow18a."','".$opvyellow18b."','".$opvyellow18c."','".$opvwhite18a."','".$opvwhite18b."',,'".$opvwhite18c."','".$opvcombine18a."','".$opvcombine18b."','".$opvcombine18c."','".$grandyellow18a."','".$grandyellow18b."','".$grandyellow18c."','".$grandwhite18a."','".$grandwhite18b."','".$grandwhite18c."','".$grandtotal18a."','".$grandtotal18b."','".$grandtotal18c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer19 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow19a."','".$hybridyellow19b."','".$hybridyellow19c."','".$hybridwhite19a."','".$hybridwhite19b."','".$hybridwhite19c."','".$hybridcombine19a."','".$hybridcombine19b."','".$hybridcombine19c."','".$opvyellow19a."','".$opvyellow19b."','".$opvyellow19c."','".$opvwhite19a."','".$opvwhite19b."',,'".$opvwhite19c."','".$opvcombine19a."','".$opvcombine19b."','".$opvcombine19c."','".$grandyellow19a."','".$grandyellow19b."','".$grandyellow19c."','".$grandwhite19a."','".$grandwhite19b."','".$grandwhite19c."','".$grandtotal19a."','".$grandtotal19b."','".$grandtotal19c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer20 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow20a."','".$hybridyellow20b."','".$hybridyellow20c."','".$hybridwhite20a."','".$hybridwhite20b."','".$hybridwhite20c."','".$hybridcombine20a."','".$hybridcombine20b."','".$hybridcombine20c."','".$opvyellow20a."','".$opvyellow20b."','".$opvyellow20c."','".$opvwhite20a."','".$opvwhite20b."',,'".$opvwhite20c."','".$opvcombine20a."','".$opvcombine20b."','".$opvcombine20c."','".$grandyellow20a."','".$grandyellow20b."','".$grandyellow20c."','".$grandwhite20a."','".$grandwhite20b."','".$grandwhite20c."','".$grandtotal20a."','".$grandtotal20b."','".$grandtotal20c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer21 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow21a."','".$hybridyellow21b."','".$hybridyellow21c."','".$hybridwhite21a."','".$hybridwhite21b."','".$hybridwhite21c."','".$hybridcombine21a."','".$hybridcombine21b."','".$hybridcombine21c."','".$opvyellow21a."','".$opvyellow21b."','".$opvyellow21c."','".$opvwhite21a."','".$opvwhite21b."',,'".$opvwhite21c."','".$opvcombine21a."','".$opvcombine21b."','".$opvcombine21c."','".$grandyellow21a."','".$grandyellow21b."','".$grandyellow21c."','".$grandwhite21a."','".$grandwhite21b."','".$grandwhite21c."','".$grandtotal21a."','".$grandtotal21b."','".$grandtotal21c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer22 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow22a."','".$hybridyellow22b."','".$hybridyellow22c."','".$hybridwhite22a."','".$hybridwhite22b."','".$hybridwhite22c."','".$hybridcombine22a."','".$hybridcombine22b."','".$hybridcombine22c."','".$opvyellow22a."','".$opvyellow22b."','".$opvyellow22c."','".$opvwhite22a."','".$opvwhite22b."',,'".$opvwhite22c."','".$opvcombine22a."','".$opvcombine22b."','".$opvcombine22c."','".$grandyellow22a."','".$grandyellow22b."','".$grandyellow22c."','".$grandwhite22a."','".$grandwhite22b."','".$grandwhite22c."','".$grandtotal22a."','".$grandtotal22b."','".$grandtotal22c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer23 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow23a."','".$hybridyellow23b."','".$hybridyellow23c."','".$hybridwhite23a."','".$hybridwhite23b."','".$hybridwhite23c."','".$hybridcombine23a."','".$hybridcombine23b."','".$hybridcombine23c."','".$opvyellow23a."','".$opvyellow23b."','".$opvyellow23c."','".$opvwhite23a."','".$opvwhite23b."',,'".$opvwhite23c."','".$opvcombine23a."','".$opvcombine23b."','".$opvcombine23c."','".$grandyellow23a."','".$grandyellow23b."','".$grandyellow23c."','".$grandwhite23a."','".$grandwhite23b."','".$grandwhite23c."','".$grandtotal23a."','".$grandtotal23b."','".$grandtotal23c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer24 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow24a."','".$hybridyellow24b."','".$hybridyellow24c."','".$hybridwhite24a."','".$hybridwhite24b."','".$hybridwhite24c."','".$hybridcombine24a."','".$hybridcombine24b."','".$hybridcombine24c."','".$opvyellow24a."','".$opvyellow24b."','".$opvyellow24c."','".$opvwhite24a."','".$opvwhite24b."',,'".$opvwhite24c."','".$opvcombine24a."','".$opvcombine24b."','".$opvcombine24c."','".$grandyellow24a."','".$grandyellow24b."','".$grandyellow24c."','".$grandwhite24a."','".$grandwhite24b."','".$grandwhite24c."','".$grandtotal24a."','".$grandtotal24b."','".$grandtotal24c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer25 != "")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$reporttype."','".$geocode."','".$hybridyellow25a."','".$hybridyellow25b."','".$hybridyellow25c."','".$hybridwhite25a."','".$hybridwhite25b."','".$hybridwhite25c."','".$hybridcombine25a."','".$hybridcombine25b."','".$hybridcombine25c."','".$opvyellow25a."','".$opvyellow25b."','".$opvyellow25c."','".$opvwhite25a."','".$opvwhite25b."',,'".$opvwhite25c."','".$opvcombine25a."','".$opvcombine25b."','".$opvcombine25c."','".$grandyellow25a."','".$grandyellow25b."','".$grandyellow25c."','".$grandwhite25a."','".$grandwhite25b."','".$grandwhite25c."','".$grandtotal25a."','".$grandtotal25b."','".$grandtotal25c."','".$fromdate."','".$todate."'";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }




        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <h2 class="text-2xl font-bold">Consolidation Corn Planting</h2>
        <br>
        <div class="flex flex-col gap-2">
        <form method="POST" action="" class="flex flex-col gap-2" style="overflow-x:auto">
                <table style="width:100%">
                <tr>
                    <th rowspan="1" colspan="1">BARANGAY</th>
                    <th rowspan="1" colspan="1">VARIETY</th>
                    <th rowspan="1" colspan="1">NO. OF FARMERS</th>
                    <th rowspan="1" colspan="1">AREA PLANTED(ha)</th>
                    <th rowspan="1" colspan="1">AREA HARVESTED(ha)</th>
                    <th rowspan="1" colspan="1">PRODUCTION(mt)</th>
                    <th rowspan="1" colspan="1">STAGES OF CROP</th>
                </tr>
                    <?php
                        $brgy[1] = "Poblacion";
                        $brgy[2] = "Buenavista East";
                        $brgy[3] = "Buenavista West";
                        $brgy[4] = "Bukal Norte";
                        $brgy[5] = "Bukal Sur";
                        $brgy[6] = "Kinatihan I";
                        $brgy[7] = "Kinatihan II";
                        $brgy[8] = "Malabanban Norte";
                        $brgy[9] = "Malabanban Sur";
                        $brgy[10] = "Mangilag Norte";
                        $brgy[11] = "Mangilag Sur";
                        $brgy[12] = "Masalukot I";
                        $brgy[13] = "Masalukot II";
                        $brgy[14] = "Masalukot III";
                        $brgy[15] = "Masalukot IV";
                        $brgy[16] = "Masalukot V";
                        $brgy[17] = "Masin Norte";
                        $brgy[18] = "Masin Sur";
                        $brgy[19] = "Mayabobo";
                        $brgy[20] = "Pahinga Norte";
                        $brgy[21] = "Pahinga Sur";
                        $brgy[22] = "San Andres";
                        $brgy[23] = "San Isidro";
                        $brgy[24] = "Sta. Catalina Norte";
                        $brgy[25] = "Sta. Catalina Sur";
                        
                        //$brgys = array_chunk('brgy','test');
                        for($i = 1; $i<=25; $i++) {
                            
                            
                            ?>
                            <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay<?php echo $i;?>" id="brgy<?php echo $i; ?>" value="<?php echo $brgy[$i]; ?>" readonly>
                        </td>
                       <!-- VARIETY -->
                       <td>
                            <input type="text" class="form-input" name="variety<?php echo $i;?>" id="" value="<?php echo $row['variety']; ?>" disabled="true">
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer<?php echo $i;?>" id="" value="<?php echo $row['nooffarmers']; ?>" disabled="true">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="areaplanted<?php echo $i;?>" id="" value="<?php echo $row['areaplanted']?>" disabled="true">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="areaharvested<?php echo $i;?>" id="" value="<?php echo $row['areaharvested']?>" disabled="true">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="production<?php echo $i;?>" id="" value="<?php echo $row['production']?>" disabled="true">
                        </td>
                        <td>
                            <input type="text" class="form-input" name="stagesofcrop<?php echo $i;?>" id="" value="<?php echo $row['stagesofcrop']?>" disabled="true">
                        </td>
                    </tr>
                            <?php
                        }

                    ?>
                    <!-- 1 -->
                    
                </table>
                <br><br>
                <input type="submit" value="Save" name="btnsave" class="btn-primary">
            </form>
            <br><br><br><br>
        </div>

    
        <?php
            include "footer.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

