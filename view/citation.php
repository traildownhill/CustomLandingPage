<?php
header("Content-Type:application/json");

include "../resource/config/db.php";
// ============================VIEWS==============================//

// Research
if (isset($_POST['view_r']) && isset($_POST['id_r'])) {
      $id = $_POST['id_r'];
      $viewcount = $_POST['view_r'];
      $result1 = mysqli_query($con, "UPDATE tblresearch set views = '$viewcount' WHERE id = '$id'");
      if($result1 > 0){
       response("Success1");
      }else{
         response("Failed");
      }
} 
else{
  response("Invalid Request1");
}


// Journal
if (isset($_POST['view_j']) && isset($_POST['id_j'])) {
   $id = $_POST['id_j'];
   $viewcount = $_POST['view_j'];
 
    $result = mysqli_query($con, "UPDATE tbljournal set views = '$viewcount' WHERE id = '$id'");
    if($result > 0){
     response("Success2");
    }else{
       response("Failed");
    }
 } else{
   response("Invalid Request2");
 }

//  Articles
if (isset($_POST['view_a']) && isset($_POST['id_a'])) {
   $id = $_POST['id_a'];
   $viewcount = $_POST['view_a'];
 
    $result = mysqli_query($con, "UPDATE tblarticle set a_views = '$viewcount' WHERE id = '$id'");
    if($result > 0){
     response("Success3");
    }else{
       response("Failed");
    }
 } else{
   response("Invalid Request3");
 }

//  News
if (isset($_POST['view_n']) && isset($_POST['id_n'])) {
   $id = $_POST['id_n'];
   $viewcount = $_POST['view_n'];
 
    $result = mysqli_query($con, "UPDATE tblnews set views = '$viewcount' WHERE id = '$id'");
    if($result > 0){
     response("Succes4");
    }else{
       response("Failed");
    }
 } else{
   response("Invalid Request4");
 }
// =========================================================================

//CITATION
// Research
if (isset($_POST['cite_r']) && isset($_POST['id_r']) && isset($_POST['logged_id'])) {

      $u_id = $_POST['logged_id'];

      $sql = "SELECT * FROM tblaccount WHERE id = '$u_id'";
      $result = mysqli_query($con,$sql);
      $count = mysqli_fetch_array($result);
      // check email if exist
      if($count >= 1)
      {
         $subscribe = $count['subcribe'];
         $status = $count['status'];
         $name = $count['name'];
         $email = $count['email'];
      }
    
         $id = $_POST['id_r'];
         $citecount = $_POST['cite_r'];
         $dateNow = date("F j, Y, g:i a");
         
         $result = mysqli_query($con, "UPDATE tblresearch set cites = '$citecount' WHERE id = '$id'");
         $result1= mysqli_query($con, "INSERT INTO tblcited VALUES('','Research','$id','','$name','$email','$dateNow','$u_id')");
         if($result > 0 && $result > 0){
         response("Success5");
         }else{
            response("Failed");
         }
   }
   else{
      response("Invalid Request5");
   }
 
 // Journal
 if (isset($_POST['cite_j']) && isset($_POST['id_j'])) {
    $id = $_POST['id_j'];
    $citecount = $_POST['cite_j'];
  
     $result = mysqli_query($con, "UPDATE tbljournal set cites = '$citecount' WHERE id = '$id'");
     if($result > 0){
      response("Success6");
     }else{
        response("Failed");
     }
  } else{
    response("Invalid Request6");
  }
 
 //  Articles
 if (isset($_POST['cite_a']) && isset($_POST['id_a'])) {
    $id = $_POST['id_a'];
    $citecount = $_POST['cite_a'];
  
     $result = mysqli_query($con, "UPDATE tblarticle set a_cites = '$citecount' WHERE id = '$id'");
     if($result > 0){
      response("Success7");
     }else{
        response("Failed");
     }
  } else{
    response("Invalid Request7");
  }
 
 //  News
 if (isset($_POST['cite_n']) && isset($_POST['id_n'])) {
    $id = $_POST['id_n'];
    $citecount = $_POST['cite_n'];
  
     $result = mysqli_query($con, "UPDATE tblnews set cites = '$citecount' WHERE id = '$id'");
     if($result > 0){
      response("Success8");
     }else{
        response("Failed");
     }
  } else{
    response("Invalid Request8");
  }

 function response($data){
  $response = $data;
  
  $json_response = json_encode($response);
  echo $json_response;
}
?>