<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from roles WHERE roleid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $role  = $row["role"];
    }

?>

<?php
            if (isset($_POST["update_role"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $r  = htmlspecialchars($_POST['role']);
                    
                    $query = "UPDATE roles SET role =:role WHERE roleid =:roleid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':roleid' => $id, ':role' => $r]);

                    if($row == true){
                      echo '<script>window.location="role.php";</script>';
                    }
                    else{
                      echo '<script>window.location="role_edit.php";</script>';  
                    }
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

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36);">Edit Role
        <a href="role.php" style="margin-top: -6px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body">
          <form method="post">

          <input type="hidden" value="<?php echo $row['roleid']; ?>">

                <div class="form-group">
                <div class="form-label-group">
                  <input type="text" value="<?php echo $role; ?>" class="form-control" name="role" required>
                    <label for="Role">Role</label>
                 </div>
                </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_role" class="btn btn-success text-white" style="width: 100%;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
              </div>
          </form>
        </div>
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