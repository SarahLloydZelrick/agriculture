<?php



$query_acc=mysqli_query($con,"SELECT * FROM tblteacher WHERE facultyid='$usern'");
$num_rows=mysqli_num_rows($query_acc);

while($fetch=mysqli_fetch_assoc($query_acc))
{
$uname=$fetch['facultyid'];
$u_fname=$fetch['firstname'];
$u_lname=$fetch['lastname'];	
$u_mname=$fetch['middlename'];	
$u_email=$fetch['email'];	
$u_contactno=$fetch['contact'];	
$u_birthdate=$fetch['birthdate'];	
$u_birthplace=$fetch['birthplace'];
$u_gender=$fetch['gender'];		
$u_religion=$fetch['religion'];		
$u_civilstatus=$fetch['civilstatus'];	
$u_nationality=$fetch['nationality'];	
$u_address=$fetch['address'];	

$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="100" height="80">';
$img1='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="220" height="180">';
}

?>