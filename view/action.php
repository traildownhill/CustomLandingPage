<?php
// session_start();
include "../admin/research/inc/db.php";
include "../admin/research/functions/DB.func.php";
include "../admin/research/functions/Message.func.php";
include "../admin/research/functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Arellano University</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="../resource/img/logo.png" rel="icon">
  <link href="../resource/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- <link rel="stylesheet" href='../../resource/package/dist/sweetalert2.min.css' media="screen" /> -->

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../resource/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../resource/css/mdb.min.css">

	<!--  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <!-- Libraries CSS Files -->
  <link href="../resource/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../resource/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../resource/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../resource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../resource/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../resource/css/style_management.css" rel="stylesheet">
  <link href="../resource/css/addons.css" rel="stylesheet">
</head>
<body>
  <!--==========================
  Header
  ============================-->
  
  <header id="header" class="fixed-top">
    <div class="container">
      <div class="logo float-left">
       <a href="/CustomLandingPage/index.php" class="scrollto"><img src="../resource/img/logo.png" alt="" class="img-fluid" >&nbsp;<strong>AURESPOR</strong></a>
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
                  <a class="dropdown-item" href="../admin/account/account.php">Account Management</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/research/research.php">Research Management</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/author/author.php">Author Management</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/journal/journal.php">Journal Management</a>
                  <?php } ?>
                  
                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/article/article.php">Article Management</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/author/author.php">Author Management</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/events/index.php">Events Management</a>
                  <?php } ?>

                  <?php if ($_SESSION['role'] == "Administrator") { ?>
                  <a class="dropdown-item" href="../admin/news/index.php">News Management</a>
                  <?php } ?>
                  </div>
                </li>
                  <li><a><?php echo $_SESSION['name'];?></a></li>
                  <li class="nav-item dropdown" >
                  <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!-- <a class="dropdown-item" href="../../profile/profile.php">Profile</a>
                      <a class="dropdown-item" href="#aboutus">About Us</a> -->
                      <a class="dropdown-item" href="../signup/logout.php">Signout</a>
                    </div>
                  </li>
                  <?php
          } 
          else 
          { 
            ?>
				<li><a href="../login/login.php">Sign In</a></li>
				<?php
          }?>
        </ul>
      </nav><!-- .main-nav -->
    </div>
  </header>
<body >
  <h3 hidden name="logged_id" hidden><?php echo $_SESSION['id'];?></h3>
<?php

if(empty($_SESSION['id']))
{
		?>
		<style>
			p{
			text-overflow: ellipsis; 
			overflow: hidden; 
			white-space: nowrap;
		}
		</style>
		<?php
}


