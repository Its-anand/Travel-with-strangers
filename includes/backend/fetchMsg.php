<?php
include('./connection.php');
session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}
$groupID = $_POST['groupID'];
$res = "";
$query = "SELECT tws_grp_message.message, travel_with_strangers_registration_user.username FROM `tws_grp_message` right JOIN `travel_with_strangers_registration_user` ON travel_with_strangers_registration_user.id = tws_grp_message.user_id WHERE group_id = '$groupID'";
$result = mysqli_query($con,$query);
if($result){
  if(mysqli_num_rows($result) > 0){
    while($row  = mysqli_fetch_assoc($result)){

        $res = $res . '<p class="msgDataContainer">
                           <b class="userName">'.$row['username'].'</b><br>';
            $res = $res . '<span class="msg">'.$row['message'].'</span>
        </p><br>';
    }
  }
  echo $res;
}
else{
  echo "Failed";
}
