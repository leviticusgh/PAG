<?php include 'session.php'; ?>
<?php

if(isset($_GET['id'])){
    $sql = "DELETE FROM ministries WHERE minid = '".$_GET['id']."'";
    $query = $db->prepare($sql);
    $query->execute();

    if($query->execute()){

      echo '<script>window.location="ministry.php";</script>';
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
            <li class="breadcrumb-item active">Ministry</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header" style="font-size: 15px;">
              <i class="fas fa-fw fa-graduation-cap"></i>
              Ministry Table              
              </div>
            <div class="card-body" style="font-size: 15px;"> 
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="80%">Ministry</th>
                      <th width="10%">Edit</th>
                      <th width="10%">Delete</th>
                    </tr>
                </thead>
                <tbody>

                  <?php

                    require 'database.php';
                    $query = "SELECT * FROM ministries";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>
                                <td>' . $row['ministry'] . '</td>
                                <td><span class="text-center text-white" ><a href="ministry_edit.php?id=' . $row['minid'] . '" class="btn btn-success text-white"><i class="fa fa-fw fa-edit"></i></a></span></td>
                                <td><span class="text-center text-white" ><a href="ministry.php?id=' . $row['minid'] . '" class="btn btn-danger text-white"><i class="fa fa-fw fa-trash"></i></a></span></td>
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