<form action="" method="POST"  enctype="multipart/form-data">
            <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabFill" role="tablist">
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step1Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    active
                    " id="tabs-step1-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step1Fill" role="tab"
                    aria-controls="tabs-step1Fill" aria-selected="true">Step 1</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step2Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    tab2
                    " id="tabs-step2-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step2Fill" role="tab"
                    aria-controls="tabs-step2Fill" aria-selected="false">Step 2</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step3Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    " id="tabs-step3-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step3Fill" role="tab"
                    aria-controls="tabs-step3Fill" aria-selected="false">Step 3</a>
                </li>
                <li class="nav-item flex-auto text-center" role="presentation">
                    <a href="#tabs-step4Fill" class="
                    nav-link
                    w-full
                    block
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    border-x-0 border-t-0 border-b-2 border-transparent
                    px-6
                    py-3
                    my-2
                    hover:border-transparent hover:bg-gray-100
                    focus:border-transparent
                    " id="tabs-step4-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step4Fill" role="tab"
                    aria-controls="tabs-step4Fill" aria-selected="false">Step 4</a>
                </li>
            </ul>
            <div class="tab-content p-10" id="tabs-tabContentFill">
                <div class="tab-pane fade show active" id="tabs-step1Fill" role="tabpanel" aria-labelledby="tastep1-tabFill">
                <?php
                    if(!empty($errors)){
                        ?>
                        <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                            <strong class="mr-1"><?php echo $error_message; ?></strong>
                            <button type="button" class=""  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                        <?php
                    }
                    if(!empty($success)){
                        ?>
                        <div class="alert bg-blue-100 rounded-lg py-5 px-6 mb-3 text-base text-blue-700 inline-flex items-center w-full alert-dismissible fade show justify-between" role="alert">
                            <strong class="mr-1"><?php echo $success_message; ?></strong>
                            <button type="button"  data-bs-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                        <?php
                    }
                ?>
                    <div class="personal_info flex flex-col gap-1">
                        <h3 class="text-xl font-bold">RSBSA ENROLLMENT FORM</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Enrollment Type</label>
                                <!--select name="enrollmenttype" class="form-input" id="" value="">
                                    <option value="new">New</option>
                                    <option value="updating">Updating</option>
                                </select-->
                                <?php 
                                     $for_enrollment=explode(",",$enrollmenttype);
                                ?>
                                <select name="enrollmenttype" class="form-input" id="">
                                    <option value="new"  <?php echo (in_array("new",$for_enrollment)) ? 'selected="selected"' : ''; ?>>New</option>
                                    <option value="updating"  <?php echo (in_array("updating",$for_enrollment)) ? 'selected="selected"' : ''; ?>>Updating</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Date Administered</label>
                                <input type="date" class="form-input w-full" name="dateadminstered" value="<?php echo $dateadminstered; ?>">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2" style="display:none;">
                                <label for="">Farmer ID</label>
                                <input type="text" class="form-input w-full" name="farmerId" value="<?php echo $farmerId; ?>" readonly>
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Reference Number</label>
                                <input type="number" class="form-input w-full" value="<?php echo $dateadminstered; ?>"name="refnumber" placeholder="Enter Reference Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">2x2 Picture - Photo Taken within 6 months</label>
                                <input type="file" class="form-input w-full" name="uploadFile2x2" id="uploadFile2x2">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-20 h-20 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreview2x2"></div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Name</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Surname</label>
                                <input type="text" class="form-input w-full" value="<?php echo $surname; ?>"name="surname" placeholder="Surname">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">First Name</label>
                                <input type="text" class="form-input w-full" value="<?php echo $firstname; ?>" name="firstname" placeholder="First name">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-input w-full" value="<?php echo $middlename; ?>" name="middlename" placeholder="Middle name">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Extention Name</label>
                                <input type="text" class="form-input w-full" value="<?php echo $extentionname; ?>" name="extentionname" placeholder="Extention name">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Contact Info</h3>
                        <div class="flex w-full flex-col md:flex-row">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Mobile Number</label>
                                <input type="number" class="form-input w-full" name="number" placeholder="Applicant mobile number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Landline Number</label>
                                <input type="number" class="form-input w-full" name="telephone" placeholder="Applicant landline number">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Address</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">House/Lot/Bldg.No/Purok</label>
                                <input type="text" class="form-input w-full" value="<?php echo $purok; ?>" name="purok" placeholder="House/Lot/Bldg.No/Purok">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Street/Sitio/Subdv.</label>
                                <input type="text" class="form-input w-full" value="<?php echo $street; ?>" name="street" placeholder="Street/Sitio/Subdv.">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" value="<?php echo $barangay; ?>" name="barangay" placeholder="Barangay">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Municipality/City</label>
                                <input type="text" class="form-input w-full" value="<?php echo $city; ?>" name="city" placeholder="Municipality/City">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Province</label>
                                <input type="text" class="form-input w-full" value="<?php echo $province; ?>" name="province" placeholder="Province">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Region</label>
                                <input type="text" class="form-input w-full" value="<?php echo $region; ?>" name="region" placeholder="Region">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Applicant Date of Birth and Place of Birth</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-input w-full" value="<?php echo $bday; ?>" name="bday">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Municipality</label>
                                <input type="text" class="form-input w-full" value="<?php echo $birthmunicipality; ?>" name="birthmunicipality" placeholder="Municipality">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Province</label>
                                <input type="text" class="form-input w-full" value="<?php echo $birthprovince; ?>" name="birthprovince" placeholder="Province">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Country</label>
                                <input type="text" class="form-input w-full" value="<?php echo $birthcountry; ?>" name="birthcountry" placeholder="Country">
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Other Information</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Gender</label>
                                <div class="flex">
                                    <?php 
                                        $for_gender=explode(",",$gender);
                                    ?>
                                    <select name="gender" class="form-input" id="">
                                        <option value="male"  <?php echo (in_array("male",$for_gender)) ? 'selected="selected"' : ''; ?>>Male</option>
                                        <option value="female"  <?php echo (in_array("female",$for_gender)) ? 'selected="selected"' : ''; ?>>Female</option>
                                </select>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Religion</label>
                                    <?php 
                                        $for_religion=explode(",",$religion);
                                    ?>
                                <select name="religion" class="form-input" id="" onchange="showReligion(this)">
                                    <option value="christianity"  <?php echo (in_array("christianity",$for_religion)) ? 'selected="selected"' : ''; ?>>Christianity</option>
                                    <option value="islam"  <?php echo (in_array("islam",$for_religion)) ? 'selected="selected"' : ''; ?>>Islam</option>
                                    <option value="others"  <?php echo (in_array("others",$for_religion)) ? 'selected="selected"' : ''; ?>>Others</option>
                                </select>
                            </div>
                            <div id="hidden_religion" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Other Religion</label>
                                    <input type="text" class="form-input w-full" name="religionother" value="<?php echo $religionother; ?>" placeholder="Other Religion">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Civil Status</label>
                                    <?php 
                                        $for_civil=explode(",",$civil);
                                    ?>
                                <select name="civil" class="form-input" id="" onchange="showCivil(this)">
                                    <option value="single" <?php echo (in_array("single",$for_civil)) ? 'selected="selected"' : ''; ?>>Single</option>
                                    <option value="married" <?php echo (in_array("married",$for_civil)) ? 'selected="selected"' : ''; ?>>Married</option>
                                    <option value="widowed" <?php echo (in_array("widowed",$for_civil)) ? 'selected="selected"' : ''; ?>>Widowed</option>
                                    <option value="seperated" <?php echo (in_array("seperated",$for_civil)) ? 'selected="selected"' : ''; ?>>Seperated</option>
                                </select>
                            </div>
                            <div  id="hidden_spouse" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 ">
                                    <label for="">Name of Spouse</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $nameofspouse; ?>"name="nameofspouse" placeholder="Spouse name">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 ">
                                <label for="">Mothers Maiden name</label>
                                <input type="text" class="form-input w-full" value="<?php echo $maiden; ?>" name="maiden" placeholder="Mothers Maiden name">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Highest Formal Education</label>
                                    <?php 
                                        $for_education=explode(",",$education);
                                    ?>
                                <select name="education" class="form-input" id="">
                                    <option value="preschool" <?php echo (in_array("preschool",$for_education)) ? 'selected="selected"' : ''; ?>>Pre-School</option>
                                    <option value="elementary" <?php echo (in_array("elementary",$for_education)) ? 'selected="selected"' : ''; ?>>Elementary</option>
                                    <option value="highschool" <?php echo (in_array("highschool",$for_education)) ? 'selected="selected"' : ''; ?>>High School (non- K-12)</option>
                                    <option value="juniorhighschool" <?php echo (in_array("juniorhighschool",$for_education)) ? 'selected="selected"' : ''; ?>>Junior High School (K-12)</option>
                                    <option value="seniorhighschool" <?php echo (in_array("seniorhighschool",$for_education)) ? 'selected="selected"' : ''; ?>>Senior High School (K-12)</option>
                                    <option value="college" <?php echo (in_array("college",$for_education)) ? 'selected="selected"' : ''; ?>>College</option>
                                    <option value="vocational" <?php echo (in_array("vocational",$for_education)) ? 'selected="selected"' : ''; ?>>Vocational</option>
                                    <option value="postgrad" <?php echo (in_array("postgrad",$for_education)) ? 'selected="selected"' : ''; ?>>Post-graduate</option>
                                    <option value="none" <?php echo (in_array("none",$for_education)) ? 'selected="selected"' : ''; ?>>None</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Person with Disability (PWD)</label>
                                    <?php 
                                        $for_pwd=explode(",",$pwd);
                                    ?>
                                <select name="pwd" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_pwd)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_pwd)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">4P's Beneficiary</label>
                                    <?php 
                                        $for_fourps=explode(",",$fourps);
                                    ?>
                                <select name="fourps" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_fourps)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_fourps)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Member of an Indigenous Group</label>
                                    <?php 
                                        $for_indgenous=explode(",",$indgenous);
                                    ?>
                                <select name="indgenous" class="form-input" id=""  onchange="hideGroup(this)">
                                    <option value="yes" <?php echo (in_array("yes",$for_indgenous)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_indgenous)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div  id="hidden_group"  class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 ">
                                    <label for="">If yes, specify</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $indgenousspecify; ?>" name="indgenousspecify" placeholder="Specify indigenous group">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Government ID?</label>
                                    <?php 
                                        $for_gov=explode(",",$gov);
                                    ?>
                                <select name="gov" class="form-input" id="" onchange="hideGoverment(this)">
                                    <option value="yes" <?php echo (in_array("yes",$for_gov)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_gov)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div  id="hidden_government" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If yes, specify ID Type</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $idtype;?>" name="idtype" placeholder="Enter ID Type">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">ID Number</label>
                                <input type="text" class="form-input w-full" value="<?php echo $idno; ?>" name="idno" placeholder="ID Number">
                            </div>
                        </div>
                        <div class="flex justify-end pt-5">
                            <!--span onclick="myFunctionOneprev()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">PREVIOUS</span-->
                            <span onclick="myFunctionOne()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">NEXT</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-step2Fill" role="tabpanel" aria-labelledby="tabs-step2-tabFill">
                    <h3 class="text-xl font-bold">Other Information</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Household head?</label>
                                    <?php 
                                        $for_householdhead=explode(",",$householdhead);
                                    ?>
                                <select name="householdhead" class="form-input" id="" onchange="hideHousehold(this)">
                                    <option value="yes" <?php echo (in_array("yes",$for_householdhead)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_householdhead)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div  id="hidden_household" class=" w-full" style="display:none;">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If no, name of household head</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $householdname; ?>" name="householdname" placeholder="Household head Name">
                                </div>
                            </div>
                            <div  id="hidden_householdtwo" class=" w-full" style="display:none;">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">Relationship</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $householdrel; ?>" name="householdrel" placeholder="Relationship">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of living household members</label>
                                <input type="text" class="form-input w-full" value="<?php echo $noOfmembers; ?>"  name="noOfmembers" placeholder="Number of living household members">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of male</label>
                                <input type="text" class="form-input w-full" value="<?php echo $nomale; ?>" name="nomale" placeholder="Number of male">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of female</label>
                                <input type="text" class="form-input w-full" value="<?php echo $nofemale; ?>" name="nofemale" placeholder="Number of female">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Person to notify in case of emergency</label>
                                <input type="text" class="form-input w-full" value="<?php echo $emergencyname; ?>" name="emergencyname" placeholder="Emergency contact name">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Contact number</label>
                                <input type="number" class="form-input w-full" value="<?php echo $emergencyno; ?>" name="emergencyno" placeholder="Emergency contact number">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Member of any Farmers Association/Cooperative?</label>
                                    <?php 
                                        $for_memberoffarm=explode(",",$memberoffarm);
                                    ?>
                                <select name="memberoffarm" class="form-input" id="" onchange="hideFarmMember(this)">
                                    <option value="yes" <?php echo (in_array("yes",$for_memberoffarm)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_memberoffarm)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div  id="hidden_farmmember" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2">
                                    <label for="">If yes, specify</label>
                                    <input type="text" class="form-input w-full" value="<?php echo $memberoffarmspecify; ?>" name="memberoffarmspecify" placeholder="Specify member of any farmers association/cooperative">
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Farm Profile</h3>
                        <label for="" class="text-lg">Main Livelihood</label>
                            <?php 
                                $for_mainlivelihood = $mainlivelihood;
                            ?>
                        <div class="flex flex-row w-full pb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" 
                                       <?php if(in_array("Farmer",$for_mainlivelihood)) echo 'checked="checked"'; ?>
                                        id="inlineCheckbox1" value="Farmer" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Farmer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" 
                                       <?php if(in_array("Farmworker",$for_mainlivelihood)) echo 'checked="checked"'; ?>
                                       id="inlineCheckbox2" value="Farmworker" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Farmworker/Laborer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" 
                                       <?php if(in_array("Fisherfolk",$for_mainlivelihood)) echo 'checked="checked"'; ?>
                                       id="inlineCheckbox1" value="Fisherfolk" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fisherfolk</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                       type="checkbox" 
                                       <?php if(in_array("Agriyouth",$for_mainlivelihood)) echo 'checked="checked"'; ?>
                                       id="inlineCheckbox2" value="Agriyouth" name="mainlivelihood[]">
                                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Agri Youth</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Farmers</label>
                            <label for="" class="">Type of Farming Activity</label>
                                <?php 
                                    $for_farmingactivity = $farmingactivity;
                                ?>
                            <div class="flex flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" 
                                           id="inlineCheckbox1" 
                                           value="Rice"  
                                           <?php if(in_array("Rice",$farmingactivity)) echo 'checked="checked"'; ?>
                                           name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Rice</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Corn"  
                                           <?php if(in_array("Corn",$farmingactivity)) echo 'checked="checked"'; ?>
                                           name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Corn</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="otherCrops" value="Others"  
                                           <?php if(in_array("Others",$farmingactivity)) echo 'checked="checked"'; ?>
                                           name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Other crops</label>
                                </div>
                                <div class="px-2" id="otherCropsSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $farmingactivityothers; ?>" name="farmingactivityothers" placeholder="Please specify">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="livestock" value="Livestock"  
                                           <?php if(in_array("Livestock",$farmingactivity)) echo 'checked="checked"'; ?>
                                           name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Livestock</label>
                                </div>
                                <div class="px-2" id="livestockSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $farmingactivitylivestock; ?>" name="farmingactivitylivestock" placeholder="Please specify">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="poultry" value="Poultry"  
                                           <?php if(in_array("Poultry",$farmingactivity)) echo 'checked="checked"'; ?>
                                           name="farmingactivity[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Poultry</label>
                                </div>
                                <div class="px-2" id="poultrySpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $farmingactivitypoultry; ?>" name="farmingactivitypoultry" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Farmworkers</label>
                            <label for="" class="">Kind of Work</label>
                                <?php 
                                    $for_kindofwork = $kindofwork;
                                ?>
                            <div class="flex flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Land Preparation"  
                                           <?php if(in_array("Land Preparation",$for_kindofwork)) echo 'checked="checked"'; ?>
                                           name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Land Preparation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Planting/Transplanting"
                                           <?php if(in_array("Planting/Transplanting",$for_kindofwork)) echo 'checked="checked"'; ?>  
                                           name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Planting/Transplanting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Cultivation"  
                                           <?php if(in_array("Cultivation",$for_kindofwork)) echo 'checked="checked"'; ?> 
                                           name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Cultivation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Harvesting"  
                                           <?php if(in_array("Harvesting",$for_kindofwork)) echo 'checked="checked"'; ?> 
                                            name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Harvesting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="kindofwork" value="Others"  <?php echo (in_array("Others",$for_kindofwork)) ? 'checked="checked"' : ''; ?> name="kindofwork[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="kindofworkSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $kindofworkothers; ?>" name="kindofworkothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Fisherfolk</label>
                            <p class="text-sm">The Lending Conduit shall coordinate with the Bureu of Fisheries and Aquatic Resouces (BFAR) in the issuance of a certification that the fisherfolk-borrower under PUNLA/PLEA is registered under the Municipal Registration (FishR)</p>
                            <label for="" class="">Type of Fishing Activity</label>
                                <?php 
                                    $for_typeoffishing = $typeoffishing;
                                ?>
                            <div class="flex flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishCapture" 
                                           <?php if(in_array("FishCapture",$for_typeoffishing)) echo 'checked="checked"'; ?> 
                                            name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Capture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="Aquaculture" 
                                           <?php if(in_array("Aquaculture",$for_typeoffishing)) echo 'checked="checked"'; ?> 
                                           name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Aquaculture</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="Gleaning" 
                                           <?php if(in_array("Gleaning",$for_typeoffishing)) echo 'checked="checked"'; ?> 
                                           name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Gleaning</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishProcessing" 
                                           <?php if(in_array("FishProcessing",$for_typeoffishing)) echo 'checked="checked"'; ?> 
                                           name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Processing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="FishVending" 
                                           <?php if(in_array("FishVending",$for_typeoffishing)) echo 'checked="checked"'; ?> 
                                           name="typeoffishing[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Fish Vending</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" value="Others" 
                                           <?php if(in_array("Others",$for_typeoffishing)) echo 'checked="checked"'; ?>  
                                           name="typeoffishing[]" id="forfisherfolk">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="forfisherfolkSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $typeoffishingothers; ?>" name="typeoffishingothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="font-bold">For Agri youth</label>
                            <p class="text-sm">For the purposes of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>
                            <label for="" class="">Type of involment</label>
                                <?php 
                                    $for_typeofinvolment = $typeofinvolment;
                                ?>
                            <div class="flex flex-row w-full">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="partoffarminghousehold" 
                                           <?php if(in_array("partoffarminghousehold",$for_typeofinvolment)) echo 'checked="checked"'; ?> 
                                           name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Part of a farming household</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox2" value="attendingformal" 
                                           <?php if(in_array("attendingformal",$for_typeofinvolment)) echo 'checked="checked"'; ?> 
                                           name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox2">Attending/attended formal agri-fishery related course</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="attendingnonformal" 
                                           <?php if(in_array("attendingnonformal",$for_typeofinvolment)) echo 'checked="checked"'; ?> 
                                           name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Attending/attended non-formal agri-fishery related course</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="inlineCheckbox1" value="participated"
                                           <?php if(in_array("participated",$for_typeofinvolment)) echo 'checked="checked"'; ?> 
                                         
                                            name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Participated in any agricultural activity/program</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                           type="checkbox" id="involment" value="others" 
                                           <?php if(in_array("involment",$for_typeofinvolment)) echo 'checked="checked"'; ?> 
                                           name="typeofinvolment[]">
                                    <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">Others</label>
                                </div>
                                <div class="px-2" id="involmentSpecify" style="display:none;">
                                    <input type="text" class="form-input w-40" value="<?php echo $typeofinvolmentothers; ?>" name="typeofinvolmentothers" placeholder="Please specify">
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">Gross Annual Income Last Year</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Farming</label>
                                <input type="text" class="form-input w-full" value="<?php echo $grossfarming; ?>" name="grossfarming" placeholder="Gross annual income last year in farming">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Non-farming</label>
                                <input type="text" class="form-input w-full" value="<?php echo $grossnonfarming; ?>" name="grossnonfarming" placeholder="Gross annual income last year in non-farming">
                            </div>
                        </div>
                        <div class="flex justify-between pt-5">
                            <span onclick="myFunctionTwoprev()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">PREVIOUS</span>
                            <span onclick="myFunctionTwo()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">NEXT</span>
                        </div>
                </div>
                <div class="tab-pane fade" id="tabs-step3Fill" role="tabpanel" aria-labelledby="tabs-step3-tabFill">
                    <h3 class="text-xl font-bold">Farm Profile</h3>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">No. of Farm Parcels:</label>
                                <input type="number" class="form-input w-full" name="nooffarmparcels" placeholder="No. of farm parcels">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P1)</label>
                                <input type="text" class="form-input w-full" name="p1" placeholder="P1">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P2)</label>
                                <input type="text" class="form-input w-full" name="p2" placeholder="P2">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Name of Farmer/s in Rotation(P3)</label>
                                <input type="text" class="form-input w-full" name="p3" placeholder="P3">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 1</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay1" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity1" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea1" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <?php 
                                     $for_ancestral1=explode(",",$ancestral1);
                                ?>
                                <select name="ancestral1" class="form-input" id="">
                                <option value="yes" <?php echo (in_array("yes",$for_ancestral1)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_ancestral1)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                                
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <?php 
                                     $for_agrarlan1=explode(",",$agrarlan1);
                                ?>
                                <select name="agrarlan1" class="form-input" id="">
                                <option value="yes" <?php echo (in_array("yes",$for_agrarlan1)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_agrarlan1)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno1" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <?php 
                                     $for_ownershiptype1=explode(",",$ownershiptype1);
                                ?>
                                <select name="ownershiptype1" class="form-input" id="" onchange="showTenantOne(this)">
                                    <option value="owner" <?php echo (in_array("owner",$for_ownershiptype1)) ? 'selected="selected"' : ''; ?>>Registered Owner</option>
                                    <option value="tenant" <?php echo (in_array("tenant",$for_ownershiptype1)) ? 'selected="selected"' : ''; ?>>Tenant</option>
                                    <option value="lessee" <?php echo (in_array("lessee",$for_ownershiptype1)) ? 'selected="selected"' : ''; ?>>Lessee</option>
                                    <option value="others" <?php echo (in_array("others",$for_ownershiptype1)) ? 'selected="selected"' : ''; ?>>Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenantone" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename1" placeholder="">
                                </div>
                            </div>
                            
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropa1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizea1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheada1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypea1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionera1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksa1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropa5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizea5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheada5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypea5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionera5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksa5" placeholder="Remarks">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 2</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay2" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity2" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea2" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <?php 
                                     $for_ancestral2=explode(",",$ancestral2);
                                ?>
                                <select name="ancestral2" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_ancestral2)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_ancestral2)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <?php 
                                     $for_agrarlan2=explode(",",$agrarlan2);
                                ?>
                                <select name="agrarlan2" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_agrarlan2)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_agrarlan2)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno2" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <?php 
                                     $for_ownershiptype2=explode(",",$ownershiptype2);
                                ?>
                                <select name="ownershiptype2" class="form-input" id="" onchange="showTenantTwo(this)">
                                    <option value="owner" <?php echo (in_array("owner",$for_ownershiptype2)) ? 'selected="selected"' : ''; ?>>Registered Owner</option>
                                    <option value="tenant" <?php echo (in_array("tenant",$for_ownershiptype2)) ? 'selected="selected"' : ''; ?>>Tenant</option>
                                    <option value="lessee" <?php echo (in_array("lessee",$for_ownershiptype2)) ? 'selected="selected"' : ''; ?>>Lessee</option>
                                    <option value="others" <?php echo (in_array("others",$for_ownershiptype2)) ? 'selected="selected"' : ''; ?>>Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenanttwo" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename2" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropb1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizeb1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheadb1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypeb1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionerb1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksb1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropb5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizeb5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadb5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypeb5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerb5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksb5" placeholder="Remarks">
                            </div>
                        </div>
                        <label for="" class="text-lg font-bold">Farm Parcel No. 3</label>
                        <p class="text-lg">Farm Location</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Barangay</label>
                                <input type="text" class="form-input w-full" name="farmbarangay3" placeholder="Farm Barangay">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">City/Municipality</label>
                                <input type="text" class="form-input w-full" name="farmcity3" placeholder="Farm City/Municipality">
                            </div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Total Farm Area (In hectares)</label>
                                <input type="number" class="form-input w-full" name="farmarea3" placeholder="Total Farm Area (In hectares)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">With Ancestral Domain?</label>
                                <?php 
                                     $for_ancestral3=explode(",",$ancestral3);
                                ?>
                                <select name="ancestral3" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_ancestral3)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_ancestral3)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Agrarlan Reform Beneficiary?</label>
                                <?php 
                                     $for_agrarlan3=explode(",",$agrarlan3);
                                ?>
                                <select name="agrarlan3" class="form-input" id="">
                                    <option value="yes" <?php echo (in_array("yes",$for_agrarlan3)) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    <option value="no" <?php echo (in_array("no",$for_agrarlan3)) ? 'selected="selected"' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <p class="text-lg">Ownership Type and Document Number</p>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Document No.</label>
                                <input type="number" class="form-input w-full" name="idno3" placeholder="Ownership Document Number">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="">Ownership Type</label>
                                <?php 
                                     $for_ownershiptype3=explode(",",$ownershiptype3);
                                ?>
                                <select name="ownershiptype3" class="form-input" id="" onchange="showTenantThree(this)">
                                    <option value="owner" <?php echo (in_array("owner",$for_ownershiptype3)) ? 'selected="selected"' : ''; ?>>Registered Owner</option>
                                    <option value="tenant" <?php echo (in_array("tenant",$for_ownershiptype3)) ? 'selected="selected"' : ''; ?>>Tenant</option>
                                    <option value="lessee" <?php echo (in_array("lessee",$for_ownershiptype3)) ? 'selected="selected"' : ''; ?>>Lessee</option>
                                    <option value="others" <?php echo (in_array("others",$for_ownershiptype3)) ? 'selected="selected"' : ''; ?>>Others</option>
                                </select>
                            </div>
                            <div id="hidden_tenantthree" style="display:none;" class=" w-full">
                                <div class="flex flex-col gap-2 w-full p-2 " >
                                    <label for="">Name of Land Owner</label>
                                    <input type="text" class="form-input w-full" name="ownershiptypename3" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Crop/Commodity | For Livestock & Poultry</label>
                                <input type="text" class="form-input w-full" name="cropc1" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Size (ha)</label>
                                <input type="text" class="form-input w-full" name="sizec1" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">No. of head</label>
                                <input type="text" class="form-input w-full" name="noofheadc1" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Farm Type</label>
                                <input type="text" class="form-input w-full" name="farmtypec1" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Ogranic Practioner</label>
                                <input type="text" class="form-input w-full" name="organicepractionerc1" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <label for="">Remarks</label>
                                <input type="text" class="form-input w-full" name="remarksc1" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc2" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec2" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc2" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec2" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc2" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc2" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc3" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec3" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc3" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec3" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc3" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc3" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc4" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec4" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc4" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec4" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc4" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc4" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex flex-row w-full h-full">
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="cropc5" placeholder="Crop/Commodity | For Livestock & Poultry">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="sizec5" placeholder="Size (ha)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="noofheadc5" placeholder="Number of head (for livestock property)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="farmtypec5" placeholder="Farm Type">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="organicepractionerc5" placeholder="Ogranic Practioner(Y/N)">
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2 justify-end">
                                <input type="text" class="form-input w-full" name="remarksc5" placeholder="Remarks">
                            </div>
                        </div>
                        <div class="flex justify-between pt-5">
                            <span onclick="myFunctionThreeprev()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">PREVIOUS</span>
                            <span onclick="myFunctionThree()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">NEXT</span>
                        </div>

                </div>
                <div class="tab-pane fade" id="tabs-step4Fill" role="tabpanel" aria-labelledby="tabs-step4-tabFill">
                <h3 class="text-xl font-bold">Owner Document</h3>
                    <div class="flex flex-row w-full">
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="" class="font-bold">Upload Land Title</label>
                                <input type="file" id="uploadFileOne" type="file" name="fileToUploadOne" >
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-52 h-60 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreviewOne"></div>
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <label for="" class="font-bold">Upload Land Clearance</label>
                                <input type="file" id="uploadFileTwo" type="file" name="fileToUploadTwo" >
                            </div>
                            <div class="flex flex-col gap-2 w-full p-2">
                                <div class="w-52 h-60 border-slate-800 bg-no-repeat bg-cover bg-center " id="imagePreviewTwo"></div>
                            </div>
                    </div>
                    <div class="flex flex-row justify-center pt-5">
                        <input class="btn-primary w-2/4 mt-2" name="btnsubmit" type="submit" value="Submit RSBSA form">
                    </div>
                    <div class="flex justify-start pt-5">
                            <span onclick="myFunctionFourprev()" class="p-5 w-32 cursor-pointer bg-stone-300 rounded-lg text-center">PREVIOUS</span>
                        </div>
                </div>
            </div>
        </form>

        <script>
            function myFunctionOne() {
            $('#tabs-step2-tabFill')[0].click(); 
            }
            function myFunctionTwo() {
            $('#tabs-step3-tabFill')[0].click(); 
            }
            function myFunctionThree() {
            $('#tabs-step4-tabFill')[0].click(); 
            }
            function myFunctionTwoprev() {
            $('#tabs-step1-tabFill')[0].click(); 
            }
            function myFunctionThreeprev() {
            $('#tabs-step2-tabFill')[0].click(); 
            }
            function myFunctionFourprev() {
            $('#tabs-step3-tabFill')[0].click(); 
            }
        </script>

