<?php include 'session.php'; ?>
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
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background: rgb(16, 29, 36);">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-users"></i>
                        </div>
                        <div class="mr-5" style="font-size: 1.3rem;">Members</div>
                    </div>
                    <?php

                        include 'database.php';

                        $query = "SELECT COUNT(memberid) FROM members";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                            $members = $row['COUNT(memberid)'];
                        
                    ?>
                            <div class="card-footer text-white clearfix small z-1" style="font-size: 1.1rem;">
                                <span class="float-left">Total Members</span>
                                <span class="float-right">
                                    <?php echo $members; }?>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background: rgb(16, 29, 36);">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-graduation-cap"></i>
                                </div>
                                <div class="mr-5" style="font-size: 1.3rem;">Ministries</div>
                            </div>
                            <?php

                                include 'database.php';

                                $query = "SELECT COUNT(minid) FROM ministries";
                                $stmt = $db->prepare($query);
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                    $ministries = $row['COUNT(minid)'];
                                
                            ?>
                            <div class="card-footer text-white clearfix small z-1" style="font-size: 1.1rem;">
                                <span class="float-left">Total Ministries</span>
                                <span class="float-right">
                                    <?php echo $ministries; }?>
                                    </span>
                            </div>
                        </div>
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