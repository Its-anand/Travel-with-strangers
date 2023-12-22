<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>    
<?php
include('./connection.php');
include('../../components/alert.php');
session_start();
$user_id = $_SESSION['userid'];
if(!isset($_SESSION['logged_in']))
{
    header("location: ../account and card/signin.php");
}
$query = "SELECT * FROM `tws_buy_hotel` WHERE customer_id = $_POST[customer_id] AND user_id = $_POST[user_id] ";
$result=mysqli_query($con,$query);
if($result)
{
    if(mysqli_num_rows($result)>0)
    {
        alert("You have already booked hotel in this group","W","../frontend/User/chat.php");
    }
    else{
        if(isset($_POST['hotelBooking']))
        {
            $query = "SELECT * FROM `travel_with_strangers_registration_user` WHERE  `id`= '$_POST[hotel_id]'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
        
                    $query = "SELECT * FROM `purehealth_id` WHERE `id` = '5'";
                    $result_key = mysqli_query($con,$query);
                    
                    if($result_key)
                    {
                        if(mysqli_num_rows($result_key)==1)
                        {
                            $result_value_fetch=mysqli_fetch_assoc($result_key);
                            $value = $result_value_fetch['dsf43t34gaega4'];
                            $value = ltrim($value, 'PUREHEALTH');
                            
                        }
                            else{
                                echo"
                                <script>
                                    alert('No key found');
                                    window.location.href='../account and card/card.php';
                                </script>
                                ";
                            }
                    }
                    else{
                        echo"
                        <script>
                            alert('Unable to connect with database');
                            window.location.href='../account and card/card.php';
                        </script>
                        ";
                    }
                  $user_id = $_POST['user_id'];
                  $group_id = $_POST['group_id'];
                  $hotel_id=$_POST['hotel_id'];
                  $customer_id=$_POST['customer_id'];
                  $price=$_POST['price'];
                  $number = "7000162902";
                  $result_fetch=mysqli_fetch_assoc($result);
                  
                  $profilePhoto = $result_fetch['user_profile_image'];
                  $hotelName = $result_fetch['username'];
                  $email = $result_fetch['user_email'];
        
                  $api_key = "$value"; //Add your api key here which you got from razor pay.
                  
                  date_default_timezone_set('Asia/kolkata');
                  $date=date("Y-m-d");
        
                }
                else
                {
                        echo"
                        <script>
                            alert('Unable to fetch data');
                            window.location.href='../account and card/card.php';
                        </script>
                        ";
                }
            }
            else
            {
                    echo"
                    <script>
                        alert('Unable to connect with database');
                        window.location.href='../account and card/card.php';
                    </script>
                    ";
            }
        }
        else
        {
                echo"
                <script>
                    alert('Select a product first');
                    window.location.href='../account and card/card.php';
                </script>
                ";
        }
        ?>
        <style>
            body{margin:0; padding:0;}
                #loading {
                  border: 16px solid #f3f3f3;
                  border-radius: 50%;
                  border-top: 16px solid #3BD16F;
                  border-bottom: 16px solid #3BD16F;
                  width: 120px;
                  height: 120px;
                  -webkit-animation: spin 2s linear infinite;
                  animation: spin 1s linear infinite;
        
                }
                #loading_holder
                {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  width: 100%;
                  height: 100vh;
                  transition: opacity 0.7s;
                  overflow:  hidden;
                }
        
                @-webkit-keyframes spin {
                  0% { -webkit-transform: rotate(0deg); }
                  100% { -webkit-transform: rotate(360deg); }
                }
                
                @keyframes spin {
                  0% { transform: rotate(0deg); }
                  100% { transform: rotate(360deg); }
                }
                @media screen and (max-width:400px) {
                    #loading {
        
                    width: 80px;
                  height: 80px;
                    }
                }
        
        #go_back
        {
            border: 2px solid #13365B;
            border-radius: 5%;
            font-weight: bolder;
            background-color: #13365B;
            color: #fff;
            text-align: center;
            width: 189px;
            height: 39px;
            outline: none;
            box-sizing: border-box;
            font-size: 1rem;
            cursor: pointer;
        
        }
        #go_back:hover
        {
            color: #13365B;
            background-color: #fff;
        }
        #button_holder
        {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%); 
            z-index:0;
            text-align:center;
        }
        .razorpay-backdrop
        {
            background:#fff !important;
        }
        .razorpay-checkout-frame
        {
            background: rgba(0, 0, 0, 0.6)!important;
            
        }
        .razorpay-payment-button
        {
            display:none;
        }
        
        </style>
        
                 
        <form action="hotel_booking.php" method="POST">
            <script    
            src="https://checkout.razorpay.com/v1/checkout.js"    
            data-key="<?php echo $api_key;?>"   
            data-amount="<?php echo $price *100  ;?>"     
            data-currency="INR"
            Contact our Support Team to enable International for your account    
            data-buttontext="Pay with Razorpay"    
            data-name="Travel with strangers"    
            data-description="Thank You for using Travel with strangers"    
            data-image="<?php echo $profilePhoto;?>"    
            data-prefill.name="<?php echo $hotelName;?>"  
            data-prefill.contact="<?php echo $number;?>"
            data-prefill.email="<?php echo $email;?>"    
            data-theme.color="red">
                
            </script>
            <input type="hidden" custom="Hidden Element" name="hidden">
            <input type="hidden" name="date" value="<?php echo $date;?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="group_id" value="<?php echo $group_id;?>">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel_id;?>">
            <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
            <input type="hidden" name="price" value="<?php echo $price;?>">
            </form>
        
        
        
        <body onload="loader()">
            
            <div id="loading_holder">
            <div id="loading"></div>
        </div>
            <script >
                var preloader = document.getElementById('loading_holder');
             function loader()
             {
               preloader.style.display="none";
             }
             </script>
        
        
        
        </body>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <script>
            $(document).ready(function(){
                $('.razorpay-payment-button').click();
                document.querySelector('#go_back').addEventListener('click', function () { history.go(-2) })
            })
        </script>
        <?php
    }
}
else{
    alert("Unable to fetch data","D","../frontend/User/chat.php");
}
?>
</html>