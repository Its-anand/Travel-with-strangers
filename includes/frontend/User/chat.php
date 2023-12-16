<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('../../../includes/backend/connection.php');
include('../../../components/alert.php');
if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../Index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Group</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../style/chat.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>" id="username">
    <input type="hidden" name="userID" value="<?php echo $_SESSION['userid']?>" id="userID">

  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a062b91ff5b1e33d7045', {
      cluster: 'ap2'
    });
    var channel = pusher.subscribe('TWSchatApp');
    channel.bind('my-event', function(data) {
      var chatJoinedMsg = '<p class="JoinedMsg"><span class="msg joinedPerson">'+data.username+' has joined</span></p>';
      $('.message_section').append(chatJoinedMsg);
    });
  </script>
</head>
<body>
    <header>
        <a id="logo" href="../../../Index.php">Travel with stranger</a>
        <a href="../../backend/logout.php" title="Log out">
        <img id="logoutBtn" src="../../../media/Logout.svg" alt="">
        </a>
    </header>
    <aside class="aside">
    <?php
                    $user_id = $_SESSION['userid'];

                    $query = "SELECT tws_grp.group_name, tws_grp.group_profile_pictures, tws_grp.location_from, tws_grp.location_to, tws_grp.grp_id from tws_grp inner join tws_grp_members on tws_grp.grp_id = tws_grp_members.group_id where user_id = '$user_id' AND status = '1'";
                    $result = mysqli_query($con,$query);

                    if($result)
                    {    
            
                        if(mysqli_num_rows($result)>0)
                        {     
                            while($result_fetched = mysqli_fetch_assoc($result))
                            {
                                ?>
                                    <form class="users" method="POST" id="from_id" onclick="document.getElementById('from_id').submit();">
                                        <input type="hidden" name="group_id" id="groupID" value="<?php echo  $result_fetched['grp_id']?>">
                                        <div class="profileImageHolder"><img class="profileImg" src="../<?php echo  $result_fetched['group_profile_pictures']?>" alt=""></div>
                                        <div class="usernameHolder"><b class="username"><?php echo $result_fetched['group_name']?></b></div>
                                        <div class="locationHolder"><span class="locationFrom location"><?php echo  $result_fetched['location_from']?></span> <span class="arrow location">➜</span> <span class="locationTo location"><?php  echo $result_fetched['location_to']?></span></div>
                                    </form>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div class="result">
                                    <p>No result Found</p>
                            </div> 
                        <?php
                        }
                    }
                    else{
                    ?>
                        <div class="result">
                                <p>Unable to connect to database</p>
                        </div> 
                    <?php
                    }
                
            ?>
            

         
    </aside>
    <main>

        <div class="message_section" id="chatBox">
        <div class="result">
            <p>Chat will appear here</p>
        </div>
        </div>
        <div class="msg_input">
            <input type="text" id="inputMsg" placeholder="Message">
            <button onclick="sendMessage()">
            <svg class="sendIcon" width="30"  viewBox="0 0 204 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_109_14)">
                <path d="M174.367 13.6653L19.7139 75.0205C13.8852 77.3329 15.0631 85.9093 21.2993 86.5648L96.9912 94.5203M174.367 13.6653L135.881 166.542C134.447 172.24 126.526 172.694 124.45 167.198L96.9912 94.5203M174.367 13.6653L96.9912 94.5203"  stroke-width="13"/>
                </g>
                <defs>
                <clipPath id="clip0_109_14">
                <rect width="204" height="188" fill="white"/>
                </clipPath>
                </defs>
            </svg>

            </button>
        </div>
    </main>
    <aside class="aside1">
    <?php       
                if(isset($_POST['group_id'])){
                    $query = "SELECT * FROM `tws_grp` WHERE grp_id = '$_POST[group_id]' ";
                    $GroupResult = mysqli_query($con,$query);
            
                    if($GroupResult)
                    {    
            
                        if(mysqli_num_rows($GroupResult)>0)
                        {     
                            $result_fetch=mysqli_fetch_assoc($GroupResult);
                                ?>
                                    <section class="users" method="POST" id="from_id">
                                        <input type="hidden" name="group_id" value="<?php echo  $result_fetch['grp_id']?>">
                                        <input type="submit" value="" hidden>
                                        <div class="profileImageHolder"><img class="profileImg" src="../<?php echo  $result_fetch['group_profile_pictures']?>" alt=""></div>
                                        <div class="usernameHolder"><b  class="username"><?php echo $result_fetch['group_name']?></b></div>
                                        <div class="locationHolder"><span class="locationFrom location"><?php echo  $result_fetch['location_from']?></span> <span class="arrow location">➜</span> <span class="locationTo location"><?php  echo $result_fetch['location_to']?></span></div>
                                    </section>
                                <?php
                                $query = "SELECT * FROM `tws_grp_members` WHERE user_id = '$user_id' AND role = 'admin' AND status = '1' AND group_id = '$result_fetch[grp_id]' ";
                                $adminResult = mysqli_query($con,$query);
                                if($adminResult){
                                    if(mysqli_num_rows($GroupResult)>0)
                                    {     
                                        $query = "SELECT * FROM `tws_grp_members` right JOIN `travel_with_strangers_registration_user` ON travel_with_strangers_registration_user.id = tws_grp_members.user_id WHERE role = 'member' AND status = '0' AND group_id = '$result_fetch[grp_id]' ";
                                        $adminResult = mysqli_query($con,$query);
                                        if($adminResult){
                                            if(mysqli_num_rows($adminResult)>0)
                                            {   ?>
                                                    <b class="new_requests">Requests</b><br><br>
                                                <?php
                                                while($fetched_userData = mysqli_fetch_assoc($adminResult))
                                                {
                                                ?>
                                                    <div class="requests">
                                                    <a href="./view-profile.php?<?php echo $fetched_userData['id']?>" title="View Profile"><img src="../<?php echo $fetched_userData['user_profile_image']?>" alt=""></a>
                                                        <a href="./view-profile.php?<?php echo $fetched_userData['id']?>" title="View Profile" class="requested_users_name"><b><?php echo $fetched_userData['username']?></b></a>
                                                        <form action="#" method="POST" class="request_operation">
                                                            <button type="submit" value="<?php echo $fetched_userData['id']?>" name="reject"> 
                                                            <svg width="40" height="40" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="red" stroke-width="18"/>
                                                                <path d="M212.279 191L689.915 668.636" stroke="red" stroke-width="18" stroke-linecap="round"/>
                                                                <path d="M201 668.636L678.636 191" stroke="red" stroke-width="18" stroke-linecap="round"/>
                                                            </svg>
                                                            </button>

                                                            <button type="submit" value="<?php echo $fetched_userData['id']?>" name="accept">
                                                            <svg width="40" height="40" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="green" stroke-width="18"/>
                                                                <path stroke-width="18" d="M136.364 408.593C132.849 405.078 127.151 405.078 123.636 408.593C120.121 412.108 120.121 417.806 123.636 421.321L136.364 408.593ZM123.636 421.321L365.632 663.317L378.36 650.589L136.364 408.593L123.636 421.321Z" fill="green"/>
                                                                <path stroke-width="18" d="M757.566 272.364C761.08 268.849 761.08 263.151 757.566 259.636C754.051 256.121 748.353 256.121 744.838 259.636L757.566 272.364ZM377.89 652.039L757.566 272.364L744.838 259.636L365.163 639.311L377.89 652.039Z" fill="green"/>
                                                            </svg>
                                                            </button>
                                                        </form>
                                                    </div>

                                                <?php
                                                }
                                            }
                                        }
        
                                    }
                                }
                                else{
                                    alert("Look like you are not admin","W");
                                }
                        }
                        
                        else{
                            ?>
                            <div class="result">
                                    <p>No result Found</p>
                            </div> 
                        <?php
                        }
                    }
                    else{
                    ?>
                        <div class="result">
                                <p>Unable to connect to database</p>
                        </div> 
                    <?php
                    }
                }else{
                    ?>
                    <div class="result">
                            <p>Profile will appear here</p>
                    </div> 
                <?php
                }
            ?>



    </aside>

<script>
//Check user and save msg into database
$(document).ready(function(){
    var username = $('#username').val();
    $.post('../../backend/userJoined.php',{username: username},function(response){
        console.log(response);
    });
});
function sendMessage(){
    var messageValue = $('#inputMsg').val();
    var username = $('#username').val();
    var groupID = $('#groupID').val();
    
    $.post('../../backend/chatUpload.php',{userID: <?php echo $_SESSION['userid']?>, message: messageValue, groupId: groupID},function(data, status){
        console.log(data);
        $('#inputMsg').val("");
    });
}

</script>

<script>
    // Display message
    var groupID = $('#groupID').val();

        setInterval(() => {
        $.post('../../backend/fetchMsg.php',{groupID: groupID},function(data, status){
        //console.log(data); //Use console to check what is the error
        document.getElementById('chatBox').innerHTML = data;

        });
        }, 1000);
    
</script>

</body>
</html>