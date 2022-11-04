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
    <title>Corm Report</title>

</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:10px;
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
            if($_POST['nooffarmer1'] = ""){
                $nooffarmer1 = 0;
            }else{
                $nooffarmer1 = $_POST['nooffarmer1'];
            }
            if($_POST['hybridyellow1'] = ""){
                $hybridyellow1 = 0;
            }else{
                $hybridyellow1 = $_POST['hybridyellow1'];
            }
            if($_POST['hybridwhite1'] = ""){
                $hybridwhite1 = 0;
            }else{
                $hybridwhite1 = $_POST['hybridwhite1'];
            }
            if($_POST['hybridtotal1'] = ""){
                $hybridtotal1 = 0;
            }else{
                $hybridtotal1 = $_POST['hybridtotal1'];
            }
            if($_POST['opvyellow1'] = ""){
                $opvyellow1 = 0;
            }else{
                $opvyellow1 = $_POST['opvyellow1'];
            }
            if($_POST['opvwhite1'] = ""){
                $opvwhite1 = 0;
            }else{
                $opvwhite1 = $_POST['opvwhite1'];
            }
            if($_POST['opvtotal1'] = ""){
                $opvtotal1 = 0;
            }else{
                $opvtotal1 = $_POST['opvtotal1'];
            }
            if($_POST['grandyellow1'] = ""){
                $grandyellow1 = 0;
            }else{
                $grandyellow1 = $_POST['grandyellow1'];
            }
            if($_POST['grandwhite1'] = ""){
                $grandwhite1 = 0;
            }else{
                $grandwhite1 = $_POST['grandwhite1'];
            }
            if($_POST['grandtotal1'] = ""){
                $grandtotal1 = 0;
            }else{
                $grandtotal1 = $_POST['grandtotal1'];
            }
            if($_POST['nooffarmer1'] != "" || $_POST['nooffarmer1'] != "0")
                {
                $sql = "INSERT INTO `tbl_reports`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay1."','".$hybridyellow1."','".$hybridwhite1."','".$hybridtotal1."','".$opvyellow1."','".$opvwhite1."','".$opvtotal1."','".$grandyellow1."','".$grandwhite1."','".$grandtotal1."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }
            if($_POST['nooffarmer2'] != "" || $_POST['nooffarmer2'] != "0")
                {
                $sql = "INSERT INTO `tbl_reports`(`reportype`, `geocode`, `barangay`, `nooffarmers`, `hybridyellow`, `hybridwhite`, `hybridtotal`, `opvyellow`, `opvwhite`, `opvtotal`, `grandyellow`, `grandwhite`, `grandtotal`, `fromdate`, `todate`) 
                VALUES ('".$reporttype."','".$geocode."','".$barangay2."','".$hybridyellow2."','".$hybridwhite2."','".$hybridtotal2."','".$opvyellow2."','".$opvwhite2."','".$opvtotal2."','".$grandyellow2."','".$grandwhite2."','".$grandtotal2."','".$fromdate."','".$todate."')";
                    if(mysqli_query($con, $sql)){
                        $success = "1";
                        $success_message = "Registered successfully. Please wait for the admin to accept your registration.";
                    } else{
                        $errors = "1";
                        $error_message = "Error submitting the form. Please try again.";
                    }
                }




        }

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <h2 class="text-2xl font-bold">Consolidation Corn Planting</h2>
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
                        <td rowspan="1">Area Planted(ha)></td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        <td rowspan="1">Area Planted(ha)</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input" name="barangay1" id="" value="Candelaria" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer1" id="" value="">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow1" id="" value="">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite1" id="" value="">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal1" id="" value="">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow1" id="" value="">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite1" id="" value="">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal1" id="" value="">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow1" id="" value="">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite1" id="" value="">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal1" id="" value="">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <!-- BARANGAY -->
                        <td>
                            <input type="text" class="form-input" name="barangay2" id="" value="Candelaria" readonly>
                        </td>
                        <!-- NUMBER OF FARMER -->
                        <td>
                            <input type="number" class="form-input" name="nooffarmer2" id="" value="">
                        </td>
                        <!-- HYBRID YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="hybridyellow2" id="" value="">
                        </td>
                        <!-- HYBRID WHITE -->
                        <td>
                            <input type="number" class="form-input" name="hybridwhite2" id="" value="">
                        </td>
                        <!-- HYBRID TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="hybridtotal2" id="" value="">
                        </td>
                        <!-- OPV YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="opvyellow2" id="" value="">
                        </td>
                        <!-- OPV WHITE -->
                        <td>
                            <input type="number" class="form-input" name="opvwhite2" id="" value="">
                        </td>
                        <!-- OPV TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="opvtotal2" id="" value="">
                        </td>
                        <!-- GRAND TOTAL YELLOW -->
                        <td>
                            <input type="number" class="form-input" name="grandyellow2" id="" value="">
                        </td>
                        <!-- GRAND TOTAL WHITE -->
                        <td>
                            <input type="number" class="form-input" name="grandwhite2" id="" value="">
                        </td>
                        <!-- GRAND TOTAL TOTAL -->
                        <td>
                            <input type="number" class="form-input" name="grandtotal2" id="" value="">
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Save" name="btnsave" class="btn-primary-s">
            </form>
        </div>

    
        <?php
            include "footer.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>