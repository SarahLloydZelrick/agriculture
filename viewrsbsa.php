<?php
//ini_set('display_errors', 1);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />	  
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <title>VIEW RSBSA</title>
</head>
<style>
  #modal_view{
    padding-right:0px !important;
  }
</style>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
      <div class="table_container p-10 gap-5 flex flex-col overflow-x-scroll">
        <table id="tbl_rsbsa">
          <h2 class="text-xl">RSBSA Accounts</h2>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Enrollment Type</th>
                <th>Date Administered</th>
                <th>Ref Number</th>
                <th>Barangay</th>
                <th>2x2</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  include "config.php";
                  $sql = "SELECT id, CONCAT(firstname,' ',middlename,' ',surname) as fullname, enrollmenttype, dateadminstered, refnumber, barangay, uploadFile2x2 FROM tbl_poblacion";
                  $result = $con->query($sql);
                  
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['enrollmenttype']; ?></td>
                        <td><?php echo $row['dateadminstered']; ?></td>
                        <td><?php echo $row['refnumber']; ?></td>
                        <td><?php echo $row['barangay']; ?></td>
                        <td><img src="<?php echo $row['uploadFile2x2']; ?>" alt="" width="50px" height="50px"></td>
                        <td>
                        <form method="POST" id="form">
                        <input type="text" name="rsbsaid" id="" value="<?php echo $row['id']; ?>" readonly style="display:none;">
                        <button class="fa fa-eye rounded-lg border-2 border-green-500/50 p-2 w-9 icon-green" title="View account" type="submit" name="btnview"></button>
                        <button class="fa fa-pen rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue super-hide" title="Edit account" type="submit" name="btnedit"></button>
                        </form>
                        </td>
                    <?php
                    }
                  } else {
                    echo "0 results";
                  }
                  $con->close();
              ?>
            </tbody>
        </table>
      </div>
    </div>

<?php
    include "footer.php";
    $modal =   "<script>
                    $(document).ready(function(){
                      $('#modal_view').modal('show')
                    });
                </script>";
    $modaltwo =   "<script>
                    $(document).ready(function(){
                      $('#modal_edit').modal('show')
                    });
                </script>";

