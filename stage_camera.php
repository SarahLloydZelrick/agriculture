<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");

if ($iphone || $android || $berry == true) 
{ 
echo"<style>#small_screen { display:block !important;} #big_screen{ display:none; }</style>";
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
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <title>Crop Analysis</title>
</head>
<!-- IMAGE COMPARISON -->

<?php

$fourRandomDigit = rand(1000,9999);
$target_dir = "images/cropanalysis/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_fileTwo = $target_dir . basename($_FILES["fileToUploadTwo"]["name"]);
$uploadOk = 1;
$errors = "";
$success = "";
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileTypeTwo = strtolower(pathinfo($target_fileTwo,PATHINFO_EXTENSION));

if(isset($_POST["btn_gallery"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      $errors = "1";
      $error_message = "File is not an image";
      //echo "File is not an image.";
      $uploadOk = 0;
    }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $errors = "1";
          $error_message = "Sorry, your file is too large.";
          $uploadOk = 0;
      }
  
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          $errors = "1";
          $error_message = "Sorry, only JPG, JPEG, PNG files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $errors = 1;
      } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        ?>
        <script>
            $(document).ready(function(){
                $('#galleryModal').modal('show');
            });
        </script>
        <?php

      }
    }
}


//Camera

if(isset($_POST["btn_camera"])) {
    $check = getimagesize($_FILES["fileToUploadTwo"]["tmp_name"]);
    if($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      $errors = "1";
      $error_message = "File is not an image";
      //echo "File is not an image.";
      $uploadOk = 0;
    }
      // Check file size
      if ($_FILES["fileToUploadTwo"]["size"] > 50000000) {
          $errors = "1";
          $error_message = "Sorry, your file is too large.";
          $uploadOk = 0;
      }
  
      // Allow certain file formats
      if($imageFileTypeTwo != "jpg" && $imageFileTypeTwo != "png" && $imageFileTypeTwo != "jpeg") {
          $errors = "1";
          $error_message = "Sorry, only JPG, JPEG, PNG files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $errors = 1;
      } else {
      if (move_uploaded_file($_FILES["fileToUploadTwo"]["tmp_name"], $target_fileTwo)) {
        ?>
        <script>
            $(document).ready(function(){
                $('#galleryModalTwo').modal('show');
            });
        </script>
        <?php

      }
    }
}
?>

