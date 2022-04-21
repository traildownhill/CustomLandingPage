<?php

include_once "../inc/header1.php";
if (empty($_SESSION['id'])) {
	// include""
	header("Location: ../../../../login/login.php");
}
?>
<!--View Research-->
<?php 
//updating of Research
// UPLOAD FILE

  if ($_SERVER['REQUEST_METHOD'] =="POST") {
if (isset($_POST['id'])) {
	// file
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
			move_uploaded_file($file_tmp,"../uploads/".$_FILES['files']['name']);
		  //  include ""
			$Pdf_file = "uploads/".$_FILES['files']['name']."";
			
		}else{
			print_r($errors);
		}
	 }
	// change function to the designated function of your assign management
	// also correct each string of the sql with your form
	foreach($_POST['tags'] as $tagging) 
    {
      $tagging= implode(', ',$_POST['tags']);
    }
 		$result = update_researchaction($connect,$_POST['title'],$_POST['abstract'],$_POST['fstudy'],$Pdf_file,$tagging,$_POST['id']);
 		if ($result == "1") {
			echo'<div style="position:relative;top: 100px;"';
 			message("Research updated successfully!",1);
 		}
 	}
}

// deleting of journal
 if (isset($_GET['del'])) {
	//  change function to the designated function of your assign management
 	$result = delete_researchaction($connect,$_GET['del']);
 	if ($result =="1") {
		//  change location to the page of your assign mangement
 		header("Location: ./admin/research/research.php");
 		message("Research deleted successfully!","1");
 	}
 }

// editing of Research
if (isset($_GET['edit'])) 
{
	// change function to the designated function of your assign management
	$data = get_researchaction($connect,$_GET['edit']);
	?>
	<br><br><br><br>
	<div class="container">
		<table class="table table-bordered " >
			<thead class="thead-dark">
				<tr>
					<th scope="cols" colspan="3" class="p-0">
						<!--  -->
						<h5> <a href="../research.php"><button class="btn btn-dark btn-sm">← Back to project</button></a> </h5>
						<center><h5><span>EDIT RESEARCH</span></h5></center>
					</th>
				</tr>
			</thead>
			<form method="POST">
			<tbody>
				<tr>
					<td>
						<!-- change this form to what must be edited to your assign management -->
						<!-- TITLE -->
						<div class="form-group">
							<label class="label">Title</label>
							<textarea rows="2" cols="60" type="text "name="title" id="title" class="form-control" value =''><?php echo $data['title'];?></textarea>
						</div>

						<!-- MAIN AUTHOR -->
						<div class="form-group">
								<label class="label">Main Author</label><br>
								<input class="form-control" id="m_author" name="m_author" value="<?php echo $data['main_author'];?>" disabled>
							</div>
						
						<!-- CO AUTHOR -->
						<div class="row">
							
							<div class="col">
								<label class="label">Co-Author(s) *</label><br>
								<input type="text" name="dpub" id="dpub" class="form-control" value="<?php echo $data['co_authors'];?>" disabled/>
							</div>
							<div class="col" id="co-author-list" >

							</div>
						</div>

						<!-- ABSTRACT -->
						<div class="form-group">
						<label class="label">Abstract *</label>
						<textarea rows="5" cols="60" type="text "name="abstract" id="title" class="form-control"></textarea>
						</div>

						<div class="row">
						<!-- DATE PUBLISH -->
						<div class="col">
							<div class="form-group">
								<label>Date Publish *</label>
								<input type="text" name="dpub" id="dpub" class="form-control" value="<?php echo $data['date_publish'];?>" disabled/>
							</div>
						</div>

						<!-- FIELD OF STUDY -->
						<div class="col">
							<div class="form-group">
								<label class="label">Field of Study *</label><br>
								<select class="custom-select" id="fstudy" name="fstudy" required>
								<option selected ><?php echo $data['field_of_study'];?></option>
								<option value="Accounting and Finance">Accounting and Finance</option>
								<option value="Business and Economics">Business and Economics</option>
								<option value="Computer Studies">Computer Studies</option>
								<option value="Hospitality">Hospitality</option>
								<option value="Nursing">Nursing</option>
								</select>
							</div>
						</div>
						</div>

						<div class="row">

						<!-- TAGS -->
						<div class="col">
							<?php
							
							?>
							<div class="form-group">
							<label class="label">Tags *</label><br>
							<select class="selectpicker form-control" title="Choose..."  multiple data-selected-text-format="count" multiple data-style="btn-new" data-live-search="true" data-mdb-filter="true"id="tags" name="tags[]" value="">
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
							</div>
						</div>
						</div><br>
						<div class="form-group">
							<label for="files">Add (pdf, txt or docs)</label>
							<input type="file" class="form-control-file" id="files" name="files">
						</div>
						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'];?>">

						<div class="form-group" align="right">
							<button class="btn btn-primary btn-sm" name="save-edit">Save Edit</button> 
							<a class="btn btn-dark btn-sm" href="../research.php">Cancel</a>
						</div>
					</td>
				</tr>
			</tbody>
		</form>
		</table>
		</div>
		</div>

<?php } ?>

