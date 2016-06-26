<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店简介</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="js/zepto.js"></script>

</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">酒店简介</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
    <script type="text/javascript" src="http://gmu.baidu.com/src/extend/touch.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/extend/matchMedia.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/extend/event.ortchange.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/extend/parseTpl.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/core/gmu.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/core/event.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/core/widget.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/slider.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/arrow.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/dots.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/$touch.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/$autoplay.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/$lazyloadimg.js"></script>
    <script type="text/javascript" src="http://gmu.baidu.com/src/widget/slider/imgzoom.js"></script>
    <link rel="stylesheet" type="text/css" href="http://gmu.baidu.com/assets/widget/slider/slider.css" />
    <link rel="stylesheet" type="text/css" href="http://gmu.baidu.com/assets/widget/slider/slider.default.css" />
    
<div class="container">
<ul class="unstyled hotel-bar">
	<li class="first">
    <a href="Hotel?hotel_id={{$arr['hotel_id']}}">房型</a>
	</li>
	<li><a href="HotelInfo"  class="active">简介</a></li>
	<li><a href="HotelMap?hotel_id={{$arr['hotel_id']}}">地图</a></li>
	<li><a href="HotelReview?hotel_id={{$arr['hotel_id']}}">评论</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>
<div class="hotel-prompt ">
    <span class="hotel-prompt-title">酒店图片</span>
<div id="slider" style="margin-top: 10px;">
    
 <div>
        <img src="http://www.gridinn.com/photos/201212/20121231113309m.jpg">
        <p>酒店外观</p>
 </div>             
       
 <div>
        <img src="http://www.gridinn.com/photos/201212/20121231113406m.jpg">
        <p>大堂</p>
 </div>             
       
 <div>
        <img src="http://www.gridinn.com/photos/201212/20121231113520m.jpg">
        <p>阳光大床房</p>
 </div>             
        
</div>
</div>
<div id="hotelinfo" class="hotel-prompt ">
			<span class="hotel-prompt-title">酒店简介</span>
			      <p>{{$arr['hotel_desc']}}</p>
            <p>地址：{{$arr['hotel_address']}}</p>
            <p>电话：{{$arr['hotel_phone']}}</p>
		</div>
</div>
<script>
    //创建slider组件
    $('#slider').slider({ imgZoom: true });
</script>
  <div class="gezifooter">
      
      <a href="Loginx" class="ui-link">立即登陆</a> <font color="#878787">|</font> 
       <a href="Register" class="ui-link">免费注册</a> <font color="#878787">|</font>                 
                  

       <a href="../www.gridinn.com/@display=pc" class="ui-link">电脑版</a>
  </div>
  <div class="gezifooter">
    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
  </div>


</body>
</html>
