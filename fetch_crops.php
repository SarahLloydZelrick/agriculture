<?php
if(isset($_POST['get_option']))
{
    include "config.php";

    $barangay = $_POST['get_option'];
    $sqlbrgy2 = "SELECT DISTINCT `crop` FROM `tbl_intervention` WHERE `farmbarangay` = '$barangay'";
    $resultbrgy2 = mysqli_query($con, $sqlbrgy2);
        if (mysqli_num_rows($resultbrgy2) > 0) {
            while($row = mysqli_fetch_assoc($resultbrgy2)) {
                echo "<option>".$row['crop']."</option>";
            }
        }
}
?>



