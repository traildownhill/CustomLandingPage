<?php
include_once "../inc/header1.php";
if (empty($_SESSION['id'])) {
	// header("Location: login.php");
}
?>
<!--View Article-->
<?php 

if (isset($_POST['id'])) {
 		$result = update_article($connect,$_POST['a_title'],$_POST['a_description'],$_POST['a_author'],$_POST['a_datepub'],$_POST['id']);
 		if ($result == "1") {
			echo'<div style="position:relative;top: 100px;"';
 			message("Article updated successfully!",1);
 		}
 	}

 if (isset($_GET['del'])) {
 	$result = delete_article($connect,$_GET['del']);
 	if ($result =="1") {
 		header("Location: article.php");
 		message("Article deleted successfully!","1");
 	}
 }


if (isset($_GET['edit'])) {
	$data = get_article($connect,$_GET['edit']);
	?>
	<br><br><br><br>
	<div class="container">
	<div class="card float-left" style="width: 70%;" >
	<div style="line-height: 20px;">
	<style>
		body{
			background: rgb(2,0,36);
			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(193,193,245,1) 0%, rgba(40,40,228,1) 0%, rgba(109,109,232,1) 100%, rgba(255,255,255,1) 100%);
			}
		h2,p{
			padding:0;
			margin:0;
			}
	</style>
		<div class="card-body" class >
			<div class="badge badge-info text-wrap" style="width: 4rem;padding:5px;margin-bottom:10px;" >
			<span >Article</span>
			</div>
				<form method="post">
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
								<br>
								<label for="a_title">Title</label>
								<input class="form-control" id="a_title" name="a_title" value="<?php echo $data['a_title'];?>">
							</div>
							<div class="form-group">
								<label for="a_description">Description</label>
								<textarea class="form-control" id="a_description" name="a_description" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="a_datepub">Date Publish</label>
							<input type="date" class="form-control" id="a_datepub" name="a_datepub" value="<?php echo $data['a_datepub'];?>">
						</div>

						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'];?>">

						<div class="form-group" align="right">
							<button class="btn btn-primary btn-sm">Save Project</button> <a class="btn btn-dark btn-sm" href="../api/article_backend.php">Cancel</a>
						</div>
					</form>
			</div>	
		</div>
		</div>
<?php } ?>

<?php 
if (!empty($_GET['id'])) {
	$data = get_article($connect,$_GET['id']);
	?>
<br><br><br><br>
	<!--View Article-->
	<div class="container">
			<div class="card float-left" style="width: 70%;" >
				<div style="line-height: 20px;">
					<style>
						body{
							background: rgb(2,0,36);
							background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(193,193,245,1) 0%, rgba(40,40,228,1) 0%, rgba(109,109,232,1) 100%, rgba(255,255,255,1) 100%);
						}
						h2,p{
							padding:0;
							margin:0;
						}
					</style>
				<div class="card-body" class >
					<div class="badge badge-info text-wrap" style="width: 4rem;padding:5px;" >
					<span >Article</span>
					</div>
					<br>	<br>
					<span class="text-left" style="font-size:22px;font-weight:800px;"><?php echo $data['a_title']?></span>
					<p class="font-weight-normal text-left" style="width:60%;margin-top:10px;"><?php echo ($data['a_description']); ?></p>
					<p class="font-weight-sm-light text-left text-muted" style="font-size: 13px;margin-top:10px;" ><?php echo date("F Y",strtotime($data['a_datepub']));?>&nbsp;&#x22C5;</p>
					<p style="margin-top:10px;"><b>Authors:</b></p>
					<p style="margin-bottom:5px;"><a href=""><?php echo $data['a_author']?></a></p>
					<p style="margin-top:10px;font-size:13px;">Tags:</p>
					<div class="badge badge-muted  bg-dark" style="width: 4rem;padding:2px;" ><?php echo $data['a_tagging']?></div>
				</div>
					<button class="btn btn-success btn-sm float-right lowercase" style="position:relative;bottom:220px;font-size:12px;margin-right:20px;" ><i class="fa fa-download">&nbsp;fulltext PDF</i></button>
					<button class="btn btn-outline-success btn-sm float-right" style="clear:both;position:relative;bottom:220px;margin-right:20px;"><i class="fa fa-file-text"> &nbsp;Read here</i></button>
			</div>
			<div class="modal-footer" style=" position:absolute;bottom:0;" > 
				<a href="/CustomLandingPage/admin/article/article.php"><button class="btn btn-dark btn-sm">Back</button></a>
					<div class="dropdown">
						<button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-ellipsis-h"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="option">
							<a class="dropdown-item" href="article_backend.php?edit=<?php echo $data['id']?>">Edit</a>
							<a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#delete">Delete</a>
						</div>
					</div>		
			</div>	
		</div>
		
	<br<br><br>
<?php } ?>
<div class="float-right">
<script>(function () {
	if (window.screen.width >= 630) {
		document.write('<div style="float:left; width: 300px;">\
			<div id="bg_599626510"></div><script data-cfasync="false" type="text/javascript" src="//platform.bidgear.com/ads.php?domainid=5996&sizeid=2&zoneid=6510"><\/script>\
			<div id="bg_599626511"></div><script data-cfasync="false" type="text/javascript" src="//platform.bidgear.com/ads.php?domainid=5996&sizeid=2&zoneid=6511"><\/script>\
			');
			} 
			}());</script>
	</div>