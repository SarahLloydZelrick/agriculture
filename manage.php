<?php
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
    <title>Manage Account</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="container w-full ml-0 md:ml-60  md:w-4/5">
        <div class="table_container p-10 gap-5 flex flex-col">
            <h2 class="text-2xl font-bold">Manage Accounts</h2>
            <div class="table_buttons flex flex-row gap-5 overflow-scroll ">
                <button 
                class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewAll()"
                >
                    View all accounts
                </button>
                <button 
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewApproved()"
                >
                    View approved accounts
                </button>
                <button 
                class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewPending()"
                >
                    View pending accounts
                </button>
                <button 
                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                onclick="viewRejected()"
                >
                    View rejected accounts
                </button>
            </div>
            
            <div id="table_pending">
                <table id="pending_table" style="width:100%;">
                    <h2 class="text-xl">Pending Accounts</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User level</th>
                            <th>Status</th>
                            <th class="admin-hide">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT id, CONCAT(name,' ',middlename,' ',lastname) as fullname, email, userlevel, status FROM tbl_accounts WHERE status = 'pending'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["fullname"]; ?> </td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["userlevel"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td class="admin-hide">
                                        <button class="fa fa-check rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue" title="Approve account" data-bs-toggle="modal" data-bs-target="#approveModal"></button>
                                        <button class="fa fa-times rounded-lg border-2 border-red-500/50 p-2 w-9 icon-red" title="Reject account" data-bs-toggle="modal" data-bs-target="#rejectModal"></button>
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
            <!-- ALL ACCOUNTS-->
            <div id="table_all" style="display:none;">
                <table id="all_table" class="hover"  style="width:100%;">
                    <h2 class="text-xl">All Accounts</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th style="display:none;">Number</th>
                            <th>Email</th>
                            <th>User level</th>
                            <th style="display:none;">Address</th>
                            <th style="display:none;">Sex</th>
                            <th style="display:none;">Age</th>
                            <th style="display:none;">date created</th>
                            <th>Status</th>
                            <th style="display:none;">Photo</th>
                            <th style="display:none;">Acct stat</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT id, CONCAT(name,' ',middlename,' ',lastname) as fullname, email, userlevel,number,address,sex,age,status,datecreated,photo,stat FROM tbl_accounts";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["fullname"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["number"]; ?> </td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["userlevel"]; ?></td>
                                    <td style="display:none;"><?php echo $row["address"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["sex"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["age"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["datecreated"]; ?> </td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td style="display:none;"><?php echo $row["photo"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["stat"]; ?> </td>
                                    <td>
                                        <?php 
                                            $acctstat =  $row["stat"];
                                            if($acctstat == "active"){
                                                echo '<div class="rounded-full w-24 h-auto bg-green-500 text-white flex justify-center">Active</div>';
                                            }else{
                                                echo '<div class="rounded-full w-24 h-auto bg-red-500 text-white flex justify-center">Inactive</div>';
                                            }    
                                        ?> 

                                    </td>
                                    <td>
                                    <button class="fa fa-eye rounded-lg border-2 border-green-500/50 p-2 w-9 icon-green" title="View account" data-bs-toggle="modal" data-bs-target="#all_table_modal"></button>
                                    <?php 
                                        if($acctstat == "inactive"){
                                            echo '<button class="fa fa-thumbs-up rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue admin-hide" title="Activate Account" data-bs-toggle="modal" data-bs-target="#activateModal"></button>';
                                        }else{
                                            echo '<button class="fa fa-thumbs-down rounded-lg border-2 border-red-500/50 p-2 w-9 icon-red admin-hide" title="Deactivate Account" data-bs-toggle="modal" data-bs-target="#deactivateModal"></button>';
                                        }
                                    ?>
                                    
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
             <!-- MODAL ACTIVATE -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="activateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    Activate the account of <input type="text" name="activate_name" id="activate_name" class="modal_input" readonly>
                                    <input type="text" name="activate_id" id="activate_id" style="display:none;">

                                    <p class="text-sm">To continue, please enter your PIN</p>
                                    <input type="password" name="" id="reg_pass_activate" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                                    <input type="password" name="" id="reg_confirm_pass_activate" class="form-input">
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
                                    name="btn_activate"
                                    id="btn_activate"
                                    disabled="true"
                                    style="background-color:gray;">Activate account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL ACTIVATE -->
            <!-- MODAL DEACTIVAYE -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="deactivateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    Deactivate the account of <input type="text" name="deactivate_name" id="deactivate_name" class="modal_input" readonly>
                                    <input type="text" name="deactivate_id" id="deactivate_id" style="display:none;">

                                    <p class="text-sm">To continue, please enter your PIN</p>
                                    <input type="password" name="" id="reg_pass_deactivate" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                                    <input type="password" name="" id="reg_confirm_pass_deactivate" class="form-input">
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
                                    name="btn_deactivate"
                                    id="btn_deactivate"
                                    disabled="true"
                                    style="background-color:gray;">Deactivate account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL DEACTIVAYE -->
            <!-- REJECTED ACCOUNTS -->
            <div id="table_rejected" style="display:none;">
                <table id="rejected_table">
                    <h2 class="text-xl">Rejected Accounts</h2>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT id, CONCAT(name,' ',middlename,' ',lastname) as fullname, email, userlevel, status FROM tbl_accounts WHERE status = 'rejected'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $row["fullname"]; ?> </td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["userlevel"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
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
            <!-- APPROVED ACCOUNTS -->
            <div id="table_approved" style="display:none;">
                <table id="approved_table" style="width:100%;">
                    <h2 class="text-xl">Approved Accounts</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User level</th>
                            <th>Status</th>
                            <th class="admin-hide">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT id, CONCAT(name,' ',middlename,' ',lastname) as fullname, email, userlevel, status FROM tbl_accounts WHERE status = 'approved'";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["fullname"]; ?> </td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["userlevel"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td class="admin-hide">
                                        <button class="fa fa-times rounded-lg border-2 border-red-500/50 p-2 w-9 icon-red" title="Reject account" data-bs-toggle="modal" data-bs-target="#rejectModal2"></button>
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

    <!-- Modal Pending -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Approve the account of <input type="text" name="pending_name" id="pending_name" class="modal_input font-bold" readonly>
                            <input type="text" name="pending_id" id="pending_id" style="display:none;">

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
                            name="btn_pending"
                            id="btn_pending"
                            disabled="true"
                            style="background-color:gray;"
                            >Approve account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Reject -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Reject the account of <input type="text" name="reject_name" id="reject_name" class="modal_input" readonly>
                            <input type="text" name="reject_id" id="reject_id" style="display:none;">

                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_reject" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_reject" class="form-input">
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
                            name="btn_reject"
                            id="btn_reject"
                            disabled="true"
                            style="background-color:gray;">Reject account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL REJECT -->
    <!-- MODAL REJECT 2 -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="rejectModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            Reject the account of <input type="text" name="reject_name2" id="reject_name2" class="modal_input" readonly>
                            <input type="text" name="reject_id2" id="reject_id2" style="display:none;">

                            <p class="text-sm">To continue, please enter your PIN</p>
                            <input type="password" name="" id="reg_pass_reject_two" class="form-input" value="<?php echo $_SESSION['pin']; ?>" style="display:none;">
                            <input type="password" name="" id="reg_confirm_pass_reject_two" class="form-input">
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
                            name="btn_reject2"
                            id="btn_reject_two"
                            disabled="true"
                            style="background-color:gray;">Reject account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL REJECT 2 -->

        <!-- Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="all_table_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">User Account</h5>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa fa-times"></span>
                    </button>
                </div>
                <div class="modal-body flex flex-col p-4 gap-2">
                    <div class="h-48 w-48">
                        <img src="" id="all_photo" alt="">
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Name</label>
                            <input class="text-left" type="button" id="all_name">
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Number</label>
                            <input class="text-left" type="button" id="all_number">
                        </div>   
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Email</label>
                            <input class="text-left" type="button" id="all_email">
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">User level</label>
                            <input class="text-left" type="button" id="all_userlevel">
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="font-bold" for="">Address</label>
                        <input class="text-left" type="button" id="all_address">
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Sex</label>
                            <input class="text-left" type="button" id="all_sex">
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Age</label>
                            <input class="text-left" type="button" id="all_age">
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Date Created</label>
                            <input class="text-left" type="button" id="all_date">
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label class="font-bold" for="">Status</label>
                            <input class="text-left" type="button" id="all_status">
                        </div>
                    </div>
                    <div id="all_acctstat">
                        dd
                    </div>
                </div>
            </div>
        </div>
    
    
    
   
    <script>
        $(document).ready( function () {
            $('#pending_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true
                }
            );
        } );
        $(document).ready( function () {
            $('#all_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                         'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true
                }
            );
        } );
        $(document).ready( function () {
            $('#rejected_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true
                }
            );
        } );
        $(document).ready( function () {
            $('#approved_table').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true
                }
            );
        } );
    </script>
    <script>
        function viewAll() {
            var x = document.getElementById("table_all");
            var y = document.getElementById("table_pending");
            var z = document.getElementById("table_rejected");
            var a = document.getElementById("table_approved");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
                a.style.display = "none";
            } else {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
                a.style.display = "none";
            }
        }

        function viewPending() {
            var x = document.getElementById("table_all");
            var y = document.getElementById("table_pending");
            var z = document.getElementById("table_rejected");
            var a = document.getElementById("table_approved");
            if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
                z.style.display = "none";
                a.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "block";
                z.style.display = "none";
                a.style.display = "none";
            }
        }

        function viewRejected() {
            var x = document.getElementById("table_all");
            var y = document.getElementById("table_pending");
            var z = document.getElementById("table_rejected");
            var a = document.getElementById("table_approved");
            if (z.style.display === "none") {
                z.style.display = "block";
                x.style.display = "none";
                y.style.display = "none";
                a.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
                a.style.display = "none";
            }
        }

        function viewApproved() {
            var x = document.getElementById("table_all");
            var y = document.getElementById("table_pending");
            var z = document.getElementById("table_rejected");
            var a = document.getElementById("table_approved");
            if (a.style.display === "none") {
                a.style.display = "block";
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "none";
                a.style.display = "block";
                z.style.display = "none";
            }
        }
    </script>

    <script>
        var table = document.getElementById('pending_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("pending_id").value = this.cells[0].innerHTML;
                document.getElementById("reject_id").value = this.cells[0].innerHTML;
                document.getElementById("pending_name").value = this.cells[1].innerHTML;
                document.getElementById("reject_name").value = this.cells[1].innerHTML;

            };

        }   
    </script>
    <script>
        var table = document.getElementById('approved_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("reject_id2").value = this.cells[0].innerHTML;
                document.getElementById("reject_name2").value = this.cells[1].innerHTML;

            };

        }   
    </script>
    <script>
        var table = document.getElementById('all_table');         
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {  
                //rIndex = this.rowIndex;
                document.getElementById("all_name").value = this.cells[1].innerHTML;
                document.getElementById("all_number").value = this.cells[2].innerHTML;
                document.getElementById("all_email").value = this.cells[3].innerHTML;
                document.getElementById("all_userlevel").value = this.cells[4].innerHTML;
                document.getElementById("all_address").value = this.cells[5].innerHTML;
                document.getElementById("all_sex").value = this.cells[6].innerHTML;
                document.getElementById("all_age").value = this.cells[7].innerHTML;
                document.getElementById("all_date").value = this.cells[8].innerHTML;
                document.getElementById("all_status").value = this.cells[9].innerHTML;
                document.getElementById("all_photo").src = this.cells[10].innerHTML;
                document.getElementById("all_acctstat").html = this.cells[12].innerHTML;
                document.getElementById("activate_name").value = this.cells[1].innerHTML;
                document.getElementById("activate_id").value = this.cells[0].innerHTML;
                document.getElementById("deactivate_name").value = this.cells[1].innerHTML;
                document.getElementById("deactivate_id").value = this.cells[0].innerHTML;


            };

        }   
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    
    <script>
        //Pending
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
        //Pending Table - Reject
        $("#reg_confirm_pass_reject").blur(function() {
            var user_pass_pending = $("#reg_pass_reject").val();
            var user_pass2_pending = $("#reg_confirm_pass_reject").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_reject").css("background","red");
                $("#btn_reject").prop('disabled',false)//use prop()
            } else {
                $("#btn_reject").css("background","gray");
                $("#btn_reject").prop('disabled',true)//use prop()
            }

        });
        //Reject
        $("#reg_confirm_pass_reject_two").blur(function() {
            var user_pass_pending = $("#reg_pass_reject_two").val();
            var user_pass2_pending = $("#reg_confirm_pass_reject_two").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_reject_two").css("background","red");
                $("#btn_reject_two").prop('disabled',false)//use prop()
            } else {
                $("#btn_reject_two").css("background","gray");
                $("#btn_reject_two").prop('disabled',true)//use prop()
            }

        });
        //Activate
        $("#reg_confirm_pass_activate").blur(function() {
            var user_pass_pending = $("#reg_pass_activate").val();
            var user_pass2_pending = $("#reg_confirm_pass_activate").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_activate").css("background","blue");
                $("#btn_activate").prop('disabled',false)//use prop()
            } else {
                $("#btn_activate").css("background","gray");
                $("#btn_activate").prop('disabled',true)//use prop()
            }

        });
        //Deactivate
        $("#reg_confirm_pass_deactivate").blur(function() {
            var user_pass_pending = $("#reg_pass_deactivate").val();
            var user_pass2_pending = $("#reg_confirm_pass_deactivate").val();
            //var enter = $("#enter").val();

            if (user_pass_pending == user_pass2_pending) {
                $("#btn_deactivate").css("background","red");
                $("#btn_deactivate").prop('disabled',false)//use prop()
            } else {
                $("#btn_deactivate").css("background","gray");
                $("#btn_deactivate").prop('disabled',true)//use prop()
            }

        });
    </script>
