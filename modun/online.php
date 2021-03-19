<?php
require '../Core.php';
use Core\System;
$kun = new System;



if ($_SESSION['token']) {

if($_POST['type'] == 'show') {


        $sel = mysqli_query($kun->connect_db(), "SELECT `name`, `username` FROM `online`");
        $online = '';
        while( $row=mysqli_fetch_array($sel) ) {
            $online .= $row['name'].", ";  
            }

            $online = rtrim($online, ", ");
            echo $online;

}else if($_POST['type'] == 'count') {
echo $kun->count_online();
}




}else {
	header("Location: /home");
}

