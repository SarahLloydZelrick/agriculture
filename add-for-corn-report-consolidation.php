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

            if($nooffarmer1 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay1."','".$reporttype."','".$variety1."','".$nooffarmer1."','".$areaplanted1."','".$areaharvested1."','".$production1."','".$stagesofcrop1."','".$fromdate."','".$todate."')";
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
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay2."','".$reporttype."','".$variety2."','".$nooffarmer2."','".$areaplanted2."','".$areaharvested2."','".$production2."','".$stagesofcrop2."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "2";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "2";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer3 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay3."','".$reporttype."','".$variety3."','".$nooffarmer3."','".$areaplanted3."','".$areaharvested3."','".$production3."','".$stagesofcrop3."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "3";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "3";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer4 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay4."','".$reporttype."','".$variety4."','".$nooffarmer4."','".$areaplanted4."','".$areaharvested4."','".$production4."','".$stagesofcrop4."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "4";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "4";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer5 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay5."','".$reporttype."','".$variety5."','".$nooffarmer5."','".$areaplanted5."','".$areaharvested5."','".$production5."','".$stagesofcrop5."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "5";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "5";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer6 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay6."','".$reporttype."','".$variety6."','".$nooffarmer6."','".$areaplanted6."','".$areaharvested6."','".$production6."','".$stagesofcrop6."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "6";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "6";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer7 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay7."','".$reporttype."','".$variety7."','".$nooffarmer7."','".$areaplanted7."','".$areaharvested7."','".$production7."','".$stagesofcrop7."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "7";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "7";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer8 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay8."','".$reporttype."','".$variety8."','".$nooffarmer8."','".$areaplanted8."','".$areaharvested8."','".$production8."','".$stagesofcrop8."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "8";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "8";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer9 != "")
               {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay9."','".$reporttype."','".$variety9."','".$nooffarmer9."','".$areaplanted9."','".$areaharvested9."','".$production9."','".$stagesofcrop9."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "9";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "9";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer10 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay10."','".$reporttype."','".$variety10."','".$nooffarmer10."','".$areaplanted10."','".$areaharvested10."','".$production10."','".$stagesofcrop10."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "10";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "10";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer11 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay11."','".$reporttype."','".$variety11."','".$nooffarmer11."','".$areaplanted11."','".$areaharvested11."','".$production11."','".$stagesofcrop11."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "11";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "11";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer12 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay12."','".$reporttype."','".$variety12."','".$nooffarmer12."','".$areaplanted12."','".$areaharvested12."','".$production12."','".$stagesofcrop12."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "12";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "12";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer13 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay13."','".$reporttype."','".$variety13."','".$nooffarmer13."','".$areaplanted13."','".$areaharvested13."','".$production13."','".$stagesofcrop13."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "13";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "13";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer14 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay14."','".$reporttype."','".$variety14."','".$nooffarmer14."','".$areaplanted14."','".$areaharvested14."','".$production14."','".$stagesofcrop14."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "14";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "14";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer15 != "")
               {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay15."','".$reporttype."','".$variety15."','".$nooffarmer15."','".$areaplanted15."','".$areaharvested15."','".$production15."','".$stagesofcrop15."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "15";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "15";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer16 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay16."','".$reporttype."','".$variety16."','".$nooffarmer16."','".$areaplanted16."','".$areaharvested16."','".$production16."','".$stagesofcrop16."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "16";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "16";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer17 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay17."','".$reporttype."','".$variety17."','".$nooffarmer17."','".$areaplanted17."','".$areaharvested17."','".$production17."','".$stagesofcrop17."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "17";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "17";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer18 != "")
               {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay18."','".$reporttype."','".$variety18."','".$nooffarmer18."','".$areaplanted18."','".$areaharvested18."','".$production18."','".$stagesofcrop18."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "18";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "18";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer19 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay19."','".$reporttype."','".$variety19."','".$nooffarmer19."','".$areaplanted19."','".$areaharvested19."','".$production19."','".$stagesofcrop19."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "19";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "19";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer20 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay20."','".$reporttype."','".$variety20."','".$nooffarmer20."','".$areaplanted20."','".$areaharvested20."','".$production20."','".$stagesofcrop20."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "20";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "20";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer21 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay21."','".$reporttype."','".$variety21."','".$nooffarmer21."','".$areaplanted21."','".$areaharvested21."','".$production21."','".$stagesofcrop21."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "21";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "21";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer22 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay22."','".$reporttype."','".$variety22."','".$nooffarmer22."','".$areaplanted22."','".$areaharvested22."','".$production22."','".$stagesofcrop22."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "22";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "22";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer23 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay23."','".$reporttype."','".$variety23."','".$nooffarmer23."','".$areaplanted23."','".$areaharvested23."','".$production23."','".$stagesofcrop23."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "23";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "23";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer24 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay24."','".$reporttype."','".$variety24."','".$nooffarmer24."','".$areaplanted24."','".$areaharvested24."','".$production24."','".$stagesofcrop24."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "24";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "24";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer25 != "")
                {
                $sql = "INSERT INTO `tbl_corn_consolidation_report`(`barangay`, `reportype`, `variety`, `nooffarmers`, `areaplanted`, `areaharvested`, `production`, `stagesofcrop`, `fromdate`, `todate`) VALUES 
                ('".$barangay25."','".$reporttype."','".$variety25."','".$nooffarmer25."','".$areaplanted25."','".$areaharvested25."','".$production25."','".$stagesofcrop25."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "25";
                        $success_message = "Added successfully.";
                    } else{
                        $errors = "25";
                        $error_message = "Error submitting the form. Please try again.";
                    }
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

