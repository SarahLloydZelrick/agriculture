<?php
if(isset($_POST['get_commodity']))
{
    include "config.php";

    $commodity = $_POST['get_commodity'];
    $barangays = $_POST['get_brgy'];
    $sqlbrgy3 = "SELECT DISTINCT `size` FROM `tbl_intervention` WHERE `farmbarangay` = '$barangays' AND `crop` = '$commodity'";
    $resultbrgy3 = mysqli_query($con, $sqlbrgy3);
        if (mysqli_num_rows($resultbrgy3) > 0) {
            while($row = mysqli_fetch_assoc($resultbrgy3)) {
                echo "<option>".$row['size']."</option>";
            }
        }
    exit;
}
?>


