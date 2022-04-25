<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University | Events</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="../../resource/img/logo.png" rel="icon">
  <link href="../../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href='../../resource/package/dist/sweetalert2.min.css' media="screen" />

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../../resource/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../../resource/css/mdb.min.css">

  <!-- Libraries CSS Files -->
  <link href="../../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../resource/css/style_management.css" rel="stylesheet">
  <link href="../../resource/css/addons.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="../../resource/assets/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script  src="../../resource/jquery-3.6.0.min.js"></script>

</head>
<?php
include_once("config.php");
include "../research/functions/DB.func.php";
include "../research/functions/Message.func.php";
include "../research/functions/functions.php";
// include "../../resource/"
if (empty($_SESSION['id'])) 
{
// include "";
header("Location: ../../login/login.php");
}

$sql = "SELECT * from tblevents";
if ($result = mysqli_query($mysqli, $sql)) {
  $rowcount = mysqli_num_rows( $result );
}
?>
<body>
<header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/customlandingpage/admin/index.php" class="scrollto"><img src="../../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AU RESEARCH PORTAL</strong></a>
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
  <h3 style="color:#fff;">&nbsp;<b> Event Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <!-- change function to the designated function of your assign management -->
                <i class="fa fa-book fa-2x " style="color:#007bff"> <?php  echo($rowcount); ?></i> <h2 class="float-right"><?php 
                // echo get_journal($connect)->num_rows;?></h2>
                 <h5 class="card-title">All Events </h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body"> 
               <i class="fa fa-upload fa-2x" style="color:#007bff">  12</i>
                <h5 class="card-title"> Recent Events </h5>     
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
      </div>
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

  <div class="container">
<!-- Create task button -->
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
<i  class="fa fa-plus"></i>
</button>

<!-- change location of href -->
<a href="http://localhost/customlandingpage/admin/events/index.php"><button type="button" class="btn btn-outline-primary btn-sm">
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
     <form method="post" action="addevents.php" enctype="multipart/form-data">
       <div class="modal-header">
         <h5 class="modal-title" id="create-project-label">Create Events</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

         <!-- change the form add based on your designated management -->
         <div class="form-group">
           <label for="author">Event name</label>
           <input type="text" class="form-control" id="name" name="event_name" required>
           <div class="form-group">
             <label for="title">Event Description</label>
             <textarea type="text" class="form-control" rows="3" id="mobile" name="event_description"> </textarea>
           </div>

         </div>
         <div class="form-group">
           <label for="datepub">Date </label>
           <input type="date" class="form-control" id="email" name="date">
         </div>
         <div class="form-group">
           <label for="datepub">Time </label>
           <input type="time" class="form-control" id="email" name="time">
         </div>
       </div>
      
       <input type="hidden" name="create" value="create"/>
       <div class="modal-footer">
  
         <button  type="submit" id="" name="Submit" class="btn btn-primary" value="Add" >Save</button>
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
       <th scope="col">Event</th>
       <th scope="col">Event Description</th>
       <th scope="col">Date </th>
       <th scope="col">Time </th>
       <th scope="col" align="center">Action</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $result = mysqli_query($mysqli, "SELECT * FROM tblevents");
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
       ?>
       <tr>
        <td><?php echo $data['id']?></td>
        <td><?php echo $data['event_name']?></a></td>   
        <td><?php echo $data['event_description']?></a></td>   
        <td><?php echo $data['date']?></a></td> 
        <td><?php echo $data['time']?></a></td> 
 
         <!-- ACTION BUTTON -->
        <td align="center"> <div class="dropdown">
          <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-h"> </i> 
        </button>

         <div class="dropdown-menu" aria-labelledby="option">
          <a class="dropdown-item" href="editevents.php?id=<?php echo $data['id'];?>">Edit</a>
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
         <h5 class="modal-title" id="deleteLabel">Delete Events</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to delete?
       </div>
       <div class="modal-footer">
         <a href="deleteevents.php?id=<?php echo $data['id'];?>"> <button type="button" class="btn btn-danger">Yes</button></a>
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
  </main>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
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
  <script src="../../resource/js/main.js"></script>

<script> 
$('#btn').on('click', function(){
  Swal.fire(
  'Event Created',
  'Event Created Succesfully',
  'success'
)
})

</script>

<script src="../../resource/jquery-3.6.0.min.js"></script>
<script src="../../resource/sweetalert2.all.min.js"> </script>
<script>
 $(function() {
   $('#event').DataTable();
   $(function() {
     var table = $('#example').DataTable({
       "columnDefs": [{
         "visible": false,
         "targets": 2
       }],
       "ordering": false,
       "displayLength": 25,
       "drawCallback": function(settings) {
         var api = this.api();
         var rows = api.rows({
           page: 'current'
         }).nodes();
         var last = null;
         api.column(2, {
           page: 'current'
         }).data().each(function(group, i) {
           if (last !== group) {
             $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
             last = group;
           }
         });
       }
     });
           // Order by the grouping
           $('#example tbody').on('click', 'tr.group', function() {
             var currentOrder = table.order()[0];
             if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
               table.order([2, 'desc']).draw();
             } else {
               table.order([2, 'asc']).draw();
             }
           });
       });
 });
 $('#example23').DataTable({
   dom: 'Bfrtip',
   buttons: [
   'copy', 'csv', 'excel', 'pdf', 'print'
   ]
 });
 $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>


</body>
</html>

