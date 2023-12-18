<?php
 include('./connection.php');
 include('../../components/alert.php');
 if(isset($_GET['email']) && isset($_GET['v_code']))
{
    $query = "SELECT *FROM `travel_with_strangers_registration_user`WHERE `user_email`='$_GET[email]' and `verification_code`= '$_GET[v_code]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
                $update="UPDATE `travel_with_strangers_registration_user` SET `is_verified`='1' where `user_email`='$result_fetch[user_email]'";
                if($result_fetch['user_role']=='hotel'){
                    if(mysqli_query($con,$update))
                    {
                            alert('Email verification is successful','S','../../Index.php');    
                            $newQuery = "INSERT INTO `tws_hotel`(`hotel_id`) VALUES ('$result_fetch[id]')";  
                            if(mysqli_query($con,$newQuery))
                            {
                                alert('Email verification is successful','S','../../Index.php');    
                            }
                    }
                    else
                    {
                            alert('Unknown Error in verifying hotel','D','../../Index.php');
                    }
                }
                else{
                    if(mysqli_query($con,$update))
                    {
                            alert('Email verification is successful','S','../../Index.php');    
                    }
                    else
                    {
                            alert('Unknown Error in verifying customer','D','../../Index.php');
                    }
                }

            }
            else
            {
                alert('Email is already verified','D','../../Index.php');
            }
        }
    }
    else
    {
            alert('Unknown Error','D','../../Index.php');
    }
}
else{
    alert('Link is not right','D','../../Index.php');
 
}
?>