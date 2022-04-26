<!DOCTYPE html>
<html lang="en">
<head>

    <title>Report</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="print" href="print.css">

</head>
<body>

<div class="responsive">
    <H2 class="text-center print" style="margin-top: 30px">LIST OF MEMBERS</H2>
    <span class="text-center text-white float-left" style="margin-top: -40px; padding-left: 70px;"><a href="membership.php" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Back </a></span>
    <span class="text-center text-white float-right" style="margin-top: -40px; padding-right: 70px;"><a href="members_report.php" onclick="window.print()" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
</div>

    <div class="table-responsive print" style="margin: 0 auto; margin-top: 30px; padding-left: 70px; padding-right: 70px;">

        <table  class="table table-bordered print" >

            <thead style="font-weight: bold;">
                <td>Fullname</td>
                <td>Date Of Birth</td>
                <td>Phone Number</td>
                <td>Gender</td>
                <td>Ministry</td>
                <td>Residence</td>
                <td>Occupation</td>
            </thead>

            <tbody>
            <?php
                    require 'database.php';

                    $query = "SELECT * FROM members INNER JOIN ministries ON ministries.minid = members.ministry WHERE members.gender = 'Male'";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  

                    echo '<tr>
                    <td>' . $row['firstname'] . " " . $row['surname'] . " " . $row['othername'] . '</td>
                    <td>'.$row['dob'].'</td>
                    <td>'.$row['phone_number'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['ministry'].'</td>
                    <td>'.$row['residence'].'</td>
                    <td>'.$row['occupation'].'</td>
                    </tr>';
                }
                ?>
</tbody>

</table>

</div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../js/sb-admin.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    
</body>
</html>