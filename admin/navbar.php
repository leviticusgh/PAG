<nav class="navbar navbar-expand static-top" style="height: 70px; background: #252526;">

<a class="navbar-brand mr-1 text-white" href="#" style="font-size: 20px;"> Welcome | <?php echo $username; ?></a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
  <i class="fas fa-bars text-primary"></i>
</button>

<center style="margin: 0 auto; color: white; font-family:'Arial Narrow Bold', sans-serif; font-size: 25px;"> ASSEMBLIES OF GOD GHANA <strong style="font-family: Verdana, Geneva, Tahoma, sans-serif;">(PENIEL TEMPLE)</strong></center>

<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0" style="font-size: 20px;">
  <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog fa-spin fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php" style="font-size: 20px;" >Password Change</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sign-out-alt fa-fw"></i>
        </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="logout.php" style="font-size: 20px;">Logout</a>
    </div>
  </li>
</ul>

</nav>