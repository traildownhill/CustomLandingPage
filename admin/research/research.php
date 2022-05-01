<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
// ==================================================================
include "inc/header.php";
// include "../../resource/"
$loggedUser = $_SESSION['id'];
if ($loggedUser == "") 
{
  // include ""
  header("Location: ../../login/login.php");
}
else
{
  ?>
  <!-- #Research-->
  <section id="intro" class="clearfix">
    <div class="container">
    <h3 style="color:#fff;">&nbsp;<b> Research Management </b></h3>
      <div class="card-group">
            <div class="col-md-3 col-sm-5">
              <div class="card">
                <div class="card-body">
                  <!-- change function to the designated function of your assign management -->
                  <i class="fa fa-book fa-2x " style="color:#007bff"></i><h2 class="float-right"><?php 
                    echo get_research($connect)->num_rows;?></h2>
                   <h5 class="card-title">All Research</h5>
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

<div class="container">
<?php
}
// =========================================================BACKEND CODE=========================================================== //
// ==================================================================================================================================

if (isset($_GET['del'])) {
  // change function to the designated function of your assign management
  $result = delete_researchaction($connect,$_GET['del']);
  if ($result =="1") {
    message("Research deleted successfully!","1");
  }
}

    // UPLOAD DATA FROM FORM
  if ($_SERVER['REQUEST_METHOD'] =="POST") {

// UPLOAD FILE
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
  
  if($file_size > 9097152){
     $errors[]='File size must be less than 9 MB';
  }
  
  if(empty($errors)==true){
    // location
     move_uploaded_file($file_tmp,"uploads/".$_FILES['files']['name']);
    //  include ""
     $Pdf_file = "uploads/".$_FILES['files']['name']."";
  }else{
     print_r($errors);
  }
}

  if (isset($_POST['create'])) {
    foreach($_POST['co-authors'] as $c_author) 
    {
      $c_author= implode(', ',$_POST['co-authors']);
    }
    foreach($_POST['tags'] as $tagging) 
    {
      $tagging= implode(', ',$_POST['tags']);
    }
      $result = create_researchaction($connect,$_POST['title'],$_POST['abstract'],$_POST['txtmain-author'],$c_author,$_POST['dpub'],$_POST['rstatus'],$_POST['fstudy'],$Pdf_file,$tagging);
        if ($result == 1) {
          message("Research created successfully!",1);
          
        } else {
          message("Could not create Research!",0);
        }
    }
    }
// ===========================================================================================================================
// ===========================================================================================================================
?>

<!-- Create task button -->
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#adding-research"><i class="fa fa-plus"></i></button>

<!-- change location of href -->
<a href="./research.php"><button type="button" class="btn btn-outline-primary btn-sm">
  <i class="fa fa-refresh" aria-hidden="true"></i></button></a>



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
  .filter-option > .filter-option-inner{
    size: 3rem;
  }
 
  .btn-new:hover{-webkit-box-shadow: none;}
</style>

