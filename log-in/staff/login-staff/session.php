
<?php


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../student-index.php");
    exit;
}





if(!isset($_SESSION['studentid']))
{
header("location:../../../studenthomepage.php");
}
  error_reporting(0);


$usern=$_SESSION['studentid'];
$u_user=$usern;
require_once("../../../database/connection.php");

 ?>