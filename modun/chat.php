<?php
require '../Core.php';
use Core\System;
$kun = new System;

 /*** PUSHER ***/
require('Pusher/Pusher.php');
$options = array(
    'encrypted' => true
);
$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);


$from = $_POST['from'];
$msg = $_POST['msg'];
$channel = $_POST['channel'];
$time = time();



    $cmd = "INSERT INTO `chat_data` (`username`, `message`, `key`, `time`) VALUES ('".$from."', '".$msg."', '".$channel."' , '".$time."')";

    // echo $cmd;

    mysqli_query($kun->connect_db(), $cmd);


       $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `chat_data` WHERE `key`='".$channel."' ORDER BY time DESC LIMIT 0, 1");
       
       $i = 0;
        while( $row=mysqli_fetch_array($sel) ) {
            $sms[$i++] = array('msg' => htmlentities($row['message']), 'time' => date('H:i:s', $row['time']) );
            }

$data['status'] = 'true';
$data['type'] = "chat";
$data['hash'] = $from;
$data['from'] = $from;
$data['mes'] = $sms;
$pusher->trigger($channel, 'chat', $data);

