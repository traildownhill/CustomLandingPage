<?php
// session_start();
include "inc/db.php";
include "functions/DB.func.php";
include "functions/Message.func.php";
include "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University | Journal</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Favicons -->
  <link href="../../resource/img/logo.png" rel="icon">
  <link href="../../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../../resource/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../resource/css/mdb.min.css">

   <!-- Datatables -->
   <link href="../../resource/assets/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">



<!--  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


  <!-- Main Stylesheet File -->
  <link href="../../resource/css/style_management.css" rel="stylesheet">
  <link href="../../resource/css/addons.css" rel="stylesheet">
  <style type="text/css">
   .modal-dialog{
    max-width: 75%!important;
  }
</style>
</head>
<body>
  <!--==========================
  Header
  ============================-->
  
  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/CustomLandingPage/admin/index.php" class="scrollto"><img src="../../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AU RESEARCH PORTAL</strong></a>
      </div>
      
      <nav class="main-nav float-right d-none d-lg-block" >
        <ul>
        <?php 
          if (isset($_SESSION['id'])) 
          { 
            if ($_SESSION['role']=="Administrator")
            { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button"data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Management</a>
              <?php 
            }
            ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../account/account.php">Account</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../research/research.php">Research</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../author/author.php">Author</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../journal/journal.php">Journal</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../article/article.php">Article</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../events/index.php">Events</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../news/index.php">News</a>
                  <?php } ?>
                  </div>
                </li>
                  <li><a><?php echo $_SESSION['name'];?></a></li>
                  <li class="nav-item dropdown" >
                  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!-- <a class="dropdown-item" href="../profile/profile.php">Profile</a>
                      <a class="dropdown-item" href="#aboutus">About Us</a> -->
                      <a class="dropdown-item" href="../../signup/logout.php">Signout</a>
                    </div>
                  </li>
                  <?php
          } 
          else 
          { 
            header("Location: ../../login/login.php");
          }?>
        </ul>
      </nav><!-- .main-nav -->
    </div>
  </header><!-- #header -->

<!-- #footer -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- Tables CDN -->

  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Libraries -->
  <script src="../../resource/lib/jquery/jquery.min.js"></script>
  <script src="../../resource/lib/jquery/jquery-migrate.min.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <!-- <script src="../../resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="../../resource/lib/easing/easing.min.js"></script>
  <script src="../../resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="../../resource/lib/wow/wow.min.js"></script>
  <script src="../../resource/lib/waypoints/waypoints.min.js"></script>
  <script src="../../resource/lib/counterup/counterup.min.js"></script>
  <script src="../../resource/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../resource/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../../resource/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script>
  $(document).ready( function () {
  } );
  </script>
  <script language="javascript" type="text/javascript">
  window.history.forward();
</script>
  <script src="../../resource/js/main.js"></script>
  </body>
</html>
