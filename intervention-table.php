<?php
ini_set('display_errors', 1);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Intervention</title>
</head>
<body>
    <script>
        function fetch_select(val)
        {
            document.getElementById("forbarangay").value = val;
            $.ajax({
                type: 'post',
                url: 'fetch_crops.php',
                data: {
                    get_option:val
                },
                success: function (response) {
                    document.getElementById("new_select").innerHTML=response; 
                }
            });

        }
        
    </script>
    <script>
        
        function fetch_land(val)
        {
            var brgy = $('#forbarangay').val();
            $.ajax({
                type: 'post',
                url: 'fetch_land.php',
                data: {
                get_brgy: brgy,
                get_commodity:val
                },
                success: function (response) {
                    document.getElementById("release_land").innerHTML=response; 
                }
            });
        }
    </script>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="container w-full ml-0 md:ml-60  md:w-4/5">
        <div class="table_container p-10 gap-5 flex flex-col">
            <button 
                class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out w-32"
                data-bs-toggle="modal" data-bs-target="#releaseModal"
                >
                    Release
                </button>
            <h2 class="text-2xl font-bold">Intervention</h2>
            <div class="table_buttons flex flex-row gap-5 ">
                <button 
                class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewMaster()"
                >
                    Master List
                </button>
                <button 
                class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-green active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewReceived()"
                >
                    Received
                </button>
                <button 
                class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewNotReceived()"
                >
                    Deleted
                </button>
            </div>
            
            <div id="table_master">
                <table id="master_table" style="width:100%;">
                    <h2 class="text-xl">Master List</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th style="display:none;">Farmer ID</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Crop</th>
                            <th>Land Size</th>
                            <th>Status</th>
                            <th class="super-hide">Action</th>
                        </tr>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th style="display:none;">Farmer ID</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Crop</th>
                            <th>Land Size</th>
                            <th>Status</th>
                            <th class="super-hide" style="visibility: hidden;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM tbl_intervention";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $acctstat =  $row["status"];
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["farmerId"]; ?> </td>
                                    <td><?php echo $row["name"]; ?> </td>
                                    <td><?php echo $row["farmbarangay"]; ?></td>
                                    <td><?php echo $row["crop"]; ?></td>
                                    <td><?php echo $row["size"]; ?> hectares</td>
                                    
                                    <td>
                                        <?php 
                                            if($acctstat == "active"){
                                                //echo '<div class="rounded-full w-24 h-auto bg-green-500 text-white flex justify-center">Active</div>';
                                                echo "Active";
                                            }else{
                                                //echo '<div class="rounded-full w-24 h-auto bg-red-500 text-white flex justify-center">Inactive</div>';
                                                echo "Inactive";
                                            }    
                                        ?> 
                                    </td>
                                    <td class="super-hide">
                                        <button class="fa fa-check rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue" title="Receive" data-bs-toggle="modal" data-bs-target="#receiveModal"></button>
                                        <button class="fa fa-times rounded-lg border-2 border-red-500/50 p-2 w-9 icon-red" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"></button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- RECIEVED ACCOUNTS-->
            <div id="table_received" style="display:none;">
                <table id="received_table" class="hover"  style="width:100%;">
                    <h2 class="text-xl">Received</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Crop</th>
                            <th>Land Size</th>
                            <th>Programs</th>
                            <th>Status</th>
                            <th class="super-hide">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM tbl_interventiontwo WHERE status = 'received'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["name"]; ?> </td>
                                    <td><?php echo $row["farmbarangay"]; ?></td>
                                    <td><?php echo $row["crop"]; ?></td>
                                    <td><?php echo $row["size"]; ?></td>
                                    <td><?php echo $row["amount"]; ?></td>
                                    <td>
                                        <?php 
                                            $acctstat =  $row["status"];
                                            if($acctstat == "received"){
                                                echo '<div class="rounded-full w-24 h-auto bg-green-500 text-white flex justify-center">Received</div>';
                                            }else{
                                                echo '<div class="rounded-full w-24 h-auto bg-red-500 text-white flex justify-center">Inactive</div>';
                                            }    
                                        ?> 
                                    </td>
                                    <td class="super-hide">
                                        <button class="fa fa-times rounded-lg border-2 border-red-500/50 p-2 w-9 icon-red" title="Not Receive" data-bs-toggle="modal" data-bs-target="#receivedeleteModal"></button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- NOT RECEIVED ACCOUNTS -->
            <div id="table_notreceived" style="display:none;">
                <table id="notreceived_table" style="width:100%;">
                    <h2 class="text-xl">Deleted</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Crop</th>
                            <th>Land Size</th>
                            <th>Programs</th>
                            <th>Status</th>
                            <th class="super-hide">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT id,name,farmbarangay,crop,size,amount,status status FROM tbl_interventiontwo WHERE status = 'deleted'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["name"]; ?> </td>
                                    <td><?php echo $row["farmbarangay"]; ?></td>
                                    <td><?php echo $row["crop"]; ?></td>
                                    <td><?php echo $row["size"]; ?></td>
                                    <td><?php echo $row["amount"]; ?></td>
                                    <td>
                                        <?php 
                                            $acctstat =  $row["status"];
                                            if($acctstat == "received"){
                                                echo '<div class="rounded-full w-24 h-auto bg-green-500 text-white flex justify-center">Received</div>';
                                            }else{
                                                echo '<div class="rounded-full w-24 h-auto bg-red-500 text-white flex justify-center">Deleted</div>';
                                            }    
                                        ?> 
                                    </td>
                                    <td class="super-hide">
                                    <button class="fa fa-check rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue" title="Receive" data-bs-toggle="modal" data-bs-target="#deletereceiveModal"></button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>
    
    <!-- Modal Release -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="releaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">_two
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Release</h5>
                    <button 
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close">X
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body relative p-4 gap-2">
                        <div class="flex flex-col"></div>
                        <div class="flex flex-col">
                            <label for="">Barangay</label>
                            <select id="release_barangay" name="release_farmbarangay" class="form-input" onchange="fetch_select(this.value);">
                                <?php
                                    include "config.php";
                                    $sqlbrgy = "SELECT DISTINCT `farmbarangay` FROM `tbl_intervention`";
                                    $resultbrgy = mysqli_query($con, $sqlbrgy);
                                    if (mysqli_num_rows($resultbrgy) > 0) {
                                        while($rowbrgy = mysqli_fetch_assoc($resultbrgy)) {
                                            $orig = $rowbrgy['farmbarangay'];
                                            $forbrgy = str_replace('_', ' ', $orig);
                                ?>
                                         <option value="<?php echo $rowbrgy['farmbarangay'];?>"><?php echo $forbrgy; ?></option>
                                <?php
                                        }
                                    } else {
                                    echo "0 results";
                                    }
                                ?>
                                </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="">Commodity</label>
                            <select id="new_select" name="release_commodity" class="form-input" onchange="fetch_land(this.value);"></select>
                            <input type="text" name="" id="forbarangay" style="display:none;">
                        </div>
                        <div class="flex flex-col">
                            <label for="">Land Size</label>
                            <select id="release_land" name="release_landsize" class="form-input"></select>
                        </div>
                        <div class="flex flex-col">
                            <label for="">Program Type</label>
                            <select name="release_programtype" class="form-input" onchange="showDiv(this)">
                                <option value="Financial">Financial Assistance</option>
                                <option value="Program">Program</option>
                            </select>

                        </div>
                        <div class="flex flex-col" style="display:none;" id="hide_program">
                            <label for="">Programs</label>
                            <select name="release_programs" class="form-input" onchange="showDiv(this)">
                                <option value="fertilizer_for_corn">Fertilizer for Corn</option>
                                <option value="fetilizer_for_cassava">Fertilizer for Cassava</option>
                                <option value="fetilizer_for_rice">Fertilizer for Rice</option>
                                <option value="fetilizer_for_hvc">Fertilizer for HVC</option>
                                <option value="seeds_for_kamatis">Seeds for Kamatis</option>
                                <option value="seeds_for_kalamansi">Seeds for Kalamansi</option>
                                <option value="seeds_for_sitaw">Seeds for Sitaw</option>
                                <option value="seeds_for_okra">Seeds for Okra</option>
                                <option value="seeds_for_papaya">Seeds for Papaya</option>
                                <option value="seeds_for_hvc">Seeds for HVC</option>
                            </select>
                            
                        </div>
                        <div class="amount flex flex-col" id="hide_amount">
                            <label for="">Enter the amount to be release</label>
                            <input type="number" class="form-input" name="release_amount">
                        </div>
                        <br>
                        <p class="text-sm">To continue, please enter your PIN</p>
                        <input type="password" name="" id="reg_pass_pending" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                        <input type="password" name="" id="reg_confirm_pass_pending" class="form-input">
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button 
                            type="button" 
                            class="px-6
                            py-2.5
                            bg-gray-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-gray-700 hover:shadow-lg
                            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-gray-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-6
                            py-2.5
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            transition
                            duration-150
                            ease-in-out
                            ml-1"
                            name="btn_release"
                            id="btn_pending"
                            disabled="true"
                            style="background-color:gray;"
                            >Release</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Master - Receive-->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="receiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">_two
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Receive account</h5>
                    <button 
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close">X
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body relative p-4">
                            Receive the account of 
                            <input type="text" name="master_name" id="master_name" class="modal_input font-bold" readonly>
                            <input type="text" name="master_id" id="master_id" style="display:none;">
                            <input type="text" name="master_farmid" id="master_farmid" style="display:none;">
                            <input type="text" name="master_barangay" id="master_barangay" style="display:none;">
                            <input type="text" name="master_crop" id="master_crop" style="display:none;">
                            <input type="text" name="master_size" id="master_size" style="display:none;">
                            <input type="text" name="master_amount" id="master_amount" style="display:none;">

                            <div class="flex flex-col">
                                <select name="programs" class="form-input">
                                    <option value="Financial">Financial</option>
                                    <option value="Foods">Foods</option>
                                </select>
                            </div>

                            <div class="amount flex flex-col">
                                <label for="">Enter the amount to be release</label>
                                <input type="number" class="form-input" name="receive_amount">
                            </div>
                            <br>
                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_pending" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_pending" class="form-input">
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button 
                            type="button" 
                            class="px-6
                            py-2.5
                            bg-gray-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-gray-700 hover:shadow-lg
                            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-gray-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-6
                            py-2.5
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            transition
                            duration-150
                            ease-in-out
                            ml-1"
                            name="btn_masterapprove"
                            id="btn_pending"
                            disabled="true"
                            style="background-color:gray;"
                            >Receive account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Master - Delete -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Are you sure?</h5>
                    <button 
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close">X
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body relative p-4">
                            Delete the account of 
                            <input type="text" name="master_name_two" id="master_name_two" class="modal_input font-bold" readonly>
                            <input type="text" name="master_id_two" id="master_id_two" style="display:none;">
                            <input type="text" name="master_farmid_two" id="master_farmid_two" style="display:none;">
                            <input type="text" name="master_barangay_two" id="master_barangay_two" style="display:none;">
                            <input type="text" name="master_crop_two" id="master_crop_two" style="display:none;">
                            <input type="text" name="master_size_two" id="master_size_two" style="display:none;">
                            <input type="text" name="master_amount_two" id="master_amount_two" style="display:none;">

                            <div class="flex flex-col">
                                <select name="programs" class="form-input">
                                    <option value="Financial">Financial</option>
                                    <option value="Foods">Foods</option>
                                </select>
                            </div>

                            <div class="amount flex flex-col">
                                <label for="">Enter the amount to be release</label>
                                <input type="number" class="form-input" name="receive_amount_two">
                            </div>
                            <br>
                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_master_delete" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_master_delete" class="form-input">
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button 
                            type="button" 
                            class="px-6
                            py-2.5
                            bg-gray-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-gray-700 hover:shadow-lg
                            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-gray-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-6
                            py-2.5
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            transition
                            duration-150
                            ease-in-out
                            ml-1"
                            name="btn_masterdelete"
                            id="btn_masterdelete"
                            disabled="true"
                            style="background-color:gray;"
                            >Delete account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL Received - Delete -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="receivedeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Are you sure?</h5>
                    <button 
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close">X
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body relative p-4">
                            Delete the account of 
                            <input type="text" name="receive_delete_name" id="receive_delete_name" class="modal_input font-bold" readonly>
                            <input type="text" name="receive_delete_id" id="receive_delete_id" style="display:none;">

                            <!--div class="amount flex flex-col">
                                <label for="">Enter the amount to be release</label>
                                <input type="number" class="form-input" name="receive_amount">
                            </div-->
                            <br>
                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_receive_delete" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_receive_delete" class="form-input">
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button 
                            type="button" 
                            class="px-6
                            py-2.5
                            bg-gray-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-gray-700 hover:shadow-lg
                            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-gray-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-6
                            py-2.5
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            transition
                            duration-150
                            ease-in-out
                            ml-1"
                            name="btn_receivedelete"
                            id="btn_receivedelete"
                            disabled="true"
                            style="background-color:gray;"
                            >Delete account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="deletereceiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Are you sure?</h5>
                    <button 
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close">X
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body relative p-4">
                            Receive the account of 
                            <input type="text" name="delete_receive_name" id="delete_receive_name" class="modal_input font-bold" readonly>
                            <input type="text" name="delete_receive_id" id="delete_receive_id" style="display:none;">

                            <!--div class="amount flex flex-col">
                                <label for="">Enter the amount to be release</label>
                                <input type="number" class="form-input" name="receive_amount">
                            </div-->
                            <br>
                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_delete_receive" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_delete_receive" class="form-input">
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                        <button 
                            type="button" 
                            class="px-6
                            py-2.5
                            bg-gray-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-gray-700 hover:shadow-lg
                            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-gray-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="px-6
                            py-2.5
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            transition
                            duration-150
                            ease-in-out
                            ml-1"
                            name="btn_deletereceive"
                            id="btn_deletereceive"
                            disabled="true"
                            style="background-color:gray;"
                            >Receive account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    
    
   
    <script>
        $(document).ready( function () {
            $('#master_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true,
                    "pageLength": 6,
                    
                    initComplete: function () {
                        this.api()
                            .columns([1,2,3,4,5,6])
                            .every(function () {
                                var column = this;
                                var select = $('<select class="form-input"><option value=""></option></select>')
                                    .appendTo($(column.header()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
            
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });
            
                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '">' + d + '</option>');
                                    });
                            });
                    },
                }
            );
        } );
        $(document).ready( function () {
            $('#received_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                         'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true,
                    "pageLength": 6
                }
            );
        } );
        $(document).ready( function () {
            $('#notreceived_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true,
                    "pageLength": 6
                }
            );
        } );
    </script>
    <script>
        function viewMaster() {
            var a = document.getElementById("table_master");
            var b = document.getElementById("table_received");
            var c = document.getElementById("table_notreceived");
            if (a.style.display === "none") {
                a.style.display = "block";
                b.style.display = "none";
                c.style.display = "none";
            } else {
                a.style.display = "block";
                b.style.display = "none";
                c.style.display = "none";
            }
        }

        function viewReceived() {
            var a = document.getElementById("table_master");
            var b = document.getElementById("table_received");
            var c = document.getElementById("table_notreceived");
            if (b.style.display === "none") {
                a.style.display = "none";
                b.style.display = "block";
                c.style.display = "none";
            } else {
                a.style.display = "none";
                b.style.display = "block";
                c.style.display = "none";
            }
        }

        function viewNotReceived() {
            var a = document.getElementById("table_master");
            var b = document.getElementById("table_received");
            var c = document.getElementById("table_notreceived");
            if (c.style.display === "none") {
                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "block";
            } else {
                a.style.display = "none";
                b.style.display = "none";
                c.style.display = "block";
            }
        }
    </script>

    <script>
        var table = document.getElementById('master_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("master_id").value = this.cells[0].innerHTML;
                document.getElementById("master_id_two").value = this.cells[0].innerHTML;
                document.getElementById("master_farmid").value = this.cells[1].innerHTML;
                document.getElementById("master_farmid_two").value = this.cells[1].innerHTML;
                document.getElementById("master_name").value = this.cells[2].innerHTML;
                document.getElementById("master_name_two").value = this.cells[2].innerHTML;
                document.getElementById("master_barangay").value = this.cells[3].innerHTML;
                document.getElementById("master_barangay_two").value = this.cells[3].innerHTML;
                document.getElementById("master_crop").value = this.cells[4].innerHTML;
                document.getElementById("master_crop_two").value = this.cells[4].innerHTML;
                document.getElementById("master_size").value = this.cells[5].innerHTML;
                document.getElementById("master_size_two").value = this.cells[5].innerHTML;
                document.getElementById("master_amount").value = this.cells[6].innerHTML;
                document.getElementById("master_amount_two").value = this.cells[6].innerHTML;
                document.getElementById("master_status").value = this.cells[7].innerHTML;
                document.getElementById("master_status_two").value = this.cells[7].innerHTML;

            };

        }   
    </script>
    <script>
        var table = document.getElementById('received_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("receive_delete_id").value = this.cells[0].innerHTML;
                document.getElementById("receive_delete_name").value = this.cells[1].innerHTML;

            };

        }   
    </script>
    <script>
        var table = document.getElementById('notreceived_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("delete_receive_id").value = this.cells[0].innerHTML;
                document.getElementById("delete_receive_name").value = this.cells[1].innerHTML;

            };

        }   
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    
    <script>
        //Master - Received
        $("#reg_confirm_pass_pending").blur(function() {
            var user_pass_pending = $("#reg_pass_pending").val();
            var user_pass2_pending = $("#reg_confirm_pass_pending").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_pending").css("background","blue");
                $("#btn_pending").prop('disabled',false)//use prop()
            } else {
                $("#btn_pending").css("background","gray");
                $("#btn_pending").prop('disabled',true)//use prop()
            }

        });
        //Master - Delete
        $("#reg_confirm_pass_master_delete").blur(function() {
            var user_pass_pending = $("#reg_pass_master_delete").val();
            var user_pass2_pending = $("#reg_confirm_pass_master_delete").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_masterdelete").css("background","red");
                $("#btn_masterdelete").prop('disabled',false)//use prop()
            } else {
                $("#btn_masterdelete").css("background","gray");
                $("#btn_masterdelete").prop('disabled',true)//use prop()
            }

        });
        //Received - Delete
        $("#reg_confirm_pass_receive_delete").blur(function() {
            var user_pass_pending = $("#reg_pass_receive_delete").val();
            var user_pass2_pending = $("#reg_confirm_pass_receive_delete").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_receivedelete").css("background","red");
                $("#btn_receivedelete").prop('disabled',false)//use prop()
            } else {
                $("#btn_receivedelete").css("background","gray");
                $("#btn_receivedelete").prop('disabled',true)//use prop()
            }

        });
        //Delete - Received
        $("#reg_confirm_pass_delete_receive").blur(function() {
            var user_pass_pending = $("#reg_pass_delete_receive").val();
            var user_pass2_pending = $("#reg_confirm_pass_delete_receive").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_deletereceive").css("background","red");
                $("#btn_deletereceive").prop('disabled',false)//use prop()
            } else {
                $("#btn_deletereceive").css("background","gray");
                $("#btn_deletereceive").prop('disabled',true)//use prop()
            }

        });

    </script>
    <script type="text/javascript">
        function showDiv(select){
            if(select.value=="Program"){
                document.getElementById('hide_program').style.display = "block";
                document.getElementById('hide_amount').style.display = "none";
            } else{
                document.getElementById('hide_program').style.display = "none";
                document.getElementById('hide_amount').style.display = "block";
            }
        } 
