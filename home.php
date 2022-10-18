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
    <title>Dashboard</title>

</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";

        include "config.php";

        $sqlone = "SELECT COUNT(*) FROM tbl_accounts WHERE `userlevel` = 'farmer'";
        $resultone = mysqli_query($con, $sqlone);
        $countfarmer = mysqli_fetch_assoc($resultone)['COUNT(*)'];

        $sqltwo = "SELECT COUNT(*) FROM tbl_accounts WHERE `userlevel` = 'staff'";
        $resulltwo = mysqli_query($con, $sqltwo);
        $countstaff = mysqli_fetch_assoc($resulltwo)['COUNT(*)'];

        $sqlthree = "SELECT COUNT(*) FROM tbl_accounts";
        $resullthree = mysqli_query($con, $sqlthree);
        $countacct = mysqli_fetch_assoc($resullthree)['COUNT(*)'];

        $sqlfour = "SELECT COUNT(*) FROM tbl_accounts WHERE `stat` = 'active'";
        $resullfour = mysqli_query($con, $sqlfour);
        $countactive = mysqli_fetch_assoc($resullfour)['COUNT(*)'];


    ?>
    <div class="container flex flex-col p-10 ml-0 w-screen md:ml-60 " >
        <div class="card_container gap-5 pb-5 flex flex-col items-center md:flex-row">
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-sm md:text-lg font-bold">NUMBER OF FARMERS</p>
                <p class="text-sm font-bold md:text-xl"><?php echo $countfarmer; ?></p>
            </div>
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-sm md:text-lg font-bold">NUMBER OF STAFF</p>
                <p class="text-sm font-bold md:text-xl"><?php echo $countstaff; ?></p>
            </div>
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-sm md:text-lg font-bold">ACTIVE ACCOUNTS</p>
                <p class="text-sm font-bold md:text-xl"><?php echo $countactive; ?></p>
            </div>
            <div class="flex flex-col w-auto rounded-lg bg-white shadow-lg p-10 w-4/5 gap-5">
                <p class="text-sm md:text-lg font-bold">TOTAL NUMBER OF ACCOUNTS</p>
                <p class="text-sm font-bold md:text-xl"><?php echo $countacct; ?></p>
            </div>

        </div>
        <!--div class="flex flex-col" style="overflow: scroll;height:60vh;">
            <div class="top_chart w-auto flex flex-col md:flex-row">
                <?php include "chartone.php"; ?>
                <div class="chart_one md:w-1/2 p-10  w-full">
                    <div id="chartContainer1" style="height: 310px; width: 100%;"></div>
                </div>
                <div class="chart_two md:w-1/2 p-10  w-full">
                    <div id="chartContainer2" style="height: 310px; width: 100%;"></div>
                </div>
            </div>
            <div class="bottom_chart w-full p-10">
                <div class="chart_three">
                    <div id="chartContainer3" style="height: 310px; width: 100%;"></div>
                </div>
            </div>
        </div-->
        <?php
            include "footer.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>