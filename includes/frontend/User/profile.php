<!DOCTYPE html>
<html lang="en">
<?php
    include('../../backend/connection.php');
    include('../../../components/alert.php');
    session_start();
    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../Index.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with stranger</title>
    <link rel="stylesheet" href="../../../style/profile-style.css">
</head>

<body onload="loader()">
    <!-- <?php
    include('../../../components/preloader.php');
    ?> -->
    <header>
        <a id="logo" href="../../../Index.php">Travel with stranger</a>
        <a href="../../backend/logout.php" title="Log out">
            <img id="logoutBtn" src="../../../media/Logout.svg" alt="">
        </a>
    </header>

    <main>
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
        <div class="profileImageContainer"><img id="profileImage" src="<?php echo($result_fetch['user_profile_image']);?>"/></div>
            <h2 style="color: red;"><?php echo( $result_fetch['username']);?></h2>
            <div class="options">
                <button onclick="showPostOperation('postUpload')">Post Something</button>
                <select id="plains" onchange="location = this.value;">
                    <option style="display: none;">View option</option>
                    <option value="./create-group.html">Create new group</option>
                    <option value="./join-group.html">Join other group</option>
                    <option value="./view-group.html">View plains</option>
                </select>
            </div>
                <?php
                    }
            }
?>
        </section>
        <section id="postsContainer">
            <section id="posts">
            <?php
                $user_id = $_SESSION['UserLoginId'];
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
                    <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" >
                    </div>
                <?php
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


                <!-- <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" alt="">
                </div>
                <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" alt="">
                </div>
                <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" alt="">
                </div>
                <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" alt="">
                </div>
                <div class="post" onclick="showPostOperation('temp')">
                    <img class="postImg" src="../../../media/profile.png" alt="">
                </div> -->
            </section>
        </section>
    </main>
    <section id="Operations">
        <div class="postOperationContainter" id="postEdit">
            <form action="#" method="POST" class="postOperations">
                <div class="closePost" onclick="hidePostOperation('postEdit')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <div class="postEditImgContainer"><!--Post Image-->
                    <button type="button" class="chooseImgBtn">Choose Image</button>
                    <img src="../../../media/profile.png" class="postEditImg" >
                </div>

                <div class="verticalLineContainer"><div class="verticalLine"></div></div> <!--Vertical Line-->
                <div class="postDescriptionNbtn"><!--Post Description-->
                    <textarea class="postDescription" placeholder="Type something.."></textarea>
                    <div class="postBtn"><!--Post Operation Button-->
                        <input type="submit" name="editBTN" value="Edit Post">
                        <input type="submit" name="editBTN" value="Delete Post">
                    </div>
                </div>

            </form>
        </div>

        <div class="postOperationContainter" id="postUpload">
            <form action="../../../includes/backend/post_upload.php" method="POST" class="postOperations">
                <div class="closePost" onclick="hidePostOperation('postUpload')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                <div class="postEditImgContainer"><!--Post Image-->
                    <button type="button" onclick="document.getElementById('uploadFile').click()" class="chooseImgBtn">Choose Image</button>
                    <img src="../../../media/Upload-Image.png" id="preview" class="postEditImg" >
                    <input type="file" id="uploadFile" name="post_image_upload" style="display:none">
                </div>

                <div class="verticalLineContainer"><div class="verticalLine"></div></div> <!--Vertical Line-->
                <div class="postDescriptionNbtn"><!--Post Description-->
                    <textarea class="postDescription" name="postDescription" placeholder="Type something.."></textarea>
                    <div class="postBtn"><!--Post Operation Button-->
                        <input type="submit" name="uploadPost" value="Post">
                    </div>
                </div>

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

    const fileInput = document.getElementById('uploadFile');
    const preview = document.getElementById('preview');

    fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.addEventListener('load', () => {
    preview.src = reader.result;
    });

    if (file) {
    reader.readAsDataURL(file);
    }
    });

</script>
</body>