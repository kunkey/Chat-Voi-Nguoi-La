<?php
require '../Core.php';
use Core\System;
$kun = new System;
$type = $_POST['type'];
$nguoi_la = $_POST['hash'];
$id = $_POST['room'];


if($type == 'check') {
	
    $result = mysqli_query($kun->connect_db(), "SELECT `username`, `status` FROM `online` WHERE `username`='".$nguoi_la."'");

    $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            echo json_encode(array('status' => 'true'));
        }else {
            echo json_encode(array('status' => 'false'));
        }


}else if($type == 'disconnect') {

 /*** PUSHER ***/
require('Pusher/Pusher.php');
$options = array(
    'encrypted' => true
);
$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);



$data['status'] = "true";
$data['type'] = "disconnect";
$pusher->trigger($id, 'chat', $data);



}