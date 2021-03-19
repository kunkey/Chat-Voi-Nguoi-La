<?php
require '../Core.php';
use Core\System;
$kun = new System;

$time = time();

$cmd = "SELECT * FROM `ready_chat` WHERE `go_room` = 'true'";
	$sel = mysqli_query($kun->connect_db(), $cmd);
		while( $row=mysqli_fetch_array($sel) ) {

			if($time - $row['time'] > 180 ) { // 180 = 3 phút

		$result = mysqli_query($kun->connect_db(), "SELECT `username`, `status` FROM `online` WHERE `username`='".$row['room_by']."'");

    	$rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
        }else {
            $cmd = "DELETE FROM ready_chat WHERE room_by = '".$row['room_by']."'";
			$sel = mysqli_query($kun->connect_db(), $cmd);
        }



			} 

            }


