<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
include "inc/header.php";
// include "../article/inc/header.php";
if (empty($_SESSION['id'])) {
  // header("Location: login.php");
}
?>
<!-- #Article-->
<section id="intro" class="clearfix">
  <div class="container">
  <h3 style="color:#fff;">&nbsp;<b> Article Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php echo get_articles($connect)->num_rows;?></h2>
                 <h5 class="card-title">All Article</h5>
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
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
               <i class="fa fa-user-plus fa-2x" style="color:#007bff"></i><h2 class="float-right"><?php echo get_users($connect)->num_rows;?></h2>
                <h5 class="card-title">All Creator</h5>
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
  $result = delete_article($connect,$_GET['del']);
  if ($result =="1") {
    message("Article deleted successfully!","1");
  }
}

if ($_SERVER['REQUEST_METHOD'] =="POST") {
  if (isset($_POST['create'])) {
    foreach($_POST['a_tagging'] as $tags) {
      $tags= implode(',',$_POST['a_tagging']);
    }
    $result = create_article($connect,$_POST['a_title'],$_POST['a_description'],$_POST['a_author'],$_POST['a_datepub'],$_SESSION['id'],$_POST['a_created'],$tags,$a_filelocation);
    if ($result == 1) {
      message("Article created successfully!",1);
    } else {
      message("Could not create Journal!",0);
    }
  }
}
?>

<style>
  .btn-new {margin:0;height:40px;border: solid 1px #ccc;-webkit-box-shadow: none;}
  .btn-new:hover{-webkit-box-shadow: none;}
</style>
<div class="container">
  <!-- Create task button -->
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-article">
  <i  class="fa fa-plus"></i></button>
  <a href="article.php"><button type="button" class="btn btn-outline-primary btn-sm">
  <i class="fa fa-refresh" aria-hidden="true"></i></button></a>

<!-- Create New Journal -->

<!-- Modal -->
<div class="modal fade" id="create-article" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-article-label" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm w-50" role="document">
   <div class="modal-content">
     <form method="post" name="AddJournal" action="article.php" enctype="multipart/form-data">
       <div class="modal-header">
         <h5 class="modal-title" id="create-article-label">Create Journal</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="form-group">
           <label for="author">Select Author</label>
                <select name="a_author" id="Select Author" class="form-control" required>
              <option  selected>Choose...</option>
              <?php $authors = get_authors($connect); while ($author = mysqli_fetch_array($authors)) { 
                if ($author['role'] !="Administrator") {
                  ?>
                  <option value="<?php echo $author['name'];?>"><?php echo $author['name'];?></option>
                <?php }} ?>
              </select>
           <div class="form-group">
             <label for="a_title">Title</label>
             <input type="text" class="form-control" id="a_title" name="a_title"  required="required">
           </div>
           <div class="form-group">
							<label for="a_description">Description</label>
							<textarea class="form-control" id="a_description" name="a_description" required="required"></textarea>
					</div>
         </div>
         <div class="form-group">
           <label for="a_datepub">Date Published</label>
           <input type="date" class="form-control" id="a_datepub" name="a_datepub" required="required">
         </div>
         
        <div class="form-group">
            <label class="label">Tags</label><br>
            <select class="selectpicker form-control"  title="Choose..." data-style="btn-new" multiple data-selected-text-format="count" data-live-search="true" data-mdb-filter="true"id="tags" name="a_tagging[]">
            <option selected disabled></option>
            <option>#edchat</option>
            <option>#K12</option>
            <option>#learning</option>
            <option>#edleadership</option>
            <option>#edtech</option>
            <option>#engchat</option>
            <option>#literacy</option>
            <option>#scichat</option>
            <option>#mathchat</option>
            <option>#edreform</option>
        </select>
          </div>
       </div>
       <input type="hidden" name="a_created" value="<?php echo date("M-d-y"); ?>"/>
       <input type="hidden" name="create" value="create"/>
       <div class="modal-footer">
         <button class="btn btn-primary">Save</button>
         <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
     </form>
   </div>
 </div>
</div>
<?php
// if(!empty($_POST["a_tagging"])) {
//     foreach($_POST['a_tagging'] as $tags) {
//         echo $tags;
//     }   
// }
?>

<!--Journal-->
<div class="table-responsive-lg">
 <table id="article" class="table table-hover">
   <thead>
     <tr>
       <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Author</th>
       <th scope="col">Title</th>
       <th scope="col">Creator</th>
       <th scope="col">Date Published</th>
       <th scope="col">Created</th>
       <th scope="col" align="center">Option</th>
     </tr>
   </thead>
   <tbody>
   <?php
     $result = get_articles($connect);
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
      // include""
       ?>
       <tr>
         <td scope="row" class="d-none"><?php echo date("Y-m-d",strtotime($data['a_datepub']));?></td>
         <td><?php echo $data['id']?></td>
         <td><a href="article_backend.php?id=<?php echo $data['id']?>&ref=article"><?php echo $data['a_author']?></a></td>
         <td><?php echo $data['a_title']?></a></td>
         <td><?php
         $user = get_user_data($connect,$data['a_creator']);
         echo $user['name'];
         ?> 
       </td>
       <td><?php echo date("Y-m-d",strtotime($data['a_datepub']));?></td>
       <td><?php echo date("Y-m-d",strtotime($data['a_created']));?></td>
       <td align="center"><div class="dropdown">
         <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-ellipsis-h"></i>
         </button>
         <div class="dropdown-menu" aria-labelledby="option">
           <a class="dropdown-item" href="./api/article_backend.php?id=<?php echo $data['id']?>">View</a>
           <a class="dropdown-item" href="./api/article_backend.php?edit=<?php echo $data['id']?>">Edit</a>
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
         <h5 class="modal-title" id="deleteLabel">Delete Journal</h5>
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
   <?php
 }
}
 ?>
</tbody>
</table>
</div>
</div>

<script src="../../resource/assets/datatables.min.js"></script>
<script>
 $(function() {
   $('#article').DataTable();
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