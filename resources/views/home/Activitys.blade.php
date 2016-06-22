<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新活动</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" /><link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />
<script type="text/javascript" src="js/zepto.js"></script>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="../jquery.SuperSlide.2.1.1.js"></script>
</head>
</head>
<style>
    /* 本例子css */
    .picMarquee-top{ margin:0 auto;  width:100%; overflow:hidden; position:relative; }
    .picMarquee-top .hd{ overflow:hidden;  height:30px; background:#f4f4f4; padding:0 10px;  }
    .picMarquee-top .hd .prev,.picMarquee-top .hd .next{ display:block;  width:9px; height:5px; float:right; margin-right:5px; margin-top:10px;  overflow:hidden;
       cursor:pointer; background:url("../images/arrow.png") 0 -100px no-repeat;}
    .picMarquee-top .hd .next{ background-position:0 -140px;  }
    .picMarquee-top .hd .prevStop{ background-position:-60px -100px;  }
    .picMarquee-top .hd .nextStop{ background-position:-60px -140px;  }
    .picMarquee-top .bd{ padding:10px;   }
    .picMarquee-top .bd ul{ overflow:hidden; zoom:1; }
    .picMarquee-top .bd ul li{ text-align:center; zoom:1; }
  
</style>

<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">最新活动</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div> 
 <div class="container width90" >
   <div class="picMarquee-top">
   
     
      <div class="hd">
        <a class="next"></a>
        <a class="prev"></a>
      </div>
      <div class="bd">
        <ul class="unstyled activitylist">
            @foreach($res as $v) 
            <li>
                <a href="News?id={{$v['act_id']}}">
                <img src="{{$v['act_img']}}"/>
                <p>{{$v['act_name']}} ({{date('Y-m-d',$v['act_start_time'])}}--{{date('Y-m-d',$v['act_end_time'])}})</p>
                </a>
            </li>
            @endforeach 
      </ul>
         
      </div>
    </div>
</div>

    
   

  <div class="footer">
  <div class="gezifooter">
      
      <a href="Login" class="ui-link">立即登陆</a> <font color="#878787">|</font> 
       <a href="Register" class="ui-link">免费注册</a> <font color="#878787">|</font>                 
                  

       <a href="http://www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
  </div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
  </div>
  </div>

</body>
</html>
<script>
jQuery(".picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50});
  </script>
