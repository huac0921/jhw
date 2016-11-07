<?php
require(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 0 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid,$id); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/cloudzoom.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">

/*数量加减 */
function doadd(op){
var n=$('#buynum').val();
if(op=='+'){
n++;
}else if(op=='-'){
n--;
}
$('#buynum').val(n);
}

/* 选项卡切换 */
function selectTag(showContent,selfObj){
	// 操作标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 操作内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
	
	
}
/* 属性选择 */
function SelAttr(attrobj,attrid,attrvalue)
{
	//取消已选中样式
	$("#attrdiv_"+attrid+" a").attr("class","");

	//选中样式
	$(attrobj).attr("class","selected");

	//选中复制
	$("#attrid_"+attrid).val(attrvalue);
	
}


/* 立即购买 */
function BuyNow()
{
	AddShoppingCart("buy");
}

<?php
$row = $dosql->Execute('SELECT * FROM `#@__goodsattr` WHERE `goodsid`='.$tid." AND `checkinfo`=true");
$ajaxstr = '';
if($dosql->GetTotalRow() > 0)
{
	while($row = $dosql->GetArray())
	{
		$ajaxstr .= ', \'attrid_'.$row['id'].'\':$("#attrid_'.$row['id'].'").val()';
	}
}
?>

/* 加入购物车 */
function AddShoppingCart(a)
{
	$.ajax({
		url  : 'shoppingcart.php?a=addshopingcart',
		type : 'post',
		data : {'typeid':$("#typeid").val(), 'goodsid':$("#goodsid").val(), 'buynum':$("#buynum").val() <?php echo $ajaxstr; ?>},
		dataType:'html',
		//beforeSend:function(){},
		success:function(data){
			if(a == "buy"){
				location.href = "shoppingcart.php?a=buynow";
			} else {
				alert("加入购物车成功！");
			}
		}
	});
}

</script>
</head>
<body >
<!-- header-->
<?php require('headero.php'); ?>
<!-- /header--> 


<!-- mainbody-->

		
		<script type="text/javascript">// 基于JQ的tab切换插件
// 创建一个闭包     
(function($) {     
  //插件主要内容     
  $.fn.tab = function(options) {     
    // 处理默认参数   
    var opts = $.extend({}, $.fn.tab.defaults, options);     
    return this.each(function() {  
		var $this=$(this),
		$tabNavObj=$(opts.tabNavObj,$this),
		$tabContentObj=$(opts.tabContentObj,$this),
		$tabNavBtns=$(opts.tabNavBtn,$tabNavObj),
		$tabContentBlocks=$(opts.tabContent,$tabContentObj);
		$tabNavBtns.bind(opts.eventType,function(){
			var $that=$(this),
			_index=$tabNavBtns.index($that);
			$that.addClass(opts.currentClass).siblings(opts.tabNavBtn).removeClass(opts.currentClass);
			$tabContentBlocks.eq(_index).show().siblings(opts.tabContent).hide();
		}).eq(0).trigger(opts.eventType);
    }); 
    // 保存JQ的连贯操作结束
  };
	//插件主要内容结束
    
  // 插件的defaults     
  $.fn.tab.defaults = {     
        tabNavObj:'.tabNav',
		tabNavBtn:'li',
		tabContentObj:'.tabContent',
		tabContent:'.list',
		currentClass:'current',
		eventType:'click'
  };     
// 闭包结束     
})(jQuery);  
    	$(function(){
				$(".tabWrap").tab();
				$(".imgAd").tab({tabNavObj:".navObj",tabContentObj:".scrollObj",tabContent:"dl",eventType:"mouseenter"});
		});
		
// 这里开始是鼠标移上去弹出图片效果
var old = new Array();
var buyercmt;
function show_goodspic(id,type)
{
  if(old[type]!=null)
  {
	  document.getElementById(type+"b"+old[type]).style.display='none';
	  document.getElementById(type+"s"+old[type]).style.display='block';
  }
      document.getElementById(type+"s"+id).style.display='none';
	  document.getElementById(type+"b"+id).style.display='block';
	  old[type] = id;
}
function stopError() {
            return true;
          }
          window.onerror = stopError;
