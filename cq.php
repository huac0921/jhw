<div class="block clearfix" style="overflow:hidden">
<div class="index_l"> 



<div id="fmoons" class="imgAd index_tab">
	<div class="tit2">
		<ul class="navObj menu">
			<li class="current"><a href="" target="_blank">热卖产品</a></li>
			<li class=""><a href="" target="_blank">新品上架</a></li>
			<li class=""><a href="" target="_blank">猜你喜欢</a></li>
			<li class=""><a href="" target="_blank">热推产品</a></li>
			
		
			
		
			
		</ul>
	</div>
	<div class="blank"></div>
	<div class="scrollObj">
		<dl style="display: list-item;">
		<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='h' ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='h' ORDER BY orderid DESC";
				$dopage->GetPage($sql,4);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
				
				
				</dl>
		<dl style="display: none;">
				<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='n' ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='n' ORDER BY orderid DESC";
				$dopage->GetPage($sql,4);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
	
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
				</dl>
		<dl style="display: none;">
				<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='t' ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='t' ORDER BY orderid DESC";
				$dopage->GetPage($sql,4);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" > 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
	
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
				</dl>
				<!--热推产品： flag='a'-->
				<dl style="display: none;">
				<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='a' ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE checkinfo=true and flag='a' ORDER BY orderid DESC";
				$dopage->GetPage($sql,4);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<div class="goodsItem_kuang" style="margin-left:0;"> 
					<div class="goodsItem" onmouseover="this.className=&#39;goodsItem goodsItem_on&#39;" onmouseout="this.className=&#39;goodsItem&#39;">
					
			
		<div class="fj">
		<a href="<?php echo $gourl; ?>" target="_blank" class="fj_a1"><span class="biao pngfix"></span><span>详情介绍</span></a>
			
		</div>
		<a href="<?php echo $gourl; ?>" target="_blank"><img data-original="<?php echo $row['picurl']?>" src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?> " class="goodsimg" style="display: inline;"></a><br>
		<p><a href="<?php echo $gourl; ?>" target="_blank" title="<?php echo $row['title']?> "><?php echo $row['title']?><span></span></a></p>
		
		<div class="clearfix">
			<font class="f1">  
						￥<strong style="font-size:16px;color:red;">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>						</font>
			<a target="_blank" href="<?php echo $gourl; ?>" class="pinlun">浏览(<?php echo $row['hits']; ?>)</a>
		</div>
		</div>
		</div>
				<?php 
				} 
				?>
				</dl>
				
	</div>
</div></div>
<div class="index_r"> 
<div style=" position:relative">
	
</div>
 <script type="text/javascript">
	(function($){
		$.fn.extend({
			Scroll:function(opt,callback){
					//参数初始化
					if(!opt) var opt={};
					var _btnUp = $("#"+ opt.up);//Shawphy:向上按钮
					var _btnDown = $("#"+ opt.down);//Shawphy:向下按钮
					var timerID;
					var _this=this.eq(0).find("ul:first");
					var     lineH=_this.find("li:first").height(), //获取行高
							line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,1), //每次滚动的行数，默认为一屏，即父容器高度
							speed=opt.speed?parseInt(opt.speed,10):1500; //卷动速度，数值越大，速度越慢（毫秒）
							timer=opt.timer //?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
					if(line==0) line=1;
					var upHeight=0-line*lineH;
					//滚动函数
					var scrollUp=function(){
							_btnUp.unbind("click",scrollUp); //Shawphy:取消向上按钮的函数绑定
							_this.animate({
									marginTop:upHeight
							},speed,function(){
									for(i=1;i<=line;i++){
											_this.find("li:first").appendTo(_this);
									}
									_this.css({marginTop:0});
									_btnUp.bind("click",scrollUp); //Shawphy:绑定向上按钮的点击事件
							});
	
					}
					//Shawphy:向下翻页函数
					var scrollDown=function(){
							_btnDown.unbind("click",scrollDown);
							for(i=1;i<=line;i++){
									_this.find("li:last").show().prependTo(_this);
							}
							_this.css({marginTop:upHeight});
							_this.animate({
									marginTop:0
							},speed,function(){
									_btnDown.bind("click",scrollDown);
							});
					}
				   //Shawphy:自动播放
					var autoPlay = function(){
							if(timer)timerID = window.setInterval(scrollUp,timer);
					};
					var autoStop = function(){
							if(timer)window.clearInterval(timerID);
					};
					 //鼠标事件绑定
					_this.hover(autoStop,autoPlay).mouseout();
					_btnUp.css("cursor","pointer").click( scrollUp ).hover(autoStop,autoPlay);//Shawphy:向上向下鼠标事件绑定
					_btnDown.css("cursor","pointer").click( scrollDown ).hover(autoStop,autoPlay);
	
			}      
		})
	})(jQuery);
	
	$(document).ready(function(){
		$("#s3").Scroll({line:1,speed:500,timer:3000,up:"btn1",down:"btn2"});
	});
	
	var counterValue = parseInt($('.bubble').html());
function removeAnimation(){
    setTimeout(function() {
        $('.bubble').removeClass('animating')
    }, 1000);
}
 
$('#decrement').on('click',function(){
    counterValue--;
    $('.bubble').html(counterValue).addClass('animating');
    removeAnimation();
})
 
$('#increment').on('click',function(){
    counterValue++;
    $('.bubble').html(counterValue).addClass('animating');
    removeAnimation();
})
	</script>
	
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
 
    
   
<div class="index_top box_1">

<div id="fmoons2" class="imgAd">
	<div class="tit1">
		<span>热门商品排行</span>
		<ul class="navObj">
			<li class=""><strong style="color:red;">Hot!</strong></li>
			
		</ul>
	</div>
	<div class="scrollObj">
		<dl style="display: none;">
						<?php
				
				if(!empty($cid))
					$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY hits DESC ";
				
				$dopage->GetPage($sql,9);
				while($row = $dosql->GetArray())
				{
					if($row['picurl'] != '') $picurl = $row['picurl'];
					else $picurl = 'templates/default/images/nofoundpic.gif';
					
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
		
		
						<ul class="clearfix ul_list" id="hot3s<?php echo $row['id']?>" onmouseover="show_goodspic(<?php echo $row['id']?>,&#39;hot3&#39;)" style="display: block;">
				<span><?php echo $row['id']?></span>
				<p class="name">
					<a href="<?php echo $gourl ?>" title="<?php echo $row['title']?>"><?php echo $row['title']?></a>
				</p>
				<div class="ren"><?php echo $row['hits']?>人</div>
			</ul>
			<ul class="clearfix ul_box" id="hot3b<?php echo $row['id']?>" style="display: none;">
				<span><?php echo $row['id']?></span> 
				<li class="img">
					<a href="<?php echo $gourl ?>"><img src="<?php echo $row['picurl']?>" alt="<?php echo $row['title']?>"></a>
				</li>
				<li>
					<a href="<?php echo $gourl ?> title="<?php echo $row['title']?>"><?php echo $row['title']?></a><br>
					<font class="f1">
										￥<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>元<?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?> 
						</strong>									</font>
					<div class="ren"><?php echo $row['hits']?>人</div>
				</li>
			</ul>
			<?php
				} 
			?>
						
						<script type="text/javascript"> window.onload = show_goodspic(3,'hot3');</script>
		</dl>
		
	</div>
</div>
</div>
 </div>
<div class="blank"></div>


