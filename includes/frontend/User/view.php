<!DOCTYPE html>
<html lang="en">
<?php
    include('../../backend/connection.php');
    include('../../../components/alert.php');
    session_start();
    if($_GET['user_id']){


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
        
             $query="SELECT * FROM `travel_with_strangers_registration_user` where `id` ='$_GET[user_id]'";
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
            }
            }
            ?>
        </section>
        <section id="postsContainer">
            <section id="posts">
            <?php
                $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `id` ='$_GET[user_id]'";
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
                $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `id` ='$_GET[user_id]'";
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
                                        <div class="postContainer" id="postEdit<?php echo $id;?>">
                                            <div class="postOperations" enctype="multipart/form-data">
                                                <div class="closePost" onclick="hidePostOperation('postEdit<?php echo $id;?>')"><img src="../../../media/closeButton.svg" alt=""></div> <!--Close Button-->
                                                <div class="postImgContainer"><!--Post Image-->
                                                    <img src="../<?php echo $postURL;?>" id="previewLoadedImage" class="postEditImg" >
                                                </div>

                                                <div class="verticalLineContainer"><div class="verticalLine"></div></div> <!--Vertical Line-->
                                                <div class="postDescriptionNbtn"><!--Post Description-->
                                                    <div class="postDescription" name="newPostDescription"><?php echo $postDescription;?></div>
                                                </div>
                                                            
                                            </div>
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
                    }
                }
                ?>
       
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
</html>
<?php
}
else{
    alert('No user id selected','d','../../../index.php');
}
?>