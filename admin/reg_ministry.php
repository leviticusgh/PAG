<?php include 'session.php'; ?>
<?php

    if (isset($_GET["add_ministry"])) {

        $year = htmlspecialchars($_GET['minstry']);
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

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Ministry</li>
          </ol>

          <div class="card img-thumbnail mb-3" style="padding-bottom: 5px; width: 500px; margin: 0 auto;">

            <form method="POST" action="register.php">
                <div class="card-header" style="height: 50px; color: white; background: rgb(16, 29, 36);">
                    Register 
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="member" required>
                            <option value="Null"> -- Member -- </option>
                            <?php
                                $q1 = "SELECT * FROM members";
                                $stmt = $db->prepare($q1);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['memberid'] . "'>" . $row['firstname'] . " " . $row['othername'] . " " . $row['surname'] . "</option>";};
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="role" required>
                            <option value="Null"> -- Role -- </option>
                            <?php
                                $q1 = "SELECT * FROM roles";
                                $stmt = $db->prepare($q1);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['roleid'] . "'>" . $row['role'] . "</option>";};
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="year" required>
                            <option value="Null"> -- Year -- </option>
                            <?php
                                $q1 = "SELECT * FROM years";
                                $stmt = $db->prepare($q1);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['yearid'] . "'>" . $row['year'] . "</option>";};
                            ?>
                        </select>
                    </div>

                </div>

                <div class="card-footer" style="color: white; background: rgb(16, 29, 36);">
                    <span class="text-center text-white" style="display: flex; justify-content: center;"><button name="add_executive" class="btn btn-success text-white" style="width: 100%;"><i class="fa fa-fw fa-save"></i> Save </button></span>
                </div>

            </form>

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