<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with strangers</title>
    <link rel="stylesheet" href="../style_and_script/style.css">
    <style>
        body{
            margin: 0px;
        padding: 0px;
        background-image:  linear-gradient(to top, rgba(0, 0, 0, 0.292) , rgba(0, 0, 0, 0.986)), url('../image/signup.jpg');
        background-position: center;
        background-size: cover;
        height: 100vh;
        font-family: sans-serif;
        color:#fff;
        }
        form{
            margin-left:-40rem;
        }
    </style>
</head>
<body>
<?php
include "../../components/header.php";
?>
    <main>
        <form action="" method="Post" id="user-registration">
            <h2>Login</h2>
            <input type="email" class="input-registration" placeholder="Email *" required>
            <input type="password" class="input-registration" placeholder="Password">
            <input type="submit" class="submit-registration" value="Submit" name="user-registration">
        </form>
    </main>
</body>
</html>