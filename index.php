<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with stranger</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body onload="loader()">
    <?php
        include('./includes/backend/connection.php');
        include('./components/preloader.php');
        include('./components/alert.php');
    ?>
    <header>
        <span id="logo">Travel with stranger</span>
        <section id="menu" onclick="displayMenu()">
            <div class="line first-line"></div>
            <div class="line second-line"></div>
            <div class="line third-line"></div>
        </section>
    </header>
    <nav id="nav">
        <h2>About</h2>
        <p>My name is Anand Choudhary. I am the developer of this project. This project is about traveling <br> where one can make stranger friends and can travel with them</p>
    </nav>
    <main>
        <section class="description-container main--section">
            <div class="swipe">

                <div id="div1">
                    <form method="Post" action="./includes/backend/register.php" enctype="multipart/form-data" id="signup" class="homepage-form">
                        <div id="h2">
                            <h2>Registration</h2>
                        </div>
                        <p class="labelHolder"><label for="user_profile_image">Select Profile</label></p>
                        <input type="file" id="upload" name="user_profile_image">
                        <select name="user_role" require id="role">
                            <option >--Select Your Role--</option>
                            <option value="customer">Customer</option>
                            <option value="hotel">Hotel</option>
                        </select>
                        <input type="text" class="input-registration" name="username" placeholder="Full Name *" required>
                        <input type="email" class="input-registration" name="user_email" placeholder="Email *" required>
                        <input type="password" class="input-registration" name="user_password" placeholder="Password *" required>
                        <input type="text" class="input-registration" name="user_location" placeholder="Location *" required>
                        <div id="button">
                            <input type="submit" class="submit-registration" value="Submit" name="user-registration">
                            <input onclick="showForm('div3')" type="button" value="Go Back" class="submit-registration">
                        </div>
                    </form>
                </div>
                <div id="div2">
                    <form method="Post" action="./includes/backend/login.php"  id="login" class="homepage-form">
                        <div id="h2">
                            <h2>Login</h2>
                        </div>
                        <select name="role" id="role">
                            <option >--Select Your Role--</option>
                            <option value="customer">Customer</option>
                            <option value="hotel">Hotel</option>
                        </select>
                        <input type="email" class="input-registration" name="user_email" placeholder="Email *" required>
                        <input type="password" class="input-registration" name="user_password" placeholder="Password *" required>
                        <div id="button">
                            <input type="submit" class="submit-registration" value="Submit" name="user-login">
                            <input onclick="showForm('div3')" type="button" value="Go Back" class="submit-registration">
                        </div>
                    </form>
                </div>
                <div id="div3">
                    <div class="description">
                        <h1>Ready to explore the world<br> with someone new? <br> Join Travel with Stranger now</h1>
                        <button onclick="showForm('div1')" class="registration">Lets go!</button>
                        <p id="loginBtn">already have an account <b onclick="showForm('div2')">Sign in</b>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="video-container main--section">
            <video autoplay muted loop id="homepage-video">
                <source src="./media/homepage_video-with-white-bg.mp4" type="video/mp4">
            </video>
        </section>
    </main>
    <script>
        function displayMenu() {
            let nav = document.getElementById('nav');
            if (nav.style.display == 'none' || nav.style.display == '') {
                nav.style.display = 'flex';
            } else {
                nav.style.display = 'none';
            }
        }

        function loader() {
            var preloader = document.getElementById('loading');
            preloader.style.display = "none";
        }

        function showForm(tag){
            document.getElementById('div1').style.zIndex='';
            document.getElementById('div2').style.zIndex='';
            document.getElementById('div3').style.zIndex='';
            let currentTag = document.getElementById(tag);
            currentTag.style.zIndex='1';
            console.log(currentTag);
        }
    </script>
</body>

</html>