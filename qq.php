
<head>


<script src="js/jquery.min.js"></script>
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}

/* rightsead */
#rightsead{width:130px;height:350px;position:fixed; top:50%; margin-top:-175px;right:0px;}
*html #rightsead{margin-top:258px;position:absolute;top:expression(eval(document.documentElement.scrollTop));}
#rightsead li{width:131px;height:60px;}
#rightsead li img{float:right;}
#rightsead li a{height:49px;float:right;display:block;min-width:47px;max-width:131px;}
#rightsead li a .shows{display:block;}
#rightsead li a .hides{margin-right:-143px;cursor:pointer;cursor:hand;}
#rightsead li a.youhui .hides{display:none;position:absolute;right:188px;top:2px;}
</style>

</head>

<body>

<!-- 代码部分begin -->
<div id="rightsead">
	<ul>
		<li><a href=message.php><img src="images/ll01.png" width="131" height="49" class="hides"/><img src="images/l01.png" width="47" height="49" class="shows" /></a></li>
		<li><a href="#"><img src="images/ll03.png" width="131" height="49"  class="hides"/><img src="images/l03.png" width="47" height="49" class="shows" /></a></li>
        <li><a href="#">
        <img src="images/l02.png" width="131" height="49" class="hides" /><img src="images/l02.png" width="47" height="49" class="shows" />
        </a></li>
		<li><a href="http://wpa.qq.com/msgrd?V=1&Uin=00000Site=By%20ccbbs&Menu=yes"><img src="images/ll04.png" width="131" height="49" class="hides"/><img src="images/l04.png" width="47" height="49" class="shows" /></a></li>

	</ul>
</div>
<!-- 代码部分end -->

<script>
$(function(){
	$("#rightsead a").hover(function(){
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").show();
		}else{
			$(this).children("img.hides").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({marginRight:'0px'},'slow');
		}
	},function(){
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").hide('slow');
		}else{
			$(this).children("img.hides").animate({marginRight:'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});

});
</script>
</body>
</html>