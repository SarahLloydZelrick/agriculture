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
    <title>Select Barangay</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="add_container pt-10 ml-0 md:ml-60">
        <div class="flex justify-center pb-32 md:pb-0">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 md:w-96">
            <h2 class="text-2xl font-bold">Select a barangay</h2>       
                <form action="viewrsbsa.php" method="GET" class="flex flex-col gap-5">
                        <div class="first_row flex flex-row gap-5 w-full">
                            <div class="flex flex-col gap-2 w-full">
                                <label for="">Barangay</label>
                                <select name="barangay" id="" class="form-input">
                                <?php
                                    include "config.php";
                                    $sql = "SELECT * FROM `tbl_barangay`";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                         <option value="<?php echo $row['barangay'];?>"><?php echo $row['barangay']; ?></option>
                                <?php
                                        }
                                    } else {
                                    echo "0 results";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <input class="btn-primary w-full mt-2" name="btnsubmit" type="submit" value="Submit">
                    </form>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>


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
