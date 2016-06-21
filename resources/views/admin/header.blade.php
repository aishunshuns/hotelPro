<!DOCTYPE html>
<html lang="en" id="div1">
 <head> 
  <meta charset="utf-8" /> 
  <title>控制台 - Bootstrap后台管理系统模版Ace下载</title> 
  <meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" /> 
  <meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <!-- basic styles --> 
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" /> 
  <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}" /> 
  <!--[if IE 7]>
      <link rel="stylesheet" href="../assets/css/font-awesome-ie7.min.css" />
    <![endif]--> 
  <!-- page specific plugin styles --> 
  <!-- fonts --> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> 
  <!-- ace styles --> 
  <link rel="stylesheet" href="{{url('assets/css/ace.min.css')}}" /> 
  <link rel="stylesheet" href="{{url('assets/css/ace-rtl.min.css')}}" /> 
  <link rel="stylesheet" href="{{url('assets/css/ace-skins.min.css')}}" /> 
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
    <![endif]--> 
  <!-- inline styles related to this page --> 
  <!-- ace settings handler --> 
  <script src="{{url('assets/js/ace-extra.min.js')}}"></script> 
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
  <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]--> 
 </head> 
 <body> 
  <div class="navbar navbar-default" id="navbar"> 
   <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script> 
   <div class="navbar-container" id="navbar-container"> 
    <div class="navbar-header pull-left"> 
     <a href="#" class="navbar-brand"> <small> <i class="icon-leaf"></i> ACE后台管理系统 </small> </a>
     <!-- /.brand --> 
    </div>
    <!-- /.navbar-header --> 
    <div class="navbar-header pull-right" role="navigation"> 
     <ul class="nav ace-nav"> 
      <li class="grey"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-tasks"></i> <span class="badge badge-grey">4</span> </a> 
       <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close"> 
        <li class="dropdown-header"> <i class="icon-ok"></i> 还有4个任务完成 </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left">软件更新</span> 
           <span class="pull-right">65%</span> 
          </div> 
          <div class="progress progress-mini "> 
           <div style="width:65%" class="progress-bar "></div> 
          </div> </a> </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left">硬件更新</span> 
           <span class="pull-right">35%</span> 
          </div> 
          <div class="progress progress-mini "> 
           <div style="width:35%" class="progress-bar progress-bar-danger"></div> 
          </div> </a> </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left">单元测试</span> 
           <span class="pull-right">15%</span> 
          </div> 
          <div class="progress progress-mini "> 
           <div style="width:15%" class="progress-bar progress-bar-warning"></div> 
          </div> </a> </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left">错误修复</span> 
           <span class="pull-right">90%</span> 
          </div> 
          <div class="progress progress-mini progress-striped active"> 
           <div style="width:90%" class="progress-bar progress-bar-success"></div> 
          </div> </a> </li> 
        <li> <a href="#"> 查看任务详情 <i class="icon-arrow-right"></i> </a> </li> 
       </ul> </li> 
      <li class="purple"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-bell-alt icon-animated-bell"></i> <span class="badge badge-important">8</span> </a> 
       <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close"> 
        <li class="dropdown-header"> <i class="icon-warning-sign"></i> 8条通知 </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-pink icon-comment"></i> 新闻评论 </span> 
           <span class="pull-right badge badge-info">+12</span> 
          </div> </a> </li> 
        <li> <a href="#"> <i class="btn btn-xs btn-primary icon-user"></i> 切换为编辑登录.. </a> </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i> 新订单 </span> 
           <span class="pull-right badge badge-success">+8</span> 
          </div> </a> </li> 
        <li> <a href="#"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-info icon-twitter"></i> 粉丝 </span> 
           <span class="pull-right badge badge-info">+11</span> 
          </div> </a> </li> 
        <li> <a href="#"> 查看所有通知 <i class="icon-arrow-right"></i> </a> </li> 
       </ul> </li> 
      <li class="green"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-envelope icon-animated-vertical"></i> <span class="badge badge-success">5</span> </a> 
       <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close"> 
        <li class="dropdown-header"> <i class="icon-envelope-alt"></i> 5条消息 </li> 
        <li> <a href="#"> <img src="{{url('assets/avatars/avatar.png')}}" class="msg-photo" alt="Alex's Avatar" /> <span class="msg-body"> <span class="msg-title"> <span class="blue">Alex:</span> 不知道写啥 ... </span> <span class="msg-time"> <i class="icon-time"></i> <span>1分钟以前</span> </span> </span> </a> </li> 
        <li> <a href="#"> <img src="{{url('assets/avatars/avatar3.png')}}" class="msg-photo" alt="Susan's Avatar" /> <span class="msg-body"> <span class="msg-title"> <span class="blue">Susan:</span> 不知道翻译... </span> <span class="msg-time"> <i class="icon-time"></i> <span>20分钟以前</span> </span> </span> </a> </li> 
        <li> <a href="#"> <img src="{{url('assets/avatars/avatar4.png')}}" class="msg-photo" alt="Bob's Avatar" /> <span class="msg-body"> <span class="msg-title"> <span class="blue">Bob:</span> 到底是不是英文 ... </span> <span class="msg-time"> <i class="icon-time"></i> <span>下午3:15</span> </span> </span> </a> </li> 
        <li> <a href="inbox.html"> 查看所有消息 <i class="icon-arrow-right"></i> </a> </li> 
       </ul> </li> 
      <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <img class="nav-user-photo" src="{{URL(session('user_file'))}}" alt="Jason's Photo" /> <span class="user-info"> <small>欢迎光临,</small> <?php if(session('user_name')){ echo session('user_name'); }else{ echo ""; }  ?> </span> <i class="icon-caret-down"></i> </a> 
       <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close"> 
        <li> <a href="#"> <i class="icon-cog"></i> 设置 </a> </li> 
        <li> <a href="#"> <i class="icon-user"></i> 个人资料 </a> </li> 
        <li class="divider"></li> 
        <li> <a href="/admin"> <i class="icon-off"></i> 退出 </a> </li> 
       </ul> </li> 
     </ul>
     <!-- /.ace-nav --> 
    </div>
    <!-- /.navbar-header --> 
   </div>
   <!-- /.container --> 
  </div> 
  <div class="main-container" id="main-container"> 
   <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script> 
   <div class="main-container-inner"> 
    <a class="menu-toggler" id="menu-toggler" href="#"> <span class="menu-text"></span> </a> 
    <div class="sidebar" id="sidebar"> 
     <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
          </script> 
     <div class="sidebar-shortcuts" id="sidebar-shortcuts"> 
      <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large"> 
       <button class="btn btn-success"> <i class="icon-signal"></i> </button> 
       <button class="btn btn-info"> <i class="icon-pencil"></i> </button> 
       <button class="btn btn-warning"> <i class="icon-group"></i> </button> 
       <button class="btn btn-danger"> <i class="icon-cogs"></i> </button> 
      </div> 
      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini"> 
       <span class="btn btn-success"></span> 
       <span class="btn btn-info"></span> 
       <span class="btn btn-warning"></span> 
       <span class="btn btn-danger"></span> 
      </div> 
     </div>
     <!-- #sidebar-shortcuts --> 
     <ul class="nav nav-list"> 
      <li class="active"> <a href="{{URL('admin/index')}}"> <i class="icon-dashboard"></i> <span class="menu-text"> 控制台 </span> </a> </li> 
    @foreach($dataLeft as $key => $val)
    <li> <a href="#" class="dropdown-toggle"> <i class="icon-list"></i> <span class="menu-text"> {{$val['parent']}} </span> <b class="arrow icon-angle-down"></b> </a> 
       <ul class="submenu"> 
       @foreach($val['son'] as $k => $v)
        <li> <a href="{{url($v['privilege_route'])}}"> <i class="icon-double-angle-right"></i> {{$v['privilege_name']}}</a> </li> 
        @endforeach
       </ul> 
    </li>
    @endforeach
  

     <!-- /.nav-list --> 
     <div class="sidebar-collapse" id="sidebar-collapse"> 
      <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i> 
     </div> 
     <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
          </script> 
    </div> 
    <div class="main-content"> 
     <div class="breadcrumbs" id="breadcrumbs"> 
      <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
          <ul class="breadcrumb"> 
       <li> <i class="icon-home home-icon"></i> <a href="#">首页</a> </li> 
       <li class="active">控制台</li> 
      </ul>
      <!-- .breadcrumb --> 
            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="icon-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- #nav-search -->
          </div>

          <!-- gs -->

          <script>
            // alert(1);
            var pathname = window.location.pathname;
            // alert(pathname);
            pathname = pathname.substr(1);
            // alert(pathname);
            $("li a").each(function() {

            var href = $(this).attr("href");
            // alert(href);
            if(pathname == href){

            $(this).parent().parent().parent().addClass("active");

            $(this).parent().addClass("active");

            }

            });

            </script>
            <style>
        body {
          font-family:Arial, Helvetica, sans-serif;
          font-size:12px;
          margin:0;
          }
          #main {
          height:1800px;
          padding-top:90px;
          text-align:center;
          }
          .col-md-offset-3{
            padding-top:45px;
            padding-left:45px;
          }
          #fullbg {
          background-color:gray;
          left:0;
          opacity:0.5;
          position:absolute;
          top:0;
          z-index:3;
          filter:alpha(opacity=50);
          -moz-opacity:0.5;
          -khtml-opacity:0.5;
          }
          #dialog {
          background-color:#fff;
          border:5px solid rgba(0,0,0, 0.4);
          height:400px;
          left:50%;
          margin:-200px 0 0 -200px;
          padding:1px;
          position:fixed !important; /* 浮动对话框 */
          position:absolute;
          top:50%;
          width:400px;
          z-index:5;
          border-radius:5px;
          display:none;
          }
          #dialog p {
          margin:0 0 12px;
          height:24px;
          line-height:24px;
          background:#CCCCCC;
          }
          #dialog p.close {
          text-align:right;
          padding-right:10px;
          }
          #dialog p.close a {
          color:#fff;
          text-decoration:none;
          } 
          </style>
          <!-- gs -->