?>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_view" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="profileModalLabel">RSBSA FORM</h5>
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
                </div>
                <div class="modal-body relative p-4">
                    <?php
                      if(isset($_POST["btnview"])){
                        echo $modal; 
                        include "config.php";
                        $sql = "SELECT * FROM tbl_poblacion WHERE id = '".$_POST['rsbsaid']."'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                              $enrollmenttype = mysqli_real_escape_string($con, $row['enrollmenttype']);
                              $dateadminstered = mysqli_real_escape_string($con, $row['dateadminstered']);
                              $refnumber = mysqli_real_escape_string($con, $row['refnumber']);
                              $surname = mysqli_real_escape_string($con, $row['surname']);
                              $firstname = mysqli_real_escape_string($con, $row['firstname']);
                              $middlename = mysqli_real_escape_string($con, $row['middlename']);
                              $extentionname = mysqli_real_escape_string($con, $row['extentionname']);
                              $purok = mysqli_real_escape_string($con, $row['purok']);
                              $street = mysqli_real_escape_string($con, $row['street']);
                              $barangay = mysqli_real_escape_string($con, $row['barangay']);
                              $city = mysqli_real_escape_string($con, $row['city']);
                              $province = mysqli_real_escape_string($con, $row['province']);
                              $region = mysqli_real_escape_string($con, $row['region']);
                              $bday = mysqli_real_escape_string($con, $row['bday']);
                              $birthmunicipality = mysqli_real_escape_string($con, $row['birthmunicipality']);
                              $birthprovince = mysqli_real_escape_string($con, $row['birthprovince']);
                              $birthcountry = mysqli_real_escape_string($con, $row['birthcountry']);
                              $gender = mysqli_real_escape_string($con, $row['gender']);
                              $religion = mysqli_real_escape_string($con, $row['religion']);
                              $religionother = mysqli_real_escape_string($con, $row['religionother']);
                              $civil = mysqli_real_escape_string($con, $row['civil']);
                              $maiden = mysqli_real_escape_string($con, $row['maiden']);
                              $nameofspouse = mysqli_real_escape_string($con, $row['nameofspouse']);
                              $education = mysqli_real_escape_string($con, $row['education']);
                              $pwd = mysqli_real_escape_string($con, $row['pwd']);
                              $fourps = mysqli_real_escape_string($con, $row['fourps']);
                              if($fourps == NULL){
                                $fourps = "";
                              }
                              $indgenous = mysqli_real_escape_string($con, $row['indgenous']);
                              $indgenousspecify = mysqli_real_escape_string($con, $row['indgenousspecify']);
                              $gov = mysqli_real_escape_string($con, $row['gov']);
                              $idtype = mysqli_real_escape_string($con, $row['idtype']);
                              $idno = mysqli_real_escape_string($con, $row['idno']);
                              $householdhead = mysqli_real_escape_string($con, $row['householdhead']);
                              $householdname = mysqli_real_escape_string($con, $row['householdname']);
                              $householdrel = mysqli_real_escape_string($con, $row['householdrel']);
                              $noOfmembers = mysqli_real_escape_string($con, $_POST['noOfmembers']);
                              if($noOfmembers == NULL){
                                $noOfmembers = "";
                              }
                              $nomale = mysqli_real_escape_string($con, $row['nomale']);
                              $nofemale = mysqli_real_escape_string($con, $row['nofemale']);
                              $emergencyname = mysqli_real_escape_string($con, $row['emergencyname']);
                              $emergencyno = mysqli_real_escape_string($con, $row['emergencyno']);
                              $memberoffarm = mysqli_real_escape_string($con, $row['memberoffarm']);
                              $memberoffarmspecify = mysqli_real_escape_string($con, $row['memberoffarmspecify']);
                  
                              //$mainlivelihood = mysqli_real_escape_string($con, $_POST['mainlivelihood']);
                              //$farmingactivity = mysqli_real_escape_string($con, $_POST['farmingactivity']);
                              $mainlivelihood = explode(',', $row['mainlivelihood']);
                              $farmingactivity = explode(',', $row['farmingactivity']);
                              $farmingactivityothers = mysqli_real_escape_string($con, $row['farmingactivityothers']);
                              $farmingactivitylivestock = mysqli_real_escape_string($con, $row['farmingactivitylivestock']);
                              $farmingactivitypoultry = mysqli_real_escape_string($con, $row['farmingactivitypoultry']);
                              //$kindofwork = mysqli_real_escape_string($con, $_POST['kindofwork']);
      
                              //$farmingactivitypoultry = implode(',', $_POST['farmingactivity']);
                              //$farmingactivitylivestock = implode(',', $_POST['farmingactivitypoultry']);
      
                              $kindofwork = explode(',', $row['kindofwork']);
                              $kindofworkothers = mysqli_real_escape_string($con, $row['kindofworkothers']);
                              //$typeoffishing = mysqli_real_escape_string($con, $_POST['typeoffishing']);
                              $typeoffishingothers = mysqli_real_escape_string($con, $row['typeoffishingothers']);
                              //$typeofinvolment = mysqli_real_escape_string($con, $_POST['typeofinvolment']);
                              $typeoffishing = explode(',', $row['typeoffishing']);
                              $typeofinvolment = explode(',', $row['typeofinvolment']);
                  
                              $typeofinvolmentothers = mysqli_real_escape_string($con, $row['typeofinvolmentothers']);
                              $grossfarming = mysqli_real_escape_string($con, $row['grossfarming']);
                              $grossnonfarming = mysqli_real_escape_string($con, $row['grossnonfarming']);
                              $nooffarmparcels = mysqli_real_escape_string($con, $row['nooffarmparcels']);
                              $p1 = mysqli_real_escape_string($con, $row['p1']);
                              $p2 = mysqli_real_escape_string($con, $row['p2']);
                              $p3 = mysqli_real_escape_string($con, $row['p3']);
                              $farmbarangay1 = mysqli_real_escape_string($con, $row['farmbarangay1']);
                              $farmcity1 = mysqli_real_escape_string($con, $row['farmcity1']);
                              $farmarea1 = mysqli_real_escape_string($con, $row['farmarea1']);
                              $ancestral1 = mysqli_real_escape_string($con, $row['ancestral1']);
                              $agrarlan1 = mysqli_real_escape_string($con, $row['agrarlan1']);
                              $idno1 = mysqli_real_escape_string($con, $row['idno1']);
                              $ownershiptype1 = mysqli_real_escape_string($con, $row['ownershiptype1']);
                              $ownershiptypename1 = mysqli_real_escape_string($con, $row['ownershiptypename1']);
                              $cropa1 = mysqli_real_escape_string($con, $row['cropa1']);
                              $sizea1 = mysqli_real_escape_string($con, $row['sizea1']);
                              $noofheada1 = mysqli_real_escape_string($con, $row['noofheada1']);
                              $farmtypea1 = mysqli_real_escape_string($con, $row['farmtypea1']);
                              $organicepractionera1 = mysqli_real_escape_string($con, $row['organicepractionera1']);
                              $remarksa1 = mysqli_real_escape_string($con, $row['remarksa1']);
                              $cropa2 = mysqli_real_escape_string($con, $row['cropa2']);
                              $sizea2 = mysqli_real_escape_string($con, $row['sizea2']);
                              $noofheada2 = mysqli_real_escape_string($con, $row['noofheada2']);
                              $farmtypea2 = mysqli_real_escape_string($con, $row['farmtypea2']);
                              $organicepractionera2 = mysqli_real_escape_string($con, $row['organicepractionera2']);
                              $remarksa2 = mysqli_real_escape_string($con, $row['remarksa2']);
                              $cropa3 = mysqli_real_escape_string($con, $row['cropa3']);
                              $sizea3 = mysqli_real_escape_string($con, $row['sizea3']);
                              $noofheada3 = mysqli_real_escape_string($con, $row['noofheada3']);
                              $farmtypea3 = mysqli_real_escape_string($con, $row['farmtypea3']);
                              $organicepractionera3 = mysqli_real_escape_string($con, $row['organicepractionera3']);
                              $remarksa3 = mysqli_real_escape_string($con, $row['remarksa3']);
                              $cropa4 = mysqli_real_escape_string($con, $row['cropa4']);
                              $sizea4 = mysqli_real_escape_string($con, $row['sizea4']);
                              $noofheada4 = mysqli_real_escape_string($con, $row['noofheada4']);
                              $farmtypea4 = mysqli_real_escape_string($con, $row['farmtypea4']);
                              $organicepractionera4 = mysqli_real_escape_string($con, $row['organicepractionera4']);
                              $remarksa4 = mysqli_real_escape_string($con, $row['remarksa4']);
                              $cropa5 = mysqli_real_escape_string($con, $row['cropa5']);
                              $sizea5 = mysqli_real_escape_string($con, $row['sizea5']);
                              $noofheada5 = mysqli_real_escape_string($con, $row['noofheada5']);
                              $farmtypea5 = mysqli_real_escape_string($con, $row['farmtypea5']);
                              $organicepractionera5 = mysqli_real_escape_string($con, $row['organicepractionera5']);
                              $remarksa5 = mysqli_real_escape_string($con, $row['remarksa5']);
                              $farmbarangay2 = mysqli_real_escape_string($con, $row['farmbarangay2']);
                              $farmcity2 = mysqli_real_escape_string($con, $row['farmcity2']);
                              $farmarea2 = mysqli_real_escape_string($con, $row['farmarea2']);
                              $ancestral2 = mysqli_real_escape_string($con, $row['ancestral2']);
                              $agrarlan2 = mysqli_real_escape_string($con, $row['agrarlan2']);
                              $idno2 = mysqli_real_escape_string($con, $row['idno2']);
                              $ownershiptype2 = mysqli_real_escape_string($con, $row['ownershiptype2']);
                              $ownershiptypename2 = mysqli_real_escape_string($con, $row['ownershiptypename2']);
                              $cropb1 = mysqli_real_escape_string($con, $row['cropb1']);
                              $sizeb1 = mysqli_real_escape_string($con, $row['sizeb1']);
                              $noofheadb1 = mysqli_real_escape_string($con, $row['noofheadb1']);
                              $farmtypeb1 = mysqli_real_escape_string($con, $row['farmtypeb1']);
                              $organicepractionerb1 = mysqli_real_escape_string($con, $row['organicepractionerb1']);
                              $remarksb1 = mysqli_real_escape_string($con, $row['remarksb1']);
                              $cropb2 = mysqli_real_escape_string($con, $row['cropb2']);
                              $sizeb2 = mysqli_real_escape_string($con, $row['sizeb2']);
                              $noofheadb2 = mysqli_real_escape_string($con, $row['noofheadb2']);
                              $farmtypeb2 = mysqli_real_escape_string($con, $row['farmtypeb2']);
                              $organicepractionerb2 = mysqli_real_escape_string($con, $_POST['organicepractionerb2']);
                              $remarksb2 = mysqli_real_escape_string($con, $row['remarksb2']);
                              $cropb3 = mysqli_real_escape_string($con, $row['cropb3']);
                              $sizeb3 = mysqli_real_escape_string($con, $row['sizeb3']);
                              $noofheadb3 = mysqli_real_escape_string($con, $row['noofheadb3']);
                              $farmtypeb3 = mysqli_real_escape_string($con, $row['farmtypeb3']);
                              $organicepractionerb3 = mysqli_real_escape_string($con, $row['organicepractionerb3']);
                              $remarksb3 = mysqli_real_escape_string($con, $row['remarksb3']);
                              $cropb4 = mysqli_real_escape_string($con, $row['cropb4']);
                              $sizeb4 = mysqli_real_escape_string($con, $row['sizeb4']);
                              $noofheadb4 = mysqli_real_escape_string($con, $row['noofheadb4']);
                              $farmtypeb4 = mysqli_real_escape_string($con, $row['farmtypeb4']);
                              $organicepractionerb4 = mysqli_real_escape_string($con, $row['organicepractionerb4']);
                              $remarksb4 = mysqli_real_escape_string($con, $row['remarksb4']);
                              $cropb5 = mysqli_real_escape_string($con, $row['cropb5']);
                              $sizeb5 = mysqli_real_escape_string($con, $row['sizeb5']);
                              $noofheadb5 = mysqli_real_escape_string($con, $row['noofheadb5']);
                              $farmtypeb5 = mysqli_real_escape_string($con, $row['farmtypeb5']);
                              $organicepractionerb5 = mysqli_real_escape_string($con, $row['organicepractionerb5']);
                              $remarksb5 = mysqli_real_escape_string($con, $row['remarksb5']);
                              $farmbarangay3 = mysqli_real_escape_string($con, $row['farmbarangay3']);
                              $farmcity3 = mysqli_real_escape_string($con, $row['farmcity3']);
                              $farmarea3 = mysqli_real_escape_string($con, $row['farmarea3']);
                              $ancestral3 = mysqli_real_escape_string($con, $row['ancestral3']);
                              $agrarlan3 = mysqli_real_escape_string($con, $row['agrarlan3']);
                              $idno3 = mysqli_real_escape_string($con, $row['idno3']);
                              $ownershiptype3 = mysqli_real_escape_string($con, $row['ownershiptype3']);
                              $ownershiptypename3 = mysqli_real_escape_string($con, $row['ownershiptypename3']);
                              $cropc1 = mysqli_real_escape_string($con, $row['cropc1']);
                              $sizec1 = mysqli_real_escape_string($con, $row['sizec1']);
                              $noofheadc1 = mysqli_real_escape_string($con, $row['noofheadc1']);
                              $farmtypec1 = mysqli_real_escape_string($con, $row['farmtypec1']);
                              $organicepractionerc1 = mysqli_real_escape_string($con, $row['organicepractionerc1']);
                              $remarksc1 = mysqli_real_escape_string($con, $row['remarksc1']);
                              $cropc2 = mysqli_real_escape_string($con, $row['cropc2']);
                              $sizec2 = mysqli_real_escape_string($con, $row['sizec2']);
                              $noofheadc2 = mysqli_real_escape_string($con, $row['noofheadc2']);
                              $farmtypec2 = mysqli_real_escape_string($con, $row['farmtypec2']);
                              $organicepractionerc2 = mysqli_real_escape_string($con, $row['organicepractionerc2']);
                              $remarksc2 = mysqli_real_escape_string($con, $row['remarksc2']);
                              $cropc3 = mysqli_real_escape_string($con, $row['cropc3']);
                              $sizec3 = mysqli_real_escape_string($con, $row['sizec3']);
                              $noofheadc3 = mysqli_real_escape_string($con, $row['noofheadc3']);
                              $farmtypec3 = mysqli_real_escape_string($con, $row['farmtypec3']);
                              $organicepractionerc3 = mysqli_real_escape_string($con, $row['organicepractionerc3']);
                              $remarksc3 = mysqli_real_escape_string($con, $row['remarksc3']);
                              $cropc4 = mysqli_real_escape_string($con, $row['cropc4']);
                              $sizec4 = mysqli_real_escape_string($con, $row['sizec4']);
                              $noofheadc4 = mysqli_real_escape_string($con, $row['noofheadc4']);
                              $farmtypec4 = mysqli_real_escape_string($con, $row['farmtypec4']);
                              $organicepractionerc4 = mysqli_real_escape_string($con, $row['organicepractionerc4']);
                              $remarksc4 = mysqli_real_escape_string($con, $row['remarksc4']);
                              $cropc5 = mysqli_real_escape_string($con, $row['cropc5']);
                              $sizec5 = mysqli_real_escape_string($con, $row['userlevel']);
                              $noofheadc5 = mysqli_real_escape_string($con, $row['sizec5']);
                              $farmtypec5 = mysqli_real_escape_string($con, $row['farmtypec5']);
                              $organicepractionerc5 = mysqli_real_escape_string($con, $row['organicepractionerc5']);
                              $remarksc5 = mysqli_real_escape_string($con, $row['remarksc5']);
                              $farmerId = mysqli_real_escape_string($con, $row['farmerId']);
                            }
                        } else {
                        echo "0 results";
                        }

                        include "tabletwo.php";
                      }
                    ?> 
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <input type="button" value="Print" class="p-2 rounded-lg bg-yellow-400 text-white w-20" onclick="printDiv('printableArea')"/>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_edit" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="profileModalLabel">EDIT RSBSA FORM</h5>
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
                </div>
                <div class="modal-body relative p-4">
                    <?php
                      if(isset($_POST["btnedit"])){
                        echo $modaltwo; 
                        include "config.php";
                        $sql = "SELECT * FROM tbl_poblacion WHERE id = '".$_POST['rsbsaid']."'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                              $enrollmenttype = mysqli_real_escape_string($con, $row['enrollmenttype']);
                              $dateadminstered = mysqli_real_escape_string($con, $row['dateadminstered']);
                              $refnumber = mysqli_real_escape_string($con, $row['refnumber']);
                              $surname = mysqli_real_escape_string($con, $row['surname']);
                              $firstname = mysqli_real_escape_string($con, $row['firstname']);
                              $middlename = mysqli_real_escape_string($con, $row['middlename']);
                              $extentionname = mysqli_real_escape_string($con, $row['extentionname']);
                              $purok = mysqli_real_escape_string($con, $row['purok']);
                              $street = mysqli_real_escape_string($con, $row['street']);
                              $barangay = mysqli_real_escape_string($con, $row['barangay']);
                              $city = mysqli_real_escape_string($con, $row['city']);
                              $province = mysqli_real_escape_string($con, $row['province']);
                              $region = mysqli_real_escape_string($con, $row['region']);
                              $bday = mysqli_real_escape_string($con, $row['bday']);
                              $birthmunicipality = mysqli_real_escape_string($con, $row['birthmunicipality']);
                              $birthprovince = mysqli_real_escape_string($con, $row['birthprovince']);
                              $birthcountry = mysqli_real_escape_string($con, $row['birthcountry']);
                              $gender = mysqli_real_escape_string($con, $row['gender']);
                              $religion = mysqli_real_escape_string($con, $row['religion']);
                              $religionother = mysqli_real_escape_string($con, $row['religionother']);
                              $civil = mysqli_real_escape_string($con, $row['civil']);
                              $maiden = mysqli_real_escape_string($con, $row['maiden']);
                              $nameofspouse = mysqli_real_escape_string($con, $row['nameofspouse']);
                              $education = mysqli_real_escape_string($con, $row['education']);
                              $pwd = mysqli_real_escape_string($con, $row['pwd']);
                              $fourps = mysqli_real_escape_string($con, $row['fourps']);
                              if($fourps == NULL){
                                $fourps = "";
                              }
                              $indgenous = mysqli_real_escape_string($con, $row['indgenous']);
                              $indgenousspecify = mysqli_real_escape_string($con, $row['indgenousspecify']);
                              $gov = mysqli_real_escape_string($con, $row['gov']);
                              $idtype = mysqli_real_escape_string($con, $row['idtype']);
                              $idno = mysqli_real_escape_string($con, $row['idno']);
                              $householdhead = mysqli_real_escape_string($con, $row['householdhead']);
                              $householdname = mysqli_real_escape_string($con, $row['householdname']);
                              $householdrel = mysqli_real_escape_string($con, $row['householdrel']);
                              $noOfmembers = mysqli_real_escape_string($con, $_POST['noOfmembers']);
                              if($noOfmembers == NULL){
                                $noOfmembers = "";
                              }
                              $nomale = mysqli_real_escape_string($con, $row['nomale']);
                              $nofemale = mysqli_real_escape_string($con, $row['nofemale']);
                              $emergencyname = mysqli_real_escape_string($con, $row['emergencyname']);
                              $emergencyno = mysqli_real_escape_string($con, $row['emergencyno']);
                              $memberoffarm = mysqli_real_escape_string($con, $row['memberoffarm']);
                              $memberoffarmspecify = mysqli_real_escape_string($con, $row['memberoffarmspecify']);
                  
                              //$mainlivelihood = mysqli_real_escape_string($con, $_POST['mainlivelihood']);
                              //$farmingactivity = mysqli_real_escape_string($con, $_POST['farmingactivity']);
                              $mainlivelihood = explode(',', $row['mainlivelihood']);
                              $farmingactivity = explode(',', $row['farmingactivity']);

                              $farmingactivityothers = mysqli_real_escape_string($con, $row['farmingactivityothers']);
                              $farmingactivitylivestock = mysqli_real_escape_string($con, $row['farmingactivitylivestock']);
                              $farmingactivitypoultry = mysqli_real_escape_string($con, $row['farmingactivitypoultry']);
                              //$kindofwork = mysqli_real_escape_string($con, $_POST['kindofwork']);
      
                              $farmingactivitypoultry = explode(',', $_POST['farmingactivity']);
                              $farmingactivitylivestock = explode(',', $_POST['farmingactivitypoultry']);
      
                              $kindofwork = explode(',', $row['kindofwork']);
                              $kindofworkothers = mysqli_real_escape_string($con, $row['kindofworkothers']);
                              //$typeoffishing = mysqli_real_escape_string($con, $_POST['typeoffishing']);
                              $typeoffishingothers = mysqli_real_escape_string($con, $row['typeoffishingothers']);
                              //$typeofinvolment = mysqli_real_escape_string($con, $_POST['typeofinvolment']);
                              $typeoffishing = explode(',', $row['typeoffishing']);
                              $typeofinvolment = explode(',', $row['typeofinvolment']);
                  
                              $typeofinvolmentothers = mysqli_real_escape_string($con, $row['typeofinvolmentothers']);
                              $grossfarming = mysqli_real_escape_string($con, $row['grossfarming']);
                              $grossnonfarming = mysqli_real_escape_string($con, $row['grossnonfarming']);
                              $nooffarmparcels = mysqli_real_escape_string($con, $row['nooffarmparcels']);
                              $p1 = mysqli_real_escape_string($con, $row['p1']);
                              $p2 = mysqli_real_escape_string($con, $row['p2']);
                              $p3 = mysqli_real_escape_string($con, $row['p3']);
                              $farmbarangay1 = mysqli_real_escape_string($con, $row['farmbarangay1']);
                              $farmcity1 = mysqli_real_escape_string($con, $row['farmcity1']);
                              $farmarea1 = mysqli_real_escape_string($con, $row['farmarea1']);
                              $ancestral1 = mysqli_real_escape_string($con, $row['ancestral1']);
                              $agrarlan1 = mysqli_real_escape_string($con, $row['agrarlan1']);
                              $idno1 = mysqli_real_escape_string($con, $row['idno1']);
                              $ownershiptype1 = mysqli_real_escape_string($con, $row['ownershiptype1']);
                              $ownershiptypename1 = mysqli_real_escape_string($con, $row['ownershiptypename1']);
                              $cropa1 = mysqli_real_escape_string($con, $row['cropa1']);
                              $sizea1 = mysqli_real_escape_string($con, $row['sizea1']);
                              $noofheada1 = mysqli_real_escape_string($con, $row['noofheada1']);
                              $farmtypea1 = mysqli_real_escape_string($con, $row['farmtypea1']);
                              $organicepractionera1 = mysqli_real_escape_string($con, $row['organicepractionera1']);
                              $remarksa1 = mysqli_real_escape_string($con, $row['remarksa1']);
                              $cropa2 = mysqli_real_escape_string($con, $row['cropa2']);
                              $sizea2 = mysqli_real_escape_string($con, $row['sizea2']);
                              $noofheada2 = mysqli_real_escape_string($con, $row['noofheada2']);
                              $farmtypea2 = mysqli_real_escape_string($con, $row['farmtypea2']);
                              $organicepractionera2 = mysqli_real_escape_string($con, $row['organicepractionera2']);
                              $remarksa2 = mysqli_real_escape_string($con, $row['remarksa2']);
                              $cropa3 = mysqli_real_escape_string($con, $row['cropa3']);
                              $sizea3 = mysqli_real_escape_string($con, $row['sizea3']);
                              $noofheada3 = mysqli_real_escape_string($con, $row['noofheada3']);
                              $farmtypea3 = mysqli_real_escape_string($con, $row['farmtypea3']);
                              $organicepractionera3 = mysqli_real_escape_string($con, $row['organicepractionera3']);
                              $remarksa3 = mysqli_real_escape_string($con, $row['remarksa3']);
                              $cropa4 = mysqli_real_escape_string($con, $row['cropa4']);
                              $sizea4 = mysqli_real_escape_string($con, $row['sizea4']);
                              $noofheada4 = mysqli_real_escape_string($con, $row['noofheada4']);
                              $farmtypea4 = mysqli_real_escape_string($con, $row['farmtypea4']);
                              $organicepractionera4 = mysqli_real_escape_string($con, $row['organicepractionera4']);
                              $remarksa4 = mysqli_real_escape_string($con, $row['remarksa4']);
                              $cropa5 = mysqli_real_escape_string($con, $row['cropa5']);
                              $sizea5 = mysqli_real_escape_string($con, $row['sizea5']);
                              $noofheada5 = mysqli_real_escape_string($con, $row['noofheada5']);
                              $farmtypea5 = mysqli_real_escape_string($con, $row['farmtypea5']);
                              $organicepractionera5 = mysqli_real_escape_string($con, $row['organicepractionera5']);
                              $remarksa5 = mysqli_real_escape_string($con, $row['remarksa5']);
                              $farmbarangay2 = mysqli_real_escape_string($con, $row['farmbarangay2']);
                              $farmcity2 = mysqli_real_escape_string($con, $row['farmcity2']);
                              $farmarea2 = mysqli_real_escape_string($con, $row['farmarea2']);
                              $ancestral2 = mysqli_real_escape_string($con, $row['ancestral2']);
                              $agrarlan2 = mysqli_real_escape_string($con, $row['agrarlan2']);
                              $idno2 = mysqli_real_escape_string($con, $row['idno2']);
                              $ownershiptype2 = mysqli_real_escape_string($con, $row['ownershiptype2']);
                              $ownershiptypename2 = mysqli_real_escape_string($con, $row['ownershiptypename2']);
                              $cropb1 = mysqli_real_escape_string($con, $row['cropb1']);
                              $sizeb1 = mysqli_real_escape_string($con, $row['sizeb1']);
                              $noofheadb1 = mysqli_real_escape_string($con, $row['noofheadb1']);
                              $farmtypeb1 = mysqli_real_escape_string($con, $row['farmtypeb1']);
                              $organicepractionerb1 = mysqli_real_escape_string($con, $row['organicepractionerb1']);
                              $remarksb1 = mysqli_real_escape_string($con, $row['remarksb1']);
                              $cropb2 = mysqli_real_escape_string($con, $row['cropb2']);
                              $sizeb2 = mysqli_real_escape_string($con, $row['sizeb2']);
                              $noofheadb2 = mysqli_real_escape_string($con, $row['noofheadb2']);
                              $farmtypeb2 = mysqli_real_escape_string($con, $row['farmtypeb2']);
                              $organicepractionerb2 = mysqli_real_escape_string($con, $_POST['organicepractionerb2']);
                              $remarksb2 = mysqli_real_escape_string($con, $row['remarksb2']);
                              $cropb3 = mysqli_real_escape_string($con, $row['cropb3']);
                              $sizeb3 = mysqli_real_escape_string($con, $row['sizeb3']);
                              $noofheadb3 = mysqli_real_escape_string($con, $row['noofheadb3']);
                              $farmtypeb3 = mysqli_real_escape_string($con, $row['farmtypeb3']);
                              $organicepractionerb3 = mysqli_real_escape_string($con, $row['organicepractionerb3']);
                              $remarksb3 = mysqli_real_escape_string($con, $row['remarksb3']);
                              $cropb4 = mysqli_real_escape_string($con, $row['cropb4']);
                              $sizeb4 = mysqli_real_escape_string($con, $row['sizeb4']);
                              $noofheadb4 = mysqli_real_escape_string($con, $row['noofheadb4']);
                              $farmtypeb4 = mysqli_real_escape_string($con, $row['farmtypeb4']);
                              $organicepractionerb4 = mysqli_real_escape_string($con, $row['organicepractionerb4']);
                              $remarksb4 = mysqli_real_escape_string($con, $row['remarksb4']);
                              $cropb5 = mysqli_real_escape_string($con, $row['cropb5']);
                              $sizeb5 = mysqli_real_escape_string($con, $row['sizeb5']);
                              $noofheadb5 = mysqli_real_escape_string($con, $row['noofheadb5']);
                              $farmtypeb5 = mysqli_real_escape_string($con, $row['farmtypeb5']);
                              $organicepractionerb5 = mysqli_real_escape_string($con, $row['organicepractionerb5']);
                              $remarksb5 = mysqli_real_escape_string($con, $row['remarksb5']);
                              $farmbarangay3 = mysqli_real_escape_string($con, $row['farmbarangay3']);
                              $farmcity3 = mysqli_real_escape_string($con, $row['farmcity3']);
                              $farmarea3 = mysqli_real_escape_string($con, $row['farmarea3']);
                              $ancestral3 = mysqli_real_escape_string($con, $row['ancestral3']);
                              $agrarlan3 = mysqli_real_escape_string($con, $row['agrarlan3']);
                              $idno3 = mysqli_real_escape_string($con, $row['idno3']);
                              $ownershiptype3 = mysqli_real_escape_string($con, $row['ownershiptype3']);
                              $ownershiptypename3 = mysqli_real_escape_string($con, $row['ownershiptypename3']);
                              $cropc1 = mysqli_real_escape_string($con, $row['cropc1']);
                              $sizec1 = mysqli_real_escape_string($con, $row['sizec1']);
                              $noofheadc1 = mysqli_real_escape_string($con, $row['noofheadc1']);
                              $farmtypec1 = mysqli_real_escape_string($con, $row['farmtypec1']);
                              $organicepractionerc1 = mysqli_real_escape_string($con, $row['organicepractionerc1']);
                              $remarksc1 = mysqli_real_escape_string($con, $row['remarksc1']);
                              $cropc2 = mysqli_real_escape_string($con, $row['cropc2']);
                              $sizec2 = mysqli_real_escape_string($con, $row['sizec2']);
                              $noofheadc2 = mysqli_real_escape_string($con, $row['noofheadc2']);
                              $farmtypec2 = mysqli_real_escape_string($con, $row['farmtypec2']);
                              $organicepractionerc2 = mysqli_real_escape_string($con, $row['organicepractionerc2']);
                              $remarksc2 = mysqli_real_escape_string($con, $row['remarksc2']);
                              $cropc3 = mysqli_real_escape_string($con, $row['cropc3']);
                              $sizec3 = mysqli_real_escape_string($con, $row['sizec3']);
                              $noofheadc3 = mysqli_real_escape_string($con, $row['noofheadc3']);
                              $farmtypec3 = mysqli_real_escape_string($con, $row['farmtypec3']);
                              $organicepractionerc3 = mysqli_real_escape_string($con, $row['organicepractionerc3']);
                              $remarksc3 = mysqli_real_escape_string($con, $row['remarksc3']);
                              $cropc4 = mysqli_real_escape_string($con, $row['cropc4']);
                              $sizec4 = mysqli_real_escape_string($con, $row['sizec4']);
                              $noofheadc4 = mysqli_real_escape_string($con, $row['noofheadc4']);
                              $farmtypec4 = mysqli_real_escape_string($con, $row['farmtypec4']);
                              $organicepractionerc4 = mysqli_real_escape_string($con, $row['organicepractionerc4']);
                              $remarksc4 = mysqli_real_escape_string($con, $row['remarksc4']);
                              $cropc5 = mysqli_real_escape_string($con, $row['cropc5']);
                              $sizec5 = mysqli_real_escape_string($con, $row['userlevel']);
                              $noofheadc5 = mysqli_real_escape_string($con, $row['sizec5']);
                              $farmtypec5 = mysqli_real_escape_string($con, $row['farmtypec5']);
                              $organicepractionerc5 = mysqli_real_escape_string($con, $row['organicepractionerc5']);
                              $remarksc5 = mysqli_real_escape_string($con, $row['remarksc5']);
                              $farmerId = mysqli_real_escape_string($con, $row['farmerId']);

                              $number = mysqli_real_escape_string($con, $row['number']);
                              $telephone = mysqli_real_escape_string($con, $row['telephone']);
                            }
                        } else {
                        echo "0 results";
                        }

                        include "rsbsa-update.php";
                      }
                    ?> 
                </div>
                <!--div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <input type="button" value="Update" class="p-2 rounded-lg bg-yellow-400 text-white w-20" onclick="printDiv('printableArea')"/>
                </div-->
            </div>
        </div>
    </div>

<script>
        function printDiv(printableArea) {
            var printContents = document.getElementById("myDiv").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
<script>
   $(document).ready( function () {
            $('#tbl_rsbsa').DataTable(
                {
                    dom: 'Bfrtip',
                    responsive: true
                }
            );
        } );
</script>

<?php
if($_SESSION['userlevel'] === "admin"){
    ?>
    <script type="text/javascript">
    var elems = document.getElementsByClassName('admin');
    var elemshide = document.getElementsByClassName('admin-hide');
    for (var i=0;i<elems.length;i+=1){
         elems[i].style.display = 'block';
        }
    for (var i=0;i<elemshide.length;i+=1){
     elemshide[i].style.display = 'none';
    }
    </script>
    <?php
}

?>
<?php
if($_SESSION['userlevel'] === "superuser"){
    ?>
    <script type="text/javascript">
    var elems = document.getElementsByClassName('superuser');
    var elemshide = document.getElementsByClassName('super-hide');
    for (var i=0;i<elems.length;i+=1){
         elems[i].style.display = 'block';
        }
        for (var i=0;i<elemshide.length;i+=1){
     elemshide[i].style.display = 'none';
    }
    </script>
    <?php
}
?>
</body>
</html>

