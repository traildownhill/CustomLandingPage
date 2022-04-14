<?php

include "header.php";

include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
		
	// checking empty fields
	if(empty($name) || empty($mobile) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($mobile)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else 
	{	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tblnews SET name='$name',mobile='$mobile',email='$email' WHERE id=$id");


		//redirectig to the display page. In our case, it is index.php
		if($result)
		{
			$_SESSION['status']= "Data Updated Successfully";
		
		}
		else
		{
			echo "Something went wrong";
		}
	}
}
?>
<?php

// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tblnews WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$id = $user_data['id'];
	$name = $user_data['name'];
	$email = $user_data['email'];
	$mobile = $user_data['mobile'];
}
?>

<head>	
	<title>Edit News</title>
</head>
<body>

<br><br><br><br>
<div class="container">
		<table class="table table-bordered " >
			<thead class="thead-dark">
			
				<tr>
					<th scope="cols" colspan="3" class="p-0">
					
						<!--  -->
						<h5> <a href="index.php"><button class="btn btn-dark btn-sm">← Back to project</button></a> </h5>
					</th>
				</tr>
			</thead>
			<form method="post">
			<tbody>
				<tr>
					<td>
						<!-- change this form to what must be edited to your assign management -->
						<div class="form-group">
							<label for="author">Headlines *</label>
							<input type="text" class="form-control" id="headlines" name="name" value="<?php echo $name;?>">
							
							<!-- <div class="form-group">
								<label for="description">Description</label>
						<input type="text" class="form-control" id="description" name="mobile" value="<?php echo $mobile;?>">
	</div> -->
						<!-- ABSTRACT -->
						<div class="form-group">
						<label class="label">Description *</label>
						<textarea rows="5" cols="60" type="text "name="mobile" id="description" class="form-control"></textarea>
						</div>
						</div>
						
						<div class="form-group">
							<label for="datepub">Dated Created *</label>
							<input type="date" class="form-control" id="date" name="email" value="<?php echo $email;?>">
						</div>

						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id'];?>">

						<div class="form-group" align="right">
							
						<button class="btn btn-primary btn-sm" name="update" value="Update" >Update</button> <a class="btn btn-dark btn-sm" href="index.php">Cancel</a>
						</div>
					</td>

				</tr>
			</tbody>
		</form>
		</table>
		</div>
		</div>








        <footer id="footer">
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

  </footer><!-- #footer -->
