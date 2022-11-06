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

        if (isset($_POST['btnsave'] )) {
            $geocode = "";
            for($i = 1; $i<=25; $i++) {
                $barangay.$i = $_POST['barangay'].$i;
                $nooffarmer.$i = $_POST['nooffarmer'].$i;
                $hybridyellow.$i = $_POST['hybridyellow'].$i;
                $hybridwhite.$i = $_POST['hybridwhite'].$i;
                $hybridtotal.$i = $_POST['hybridtotal'].$i;
                $opvyellow.$i = $_POST['opvyellow'].$i;
                $opvwhite.$i = $_POST['opvwhite'].$i;
                $opvtotal.$i = $_POST['opvtotal'].$i;
                $grandyellow.$i = $_POST['grandyellow'].$i;
                $grandwhite.$i = $_POST['grandwhite'].$i;
                $grandtotal.$i = $_POST['grandtotal'].$i;

                if($nooffarmer.$i != "" || $nooffarmer.$i != "0")
                {
                $sql = "INSERT INTO `tbl_reports`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay1."','".$nooffarmer1."','".$hybridyellow1."','".$hybridwhite1."','".$hybridtotal1."','".$opvyellow1."','".$opvwhite1."','".$opvtotal1."','".$grandyellow1."','".$grandwhite1."','".$grandtotal1."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            }   
            //UPDATE `tbl_reports` SET `id`=[value-1],`reportype`=[value-2],`geocode`=[value-3],`barangay`=[value-4],`nooffarmers`=[value-5],`hybridyellow`=[value-6],`hybridwhite`=[value-7],`hybridtotal`=[value-8],`opvyellow`=[value-9],`opvwhite`=[value-10],`opvtotal`=[value-11],`grandyellow`=[value-12],`grandwhite`=[value-13],`grandtotal`=[value-14],`fromdate`=[value-15],`todate`=[value-16] WHERE 1
            


        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <div class="flex flex-row justify-between">
            <h2 class="text-2xl font-bold">Consolidation Corn Planting</h2>
            <button class="fa fa-pencil rounded-lg border-2 border-blue-500/50 p-5 w-auto icon-blue" id="btnupdate" onclick="show()">&nbsp;Edit</button>
            <button class="fa fa-eye rounded-lg border-2 border-green-500/50 p-5 w-auto icon-green" id="btnview" style="display:none;" onclick="hide()">&nbsp;View</button>
        </div>
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
                            <input type="text" name="reportid<?php echo $i?>" value="<?php echo $row["id"]; ?>">
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