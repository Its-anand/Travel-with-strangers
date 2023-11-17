<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with strangers</title>
    <link rel="stylesheet" href="../../style_and_script/style.css">
    <style>
        body{
            margin: 0px;
        padding: 0px;
        background-image:  linear-gradient(31deg, #040404, #0f2052);
        background-position: center;
        background-size: cover;
        height: 100vh;
        font-family: sans-serif;
        color:#fff;
        }

    </style>
</head>
<body>
<?php
include "../../components/header.php";
?>
    <main>
        <form method="Post" id="user-registration">
            <h2>Registration</h2>
            <p class="labelHolder"><label for="imageUpload">Select Profile</label></p>
            <input type="file" id="upload" name="imageUpload">
            <input type="text" class="input-registration" name="username" placeholder="Full Name *" required>
            <input type="email" class="input-registration" name="user_email" placeholder="Email *" required>
            <input type="password" class="input-registration" name="user_password" placeholder="Password *" required>
            <input type="text" class="input-registration" name="location" placeholder="Location *" required>
            <input type="hidden" value="" name="">
            <input type="hidden" value="" name="">
            <input type="submit" class="submit-registration" value="Submit" name="user-registration">
        </form>
    </main>
</body>
</html>