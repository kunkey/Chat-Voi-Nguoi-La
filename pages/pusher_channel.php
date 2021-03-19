<?php 
require '../Core.php';
use Core\System;
$kun = new System;
//$kun->check_login();
$user = $kun->user();

$id_room = $_POST['id'];
?>

      <script type="text/javascript">
          Pusher.logToConsole = true;
            var pusher = new Pusher('10d5ea7e7b632db09c72', {
                encrypted: true
            });
            var channel = pusher.subscribe('<?php echo $id_room;?>');
            channel.bind('chat', function (data) {

              if(data.type == 'get_room') {

                document.getElementById("hash").setAttribute('value',data.hash); 
                $('#chats').html('');
                    $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a class="avatar" href="#" data-placement="left"><img src="https://getbootstrapadmin.com/remark/material/global/portraits/5.jpg"></a></div><div class="chat-body"><div class="chat-content"><p><b>Hệ thống:</b></p><p>Đã tìm thấy người lạ</p><p>Hãy gửi lời chào đến họ nào</p><p>Note: <i>Đừng chờ họ nếu họ trả lời quá lâu!</i></p></div></div></div>');



toastr["success"]("Người lạ đã vào chat!", "Thông Báo");

$('#tim-nguoi-la').hide();
$('#form-mes').fadeIn(800);
$('#content-chat').fadeIn(800);
<?php
if(!$kun->is_mobile()) {?>
$('#report').show();
$('#refresh').show();
<?}else{?>
$('#report_1').show();
$('#refresh_1').show();
<?}?>


ping('success');

              }

              if(data.type == 'chat') {
                var chat = data.mes;


                if(data.from == '<?php echo $user['username'];?>') {
                    $('#chats').append('<div class="chat"><div class="chat-avatar"><a class="avatar" href="#" data-placement="right"><img src="/styles/images/user.png"></a></div><div class="chat-body"><div class="chat-content"><p>'+chat[0].msg+'</p></div></div></div>');
                    go_last();

                }else {
          document.getElementById("hash").setAttribute('value', data.hash); 

                    ping('new');
                    $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a class="avatar" href="#" data-placement="left"><img src="/styles/images/user.png"></a></div><div class="chat-body"><div class="chat-content"><p>'+chat[0].msg+'</p></div></div></div>');
                    go_last();


                }
    

              }else if(data.type == 'out_chat') {
                                    // ping('out');
                    $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a class="avatar" href="#" data-placement="left"><img src="https://getbootstrapadmin.com/remark/material/global/portraits/5.jpg"></a></div><div class="chat-body"><div class="chat-content"><p><b>Hệ thống:</b></p><p>Người lạ dừng chat với bạn!</p><p>Vui lòng nhấn dừng chat để tìm người khác</p></div></div></div>');
                    $('#form-mes').fadeOut(800);
                    $('#report').hide();
                    $('#report_1').hide();
                    go_last();
              }else if(data.type == 'disconnect') {
                                    // ping('out');
                    document.getElementById("hash").setAttribute('value', ''); 
                    $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a class="avatar" href="#" data-placement="left"><img src="https://getbootstrapadmin.com/remark/material/global/portraits/5.jpg"></a></div><div class="chat-body"><div class="chat-content"><p><b>Hệ thống:</b></p><p>Người lạ đã mất kết nối!</p><p>Vui lòng nhấn dừng chat để tìm người khác</p></div></div></div>');
                    $('#form-mes').fadeOut(800);
                    $('#report').hide();
                    $('#report_1').hide();
                    go_last();
              }









            });


        </script>
