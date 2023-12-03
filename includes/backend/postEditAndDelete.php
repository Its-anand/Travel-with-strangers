<?php
include('../../includes/backend/connection.php');
include('../../components/alert.php');
session_start();
if(!isset($_SESSION['logged_in'])){
    header("location: ../../../index.php");
}

    if(isset($_POST['editBTN'])){
        $postId = $_POST['postId']; 
        
        $updatePost = "UPDATE `travel_with_strangers_userposts` SET `post_description`= '$_POST[newPostDescription]' WHERE post_id = $postId";
        $result=mysqli_query($con,$updatePost);
        if($result){
        alert("Post updated Successfully",'S','../../includes/frontend/User/profile.php');
        }
        else{
            alert("Unable to connect to database",'D','../../includes/frontend/User/profile.php');
        }
    }
    else if(isset($_POST['deleteBTN'])){
        $postId = $_POST['postId']; 
        $deletePost = "DELETE FROM `travel_with_strangers_userposts` WHERE post_id = $postId";
        $result=mysqli_query($con,$deletePost);
            if($result){
            alert("Post Deleted Successfully",'S','../../includes/frontend/User/profile.php');
            }
            else{
                alert("Unable to connect to database",'D','../../includes/frontend/User/profile.php');
            }
    }
    else{
        alert("No button pressed",'W','../../includes/frontend/User/profile.php');
    }
?>
