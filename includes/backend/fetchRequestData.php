<?php
include('./connection.php');
session_start();

if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}
$groupID = $_POST['groupID'];
$res = "";
$query = "SELECT * FROM `tws_grp_members` right JOIN `travel_with_strangers_registration_user` ON travel_with_strangers_registration_user.id = tws_grp_members.user_id WHERE role = 'member' AND status = '0' AND group_id = '$groupID'";
$result = mysqli_query($con,$query);
if($result){
  if(mysqli_num_rows($result) > 0){
    while($row  = mysqli_fetch_assoc($result)){
        $res = $res . '<div class="requests" id="requests">';
                
        $res = $res . '<a href="./view-profile.php?' . $row['id'] . '" title="View Profile"><img src="../'. $row['user_profile_image'] . ' "</a>';
        $res = $res . '<a href="./view-profile.php? '.$row['id'] .'" title="View Profile" class="requested_users_name"><b>'. $row['username'].'</b></a>';
        $res = $res . '<form action="../../backend/delete_request.php" method="POST" class="request_operation">';
        $res = $res . '<input type="hidden" name="memberId" value="' . $row['group_member_id'] . '">';
        $res = $res . '<input type="hidden" name="ViewedGroupId" value=" '. $groupID .'">';
        $res = $res . '<button type="submit" value="" name="reject"> 
                            <svg width="40" height="40" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="red" stroke-width="18"/>
                                <path d="M212.279 191L689.915 668.636" stroke="red" stroke-width="18" stroke-linecap="round"/>
                                <path d="M201 668.636L678.636 191" stroke="red" stroke-width="18" stroke-linecap="round"/>
                            </svg>
                       </button>';
        $res = $res . '<button type="submit" value="accept" name="accept">
                        <svg width="40" height="40" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="green" stroke-width="18"/>
                            <path stroke-width="18" d="M136.364 408.593C132.849 405.078 127.151 405.078 123.636 408.593C120.121 412.108 120.121 417.806 123.636 421.321L136.364 408.593ZM123.636 421.321L365.632 663.317L378.36 650.589L136.364 408.593L123.636 421.321Z" fill="green"/>
                            <path stroke-width="18" d="M757.566 272.364C761.08 268.849 761.08 263.151 757.566 259.636C754.051 256.121 748.353 256.121 744.838 259.636L757.566 272.364ZM377.89 652.039L757.566 272.364L744.838 259.636L365.163 639.311L377.89 652.039Z" fill="green"/>
                        </svg>
                       </button>';
        $res = $res .  '</form> </div>';              
    }
  }
  echo $res;
}
else{
  echo "Failed";
}
