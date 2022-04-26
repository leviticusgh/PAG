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
            <li class="breadcrumb-item active">Membership</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">

          <form method="POST" action="membership_view.php">
              <div class="card-header" style="height: 50px; color: white; background: rgb(16, 29, 36); font-size: 15px;">
                  View Members
              </div>
              <div class="card-body">
                
                  <div class="form-group" >
                    <select class="form-control" name="gender" required style="font-size: 15px;">
                      <option value="Null"> -- Members Select -- </option>
                      <option value="Males"> Males </option>
                      <option value="Females"> Females </option>
                      <option value="All"> All </option>
                      </select>
                    </div>
              </div>

              <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                  <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="view_member" class="btn btn-success text-white" style="width: 100%; font-size: 15px;" > View <i class="fa fa-fw fa-caret-right"></i></button></span>
              </div>

          </form>

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