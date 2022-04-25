<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University | News</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../resource/img/logo.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

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
<?php
include_once("config.php");
include "../research/functions/DB.func.php";
include "../research/functions/Message.func.php";
include "../research/functions/functions.php";

// include "../../resource/"
if (empty($_SESSION['id'])) {
  header("Location: ../../login/login.php");
}

$sql = "SELECT * from tblnews";
if ($result = mysqli_query($mysqli, $sql)) {
  $rowcount = mysqli_num_rows( $result );
}
?>
<body>
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/CustomLandingPage/admin/index.php" class="scrollto"><img src="../../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AU RESEARCH PORTAL</strong></a>
      </div>
      
      <nav class="main-nav float-right d-none d-lg-block " >
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
                  <a class="dropdown-item" href="../account/account.php">Account </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../research/research.php">Research </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../author/author.php">Author </a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../journal/journal.php">Journal </a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../article/article.php">Article </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../author/author.php">Author </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../events/index.php">Events </a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../news/index.php">News </a>
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
  <h3 style="color:#fff;">&nbsp;<b> News Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <!-- change function to the designated function of your assign management -->
                <i class="fa fa-book fa-2x " style="color:#007bff"></i> <h2 class="float-right">  <?php  echo($rowcount); ?><?php 
                // echo get_journal($connect)->num_rows;?></h2>
                 <h5 class="card-title">All News</h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body"> 
               <i class="fa fa-upload fa-2x" style="color:#007bff"> </i> 2
                <h5 class="card-title">Recent News</h5>     
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
      </div>
    </div>
</section>
  
  <!-- #intro -->
  
  <div class="col-md-12">
<?php 
    if(isset($_SESSION['status']))
    {
      ?>
       <div class="container">
        
    </div>
        <?php 
      unset ($_SESSION['status']);
    }
?>
</div>

  <main id="main">
  <body>

  <div class="container">
<!-- Create task button -->
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
<i  class="fa fa-plus"></i>
</button>

<!-- change location of href -->
<a href="http://localhost/customlandingpage/admin/news/index.php"><button type="button" class="btn btn-outline-primary btn-sm">
<i class="fa fa-refresh" aria-hidden="true"></i>
</button>
</a>

<br/>
<br/>

<!-- Create New Research -->

<div class="modal fade" id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered " role="document">
   <div class="modal-content">
     <!-- change action location to your management -->
     <form method="post" action="add.php" enctype="multipart/form-data">
       <div class="modal-header">
         <h5 class="modal-title" id="create-project-label">Create News</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

         <!-- change the form add based on your designated management -->
         <div class="form-group">
           <label for="author">Headlines *</label>
           <input type="text" class="form-control" id="name" name="name" required>
           
         <div class="form-group">
           <label for="author">Editor *</label>
           <input type="text" class="form-control" id="author" name="author" required>
         </div>

           <div class="form-group">
             <label for="title">Description *</label>
             <textarea type="text" class="form-control" rows="3" id="mobile" name="email" required> </textarea>
           </div>

         <div class="form-group">
           <label for="datepub">Date Published *</label>
           <input type="date" class="form-control" id="email" name="mobile" required>
         </div>

         <div>

         <div class="form-group">
        <label>Tags</label>
        <input type="text" name="skill" id="skill" class="form-control" />
       </div>
         </div>
         
       </div>
       </div> 
 
    <br>

       <input type="hidden" name="create" value="create"/>
       <div class="modal-footer">
  
         <button  type="submit" name="Submit" class="btn btn-primary" value="Add">Save</button>
         <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </form>
   </div>
 </div>
</div>


<!--News-->
<div class="table-responsive-lg">
  <!-- change table id based on your managemnet -->
 <table id="news" class="table table-hover">
   <thead>
     <tr>
       <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Headlines</th>
       <th scope="col">Description</th>
       <th scope="col">Date Published</th>
       <th scope="col">Author</th>
       <th scope="col">Tags</th>
       <th scope="col" align="center">Action</th>
     </tr>
   </thead>
   <tbody>

     <?php
     $result = mysqli_query($mysqli, "SELECT * FROM tblnews ORDER BY id DESC");
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
       ?>
       <tr>
         <td><?php echo $data['id']?></td>
         <td><a href="action.php?id=<?php echo $data['id']?> &ref=research"><?php echo $data['name']?></a></td>    <!-- name is for headlines -->
         <td><?php echo $data['mobile']?></a></td>   <!-- mobile is for description -->
         <td><?php echo $data['email']?></a></td> <!-- mobile is for date -->
         <td><?php echo $data['author']?></a></td> 
         <td><?php echo $data['tags']?></a></td>
      
 <!-- ACTION BUTTON -->


       <td align="center"> <div class="dropdown">
         <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-ellipsis-h"> </i> 
         </button>

         <div class="dropdown-menu" aria-labelledby="option">

        <a class="dropdown-item" href="edit.php?id=<?php echo $data['id']?>">Edit</a>

           <?php if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#delete-<?php echo $data['id'];?>">Delete</a><?php } ?>
         </div>
       </div>
     </td>
   </tr>

     <!-- Delete Popup -->
 <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="delete-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="deleteLabel">Delete News</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to delete?
       </div>
       <div class="modal-footer">
         <a href="delete.php?id=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>
   <?php
 }
}
 ?>
</tbody>
</table>
</div>


</div>


</section>


    <!--==========================
      Result Section
    ============================-->
   


  </main>

<!--==========================
    View all Section
  ============================-->
  
  
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

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
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
  <script src="../js/main.js"></script>

</body>
</html>



<script>

$(document).ready(function(){
 
 $('#skill').tokenfield({
  autocomplete:{
   source: ['Technology','Game','Virtual Reality','Cybersecurity','Javascript','CSS','Mysql'],
   delay:100
  },
  showAutocompleteOnFocus: true
 });

 $('#programmer_form').on('submit', function(event){
  event.preventDefault();
  if($.trim($('#name').val()).length == 0)
  {
   alert("Please Enter Your Name");
   return false;
  }
  else if($.trim($('#skill').val()).length == 0)
  {
   alert("Please Enter Atleast one Skill");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();
   $('#submit').attr("disabled","disabled");
   $.ajax({
    url:"add.php",
    method:"POST",
    data:form_data,
    beforeSend:function(){
     $('#submit').val('Submitting...');
    },
    success:function(data){
     if(data != '')
     {
      $('#name').val('');
      $('#skill').tokenfield('setTokens',[]);
      $('#success_message').html(data);
      $('#submit').attr("disabled", false);
      $('#submit').val('Submit');
     }
    }
   });
   setInterval(function(){
    $('#success_message').html('');
   }, 5000);
  }
 });
 
});
</script>
