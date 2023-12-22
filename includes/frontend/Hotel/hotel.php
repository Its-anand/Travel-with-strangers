<!DOCTYPE html>
<?php
    include('../../backend/connection.php');
    include('../../../components/alert.php');
    session_start();
    if(!isset($_SESSION['logged_in']))
    {
        header("location: ../../../index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <style>
        :root{
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


/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
body {  
  margin: 0px;
  padding: 0px;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows:  6rem calc(100vh - 6rem);
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas: 
    "header"
    "main"; 
    font-family: sans-serif;
    overflow: hidden;
}
header { grid-area: header;
}
main { grid-area: main; 
  display: flex;
  flex-direction: column;

}
header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box;
    padding:0 2rem;
    width: 100%;
    color: var(--primaryColor);
  }
  #logo{
    font-size: 1.7rem;
    font-weight: bold;
    font-size: 1.7rem;
    font-weight: bold;
    color: red;
    text-decoration: none;
  }
  .account_button_container{
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-evenly;
  width: 8rem;
}
  #logoutBtn{
    width: 2rem;
  }
  .card{
    margin: 1rem;
    border: 2px solid red;
    width: 14rem;
    padding: 1rem;
  }
  .card img{
    width: 14rem;
    height: auto;
  }
  .complete{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    box-sizing: border-box;
    background-color: RED;
    color: #FFF;
  }
  .complete BUTTON{
    width: 7rem;
    height: 2rem;
    border: none;
    cursor: pointer;
    background-color: #ffffff;
  }
  .card_holder{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    overflow-y: auto;
    padding: 4rem 10.5rem;
  }
    </style>
</head>
<body>
<header>
        <a id="logo" href="../../../Index.php">Travel with stranger</a>
        <div class="account_button_container">
        <a href="./profile.php"><img src="../../../media/profile.svg" alt=""></a>
        <a href="../../backend/logout.php" title="Log out">
        <img id="logoutBtn" src="../../../media/Logout.svg">
        </a>
        </div>
    </header>
    <main>
      <div class="complete">
        <p>Rooms are successfully assigned?</p>
        <form action="../../backend/deleteGroup.php" method="post">
          <input type="hidden" name="customer_id" value="<?php echo $_POST['roomId']?>">
          <button type="submit" name="deleteEverything">Yes</button>
        </form>
      </div>
      <div class="card_holder">
        <?php
        if(isset($_POST['submitRoomId'])){
          $query = "SELECT * FROM `travel_with_strangers_registration_user` inner JOIN `tws_buy_hotel` ON travel_with_strangers_registration_user.id = tws_buy_hotel.user_id where customer_id = $_POST[roomId]";
          $result = mysqli_query($con, $query);
          if($result){
            if(mysqli_num_rows($result)>0)
            {     
                while($result_fetched = mysqli_fetch_assoc($result))
                {
                    ?>
                      <div class="card">
                        <img src="../<?php echo($result_fetched['user_profile_image'])?>" alt="User profile">
                        <div>
                          <p>Name: <b><?php echo($result_fetched['username'])?></b></p>
                          <p>From: <b><?php echo($result_fetched['user_location'])?></b></p>
                          <p>Customer ID: <b><?php echo($result_fetched['customer_id'])?></b></p>
                        </div>
                      </div>
                    <?php
                }
            }
            else{
              alert("Unable to fetch data","W");
            }
          }
        }
        ?>


      </div>
    </main>
</body>
</html>