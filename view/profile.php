<?php include 'session.php'; ?>
<?php 

    $sql = "SELECT * from user WHERE userid = '$userid'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
        $password  = $rows["password"];
    }

    if (isset($_POST["update"])) {

            $old_pass  = htmlspecialchars($_POST['oldpass']);
            $new_pass  = htmlspecialchars($_POST['newpass']);
            $confirm_pass  = htmlspecialchars($_POST['confirmpass']);
            $hash = password_hash($confirm_pass, PASSWORD_BCRYPT);

            if($old_pass === $password AND $new_pass === $confirm_pass){

                $query = "UPDATE user SET password =:password, hash =:hash WHERE userid =:userid";
                $stmt = $db->prepare($query);
                $row = $stmt->execute([':password' => $confirm_pass, ':hash' => $hash, ':userid' => $userid]);
                
                if($row == true){
                    echo '<script>alert("Password Reset Successful");</script>';
                    echo '<script>window.location="dashboard.php";</script>';
                }
                else{
                    echo '<script>alert("Password Reset Failed");</script>';
                    header("location:profile.php");  
                }
                
            }else{
                
                echo '<script>alert("Credentials Failed to Match");</script>';
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
            <li class="breadcrumb-item active">Password Update</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36);">Update Password
        <!-- <a href="m.php" style="margin-top: -6px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a> -->
      </div>
        <div class="card-body">
          <form method="post">

          <!-- <input type="hidden" value="<?php #echo $row['minid']; ?>"> -->

                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="password" name="oldpass" required class="form-control">
                        <label for="Current Password">Current Password</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="password" name="newpass" required class="form-control">
                        <label for="New Password">New Password</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="password" name="confirmpass" required class="form-control">
                        <label for="Confirm Password">Confirm Password</label>
                      </div>
                    </div>
 

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update" class="btn btn-success text-white" style="width: 100%;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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