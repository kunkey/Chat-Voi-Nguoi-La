<html class="no-js js-menubar" lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>Chat Với Người Lạ</title>

  <link rel="apple-touch-icon" href="https://getbootstrapadmin.com/remark/material/base/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="https://getbootstrapadmin.com/remark/material/base/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/css/bootstrap.min.css?v4.0.1">
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/css/bootstrap-extend.min.css?v4.0.1">
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/base/assets/css/site.min.css?v4.0.1">



  <!-- Plugins -->
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/vendor/animsition/animsition.min.css?v4.0.1">
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/vendor/asscrollable/asScrollable.min.css?v4.0.1">
    <link rel="stylesheet" href="<?php echo $kun->config('home');?>styles/toastr/toastr.min.css"/>
    

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Page -->
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/base/assets/examples/css/structure/chat.min.css?v4.0.1">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/fonts/material-design/material-design.min.css?v4.0.1">
  <link rel="stylesheet" href="https://getbootstrapadmin.com/remark/material/global/fonts/brand-icons/brand-icons.min.css?v4.0.1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">

  <script src="https://getbootstrapadmin.com/remark/material/global/vendor/breakpoints/breakpoints.min.js?v4.0.1"></script>
  <script>
    Breakpoints();
  </script>

    <script src="<?php echo $kun->config('home');?>/styles/js/pusher.notice.js"></script>
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

<?php require'style.php';?>

</head>
<body class="animsition site-menubar-unfold" style="animation-duration: 800ms; opacity: 1;">


  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left unfolded hided" data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button id="report_1" type="button" class="navbar-toggler collapsed" aria-expanded="false" data-target="#report-modal" data-toggle="modal">
        <i class="fa fa-bug"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle active" aria-expanded="true">
        <img class="navbar-brand-logo" src="https://getbootstrapadmin.com/remark/material/base/assets/images/logo.png" title="Remark">
        <span class="navbar-brand-text hidden-xs-down"> Chat Với Người Lạ</span>
      </div>
      <button id="refresh_1" type="button" class="navbar-toggler collapsed" aria-expanded="false" data-target="#refresh-modal" data-toggle="modal">
        <i class="fa fa-refresh"></i>
      </button>
    </div>


<div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link waves-effect waves-light waves-round" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left hided unfolded">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

          <li class="nav-item" id="report">
            <a class="nav-link waves-effect waves-light waves-round" data-target="#report-modal" data-toggle="modal">
                <i class="fa fa-2x fa-bug"></i>
              </a>
          </li>

          <li class="nav-item" id="refresh">
            <a class="nav-link waves-effect waves-light waves-round" data-target="#refresh-modal" data-toggle="modal">
                <i class="fa fa-2x fa-refresh"></i>
              </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->

      <!-- End Site Navbar Seach -->
    </div>


  </nav>


                        <!-- Modal -->
                        <div class="modal fade" id="refresh-modal" aria-hidden="true" aria-labelledby="examplePositionCenter"
                          role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-simple modal-center">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Dừng Chat</h4>
                              </div>
                              <div class="modal-body">
                                <p>Bạn có muốn dừng cuộc trò chuyện này?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Đóng</button>
                                <button type="button" id="out" class="btn btn-primary">Dừng</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="report-modal" aria-hidden="true" aria-labelledby="examplePositionCenter"
                          role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-simple modal-center">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Báo Cáo Người Này</h4>
                              </div>
                              <div class="modal-body">
                                <p>Bạn có muốn báo cáo cho admin về cuộc trò chuyện này?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary">Báo Cáo</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->


                        <!-- Modal UpLoad -->
                        <div class="modal fade" id="upanh" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-simple">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Gửi Hình Ảnh Cho Người Lạ</h4>
                        </div>
                        <div class="modal-body">
                          

                <div class="example">
                  <input type="file" id="input-file-events" class="dropify-event">
                </div>




                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-pure waves-effect waves-classic" data-dismiss="modal">Đóng</button>
                          <button type="button" class="btn btn-primary waves-effect waves-classic">Gửi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                     <!-- End Modal Upload -->




  <div class="site-menubar site-menubar-light site-menubar-dark">
    <div class="site-menubar-body scrollable scrollable-inverse is-enabled scrollable-vertical hoverscorll-disabled" style="position: relative;">
      <div class="scrollable-container" style="height: 480.984px; width: 277px;">
        <div class="scrollable-content" style="width: 260px;">
          <ul class="site-menu" data-plugin="menu" style="transform: translate3d(0px, 0px, 0px);">
            <li class="site-menu-category"><h5 style="color: White"><i class="fa fa-globe" aria-hidden="true"></i> Online: <b id="online"><?php echo $kun->count_online();?>/<?php echo $kun->count_user();?> </b></h5></li>


            
            
          </ul>

          <div class="site-menubar-section">
            <h5>
              Tiến Trình
            </h5>
            <div class="progress progress-xs">
              <div id="bar-process" class="progress-bar active" style="width: 0%;" role="progressbar"></div>
            </div>
            <h5>
              CPU hệ Thống
            </h5>
            <div class="progress progress-xs">
              <div id="bar-process2" class="progress-bar progress-bar-warning" style="width: 0%;" role="progressbar"></div>
            </div>
          </div>
        </div>
      </div>




    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 161.586px;"></div></div></div>

    <div class="site-menubar-footer">
      <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
        <i class="fa fa-cogs" aria-hidden="true"></i>
      </a>
      <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <i class="fa fa-eye" aria-hidden="true"></i>
      </a>
      <a href="/signout.html" data-placement="top" data-toggle="tooltip" data-original-title="Đăng xuất">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
      </a>
    </div>
  </div>

</div>








  <!-- Page -->
  <div class="page">
    
