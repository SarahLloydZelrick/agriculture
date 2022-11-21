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
    header("Location: cassava-report-view.php?dateto=".$_GET['dateto']."&datefrom=".$_GET['datefrom']."");
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
    <title>Add Cassava Report</title>

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

        $reporttype = "CassavaPlanting";
        $todate = $_GET['dateto'];
        $fromdate = $_GET['datefrom'];

        if (isset($_POST['btnsave'] )) {
            $geocode = "";
            $barangay1 = $_POST['barangay1'];
            $nooffarmer1 = $_POST['nooffarmer1'];
            $hybridyellow1 = $_POST['hybridyellow1'];
            $hybridwhite1 = $_POST['hybridwhite1'];
            $hybridtotal1 = $_POST['hybridtotal1'];
            $opvyellow1 = $_POST['opvyellow1'];
            $opvwhite1 = $_POST['opvwhite1'];
            $opvtotal1 = $_POST['opvtotal1'];
            $grandyellow1 = $_POST['grandyellow1'];
            $grandwhite1 = $_POST['grandwhite1'];
            $grandtotal1 = $_POST['grandtotal1'];
    
            $barangay2 = $_POST['barangay2'];
            $nooffarmer2 = $_POST['nooffarmer2'];
            $hybridyellow2 = $_POST['hybridyellow2'];
            $hybridwhite2 = $_POST['hybridwhite2'];
            $hybridtotal2 = $_POST['hybridtotal2'];
            $opvyellow2 = $_POST['opvyellow2'];
            $opvwhite2 = $_POST['opvwhite2'];
            $opvtotal2 = $_POST['opvtotal2'];
            $grandyellow2 = $_POST['grandyellow2'];
            $grandwhite2 = $_POST['grandwhite2'];
            $grandtotal2 = $_POST['grandtotal2'];

            $barangay3 = $_POST['barangay3'];
            $nooffarmer3 = $_POST['nooffarmer3'];
            $hybridyellow3 = $_POST['hybridyellow3'];
            $hybridwhite3 = $_POST['hybridwhite3'];
            $hybridtotal3 = $_POST['hybridtotal3'];
            $opvyellow3 = $_POST['opvyellow3'];
            $opvwhite3 = $_POST['opvwhite3'];
            $opvtotal3 = $_POST['opvtotal3'];
            $grandyellow3 = $_POST['grandyellow3'];
            $grandwhite3 = $_POST['grandwhite3'];
            $grandtotal3 = $_POST['grandtotal3'];

            $barangay4 = $_POST['barangay4'];
            $nooffarmer4 = $_POST['nooffarmer4'];
            $hybridyellow4 = $_POST['hybridyellow4'];
            $hybridwhite4 = $_POST['hybridwhite4'];
            $hybridtotal4 = $_POST['hybridtotal4'];
            $opvyellow4 = $_POST['opvyellow4'];
            $opvwhite4 = $_POST['opvwhite4'];
            $opvtotal4 = $_POST['opvtotal4'];
            $grandyellow4 = $_POST['grandyellow4'];
            $grandwhite4 = $_POST['grandwhite4'];
            $grandtotal4 = $_POST['grandtotal4'];

            $barangay5 = $_POST['barangay5'];
            $nooffarmer5 = $_POST['nooffarmer5'];
            $hybridyellow5 = $_POST['hybridyellow5'];
            $hybridwhite5 = $_POST['hybridwhite5'];
            $hybridtotal5 = $_POST['hybridtotal5'];
            $opvyellow5 = $_POST['opvyellow5'];
            $opvwhite5 = $_POST['opvwhite5'];
            $opvtotal5 = $_POST['opvtotal5'];
            $grandyellow5 = $_POST['grandyellow5'];
            $grandwhite5 = $_POST['grandwhite5'];
            $grandtotal5 = $_POST['grandtotal5'];

            $barangay6 = $_POST['barangay6'];
            $nooffarmer6 = $_POST['nooffarmer6'];
            $hybridyellow6 = $_POST['hybridyellow6'];
            $hybridwhite6 = $_POST['hybridwhite6'];
            $hybridtotal6 = $_POST['hybridtotal6'];
            $opvyellow6 = $_POST['opvyellow6'];
            $opvwhite6 = $_POST['opvwhite6'];
            $opvtotal6 = $_POST['opvtotal6'];
            $grandyellow6 = $_POST['grandyellow6'];
            $grandwhite6 = $_POST['grandwhite6'];
            $grandtotal6 = $_POST['grandtotal6'];

            $barangay7 = $_POST['barangay7'];
            $nooffarmer7 = $_POST['nooffarmer7'];
            $hybridyellow7 = $_POST['hybridyellow7'];
            $hybridwhite7 = $_POST['hybridwhite7'];
            $hybridtotal7 = $_POST['hybridtotal7'];
            $opvyellow7 = $_POST['opvyellow7'];
            $opvwhite7 = $_POST['opvwhite7'];
            $opvtotal7 = $_POST['opvtotal7'];
            $grandyellow7 = $_POST['grandyellow7'];
            $grandwhite7 = $_POST['grandwhite7'];
            $grandtotal7 = $_POST['grandtotal7'];

            $barangay8 = $_POST['barangay8'];
            $nooffarmer8 = $_POST['nooffarmer8'];
            $hybridyellow8 = $_POST['hybridyellow8'];
            $hybridwhite8 = $_POST['hybridwhite8'];
            $hybridtotal8 = $_POST['hybridtotal8'];
            $opvyellow8 = $_POST['opvyellow8'];
            $opvwhite8 = $_POST['opvwhite8'];
            $opvtotal8 = $_POST['opvtotal8'];
            $grandyellow8 = $_POST['grandyellow8'];
            $grandwhite8 = $_POST['grandwhite8'];
            $grandtotal8 = $_POST['grandtotal8'];

            $barangay9 = $_POST['barangay9'];
            $nooffarmer9 = $_POST['nooffarmer9'];
            $hybridyellow9 = $_POST['hybridyellow9'];
            $hybridwhite9 = $_POST['hybridwhite9'];
            $hybridtotal9 = $_POST['hybridtotal9'];
            $opvyellow9 = $_POST['opvyellow9'];
            $opvwhite9 = $_POST['opvwhite9'];
            $opvtotal9 = $_POST['opvtotal9'];
            $grandyellow9 = $_POST['grandyellow9'];
            $grandwhite9 = $_POST['grandwhite9'];
            $grandtotal9 = $_POST['grandtotal9'];

            $barangay10 = $_POST['barangay10'];
            $nooffarmer10 = $_POST['nooffarmer10'];
            $hybridyellow10 = $_POST['hybridyellow10'];
            $hybridwhite10 = $_POST['hybridwhite10'];
            $hybridtotal10 = $_POST['hybridtotal10'];
            $opvyellow10 = $_POST['opvyellow10'];
            $opvwhite10 = $_POST['opvwhite10'];
            $opvtotal10 = $_POST['opvtotal10'];
            $grandyellow10 = $_POST['grandyellow10'];
            $grandwhite10 = $_POST['grandwhite10'];
            $grandtotal10 = $_POST['grandtotal10'];

            $barangay11 = $_POST['barangay11'];
            $nooffarmer11 = $_POST['nooffarmer11'];
            $hybridyellow11 = $_POST['hybridyellow11'];
            $hybridwhite11 = $_POST['hybridwhite11'];
            $hybridtotal11 = $_POST['hybridtotal11'];
            $opvyellow11 = $_POST['opvyellow11'];
            $opvwhite11 = $_POST['opvwhite11'];
            $opvtotal11 = $_POST['opvtotal11'];
            $grandyellow11 = $_POST['grandyellow11'];
            $grandwhite11 = $_POST['grandwhite11'];
            $grandtotal11 = $_POST['grandtotal11'];

            $barangay12 = $_POST['barangay12'];
            $nooffarmer12 = $_POST['nooffarmer12'];
            $hybridyellow12 = $_POST['hybridyellow12'];
            $hybridwhite12 = $_POST['hybridwhite12'];
            $hybridtotal12 = $_POST['hybridtotal12'];
            $opvyellow12 = $_POST['opvyellow12'];
            $opvwhite12 = $_POST['opvwhite12'];
            $opvtotal12 = $_POST['opvtotal12'];
            $grandyellow12 = $_POST['grandyellow12'];
            $grandwhite12 = $_POST['grandwhite12'];
            $grandtotal12 = $_POST['grandtotal12'];

            $barangay13 = $_POST['barangay13'];
            $nooffarmer13 = $_POST['nooffarmer13'];
            $hybridyellow13 = $_POST['hybridyellow13'];
            $hybridwhite13 = $_POST['hybridwhite13'];
            $hybridtotal13 = $_POST['hybridtotal13'];
            $opvyellow13 = $_POST['opvyellow13'];
            $opvwhite13 = $_POST['opvwhite13'];
            $opvtotal13 = $_POST['opvtotal13'];
            $grandyellow13 = $_POST['grandyellow13'];
            $grandwhite13 = $_POST['grandwhite13'];
            $grandtotal13 = $_POST['grandtotal13'];

            $barangay14 = $_POST['barangay14'];
            $nooffarmer14 = $_POST['nooffarmer14'];
            $hybridyellow14 = $_POST['hybridyellow14'];
            $hybridwhite14 = $_POST['hybridwhite14'];
            $hybridtotal14 = $_POST['hybridtotal14'];
            $opvyellow14 = $_POST['opvyellow14'];
            $opvwhite14 = $_POST['opvwhite14'];
            $opvtotal14 = $_POST['opvtotal14'];
            $grandyellow14 = $_POST['grandyellow14'];
            $grandwhite14 = $_POST['grandwhite14'];
            $grandtotal14 = $_POST['grandtotal14'];

            $barangay15 = $_POST['barangay15'];
            $nooffarmer15 = $_POST['nooffarmer15'];
            $hybridyellow15 = $_POST['hybridyellow15'];
            $hybridwhite15 = $_POST['hybridwhite15'];
            $hybridtotal15 = $_POST['hybridtotal15'];
            $opvyellow15 = $_POST['opvyellow15'];
            $opvwhite15 = $_POST['opvwhite15'];
            $opvtotal15 = $_POST['opvtotal15'];
            $grandyellow15 = $_POST['grandyellow15'];
            $grandwhite15 = $_POST['grandwhite15'];
            $grandtotal15 = $_POST['grandtotal15'];

            $barangay16 = $_POST['barangay16'];
            $nooffarmer16 = $_POST['nooffarmer16'];
            $hybridyellow16 = $_POST['hybridyellow16'];
            $hybridwhite16 = $_POST['hybridwhite16'];
            $hybridtotal16 = $_POST['hybridtotal16'];
            $opvyellow16 = $_POST['opvyellow16'];
            $opvwhite16 = $_POST['opvwhite16'];
            $opvtotal16 = $_POST['opvtotal16'];
            $grandyellow16 = $_POST['grandyellow16'];
            $grandwhite16 = $_POST['grandwhite16'];
            $grandtotal16 = $_POST['grandtotal16'];

            $barangay17 = $_POST['barangay17'];
            $nooffarmer17 = $_POST['nooffarmer17'];
            $hybridyellow17 = $_POST['hybridyellow17'];
            $hybridwhite17 = $_POST['hybridwhite17'];
            $hybridtotal17 = $_POST['hybridtotal17'];
            $opvyellow17 = $_POST['opvyellow17'];
            $opvwhite17 = $_POST['opvwhite17'];
            $opvtotal17 = $_POST['opvtotal17'];
            $grandyellow17 = $_POST['grandyellow17'];
            $grandwhite17 = $_POST['grandwhite17'];
            $grandtotal17 = $_POST['grandtotal17'];

            $barangay18 = $_POST['barangay18'];
            $nooffarmer18 = $_POST['nooffarmer18'];
            $hybridyellow18 = $_POST['hybridyellow18'];
            $hybridwhite18 = $_POST['hybridwhite18'];
            $hybridtotal18 = $_POST['hybridtotal18'];
            $opvyellow18 = $_POST['opvyellow18'];
            $opvwhite18 = $_POST['opvwhite18'];
            $opvtotal18 = $_POST['opvtotal18'];
            $grandyellow18 = $_POST['grandyellow18'];
            $grandwhite18 = $_POST['grandwhite18'];
            $grandtotal18 = $_POST['grandtotal18'];

            $barangay19 = $_POST['barangay19'];
            $nooffarmer19 = $_POST['nooffarmer19'];
            $hybridyellow19 = $_POST['hybridyellow19'];
            $hybridwhite19 = $_POST['hybridwhite19'];
            $hybridtotal19 = $_POST['hybridtotal19'];
            $opvyellow19 = $_POST['opvyellow19'];
            $opvwhite19 = $_POST['opvwhite19'];
            $opvtotal19 = $_POST['opvtotal19'];
            $grandyellow19 = $_POST['grandyellow19'];
            $grandwhite19 = $_POST['grandwhite19'];
            $grandtotal19 = $_POST['grandtotal19'];

            $barangay20 = $_POST['barangay20'];
            $nooffarmer20 = $_POST['nooffarmer20'];
            $hybridyellow20 = $_POST['hybridyellow20'];
            $hybridwhite20 = $_POST['hybridwhite20'];
            $hybridtotal20 = $_POST['hybridtotal20'];
            $opvyellow20 = $_POST['opvyellow20'];
            $opvwhite20 = $_POST['opvwhite20'];
            $opvtotal20 = $_POST['opvtotal20'];
            $grandyellow20 = $_POST['grandyellow20'];
            $grandwhite20 = $_POST['grandwhite20'];
            $grandtotal20 = $_POST['grandtotal20'];

            $barangay21 = $_POST['barangay21'];
            $nooffarmer21 = $_POST['nooffarmer21'];
            $hybridyellow21 = $_POST['hybridyellow21'];
            $hybridwhite21 = $_POST['hybridwhite21'];
            $hybridtotal21 = $_POST['hybridtotal21'];
            $opvyellow21 = $_POST['opvyellow21'];
            $opvwhite21 = $_POST['opvwhite21'];
            $opvtotal21 = $_POST['opvtotal21'];
            $grandyellow21 = $_POST['grandyellow21'];
            $grandwhite21 = $_POST['grandwhite21'];
            $grandtotal21 = $_POST['grandtotal21'];

            $barangay22 = $_POST['barangay22'];
            $nooffarmer22 = $_POST['nooffarmer22'];
            $hybridyellow22 = $_POST['hybridyellow22'];
            $hybridwhite22 = $_POST['hybridwhite22'];
            $hybridtotal22 = $_POST['hybridtotal22'];
            $opvyellow22 = $_POST['opvyellow22'];
            $opvwhite22 = $_POST['opvwhite22'];
            $opvtotal22 = $_POST['opvtotal22'];
            $grandyellow22 = $_POST['grandyellow22'];
            $grandwhite22 = $_POST['grandwhite22'];
            $grandtotal22 = $_POST['grandtotal22'];

            $barangay23 = $_POST['barangay23'];
            $nooffarmer23 = $_POST['nooffarmer23'];
            $hybridyellow23 = $_POST['hybridyellow23'];
            $hybridwhite23 = $_POST['hybridwhite23'];
            $hybridtotal23 = $_POST['hybridtotal23'];
            $opvyellow23 = $_POST['opvyellow23'];
            $opvwhite23 = $_POST['opvwhite23'];
            $opvtotal23 = $_POST['opvtotal23'];
            $grandyellow23 = $_POST['grandyellow23'];
            $grandwhite23 = $_POST['grandwhite23'];
            $grandtotal23 = $_POST['grandtotal23'];

            $barangay24 = $_POST['barangay24'];
            $nooffarmer24 = $_POST['nooffarmer24'];
            $hybridyellow24 = $_POST['hybridyellow24'];
            $hybridwhite24 = $_POST['hybridwhite24'];
            $hybridtotal24 = $_POST['hybridtotal24'];
            $opvyellow24 = $_POST['opvyellow24'];
            $opvwhite24 = $_POST['opvwhite24'];
            $opvtotal24 = $_POST['opvtotal24'];
            $grandyellow24 = $_POST['grandyellow24'];
            $grandwhite24 = $_POST['grandwhite24'];
            $grandtotal24 = $_POST['grandtotal24'];

            $barangay25 = $_POST['barangay25'];
            $nooffarmer25 = $_POST['nooffarmer25'];
            $hybridyellow25 = $_POST['hybridyellow25'];
            $hybridwhite25 = $_POST['hybridwhite25'];
            $hybridtotal25 = $_POST['hybridtotal25'];
            $opvyellow25 = $_POST['opvyellow25'];
            $opvwhite25 = $_POST['opvwhite25'];
            $opvtotal25 = $_POST['opvtotal25'];
            $grandyellow25 = $_POST['grandyellow25'];
            $grandwhite25 = $_POST['grandwhite25'];
            $grandtotal25 = $_POST['grandtotal25'];

            if($nooffarmer1 != "" || $nooffarmer1 != "0")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay1."','".$nooffarmer1."','".$hybridyellow1."','".$hybridwhite1."','".$hybridtotal1."','".$opvyellow1."','".$opvwhite1."','".$opvtotal1."','".$grandyellow1."','".$grandwhite1."','".$grandtotal1."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($nooffarmer2 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay2."','".$nooffarmer2."','".$hybridyellow2."','".$hybridwhite2."','".$hybridtotal2."','".$opvyellow2."','".$opvwhite2."','".$opvtotal2."','".$grandyellow2."','".$grandwhite2."','".$grandtotal2."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer3 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay3."','".$nooffarmer3."','".$hybridyellow3."','".$hybridwhite3."','".$hybridtotal3."','".$opvyellow3."','".$opvwhite3."','".$opvtotal3."','".$grandyellow3."','".$grandwhite3."','".$grandtotal3."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer4 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay4."','".$nooffarmer4."','".$hybridyellow4."','".$hybridwhite4."','".$hybridtotal4."','".$opvyellow4."','".$opvwhite4."','".$opvtotal4."','".$grandyellow4."','".$grandwhite4."','".$grandtotal4."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer5 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay5."','".$nooffarmer5."','".$hybridyellow5."','".$hybridwhite5."','".$hybridtotal5."','".$opvyellow5."','".$opvwhite5."','".$opvtotal5."','".$grandyellow5."','".$grandwhite5."','".$grandtotal5."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer6 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay6."','".$nooffarmer6."','".$hybridyellow6."','".$hybridwhite6."','".$hybridtotal6."','".$opvyellow6."','".$opvwhite6."','".$opvtotal6."','".$grandyellow6."','".$grandwhite6."','".$grandtotal6."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer7 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay7."','".$nooffarmer7."','".$hybridyellow7."','".$hybridwhite7."','".$hybridtotal7."','".$opvyellow7."','".$opvwhite7."','".$opvtotal7."','".$grandyellow7."','".$grandwhite7."','".$grandtotal7."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer8 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay8."','".$nooffarmer8."','".$hybridyellow8."','".$hybridwhite8."','".$hybridtotal8."','".$opvyellow8."','".$opvwhite8."','".$opvtotal8."','".$grandyellow8."','".$grandwhite8."','".$grandtotal8."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer9 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay9."','".$nooffarmer9."','".$hybridyellow9."','".$hybridwhite9."','".$hybridtotal9."','".$opvyellow9."','".$opvwhite9."','".$opvtotal9."','".$grandyellow9."','".$grandwhite9."','".$grandtotal9."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer10 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay10."','".$nooffarmer10."','".$hybridyellow10."','".$hybridwhite10."','".$hybridtotal10."','".$opvyellow10."','".$opvwhite10."','".$opvtotal10."','".$grandyellow10."','".$grandwhite10."','".$grandtotal10."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer11 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay11."','".$nooffarmer11."','".$hybridyellow11."','".$hybridwhite11."','".$hybridtotal11."','".$opvyellow11."','".$opvwhite11."','".$opvtotal11."','".$grandyellow11."','".$grandwhite11."','".$grandtotal11."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer12 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay12."','".$nooffarmer12."','".$hybridyellow12."','".$hybridwhite12."','".$hybridtotal12."','".$opvyellow12."','".$opvwhite12."','".$opvtotal12."','".$grandyellow12."','".$grandwhite12."','".$grandtotal12."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer13 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay13."','".$nooffarmer13."','".$hybridyellow13."','".$hybridwhite13."','".$hybridtotal13."','".$opvyellow13."','".$opvwhite13."','".$opvtotal13."','".$grandyellow13."','".$grandwhite13."','".$grandtotal13."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer14 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay14."','".$nooffarmer14."','".$hybridyellow14."','".$hybridwhite14."','".$hybridtotal14."','".$opvyellow14."','".$opvwhite14."','".$opvtotal14."','".$grandyellow14."','".$grandwhite14."','".$grandtotal14."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer15 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay15."','".$nooffarmer15."','".$hybridyellow15."','".$hybridwhite15."','".$hybridtotal15."','".$opvyellow15."','".$opvwhite15."','".$opvtotal15."','".$grandyellow15."','".$grandwhite15."','".$grandtotal15."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer16 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay16."','".$nooffarmer16."','".$hybridyellow16."','".$hybridwhite16."','".$hybridtotal16."','".$opvyellow16."','".$opvwhite16."','".$opvtotal16."','".$grandyellow16."','".$grandwhite16."','".$grandtotal16."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer17 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay17."','".$nooffarmer17."','".$hybridyellow17."','".$hybridwhite17."','".$hybridtotal17."','".$opvyellow17."','".$opvwhite17."','".$opvtotal17."','".$grandyellow17."','".$grandwhite17."','".$grandtotal17."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer18 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay18."','".$nooffarmer18."','".$hybridyellow18."','".$hybridwhite18."','".$hybridtotal18."','".$opvyellow18."','".$opvwhite18."','".$opvtotal18."','".$grandyellow18."','".$grandwhite18."','".$grandtotal18."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer19 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay19."','".$nooffarmer19."','".$hybridyellow19."','".$hybridwhite19."','".$hybridtotal19."','".$opvyellow19."','".$opvwhite19."','".$opvtotal19."','".$grandyellow19."','".$grandwhite19."','".$grandtotal19."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer20 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay20."','".$nooffarmer20."','".$hybridyellow20."','".$hybridwhite20."','".$hybridtotal20."','".$opvyellow20."','".$opvwhite20."','".$opvtotal20."','".$grandyellow20."','".$grandwhite20."','".$grandtotal20."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer21 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay21."','".$nooffarmer21."','".$hybridyellow21."','".$hybridwhite21."','".$hybridtotal21."','".$opvyellow21."','".$opvwhite21."','".$opvtotal21."','".$grandyellow21."','".$grandwhite21."','".$grandtotal21."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer22 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay22."','".$nooffarmer22."','".$hybridyellow22."','".$hybridwhite22."','".$hybridtotal22."','".$opvyellow22."','".$opvwhite22."','".$opvtotal22."','".$grandyellow22."','".$grandwhite22."','".$grandtotal22."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer23 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay23."','".$nooffarmer23."','".$hybridyellow23."','".$hybridwhite23."','".$hybridtotal23."','".$opvyellow23."','".$opvwhite23."','".$opvtotal23."','".$grandyellow23."','".$grandwhite23."','".$grandtotal23."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer24 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay24."','".$nooffarmer24."','".$hybridyellow24."','".$hybridwhite24."','".$hybridtotal24."','".$opvyellow24."','".$opvwhite24."','".$opvtotal24."','".$grandyellow24."','".$grandwhite24."','".$grandtotal24."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }
            if($nooffarmer25 != "")
                {
                $sql = "INSERT INTO `tbl_reports_cassava`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay25."','".$nooffarmer25."','".$hybridyellow25."','".$hybridwhite25."','".$hybridtotal25."','".$opvyellow25."','".$opvwhite25."','".$opvtotal25."','".$grandyellow25."','".$grandwhite25."','".$grandtotal25."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }else{
                    
            }




        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <h2 class="text-2xl font-bold">Consolidation Cassava Planting</h2>
        <br>
        <div class="flex flex-col gap-2">
            <form method="POST" action="" class="flex flex-col gap-2">
                <table style="width:100%">
                    <tr>
                        <th rowspan="4" colspan="1">GEOCODE</th>
                        <th rowspan="4" colspan="1">BARANGAY</th>
                        <th rowspan="4" colspan="1">No. of Farmers</th>
                        <th rowspan="1" colspan="9">Month</th>
                        
                    </tr>
                    <tr>
                        <td rowspan="1" colspan="3">Hybrid</td>
                        <td rowspan="1" colspan="3">OPV</td>
                        <td rowspan="1" colspan="3">Grand Total</td>
                        
                    </tr>
                    <tr>
                        <td rowspan="1">Yellow</td>
                        <td rowspan="1">White</td>
                        <td rowspan="1">Total</td>

                        <td rowspan="1">Yellow</td>
                        <td rowspan="1">White</td>
                        <td rowspan="1">Total</td>

                        <td rowspan="1">Yellow</td>
                        <td rowspan="1">White</td>
                        <td rowspan="1">Total</td>
                        
                        
                    </tr>
                    <tr>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        
                    </tr>
                    <!-- 1 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay1" id="" value="Poblacion" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer1" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow1" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite1" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal1" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow1" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite1" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal1" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow1" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite1" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal1" id="" value="0">
                        </td>
                    </tr>
                    <!-- 2 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay2" id="" value="Buenavista East" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer2" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow2" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite2" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal2" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow2" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite2" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal2" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow2" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite2" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal2" id="" value="0">
                        </td>
                    </tr>
                    <!-- 3 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay3" id="" value="Buenavista West" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer3" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow3" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite3" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal3" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow3" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite3" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal3" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow3" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite3" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal3" id="" value="0">
                        </td>
                    </tr>
                    <!-- 4 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay4" id="" value="Bukal Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer4" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow4" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite4" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal4" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow4" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite4" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal4" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow4" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite4" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal4" id="" value="0">
                        </td>
                    </tr>
                    <!-- 5 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay5" id="" value="Bukal Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer5" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow5" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite5" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal5" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow5" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite5" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal5" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow5" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite5" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal5" id="" value="0">
                        </td>
                    </tr>
                    <!-- 6 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay6" id="" value="Kinatihan I" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer6" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow6" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite6" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal6" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow6" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite6" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal6" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow6" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite6" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal6" id="" value="0">
                        </td>
                    </tr>
                    <!-- 7 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay7" id="" value="Kinatihan II" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer7" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow7" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite7" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal7" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow7" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite7" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal7" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow7" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite7" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal7" id="" value="0">
                        </td>
                    </tr>
                    <!-- 8 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay8" id="" value="Malabanban Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer8" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow8" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite8" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal8" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow8" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite8" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal8" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow8" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite8" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal8" id="" value="0">
                        </td>
                    </tr>
                    <!-- 9 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay9" id="" value="Malabanban Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer9" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow9" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite9" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal9" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow9" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite9" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal9" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow9" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite9" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal9" id="" value="0">
                        </td>
                    </tr>
                    <!-- 10 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay10" id="" value="Mangilag Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer10" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow10" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite10" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal10" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow10" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite10" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal10" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow10" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite10" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal10" id="" value="0">
                        </td>
                    </tr>
                    <!-- 11 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay11" id="" value="Mangilag Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer11" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow11" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite11" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal11" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow11" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite11" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal11" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow11" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite11" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal11" id="" value="0">
                        </td>
                    </tr>
                    <!-- 12 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay12" id="" value="Masalukot I" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer12" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow12" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite12" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal12" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow12" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite12" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal12" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow12" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite12" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal12" id="" value="0">
                        </td>
                    </tr>
                    <!-- 13 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay13" id="" value="Masalukot II" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer13" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow13" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite13" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal13" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow13" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite13" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal13" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow13" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite13" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal13" id="" value="0">
                        </td>
                    </tr>
                    <!-- 14 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay14" id="" value="Masalukot III" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer14" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow14" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite14" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal14" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow14" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite14" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal14" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow14" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite14" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal14" id="" value="0">
                        </td>
                    </tr>
                    <!-- 15 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay15" id="" value="Masalukot IV" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer15" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow15" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite15" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal15" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow15" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite15" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal15" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow15" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite15" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal15" id="" value="0">
                        </td>
                    </tr>
                    <!-- 16 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay16" id="" value="Masalukot V" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer16" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow16" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite16" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal16" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow16" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite16" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal16" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow16" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite16" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal16" id="" value="0">
                        </td>
                    </tr>
                    <!-- 17 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay17" id="" value="Masin Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer17" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow17" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite17" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal17" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow17" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite17" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal17" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow17" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite17" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal17" id="" value="0">
                        </td>
                    </tr>
                    <!-- 18 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay18" id="" value="Masin Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer18" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow18" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite18" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal18" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow18" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite18" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal18" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow18" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite18" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal18" id="" value="0">
                        </td>
                    </tr>
                    <!-- 19 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay19" id="" value="Mayabobo" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer19" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow19" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite19" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal19" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow19" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite19" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal19" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow19" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite19" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal19" id="" value="0">
                        </td>
                    </tr>
                    <!-- 20 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay20" id="" value="Pahinga Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer20" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow20" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite20" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal20" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow20" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite20" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal20" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow20" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite20" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal20" id="" value="0">
                        </td>
                    </tr>
                    <!-- 21 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay21" id="" value="Pahinga Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer21" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow21" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite21" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal21" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow21" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite21" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal21" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow21" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite21" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal21" id="" value="0">
                        </td>
                    </tr>
                    <!-- 22 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay22" id="" value="San Andres" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer22" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow22" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite22" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal22" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow22" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite22" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal22" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow22" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite22" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal22" id="" value="0">
                        </td>
                    </tr>
                    <!-- 23 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay23" id="" value="San Isidro" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer23" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow23" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite23" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal23" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow23" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite23" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal23" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow23" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite23" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal23" id="" value="0">
                        </td>
                    </tr>
                    <!-- 24 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay24" id="" value="Sta. Catalina Norte" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer24" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow24" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite24" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal24" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow24" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite24" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal24" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow24" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite24" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal24" id="" value="0">
                        </td>
                    </tr>
                    <!-- 25 -->
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay25" id="" value="Sta. Catalina Sur" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer25" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow25" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite25" id="" value="0">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal25" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow25" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite25" id="" value="0">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal25" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow25" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite25" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal25" id="" value="0">
                        </td>
                    </tr>
                </table>
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