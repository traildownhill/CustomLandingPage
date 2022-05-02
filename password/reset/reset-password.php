<?php 
$connect = mysqli_connect("localhost","root","","research_portal");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
  else{
    //   echo "Success";
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University | Reset Password</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../resource/img/logo.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../../resource/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../../resource/css/mdb.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">

  <!-- Libraries CSS Files -->
  <link href="../../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../resource/css/style_management.css" rel="stylesheet">
  <link href="../../resource/css/addons.css" rel="stylesheet">
</head>
<br>
<body>
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="../../index.php" class="scrollto"><img src="../../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AU RESEARCH PORTAL</strong></a>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
    </div>
  </header>
</div>



  <main id="main">
  <body>
 <br><br><br><br>


<div class="container">
<div class="row wow bounceInUp">

	<div class="col-6" >
            <div class="card ">
            <div class="card-body" id="margin" >
              

	
            <h3 class="card-title" >Setting New Password <?php //echo $_SESSION['id']; ?></h3>
        <form action="" method="POST" name="Form" onsubmit="return validateForm()" >
        
            <div class="md-form">
            <h6 class="card-title">New Password</h6>           
            <input type="password" class="form-control" name= "email" id="exampleFormControlInput1" placeholder="">
              
               </div>
               <div class="md-form">
            <h6 class="card-title">Confirmed Password</h6>           
            <input type="password" class="form-control" name= "email" id="exampleFormControlInput1" placeholder="">
              
               </div>

          <div class="text-right" >
            <button type="submit" class="btn " id="update_pass" name="update_pass" style="background-color: #01377D; color:white">Update Password</button>
          </div>
             
        </form>
      </div>
      </div>
    </div>
    </div> 
</div>
</main>

</section>
  
  <!-- <div id="preloader"></div>   -->
  <!-- Tables CDN -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- JavaScript Libraries -->
  <script src="../../resource/lib/jquery/jquery.min.js"></script>
  <script src="../../resource/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../resource/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  <script src="../../CustomLandingPage/login/script/main.js"></script>
  
  
  </body>
</html>
