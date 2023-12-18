<?php
 include('./connection.php');
 include('../../components/alert.php');

 session_start();
 if(!isset($_SESSION['logged_in']))
 {
     header("location: ../../../index.php");
 }
#This is the code for registration 
if(isset($_POST['reject']))
{
    
    $query = "DELETE FROM `tws_grp_members` WHERE group_member_id = '$_POST[memberId]'";
    echo $_POST['memberId'];
     $result = mysqli_query($con, $query);
    if($result){
        alert("Request rejected","S","../frontend/User/chat.php");
    }
    else{
        alert("Operation failed","D","../frontend/User/chat.php");
    }

}
else if(isset($_POST['accept'])){
    $group_size_query = "SELECT `group_size` FROM `tws_grp` WHERE grp_id = '$_POST[ViewedGroupId]'";
    $group_size_query_checkresult = mysqli_query($con, $group_size_query);
    if($group_size_query_checkresult){
        $fetched_groupSizeData = mysqli_fetch_assoc($group_size_query_checkresult);

        $checkQuery = "SELECT tws_grp_members.group_member_id, tws_grp.total_user FROM `tws_grp_members` right JOIN `tws_grp` ON tws_grp.grp_id = tws_grp_members.group_id WHERE status = '1' AND group_id = '$_POST[ViewedGroupId]'";
        $Checkresult = mysqli_query($con, $checkQuery);
        if($Checkresult){
            if(mysqli_num_rows($Checkresult)<=$fetched_groupSizeData['group_size']){
                $fetched_groupData = mysqli_fetch_assoc($Checkresult);
                $newTotal = $fetched_groupData['total_user']+1;
                $query = "UPDATE `tws_grp_members` SET `status`= 1 WHERE group_member_id = '$_POST[memberId]'";
                $query1 = "UPDATE `tws_grp` SET `total_user`='$newTotal' WHERE grp_id = '$_POST[ViewedGroupId]'";

                $result = mysqli_query($con, $query);
                $result1 = mysqli_query($con, $query1);

               if($result && $result1){
                   alert("Request Accepted","S","../frontend/User/chat.php");
               }
               else{
                   alert("Operation failed","D","../frontend/User/chat.php");
               }
            }
            else{
                alert("Group max size reached","W","../frontend/User/chat.php");
            }
        }
    }

}