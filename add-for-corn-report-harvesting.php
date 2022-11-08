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
    header("Location: for-corn-report-harvesting.php?dateto=".$_GET['dateto']."&datefrom=".$_GET['datefrom']."");
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
    <title>Add Corn Report</title>

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

        $reporttype = "CornPlanting";
        $todate = $_GET['dateto'];
        $fromdate = $_GET['datefrom'];

        if (isset($_POST['btnsave'] )) {
            $geocode = "";

            $barangay1 = $_POST['barangay1'];
            $nooffarmer1 = $_POST['nooffarmer1'];
            $hybridyellow1a = $_POST['hybridyellow1a'];
            $hybridyellow1b = $_POST['hybridyellow1b'];
            $hybridyellow1c = $_POST['hybridyellow1c'];
            $hybridwhite1a = $_POST['hybridwhite1a'];
            $hybridwhite1b = $_POST['hybridwhite1b'];
            $hybridwhite1c = $_POST['hybridwhite1c'];
            $hybridcombine1a = $_POST['hybridcombine1a'];
            $hybridcombine1b = $_POST['hybridcombine1b'];
            $hybridcombine1c = $_POST['hybridcombine1c'];
            $opvyellow1a = $_POST['opvyellow1a'];
            $opvyellow1b = $_POST['opvyellow1b'];
            $opvyellow1c = $_POST['opvyellow1c'];
            $opvwhite1a = $_POST['opvwhite1a'];
            $opvwhite1b = $_POST['opvwhite1b'];
            $opvwhite1c = $_POST['opvwhite1c'];
            $opvcombine1a = $_POST['opvcombine1a'];
            $opvcombine1b = $_POST['opvcombine1b'];
            $opvcombine1c = $_POST['opvcombine1c'];
            $grandyellow1a = $_POST['grandyellow1a'];
            $grandyellow1b = $_POST['grandyellow1b'];
            $grandyellow1c = $_POST['grandyellow1c'];
            $grandwhite1a = $_POST['grandwhite1a'];
            $grandwhite1b = $_POST['grandwhite1b'];
            $grandwhite1c = $_POST['grandwhite1c'];
            $grandtotal1a = $_POST['grandtotal1a'];
            $grandtotal1b = $_POST['grandtotal1b'];
            $grandtotal1c = $_POST['grandtotal1c'];
            
    
            $barangay2 = $_POST['barangay2'];
            $nooffarmer2 = $_POST['nooffarmer2'];
            $hybridyellow2a = $_POST['hybridyellow2a'];
            $hybridyellow2b = $_POST['hybridyellow2b'];
            $hybridyellow2c = $_POST['hybridyellow2c'];
            $hybridwhite2a = $_POST['hybridwhite2a'];
            $hybridwhite2b = $_POST['hybridwhite2b'];
            $hybridwhite2c = $_POST['hybridwhite2c'];
            $hybridcombine2a = $_POST['hybridcombine2a'];
            $hybridcombine2b = $_POST['hybridcombine2b'];
            $hybridcombine2c = $_POST['hybridcombine2c'];
            $opvyellow2a = $_POST['opvyellow2a'];
            $opvyellow2b = $_POST['opvyellow2b'];
            $opvyellow2c = $_POST['opvyellow2c'];
            $opvwhite2a = $_POST['opvwhite2a'];
            $opvwhite2b = $_POST['opvwhite2b'];
            $opvwhite2c = $_POST['opvwhite2c'];
            $opvcombine2a = $_POST['opvcombine2a'];
            $opvcombine2b = $_POST['opvcombine2b'];
            $opvcombine2c = $_POST['opvcombine2c'];
            $grandyellow2a = $_POST['grandyellow2a'];
            $grandyellow2b = $_POST['grandyellow2b'];
            $grandyellow2c = $_POST['grandyellow2c'];
            $grandwhite2a = $_POST['grandwhite2a'];
            $grandwhite2b = $_POST['grandwhite2b'];
            $grandwhite2c = $_POST['grandwhite2c'];
            $grandtotal2a = $_POST['grandtotal2a'];
            $grandtotal2b = $_POST['grandtotal2b'];
            $grandtotal2c = $_POST['grandtotal2c'];

            $barangay3 = $_POST['barangay3'];
            $nooffarmer3 = $_POST['nooffarmer3'];
            $hybridyellow3a = $_POST['hybridyellow3a'];
            $hybridyellow3b = $_POST['hybridyellow3b'];
            $hybridyellow3c = $_POST['hybridyellow3c'];
            $hybridwhite3a = $_POST['hybridwhite3a'];
            $hybridwhite3b = $_POST['hybridwhite3b'];
            $hybridwhite3c = $_POST['hybridwhite3c'];
            $hybridcombine3a = $_POST['hybridcombine3a'];
            $hybridcombine3b = $_POST['hybridcombine3b'];
            $hybridcombine3c = $_POST['hybridcombine3c'];
            $opvyellow3a = $_POST['opvyellow3a'];
            $opvyellow3b = $_POST['opvyellow3b'];
            $opvyellow3c = $_POST['opvyellow3c'];
            $opvwhite3a = $_POST['opvwhite3a'];
            $opvwhite3b = $_POST['opvwhite3b'];
            $opvwhite3c = $_POST['opvwhite3c'];
            $opvcombine3a = $_POST['opvcombine3a'];
            $opvcombine3b = $_POST['opvcombine3b'];
            $opvcombine3c = $_POST['opvcombine3c'];
            $grandyellow3a = $_POST['grandyellow3a'];
            $grandyellow3b = $_POST['grandyellow3b'];
            $grandyellow3c = $_POST['grandyellow3c'];
            $grandwhite3a = $_POST['grandwhite3a'];
            $grandwhite3b = $_POST['grandwhite3b'];
            $grandwhite3c = $_POST['grandwhite3c'];
            $grandtotal3a = $_POST['grandtotal3a'];
            $grandtotal3b = $_POST['grandtotal3b'];
            $grandtotal3c = $_POST['grandtotal3c'];

            $barangay4 = $_POST['barangay4'];
            $nooffarmer4 = $_POST['nooffarmer4'];
            $hybridyellow4a = $_POST['hybridyellow4a'];
            $hybridyellow4b = $_POST['hybridyellow4b'];
            $hybridyellow4c = $_POST['hybridyellow4c'];
            $hybridwhite4a = $_POST['hybridwhite4a'];
            $hybridwhite4b = $_POST['hybridwhite4b'];
            $hybridwhite4c = $_POST['hybridwhite4c'];
            $hybridcombine4a = $_POST['hybridcombine4a'];
            $hybridcombine4b = $_POST['hybridcombine4b'];
            $hybridcombine4c = $_POST['hybridcombine4c'];
            $opvyellow4a = $_POST['opvyellow4a'];
            $opvyellow4b = $_POST['opvyellow4b'];
            $opvyellow4c = $_POST['opvyellow4c'];
            $opvwhite4a = $_POST['opvwhite4a'];
            $opvwhite4b = $_POST['opvwhite4b'];
            $opvwhite4c = $_POST['opvwhite4c'];
            $opvcombine4a = $_POST['opvcombine4a'];
            $opvcombine4b = $_POST['opvcombine4b'];
            $opvcombine4c = $_POST['opvcombine4c'];
            $grandyellow4a = $_POST['grandyellow4a'];
            $grandyellow4b = $_POST['grandyellow4b'];
            $grandyellow4c = $_POST['grandyellow4c'];
            $grandwhite4a = $_POST['grandwhite4a'];
            $grandwhite4b = $_POST['grandwhite4b'];
            $grandwhite4c = $_POST['grandwhite4c'];
            $grandtotal4a = $_POST['grandtotal4a'];
            $grandtotal4b = $_POST['grandtotal4b'];
            $grandtotal4c = $_POST['grandtotal4c'];

            $barangay5 = $_POST['barangay5'];
            $nooffarmer5 = $_POST['nooffarmer5'];
            $hybridyellow5a = $_POST['hybridyellow5a'];
            $hybridyellow5b = $_POST['hybridyellow5b'];
            $hybridyellow5c = $_POST['hybridyellow5c'];
            $hybridwhite5a = $_POST['hybridwhite5a'];
            $hybridwhite5b = $_POST['hybridwhite5b'];
            $hybridwhite5c = $_POST['hybridwhite5c'];
            $hybridcombine5a = $_POST['hybridcombine5a'];
            $hybridcombine5b = $_POST['hybridcombine5b'];
            $hybridcombine5c = $_POST['hybridcombine5c'];
            $opvyellow5a = $_POST['opvyellow5a'];
            $opvyellow5b = $_POST['opvyellow5b'];
            $opvyellow5c = $_POST['opvyellow5c'];
            $opvwhite5a = $_POST['opvwhite5a'];
            $opvwhite5b = $_POST['opvwhite5b'];
            $opvwhite5c = $_POST['opvwhite5c'];
            $opvcombine5a = $_POST['opvcombine5a'];
            $opvcombine5b = $_POST['opvcombine5b'];
            $opvcombine5c = $_POST['opvcombine5c'];
            $grandyellow5a = $_POST['grandyellow5a'];
            $grandyellow5b = $_POST['grandyellow5b'];
            $grandyellow5c = $_POST['grandyellow5c'];
            $grandwhite5a = $_POST['grandwhite5a'];
            $grandwhite5b = $_POST['grandwhite5b'];
            $grandwhite5c = $_POST['grandwhite5c'];
            $grandtotal5a = $_POST['grandtotal5a'];
            $grandtotal5b = $_POST['grandtotal5b'];
            $grandtotal5c = $_POST['grandtotal5c'];

            $barangay6 = $_POST['barangay6'];
            $nooffarmer6 = $_POST['nooffarmer6'];
            $hybridyellow6a = $_POST['hybridyellow6a'];
            $hybridyellow6b = $_POST['hybridyellow6b'];
            $hybridyellow6c = $_POST['hybridyellow6c'];
            $hybridwhite6a = $_POST['hybridwhite6a'];
            $hybridwhite6b = $_POST['hybridwhite6b'];
            $hybridwhite6c = $_POST['hybridwhite6c'];
            $hybridcombine6a = $_POST['hybridcombine6a'];
            $hybridcombine6b = $_POST['hybridcombine6b'];
            $hybridcombine6c = $_POST['hybridcombine6c'];
            $opvyellow6a = $_POST['opvyellow6a'];
            $opvyellow6b = $_POST['opvyellow6b'];
            $opvyellow6c = $_POST['opvyellow6c'];
            $opvwhite6a = $_POST['opvwhite6a'];
            $opvwhite6b = $_POST['opvwhite6b'];
            $opvwhite6c = $_POST['opvwhite6c'];
            $opvcombine6a = $_POST['opvcombine6a'];
            $opvcombine6b = $_POST['opvcombine6b'];
            $opvcombine6c = $_POST['opvcombine6c'];
            $grandyellow6a = $_POST['grandyellow6a'];
            $grandyellow6b = $_POST['grandyellow6b'];
            $grandyellow6c = $_POST['grandyellow6c'];
            $grandwhite6a = $_POST['grandwhite6a'];
            $grandwhite6b = $_POST['grandwhite6b'];
            $grandwhite6c = $_POST['grandwhite6c'];
            $grandtotal6a = $_POST['grandtotal6a'];
            $grandtotal6b = $_POST['grandtotal6b'];
            $grandtotal6c = $_POST['grandtotal6c'];

            $barangay7 = $_POST['barangay7'];
            $nooffarmer7 = $_POST['nooffarmer7'];
            $hybridyellow7a = $_POST['hybridyellow7a'];
            $hybridyellow7b = $_POST['hybridyellow7b'];
            $hybridyellow7c = $_POST['hybridyellow7c'];
            $hybridwhite7a = $_POST['hybridwhite7a'];
            $hybridwhite7b = $_POST['hybridwhite7b'];
            $hybridwhite7c = $_POST['hybridwhite7c'];
            $hybridcombine7a = $_POST['hybridcombine7a'];
            $hybridcombine7b = $_POST['hybridcombine7b'];
            $hybridcombine7c = $_POST['hybridcombine7c'];
            $opvyellow7a = $_POST['opvyellow7a'];
            $opvyellow7b = $_POST['opvyellow7b'];
            $opvyellow7c = $_POST['opvyellow7c'];
            $opvwhite7a = $_POST['opvwhite7a'];
            $opvwhite7b = $_POST['opvwhite7b'];
            $opvwhite7c = $_POST['opvwhite7c'];
            $opvcombine7a = $_POST['opvcombine7a'];
            $opvcombine7b = $_POST['opvcombine7b'];
            $opvcombine7c = $_POST['opvcombine7c'];
            $grandyellow7a = $_POST['grandyellow7a'];
            $grandyellow7b = $_POST['grandyellow7b'];
            $grandyellow7c = $_POST['grandyellow7c'];
            $grandwhite7a = $_POST['grandwhite7a'];
            $grandwhite7b = $_POST['grandwhite7b'];
            $grandwhite7c = $_POST['grandwhite7c'];
            $grandtotal7a = $_POST['grandtotal7a'];
            $grandtotal7b = $_POST['grandtotal7b'];
            $grandtotal7c = $_POST['grandtotal7c'];

            $barangay8 = $_POST['barangay8'];
            $nooffarmer8 = $_POST['nooffarmer8'];
            $hybridyellow8a = $_POST['hybridyellow8a'];
            $hybridyellow8b = $_POST['hybridyellow8b'];
            $hybridyellow8c = $_POST['hybridyellow8c'];
            $hybridwhite8a = $_POST['hybridwhite8a'];
            $hybridwhite8b = $_POST['hybridwhite8b'];
            $hybridwhite8c = $_POST['hybridwhite8c'];
            $hybridcombine8a = $_POST['hybridcombine8a'];
            $hybridcombine8b = $_POST['hybridcombine8b'];
            $hybridcombine8c = $_POST['hybridcombine8c'];
            $opvyellow8a = $_POST['opvyellow8a'];
            $opvyellow8b = $_POST['opvyellow8b'];
            $opvyellow8c = $_POST['opvyellow8c'];
            $opvwhite8a = $_POST['opvwhite8a'];
            $opvwhite8b = $_POST['opvwhite8b'];
            $opvwhite8c = $_POST['opvwhite8c'];
            $opvcombine8a = $_POST['opvcombine8a'];
            $opvcombine8b = $_POST['opvcombine8b'];
            $opvcombine8c = $_POST['opvcombine8c'];
            $grandyellow8a = $_POST['grandyellow8a'];
            $grandyellow8b = $_POST['grandyellow8b'];
            $grandyellow8c = $_POST['grandyellow8c'];
            $grandwhite8a = $_POST['grandwhite8a'];
            $grandwhite8b = $_POST['grandwhite8b'];
            $grandwhite8c = $_POST['grandwhite8c'];
            $grandtotal8a = $_POST['grandtotal8a'];
            $grandtotal8b = $_POST['grandtotal8b'];
            $grandtotal8c = $_POST['grandtotal8c'];

            $barangay9 = $_POST['barangay9'];
            $nooffarmer9 = $_POST['nooffarmer9'];
            $hybridyellow9a = $_POST['hybridyellow9a'];
            $hybridyellow9b = $_POST['hybridyellow9b'];
            $hybridyellow9c = $_POST['hybridyellow9c'];
            $hybridwhite9a = $_POST['hybridwhite9a'];
            $hybridwhite9b = $_POST['hybridwhite9b'];
            $hybridwhite9c = $_POST['hybridwhite9c'];
            $hybridcombine9a = $_POST['hybridcombine9a'];
            $hybridcombine9b = $_POST['hybridcombine9b'];
            $hybridcombine9c = $_POST['hybridcombine9c'];
            $opvyellow9a = $_POST['opvyellow9a'];
            $opvyellow9b = $_POST['opvyellow9b'];
            $opvyellow9c = $_POST['opvyellow9c'];
            $opvwhite9a = $_POST['opvwhite9a'];
            $opvwhite9b = $_POST['opvwhite9b'];
            $opvwhite9c = $_POST['opvwhite9c'];
            $opvcombine9a = $_POST['opvcombine9a'];
            $opvcombine9b = $_POST['opvcombine9b'];
            $opvcombine9c = $_POST['opvcombine9c'];
            $grandyellow9a = $_POST['grandyellow9a'];
            $grandyellow9b = $_POST['grandyellow9b'];
            $grandyellow9c = $_POST['grandyellow9c'];
            $grandwhite9a = $_POST['grandwhite9a'];
            $grandwhite9b = $_POST['grandwhite9b'];
            $grandwhite9c = $_POST['grandwhite9c'];
            $grandtotal9a = $_POST['grandtotal9a'];
            $grandtotal9b = $_POST['grandtotal9b'];
            $grandtotal9c = $_POST['grandtotal9c'];

            $barangay10 = $_POST['barangay10'];
            $nooffarmer10 = $_POST['nooffarmer10'];
            $hybridyellow10a = $_POST['hybridyellow10a'];
            $hybridyellow10b = $_POST['hybridyellow10b'];
            $hybridyellow10c = $_POST['hybridyellow10c'];
            $hybridwhite10a = $_POST['hybridwhite10a'];
            $hybridwhite10b = $_POST['hybridwhite10b'];
            $hybridwhite10c = $_POST['hybridwhite10c'];
            $hybridcombine10a = $_POST['hybridcombine10a'];
            $hybridcombine10b = $_POST['hybridcombine10b'];
            $hybridcombine10c = $_POST['hybridcombine10c'];
            $opvyellow10a = $_POST['opvyellow10a'];
            $opvyellow10b = $_POST['opvyellow10b'];
            $opvyellow10c = $_POST['opvyellow10c'];
            $opvwhite10a = $_POST['opvwhite10a'];
            $opvwhite10b = $_POST['opvwhite10b'];
            $opvwhite10c = $_POST['opvwhite10c'];
            $opvcombine10a = $_POST['opvcombine10a'];
            $opvcombine10b = $_POST['opvcombine10b'];
            $opvcombine10c = $_POST['opvcombine10c'];
            $grandyellow10a = $_POST['grandyellow10a'];
            $grandyellow10b = $_POST['grandyellow10b'];
            $grandyellow10c = $_POST['grandyellow10c'];
            $grandwhite10a = $_POST['grandwhite10a'];
            $grandwhite10b = $_POST['grandwhite10b'];
            $grandwhite10c = $_POST['grandwhite10c'];
            $grandtotal10a = $_POST['grandtotal10a'];
            $grandtotal10b = $_POST['grandtotal10b'];
            $grandtotal10c = $_POST['grandtotal10c'];

            $barangay11 = $_POST['barangay11'];
            $nooffarmer11 = $_POST['nooffarmer11'];
            $hybridyellow11a = $_POST['hybridyellow11a'];
            $hybridyellow11b = $_POST['hybridyellow11b'];
            $hybridyellow11c = $_POST['hybridyellow11c'];
            $hybridwhite11a = $_POST['hybridwhite11a'];
            $hybridwhite11b = $_POST['hybridwhite11b'];
            $hybridwhite11c = $_POST['hybridwhite11c'];
            $hybridcombine11a = $_POST['hybridcombine11a'];
            $hybridcombine11b = $_POST['hybridcombine11b'];
            $hybridcombine11c = $_POST['hybridcombine11c'];
            $opvyellow11a = $_POST['opvyellow11a'];
            $opvyellow11b = $_POST['opvyellow11b'];
            $opvyellow11c = $_POST['opvyellow11c'];
            $opvwhite11a = $_POST['opvwhite11a'];
            $opvwhite11b = $_POST['opvwhite11b'];
            $opvwhite11c = $_POST['opvwhite11c'];
            $opvcombine11a = $_POST['opvcombine11a'];
            $opvcombine11b = $_POST['opvcombine11b'];
            $opvcombine11c = $_POST['opvcombine11c'];
            $grandyellow11a = $_POST['grandyellow11a'];
            $grandyellow11b = $_POST['grandyellow11b'];
            $grandyellow11c = $_POST['grandyellow11c'];
            $grandwhite11a = $_POST['grandwhite11a'];
            $grandwhite11b = $_POST['grandwhite11b'];
            $grandwhite11c = $_POST['grandwhite11c'];
            $grandtotal11a = $_POST['grandtotal11a'];
            $grandtotal11b = $_POST['grandtotal11b'];
            $grandtotal11c = $_POST['grandtotal11c'];

            $barangay12 = $_POST['barangay12'];
            $nooffarmer12 = $_POST['nooffarmer12'];
            $hybridyellow12a = $_POST['hybridyellow12a'];
            $hybridyellow12b = $_POST['hybridyellow12b'];
            $hybridyellow12c = $_POST['hybridyellow12c'];
            $hybridwhite12a = $_POST['hybridwhite12a'];
            $hybridwhite12b = $_POST['hybridwhite12b'];
            $hybridwhite12c = $_POST['hybridwhite12c'];
            $hybridcombine12a = $_POST['hybridcombine12a'];
            $hybridcombine12b = $_POST['hybridcombine12b'];
            $hybridcombine12c = $_POST['hybridcombine12c'];
            $opvyellow12a = $_POST['opvyellow12a'];
            $opvyellow12b = $_POST['opvyellow12b'];
            $opvyellow12c = $_POST['opvyellow12c'];
            $opvwhite12a = $_POST['opvwhite12a'];
            $opvwhite12b = $_POST['opvwhite12b'];
            $opvwhite12c = $_POST['opvwhite12c'];
            $opvcombine12a = $_POST['opvcombine12a'];
            $opvcombine12b = $_POST['opvcombine12b'];
            $opvcombine12c = $_POST['opvcombine12c'];
            $grandyellow12a = $_POST['grandyellow12a'];
            $grandyellow12b = $_POST['grandyellow12b'];
            $grandyellow12c = $_POST['grandyellow12c'];
            $grandwhite12a = $_POST['grandwhite12a'];
            $grandwhite12b = $_POST['grandwhite12b'];
            $grandwhite12c = $_POST['grandwhite12c'];
            $grandtotal12a = $_POST['grandtotal12a'];
            $grandtotal12b = $_POST['grandtotal12b'];
            $grandtotal12c = $_POST['grandtotal12c'];

            $barangay13 = $_POST['barangay13'];
            $nooffarmer13 = $_POST['nooffarmer13'];
            $hybridyellow13a = $_POST['hybridyellow13a'];
            $hybridyellow13b = $_POST['hybridyellow13b'];
            $hybridyellow13c = $_POST['hybridyellow13c'];
            $hybridwhite13a = $_POST['hybridwhite13a'];
            $hybridwhite13b = $_POST['hybridwhite13b'];
            $hybridwhite13c = $_POST['hybridwhite13c'];
            $hybridcombine13a = $_POST['hybridcombine13a'];
            $hybridcombine13b = $_POST['hybridcombine13b'];
            $hybridcombine13c = $_POST['hybridcombine13c'];
            $opvyellow13a = $_POST['opvyellow13a'];
            $opvyellow13b = $_POST['opvyellow13b'];
            $opvyellow13c = $_POST['opvyellow13c'];
            $opvwhite13a = $_POST['opvwhite13a'];
            $opvwhite13b = $_POST['opvwhite13b'];
            $opvwhite13c = $_POST['opvwhite13c'];
            $opvcombine13a = $_POST['opvcombine13a'];
            $opvcombine13b = $_POST['opvcombine13b'];
            $opvcombine13c = $_POST['opvcombine13c'];
            $grandyellow13a = $_POST['grandyellow13a'];
            $grandyellow13b = $_POST['grandyellow13b'];
            $grandyellow13c = $_POST['grandyellow13c'];
            $grandwhite13a = $_POST['grandwhite13a'];
            $grandwhite13b = $_POST['grandwhite13b'];
            $grandwhite13c = $_POST['grandwhite13c'];
            $grandtotal13a = $_POST['grandtotal13a'];
            $grandtotal13b = $_POST['grandtotal13b'];
            $grandtotal13c = $_POST['grandtotal13c'];

            $barangay14 = $_POST['barangay14'];
            $nooffarmer14 = $_POST['nooffarmer14'];
            $hybridyellow14a = $_POST['hybridyellow14a'];
            $hybridyellow14b = $_POST['hybridyellow14b'];
            $hybridyellow14c = $_POST['hybridyellow14c'];
            $hybridwhite14a = $_POST['hybridwhite14a'];
            $hybridwhite14b = $_POST['hybridwhite14b'];
            $hybridwhite14c = $_POST['hybridwhite14c'];
            $hybridcombine14a = $_POST['hybridcombine14a'];
            $hybridcombine14b = $_POST['hybridcombine14b'];
            $hybridcombine14c = $_POST['hybridcombine14c'];
            $opvyellow14a = $_POST['opvyellow14a'];
            $opvyellow14b = $_POST['opvyellow14b'];
            $opvyellow14c = $_POST['opvyellow14c'];
            $opvwhite14a = $_POST['opvwhite14a'];
            $opvwhite14b = $_POST['opvwhite14b'];
            $opvwhite14c = $_POST['opvwhite14c'];
            $opvcombine14a = $_POST['opvcombine14a'];
            $opvcombine14b = $_POST['opvcombine14b'];
            $opvcombine14c = $_POST['opvcombine14c'];
            $grandyellow14a = $_POST['grandyellow14a'];
            $grandyellow14b = $_POST['grandyellow14b'];
            $grandyellow14c = $_POST['grandyellow14c'];
            $grandwhite14a = $_POST['grandwhite14a'];
            $grandwhite14b = $_POST['grandwhite14b'];
            $grandwhite14c = $_POST['grandwhite14c'];
            $grandtotal14a = $_POST['grandtotal14a'];
            $grandtotal14b = $_POST['grandtotal14b'];
            $grandtotal14c = $_POST['grandtotal14c'];

            $barangay15 = $_POST['barangay15'];
            $nooffarmer15 = $_POST['nooffarmer15'];
            $hybridyellow15a = $_POST['hybridyellow15a'];
            $hybridyellow15b = $_POST['hybridyellow15b'];
            $hybridyellow15c = $_POST['hybridyellow15c'];
            $hybridwhite15a = $_POST['hybridwhite15a'];
            $hybridwhite15b = $_POST['hybridwhite15b'];
            $hybridwhite15c = $_POST['hybridwhite15c'];
            $hybridcombine15a = $_POST['hybridcombine15a'];
            $hybridcombine15b = $_POST['hybridcombine15b'];
            $hybridcombine15c = $_POST['hybridcombine15c'];
            $opvyellow15a = $_POST['opvyellow15a'];
            $opvyellow15b = $_POST['opvyellow15b'];
            $opvyellow15c = $_POST['opvyellow15c'];
            $opvwhite15a = $_POST['opvwhite15a'];
            $opvwhite15b = $_POST['opvwhite15b'];
            $opvwhite15c = $_POST['opvwhite15c'];
            $opvcombine15a = $_POST['opvcombine15a'];
            $opvcombine15b = $_POST['opvcombine15b'];
            $opvcombine15c = $_POST['opvcombine15c'];
            $grandyellow15a = $_POST['grandyellow15a'];
            $grandyellow15b = $_POST['grandyellow15b'];
            $grandyellow15c = $_POST['grandyellow15c'];
            $grandwhite15a = $_POST['grandwhite15a'];
            $grandwhite15b = $_POST['grandwhite15b'];
            $grandwhite15c = $_POST['grandwhite15c'];
            $grandtotal15a = $_POST['grandtotal15a'];
            $grandtotal15b = $_POST['grandtotal15b'];
            $grandtotal15c = $_POST['grandtotal15c'];

            $barangay16 = $_POST['barangay16'];
            $nooffarmer16 = $_POST['nooffarmer16'];
            $hybridyellow16a = $_POST['hybridyellow16a'];
            $hybridyellow16b = $_POST['hybridyellow16b'];
            $hybridyellow16c = $_POST['hybridyellow16c'];
            $hybridwhite16a = $_POST['hybridwhite16a'];
            $hybridwhite16b = $_POST['hybridwhite16b'];
            $hybridwhite16c = $_POST['hybridwhite16c'];
            $hybridcombine16a = $_POST['hybridcombine16a'];
            $hybridcombine16b = $_POST['hybridcombine16b'];
            $hybridcombine16c = $_POST['hybridcombine16c'];
            $opvyellow16a = $_POST['opvyellow16a'];
            $opvyellow16b = $_POST['opvyellow16b'];
            $opvyellow16c = $_POST['opvyellow16c'];
            $opvwhite16a = $_POST['opvwhite16a'];
            $opvwhite16b = $_POST['opvwhite16b'];
            $opvwhite16c = $_POST['opvwhite16c'];
            $opvcombine16a = $_POST['opvcombine16a'];
            $opvcombine16b = $_POST['opvcombine16b'];
            $opvcombine16c = $_POST['opvcombine16c'];
            $grandyellow16a = $_POST['grandyellow16a'];
            $grandyellow16b = $_POST['grandyellow16b'];
            $grandyellow16c = $_POST['grandyellow16c'];
            $grandwhite16a = $_POST['grandwhite16a'];
            $grandwhite16b = $_POST['grandwhite16b'];
            $grandwhite16c = $_POST['grandwhite16c'];
            $grandtotal16a = $_POST['grandtotal16a'];
            $grandtotal16b = $_POST['grandtotal16b'];
            $grandtotal16c = $_POST['grandtotal16c'];

            $barangay17 = $_POST['barangay17'];
            $nooffarmer17 = $_POST['nooffarmer17'];
            $hybridyellow17a = $_POST['hybridyellow17a'];
            $hybridyellow17b = $_POST['hybridyellow17b'];
            $hybridyellow17c = $_POST['hybridyellow17c'];
            $hybridwhite17a = $_POST['hybridwhite17a'];
            $hybridwhite17b = $_POST['hybridwhite17b'];
            $hybridwhite17c = $_POST['hybridwhite17c'];
            $hybridcombine17a = $_POST['hybridcombine17a'];
            $hybridcombine17b = $_POST['hybridcombine17b'];
            $hybridcombine17c = $_POST['hybridcombine17c'];
            $opvyellow17a = $_POST['opvyellow17a'];
            $opvyellow17b = $_POST['opvyellow17b'];
            $opvyellow17c = $_POST['opvyellow17c'];
            $opvwhite17a = $_POST['opvwhite17a'];
            $opvwhite17b = $_POST['opvwhite17b'];
            $opvwhite17c = $_POST['opvwhite17c'];
            $opvcombine17a = $_POST['opvcombine17a'];
            $opvcombine17b = $_POST['opvcombine17b'];
            $opvcombine17c = $_POST['opvcombine17c'];
            $grandyellow17a = $_POST['grandyellow17a'];
            $grandyellow17b = $_POST['grandyellow17b'];
            $grandyellow17c = $_POST['grandyellow17c'];
            $grandwhite17a = $_POST['grandwhite17a'];
            $grandwhite17b = $_POST['grandwhite17b'];
            $grandwhite17c = $_POST['grandwhite17c'];
            $grandtotal17a = $_POST['grandtotal17a'];
            $grandtotal17b = $_POST['grandtotal17b'];
            $grandtotal17c = $_POST['grandtotal17c'];

            $barangay18 = $_POST['barangay18'];
            $nooffarmer18 = $_POST['nooffarmer18'];
            $hybridyellow18a = $_POST['hybridyellow18a'];
            $hybridyellow18b = $_POST['hybridyellow18b'];
            $hybridyellow18c = $_POST['hybridyellow18c'];
            $hybridwhite18a = $_POST['hybridwhite18a'];
            $hybridwhite18b = $_POST['hybridwhite18b'];
            $hybridwhite18c = $_POST['hybridwhite18c'];
            $hybridcombine18a = $_POST['hybridcombine18a'];
            $hybridcombine18b = $_POST['hybridcombine18b'];
            $hybridcombine18c = $_POST['hybridcombine18c'];
            $opvyellow18a = $_POST['opvyellow18a'];
            $opvyellow18b = $_POST['opvyellow18b'];
            $opvyellow18c = $_POST['opvyellow18c'];
            $opvwhite18a = $_POST['opvwhite18a'];
            $opvwhite18b = $_POST['opvwhite18b'];
            $opvwhite18c = $_POST['opvwhite18c'];
            $opvcombine18a = $_POST['opvcombine18a'];
            $opvcombine18b = $_POST['opvcombine18b'];
            $opvcombine18c = $_POST['opvcombine18c'];
            $grandyellow18a = $_POST['grandyellow18a'];
            $grandyellow18b = $_POST['grandyellow18b'];
            $grandyellow18c = $_POST['grandyellow18c'];
            $grandwhite18a = $_POST['grandwhite18a'];
            $grandwhite18b = $_POST['grandwhite18b'];
            $grandwhite18c = $_POST['grandwhite18c'];
            $grandtotal18a = $_POST['grandtotal18a'];
            $grandtotal18b = $_POST['grandtotal18b'];
            $grandtotal18c = $_POST['grandtotal18c'];

            $barangay19 = $_POST['barangay19'];
            $nooffarmer19 = $_POST['nooffarmer19'];
            $hybridyellow19a = $_POST['hybridyellow19a'];
            $hybridyellow19b = $_POST['hybridyellow19b'];
            $hybridyellow19c = $_POST['hybridyellow19c'];
            $hybridwhite19a = $_POST['hybridwhite19a'];
            $hybridwhite19b = $_POST['hybridwhite19b'];
            $hybridwhite19c = $_POST['hybridwhite19c'];
            $hybridcombine19a = $_POST['hybridcombine19a'];
            $hybridcombine19b = $_POST['hybridcombine19b'];
            $hybridcombine19c = $_POST['hybridcombine19c'];
            $opvyellow19a = $_POST['opvyellow19a'];
            $opvyellow19b = $_POST['opvyellow19b'];
            $opvyellow19c = $_POST['opvyellow19c'];
            $opvwhite19a = $_POST['opvwhite19a'];
            $opvwhite19b = $_POST['opvwhite19b'];
            $opvwhite19c = $_POST['opvwhite19c'];
            $opvcombine19a = $_POST['opvcombine19a'];
            $opvcombine19b = $_POST['opvcombine19b'];
            $opvcombine19c = $_POST['opvcombine19c'];
            $grandyellow19a = $_POST['grandyellow19a'];
            $grandyellow19b = $_POST['grandyellow19b'];
            $grandyellow19c = $_POST['grandyellow19c'];
            $grandwhite19a = $_POST['grandwhite19a'];
            $grandwhite19b = $_POST['grandwhite19b'];
            $grandwhite19c = $_POST['grandwhite19c'];
            $grandtotal19a = $_POST['grandtotal19a'];
            $grandtotal19b = $_POST['grandtotal19b'];
            $grandtotal19c = $_POST['grandtotal19c'];

            $barangay20 = $_POST['barangay20'];
            $nooffarmer20 = $_POST['nooffarmer20'];
            $hybridyellow20a = $_POST['hybridyellow20a'];
            $hybridyellow20b = $_POST['hybridyellow20b'];
            $hybridyellow20c = $_POST['hybridyellow20c'];
            $hybridwhite20a = $_POST['hybridwhite20a'];
            $hybridwhite20b = $_POST['hybridwhite20b'];
            $hybridwhite20c = $_POST['hybridwhite20c'];
            $hybridcombine20a = $_POST['hybridcombine20a'];
            $hybridcombine20b = $_POST['hybridcombine20b'];
            $hybridcombine20c = $_POST['hybridcombine20c'];
            $opvyellow20a = $_POST['opvyellow20a'];
            $opvyellow20b = $_POST['opvyellow20b'];
            $opvyellow20c = $_POST['opvyellow20c'];
            $opvwhite20a = $_POST['opvwhite20a'];
            $opvwhite20b = $_POST['opvwhite20b'];
            $opvwhite20c = $_POST['opvwhite20c'];
            $opvcombine20a = $_POST['opvcombine20a'];
            $opvcombine20b = $_POST['opvcombine20b'];
            $opvcombine20c = $_POST['opvcombine20c'];
            $grandyellow20a = $_POST['grandyellow20a'];
            $grandyellow20b = $_POST['grandyellow20b'];
            $grandyellow20c = $_POST['grandyellow20c'];
            $grandwhite20a = $_POST['grandwhite20a'];
            $grandwhite20b = $_POST['grandwhite20b'];
            $grandwhite20c = $_POST['grandwhite20c'];
            $grandtotal20a = $_POST['grandtotal20a'];
            $grandtotal20b = $_POST['grandtotal20b'];
            $grandtotal20c = $_POST['grandtotal20c'];

            $barangay21 = $_POST['barangay21'];
            $nooffarmer21 = $_POST['nooffarmer21'];
            $hybridyellow21a = $_POST['hybridyellow21a'];
            $hybridyellow21b = $_POST['hybridyellow21b'];
            $hybridyellow21c = $_POST['hybridyellow21c'];
            $hybridwhite21a = $_POST['hybridwhite21a'];
            $hybridwhite21b = $_POST['hybridwhite21b'];
            $hybridwhite21c = $_POST['hybridwhite21c'];
            $hybridcombine21a = $_POST['hybridcombine21a'];
            $hybridcombine21b = $_POST['hybridcombine21b'];
            $hybridcombine21c = $_POST['hybridcombine21c'];
            $opvyellow21a = $_POST['opvyellow21a'];
            $opvyellow21b = $_POST['opvyellow21b'];
            $opvyellow21c = $_POST['opvyellow21c'];
            $opvwhite21a = $_POST['opvwhite21a'];
            $opvwhite21b = $_POST['opvwhite21b'];
            $opvwhite21c = $_POST['opvwhite21c'];
            $opvcombine21a = $_POST['opvcombine21a'];
            $opvcombine21b = $_POST['opvcombine21b'];
            $opvcombine21c = $_POST['opvcombine21c'];
            $grandyellow21a = $_POST['grandyellow21a'];
            $grandyellow21b = $_POST['grandyellow21b'];
            $grandyellow21c = $_POST['grandyellow21c'];
            $grandwhite21a = $_POST['grandwhite21a'];
            $grandwhite21b = $_POST['grandwhite21b'];
            $grandwhite21c = $_POST['grandwhite21c'];
            $grandtotal21a = $_POST['grandtotal21a'];
            $grandtotal21b = $_POST['grandtotal21b'];
            $grandtotal21c = $_POST['grandtotal21c'];

            $barangay22 = $_POST['barangay22'];
            $nooffarmer22 = $_POST['nooffarmer22'];
            $hybridyellow22a = $_POST['hybridyellow22a'];
            $hybridyellow22b = $_POST['hybridyellow22b'];
            $hybridyellow22c = $_POST['hybridyellow22c'];
            $hybridwhite22a = $_POST['hybridwhite22a'];
            $hybridwhite22b = $_POST['hybridwhite22b'];
            $hybridwhite22c = $_POST['hybridwhite22c'];
            $hybridcombine22a = $_POST['hybridcombine22a'];
            $hybridcombine22b = $_POST['hybridcombine22b'];
            $hybridcombine22c = $_POST['hybridcombine22c'];
            $opvyellow22a = $_POST['opvyellow22a'];
            $opvyellow22b = $_POST['opvyellow22b'];
            $opvyellow22c = $_POST['opvyellow22c'];
            $opvwhite22a = $_POST['opvwhite22a'];
            $opvwhite22b = $_POST['opvwhite22b'];
            $opvwhite22c = $_POST['opvwhite22c'];
            $opvcombine22a = $_POST['opvcombine22a'];
            $opvcombine22b = $_POST['opvcombine22b'];
            $opvcombine22c = $_POST['opvcombine22c'];
            $grandyellow22a = $_POST['grandyellow22a'];
            $grandyellow22b = $_POST['grandyellow22b'];
            $grandyellow22c = $_POST['grandyellow22c'];
            $grandwhite22a = $_POST['grandwhite22a'];
            $grandwhite22b = $_POST['grandwhite22b'];
            $grandwhite22c = $_POST['grandwhite22c'];
            $grandtotal22a = $_POST['grandtotal22a'];
            $grandtotal22b = $_POST['grandtotal22b'];
            $grandtotal22c = $_POST['grandtotal22c'];

            $barangay23 = $_POST['barangay23'];
            $nooffarmer23 = $_POST['nooffarmer23'];
            $hybridyellow23a = $_POST['hybridyellow23a'];
            $hybridyellow23b = $_POST['hybridyellow23b'];
            $hybridyellow23c = $_POST['hybridyellow23c'];
            $hybridwhite23a = $_POST['hybridwhite23a'];
            $hybridwhite23b = $_POST['hybridwhite23b'];
            $hybridwhite23c = $_POST['hybridwhite23c'];
            $hybridcombine23a = $_POST['hybridcombine23a'];
            $hybridcombine23b = $_POST['hybridcombine23b'];
            $hybridcombine23c = $_POST['hybridcombine23c'];
            $opvyellow23a = $_POST['opvyellow23a'];
            $opvyellow23b = $_POST['opvyellow23b'];
            $opvyellow23c = $_POST['opvyellow23c'];
            $opvwhite23a = $_POST['opvwhite23a'];
            $opvwhite23b = $_POST['opvwhite23b'];
            $opvwhite23c = $_POST['opvwhite23c'];
            $opvcombine23a = $_POST['opvcombine23a'];
            $opvcombine23b = $_POST['opvcombine23b'];
            $opvcombine23c = $_POST['opvcombine23c'];
            $grandyellow23a = $_POST['grandyellow23a'];
            $grandyellow23b = $_POST['grandyellow23b'];
            $grandyellow23c = $_POST['grandyellow23c'];
            $grandwhite23a = $_POST['grandwhite23a'];
            $grandwhite23b = $_POST['grandwhite23b'];
            $grandwhite23c = $_POST['grandwhite23c'];
            $grandtotal23a = $_POST['grandtotal23a'];
            $grandtotal23b = $_POST['grandtotal23b'];
            $grandtotal23c = $_POST['grandtotal23c'];

            $barangay24 = $_POST['barangay24'];
            $nooffarmer24 = $_POST['nooffarmer24'];
            $hybridyellow24a = $_POST['hybridyellow24a'];
            $hybridyellow24b = $_POST['hybridyellow24b'];
            $hybridyellow24c = $_POST['hybridyellow24c'];
            $hybridwhite24a = $_POST['hybridwhite24a'];
            $hybridwhite24b = $_POST['hybridwhite24b'];
            $hybridwhite24c = $_POST['hybridwhite24c'];
            $hybridcombine24a = $_POST['hybridcombine24a'];
            $hybridcombine24b = $_POST['hybridcombine24b'];
            $hybridcombine24c = $_POST['hybridcombine24c'];
            $opvyellow24a = $_POST['opvyellow24a'];
            $opvyellow24b = $_POST['opvyellow24b'];
            $opvyellow24c = $_POST['opvyellow24c'];
            $opvwhite24a = $_POST['opvwhite24a'];
            $opvwhite24b = $_POST['opvwhite24b'];
            $opvwhite24c = $_POST['opvwhite24c'];
            $opvcombine24a = $_POST['opvcombine24a'];
            $opvcombine24b = $_POST['opvcombine24b'];
            $opvcombine24c = $_POST['opvcombine24c'];
            $grandyellow24a = $_POST['grandyellow24a'];
            $grandyellow24b = $_POST['grandyellow24b'];
            $grandyellow24c = $_POST['grandyellow24c'];
            $grandwhite24a = $_POST['grandwhite24a'];
            $grandwhite24b = $_POST['grandwhite24b'];
            $grandwhite24c = $_POST['grandwhite24c'];
            $grandtotal24a = $_POST['grandtotal24a'];
            $grandtotal24b = $_POST['grandtotal24b'];
            $grandtotal24c = $_POST['grandtotal24c'];

            $barangay25 = $_POST['barangay25'];
            $nooffarmer25 = $_POST['nooffarmer25'];
            $hybridyellow25a = $_POST['hybridyellow25a'];
            $hybridyellow25b = $_POST['hybridyellow25b'];
            $hybridyellow25c = $_POST['hybridyellow25c'];
            $hybridwhite25a = $_POST['hybridwhite25a'];
            $hybridwhite25b = $_POST['hybridwhite25b'];
            $hybridwhite25c = $_POST['hybridwhite25c'];
            $hybridcombine25a = $_POST['hybridcombine25a'];
            $hybridcombine25b = $_POST['hybridcombine25b'];
            $hybridcombine25c = $_POST['hybridcombine25c'];
            $opvyellow25a = $_POST['opvyellow25a'];
            $opvyellow25b = $_POST['opvyellow25b'];
            $opvyellow25c = $_POST['opvyellow25c'];
            $opvwhite25a = $_POST['opvwhite25a'];
            $opvwhite25b = $_POST['opvwhite25b'];
            $opvwhite25c = $_POST['opvwhite25c'];
            $opvcombine25a = $_POST['opvcombine25a'];
            $opvcombine25b = $_POST['opvcombine25b'];
            $opvcombine25c = $_POST['opvcombine25c'];
            $grandyellow25a = $_POST['grandyellow25a'];
            $grandyellow25b = $_POST['grandyellow25b'];
            $grandyellow25c = $_POST['grandyellow25c'];
            $grandwhite25a = $_POST['grandwhite25a'];
            $grandwhite25b = $_POST['grandwhite25b'];
            $grandwhite25c = $_POST['grandwhite25c'];
            $grandtotal25a = $_POST['grandtotal25a'];
            $grandtotal25b = $_POST['grandtotal25b'];
            $grandtotal25c = $_POST['grandtotal25c'];

            if($nooffarmer1 != "" || $nooffarmer1 != "0")
                {
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay1."','".$reporttype."','".$geocode."','".$hybridyellow1a."','".$hybridyellow1b."','".$hybridyellow1c."','".$hybridwhite1a."','".$hybridwhite1b."','".$hybridwhite1c."','".$hybridcombine1a."','".$hybridcombine1b."','".$hybridcombine1c."','".$opvyellow1a."','".$opvyellow1b."','".$opvyellow1c."','".$opvwhite1a."','".$opvwhite1b."',,'".$opvwhite1c."','".$opvcombine1a."','".$opvcombine1b."','".$opvcombine1c."','".$grandyellow1a."','".$grandyellow1b."','".$grandyellow1c."','".$grandwhite1a."','".$grandwhite1b."','".$grandwhite1c."','".$grandtotal1a."','".$grandtotal1b."','".$grandtotal1c."','".$fromdate."','".$todate."')";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay2."','".$reporttype."','".$geocode."','".$hybridyellow2a."','".$hybridyellow2b."','".$hybridyellow2c."','".$hybridwhite2a."','".$hybridwhite2b."','".$hybridwhite2c."','".$hybridcombine2a."','".$hybridcombine2b."','".$hybridcombine2c."','".$opvyellow2a."','".$opvyellow2b."','".$opvyellow2c."','".$opvwhite2a."','".$opvwhite2b."',,'".$opvwhite2c."','".$opvcombine2a."','".$opvcombine2b."','".$opvcombine2c."','".$grandyellow2a."','".$grandyellow2b."','".$grandyellow2c."','".$grandwhite2a."','".$grandwhite2b."','".$grandwhite2c."','".$grandtotal2a."','".$grandtotal2b."','".$grandtotal2c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay3."','".$reporttype."','".$geocode."','".$hybridyellow3a."','".$hybridyellow3b."','".$hybridyellow3c."','".$hybridwhite3a."','".$hybridwhite3b."','".$hybridwhite3c."','".$hybridcombine3a."','".$hybridcombine3b."','".$hybridcombine3c."','".$opvyellow3a."','".$opvyellow3b."','".$opvyellow3c."','".$opvwhite3a."','".$opvwhite3b."',,'".$opvwhite3c."','".$opvcombine3a."','".$opvcombine3b."','".$opvcombine3c."','".$grandyellow3a."','".$grandyellow3b."','".$grandyellow3c."','".$grandwhite3a."','".$grandwhite3b."','".$grandwhite3c."','".$grandtotal3a."','".$grandtotal3b."','".$grandtotal3c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay4."','".$reporttype."','".$geocode."','".$hybridyellow4a."','".$hybridyellow4b."','".$hybridyellow4c."','".$hybridwhite4a."','".$hybridwhite4b."','".$hybridwhite4c."','".$hybridcombine4a."','".$hybridcombine4b."','".$hybridcombine4c."','".$opvyellow4a."','".$opvyellow4b."','".$opvyellow4c."','".$opvwhite4a."','".$opvwhite4b."',,'".$opvwhite4c."','".$opvcombine4a."','".$opvcombine4b."','".$opvcombine4c."','".$grandyellow4a."','".$grandyellow4b."','".$grandyellow4c."','".$grandwhite4a."','".$grandwhite4b."','".$grandwhite4c."','".$grandtotal4a."','".$grandtotal4b."','".$grandtotal4c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay5."','".$reporttype."','".$geocode."','".$hybridyellow5a."','".$hybridyellow5b."','".$hybridyellow5c."','".$hybridwhite5a."','".$hybridwhite5b."','".$hybridwhite5c."','".$hybridcombine5a."','".$hybridcombine5b."','".$hybridcombine5c."','".$opvyellow5a."','".$opvyellow5b."','".$opvyellow5c."','".$opvwhite5a."','".$opvwhite5b."',,'".$opvwhite5c."','".$opvcombine5a."','".$opvcombine5b."','".$opvcombine5c."','".$grandyellow5a."','".$grandyellow5b."','".$grandyellow5c."','".$grandwhite5a."','".$grandwhite5b."','".$grandwhite5c."','".$grandtotal5a."','".$grandtotal5b."','".$grandtotal5c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay6."','".$reporttype."','".$geocode."','".$hybridyellow6a."','".$hybridyellow6b."','".$hybridyellow6c."','".$hybridwhite6a."','".$hybridwhite6b."','".$hybridwhite6c."','".$hybridcombine6a."','".$hybridcombine6b."','".$hybridcombine6c."','".$opvyellow6a."','".$opvyellow6b."','".$opvyellow6c."','".$opvwhite6a."','".$opvwhite6b."',,'".$opvwhite6c."','".$opvcombine6a."','".$opvcombine6b."','".$opvcombine6c."','".$grandyellow6a."','".$grandyellow6b."','".$grandyellow6c."','".$grandwhite6a."','".$grandwhite6b."','".$grandwhite6c."','".$grandtotal6a."','".$grandtotal6b."','".$grandtotal6c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay7."','".$reporttype."','".$geocode."','".$hybridyellow7a."','".$hybridyellow7b."','".$hybridyellow7c."','".$hybridwhite7a."','".$hybridwhite7b."','".$hybridwhite7c."','".$hybridcombine7a."','".$hybridcombine7b."','".$hybridcombine7c."','".$opvyellow7a."','".$opvyellow7b."','".$opvyellow7c."','".$opvwhite7a."','".$opvwhite7b."',,'".$opvwhite7c."','".$opvcombine7a."','".$opvcombine7b."','".$opvcombine7c."','".$grandyellow7a."','".$grandyellow7b."','".$grandyellow7c."','".$grandwhite7a."','".$grandwhite7b."','".$grandwhite7c."','".$grandtotal7a."','".$grandtotal7b."','".$grandtotal7c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay8."','".$reporttype."','".$geocode."','".$hybridyellow8a."','".$hybridyellow8b."','".$hybridyellow8c."','".$hybridwhite8a."','".$hybridwhite8b."','".$hybridwhite8c."','".$hybridcombine8a."','".$hybridcombine8b."','".$hybridcombine8c."','".$opvyellow8a."','".$opvyellow8b."','".$opvyellow8c."','".$opvwhite8a."','".$opvwhite8b."',,'".$opvwhite8c."','".$opvcombine8a."','".$opvcombine8b."','".$opvcombine8c."','".$grandyellow8a."','".$grandyellow8b."','".$grandyellow8c."','".$grandwhite8a."','".$grandwhite8b."','".$grandwhite8c."','".$grandtotal8a."','".$grandtotal8b."','".$grandtotal8c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay9."','".$reporttype."','".$geocode."','".$hybridyellow9a."','".$hybridyellow9b."','".$hybridyellow9c."','".$hybridwhite9a."','".$hybridwhite9b."','".$hybridwhite9c."','".$hybridcombine9a."','".$hybridcombine9b."','".$hybridcombine9c."','".$opvyellow9a."','".$opvyellow9b."','".$opvyellow9c."','".$opvwhite9a."','".$opvwhite9b."',,'".$opvwhite9c."','".$opvcombine9a."','".$opvcombine9b."','".$opvcombine9c."','".$grandyellow9a."','".$grandyellow9b."','".$grandyellow9c."','".$grandwhite9a."','".$grandwhite9b."','".$grandwhite9c."','".$grandtotal9a."','".$grandtotal9b."','".$grandtotal9c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay10."','".$reporttype."','".$geocode."','".$hybridyellow10a."','".$hybridyellow10b."','".$hybridyellow10c."','".$hybridwhite10a."','".$hybridwhite10b."','".$hybridwhite10c."','".$hybridcombine10a."','".$hybridcombine10b."','".$hybridcombine10c."','".$opvyellow10a."','".$opvyellow10b."','".$opvyellow10c."','".$opvwhite10a."','".$opvwhite10b."',,'".$opvwhite10c."','".$opvcombine10a."','".$opvcombine10b."','".$opvcombine10c."','".$grandyellow10a."','".$grandyellow10b."','".$grandyellow10c."','".$grandwhite10a."','".$grandwhite10b."','".$grandwhite10c."','".$grandtotal10a."','".$grandtotal10b."','".$grandtotal10c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay11."','".$reporttype."','".$geocode."','".$hybridyellow11a."','".$hybridyellow11b."','".$hybridyellow11c."','".$hybridwhite11a."','".$hybridwhite11b."','".$hybridwhite11c."','".$hybridcombine11a."','".$hybridcombine11b."','".$hybridcombine11c."','".$opvyellow11a."','".$opvyellow11b."','".$opvyellow11c."','".$opvwhite11a."','".$opvwhite11b."',,'".$opvwhite11c."','".$opvcombine11a."','".$opvcombine11b."','".$opvcombine11c."','".$grandyellow11a."','".$grandyellow11b."','".$grandyellow11c."','".$grandwhite11a."','".$grandwhite11b."','".$grandwhite11c."','".$grandtotal11a."','".$grandtotal11b."','".$grandtotal11c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay12."','".$reporttype."','".$geocode."','".$hybridyellow12a."','".$hybridyellow12b."','".$hybridyellow12c."','".$hybridwhite12a."','".$hybridwhite12b."','".$hybridwhite12c."','".$hybridcombine12a."','".$hybridcombine12b."','".$hybridcombine12c."','".$opvyellow12a."','".$opvyellow12b."','".$opvyellow12c."','".$opvwhite12a."','".$opvwhite12b."',,'".$opvwhite12c."','".$opvcombine12a."','".$opvcombine12b."','".$opvcombine12c."','".$grandyellow12a."','".$grandyellow12b."','".$grandyellow12c."','".$grandwhite12a."','".$grandwhite12b."','".$grandwhite12c."','".$grandtotal12a."','".$grandtotal12b."','".$grandtotal12c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay13."','".$reporttype."','".$geocode."','".$hybridyellow13a."','".$hybridyellow13b."','".$hybridyellow13c."','".$hybridwhite13a."','".$hybridwhite13b."','".$hybridwhite13c."','".$hybridcombine13a."','".$hybridcombine13b."','".$hybridcombine13c."','".$opvyellow13a."','".$opvyellow13b."','".$opvyellow13c."','".$opvwhite13a."','".$opvwhite13b."',,'".$opvwhite13c."','".$opvcombine13a."','".$opvcombine13b."','".$opvcombine13c."','".$grandyellow13a."','".$grandyellow13b."','".$grandyellow13c."','".$grandwhite13a."','".$grandwhite13b."','".$grandwhite13c."','".$grandtotal13a."','".$grandtotal13b."','".$grandtotal13c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay14."','".$reporttype."','".$geocode."','".$hybridyellow14a."','".$hybridyellow14b."','".$hybridyellow14c."','".$hybridwhite14a."','".$hybridwhite14b."','".$hybridwhite14c."','".$hybridcombine14a."','".$hybridcombine14b."','".$hybridcombine14c."','".$opvyellow14a."','".$opvyellow14b."','".$opvyellow14c."','".$opvwhite14a."','".$opvwhite14b."',,'".$opvwhite14c."','".$opvcombine14a."','".$opvcombine14b."','".$opvcombine14c."','".$grandyellow14a."','".$grandyellow14b."','".$grandyellow14c."','".$grandwhite14a."','".$grandwhite14b."','".$grandwhite14c."','".$grandtotal14a."','".$grandtotal14b."','".$grandtotal14c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay15."','".$reporttype."','".$geocode."','".$hybridyellow15a."','".$hybridyellow15b."','".$hybridyellow15c."','".$hybridwhite15a."','".$hybridwhite15b."','".$hybridwhite15c."','".$hybridcombine15a."','".$hybridcombine15b."','".$hybridcombine15c."','".$opvyellow15a."','".$opvyellow15b."','".$opvyellow15c."','".$opvwhite15a."','".$opvwhite15b."',,'".$opvwhite15c."','".$opvcombine15a."','".$opvcombine15b."','".$opvcombine15c."','".$grandyellow15a."','".$grandyellow15b."','".$grandyellow15c."','".$grandwhite15a."','".$grandwhite15b."','".$grandwhite15c."','".$grandtotal15a."','".$grandtotal15b."','".$grandtotal15c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay16."','".$reporttype."','".$geocode."','".$hybridyellow16a."','".$hybridyellow16b."','".$hybridyellow16c."','".$hybridwhite16a."','".$hybridwhite16b."','".$hybridwhite16c."','".$hybridcombine16a."','".$hybridcombine16b."','".$hybridcombine16c."','".$opvyellow16a."','".$opvyellow16b."','".$opvyellow16c."','".$opvwhite16a."','".$opvwhite16b."',,'".$opvwhite16c."','".$opvcombine16a."','".$opvcombine16b."','".$opvcombine16c."','".$grandyellow16a."','".$grandyellow16b."','".$grandyellow16c."','".$grandwhite16a."','".$grandwhite16b."','".$grandwhite16c."','".$grandtotal16a."','".$grandtotal16b."','".$grandtotal16c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay17."','".$reporttype."','".$geocode."','".$hybridyellow17a."','".$hybridyellow17b."','".$hybridyellow17c."','".$hybridwhite17a."','".$hybridwhite17b."','".$hybridwhite17c."','".$hybridcombine17a."','".$hybridcombine17b."','".$hybridcombine17c."','".$opvyellow17a."','".$opvyellow17b."','".$opvyellow17c."','".$opvwhite17a."','".$opvwhite17b."',,'".$opvwhite17c."','".$opvcombine17a."','".$opvcombine17b."','".$opvcombine17c."','".$grandyellow17a."','".$grandyellow17b."','".$grandyellow17c."','".$grandwhite17a."','".$grandwhite17b."','".$grandwhite17c."','".$grandtotal17a."','".$grandtotal17b."','".$grandtotal17c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay18."','".$reporttype."','".$geocode."','".$hybridyellow18a."','".$hybridyellow18b."','".$hybridyellow18c."','".$hybridwhite18a."','".$hybridwhite18b."','".$hybridwhite18c."','".$hybridcombine18a."','".$hybridcombine18b."','".$hybridcombine18c."','".$opvyellow18a."','".$opvyellow18b."','".$opvyellow18c."','".$opvwhite18a."','".$opvwhite18b."',,'".$opvwhite18c."','".$opvcombine18a."','".$opvcombine18b."','".$opvcombine18c."','".$grandyellow18a."','".$grandyellow18b."','".$grandyellow18c."','".$grandwhite18a."','".$grandwhite18b."','".$grandwhite18c."','".$grandtotal18a."','".$grandtotal18b."','".$grandtotal18c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay19."','".$reporttype."','".$geocode."','".$hybridyellow19a."','".$hybridyellow19b."','".$hybridyellow19c."','".$hybridwhite19a."','".$hybridwhite19b."','".$hybridwhite19c."','".$hybridcombine19a."','".$hybridcombine19b."','".$hybridcombine19c."','".$opvyellow19a."','".$opvyellow19b."','".$opvyellow19c."','".$opvwhite19a."','".$opvwhite19b."',,'".$opvwhite19c."','".$opvcombine19a."','".$opvcombine19b."','".$opvcombine19c."','".$grandyellow19a."','".$grandyellow19b."','".$grandyellow19c."','".$grandwhite19a."','".$grandwhite19b."','".$grandwhite19c."','".$grandtotal19a."','".$grandtotal19b."','".$grandtotal19c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay20."','".$reporttype."','".$geocode."','".$hybridyellow20a."','".$hybridyellow20b."','".$hybridyellow20c."','".$hybridwhite20a."','".$hybridwhite20b."','".$hybridwhite20c."','".$hybridcombine20a."','".$hybridcombine20b."','".$hybridcombine20c."','".$opvyellow20a."','".$opvyellow20b."','".$opvyellow20c."','".$opvwhite20a."','".$opvwhite20b."',,'".$opvwhite20c."','".$opvcombine20a."','".$opvcombine20b."','".$opvcombine20c."','".$grandyellow20a."','".$grandyellow20b."','".$grandyellow20c."','".$grandwhite20a."','".$grandwhite20b."','".$grandwhite20c."','".$grandtotal20a."','".$grandtotal20b."','".$grandtotal20c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay21."','".$reporttype."','".$geocode."','".$hybridyellow21a."','".$hybridyellow21b."','".$hybridyellow21c."','".$hybridwhite21a."','".$hybridwhite21b."','".$hybridwhite21c."','".$hybridcombine21a."','".$hybridcombine21b."','".$hybridcombine21c."','".$opvyellow21a."','".$opvyellow21b."','".$opvyellow21c."','".$opvwhite21a."','".$opvwhite21b."',,'".$opvwhite21c."','".$opvcombine21a."','".$opvcombine21b."','".$opvcombine21c."','".$grandyellow21a."','".$grandyellow21b."','".$grandyellow21c."','".$grandwhite21a."','".$grandwhite21b."','".$grandwhite21c."','".$grandtotal21a."','".$grandtotal21b."','".$grandtotal21c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay22."','".$reporttype."','".$geocode."','".$hybridyellow22a."','".$hybridyellow22b."','".$hybridyellow22c."','".$hybridwhite22a."','".$hybridwhite22b."','".$hybridwhite22c."','".$hybridcombine22a."','".$hybridcombine22b."','".$hybridcombine22c."','".$opvyellow22a."','".$opvyellow22b."','".$opvyellow22c."','".$opvwhite22a."','".$opvwhite22b."',,'".$opvwhite22c."','".$opvcombine22a."','".$opvcombine22b."','".$opvcombine22c."','".$grandyellow22a."','".$grandyellow22b."','".$grandyellow22c."','".$grandwhite22a."','".$grandwhite22b."','".$grandwhite22c."','".$grandtotal22a."','".$grandtotal22b."','".$grandtotal22c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay23."','".$reporttype."','".$geocode."','".$hybridyellow23a."','".$hybridyellow23b."','".$hybridyellow23c."','".$hybridwhite23a."','".$hybridwhite23b."','".$hybridwhite23c."','".$hybridcombine23a."','".$hybridcombine23b."','".$hybridcombine23c."','".$opvyellow23a."','".$opvyellow23b."','".$opvyellow23c."','".$opvwhite23a."','".$opvwhite23b."',,'".$opvwhite23c."','".$opvcombine23a."','".$opvcombine23b."','".$opvcombine23c."','".$grandyellow23a."','".$grandyellow23b."','".$grandyellow23c."','".$grandwhite23a."','".$grandwhite23b."','".$grandwhite23c."','".$grandtotal23a."','".$grandtotal23b."','".$grandtotal23c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay24."','".$reporttype."','".$geocode."','".$hybridyellow24a."','".$hybridyellow24b."','".$hybridyellow24c."','".$hybridwhite24a."','".$hybridwhite24b."','".$hybridwhite24c."','".$hybridcombine24a."','".$hybridcombine24b."','".$hybridcombine24c."','".$opvyellow24a."','".$opvyellow24b."','".$opvyellow24c."','".$opvwhite24a."','".$opvwhite24b."',,'".$opvwhite24c."','".$opvcombine24a."','".$opvcombine24b."','".$opvcombine24c."','".$grandyellow24a."','".$grandyellow24b."','".$grandyellow24c."','".$grandwhite24a."','".$grandwhite24b."','".$grandwhite24c."','".$grandtotal24a."','".$grandtotal24b."','".$grandtotal24c."','".$fromdate."','".$todate."'";
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
                $sql = "INSERT INTO `tbl_corn_harvestng_report`(`barangay`,`reporttype`, `geocode`, `nooffarmers`, `hybridyellowarea`, `hybridyellowyield`, `hybridyellowprod`, `hybridwhitearea`, `hybridwhiteyield`, `hybridwhiteprod`, `hybridcombinearea`, `hybridcombineyield`, `hybridcombineprod`, `opvyellowarea`, `opvyellowyield`, `opvyellowprod`, `opvwhitearea`, `opvwhiteyield`, `opvwhiteprod`, `opvcombinearea`, `opvcombineyield`, `opvcombineprod`, `grandyellowarea`, `grandyellowyield`, `grandyellowprod`, `grandwhitearea`, `grandwhiteyield`, `grandwhiteprod`, `grandcombinearea`, `grandcombineyield`, `grandcombineprod`, `fromdate`, `todate`) VALUES 
                ('".$barangay25."','".$reporttype."','".$geocode."','".$hybridyellow25a."','".$hybridyellow25b."','".$hybridyellow25c."','".$hybridwhite25a."','".$hybridwhite25b."','".$hybridwhite25c."','".$hybridcombine25a."','".$hybridcombine25b."','".$hybridcombine25c."','".$opvyellow25a."','".$opvyellow25b."','".$opvyellow25c."','".$opvwhite25a."','".$opvwhite25b."',,'".$opvwhite25c."','".$opvcombine25a."','".$opvcombine25b."','".$opvcombine25c."','".$grandyellow25a."','".$grandyellow25b."','".$grandyellow25c."','".$grandwhite25a."','".$grandwhite25b."','".$grandwhite25c."','".$grandtotal25a."','".$grandtotal25b."','".$grandtotal25c."','".$fromdate."','".$todate."'";
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
                        <th rowspan="4" colspan="1">GEOCODE</th>
                        <th rowspan="4" colspan="1">BARANGAY</th>
                        <th rowspan="4" colspan="1">No. of Farmers</th>
                        <th rowspan="1" colspan="27">Month</th>
                        
                    </tr>
                    <tr>
                        <td rowspan="1" colspan="9">Hybrid</td>
                        <td rowspan="1" colspan="9">OPV</td>
                        <td rowspan="1" colspan="9">Grand Total</td>
                        
                    </tr>
                    <tr>
                        <td rowspan="1" colspan="3">Yellow</td>
                        <td rowspan="1" colspan="3">White</td>
                        <td rowspan="1" colspan="3">Combine</td>

                        <td rowspan="1" colspan="3">Yellow</td>
                        <td rowspan="1" colspan="3">White</td>
                        <td rowspan="1" colspan="3">Combine</td>

                        <td rowspan="1" colspan="3">Yellow</td>
                        <td rowspan="1" colspan="3">White</td>
                        <td rowspan="1" colspan="3">Combine</td>
                        
                        
                    </tr>
                    <tr>
                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        <td rowspan="1">Area(ha)</td>
                        <td rowspan="1">Ave. Yield(MT/ha)</td>
                        <td rowspan="1">Prod'n(MT)</td>

                        
                        
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
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer<?php echo $i;?>" id="" value="0">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridyellow<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridyellow<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridwhite<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridwhite<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- HYBRID COMBINE -->
                        <td>
                            <input type="number" class="form-input" name="hybridcombine<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridcombine<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="hybridcombine<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvyellow<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvyellow<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvwhite<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvwhite<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- OPV COMBINE -->
                        <td>
                            <input type="number" class="form-input" name="opvcombine<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvcombine<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="opvcombine<?php echo $i;?>b" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandyellow<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandyellow<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandwhite<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandwhite<?php echo $i;?>c" id="" value="0">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal<?php echo $i;?>a" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandtotal<?php echo $i;?>b" id="" value="0">
                        </td>
                        <td>
                            <input type="number" class="form-input" name="grandtotal<?php echo $i;?>c" id="" value="0">
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

