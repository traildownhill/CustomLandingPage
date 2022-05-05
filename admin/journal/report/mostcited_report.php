<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="../../../resource/img/favicon.png" rel="icon">
  <link href="../../../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href='../../resource/package/dist/sweetalert2.min.css' media="screen" />

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../../../resource/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../../../resource/css/mdb.min.css">

  <!-- Libraries CSS Files -->
  <link href="../../../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../../resource/css/style_management.css" rel="stylesheet">
  <link href="../../../resource/css/addons.css" rel="stylesheet">
  <link rel="stylesheet" href="main.css">

  <!-- Datatables -->
  <link href="../../../resource/assets/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script  src="../../../resource/jquery-3.6.0.min.js"></script>

</head>
<?php
include_once("../inc/db.php");
include "../functions/DB.func.php";
include "../functions/Message.func.php";
include "../functions/functions.php";
// include "../../resource/"
if (empty($_SESSION['id'])) 
{
// include "";
header("Location: ../../../login/login.php");
}

// $sql = "SELECT * from tblaccount";
// if ($result = mysqli_query($mysqli, $sql)) {
//   $rowcount = mysqli_num_rows( $result );
// }
?>
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/customlandingpage/admin/index.php" class="scrollto"><img src="../../../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AURESPOR</strong></a>
      </div>
      
      <nav class="main-nav float-right d-none d-lg-block" >
        <ul>
        <?php 
          if (isset($_SESSION['id'])) 
          { 
            if ($_SESSION['role']=="Administrator")
            { ?>
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button"data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Report</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="./mostcited_report.php">Most Cited</a>
                      <a class="dropdown-item" href="./mostview_report.php">Most View</a>
                    </div>
                  </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button"data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Management</a>
              <?php 
            }
            ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../account/account.php">Account </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../research/research.php">Research </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../author/author.php">Author </a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../journal/journal.php">Journal </a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../article/article.php">Article </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../events/index.php">Events </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../../news/index.php">News </a>
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
                      <a class="dropdown-item" href="../../../signup/logout.php">Signout</a>
                    </div>
                  </li>
                  <?php
          } 
          else 
          { 
            header("Location: ../../../login/login.php");
          }?>
        </ul>
      </nav><!-- .main-nav -->
    </div>
  </header>
<?php
    //   include("./accounts/api/post_signup.php");
    //   include_once ("./login/api/login_api_authenticate.php");
?>
<!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
  <div class="container">
   <a href="../research.php"><button class="btn btn-light-blue btn-md">Back</button></a>
  <h3 style="color:#fff;">&nbsp;<b> Report for Most Cited </b></h3>
   </div>
</section>
  
  <!-- #intro -->
  <BR><BR>
  
<div class="col-md-12">
<?php 
    
?>
</div>

  <main id="main">
  <body>
  <?php 
       $query = "SELECT * FROM tblresearch ORDER BY cites DESC Limit 3";  
       $result = mysqli_query($connect, $query);
   ?>
     <div class="container">
       <!-- Top Side -->
      <center>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
         <script type="text/javascript">  
         google.charts.load('current', {'packages':['corechart']});  
         google.charts.setOnLoadCallback(drawChart);  
         function drawChart()  
         {  
              var data = google.visualization.arrayToDataTable([  
                ['Title', 'Cites', { role: 'style' }],
                  <?php
                  while($row = mysqli_fetch_assoc($result))  
                  {
                    ?>
                    ['<?php echo $row['id'];?>',<?php echo $row['cites'];?>, 'silver'],
                    <?php
                  }  
                  ?>  
                   ]);  
              var options = {  
                    title: 'Percentage of Cited Research',  
                    //is3D:true,  
                    pieHole: 0.4  
                   };  
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
              chart.draw(data, options);  
         }  
         </script>
         <br>
          <div style="width:800px;">   
                <div id="piechart" style="width: 700px; height: 400px;"></div>  
          </div> 
          </center>

          <!-- Down Side -->
          <div class="card">
          <h5 style="margin-top:10px; margin-left:10px; margin-right:10px;"><center>3 Most Cited</center></h5>
          <?php
            $query = "SELECT * FROM tblresearch ORDER BY cites DESC Limit 3";  
            $result = mysqli_query($connect, $query);
            $cite = 0;
            while($row = mysqli_fetch_assoc($result))
            {
              $cite += $row['cites'];
            }
            
          ?>
          <h5><center>Total No. of Cite: <?php echo "$cite";?> <b><u><?php //echo $result; ?></u></b></center></h5>
          <ul style="margin-top:10px; margin-left:10px; margin-right:10px;">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Cites</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $query = "SELECT * FROM tblresearch ORDER BY cites DESC Limit 3";  
            $result = mysqli_query($connect, $query);
            $cite = 0;
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
              <tr>
                <td><b><?php echo $row['id']?></b></td>
                <td><b><?php echo $row['title']?></b></td>
                <td><b><?php echo $row['cites']?></b></td>
              </tr>
              <?php
            }
            
          ?>
          </tbody>
          </table>
          </ul>
      </div><br>
      <!-- All -->
      <div class="card">
          <h5 style="margin-top:10px; margin-left:10px; margin-right:10px;"><center>All Research Paper</center></h5>
          <?php
            $query = "SELECT * FROM tblresearch ORDER BY cites DESC";  
            $result = mysqli_query($connect, $query);
            $cite = 0;
            while($row = mysqli_fetch_assoc($result))
            {
              $cite += $row['cites'];
            }
            
          ?>
          <ul style="margin-top:10px; margin-left:10px; margin-right:10px;">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Cites</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $query = "SELECT * FROM tblresearch ORDER BY cites DESC Limit 3";  
            $result = mysqli_query($connect, $query);
            $cite = 0;
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
              <tr>
                <td><b><?php echo $row['id']?></b></td>
                <td><b><?php echo $row['title']?></b></td>
                <td><b><?php echo $row['cites']?></b></td>
              </tr>
              <?php
            }
            
          ?>
          </tbody>
          </table>
          </ul>
      </div><br><br>
      </div>
</section>
  </body>
</main>
</html>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- JavaScript Libraries -->
  <script src="../../../resource/lib/jquery/jquery.min.js"></script>
  <script src="../../../resource/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../../resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../resource/lib/easing/easing.min.js"></script>
  <script src="../../../resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="../../../resource/lib/wow/wow.min.js"></script>
  <script src="../../../resource/lib/waypoints/waypoints.min.js"></script>
  <script src="../../../resource/lib/counterup/counterup.min.js"></script>
  <script src="../../../resource/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../../resource/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../../../resource/lib/lightbox/js/lightbox.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../CustomLandingPage/login/script/main.js"></script>
  <script src="./js/main.js"></script>