<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的格子</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/NewGlobal.css" rel="stylesheet" />
        <link href="css/user.css" rel="stylesheet" />
        <script type="text/javascript" src="js/zepto.js"></script>
  <style>
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
            <a href="index.html" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的订单</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width40 pt20">
            <div class="order-nav">
                <?php 
                    if ($card_status==0) {
                       echo "<a  href='myOrder?card_status=3'>全部</a>
                           <a class='selected' href='myOrder?card_status=0'>未付款</a>
                           <a  href='myOrder?card_status=1'>已付款，未消费</a>
                           <a  href='myOrder?card_status=2'>已消费</a>";
                    } else if($card_status==1){
                       echo "<a href='myOrder?card_status=3'>全部</a>
                           <a  href='myOrder?card_status=0'>未付款</a>
                           <a class='selected'  href='myOrder?card_status=1'>已付款，未消费</a>
                           <a  href='myOrder?card_status=2'>已消费</a>";
                    } else if($card_status==2){
                       echo "<a  href='myOrder?card_status=3'>全部</a>
                           <a  href='myOrder?card_status=0'>未付款</a>
                           <a  href='myOrder?card_status=1'>已付款，未消费</a>
                           <a class='selected' href='myOrder?card_status=2'>已消费</a>";
                    } else {
                       echo "<a class='selected' href='myOrder?card_status=3'>全部</a>
                           <a  href='myOrder?card_status=0'>未付款</a>
                           <a  href='myOrder?card_status=1'>已付款，未消费</a>
                           <a  href='myOrder?card_status=2'>已消费</a>";
                    }
                    
                 ?>
            </div>
             <div class="container hotellistbg">
         
          <?php 
                    foreach ($card as $key => $v) {
                     
                   if ($v['card_status']==0) {
                     echo "
                      <ul class='unstyled hotellist'>  
                      <li>
              <a href='Hotel'>
                 <img class='hotelimg fl' src='".$v['hotel_img']."' /> 
              <div class='inline'>
                  <h3>".$v['hotel_name']."</h3>
                  <p>".$v['hotel_address']."</p>
                  <p>评分：5.0 （267人已评）</p>
              </div>
              <div class='clear'></div>  
               </a> 
               <ul class='unstyled'>
                     <li><a href='javascript:void(0)' class='order'>付款</a></li>

                            </ul>
                                 </li>     
                                
                            </ul>
                     ";
                   } else if ($v['card_status']==2){

                     echo "
                      <ul class='unstyled hotellist'>  
                      <li>
              <a href='Hotel'>
                 <img class='hotelimg fl' src='".$v['hotel_img']."' /> 
              <div class='inline'>
                  <h3>".$v['hotel_name']."</h3>
                  <p>".$v['hotel_address']."</p>
                  <p>评分：5.0 （267人已评）</p>
              </div>
              <div class='clear'></div>  
               </a> 
               <ul class='unstyled'>
                      <input type='hidden' value='".$v['card_number']."' id='card_number' />";?>
                     <li><a href='javascript:void(0);' onclick="showBg('<?php echo $v['card_number'] ?>')" class='order'>评论</a></li>
              <?php echo "</ul>
               </li>     
                  <div>
                  <div id='fullbg'></div> 
                  <div id='dialog'> 
                  <p class='close'><a href='#' onclick='closeBg();'>关闭</a></p> 
                  <div id='lists'>
                  </div> 
                  </div> 
                  </div> 
              </ul>
                     ";
                   }else{
                    echo "
                      <ul class='unstyled hotellist'>  
                      <li>
              <a href='Hotel'>
                 <img class='hotelimg fl' src='".$v['hotel_img']."' /> 
              <div class='inline'>
                  <h3>".$v['hotel_name']."</h3>
                  <p>".$v['hotel_address']."</p>
                  <p>评分：5.0 （267人已评）</p>
              </div>
              <div class='clear'></div>  
               </a> 
               <ul class='unstyled'>
                     <li></li>
              </ul>
               </li>     
                  <div>
                  <div id='fullbg'></div> 
                  <div id='dialog'> 
                  <p class='close'><a href='#' onclick='closeBg();'>关闭</a></p> 
                  <div>

                  </div> 
                  </div> 
                  </div> 
              </ul>
               ";
                   }
                 }
                   ?>
  </div>


            <div class="order-list">
                <ul>
                   
                </ul>
            </div>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </div>
        </div>
    </body>

</html>
<script type="text/javascript"> 
//显示灰色 jQuery 遮罩层 
function showBg(card_number) {

  var ajax =new XMLHttpRequest()
ajax.open("get","Ping?card_number="+card_number)
ajax.send()
ajax.onreadystatechange=function () {
      // alert(ajax.responseText)
    if (ajax.status==200&&ajax.readyState==4) {
      //alert(1)
      document.getElementById('lists').innerHTML=ajax.responseText;
    }
}
var bh = $("body").height(); 
var bw = $("body").width(); 
$("#fullbg").css({ 
height:bh, 
width:bw, 
display:"block" 
}); 
 
//var card_number = document.getElementById('card_number').value
//alert(card_number)

$("#dialog").show();
} 
//关闭灰色 jQuery 遮罩 
function closeBg() { 
$("#fullbg,#dialog").hide(); 
} 
</script>