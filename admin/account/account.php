<?php
// ===========================================================
include "inc/header.php";
// include "../../resource/"
if (empty($_SESSION['id'])) {
  // header("Location: ./login/login.php");
}

?>
<!-- #Account-->
<section id="intro" class="clearfix">
  <div class="container">
  <h3 style="color:#fff;">&nbsp;<b> Account Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <!-- change function to the designated function of your assign management -->
                <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php echo get_accounts($connect)->num_rows;?><?php 
                // echo get_journal($connect)->num_rows;?></h2>
                 <h5 class="card-title">All Account</h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body"> 
               <i class="fa fa-upload fa-2x" style="color:#007bff"></i>
                <h5 class="card-title">Recent upload</h5>     
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
      </div>
    </div>
</section>
          
<br>
 <!--<header class="section-header">
      <h3>Journal Management</h3>
    </header> -->
<?php
if (isset($_GET['del'])) {
  // change function to the designated function of your assign management
  $result = delete_accountaction($connect,$_GET['del']);
  if ($result =="1") {
    message("Account deleted successfully!","1");
  }
}

if (isset($_GET['activate'])) {
  // change function to the designated function of your assign management
  $result = activate_action($connect,$_GET['activate']);
  if ($result =="1") {
    message("Account Active!","1");
  }
}

if (isset($_GET['deactivate'])) {
  // change function to the designated function of your assign management
  $result = deactivate_action($connect,$_GET['deactivate']);
  if ($result =="1") {
    message("Account Inactive!","1");
  }
}

if (isset($_GET['subscribe'])) {
  // change function to the designated function of your assign management
  $result = subscribe_action($connect,$_GET['subscribe']);
  if ($result =="1") {
    message("Account Subscribed!","1");
  }
}

if (isset($_GET['unsubscribe'])) {
  // change function to the designated function of your assign management
  $result = unsubscribe_action($connect,$_GET['unsubscribe']);
  if ($result =="1") {
    message("Account Unsubscribed!","1");
  }
}
$nameErr = $emailErr = $passErr = $catErr = $memErr = "";
if ($_SERVER['REQUEST_METHOD'] =="POST") {
  if (isset($_POST['create'])) {
    // change function to the designated function of your assign management
    // also correct each string of the sql with your form
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
      message("Invalid format and please re-enter valid email","0"); 
    }

    $result = create_accountaction($connect,$_POST['name'],$_POST['email'],$_POST['pass'],$_POST['ucategory'],$_POST['au_member'],$_SESSION['id']);
    if ($result == 1) {
      message("Account created successfully!",1);
    } else {
      message("Could not create Account!",0);
    }
  }
}


?>
l;\;;ffff;;;
<div class="container">
  <!-- Create task button -->
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
  <i  class="fa fa-plus"></i>
  </button>
  <!-- change location of href -->
  <a href="./account.php"><button type="button" class="btn btn-outline-primary btn-sm">
  <i class="fa fa-refresh" aria-hidden="true"></i>
  </button>
  </a>
  <a href="../account/report/subscribe_report.php"><button type="button" class="btn btn-outline-primary btn-sm" style="float: right;"><i class="fa fa-report"  aria-hidden="true">Report for Accounts</i></button></a>


<br/>
<br/>

<!-- Create New Account -->

<div class="modal fade" id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered " role="document">
   <div class="modal-content">
     <!-- change action location to your management -->
     <form method="post" action="./account.php" enctype="multipart/form-data">
       <div class="modal-header">
         <h5 class="modal-title" id="create-project-label">Create Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <!-- change the form add based on your designated management -->
         <div class="form-group">
           <label for="name">Name</label>
           <input type="text" class="form-control" id="name" name="name" required>
           <span class = "error">* <?php echo $nameErr;?></span>
         </div>
           <div class="form-group">
             <label for="email">Email</label>
             <input type="text" class="form-control" id="email" name="email">
             <span class = "error">* <?php echo $nameErr;?></span>
           </div>
           <div class="form-group">
							<label for="pass">Password</label>
							<input type="password" class="form-control" id="pass" name="pass"></input>
              <span class = "error">* <?php echo $nameErr;?></span>
					</div>

          <div class="form-group">
               <select class="browser-default custom-select"  id="ucategory"
                  class="form-control"
                  name="ucategory"
                  value=" ">
                  <option selected disabled>Category</option>
                  <option value="User">User</option>
                  <option value="Administrator">Administrator</option>
                </select>
                <span class = "error">* <?php echo $nameErr;?></span>
                </div>

         <div class="form-group">
               <select class="browser-default custom-select"  id="au_member"
                  class="form-control"
                  name="au_member"
                  value=" ">
                  <option selected disabled>Member of Arellano Community?</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <span class = "error">* <?php echo $nameErr;?></span>
                </div>
        </div>
      
       <input type="hidden" name="create" value="create"/>
       <div class="modal-footer">
         <button class="btn btn-primary">Save</button>
         <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
       </div>
     </form>
   </div>
 </div>

