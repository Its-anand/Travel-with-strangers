<?php
 include('./connection.php');
 session_start();
 
 if(!isset($_SESSION['logged_in']))
 {
     header("location: ../../../index.php");
 }
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'a062b91ff5b1e33d7045',
    '8194adcf0a503979b296',
    '1722315',
    $options
  );

  $data['username'] = $_POST['username'];
  $pusher->trigger('TWSchatApp', 'my-event', $data);
?>
