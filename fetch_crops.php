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

<?php
if(isset($_POST['get_commodity']))
{
    include "config.php";

    $commodity = $_POST['get_commodity'];
    $barangay = $_POST['get_option'];
    $sqlbrgy3 = "SELECT DISTINCT `size` FROM `tbl_intervention` WHERE `farmbarangay` = '$barangay' AND `crop` = '$commodity'";
    $resultbrgy3 = mysqli_query($con, $sqlbrgy3);
        if (mysqli_num_rows($resultbrgy3) > 0) {
            while($row2 = mysqli_fetch_assoc($resultbrgy3)) {
                echo "<option>".$row2['size']."</option>";
            }
        }
    exit;
}
?>



