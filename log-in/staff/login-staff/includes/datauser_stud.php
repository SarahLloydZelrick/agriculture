<?php 

$query_acc=mysqli_query($con,"SELECT * FROM tblstudents WHERE studentid='$usern'");
$num_rows=mysqli_num_rows($query_acc);

while($fetch=mysqli_fetch_assoc($query_acc))
{
	$u_id=$fetch['studentid'];

$u_fname=$fetch['firstname'];
$u_lname=$fetch['lastname'];	
$u_mname=$fetch['middlename'];	
$u_email=$fetch['email'];	
//$u_age=$fetch['age'];	
$u_birthdate=$fetch['birthdate'];
// $u_contactno=$fetch['contactnumber'];
// $u_course=$fetch['course'];
// $u_street=$fetch['street'];
// $u_brgy=$fetch['brgy'];
// $u_city=$fetch['city'];
// $u_province=$fetch['province'];
// $u_mother=$fetch['mother'];
// $u_father=$fetch['father'];
// $u_occu_mother=$fetch['occu_mother'];
// $u_occu_father=$fetch['occu_mother'];
// $u_gender=$fetch['gender'];
// $u_course=$fetch['course'];	
	
	
	
$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="100" height="80">';
$img1='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="220" height="180">';
}

?>