<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from money_lend INNER JOIN members ON money_lend.member = members.memberid WHERE mlid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $firstname = $row["firstname"];
        $surname = $row["surname"];
        $othername = $row["othername"];
        $amount = $row["amount"];
        $payed = $row["payment"];
        $datetime_lend = $row["datetime_lend"];
        $datetime_payed = $row["datetime_payed"];
    }

?>

<?php
            if (isset($_POST["update_money"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $payment  = htmlspecialchars($_POST['payment']);
                $datetime_payed  = htmlspecialchars($_POST['datetime_payed']);
                
                $pay = $payment + $payed;

                if($pay > $amount){

                  echo '<script>alert("Money Paid is More than Amount Owed");</script>';
                  echo '<script>window.location="money_lend.php";</script>';
                }else{

                  $query = "UPDATE money_lend SET payment =:payment, datetime_payed =:datetime_payed WHERE mlid =:mlid";
                  $stmt = $db->prepare($query);
                  $row = $stmt->execute([':mlid' => $id, ':payment' => $pay, ':datetime_payed' => $datetime_payed]);

                  if($row == true){
                        echo '<script>window.location="money_lend.php";</script>';
                      }
                      else{
                        echo '<script>window.location="money_lend.php";</script>'; 
                      }
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

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Money Lend</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36);">Update Money Lend
        <a href="money_lend.php" style="margin-top: -6px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body">
          <form method="post">

          <input type="hidden" value="<?php echo $row['mlid']; ?>">
          
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" disabled value="<?php echo $firstname . " " . $othername . " " . $surname?>" class="form-control">
                  <label for="Member">Member</label>
                </div>
              </div>
          
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" disabled value="<?php echo $amount?>" class="form-control">
                  <label for="Amount">Amount</label>
                </div>
              </div>
          
              <div class="form-group">
                <div class="form-label-group">
                  <input type="datetime" disabled value="<?php echo $datetime_lend?>" class="form-control">
                  <label for="DateTime Lend">DateTime Lend</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" disabled value="<?php echo $payed?>" class="form-control">
                  <label for="Payment">Last Payment Made</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="datetime" disabled value="<?php echo $datetime_payed?>" class="form-control">
                  <label for="Last DateTime Updated">Last DateTime Updated</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" name="payment" class="form-control">
                  <label for="Payment">Payment</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="datetime-local" name="datetime_payed" class="form-control">
                  <label for="DateTime Payed">DateTime Payed</label>
                </div>
              </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_money" class="btn btn-success text-white" style="width: 100%;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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