<!-- Create New Research -->
<div class="modal lg " id="adding-research" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg w-50" role="document" style="border-radius: 10px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="box">
      <center><h3>Add New Research Paper</h3></center>
      <form action="" method="POST" name="form" enctype="multipart/form-data" id="adding-research-form">

        <!-- TITLE -->
        <div class="form-group">
          <label class="label">Title *</label>
          <textarea rows="2" cols="60" type="text "name="title" id="title" class="form-control" required="required"></textarea>
        </div>

        <!-- MAIN AUTHOR -->
        
            <div class="form-group">
            <label class="label">Main Author *</label><br>
            <select class="selectpicker form-control"  data-style="btn-new" data-live-search="true" data-mdb-filter="true"id="txtmain-author" name="txtmain-author" required="required">
          <!-- <select class="selectpicker form-control" data-live-search="true" data-mdb-filter="true" id="txtmain-author" name="txtmain-author" required="required"> -->
            <option hidden ></option>
            <?php
            $result = get_author($connect);
            if ($result->num_rows>0) 
            {
              while ($data = mysqli_fetch_array($result)) 
              {
                {
                  echo  "<option>".$data['name']."</option>";
                }
              }
            }
            ?>
            </select>
            </div>
       

          <!-- CO-AUTHORS -->
          
          <div class="form-group">
          <label class="label">Co-Authors *</label><br>
          <select class="selectpicker form-control" multiple data-style="btn-new" data-live-search="true" data-mdb-filter="true"id="co-authors" name="co-authors[]" required="required">
          <option hidden></option>
              <?php
                $result = get_author($connect);
                if ($result->num_rows>0) 
                {
                  while ($data = mysqli_fetch_array($result)) 
                  {
                    {
                      echo  "<option>".$data['name']."</option>";
                    }
                  }
                }
                ?>
          </select>
          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-author"><i  class="fa fa-plus">Author</i></button>  
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] =="POST") {
          if (isset($_POST['bt-a'])) {
            // foreach($_POST['fstudy'] as $fstudy) {
            //   $fstudy= implode(', ',$_POST['fstudy']);
            // }
            $result = create_authoraction($connect,$_POST['name'],$_POST['email'],$_POST['profession'],$_SESSION['id']);
            if ($result == 1) {
              message("Author created successfully!",1);
            } else {
              message("Could not create Author!",0);
            }
          }
        
        }
        ?>
        
        <!-- ABSTRACT -->
      <div class="form-group">
        <label class="label">Abstract *</label>
        <textarea rows="5" cols="60" type="text "name="abstract" id="title" class="form-control" required="required"></textarea>
      </div>

      <div class="row">
        <!-- DATE PUBLISH -->
        <div class="col">
          <div class="form-group">
            <label>Date Publish *</label>
            <input type="date" name="dpub" id="dpub" class="form-control" required="required">
          </div>
        </div>

          <!-- STATUS -->
        <div class="col">
          <div class="form-group">
            <label class="label">Research Status*</label><br>
            <select class="custom-select" id="rstatus" name="rstatus" required="required">
            <option hidden></option>
              <option>Published</option>
              <option> Unpublished</option>
            </select>
          </div>
        </div>
      
        <!-- FIELD OF STUDY -->
        <div class="col">
          <div class="form-group">
            <label class="label">Field of Study *</label><br>
            <select class="custom-select" id="fstudy" name="fstudy" required="required">
            <option hidden></option>
              <option>Art</option>
              <option> Biology</option>
              <option> Business</option>
              <option> Computer Science</option>
              <option> Chemistry</option>
              <option> Economics</option>
              <option> Education</option>
              <option> Engineering</option>
              <option> Environmental Science</option>
              <option> Geography</option>
              <option> Geology</option>
              <option> History</option>
              <option> Law</option>
              <option> Linguistics</option>
              <option> Materials Science</option>
              <option> Mathematics</option>
              <option> Medicine</option>
              <option> Philosophy</option>
              <option> Physics</option>
              <option> Political Science</option>
              <option> Psychology</option>
              <option> Sociology</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
          <label class="label">Tags *</label><br>
          <select class="selectpicker form-control" title="Choose..." multiple data-style="btn-new" data-live-search="true" data-mdb-filter="true"id="tags" name="tags[]" value="" required="required">
            <option hidden></option>
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
        </div><br>

      <div class="form-group">
          <label for="files">Add (pdf, txt or docs)</label>
          <input type="file" class="form-control-file" id="files" name="files" required="required">
        </div>
        
      <input type="hidden" name="created" value="<?php echo date("Y-m-d"); ?>"/>
      <input type="hidden" name="create" value="create"/>
      <div class="modal-footer">
         <button class="btn btn-primary" id="submit" name="btnsubmit">Save</button>
         <button class="btn btn-secondary" data-dismiss="modal" id="cancel-1">Cancel</button>
      </div>
      </form>
    </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal New Author -->
<div class="modal fade " id="create-author" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm w-50" role="document">
   <div class="modal-content">
     <form method="post" name="AddJournal" action="../research/research.php" enctype="multipart/form-data">
       
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
           
        </div>
        <input type="hidden" name="created" value="<?php echo date("Y-m-d"); ?>"/>
        <input type="hidden" name="btn-add" value="btadd"/>
       
        <div class="modal-footer">
          <button class="btn btn-primary" name="bt-a" id='save-author'>Save</button>
          <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>

        </div>
      </form>
    </div>
   </div>
   </div>
<!--Research-->
<div class="table-responsive-lg">
  <!-- change table id based on your managemnet -->
  <!-- <table class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
 <table id="research" class="table table-hover">
   <thead>
     <tr>
       <th scope="col" class="d-none">Default Sort Fixer</th>
       <th scope="col">ID</th>
       <th scope="col">Title</th>
       <th scope="col">Main Author</th>
       <th scope="col">Co-Author(s)</th>
       <th scope="col">Date Published</th>
       <th scope="col">Research Status</th>
       <th scope="col">Field of Study</th>
       <th scope="col"></th>
       <th scope="col" align="center">Action</th>
     </tr>
   </thead>
   <tbody>
     <?php
     
    //get author id inside research
     $result = get_research($connect);
     if ($result->num_rows>0) {
     while ($data = mysqli_fetch_array($result)) {
       ?>
       <tr>
         <td scope="row" class="d-none"><?php echo date("Y-m-d",strtotime($data['dpub']));?></td>
         <td><?php echo $data['id']?></td>
         <td><?php echo $data['title']?></td>
         <td><?php echo $data['main_author']?></td>
         <td><?php echo $data['co_authors']?></td>
         <td><?php echo $data['date_publish']?></td>
         <td><?php echo $data['r_status']?></td>  
         <td><?php echo $data['field_of_study']?></td>
         <td><?php
        //  $user = get_user_data($connect,$_SESSION['id']);
        //  echo $user['name'];
         ?>
       </td>
       <!-- Action Column -->
       <td>
         <div class="dropdown"  style="float:left">
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
         <h5 class="modal-title" id="deleteLabel">Delete Research Paper</h5>
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
<!-- <div class="col-md-12 text-center"> -->
  <ul class="pagination pagination-lg pager" id="myPager"></ul>
</div> -->
</div>
</div>

<script src="../../resource/assets/datatables.min.js"></script>
<script src="../research/script/main.js"></script>
<script>
//   $(document).ready(function () {
//     $('#myTable').pageMe({
//       pagerSelector:'#myPager',
//       showPrevNext:true,
//       hidePageNumbers:false,
//       perPage:4});
// });
$(function() {
   $('#research').DataTable();
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
  

