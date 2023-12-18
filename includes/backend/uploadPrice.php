<?php
include('./connection.php');
include('../../components/alert.php');

session_start();

#This is the code for registration 
if(isset($_POST['setPrice']))
{
    $query = "UPDATE `tws_hotel` SET `price`='$_POST[price]',`visibility`='$_POST[visibility]' WHERE hotel_id = '$_SESSION[userid]'";
    $result = mysqli_query($con, $query);
    if($result){
        alert("Price and visibility changed","S","../frontend/Hotel/profile.php");
    }
    else{
        alert("Unable to connect with the database","D","../frontend/Hotel/profile.php");
    }
}
else{
    alert("Fill the form first","D","../frontend/Hotel/profile.php");
}