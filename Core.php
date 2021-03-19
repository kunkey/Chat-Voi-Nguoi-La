<?php
namespace Core;

		/************
				Project Name: Chat Với Người Lạ
				Author: Kunkey V4u
				Time Start: 2:00 AM - 18/03/2020
				Time End: 00:15 Am - 23/03/2020
				Description: Tim kiếm và trò chuyện với người lạ
		--- Dont't Remove It If You Are Human ---
        --- Bản quyền thuộc về Vũ Duy Lực - Kunkey ---
        --- Mọi thông tin update code vui lòng liên hệ: ---
        --- FB: /kunkey.riox  -  Vũ Duy Lực(Kunkey) ---
        --- Phone: 0836851125 ---
										*************/	

session_start();
error_reporting(0); // để 1 nếu muốn phát hiện lỗi trên website
date_default_timezone_set("Asia/Bangkok");

$config = array(
'LOCALHOST' => 'localhost', // mysql host service
'USERNAME' => 'xxx', // username
'PASSWORD' => 'xxx', // pass
'DATABASE' => 'xxx', // database

'home' => 'https://cvnl.app/',
'asset' => 'https://colorlib.com/polygon/admindek',
'facebook_app_id' => 'xxxx', // fb app id
'facebook_app_key' => 'xxxx' // fb app key
);



$action_array = array("doi_mat_khau", "chinh_sua_tai_khoan", "nap_tien", "sub_kenh", "nhan_kim_cuong", "tao_phong_chat", "chat_nguoi_la"); // tên file trong thư mục action



class System {

   public function connect_db() {
        global $config;
    $conn = mysqli_connect($config['LOCALHOST'],$config['USERNAME'],$config['PASSWORD'],$config['DATABASE']) or die("Can't Connect To Database!");
    $conn->set_charset("utf8");
    return $conn;
    }

    public function home_url() {
    	# Using HTTP_HOST
	$domain = $_SERVER['HTTP_HOST'];
	return $domain;
    }

    public function __construct() {
        $this->connect_db();
        $this->online();
    }


    public function config($option) {
        global $config;
        
                           return $config[$option];
    
    }




    public function anti_sql($number) {
$id = isset($number) ? (string)(int)$number : false;
$id = isset($number) ? $number : false;
$id = str_replace('/[^0-9]/', '', $id);
return $id;
    }


public function time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'vừa xong'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'năm',
                30 * 24 * 60 * 60       =>  'tháng',
                24 * 60 * 60            =>  'ngày',
                60 * 60                 =>  'giờ',
                60                      =>  'phút',
                1                       =>  'giây'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? '' : '' ) . ' trước';
        }
    }
}



    public function tao_phong() {
        $time = time();
        $user = $this->user();
        $key = $this->Creat_Token(6);
        $cmd = "INSERT INTO ready_chat (`key`, `room_by`, `go_room`, `go_by`, `time`) VALUES ('".$key."', '".$user['username']."', 'true', '', '".$time."')";
        $res = mysqli_query($this->connect_db(), $cmd);
        return $key;
    }


    public function get_room() {
    $user = $this->user();
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `ready_chat` WHERE `go_room` = 'true' AND `room_by` != '".$user['username']."' Order by rand() LIMIT 0,1");

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row['key']) {
    return $row['key'];
    }else {
        return false;
    }
    }




    public function check() {

    if(!$_SESSION['token']) {
            return header('Location: home');
    }

    }




    public function count_online() {
    	$result = mysqli_query($this->connect_db(), "SELECT `id` FROM `online`");
    	$rowcount = mysqli_num_rows($result);
    	return $rowcount;
    }

    public function count_user() {
        $result = mysqli_query($this->connect_db(), "SELECT `id` FROM `users`");
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    public function check_user($user, $pass) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);
        $pass = str_replace('"',"\"",$pass);
        $pass = str_replace("'","\'",$pass);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."' AND `password`='".md5($pass)."' ");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }


   public function check_user_register($user) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }




   public function check_user_fb_register($idfb) {

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `fbid`='".$idfb."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }




    public function user() {

    $token = $_SESSION['token'];

    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    return $row;

    }


    public function user_orther($username) {

    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$username."'");

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    return $row;

    }


    public function online_orther($username) {

    $result = mysqli_query($this->connect_db(), "SELECT `username`, `status` FROM `online` WHERE `username`='".$username."'");

    $rowcount = mysqli_num_rows($result);

        if($rowcount > 0) {
            return '<i class="fas fa-circle" style="font-size:8px;color:#31e73e;"></i>';
        }else {
            return "";
        }

    }

    public function online() {

    $token = $_SESSION['token'];

    if($token) {

        $user = $this->user();

    $res = mysqli_query($this->connect_db(), "SELECT `username` FROM `online` WHERE `username`= '".$user['username']."' " );
    $rowcount = mysqli_num_rows($res);

        $time = time();

        if($rowcount > 0) {

   mysqli_query($this->connect_db(), "UPDATE online SET time = '".$time."', status = 'true' WHERE `username`='".$user['username']."' ");

        }else {

    $cmd = "INSERT INTO online (name, username, status, time) VALUES ('".$user['name']."', '".$user['username']."', 'true' ,'".$time."')";

    mysqli_query($this->connect_db(), $cmd);
        }
 
    }



        $sel = mysqli_query($this->connect_db(), "SELECT `username`, `time` FROM `online`");


        while( $row=mysqli_fetch_array($sel) ) {


            if($time - $row['time'] > 60) {
                mysqli_query($this->connect_db(), "DELETE FROM online WHERE username = '".$row['username']."'");
            }

            }



    }


