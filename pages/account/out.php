<?php
error_reporting(0);
require '../../Core.php';
use Core\System;
$kun = new System;
$user = $kun->user();

 $cmd_clear = "DELETE FROM ready_chat WHERE room_by = '".$user['username']."' ";
 $res_clear = mysqli_query($kun->connect_db(), $cmd_clear);

session_destroy();

header('Location: home');

?>
