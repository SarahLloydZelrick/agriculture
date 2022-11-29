<?php
ini_set('display_errors', 1);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
    $session_barangay = "tbl_".$_SESSION['barangay'];
    $session_number = $_SESSION['number'];

    include "config.php";
    $sqlId = "SELECT `farmerId` FROM $session_barangay WHERE number = '".$session_number."'";
    $resultId = mysqli_query($con, $sqlId);
    if (mysqli_num_rows($resultId) > 0) {
        while($rowId = mysqli_fetch_assoc($resultId)) {
            $_SESSION['farmerId'] = $rowId['farmerId'];
        }
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
    <title>Intervention</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";
    ?>
    <div class="container w-full ml-0 md:ml-60  md:w-4/5">
        <div class="table_container p-10 gap-5 flex flex-col">
            <h2 class="text-2xl font-bold">Audit Trail</h2>
            
            <div id="table_master">
                <table id="master_table" style="width:100%;">
                    <h2 class="text-xl"></h2>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action location</th>
                            <th>Action taken</th>
                            <th>Date and Time of action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $sql = "SELECT * FROM `audit_trail` ORDER BY `audit_trail`.`id` DESC`";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dateadd = $row["date"];
                                $dt = new DateTime($dateadd);
                                $dateadded = $dt->format('m-d-Y');
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td><?php echo $row["name"]; ?> </td>
                                    <td><?php echo $row["action"]; ?></td>
                                    <td><?php echo $row["actionto"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td>
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
    <script>
        $(document).ready( function () {
            $('#master_table').DataTable(
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
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    


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