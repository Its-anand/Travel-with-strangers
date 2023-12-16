<style>
      /* width */
::-webkit-scrollbar {
  width: 9px;
}

/* Track */
::-webkit-scrollbar-track {
  border: 1px solid #fff;
  border-radius:10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #fff; 
  border-radius:10px;

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #fff; 
}
    #alert{
    z-index: 99999999 !important;;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30rem;
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 20px );
    -webkit-backdrop-filter: blur( 20px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    height: 17rem;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    color: #fff;
    font-family: sans-serif;
}
.danger{
    background: rgba( 240, 0, 0, 0.55 );
}
.warning{
    background:rgb(240 128 0 / 55%);
}
.success{
    background:rgb(0 240 74 / 55%);
}
#closeAlertButton{
    width: 5rem;
    height: 3rem;
    border-radius: 15px;
    border: 2px solid #fff;
    background:none;    
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
}
a{
    text-decoration:none;
    color:#fff;
}
#closeAlertButton:hover{
    color: #fff;
}
.message{
    font-size:1.1rem;
    text-align: center;
    overflow-y: auto;
}
@media screen and (max-width:500px) {
    #alert{
        width:97%;
    }
}

</style>
<!--Success message-->
<?php
    function alert($notice,$alertType='W', $url='0'){
        if($alertType == 'S' || $alertType == 's'){
            ?>
            <div id="alert" class="Success">
            <svg width="70" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="white" stroke-width="18"/>
                <path d="M136.364 408.593C132.849 405.078 127.151 405.078 123.636 408.593C120.121 412.108 120.121 417.806 123.636 421.321L136.364 408.593ZM123.636 421.321L365.632 663.317L378.36 650.589L136.364 408.593L123.636 421.321Z" fill="white"/>
                <path d="M757.566 272.364C761.08 268.849 761.08 263.151 757.566 259.636C754.051 256.121 748.353 256.121 744.838 259.636L757.566 272.364ZM377.89 652.039L757.566 272.364L744.838 259.636L365.163 639.311L377.89 652.039Z" fill="white"/>
            </svg>

            <div class="message"><?php echo($notice);?></div>
                <?php
                if($url == '0'){
                    ?>
                    <button id="closeAlertButton" onclick="document.getElementById('alert').style.display='none'">Ok</button>
                    <?php
                }else{
                    ?>
                    <a href="<?php echo $url;?>"><button id="closeAlertButton">Ok</button></a>
                <?php
                }
                ?>
        </div>
        <!--Warning message-->
        <?php
        }
        else if($alertType == 'W' || $alertType == 'w'){
        ?>
            <div id="alert" class="warning">
            <svg width="70"  viewBox="0 0 449 389" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M235.5 131.636L233.739 261.273H213.307L211.545 131.636H235.5ZM223.523 313.409C219.178 313.409 215.45 311.853 212.338 308.741C209.226 305.63 207.67 301.902 207.67 297.557C207.67 293.212 209.226 289.484 212.338 286.372C215.45 283.26 219.178 281.705 223.523 281.705C227.867 281.705 231.596 283.26 234.707 286.372C237.819 289.484 239.375 293.212 239.375 297.557C239.375 300.434 238.641 303.076 237.173 305.483C235.764 307.89 233.856 309.828 231.449 311.295C229.1 312.705 226.458 313.409 223.523 313.409Z" fill="white"/>
                <path d="M242.687 50L414.593 347.75C422.675 361.75 412.572 379.25 396.406 379.25H52.5939C36.4281 379.25 26.3245 361.75 34.4074 347.75L206.313 50C214.396 36 234.604 36 242.687 50Z" stroke="white" stroke-width="18"/>
            </svg>
            <div class="message"><?php echo($notice);?></div>
                <?php
                if($url == '0'){
                    ?>
                    <button id="closeAlertButton" onclick="document.getElementById('alert').style.display='none'">Ok</button>
                    <?php
                }else{
                    ?>
                    <a href="<?php echo $url;?>"><button id="closeAlertButton">Ok</button></a>
                <?php
                }
                ?>
            </div>
        <!--Danger message-->
        <?php
        }
        else if($alertType == 'D' || $alertType == 'd'){
        ?>
            <div id="alert" class="Danger">
            <svg width="70" viewBox="0 0 890 859" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M881 429.5C881 661.438 686.1 850 445 850C203.9 850 9 661.438 9 429.5C9 197.562 203.9 9 445 9C686.1 9 881 197.562 881 429.5Z" stroke="white" stroke-width="18"/>
                <path d="M212.279 191L689.915 668.636" stroke="white" stroke-width="18" stroke-linecap="round"/>
                <path d="M201 668.636L678.636 191" stroke="white" stroke-width="18" stroke-linecap="round"/>
            </svg>

            <div class="message"><?php echo($notice);?></div>
                <?php
                if($url == '0'){
                    ?>
                    <button id="closeAlertButton" onclick="document.getElementById('alert').style.display='none'">Ok</button>
                    <?php
                }else{
                    ?>
                    <a href="<?php echo $url;?>"><button id="closeAlertButton">Ok</button></a>
                <?php
                }
                ?>
        </div>
        <?php
        }
        ?>

        <?php
    }
?>