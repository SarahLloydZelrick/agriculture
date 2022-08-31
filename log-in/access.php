
<?php
if(isset($_POST['btnaccess']))
{
	include("../database/connection.php");
    error_reporting(0);
	$accesscode=$_POST['accesscode'];

				$query=mysqli_query($con,"SELECT * FROM tblsecurity where accesscode ='$accesscode' ");
                while($row = mysqli_fetch_array($query))
                {
                  $securitycode=$row['accesscode'];
                }
				if($securitycode==$accesscode)
				{
				echo "<script> alert('Access Code Matched! You may now login.');
                window.location.href = 'admin-index.php'; </script>";
              
				}
                else{
                    echo "<script> alert('Wrong Access Code! Try Again.');
			        history.back(); </script>";
                }
           
           
          

                
                
}

?>