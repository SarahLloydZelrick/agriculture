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
    <title>View Corn Plant Pest</title>

</head>
<style>
    .td-sm{
        max-width: 40px !important;
        min-width: 40px !important;
    }
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
    table{
        /*table-layout:fixed !important;*/
        width:100% !important;
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

        

        if (isset($_POST['btnupdate'] )) {
            $reportid = $_POST['reportid'];

            $date = $_POST['date'];
            $location = $_POST['location'];
            $name = $_POST['name'];
            $crop = $_POST['crop'];
            $variety = $_POST['variety'];
            $gps = $_POST['gps'];
            $growthstage = $_POST['growthstage'];
            $area = $_POST['area'];

            $cornborer1 = $_POST['cornborer1'];
            $cornborer2 = $_POST['cornborer2'];
            $cornborer3 = $_POST['cornborer3'];
            $cornborer4 = $_POST['cornborer4'];
            $cornborer5 = $_POST['cornborer5'];
            $cornborer6 = $_POST['cornborer6'];
            $cornborer7 = $_POST['cornborer7'];
            $cornborer8 = $_POST['cornborer8'];
            $cornborer9 = $_POST['cornborer9'];
            $cornborer10 = $_POST['cornborer10'];
            $cornborer11 = $_POST['cornborer11'];
            $cornborer12 = $_POST['cornborer12'];
            $cornborer13 = $_POST['cornborer13'];
            $cornborer14 = $_POST['cornborer14'];
            $cornborer15 = $_POST['cornborer15'];
            $cornborer16 = $_POST['cornborer16'];
            $cornborer17 = $_POST['cornborer17'];
            $cornborer18 = $_POST['cornborer18'];
            $cornborer19 = $_POST['cornborer19'];
            $cornborer20 = $_POST['cornborer20'];
            $cornborer21 = $_POST['cornborer21'];
            
            $earworm1 = $_POST['earworm1'];
            $earworm2 = $_POST['earworm2'];
            $earworm3 = $_POST['earworm3'];
            $earworm4 = $_POST['earworm4'];
            $earworm5 = $_POST['earworm5'];
            $earworm6 = $_POST['earworm6'];
            $earworm7 = $_POST['earworm7'];
            $earworm8 = $_POST['earworm8'];
            $earworm9 = $_POST['earworm9'];
            $earworm10 = $_POST['earworm10'];
            $earworm11 = $_POST['earworm11'];
            $earworm12 = $_POST['earworm12'];
            $earworm13 = $_POST['earworm13'];
            $earworm14 = $_POST['earworm14'];
            $earworm15 = $_POST['earworm15'];
            $earworm16 = $_POST['earworm16'];
            $earworm17 = $_POST['earworm17'];
            $earworm18 = $_POST['earworm18'];
            $earworm19 = $_POST['earworm19'];
            $earworm20 = $_POST['earworm20'];
            $earworm21 = $_POST['earworm21'];
            
            $planthopper1 = $_POST['planthopper1'];
            $planthopper2 = $_POST['planthopper2'];
            $planthopper3 = $_POST['planthopper3'];
            $planthopper4 = $_POST['planthopper4'];
            $planthopper5 = $_POST['planthopper5'];
            $planthopper6 = $_POST['planthopper6'];
            $planthopper7 = $_POST['planthopper7'];
            $planthopper8 = $_POST['planthopper8'];
            $planthopper9 = $_POST['planthopper9'];
            $planthopper10 = $_POST['planthopper10'];
            $planthopper11 = $_POST['planthopper11'];
            $planthopper12 = $_POST['planthopper12'];
            $planthopper13 = $_POST['planthopper13'];
            $planthopper14 = $_POST['planthopper14'];
            $planthopper15 = $_POST['planthopper15'];
            $planthopper16 = $_POST['planthopper16'];
            $planthopper17 = $_POST['planthopper17'];
            $planthopper18 = $_POST['planthopper18'];
            $planthopper19 = $_POST['planthopper19'];
            $planthopper20 = $_POST['planthopper20'];
            $planthopper21 = $_POST['planthopper21'];
            
            $armyworm1 = $_POST['armyworm1'];
            $armyworm2 = $_POST['armyworm2'];
            $armyworm3 = $_POST['armyworm3'];
            $armyworm4 = $_POST['armyworm4'];
            $armyworm5 = $_POST['armyworm5'];
            $armyworm6 = $_POST['armyworm6'];
            $armyworm7 = $_POST['armyworm7'];
            $armyworm8 = $_POST['armyworm8'];
            $armyworm9 = $_POST['armyworm9'];
            $armyworm10 = $_POST['armyworm10'];
            $armyworm11 = $_POST['armyworm11'];
            $armyworm12 = $_POST['armyworm12'];
            $armyworm13 = $_POST['armyworm13'];
            $armyworm14 = $_POST['armyworm14'];
            $armyworm15 = $_POST['armyworm15'];
            $armyworm16 = $_POST['armyworm16'];
            $armyworm17 = $_POST['armyworm17'];
            $armyworm18 = $_POST['armyworm18'];
            $armyworm19 = $_POST['armyworm19'];
            $armyworm20 = $_POST['armyworm20'];
            $armyworm21 = $_POST['armyworm21'];
            
            $fallarmyworm1 = $_POST['fallarmyworm1'];
            $fallarmyworm2 = $_POST['fallarmyworm2'];
            $fallarmyworm3 = $_POST['fallarmyworm3'];
            $fallarmyworm4 = $_POST['fallarmyworm4'];
            $fallarmyworm5 = $_POST['fallarmyworm5'];
            $fallarmyworm6 = $_POST['fallarmyworm6'];
            $fallarmyworm7 = $_POST['fallarmyworm7'];
            $fallarmyworm8 = $_POST['fallarmyworm8'];
            $fallarmyworm9 = $_POST['fallarmyworm9'];
            $fallarmyworm10 = $_POST['fallarmyworm10'];
            $fallarmyworm11 = $_POST['fallarmyworm11'];
            $fallarmyworm12 = $_POST['fallarmyworm12'];
            $fallarmyworm13 = $_POST['fallarmyworm13'];
            $fallarmyworm14 = $_POST['fallarmyworm14'];
            $fallarmyworm15 = $_POST['fallarmyworm15'];
            $fallarmyworm16 = $_POST['fallarmyworm16'];
            $fallarmyworm17 = $_POST['fallarmyworm17'];
            $fallarmyworm18 = $_POST['fallarmyworm18'];
            $fallarmyworm19 = $_POST['fallarmyworm19'];
            $fallarmyworm20 = $_POST['fallarmyworm20'];
            $fallarmyworm21 = $_POST['fallarmyworm21'];
            
            $blanded1 = $_POST['blanded1'];
            $blanded2 = $_POST['blanded2'];
            $blanded3 = $_POST['blanded3'];
            $blanded4 = $_POST['blanded4'];
            $blanded5 = $_POST['blanded5'];
            $blanded6 = $_POST['blanded6'];
            $blanded7 = $_POST['blanded7'];
            $blanded8 = $_POST['blanded8'];
            $blanded9 = $_POST['blanded9'];
            $blanded10 = $_POST['blanded10'];
            $blanded11 = $_POST['blanded11'];
            $blanded12 = $_POST['blanded12'];
            $blanded13 = $_POST['blanded13'];
            $blanded14 = $_POST['blanded14'];
            $blanded15 = $_POST['blanded15'];
            $blanded16 = $_POST['blanded16'];
            $blanded17 = $_POST['blanded17'];
            $blanded18 = $_POST['blanded18'];
            $blanded19 = $_POST['blanded19'];
            $blanded20 = $_POST['blanded20'];
            $blanded21 = $_POST['blanded21'];
            
            $bacteria1 = $_POST['bacteria1'];
            $bacteria2 = $_POST['bacteria2'];
            $bacteria3 = $_POST['bacteria3'];
            $bacteria4 = $_POST['bacteria4'];
            $bacteria5 = $_POST['bacteria5'];
            $bacteria6 = $_POST['bacteria6'];
            $bacteria7 = $_POST['bacteria7'];
            $bacteria8 = $_POST['bacteria8'];
            $bacteria9 = $_POST['bacteria9'];
            $bacteria10 = $_POST['bacteria10'];
            $bacteria11 = $_POST['bacteria11'];
            $bacteria12 = $_POST['bacteria12'];
            $bacteria13 = $_POST['bacteria13'];
            $bacteria14 = $_POST['bacteria14'];
            $bacteria15 = $_POST['bacteria15'];
            $bacteria16 = $_POST['bacteria16'];
            $bacteria17 = $_POST['bacteria17'];
            $bacteria18 = $_POST['bacteria18'];
            $bacteria19 = $_POST['bacteria19'];
            $bacteria20 = $_POST['bacteria20'];
            $bacteria21 = $_POST['bacteria21'];
            
            $downy1 = $_POST['downy1'];
            $downy2 = $_POST['downy2'];
            $downy3 = $_POST['downy3'];
            $downy4 = $_POST['downy4'];
            $downy5 = $_POST['downy5'];
            $downy6 = $_POST['downy6'];
            $downy7 = $_POST['downy7'];
            $downy8 = $_POST['downy8'];
            $downy9 = $_POST['downy9'];
            $downy10 = $_POST['downy10'];
            $downy11 = $_POST['downy11'];
            $downy12 = $_POST['downy12'];
            $downy13 = $_POST['downy13'];
            $downy14 = $_POST['downy14'];
            $downy15 = $_POST['downy15'];
            $downy16 = $_POST['downy16'];
            $downy17 = $_POST['downy17'];
            $downy18 = $_POST['downy18'];
            $downy19 = $_POST['downy19'];
            $downy20 = $_POST['downy20'];
            $downy21 = $_POST['downy21'];
            
            $kindoffertilizer = $_POST['kindoffertilizer'];
            $amountapplied = $_POST['amountapplied'];
            $dateapplied = $_POST['dateapplied'];
            $kindofpesticide = $_POST['kindofpesticide'];
            $dosage = $_POST['dosage'];
            $dateappliedplanting = $_POST['dateappliedplanting'];
            $tankloads = $_POST['tankloads'];
            $preparedbyname = $_POST['preparedbyname'];
            $designation = $_POST['designation'];
            $dateremarks = $_POST['dateremarks'];

            $sql1 = "UPDATE `tbl_corn_pest_1` SET `cornborer1`='".$cornborer1."',`cornborer2`='".$cornborer2."',`cornborer3`='".$cornborer3."',`cornborer4`='".$cornborer4."',`cornborer5`='".$cornborer5."',`cornborer6`='".$cornborer6."',`cornborer7`='".$cornborer7."',`cornborer8`='".$cornborer8."',`cornborer9`='".$cornborer9."',`cornborer10`='".$cornborer10."',`cornborer11`='".$cornborer11."',`cornborer12`='".$cornborer12."',`cornborer13`='".$cornborer13."',`cornborer14`='".$cornborer14."',`cornborer15`='".$cornborer15."',`cornborer16`='".$cornborer16."',`cornborer17`='".$cornborer17."',`cornborer18`='".$cornborer18."',`cornborer19`='".$cornborer19."',`cornborer20`='".$cornborer20."',`cornborer21`='".$cornborer21."',`crop`='".$crop."',`variety`='".$variety."',`gps`='".$gps."',`growthstage`='".$growthstage."',`area`='".$area."' WHERE `reportid` = '".$reportid."'";
                if(mysqli_query($con, $sql1)){
                    $sql2 = "UPDATE `tbl_corn_pest_2` SET `earworm1`='".$earworm1."',`earworm2`='".$earworm2."',`earworm3`='".$earworm3."',`earworm4`='".$earworm4."',`earworm5`='".$earworm5."',`earworm6`='".$earworm6."',`earworm7`='".$earworm7."',`earworm8`='".$earworm8."',`earworm9`='".$earworm9."',`earworm10`='".$earworm10."',`earworm11`='".$earworm11."',`earworm12`='".$earworm12."',`earworm13`='".$earworm13."',`earworm14`='".$earworm14."',`earworm15`='".$earworm15."',`earworm16`='".$earworm16."',`earworm17`='".$earworm17."',`earworm18`='".$earworm18."',`earworm19`='".$earworm19."',`earworm20`='".$earworm20."',`earworm21`='".$earworm21."' WHERE `reportid` = '".$reportid."'";
                    if(mysqli_query($con, $sql2)){
                        $sql3 = "UPDATE `tbl_corn_pest_3` SET `planthopper1`='".$planthopper1."',`planthopper2`='".$planthopper2."',`planthopper3`='".$planthopper3."',`planthopper4`='".$planthopper4."',`planthopper5`='".$planthopper5."',`planthopper6`='".$planthopper6."',`planthopper7`='".$planthopper7."',`planthopper8`='".$planthopper8."',`planthopper9`='".$planthopper9."',`planthopper10`='".$planthopper10."',`planthopper11`='".$planthopper11."',`planthopper12`='".$planthopper12."',`planthopper13`='".$planthopper13."',`planthopper14`='".$planthopper14."',`planthopper15`='".$planthopper15."',`planthopper16`='".$planthopper16."',`planthopper17`='".$planthopper17."',`planthopper18`='".$planthopper18."',`planthopper19`='".$planthopper19."',`planthopper20`='".$planthopper20."',`planthopper21`='".$planthopper21."' WHERE `reportid` = '".$reportid."'";
                        if(mysqli_query($con, $sql3)){
                            $sql4 = "UPDATE `tbl_corn_pest_4` SET `armyworm1`='".$armyworm1."',`armyworm2`='".$armyworm2."',`armyworm3`='".$armyworm3."',`armyworm4`='".$armyworm4."',`armyworm5`='".$armyworm5."',`armyworm6`='".$armyworm6."',`armyworm7`='".$armyworm7."',`armyworm8`='".$armyworm8."',`armyworm9`='".$armyworm9."',`armyworm10`='".$armyworm10."',`armyworm11`='".$armyworm11."',`armyworm12`='".$armyworm12."',`armyworm13`='".$armyworm13."',`armyworm14`='".$armyworm14."',`armyworm15`='".$armyworm15."',`armyworm16`='".$armyworm16."',`armyworm17`='".$armyworm17."',`armyworm18`='".$armyworm18."',`armyworm19`='".$armyworm19."',`armyworm20`='".$armyworm20."',`armyworm21`='".$armyworm21."' WHERE `reportid` = '".$reportid."'";
                            if(mysqli_query($con, $sql4)){
                                $sql5 = "UPDATE `tbl_corn_pest_5` SET `fallarmyworm1`='".$fallarmyworm1."',`fallarmyworm2`='".$fallarmyworm2."',`fallarmyworm3`='".$fallarmyworm3."',`fallarmyworm4`='".$fallarmyworm4."',`fallarmyworm5`='".$fallarmyworm5."',`fallarmyworm6`='".$fallarmyworm6."',`fallarmyworm7`='".$fallarmyworm7."',`fallarmyworm8`='".$fallarmyworm8."',`fallarmyworm9`='".$fallarmyworm9."',`fallarmyworm10`='".$fallarmyworm10."',`fallarmyworm11`='".$fallarmyworm11."',`fallarmyworm12`='".$fallarmyworm12."',`fallarmyworm13`='".$fallarmyworm13."',`fallarmyworm14`='".$fallarmyworm14."',`fallarmyworm15`='".$fallarmyworm15."',`fallarmyworm16`='".$fallarmyworm16."',`fallarmyworm17`='".$fallarmyworm17."',`fallarmyworm18`='".$fallarmyworm18."',`fallarmyworm19`='".$fallarmyworm19."',`fallarmyworm20`='".$fallarmyworm20."',`fallarmyworm21`='".$fallarmyworm21."' WHERE `reportid` = '".$reportid."'";
                                if(mysqli_query($con, $sql5)){
                                    $sql6 = "UPDATE `tbl_corn_pest_6` SET `blanded1`='".$blanded1."',`blanded2`='".$blanded2."',`blanded3`='".$blanded3."',`blanded4`='".$blanded4."',`blanded5`='".$blanded5."',`blanded6`='".$blanded6."',`blanded7`='".$blanded7."',`blanded8`='".$blanded8."',`blanded9`='".$blanded9."',`blanded10`='".$blanded10."',`blanded11`='".$blanded11."',`blanded12`='".$blanded12."',`blanded13`='".$blanded13."',`blanded14`='".$blanded14."',`blanded15`='".$blanded15."',`blanded16`='".$blanded16."',`blanded17`='".$blanded17."',`blanded18`='".$blanded18."',`blanded19`='".$blanded19."',`blanded20`='".$blanded20."',`blanded21`='".$blanded21."' WHERE `reportid` = '".$reportid."'";
                                    if(mysqli_query($con, $sql6)){
                                        $sql7 = "UPDATE `tbl_corn_pest_7` SET `bacteria1`='".$bacteria1."',`bacteria2`='".$bacteria2."',`bacteria3`='".$bacteria3."',`bacteria4`='".$bacteria4."',`bacteria5`='".$bacteria5."',`bacteria6`='".$bacteria6."',`bacteria7`='".$bacteria7."',`bacteria8`='".$bacteria8."',`bacteria9`='".$bacteria9."',`bacteria10`='".$bacteria10."',`bacteria11`='".$bacteria11."',`bacteria12`='".$bacteria12."',`bacteria13`='".$bacteria13."',`bacteria14`='".$bacteria14."',`bacteria15`='".$bacteria15."',`bacteria16`='".$bacteria16."',`bacteria17`='".$bacteria17."',`bacteria18`='".$bacteria18."',`bacteria19`='".$bacteria19."',`bacteria20`='".$bacteria20."',`bacteria21`='".$bacteria21."' WHERE `reportid` = '".$reportid."'";
                                        if(mysqli_query($con, $sql7)){
                                            $sql8 = "UPDATE `tbl_corn_pest_8` SET `downy1`='".$downy1."',`downy2`='".$downy2."',`downy3`='".$downy3."',`downy4`='".$downy4."',`downy5`='".$downy5."',`downy6`='".$downy6."',`downy7`='".$downy7."',`downy8`='".$downy8."',`downy9`='".$downy9."',`downy10`='".$downy10."',`downy11`='".$downy11."',`downy12`='".$downy12."',`downy13`='".$downy13."',`downy14`='".$downy14."',`downy15`='".$downy15."',`downy16`='".$downy16."',`downy17`='".$downy17."',`downy18`='".$downy18."',`downy19`='".$downy19."',`downy20`='".$downy20."',`downy21`='".$downy21."' WHERE `reportid` = '".$reportid."'";
                                            if(mysqli_query($con, $sql8)){
                                                $sql9 = "UPDATE `tbl_corn_pest_9` SET `kindoffertilizer`='".$kindoffertilizer."',`amountapplied`='".$amountapplied."',`dateapplied`='".$dateapplied."',`kindofpesticide`='".$kindofpesticide."',`dosage`='".$dosage."',`dateappliedplanting`='".$dateappliedplanting."',`tankloads`='".$tankloads."',`preparedbyname`='".$preparedbyname."',`designation`='".$designation."',`dateremarks`='".$dateremarks."' WHERE `reportid` = '".$reportid."'";
                                                if(mysqli_query($con, $sql9)){
                                                    $success = "1";
                                                    $success_message = "Updated successfully.";
                                                } else{
                                                    $errors = "1";
                                                    $error_message = "Error updating the form. Please try again.";
                                                }
                                            } else{
                                                $errors = "1";
                                                $error_message = "Error updating the form. Please try again.";
                                            }
                                        } else{
                                            $errors = "1";
                                            $error_message = "Error updating the form. Please try again.";
                                        }
                                    } else{
                                        $errors = "1";
                                        $error_message = "Error updating the form. Please try again.";
                                    }
                                } else{
                                    $errors = "1";
                                    $error_message = "Error updating the form. Please try again.";
                                }
                            } else{
                                $errors = "1";
                                $error_message = "Error updating the form. Please try again.";
                            }
                        } else{
                            $errors = "1";
                            $error_message = "Error updating the form. Please try again.";
                        }
                    } else{
                        $errors = "1";
                        $error_message = "Error updating the form. Please try again.";
                    }
                } else{
                    $errors = "1";
                    $error_message = "Error updating the form. Please try again.";
                }
            
          


        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <div class="flex flex-row justify-between">
            <h2 class="text-2xl font-bold"> CORN PLANT PEST MONITORING FORM </h2>
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
                    <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_1` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <th colspan="11">Date: 
                            <input type="date" name="date" value="<?php echo $row['date']; ?>" disabled> 
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
                            <input type="text" name="variety" id="" value="<?php echo $row['variety']; ?>" disabled>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11">GPS Coordinates:
                            <input type="text" name="gps" value="<?php echo $row['gps']; ?>" disabled>
                        </th>
                        <th colspan="11">Growth Stage:
                            <input type="text" name="growthstage" value="<?php echo $row['growthstage']; ?>" id="" disabled>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11">Name of Farmer:
                            <select name="farmer" id="" disabled>
                                <option value="John">John</option>
                            </select>
                        </th>
                        <th colspan="11">Area Planted (ha):
                            <input type="number" name="area" value="<?php echo $row['areaplanted']; ?>" disabled>
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="1">Insect Pests</td>
                        <td rowspan="1" colspan="21">Number of Sampled Plants</td>
                    </tr>
                    <tr>
                        <td class="td-sm" colspan="1">1</td>
                        <td class="td-sm" colspan="1">2</td>
                        <td class="td-sm" colspan="1">3</td>
                        <td class="td-sm" colspan="1">4</td>
                        <td class="td-sm" colspan="1">5</td>
                        <td class="td-sm" colspan="1">6</td>
                        <td class="td-sm" colspan="1">7</td>
                        <td class="td-sm" colspan="1">8</td>
                        <td class="td-sm" colspan="1">9</td>
                        <td class="td-sm" colspan="1">10</td>
                        <td class="td-sm" colspan="1">11</td>
                        <td class="td-sm" colspan="1">12</td>
                        <td class="td-sm" colspan="1">13</td>
                        <td class="td-sm" colspan="1">14</td>
                        <td class="td-sm" colspan="1">15</td>
                        <td class="td-sm" colspan="1">16</td>
                        <td class="td-sm" colspan="1">17</td>
                        <td class="td-sm" colspan="1">18</td>
                        <td class="td-sm" colspan="1">19</td>
                        <td class="td-sm" colspan="1">20</td>
                        <td class="td-sm" colspan="2">Total</td>
                    </tr>
                    <tr>
                        <td>CORN BORER</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="cornborer<?php echo $i?>" id="" value="<?php echo $row['cornborer'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                <?php
                        }
                    }
                ?>
                <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_2` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                ?>
                    <tr>
                        <td>EARWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="earworm<?php echo $i?>" id="" value="<?php echo $row['earworm'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                <?php
                        }
                    }
                ?>
                <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_3` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                ?>
                    <tr>
                        <td>CORN PLANTHOPPER</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="planthopper<?php echo $i?>" id=""  value="<?php echo $row['planthopper'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                <?php
                        }
                    }
                ?>
                <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_4` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                ?>
                    <tr>
                        <td>ARMYWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="armyworm<?php echo $i?>" id="" value="<?php echo $row['armyworm'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                <?php
                        }
                    }
                ?>
                <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_5` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                ?>
                    <tr>
                        <td>FALL ARMYWORM</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="fallarmyworm<?php echo $i?>" id="" value="<?php echo $row['fallarmyworm'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                 <?php
                        }
                    }
                ?>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="1">Insect Pests</td>
                        <td rowspan="1" colspan="21">Number of Sampled Plants</td>
                    </tr>
                    <tr>
                        <td class="td-sm" colspan="1">1</td>
                        <td class="td-sm" colspan="1">2</td>
                        <td class="td-sm" colspan="1">3</td>
                        <td class="td-sm" colspan="1">4</td>
                        <td class="td-sm" colspan="1">5</td>
                        <td class="td-sm" colspan="1">6</td>
                        <td class="td-sm" colspan="1">7</td>
                        <td class="td-sm" colspan="1">8</td>
                        <td class="td-sm" colspan="1">9</td>
                        <td class="td-sm" colspan="1">10</td>
                        <td class="td-sm" colspan="1">11</td>
                        <td class="td-sm" colspan="1">12</td>
                        <td class="td-sm" colspan="1">13</td>
                        <td class="td-sm" colspan="1">14</td>
                        <td class="td-sm" colspan="1">15</td>
                        <td class="td-sm" colspan="1">16</td>
                        <td class="td-sm" colspan="1">17</td>
                        <td class="td-sm" colspan="1">18</td>
                        <td class="td-sm" colspan="1">19</td>
                        <td class="td-sm" colspan="1">20</td>
                        <td class="td-sm" colspan="2">Total</td>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_6` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <td>BLANDED LEAF/SHEATH BLIGHT</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="blanded<?php echo $i?>" id="" value="<?php echo $row['blanded'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_7` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <td>BACTERIA STALK ROT</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="bacteria<?php echo $i?>" id="" value="<?php echo $row['bacteria'], $i;?>"  disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_8` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <td>DOWNY MILDEW</td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="downy<?php echo $i?>" id="" value="<?php echo $row['downy'], $i;?>" disabled>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td></td>
                        <?php
                            for($i = 1; $i<=21; $i++) {
                        ?>
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="extraa<?php echo $i?>" id="" value="0" disabled>
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
                        <td class="td-sm">
                            <input type="number" class="td-sm" name="extrab<?php echo $i?>" id="" value="0" disabled>
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
                    <?php
                    $sql = "SELECT * FROM `tbl_corn_pest_9` WHERE reportid = '$reportid'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <th colspan="4">
                            <input type="text" name="kindoffertilizer" id="" value="<?php echo $row['kindoffertilizer'];?>" disabled>
                        </th>
                        <th colspan="4">
                            <input type="number" name="amountapplied" id="" value="<?php echo $row['amountapplied'];?>" disabled>
                        </th>
                        <th colspan="2">
                            <input type="date" name="dateapplied" id="" value="<?php echo $row['dateapplied'];?>" disabled>
                        </th>
                        
                        <th colspan="2"></th>
                        
                        <th colspan="4">
                            <input type="text" name="kindofpesticide" id="" value="<?php echo $row['kindofpesticide'];?>" disabled>
                        </th>
                        <th colspan="2">
                            <input type="text" name="dosage" id="" value="<?php echo $row['dosage'];?>" disabled>
                        </th>
                        <th colspan="2">
                            <input type="date" name="dateappliedplanting" id="" value="<?php echo $row['dateappliedplanting'];?>" disabled>
                        </th>
                        <th colspan="2">
                            <input type="number" name="tankloads" id="" value="<?php echo $row['tankloads'];?>" disabled>
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
                        <th colspan="7">Name: <input type="text" name="preparedbyname" value="<?php echo $row['preparedbyname'];?>"  disabled/>
                    </tr>
                    <tr>
                        <th colspan="7">Designation: <input type="text" name="designation" value="<?php echo $row['designation'];?>" disabled/>
                    </tr>
                    <tr>
                        <th colspan="7">Date: <input type="text" name="dateremarks" value="<?php echo $row['dateremarks'];?>" disabled/>
                    </tr>
                <?php
                        }
                    }

                ?>
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


