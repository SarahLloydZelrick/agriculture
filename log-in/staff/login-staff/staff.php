<?php 
	require_once("session.php");

	include("includes/datauser_stud.php");
	
	if($num_rows)
	{
	include("header.php");
	include("sidebar.php");
    }
?>
	
	<?php 
	     
		 $query_acc=mysqli_query($con,"SELECT * FROM tblstudents WHERE studentid='$usern'");
		 while($fetch=mysqli_fetch_assoc($query_acc))
		 {
		 $lname=$fetch['lastname'];
		 $fname=$fetch['firstname'];
		 $mname=$fetch['middlename'];
			
		 }

		 $num_rows=mysqli_num_rows($query_acc);
 

		
		
		   
		 $studquery=mysqli_query($con,"SELECT * FROM tblstudentsdetail WHERE studentid='$usern'  order by schoolyear desc");
	 
	?>




              
<section class="home-section">			
            <div class="mains">   
            <div class="container-fluid mx-1">
            <div class="row">
            <div class="col">
                    <div class="panel " style="height:100%; ">
                    <div class="panel-heading1" ><i class="far fa-folder-open"></i> Student Enrollment Records</div>
                    <div class="panel-body m-2">



                    
                     <div class="row mx-2">  
                     <h4><b></b></h4> 
                              <?php               
                           while($rowstudentdetail = $studquery -> fetch_assoc()){
                            
                            $schoolyear=$rowstudentdetail['schoolyear'];
                            $gradesection=$rowstudentdetail['gradesection'];
  

                           ?>
                         
                            <div class="col-12 col-md-12 my-2">
                                    <a style="color:black; text-decoration:none;" href='studentp1.php?schoolyear=<?=$schoolyear?>&gradesection=<?=$gradesection?>'> 							       
                                        <div class="thing1" >	
                                            <div ><b>S.Y. <?php echo $schoolyear?></b></div>
                                            <div class="info-section"  style="color:#680000"><b><?php echo $gradesection?> </b></div>          
                                        </div>
                                    </a>
                                    </div>
                          
                            






























                        <?php                         
                            }
                        ?>
                        
                        <!-- </div> -->






        </div>
        </div>
        </div>
        </div>



  </div> 
 
  </div> 

  

</section>
						   
	   












<?php
include("footer.php");
?>
