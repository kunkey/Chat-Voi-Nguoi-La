

  </div>
  <!-- End Page -->

<div class="fixed-bottom" id="form-mes">
<footer class="site-footer" style="height: 60px;">

<form id="tinnhan">
<div class="form-group form-material" data-plugin="formMaterial">
                  <div class="input-group">
                    <span data-target="#upanh" data-toggle="modal" class="input-group-addon" id="send_heart" onclick="go_last()"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
                    

                    <div class="form-control-wrap" id="input">
                      <input id="noidung" type="text" class="form-control empty" placeholder="Bạn muốn nói gì?" value="">
                    </div>


                    <span class="input-group-btn">
<span class="input-group-addon" id="send" onclick="go_last()"><i class="fa fa-2x fa-paper-plane"></i></span>
                    </span>
                  </div>
                </div>

</form>
  </footer>
</div>





  <!-- Core  -->
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/babel-external-helpers/babel-external-helpers.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/jquery/jquery.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/popper-js/umd/popper.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/bootstrap/bootstrap.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/animsition/animsition.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/mousewheel/jquery.mousewheel.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/asscrollbar/jquery-asScrollbar.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/asscrollable/jquery-asScrollable.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/waves/waves.min.js?v4.0.1"></script>

  <!-- Plugins -->
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/switchery/switchery.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/intro-js/intro.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/screenfull/screenfull.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/slidepanel/jquery-slidePanel.min.js?v4.0.1"></script>
  <script src="<?php echo $kun->config('home');?>styles/toastr/toastr.min.js"></script>

  <!-- Scripts -->
  <script src="https://getbootstrapadmin.com/remark/material/global/js/State.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Component.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Plugin.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Base.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Config.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Section/Menubar.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Section/GridMenu.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Section/Sidebar.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Section/PageAside.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Plugin/menu.min.js?v4.0.1"></script>

  <!-- Config -->
  <script src="https://getbootstrapadmin.com/remark/material/global/js/config/colors.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/config/tour.min.js?v4.0.1"></script>
  <script>
    Config.set('assets', 'https://getbootstrapadmin.com/remark/material/base/assets');
  </script>

  <!-- Page -->

  <script src="https://getbootstrapadmin.com/remark/material/base/assets/js/Site.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Plugin/asscrollable.min.js?v4.0.1"></script>

  <script src="https://getbootstrapadmin.com/remark/material/global/js/Plugin/slidepanel.min.js?v4.0.1"></script>
  <script src="https://getbootstrapadmin.com/remark/material/global/js/Plugin/switchery.min.js?v4.0.1"></script>

  <!-- Script Site -->
  <script src="<?php echo $kun->config('home');?>styles/js/script.js"></script>




  <script>

         //  Thoát trò chuyện

  $('#out').click(function() {

            $.post( 
                  "/system/out-chat", {room: $('#id_phong').val()},
                  function(res) {    

                  }
               );

                    console.log('Vừa dừng chat');   
                    document.getElementById("id_phong").setAttribute('value','');
                    document.getElementById("hash").setAttribute('value','');
                    $('#pusher').html('');
                    $('#modal-close').click();
                    $('#chats').html('');
$('#nobody').fadeIn(800);
$('#tim-nguoi-la').hide();
$('#form-mes').hide();
$('#content-chat').hide();
$('#report').hide();
$('#refresh').hide();
$('#report_1').hide();
$('#refresh_1').hide();
$('#tim').click();
go_last();

  });


     //  Gửi Tin nhắn
  $('#send').click(function() {
      $('#tinnhan').submit();
  });

  
  $('#tinnhan').submit(function (e) {
    e.preventDefault();
    // Code Gửi Tin Nhắn tới Server.
    console.log('Thực hiện gửi');

    if($('#noidung').val()) {
        document.getElementById("send").disabled = true;

    // Make AJAX request
              $.post( 
                  "/system/chat",
                  { 
                    channel: $('#id_phong').val(),
                    msg: $('#noidung').val(),
                    from: '<?php echo $user['username'];?>'
                    },
                  function(res) {          

        document.getElementById("send").disabled = false;
                  }, 'json'
               );
        $('#noidung').val('');

    }else {
      toastr["warning"]("Nhập gì đó vào đi ><", "Opps!");
    }


    go_last();
    });


     //  lúc mới mở site
$(document).ready(function(){
$("#chats").height(screen.availHeight - <?php if($kun->is_mobile()) echo '310';else echo '310';?>);
$('#nobody').fadeIn(800);
$('#tim-nguoi-la').hide();
$('#form-mes').hide();
$('#content-chat').hide();
$('#report').hide();
$('#refresh').hide();
$('#report_1').hide();
$('#refresh_1').hide();
go_last();
});



     //  nhấp vào vào tim kiếm
$('#tim').click(function() {
$('#nobody').hide();
$('#tim-nguoi-la').fadeIn(800);
ping('click');

            $.post( 
                  "/system/wait", {},
                  function(res) {    
                    console.log('Phòng Chat ID : '+res.room);   
        document.getElementById("id_phong").setAttribute('value',res.room); 

                    $.post( 
                  "/pages/pusher_channel.php", {id: res.room},
                  function(res) {    
                $('#pusher').html(res);

                  }, 'text'
               );

                    if(res.type == "vao_phong") {

$('#tim-nguoi-la').hide();

toastr["success"]("Người lạ đã vào chat!", "Thông Báo");
$('#chats').html('');
  $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a class="avatar" href="#" data-placement="left"><img src="https://getbootstrapadmin.com/remark/material/global/portraits/5.jpg"></a></div><div class="chat-body"><div class="chat-content"><p><b>Hệ thống:</b></p><p>Đã tìm thấy người lạ</p><p>Hãy gửi lời chào đến họ nào</p><p>Note: <i>Đừng chờ họ nếu họ trả lời quá lâu!</i></p></div></div></div>');

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



                  }, 'json'
               );


});

</script>

<p id="pusher" style="display: none"></p> <!-- Nhận đc id room và gán vào pusher -->







<script type="text/javascript">

<?php

if(!$kun->is_mobile()) {
  ?>

    // kiểm tra kết nối 

setInterval(function(){ 
  
  var hash = $('#hash').val();
  var room = $('#id_phong').val();
if(hash) {
              $.post( 
                  "/system/connect", {type: 'check', hash: hash, room: room},
                  function(res) {    
                    if(res.status == 'false') {
                          $.post( 
                  "/system/connect", {type: 'disconnect', hash: hash, room: room},
                  function(res) {    
                                  }, 'text'
                        );
                            }
                  }, 'json'
               );
}
}, 30000);

<? } ?>

// khai báo với server là tôi đang online

setInterval(function(){ 
  
              $.post( 
                  "/system/post_connect", {},
                  function(res) {    
                  }, 'text'
               );

}, 50000);





     //  hàm linh tinh hiệu ứng 

function go_last(){
   const messages = document.getElementById('chats');
    messages.scrollTop = messages.scrollHeight;
}

function ping(id) {
var x = document.getElementById(id);
  x.play();
}



setInterval(function(){ 
  var process = Math.floor(Math.random() * 100);
  document.getElementById("bar-process").style.width = process+"%";
}, 3000);
setInterval(function(){ 
  var process2 = Math.floor(Math.random() * 100);
  document.getElementById("bar-process2").style.width = process2+"%";
}, 4000);

</script>


</body>

</html>