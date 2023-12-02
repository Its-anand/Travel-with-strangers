<?php
include('../../includes/backend/connection.php');
include('../../components/alert.php');
    session_start();
    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../Index.php");
    }
if(isset($_POST['uploadPost']))
{
    ######################## Image Upload #########################
    $target_dir = "../../../media/postsImage/";
    $target_file = $target_dir . basename($_FILES["post_image_upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["post_image_upload"]["tmp_name"]);
      if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        alert( "File is not an image.",'D','../../Index.php');
        $uploadOk = 0;
      }
    
    // // Check file size
    // if ($_FILES["post_image_upload"]["size"] > 500000) {
    //    alert( "Image should not be more then 500Kb",'D','../../Index.php');
    //   $uploadOk = 0;
    // }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "webp" ) {
      alert( "Sorry, only JPG, JPEG, PNG & webp files are allowed.",'D','../../Index.php');
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        alert( "Sorry, your image was not uploaded.",'D','../../Index.php');
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["post_image_upload"]["tmp_name"], $target_file)) {
        // alert( "The file ". htmlspecialchars( basename( $_FILES["post_image_upload"]["name"])). " has been uploaded.",'D','../../Index.php');
      } else {
        alert( "Sorry, there was an error uploading your file.",'D','../../Index.php');
      }
    }
    ######################## Image Upload Ends #########################

 $query="INSERT INTO `travel_with_strangers_registration_user`(`userid`, `post_url`, `post_description`) VALUES ('$_SESSION[UserLoginId]','$target_file','$_POST[postDescription]')";
 if(mysqli_query($con,$query)) 
 {
    alert('You have posted successfully!','S','../../Index.php');
 }
 else
 {
        alert('Unable to connect to database','D','../../Index.php');
 }
}

?>