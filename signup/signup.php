<?php
include "../signup/inc/header.php";

if(isset($_POST['btnsubmit']))
{
    //initiate the form
    $name = isset($_POST['name']) && $_POST['name']!="";
    $username = isset($_POST['username']) && $_POST['username']!="";
    $email = isset($_POST['email']) && $_POST['email']!="";
    $password = isset($_POST['password']) && $_POST['password']!="";
    
    //convert to post method for safety
    if ($name && $username && $password && $email) 
    {   
        //value from db
        $name = $_POST['name'];
        $username = $_POST['username'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        // $id = date("YmdHis");

        if($email == "")
        {
          
        }
        else
        {
            $sql = "SELECT * FROM tblaccount WHERE username = '$username'";
            $result = mysqli_query($connect,$sql);
            $count = mysqli_fetch_array($result);
            // check email if exist
            if($count >= 1) 
            {
              echo '<script>alert("Email Already Exist")</script>';
            }
            elseif ($count <= 0) 
            {

              $options = [
                'cost' => 12,];
                $hash_pass = password_hash("$password", PASSWORD_BCRYPT, $options);
                //insert to db
                $query = "INSERT INTO tblaccount VALUES ('','$name', '$username','$hash_pass','$email', 'Active', 'User','No','','')";
                if(mysqli_query($connect, $query))
                {
                  $_SESSION['success_message'] = "Account Created successfully.";
                    header("Location: ../signup/signup.php");
                    exit();
                    
                }
                else
                {
                  echo "Server problem, Try after sometime.";
                }
            }
        }    
    }

    else
    {
      echo '<script>alert("Please provide all data on the form")</script>';
    }
  }
?>

<section id="intro" class="clearfix">
<div class="container">
<div class="row">
	<div class="col-3">

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

  </div>
	 <div class="col-6">
    <div class="card">
            <h5 class="card-header  text-center lead text-muted">Join us! Find your study here.</h5>
            <div class="card-body" id="margin-top">
              <?php 
              // echo "$query";
              ?>
            <h3 class="card-title text-center">Signup</h3>
            <form action="" method="POST" onsubmit="return validateForm()" name="Form">
            <div class="form-group">

            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        
          

                  <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                  <?php echo $_SESSION['success_message']; ?>
                  </div>
                  </div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
                    
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="myInput" placeholder="Password" name="password">
                </div>
               <div class="form-group">
               <input type="checkbox" onclick="myFunction2()">  Show Password
                  </div>

                  <div class="md-form">
            <input type="checkbox" id="myCheck" name="accept" value="yes" required> 
            "I agree to the Terms and Conditions" or " <a href ="../privacy/datapolicy.php"> I agree to the Privacy Policy"</a>
            </div>

                <button type="submit" class="btn btn-primary btn-block" name="btnsubmit">Register</button>
              <br>
              Are you already registered? <a href="../login/login.php">Login Now</a>
          </form>
          </div>
        </div>
        </div>
</div>
</div>
</section>

  <br>
  <script type="text/javascript">
    function myFunction2() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
    
    <script>
function myFunction1() {
  var x = document.getElementById("myCheck").required;
  document.getElementById("demo").innerHTML = x;
}
</script>
 