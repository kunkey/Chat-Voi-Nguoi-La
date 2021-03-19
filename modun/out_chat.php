<?php
require '../Core.php';
use Core\System;
$kun = new System;
//$kun->check_login();
$user = $kun->user();


$id = $_POST['room'];


 /*** PUSHER ***/
require('Pusher/Pusher.php');
$options = array(
    'encrypted' => true
);
$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);




$data['status'] = "true";
$data['type'] = "out_chat";
$pusher->trigger($id, 'chat', $data);

