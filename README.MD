------------------------------------------- HƯỚNG DẪN MỘT CHÚT ---------------------------------------------

Part 1: đầu tiên mở file Core.php lên và chỉnh các thông số

$config = array(
'LOCALHOST' => 'ip host hoặc localhost', // mysql host service
'USERNAME' => 'database user', // username db
'PASSWORD' => 'database pass', // pass db 
'DATABASE' => 'tên db', // database name

'home' => 'địa chỉ web site có / ở cuối', // vd http://vlxx.tv/
'asset' => 'https://colorlib.com/polygon/admindek', // dòng này tuyệt đối không sửa
'facebook_app_id' => '3099480146731638', // fb app id
'facebook_app_key' => '7f7119165100f652a3ab8fbba631779f' // fb app key
);

Part 2: vào trang chủ Pusher tạo 1 acc và lấy key, app, key screct

vào thư mục /modun tìm các file wait_chat.php , out_chat.php, check_disconnect.php, chat.php

sửa dòng này

$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);

thành 

$pusher = new Pusher(
        'pusher app key', 'pusher app key secret', 'pusher app id', $options
);



Part 3: vào cài đặt cron cho 2 file trong thư mục /cron
	del_room_user_offline.php => 1 phút/1 lần
	del_all_room => 24h/1 lần