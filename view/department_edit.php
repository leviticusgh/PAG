<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from department WHERE deptid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $department  = $row["department"];
    }

?>

<?php
            if (isset($_POST["update_department"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $dept  = htmlspecialchars($_POST['department']);
                    
                    $query = "UPDATE department SET department =:department WHERE deptid =:deptid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':deptid' => $id, ':department' => $department]);

                    if($row == true){
                      echo '<script>window.location="department.php";</script>';
                    }
                    else{
                      header("location:department_edit.php");  
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

    <div id="wrapper" style="background: url(../images/victory.jpg); background-repeat: no-repeat; background-position: center;">

    <?php include 'sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb" style="font-size: 15px;">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Department</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Department
        <a href="department.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body" style="font-size: 15px;">
          <form method="post">

          <input type="hidden" value="<?php echo $row['deptid']; ?>">

                <div class="form-group">
                <div class="form-label-group">
                  <input type="text" style="font-size: 15px;" value="<?php echo $department; ?>" class="form-control" name="department" required>
                    <label for="Department"> Department</label>
                 </div>
                </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_department"  class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
              </div>
          </form>
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