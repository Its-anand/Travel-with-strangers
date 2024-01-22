<?php

include('./connection.php');
include('../../components/alert.php');
session_start();
    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../index.php");
    }
    if(isset($_POST['deleteEverything'])){
        $query = "SELECT * FROM `tws_grp_members` WHERE customer_id = $_POST[customer_id]";
        $result = mysqli_query($con, $query);
        if($result){
            if(mysqli_num_rows($result)>0)
            {
                $result_fetch = mysqli_fetch_assoc($result);

                $groupId = $result_fetch['group_id'];
                $hotel_id = $result_fetch['selected_hotel_id'];
                $customer_id = $_POST['customer_id'];
                
                $tws_hotel_buy_query = "DELETE FROM `tws_buy_hotel` WHERE customer_id = $customer_id";
                $tws_grp_message_query = "DELETE FROM `tws_grp_message` WHERE group_id  = $groupId";
                $tws_grp_members_query = "DELETE FROM `tws_grp_members` WHERE group_id  = $groupId";
                $tws_grp_query = "DELETE FROM `tws_grp` WHERE grp_id  = $groupId";

                $result = mysqli_query($con,$tws_hotel_buy_query);
                if($result){
                    $result1 = mysqli_query($con,$tws_grp_message_query);
                    if($result1){
                        $result2 = mysqli_query($con,$tws_grp_members_query);
                        if($result2){
                            $result3 = mysqli_query($con,$tws_grp_query);
                            if($result3){
                                alert("Thank you for using our services!","s","../frontend/Hotel/profile.php");
                            }
                            else{
                                alert("Unable to delete tws_grp_query!","D","../frontend/Hotel/profile.php");
                            }
                        }
                        else{
                            alert("Unable to delete tws_grp_members!","D","../frontend/Hotel/profile.php");
                        }
                    }
                    else{
                        alert("Unable to delete tws_grp_message_query!","D","../frontend/Hotel/profile.php");
                    }
                }
                else{
                    alert("Unable to delete tws_hotel_buy_query!","D","../frontend/Hotel/profile.php");
                }
            }
        }
    }
    else{
        alert("Unauthorized glass","D","../../index.php");
    }
  
?>