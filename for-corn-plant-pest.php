<?php
//ini_set('display_errors', 1);
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
    <title>View Corn Report</title>

</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:10px;
        /*background-color:#d7d8d9;*/
        text-align:left;
    }
    .wbrgy{
        width:150px;
    }
    
</style>
<script>
function show() {
  var x = document.getElementById("btnview");
  var y = document.getElementById("btnupdate");
  var z = document.getElementById("btn_update");
  //var a = document.getElementsByClassName("form-input")[0];
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "block";
    //a.disabled = false;
    document.querySelectorAll('input').forEach(element => element.disabled = false);
  }
}
function hide() {
  var x = document.getElementById("btnview");
  var y = document.getElementById("btnupdate");
  var z = document.getElementById("btn_update");
  //var a = document.getElementsByClassName("form-input")[0];
  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
    z.style.display = "none";
    document.querySelectorAll('input').forEach(element => element.disabled = true);
    //a.disabled = true;
  }
}
</script>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
        include "config.php";

        $reporttype = "CornPlanting";
        $todate = $_GET['dateto'];
        $fromdate = $_GET['datefrom'];

        if (isset($_POST['btnupdate'] )) {
            $geocode = "";
           /* for($i = 1; $i<=25; $i++) {
                $reportid[$i] = "reportid".$i;
                $barangay[$i] = "barangay".$i;
                $nooffarmer[$i] = "nooffarmer".$i;
                $hybridyellow[$i] = "hybridyellow".$i;
                $hybridwhite[$i] = "hybridwhite".$i;
                $hybridtotal[$i] = "hybridtotal".$i;
                $opvyellow[$i] = "opvyellow".$i;
                $opvwhite[$i] = "opvwhite".$i;
                $opvtotal[$i] = "opvtotal".$i;
                $grandyellow[$i] = "grandyellow".$i;
                $grandwhite[$i] = "grandwhite".$i;
                $grandtotal[$i] = "grandtotal".$i;
            }*/
            $reportid1 = $_POST['reportid1'];
            $barangay1 = $_POST['$barangay1'];
            $nooffarmer1 = $_POST['$nooffarmer1'];
            $hybridyellow1a = $_POST['$hybridyellow1a'];
            $hybridyellow1b = $_POST['$hybridyellow1b'];
            $hybridyellow1c = $_POST['$hybridyellow1c'];
            $hybridwhite1a = $_POST['$hybridwhite1a'];
            $hybridwhite1b = $_POST['$hybridwhite1b'];
            $hybridwhite1c = $_POST['$hybridwhite1c'];
            $hybridcombine1a = $_POST['$hybridcombine1a'];
            $hybridcombine1b = $_POST['$hybridcombine1b'];
            $hybridcombine1c = $_POST['$hybridcombine1c'];
            $opvyellow1a = $_POST['$opvyellow1a'];
            $opvyellow1b = $_POST['$opvyellow1b'];
            $opvyellow1c = $_POST['$opvyellow1c'];
            $opvwhite1a = $_POST['$opvwhite1a'];
            $opvwhite1b = $_POST['$opvwhite1b'];
            $opvwhite1c = $_POST['$opvwhite1c'];
            $opvcombine1a = $_POST['$opvcombine1a'];
            $opvcombine1b = $_POST['$opvcombine1b'];
            $opvcombine1c = $_POST['$opvcombine1c'];
            $grandyellow1a = $_POST['$grandyellow1a'];
            $grandyellow1b = $_POST['$grandyellow1b'];
            $grandyellow1c = $_POST['$grandyellow1c'];
            $grandwhite1a = $_POST['$grandwhite1a'];
            $grandwhite1b = $_POST['$grandwhite1b'];
            $grandwhite1c = $_POST['$grandwhite1c'];
            $grandtotal1a = $_POST['$grandtotal1a'];
            $grandtotal1b = $_POST['$grandtotal1b'];
            $grandtotal1c = $_POST['$grandtotal1c'];
            
            $reportid2 = $_POST['reportid2'];
            $barangay2 = $_POST['$barangay2'];
            $nooffarmer2 = $_POST['$nooffarmer2'];
            $hybridyellow2a = $_POST['$hybridyellow2a'];
            $hybridyellow2b = $_POST['$hybridyellow2b'];
            $hybridyellow2c = $_POST['$hybridyellow2c'];
            $hybridwhite2a = $_POST['$hybridwhite2a'];
            $hybridwhite2b = $_POST['$hybridwhite2b'];
            $hybridwhite2c = $_POST['$hybridwhite2c'];
            $hybridcombine2a = $_POST['$hybridcombine2a'];
            $hybridcombine2b = $_POST['$hybridcombine2b'];
            $hybridcombine2c = $_POST['$hybridcombine2c'];
            $opvyellow2a = $_POST['$opvyellow2a'];
            $opvyellow2b = $_POST['$opvyellow2b'];
            $opvyellow2c = $_POST['$opvyellow2c'];
            $opvwhite2a = $_POST['$opvwhite2a'];
            $opvwhite2b = $_POST['$opvwhite2b'];
            $opvwhite2c = $_POST['$opvwhite2c'];
            $opvcombine2a = $_POST['$opvcombine2a'];
            $opvcombine2b = $_POST['$opvcombine2b'];
            $opvcombine2c = $_POST['$opvcombine2c'];
            $grandyellow2a = $_POST['$grandyellow2a'];
            $grandyellow2b = $_POST['$grandyellow2b'];
            $grandyellow2c = $_POST['$grandyellow2c'];
            $grandwhite2a = $_POST['$grandwhite2a'];
            $grandwhite2b = $_POST['$grandwhite2b'];
            $grandwhite2c = $_POST['$grandwhite2c'];
            $grandtotal2a = $_POST['$grandtotal2a'];
            $grandtotal2b = $_POST['$grandtotal2b'];
            $grandtotal2c = $_POST['$grandtotal2c'];

            $reportid3 = $_POST['reportid3'];
            $barangay3 = $_POST['$barangay3'];
            $nooffarmer3 = $_POST['$nooffarmer3'];
            $hybridyellow3a = $_POST['$hybridyellow3a'];
            $hybridyellow3b = $_POST['$hybridyellow3b'];
            $hybridyellow3c = $_POST['$hybridyellow3c'];
            $hybridwhite3a = $_POST['$hybridwhite3a'];
            $hybridwhite3b = $_POST['$hybridwhite3b'];
            $hybridwhite3c = $_POST['$hybridwhite3c'];
            $hybridcombine3a = $_POST['$hybridcombine3a'];
            $hybridcombine3b = $_POST['$hybridcombine3b'];
            $hybridcombine3c = $_POST['$hybridcombine3c'];
            $opvyellow3a = $_POST['$opvyellow3a'];
            $opvyellow3b = $_POST['$opvyellow3b'];
            $opvyellow3c = $_POST['$opvyellow3c'];
            $opvwhite3a = $_POST['$opvwhite3a'];
            $opvwhite3b = $_POST['$opvwhite3b'];
            $opvwhite3c = $_POST['$opvwhite3c'];
            $opvcombine3a = $_POST['$opvcombine3a'];
            $opvcombine3b = $_POST['$opvcombine3b'];
            $opvcombine3c = $_POST['$opvcombine3c'];
            $grandyellow3a = $_POST['$grandyellow3a'];
            $grandyellow3b = $_POST['$grandyellow3b'];
            $grandyellow3c = $_POST['$grandyellow3c'];
            $grandwhite3a = $_POST['$grandwhite3a'];
            $grandwhite3b = $_POST['$grandwhite3b'];
            $grandwhite3c = $_POST['$grandwhite3c'];
            $grandtotal3a = $_POST['$grandtotal3a'];
            $grandtotal3b = $_POST['$grandtotal3b'];
            $grandtotal3c = $_POST['$grandtotal3c'];

            $reportid4 = $_POST['reportid4'];
            $barangay4 = $_POST['$barangay4'];
            $nooffarmer4 = $_POST['$nooffarmer4'];
            $hybridyellow4a = $_POST['$hybridyellow4a'];
            $hybridyellow4b = $_POST['$hybridyellow4b'];
            $hybridyellow4c = $_POST['$hybridyellow4c'];
            $hybridwhite4a = $_POST['$hybridwhite4a'];
            $hybridwhite4b = $_POST['$hybridwhite4b'];
            $hybridwhite4c = $_POST['$hybridwhite4c'];
            $hybridcombine4a = $_POST['$hybridcombine4a'];
            $hybridcombine4b = $_POST['$hybridcombine4b'];
            $hybridcombine4c = $_POST['$hybridcombine4c'];
            $opvyellow4a = $_POST['$opvyellow4a'];
            $opvyellow4b = $_POST['$opvyellow4b'];
            $opvyellow4c = $_POST['$opvyellow4c'];
            $opvwhite4a = $_POST['$opvwhite4a'];
            $opvwhite4b = $_POST['$opvwhite4b'];
            $opvwhite4c = $_POST['$opvwhite4c'];
            $opvcombine4a = $_POST['$opvcombine4a'];
            $opvcombine4b = $_POST['$opvcombine4b'];
            $opvcombine4c = $_POST['$opvcombine4c'];
            $grandyellow4a = $_POST['$grandyellow4a'];
            $grandyellow4b = $_POST['$grandyellow4b'];
            $grandyellow4c = $_POST['$grandyellow4c'];
            $grandwhite4a = $_POST['$grandwhite4a'];
            $grandwhite4b = $_POST['$grandwhite4b'];
            $grandwhite4c = $_POST['$grandwhite4c'];
            $grandtotal4a = $_POST['$grandtotal4a'];
            $grandtotal4b = $_POST['$grandtotal4b'];
            $grandtotal4c = $_POST['$grandtotal4c'];

            $reportid5 = $_POST['reportid5'];
            $barangay5 = $_POST['$barangay5'];
            $nooffarmer5 = $_POST['$nooffarmer5'];
            $hybridyellow5a = $_POST['$hybridyellow5a'];
            $hybridyellow5b = $_POST['$hybridyellow5b'];
            $hybridyellow5c = $_POST['$hybridyellow5c'];
            $hybridwhite5a = $_POST['$hybridwhite5a'];
            $hybridwhite5b = $_POST['$hybridwhite5b'];
            $hybridwhite5c = $_POST['$hybridwhite5c'];
            $hybridcombine5a = $_POST['$hybridcombine5a'];
            $hybridcombine5b = $_POST['$hybridcombine5b'];
            $hybridcombine5c = $_POST['$hybridcombine5c'];
            $opvyellow5a = $_POST['$opvyellow5a'];
            $opvyellow5b = $_POST['$opvyellow5b'];
            $opvyellow5c = $_POST['$opvyellow5c'];
            $opvwhite5a = $_POST['$opvwhite5a'];
            $opvwhite5b = $_POST['$opvwhite5b'];
            $opvwhite5c = $_POST['$opvwhite5c'];
            $opvcombine5a = $_POST['$opvcombine5a'];
            $opvcombine5b = $_POST['$opvcombine5b'];
            $opvcombine5c = $_POST['$opvcombine5c'];
            $grandyellow5a = $_POST['$grandyellow5a'];
            $grandyellow5b = $_POST['$grandyellow5b'];
            $grandyellow5c = $_POST['$grandyellow5c'];
            $grandwhite5a = $_POST['$grandwhite5a'];
            $grandwhite5b = $_POST['$grandwhite5b'];
            $grandwhite5c = $_POST['$grandwhite5c'];
            $grandtotal5a = $_POST['$grandtotal5a'];
            $grandtotal5b = $_POST['$grandtotal5b'];
            $grandtotal5c = $_POST['$grandtotal5c'];

            $reportid6 = $_POST['reportid6'];
            $barangay6 = $_POST['$barangay6'];
            $nooffarmer6 = $_POST['$nooffarmer6'];
            $hybridyellow6a = $_POST['$hybridyellow6a'];
            $hybridyellow6b = $_POST['$hybridyellow6b'];
            $hybridyellow6c = $_POST['$hybridyellow6c'];
            $hybridwhite6a = $_POST['$hybridwhite6a'];
            $hybridwhite6b = $_POST['$hybridwhite6b'];
            $hybridwhite6c = $_POST['$hybridwhite6c'];
            $hybridcombine6a = $_POST['$hybridcombine6a'];
            $hybridcombine6b = $_POST['$hybridcombine6b'];
            $hybridcombine6c = $_POST['$hybridcombine6c'];
            $opvyellow6a = $_POST['$opvyellow6a'];
            $opvyellow6b = $_POST['$opvyellow6b'];
            $opvyellow6c = $_POST['$opvyellow6c'];
            $opvwhite6a = $_POST['$opvwhite6a'];
            $opvwhite6b = $_POST['$opvwhite6b'];
            $opvwhite6c = $_POST['$opvwhite6c'];
            $opvcombine6a = $_POST['$opvcombine6a'];
            $opvcombine6b = $_POST['$opvcombine6b'];
            $opvcombine6c = $_POST['$opvcombine6c'];
            $grandyellow6a = $_POST['$grandyellow6a'];
            $grandyellow6b = $_POST['$grandyellow6b'];
            $grandyellow6c = $_POST['$grandyellow6c'];
            $grandwhite6a = $_POST['$grandwhite6a'];
            $grandwhite6b = $_POST['$grandwhite6b'];
            $grandwhite6c = $_POST['$grandwhite6c'];
            $grandtotal6a = $_POST['$grandtotal6a'];
            $grandtotal6b = $_POST['$grandtotal6b'];
            $grandtotal6c = $_POST['$grandtotal6c'];

            $reportid7 = $_POST['reportid7'];
            $barangay7 = $_POST['$barangay7'];
            $nooffarmer7 = $_POST['$nooffarmer7'];
            $hybridyellow7a = $_POST['$hybridyellow7a'];
            $hybridyellow7b = $_POST['$hybridyellow7b'];
            $hybridyellow7c = $_POST['$hybridyellow7c'];
            $hybridwhite7a = $_POST['$hybridwhite7a'];
            $hybridwhite7b = $_POST['$hybridwhite7b'];
            $hybridwhite7c = $_POST['$hybridwhite7c'];
            $hybridcombine7a = $_POST['$hybridcombine7a'];
            $hybridcombine7b = $_POST['$hybridcombine7b'];
            $hybridcombine7c = $_POST['$hybridcombine7c'];
            $opvyellow7a = $_POST['$opvyellow7a'];
            $opvyellow7b = $_POST['$opvyellow7b'];
            $opvyellow7c = $_POST['$opvyellow7c'];
            $opvwhite7a = $_POST['$opvwhite7a'];
            $opvwhite7b = $_POST['$opvwhite7b'];
            $opvwhite7c = $_POST['$opvwhite7c'];
            $opvcombine7a = $_POST['$opvcombine7a'];
            $opvcombine7b = $_POST['$opvcombine7b'];
            $opvcombine7c = $_POST['$opvcombine7c'];
            $grandyellow7a = $_POST['$grandyellow7a'];
            $grandyellow7b = $_POST['$grandyellow7b'];
            $grandyellow7c = $_POST['$grandyellow7c'];
            $grandwhite7a = $_POST['$grandwhite7a'];
            $grandwhite7b = $_POST['$grandwhite7b'];
            $grandwhite7c = $_POST['$grandwhite7c'];
            $grandtotal7a = $_POST['$grandtotal7a'];
            $grandtotal7b = $_POST['$grandtotal7b'];
            $grandtotal7c = $_POST['$grandtotal7c'];

            $reportid8 = $_POST['reportid8'];
            $barangay8 = $_POST['$barangay8'];
            $nooffarmer8 = $_POST['$nooffarmer8'];
            $hybridyellow8a = $_POST['$hybridyellow8a'];
            $hybridyellow8b = $_POST['$hybridyellow8b'];
            $hybridyellow8c = $_POST['$hybridyellow8c'];
            $hybridwhite8a = $_POST['$hybridwhite8a'];
            $hybridwhite8b = $_POST['$hybridwhite8b'];
            $hybridwhite8c = $_POST['$hybridwhite8c'];
            $hybridcombine8a = $_POST['$hybridcombine8a'];
            $hybridcombine8b = $_POST['$hybridcombine8b'];
            $hybridcombine8c = $_POST['$hybridcombine8c'];
            $opvyellow8a = $_POST['$opvyellow8a'];
            $opvyellow8b = $_POST['$opvyellow8b'];
            $opvyellow8c = $_POST['$opvyellow8c'];
            $opvwhite8a = $_POST['$opvwhite8a'];
            $opvwhite8b = $_POST['$opvwhite8b'];
            $opvwhite8c = $_POST['$opvwhite8c'];
            $opvcombine8a = $_POST['$opvcombine8a'];
            $opvcombine8b = $_POST['$opvcombine8b'];
            $opvcombine8c = $_POST['$opvcombine8c'];
            $grandyellow8a = $_POST['$grandyellow8a'];
            $grandyellow8b = $_POST['$grandyellow8b'];
            $grandyellow8c = $_POST['$grandyellow8c'];
            $grandwhite8a = $_POST['$grandwhite8a'];
            $grandwhite8b = $_POST['$grandwhite8b'];
            $grandwhite8c = $_POST['$grandwhite8c'];
            $grandtotal8a = $_POST['$grandtotal8a'];
            $grandtotal8b = $_POST['$grandtotal8b'];
            $grandtotal8c = $_POST['$grandtotal8c'];

            $reportid9 = $_POST['reportid9'];
            $barangay9 = $_POST['$barangay9'];
            $nooffarmer9 = $_POST['$nooffarmer9'];
            $hybridyellow9a = $_POST['$hybridyellow9a'];
            $hybridyellow9b = $_POST['$hybridyellow9b'];
            $hybridyellow9c = $_POST['$hybridyellow9c'];
            $hybridwhite9a = $_POST['$hybridwhite9a'];
            $hybridwhite9b = $_POST['$hybridwhite9b'];
            $hybridwhite9c = $_POST['$hybridwhite9c'];
            $hybridcombine9a = $_POST['$hybridcombine9a'];
            $hybridcombine9b = $_POST['$hybridcombine9b'];
            $hybridcombine9c = $_POST['$hybridcombine9c'];
            $opvyellow9a = $_POST['$opvyellow9a'];
            $opvyellow9b = $_POST['$opvyellow9b'];
            $opvyellow9c = $_POST['$opvyellow9c'];
            $opvwhite9a = $_POST['$opvwhite9a'];
            $opvwhite9b = $_POST['$opvwhite9b'];
            $opvwhite9c = $_POST['$opvwhite9c'];
            $opvcombine9a = $_POST['$opvcombine9a'];
            $opvcombine9b = $_POST['$opvcombine9b'];
            $opvcombine9c = $_POST['$opvcombine9c'];
            $grandyellow9a = $_POST['$grandyellow9a'];
            $grandyellow9b = $_POST['$grandyellow9b'];
            $grandyellow9c = $_POST['$grandyellow9c'];
            $grandwhite9a = $_POST['$grandwhite9a'];
            $grandwhite9b = $_POST['$grandwhite9b'];
            $grandwhite9c = $_POST['$grandwhite9c'];
            $grandtotal9a = $_POST['$grandtotal9a'];
            $grandtotal9b = $_POST['$grandtotal9b'];
            $grandtotal9c = $_POST['$grandtotal9c'];

            $reportid10 = $_POST['reportid10'];
            $barangay10 = $_POST['$barangay10'];
            $nooffarmer10 = $_POST['$nooffarmer10'];
            $hybridyellow10a = $_POST['$hybridyellow10a'];
            $hybridyellow10b = $_POST['$hybridyellow10b'];
            $hybridyellow10c = $_POST['$hybridyellow10c'];
            $hybridwhite10a = $_POST['$hybridwhite10a'];
            $hybridwhite10b = $_POST['$hybridwhite10b'];
            $hybridwhite10c = $_POST['$hybridwhite10c'];
            $hybridcombine10a = $_POST['$hybridcombine10a'];
            $hybridcombine10b = $_POST['$hybridcombine10b'];
            $hybridcombine10c = $_POST['$hybridcombine10c'];
            $opvyellow10a = $_POST['$opvyellow10a'];
            $opvyellow10b = $_POST['$opvyellow10b'];
            $opvyellow10c = $_POST['$opvyellow10c'];
            $opvwhite10a = $_POST['$opvwhite10a'];
            $opvwhite10b = $_POST['$opvwhite10b'];
            $opvwhite10c = $_POST['$opvwhite10c'];
            $opvcombine10a = $_POST['$opvcombine10a'];
            $opvcombine10b = $_POST['$opvcombine10b'];
            $opvcombine10c = $_POST['$opvcombine10c'];
            $grandyellow10a = $_POST['$grandyellow10a'];
            $grandyellow10b = $_POST['$grandyellow10b'];
            $grandyellow10c = $_POST['$grandyellow10c'];
            $grandwhite10a = $_POST['$grandwhite10a'];
            $grandwhite10b = $_POST['$grandwhite10b'];
            $grandwhite10c = $_POST['$grandwhite10c'];
            $grandtotal10a = $_POST['$grandtotal10a'];
            $grandtotal10b = $_POST['$grandtotal10b'];
            $grandtotal10c = $_POST['$grandtotal10c'];

            $reportid11 = $_POST['reportid11'];
            $barangay11 = $_POST['$barangay11'];
            $nooffarmer11 = $_POST['$nooffarmer11'];
            $hybridyellow11a = $_POST['$hybridyellow11a'];
            $hybridyellow11b = $_POST['$hybridyellow11b'];
            $hybridyellow11c = $_POST['$hybridyellow11c'];
            $hybridwhite11a = $_POST['$hybridwhite11a'];
            $hybridwhite11b = $_POST['$hybridwhite11b'];
            $hybridwhite11c = $_POST['$hybridwhite11c'];
            $hybridcombine11a = $_POST['$hybridcombine11a'];
            $hybridcombine11b = $_POST['$hybridcombine11b'];
            $hybridcombine11c = $_POST['$hybridcombine11c'];
            $opvyellow11a = $_POST['$opvyellow11a'];
            $opvyellow11b = $_POST['$opvyellow11b'];
            $opvyellow11c = $_POST['$opvyellow11c'];
            $opvwhite11a = $_POST['$opvwhite11a'];
            $opvwhite11b = $_POST['$opvwhite11b'];
            $opvwhite11c = $_POST['$opvwhite11c'];
            $opvcombine11a = $_POST['$opvcombine11a'];
            $opvcombine11b = $_POST['$opvcombine11b'];
            $opvcombine11c = $_POST['$opvcombine11c'];
            $grandyellow11a = $_POST['$grandyellow11a'];
            $grandyellow11b = $_POST['$grandyellow11b'];
            $grandyellow11c = $_POST['$grandyellow11c'];
            $grandwhite11a = $_POST['$grandwhite11a'];
            $grandwhite11b = $_POST['$grandwhite11b'];
            $grandwhite11c = $_POST['$grandwhite11c'];
            $grandtotal11a = $_POST['$grandtotal11a'];
            $grandtotal11b = $_POST['$grandtotal11b'];
            $grandtotal11c = $_POST['$grandtotal11c'];

            $reportid12 = $_POST['reportid12'];
            $barangay12 = $_POST['$barangay12'];
            $nooffarmer12 = $_POST['$nooffarmer12'];
            $hybridyellow12a = $_POST['$hybridyellow12a'];
            $hybridyellow12b = $_POST['$hybridyellow12b'];
            $hybridyellow12c = $_POST['$hybridyellow12c'];
            $hybridwhite12a = $_POST['$hybridwhite12a'];
            $hybridwhite12b = $_POST['$hybridwhite12b'];
            $hybridwhite12c = $_POST['$hybridwhite12c'];
            $hybridcombine12a = $_POST['$hybridcombine12a'];
            $hybridcombine12b = $_POST['$hybridcombine12b'];
            $hybridcombine12c = $_POST['$hybridcombine12c'];
            $opvyellow12a = $_POST['$opvyellow12a'];
            $opvyellow12b = $_POST['$opvyellow12b'];
            $opvyellow12c = $_POST['$opvyellow12c'];
            $opvwhite12a = $_POST['$opvwhite12a'];
            $opvwhite12b = $_POST['$opvwhite12b'];
            $opvwhite12c = $_POST['$opvwhite12c'];
            $opvcombine12a = $_POST['$opvcombine12a'];
            $opvcombine12b = $_POST['$opvcombine12b'];
            $opvcombine12c = $_POST['$opvcombine12c'];
            $grandyellow12a = $_POST['$grandyellow12a'];
            $grandyellow12b = $_POST['$grandyellow12b'];
            $grandyellow12c = $_POST['$grandyellow12c'];
            $grandwhite12a = $_POST['$grandwhite12a'];
            $grandwhite12b = $_POST['$grandwhite12b'];
            $grandwhite12c = $_POST['$grandwhite12c'];
            $grandtotal12a = $_POST['$grandtotal12a'];
            $grandtotal12b = $_POST['$grandtotal12b'];
            $grandtotal12c = $_POST['$grandtotal12c'];

            $reportid13 = $_POST['reportid13'];
            $barangay13 = $_POST['$barangay13'];
            $nooffarmer13 = $_POST['$nooffarmer13'];
            $hybridyellow13a = $_POST['$hybridyellow13a'];
            $hybridyellow13b = $_POST['$hybridyellow13b'];
            $hybridyellow13c = $_POST['$hybridyellow13c'];
            $hybridwhite13a = $_POST['$hybridwhite13a'];
            $hybridwhite13b = $_POST['$hybridwhite13b'];
            $hybridwhite13c = $_POST['$hybridwhite13c'];
            $hybridcombine13a = $_POST['$hybridcombine13a'];
            $hybridcombine13b = $_POST['$hybridcombine13b'];
            $hybridcombine13c = $_POST['$hybridcombine13c'];
            $opvyellow13a = $_POST['$opvyellow13a'];
            $opvyellow13b = $_POST['$opvyellow13b'];
            $opvyellow13c = $_POST['$opvyellow13c'];
            $opvwhite13a = $_POST['$opvwhite13a'];
            $opvwhite13b = $_POST['$opvwhite13b'];
            $opvwhite13c = $_POST['$opvwhite13c'];
            $opvcombine13a = $_POST['$opvcombine13a'];
            $opvcombine13b = $_POST['$opvcombine13b'];
            $opvcombine13c = $_POST['$opvcombine13c'];
            $grandyellow13a = $_POST['$grandyellow13a'];
            $grandyellow13b = $_POST['$grandyellow13b'];
            $grandyellow13c = $_POST['$grandyellow13c'];
            $grandwhite13a = $_POST['$grandwhite13a'];
            $grandwhite13b = $_POST['$grandwhite13b'];
            $grandwhite13c = $_POST['$grandwhite13c'];
            $grandtotal13a = $_POST['$grandtotal13a'];
            $grandtotal13b = $_POST['$grandtotal13b'];
            $grandtotal13c = $_POST['$grandtotal13c'];

            $reportid14 = $_POST['reportid14'];
            $barangay14 = $_POST['$barangay14'];
            $nooffarmer14 = $_POST['$nooffarmer14'];
            $hybridyellow14a = $_POST['$hybridyellow14a'];
            $hybridyellow14b = $_POST['$hybridyellow14b'];
            $hybridyellow14c = $_POST['$hybridyellow14c'];
            $hybridwhite14a = $_POST['$hybridwhite14a'];
            $hybridwhite14b = $_POST['$hybridwhite14b'];
            $hybridwhite14c = $_POST['$hybridwhite14c'];
            $hybridcombine14a = $_POST['$hybridcombine14a'];
            $hybridcombine14b = $_POST['$hybridcombine14b'];
            $hybridcombine14c = $_POST['$hybridcombine14c'];
            $opvyellow14a = $_POST['$opvyellow14a'];
            $opvyellow14b = $_POST['$opvyellow14b'];
            $opvyellow14c = $_POST['$opvyellow14c'];
            $opvwhite14a = $_POST['$opvwhite14a'];
            $opvwhite14b = $_POST['$opvwhite14b'];
            $opvwhite14c = $_POST['$opvwhite14c'];
            $opvcombine14a = $_POST['$opvcombine14a'];
            $opvcombine14b = $_POST['$opvcombine14b'];
            $opvcombine14c = $_POST['$opvcombine14c'];
            $grandyellow14a = $_POST['$grandyellow14a'];
            $grandyellow14b = $_POST['$grandyellow14b'];
            $grandyellow14c = $_POST['$grandyellow14c'];
            $grandwhite14a = $_POST['$grandwhite14a'];
            $grandwhite14b = $_POST['$grandwhite14b'];
            $grandwhite14c = $_POST['$grandwhite14c'];
            $grandtotal14a = $_POST['$grandtotal14a'];
            $grandtotal14b = $_POST['$grandtotal14b'];
            $grandtotal14c = $_POST['$grandtotal14c'];

            $reportid15 = $_POST['reportid15'];
            $barangay15 = $_POST['$barangay15'];
            $nooffarmer15 = $_POST['$nooffarmer15'];
            $hybridyellow15a = $_POST['$hybridyellow15a'];
            $hybridyellow15b = $_POST['$hybridyellow15b'];
            $hybridyellow15c = $_POST['$hybridyellow15c'];
            $hybridwhite15a = $_POST['$hybridwhite15a'];
            $hybridwhite15b = $_POST['$hybridwhite15b'];
            $hybridwhite15c = $_POST['$hybridwhite15c'];
            $hybridcombine15a = $_POST['$hybridcombine15a'];
            $hybridcombine15b = $_POST['$hybridcombine15b'];
            $hybridcombine15c = $_POST['$hybridcombine15c'];
            $opvyellow15a = $_POST['$opvyellow15a'];
            $opvyellow15b = $_POST['$opvyellow15b'];
            $opvyellow15c = $_POST['$opvyellow15c'];
            $opvwhite15a = $_POST['$opvwhite15a'];
            $opvwhite15b = $_POST['$opvwhite15b'];
            $opvwhite15c = $_POST['$opvwhite15c'];
            $opvcombine15a = $_POST['$opvcombine15a'];
            $opvcombine15b = $_POST['$opvcombine15b'];
            $opvcombine15c = $_POST['$opvcombine15c'];
            $grandyellow15a = $_POST['$grandyellow15a'];
            $grandyellow15b = $_POST['$grandyellow15b'];
            $grandyellow15c = $_POST['$grandyellow15c'];
            $grandwhite15a = $_POST['$grandwhite15a'];
            $grandwhite15b = $_POST['$grandwhite15b'];
            $grandwhite15c = $_POST['$grandwhite15c'];
            $grandtotal15a = $_POST['$grandtotal15a'];
            $grandtotal15b = $_POST['$grandtotal15b'];
            $grandtotal15c = $_POST['$grandtotal15c'];

            $reportid16 = $_POST['reportid16'];
            $barangay16 = $_POST['$barangay16'];
            $nooffarmer16 = $_POST['$nooffarmer16'];
            $hybridyellow16a = $_POST['$hybridyellow16a'];
            $hybridyellow16b = $_POST['$hybridyellow16b'];
            $hybridyellow16c = $_POST['$hybridyellow16c'];
            $hybridwhite16a = $_POST['$hybridwhite16a'];
            $hybridwhite16b = $_POST['$hybridwhite16b'];
            $hybridwhite16c = $_POST['$hybridwhite16c'];
            $hybridcombine16a = $_POST['$hybridcombine16a'];
            $hybridcombine16b = $_POST['$hybridcombine16b'];
            $hybridcombine16c = $_POST['$hybridcombine16c'];
            $opvyellow16a = $_POST['$opvyellow16a'];
            $opvyellow16b = $_POST['$opvyellow16b'];
            $opvyellow16c = $_POST['$opvyellow16c'];
            $opvwhite16a = $_POST['$opvwhite16a'];
            $opvwhite16b = $_POST['$opvwhite16b'];
            $opvwhite16c = $_POST['$opvwhite16c'];
            $opvcombine16a = $_POST['$opvcombine16a'];
            $opvcombine16b = $_POST['$opvcombine16b'];
            $opvcombine16c = $_POST['$opvcombine16c'];
            $grandyellow16a = $_POST['$grandyellow16a'];
            $grandyellow16b = $_POST['$grandyellow16b'];
            $grandyellow16c = $_POST['$grandyellow16c'];
            $grandwhite16a = $_POST['$grandwhite16a'];
            $grandwhite16b = $_POST['$grandwhite16b'];
            $grandwhite16c = $_POST['$grandwhite16c'];
            $grandtotal16a = $_POST['$grandtotal16a'];
            $grandtotal16b = $_POST['$grandtotal16b'];
            $grandtotal16c = $_POST['$grandtotal16c'];

            $reportid17 = $_POST['reportid17'];
            $barangay17 = $_POST['$barangay17'];
            $nooffarmer17 = $_POST['$nooffarmer17'];
            $hybridyellow17a = $_POST['$hybridyellow17a'];
            $hybridyellow17b = $_POST['$hybridyellow17b'];
            $hybridyellow17c = $_POST['$hybridyellow17c'];
            $hybridwhite17a = $_POST['$hybridwhite17a'];
            $hybridwhite17b = $_POST['$hybridwhite17b'];
            $hybridwhite17c = $_POST['$hybridwhite17c'];
            $hybridcombine17a = $_POST['$hybridcombine17a'];
            $hybridcombine17b = $_POST['$hybridcombine17b'];
            $hybridcombine17c = $_POST['$hybridcombine17c'];
            $opvyellow17a = $_POST['$opvyellow17a'];
            $opvyellow17b = $_POST['$opvyellow17b'];
            $opvyellow17c = $_POST['$opvyellow17c'];
            $opvwhite17a = $_POST['$opvwhite17a'];
            $opvwhite17b = $_POST['$opvwhite17b'];
            $opvwhite17c = $_POST['$opvwhite17c'];
            $opvcombine17a = $_POST['$opvcombine17a'];
            $opvcombine17b = $_POST['$opvcombine17b'];
            $opvcombine17c = $_POST['$opvcombine17c'];
            $grandyellow17a = $_POST['$grandyellow17a'];
            $grandyellow17b = $_POST['$grandyellow17b'];
            $grandyellow17c = $_POST['$grandyellow17c'];
            $grandwhite17a = $_POST['$grandwhite17a'];
            $grandwhite17b = $_POST['$grandwhite17b'];
            $grandwhite17c = $_POST['$grandwhite17c'];
            $grandtotal17a = $_POST['$grandtotal17a'];
            $grandtotal17b = $_POST['$grandtotal17b'];
            $grandtotal17c = $_POST['$grandtotal17c'];

            $reportid18 = $_POST['reportid18'];
            $barangay18 = $_POST['$barangay18'];
            $nooffarmer18 = $_POST['$nooffarmer18'];
            $hybridyellow18a = $_POST['$hybridyellow18a'];
            $hybridyellow18b = $_POST['$hybridyellow18b'];
            $hybridyellow18c = $_POST['$hybridyellow18c'];
            $hybridwhite18a = $_POST['$hybridwhite18a'];
            $hybridwhite18b = $_POST['$hybridwhite18b'];
            $hybridwhite18c = $_POST['$hybridwhite18c'];
            $hybridcombine18a = $_POST['$hybridcombine18a'];
            $hybridcombine18b = $_POST['$hybridcombine18b'];
            $hybridcombine18c = $_POST['$hybridcombine18c'];
            $opvyellow18a = $_POST['$opvyellow18a'];
            $opvyellow18b = $_POST['$opvyellow18b'];
            $opvyellow18c = $_POST['$opvyellow18c'];
            $opvwhite18a = $_POST['$opvwhite18a'];
            $opvwhite18b = $_POST['$opvwhite18b'];
            $opvwhite18c = $_POST['$opvwhite18c'];
            $opvcombine18a = $_POST['$opvcombine18a'];
            $opvcombine18b = $_POST['$opvcombine18b'];
            $opvcombine18c = $_POST['$opvcombine18c'];
            $grandyellow18a = $_POST['$grandyellow18a'];
            $grandyellow18b = $_POST['$grandyellow18b'];
            $grandyellow18c = $_POST['$grandyellow18c'];
            $grandwhite18a = $_POST['$grandwhite18a'];
            $grandwhite18b = $_POST['$grandwhite18b'];
            $grandwhite18c = $_POST['$grandwhite18c'];
            $grandtotal18a = $_POST['$grandtotal18a'];
            $grandtotal18b = $_POST['$grandtotal18b'];
            $grandtotal18c = $_POST['$grandtotal18c'];

            $reportid19 = $_POST['reportid19'];
            $barangay19 = $_POST['$barangay19'];
            $nooffarmer19 = $_POST['$nooffarmer19'];
            $hybridyellow19a = $_POST['$hybridyellow19a'];
            $hybridyellow19b = $_POST['$hybridyellow19b'];
            $hybridyellow19c = $_POST['$hybridyellow19c'];
            $hybridwhite19a = $_POST['$hybridwhite19a'];
            $hybridwhite19b = $_POST['$hybridwhite19b'];
            $hybridwhite19c = $_POST['$hybridwhite19c'];
            $hybridcombine19a = $_POST['$hybridcombine19a'];
            $hybridcombine19b = $_POST['$hybridcombine19b'];
            $hybridcombine19c = $_POST['$hybridcombine19c'];
            $opvyellow19a = $_POST['$opvyellow19a'];
            $opvyellow19b = $_POST['$opvyellow19b'];
            $opvyellow19c = $_POST['$opvyellow19c'];
            $opvwhite19a = $_POST['$opvwhite19a'];
            $opvwhite19b = $_POST['$opvwhite19b'];
            $opvwhite19c = $_POST['$opvwhite19c'];
            $opvcombine19a = $_POST['$opvcombine19a'];
            $opvcombine19b = $_POST['$opvcombine19b'];
            $opvcombine19c = $_POST['$opvcombine19c'];
            $grandyellow19a = $_POST['$grandyellow19a'];
            $grandyellow19b = $_POST['$grandyellow19b'];
            $grandyellow19c = $_POST['$grandyellow19c'];
            $grandwhite19a = $_POST['$grandwhite19a'];
            $grandwhite19b = $_POST['$grandwhite19b'];
            $grandwhite19c = $_POST['$grandwhite19c'];
            $grandtotal19a = $_POST['$grandtotal19a'];
            $grandtotal19b = $_POST['$grandtotal19b'];
            $grandtotal19c = $_POST['$grandtotal19c'];

            $reportid20 = $_POST['reportid20'];
            $barangay20 = $_POST['$barangay20'];
            $nooffarmer20 = $_POST['$nooffarmer20'];
            $hybridyellow20a = $_POST['$hybridyellow20a'];
            $hybridyellow20b = $_POST['$hybridyellow20b'];
            $hybridyellow20c = $_POST['$hybridyellow20c'];
            $hybridwhite20a = $_POST['$hybridwhite20a'];
            $hybridwhite20b = $_POST['$hybridwhite20b'];
            $hybridwhite20c = $_POST['$hybridwhite20c'];
            $hybridcombine20a = $_POST['$hybridcombine20a'];
            $hybridcombine20b = $_POST['$hybridcombine20b'];
            $hybridcombine20c = $_POST['$hybridcombine20c'];
            $opvyellow20a = $_POST['$opvyellow20a'];
            $opvyellow20b = $_POST['$opvyellow20b'];
            $opvyellow20c = $_POST['$opvyellow20c'];
            $opvwhite20a = $_POST['$opvwhite20a'];
            $opvwhite20b = $_POST['$opvwhite20b'];
            $opvwhite20c = $_POST['$opvwhite20c'];
            $opvcombine20a = $_POST['$opvcombine20a'];
            $opvcombine20b = $_POST['$opvcombine20b'];
            $opvcombine20c = $_POST['$opvcombine20c'];
            $grandyellow20a = $_POST['$grandyellow20a'];
            $grandyellow20b = $_POST['$grandyellow20b'];
            $grandyellow20c = $_POST['$grandyellow20c'];
            $grandwhite20a = $_POST['$grandwhite20a'];
            $grandwhite20b = $_POST['$grandwhite20b'];
            $grandwhite20c = $_POST['$grandwhite20c'];
            $grandtotal20a = $_POST['$grandtotal20a'];
            $grandtotal20b = $_POST['$grandtotal20b'];
            $grandtotal20c = $_POST['$grandtotal20c'];

            $reportid21 = $_POST['reportid21'];
            $barangay21 = $_POST['$barangay21'];
            $nooffarmer21 = $_POST['$nooffarmer21'];
            $hybridyellow21a = $_POST['$hybridyellow21a'];
            $hybridyellow21b = $_POST['$hybridyellow21b'];
            $hybridyellow21c = $_POST['$hybridyellow21c'];
            $hybridwhite21a = $_POST['$hybridwhite21a'];
            $hybridwhite21b = $_POST['$hybridwhite21b'];
            $hybridwhite21c = $_POST['$hybridwhite21c'];
            $hybridcombine21a = $_POST['$hybridcombine21a'];
            $hybridcombine21b = $_POST['$hybridcombine21b'];
            $hybridcombine21c = $_POST['$hybridcombine21c'];
            $opvyellow21a = $_POST['$opvyellow21a'];
            $opvyellow21b = $_POST['$opvyellow21b'];
            $opvyellow21c = $_POST['$opvyellow21c'];
            $opvwhite21a = $_POST['$opvwhite21a'];
            $opvwhite21b = $_POST['$opvwhite21b'];
            $opvwhite21c = $_POST['$opvwhite21c'];
            $opvcombine21a = $_POST['$opvcombine21a'];
            $opvcombine21b = $_POST['$opvcombine21b'];
            $opvcombine21c = $_POST['$opvcombine21c'];
            $grandyellow21a = $_POST['$grandyellow21a'];
            $grandyellow21b = $_POST['$grandyellow21b'];
            $grandyellow21c = $_POST['$grandyellow21c'];
            $grandwhite21a = $_POST['$grandwhite21a'];
            $grandwhite21b = $_POST['$grandwhite21b'];
            $grandwhite21c = $_POST['$grandwhite21c'];
            $grandtotal21a = $_POST['$grandtotal21a'];
            $grandtotal21b = $_POST['$grandtotal21b'];
            $grandtotal21c = $_POST['$grandtotal21c'];

            $reportid22 = $_POST['reportid22'];
            $barangay22 = $_POST['$barangay22'];
            $nooffarmer22 = $_POST['$nooffarmer22'];
            $hybridyellow22a = $_POST['$hybridyellow22a'];
            $hybridyellow22b = $_POST['$hybridyellow22b'];
            $hybridyellow22c = $_POST['$hybridyellow22c'];
            $hybridwhite22a = $_POST['$hybridwhite22a'];
            $hybridwhite22b = $_POST['$hybridwhite22b'];
            $hybridwhite22c = $_POST['$hybridwhite22c'];
            $hybridcombine22a = $_POST['$hybridcombine22a'];
            $hybridcombine22b = $_POST['$hybridcombine22b'];
            $hybridcombine22c = $_POST['$hybridcombine22c'];
            $opvyellow22a = $_POST['$opvyellow22a'];
            $opvyellow22b = $_POST['$opvyellow22b'];
            $opvyellow22c = $_POST['$opvyellow22c'];
            $opvwhite22a = $_POST['$opvwhite22a'];
            $opvwhite22b = $_POST['$opvwhite22b'];
            $opvwhite22c = $_POST['$opvwhite22c'];
            $opvcombine22a = $_POST['$opvcombine22a'];
            $opvcombine22b = $_POST['$opvcombine22b'];
            $opvcombine22c = $_POST['$opvcombine22c'];
            $grandyellow22a = $_POST['$grandyellow22a'];
            $grandyellow22b = $_POST['$grandyellow22b'];
            $grandyellow22c = $_POST['$grandyellow22c'];
            $grandwhite22a = $_POST['$grandwhite22a'];
            $grandwhite22b = $_POST['$grandwhite22b'];
            $grandwhite22c = $_POST['$grandwhite22c'];
            $grandtotal22a = $_POST['$grandtotal22a'];
            $grandtotal22b = $_POST['$grandtotal22b'];
            $grandtotal22c = $_POST['$grandtotal22c'];

            $reportid23 = $_POST['reportid23'];
            $barangay23 = $_POST['$barangay23'];
            $nooffarmer23 = $_POST['$nooffarmer23'];
            $hybridyellow23a = $_POST['$hybridyellow23a'];
            $hybridyellow23b = $_POST['$hybridyellow23b'];
            $hybridyellow23c = $_POST['$hybridyellow23c'];
            $hybridwhite23a = $_POST['$hybridwhite23a'];
            $hybridwhite23b = $_POST['$hybridwhite23b'];
            $hybridwhite23c = $_POST['$hybridwhite23c'];
            $hybridcombine23a = $_POST['$hybridcombine23a'];
            $hybridcombine23b = $_POST['$hybridcombine23b'];
            $hybridcombine23c = $_POST['$hybridcombine23c'];
            $opvyellow23a = $_POST['$opvyellow23a'];
            $opvyellow23b = $_POST['$opvyellow23b'];
            $opvyellow23c = $_POST['$opvyellow23c'];
            $opvwhite23a = $_POST['$opvwhite23a'];
            $opvwhite23b = $_POST['$opvwhite23b'];
            $opvwhite23c = $_POST['$opvwhite23c'];
            $opvcombine23a = $_POST['$opvcombine23a'];
            $opvcombine23b = $_POST['$opvcombine23b'];
            $opvcombine23c = $_POST['$opvcombine23c'];
            $grandyellow23a = $_POST['$grandyellow23a'];
            $grandyellow23b = $_POST['$grandyellow23b'];
            $grandyellow23c = $_POST['$grandyellow23c'];
            $grandwhite23a = $_POST['$grandwhite23a'];
            $grandwhite23b = $_POST['$grandwhite23b'];
            $grandwhite23c = $_POST['$grandwhite23c'];
            $grandtotal23a = $_POST['$grandtotal23a'];
            $grandtotal23b = $_POST['$grandtotal23b'];
            $grandtotal23c = $_POST['$grandtotal23c'];

            $reportid24 = $_POST['reportid24'];
            $barangay24 = $_POST['$barangay24'];
            $nooffarmer24 = $_POST['$nooffarmer24'];
            $hybridyellow24a = $_POST['$hybridyellow24a'];
            $hybridyellow24b = $_POST['$hybridyellow24b'];
            $hybridyellow24c = $_POST['$hybridyellow24c'];
            $hybridwhite24a = $_POST['$hybridwhite24a'];
            $hybridwhite24b = $_POST['$hybridwhite24b'];
            $hybridwhite24c = $_POST['$hybridwhite24c'];
            $hybridcombine24a = $_POST['$hybridcombine24a'];
            $hybridcombine24b = $_POST['$hybridcombine24b'];
            $hybridcombine24c = $_POST['$hybridcombine24c'];
            $opvyellow24a = $_POST['$opvyellow24a'];
            $opvyellow24b = $_POST['$opvyellow24b'];
            $opvyellow24c = $_POST['$opvyellow24c'];
            $opvwhite24a = $_POST['$opvwhite24a'];
            $opvwhite24b = $_POST['$opvwhite24b'];
            $opvwhite24c = $_POST['$opvwhite24c'];
            $opvcombine24a = $_POST['$opvcombine24a'];
            $opvcombine24b = $_POST['$opvcombine24b'];
            $opvcombine24c = $_POST['$opvcombine24c'];
            $grandyellow24a = $_POST['$grandyellow24a'];
            $grandyellow24b = $_POST['$grandyellow24b'];
            $grandyellow24c = $_POST['$grandyellow24c'];
            $grandwhite24a = $_POST['$grandwhite24a'];
            $grandwhite24b = $_POST['$grandwhite24b'];
            $grandwhite24c = $_POST['$grandwhite24c'];
            $grandtotal24a = $_POST['$grandtotal24a'];
            $grandtotal24b = $_POST['$grandtotal24b'];
            $grandtotal24c = $_POST['$grandtotal24c'];

            $reportid25 = $_POST['reportid25'];
            $barangay25 = $_POST['$barangay25'];
            $nooffarmer25 = $_POST['$nooffarmer25'];
            $hybridyellow25a = $_POST['$hybridyellow25a'];
            $hybridyellow25b = $_POST['$hybridyellow25b'];
            $hybridyellow25c = $_POST['$hybridyellow25c'];
            $hybridwhite25a = $_POST['$hybridwhite25a'];
            $hybridwhite25b = $_POST['$hybridwhite25b'];
            $hybridwhite25c = $_POST['$hybridwhite25c'];
            $hybridcombine25a = $_POST['$hybridcombine25a'];
            $hybridcombine25b = $_POST['$hybridcombine25b'];
            $hybridcombine25c = $_POST['$hybridcombine25c'];
            $opvyellow25a = $_POST['$opvyellow25a'];
            $opvyellow25b = $_POST['$opvyellow25b'];
            $opvyellow25c = $_POST['$opvyellow25c'];
            $opvwhite25a = $_POST['$opvwhite25a'];
            $opvwhite25b = $_POST['$opvwhite25b'];
            $opvwhite25c = $_POST['$opvwhite25c'];
            $opvcombine25a = $_POST['$opvcombine25a'];
            $opvcombine25b = $_POST['$opvcombine25b'];
            $opvcombine25c = $_POST['$opvcombine25c'];
            $grandyellow25a = $_POST['$grandyellow25a'];
            $grandyellow25b = $_POST['$grandyellow25b'];
            $grandyellow25c = $_POST['$grandyellow25c'];
            $grandwhite25a = $_POST['$grandwhite25a'];
            $grandwhite25b = $_POST['$grandwhite25b'];
            $grandwhite25c = $_POST['$grandwhite25c'];
            $grandtotal25a = $_POST['$grandtotal25a'];
            $grandtotal25b = $_POST['$grandtotal25b'];
            $grandtotal25c = $_POST['$grandtotal25c'];

            
            $sql1 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer1."',`hybridyellowarea`='".$hybridyellow1a."',`hybridyellowyield`='".$hybridyellow1b."',`hybridyellowprod`'".$hybridyellow1c."',`hybridwhitearea`'".$hybridwhite1a."',`hybridwhiteyield`'".$hybridwhite1b."',`hybridwhiteprod`='".$hybridwhite1c."',`hybridcombinearea`='".$hybridcombine1a."',`hybridcombineyield`='".$hybridcombine1b."',`hybridcombineprod`='".$hybridcombine1c."',`opvyellowarea`='".$opvyellow1a."',`opvyellowyield`='".$opvyellow1b."',`opvyellowprod`='".$opvyellow1c."',`opvwhitearea`='".$opvwhite1a."',`opvwhiteyield`='".$opvwhite1b."',`opvwhiteprod`='".$opvwhite1c."',`opvcombinearea`='".$opvcombine1a."',`opvcombineyield`='".$opvcombine1b."',`opvcombineprod`='".$opvcombine1c."',`grandyellowarea`='".$grandyellow1a."',`grandyellowyield`='".$grandyellow1b."',`grandyellowprod`='".$grandyellow1c."',`grandwhitearea`='".$grandwhite1a."',`grandwhiteyield`='".$grandwhite1b."',`grandwhiteprod`='".$grandwhite1c."',`grandcombinearea`='".$grandtotal1a."',`grandcombineyield`='".$grandtotal1b."',`grandcombineprod`='".$grandtotal1c."' WHERE `id` = '".$reportid1."'";
                if(mysqli_query($con, $sql1)){
                    $success = "1";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "1";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql2 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer2."',`hybridyellowarea`='".$hybridyellow2a."',`hybridyellowyield`='".$hybridyellow2b."',`hybridyellowprod`'".$hybridyellow2c."',`hybridwhitearea`'".$hybridwhite2a."',`hybridwhiteyield`'".$hybridwhite2b."',`hybridwhiteprod`='".$hybridwhite2c."',`hybridcombinearea`='".$hybridcombine2a."',`hybridcombineyield`='".$hybridcombine2b."',`hybridcombineprod`='".$hybridcombine2c."',`opvyellowarea`='".$opvyellow2a."',`opvyellowyield`='".$opvyellow2b."',`opvyellowprod`='".$opvyellow2c."',`opvwhitearea`='".$opvwhite2a."',`opvwhiteyield`='".$opvwhite2b."',`opvwhiteprod`='".$opvwhite2c."',`opvcombinearea`='".$opvcombine2a."',`opvcombineyield`='".$opvcombine2b."',`opvcombineprod`='".$opvcombine2c."',`grandyellowarea`='".$grandyellow2a."',`grandyellowyield`='".$grandyellow2b."',`grandyellowprod`='".$grandyellow2c."',`grandwhitearea`='".$grandwhite2a."',`grandwhiteyield`='".$grandwhite2b."',`grandwhiteprod`='".$grandwhite2c."',`grandcombinearea`='".$grandtotal2a."',`grandcombineyield`='".$grandtotal2b."',`grandcombineprod`='".$grandtotal2c."' WHERE `id` = '".$reportid2."'";
                if(mysqli_query($con, $sql2)){
                    $success = "2";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "2";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql3 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer3."',`hybridyellowarea`='".$hybridyellow3a."',`hybridyellowyield`='".$hybridyellow3b."',`hybridyellowprod`'".$hybridyellow3c."',`hybridwhitearea`'".$hybridwhite3a."',`hybridwhiteyield`'".$hybridwhite3b."',`hybridwhiteprod`='".$hybridwhite3c."',`hybridcombinearea`='".$hybridcombine3a."',`hybridcombineyield`='".$hybridcombine3b."',`hybridcombineprod`='".$hybridcombine3c."',`opvyellowarea`='".$opvyellow3a."',`opvyellowyield`='".$opvyellow3b."',`opvyellowprod`='".$opvyellow3c."',`opvwhitearea`='".$opvwhite3a."',`opvwhiteyield`='".$opvwhite3b."',`opvwhiteprod`='".$opvwhite3c."',`opvcombinearea`='".$opvcombine3a."',`opvcombineyield`='".$opvcombine3b."',`opvcombineprod`='".$opvcombine3c."',`grandyellowarea`='".$grandyellow3a."',`grandyellowyield`='".$grandyellow3b."',`grandyellowprod`='".$grandyellow3c."',`grandwhitearea`='".$grandwhite3a."',`grandwhiteyield`='".$grandwhite3b."',`grandwhiteprod`='".$grandwhite3c."',`grandcombinearea`='".$grandtotal3a."',`grandcombineyield`='".$grandtotal3b."',`grandcombineprod`='".$grandtotal3c."' WHERE `id` = '".$reportid3."'";
                if(mysqli_query($con, $sql3)){
                    $success = "3";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "3";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql4 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer4."',`hybridyellowarea`='".$hybridyellow4a."',`hybridyellowyield`='".$hybridyellow4b."',`hybridyellowprod`'".$hybridyellow4c."',`hybridwhitearea`'".$hybridwhite4a."',`hybridwhiteyield`'".$hybridwhite4b."',`hybridwhiteprod`='".$hybridwhite4c."',`hybridcombinearea`='".$hybridcombine4a."',`hybridcombineyield`='".$hybridcombine4b."',`hybridcombineprod`='".$hybridcombine4c."',`opvyellowarea`='".$opvyellow4a."',`opvyellowyield`='".$opvyellow4b."',`opvyellowprod`='".$opvyellow4c."',`opvwhitearea`='".$opvwhite4a."',`opvwhiteyield`='".$opvwhite4b."',`opvwhiteprod`='".$opvwhite4c."',`opvcombinearea`='".$opvcombine4a."',`opvcombineyield`='".$opvcombine4b."',`opvcombineprod`='".$opvcombine4c."',`grandyellowarea`='".$grandyellow4a."',`grandyellowyield`='".$grandyellow4b."',`grandyellowprod`='".$grandyellow4c."',`grandwhitearea`='".$grandwhite4a."',`grandwhiteyield`='".$grandwhite4b."',`grandwhiteprod`='".$grandwhite4c."',`grandcombinearea`='".$grandtotal4a."',`grandcombineyield`='".$grandtotal4b."',`grandcombineprod`='".$grandtotal4c."' WHERE `id` = '".$reportid4."'";
                if(mysqli_query($con, $sql4)){
                    $success = "4";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "4";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql5 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer5."',`hybridyellowarea`='".$hybridyellow5a."',`hybridyellowyield`='".$hybridyellow5b."',`hybridyellowprod`'".$hybridyellow5c."',`hybridwhitearea`'".$hybridwhite5a."',`hybridwhiteyield`'".$hybridwhite5b."',`hybridwhiteprod`='".$hybridwhite5c."',`hybridcombinearea`='".$hybridcombine5a."',`hybridcombineyield`='".$hybridcombine5b."',`hybridcombineprod`='".$hybridcombine5c."',`opvyellowarea`='".$opvyellow5a."',`opvyellowyield`='".$opvyellow5b."',`opvyellowprod`='".$opvyellow5c."',`opvwhitearea`='".$opvwhite5a."',`opvwhiteyield`='".$opvwhite5b."',`opvwhiteprod`='".$opvwhite5c."',`opvcombinearea`='".$opvcombine5a."',`opvcombineyield`='".$opvcombine5b."',`opvcombineprod`='".$opvcombine5c."',`grandyellowarea`='".$grandyellow5a."',`grandyellowyield`='".$grandyellow5b."',`grandyellowprod`='".$grandyellow5c."',`grandwhitearea`='".$grandwhite5a."',`grandwhiteyield`='".$grandwhite5b."',`grandwhiteprod`='".$grandwhite5c."',`grandcombinearea`='".$grandtotal5a."',`grandcombineyield`='".$grandtotal5b."',`grandcombineprod`='".$grandtotal5c."' WHERE `id` = '".$reportid5."'";
                if(mysqli_query($con, $sql5)){
                    $success = "5";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "5";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql6 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer6."',`hybridyellowarea`='".$hybridyellow6a."',`hybridyellowyield`='".$hybridyellow6b."',`hybridyellowprod`'".$hybridyellow6c."',`hybridwhitearea`'".$hybridwhite6a."',`hybridwhiteyield`'".$hybridwhite6b."',`hybridwhiteprod`='".$hybridwhite6c."',`hybridcombinearea`='".$hybridcombine6a."',`hybridcombineyield`='".$hybridcombine6b."',`hybridcombineprod`='".$hybridcombine6c."',`opvyellowarea`='".$opvyellow6a."',`opvyellowyield`='".$opvyellow6b."',`opvyellowprod`='".$opvyellow6c."',`opvwhitearea`='".$opvwhite6a."',`opvwhiteyield`='".$opvwhite6b."',`opvwhiteprod`='".$opvwhite6c."',`opvcombinearea`='".$opvcombine6a."',`opvcombineyield`='".$opvcombine6b."',`opvcombineprod`='".$opvcombine6c."',`grandyellowarea`='".$grandyellow6a."',`grandyellowyield`='".$grandyellow6b."',`grandyellowprod`='".$grandyellow6c."',`grandwhitearea`='".$grandwhite6a."',`grandwhiteyield`='".$grandwhite6b."',`grandwhiteprod`='".$grandwhite6c."',`grandcombinearea`='".$grandtotal6a."',`grandcombineyield`='".$grandtotal6b."',`grandcombineprod`='".$grandtotal6c."' WHERE `id` = '".$reportid6."'";
                if(mysqli_query($con, $sql6)){
                    $success = "6";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "6";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql7 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer7."',`hybridyellowarea`='".$hybridyellow7a."',`hybridyellowyield`='".$hybridyellow7b."',`hybridyellowprod`'".$hybridyellow7c."',`hybridwhitearea`'".$hybridwhite7a."',`hybridwhiteyield`'".$hybridwhite7b."',`hybridwhiteprod`='".$hybridwhite7c."',`hybridcombinearea`='".$hybridcombine7a."',`hybridcombineyield`='".$hybridcombine7b."',`hybridcombineprod`='".$hybridcombine7c."',`opvyellowarea`='".$opvyellow7a."',`opvyellowyield`='".$opvyellow7b."',`opvyellowprod`='".$opvyellow7c."',`opvwhitearea`='".$opvwhite7a."',`opvwhiteyield`='".$opvwhite7b."',`opvwhiteprod`='".$opvwhite7c."',`opvcombinearea`='".$opvcombine7a."',`opvcombineyield`='".$opvcombine7b."',`opvcombineprod`='".$opvcombine7c."',`grandyellowarea`='".$grandyellow7a."',`grandyellowyield`='".$grandyellow7b."',`grandyellowprod`='".$grandyellow7c."',`grandwhitearea`='".$grandwhite7a."',`grandwhiteyield`='".$grandwhite7b."',`grandwhiteprod`='".$grandwhite7c."',`grandcombinearea`='".$grandtotal7a."',`grandcombineyield`='".$grandtotal7b."',`grandcombineprod`='".$grandtotal7c."' WHERE `id` = '".$reportid7."'";
                if(mysqli_query($con, $sql7)){
                    $success = "7";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "7";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql8 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer8."',`hybridyellowarea`='".$hybridyellow8a."',`hybridyellowyield`='".$hybridyellow8b."',`hybridyellowprod`'".$hybridyellow8c."',`hybridwhitearea`'".$hybridwhite8a."',`hybridwhiteyield`'".$hybridwhite8b."',`hybridwhiteprod`='".$hybridwhite8c."',`hybridcombinearea`='".$hybridcombine8a."',`hybridcombineyield`='".$hybridcombine8b."',`hybridcombineprod`='".$hybridcombine8c."',`opvyellowarea`='".$opvyellow8a."',`opvyellowyield`='".$opvyellow8b."',`opvyellowprod`='".$opvyellow8c."',`opvwhitearea`='".$opvwhite8a."',`opvwhiteyield`='".$opvwhite8b."',`opvwhiteprod`='".$opvwhite8c."',`opvcombinearea`='".$opvcombine8a."',`opvcombineyield`='".$opvcombine8b."',`opvcombineprod`='".$opvcombine8c."',`grandyellowarea`='".$grandyellow8a."',`grandyellowyield`='".$grandyellow8b."',`grandyellowprod`='".$grandyellow8c."',`grandwhitearea`='".$grandwhite8a."',`grandwhiteyield`='".$grandwhite8b."',`grandwhiteprod`='".$grandwhite8c."',`grandcombinearea`='".$grandtotal8a."',`grandcombineyield`='".$grandtotal8b."',`grandcombineprod`='".$grandtotal8c."' WHERE `id` = '".$reportid8."'";
                if(mysqli_query($con, $sql8)){
                    $success = "8";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "8";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql9 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer9."',`hybridyellowarea`='".$hybridyellow9a."',`hybridyellowyield`='".$hybridyellow9b."',`hybridyellowprod`'".$hybridyellow9c."',`hybridwhitearea`'".$hybridwhite9a."',`hybridwhiteyield`'".$hybridwhite9b."',`hybridwhiteprod`='".$hybridwhite9c."',`hybridcombinearea`='".$hybridcombine9a."',`hybridcombineyield`='".$hybridcombine9b."',`hybridcombineprod`='".$hybridcombine9c."',`opvyellowarea`='".$opvyellow9a."',`opvyellowyield`='".$opvyellow9b."',`opvyellowprod`='".$opvyellow9c."',`opvwhitearea`='".$opvwhite9a."',`opvwhiteyield`='".$opvwhite9b."',`opvwhiteprod`='".$opvwhite9c."',`opvcombinearea`='".$opvcombine9a."',`opvcombineyield`='".$opvcombine9b."',`opvcombineprod`='".$opvcombine9c."',`grandyellowarea`='".$grandyellow9a."',`grandyellowyield`='".$grandyellow9b."',`grandyellowprod`='".$grandyellow9c."',`grandwhitearea`='".$grandwhite9a."',`grandwhiteyield`='".$grandwhite9b."',`grandwhiteprod`='".$grandwhite9c."',`grandcombinearea`='".$grandtotal9a."',`grandcombineyield`='".$grandtotal9b."',`grandcombineprod`='".$grandtotal9c."' WHERE `id` = '".$reportid9."'";
                if(mysqli_query($con, $sql9)){
                    $success = "9";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "9";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql10 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer10."',`hybridyellowarea`='".$hybridyellow10a."',`hybridyellowyield`='".$hybridyellow10b."',`hybridyellowprod`'".$hybridyellow10c."',`hybridwhitearea`'".$hybridwhite10a."',`hybridwhiteyield`'".$hybridwhite10b."',`hybridwhiteprod`='".$hybridwhite10c."',`hybridcombinearea`='".$hybridcombine10a."',`hybridcombineyield`='".$hybridcombine10b."',`hybridcombineprod`='".$hybridcombine10c."',`opvyellowarea`='".$opvyellow10a."',`opvyellowyield`='".$opvyellow10b."',`opvyellowprod`='".$opvyellow10c."',`opvwhitearea`='".$opvwhite10a."',`opvwhiteyield`='".$opvwhite10b."',`opvwhiteprod`='".$opvwhite10c."',`opvcombinearea`='".$opvcombine10a."',`opvcombineyield`='".$opvcombine10b."',`opvcombineprod`='".$opvcombine10c."',`grandyellowarea`='".$grandyellow10a."',`grandyellowyield`='".$grandyellow10b."',`grandyellowprod`='".$grandyellow10c."',`grandwhitearea`='".$grandwhite10a."',`grandwhiteyield`='".$grandwhite10b."',`grandwhiteprod`='".$grandwhite10c."',`grandcombinearea`='".$grandtotal10a."',`grandcombineyield`='".$grandtotal10b."',`grandcombineprod`='".$grandtotal10c."' WHERE `id` = '".$reportid10."'";
                if(mysqli_query($con, $sql10)){
                    $success = "10";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "10";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql11 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer11."',`hybridyellowarea`='".$hybridyellow11a."',`hybridyellowyield`='".$hybridyellow11b."',`hybridyellowprod`'".$hybridyellow11c."',`hybridwhitearea`'".$hybridwhite11a."',`hybridwhiteyield`'".$hybridwhite11b."',`hybridwhiteprod`='".$hybridwhite11c."',`hybridcombinearea`='".$hybridcombine11a."',`hybridcombineyield`='".$hybridcombine11b."',`hybridcombineprod`='".$hybridcombine11c."',`opvyellowarea`='".$opvyellow11a."',`opvyellowyield`='".$opvyellow11b."',`opvyellowprod`='".$opvyellow11c."',`opvwhitearea`='".$opvwhite11a."',`opvwhiteyield`='".$opvwhite11b."',`opvwhiteprod`='".$opvwhite11c."',`opvcombinearea`='".$opvcombine11a."',`opvcombineyield`='".$opvcombine11b."',`opvcombineprod`='".$opvcombine11c."',`grandyellowarea`='".$grandyellow11a."',`grandyellowyield`='".$grandyellow11b."',`grandyellowprod`='".$grandyellow11c."',`grandwhitearea`='".$grandwhite11a."',`grandwhiteyield`='".$grandwhite11b."',`grandwhiteprod`='".$grandwhite11c."',`grandcombinearea`='".$grandtotal11a."',`grandcombineyield`='".$grandtotal11b."',`grandcombineprod`='".$grandtotal11c."' WHERE `id` = '".$reportid11."'";
                if(mysqli_query($con, $sql11)){
                    $success = "11";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "11";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql12 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer12."',`hybridyellowarea`='".$hybridyellow12a."',`hybridyellowyield`='".$hybridyellow12b."',`hybridyellowprod`'".$hybridyellow12c."',`hybridwhitearea`'".$hybridwhite12a."',`hybridwhiteyield`'".$hybridwhite12b."',`hybridwhiteprod`='".$hybridwhite12c."',`hybridcombinearea`='".$hybridcombine12a."',`hybridcombineyield`='".$hybridcombine12b."',`hybridcombineprod`='".$hybridcombine12c."',`opvyellowarea`='".$opvyellow12a."',`opvyellowyield`='".$opvyellow12b."',`opvyellowprod`='".$opvyellow12c."',`opvwhitearea`='".$opvwhite12a."',`opvwhiteyield`='".$opvwhite12b."',`opvwhiteprod`='".$opvwhite12c."',`opvcombinearea`='".$opvcombine12a."',`opvcombineyield`='".$opvcombine12b."',`opvcombineprod`='".$opvcombine12c."',`grandyellowarea`='".$grandyellow12a."',`grandyellowyield`='".$grandyellow12b."',`grandyellowprod`='".$grandyellow12c."',`grandwhitearea`='".$grandwhite12a."',`grandwhiteyield`='".$grandwhite12b."',`grandwhiteprod`='".$grandwhite12c."',`grandcombinearea`='".$grandtotal12a."',`grandcombineyield`='".$grandtotal12b."',`grandcombineprod`='".$grandtotal12c."' WHERE `id` = '".$reportid12."'";
                if(mysqli_query($con, $sql12)){
                    $success = "12";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "12";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql13 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer13."',`hybridyellowarea`='".$hybridyellow13a."',`hybridyellowyield`='".$hybridyellow13b."',`hybridyellowprod`'".$hybridyellow13c."',`hybridwhitearea`'".$hybridwhite13a."',`hybridwhiteyield`'".$hybridwhite13b."',`hybridwhiteprod`='".$hybridwhite13c."',`hybridcombinearea`='".$hybridcombine13a."',`hybridcombineyield`='".$hybridcombine13b."',`hybridcombineprod`='".$hybridcombine13c."',`opvyellowarea`='".$opvyellow13a."',`opvyellowyield`='".$opvyellow13b."',`opvyellowprod`='".$opvyellow13c."',`opvwhitearea`='".$opvwhite13a."',`opvwhiteyield`='".$opvwhite13b."',`opvwhiteprod`='".$opvwhite13c."',`opvcombinearea`='".$opvcombine13a."',`opvcombineyield`='".$opvcombine13b."',`opvcombineprod`='".$opvcombine13c."',`grandyellowarea`='".$grandyellow13a."',`grandyellowyield`='".$grandyellow13b."',`grandyellowprod`='".$grandyellow13c."',`grandwhitearea`='".$grandwhite13a."',`grandwhiteyield`='".$grandwhite13b."',`grandwhiteprod`='".$grandwhite13c."',`grandcombinearea`='".$grandtotal13a."',`grandcombineyield`='".$grandtotal13b."',`grandcombineprod`='".$grandtotal13c."' WHERE `id` = '".$reportid13."'";
                if(mysqli_query($con, $sql13)){
                    $success = "13";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "13";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql14 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer14."',`hybridyellowarea`='".$hybridyellow14a."',`hybridyellowyield`='".$hybridyellow14b."',`hybridyellowprod`'".$hybridyellow14c."',`hybridwhitearea`'".$hybridwhite14a."',`hybridwhiteyield`'".$hybridwhite14b."',`hybridwhiteprod`='".$hybridwhite14c."',`hybridcombinearea`='".$hybridcombine14a."',`hybridcombineyield`='".$hybridcombine14b."',`hybridcombineprod`='".$hybridcombine14c."',`opvyellowarea`='".$opvyellow14a."',`opvyellowyield`='".$opvyellow14b."',`opvyellowprod`='".$opvyellow14c."',`opvwhitearea`='".$opvwhite14a."',`opvwhiteyield`='".$opvwhite14b."',`opvwhiteprod`='".$opvwhite14c."',`opvcombinearea`='".$opvcombine14a."',`opvcombineyield`='".$opvcombine14b."',`opvcombineprod`='".$opvcombine14c."',`grandyellowarea`='".$grandyellow14a."',`grandyellowyield`='".$grandyellow14b."',`grandyellowprod`='".$grandyellow14c."',`grandwhitearea`='".$grandwhite14a."',`grandwhiteyield`='".$grandwhite14b."',`grandwhiteprod`='".$grandwhite14c."',`grandcombinearea`='".$grandtotal14a."',`grandcombineyield`='".$grandtotal14b."',`grandcombineprod`='".$grandtotal14c."' WHERE `id` = '".$reportid14."'";
                if(mysqli_query($con, $sql14)){
                    $success = "14";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "14";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql15 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer15."',`hybridyellowarea`='".$hybridyellow15a."',`hybridyellowyield`='".$hybridyellow15b."',`hybridyellowprod`'".$hybridyellow15c."',`hybridwhitearea`'".$hybridwhite15a."',`hybridwhiteyield`'".$hybridwhite15b."',`hybridwhiteprod`='".$hybridwhite15c."',`hybridcombinearea`='".$hybridcombine15a."',`hybridcombineyield`='".$hybridcombine15b."',`hybridcombineprod`='".$hybridcombine15c."',`opvyellowarea`='".$opvyellow15a."',`opvyellowyield`='".$opvyellow15b."',`opvyellowprod`='".$opvyellow15c."',`opvwhitearea`='".$opvwhite15a."',`opvwhiteyield`='".$opvwhite15b."',`opvwhiteprod`='".$opvwhite15c."',`opvcombinearea`='".$opvcombine15a."',`opvcombineyield`='".$opvcombine15b."',`opvcombineprod`='".$opvcombine15c."',`grandyellowarea`='".$grandyellow15a."',`grandyellowyield`='".$grandyellow15b."',`grandyellowprod`='".$grandyellow15c."',`grandwhitearea`='".$grandwhite15a."',`grandwhiteyield`='".$grandwhite15b."',`grandwhiteprod`='".$grandwhite15c."',`grandcombinearea`='".$grandtotal15a."',`grandcombineyield`='".$grandtotal15b."',`grandcombineprod`='".$grandtotal15c."' WHERE `id` = '".$reportid15."'";
                if(mysqli_query($con, $sql15)){
                    $success = "15";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "15";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql16 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer16."',`hybridyellowarea`='".$hybridyellow16a."',`hybridyellowyield`='".$hybridyellow16b."',`hybridyellowprod`'".$hybridyellow16c."',`hybridwhitearea`'".$hybridwhite16a."',`hybridwhiteyield`'".$hybridwhite16b."',`hybridwhiteprod`='".$hybridwhite16c."',`hybridcombinearea`='".$hybridcombine16a."',`hybridcombineyield`='".$hybridcombine16b."',`hybridcombineprod`='".$hybridcombine16c."',`opvyellowarea`='".$opvyellow16a."',`opvyellowyield`='".$opvyellow16b."',`opvyellowprod`='".$opvyellow16c."',`opvwhitearea`='".$opvwhite16a."',`opvwhiteyield`='".$opvwhite16b."',`opvwhiteprod`='".$opvwhite16c."',`opvcombinearea`='".$opvcombine16a."',`opvcombineyield`='".$opvcombine16b."',`opvcombineprod`='".$opvcombine16c."',`grandyellowarea`='".$grandyellow16a."',`grandyellowyield`='".$grandyellow16b."',`grandyellowprod`='".$grandyellow16c."',`grandwhitearea`='".$grandwhite16a."',`grandwhiteyield`='".$grandwhite16b."',`grandwhiteprod`='".$grandwhite16c."',`grandcombinearea`='".$grandtotal16a."',`grandcombineyield`='".$grandtotal16b."',`grandcombineprod`='".$grandtotal16c."' WHERE `id` = '".$reportid16."'";
                if(mysqli_query($con, $sql16)){
                    $success = "16";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "16";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql17 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer17."',`hybridyellowarea`='".$hybridyellow17a."',`hybridyellowyield`='".$hybridyellow17b."',`hybridyellowprod`'".$hybridyellow17c."',`hybridwhitearea`'".$hybridwhite17a."',`hybridwhiteyield`'".$hybridwhite17b."',`hybridwhiteprod`='".$hybridwhite17c."',`hybridcombinearea`='".$hybridcombine17a."',`hybridcombineyield`='".$hybridcombine17b."',`hybridcombineprod`='".$hybridcombine17c."',`opvyellowarea`='".$opvyellow17a."',`opvyellowyield`='".$opvyellow17b."',`opvyellowprod`='".$opvyellow17c."',`opvwhitearea`='".$opvwhite17a."',`opvwhiteyield`='".$opvwhite17b."',`opvwhiteprod`='".$opvwhite17c."',`opvcombinearea`='".$opvcombine17a."',`opvcombineyield`='".$opvcombine17b."',`opvcombineprod`='".$opvcombine17c."',`grandyellowarea`='".$grandyellow17a."',`grandyellowyield`='".$grandyellow17b."',`grandyellowprod`='".$grandyellow17c."',`grandwhitearea`='".$grandwhite17a."',`grandwhiteyield`='".$grandwhite17b."',`grandwhiteprod`='".$grandwhite17c."',`grandcombinearea`='".$grandtotal17a."',`grandcombineyield`='".$grandtotal17b."',`grandcombineprod`='".$grandtotal17c."' WHERE `id` = '".$reportid17."'";
                if(mysqli_query($con, $sql17)){
                    $success = "17";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "17";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql18 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer18."',`hybridyellowarea`='".$hybridyellow18a."',`hybridyellowyield`='".$hybridyellow18b."',`hybridyellowprod`'".$hybridyellow18c."',`hybridwhitearea`'".$hybridwhite18a."',`hybridwhiteyield`'".$hybridwhite18b."',`hybridwhiteprod`='".$hybridwhite18c."',`hybridcombinearea`='".$hybridcombine18a."',`hybridcombineyield`='".$hybridcombine18b."',`hybridcombineprod`='".$hybridcombine18c."',`opvyellowarea`='".$opvyellow18a."',`opvyellowyield`='".$opvyellow18b."',`opvyellowprod`='".$opvyellow18c."',`opvwhitearea`='".$opvwhite18a."',`opvwhiteyield`='".$opvwhite18b."',`opvwhiteprod`='".$opvwhite18c."',`opvcombinearea`='".$opvcombine18a."',`opvcombineyield`='".$opvcombine18b."',`opvcombineprod`='".$opvcombine18c."',`grandyellowarea`='".$grandyellow18a."',`grandyellowyield`='".$grandyellow18b."',`grandyellowprod`='".$grandyellow18c."',`grandwhitearea`='".$grandwhite18a."',`grandwhiteyield`='".$grandwhite18b."',`grandwhiteprod`='".$grandwhite18c."',`grandcombinearea`='".$grandtotal18a."',`grandcombineyield`='".$grandtotal18b."',`grandcombineprod`='".$grandtotal18c."' WHERE `id` = '".$reportid18."'";
                if(mysqli_query($con, $sql18)){
                    $success = "18";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "18";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql19 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer19."',`hybridyellowarea`='".$hybridyellow19a."',`hybridyellowyield`='".$hybridyellow19b."',`hybridyellowprod`'".$hybridyellow19c."',`hybridwhitearea`'".$hybridwhite19a."',`hybridwhiteyield`'".$hybridwhite19b."',`hybridwhiteprod`='".$hybridwhite19c."',`hybridcombinearea`='".$hybridcombine19a."',`hybridcombineyield`='".$hybridcombine19b."',`hybridcombineprod`='".$hybridcombine19c."',`opvyellowarea`='".$opvyellow19a."',`opvyellowyield`='".$opvyellow19b."',`opvyellowprod`='".$opvyellow19c."',`opvwhitearea`='".$opvwhite19a."',`opvwhiteyield`='".$opvwhite19b."',`opvwhiteprod`='".$opvwhite19c."',`opvcombinearea`='".$opvcombine19a."',`opvcombineyield`='".$opvcombine19b."',`opvcombineprod`='".$opvcombine19c."',`grandyellowarea`='".$grandyellow19a."',`grandyellowyield`='".$grandyellow19b."',`grandyellowprod`='".$grandyellow19c."',`grandwhitearea`='".$grandwhite19a."',`grandwhiteyield`='".$grandwhite19b."',`grandwhiteprod`='".$grandwhite19c."',`grandcombinearea`='".$grandtotal19a."',`grandcombineyield`='".$grandtotal19b."',`grandcombineprod`='".$grandtotal19c."' WHERE `id` = '".$reportid19."'";
                if(mysqli_query($con, $sql19)){
                    $success = "19";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "19";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql20 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer20."',`hybridyellowarea`='".$hybridyellow20a."',`hybridyellowyield`='".$hybridyellow20b."',`hybridyellowprod`'".$hybridyellow20c."',`hybridwhitearea`'".$hybridwhite20a."',`hybridwhiteyield`'".$hybridwhite20b."',`hybridwhiteprod`='".$hybridwhite20c."',`hybridcombinearea`='".$hybridcombine20a."',`hybridcombineyield`='".$hybridcombine20b."',`hybridcombineprod`='".$hybridcombine20c."',`opvyellowarea`='".$opvyellow20a."',`opvyellowyield`='".$opvyellow20b."',`opvyellowprod`='".$opvyellow20c."',`opvwhitearea`='".$opvwhite20a."',`opvwhiteyield`='".$opvwhite20b."',`opvwhiteprod`='".$opvwhite20c."',`opvcombinearea`='".$opvcombine20a."',`opvcombineyield`='".$opvcombine20b."',`opvcombineprod`='".$opvcombine20c."',`grandyellowarea`='".$grandyellow20a."',`grandyellowyield`='".$grandyellow20b."',`grandyellowprod`='".$grandyellow20c."',`grandwhitearea`='".$grandwhite20a."',`grandwhiteyield`='".$grandwhite20b."',`grandwhiteprod`='".$grandwhite20c."',`grandcombinearea`='".$grandtotal20a."',`grandcombineyield`='".$grandtotal20b."',`grandcombineprod`='".$grandtotal20c."' WHERE `id` = '".$reportid20."'";
                if(mysqli_query($con, $sql20)){
                    $success = "20";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "20";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql21 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer21."',`hybridyellowarea`='".$hybridyellow21a."',`hybridyellowyield`='".$hybridyellow21b."',`hybridyellowprod`'".$hybridyellow21c."',`hybridwhitearea`'".$hybridwhite21a."',`hybridwhiteyield`'".$hybridwhite21b."',`hybridwhiteprod`='".$hybridwhite21c."',`hybridcombinearea`='".$hybridcombine21a."',`hybridcombineyield`='".$hybridcombine21b."',`hybridcombineprod`='".$hybridcombine21c."',`opvyellowarea`='".$opvyellow21a."',`opvyellowyield`='".$opvyellow21b."',`opvyellowprod`='".$opvyellow21c."',`opvwhitearea`='".$opvwhite21a."',`opvwhiteyield`='".$opvwhite21b."',`opvwhiteprod`='".$opvwhite21c."',`opvcombinearea`='".$opvcombine21a."',`opvcombineyield`='".$opvcombine21b."',`opvcombineprod`='".$opvcombine21c."',`grandyellowarea`='".$grandyellow21a."',`grandyellowyield`='".$grandyellow21b."',`grandyellowprod`='".$grandyellow21c."',`grandwhitearea`='".$grandwhite21a."',`grandwhiteyield`='".$grandwhite21b."',`grandwhiteprod`='".$grandwhite21c."',`grandcombinearea`='".$grandtotal21a."',`grandcombineyield`='".$grandtotal21b."',`grandcombineprod`='".$grandtotal21c."' WHERE `id` = '".$reportid21."'";
                if(mysqli_query($con, $sql21)){
                    $success = "21";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "21";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql22 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer22."',`hybridyellowarea`='".$hybridyellow22a."',`hybridyellowyield`='".$hybridyellow22b."',`hybridyellowprod`'".$hybridyellow22c."',`hybridwhitearea`'".$hybridwhite22a."',`hybridwhiteyield`'".$hybridwhite22b."',`hybridwhiteprod`='".$hybridwhite22c."',`hybridcombinearea`='".$hybridcombine22a."',`hybridcombineyield`='".$hybridcombine22b."',`hybridcombineprod`='".$hybridcombine22c."',`opvyellowarea`='".$opvyellow22a."',`opvyellowyield`='".$opvyellow22b."',`opvyellowprod`='".$opvyellow22c."',`opvwhitearea`='".$opvwhite22a."',`opvwhiteyield`='".$opvwhite22b."',`opvwhiteprod`='".$opvwhite22c."',`opvcombinearea`='".$opvcombine22a."',`opvcombineyield`='".$opvcombine22b."',`opvcombineprod`='".$opvcombine22c."',`grandyellowarea`='".$grandyellow22a."',`grandyellowyield`='".$grandyellow22b."',`grandyellowprod`='".$grandyellow22c."',`grandwhitearea`='".$grandwhite22a."',`grandwhiteyield`='".$grandwhite22b."',`grandwhiteprod`='".$grandwhite22c."',`grandcombinearea`='".$grandtotal22a."',`grandcombineyield`='".$grandtotal22b."',`grandcombineprod`='".$grandtotal22c."' WHERE `id` = '".$reportid22."'";
                if(mysqli_query($con, $sql22)){
                    $success = "22";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "22";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql23 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer23."',`hybridyellowarea`='".$hybridyellow23a."',`hybridyellowyield`='".$hybridyellow23b."',`hybridyellowprod`'".$hybridyellow23c."',`hybridwhitearea`'".$hybridwhite23a."',`hybridwhiteyield`'".$hybridwhite23b."',`hybridwhiteprod`='".$hybridwhite23c."',`hybridcombinearea`='".$hybridcombine23a."',`hybridcombineyield`='".$hybridcombine23b."',`hybridcombineprod`='".$hybridcombine23c."',`opvyellowarea`='".$opvyellow23a."',`opvyellowyield`='".$opvyellow23b."',`opvyellowprod`='".$opvyellow23c."',`opvwhitearea`='".$opvwhite23a."',`opvwhiteyield`='".$opvwhite23b."',`opvwhiteprod`='".$opvwhite23c."',`opvcombinearea`='".$opvcombine23a."',`opvcombineyield`='".$opvcombine23b."',`opvcombineprod`='".$opvcombine23c."',`grandyellowarea`='".$grandyellow23a."',`grandyellowyield`='".$grandyellow23b."',`grandyellowprod`='".$grandyellow23c."',`grandwhitearea`='".$grandwhite23a."',`grandwhiteyield`='".$grandwhite23b."',`grandwhiteprod`='".$grandwhite23c."',`grandcombinearea`='".$grandtotal23a."',`grandcombineyield`='".$grandtotal23b."',`grandcombineprod`='".$grandtotal23c."' WHERE `id` = '".$reportid23."'";
                if(mysqli_query($con, $sql23)){
                    $success = "23";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "23";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql24 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer24."',`hybridyellowarea`='".$hybridyellow24a."',`hybridyellowyield`='".$hybridyellow24b."',`hybridyellowprod`'".$hybridyellow24c."',`hybridwhitearea`'".$hybridwhite24a."',`hybridwhiteyield`'".$hybridwhite24b."',`hybridwhiteprod`='".$hybridwhite24c."',`hybridcombinearea`='".$hybridcombine24a."',`hybridcombineyield`='".$hybridcombine24b."',`hybridcombineprod`='".$hybridcombine24c."',`opvyellowarea`='".$opvyellow24a."',`opvyellowyield`='".$opvyellow24b."',`opvyellowprod`='".$opvyellow24c."',`opvwhitearea`='".$opvwhite24a."',`opvwhiteyield`='".$opvwhite24b."',`opvwhiteprod`='".$opvwhite24c."',`opvcombinearea`='".$opvcombine24a."',`opvcombineyield`='".$opvcombine24b."',`opvcombineprod`='".$opvcombine24c."',`grandyellowarea`='".$grandyellow24a."',`grandyellowyield`='".$grandyellow24b."',`grandyellowprod`='".$grandyellow24c."',`grandwhitearea`='".$grandwhite24a."',`grandwhiteyield`='".$grandwhite24b."',`grandwhiteprod`='".$grandwhite24c."',`grandcombinearea`='".$grandtotal24a."',`grandcombineyield`='".$grandtotal24b."',`grandcombineprod`='".$grandtotal24c."' WHERE `id` = '".$reportid24."'";
                if(mysqli_query($con, $sql24)){
                    $success = "24";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "24";
                    $error_message = "Error updating the form. Please try again.";
                }
                $sql25 = "UPDATE `tbl_corn_harvestng_report` SET `nooffarmers`='".$nooffarmer25."',`hybridyellowarea`='".$hybridyellow25a."',`hybridyellowyield`='".$hybridyellow25b."',`hybridyellowprod`'".$hybridyellow25c."',`hybridwhitearea`'".$hybridwhite25a."',`hybridwhiteyield`'".$hybridwhite25b."',`hybridwhiteprod`='".$hybridwhite25c."',`hybridcombinearea`='".$hybridcombine25a."',`hybridcombineyield`='".$hybridcombine25b."',`hybridcombineprod`='".$hybridcombine25c."',`opvyellowarea`='".$opvyellow25a."',`opvyellowyield`='".$opvyellow25b."',`opvyellowprod`='".$opvyellow25c."',`opvwhitearea`='".$opvwhite25a."',`opvwhiteyield`='".$opvwhite25b."',`opvwhiteprod`='".$opvwhite25c."',`opvcombinearea`='".$opvcombine25a."',`opvcombineyield`='".$opvcombine25b."',`opvcombineprod`='".$opvcombine25c."',`grandyellowarea`='".$grandyellow25a."',`grandyellowyield`='".$grandyellow25b."',`grandyellowprod`='".$grandyellow25c."',`grandwhitearea`='".$grandwhite25a."',`grandwhiteyield`='".$grandwhite25b."',`grandwhiteprod`='".$grandwhite25c."',`grandcombinearea`='".$grandtotal25a."',`grandcombineyield`='".$grandtotal25b."',`grandcombineprod`='".$grandtotal25c."' WHERE `id` = '".$reportid25."'";
                if(mysqli_query($con, $sql25)){
                    $success = "25";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "25";
                    $error_message = "Error updating the form. Please try again.";
                }


        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <div class="flex flex-row justify-between">
            <h2 class="text-2xl font-bold">Consolidation Corn Planting</h2>
            <button class="fa fa-pencil rounded-lg border-2 border-blue-500/50 p-5 w-auto icon-blue" id="btnupdate" onclick="show()">&nbsp;Edit</button>
            <button class="fa fa-eye rounded-lg border-2 border-green-500/50 p-5 w-auto icon-green" id="btnview" style="display:none;" onclick="hide()">&nbsp;View</button>
        </div>
        <br>
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
        <div class="flex flex-col gap-2">
            <form method="POST" action="" class="flex flex-col gap-2" style="overflow-x:auto">
                <table class="w-fit">
                    <tr>
                        <th colspan="22" style="text-align:center !important;"> CORN PLANT PEST MONITORING FORM </th>
                    </tr>
                    <tr>
                        <th colspan="11">Date: 
                            <input type="date" name="date" disabled> 
                        </th>
                        <th colspan="11">Crop: 
                            <select name="crop" id="" disabled>
                                <option value="crop">Corn</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11">Location:
                            <select name="location" id="" disabled>
                                <option value="mayabobo">Mayabobo</option>
                            </select>
                        </th>
                        <th colspan="11">Variety:
                            <input type="text" name="variety" id="" disabled>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11">GPS Coordinates:
                            <input type="text" name="gps" disabled>
                        </th>
                        <th colspan="11">Growth Stage:
                            <input type="text" name="growthstage" id="" disabled>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11">Name of Farmer:
                            <select name="farmer" id="" disabled>
                                <option value="John">John</option>
                            </select>
                        </th>
                        <th colspan="11">Area Planted (ha):
                            <input type="number" name="area" value="0" disabled>
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="1">Insect Pests</td>
                        <td rowspan="1" colspan="21">Number of Sampled Plants</td>
                    </tr>
                    <tr>
                        <td colspan="1">1</td>
                        <td colspan="1">2</td>
                        <td colspan="1">3</td>
                        <td colspan="1">4</td>
                        <td colspan="1">5</td>
                        <td colspan="1">6</td>
                        <td colspan="1">7</td>
                        <td colspan="1">8</td>
                        <td colspan="1">9</td>
                        <td colspan="1">10</td>
                        <td colspan="1">11</td>
                        <td colspan="1">12</td>
                        <td colspan="1">13</td>
                        <td colspan="1">14</td>
                        <td colspan="1">15</td>
                        <td colspan="1">16</td>
                        <td colspan="1">17</td>
                        <td colspan="1">18</td>
                        <td colspan="1">19</td>
                        <td colspan="1">20</td>
                        <td colspan="2">Total</td>
                    </tr>
                    <tr>
                        <td>CORN BORER</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="cornborer<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>EARWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="earworm<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>CORN PLANTHOPPER</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="planthopper<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>ARMYWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="armyworm<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>FALL ARMYWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="fallarmyworm<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="1">Insect Pests</td>
                        <td rowspan="1" colspan="21">Number of Sampled Plants</td>
                    </tr>
                    <tr>
                        <td colspan="1">1</td>
                        <td colspan="1">2</td>
                        <td colspan="1">3</td>
                        <td colspan="1">4</td>
                        <td colspan="1">5</td>
                        <td colspan="1">6</td>
                        <td colspan="1">7</td>
                        <td colspan="1">8</td>
                        <td colspan="1">9</td>
                        <td colspan="1">10</td>
                        <td colspan="1">11</td>
                        <td colspan="1">12</td>
                        <td colspan="1">13</td>
                        <td colspan="1">14</td>
                        <td colspan="1">15</td>
                        <td colspan="1">16</td>
                        <td colspan="1">17</td>
                        <td colspan="1">18</td>
                        <td colspan="1">19</td>
                        <td colspan="1">20</td>
                        <td colspan="2">Total</td>
                    </tr>
                    <tr>
                        <td>BLANDED LEAF/SHEATH BLIGHT</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="blanded<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>BACTERIA STALK ROT</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="bacteria<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>DOWNY MILDEW</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="downy<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td></td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="extraa<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td></td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td>
                            <input type="number" name="extrab<?php echo $i?>" id="" value="0" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="22">Other Information</td>
                    </tr>
                    <tr>
                        <th colspan="10">A. Fertilizer Application</th>
                        <th colspan="2"></th>
                        <th colspan="10">B. Pesticide Application</th>
                    </tr>
                    <tr>
                        <th colspan="4">Kind of Fertilizer</th>
                        <th colspan="4">Amount applied (kg/vol/ha)</th>
                        <th colspan="2">Date applied</th>
                        
                        <th colspan="2"></th>
                        
                        <th colspan="4">Kind of pesticide</th>
                        <th colspan="2">Dosage</th>
                        <th colspan="2">Date.days applied after planting</th>
                        <th colspan="2">No. of tankloads/ha</th>
                    </tr>
                    
                    <tr>
                        <th colspan="4">
                            <input type="text" name="kindoffertilizer" id="" disabled>
                        </th>
                        <th colspan="4">
                            <input type="number" name="amountapplied" id="" disabled>
                        </th>
                        <th colspan="2">
                            <input type="date" name="dateapplied" id="" disabled>
                        </th>
                        
                        <th colspan="2"></th>
                        
                        <th colspan="4">
                            <input type="text" name="kindofpesticide" id="" disabled>
                        </th>
                        <th colspan="2">
                            <input type="text" name="dosage" id="" disabled>
                        </th>
                        <th colspan="2">
                            <input type="date" name="dateappliedplanting" id="" disabled>
                        </th>
                        <th colspan="2">
                            <input type="number" name="tankloads" id="" disabled>
                        </th>
                    </tr>
                    
                    <tr>
                        <th colspan="15">Remarks</th>
                        <th colspan="7"></th>
                    </tr>
                    <tr>
                        <th colspan="15" rowspan="5">-</th>
                    </tr>
                    <tr>
                        <th colspan="7"> Prepared by: </th>
                    </tr>
                    <tr>
                        <th colspan="7">Name: <input type="text" name="preparedbyname" disabled/>
                    </tr>
                    <tr>
                        <th colspan="7">Designation: <input type="text" name="designation"/>
                    </tr>
                    <tr>
                        <th colspan="7">Date: <input type="text" name="dateremarks" disabled/>
                    </tr>
                    </table>
                <input type="submit" value="Update" name="btnupdate" id="btn_update" class="btn-primary" style="display:none;">
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


