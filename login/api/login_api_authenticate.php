<?php
<<<<<<< HEAD
    //Error on this line
    include("/xampp/htdocs/CustomLandingPage/config/db.php");
    // $con = mysqli_connect("localhost","root","","research_portal");
   if($_SERVER["REQUEST_METHOD"] == "POST") 
=======
    // include("/xampp/htdocs/ResearchPortal/config/db.php");
    session_start();
    $con = mysqli_connect("localhost","root","","research_portal");
   
    if(isset($_POST['but_submit']))
>>>>>>> 9c23c18ddbc65f366e93399d119a9df6cadde0fc
   {
      // username and password sent from form 
      $email = mysqli_real_escape_string($con,$_POST['txt_email']);
      $password = mysqli_real_escape_string($con,$_POST['txt_pwd']); 
      
      $sql = "SELECT * FROM tblaccount WHERE email = '$email'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // check email if exist
      if($count == 1) 
      {
        $em = $row['email'];
        $pass= $row['pass'];
        $status = $row['status'];
        $fname = $row['fname'];
        if( $email == $em && $password == $pass)
        {
            if($status == "Active")
            {
                // session_register("myusername");
                $_SESSION['login_user'] = $email;
                $_SESSION['fname'] = $fname;
                header("location: index.php");
            }
            else
            {?>
                <div class="alert alert-danger" role="alert">
                    Account is Inactive!
                </div>
            <?php
            }
        }
        else
        {?>
            <div class="alert alert-danger" role="alert">
                Password do not match!
            </div>
        <?php
        }
      }
      else 
      {?>
        <div class="alert alert-danger" role="alert">
            Email doesn't Exist!
        </div>
        <?php
      }
   }
?>