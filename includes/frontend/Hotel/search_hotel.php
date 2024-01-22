<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../../../includes/backend/connection.php');
include('../../../components/alert.php');
if(!isset($_SESSION['logged_in']))
{
    header("location: ../../../index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Group</title>
    <style>
        :root {
            --primaryColor: #FC0000;
            --bgcolor: #fff;
            --font: #fff;
            --bgcolor2: #F0F8FF;
            --shadesblack: #8282822e;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            border: 2px solid var(--primaryColor);
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: red;
            border-radius: 10px;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #b30000;
        }

        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0%;
            height: calc(100vh - 6rem);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.5fr 0.1fr 0.8fr;
            grid-template-rows: 6rem 1.7fr;
            gap: 0px 0px;
            grid-auto-flow: row;
            grid-template-areas:
                "header header header"
                "aside center main";
        }

        .header {
            grid-area: header;
        }

        /*--------------------------------------Header---------*/
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            padding: 0 2rem;
            height: 7rem;
            width: 100%;
            color: var(--primaryColor);
        }

        #logo {
            font-size: 1.7rem;
            font-weight: bold;
            font-size: 1.7rem;
            font-weight: bold;
            color: red;
            text-decoration: none;
        }

        #logoutBtn {
            width: 2rem;
        }


        .aside {
            grid-area: aside;
            box-sizing: border-box;
            padding: 4rem 9rem;

        }

        .aside label {
            color: var(--primaryColor);
        }

        .main {
            grid-area: main;
        }

        .center {
            grid-area: center;
            display: flex;
            justify-content: center;

        }

        .VR {
            height: 45%;
            border: 1px solid var(--primaryColor);

        }

        #results {
            width: 98%;
            height: calc(100vh - 8rem);
            display: flex;
            align-items: center;
            flex-direction: column;
            overflow-y: auto;
            box-sizing: border-box;
            padding-top: 1rem;
        }

        input {
            width: 100%;
            height: 2.5rem;
            border-radius: 10px;
            border: 1px solid #000;
            padding-left: 1rem;
        }

        button {
            height: 2.5rem;
            border-radius: 10px;
            padding: 0 1rem;
            background-color: #fff;
            border: 1px solid #000;
            box-sizing: border-box;
            cursor: pointer;
            margin-top: 2rem;
            width: 10rem;
            padding: 0 1rem;
            font-size: 1rem;
        }

        button:hover {
            outline: 1px solid #000;
        }

        .group {
            font-size: 0.9rem;
            width: 24rem;
            height: 4rem;
            border-radius: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 50% 50%;
            gap: 0px 0px;
            grid-auto-flow: row;
            grid-template-areas:
                "group_name group_name request_container"
                "location location request_container";
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            box-sizing: border-box;
            padding: 0.3rem 0;
            margin-bottom: 1.5rem;
        }

        .group_name {
            grid-area: group_name;

        }

        .location,
        .group_name {
            padding-left: 1rem;
            display: flex;
            align-items: center;
        }

        .location {
            grid-area: location;
            color: #000000a6;
        }
        .account_button_container{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
        width: 8rem;
        }
        .request_container {
            grid-area: request_container;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #group_request_btn {
            width: 6rem;
            height: 2rem;
            background-color: var(--primaryColor);
            color: var(--font);
            border: none;
            margin: 0%;
            font-size: 0.9rem;
        }

        #group_request_btn:hover {
            outline: none;

        }

        .notice {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primaryColor);
        }
        .postOperationContainter{
  position: fixed;
  width: 100%;
  height: 100vh;
  top: 0px;
  right: 0px;
  background: rgba( 0, 0, 0, 0.25 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 4px );
  -webkit-backdrop-filter: blur( 4px );
  display: flex;
  justify-content: center;
  align-items: center;
  display: none;
}
.setting{
  width: 30rem;
  height: 40rem;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  border-radius: 10px;
  flex-direction: column;
}

.closePost{
  position: absolute;
  top: 1rem;
  right: 1rem;
  cursor: pointer;
}

        .red{
            color:red;
        }

    </style>
</head>

