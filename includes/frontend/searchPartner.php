<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel with strangers</title>
    <link rel="stylesheet" href="../style_and_script/style.css">
</head>
<style>
    body{
        margin: 0px;
    padding: 0px;
    background-image:  linear-gradient(to top, rgba(0, 0, 0, 0.292) , rgba(0, 0, 0, 0.986)), url('../image/airplane-flying-in-blue-sky.avif');
    background-position: center;
    background-size: cover;
    height: 100vh;
    font-family: sans-serif;
    color:#fff;

    }
</style>
<body>
<?php
include "../../components/header.php";
?>
    <main>
        <form action="" method="Post" id="user-registration">
            <h2>Find Partner</h2>
            <input type="text" name="Country" class="input-registration" placeholder="Country *" required>
            <input type="text" name="state" class="input-registration" placeholder="state *" required>
            <input type="text" name="city" class="input-registration" placeholder="Country *" required>
            <input type="text" name="Place" class="input-registration" placeholder="Place * " required>
            <input type="number" name="pincode" class="input-registration" placeholder="Pincode * " required>
            <input type="datetime-local" name="" id="dateAndTime">
            <input type="submit" class="submit-registration" value="Submit" name="checkOtp">
        </form>
    </main>

</body>
</html>