<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    body, html,#allmap {width: 70%;height: 90%;overflow: hidden;margin:0;font-family:"微软雅黑";padding-left: 150px}
  </style>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Q61GB88kpbirioyp2QGQZtoivU7uHvmO"></script>
  <script type="text/javascript" src="js/zepto.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />
  <title>酒店地图</title>
</head>
<body>
<div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">选择城市</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

<ul class="unstyled hotel-bar">
  <li class="first">
    <a href="Hotel?hotel_id={{$arr['hotel_id']}}">房型</a>
  </li>
  <li><a href="HotelInfo?hotel_id={{$arr['hotel_id']}}"  >简介</a></li>
  <li><a href="HotelMap" class="active">地图</a></li>
  <li><a href="HotelReview?hotel_id={{$arr['hotel_id']}}">评论</a></li>
</ul>

   
  <div id="allmap"></div>

      
      <a href="Login" class="ui-link">立即登陆</a> <font color="#878787">|</font> 
       <a href="Register" class="ui-link">免费注册</a> <font color="#878787">|</font>                 
                  

       <a href="../www.gridinn.com/@display=pc" class="ui-link">电脑版</a>

    <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>

</body>
</html>
<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  var point = new BMap.Point({{$arr['hotel_ip_x']}},{{$arr['hotel_ip_y']}});
  map.centerAndZoom(point,12);
  // 创建地址解析器实例
  var myGeo = new BMap.Geocoder();
  // 将地址解析结果显示在地图上,并调整地图视野
  myGeo.getPoint("北京市海淀区上地10街", function(point){
    if (point) {
      map.centerAndZoom(point, 16);
      map.addOverlay(new BMap.Marker(point));
    }else{
      alert("您选择地址没有解析到结果!");
    }
  }, "北京市");
</script>