</script>
</body>
</html>

<!-- MASTER LIST RECEIVE -->
<?php
if (isset($_POST['btn_masterapprove'] )) {

    $master_name = $_POST['master_name'];
    $master_id = $_POST['master_id'];
    $master_farmid = $_POST['master_farmid'];
    $master_barangay = $_POST['master_barangay'];
    $master_crop = $_POST['master_crop'];
    $master_size = $_POST['master_size'];
    $master_status = "received";
    $receive_amount = $_POST['receive_amount'];
    $programs = $_POST['programs'];

    include "config.php";

    $sql = "UPDATE tbl_intervention SET status='inactive' WHERE id='".$master_id."'";

    if (mysqli_query($con, $sql)) {
    //echo "Record updated successfully";
        $sqlinsert = "INSERT INTO `tbl_interventiontwo`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`, `amount`, `status`,`programs`) 
                    VALUES ('".$master_farmid."','".$master_name."','".$master_barangay."','".$master_crop."','".$master_size."','".$receive_amount."','".$master_status."','".$programs."')";
                    if (mysqli_query($con, $sqlinsert)) {
                        echo "
                            <script>
                            Swal.fire({
                                title: 'Account received successfully',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                window.location.href = window.location.href;
                            })
                            </script>
                        ";
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
            } 
    }else {
        echo "Error updating record: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!-- MASTER LIST DELETE -->
<?php
if (isset($_POST['btn_masterdelete'] )) {

    $master_name = $_POST['master_name_two'];
    $master_id = $_POST['master_id_two'];
    $master_farmid = $_POST['master_farmid_two'];
    $master_barangay = $_POST['master_barangay_two'];
    $master_crop = $_POST['master_crop_two'];
    $master_size = $_POST['master_size_two'];
    $master_status = "deleted";
    $receive_amount = $_POST['receive_amount_two'];
    $programs = $_POST['programs'];


    include "config.php";

    $sql = "UPDATE tbl_intervention SET status='inactive' WHERE id='".$master_id."'";

    if (mysqli_query($con, $sql)) {
    //echo "Record updated successfully";
        $sqlinsert = "INSERT INTO `tbl_interventiontwo`(`farmerId`, `name`, `farmbarangay`, `crop`, `size`, `amount`, `status`,`programs`) 
                    VALUES ('".$master_farmid."','".$master_name."','".$master_barangay."','".$master_crop."','".$master_size."','".$receive_amount."','".$master_status."','".$programs."')";
                    if (mysqli_query($con, $sqlinsert)) {
                        echo "
                            <script>
                            Swal.fire({
                                title: 'Account deleted successfully',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                window.location.href = window.location.href;
                            })
                            </script>
                        ";
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
            } 
    }else {
        echo "Error updating record: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!-- RECEIVE DELETE -->
<?php
if (isset($_POST['btn_receivedelete'] )) {

    $receive_delete_id = $_POST['receive_delete_id'];

    include "config.php";

    $sql = "UPDATE tbl_interventiontwo SET status='deleted' WHERE id='".$receive_delete_id."'";

    if (mysqli_query($con, $sql)) {
        echo "
            <script>
            Swal.fire({
                title: 'Account deleted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function(){
                window.location.href = window.location.href;
            })
            </script>
        ";
    }else{
        echo "Error updating record: " . mysqli_error($con);
    }
    mysqli_close($con);


}
?>
<!-- DELETE RECEIVE -->
<?php
if (isset($_POST['btn_deletereceive'] )) {

    $delete_receive_id = $_POST['delete_receive_id'];

    include "config.php";

    $sql = "UPDATE tbl_interventiontwo SET status='received' WHERE id='".$delete_receive_id."'";

    if (mysqli_query($con, $sql)) {
        echo "
            <script>
            Swal.fire({
                title: 'Account received successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function(){
                window.location.href = window.location.href;
            })
            </script>
        ";
    }else{
        echo "Error updating record: " . mysqli_error($con);
    }
    mysqli_close($con);


}
?>
<!-- RELEASE -->
<?php
if (isset($_POST['btn_release'] )) {
    include "config.php";
    $release_barangay = $_POST['release_farmbarangay'];
    $release_commodity = $_POST['release_commodity'];
    $release_landsize = $_POST['release_landsize'];

    $release_programtype = $_POST['release_programtype'];
    $release_programs = $_POST['release_programs'].$_POST['release_amount'];
    $sqlinsert = "INSERT INTO tbl_intervention_archieve (farmerId, name, farmbarangay, crop, size, status)
        SELECT farmerId, name, farmbarangay, crop, size, status FROM tbl_intervention WHERE farmbarangay = '$release_barangay' AND crop = '$release_commodity' AND size = '$release_landsize'";
            if (mysqli_query($con, $sqlinsert)) {
                $sqlinserttwo = "INSERT INTO tbl_released (farmerId, name, farmbarangay, crop, size, status, programtype, program) VALUES (
                    (SELECT farmerId, name, farmbarangay, crop, size, status FROM tbl_intervention WHERE farmbarangay = '$release_barangay' AND crop = '$release_commodity' AND size = '$release_landsize'), '$release_programtype', '$release_programs')";
                        if (mysqli_query($con, $sqlinserttwo)) {
                            echo "
                            <script>
                            Swal.fire({
                                title: 'Gumana ulit btch',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function(){
                                window.location.href = window.location.href;
                            })
                            </script>
                        ";
                    }else{
                        echo "Error updating record: " . mysqli_error($con);
                    }
        }else{
            echo "Error updating record: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
?>

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