</body>
</html>

<?php
if (isset($_POST['btn_pending'] )) {

    $pending_id = $_POST['pending_id'];

    include "config.php";

    $sql = "UPDATE tbl_accounts SET status='approved' WHERE id='".$pending_id."'";

    if (mysqli_query($con, $sql)) {
    //echo "Record updated successfully";
    echo "
        <script>
        Swal.fire({
            title: 'Account approved successfully',
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

    mysqli_close($con);

    }

?>

<?php
if (isset($_POST['btn_reject'] )) {

    $reject_id = $_POST['reject_id'];

    include "config.php";

    $sql = "UPDATE tbl_accounts SET status='rejected' WHERE id='".$reject_id."'";

    if (mysqli_query($con, $sql)) {
        echo "
        <script>
        Swal.fire({
            title: 'Account rejected successfully',
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

    mysqli_close($con);

    }

?>

<?php
if (isset($_POST['btn_reject2'] )) {

    $reject_id2 = $_POST['reject_id2'];

    include "config.php";

    $sql = "UPDATE tbl_accounts SET status='rejected' WHERE id='".$reject_id2."'";

    if (mysqli_query($con, $sql)) {
        echo "
        <script>
        Swal.fire({
            title: 'Account rejected successfully',
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

    mysqli_close($con);

    }

?>

<?php
if (isset($_POST['btn_activate'] )) {

    $activate_id = $_POST['activate_id'];

    include "config.php";

    $sql = "UPDATE tbl_accounts SET stat='active' WHERE id='".$activate_id."'";

    if (mysqli_query($con, $sql)) {
        echo "
        <script>
        Swal.fire({
            title: 'Account activated successfully',
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

    mysqli_close($con);

    }

?>

<?php
if (isset($_POST['btn_deactivate'] )) {

    $deactivate_id = $_POST['deactivate_id'];

    include "config.php";

    $sql = "UPDATE tbl_accounts SET stat='inactive' WHERE id='".$deactivate_id."'";

    if (mysqli_query($con, $sql)) {
        echo "
        <script>
        Swal.fire({
            title: 'Account deactivated successfully',
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