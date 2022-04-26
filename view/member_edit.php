<?php include 'session.php'; ?>
<?php 

    $id = $_GET["id"];
    $sql = "SELECT * from members WHERE memberid = '$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $firstname = $row["firstname"];
        $surname = $row["surname"];
        $othername = $row["othername"];
        $role = $row["role"];
        $marital_status = $row["marital_status"];
        $gender = $row["gender"];
        $phone_number = $row["phone_number"];
    }

?>

<?php
            if (isset($_POST["update_member"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $surname = htmlspecialchars($_POST['surname']);
                    $othername = htmlspecialchars($_POST['othername']);
                    $role = implode(",",$_POST['role']);
                    $marital_status  = htmlspecialchars($_POST['marital_status']);
                    $gender = htmlspecialchars($_POST['gender']);
                    $phone_number  = htmlspecialchars($_POST['phone_number']);
                    
                    $query = "UPDATE members SET firstname =:firstname, surname =:surname, othername =:othername, role =:role, marital_status =:marital_status, gender =:gender, phone_number =:phone_number WHERE memberid =:memberid";
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute([':memberid' => $id, ':firstname' => $firstname, ':surname' => $surname, ':othername' => $othername, ':role' => $role, ':marital_status' => $marital_status, ':gender' => $gender, ':phone_number' => $phone_number]);

                    if($row == true){
                      echo '<script>window.location="membership.php";</script>';
                    }
                    else{
                      header("location:member_edit.php");  
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

          <ol class="breadcrumb" style="font-size: 15px;">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Membership</li>
          </ol>

<div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">
        <div class="card-header"  style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">Edit Member
        <a href="membership.php" style="margin-top: -6px; font-size: 15px;" class="text-center float-right mr-3 text-white btn btn-primary"><i class="fa fa-fw fa-caret-left"></i> Back</a>
      </div>
        <div class="card-body" style="font-size: 15px;">
          <form method="post">

          <input type="hidden" value="<?php echo $row['memberid']; ?>">

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" required>
                    <label for="Firstname">Firstname</label>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="surname" value="<?php echo $surname; ?>" class="form-control" required>
                    <label for="Surname">Surname</label>
                  </div>
                </div>
                </div>
            </div>

                <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="othername" value="<?php echo $othername; ?>" class="form-control">
                    <label for="Othername">Othername</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                      <input type="number" name="phone_number" value="<?php echo $phone_number; ?>" class="form-control" required>
                      <label for="Phone Number">Phone Number</label>
                  </div>
              </div>
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                <div class="form-label-group">
                    Marital Status :
                  <select class="form-control" name="marital_status" required>
                    <option value="<?php echo $marital_status; ?>"><?php echo $marital_status; ?></option>
                    <option value="Null"> --- MARITAL STATUS --- </option>
                    <option value="Single"> Single </option>
                    <option value="Married"> Married </option>
                    <option value="Divorced"> Divorced </option>
                  </select>
                 </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    Gender :
                    <select class="form-control" name="gender" required>
                      <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                      <option value="Null"> --- GENDER --- </option>
                      <option value="Male"> Male </option>
                      <option value="Female"> Female </option>
                    </select>
                  </div>
                </div>
                </div>
                </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                        <div class="form-label-group">
                          <input type="text" name="role" value="<?php echo $role; ?>" class="form-control" required>
                          <label for="Role">Role</label>
                      </div>
                  </div><br/><br/>
                  <div class="col-md-12">
                            <strong><span>Select Roles : </span></strong><br/><br/>
                                <?php

                                $checked_arr = array();

                                // Fetch checked values
                                $fetchRoles = "SELECT COUNT(*) FROM roles";
                                $stmt = $db->prepare($fetchRoles);
                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                                while ($row = $stmt->fetchColumn()) {
                                $checked_arr = explode(",",$row['role']);
                                }

                                $roles_arr = array("Pastor","Pastor's Wife","Deacon","Deaconess", "Usher", "Musician", "Singer", "Technician", "Church Worker", "Sunday School Teacher", "Children Teacher", "Interpreter");
                                foreach($roles_arr as $role){

                                $checked = "";
                                if(in_array($role,$checked_arr)){
                                    $checked = "checked";
                                }
                                echo '<input type="checkbox" name="role[]" value="'.$role.'" '.$checked.' > '.$role.' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' ;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="update_member" class="btn btn-success text-white" style="width: 100%; font-size: 15px;"> <i class="fa fa-fw fa-save"></i> Save </button></span>
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