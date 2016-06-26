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
        <script type="text/javascript" src='js/jq.js'></script>

    </head>
    
    <body>
        <div class="header">
            <a href="/" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">我的格子</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
     
            <div class="user-face" style="z-index:100" onclick="showbtn()">
                <img src="../home/<?php echo $arr[0]['user_file']?>" alt="111" />
            </div>

            
                <div id="bg"></div>
                <div class="box" style="display:none" >
                    <h2>修改个人头像<a href="#" class="close">关闭</a></h2>

               <?php foreach ($arr as $k => $v) { ?>
                    <div class="list">
                      <?php include "file.php";?>
                    </div>
                </div>
            
            <div class="user-list">
            
                <span class="user-name"><?php echo $v['user_name']?></span>
                <span class="user-integer">积分:<i><?php echo $v['user_intergral']?></i></span>
            <?php  } ?>
            </div>

            <ul class="user-function-list">
                <li onclick="javascript:location.href='myList';">我的信息</li>
                <li onclick="javascript:location.href='myOrder';">我的订单</li>
                <li onclick="javascript:location.href='myGift';">历史记录</li>
                <li onclick="javascript:location.href='collect';">我的收藏</li>
            </ul>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p>
            </div>
        </div>
    </body>

</html>

<style type="text/css">
.box{position:absolute;width:400px;left:50%;height:auto;z-index:100;background-color:#fff;border:1px #ddd solid;padding:1px;}
.box h2{height:25px;font-size:14px;background-color:#aaa;position:relative;padding-left:10px;line-height:25px;color:#fff;}
.box h2 a{position:absolute;right:5px;font-size:12px;color:#fff;}
.box .list{padding:10px;}
.box .list li{height:24px;line-height:24px;}
.box .list li span{margin:0 5px 0 0;font-family:"宋体";font-size:12px;font-weight:400;color:#ddd;}
.showbtn {font:bold 24px '微软雅黑';}
#bg{background-color:#666;position:absolute;z-index:99;left:0;top:0;display:none;width:100%;height:100%;opacity:0.5;filter: alpha(opacity=50);-moz-opacity: 0.5;}
</style>

<script type="text/javascript">
    function showbtn(){
        $("#bg").css({
            display: "block", height: $(document).height()
        });
        var $box = $('.box');
        $box.css({
            //设置弹出层距离左边的位置
            left: ($("body").width() - $box.width()) / 2 +450 + "px",
            //设置弹出层距离上面的位置
            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
            display: "block"
        });
    }
    //点击关闭按钮的时候，遮罩层关闭
    $(".close").click(function () {
        $("#bg,.box").css("display", "none");
    });

</script>