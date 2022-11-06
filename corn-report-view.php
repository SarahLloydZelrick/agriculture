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
            for($i = 1; $i<=25; $i++) {
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
            }
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