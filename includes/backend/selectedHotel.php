<?php
include('./connection.php');
session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}

$groupID = intval($_POST['groupID']);
$userID = intval($_SESSION['userid']);

$res = "";
$query = "SELECT * FROM `travel_with_strangers_registration_user` inner JOIN `tws_grp_members` ON travel_with_strangers_registration_user.id = tws_grp_members.selected_hotel_id inner join tws_hotel ON tws_hotel.hotel_id = travel_with_strangers_registration_user.id where group_id = $groupID AND user_id = '$userID'";
$result = mysqli_query($con,$query);
if($result){
  if(mysqli_num_rows($result) > 0){
    while($row  = mysqli_fetch_assoc($result)){

        $res = $res . '<div class="hotel">';
        $res = $res . '<div class="hotelProfile">';
        $res = $res . '<img src="../'. $row['user_profile_image'] .'" >';
        $res = $res . '</div>';
        $res = $res . '<div class="hotelName"><h2>'. $row['username'] .'</h2></div>';
        $res = $res . '<div class="bookingInfo"><span class="bookedUser">ID: '. $row['customer_id'] .'</span></div>';
        $res = $res . '<form action="../../backend/payscript.php" method="POST" class="bookBtn">
                            <input type="hidden" name="user_id" value="'. $userID .'">
                            <input type="hidden" name="group_id" value="'. $groupID .'">
                            <input type="hidden" name="hotel_id" value="'. $row['hotel_id'] .'">
                            <input type="hidden" name="customer_id" value="'. $row['customer_id'] .'">
                            <input type="hidden" name="price" value="'. $row['price'] .'">
                            <button type="submit" name="hotelBooking">Book Now</button>
                      </form>';
        $res = $res . '</div>';
    }
  }
  echo $res;
}
else{
  echo "Failed";
}