<!--Account-->
<div class="table-responsive-lg">
  <!-- change table id based on your managemnet -->
 <table id="research" class="table table-hover">
   <thead>
     <tr>
       <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">Email</th>
       <th scope="col">Category</th>
       <th scope="col">Subscription</th>
       <th scope="col" align="center">Action</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $result = get_users($connect);
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
       ?>
       <tr>
         <td><?php echo $data['id']?></td>
         <td><?php echo $data['name']?></a></td>
         <td><?php echo $data['username']?></a></td>
         <td><?php echo $data['ucategory']?></td>
         <td><?php echo $data['subcribe']?></td>
         <td><?php
        //  $user = get_user_data($connect,$data['creator']);
        //  echo $user['name'];
         ?>
       </td>
     
       <td align="center"><div class="dropdown">
         <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-ellipsis-h"></i>
         </button>
         <div class="dropdown-menu" aria-labelledby="option">
           <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id']?>">Edit</a>
           <?php 
          $status = $data['status'];
          if($status == "Active")
          {
            // $stat1="Deactivate";
            if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#deactivate-<?php echo $data['id'];?>">Deactivate</a><?php }
          }
          elseif($status =="Inactive")
          {
            // $stat1 = "Activate";
            if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#activate-<?php echo $data['id'];?>">Activate</a><?php }
          }
          $id = $data['id'];
        ?>

<?php 
          $status = $data['subcribe'];
          if($status == "Yes")
          {
            // $stat1="Deactivate";
            if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#unsubscribe-<?php echo $data['id'];?>">Unsubscribe</a><?php }
          }
          elseif($status =="No")
          {
            // $stat1 = "Activate";
            if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#subscribe-<?php echo $data['id'];?>">Subscribe</a><?php }
          }
          elseif($status ==""){
            if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#subscribe-<?php echo $data['id'];?>">Subscribe</a><?php }
          }
          $id = $data['id'];
        ?>
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
         <h5 class="modal-title" id="deleteLabel">Delete Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to delete?
       </div>
       <div class="modal-footer">
         <a href="?del=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>

<!-- Activate Popup -->
<div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="activate-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="activateLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="activateLabel">Activate Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to Activate?
       </div>
       <div class="modal-footer">
         <a href="?activate=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>

<!-- Deactivate Popup -->
<div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="deactivate-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="deactivateLabel">Activate Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to Deactivate?
       </div>
       <div class="modal-footer">
         <a href="?deactivate=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>

<!-- Subscribe Popup -->
 <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="subscribe-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="subscribeLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="subscribeLabel">Subscribe Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to Subscribe?
       </div>
       <div class="modal-footer">
         <a href="?subscribe=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>

<!-- Unsubscribe Popup -->
<div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="unsubscribe-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="unsubscribeLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="unsubscribeLabel">Subscribe Account</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Are you sure you want to Unsubscribe?
       </div>
       <div class="modal-footer">
         <a href="?unsubscribe=<?php echo $data['id'];?>"><button type="button" class="btn btn-danger">Yes</button></a>
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
</div>

<script src="../../resource/assets/datatables.min.js"></script>
<script>
 $(function() {
  //  change id with the id of the table
   $('#research').DataTable();
   $(function() {
     var table = $('#example').DataTable({
       "columnDefs": [{
         "visible": false,
         "targets": 2
       }],
       "ordering": false,
       "displayLength": 5,
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
      
    </div> -->

  

