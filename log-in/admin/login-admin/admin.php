<?php 
	require_once("session.php");

	include("includes/datauser_teacher.php");
	
	if($num_rows)
	{
	include("header.php");
	include("sidebar.php");
    }
?>




              
<section class="home-section">
	<div class="mains">  
		<div class="container-fluid mx-1">
			<div class="row">
				<div class="col ">

				
			
					<div class="panel mx-auto " style="height:auto; width:1000px">
				
					<div class="panel-heading1">  <i class="far fa-calendar-alt "> </i> Schedule Submission of Grades</div>
					
						<div class="container-fluid ">
        					<div class="row mx-2">				
							<?php

								

								$queryselectsectionload = "SELECT * FROM tblsectionloadteacher where facultyid='$usern'";
								$resultselectsectionload = mysqli_query($con, $queryselectsectionload); 
								while($rowselectsectionload = mysqli_fetch_assoc($resultselectsectionload)) {
									
									$schoolyearselectgrade= $rowselectsectionload['schoolyear'];
									$gradingperiodselectgrade= $rowselectsectionload['gradingperiod'];
									$gradesectionselectgrade= $rowselectsectionload['gradesection'];
									$subjectselectgrade= $rowselectsectionload['subject'];
									$subjectdescselectgrade= $rowselectsectionload['subjectdesc'];
									$sectionloadteacherid= $rowselectsectionload['id'];

							


								$queryassignsectionload = "SELECT * FROM tblassigngrade where sectionloadteacherid='$sectionloadteacherid'";
								$resultassignsectionload = mysqli_query($con, $queryassignsectionload); 
								while($rowassignsectionload = mysqli_fetch_assoc($resultassignsectionload)) {
									$schoolyearassigngrade= $rowassignsectionload['schoolyear'];
									$gradingperiodassigngrade= $rowassignsectionload['gradingperiod'];
									$sectionloadteacherid= $rowassignsectionload['sectionloadteacherid'];


									$sql2 = "SELECT * FROM tblcontrol where schoolyear='$schoolyearassigngrade' and gradingperiod='$gradingperiodassigngrade'";
									$result2 = mysqli_query($con, $sql2); 
									while($row2 = mysqli_fetch_assoc($result2)) {
										
										$status= $row2['status'];
										$datestart= $row2['datestart'];
										$dateend= $row2['dateend'];
	
									}
										if($status =='Active'){

										




							?>
							<div class="col-12 col-md-4 my-2">
								<div class="card1 py-4" >	
									<h5><b><?php echo $schoolyearassigngrade.' - '. $gradingperiodassigngrade;?></b></h5>
									<h3 style="color:#680000"><b><?php echo $subjectdescselectgrade?> </b></h3>
									<label>(<?php echo 'Start '.$datestart.' • End '.$dateend;?>)</label>
									<h5> <?php echo $gradesectionselectgrade?></h5>

									<form action="teacherassigngrade.php" method='get'>				
									<input type="hidden" name="sy"  value=<?=$schoolyearassigngrade?>>
									<input type="hidden" name="gp"  value=<?=$gradingperiodassigngrade?>>
									<input type="hidden" name="subject"  value=<?=$subjectselectgrade?>>
									<input type="hidden" name="gradesection"  value=<?=$gradesectionselectgrade?>>
								
									<button class='addbtn'><i class="fas fa-pencil-alt"></i> Encode Grades</button>	
									</form>

								</div>
							</div>
							<?php
							}		
							else{

							}	
							
							

							}	
							}
							?>	
							</div>
						</div></br></br>	
																	
								
						
					<a href='teacherp1.php' class="tag"><i class="fas fa-check">&nbsp</i>  Past Submitted Grades</a>	
					
								
					</div>


				</div>
			</div>
		</div>
	</div>
</section>
						   
	   






				<?php
include("footer.php");
?>
