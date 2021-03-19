<?php
namespace Api; // khai báo namespace

		/************
				Project Name: Kiểm tra và lấy nickname Freefire
				Author: Kunkey V4u
				Time Start: 11:35 PM - 15/03/2020
				Time End: 00:09 PM
				Description: As Project Name
		--- Dont't Remove It If You Are Human ---
										*************/	








ob_start();
error_reporting(0);


class Kunkey_Check { // Class chính


public $id; // Nhận giá trị id

private function load() // hàm curl lấy thông tin id
{

    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://napthe.vn/api/auth/player_id_login');
    $head[] = "accept: application/json";
    $head[] = "Accept-Encoding: gzip, deflate, br";
    $head[] = "Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "Connection: keep-alive";    
    $head[] = "Content-Length: 40";
    $head[] = "content-type: application/json";
    $head[] = "Host: napthe.vn";
    $head[] = "Origin: https://napthe.vn";
    $head[] = "Sec-Fetch-Mode: cors";
    $head[] = "Sec-Fetch-Site: same-origin";
    $head[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/85.0.134 Chrome/79.0.3945.134 Safari/537.36";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"app_id":100067,"login_id":"'.$this->id.'"}');

    $result = curl_exec($ch);
    if ($result) {
        return $result;
    } else {
        return FALSE;
    }
    curl_close($ch);
}




public function check() { // hàm kiểm tra và xuất json

	$load = $this->load();

	if($load) {

		$json = json_decode($load, true);

	if($json['error'] == "invalid_id") {
		return json_encode(array('status' => false, 'error' => 'ID không tồn tại'));
	}else if($json['nickname']) {
		return json_encode(array('status' => true, 'nickname' => $json['nickname'], 'region' => $json['region']));		
	}else {
		return json_encode(array('status' => false, 'error' => 'Lỗi hệ thống'))	;
	}


	} 

}







} // End Class



use API\Kunkey_Check; // Khai báo sử dụng namespace


$kun = new Kunkey_Check(); // gọi Class

if(!$_POST['id']) die(json_encode(array('status' => false, 'error' => 'thiếu id'))); // kiểm tra tham số id trên url

$kun->id = $_POST['id']; // Nhận tham số id từ url và truyền vào class
echo $kun->check(); // gọi hàm kiểm tra