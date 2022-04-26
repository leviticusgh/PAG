<?php include 'session.php'; ?>
<?php

if(isset($_GET['id'])){
    $sql = "DELETE FROM items WHERE itemid = '".$_GET['id']."'";
    $query = $db->prepare($sql);
    $query->execute();

    if($query->execute()){

      echo '<script>window.location="item_view.php";</script>';
    }

    else{

        echo '<script>alert("Not Deleted");</script>';
    }
}

?>
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
            <li class="breadcrumb-item active">Items Bought</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header" style="font-size: 15px;">
              <i class="fas fa-fw fa-chart-line"></i>
              Items Bought Table
              <span class="text-center float-right mr-3 text-white"><a href="item_report.php" style="font-size: 15px;" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
              </div>
            <div class="card-body" style="font-size: 15px;">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="26%">Item</th>
                      <th width="20%">Member</th>
                      <th width="17%">Department</th>
                      <th width="10%">Amount</th>
                      <th width="12%">Date and Time</th>
                      <th width="7%">Edit</th>
                      <th width="8%">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

                  $query = "SELECT * FROM items INNER JOIN members ON members.memberid = items.member INNER JOIN department ON department.deptid = items.department";
                  $stmt = $db->query($query);
                  $stmt->execute();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                ?>
                <tr>
                    <td><?php echo $row['item'] ?></td>
                    <td><?php echo $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['amount'] ?></td>
                    <td><?php echo $row['date_time'] ?></td>
                    <td><span class="text-center text-white"><a href="items_edit.php?id=<?php echo $row['itemid'] ?>" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                    <td><span class="text-center text-white"><a href="item_view.php?id=<?php echo $row['itemid'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td>
                </tr>

                <?php

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