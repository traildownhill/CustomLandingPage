<?php
session_start();
if (isset($_SESSION['id'])) 
{ 
  if($_SESSION['role'] == "Administrator")
  {

  }
  elseif($_SESSION['role'] == "User")
  {
  }
}
// =======================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="./resource/img/favicon.png" rel="icon">
  <link href="./resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="./resource/css/bootstrap.min.css">
	<link rel="stylesheet" href="./resource/css/mdb.min.css">

  <!-- Libraries CSS Files -->
  <link href="./resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="./resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="./resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="./resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="./resource/css/style.css" rel="stylesheet">
  <link href="./resource/css/addons.css" rel="stylesheet">

</head>
<!-- Try lng mag push -->
<body>
<?php
      // include_once ("/xampp/htdocs/CustomLandingPage/login/api/login_api_authenticate.php");
      // include_once ("/xampp/htdocs/CustomLandingPage/signup/api/post_new_user.php");
?>

  <!--======================================================================================================================
  Header
  ========================================================================================================================-->
  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="#intro" class="scrollto"><img src="./resource/img/logo.png" alt="" class="img-fluid">&nbsp;<strong>AURESPOR</strong></a>
      </div>
      <!-- Condition for user -->
      <nav class="main-nav float-right d-none d-lg-block" >
        <ul>
        <?php
        if(empty($_SESSION['id']))
        {
          // header("Location: login/login.php");
          ?><li><a href="./signup/signup.php" class="signup" data-toggle="modal" data-target="#signupPage">Sign Up</a></li><?php
        }
        else
        {
          if(isset($_SESSION['id'])) 
          { 
            if ($_SESSION['role']=="User")
            { ?>
              <li class="nav-item dropdown"><?php 
            }
            ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              </li>
                  <li class="nav-item dropdown" >
                  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#profile">Profile</a>
                    <a class="dropdown-item" href="#aboutus">About Us</a>
                    <a class="dropdown-item" href="./signup/logout.php">Signout</a>
                  </div>
                  </li>
                  <?php
          } 
          else 
          { 
            ?><li><a href="./signup/signup.php" class="signup" data-toggle="modal" data-target="#signupPage">Sign Up</a></li><?php
            // header("Location: ../../login/login.php");
          }
        }
        ?>
        </ul>
      </nav>
    </div>
  </header>
  <!--========================================================== #header ===================================================-->
 
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="/" alt="" class="img-fluid">
      </div>
      <form action="" method="GET">
      <input name="search" class="form-control form-control-lg" type="text" placeholder="Search Here!" aria-label=".form-control-lg example"><br>
        <div class="intro-info">    
          <h2>Arellano Research <span> Portal <span></h2>
          <div>
            <button class="btn-get-started scrollto" name="btnsubmit">Search</button>
            
            <?php
      if(empty($_SESSION['id'])) 
      { 
        ?><a href="./login/login.php" class="btn-services scrollto">Login</a><?php
      }
      ?>  
      </form>
      
          </div>
        </div>
    </div>
  </section>
  
  <!-- #intro -->
  

  <main id="main">

    <!--==========================
      Result Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">
  <?php
    include "../CustomLandingPage/admin/research/inc/db.php";
    include "../CustomLandingPage/admin/research/functions/DB.func.php";
    include "../CustomLandingPage/admin/research/functions/functions.php";
    include "../CustomLandingPage/admin/research/functions/Message.func.php";
  ?>
        <header class="section-header">

<!----------------- Filtering Section ---------------------->

          <!-- <ul class="list-inline" style="padding-left: 40px;" id="filtering">
            <li class="list-inline-item" >
              <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle btn-md" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by Relevance 
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Sort by Relevance</a></li>
                <li><a class="dropdown-item" href="#">Sort by Most Views</a></li>
                <li><a class="dropdown-item" href="#">Sorth by Citation Count</a></li>
              </ul>
            </div>
            </li>

            <li class="list-inline-item" id="fil_study">
              <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle btn-md" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Field of Study 
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
            </li>

            <li class="list-inline-item" id="fil_date">
              <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle btn-md" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Date Published 
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>
            </li>

          </ul> -->
<!-------------------- End of Filtering Section ---------------------------->
        </header><br>

        <div class="row" id="rseult-tbl">
<!--=============================== Search Result Section ===============================-->
          <table id="table_id" class="display">
            <tbody id="tblresult">
              <?php 
              if(isset($_GET['btnsubmit']))
              {
                if($_GET['search'] != "")
                {
                  $title = $_GET['search'];
                  $result = get_research_by_title($connect,$title);
                  if ($result->num_rows>0) {
                  while ($data = mysqli_fetch_array($result))
                  {?>
                    <tr>
                      <div class="col-md-6 col-lg-10 offset-lg-1 wow bounceInUp" data-wow-duration="0.5s">
                        <div class="box">
                          <h4 class="title"><a href="./admin/research/api/action.php?id= <?php echo $data['id'];?>"><span><?php echo $data['title'];?></span></a></h4>
                            <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                              <li class="list-inline-item"><b><u><span><?php echo $data['main_author'];?></span></u></b></li>

                              <li class="list-inline-item"><b><u><span><?php echo $data['co_authors'];?></span></u></b></li>

                              <li class="list-inline-item"><b><span> * Publshed <?php echo $data['date_publish'];?></span></b></li>
                              
                              <li class="list-inline-item"><b><span> * <?php echo $data['field_of_study'];?></span></b></li>

                              
                            </ul>
                            <p class="description"><span><?php echo $data['abstract'];?></span></p>
                            <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                              <li class="list-inline-item"><b>Views: <?php echo $data['views'];?></b></li>
                              <li class="list-inline-item"><b>Cite: <?php echo $data['cites'];?></b></li>
                            </ul>
                        </div>
                      </div>
                    </tr>
                  <?php
                  }
                }
                }
                
              }
              else
              {
                $title = "";
              }?>
            </tbody>
          </table>
<!--======================== End of Result Section ===========================-->
        </div>

      </div>
    </section>

<!--==========================
    View all Section
  ============================-->

  </main>


  
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
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
      <center><h4>Malindog Group</h4></center>
    </div>

  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- Tables CDN -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- JavaScript Libraries -->
  <script src="./resource/lib/jquery/jquery.min.js"></script>
  <script src="./resource/lib/jquery/jquery-migrate.min.js"></script>
  <script src="./resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./resource/lib/easing/easing.min.js"></script>
  <script src="./resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="./resource/lib/wow/wow.min.js"></script>
  <script src="./resource/lib/waypoints/waypoints.min.js"></script>
  <script src="./resource/lib/counterup/counterup.min.js"></script>
  <script src="./resource/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="./resource/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="./resource/lib/lightbox/js/lightbox.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../CustomLandingPage/login/script/main.js"></script>
  <script src="./resource/js/main.js"></script>

</body>
</html>
