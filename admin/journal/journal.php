
<?php
include ("inc/header.php");
if (empty($_SESSION['id'])) {
  // include""
  header("Location: ../../login/login.php");
}
?>
<!-- #Journal-->
<section id="intro" class="clearfix">
  <div class="container">
  <h3 style="color:#fff;">&nbsp;<b> Journal Management </b></h3>
    <div class="card-group">
          <div class="col-md-3 col-sm-5">
            <div class="card">
              <div class="card-body">
                <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php echo get_journal($connect)->num_rows;?></h2>
                 <h5 class="card-title">All Journal</h5>
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
 <!--<header class="section-header">
      <h3>Journal Management</h3>
    </header> -->

<div class="container">
<?php
if (isset($_GET['del'])) {
  $result = delete_journalaction($connect,$_GET['del']);
  if ($result =="1") {
    message("Journal deleted successfully!","1");
  }
}
if(isset($_FILES['files'])){
  $errors= array();
  $file_name_array = explode('.',$_FILES['files']['name']);
  $file_size =$_FILES['files']['size'];
  $file_tmp =$_FILES['files']['tmp_name'];
  $file_type=$_FILES['files']['type'];
  $file_ext=strtolower(end($file_name_array));
  
  $extensions= array("pdf","txt","docx");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a PDF or DOCX file.";
  }
  
  if($file_size > 2097152){
     $errors[]='File size must be excately 2 MB';
  }
  
  if(empty($errors)==true)
  {
     move_uploaded_file($file_tmp,"uploads/".$_FILES['files']['name']);
     $filelocation = "uploads/".$_FILES['files']['name']."";
  }
  else{
     print_r($errors);
  }
}

if ($_SERVER['REQUEST_METHOD'] =="POST") {
  if (isset($_POST['create'])) {
    foreach($_POST['tagging'] as $tags) {
      $tags= implode(', ',$_POST['tagging']);
    }
    foreach($_POST['fstudy'] as $fstudy) {
      $fstudy= implode(', ',$_POST['fstudy']);
    }
    $result = create_journalaction($connect,$_POST['title'],$_POST['description'],$_POST['author'],$_POST['datepub'],$_SESSION['id'],$_POST['created'],$filelocation,$tags,$fstudy);
    if ($result == 1) {
      message("Journal created successfully!",1);
    } else {
      message("Could not create Journal!",0);
    }
  }

}
?>
  <!-- Create task button -->
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
  <i  class="fa fa-plus"></i>
  </button>
  <a href="journal.php"><button type="button" class="btn btn-outline-primary btn-sm">
  <i class="fa fa-refresh" aria-hidden="true"></i>
  </button></a>
  <br/>
  <br/>
<style>
   .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active{
    background-color: #fff;
    display: inline-block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    vertical-align: middle;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-box-shadow: none;
  }
  .btn-new:hover{-webkit-box-shadow: none;}

</style>
<!-- Modal New Journal -->
<div class="modal fade " id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm w-50" role="document"><
  <div class="modal-content">
  <form method="post" name="AddJournal" action="journal.php" enctype="multipart/form-data">
       
       <div class="modal-header">
        <h5 class="modal-title" id="create-project-label">Create Journal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="modal-body ">
        
        <div class="form-group">
         <label for="author">Select Author</label>
          <select name="author"  id="Select Author" class="custom-select" required>
            <option  hidden>CHOOSE...</option>
            <?php 
            $authors = get_authors($connect); 
            while($author = mysqli_fetch_array($authors)) 
            { 
              if ($author['role'] !="Administrator") {
              ?>
                 <option value="<?php echo $author['name'];?>"><?php echo $author['name'];?></option>
               <?php 
              }
            } 
            ?>
            </select>
       </div> 
       
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"  required="required">
        </div>
          
         <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control" id="description" name="description" required="required"></textarea>
         </div>
        
         <div class="form-group">
          <label for="datepub">Date Published</label>
          <input type="date" class="form-control" id="datepub" name="datepub"  required="required">
        </div>

        <div class="form-group">
       <label for="fstudy">Field of Study</label>
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

        <div class="form-group">
         <label for="files">Add (pdf, txt or docs)</label>
         <input type="file" class="form-control-file" id="files" name="files" oninvalid="alert('Hey, upload your file')" required="required">
        </div>
     
        <div class="form-group">
           <label class="label">Tags</label><br>
           <select class="selectpicker form-control"  title="Choose..." data-style="btn-new" multiple data-selected-text-format="count" data-live-search="true" data-mdb-filter="true"id="tags" name="tagging[]">
         
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

   
<!--Journal-->
<div class="table-responsive-lg">
 <table id="journal" class="table table-hover">
   <thead>
     <tr>
       <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Author</th>
       <th scope="col">Title</th>
       <th scope="col">Creator</th>
       <th scope="col">Date Published</th>
       <th scope="col">Created</th>
       <th scope="col"></th>
       <th scope="col"></th>
       <th scope="col" align="center">Option</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $result = get_journal($connect);
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
      // include""
       ?>
       <tr>
         <td scope="row" class="d-none"><?php echo date("F Y",strtotime($data['datepub']));?></td>
         <td><?php echo $data['id']?></td>
         <td><a href="./api/action.php?id=<?php echo $data['id']?>"><?php echo $data['author']?></a></td>
         <td><?php echo $data['title']?></a></td>
         <td><?php
         $user = get_user_data($connect,$data['creator']);
         echo $user['name'];
         ?> 
       </td>
       <td><?php echo date("Y-m-d",strtotime($data['datepub']));?></td>
       <td><?php echo date("Y-m-d",strtotime($data['created']));?></td>
       <td><?php 
         if($data['cites'] >= "5"){
           echo "Most Cited";
         }
         ?></td>
         <td><?php 
         if($data['views'] >= "10"){
           echo "Most View";
         }?>
        </td>
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


<script src="../../resource/assets/datatables.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $(".form-control").select2({
  tags: true
});
});
</script>
<script>
 $(function() {
   $('#journal').DataTable();
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

