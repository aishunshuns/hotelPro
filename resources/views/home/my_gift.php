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
    </head>
    
    <body>
        <div class="header">
            <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的足迹</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
           
 <?php foreach ($arr as $k => $v) { ?>
            
           
               
            
                 <ul class="giftlist unstyled">
         
        <li>
        
    
   
   

     <span class="order-time"><?php echo $v['gift_integral'] ?></span> 
     <span class="order-hotel-name"><img src="../<?php echo $v['gift_img'] ?>"> </span>
    <span class="order-time"><?php echo $v['gift_name'] ?></span>
    
  
        </li>

                    <!-- <li>
                        <span class="order-hotel-name">玩具熊</span>
                        <span class="order-time">2016-05-20 12:23:34</span>
                    </li>
                    <li>
                        <span class="order-hotel-name">玩具熊</span>
                        <span class="order-time">2016-05-20 12:23:34</span>
                    </li> -->
                    
                </ul>
           
            <?php } ?>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </div>
        </div>
    </body>

</html>