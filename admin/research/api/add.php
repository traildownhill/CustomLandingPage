<?php
header("Content-Type:application/json");

include "../inc/db.php";
// ============================VIEWS==============================//

// Get Data
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



// =========================================================================

//Post Data


 function response($data){
  $response = $data;
  $json_response = json_encode($response);
  echo $json_response;
  }
?>