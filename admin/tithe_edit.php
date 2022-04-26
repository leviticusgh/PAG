<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from tithe INNER JOIN members ON members.memberid = tithe.member WHERE tid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $memberid  = $row["memberid"];
        $firstname  = $row["firstname"];
        $surname  = $row["surname"];
        $othername  = $row["othername"];
        $amount  = $row["amount"];
        $month  = $row["month"];
    }

?>

<?php
            if (isset($_POST["update_tithe"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $member  = htmlspecialchars($_POST['member']);
                    $amt  = htmlspecialchars($_POST['amount']);
                    $mth  = htmlspecialchars($_POST['month']);
                    
                    $query = "UPDATE tithe SET member =:member, amount =:amount, month =:month WHERE tid =:tid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':tid' => $id, ':member' => $member, ':amount' => $amt, ':month' => $mth]);

                    if($row == true){
                      echo '<script>window.location="tithe.php";</script>';
                    }
                    else{
                      echo '<script>window.location="tithe_edit.php";</script>';  
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
            <li class="breadcrumb-item active">Tithe</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Tithe
        <a href="tithe.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body" style="font-size: 15px;">
          <form method="post">
            <div class="form-group">
                    <select name="member" class="form-control" style="font-size: 15px;">
                        <option value="<?php echo $memberid; ?>"><?php echo $firstname . " " . $othername . " " . $surname; ?></option>
                        <option value="Null"> -------------------------------------- </option>
                        <?php 

                          $sql = "SELECT * from members";
                          $stmt = $db->prepare($sql);
                          $stmt->execute();
                          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                              $memberid = $row["memberid"];
                              $fname = $row["firstname"];
                              $sname = $row["surname"];
                              $oname = $row["othername"];
                              
                              echo '
                              <option value="'.$memberid.'">'. $fname . " " . $oname . " " . $sname .'</option>
                              ';
                          }


                      ?>
                    </select>
                </div>

            <div class="form-group">
                  <div class="form-label-group">
                    <input type="month" id="month" style="font-size: 15px;" value="<?php echo $month; ?>" name="month" class="form-control" required>
                    <label for="Month">Month</label>
                  </div>
            </div>

            <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" style="font-size: 15px;" id="amount" value="<?php echo $amount; ?>" name="amount" class="form-control" required>
                    <label for="Amount">Amount</label>
                  </div>
            </div>

            <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_tithe" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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
