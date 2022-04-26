<?php include 'session.php'; ?>
<?php

if(isset($_GET['id'])){
    $sql = "DELETE FROM roles WHERE roleid = '".$_GET['id']."'";
    $query = $db->prepare($sql);
    $query->execute();

    if($query->execute()){

      echo '<script>window.location="role.php";</script>';
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

  <div id="wrapper" style="background: url(../images/d.jpg);">

  <?php include 'sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Role</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-fw fa-user"></i>
              Role Table
              <span class="text-center float-right mr-3 text-white"><a href="role_report.php" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="80%">Role</th>
                      <th width="10%">Edit</th>
                      <th width="10%">Delete</th>
                </tr>
                </thead>
                <tbody>

                  <?php

                    require 'database.php';

                    $query = "SELECT * FROM roles";
                    $stmt = $db->query($query);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                      echo '<tr>
                      <td>' . $row['role'] . '</td>
                      <td><span class="text-center text-white"><a href="role_edit.php?id=' . $row['roleid'] . '" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                      <td><span class="text-center text-white"><a href="role.php?id=' . $row['roleid'] . '" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td>
                    </tr>';
                    }

                  ?>
                </tbody>

                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated</div>
          </div>

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