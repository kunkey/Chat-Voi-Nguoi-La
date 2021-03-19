<?php
require 'head.php';

if(!$_GET['act']) {
	require 'main_contents.php';
}else {
$act = $_GET['act'];

	if(array_search($act, $action_array) !== false) {
		require 'action/'.$act.'.php';
	}else {
		echo("<center><h1>YOU CAN'T NOT BUG MY WEBSITE!</h1></center>");
	}

}


require 'foot.php';

?>