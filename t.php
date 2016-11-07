<?php
require(dirname(__FILE__).'/include/config.inc.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
</head>
<style>
body{margin:0;padding:0 0 12px 0;font-size:12px;line-height:22px;font-family:"\5b8b\4f53","Arial Narrow";background:#fff;} form,ul,li,p,h1,h2,h3,h4,h5,h6{margin:0;padding:0;} input,select{font-size:12px;line-height:16px;} img{border:0;} ul,li{list-style-type:none;} a {color:#00007F;text-decoration:none;} a:hover {color:#bd0a01;text-decoration:underline;}   .box { width: 150px; margin: 0 auto; } .menu{ overflow:hidden; border-color: #C4D5DF; border-style: solid; border-width: 0 1px 1px; } /* lv1 */.menu li.level1 a{ display: block; height: 28px; line-height: 28px; background:#EBF3F8; font-weight:700; color: #5893B7; text-indent: 14px; border-top: 1px solid #C4D5DF; } .menu li.level1 a:hover{text-decoration:none;} .menu li.level1 a.current{background:#B1D7EF;} /* lv2 */.menu li ul{overflow:hidden;} .menu li ul.level2{display:none;} .menu li ul.level2 li a{ display: block; height: 28px; line-height: 28px; background:#ffffff; font-weight:400; color: #42556B; text-indent: 18px; border-top: 0px solid #ffffff; overflow: hidden; } .menu li ul.level2 li a:hover{ color:#f60; } 


</style>
<script type="text/javascript">
$(document).ready(function(){
$(".level1>a").click(function(){
$(this).addClass("current")
.next().show()
.parent().siblings().children("a").removeClass("current")

.next().hide();
return false;$("li").show().unblind("click");
$(this).removeClass("mouseout")
.addClass("mouseover")
.stop()
.fadeTo("fast",0.6)
.fadeTo("fast",1)
.unbind("click")
.click(function(){});
$(this).addClass("highlight")
.children("li").show.end()
.siblings().remonveClass("highlight")
.children("li").hide();
return false;
});
});
</script>
<div class="box">
<ul class="menu">
<li class="level1">
<a href="#">衬衫</a>
<ul class="level2">
<li><a href="#">短袖衬衫</a></li>
<li><a href="#">长袖衬衫</a></li>
<li><a href="#">短袖T</a></li>
<li><a href="#">长袖T</a></li>
</ul></li>
<li class="level1">
<a href="#">卫衣</a>
<ul class="level2">
<li><a href="#">开襟唯一</a></li>
<li><a href="#">套都</a></li>
<li><a href="#">运动</a></li>
<li><a href="#">通知</a></li>
</ul></li>
<li class="level1">
<a href="#">裤子</a>
<ul class="level2">
<li><a href="#">短裤</a></li>
<li><a href="#">长裤</a></li>
<li><a href="#">妞子</a></li>
<li><a href="#">姑娘</a></li>
</ul></li>
</ul></div>
<input type="checkbox" id="cr"/><label for="cr">I Accept!</label>
<script type="text/javascript">
$(document).ready(function(){
var $cr=$("#cr");
$cr.click(function(){
 if($cr.is(":checked")){
 alert("thanks!")
 }
})
})
$(".demo").click(function(){
alert("!!!");
})
</script>
<p class="demo">Jquery demo</p>
<script type="text/javascript">
$(".demo").click(function(){
alert("!!!");
})
</script>
<p>ceshi</p>
<script type="text/javascript">
var items=document.getElementsByTagName("p");
for(var i=0;i<items.length;i++){
items[i].onclick =function(){}}
</script>
   <style type="text/css">
        body {margin: 20px;}
        .spinnerExample {margin:10px 0;}
    </style>
<div class="search">
		<form name="search" id="search" method="get" action="goods.php">
			<input type="text" name="keyword" id="keyword" title="输入产品名进行搜索" value="" class="key" />
			<button type="submit" id="search_btn" class="sub"><span>搜索</span></button>
		</form>
	</div>