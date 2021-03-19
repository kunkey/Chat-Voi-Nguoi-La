<?php
require '../Core.php';
use Core\System;
$kun = new System;
//$kun->check_login();
$user = $kun->user();

 $cmd_clear = "DELETE FROM ready_chat WHERE room_by = '".$user['username']."' ";
 $res_clear = mysqli_query($kun->connect_db(), $cmd_clear);
 
$id = $kun->get_room();


if($id == false) { // kiểm tra phòng chờ



$id_phong = $kun->tao_phong(); // vào phòng chờ
echo json_encode(array('type' => 'tao_phong', 'room' => $id_phong));
}else {

 /*** PUSHER ***/
require('Pusher/Pusher.php');
$options = array(
    'encrypted' => true
);
$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);



$data['status'] = "true";
$data['type'] = "get_room";
$data['hash'] = base64_encode($user['username']);
$pusher->trigger($id, 'chat', $data);


 $cmd = "UPDATE `ready_chat` SET `go_room` = 'false', `go_by` = '".$user['username']."' WHERE `key`='".$id."' ";
 $res = mysqli_query($kun->connect_db(), $cmd);

echo json_encode(array('type' => 'vao_phong', 'room' => $id, 'hash' => base64_encode($user['username'])));

}