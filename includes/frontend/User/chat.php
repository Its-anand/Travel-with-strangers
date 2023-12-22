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


</head>
<body>

    <header>
        <a id="logo" href="../../../Index.php">Travel with stranger</a>
        <div class="account_button_container">
        <a href="./profile.php"><img src="../../../media/profile.svg" alt=""></a>
        <a href="../../backend/logout.php" title="Log out">
        <img id="logoutBtn" src="../../../media/Logout.svg">
        </a>
        </div>
    </header>
    <aside class="aside">
    <?php
                    $user_id = $_SESSION['userid'];

                    $query = "SELECT tws_grp.group_name, tws_grp.group_profile_pictures, tws_grp.location_from, tws_grp.location_to, tws_grp.grp_id, tws_grp_members.selected_hotel_id from tws_grp inner join tws_grp_members on tws_grp.grp_id = tws_grp_members.group_id where user_id = '$user_id' AND status = '1'";
                    $result = mysqli_query($con,$query);

                    if($result)
                    {    
            
                        if(mysqli_num_rows($result)>0)
                        {     
                            while($result_fetched = mysqli_fetch_assoc($result))
                            {
                                ?>
                                    <div class="users"  id="from_id" onclick="display('<?php echo  $result_fetched['grp_id']?>')">
                                    <input type="hidden" name="group_id" id="groupID<?php echo  $result_fetched['grp_id']?>" value="<?php echo  $result_fetched['grp_id']?>">

                                        <div class="profileImageHolder"><img class="profileImg" src="../<?php echo  $result_fetched['group_profile_pictures']?>" alt=""></div>
                                        <div class="usernameHolder"><b class="username"><?php echo $result_fetched['group_name']?></b></div>
                                        <div class="locationHolder"><span class="locationFrom location"><?php echo  $result_fetched['location_from']?></span> <span class="arrow location">➜</span> <span class="locationTo location"><?php  echo $result_fetched['location_to']?></span></div>
                                    </div>
                                <?php
                            }
                            
                        }
                        else{
                            ?>
                            <div class ="noticeAlert">
                                <?php
                                    alert("You are not part of any group yet","W","./profile.php");
                                ?>
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
        <div id="hider">
            <p>Chat will appear here</p>
        </div>
        <div class="message_section" id="chatBox">

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
    <h3 class="new_requests">Selected Hotel</h3>

        <div id="payHotel">

        </div>
         
        <b class="new_requests">Requests</b><br><br>
        <div id="allRequests">

        </div>
   

    </aside>


<script>
// Display message
var groupID = null;
var hotelID = null;
var intervalID;
var AsideIntervalID;
var hotelIntervalID;

function display(id) {
    groupID = $('#groupID' + id).val();
    document.getElementById('hider').style.display='none';
    clearInterval(intervalID);

    intervalID = setInterval(() => {
        $.post('../../backend/fetchMsg.php',{groupID: groupID},function(data, status){
            //console.log(data); //Use console to check what is the error
            document.getElementById('chatBox').innerHTML = data;
        });
    }, 1000);
    
    //Group join Request
    clearInterval(AsideIntervalID);

     AsideIntervalID = setInterval(() => {
     $.post('../../backend/fetchRequestData.php',{groupID: groupID},function(data, status){
         //console.log(data); //Use console to check what is the error
         document.getElementById('allRequests').innerHTML = data;
     });
    }, 2000);
    

    //Hotel Booking Request
    clearInterval(hotelIntervalID);
    hotelIntervalID = setInterval(() => {
    $.post('../../backend/selectedHotel.php',{groupID: groupID},function(data, status){
     //   console.log(data); //Use console to check what is the error
        document.getElementById('payHotel').innerHTML = data;
    });
    }, 1000);
    }

function sendMessage(){
    var messageValue = $('#inputMsg').val();
    var username = $('#username').val();
    console.log(groupID);
    $.post('../../backend/chatUpload.php',{userID: <?php echo $_SESSION['userid']?>, message: messageValue, groupId: groupID},function(data, status){
        console.log(data);
        $('#inputMsg').val("");
    });
}

</script>
</body>
</html>