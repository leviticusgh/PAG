<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from offering WHERE ofid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $amount  = $row["amount"];
        $datetime  = $row["datetime"];
    }

?>

<?php
            if (isset($_POST["update_offering"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $amt  = htmlspecialchars($_POST['amount']);
                    $dt  = htmlspecialchars($_POST['datetime']);
                    
                    $query = "UPDATE offering SET amount =:amount, datetime =:datetime WHERE ofid =:ofid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':ofid' => $id, ':amount' => $amt, ':datetime' => $dt]);

                    if($row == true){
                      echo '<script>window.location="offering.php";</script>';
                    }
                    else{
                      echo '<script>window.location="offering_edit.php";</script>';  
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
            <li class="breadcrumb-item active">Offering</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Offering
        <a href="offering.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body">
          <form method="post">

            <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" style="font-size: 15px;" id="amount" value="<?php echo $amount; ?>" name="amount" class="form-control" placeholder="Amount" autofocus required>
                    <label for="Amount">Amount</label>
                  </div>
            </div>

            <div class="form-group">
                    <div class="form-label-group">
                        <input type="datetime" style="font-size: 15px;" value="<?php echo $datetime; ?>" class="form-control" name="datetime" required>
                        <label for="Date and Time">Date and Time</label>
                    </div>
                </div>

            <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_offering" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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
