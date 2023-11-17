<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with strangers</title>
    <link rel="stylesheet" href="./style_and_script/style.css">
</head>
<body>
<nav >
    <div id="close" onclick="document.querySelector('nav').style.display='none'">X</div>
    <a href="./includes/registration.php">User Registration</a>
    <a href="./includes/login.php">User Login</a>
    <a href="./includes/FindFriend.php">Find Friend</a>
    <a href="#">Bus Service Registration</a>
    <a href="#">Bus Service Login</a>
    <a href="#">Hotel Service Registration</a>
    <a href="#">Hotel Service Login</a>
    <a href="./includes/contact.php">Contact Us</a>
    <a href="./includes/about.php">About Us</a>
</nav>
<header>
    <h2 id="logo">Travel With Stranger</h2>
    <span></span>
    <div class="menuButton" onclick="document.querySelector('nav').style.display='flex'">
        <div class="up line"></div>
        <div class="medial line"></div>
        <div class="down line"></div>
    </div>
</header>
    <section class="pickupLine">
        <h1 >Ready to explore the world with someone new? <br> Join Travel with Stranger and <br> find your perfect travel buddy today!</h1>
        <a href="./includes/frontend/registration.php"><button class="registration">Lets go!</button></a>
        <p id="loginBtn">already have an account <a href="./includes/frontend/login.php">Sign in</a></p>
    </section>
</body>
</html>