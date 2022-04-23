<?php
//insert.php
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
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
      // location
       move_uploaded_file($file_tmp,"../uploads/".$_FILES['files']['name']);
       $pdf_file = "uploads/".$_FILES['files']['name']."";
    }else{
       print_r($errors);
    }
  }

if(isset($_POST["btnsubmit"]))
{
    $title = $_POST['title'];
    $main_author = $_POST['main-author'];
    $abstract = $_POST['abstract'];
    $datepub = $_POST['dpub'];
    $rstatus = $_POST['rstatus'];
    $fstudy = $_POST['fstudy'];
    $fstudy = $_FILES['files'];
	
 $connect = new PDO("mysql:host=localhost;dbname=research_portal", "root", "");
 $query = "INSERT INTO tblresearch VALUES('','$title','$main_author','','$abstract','$datepub','$rstatus','$fstudy,'$pdf_file','','' :tags)";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
//    ':co-author'  => $_POST["co-author"],
   ':tags' => $_POST["tags"]
  )
 );

 $result = $statement->fetchAll();
 $output = '';
 if(isset($result))
 {
	$_SESSION['status']= "Data Inserted Successfully";
	// header('Location: index.php');
  
 }
 echo $output;
}
?>