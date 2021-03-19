<?php
require '../Core.php';
use Core\System;
$kun = new System;


$cmd = "DELETE FROM ready_chat";
	$sel = mysqli_query($kun->connect_db(), $cmd);

