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
            <a href="index.html" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的收藏</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <div class="order-nav">
                <a class="selected" onclick="fun1()">全部收藏</a>
                <a onclick="fun2()">酒店收藏</a>
                <a class="last-a"  onclick="fun3()">礼品收藏</a>
            </div>

            <div class="order-list" id="111">
                <ul>
                   <?php foreach ($arr['hotel'] as $k => $v) { ?>              
                    <li>
                        <span class="order-hotel-name"><?php echo $v['hotel_name']?></span>
                        <span class="order-hotel-address"><?php echo $v['hotel_address']?></span>
                        <span class="order-time"><img src="../<?php echo $v['hotel_img']?>" width='50px'></span>
                    </li>
                   <?php  }?>

                </ul>
            </div>
            <div class="order-list" id="222">
                <ul>
                   <?php foreach ($arr['gift'] as $k => $v) { ?>              
                    <li>

                        <span class="order-hotel-name"><?php echo $v['gift_name']?></span>
                        <span class="order-time"><img src="../<?php echo $v['gift_img']?>" width='50px'></span>
                    </li>
                   <?php  }?>

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
<script type="text/javascript" src="./js/jq.js"></script>
<script type="text/javascript">
    function fun1(){
        $("#111").show();
        $("#222").show();
    }

    function fun2(){
        $("#111").show();
        $("#222").hide();
    }

    function fun3(){
        $("#111").hide();
        $("#222").show();
    }
</script>