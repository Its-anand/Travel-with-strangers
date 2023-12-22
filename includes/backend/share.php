<?php
include('../../components/alert.php');
include('./connection.php');
session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}
random($con);
function random($con){
    $otp = rand(1111, 9999);
    $user_exist_query="SELECT * FROM `tws_grp_members` where `customer_id` ='$otp'";
    $result1 = mysqli_query($con, $user_exist_query);
    if($result1)
    { 
        if(mysqli_num_rows($result1)>0)
        {   
            $result_fetch=mysqli_fetch_assoc($result1);
            if($result_fetch['customer_id']==$otp)
            { 
                random();
            }
        }
        else
        { 
        if(isset($_POST['shareHotelProfile'])){ 
            $query = "UPDATE `tws_grp_members` SET `selected_hotel_id`= '$_POST[hotel_id]', `customer_id` ='$otp' WHERE  group_id = '$_POST[group_id]'";
            $result = mysqli_query($con,$query);

            if($result)
            {    
                alert("Hotel name is shared",'S','../frontend/Hotel/search_hotel.php');
            }
            else{
                alert("Something went wrong $_POST[hotel_id], $otp, $_POST[group_id]",'D','../frontend/Hotel/search_hotel.php');
            }
        }
        }
    }
    else{
        alert("Something went wrong",'D','../frontend/Hotel/search_hotel.php');

    }
}
?>
