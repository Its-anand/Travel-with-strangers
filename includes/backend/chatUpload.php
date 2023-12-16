<?php
 include('./connection.php');
 session_start();
 
 if(!isset($_SESSION['logged_in']))
 {
     header("location: ../../../index.php");
 }
  $userID = $_POST['userID'];
  $message = $_POST['message'];
  $groupId = $_POST['groupId'];


 $query = "INSERT INTO `tws_grp_message`(`user_id`, `group_id`, `message`) VALUES ('$userID','$groupId','$message')";
 $result = mysqli_query($con, $query);
  if($result){
    echo "successfully uploaded";
  }
  else{
    echo "Failed";
  }
  mysqli_close($con);
?>