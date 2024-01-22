<?php
 include('./connection.php');
 include('../../components/alert.php');
session_start();



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code)
{
    include('./connection.php');

//Load Composer's autoloader
include './PHPMailer/Exception.php">';
include './PHPMailer/PHPMailer.php';
include './PHPMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    $query = "SELECT * FROM `purehealth_id` WHERE `id` = '3'";
    $query1 = "SELECT * FROM `purehealth_id` WHERE `id` = '4'";
    $result = mysqli_query($con,$query);
    $result1 = mysqli_query($con,$query1);
    if($result && $result1)
    {
        if(mysqli_num_rows($result)==1 && mysqli_num_rows($result1)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            $result_fetch1=mysqli_fetch_assoc($result1);
            $value = $result_fetch['dsf43t34gaega4'];
            $value1 = $result_fetch1['dsf43t34gaega4'];

        }
        else{
            alert('No key found','D','../../index.php');
        }
    }
    else{
        alert('Unable to connect with database','D','../../index.php');
    }
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enabling it will show each and every information about the mail like email what data was send etc.



    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.anandchoudhary.in';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "$value";                     //SMTP username
    $mail->Password   = "$value1";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("$value", "Travel with strangers");  
    $mail->addAddress($email);                


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification - Travel with strangers';
    $mail->Body = "
    <!--

    ##########################################################
        https://dashboard.unlayer.com/create/food-donation
    ##########################################################
  
  -->
  
  
  
  <!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
  <head>
  <!--[if gte mso 9]>
  <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
  </xml>
  <![endif]-->
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='x-apple-disable-message-reformatting'>
    <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
    <title></title>
    
      <style type='text/css'>
        @media only screen and (min-width: 620px) {
    .u-row {
      width: 600px !important;
    }
    .u-row .u-col {
      vertical-align: top;
    }
  
    .u-row .u-col-100 {
      width: 600px !important;
    }
  
  }
  
  @media (max-width: 620px) {
    .u-row-container {
      max-width: 100% !important;
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
    .u-row .u-col {
      min-width: 320px !important;
      max-width: 100% !important;
      display: block !important;
    }
    .u-row {
      width: 100% !important;
    }
    .u-col {
      width: 100% !important;
    }
    .u-col > div {
      margin: 0 auto;
    }
  }
  body {
    margin: 0;
    padding: 0;
  }
  
  table,
  tr,
  td {
    vertical-align: top;
    border-collapse: collapse;
  }
  
  p {
    margin: 0;
  }
  
  .ie-container table,
  .mso-container table {
    table-layout: fixed;
  }
  
  * {
    line-height: inherit;
  }
  
  a[x-apple-data-detectors='true'] {
    color: inherit !important;
    text-decoration: none !important;
  }
  
  table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_divider_1 .v-container-padding-padding { padding: 10px 0px !important; } }
      </style>
    
    
  
  <!--[if !mso]><!--><link href='https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap' rel='stylesheet' type='text/css'><!--<![endif]-->
  
  </head>
  
  <body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000'>
    <!--[if IE]><div class='ie-container'><![endif]-->
    <!--[if mso]><div class='mso-container'><![endif]-->
    <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%' cellpadding='0' cellspacing='0'>
    <tbody>
    <tr style='vertical-align: top'>
      <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #e7e7e7;'><![endif]-->
      
    
    
  <div class='u-row-container' style='padding: 0px;background-color: #f8cac6'>
    <div class='u-row' style='margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
      <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #f8cac6;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
        
  <!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 30px 0px 20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
  <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
    <div style='height: 100%;width: 100% !important;'>
    <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 30px 0px 20px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
    
  <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
    <tbody>
      <tr>
        <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='center'>
          
    <!--[if mso]><table width='100%'><tr><td><![endif]-->
      <h1 style='margin: 0px; color: #ffffff; line-height: 100%; text-align: center; word-wrap: break-word; font-family: 
      Montserrat',sans-serif; font-size: 31px; font-weight: 700;'><span><span><span><span><span><span><span><span style='line-height: 29px;'><span style='line-height: 29px;'><span style='line-height: 29px;'>Join Travel with strangers<br /></span></span></span></span></span></span></span></span></span></span></h1>
    <!--[if mso]></td></tr></table><![endif]-->
  
        </td>
      </tr>
    </tbody>
  </table>
  
    <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
    </div>
  </div>
  <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
      </div>
    </div>
    </div>
    
    
  <div class='u-row-container' style='padding: 0px;background-color: #ffffff'>
    <div class='u-row' style='margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
      <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #ffffff;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
        
  <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color: #ffffff;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
  <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
    <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
    <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
    
  <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
    <tbody>
      <tr>
        <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:20px 10px 10px;font-family:arial,helvetica,sans-serif;' align='center'>
          
    <!--[if mso]><table width='100%'><tr><td><![endif]-->
      <h1 style='margin: 0px; color: #e03e2d; line-height: 100%; text-align: center; word-wrap: break-word; font-family: sans-serif; font-size: 30px; font-weight: 700;'><span>Find here memories with<br />Travel with strangers</span></h1>
    <!--[if mso]></td></tr></table><![endif]-->
  
        </td>
      </tr>
    </tbody>
  </table>
  
  <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
    <tbody>
      <tr>
        <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
          
    <div style='font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;'>
      <p style='line-height: 140%;'>Life is too short to travel alone. Travel with Strangers helps you find compatible travelers who want to explore the world with you. Create your profile and start matching today!</p>
    </div>
  
        </td>
      </tr>
    </tbody>
  </table>
  
    <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
    </div>
  </div>
  <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
      </div>
    </div>
    </div>
    
  
  
    
    
  <div class='u-row-container' style='padding: 0px;background-color: #ffffff'>
    <div class='u-row' style='margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
      <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #ffffff;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
        
  <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color: #ffffff;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
  <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
    <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
    <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
    
  <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
    <tbody>
      <tr>
        <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;' align='left'>
          
    <!--[if mso]><style>.v-button {background: transparent !important;}</style><![endif]-->

<div align='center'>
  <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://www.anandchoudhary.in/projects/Travel-with-strangers/includes/backend/verify.php?email=$email&v_code=$v_code' style='height:37px; v-text-anchor:middle; width:290px;' arcsize='11%'  stroke='f' fillcolor='#e03e2d'><w:anchorlock/><center style='color:#FFFFFF;'><![endif]-->
    <a href='https://www.anandchoudhary.in/projects/Travel-with-strangers/includes/backend/verify.php?email=$email&v_code=$v_code' target='_blank' class='v-button' style='box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #e03e2d; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:50%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;'>
      <span style='display:block;padding:10px;line-height:120%;'>Verify now</span>
    </a>
    <!--[if mso]></center></v:roundrect><![endif]-->
</div>
  
        </td>
      </tr>
    </tbody>
  </table>
  
    <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
    </div>
  </div>
  <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
      </div>
    </div>
    </div>
    
  
  
    
    
  <div class='u-row-container' style='padding: 0px;background-color: #ffffff'>
    <div class='u-row' style='margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
      <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
        <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #ffffff;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: transparent;'><![endif]-->
        
  <!--[if (mso)|(IE)]><td align='center' width='600' style='background-color: #ffffff;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
  <div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
    <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
    <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
    
  <table id='u_content_divider_1' style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
    <tbody>
      <tr>
        <td class='v-container-padding-padding' style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
          

  
    <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
    </div>
  </div>
  <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
      </div>
    </div>
    </div>
    
  
  
      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
      </td>
    </tr>
    </tbody>
    </table>
    <!--[if mso]></div><![endif]-->
    <!--[if IE]></div><![endif]-->
  </body>
  
  </html>

    ";
  //############### This code is for localhost email verify ################//
  
  // <div align='center'>
  //   <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='http://localhost/project/My%20Projects/Anandchoudhary.in/projects/Travel-with-strangers/includes/backend/verify.php?email=$email&v_code=$v_code' style='height:37px; v-text-anchor:middle; width:290px;' arcsize='11%'  stroke='f' fillcolor='#e03e2d'><w:anchorlock/><center style='color:#FFFFFF;'><![endif]-->
  //     <a href='http://localhost/project/My%20Projects/Anandchoudhary.in/projects/Travel-with-strangers/includes/backend/verify.php?email=$email&v_code=$v_code' target='_blank' class='v-button' style='box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #e03e2d; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:50%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;'>
  //       <span style='display:block;padding:10px;line-height:120%;'>Verify now</span>
  //     </a>
  //     <!--[if mso]></center></v:roundrect><![endif]-->
  // </div>
    $mail->AltBody = 'Html mail not supported';
     
    $mail->send();
    return true;
     } catch (Exception $e) {
         return false;
     }
}


