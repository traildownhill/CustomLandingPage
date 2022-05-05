<?php
  // session_start();
  include "research/inc/db.php";
  include "research/functions/DB.func.php";
  include "research/functions/functions.php";
  include "research/functions/Message.func.php";
  
  if (isset($_SESSION['id'])) 
  { 
    if($_SESSION['role'] == "Administrator")
    {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>Arellano University | Dashboard</title>
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <meta content="" name="keywords">
          <meta content="" name="description">

          <!-- Favicons -->
          <link href="../resource/img/logo.png" rel="icon">
          <link href="../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

          <!-- Bootstrap CSS File -->
          <link rel="stylesheet" href="../resource/css/bootstrap.min.css">
          <link rel="stylesheet" href="../resource/css/mdb.min.css">

          <!-- Libraries CSS Files -->
          <link href="../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
          <link href="../resource/lib/animate/animate.min.css" rel="stylesheet">
          <link href="../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
          <link href="../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
          <link href="../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

          <!-- Main Stylesheet File -->
          <link href="../resource/css/style_management.css" rel="stylesheet">
          <link href="../resource/css/addons.css" rel="stylesheet">

        </head>

        <body>
          <!--==========================
          Header
          ============================-->
          <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/CustomLandingPage/index.php" class="scrollto"><img src="../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AU RESEARCH PORTAL</strong></a>
      </div>
      
      <nav class="main-nav float-right d-none d-lg-block" >
        <ul>
        <?php 
          if (isset($_SESSION['id'])) 
          { 
            if ($_SESSION['role']=="Administrator")
            { ?>
            <!-- <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button"data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Report</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="./research/report/mostcited_report.php">Most Cited</a>
                      <a class="dropdown-item" href="./research/report/mostview_report.php">Most View</a>
                    </div>
                  </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button"data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Management</a>
              <?php 
            }
            ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/account/account.php">Account</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/research/research.php">Research</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/author/author.php">Author</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/journal/journal.php">Journal</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/article/article.php">Article</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/events/index.php">Events</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/news/index.php">News</a>
                  <?php } ?>
                  </div>
                </li>
                  <li><a><?php echo $_SESSION['name'];?></a></li>
                  <li class="nav-item dropdown" >
                  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!-- <a class="dropdown-item" href="/admin/profile/profile.php">Profile</a>
                      <a class="dropdown-item" href="#aboutus">About Us</a> -->
                      <a class="dropdown-item" href="../signup/logout.php">Signout</a>
                    </div>
                  </li>
                  <?php
          } 
          else 
          { 
            header("Location: ../login/login.php");
          }?>
        </ul>
      </nav><!-- .main-nav -->
    </div>
  </header><!-- #header -->
          


          <!--==========================
            Intro Section
          ============================-->
          <section id="intro" class="clearfix">
            <div class="container">

              <div class="intro-img">
                <img src="../" alt="" class="img-fluid">
              </div>
              <div class="intro-info">    
                  <!-- <h2>Arellano Research <span> Portal <span></h2> -->
                  <div class="card-group d-flex justify-content-center">
                  
                  
                  <div class="col-md-3 col-sm-5">
                  <a href="./account/account.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Account</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div></a>
                    </div>

                    <div class="col-md-3 col-sm-5">
                    <a href="./author/author.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Authors</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-3 col-sm-5">
                    <a href="./research/research.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Research</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-3 col-sm-5">
                    <a href="./journal/journal.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Journal</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </a>
                    </div>
                  </div>

                  <div class="card-group d-flex justify-content-center ">
                    <div class="col-md-3 col-sm-5">
                    <a href="./article/article.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Articles</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-3 col-sm-5">
                    <a href="./news/index.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All News</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </a>
                    </div>

                    <div class="col-md-3 col-sm-5">
                    <a href="./events/index.php">
                      <div class="card">
                        <div class="card-body">
                          <!-- change function to the designated function of your assign management -->
                          <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                            // echo get_research($connect)->num_rows;?></h2>
                          <h5 class="card-title">All Events</h5>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
            </div>
          </section>
          
          <!-- #intro -->
          

          <main id="main">
<?php
          if (isset($_SESSION['id'])) 
  { 
  if ($_SESSION['role'] == "Administrator") 
          { 
              
          }
          else
          {
            ?>
            <br><br><br>
            <img src="../resource/img/userquickguide.png" alt="Paris" class="center">
            <br><br><br>
          <?php
          }
        }
          ?>
           

          </main>


          
          <!--==========================
            Footer
          ============================-->
          <!-- <footer id="footer">
            <div class="footer-top">
              <div class="container">
                <div class="row">

                  <div class="col-lg-4 col-md-6 footer-info">
                    <h3>AURESPOR</h3>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                  </div>

                  <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About us</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Terms of service</a></li>
                      <li><a href="#">Privacy policy</a></li>
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                      A108 Adam Street <br>
                      New York, NY 535022<br>
                      United States <br>
                      <b>Phone:</b> +1 5589 55488 55<br>
                      <b>Email:</b> info@example.com<br>
                    </p>

                    <div class="social-links">
                      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                      <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                      <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                      <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                      <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                  </div>

                  <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
                    <form action="" method="post">
                      <input type="email" name="email"><input type="submit"  value="Subscribe">
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </footer>#footer -->

          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
          <!-- Uncomment below i you want to use a preloader -->
          <!-- <div id="preloader"></div> -->
          <!-- Tables CDN -->
          <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

          <!-- JavaScript Libraries -->
          <script src="../resource/lib/jquery/jquery.min.js"></script>
          <script src="../resource/lib/jquery/jquery-migrate.min.js"></script>
          <script src="../resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="../resource/lib/easing/easing.min.js"></script>
          <script src="../resource/lib/mobile-nav/mobile-nav.js"></script>
          <script src="../resource/lib/wow/wow.min.js"></script>
          <script src="../resource/lib/waypoints/waypoints.min.js"></script>
          <script src="../resource/lib/counterup/counterup.min.js"></script>
          <script src="../resource/lib/owlcarousel/owl.carousel.min.js"></script>
          <script src="../resource/lib/isotope/isotope.pkgd.min.js"></script>
          <script src="../resource/lib/lightbox/js/lightbox.min.js"></script>

          <!-- Contact Form JavaScript File -->
          <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
          <script src="../contactform/contactform.js"></script>

          <!-- Template Main Javascript File -->
          <script>
          $(document).ready( function () {
            $('#table_id').DataTable();
        } );
          </script>
          <script src="../resource/js/main.js"></script>

        </body>
        </html>
    <?php
    }
    elseif($_SESSION['role'] == "User")
    {
      header("Location: ../index.php");
    }
  }
?>

