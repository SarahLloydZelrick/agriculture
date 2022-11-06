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
    <title>View Corn Report</title>

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
            
            $reportid2 = $_POST['reportid2'];
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

            $reportid3 = $_POST['reportid3'];
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

            $reportid4 = $_POST['reportid4'];
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

            $reportid5 = $_POST['reportid5'];
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

            $reportid6 = $_POST['reportid6'];
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

            $reportid7 = $_POST['reportid7'];
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

            $reportid8 = $_POST['reportid8'];
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

            $reportid9 = $_POST['reportid9'];
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

            
            $sql1 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer1."',`hybridyellow`='".$hybridyellow1."',`hybridwhite`='".$hybridwhite1."',`hybridtotal`='".$hybridtotal1."',`opvyellow`='".$opvyellow1."',`opvwhite`='".$opvwhite1."',`opvtotal`='".$opvtotal1."',`grandyellow`='".$grandyellow1."',`grandwhite`='".$grandwhite1."',`grandtotal`='".$grandtotal1."' WHERE `id` = '".$reportid1."'";
                if(mysqli_query($con, $sql1)){
                    $success = "1";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "1";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql2 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer2."',`hybridyellow`='".$hybridyellow2."',`hybridwhite`='".$hybridwhite2."',`hybridtotal`='".$hybridtotal2."',`opvyellow`='".$opvyellow2."',`opvwhite`='".$opvwhite2."',`opvtotal`='".$opvtotal2."',`grandyellow`='".$grandyellow2."',`grandwhite`='".$grandwhite2."',`grandtotal`='".$grandtotal2."' WHERE `id` = '".$reportid2."'";
                if(mysqli_query($con, $sql2)){
                    $success = "2";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "2";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql3 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer3."',`hybridyellow`='".$hybridyellow3."',`hybridwhite`='".$hybridwhite3."',`hybridtotal`='".$hybridtotal3."',`opvyellow`='".$opvyellow3."',`opvwhite`='".$opvwhite3."',`opvtotal`='".$opvtotal3."',`grandyellow`='".$grandyellow3."',`grandwhite`='".$grandwhite3."',`grandtotal`='".$grandtotal3."' WHERE `id` = '".$reportid3."'";
                if(mysqli_query($con, $sql3)){
                    $success = "3";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "3";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql4 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer4."',`hybridyellow`='".$hybridyellow4."',`hybridwhite`='".$hybridwhite4."',`hybridtotal`='".$hybridtotal4."',`opvyellow`='".$opvyellow4."',`opvwhite`='".$opvwhite4."',`opvtotal`='".$opvtotal4."',`grandyellow`='".$grandyellow4."',`grandwhite`='".$grandwhite4."',`grandtotal`='".$grandtotal4."' WHERE `id` = '".$reportid4."'";
                if(mysqli_query($con, $sql4)){
                    $success = "4";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "4";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql5 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer5."',`hybridyellow`='".$hybridyellow5."',`hybridwhite`='".$hybridwhite5."',`hybridtotal`='".$hybridtotal5."',`opvyellow`='".$opvyellow5."',`opvwhite`='".$opvwhite5."',`opvtotal`='".$opvtotal5."',`grandyellow`='".$grandyellow5."',`grandwhite`='".$grandwhite5."',`grandtotal`='".$grandtotal5."' WHERE `id` = '".$reportid5."'";
                if(mysqli_query($con, $sql5)){
                    $success = "5";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "5";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql6 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer6."',`hybridyellow`='".$hybridyellow6."',`hybridwhite`='".$hybridwhite6."',`hybridtotal`='".$hybridtotal6."',`opvyellow`='".$opvyellow6."',`opvwhite`='".$opvwhite6."',`opvtotal`='".$opvtotal6."',`grandyellow`='".$grandyellow6."',`grandwhite`='".$grandwhite6."',`grandtotal`='".$grandtotal6."' WHERE `id` = '".$reportid6."'";
                if(mysqli_query($con, $sql6)){
                    $success = "6";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "6";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql7 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer7."',`hybridyellow`='".$hybridyellow7."',`hybridwhite`='".$hybridwhite7."',`hybridtotal`='".$hybridtotal7."',`opvyellow`='".$opvyellow7."',`opvwhite`='".$opvwhite7."',`opvtotal`='".$opvtotal7."',`grandyellow`='".$grandyellow7."',`grandwhite`='".$grandwhite7."',`grandtotal`='".$grandtotal7."' WHERE `id` = '".$reportid7."'";
                if(mysqli_query($con, $sql7)){
                    $success = "7";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "7";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql8 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer8."',`hybridyellow`='".$hybridyellow8."',`hybridwhite`='".$hybridwhite8."',`hybridtotal`='".$hybridtotal8."',`opvyellow`='".$opvyellow8."',`opvwhite`='".$opvwhite8."',`opvtotal`='".$opvtotal8."',`grandyellow`='".$grandyellow8."',`grandwhite`='".$grandwhite8."',`grandtotal`='".$grandtotal8."' WHERE `id` = '".$reportid8."'";
                if(mysqli_query($con, $sql8)){
                    $success = "8";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "8";
                    $error_message = "Error updating the form. Please try again.";
                }
            $sql9 = "UPDATE `tbl_reports` SET `nooffarmers`='".$nooffarmer9."',`hybridyellow`='".$hybridyellow9."',`hybridwhite`='".$hybridwhite9."',`hybridtotal`='".$hybridtotal9."',`opvyellow`='".$opvyellow9."',`opvwhite`='".$opvwhite9."',`opvtotal`='".$opvtotal9."',`grandyellow`='".$grandyellow9."',`grandwhite`='".$grandwhite9."',`grandtotal`='".$grandtotal9."' WHERE `id` = '".$reportid9."'";
                if(mysqli_query($con, $sql9)){
                    $success = "9";
                    $success_message = "Updated successfully.";
                } else{
                    $errors = "9";
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
                    <?php
                    $sql = "SELECT * FROM `tbl_reports` WHERE fromdate = '$fromdate' AND todate = '$todate'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $i++;

                    ?>
                    <tr>
                        <td>
                            <?php echo $row["geocode"]; ?>
                            <input type="hidden" name="reportid<?php echo $i?>" value="<?php echo $row["id"]; ?>">
                        </td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input wbrgy" name="barangay<?php echo $i;?>" id="" value="<?php echo $row["barangay"]; ?>" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer<?php echo $i;?>" id="" value="<?php echo $row["nooffarmers"]; ?>" disabled="true">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow<?php echo $i;?>" id="" value="<?php echo $row["hybridyellow"]; ?>" disabled="true">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite<?php echo $i;?>" id="" value="<?php echo $row["hybridwhite"]; ?>" disabled="true">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal<?php echo $i;?>" id="" value="<?php echo $row["hybridtotal"]; ?>" disabled="true">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow<?php echo $i;?>" id="" value="<?php echo $row["opvyellow"]; ?>" disabled="true">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite<?php echo $i;?>" id="" value="<?php echo $row["opvwhite"]; ?>" disabled="true">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal<?php echo $i;?>" id="" value="<?php echo $row["opvtotal"]; ?>" disabled="true">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow<?php echo $i;?>" id="" value="<?php echo $row["grandyellow"]; ?>" disabled="true">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite<?php echo $i;?>" id="" value="<?php echo $row["grandwhite"]; ?>" disabled="true">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal<?php echo $i;?>" id="" value="<?php echo $row["grandtotal"]; ?>" disabled="true">
                        </td>
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