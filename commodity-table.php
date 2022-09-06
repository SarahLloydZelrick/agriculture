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
    <title>Commodity</title>
</head>
<body>
    <?php
        include "navbar.php";
        include "topbar.php";

       $tbl = "tbl_";
       $brgy = $_GET['barangay'];
       $brgyname = $tbl.$brgy;
    ?>
    <div class="container w-full ml-0 md:ml-60  md:w-4/5">
        <div class="table_container p-10 gap-5 flex flex-col">
            <h2 class="text-2xl font-bold">Commodity</h2>
           
            <div id="table_master">
                <table id="master_table" style="width:100%;">
                    <h2 class="text-xl">Master List</h2>
                    <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th style="display:none;">Farmer ID</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Land Size</th>
                            <th class="admin-hide">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM $brgyname";
                        $result = mysqli_query($con, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $fullname = $row["surname"]." ".$row["firstname"]." ".$row["middlename"];
                                $h = " hectares";
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $row["id"]; ?> </td>
                                    <td style="display:none;"><?php echo $row["farmerId"]; ?> </td>
                                    <td><?php echo $fullname; ?> </td>
                                    <td><?php echo $row["barangay"]; ?></td>
                                    <td><?php echo $row["sizea1"].$h ; ?></td>
                                    <td class="admin-hide">
                                        <form action="commodity-form.php" method="GET">
                                            <input type="text" name="farmerid" value="<?php echo $row["farmerId"]; ?>" style="display:none;" readonly>
                                            <input type="text" name="barangay" value="<?php echo $row["barangay"]; ?>" style="display:none;" readonly>
                                            <button type="submit" class="fa fa-pencil rounded-lg border-2 border-blue-500/50 p-2 w-9 icon-blue" title="Edit"></button>
                                        </form>
                                       
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
       
    </script>
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
