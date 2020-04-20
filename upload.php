<?php
$target_dir = "./";
$target_dir = $target_dir .basename($_FILES["file"]["name"]);
$response = array();

// Check if image file is a actual image or fake image
if (isset($_FILES["file"])) 
{


 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)) 
 {
  $success = true;
  $message = "Successfully Uploaded";
 }
 else 
 {
  $success = false;
  $message = "Error while uploading ". $target_dir;
 }
}
else 
{
 $success = false;
 $message = "Required Field Missing";
}

$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);

?>