<body>
<header class="header">
        <a id="logo" href="../../../index.php">Travel with stranger</a>
        <div class="account_button_container">
        <a href="../User/profile.php"><img src="../../../media/profile.svg" alt=""></a>
        <a href="../../backend/logout.php" title="Log out">
        <img id="logoutBtn" src="../../../media/Logout.svg" alt="">
        </a>
        </div>
    </header>
    <form action="#" class="aside" method="post">
        <h1 class="red">Search Hotel</h1>
        <label for="location">Location</label> <br><br>
        <input type="text" placeholder="Enter place name *" required name="location">
        <br><br><br>
        <label for="budget">Price</label> <br><br>
        <input type="text" placeholder="Enter your budget * " required name="budget">

        <button type="submit" name="searchGroup">Search</button>
    </form>

    <section class="center">
        <div class="VR"></div>
    </section>
    <section class="main">
        <div id="results">
            <?php
                if(!isset($_POST['searchGroup'])){
                ?>
                    <div id="results">
                        <div class="notice">
                            <p>Search results will appear here</p>
                        </div>
                    </div> 
                <?php
                }
                else if(isset($_POST['searchGroup'])){
                    $query = "SELECT * FROM `tws_hotel` inner JOIN `travel_with_strangers_registration_user` ON travel_with_strangers_registration_user.id = tws_hotel.hotel_id WHERE user_location LIKE '%$_POST[location]%' AND price <= '$_POST[budget]' AND visibility = 'Online'";
                    $result = mysqli_query($con,$query);
            
                    if($result)
                    {    
            
                        if(mysqli_num_rows($result)>0)
                        {     
                            while($result_fetched = mysqli_fetch_assoc($result))
                            {
                                ?>
                                    <div class="group">
                                        <div class="group_name">
                                            <p><?php echo $result_fetched['username']?></p>
                                        </div>
                                        <div class="location">
                                            <p><?php echo  $result_fetched['price']?> Per day</p>
                                        </div>
                                        <div class="request_container" >
                                            <input type="hidden" name="hotel_id" id = "hotel_id" value="<?php echo  $result_fetched['hotel_id']?>">
                                            <button id="group_request_btn" onclick="showPostOperation('setting')" name="requestGroupJoin">Select</button>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div id="results">
                                <div class="notice">
                                    <p>No result Found</p>
                                </div>
                            </div> 
                        <?php
                        }
                    }
                    else{
                    ?>
                        <div id="results">
                            <div class="notice">
                                <p>Unable to connect to database</p>
                            </div>
                        </div> 
                    <?php
                    }
                }
            ?>

        </div>
        <div id="results">
            <div class="notice">
                <p>Search results will appear here</p>
            </div>
        </div> 
    </section>
    <div class="postOperationContainter" id="setting">
        <form method="POST" action="../../backend/uploadPrice.php" class="setting">
            <div class="closePost" onclick="hidePostOperation('setting')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <h2>Groups</h2>
                <div id="groupContainer">
                        <?php
                            if(isset($_POST['searchGroup'])){
                                $query = "SELECT * FROM `tws_grp` inner JOIN `tws_grp_members` ON tws_grp_members.group_id = tws_grp.grp_id  WHERE tws_grp_members.role = 'admin' AND tws_grp_members.user_id = '$_SESSION[userid]'";
                                $result = mysqli_query($con,$query);
                        
                                if($result)
                                {    
                        
                                    if(mysqli_num_rows($result)>0)
                                    {     
                                        while($result_fetched = mysqli_fetch_assoc($result))
                                        {
                                            ?>
                                                <div class="group">
                                                    <div class="group_name">
                                                        <p><?php echo $result_fetched['group_name']?></p>
                                                    </div>
                                                    <div class="location">
                                                        <p><?php echo  $result_fetched['location_from']?> -> <?php  echo $result_fetched['location_to']?></p>
                                                    </div>
                                                    </form><!--DON'T DELETE IT-->
                                                    <form method="post" action="../../backend/share.php" class="request_container">
                                                        <input type="hidden" name="group_id" value="<?php echo  $result_fetched['grp_id']?>">
                                                        <input type="hidden" name="hotel_id" class="hotel">
                                                        <button id="group_request_btn" name="shareHotelProfile">Send</button>
                                                    </form>
                                                </div>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <div id="results">
                                            <div class="notice">
                                                <p>Create group first</p>
                                            </div>
                                        </div> 
                                    <?php
                                    }
                                }
                                else{
                                ?>
                                    <div id="results">
                                        <div class="notice">
                                            <p>Unable to connect to database</p>
                                        </div>
                                    </div> 
                                <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </form>
    </div>  
</body>
<script>
    function hidePostOperation(postDiv){
        document.getElementById(postDiv).style.display='none';
    }
    function showPostOperation(postDiv){
        document.getElementById(postDiv).style.display='flex';
        let hotelID = document.getElementById('hotel_id').value;
        var inputs = document.getElementsByClassName('hotel');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].setAttribute("value", hotelID);
        }
    }
</script>
</html>