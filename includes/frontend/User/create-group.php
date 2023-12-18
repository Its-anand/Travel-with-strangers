<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();

    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../index.php");
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a group</title>
    <link rel="stylesheet" href="../../../style/createPageStyle.css">
</head>
<body>
    <header>
        <a id="logo" href="../../../Index.php">Travel with stranger</a>
        <div class="account_button_container">
        <a href="./profile.php"><img src="../../../media/profile.svg" alt=""></a>
        <a href="../../backend/logout.php" title="Log out">
        <img id="logoutBtn" src="../../../media/Logout.svg" alt="">
        </a>
        </div>
    </header>
    <main>
        <form action="../../backend/create_group.php" method="POST" enctype="multipart/form-data">
            <h1 >Create a group</h1>

            <label for="grpImage">Upload Photo</label>
            <input type="File" id="upload" name="grpImage" required>

            <label for="grpName">Group name</label>
            <input type="text" placeholder="Enter Name *" required name="grpName">

            <label for="fromLocation">From</label>
            <input type="text" placeholder="Enter Location *" name="fromLocation" required>

            <label for="toLocation">To</label>
            <input type="text" placeholder="Enter Location *" name="toLocation" required>

            <label for="groupSize">Size of the group</label>
            <input type="number" placeholder="Number of people *" name="groupSize" required>

            <label for="budget">Your budget</label>
            <input type="number" placeholder="Enter budget *" name="budget" required>

            <b >Trip duration</b>

            <label for="date">From</label>
            <input type="date" name="fromDate" required>

            <label for="date">To</label>
            <input type="date" name="toDate" required>

            <button type="submit" name="createGroup">Submit</button>
        </form>
    </main>
</body>
</html>