// gọi Hàm này nếu như không muốn khách đã đăng nhập truy cập vào những trang như login, register bla bla 
public function check_login() {
    if($_SESSION['token']) {
        return header("Location: /home");
    }
}



    public function PageURL() {

$pageURL = 'http';
if ($_SERVER['HTTPS'] == 'on') {
$pageURL .= 's';
}

$pageURL .= '://';
if ($_SERVER['SERVER_PORT'] != '80') {
$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
} else {
$pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

return $pageURL;
}




    public function cat_chuoi($string='',$size=100,$link='...')
{
	$string = strip_tags(trim($string));
	$strlen = strlen($string);
	$str = substr($string,$size,20);
	$exp = explode(" ",$str);
	$sum =  count($exp);
	$yes= "";
	for($i=0;$i<$sum;$i++)
	{
		if($yes==""){
			$a = strlen($exp[$i]);
			if($a==0){ $yes="no"; $a=0;}
			if(($a>=1)&&($a<=12)){ $yes = "no"; $a;}
			if($a>12){ $yes = "no"; $a=12;}
		}
	}
	$sub = substr($string,0,$size+$a);
	if($strlen-$size>0){ $sub.= $link;}
	return $sub;
}




public function rewrite($text)
{
	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","-", $text);
    $text=str_replace("--","-", $text);
	$text=str_replace("@","-",$text);
    $text=str_replace("/","-",$text);
	$text=str_replace("\\","-",$text);
    $text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);
    $text=str_replace("'","",$text);
	$text=str_replace("<","",$text);
    $text=str_replace(">","",$text);
	$text=str_replace(",","",$text);
    $text=str_replace("?","",$text);
	$text=str_replace(";","",$text);
    $text=str_replace(".","",$text);
	$text=str_replace("[","",$text);
    $text=str_replace("]","",$text);
	$text=str_replace("(","",$text);
    $text=str_replace(")","",$text);
	$text=str_replace("́","", $text);
	$text=str_replace("̀","", $text);
	$text=str_replace("̃","", $text);
	$text=str_replace("̣","", $text);
	$text=str_replace("̉","", $text);
	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text=strtolower($text);
	return $text;
}



public function antil_text($text)
{
    $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
     //$text=str_replace(" ","-", $text);
    //$text=str_replace("--","-", $text);
    //$text=str_replace("@","-",$text);
    //$text=str_replace("/","-",$text);
    //$text=str_replace("\\","-",$text);
    $text=str_replace(":","",$text);
    $text=str_replace("\"","",$text);
    $text=str_replace("'","",$text);
    $text=str_replace("<","",$text);
    $text=str_replace(">","",$text);
    $text=str_replace(",","",$text);
    $text=str_replace("?","",$text);
    $text=str_replace(";","",$text);
    $text=str_replace(".","",$text);
    $text=str_replace("[","",$text);
    $text=str_replace("]","",$text);
    $text=str_replace("(","",$text);
    $text=str_replace(")","",$text);
    $text=str_replace("́","", $text);
    $text=str_replace("̀","", $text);
    $text=str_replace("̃","", $text);
    $text=str_replace("̣","", $text);
    $text=str_replace("̉","", $text);
    $text=str_replace("*","",$text);
    $text=str_replace("!","",$text);
    //$text=str_replace("$","-",$text);
    //$text=str_replace("&","-and-",$text);
    $text=str_replace("%","",$text);
    $text=str_replace("#","",$text);
    $text=str_replace("^","",$text);
    $text=str_replace("=","",$text);
    $text=str_replace("+","",$text);
    $text=str_replace("~","",$text);
    $text=str_replace("`","",$text);
    //$text=str_replace("--","-",$text);
    $text=strtolower($text);
    return $text;
}



public function tim_chuoi($str, $chuoi) {

 if (strpos($str, $chuoi) !== false) {
 return true;
}else {
 return false;
}


}




public function base64url_encode($plainText) {
$base64 = base64_encode($plainText);
$base64url = strtr($base64, '+/=', '-_,');
return $base64url;
}



public function base64url_decode($plainText) {
$base64url = strtr($plainText, '-_,', '+/=');
$base64 = base64_decode($base64url);
return $base64;
}




public function ma_hoa($string, $type) {

	switch ($type) {
		case 'encode':
		$out = $string;
		$out1 .= base64_encode($out);
		$out2 .= base64_encode($out1);
		$out3 .= base64_encode($out2);
		$out4 .= base64_encode($out3);
		$output .= base64_encode($out4);

				return $output;		
			break;

		case 'decode':
		$out = $string;
		$out1 .= base64_decode($out);
		$out2 .= base64_decode($out1);
		$out3 .= base64_decode($out2);
		$out4 .= base64_decode($out3);
		$output .= base64_decode($out4);

				return $output;		
			break;		
		default:
			return false;
			break;
	}



}




public function gio($gio){
$time=time();
$jun=round(($time-$gio)/60);
if($jun<1){$jun='Vừa xong';}
if($jun>=1 && $jun<60){$jun="$jun phút trước";}
if($jun>=60 && $jun<1440){$jun=round($jun/60); $jun="$jun giờ trước";}
if($jun>=1440){$jun=round($jun/60/24); $jun="$jun ngày trước";}
return $jun;
}



function is_mobile() {
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        $is_mobile = false;
    } elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }
 
    /**
     * Filters whether the request should be treated as coming from a mobile device or not.
     *
     * @since 4.9.0
     *
     * @param bool $is_mobile Whether the request is from a mobile device or not.
     */
    return $is_mobile;
}


    public function Creat_Token($length){
//Generate a random string.
$token = openssl_random_pseudo_bytes($length);
 
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);
 
//Print it out for example purposes.
return $token;

}







} // End Class