function MakeFlashString(source,id,width,height,wmode, otherParam)
{	
	return "<embed src="+source+" quality=high wmode="+wmode+" type=\"application/x-shockwave-flash\" pluginspage=\"https://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash\" width="+width+" height="+height+"></embed>";
}
function MakeObjectString(classid, codebase, name, id, width,height, param)
{
	return "<object classid="+classid+" codebase="+codebase+" name="+name+" width="+width+" height="+height+" id="+id+"><param name=wmode value="+wmode+" />"+param+"</object>";
}
function chgActive(id)
{
	document.write(id.text);
}
// innerHTML Type
function SetInnerHTML(target, code)
{ 
	target.innerHTML = code; 
}
// Direct Write Type
function DocumentWrite(src)
{
	document.write(src);
}
</script>
 
    
   
<div class="blank"></div> 
<div class="block clearfix">
<div class="ur_here2" style="border:none; padding:0; height:18px; line-height:18px;"><span class="fr">您当前所在位置：<?php echo GetPosStr($cid); ?></span></div>
<div class="blank"></div> 
	<?php require('lefter.php'); ?>
	<div class="AreaR2">    
	<div class="box">
   <div class="box_1">



		
		
	
	<div class="TwoOfTwos"> 
		
		<!-- 详细区域开始 -->
		<div class="goodsConts">
			<?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			if(@$r)
			{
			//增加一次点击量
			$dosql->ExecNoneQuery("UPDATE `#@__goods` SET hits=hits+1 WHERE id=$id");
			$row = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE id=$id");
			?>
			<h1 class="title"><?php echo $row['title']; ?></h1>
			<div class="goodsarea"> 
				<!-- 组图区域开始-->
				<?php
				//判断显示缩略图或组图
				if(!empty($row['picarr']))
				{
					$picarr = explode(',',$row['picarr']);
				?>
				<div class="fl"> <a id="zoompic" class="cloud-zoom" href="<?php echo $picarr[0]; ?>" rel="adjustX:10, adjustY:0"> <img src="<?php echo $picarr[0]; ?>" /></a>
					<ul class="zoomlist">
						<?php
						for($i=0; $i<=5; $i++)
						{
							if(!empty($picarr[$i]))
							{
						?>
						<li><a rel="useZoom: 'zoompic', smallImage: '<?php echo $picarr[$i]; ?>' " class="cloud-zoom-gallery" href="<?php echo $picarr[$i]; ?>"> <img src="<?php echo $picarr[$i]; ?>" /></a></li>
						<?php
							}
						}
						?>
						<div class="cl"></div>
					</ul>
					<div class="cl"></div>
				</div>
				<?php
				}
				else if(!empty($row['picurl']))
				{
				?>
				<div class="fl"> <a id="zoompic" class="cloud-zoom" href="<?php echo $row['picurl']; ?>" rel="adjustX:10, adjustY:0"> <img src="<?php echo $row['picurl']; ?>" /></a>
					<ul class="zoomlist">
						<li><a rel="useZoom: 'zoompic', smallImage: '<?php echo $row['picurl']; ?>' " class="cloud-zoom-gallery" href="<?php echo $row['picurl']; ?>"> <img src="<?php echo $row['picurl']; ?>" /></a></li>
						<div class="cl"></div>
					</ul>
					<div class="cl"></div>
				</div>
				<?php
				}
				?>
				<!-- 组图区域结束 --> 
				<!-- 商品信息开始 -->
				<div class="fr">
					<ul class="tb-meta">
						<li> <span>型号</span><strong ><?php echo $row['goodsid']; ?></strong> </li>
						<li> <span>市场价</span><strong class="lt"><?php echo $row['marketprice']; ?></strong>元 </li>
						<li> <span>积分</span><strong class="price"><?php echo $row['salesprice']; ?></strong>分 </li>
						
						<li> <span>浏览数</span><?php echo $row['hits']; ?> 次</li>
						<li> <span>配　送</span><?php if($row['payfreight']==0){echo '买家承担运费';}else{echo '商家承担运费';} ?></li>
					</ul>
					<div class="tb-skin">
						<p class="tb-note-title"><span>请选择您要的商品信息</span><a href="shoppingcart.php" class="end">结算购物车</a></p>
						<form name="gform" id="gform" method="post">
							<dl class="tb-prop">
							<?php

							//将商品属性id与值组成数组
							$rowattr = String2Array($row['attrstr']);
							$row2 = $dosql->Execute('SELECT * FROM `#@__goodsattr` WHERE `goodsid`='.$row['typeid']." AND `checkinfo`=true");
							if($dosql->GetTotalRow() > 0)
							{
								$i = 0;
								while($row2 = $dosql->GetArray())
								{
							?>
								<dt><?php echo $row2['attrname']; ?>：</dt>
								<dd>
									<?php
								if(!empty($rowattr[$row2['id']]))
								{
									echo '<div id="attrdiv_'.$row2['id'].'">';
									$dfvalue = '';
									$rowattrs = explode('|',$rowattr[$row2['id']]);
									foreach($rowattrs as $k=>$v)
									{
										echo '<a href="javascript:;" onclick="SelAttr(this,'.$row2['id'].',\''.$v.'\');"';
										if($k == 0)
										{
											$dfvalue = $v;
											echo 'class="selected"';
										}
										echo '>'.$v.'</a>';
									}
									echo '<input type="hidden" name="attrid_'.$row2['id'].'" id="attrid_'.$row2['id'].'" value="'.$dfvalue.'" />';
									echo '</div>';
								}
								?>
								</dd>
								<?php
									$i++;
								}
							}
							?>
							</dl>
							<span>数量：</span><input type="button" onclick="doadd('+')" value="+" >
							<input name="buynum" type="text" class="buynum" id="buynum" value="1" />
							<input type="button" onclick="doadd('-')" value="-" >
							&nbsp;&nbsp;件
							<div class="tb-action"> <a href="javascript:;" id="buynow" onclick="BuyNow();" title="点击此按钮，到下一步确认购买信息。">立刻购买</a> <a href="javascript:;" id="addcart" onclick="AddShoppingCart();" title="点击此按钮，将商品加入到购物车。">加入购物车</a></div>
							<input name="typeid" type="hidden" id="typeid" value="<?php echo $tid; ?>" />
							<input name="goodsid" type="hidden" id="goodsid" value="<?php echo $id; ?>" />
						</form>
						<div class="cl"></div>
					</div>
				</div>
				<!-- 商品信息结束 -->
				<div class="cl"></div>
			</div>
			<!-- 内容区域开始 -->
			
				<UL id=tags>
					<LI class=selectTag><A onClick="selectTag('tagContent0',this)" 	href="javascript:void(0)">商品描述</A> </LI>
					<!--<LI><A onClick="selectTag('tagContent1',this)"  href="javascript:void(0)">规格参数</A> </LI>-->
					<LI><A onClick="selectTag('tagContent2',this)"   href="javascript:void(0)">商品评价</A> </LI>
					
				</UL>
				<DIV id=tagContent>
					<DIV class="tagContent selectTag" id=tagContent0>
						<?php
				if($row['content'] != '')
					echo GetContPage($row['content']);
				else
					echo '网站资料更新中...';
				?>
				<!-- 相关文章开始 -->
				<div class="preNext">
					<div class="line"><strong></strong></div>
					<ul class="text">
						<?php
	
						//获取上一篇信息
						$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
						if($r < 1)
						{
							echo '<li>上一篇：已经没有了</li>';
						}
						else
						{
							if($cfg_isreurl != 'Y')
								$gourl = 'goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'];
							else
								$gourl = 'goodsshow-'.$r['classid'].'-'.$r['typeid'].'-'.$r['id'].'-1.html';
		
							echo '<li>上一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
						}
						
						//获取下一篇信息
						$r = $dosql->GetOne("SELECT * FROM `#@__goods` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
						if($r < 1)
						{
							echo '<li>下一篇：已经没有了</li>';
						}
						else
						{
							if($cfg_isreurl != 'Y')
								$gourl = 'goodsshow.php?cid='.$r['classid'].'&tid='.$r['typeid'].'&id='.$r['id'];
							else
								$gourl = 'goodsshow-'.$r['classid'].'-'.$r['typeid'].'-'.$r['id'].'-1.html';
		
							echo '<li>下一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
						}
						?>
					</ul>
					<ul class="actBox">
						<li id="act-pus"><a href="javascript:;" onclick="<?php $c_uname = isset($_COOKIE['username']) ? AuthCode($_COOKIE['username']) : '';if($c_uname != ''){echo 'AddUserFavorite()';}else{echo 'AddFavorite();';} ?>">收藏</a></li>
						<li id="act-pnt"><a href="javascript:;" onclick="window.print();">打印</a></li>
					</ul>
				</div>
				<!-- 相关文章结束 --> 
					</DIV>
				<DIV class=tagContent id=tagContent1>
					<?php
				if($row['goodcs'] != '')
					echo GetContPage($row['goodcs']);
				else
					echo '规格参数正在更新...';
				?>
				<!-- 相关文章开始 -->
				<div class="preNext">
					<div class="line"><strong></strong></div>
					
					<ul class="actBox">
						<li id="act-pus"><a href="javascript:;" onclick="<?php $c_uname = isset($_COOKIE['username']) ? AuthCode($_COOKIE['username']) : '';if($c_uname != ''){echo 'AddUserFavorite()';}else{echo 'AddFavorite();';} ?>">收藏</a></li>
						<li id="act-pnt"><a href="javascript:;" onclick="window.print();">打印</a></li>
					</ul>
				</div>
				<!-- 相关文章结束 --> 
					
					</DIV>
					<DIV class=tagContent id=tagContent2>
					<!-- 评论区域开始 -->
				<?php
				if($cfg_comment == 'Y')
				{
					$dosql->Execute("SELECT * FROM `#@__usercomment` WHERE molds=4 AND aid=$id AND isshow=1 ORDER BY id DESC");
					if($dosql->GetTotalRow() > 0)
					{
						echo '<ul class="commlist">';
						while($row2 = $dosql->GetArray())
						{
							echo '<li><span class="uname">'.$row2['uname'].'</span><p>'.$row2['body'].'</p><span class="time">'.GetDateTime($row2['time']).'</span></li>';
						}
						echo '</ul>';
					}
					else
					{
						echo '该商品暂无评价！';
					}
					?>
				<div class="commnum"> <span> <i>
					<?php
						$r = $dosql->GetOne("SELECT COUNT(id) as n FROM `#@__usercomment` WHERE molds=4 AND aid=$id AND isshow=1 ORDER BY id DESC");
						echo $r['n'];
						?>
					</i> 条评论 </span> </div>
				<div class="commnet">
					<?php 
					if($cfg_member == 'Y')	{
						if(isset($_COOKIE['username'])){?>
						<form name="form" id="form" action="" method="post">
					<div class="msg">
						<textarea name="comment" id="comment">说点什么吧...</textarea>
					</div>
					<div class="toolbar">
						<div class="options"></div>
						<button class="button" type="button">发 布</button>
					</div>
					<input type="hidden" name="aid" id="aid" value="<?php echo $id; ?>" />
					<input type="hidden" name="molds" id="molds" value="4" />
					<?php } 
					else 
					{
					?>
					   <div style="float:right;padding-bottom:30px;"><a class="search_no" href="member.php?c=login"  target="_blank" >登录回复</a>  <a href="member.php?c=reg" class="search_no">没有账号？</a>
					<?php
					} 
					?>
					</form><?php } ?>
				</div>
				<!-- 评论区域结束 -->
				<?php
				}
				?>
			</div>
			<!-- 内容区域结束 -->
			<?php
			}
			?>
		</div>
		<!-- 详细区域结束 --> 
					
					</DIV>
				</DIV>
			</DIV>
						
			
			
			
			
	<div class="cl"></div>
	</div></div></div></div></div></div></div></div>
	
</div>
<!-- /mainbody--> 
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->
</body>
</html>