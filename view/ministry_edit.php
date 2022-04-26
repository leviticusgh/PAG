<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from ministries WHERE minid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $ministry  = $row["ministry"];
    }

?>

<?php
            if (isset($_POST["update_ministry"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ministry  = htmlspecialchars($_POST['ministry']);
                    
                    $query = "UPDATE ministries SET ministry =:ministry WHERE minid =:minid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':minid' => $id, ':ministry' => $ministry]);

                    if($row == true){
                      echo '<script>window.location="ministry.php";</script>';
                    }
                    else{
                      echo '<script>window.location="ministry.php";</script>';
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
            <li class="breadcrumb-item active">Ministry</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Ministry
        <a href="ministry.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body">
          <form method="post">

          <input type="hidden" value="<?php echo $row['minid']; ?>">

                <div class="form-group">
                  <div class="form-label-group">
                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="text" name="ministry" style="font-size: 15px;" value="<?php echo $ministry?>" class="form-control">
                        <label for="Ministry">Ministry</label>
                      </div>
                    </div>
                  </div>
                </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_ministry" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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