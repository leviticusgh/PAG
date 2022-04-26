<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from items INNER JOIN members ON members.memberid = items.member INNER JOIN department ON department.deptid = items.department WHERE itemid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $itemid  = $row["itemid"];
        $item  = $row["item"];
        $member  = $row["member"];
        $department  = $row["department"];
        $amount  = $row["amount"];
        $date_time  = $row["date_time"];
        $memberid  = $row["memberid"];
        $deptid  = $row["deptid"];
        $firstname  = $row["firstname"];
        $surname  = $row["surname"];
        $othername  = $row["othername"];
        $name = $firstname . " " . $othername . " " . $surname;

    }

?>

<?php
            if (isset($_POST["update_items"])) {
              
              $id = $_GET["id"];
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $item  = htmlspecialchars($_POST['item']);
                    $member  = htmlspecialchars($_POST['member']);
                    $department  = htmlspecialchars($_POST['department']);
                    $amount  = htmlspecialchars($_POST['amount']);
                    $date_time  = htmlspecialchars($_POST['date_time']);
                    
                    $query = "UPDATE items SET item =:item, member =:member, department =:department, amount =:amount, date_time =:date_time WHERE itemid =:itemid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':itemid' => $itemid, ':item' => $item, ':member' => $member, ':department' => $department, ':amount' => $amount, ':date_time' => $date_time]);

                    if($row == true){
                      echo '<script>window.location="item_view.php";</script>';
                    }
                    else{
                      header("location:items_edit.php");  
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
            <li class="breadcrumb-item active">Items Bought</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Items
        <a href="item_view.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body" style="font-size: 15px;">
          <form method="post">

          <input type="hidden" value="<?php echo $row['itemid']; ?>">

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" style="font-size: 15px;" value="<?php echo $item; ?>" class="form-control" name="item" required>
                        <label for="Item">Item</label>
                    </div>
                </div>

                <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control" name="member" required style="font-size: 15px;">
                      <option value="<?php echo $memberid; ?>"><?php echo $name; ?></option>
                      <option value="Null"> -- MEMBER -- </option>
                      <?php
                          $q1 = "SELECT * FROM members";
                          $stmt = $db->prepare($q1);
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['surname'] . " " . $row['othername'] . "</option>";};
                      ?>
                  </select>
                 </div>
                </div>

                <div class="form-group">
                <div class="form-label-group">
                    <select class="form-control" name="department" required style="font-size: 15px;">
                      <option value="<?php echo $deptid; ?>"><?php echo $department; ?></option>
                      <option value="Null"> -- DEPARTMENT -- </option>
                      <?php
                          $q1 = "SELECT * FROM department";
                          $stmt = $db->prepare($q1);
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo "<option value='" . $row['deptid'] . "'>" . $row['department'] . "</option>";};
                      ?>
                  </select>
                 </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="number" style="font-size: 15px;" value="<?php echo $amount; ?>" class="form-control" name="amount" required>
                        <label for="Amount">Amount</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="datetime" style="font-size: 15px;" value="<?php echo $date_time; ?>" class="form-control" name="date_time" required>
                        <label for="Date and Time">Date and Time</label>
                    </div>
                </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_items" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
              </div>
          </form>
        </div>
      </div>

          <?php include 'footer.php'; ?>

</div>

</div>

<?php include 'modal.php'; ?>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<?php include 'script.php'; ?>

  </body>

</html>