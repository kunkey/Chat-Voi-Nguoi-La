<?php
require '../../Core.php';
use Core\System;
$kun = new System;
$kun->check_login();


switch ($_POST['type']) {
	case 'login':
		

$u = $_POST['username'];
$p = $_POST['password'];



if($kun->check_user($u,$p) == true) {

$token = $kun->Creat_Token(30);

 
    $res = mysqli_query($kun->connect_db(), "UPDATE users SET token = '".$token."', ip = '".$_SERVER['REMOTE_ADDR']."' WHERE `username`='".$u."'");

    $_SESSION['token'] = $token;
 

	echo '<script>toastr["success"]("Đăng nhập thành công!, "Thông Báo")</script>';
	echo '<meta http-equiv="refresh" content="0;URL=home" />';

}else {

	echo '<script>toastr["error"]("Đăng nhập thất bại! ", "Thông Báo")</script>';


}




		break;

	case 'register':
	

$n = $_POST['name'];
$u = $_POST['username'];
$e = $_POST['email'];
$p = $_POST['password'];
$rp = $_POST['repassword'];
$s =  $_POST['sex'];


if(!$n || !$u || !$e || !$p || !$rp || !$s) {
	die('<script>toastr["error"]("Hãy điền đầy đủ thông tin! ", "Lỗi")</script>');
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');


foreach ($syntax as $key) {
	if($kun->tim_chuoi($n,$key) == true) {
	die('<script>toastr["error"]("Tên của bạn không được có kí tự lạ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($u,$key) == true) {
	die('<script>toastr["error"]("Tên tài khoản không được có kí tự lạ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($e,$key) == true) {
	die('<script>toastr["error"]("Email không hợp lệ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($p,$key) == true) {
	die('<script>toastr["error"]("Mật khẩu không được có kí tự lạ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($s,$key) == true) {
	die('<script>toastr["error"]("Bạn không thể Bug đâu :)! ", "Lỗi")</script>');
	}

}

if(strlen($n) > 30) {
	die('<script>toastr["error"]("Tên của bạn không được quá 30 kí tự! ", "Lỗi")</script>');
}

if(strlen($n) < 6) {
	die('<script>toastr["error"]("Tên của bạn không được nhỏ hơn 6 kí tự! ", "Lỗi")</script>');
}

if(strlen($u) > 30) {
	die('<script>toastr["error"]("Tên tài khoản không được quá 30 kí tự! ", "Lỗi")</script>');
}

if(strlen($u) < 6) {
	die('<script>toastr["error"]("Tên tài khoản không nhỏ hơn 6 kí tự! ", "Lỗi")</script>');
}


if(strlen($p) < 6) {
	die('<script>toastr["error"]("Mật khẩu phải lớn hơn 6 kí tự! ", "Lỗi")</script>');
}


if($rp !== $p) {
	die('<script>toastr["error"]("2 mật khẩu bạn nhập không giống nhau! ", "Lỗi")</script>');
}


if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    die('<script>toastr["error"]("Email không đúng định dạng!", "Lỗi")</script>');
  }

    $result = mysqli_query($kun->connect_db(), "SELECT `email` FROM `users` WHERE `email`='".$e."' ");
	$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
    die('<script>toastr["error"]("Email này đã tồn tại trên hệ thống!", "Lỗi")</script>');
}


$arr_sex = array('male', 'female');
if(in_array($s, $arr_sex) == false) {
	die('<script>toastr["error"]("System Error!", "Lỗi")</script>');
}

if($s == 'male') {
	$ava = 'https://i.ya-webdesign.com/images/avatar-png-1.png';
}else if ($s == 'female') {
	$ava = 'https://audit-controle-interne.com/wp-content/uploads/2019/03/avatar-user-teacher-312a499a08079a12-512x512.png';
}else {
		die('<script>toastr["error"]("System Error!", "Lỗi")</script>');
}




if($kun->check_user_register($u) == false) {

$token = $kun->Creat_Token(30);

$time = time();


 
 $cmd = "INSERT INTO users (fbid, admin, name, username, email, sex, avatar, money, password, token, ip, time) VALUES ('0', 0, '".$n."', '".$u."', '".$e."', '".$s."', '".$ava."', 0, '".md5($p)."', '".$token."', '".$_SERVER['REMOTE_ADDR']."', '".$time."')";

    $res = mysqli_query($kun->connect_db(), $cmd);

    $_SESSION['token'] = $token;


	echo '<script>toastr["success"]("Đăng kí thành công!, "Thông Báo")</script>';
	echo '<meta http-equiv="refresh" content="0;URL=home" />';

}else {

	echo '<script>toastr["error"]("Tên tài khoản đã có người sử dụng! ", "Thông Báo")</script>';


}










		break;
	
	default:
		echo '<script>toastr["error"]("Lỗi hệ thống! Vui lòng thử lại sau!", "Thông Báo")</script>';
		break;
}

?>
