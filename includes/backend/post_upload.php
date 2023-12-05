<?php
include('../../includes/backend/connection.php');
include('../../components/alert.php');
    session_start();
    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../index.php");
    }
if(isset($_POST['uploadPost']))
{
  $role = $_POST['role'];
if($role=="hotel"){
    ######################## Image Upload #########################
    $target_dir = "../../media/postsImage/";
    $target_file = $target_dir . basename($_FILES["post_image_upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["post_image_upload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
              alert( "Sorry, only JPG, JPEG, PNG & webp files are allowed.",'D','../../includes/frontend/Hotel/profile.php');
              $uploadOk = 0;
            }
    else{
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      alert( "Sorry, your image was not uploaded.",'D','../../includes/frontend/Hotel/profile.php');
    } 
    else 
    {
      if (move_uploaded_file($_FILES["post_image_upload"]["tmp_name"], $target_file)) {
      
        #When image is uploaded successfully
        $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_SESSION[UserLoginId]'";
        $result=mysqli_query($con,$user_exist_query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
            
             $result_fetch=mysqli_fetch_assoc($result);
            
             $query="INSERT INTO `travel_with_strangers_userposts`(`userid`, `post_url`, `post_description`) VALUES ('$result_fetch[id]','$target_file','$_POST[postDescription]')";
             if(mysqli_query($con,$query)) 
             {
                alert('You have posted successfully!','S','../../includes/frontend/Hotel/profile.php');
             }
             else
             {
                    alert('Unable to connect to database','D','../../includes/frontend/Hotel/profile.php');
             }
            }
        }
      } 
      else {
        alert( "Sorry, there was an error uploading your file.",'D','../../includes/frontend/Hotel/profile.php');
      }
    }
    }

      } else {
        alert( "File is not an image.",'D','../../includes/frontend/Hotel/profile.php');
        $uploadOk = 0;
      }
    

}
else if($role=="user")
  {
      ######################## Image Upload #########################
      $target_dir = "../../media/postsImage/";
      $target_file = $target_dir . basename($_FILES["post_image_upload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
      // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["post_image_upload"]["tmp_name"]);
        if($check !== false) {
          $uploadOk = 1;
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
                alert( "Sorry, only JPG, JPEG, PNG & webp files are allowed.",'D','../../includes/frontend/User/profile.php');
                $uploadOk = 0;
              }
      else{
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        alert( "Sorry, your image was not uploaded.",'D','../../includes/frontend/User/profile.php');
      } 
      else 
      {
        if (move_uploaded_file($_FILES["post_image_upload"]["tmp_name"], $target_file)) {
        
          #When image is uploaded successfully
          $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_SESSION[UserLoginId]'";
          $result=mysqli_query($con,$user_exist_query);
          if($result)
          {
              if(mysqli_num_rows($result)>0)
              {
              
               $result_fetch=mysqli_fetch_assoc($result);
              
               $query="INSERT INTO `travel_with_strangers_userposts`(`userid`, `post_url`, `post_description`) VALUES ('$result_fetch[id]','$target_file','$_POST[postDescription]')";
               if(mysqli_query($con,$query)) 
               {
                  alert('You have posted successfully!','S','../../includes/frontend/User/profile.php');
               }
               else
               {
                      alert('Unable to connect to database','D','../../includes/frontend/User/profile.php');
               }
              }
          }
        } 
        else {
          alert( "Sorry, there was an error uploading your file.",'D','../../includes/frontend/User/profile.php');
        }
      }
      }
  
        } else {
          alert( "File is not an image.",'D','../../includes/frontend/User/profile.php');
          $uploadOk = 0;
        }
      
  
}


}
?>