<script>
    $(function() {
        $("#uploadFileOne").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreviewOne").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script>
    $(function() {
        $("#uploadFileTwo").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreviewTwo").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script>
    $(function() {
        $("#uploadFile2x2").on("change", function()
        {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview2x2").css("background-image", "url("+this.result+")");
            }
        }
        });
   });
</script>
<script type="text/javascript">
    function showReligion(select){
    if(select.value=="others"){
        document.getElementById('hidden_religion').style.display = "block";
    } else{
        document.getElementById('hidden_religion').style.display = "none";
    }
    };
    function showCivil(select){
    if(select.value=="married"){
        document.getElementById('hidden_spouse').style.display = "block";
    } else{
        document.getElementById('hidden_spouse').style.display = "none";
    }
    } 
    function hideGroup(select){
    if(select.value=="yes"){
        document.getElementById('hidden_group').style.display = "block";
    } else{
        document.getElementById('hidden_group').style.display = "none";
    }
    } 
    function hideGoverment(select){
    if(select.value=="yes"){
        document.getElementById('hidden_government').style.display = "block";
    } else{
        document.getElementById('hidden_government').style.display = "none";
    }
    } 
    function hideHousehold(select){
    if(select.value=="no"){
        document.getElementById('hidden_household').style.display = "block";
        document.getElementById('hidden_householdtwo').style.display = "block";
    } else{
        document.getElementById('hidden_household').style.display = "none";
        document.getElementById('hidden_householdtwo').style.display = "none";
    }
    }
    function hideFarmMember(select){
    if(select.value=="yes"){
        document.getElementById('hidden_farmmember').style.display = "block";
    } else{
        document.getElementById('hidden_farmmember').style.display = "none";
    }
    } 
    $(function() {
        $('#otherCrops').change(function() {
            $('#otherCropsSpecify').toggle($(this).is(':checked'));
        });
    });
    $(function() {
        $('#poultry').change(function() {
            $('#poultrySpecify').toggle($(this).is(':checked'));
        });
    });
    $(function() {
        $('#livestock').change(function() {
            $('#livestockSpecify').toggle($(this).is(':checked'));
        });
    });
    $(function() {
        $('#kindofwork').change(function() {
            $('#kindofworkSpecify').toggle($(this).is(':checked'));
        });
    });
    $(function() {
        $('#forfisherfolk').change(function() {
            $('#forfisherfolkSpecify').toggle($(this).is(':checked'));
        });
    });
    $(function() {
        $('#involment').change(function() {
            $('#involmentSpecify').toggle($(this).is(':checked'));
        });
    });
    function showTenantOne(select){
    if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
        document.getElementById('hidden_tenantone').style.display = "block";
    } else{
        document.getElementById('hidden_tenantone').style.display = "none";
    }
    };
    function showTenantTwo(select){
    if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
        document.getElementById('hidden_tenanttwo').style.display = "block";
    } else{
        document.getElementById('hidden_tenanttwo').style.display = "none";
    }
    };
    function showTenantThree(select){
    if(select.value=="tenant" || select.value == "lessee" || select.value == "others"){
        document.getElementById('hidden_tenantthree').style.display = "block";
    } else{
        document.getElementById('hidden_tenantthree').style.display = "none";
    }
    };
</script>
    