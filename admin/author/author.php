<?php
include "inc/header.php";
// include "../../resource/"
if (empty($_SESSION['id'])) {
// include ""
}

?>
<!-- #Author-->
<section id="intro" class="clearfix">
  <div class="container">
  <h3 style="color:#fff;">&nbsp;<b> Author Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php echo get_author($connect)->num_rows;?></h2>
                 <h5 class="card-title">All Author</h5>
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
  $result = delete_authoraction($connect,$_GET['del']);
  if ($result =="1") {
    message("Author deleted successfully!","1");
  }
}

if ($_SERVER['REQUEST_METHOD'] =="POST") {
  if (isset($_POST['create'])) {
    foreach($_POST['fstudy'] as $fstudy) {
      $fstudy= implode(', ',$_POST['fstudy']);
    }
    $result = create_authoraction($connect,$_POST['name'],$_POST['email'],$_POST['profession'],$_POST['description'],$fstudy,$_SESSION['id'],$_POST['created']);
    if ($result == 1) {
      message("Author created successfully!",1);
    } else {
      message("Could not create Author!",0);
    }
  }

}
?>
<div class="container">
  <!-- Create task button -->
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
  <i  class="fa fa-plus"></i>
  </button>
  <a href="author.php"><button type="button" class="btn btn-outline-primary btn-sm">
  <i class="fa fa-refresh" aria-hidden="true"></i>
  </button>
  </a>
  <br/>
  <br/>
<style>
  .btn-new {margin:0;height:40px;border: solid 1px #ccc;-webkit-box-shadow: none;}
  .btn-new:hover{-webkit-box-shadow: none;}
</style>
<!-- Modal New Journal -->
<div class="modal fade " id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm w-50" role="document">
   <div class="modal-content">
     <form method="post" name="AddJournal" action="author.php" enctype="multipart/form-data">
       
        <div class="modal-header">
         <h5 class="modal-title" id="create-project-label">Create Author</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body ">
        <div class="form-group " >
           <label for="name" class="control-label">Author Name</label><span style="color:red;"> &#42;</span>
           <input type="text" class="form-control" id="name" name="name"  required="required">
           <div class="form-group">
             <label for="email" class="control-label"> Email</label><span style="color:red;"> &#42;</span>
             <input type="text" class="form-control" id="email" name="email" required="required">
           </div>
           <div class="form-group">
             <label for="profession" class="control-label">Profession</label><span style="color:red;"> &#42;</span>
             <input type="text" class="form-control" id="profession" name="profession" required="required">
           </div>
           <div class="form-group">
							<label for="description" class="control-label">Description</label><span style="color:red;"> &#42;</span>
							<textarea class="form-control" id="description" name="description" required="required"></textarea>
					</div>
         <div class="form-group">
        <label for="fstudy">Field of Study</label><span style="color:red;"> &#42;</span>
        <select class=" selectpicker form-control" title="Choose..." data-style="btn-new" multiple data-selected-text-format="count" data-live-search="true" data-mdb-filter="true"id="ftudy" name="fstudy[]" value="">
            <option>Agricultural and Food Sciences</option>
            <option>Art</option>
            <option>Biology</option>
            <option>Business</option>
            <option>Computer Science</option>
            <option>Chemistry</option>
            <option>Economics</option>
            <option>Education</option>
            <option>Engineering</option>
            <option>Environmental Science</option>
            <option>Geography</option>
            <option>Geology</option>
            <option>History</option>
            <option>Law</option>
            <option>Linguistics</option>
            <option>Materials Science</option>
            <option>Mathematics</option>
            <option>Medicine</option>
            <option>Philosophy</option>
            <option>Physics</option>
            <option>Political Science</option>
            <option>Psychology</option>
            <option>Sociology</option>
        </select>
        </div>
        </div>
        <input type="hidden" name="created" value="<?php echo date("Y-m-d"); ?>"/>
        <input type="hidden" name="create" value="create"/>
       
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>

        </div>
      </form>
    </div>
   </div>
   </div>
   <?php
// if(!empty($_POST["tagging"])) {
//     foreach($_POST['tagging'] as $tags) {
//         echo $tags;
//     }   
// }
// ?>

   
<!--Author-->
<div class="table-responsive-lg">
 <table id="author" class="table table-hover">
   <thead>
     <tr>
     <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Full name</th>
       <th scope="col">Profession</th>
       <th scope="col">Field of Study</th>
       <th scope="col">Created</th>
       <th scope="col" align="center">Option</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $result = get_author($connect);
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
      // include""
       ?>
       <tr>
       <td><?php echo $data['id']?></td>
         <td><a href="./api/action.php?id=<?php echo $data['id']?>"><?php echo $data['name']?></a></td>
         <td><?php echo $data['profession']?></td>
         <td><?php echo $data['fstudy']?></td>
       </td>
       <td><?php echo date("Y-m-d",strtotime($data['created']));?></td>
       <td align="center"><div class="dropdown">
         <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-ellipsis-h"></i>
         </button>
         <div class="dropdown-menu" aria-labelledby="option">
           <a class="dropdown-item" href="./api/action.php?id=<?php echo $data['id']?>">View</a>
           <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id']?>">Edit</a>
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
</div>
<script src="../../resource/assets/datatables.min.js"></script>
<script>
 $(function() {
   $('#author').DataTable();
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
  

