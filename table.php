<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin: 0 auto;" id="myDiv">
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:5px;
        font-size:12px;
        }
    </style>
        <table style="width:100%">
            <!-- FIRST ROW -->
            <tr>
                <th colspan="2">
                    <div class="flex flex-col">
                        <div class="row_one_title flex gap-5 items-center">
                            <img src="images/Icons/doa.png" class="w-24 h-24" alt="">
                            <div class="row_one_text flex flex-col gap-2">
                                <div>
                                    <p class="text-2xl font-bold">ANI AT KITA</p>
                                    <p class="text-3xl">RSBSA ENROLLMENT FORM</p>
                                </div>
                                <p class="text-xs">REGISTRY SYSTEM FOR BASIC SECTORS IN AGRICULTURE (RSBSA)</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex gap-5">
                            <p>ENROLLMENT TYPE & DATE ADMINISTERED:</p>
                            <?php 
                                $for_enrollment=explode(",",$_POST['enrollmenttype']);
                            ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox1" value="new" <?php echo (in_array("new",$for_enrollment)) ? 'checked="checked"' : ''; ?> name="enrollmenttype[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">New </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" id="inlineCheckbox2" value="updating" <?php echo (in_array("updating",$for_enrollment)) ? 'checked="checked"' : ''; ?> name="enrollmenttype[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Updating</label>
                            </div>
                            <input type="text" name="dateadministered" id="" value="<?php echo $dateadminstered; ?>">
                        </div>
                        <div class="flex gap-5">
                            <p>Reference Number</p>
                            <input type="text" name="" id="" value="<?php echo $refnumber; ?>">
                        </div>
                    </div>
                </th>
                <th colspan="2">
                    <img src="images/user/userone.png" class="w-36 h-36" alt="" style="margin: 0 auto;">
                </th> 
            </tr>
            <!-- SECOND ROW -->
            <tr>
                <td colspan="4">PART I: PERSONAL INFORMATION</td>
            </tr>
            <!-- Personal First row -->
            <tr>
                <td colspan="4">
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $surname;?>" class="w-full">
                                <label for="">SURNAME</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $firstname; ?>" class="w-full">
                                <label for="">FIRST NAME</label>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $middlename; ?>" class="w-full">
                                <label for="">MIDDLE NAME</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $extentionname; ?>" class="w-full">
                                <label for="">EXTENSION NAME</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <div class="flex gap-5">
                                    <p>SEX:</p>
                                    <?php 
                                        $for_gender=explode(",",$_POST['gender']);
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="male" name="sex[]" <?php echo (in_array("male",$for_gender)) ? 'checked="checked"' : ''; ?>>
                                        <label class="form-check-label inline-block text-gray-800" >Male </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="female" name="sex[]" <?php echo (in_array("female",$for_gender)) ? 'checked="checked"' : ''; ?>>
                                        <label class="form-check-label inline-block text-gray-800" >Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- Personal second row -->
            <tr>
                <td colspan="4">
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <label for="">Address</label>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $purok; ?>" class="w-full">
                                <label for="">HOUSE/LOT/BLDG NO./PUROK</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $street; ?>" class="w-full">
                                <label for="">STREET/SITIO/SUBDV</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $barangay; ?>" class="w-full">
                                <label for="">BARANGAY</label>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <label for="" style="display:hidden;">Address</label>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $city; ?>" class="w-full">
                                <label for="">MUNICIPALITY/CITY</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $province; ?>" class="w-full">
                                <label for="">PROVINCE</label>
                            </div>
                            <div class="flex flex-col w-full">
                                <input type="text" name="" id="" value="<?php echo $region; ?>" class="w-full">
                                <label for="">REGION</label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- Personal 3rd row -->
            <tr>
                <td colspan="1">
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <div class="flex flex-col w-32">
                                <label for="">MOBILE NUMBER</label>
                                <input type="text" name="" id="" value="09176030862" class="w-32">
                            </div>
                            <div class="flex flex-col w-32">
                                <label for="">LANDLINE NUMBER</label>
                                <input type="text" name="" id="" value="0437848359" class="w-32">
                            </div>
                        </div>
                    </div>
                </td>
                <td colspan="3">              
                    <div class="flex flex-col w-full">
                        <p>HIGHEST FORMAL EDUCATION:</p>
                        <?php 
                            $for_education=explode(",",$_POST['education']);
                        ?>
                        <div class="flex gap-5">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col w-full">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="preschool" <?php echo (in_array("preschool",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Pre-school </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="juniorhighschool" <?php echo (in_array("juniorhighschool",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Junior High School (K-12)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="vocational" <?php echo (in_array("vocational",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Vocational</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="elementary" <?php echo (in_array("elementary",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Elementary </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="seniorhigschool" <?php echo (in_array("seniorhighschool",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Senior High School (K-12)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="postgrad" <?php echo (in_array("postgrad",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Post-graduate</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="highschool" <?php echo (in_array("highschool",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">High School (non- K-12) </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="college <?php echo (in_array("college",$for_education)) ? 'checked="checked"' : ''; ?>" name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">College</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="none" <?php echo (in_array("none",$for_education)) ? 'checked="checked"' : ''; ?> name="education[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">None</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <div class="flex flex-col w-1/4">
                                <label for="">DATE OF BIRTH</label>
                                <input type="text" name="" id="" value="02/08/1998" class="w-32">
                            </div>
                            <div class="flex flex-col w-3/4">
                                <label for="">PLACE OF BIRTH</label>
                                <input type="text" name="" id="" value="Santo Tomas" class="w-32">
                                <label for="">Municipality</label>
                                <div class="flex">
                                    <div class="flex flex-col">
                                        <input type="text" name="" id="" value="Batangas" class="w-32">
                                        <label for="">Province</label>
                                    </div>
                                    <div class="flex flex-col">
                                        <input type="text" name="" id="" value="PH" class="w-32">
                                        <label for="">Country</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td colspan="3">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_pwd=explode(",",$_POST['pwd']);
                        ?>
                            <p>PERSON WITH DISABILITY (PWD):</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_pwd)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_pwd)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                            
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_religion=explode(",",$_POST['religion']);
                        ?>
                            <p>RELIGION:</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="christianity" <?php echo (in_array("yes",$for_religion)) ? 'checked="checked"' : ''; ?> name="religion[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Christianity </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="islam" <?php echo (in_array("yes",$for_religion)) ? 'checked="checked"' : ''; ?> name="religion[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Islam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="others" <?php echo (in_array("others",$for_religion)) ? 'checked="checked"' : ''; ?> name="religion[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Others, specify</label>
                            </div>
                            <input type="text" name="" id="" value="<?php echo $religionother; ?>" class="w-32">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-1">
                            <p>CIVIL STATUS:</p>
                            <?php 
                                $for_civil=explode(",",$_POST['civil']);
                            ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="single" name="civil[]" <?php echo (in_array("single",$for_civil)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Single </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="married" name="civil[]" <?php echo (in_array("married",$for_civil)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Married</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="widowed" name="civil[]" <?php echo (in_array("widowed",$for_civil)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Widowed</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="seperated" name="civil[]" <?php echo (in_array("seperated",$for_civil)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Seperated</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <p>NAME OF SPOUSE</p>
                        <div class="flex gap-5">
                            <p>IF MARRIED:</p>
                            <input type="text" name="" id="" value="<?php echo $nameofspouse; ?>" class="w-32">
                        </div>
                    </div>
                </td>
                <td colspan="3">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>4P's Beneficiary?</p>
                            <?php 
                                $for_fourps=explode(",",$_POST['fourps']);
                            ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" name="fourps[] <?php echo (in_array("yes",$for_fourps)) ? 'checked="checked"' : ''; ?>">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" name="fourps[] <?php echo (in_array("no",$for_fourps)) ? 'checked="checked"' : ''; ?>">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>Member of an Indigeneous Group?</p>
                            <?php 
                                $for_indgenous=explode(",",$_POST['indgenous']);
                            ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" name="indigeneous[]" <?php echo (in_array("yes",$for_indgenous)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" name="indigeneous[]" <?php echo (in_array("no",$for_indgenous)) ? 'checked="checked"' : ''; ?>>
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>If yes, specify:</p>
                            <input type="text" name="" id="" value="<?php echo $indgenousspecify; ?>" class="w-44">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <p>MOTHER'S</p>
                        <div class="flex gap-5">
                            <p>MAIDEN NAME:</p>
                            <input type="text" name="" id="" value="<?php echo $maiden;?>" class="w-32">
                        </div>
                    </div>
                </td>
                <td colspan="3">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_gov=explode(",",$_POST['gov']);
                        ?>
                            <p>With Government ID?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_gov)) ? 'checked="checked"' : ''; ?> name="gov[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_gov)) ? 'checked="checked"' : ''; ?> name="gov[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>If yes, specify ID Type:</p>
                            <input type="text" name="" id="" value="<?php echo $idtype; ?>" class="w-44">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>ID Number:</p>
                            <input type="text" name="" id="" value="<?php echo $idno; ?>" class="w-44">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_householdhead=explode(",",$_POST['householdhead']);
                        ?>
                            <p>HOUSEHOLD HEAD</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_householdhead)) ? 'checked="checked"' : ''; ?> name="householdhead[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_householdhead)) ? 'checked="checked"' : ''; ?> name="householdhead[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>If no, name of household head: </p>
                            <input type="text" name="" id="" value="<?php echo $householdname; ?>" class="w-44">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>Relationship</p>
                            <input type="text" name="" id="" value="<?php echo $householdrel; ?>" class="w-44">
                        </div>
                        <div class="flex gap-5">
                            <p>No. of living household members:</p>
                            <input type="text" name="" id="" value="<?php echo $noOfmembers; ?>" class="w-44">
                        </div>
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="flex gap-5">
                            <p>No. of male:</p>
                            <input type="text" name="" id="" value="<?php echo $nomale; ?>" class="w-44">
                        </div>
                        <div class="flex gap-5">
                            <p>No. of female:</p>
                            <input type="text" name="" id="" value="<?php echo $nofemale; ?>" class="w-44">
                        </div>
                    </div>
                </td>
                <td colspan="3">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_memberoffarm=explode(",",$_POST['memberoffarm']);
                        ?>
                            <p>Member of any Farmer Association/Cooperative?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_memberoffarm)) ? 'checked="checked"' : ''; ?> name="farmerassoc[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_memberoffarm)) ? 'checked="checked"' : ''; ?> name="farmerassoc[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>If yes, specify</p>
                            <input type="text" name="" id="" value="<?php echo $memberoffarmspecify; ?>" class="w-44">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>PERSON TO NOTIFY IN CASE OF EMERGENCY: </p>
                            <input type="text" name="" id="" value="<?php echo $emergencyname; ?>" class="w-44">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                            <p>CONTACT NUMBER: </p>
                            <input type="text" name="" id="" value="<?php echo $emergencyno; ?>" class="w-44">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">Farm profile</th>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="flex flex-col w-full">
                        <div class="flex gap-5">
                        <?php 
                            $for_mainlivelihood = $_POST['mainlivelihood'];
                        ?>
                            <p>MAIN LIVELIHOOD</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="Farmer" <?php echo (in_array("Farmer",$for_mainlivelihood)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">FARMER </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="Farmworker "<?php echo (in_array("Farmworker",$for_mainlivelihood)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">FARMWORKER/LABORER</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="Fisherfolk" <?php echo (in_array("Fisherfolk",$for_mainlivelihood)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">FISHERFOLK</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="Agriyouth" <?php echo (in_array("Agriyouth",$for_mainlivelihood)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">AGRI YOUTH</label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                    <?php 
                         $for_farmingactivity = $_POST['farmingactivity'];
                    ?>
                        <p>For farmers</p>
                        <p>Type of Farming Activity</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox1" value="Rice" <?php echo (in_array("Rice",$for_farmingactivity)) ? 'checked="checked"' : ''; ?> name="farmingactivity[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Rice </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Corn" <?php echo (in_array("Corn",$for_farmingactivity)) ? 'checked="checked"' : ''; ?> name="farmingactivity[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Corn</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Others" <?php echo (in_array("Others",$for_farmingactivity)) ? 'checked="checked"' : ''; ?> name="farmingactivity[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Other Crops,</label>
                        </div>
                        <div class="flex gap-5">
                            <p>please specify:</p>
                            <input type="text" name="" id="" value="<?php echo $farmingactivityothers; ?>" class="">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Livestock" <?php echo (in_array("Livestock",$for_farmingactivity)) ? 'checked="checked"' : ''; ?> name="farmingactivity[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Livestock,</label>
                        </div>
                        <div class="flex gap-5">
                            <p>please specify:</p>
                            <input type="text" name="" id="" value="<?php echo $farmingactivitylivestock; ?>" class="">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Poultry" <?php echo (in_array("Poultry",$for_farmingactivity)) ? 'checked="checked"' : ''; ?> name="farmingactivity[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Poultry,</label>
                        </div>
                        <div class="flex gap-5">
                            <p>please specify:</p>
                            <input type="text" name="" id="" value="<?php echo $farmingacitivitypoultry; ?>" class="">
                        </div>
                    </div>
                    
                </td>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <?php 
                            $for_kindofwork= $_POST['kindofwork'];
                        ?>
                        <p>For farmworkers:</p>
                        <p>Kind of Work</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox1" value="Land Preparation" <?php echo (in_array("Land Preparation",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Land Preparation </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Planting/Transplanting" <?php echo (in_array("Planting/Transplanting",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Planting/Transplanting</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox1" value="Cultivation" <?php echo (in_array("Cultivation",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Cultivation</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Harvesting" <?php echo (in_array("Harvesting",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Harvesting</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Other" <?php echo (in_array("Others",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="mainlivelihood[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Other,</label>
                        </div>
                        <div class="flex gap-5">
                            <p>please specify:</p>
                            <input type="text" name="" id="" value="<?php echo $kinfofworkothers; ?>" class="">
                        </div>
                    </div>
                </td>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <?php 
                            $for_typeoffishing= $_POST['typeoffishing'];
                        ?>
                        <p>For fisherfolk:</p>
                        <p class="text-xs">The Lending Conduit shall coordinate with the Bureu of Fisheries and Aquatic Resouces (BFAR) in the issuance of a certification that the fisherfolk-borrower under PUNLA/PLEA is registered under the Municipal Registration (FishR)</p>
                        <p>Type of Fishing Activity</p>
                        <div class="flex">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="Fish Capture <?php echo (in_array("FishCapture",$for_typeoffishing)) ? 'checked="checked"' : ''; ?>" name="typeoffishing[]">
                                <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Fish Capture</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="Fish Processing" <?php echo (in_array("FishProcessing",$for_typeoffishing)) ? 'checked="checked"' : ''; ?> name="typeoffishing[]">
                                <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Fish Processing</label>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="Aquaculture" <?php echo (in_array("Aquaculture",$for_typeoffishing)) ? 'checked="checked"' : ''; ?> name="typeoffishing[]">
                                <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Aquaculture</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="Fish Vending" <?php echo (in_array("FishVending",$for_typeoffishing)) ? 'checked="checked"' : ''; ?> name="typeoffishing[]">
                                <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Fish Vending</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Gleaning" <?php echo (in_array("Gleaning",$for_typeoffishing)) ? 'checked="checked"' : ''; ?> name="typeoffishing[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Gleaning</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="Others" <?php echo (in_array("Others",$for_typeoffishing)) ? 'checked="checked"' : ''; ?> name="typeoffishing[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Others, please specify:</label>
                        </div>
                        <input type="text" name="" id="" value="<?php echo $typeoffishingothers; ?>" class="">
                    </div>
                </td>
                <td colspan="1">
                    <div class="flex flex-col w-full">
                        <?php 
                            $for_typeofinvolvement=$_POST['typeofinvolvement'];
                        ?>
                        <p>For agri youth:</p>
                        <p class="text-xs">For the purposes of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>
                        <p>Type of involment</p> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox1" value="partoffarminghousehold" <?php echo (in_array("partoffarminghousehold",$for_typeofinvolvement)) ? 'checked="checked"' : ''; ?> name="typeofinvolment[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Part of a farming household</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="attendingformal" <?php echo (in_array("attendingformal",$for_typeofinvolvement)) ? 'checked="checked"' : ''; ?> name="typeofinvolment[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Attending/attended formal agri-fishery related course</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox1" value="attendingnonformal" <?php echo (in_array("attendingnonformal",$for_typeofinvolvement)) ? 'checked="checked"' : ''; ?> name="typeofinvolment[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox1">Attending/attended non-formal agri-fishery related course</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="participated" <?php echo (in_array("participated",$for_typeofinvolvement)) ? 'checked="checked"' : ''; ?> name="typeofinvolment[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Participated in any agricultural activity/program</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                type="checkbox" id="inlineCheckbox2" value="others" <?php echo (in_array("others",$for_typeofinvolvement)) ? 'checked="checked"' : ''; ?> name="typeofinvolment[]">
                            <label class="form-check-label inline-block text-gray-800 text-sm" for="inlineCheckbox2">Others,</label>
                        </div>
                        <div class="flex gap-5">
                            <p>please specify:</p>
                            <input type="text" name="" id="" value="<?php echo $typeofinvolvementothers?>" class="">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="flex">
                        <p>Gross Annual Income Last Year:</p>
                        <div class="flex gap-5">
                            <p>Farming:</p>
                            <input type="text" name="" id="" value="<?php echo $grossfarming; ?>" class="">
                        </div>
                        <div class="flex gap-5">
                            <p>Non-farming</p>
                            <input type="text" name="" id="" value="<?php echo $grossnonfarming; ?>" class="">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div class="flex flex-col">
                        <p>Registry System for Basic Sectors in Agriculture (RSBSA)</p>
                        <p>ENROLLMENT CLIENT'S COPY</p>
                        <div class="flex">
                            <label for="">Reference Number:</label>
                            <input type="number" name="" id="" value="<?php echo $refnumber; ?>">
                        </div>
                        <div class="flex">
                            <div class="flex flex-col">
                                <input type="text" name="" id="" value="<?php echo $surname; ?>">
                                <label for="">SURNAME</label>
                            </div>
                            <div class="flex flex-col">
                                <input type="text" name="" id="" value="<?php echo $firstname; ?>">
                                <label for="">FIRST NAME</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col">
                            <input type="text" name="" id="" value="<?php echo $middlename; ?>">
                            <label for="">MIDDLE NAME</label>
                        </div>
                        <div class="flex flex-col">
                            <input type="text" name="" id="" value="<?php echo $extentionname; ?>">
                            <label for="">EXTENSION NAME</label>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <table style="width:100%">
            <tr>
                <th colspan="10">
                    <div class="flex">
                        <p>No. of Farm Parcels:</p>
                        <input type="number" name="" id="" value="<?php echo $nooffarmparcels; ?>">
                        Name of Farmer/s in Rotation
                        <div class="flex">
                            <p>(P1)</p>
                            <input type="text" name="" id="" value="<?php echo $p1; ?>">
                        </div>
                        <div class="flex">
                            <p>(P2)</p>
                            <input type="text" name="" id="" value="<?php echo $p2; ?>">
                        </div>
                        <div class="flex">
                            <p>(P3)</p>
                            <input type="text" name="" id="" value="<?php echo $p3; ?>">
                        </div>
                      
                    </div>
                </th> 
            </tr>
            <tr>
                <td colspan="1">
                    <p>FARM<BR>PARCEL<BR>NO.</p>
                </td>
                <td colspan="3">
                    <p>FARM LAND DESCRIPTION</p>
                </td>
                <td colspan="1">
                    <p>CROP/COMMODITY</p>
                    <p class="text-xs">(Rice/Corn/HVC/Livestock/Poultry/Agri-fishery)</p>
                    <p>For Livestock & Poultry</p>
                    <p class="text-xs">(specify type of animal)</p>
                </td>
                <td colspan="1">
                    <p>SIZE(ha)</p>
                </td>
                <td colspan="1">
                    <p>NO. OF HEAD</p>
                    <p>(For Livestock<br>and Poultry)</p>
                </td>
                <td colspan="1">
                    <p>FARM TYPE</p>
                </td>
                <td colspan="1">
                    <p>Organic<br>Practioner<br>Y/N</p>
                </td>
                <td colspan="1">
                    <p>Remarks</p>
                </td>
            </tr>
            <!-- PARCEL NUMBER 1 -->
            <tr>
                <td colspan="1" rowspan="5">
                    <p style="text-align:center">1</p>
                </td>
                <td colspan="3" rowspan="5">
                    <div class="flex-col">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <p>Farm Location:</p>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmbarangay1; ?>">
                                    <label for="">BARANGAY</label>
                                </div>
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmcity1; ?>">
                                    <label for="">CITY/MUNICIPALITY</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <label for="">Total Farm Area (In hectares):</label>
                                <input type="number" name="" id="" value="<?php echo $farmarea1; ?>" style="width:40px;">
                                <label for="">ha</label>
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_ancestral1=explode(",",$_POST['ancestral1']);
                            ?>
                                <p>Within Ancestral Domain:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_ancestral1)) ? 'checked="checked"' : ''; ?> name="ancestral1[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_ancestral1)) ? 'checked="checked"' : ''; ?> name="ancestral1[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <p>Ownership Document No*:</p>
                                <input type="number" name="" id="" value="<?php echo $idno1; ?>" style="width:40px;">
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_agrarlan1=explode(",",$_POST['agrarlan1']);
                            ?>
                                <p>Agrarian Reform Beneficiary:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_agrarlan1)) ? 'checked="checked"' : ''; ?> name="agrarlan1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_agrarlan1)) ? 'checked="checked"' : ''; ?> name="agrarlan1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col">
                        <?php 
                            $for_ownershiptype=explode(",",$_POST['ownershiptype1']);
                        ?>
                            <p>Ownership Type:</p>
                            <div class="flex">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="owner" <?php echo (in_array("owner",$for_ownershiptype)) ? 'checked="checked"' : ''; ?> name="ownershiptype1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Registered Ownder</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="others" <?php echo (in_array("others",$for_ownershiptype)) ? 'checked="checked"' : ''; ?> name="ownershiptype1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Others</label>
                                </div>
                                <input type="text" name="" id="" value="<?php echo $ownershiptypename1; ?>">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="tenant" <?php echo (in_array("tenant",$for_ownershiptype)) ? 'checked="checked"' : ''; ?> name="ownershiptype1[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Tenant (Name of Land Owner)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="lessee" <?php echo (in_array("lessee",$for_ownershiptype)) ? 'checked="checked"' : ''; ?> name="ownershiptype1[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Lessee (Name of Land Owner)</label>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <?php echo $cropa1; ?>
                </td>
                <td>
                    <?php echo $sizea1; ?>
                </td>
                <td>
                    <?php echo $noofheada1; ?>
                </td>
                <td>
                    <?php echo $farmtypea1; ?>
                </td>
                <td>
                    <?php echo $organicpractionera1; ?>
                </td>
                <td>
                    <?php echo $remarksa1; ?>
                </td>

            </tr>
            <tr>
                <td>
                    <?php echo $cropa2; ?>
                </td>
                <td>
                    <?php echo $sizea2; ?>
                </td>
                <td>
                    <?php echo $noofheada2; ?>
                </td>
                <td>
                    <?php echo $farmtypea2; ?>
                </td>
                <td>
                    <?php echo $organicpractionera2; ?>
                </td>
                <td>
                    <?php echo $remarksa2; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropa3; ?>
                </td>
                <td>
                    <?php echo $sizea3; ?>
                </td>
                <td>
                    <?php echo $noofheada3; ?>
                </td>
                <td>
                    <?php echo $farmtypea3; ?>
                </td>
                <td>
                    <?php echo $organicpractionera3; ?>
                </td>
                <td>
                    <?php echo $remarksa3; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropa4; ?>
                </td>
                <td>
                    <?php echo $sizea4; ?>
                </td>
                <td>
                    <?php echo $noofheada4; ?>
                </td>
                <td>
                    <?php echo $farmtypea4; ?>
                </td>
                <td>
                    <?php echo $organicpractionera4; ?>
                </td>
                <td>
                    <?php echo $remarksa4; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropa5; ?>
                </td>
                <td>
                    <?php echo $sizea5; ?>
                </td>
                <td>
                    <?php echo $noofheada5; ?>
                </td>
                <td>
                    <?php echo $farmtypea5; ?>
                </td>
                <td>
                    <?php echo $organicpractionera5; ?>
                </td>
                <td>
                    <?php echo $remarksa5; ?>
                </td>
                
            </tr>
            <!-- NUMBER 2 -->
            <tr>
                <td colspan="1" rowspan="5">
                    <p style="text-align:center">2</p>
                </td>
                <td colspan="3" rowspan="5">
                    <div class="flex-col">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <p>Farm Location:</p>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmbarangay2; ?>">
                                    <label for="">BARANGAY</label>
                                </div>
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmcity2; ?>">
                                    <label for="">CITY/MUNICIPALITY</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <label for="">Total Farm Area (In hectares):</label>
                                <input type="number" name="<?php echo $farmarea2?>" id="" value="5" style="width:40px;">
                                <label for="">ha</label>
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_ancestral2=explode(",",$_POST['ancestral2']);
                            ?>
                                <p>Within Ancestral Domain:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_ancestral2)) ? 'checked="checked"' : ''; ?> name="ancestral2[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_ancestral2)) ? 'checked="checked"' : ''; ?> name="ancestral2[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <p>Ownership Document No*:</p>
                                <input type="number" name="" id="" value="<?php echo $idno2; ?>" style="width:40px;">
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_agrarlan2=explode(",",$_POST['agrarlan2']);
                            ?>
                                <p>Agrarian Reform Beneficiary:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_agrarlan2)) ? 'checked="checked"' : ''; ?> name="agrarlan1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_agrarlan2)) ? 'checked="checked"' : ''; ?> name="agrarlan1[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col">
                        <?php 
                            $for_ownershiptype2=explode(",",$_POST['ownershiptype2']);
                        ?>
                            <p>Ownership Type:</p>
                            <div class="flex">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="owner <?php echo (in_array("owner",$for_ownershiptype2)) ? 'checked="checked"' : ''; ?>" name="ownershiptype2[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Registered Owner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="others" <?php echo (in_array("others",$for_ownershiptype2)) ? 'checked="checked"' : ''; ?> name="ownershiptype2[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Others</label>
                                </div>
                                <input type="text" name="" id="" value="<?php echo $ownershiptypename2; ?>">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="tenant" <?php echo (in_array("tenant",$for_ownershiptype2)) ? 'checked="checked"' : ''; ?> name="ownershiptype2[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Tenant (Name of Land Owner)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="lessee" <?php echo (in_array("lessee",$for_ownershiptype2)) ? 'checked="checked"' : ''; ?> name="ownershiptype2[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Lessee (Name of Land Owner)</label>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <?php echo $cropb1; ?>
                </td>
                <td>
                    <?php echo $sizeb1; ?>
                </td>
                <td>
                    <?php echo $noofheadb1; ?>
                </td>
                <td>
                    <?php echo $farmtypeb1; ?>
                </td>
                <td>
                    <?php echo $organicpractionerb1; ?>
                </td>
                <td>
                    <?php echo $remarksb1; ?>
                </td>

            </tr>
            <tr>
                <td>
                    <?php echo $cropb2; ?>
                </td>
                <td>
                    <?php echo $sizeb2; ?>
                </td>
                <td>
                    <?php echo $noofheadb2; ?>
                </td>
                <td>
                    <?php echo $farmtypeb2; ?>
                </td>
                <td>
                    <?php echo $organicpractionerb2; ?>
                </td>
                <td>
                    <?php echo $remarksb2; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropb3; ?>
                </td>
                <td>
                    <?php echo $sizeb3; ?>
                </td>
                <td>
                    <?php echo $noofheadb3; ?>
                </td>
                <td>
                    <?php echo $farmtypeb3; ?>
                </td>
                <td>
                    <?php echo $organicpractionerb3; ?>
                </td>
                <td>
                    <?php echo $remarksb3; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropb4; ?>
                </td>
                <td>
                    <?php echo $sizeb4; ?>
                </td>
                <td>
                    <?php echo $noofheadb4; ?>
                </td>
                <td>
                    <?php echo $farmtypeb4; ?>
                </td>
                <td>
                    <?php echo $organicpractionerb4; ?>
                </td>
                <td>
                    <?php echo $remarksb4; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropb5; ?>
                </td>
                <td>
                    <?php echo $sizeb5; ?>
                </td>
                <td>
                    <?php echo $noofheadb5; ?>
                </td>
                <td>
                    <?php echo $farmtypeb5; ?>
                </td>
                <td>
                    <?php echo $organicpractionerb5; ?>
                </td>
                <td>
                    <?php echo $remarksb5; ?>
                </td>
                
            </tr>
            <!-- NUMBER 3 -->
            <tr>
                <td colspan="1" rowspan="5">
                    <p style="text-align:center">3</p>
                </td>
                <td colspan="3" rowspan="5">
                    <div class="flex-col">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <p>Farm Location:</p>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmbarangay3; ?>">
                                    <label for="">BARANGAY</label>
                                </div>
                                <div class="flex flex-col">
                                    <input type="text" name="" id="" value="<?php echo $farmcity3; ?>">
                                    <label for="">CITY/MUNICIPALITY</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <label for="">Total Farm Area (In hectares):</label>
                                <input type="number" name="" id="" value="<?php echo $farmarea3; ?>" style="width:40px;">
                                <label for="">ha</label>
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_ancestral3=explode(",",$_POST['ancestral3']);
                            ?>
                                <p>Within Ancestral Domain:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_ancestral3)) ? 'checked="checked"' : ''; ?> name="ancestral3[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                            type="checkbox" id="inlineCheckbox2" value="no <?php echo (in_array("no",$for_ancestral3)) ? 'checked="checked"' : ''; ?>" name="ancestral3[]">
                                        <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex">
                                <p>Ownership Document No*:</p>
                                <input type="number" name="" id="" value="<?php echo $idno3; ?>" style="width:40px;">
                            </div>
                            <div class="flex-col">
                            <?php 
                                $for_agrarlan3=explode(",",$_POST['agrarlan3']);
                            ?>
                                <p>Agrarian Reform Beneficiary:</p>
                                <div class="flex">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="yes" <?php echo (in_array("yes",$for_agrarlan3)) ? 'checked="checked"' : ''; ?> name="agrarlan3[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="no" <?php echo (in_array("no",$for_agrarlan3)) ? 'checked="checked"' : ''; ?> name="agrarlan3[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">No</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col">
                        <?php 
                            $for_ownershiptype3=explode(",",$_POST['ownershiptype3']);
                        ?>
                            <p>Ownership Type:</p>
                            <div class="flex">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox1" value="owner" <?php echo (in_array("owner",$for_ownershiptype3)) ? 'checked="checked"' : ''; ?> name="ownershiptype3[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Registered Owner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                        type="checkbox" id="inlineCheckbox2" value="others" <?php echo (in_array("others",$for_ownershiptype3)) ? 'checked="checked"' : ''; ?> name="ownershiptype3[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Others</label>
                                </div>
                                <input type="text" name="" id="" value="Test">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox1" value="tenant" <?php echo (in_array("tenant",$for_ownershiptype3)) ? 'checked="checked"' : ''; ?> name="ownershiptype3[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Tenant (Name of Land Owner)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                    type="checkbox" id="inlineCheckbox2" value="lessee" <?php echo (in_array("lessee",$for_ownershiptype3)) ? 'checked="checked"' : ''; ?> name="ownershiptype3[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Lessee (Name of Land Owner)</label>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <?php echo $cropc1; ?>
                </td>
                <td>
                    <?php echo $sizec1; ?>
                </td>
                <td>
                    <?php echo $noofheadc1; ?>
                </td>
                <td>
                    <?php echo $farmtypec1; ?>
                </td>
                <td>
                    <?php echo $organicpractionerc1; ?>
                </td>
                <td>
                    <?php echo $remarksc1; ?>
                </td>

            </tr>
            <tr>
                <td>
                    <?php echo $cropc2; ?>
                </td>
                <td>
                    <?php echo $sizec2; ?>
                </td>
                <td>
                    <?php echo $noofheadc2; ?>
                </td>
                <td>
                    <?php echo $farmtypec2; ?>
                </td>
                <td>
                    <?php echo $organicpractionerc2; ?>
                </td>
                <td>
                    <?php echo $remarksc2; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropc3; ?>
                </td>
                <td>
                    <?php echo $sizec3; ?>
                </td>
                <td>
                    <?php echo $noofheadc3; ?>
                </td>
                <td>
                    <?php echo $farmtypec3; ?>
                </td>
                <td>
                    <?php echo $organicpractionerc3; ?>
                </td>
                <td>
                    <?php echo $remarksc3; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropc4; ?>
                </td>
                <td>
                    <?php echo $sizec4; ?>
                </td>
                <td>
                    <?php echo $noofheadc4; ?>
                </td>
                <td>
                    <?php echo $farmtypec4; ?>
                </td>
                <td>
                    <?php echo $organicpractionerc4; ?>
                </td>
                <td>
                    <?php echo $remarksc4; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $cropc5; ?>
                </td>
                <td>
                    <?php echo $sizec5; ?>
                </td>
                <td>
                    <?php echo $noofheadc5; ?>
                </td>
                <td>
                    <?php echo $farmtypec5; ?>
                </td>
                <td>
                    <?php echo $organicpractionerc5; ?>
                </td>
                <td>
                    <?php echo $remarksc5; ?>
                </td>
                
            </tr>
        </table>

    </div>
</body>
</html>