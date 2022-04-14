<?php

if (isset($_SESSION['id'])) 
{ 
  if($_SESSION['role'] == "Administrator")
  {

  }
  elseif($_SESSION['role'] == "User")
  {
  }
}
// including the database connection file

include_once("config.php");
include "header.php";


if(isset($_POST['update_events']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$event_name = mysqli_real_escape_string($mysqli, $_POST['event_name']);
	$event_description = mysqli_real_escape_string($mysqli, $_POST['event_description']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);	
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);	
	
	
	// checking empty fields
	if(empty($event_name) || empty($event_description) || empty($date) || empty($time)) {	
			
		if(empty($event_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($event_description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}		
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tblevents SET event_name=' $event_name ', event_description='$event_description', date='$date', time='$time' WHERE id=$id");
		
		
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
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tblevents WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$id = $res['id'];
	$event_name = $res['event_name'];
	$event_description = $res['event_description'];
	$date = $res['date'];
	$time = $res['time'];
}
?>
<html>

<body>

<head>	
	<title>Edit Events</title>
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
							<label for="author">Event Name</label>
							<input type="text" class="form-control" id="headlines" name="event_name" value="<?php echo $event_name;?>">
							
							<div class="form-group">
             <label for="description">Description</label>
			 <input type="text" class="form-control" id="Description" name="event_description" value="<?php echo $event_description;?>">
					           </div>
						</div>
						<div class="form-group">
							<label for="datepub">Dated Created</label>
							<input type="date" class="form-control" id="date" name="date" value="<?php echo $date;?>">
						</div>

						<div class="form-group">
							<label for="datepub">Time</label>
							<input type="time" class="form-control" id="time" name="time" value="<?php echo $time;?>">
						</div>


						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id'];?>">

						<div class="form-group" align="right">
							<button class="btn btn-primary btn-sm" name="update_events" href="index.php" value="Update">Update</button> <a class="btn btn-dark btn-sm" href="../../admin/events/index.php">Cancel</a>
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
        
</body>
</html>
