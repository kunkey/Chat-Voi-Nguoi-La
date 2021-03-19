<?php
error_reporting(0);
require '../../Core.php';
use Core\System;
$kun = new System;
$kun->check_login();


$token = $kun->Creat_Token(30);

$n = 'Người lạ '.$kun->Creat_Token(4);
$u = $kun->Creat_Token(6);
$p = '12345';
$e = $kun->Creat_Token(16).'@gmai.com';
$s = 'male';
$ava = 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png';

$time = time();

 $cmd = "INSERT INTO users (fbid, admin, name, username, email, sex, avatar, money, password, token, ip, time) VALUES ('0', 0, '".$n."', '".$u."', '".$e."', '".$s."', '".$ava."', 0, '".md5($p)."', '".$token."', '".$_SERVER['REMOTE_ADDR']."', '".$time."')";

    $res = mysqli_query($kun->connect_db(), $cmd);

    $_SESSION['token'] = $token;

	echo '<meta http-equiv="refresh" content="0;URL=home" />';