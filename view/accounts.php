<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USER - Dashboard</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <nav class="navbar navbar-expand static-top" style="height: 70px; background: rgb(30, 30, 30);">

<a class="navbar-brand mr-1 text-white" href="#"> User Panel | <?php echo $username; ?></a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
  <i class="fas fa-bars text-primary"></i>
</button>

<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog fa-spin fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php" >Update Profile</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-sign-out-alt fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>

<div id="wrapper" style="background: url(../images/d.jpg);">

<ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-users"></i>
                <span>Membership</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#member" data-target="#member" data-toggle="modal">Add</a>
                <a class="dropdown-item" href="membership.php">View</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-user"></i>
                <span>Executives</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#executive" data-target="#executive" data-toggle="modal">Add</a>
                <a class="dropdown-item" href="executive.php">View</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-university"></i>
                <span>Departments</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#department" data-target="#department" data-toggle="modal">Add</a>
                <a class="dropdown-item" href="department.php">View</a>
            </div>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Transactions</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#aib" data-target="#aib" data-toggle="modal">Add Items Bought</a>
                <a class="dropdown-item" href="#aml" data-target="#aml" data-toggle="modal">Add Money Lend</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="items_bought.php">View Items Bought</a>
                <a class="dropdown-item" href="money_lend.php">View Money Lend</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Accounts</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#tithe" data-target="#tithe" data-toggle="modal">Add</a>
                <a class="dropdown-item" href="tithe.php">View</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-table"></i>
                <span>Tithe</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#tithe" data-target="#tithe" data-toggle="modal">Add</a>
                <a class="dropdown-item" href="tithe.php">View</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Offering</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="#offering" data-target="#offering" data-toggle="modal">Upload</a>
                <a class="dropdown-item" href="offering.php">View</a>
            </div>
        </li>
    </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Accounts</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-chart-area"></i>
              Accounts Table
                <span class="text-center float-right mr-3 text-white"><a href="accounts_report.php" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="5%">#</th>
                      <th width="30%">Item</th>
                      <th width="30%">Year</th>
                      <th width="30%">Semester</th>
                      <th width="25%">Department</th>
                      <th width="10%">Amount</th>
                      <th width="20%" >Date</th>
                      <th width="10%" >Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php

                    require 'database.php';
                    $query = "SELECT * FROM accounts";
                    $stmt = $db->query($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo ' <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['item'].'</td>
                    <td>'.$row['department'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['date'].'</td>
                    <td><span class="text-center text-white"><a href="account_edit.php?id='.$row['id'].'" class="btn btn-success"><i class="fa fa-fw fa-edit"></i> Edit</a></span></td>
                  </tr>';
                    }
                  ?>

                </tbody>

                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated</div>
          </div>

        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Frend Inc. <span id="output"></span> 
              <script> let d  =  new Date(); output.innerHTML = d.getFullYear();</script>
            </span>
            </div>
          </div>
        </footer>

      </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>