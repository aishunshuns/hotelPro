<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>酒店列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/NewGlobal.css" rel="stylesheet" />

<script type="text/javascript" src="js/zepto.js"></script>
<style>
 
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
<div class="title" id="titleString">酒店列表</div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
  <div class="container hotellistbg">
         <ul class="unstyled hotellist">
         @foreach($res as $k => $v)           
             <li>
              <a href="Hotel?hotel_id={{$v['hotel_id']}}">
                 

                 <img class="hotelimg fl" src="{{$v['hotel_img']}}" /> 

              <div class="inline">
                  <h3>{{$v['hotel_name']}}</h3>
                  <p>地址：{{$v['hotel_address']}}</p>
                  <p>评分：{{$v['a_score']}} （{{$v['sum_peo']}}人已评）</p>                 
              </div>
              <div class="clear"></div>  
               </a> 
               <span style="margin-left:400px" id="shou_{{$v['hotel_id']}}">
                @if(!isset($v['collect']))
                  <a href="javascript:collection({{$v['hotel_id']}});"><img src="collection.jpg" alt="收藏本店" width="25" /></a>
                @else
                  <a href="javascript:cancel({{$v['hotel_id']}})"><img src="cancel.jpg" alt="取消收藏" width="25" /></a>
                @endif
                </span>
               <ul class="unstyled">
                   <li><a href="Hotel?hotel_id={{$v['hotel_id']}}" class="order">预订</a></li>
                   <li><a href="HotelNav?hotel_id={{$v['hotel_id']}}" class="gps">导航</a></li>
                   <li><a href="HotelShow?hotel_id={{$v['hotel_id']}}" class="reality">实景</a></li>
               </ul>
             </li>
          @endforeach
              </ul>
  </div>
  <script>
      function collection(hotel_id){
        
        //alert(hotel_id);
        $.get('CollectionHotel',{hotel_id:hotel_id},function(msg){
          $('#shou_'+hotel_id).html(msg);
        });
      }

      function cancel(hotel_id){
        
        //alert(hotel_id);
        $.get('Cancel',{hotel_id:hotel_id},function(msg){
          $('#shou_'+hotel_id).html(msg);
        });
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
