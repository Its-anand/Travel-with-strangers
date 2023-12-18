<?php
 include('./connection.php');
 include('../../components/alert.php');

 session_start();

#This is the code for registration 
if(isset($_POST['createGroup']))
{
    $group_name = $_POST['grpName'];
    $location_from = $_POST['fromLocation'];
    $location_to = $_POST['toLocation'];
    $group_size = $_POST['groupSize'];
    $budget = $_POST['budget'];

    $date1 = new DateTime($_POST['fromDate']);
    $date2 = new DateTime($_POST['toDate']);

    $interval = $date1->diff($date2);

    $duration = $interval->d;

    $group_exist_query="SELECT * FROM `tws_grp` where `group_name` ='$group_name'";
    $result=mysqli_query($con,$group_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {

            $result_fetch=mysqli_fetch_assoc($result);
                alert('Group with the same name already exist','W','../frontend/User/create-group.php');
        }
        else
        {
            ######################## Image Upload #########################
            $target_dir = "../../media/groupImage/";
            $target_file = $target_dir . basename($_FILES["grpImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
              $check = getimagesize($_FILES["grpImage"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
                  alert( "Sorry, only JPG, JPEG, PNG & webp files are allowed.",'D','../frontend/User/create-group.php');
                  $uploadOk = 0;
                }
                else{
                      // Check if $uploadOk is set to 0 by an error
                      if ($uploadOk == 0) {
                      alert( "Sorry, your image was not uploaded.",'D','../frontend/User/create-group.php');
                      // if everything is ok, try to upload file
                      } else {
                        if (move_uploaded_file($_FILES["grpImage"]["tmp_name"], $target_file)) {
                          $query="INSERT INTO `tws_grp`(`group_profile_pictures`, `group_name`, `location_from`, `location_to`, `group_size`, `budget`, `duration`) VALUES ('$target_file','$group_name','$location_from','$location_to','$group_size','$budget','$duration')";
                          if(mysqli_query($con,$query)) 
                          {
                             
                              #Set Admin
                              
                              function setAdmin(){
                                include('./connection.php');
                                $adminId = $_SESSION['userid'];
                                $group_name = $_POST['grpName'];

                                $group_exist_query="SELECT * FROM `tws_grp` where `group_name` ='$group_name'";
                                $result=mysqli_query($con,$group_exist_query);
                                if($result)
                                {
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        $result_fetch=mysqli_fetch_assoc($result);
                                        $groupId = $result_fetch['grp_id'];
                                        $insertAdmin="INSERT INTO `tws_grp_members`(`user_id`, `group_id`, `role`, `status`) VALUES ('$adminId','$groupId','admin','1')";
                                        
                                        if(mysqli_query($con,$insertAdmin)) 
                                        {
                                           alert('Group created successfully','S','../frontend/User/profile.php');
                                        }
                                        else
                                        {
                                           alert("Unable to put data into database",'D','../frontend/User/create-group.php');
                                        }
                                    }
                                }

                              
                              }
                              setAdmin();

                          }
                          else
                          {
                             alert(' Unable to put data into database','D','../frontend/User/create-group.php');
                          }
                        } 
                        else {
                          alert( "Sorry, there was an error uploading your file.",'D','../frontend/User/create-group.php');
                        }
                        }
                    }
              } 
              else {
                alert( "File is not an image.",'D','../frontend/User/create-group.php');
                $uploadOk = 0;
              }
        }
    } 
    else
    {
        alert('Unable to connect to database','D','../frontend/User/create-group.php');
    }
}
