<!DOCTYPE html>
<html lang="en">
<?php
    include('../../backend/connection.php');
    include('../../../components/alert.php');
    session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with stranger</title>
    <link rel="stylesheet" href="../../../style/profile-style.css">
</head>

<body onload="loader()">
     <?php
    include('../../../components/preloader.php');
    ?> 
    <?php
        include('../../backend/headerProfile.php');
    ?>
    <section id="hotelProfileContainer">
    <main id="hotelProfile">
        <section id="profile">
        <?php
        
             $query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_SESSION[UserLoginId]'";
             $result = mysqli_query($con,$query);

            if($result)
            {
                 if(mysqli_num_rows($result)==1)
                 {

                    $result_fetch=mysqli_fetch_assoc($result);
            ?>

        <div class="profileImageContainer"><img id="profileImage" src="../<?php echo($result_fetch['user_profile_image']);?>"/></div>
            <h2 class="red"><?php echo( $result_fetch['username']);?></h2>
            <?php
            $query = "SELECT `price`, `visibility` FROM `tws_hotel` WHERE hotel_id = '$result_fetch[id]'";
            $resultPrice = mysqli_query($con,$query);
            if($resultPrice){
            $fetched_result = mysqli_fetch_assoc($resultPrice);
            
            ?>
              <div class="priceinfo">
                <span>Price: <span class="red"><?php echo $fetched_result['price']?></span></span>
                <span>Visibility: <span class="red"><?php echo $fetched_result['visibility']?></span></span>
              </div>  
            <?php
            }
            ?>
            
            <div class="options">
                    <button onclick="showPostOperation('postUpload')">Post Something</button>
                    <button onclick="showPostOperation('roomIdHolder')">Enter Room Id</button>
                    <button onclick="showPostOperation('setting')">Setting</button>
            </div>
                <?php
                    }
            }
            ?>
        </section>
        <section id="postsContainer">
            <section id="posts">
            <?php
                $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_SESSION[UserLoginId]'";
                $result=mysqli_query($con,$user_exist_query);
                if($result)
                {
                if(mysqli_num_rows($result)>0)
                {
                
                $result_fetch=mysqli_fetch_assoc($result);
                $user_id = $result_fetch['id'];
                $selectquery = "SELECT * FROM travel_with_strangers_userposts where userid='$user_id'";
                $result = mysqli_query($con,$selectquery);
                if($result)
                {
                if(mysqli_num_rows($result)>0)
                {
                while($result_fetched = mysqli_fetch_array($result))
                {
                    $id=$result_fetched['post_id'];
                    $postURL = $result_fetched['post_url'];
                    $postDescription = $result_fetched['post_description'];
                ?>
                    <div class="post" onclick="showPostOperation('postEdit<?php echo $id?>')">
                    <img class="postImg" src="<?php echo "../".$postURL?>" >
                    </div>
                <?php
                }
                }
                }
                }
                else{
                    ?>
                        <div class="noPost">
                            <img src="../../../media/NoPostsSVG.svg" alt="">
                            <h2>No posts yet</h2>
                        </div>
                    <?php
                }
                }
            ?>

                <!--Php end-->



            </section>
        </section>
    </main>
    </section>
    <section id="Operations">
    <?php
                $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_SESSION[UserLoginId]'";
                $result=mysqli_query($con,$user_exist_query);
                if($result)
                {
                    if(mysqli_num_rows($result)>0)
                    {
                
                        $result_fetch=mysqli_fetch_assoc($result);
                        $user_id = $result_fetch['id'];
                        $selectquery = "SELECT * FROM travel_with_strangers_userposts where userid='$user_id'";
                        $result = mysqli_query($con,$selectquery);
                            if($result)
                            {
                                if(mysqli_num_rows($result)>0)
                                {
                                while($result_fetched = mysqli_fetch_array($result))
                                {
                                    $id=$result_fetched['post_id'];
                                    $postURL = $result_fetched['post_url'];
                                    $postDescription = $result_fetched['post_description'];
                                ?>
                                    <div class="postOperationContainter" id="postEdit<?php echo $id;?>">
                                        <form action="../../../includes/backend/hotel_postEditAndDelete.php" method="POST" class="postOperations" enctype="multipart/form-data">
                                            <div class="closePost" onclick="hidePostOperation('postEdit<?php echo $id;?>')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                                            <div class="postEditImgContainer"><!--Post Image-->
                                                <img src="../<?php echo $postURL;?>" id="previewLoadedImage" class="postEditImg" >
                                                <input type="hidden" name="postId" value="<?php echo $id;?>">
                                            </div>
                                                            
                                            <div class="verticalLineContainer"><div class="verticalLine"></div></div> <!--Vertical Line-->
                                            <div class="postDescriptionNbtn"><!--Post Description-->
                                                <textarea class="postDescription" name="newPostDescription" placeholder="Type something.."><?php echo $postDescription;?></textarea>
                                                <div class="postBtn"><!--Post Operation Button-->
                                                    <input type="submit" name="editBTN" value="Edit Post">
                                                    <input type="submit" name="deleteBTN" value="Delete Post">
                                                </div>
                                            </div>
                                                            
                                        </form>
                                    </div>
                                <?php
                                }
                                }
                            }
                    }
                }
                ?>


        <div class="postOperationContainter" id="postUpload">
            <form action="../../../includes/backend/post_upload.php" enctype="multipart/form-data" method="POST" class="postOperations">
                <div class="closePost" onclick="hidePostOperation('postUpload')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <div class="postEditImgContainer"><!--Post Image-->
                    <button type="button" onclick="document.getElementById('uploadFile').click()" class="chooseImgBtn">Choose Image</button>
                    <img src="../../../media/Upload-Image.png" id="preview" class="postEditImg" >
                    <input type="file" id="uploadFile" name="post_image_upload" style="display:none">
                </div>

                <div class="verticalLineContainer"><div class="verticalLine"></div></div> <!--Vertical Line-->
                <div class="postDescriptionNbtn"><!--Post Description-->
                    <textarea class="postDescription" name="postDescription" placeholder="Type something.."></textarea>
                    <input type="hidden" name="role" value="hotel">

                    <div class="postBtn"><!--Post Operation Button-->
                        <input type="submit" name="uploadPost" value="Post">
                    </div>
                </div>

            </form>
        </div>
        <div class="postOperationContainter" id="roomIdHolder">
            <form method="POST" action="../Hotel/hotel.php" id="roomId">
            <div class="closePost" onclick="hidePostOperation('roomIdHolder')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <h2>Room ID</h2>
                <input type="text" name="roomId" placeholder="Enter room id *" required class="roomIdBox">
                <br>
                <input type="submit" class="roomIdSubmitBtn" value="Submit" name="submitRoomId">
            </form>
        </div>
        <div class="postOperationContainter" id="setting">
            <form method="POST" action="../../backend/uploadPrice.php" class="setting">
            <div class="closePost" onclick="hidePostOperation('setting')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <h2>Setting</h2>
                <select name="visibility" require id="plains" style="width: 16rem; margin-bottom:1rem;" class="visibility">
                    <option style="display: none;">--Select option--</option>
                    <option value="Offline">Offline</option>
                    <option value="Online">Online</option>
                </select>
                <input type="text" name="price" id="price">
                <BR>
                <input type="submit" id="setPrice" value="Submit" name="setPrice">
            </form>
        </div>        
    </section>
<script>
    function hidePostOperation(postDiv){
        document.getElementById(postDiv).style.display='none';
    }
    function showPostOperation(postDiv){
        document.getElementById(postDiv).style.display='flex';
    }
    function loader() {
            var preloader = document.getElementById('loading');
            preloader.style.display = "none";
        }
</script>
<!--This code is to preview image in upload section-->
<script>
    let fileInput = document.getElementById('uploadFile');
    let preview = document.getElementById('preview');

    fileInput.addEventListener('change', () => {
    let file = fileInput.files[0];
    let reader = new FileReader();

    reader.addEventListener('load', () => {
    preview.src = reader.result;
    });

    if (file) {
    reader.readAsDataURL(file);
    }
    });
</script>

</body>