<?php 

// Get Research id
if (!empty($_GET['id'])) 
{
	// change function to the designated function of your assign management
	$data = get_researchaction($connect,$_GET['id']);
	// include "";
	$pdf_file = $data['pdf_file'];
	$fstudy = $data['field_of_study'];
	$tags = $data['tagging'];
?>
<br><br><br><br>
	<!--View Research-->
	<div class="container">
		<div id="result">
		<a href="/admin/research/research.php"><button class="btn btn-dark btn-sm"  style="float:left">Back</button></a>
		</div>	
	</div><br><br>
	<div class="container">
	<div class="card">
		<div class="card-body">
		<div style="line-height: 20px;">
		<style>
			h2,p{
				padding:0;
				margin:0;
				
			}
			/* .card{

			} */
		</style>
					<div class="badge badge-info text-wrap" style="width: 5rem; padding:5px;" >
					<!-- change to.. -->
					<span >Research</span>
					</div>
					<div>
						<!-- <button type ="button" class="btn btn-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-download"><span class="fa fa-download"> Download Fulltext PDF&nbsp;</span></button> -->
						<a href="../../research/<?php echo $data['pdf_file']?>"><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"><i class="fa fa-file-text"> View Fulltext PDF&nbsp;</i></button></a>
					</div>
					<div>
						<h2 class="text-left" style="margin-top:10px; font-family:'Lucida Sans';" ><b><?php echo $data['title']?></b></h2>
						<ul class="list-inline" style="font-size: small;">
							<li class="list-inline-item"><a href="author.php?author=<?php echo $data['main_author'];?>"><u><?php echo $data['main_author']?></u></a></li>
							<?php
									foreach (explode(",", $data['co_authors']) as $variable => $tk) {
									$variable>0;
									$variable++;
									?><li class="list-inline-item"><a href="author.php?author=<?php echo "$tk";?>"><u><?php echo "$tk";?></u></a></li> <?php
									// echo '$variable_'.$variable.' is ' .$tk.'<br>';
									}
							?>
							<li class="list-inline-item ">* Published <?php echo $data['date_publish'];?></li>
							<li class="list-inline-item">* <?php echo $data['field_of_study'];?></li>
						</ul>
						
					</div>
					<p class="font-weight-normal text-left" style="width:80%;"><?php echo ($data['abstract']); ?></p><br>
				
					<!-- <button type="button" class="btn btn-sm badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-toggle="modal" data-target="#research-citing" id="r-citing"><span>Cite</span></button> -->

							<!-- Modal for Citing -->
							<div class="modal fade" id="research-citing" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Cite Paper</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
									<!-- Navigation -->
									<nav class="navbar navbar-expand-md navbar-light bg-light">
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
											<span class="navbar-toggler-icon"></span>
										</button>
										<div class="collapse navbar-collapse" id="navbarNav">
											<ul class="navbar-nav">
												<li class="nav-item active">
												<a class="nav-link" href="#">MLA <span></span></a>
												</li>
												<li class="nav-item">
												<a class="nav-link" href="#">APA</a>
												</li>
											</ul>
										</div>
									</nav>
									<!-- Body -->
									<div class="input-group" id="r-cite-area">
										<textarea class="form-control" aria-label="With textarea" id="">Hello world</textarea>
									</div>
									<!-- <button type="button" class="btn btn-sm badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left"><span>Copy</span></button> -->

									</div>
								</div>
							</div>
							</div>
		</div>
		</div>
	</div>
	</div>
	
	<!-- Related Studies -->
	<br<br><br>
	<div class="container">
		<h2>Related Studies</h2><br>
		<!-- <div class="row"> -->
		<div class="card-group">
		<?php
		$result1 = get_researchrelated($connect,$fstudy,$tags);
		if ($result1->num_rows>0) {
			while ($data1 = mysqli_fetch_array($result1))
			{
				if($data1['id'] != $_GET['id'])
				{
				?>
					<div class="col-md-3 col-sm-5">
					<div class="card">
						<div class="card-body">
							<!-- change function to the designated function ofyouassign management -->
							<a href="action.php?id=<?php echo $data1['id'];?>"><p class="card-title"><?php echo $data1['title'];?></p></a>
							<p class="card-text"><small class="text-muted"><?php ?></small></p>
						</div>
					</div>
					</div>
			<?php
				}
			}
		}
		?>
		</div>
		</div>
	<!-- </div> -->
	<br><br>	
	
<?php
}
?>


