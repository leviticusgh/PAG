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
    <H2 class="text-center print" style="margin-top: 30px">ANNUAL HARVEST LIST</H2>
    <span class="text-center text-white float-left" style="margin-top: -40px; padding-left: 70px;"><a href="harvest.php" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Back </a></span>
    <span class="text-center text-white float-right" style="margin-top: -40px; padding-right: 70px;"><a href="harvest_report.php" onclick="window.print()" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
</div>

<div class="table-responsive print" style="margin: 0 auto; margin-top: 30px; padding-left: 70px; padding-right: 70px;">

<table  class="table table-bordered print" >

<thead style="font-weight: bold;">
    <td>Name</td>
    <td>Pledge</td>
    <td>Payment</td>
    <td>Date Pledge</td>
    <td>Date Payed </td>
</thead>

<tbody>
<?php
                    require 'database.php';
                    $query = "SELECT * FROM harvest INNER JOIN members ON members.memberid = harvest.member WHERE non_member = 'Null'";
                    $stmt = $db->query($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   

                    echo '<tr>
                    <td>'.$row['firstname']." ". $row['othername']." ". $row['surname'].'</td>
                    <td>'.$row['pledge'].'</td>
                    <td>'.$row['payment'].'</td>
                    <td>'.$row['date_pledge'].'</td>
                    <td>'.$row['date_payed'].'</td>
                    </tr>';
                    }
                  ?>
                  <?php
                    require 'database.php';
                    $query = "SELECT * FROM harvest WHERE member = 'Null'";
                    $stmt = $db->query($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   

                    echo '<tr>
                    <td>'.$row['non_member'].'</td>
                    <td>'.$row['pledge'].'</td>
                    <td>'.$row['payment'].'</td>
                    <td>'.$row['date_pledge'].'</td>
                    <td>'.$row['date_payed'].'</td>
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