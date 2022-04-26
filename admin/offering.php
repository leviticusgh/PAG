<?php include 'session.php'; ?>
<?php

if(isset($_GET['id'])){
    $sql = "DELETE FROM offering WHERE ofid = '".$_GET['id']."'";
    $query = $db->prepare($sql);
    $query->execute();

    if($query->execute()){

      echo '<script>window.location="offering.php";</script>';
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
            <li class="breadcrumb-item active">Offering</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header" style="font-size: 15px;">
              <i class="fas fa-fw fa-dollar-sign"></i>
              Offering Table
              <span class="text-center float-right mr-3 text-white"><a href="offering_report.php" style="font-size: 15px;" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
              </div>
            <div class="card-body" style="font-size: 15px;">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="5%">#</th>
                      <th width="40%">Amount</th>
                      <th width="35%" >Date and Time</th>
                      <th width="10%" >Edit</th>
                      <th width="10%" >Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

                    require 'database.php';
                    $query = "SELECT * FROM offering";
                    $stmt = $db->query($query);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo ' <tr>
                    <td>'.$row['ofid'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['datetime'].'</td>
                    <td><span class="text-center text-white"><a href="offering_edit.php?id='.$row['ofid'].'" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                    <td><span class="text-center text-white"><a href="offering.php?id='.$row['ofid'].'" onclick="return confirm("Are you sure you want to delete this file?");" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td>
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