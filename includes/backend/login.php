<?php
include('./connection.php');
include('../../components/alert.php');
session_start();
#This is the code for login
if(isset($_POST['user-login']))
{
    $role = $_POST['role'];
    if($role == 'customer'){
        $query = "SELECT * FROM `travel_with_strangers_registration_user` WHERE  `user_email`= '$_POST[user_email]' AND `user_role` = '$role'";
        $result = mysqli_query($con,$query);

        if($result)
        {    

            if(mysqli_num_rows($result)==1)
            {     

                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==1)
                {
                    if(password_verify($_POST['user_password'],$result_fetch['user_password']))
                    {
                        $_SESSION['logged_in']=true;
                        $_SESSION['UserLoginId']=$result_fetch['user_email'];
                        $_SESSION['userid'] = $result_fetch['id'];
                        $_SESSION['username'] = $result_fetch['username'];
                        header("location: ../../includes/frontend/User/profile.php");
    
                    }
                    else
                    {
                        alert('Password is incorrect','D','../../index.php');
                    }
                }
                else
                {
                    alert('Please verify your email first','W','../../index.php');

                }
                
            }
                else
                {
                    alert('No data found in database','D','../../index.php');
                }
        }
        else
        {
            alert('Email or Username not registered','D','../../index.php');
        }
    }
    else if($role == 'hotel'){
        $query = "SELECT * FROM `travel_with_strangers_registration_user` WHERE  `user_email`= '$_POST[user_email]' AND `user_role` = '$role'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {     

                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==1)
                {
                    if(password_verify($_POST['user_password'],$result_fetch['user_password']))
                    {
                        $_SESSION['logged_in']=true;
                        $_SESSION['UserLoginId']=$result_fetch['user_email'];
                        $_SESSION['username'] = $result_fetch['username'];
                        $_SESSION['userid'] = $result_fetch['id'];
                        $_SESSION['profileURL'] = $result_fetch['user_profile_image'];
                        header("location: ../../includes/frontend/Hotel/profile.php");
    
                    }
                    else
                    {
                        alert('Password is incorrect','D','../../index.php');
                    }
                }
                else
                {
                    alert('Please verify your email first','W','../../index.php');

                }
                
            }
                else
                {
                    alert('No data found in database','D','../../index.php');
                }
        }
        else
        {
            alert('Email or Username not registered','D','../../index.php');
        }

    }

}