#This is the code for registration 
if(isset($_POST['user-registration']))
{
    $user_exist_query="SELECT * FROM `travel_with_strangers_registration_user` where `user_email` ='$_POST[user_email]'";
    $result=mysqli_query($con,$user_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {

            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['user_email']==$_POST['user_email'])
            {
                alert('You have already registered','W','../../index.php');
            }
        }
        else
        {
            ######################## Image Upload #########################
            $target_dir = "../../media/profileImage/";
            $target_file = $target_dir . basename($_FILES["user_profile_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
              $check = getimagesize($_FILES["user_profile_image"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
                  alert( "Sorry, only JPG, JPEG, PNG & webp files are allowed.",'D','../../index.php');
                  $uploadOk = 0;
                }
                else{
                      // Check if $uploadOk is set to 0 by an error
                      if ($uploadOk == 0) {
                      alert( "Sorry, your image was not uploaded.",'D','../../index.php');
                      // if everything is ok, try to upload file
                      } else {
                        if (move_uploaded_file($_FILES["user_profile_image"]["tmp_name"], $target_file)) {
                          $password=password_hash($_POST['user_password'],PASSWORD_BCRYPT); 
                          $v_code= bin2hex(random_bytes(16));
                          $query="INSERT INTO `travel_with_strangers_registration_user`(`user_profile_image`, `user_role`, `username`, `user_email`, `user_password`, `user_location`, `verification_code`, `is_verified`) VALUES ('$target_file','$_POST[user_role]','$_POST[username]','$_POST[user_email]','$password','$_POST[user_location]','$v_code','0')";
                          if(mysqli_query($con,$query) && sendMail($_POST['user_email'],$v_code)) 
                          {
                             alert('Registration successful! Check you mail to verify email','S','../../index.php');
                 
                          }
                          else
                          {
                                 alert('Email service or database not working','D','../../index.php');
                          }
                        } 
                        else {
                          alert( "Sorry, there was an error uploading your file.",'D','../../index.php');
                        }
                        }
                }
              } 
              else {
                alert( "File is not an image.",'D','../../index.php');
                $uploadOk = 0;
              }
        }
    } 
    else
    {
        alert('Unable to put data into database','D','../../index.php');
    }
}
?>