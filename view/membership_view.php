<?php include 'session.php'; ?>
<?php

if(isset($_GET['id'])){
    $sql = "DELETE FROM members WHERE memberid = '".$_GET['id']."'";
    $query = $db->prepare($sql);
    $query->execute();

    if($query->execute()){

      echo '<script>window.location="membership.php";</script>';
    }

    else{

        echo '<script>alert("Not Deleted");</script>';
    }
}

?>
<?php

    if(isset($_POST['view_member'])){

    $view = $_POST['view_member'];

    $gen = htmlspecialchars($_POST['gender']);

    if($gen == 'Null'){

      echo '<script>alert("Invalid Input");</script>';
      echo '<script>window.location="membership.php";</script>';

    }  
    elseif($gen == 'Males'){

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
                                    <li class="breadcrumb-item active">Membership</li>
                                  </ol>
                        
                                  <div class="card mb-3">
                                    <div class="card-header" style="font-size: 15px;">
                                      <i class="fas fa-fw fa-users"></i>
                                      Membership Table
                                      <span class="text-center float-right mr-3 text-white"><a href="member_report_male.php" style="font-size: 15px;" name="print" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
                                      </div>
                                    <div class="card-body" style="font-size: 15px;">
                                      <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th width="35%">Name</th>
                                              <th width="15%">Role</th>
                                              <th width="10%">Ministry</th>
                                              <th width="10%">DOB</th>
                                              <th width="10%">Phone Number</th>
                                              <th width="10%">Edit</th>
                                              <!-- <th width="10%">Delete</th> -->
                                            </tr>
                                          </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM members INNER JOIN ministries ON ministries.minid = members.ministry WHERE members.gender = 'Male'";
                                            $stmt = $db->prepare($query);
                                            $stmt->execute();
                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                                  ?>
                                            <tr>
                                              <td><?php echo $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] ?></td>
                                              <td><?php echo $row['role'] ?></td>
                                              <td><?php echo $row['ministry'] ?></td>
                                              <td><?php echo $row['dob'] ?></td>
                                              <td><?php echo $row['phone_number'] ?></td>
                                              <td><span class="text-center text-white"><a href="member_edit.php?id=<?php echo $row['memberid'] ?>" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                                              <!-- <td><span class="text-center text-white"><a href="membership_view.php?id=<?php echo $row['memberid'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td> -->
                                            </tr>
                        
                                            <?php 
                                                }
                                            ?>
                                            </tbody>

                    <?php

                      }
                      elseif($gen == 'Females'){
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
                                    <li class="breadcrumb-item active">Membership</li>
                                  </ol>
                        
                                  <div class="card mb-3">
                                    <div class="card-header" style="font-size: 15px;">
                                      <i class="fas fa-fw fa-users"></i>
                                      Membership Table
                                      <span class="text-center float-right mr-3 text-white"><a href="member_report.php" style="font-size: 15px;" name="print" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
                                      </div>
                                    <div class="card-body" style="font-size: 15px;">
                                      <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th width="35%">Name</th>
                                              <th width="15%">Role</th>
                                              <th width="10%">Ministry</th>
                                              <th width="10%">DOB</th>
                                              <th width="10%">Phone Number</th>
                                              <th width="10%">Edit</th>
                                              <th width="10%">Delete</th>
                                            </tr>
                                          </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM members INNER JOIN ministries ON ministries.minid = members.ministry WHERE members.gender = 'Female'";
                                            $stmt = $db->prepare($query);
                                            $stmt->execute();
                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                                  ?>
                                            <tr>
                                              <td><?php echo $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] ?></td>
                                              <td><?php echo $row['role'] ?></td>
                                              <td><?php echo $row['ministry'] ?></td>
                                              <td><?php echo $row['dob'] ?></td>
                                              <td><?php echo $row['phone_number'] ?></td>
                                              <td><span class="text-center text-white"><a href="member_edit.php?id=<?php echo $row['memberid'] ?>" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                                              <td><span class="text-center text-white"><a href="membership_view.php?id=<?php echo $row['memberid'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td>
                                            </tr>
                        
                                            <?php 
                                                }
                                            ?>
                                            </tbody>
                        
                                            <?php
                      }
                      elseif($gen == 'All'){

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
                                    <li class="breadcrumb-item active">Membership</li>
                                  </ol>
                        
                                  <div class="card mb-3">
                                    <div class="card-header" style="font-size: 15px;">
                                      <i class="fas fa-fw fa-users"></i>
                                      Membership Table
                                      <span class="text-center float-right mr-3 text-white"><a href="members_report.php" style="font-size: 15px;" name="print" class="btn btn-success"><i class="fa fa-fw fa-print"></i> Print</a></span>
                                      </div>
                                    <div class="card-body" style="font-size: 15px;">
                                      <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <th width="35%">Name</th>
                                              <th width="15%">Role</th>
                                              <th width="10%">Ministry</th>
                                              <th width="10%">DOB</th>
                                              <th width="20%">Phone Number</th>
                                              <th width="10%">Edit</th>
                                              <!-- <th width="10%">Delete</th> -->
                                            </tr>
                                          </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM members INNER JOIN ministries ON ministries.minid = members.ministry";
                                            $stmt = $db->prepare($query);
                                            $stmt->execute();
                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                                  ?>
                                            <tr>
                                              <td><?php echo $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] ?></td>
                                              <td><?php echo $row['role'] ?></td>
                                              <td><?php echo $row['ministry'] ?></td>
                                              <td><?php echo $row['dob'] ?></td>
                                              <td><?php echo $row['phone_number'] ?></td>
                                              <td><span class="text-center text-white"><a href="member_edit.php?id=<?php echo $row['memberid'] ?>" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a></span></td>
                                              <!-- <td><span class="text-center text-white"><a href="membership_view.php?id=<?php echo $row['memberid'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></span></td> -->
                                            </tr>
                        
                                            <?php 
                                                }
                                            ?>
                                            </tbody>
                        
                                            <?php
                      }

                    }

                    ?>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated</div>
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