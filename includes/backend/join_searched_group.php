<?php

include('./connection.php');
include('../../components/alert.php');
session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}

#Request
if(isset($_POST['requestGroupJoin'])){
    $user_exist_query="SELECT * FROM `tws_grp_members` where `group_id` ='$_POST[group_id]' AND `user_id` = '$_POST[user_id]'";
    $result=mysqli_query($con,$user_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
                alert('Ether you are member of this group or will become once you request will be accepted','W','../frontend/User/join-group.php');
        }
        else
        {
        $query="INSERT INTO `tws_grp_members`(`user_id`, `group_id`, `role`, `status`) VALUES ('$_POST[user_id]','$_POST[group_id]','member','0')";
        $result = mysqli_query($con,$query);

        if($result)
        {    
            alert('Your request is sended','S','../frontend/User/join-group.php');
        }
}
}else{
    alert("Fill the form first","d","../frontend/User/join-group.html");
}}
?>