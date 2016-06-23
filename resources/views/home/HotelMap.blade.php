<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店实景</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="js/zepto.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Q61GB88kpbirioyp2QGQZtoivU7uHvmO"></script>
<style>
  
    #panorama {width:100%; height: 500px;}
    #result {width:100%;font-size:12px;}
#main { 
height:1800px; 
padding-top:90px; 
text-align:center; 
} 
#fullbg { 

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
</head>
<body>
 <div class="header">
 <a href="/" class="home">
            <span class="header-icon header-icon-home"></span>
            <span class="header-name">主页</span>
</a>
<div class="title" id="titleString">酒店实景</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
  <div class="container hotellistbg">
   <div id="panorama"></div>
  <div id="result">

  </div>

<script type="text/javascript"> 
//显示灰色 jQuery 遮罩层 
function showBg() { 
var bh = $("body").height(); 
var bw = $("body").width(); 
$("#fullbg").css({ 
height:bh, 
width:bw, 
display:"block" 
}); 
$("#dialog").show(); 
} 
//关闭灰色 jQuery 遮罩 
function closeBg() { 
$("#fullbg,#dialog").hide(); 
} 
</script>
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
<script type="text/javascript">
  var panorama = new BMap.Panorama('panorama');
  panorama.setPosition(new BMap.Point(116.403925,39.913903));//坐标点在天安门

  var labelPosition = new BMap.Point(116.403925,39.913903);
  var labelOptions = {
      position: labelPosition,
    altitude:5
  };//设置标注点的经纬度位置和高度
  var label = new BMap.PanoramaLabel('自定义标注-天安门广场', labelOptions);
  panorama.addOverlay(label);//在全景地图里添加该标注
  panorama.setPov(label.getPov()); //修改点的视角，朝向该label

  label.addEventListener('click', function() { //给标注点注册点击事件
    panorama.setPov({  //修改点的视角
      pitch: 10, 
      heading: 14
    });
  });
</script>
