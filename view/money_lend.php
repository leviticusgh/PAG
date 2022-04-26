<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

  <?php include 'header.php'; ?>

</head>

<body id="page-top">

<?php include 'navbar.php'; ?>

  <div id="wrapper" style="background: url(../images/victory.jpg); background-repeat: no-repeat; background-position: center;">

  <?php include 'sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb" style="font-size: 15px;">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Money Lend</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header" style="font-size: 15px;">
              <i class="fas fa-fw fa-chart-line"></i>
              Money Lend Table
                <span class="text-center float-right mr-3 text-white"><a href="money_report.php" style="font-size: 15px;" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
              </div>
            <div class="card-body" style="font-size: 15px;">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>

                      <th width="24%">Member</th>
                      <th width="8%">Amount</th>
                      <th width="8%">Payment</th>
                      <th width="20%" >Date (Lend)</th>
                      <th width="20%" >Date (Payed)</th>
                      <th width="10%" >Status</th>
                      <th width="10%" >Update</th>
                </tr>
                </thead>
                <tbody>
                <?php

                    require 'database.php';
                    $query = "SELECT * FROM money_lend INNER JOIN members ON members.memberid = money_lend.member";
                    $stmt = $db->query($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo ' <tr>
                    <td>'.$row['firstname']." ".$row['othername']. " ".$row['surname'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['payment'].'</td>
                    <td>'.$row['datetime_lend'].'</td>
                    <td>'.$row['datetime_payed'].'</td>
                    <td class="center">'; 
                    if($row['amount'] == $row['payment']) {
                    echo '<a href="#" class="btn btn-success btn-xs">Payed</a>';
                      } elseif( $row['amount'] != $row['payment']) {
                      echo '<a href="#" class="btn btn-danger btn-xs">Owing</a>';
                       }
                      echo'</td>
                      <td class="center">'; 
                      if($row['amount'] == $row['payment']) {
                      echo '<a href="#" class="btn btn-primary btn-xs">Done</a>';
                        } elseif( $row['amount'] != $row['payment']) {
                        echo '<span class="text-center text-white"><a href="harvest_edit.php?id='.$row['mlid'].'" class="btn btn-success"><i class="fa fa-fw fa-edit"></i> Edit</a></span>';
                         }
                        echo'</td>
                  </tr>';
                    }
                  ?>

                </tbody>

                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated</div>
          </div>

          <?php include 'footer.php'; ?>

</div>

</div>
<?php include 'script.php'; ?>

<?php include 'modal.php'; ?>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>


  </body>

</html>