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
    <title>Corm Report</title>

</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";

    ?>
    <div class="container flex flex-col p-10 ml-0 w-fit md:ml-60 " >
        <div class="flex justify-center">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 gap-5">
                <h2 class="text-2xl font-bold">Consolidation Corn Planting</h2>
                <div class="flex flex-col gap-2">
                    <form type="get" action="for-corn-report.php" class="flex flex-col gap-2">
                        <div class="flex flex-row gap-5">
                            <div class="flex flex-col">
                                <label>Date To:</label>
                                <input type="date" name="dateto" id="" value="" class="form-input">
                            </div>
                            <div class="flex flex-col">
                                <label>Date From:</label>
                                <input type="date" name="datefrom" id="" value="" class="form-input">
                            </div>
                        </div>
                        <label for="">Report Type</label>
                        <select name="type" id="" class="form-input">
                            <option value="add">Add new</option>
                            <option value="view">View</option>
                        </select>
                        <input type="submit" name="btnsubmit" value="Submit" class="btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>