<!-- END OF IMAGE COMPARISON -->
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
   <div class="pt-10 md:ml-60 ">
        <div class="flex flex-col justify-center md:flex-row ">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-xl">CHOOSE CAMERA OR GALLERY</p>
                <div class="flex flex-col gap-5 w-full md:flex md:flex-row">
                    <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-full md:w-2/4">
                        <?php 
                            if(!empty($errors)){
                                ?>
                                <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                                    <strong class="mr-1"><?php echo $error_message; ?></strong>
                                    <button type="button" class=""  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                </div>
                                <?php
                            }
                        ?>
                        <p>Camera</p>
                        <div class="screen_small" id="small_screen" style="display:none;">
                            <form action="" class="flex flex-col gap-5"  method="POST"  enctype="multipart/form-data">
                                <input type="file" accept="image/*" capture="camera"  name="fileToUploadTwo" id="fileToUploadTwo"/>
                                <input type="submit" value="Submit" name="btn_camera" class="p-2 rounded-lg bg-yellow-400 text-white">
                            </form>
                        </div>
                        <div class="screen_large" id="big_screen">
                            <div class="flex">
                                <div class="flex flex-col gap-5">
                                    <div id="my_camera" class="flex flex-col">
                                    </div>
                                    <!-- First, include the Webcam.js JavaScript Library -->
                                    <script type="text/javascript" src="webcam.js"></script>
                                    
                                    <!-- Configure a few settings and attach camera -->
                                    <script language="JavaScript">
                                        Webcam.set({
                                            width: 400,
                                            height: 260,
                                            image_format: 'jpeg',
                                            jpeg_quality: 90
                                        });
                                        Webcam.attach( '#my_camera' );
                                    </script>
                                    
                                    <!-- A button for taking snaps -->
                                    <form>
                                        <input type="button" class="p-2 rounded-lg bg-yellow-400 text-white" value="Take Snapshot" onClick="take_snapshot()">
                                    </form>
                                    <!-- Code to handle taking the snapshot and displaying it locally -->
                                    <script language="JavaScript">
                                        function take_snapshot() {
                                            // take snapshot and get image data
                                            Webcam.snap( function(data_uri) {
                                                // display results in page
                                                
                                                    
                                                Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
                                                    document.getElementById('results').innerHTML = 
                                                    '<h2>Here is your image:</h2>' + 
                                                    '<img src="'+text+'"/>';
                                                } );    
                                            } );
                                        }
                                    </script>
                                </div>
                                <div id="results">Your captured image will appear here...</div>
                            </div>
                                

                        </div>

                    </div>
                    <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-full md:w-2/4">
                        <?php 
                            if(!empty($errors)){
                                ?>
                                <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                                    <strong class="mr-1"><?php echo $error_message; ?></strong>
                                    <button type="button" class=""  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                </div>
                                <?php
                            }
                        ?>
                        <p>Gallery</p>
                        <form action="" class="flex flex-col gap-5" method="POST"  enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                            <input type="submit" value="Submit" name="btn_gallery" class="p-2 rounded-lg bg-yellow-400 text-white">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
   </div>
     <!-- START OF IMAGE COMPARE -->
     <?php
                    include('compareImages.php');

                    $imageloc = "images/cropanalysis/";
                    $imagename = $_FILES["fileToUpload"]["name"];
                    $imageuploaded = $imageloc.$imagename;
                    $compareMachine = new compareImages($imageuploaded);
                    $imageuploadedHash = $compareMachine->getHasString(); 
                    
                    /* Compare this image with an other image*/
                    $aphids = 'pest/aphids/aphids.jpg';
                    //$diff = $compareMachine->compareWith($image2); //easy
                    $aphidsHash = $compareMachine->hasStringImage($aphids); 
                    $diff1 = $compareMachine->compareHash($aphidsHash); 
                    
                    if($diff1>11){
                        //echo ' => 2 different image 1';
                        //Armyworm
                        /* Compare this image with an other image*/
                        $armyworm = 'pest/armyworm/armyworm.jpg';
                        //$diff = $compareMachine->compareWith($image2); //easy
                        $armywormHash = $compareMachine->hasStringImage($armyworm); 
                        $diff2 = $compareMachine->compareHash($armywormHash);
                        if($diff2>11){
                            //echo ' => 2 different image 2';
                            //Asiatic
                            /* Compare this image with an other image*/
                            $asiatic = 'pest/asiatic/asiatic.jpg';
                            //$diff = $compareMachine->compareWith($image2); //easy
                            $asiaticHash = $compareMachine->hasStringImage($asiatic); 
                            $diff3 = $compareMachine->compareHash($asiaticHash); 
                                if($diff3>11){
                                    //echo ' => 2 different image 3';
                                    //Cutworm
                                    /* Compare this image with an other image*/
                                    $cutworm = 'pest/cutworm/cutworm1.jpg';
                                    //$diff = $compareMachine->compareWith($image2); //easy
                                    $cutwormHash = $compareMachine->hasStringImage($cutworm); 
                                    $diff4 = $compareMachine->compareHash($cutwormHash); 
                                        if($diff4>11){
                                           // echo ' => 2 different image 4';
                                            //Earworm
                                            /* Compare this image with an other image*/
                                            $earworm = 'pest/earworm/earworm.jpg';
                                            //$diff = $compareMachine->compareWith($image2); //easy
                                            $earwormHash = $compareMachine->hasStringImage($earworm); 
                                            $diff5 = $compareMachine->compareHash($earwormHash); 
                                            if($diff5>11){
                                               // echo ' => 2 different image 5';
                                                //hopper
                                                /* Compare this image with an other image*/
                                                $hopper = 'pest/hopper/hopper.jpg';
                                                //$diff = $compareMachine->compareWith($image2); //easy
                                                $hopperHash = $compareMachine->hasStringImage($hopper); 
                                                $diff6 = $compareMachine->compareHash($hopperHash); 
                    
                                                if($diff6>11){
                                                    //echo ' => 2 different image 6';
                                                    //maggot
                                                    /* Compare this image with an other image*/
                                                    $maggot = 'pest/maggot/maggot.jpg';
                                                    //$diff = $compareMachine->compareWith($image2); //easy
                                                    $maggotHash = $compareMachine->hasStringImage($maggot); 
                                                    $diff7 = $compareMachine->compareHash($maggotHash); 
                    
                                                    if($diff7>11){
                                                       // echo ' => 2 different image 7';
                                                        //Semilooper
                                                        /* Compare this image with an other image*/
                                                        $semilooper = 'pest/semilooper/semilooper.jpg';
                                                        //$diff = $compareMachine->compareWith($image2); //easy
                                                        $semilooperHash = $compareMachine->hasStringImage($semilooper); 
                                                        $diff8 = $compareMachine->compareHash($semilooperHash);
                                                        if($diff8>11){
                                                            
                                                           // echo ' => 2 different image 8';
                                                            //True Army
                                                            /* Compare this image with an other image*/
                                                            $truearmy = 'pest/truearmy/truearmy1.jpg';
                                                            //$diff = $compareMachine->compareWith($image2); //easy
                                                            $truearmyHash = $compareMachine->hasStringImage($truearmy); 
                                                            $diff9 = $compareMachine->compareHash($truearmyHash);
                                                            if($diff9>11){
                                                                //echo ' => 2 different image 9';
                                                                //White Grub
                                                                /* Compare this image with an other image*/
                                                                $whitegrub = 'pest/whitegrub/whitegrub.jpg';
                                                                //$diff = $compareMachine->compareWith($image2); //easy
                                                                $whitegrubHash = $compareMachine->hasStringImage($whitegrub); 
                                                                $diff10 = $compareMachine->compareHash($whitegrubHash); 
                                                                if($diff10>11){
                                                                    //echo ' => 2 different image 10';
                                                                    //Asiatic
                                                                    $nameofpest = "Image not recognized!";
                                                                    $scientificname = "";
                                                                    $pestdescription = "";
                                                                    $pestcureOne = "";
                                                                    $pestcureTwo = "";
                                                                    $pestcureThree = "";
                                                                    
                                                                }
                                                                else{
                                                                    $nameofpest = "White Grub";
                                                                    $scientificname = "Phyllophaga spp. ( Insecta: Coleoptera: Scarabaeidae)";
                                                                    $pestdescription = "White grubs are the immature forms of scarab beetles, the well-known May/June beetles, masked chafer, and Japanese beetle. The grubs, 1/4 to over 1 inch (6-25 mm) long, are white with brown heads and have six prominent legs. Their bodies typically are curved into a C-shape.";
                                                                    $pestcureOne = "Rototill under crop debris immediately after harvest to destroy overwintering sites.";
                                                                    $pestcureTwo = "Applying beneficial nematodes in seed furrows or as a top dressing around plants can be effective in getting rid of the larvae.";
                                                                    $pestcureThree = "Yellow Sticky Traps placed around vegetable crops will capture many adult flies before they can mate and lay eggs.";
                                                                }
                                                                
                                                            }
                                                            else{
                                                                $nameofpest = "True Armyworm";
                                                                $scientificname = "Mythimna unipuncta";
                                                                $pestdescription = "True armyworm larvae vary in color from dark greenish-brown to black. On each side, there are long, pale white, orange, and dark brown stripes along the length of the abdomen. Mature larvae are approximately 1 ½ inches long.";
                                                                $pestcureOne = "Use pheromone traps to monitor the arrival of moths. When you first notice them — look for the distinctive white dot on their forewings — it’s time to start closer inspection of your plants.";
                                                                $pestcureTwo = "Plant to attract birds and beneficial insects. Birds are especially fond of the moths and will pull larvae from lawns and plants. In the fall, uncover and turn your soil before putting it to bed, giving birds a chance to pick off the exposed pupae.";
                                                                $pestcureThree = "Applications of Garden Dust (Bt-kurstaki) or OMRI-listed Monterey Garden Insect Spray (spinosad) will kill caterpillars.";
                                                            }
                                                        }
                                                        else{
                                                            $nameofpest = "Corn Semilooper";
                                                            $scientificname = "Achaea janata";
                                                            $pestdescription = "a caterpillar that is the larva of any of various plusiid moths and that moves like a geometrid larva";
                                                            $pestcureOne = "Wasps are the looper larvae’s biggest enemy. Release trichogramma wasps to destroy eggs.";
                                                            $pestcureTwo = "Other botanical insecticides, like Safer’s Tomato & Vegetable Insect Killer or Pyrethrin Spray, can be used as a last resort.";
                                                            $pestcureThree = "Cover plants with floating row covers to keep migrating moths from landing and laying eggs. This can make a significant difference if timed correctly.";
                                                        }
                                                    }
                                                    else{
                                                        $nameofpest = "Corn Seedling Maggot";
                                                        $scientificname = "Delia platura (Meigen)";
                                                        $pestdescription = "Seedcorn maggots are white, legless and 1/4 inches long with a tapered body (Photo 2). The maggots have a black mouth with hook-like mouthparts to feed. The pupa is brown and looks like a “wheat seed” (Photo 1). The adult fly is grey to brown in color with red eyes.";
                                                        $pestcureOne = "Applying beneficial nematodes in seed furrows or as a top dressing around plants can be effective in getting rid of the larvae.";
                                                        $pestcureTwo = "Using a pyrethrin drench is also an effective option, but should only be considered as a last resort.";
                                                        $pestcureThree = "Rototill under crop debris immediately after harvest to destroy overwintering sites.";
                                                    }
                                                }
                                                else{
                                                    $nameofpest = "Corn Plant Hopper";
                                                    $scientificname = "Dalbulus maidis";
                                                    $pestdescription = "The adult corn leafhopper is light tan in color and about 1/8 of an inch long. Its most distinguishing feature is two dark spots located between the eyes, which are visible using a 10X hand lens. The nymphs have no wings and are green to tan in color.";
                                                    $pestcureOne = "Apply diatomaceous earth to plants and/or spot treat with insecticidal soap to keep pest populations under control. Thorough coverage of both upper and lower infested leaves is necessary for effective control.";
                                                    $pestcureTwo = "Floating row covers can be used as a physical barrier to keep leafhoppers from damaging plants.";
                                                    $pestcureThree = "If pest levels become intolerable, spot treat with potent, fast-acting organic insecticides as a last resort.";
                                                }
                                            }
                                            else{
                                                $nameofpest = "Corn Earworm";
                                                $scientificname = "Helicoverpa zea";
                                                $pestdescription = "Corn earworm moths are most active during evening and night. Adults are robust moths about 0.75 inches long with a wingspan of 1 to 1.5 inches. They can be olive green, tan, or dark reddish brown. Young caterpillar larvae are greenish with black heads and conspicuous black hairs on the body.";
                                                $pestcureOne = "Till your soil fall and spring to expose the pupae to wind, weather, birds and other predators.";
                                                $pestcureTwo = "Use pheromone traps to determine the main flight period for moths. Moths mostly fly under cover of night and go unspotted.";
                                                $pestcureThree = "Employ beneficial insects, such as green lacewings, minute pirate bugs and damsel bugs. All will  feed on corn earworm eggs and small larvae.";

                                            }
                                        }
                                        else{
                                            $nameofpest = "Common Cutworm";
                                            $scientificname = "Agrotis ipsilon";
                                            $pestdescription = "Cutworms are moth larvae that hide under litter or soil during the day, coming out in the dark to feed on plants. A larva typically attacks the first part of the plant it encounters, namely the stem, often of a seedling, and consequently cuts it down; hence the name cutworm.";
                                            $pestcureOne = "Plant sunflowers along the edge of your garden. Sunflowers are a favorite target of cutworms. The plants will attract the larvae giving you a chance to pick them from the ground before they head to your corn.";
                                            $pestcureTwo = "Place cardboard collars (or milk containers with the bottom cut out) around transplant stems at planting time. Be sure to work the collar into the soil at least an inch or two.";
                                            $pestcureThree = "A three-foot wide (or more) bare-soil strip between your lawn and your garden plants makes it harder for larvae to reach your plants. It also gives you more of a chance to spot them.";
                                        }
                                }
                                else{
                                    $nameofpest = "Asiatic Corn Borer";
                                    $scientificname = "Ostrinia furnacalis";
                                    $pestdescription = "The Asian corn borer goes through six instar stages while in the larval phase. The first-instar larva is pinkish with dark spots and a dark head. The late instar larva is yellow brown with dark spots and reaches up to 2.9 centimeters in length.";
                                    $pestcureOne = "Shred and plow under cornstalks in or near fields where borers overwinter. This should be done in fall or early spring before the adults emerge.";
                                    $pestcureTwo = "Use pheromone traps to determine main flight period for moths, then release trichogramma wasps to destroy eggs.";
                                    $pestcureThree = "Treat silk frequently with  Garden Dust (Bt-kurstaki) or Monterey Garden Insect Spray (spinosad) to kill young larvae. Repeat applications every 4-5 days until tassels turn brown.";
                                }
                        }
                        else{
                            //echo ' => duplicate image 2';
                            $nameofpest = "Black Armyworm";
                            $scientificname = "Spodoptera cosmioides";
                            $pestdescription = "The African armyworm is a migratory moth, the larvae (caterpillars) of which are important pests of pastures and cereal crops, predominantly in Africa south of the Sahara, Yemen, and certain countries of the Pacific region. Normally, only small numbers of this pest occur, usually on pastures.";
                            $pestcureOne = "Use pheromone traps to monitor the arrival of moths. When you first notice them — look for the distinctive white dot on their forewings";
                            $pestcureTwo = "Release trichogramma wasps to parasitize any newly laid eggs. These tiny beneficial insects — 1mm or less — insert their eggs inside of pest eggs, killing them before they enter the plant-eating larval stage.";
                            $pestcureThree = "Use fast-acting organic insecticides if pest levels become intolerable.";

                        }
                    
                    }
                    else{
                        //echo ' => duplicate image 1';
                        $nameofpest = "Corn Aphids";
                        $scientificname = "Rhopalosiphum maidis";
                        $pestdescription = "Corn leaf aphids, Rhopalosiphum maidis (Fitch), are small, 1.5 to 2.5 millimeters (1/16 to 3/32 inch), bluish-green insects with a purplish patch around the base of the prominent cornicles. They are usually wingless with short antennae.";
                        $pestcureOne = "Pinch or prune off heavily infested leaves or other plant parts.";
                        $pestcureTwo = "Use the Bug Blaster to hose off plants with a strong stream of water and reduce pest numbers.";
                        $pestcureThree = "Do not over water or over fertilize – aphids like plants with high nitrogen levels and soft new growth. Use organic fertilizers which release nutrients slowly.";

                    }


    //FOR CAMERA

    $imagelocb = "images/cropanalysis/";
                    $imagenameb = $_FILES["fileToUploadTwo"]["name"];
                    $imageuploadedb = $imagelocb.$imagenameb;
                    $compareMachineb = new compareImages($imageuploadedb);
                    $imageuploadedHashb = $compareMachine->getHasString(); 
                    
                    /* Compare this image with an other image*/
                    $aphidsb = 'pest/aphids/aphids.jpg';
                    //$diff = $compareMachine->compareWith($image2); //easy
                    $aphidsHashb = $compareMachine->hasStringImage($aphidsb); 
                    $diff1b = $compareMachine->compareHash($aphidsHashb); 
                    
                    if($diff1b>11){
                        //echo ' => 2 different image 1';
                        //Armyworm
                        /* Compare this image with an other image*/
                        $armywormb = 'pest/armyworm/armyworm.jpg';
                        //$diff = $compareMachine->compareWith($image2); //easy
                        $armywormHashb = $compareMachine->hasStringImage($armywormb); 
                        $diff2b = $compareMachine->compareHash($armywormHashb);
                        if($diff2b>11){
                            //echo ' => 2 different image 2';
                            //Asiatic
                            /* Compare this image with an other image*/
                            $asiaticb = 'pest/asiatic/asiatic.jpg';
                            //$diff = $compareMachine->compareWith($image2); //easy
                            $asiaticHashb = $compareMachine->hasStringImage($asiaticb); 
                            $diff3b = $compareMachine->compareHash($asiaticHashb); 
                                if($diff3b>11){
                                    //echo ' => 2 different image 3';
                                    //Cutworm
                                    /* Compare this image with an other image*/
                                    $cutwormb = 'pest/cutworm/cutworm1.jpg';
                                    //$diff = $compareMachine->compareWith($image2); //easy
                                    $cutwormHashb = $compareMachine->hasStringImage($cutwormb); 
                                    $diff4b = $compareMachine->compareHash($cutwormHashb); 
                                        if($diff4b>11){
                                           // echo ' => 2 different image 4';
                                            //Earworm
                                            /* Compare this image with an other image*/
                                            $earwormb = 'pest/earworm/earworm.jpg';
                                            //$diff = $compareMachine->compareWith($image2); //easy
                                            $earwormHashb = $compareMachine->hasStringImage($earwormb); 
                                            $diff5b = $compareMachine->compareHash($earwormHashb); 
                                            if($diff5b>11){
                                               // echo ' => 2 different image 5';
                                                //hopper
                                                /* Compare this image with an other image*/
                                                $hopperb = 'pest/hopper/hopper.jpg';
                                                //$diff = $compareMachine->compareWith($image2); //easy
                                                $hopperHashb = $compareMachine->hasStringImage($hopperb); 
                                                $diff6b = $compareMachine->compareHash($hopperHashb); 
                    
                                                if($diff6b>11){
                                                    //echo ' => 2 different image 6';
                                                    //maggot
                                                    /* Compare this image with an other image*/
                                                    $maggotb = 'pest/maggot/maggot.jpg';
                                                    //$diff = $compareMachine->compareWith($image2); //easy
                                                    $maggotHashb = $compareMachine->hasStringImage($maggotb); 
                                                    $diff7b = $compareMachine->compareHash($maggotHashb); 
                    
                                                    if($diff7b>11){
                                                       // echo ' => 2 different image 7';
                                                        //Semilooper
                                                        /* Compare this image with an other image*/
                                                        $semilooperb = 'pest/semilooper/semilooper.jpg';
                                                        //$diff = $compareMachine->compareWith($image2); //easy
                                                        $semilooperHashb = $compareMachine->hasStringImage($semilooperb); 
                                                        $diff8b = $compareMachine->compareHash($semilooperHashb);
                                                        if($diff8b>11){
                                                            
                                                           // echo ' => 2 different image 8';
                                                            //True Army
                                                            /* Compare this image with an other image*/
                                                            $truearmyb = 'pest/truearmy/truearmy1.jpg';
                                                            //$diff = $compareMachine->compareWith($image2); //easy
                                                            $truearmyHashb = $compareMachine->hasStringImage($truearmyb); 
                                                            $diff9b = $compareMachine->compareHash($truearmyHashb);
                                                            if($diff9b>11){
                                                                //echo ' => 2 different image 9';
                                                                //White Grub
                                                                /* Compare this image with an other image*/
                                                                $whitegrubb = 'pest/whitegrub/whitegrub.jpg';
                                                                //$diff = $compareMachine->compareWith($image2); //easy
                                                                $whitegrubHashb = $compareMachine->hasStringImage($whitegrubb); 
                                                                $diff10b = $compareMachine->compareHash($whitegrubHashb); 
                                                                if($diff10b>11){
                                                                    //echo ' => 2 different image 10';
                                                                    //Asiatic
                                                                    $nameofpestb = "Image not recognized!";
                                                                    $scientificnameb = "";
                                                                    $pestdescriptionb = "";
                                                                    $pestcureOneb = "";
                                                                    $pestcureTwob = "";
                                                                    $pestcureThreeb = "";
                                                                    
                                                                }
                                                                else{
                                                                    $nameofpestb = "White Grub";
                                                                    $scientificnameb = "Phyllophaga spp. ( Insecta: Coleoptera: Scarabaeidae)";
                                                                    $pestdescriptionb = "White grubs are the immature forms of scarab beetles, the well-known May/June beetles, masked chafer, and Japanese beetle. The grubs, 1/4 to over 1 inch (6-25 mm) long, are white with brown heads and have six prominent legs. Their bodies typically are curved into a C-shape.";
                                                                    $pestcureOneb = "Rototill under crop debris immediately after harvest to destroy overwintering sites.";
                                                                    $pestcureTwob = "Applying beneficial nematodes in seed furrows or as a top dressing around plants can be effective in getting rid of the larvae.";
                                                                    $pestcureThreeb = "Yellow Sticky Traps placed around vegetable crops will capture many adult flies before they can mate and lay eggs.";
                                                                }
                                                                
                                                            }
                                                            else{
                                                                $nameofpestb = "True Armyworm";
                                                                $scientificnameb = "Mythimna unipuncta";
                                                                $pestdescriptionb = "True armyworm larvae vary in color from dark greenish-brown to black. On each side, there are long, pale white, orange, and dark brown stripes along the length of the abdomen. Mature larvae are approximately 1 ½ inches long.";
                                                                $pestcureOneb = "Use pheromone traps to monitor the arrival of moths. When you first notice them — look for the distinctive white dot on their forewings — it’s time to start closer inspection of your plants.";
                                                                $pestcureTwob = "Plant to attract birds and beneficial insects. Birds are especially fond of the moths and will pull larvae from lawns and plants. In the fall, uncover and turn your soil before putting it to bed, giving birds a chance to pick off the exposed pupae.";
                                                                $pestcureThreeb = "Applications of Garden Dust (Bt-kurstaki) or OMRI-listed Monterey Garden Insect Spray (spinosad) will kill caterpillars.";
                                                            }
                                                        }
                                                        else{
                                                            $nameofpestb = "Corn Semilooper";
                                                            $scientificnameb = "Achaea janata";
                                                            $pestdescriptionb = "a caterpillar that is the larva of any of various plusiid moths and that moves like a geometrid larva";
                                                            $pestcureOneb = "Wasps are the looper larvae’s biggest enemy. Release trichogramma wasps to destroy eggs.";
                                                            $pestcureTwob = "Other botanical insecticides, like Safer’s Tomato & Vegetable Insect Killer or Pyrethrin Spray, can be used as a last resort.";
                                                            $pestcureThreeb = "Cover plants with floating row covers to keep migrating moths from landing and laying eggs. This can make a significant difference if timed correctly.";
                                                        }
                                                    }
                                                    else{
                                                        $nameofpestb = "Corn Seedling Maggot";
                                                        $scientificnameb = "Delia platura (Meigen)";
                                                        $pestdescriptionb = "Seedcorn maggots are white, legless and 1/4 inches long with a tapered body (Photo 2). The maggots have a black mouth with hook-like mouthparts to feed. The pupa is brown and looks like a “wheat seed” (Photo 1). The adult fly is grey to brown in color with red eyes.";
                                                        $pestcureOneb = "Applying beneficial nematodes in seed furrows or as a top dressing around plants can be effective in getting rid of the larvae.";
                                                        $pestcureTwob = "Using a pyrethrin drench is also an effective option, but should only be considered as a last resort.";
                                                        $pestcureThreeb = "Rototill under crop debris immediately after harvest to destroy overwintering sites.";
                                                    }
                                                }
                                                else{
                                                    $nameofpestb = "Corn Plant Hopper";
                                                    $scientificnameb = "Dalbulus maidis";
                                                    $pestdescriptionb = "The adult corn leafhopper is light tan in color and about 1/8 of an inch long. Its most distinguishing feature is two dark spots located between the eyes, which are visible using a 10X hand lens. The nymphs have no wings and are green to tan in color.";
                                                    $pestcureOneb = "Apply diatomaceous earth to plants and/or spot treat with insecticidal soap to keep pest populations under control. Thorough coverage of both upper and lower infested leaves is necessary for effective control.";
                                                    $pestcureTwob = "Floating row covers can be used as a physical barrier to keep leafhoppers from damaging plants.";
                                                    $pestcureThreeb = "If pest levels become intolerable, spot treat with potent, fast-acting organic insecticides as a last resort.";
                                                }
                                            }
                                            else{
                                                $nameofpestb = "Corn Earworm";
                                                $scientificnameb = "Helicoverpa zea";
                                                $pestdescriptionb = "Corn earworm moths are most active during evening and night. Adults are robust moths about 0.75 inches long with a wingspan of 1 to 1.5 inches. They can be olive green, tan, or dark reddish brown. Young caterpillar larvae are greenish with black heads and conspicuous black hairs on the body.";
                                                $pestcureOneb = "Till your soil fall and spring to expose the pupae to wind, weather, birds and other predators.";
                                                $pestcureTwob = "Use pheromone traps to determine the main flight period for moths. Moths mostly fly under cover of night and go unspotted.";
                                                $pestcureThreeb = "Employ beneficial insects, such as green lacewings, minute pirate bugs and damsel bugs. All will  feed on corn earworm eggs and small larvae.";

                                            }
                                        }
                                        else{
                                            $nameofpestb = "Common Cutworm";
                                            $scientificnameb = "Agrotis ipsilon";
                                            $pestdescriptionb = "Cutworms are moth larvae that hide under litter or soil during the day, coming out in the dark to feed on plants. A larva typically attacks the first part of the plant it encounters, namely the stem, often of a seedling, and consequently cuts it down; hence the name cutworm.";
                                            $pestcureOneb = "Plant sunflowers along the edge of your garden. Sunflowers are a favorite target of cutworms. The plants will attract the larvae giving you a chance to pick them from the ground before they head to your corn.";
                                            $pestcureTwob = "Place cardboard collars (or milk containers with the bottom cut out) around transplant stems at planting time. Be sure to work the collar into the soil at least an inch or two.";
                                            $pestcureThreeb = "A three-foot wide (or more) bare-soil strip between your lawn and your garden plants makes it harder for larvae to reach your plants. It also gives you more of a chance to spot them.";
                                        }
                                }
                                else{
                                    $nameofpestb = "Asiatic Corn Borer";
                                    $scientificnameb = "Ostrinia furnacalis";
                                    $pestdescriptionb = "The Asian corn borer goes through six instar stages while in the larval phase. The first-instar larva is pinkish with dark spots and a dark head. The late instar larva is yellow brown with dark spots and reaches up to 2.9 centimeters in length.";
                                    $pestcureOneb = "Shred and plow under cornstalks in or near fields where borers overwinter. This should be done in fall or early spring before the adults emerge.";
                                    $pestcureTwob = "Use pheromone traps to determine main flight period for moths, then release trichogramma wasps to destroy eggs.";
                                    $pestcureThreeb = "Treat silk frequently with  Garden Dust (Bt-kurstaki) or Monterey Garden Insect Spray (spinosad) to kill young larvae. Repeat applications every 4-5 days until tassels turn brown.";
                                }
                        }
                        else{
                            //echo ' => duplicate image 2';
                            $nameofpestb = "Black Armyworm";
                            $scientificnameb = "Spodoptera cosmioides";
                            $pestdescriptionb = "The African armyworm is a migratory moth, the larvae (caterpillars) of which are important pests of pastures and cereal crops, predominantly in Africa south of the Sahara, Yemen, and certain countries of the Pacific region. Normally, only small numbers of this pest occur, usually on pastures.";
                            $pestcureOneb = "Use pheromone traps to monitor the arrival of moths. When you first notice them — look for the distinctive white dot on their forewings";
                            $pestcureTwob = "Release trichogramma wasps to parasitize any newly laid eggs. These tiny beneficial insects — 1mm or less — insert their eggs inside of pest eggs, killing them before they enter the plant-eating larval stage.";
                            $pestcureThreeb = "Use fast-acting organic insecticides if pest levels become intolerable.";

                        }
                    
                    }
                    else{
                        //echo ' => duplicate image 1';
                        $nameofpestb = "Corn Aphids";
                        $scientificnameb = "Rhopalosiphum maidis";
                        $pestdescriptionb = "Corn leaf aphids, Rhopalosiphum maidis (Fitch), are small, 1.5 to 2.5 millimeters (1/16 to 3/32 inch), bluish-green insects with a purplish patch around the base of the prominent cornicles. They are usually wingless with short antennae.";
                        $pestcureOneb = "Pinch or prune off heavily infested leaves or other plant parts.";
                        $pestcureTwob = "Use the Bug Blaster to hose off plants with a strong stream of water and reduce pest numbers.";
                        $pestcureThreeb = "Do not over water or over fertilize – aphids like plants with high nitrogen levels and soft new growth. Use organic fertilizers which release nutrients slowly.";

                    }
                    
                    
               ?>

            <!-- END OF IMAGE COMPARE -->
   <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
        <div
        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <h5 class="text-xl font-medium leading-normal text-gray-800">Crop Analysis</h5>
            <button type="button"
                class=""
                data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
        </div>
        <div class="modal-body relative p-4">
            <div class="flex flex-col gap-5 justify-center items-center self-center">
                <?php
                    $imagelocmodal = "images/cropanalysis/";
                    $imagenamemodal = $_FILES["fileToUpload"]["name"];
                    $imageuploadedmodal = $imagelocmodal.$imagenamemodal;
                    
                ?>
                <img src="<?php echo $imageuploadedmodal; ?>" alt="Crop Image" style="width:150px;height:100px;">
                <p class="font-bold text-lg"><?php echo $nameofpest; ?></p>
                <p class="font-semibold"><?php echo $scientificname; ?></p>
                <p><?php echo $pestdescription; ?></p>
                <p class="font-semibold">Suggestions</p>
                <div class="flex flex-col justify-between gap-2">
                    <p><?php echo $pestcureOne; ?></p>
                    <hr>
                    <p><?php echo $pestcureTwo; ?></p>
                    <hr>
                    <p><?php echo $pestcureThree; ?></p>
                </div> 
            </div> 
        </div>
        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        </div>
    </div>
  </div>
  <!-- MODAL CAMERA -->
  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="galleryModalTwo" tabindex="-1" aria-labelledby="galleryModalTwo" aria-hidden="true">
    <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
        <div
        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <h5 class="text-xl font-medium leading-normal text-gray-800">Crop Analysis</h5>
            <button type="button"
                class=""
                data-bs-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button>
        </div>
        <div class="modal-body relative p-4">
            <div class="flex flex-col gap-5 justify-center items-center self-center">
                <?php
                    $imagelocmodalB = "images/cropanalysis/";
                    $imagenamemodalB = $_FILES["fileToUploadTwo"]["name"];
                    $imageuploadedmodalB = $imagelocmodal.$imagenamemodal;
                    
                ?>
                <img src="<?php echo $imageuploadedmodalB; ?>" alt="Crop Image" style="width:150px;height:100px;">
                <p class="font-bold text-lg"><?php echo $nameofpestB; ?></p>
                <p class="font-semibold"><?php echo $scientificnameB; ?></p>
                <p><?php echo $pestdescription; ?></p>
                <p class="font-semibold">Suggestions</p>
                <div class="flex flex-col justify-between gap-2">
                    <p><?php echo $pestcureOneB; ?></p>
                    <hr>
                    <p><?php echo $pestcureTwoB; ?></p>
                    <hr>
                    <p><?php echo $pestcureThreeB; ?></p>
                </div> 
            </div> 
        </div>
        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>

