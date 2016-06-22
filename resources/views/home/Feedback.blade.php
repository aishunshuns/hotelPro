<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>帮助咨询</title>
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
<div class="title" id="titleString"></div>
<a href="javascript:history.go(-1);" class="back">
            <span class="header-icon header-icon-return"></span>
            <span class="header-name">返回</span>
        </a>
 </div>

        
 <div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE4NzEzNzgyMjkPZBYCZg9kFgICAQ9kFgICAQ9kFgRmDxYCHgtfIUl0ZW1Db3VudAIFFgpmD2QWAmYPFQYSL2ltYWdlcy91c2VyMDEucG5nB+adjirmuIVz6L+Z5qyh5Y676L+Z5Liq5oi/6Ze05pyJ54K554Of5ZGz77yM5L2P5LqG6L+Z5LmI5aSa5qyh5Y+q5pyJ6L+Z5Liq5pyJ54Of5ZGzfumZpOS6hueDn+WRs+mDveaYr+S4gOWmguaXouW+gOeahOWlve+8gQoyMDE0LTA0LTExBG5vbmUAZAIBD2QWAmYPFQYSL2ltYWdlcy91c2VyMDIucG5nB+mfqSroirME5aW9fgoyMDE0LTA0LTEwBG5vbmUAZAICD2QWAmYPFQYSL2ltYWdlcy91c2VyMDIucG5nB+mfqSroirMW5LiA5aaC5pei5b6A55qE5LiN6ZSZfgoyMDE0LTA0LTEwBG5vbmUAZAIDD2QWAmYPFQYXL3Bob3Rvcy8yMDEzMDYvNjQyNi5qcGcH6ZmIKuiTicUB5q+U5pio5aSp5L2P55qE566A55u05aW95aSq5aSa5LqG44CC5ZSv5LiA5LiA54K55LiN5aW95bCx5piv5rSX5a6M5r6h5LmL5ZCO6YKj5Lqb56ev5rC05LuA5LmI55qE6YO95riX5ryP5Yiw5oi/6Ze06YeM5p2l5LqG77yM5om+5YmN5Y+w5p2l5biu5b+Z5riF55CG77yM5riF55CG5LqGMTDliIbpkp/jgILjgILjgILnnJ/mgZDmgJbjgILjgILjgIIKMjAxNC0wNC0xMARub25lAGQCBA9kFgJmDxUGFy9waG90b3MvMjAxMzA2LzY0MjYuanBnB+mZiCrok4nSAuaIv+mXtOepuuiwg+aYr+Wdj+S6hui/mOaYr+iAgeWMluS6hjE25bqm55qE5rip5bqm5ZKMMjbluqbkvLznmoTvvIzlnZDljpXkuZ/mmK/lnY/nmoTvvIzogIHmmK/lhrLkuI3kuIvljrvjgILphZLlupfnmoTov4fpgZPlnLDmr6/lj6/og73lupTor6XmuIXmtJfkuobvvIzotbDov4fljrvkuIDpmLXpmLXoh63lkbPjgILlip7nkIblhaXkvY/nmoTml7blgJnliY3lj7DkuZ/msqHor7TpmIHmpbzopoHliqAxMOWdl+eUteiEkei0ueWViuS7peWJjemDveS4jeeUqOeahO+8jOmAgOaIv+eahOaXtuWAmeWPiOWKoOaUtuS6hjEw5Z2X6ZKx44CC5oC75LmL5rKh5pyJ5Lul5YmN5L2P55qE6IiS5Z2m44CCCjIwMTQtMDQtMTAEbm9uZQBkAgEPDxYEHhBDdXJyZW50UGFnZUluZGV4AgEeC1JlY29yZGNvdW50ArAJZGRkZD6s7lxwIjucCEN24we/4UN2rGA=" />
</div>

<div class="container">
<ul class="unstyled hotel-bar">
  <li class="first">
    <a href="Help" >关于我们</a>
  </li>
  <li><a href="helpContact">加入我们</a></li>
  <li><a href="helpCenter" >帮助中心</a></li>
  <li><a href="helpFeedback" class="active">留言反馈</a></li>
</ul>
<script type="text/javascript">
    $('#titleString').text($(document)[0].title);
</script>

<div class="hotel-comment-list">
  <div class="container width80 pt20">
<form name="aspnetForm" method="post" action="feedbackAdd" id="aspnetForm" class="form-horizontal">
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

  <div class="control-group">
      <input name="p_problem" type="text" id="ctl00_ContentPlaceHolder1_txtUserName" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请提出酒店存在的问题" />
  </div>
  <div class="control-group">
      <input name="p_proposal" type="text" id="ctl00_ContentPlaceHolder1_txtPassword" class="width100 input" style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请提出您宝贵的建议" />
  </div>

     <div class="control-group">
       <span class="red"></span>
   </div>
  <div class="control-group">
         <button onClick="__doPostBack('ctl00$ContentPlaceHolder1$btnOK','')" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">立即提交</button>
  </div>


</form>
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
