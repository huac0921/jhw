<?php require(dirname(__FILE__).'/include/config.inc.php'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<!--banner js -->
<script src="templates/default/js/html5.js"></script>
<script type='text/javascript' src='templates/default/js/common.js'></script>
<script type='text/javascript' src='templates/default/js/slider.js'></script>
<script type="text/javascript" src="templates/default/js/jquery.touchSlider.js"></script>
<LINK rel="stylesheet" type="text/css" href="css/style.css">


    <script type="text/javascript" name="baidu-tc-cerfication" data-appid="7560568" src="http://apps.bdimg.com/cloudaapi/lightapp.js"></script>
  


<script type="text/javascript">
$(function(){
    $(".imgwrap li img").LoadImage({width:167,height:300});
	$(".newsfocus div img").LoadImage({width:60,height:60});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
		},function(){
		$("#btn_prev,#btn_next").fadeOut()
		})
	$dragBln = false;
	$(".main_image").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e) {
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	})
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	})
	$(".main_image a").click(function() {
		if($dragBln) {
			return false;
		}
	})
	timer = setInterval(function() { $("#btn_next").click();}, 5000);
	$(".main_visual").hover(function() {
		clearInterval(timer);
	}, function() {
		timer = setInterval(function() { $("#btn_next").click();}, 5000);
	})
	$(".main_image").bind("touchstart", function() {
		clearInterval(timer);
	}).bind("touchend", function() {
		timer = setInterval(function() { $("#btn_next").click();}, 5000);
	})
});
</script>

<!--banner js -->
</head>
<body class="index_body" >
<!-- header-->
<?php 
$cid = empty($cid) ? 13 : intval($cid);
require('header.php'); ?>
<!-- /header-->

<!-- banner-->

<div class="main_visual">
                <div class="flicking_con">
                	<div class="flicking_inner">
                    <a href="javascript:"></a>
					<a href="javascript:"></a>
					<a href="javascript:"></a>
					<a href="javascript:"></a>
					<a href="javascript:"></a>
                              	 </div>
            </div>
			<div class="main_image">
				<ul>	
					<?php
					$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
					while($row = $dosql->GetArray())
					{
						if($row['linkurl'] != '')$gourl = $row['linkurl'];
						else $gourl = 'javascript:;';
					?>
					<li><span style="background:url(<?php echo $row['picurl']; ?>) no-repeat center top"></span></li>
					<?php
					}
					?>					
				</ul>
				<a href="javascript:;" id="btn_prev"></a>
				<a href="javascript:;" id="btn_next"></a>			</div>
</div>

<!-- /banner-->

<div class="huodong ">
<DIV id="banners" class="ui-banner">
  <UL class="ui-banner-slides">
    <LI class="ui-banner-prev ui-banner-slides-prev"><A href="#"><IMG title="Feel like a princess with Royal Spa" alt="Feel like a princess with Royal Spa" 
src="images/RoyalSpaRoyalHair.jpg"></A></LI>
    <LI class="ui-banner-current ui-banner-slides-current"><A href="#"><IMG title="Motives is Changing the Face of UK Beauty" 
alt="Motives is Changing the Face of UK Beauty" 
src="images/MotivesSimple.jpg"></A></LI>
    <LI class="ui-banner-next ui-banner-slides-next"><A href="#"><IMG title="NEW! Radiation Protection at its Best" 
alt="NEW! Radiation Protection at its Best" 
src="images/StealthShield.jpg"></A></LI>
   
    <LI><A href="#"><IMG title="Unleash the Power of Isotonix Today" alt="Unleash the Power of Isotonix Today" 
src="images/IsotonixEducate.jpg"></A></LI>
    <LI><A href="#"><IMG title="NEW! Get Heart Smart With Essential Omega III" alt="NEW! Get Heart Smart With Essential Omega III" 
src="images/HeartHealthOmega.jpg"></A></LI>
    <LI><A href="#"><IMG title="Try Isotonix OPC-3 Today for Better Health" alt="Try Isotonix OPC-3 Today for Better Health" 
src="images/OPC3AllBetter.jpg"></A></LI>
    <LI><A href="#"><IMG title="WorldStores - Top Brands Delivered Next Day" alt="WorldStores - Top Brands Delivered Next Day" 
src="images/WorldStores.gif"></A></LI>
    <LI><A href="#"><IMG title="NEW! Get paid to shop with Cashback" alt="NEW! Get paid to shop with Cashback" 
src="images/Cashback.jpg"></A></LI>
    <LI><A href="#"><IMG title="NEW! Indulge in Luxury With Royal Spa" alt="NEW! Indulge in Luxury With Royal Spa" 
src="images/RoyalSpa.jpg"></A></LI>
    <LI><A href="#"><IMG title="Stay energised with Isotonix for the Queen's Jubilee" 
alt="Stay energised with Isotonix for the Queen's Jubilee" src="images/JubileeRoyalPartyAcai.jpg"></A></LI>
    <LI><A href="#"><IMG title="Get a Taste of Spring" alt="Get a Taste of Spring" 
src="images/UltimateAloeKwStb.jpg"></A></LI>
  </UL>
  <!--ui-banner-slides end-->
  <UL class="ui-banner-slogans">
    <LI style="margin-top: 0px;" >与皇家温泉公主的感觉</LI>
    <LI style="margin-top: 0px;" >动机的改变，面对英国美容</LI>
    <LI style="margin-top: 0px;" >新！在其最好的辐射防护</LI>
    <LI style="margin-top: 0px;">新！支持你的皮肤细胞水平上</LI>
    <LI style="margin-top: 0px;">今天释放等渗电力</LI>
    <LI style="margin-top: 0px;">新！让心智能必要的欧米茄三</LI>
    <LI style="margin-top: 0px;">尝试等渗OPC-3今天更健康</LI>
    <LI style="margin-top: 0px;">WorldStores - 顶级品牌提供翌日</LI>
    <LI style="margin-top: 0px;">新！得到报酬购物现金回赠</LI>
    <LI style="margin-top: 0px;">新！御温泉尽情享受豪华</LI>
    <LI style="margin-top: 0px;">保持精力充沛与等渗女王的银禧</LI>
    <LI style="margin-top: 0px;">得到了春天的味道</LI>
  </UL>
  <!--ui-banner-slogans end-->
  <A class="ui-banner-arrow ui-banner-arrow-prev png_bg" 
href="#"></A><A class="ui-banner-arrow ui-banner-arrow-next png_bg" 
href="#"></A>
  <DIV class="ui-banner-overlay png_bg"></DIV>
</DIV>
<SCRIPT src="js/jquery-ui-1.8.6.core.widget.js"></SCRIPT>
<SCRIPT src="js/jqueryui.bannerize.js"></SCRIPT>
<SCRIPT type="text/javascript">
$(document).ready(function(){
	$('#banners').bannerize({
		shuffle: 1,
		interval: "4"
	});
});
</SCRIPT>



</div>
<?php require('cq.php'); ?>

<!-- mainbody-->
<?php require('mainbody.php'); ?>
<!-- /mainbody-->


<?php require('footer.php'); ?>
<?php require('qq.php'); ?>
</body>
</html>