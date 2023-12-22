<?php
include('./connection.php');
include('../../components/alert.php');

session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}

    if(isset($_POST['hidden'])){
        $query = "SELECT * FROM `tws_buy_hotel` WHERE customer_id = $_POST[customer_id] AND user_id = $_POST[user_id] ";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                alert("You have already booked hotel in this group","W","../frontend/User/chat.php");
            }
            else{
                $insertQuery = "INSERT INTO `tws_buy_hotel`(`customer_id`, `group_id`, `hotel_id`, `price`, `user_id`) VALUES ('$_POST[customer_id]','$_POST[group_id]','$_POST[hotel_id]','$_POST[price]','$_POST[user_id]')";
                $insertQueryResult=mysqli_query($con,$insertQuery);
                if($insertQueryResult)
                {
                    alert("Hotel is booked","S","../frontend/User/chat.php");
                }
                else{
                    alert("Something went wrong","W","../frontend/User/chat.php");
                }
            }
        }
        else{
            alert("Unable to fetch data","D","../frontend/User/chat.php");
        }
    }
    else{
        alert("No value found","D","../frontend/User/chat.php");
    }

?>