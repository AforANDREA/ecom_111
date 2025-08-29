<?php 
// if (!isset($_SESSION[""])) 
// {
// session_start();
// }
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">
        <img src="logo/logo1.png" style="width: 80px; height: 80px;">
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <?php if(isset($_SESSION['admin_login'])){?>
        <li class="nav-item">
          <a class="nav-link" href="viewInfo.php?show=categories">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewInfo.php?show=products">Products</a>
        </li>
        <li class="nav-item">
          <span class = "nav-link disabled"><?php echo $_SESSION['email']?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
        <?php } ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>