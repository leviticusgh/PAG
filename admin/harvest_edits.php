<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from harvest WHERE hid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $non_member = $row["non_member"];
        $pledge  = $row["pledge"];
        $payment  = $row["payment"];
        $date_pledge  = $row["date_pledge"];
        $date_payed  = $row["date_payed"];
    }

?>

<?php
            if (isset($_POST["update_harvest"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $pay  = htmlspecialchars($_POST['payment']);
                    $date  = htmlspecialchars($_POST['datetime_payed']);

                    $payed = $payment + $pay;
                    
                    $query = "UPDATE harvest SET payment =:payment, date_payed =:date_payed WHERE hid =:hid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':hid' => $id, ':payment' => $payed, ':date_payed' => $date]);

                    if($row == true){
                      echo '<script>alert("Update Successful");</script>';
                      echo '<script>window.location="harvest.php";</script>';
                    }
                    else{
                      echo '<script>alert("Update Failed");</script>';
                      echo '<script>window.location="harvest_edits.php";</script>';  
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
            <li class="breadcrumb-item active">Harvest</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Update Harvest
        <a href="harvest.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body" style="font-size: 15px;">
          <form method="post">
          <input type="hidden" value="<?php echo $row['hid']; ?>">

            <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" style="font-size: 15px;" value="<?php echo $non_member; ?>" disabled class="form-control" autofocus required>
                    <label for="Fullname">Fullname</label>
                  </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                  <input type="number" style="font-size: 15px;" value="<?php echo $pledge; ?>" class="form-control" disabled required>
                  <label for="Pledge">Pledge</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                  <input type="datetime" style="font-size: 15px;" value="<?php echo $date_pledge; ?>" class="form-control" disabled required>
                  <label for="Pledge">Date Pledge</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="number" style="font-size: 15px;" disabled value="<?php echo $payment?>" class="form-control">
                <label for="Payment">Last Payment Made</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="datetime" style="font-size: 15px;" disabled value="<?php echo $date_payed?>" class="form-control">
                <label for="Last DateTime Updated">Last DateTime Updated</label>
              </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                  <input type="number" style="font-size: 15px;" name="payment" class="form-control">
                  <label for="Payment">Payment</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="datetime-local" style="font-size: 15px;" name="datetime_payed" class="form-control">
                  <label for="DateTime Payed">DateTime Payed</label>
                </div>
              </div>

            <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_harvest" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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
