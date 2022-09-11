<?php
if(isset($_POST['get_option']))
{
include "config.php";

 $barangay = $_POST['get_option'];
 $find=mysql_query("SELECT DISTINCT `crop` FROM `tbl_intervention` WHERE `farmbarangay` = '$barangay'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['crop']."</option>";
 }
 exit;
}
?>