// Get Research id
if (!empty($_GET['id'])) 
{
	// ==========================================================RESEARCH=======================================================//
	if($_GET['u'] == "r")
	{
		$data = get_researchaction($connect,$_GET['id']);
		// include "";
		$pdf_file = $data['pdf_file'];
		$fstudy = $data['field_of_study'];
		$tags = $data['tagging'];
		$id= $_GET['id']
		?>
			<br><br><br><br>
			<!--View Research-->
			<div class="container">
		<div id="result">
		<!-- <a href="../research.php"><button class="btn btn-dark btn-sm"  style="float:left">Back</button></a> -->
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
				</style>
							<div class="badge badge-info text-wrap" style="width: 5rem; padding:5px;" >
							<!-- change to.. -->
							<span >Research</span>
							</div>
							<?php
							if(!empty($_SESSION['id']))
							{
							$logged_id = $_SESSION['id'];
							$sql = "SELECT * FROM tblaccount WHERE id = '$logged_id'";
							$result = mysqli_query($connect,$sql);
							$count = mysqli_fetch_array($result);
							// check email if exist
							if($count >= 1)
							{
								$subscribe = $count['subcribe'];
								$status = $count['status'];
								$name = $count['name'];
								$email = $count['email'];
							}
								if(!empty($logged_id) || $subscribe != "No")
								{
									if($subscribe =="Yes" || $count['ucategory'] == "Administrator"){
										?>
										<div>
											<a href="../admin/research/<?php echo $data['pdf_file']?>"><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"><i class="fa fa-file-text"> View Fulltext PDF&nbsp;</i></button></a>
										</div>
										<?php
									}
									elseif($subscribe =="No"){
										?>
										<div  id="disabled-fullview-R" style="background-color: black;">
											<a href=""><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"  ><i class="fa fa-file-text"> View Fulltext PDF&nbsp;</i></button></a>
										</div>
										<?php
									}
								}
							}
								?>
								<!--  -->
								
								<!--  -->
								<div>
									<h5 class="cls" id="<?php echo "$id";?>"></h5>
									<h5 id="cited_byR" value="<?php 
									if(!empty($_SESSION['id']))
									{
										echo $_SESSION['id'];
									}
									?>"></h5>
								<h2 class="text-left" style="margin-top:10px; font-family:'Lucida Sans';" id="r-title" ><b><?php echo $data['title']?></b></h2>
								<ul class="list-inline" style="font-size: small;">
									<li class="list-inline-item"><a href="author.php?u=r&author=<?php echo $data['main_author'];?>"><u><?php echo $data['main_author']?></u></a></li>
									<?php
									foreach (explode(",", $data['co_authors']) as $variable => $tk) {
									$variable>0;
									$variable++;
									?><li class="list-inline-item" id="coauth-<?php echo "$variable";?>"><a href="author.php?author=<?php echo "$tk";?>"><u><?php echo "$tk";?></u></a></li> <?php
									// echo '$variable_'.$variable.' is ' .$tk.'<br>';
									}
									?>
									<li class="list-inline-item " id="r-date">* Published <?php echo $data['date_publish'];?></li>
									<li class="list-inline-item">* <?php echo $data['field_of_study'];?></li>
								</ul>
							</div>
							<p class="font-weight-normal text-left" style="width:80%;" maxlength="200"><?php echo ($data['abstract']);?></p><br>
							<ul class="list-inline" style="font-size: small;">
                     	<li class="list-inline-item" id="View<?php echo $data['id'];?>" value="<?php echo $data['views'];?>"><b>Views: <?php echo $data['views'];?></b></li>
                     	<li class="list-inline-item" id="Cite<?php echo $data['id'];?>" value="<?php echo $data['cites'];?>"><b>Cite: <?php echo $data['cites'];?></b></li>
                              </ul>
							<?php
							if(!empty($_SESSION['id'])){
								if($_SESSION['status'] == "Active")
							{
								?>
									<button type="button" class="btn btn-md badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-toggle="modal" data-target="#research-citing" id="r-citing"><span>Cite</span></button>
								<?php
							}
							}
							?>
										
				</div>
				</div>
			</div>
			</div>

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
									<!-- Body research -->
									<div class="modal-body">
									MLA
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" 		cols="60"class="form-control" aria-label="With textarea" id="myInput" readonly><?php $result = explode(" ",$data['main_author']); echo $result[1];?>, <?php  echo  $result[0];?>. et.al. "<?php echo $data['title'];?>." <?php echo $data['field_of_study'];?> <?php $date = $data['date_publish'];echo "" .date("(Y)",strtotime($date));?> </textarea>
									</div>
									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-r1" ><span>Copy Citation</span></button>
									<br>
									<br>	
									APA 
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" cols="60"class="form-control" aria-label="With textarea" id="myInput1" readonly><?php $result = explode(" ",$data['main_author']); echo $result[1];?>, <?php  echo  $result[0][0];?>. <?php echo $data['co_authors'];?>. <?php $date = $data['date_publish'];echo "" .date("(Y)",strtotime($date));?> <?php echo $data['title'];?>. <?php echo $data['field_of_study'];?>.</textarea>
									</div>

									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-r2"><span>Copy Citation</span></button>

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
						if(!empty($_SESSION['id'])){
							if($data1['id'] != $_GET['id'])
							{
								?>
								<div class="col-md-3 col-sm-5">
									<div class="card">
										<div class="card-body">
											<!-- change function to the designated function ofyouassign management -->
											<a href="action.php?u=r&id=<?php echo $data1['id'];?>"><p class="card-title"><?php echo $data['title'];?></p></a>
											<p class="card-text"><small class="text-muted"><?php ?></small></p>
										</div>
									</div>
								</div>
						<?php
							}
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
	
	//========================================================== JOURNAL ======================================================//
	elseif($_GET['u'] == "j")
	{
		$data = get_journalaction($connect,$_GET['id']);
		// include "";
		$pdf_file = $data['pdf_file'];
		$fstudy = $data['field_of_study'];
		$tags = $data['tagging'];
		?>
			<br><br><br><br>
			<!--View Research-->
			<div class="container">
		<div id="result">
		<!-- <a href="../research.php"><button class="btn btn-dark btn-sm"  style="float:left">Back</button></a> -->
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
							<span >Journal</span>
							</div>
							<?php
							if(!empty($_SESSION['id']))
							{
							$logged_id = $_SESSION['id'];
							$sql = "SELECT * FROM tblaccount WHERE id = '$logged_id'";
							$result = mysqli_query($connect,$sql);
							$count = mysqli_fetch_array($result);
							// check email if exist
							if($count >= 1)
							{
								$subscribe = $count['subcribe'];
							}
								if(!empty($logged_id) || $subscribe != "No")
								{
									if($subscribe =="Yes")
									{
										?>
										<div>
											<a href="../admin/journal/<?php echo $data['pdf_file']?>"><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"><i class="fa fa-file-text"> View FullJournal PDF&nbsp;</i></button></a>
										</div>
										<?php
									}
									elseif($subscribe =="No"){
										?>
										<div  id="disabled-fullview-R" style="background-color: black;">
											<a href=""><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"  ><i class="fa fa-file-text"> View FullJournal PDF&nbsp;</i></button></a>
										</div>
										<?php
									}
								}
							}
								?>
								<!--  -->
								
								<!--  -->
								<div>
								<h5 class="cls" id="<?php echo $_GET['id'];?>"></h5>
									<h5 id="cited_byJ" value="<?php 
									if(!empty($_SESSION['id']))
									{
										echo $_SESSION['id'];
									}
									?>"></h5>
								<h2 class="text-left" style="margin-top:10px; font-family:'Lucida Sans';" ><b><?php echo $data['title']?></b></h2>
								<ul class="list-inline" style="font-size: small;">
								<?php
									foreach (explode(",", $data['author']) as $variable => $tk) {
									$variable>0;
									$variable++;
									?><li class="list-inline-item"><a href="author.php?author=<?php echo "$tk";?>"><u><?php echo "$tk";?></u></a></li> <?php
									}
									?>
									<li class="list-inline-item"><a href="author.php?u=j&author=<?php echo $data['author'];?>"><u><?php echo $data['author']?></u></a></li>
									<li class="list-inline-item ">* Published <?php echo $data['datepub'];?></li>
									<li class="list-inline-item"><?php //echo $data['field_of_study'];?></li>
								</ul>
							</div>
							<p class="font-weight-normal text-left" style="width:80%;"><?php echo ($data['description']); ?></p><br>
							<ul class="list-inline" style="font-size: small;">
                     	<li class="list-inline-item" id="View<?php echo $data['id'];?>" value="<?php echo $data['views'];?>"><b>Views: <?php echo $data['views'];?></b></li>
                     	<li class="list-inline-item" id="Cite<?php echo $data['id'];?>" value="<?php echo $data['cites'];?>"><b>Cite: <?php echo $data['cites'];?></b></li>
                              </ul>
										<?php
							if(!empty($_SESSION['id'])){
								if($_SESSION['status'] == "Active")
							{
								?>
									<button type="button" class="btn btn-md badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-toggle="modal" data-target="#journal-citing" id="j-citing"><span>Cite</span></button>
								<?php
							}
							}
							?>

							<!-- Modal for Citing -->
							<div class="modal fade" id="journal-citing" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle">Citation</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									
									<div class="modal-body">
									MLA
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" cols="60"class="form-control" aria-label="With textarea" id="myInput3" readonly><?php $result = explode(" ",$data['author']); echo $result[1];?>, <?php  echo  $result[0];?>. "<?php echo $data['title'];?>." <?php echo $data['fstudy'];?> <?php $date = $data['datepub']; echo "" .date("(Y)",strtotime($date));?> </textarea>
									</div>
									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-j1"><span>Copy Citation</span></button>
									<br>
									<br>
									APA 
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" cols="60"class="form-control" aria-label="With textarea" id="myInput4" readonly><?php $result = explode(" ",$data['author']); echo $result[1];?>, <?php  echo  $result[0][0];?>. <?php $date = $data['datepub'];echo "" .date("(Y)",strtotime($date));?> <?php echo $data['title'];?>. <?php echo $data['fstudy'];?>.</textarea>
									</div>

									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-j2"><span>Copy Citation</span></button>
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
				$result1 = get_journalrelated($connect,$fstudy,$tags);
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
									<a href="action.php?u=j&id=<?php echo $data1['id'];?>"><p class="card-title"><?php echo $data1['title'];?></p></a>
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
	
	// ==========================================================ARTICLE================================================ //
	elseif($_GET['u'] == "a")
	{
		$data = get_articleaction($connect,$_GET['id']);
		// include "";
		$pdf_file = $data['pdf_file'];
		// $fstudy = $data['field_of_study'];
		$tags = $data['a_tagging'];
		?>
			<br><br><br><br>
			<!--View Research-->
			<div class="container">
				<div id="result">
				<!-- <a href="../research.php"><button class="btn btn-dark btn-sm"  style="float:left">Back</button></a> -->
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
							<span >Article</span>
							</div>
							<?php
							if(!empty($_SESSION['id']))
							{
							$logged_id = $_SESSION['id'];
							$sql = "SELECT * FROM tblaccount WHERE id = '$logged_id'";
							$result = mysqli_query($connect,$sql);
							$count = mysqli_fetch_array($result);
							// check email if exist
							if($count >= 1)
							{
								$subscribe = $count['subcribe'];
							}
								if(!empty($logged_id) || $subscribe != "No")
								{
									if($subscribe =="Yes")
									{
										// echo $count['pdf_file'];
										?>
										<div>
											<!-- <a href="../admin/article/<?php //echo $data['pdf_file'];?>"><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"><i class="fa fa-file-text"> View FullArticle PDF&nbsp;</i></button></a> -->
										</div>
										<?php
									}
									elseif($subscribe =="No"){
										?>
										<div  id="disabled-fullview-R" style="background-color: black;">
											<a href=""><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"  ><i class="fa fa-file-text"> View FullArticle PDF&nbsp;</i></button></a>
										</div>
										<?php
									}
								}
							}
								?>
								<!--  -->
								
								<!--  -->
								<div>
								<h5 class="cls" id="<?php echo $_GET['id'];?>"></h5>
									<h5 id="cited_byA" value="<?php 
									if(!empty($_SESSION['id']))
									{
										echo $_SESSION['id'];
									}
									?>"></h5>
								<h2 class="text-left" style="margin-top:10px; font-family:'Lucida Sans';" ><b><?php echo $data['a_title']?></b></h2>
								<ul class="list-inline" style="font-size: small;">
									<li class="list-inline-item"><a href="author.php?author=<?php echo $data['a_author'];?>"><u><?php echo $data['a_author']?></u></a></li>
									<li class="list-inline-item ">* Published <?php echo $data['a_datepub'];?></li>
									<li class="list-inline-item"><?php //echo $data['field_of_study'];?></li>
								</ul>
							</div>
							<p class="font-weight-normal text-left" style="width:80%;"><?php echo ($data['a_description']); ?></p><br>
							<ul class="list-inline" style="font-size: small;">
                     	<li class="list-inline-item" id="View<?php echo $data['id'];?>" value="<?php echo $data['a_views'];?>"><b>Views: <?php echo $data['a_views'];?></b></li>
                     	<li class="list-inline-item" id="Cite<?php echo $data['id'];?>" value="<?php echo $data['a_cites'];?>"><b>Cite: <?php echo $data['a_cites'];?></b></li>
                              </ul>
							<?php
							if(!empty($_SESSION['id'])){
								if($_SESSION['status'] == "Active")
							{
								?>
									<button type="button" class="btn btn-md badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-toggle="modal" data-target="#article-citing" id="a-citing"><span>Cite</span></button>
								<?php
							}
							}
							?>

							<!-- Citation Modal -->
							<div class="modal fade" id="article-citing" tabindex="-1" role="diaglog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">Cite</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>	
										</div>
										<div class="modal-body">
										MLA
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" cols="60"class="form-control" aria-label="With textarea" id="myInput5" readonly><?php $result = explode(" ",$data['a_author']); echo $result[1];?>, <?php  echo  $result[0];?>. "<?php echo $data['a_title'];?>." <?php $date = $data['a_datepub'];echo "" .date("(Y)",strtotime($date));?> </textarea>
									</div>
									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-a1"><span>Copy Citation</span></button>
									<br>
									<br>	
									APA 
									<div class="input-group" id="r-cite-area">
									<textarea rows="7" cols="60"class="form-control" aria-label="With textarea" id="myInput6" readonly><?php $result = explode(" ",$data['a_author']); echo $result[1];?>, <?php  echo  $result[0][0];?>. <?php $date = $data['a_datepub'];echo "" .date("(Y)",strtotime($date));?>. <?php echo $data['a_title'];?>.</textarea>
									</div>

									<button type="button" class="btn btn-md badge badge-info text-wrap cls" style="width: 7rem; padding:6px; float:left" id="id-copy-cite-a2"><span>Copy Citation</span></button>

										</div>
										<div class="modal-footer">
										</div>
									</div>
								</div>
							</div>
		<!-- ============================================================== -->
				</div>
				</div>
			</div>
			</div>

			<!-- Related Studies -->
			<br<br><br>
			<div class="container" >
				<h2>Related Studies</h2><br>
				<!-- <div class="row"> -->
				<div class="card-group">
				<?php
				$result1 = get_articlerelated($connect,$tags);
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
									<a href="action.php?u=a&id=<?php echo $data1['id'];?>"><p class="card-title"><?php echo $data1['a_title'];?></p></a>
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
	// ==========================================================NEWS========================================================//
	elseif($_GET['u'] == "n")
	{
		$data = get_newsaction($connect,$_GET['id']);
		// include "";
		// $pdf_file = $data['pdf_file'];
		// $fstudy = $data['field_of_study'];
		// $tags = $data['tagging'];
		?>
			<br><br><br><br>
			<!--View Research-->
			<div class="container">
				<div id="result">
				<a href="../research.php"><button class="btn btn-dark btn-sm"  style="float:left">Back</button></a>
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
							<span >News</span>
							</div>
							<?php 
							if(!empty($_SESSION['id']))
							{
							$logged_id = $_SESSION['id'];
							$sql = "SELECT * FROM tblaccount WHERE id = '$logged_id'";
							$result = mysqli_query($connect,$sql);
							$count = mysqli_fetch_array($result);
							// check email if exist
							if($count >= 1)
							{
								$subscribe = $count['subcribe'];
							}
								if(!empty($logged_id) || $subscribe != "No")
								{
									if($subscribe =="Yes")
									{
										?>
										<div>
											
											<a href="../admin/news/<?php //echo $data['pdf_file']?>"><button type ="button" class="btn btn-outline-primary btn-sm float-right" style="position:relative;bottom:40px;" name="btn-fullview"><i class="fa fa-file-text"> View FullNews&nbsp;</i></button></a>
										</div>
										<?php
									}
								}
							}
								?>
								<!--  -->
								
								<!--  -->
								<div>
								<h2 class="text-left" style="margin-top:10px; font-family:'Lucida Sans';" ><b><?php echo $data['name']?></b></h2>
								<ul class="list-inline" style="font-size: small;">
									<li class="list-inline-item"><a href="author.php?author=<?php //echo $data['author'];?>"><u><?php echo $data['author']?></u></a></li>
									<li class="list-inline-item ">* Published <?php echo $data['email'];?></li>
									<li class="list-inline-item"><?php //echo $data['field_of_study'];?></li>
								</ul>
							</div>
							<p class="font-weight-normal text-left" style="width:80%;"><?php echo ($data['mobile']); ?></p><br>
							<button type="button" class="btn btn-sm badge badge-info text-wrap" style="width: 5rem; padding:6px; float:left" data-bs-toggle="modal" data-bs-target="#modalciting"><span>Cite</span></button>

							<!-- Citation Modal -->
							<div class="modal fade" id="modalciting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
											
										<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
		<!-- ============================================================== -->
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
				$result1 = get_newsrelated($connect,$fstudy,$tags);
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

	// change function to the designated function of your assign management
}
?>
	</body>
<!-- #footer -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
  <!-- Tables CDN -->

  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Libraries -->
  <!-- <script src="../resource/lib/jquery/jquery.min.js"></script>   -->
  <!-- <script src="../resource/lib/jquery/jquery-migrat.min.js"></script>
  <script src="../resource/lib/bootstrap/js/bootstrap.bunle.min.js"></script>
  <script src="../resource/lib/easing/easing.min.js"></script> 
  <script src="../resource/lib/mobile-nav/mobile-nav.js"></script>
  <script src="../resource/lib/wow/wow.min.js"></script>  
  <script src="../resource/lib/waypoints/waypoints.minjs"></script>
  <script src="../resource/lib/counterup/counterup.minjs"></script>
  <script src="../resource/lib/owlcarousel/owl.carousel.min.s"></script>
  <script src="../resource/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../resource/lib/lightbox/js/lightbox.min.js"></script> -->
  <!-- Contact Form JavaScript File -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  
  <script src="../resource/js/main.js"></script>
  <!-- <script src="../script/main.js"></script> -->
  <script src="main.js"></script>
  <script>
    $(document).ready(function () {
    <?php
     if(empty($_SESSION['id'])){
        ?>
          // Override Clipboard
          $('p').bind('cut copy paste', function (e) {
              alert('Cannot be Copied, Paste, Cut');
              e.preventDefault();
          });

          // alert(sessionStorage.getItem("name"));
        
        <?php
     }
     else if(!empty($_SESSION['id'])){
      if($_SESSION['subscribe'] == "No"){
        ?>
          // Override Clipboard
          $('p').bind('cut copy paste', function (e) {
              alert('Cannot be Copy, Paste, Cut');
              e.preventDefault();
          });

          // alert(sessionStorage.getItem("SessionName"));
        <?php
       }
     }
     ?>
     });
  </script>
  
  <script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput" );
  
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copy Text to clipboard");
}
function myFunction1() {
  /* Get the text field */
  var copyText1 = document.getElementById("myInput1" );
  
  /* Select the text field */
  copyText1.select();
  copyText1.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText1.value);
  
  /* Alert the copied text */
  alert("Copy Text to clipboard");
}
</script>

