<?php
require(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 12 : intval($cid);
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
<div class="subBody">
	<div class="subTitle"> <span class="catname"><?php echo GetCatName($cid); ?></span> <a href="javascript:history.go(-1);" class="goback">&gt;&gt; 返回</a> <span class="fr">您当前所在位置：<?php echo GetPosStr($cid,$id); ?></span>
		<div class="cl"></div>
	</div>
	
		
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
 
    
   
 





	<div class="block clearfix">	
		
	
	<div class="TwoOfTwos"> 
		<div class="blank"></div>
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
					
				</div>
				<?php
				}
				else if(!empty($row['picurl']))
				{
				?>
				<div class="fl" > <a id="zoompic" class="cloud-zoom" href="<?php echo $row['picurl']; ?>" rel="adjustX:10, adjustY:0"> <img src="<?php echo $row['picurl']; ?>" /></a>
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
				<div class="fr" >
				<script type="text/javascript">

/** jQuery Calculation Plug-in**/
(function($) {
    var defaults = {reNumbers: /(-|-\$)?(\d+(,\d{3})*(\.\d{1,})?|\.\d{1,})/g, cleanseNumber: function (v) {
        return v.replace(/[^0-9.\-]/g, "");
    }, useFieldPlugin: (!!$.fn.getValue), onParseError: null, onParseClear: null};
    $.Calculation = {version: "0.4.07",setDefaults: function(options) {
        $.extend(defaults, options);
    }};
    $.fn.parseNumber = function(options) {
        var aValues = [];
        options = $.extend(options, defaults);
        this.each(function () {
            var $el = $(this),sMethod = ($el.is(":input") ? (defaults.useFieldPlugin ? "getValue" : "val") : "text"),v = $.trim($el[sMethod]()).match(defaults.reNumbers, "");
            if (v == null) {
                v = 0;
                if (jQuery.isFunction(options.onParseError)) options.onParseError.apply($el, [sMethod]);
                $.data($el[0], "calcParseError", true);
            } else {
                v = options.cleanseNumber.apply(this, [v[0]]);
                if ($.data($el[0], "calcParseError") && jQuery.isFunction(options.onParseClear)) {
                    options.onParseClear.apply($el, [sMethod]);
                    $.data($el[0], "calcParseError", false);
                }
            }
            aValues.push(parseFloat(v, 10));
        });
        return aValues;
    };
    $.fn.calc = function(expr, vars, cbFormat, cbDone) {
        var $this = this, exprValue = "", precision = 0, $el, parsedVars = {}, tmp, sMethod, _, bIsError = false;
        for (var k in vars) {
            expr = expr.replace((new RegExp("(" + k + ")", "g")), "_.$1");
            if (!!vars[k] && !!vars[k].jquery) {
                parsedVars[k] = vars[k].parseNumber();
            } else {
                parsedVars[k] = vars[k];
            }
        }
        this.each(function (i, el) {
            var p, len;
            $el = $(this);
            sMethod = ($el.is(":input") ? (defaults.useFieldPlugin ? "setValue" : "val") : "text");
            _ = {};
            for (var k in parsedVars) {
                if (typeof parsedVars[k] == "number") {
                    _[k] = parsedVars[k];
                } else if (typeof parsedVars[k] == "string") {
                    _[k] = parseFloat(parsedVars[k], 10);
                } else if (!!parsedVars[k] && (parsedVars[k] instanceof Array)) {
                    tmp = (parsedVars[k].length == $this.length) ? i : 0;
                    _[k] = parsedVars[k][tmp];
                }
                if (isNaN(_[k])) _[k] = 0;
                p = _[k].toString().match(/\.\d+$/gi);
                len = (p) ? p[0].length - 1 : 0;
                if (len > precision) precision = len;
            }
            try {
                exprValue = eval(expr);
                if (precision) exprValue = Number(exprValue.toFixed(Math.max(precision, 4)));
                if (jQuery.isFunction(cbFormat)) {
                    var tmp = cbFormat.apply(this, [exprValue]);
                    if (!!tmp) exprValue = tmp;
                }
            } catch(e) {
                exprValue = e;
                bIsError = true;
            }
            $el[sMethod](exprValue.toString());
        });
        if (jQuery.isFunction(cbDone)) cbDone.apply(this, [this]);
        return this;
    };
    $.each(["sum", "avg", "min", "max"], function (i, method) {
        $.fn[method] = function (bind, selector) {
            if (arguments.length == 0)return math[method](this.parseNumber());
            var bSelOpt = selector && (selector.constructor == Object) && !(selector instanceof jQuery);
            var opt = bind && bind.constructor == Object ? bind : {bind: bind || "keyup", selector: (!bSelOpt) ? selector : null, oncalc: null};
            if (bSelOpt) opt = jQuery.extend(opt, selector);
            if (!!opt.selector) opt.selector = $(opt.selector);
            var self = this, sMethod, doCalc = function () {
                var value = math[method](self.parseNumber(opt));
                if (!!opt.selector) {
                    sMethod = (opt.selector.is(":input") ? (defaults.useFieldPlugin ? "setValue" : "val") : "text");
                    opt.selector[sMethod](value.toString());
                }
                if (jQuery.isFunction(opt.oncalc)) opt.oncalc.apply(self, [value, opt]);
            };
            doCalc();
            return self.bind(opt.bind, doCalc);
        }
    });
    var math = {sum: function (a) {
        var total = 0, precision = 0;
        $.each(a, function (i, v) {
            var p = v.toString().match(/\.\d+$/gi), len = (p) ? p[0].length - 1 : 0;
            if (len > precision) precision = len;
            total += v;
        });
        if (precision) total = Number(total.toFixed(precision));
        return total;
    },avg: function (a) {
        return math.sum(a) / a.length;
    },min: function (a) {
        return Math.min.apply(Math, a);
    },max: function (a) {
        return Math.max.apply(Math, a);
    }};
})(jQuery);
/** ------------- choose -------------------- **/
/* reduce_add */
var setAmount = {
    min:<?php echo $row['saleminnum']; ?>,
    max:999,
    reg:function(x) {
        return new RegExp("^[1-9]\\d*$").test(x);
    },
    amount:function(obj, mode) {
        var x = $(obj).val();
        if (this.reg(x)) {
            if (mode) {
                x++;
            } else {
                x--;
            }
        } else {
            alert("请输入正确的数量！");
            $(obj).val(<?php echo $row['saleminnum']; ?>);
            $(obj).focus();
        }
        return x;
    },
    reduce:function(obj) {
        var x = this.amount(obj, false);
        if (x >= this.min) {
            $(obj).val(x);
            recalc();
        } else {
            alert("商品数量最少为" + this.min);
            $(obj).val(<?php echo $row['saleminnum']; ?>);
            $(obj).focus();
        }
    },
    add:function(obj) {
        var x = this.amount(obj, true);
        if (x <= this.max) {
            $(obj).val(x);
            recalc();
        } else {
            alert("商品数量最多为" + this.max);
            $(obj).val(999);
            $(obj).focus();
        }
    },
    modify:function(obj) {
        var x = $(obj).val();
        if (x < this.min || x > this.max || !this.reg(x)) {
            alert("请输入正确的数量！");
            $(obj).val(<?php echo $row['saleminnum']; ?>);
            $(obj).focus();
        }
    }
}

function BuyUrl(wid) {
    var pcounts = $("input[id^=buynum]").val();
    var patrn = /^[0-9]{1,4}$/;
    if (!patrn.exec(pcounts)) {
        pcounts = 1;
    }
    else {
        if (pcounts <= 0)
            pcounts = 1;
        if (pcounts >= 1000)
            pcounts = 999;
    }
}
;

/** total_item **/
$(document).ready(function () {
    $("input[name^=buynum]").bind("keyup", recalc);
    recalc();
});

function recalc() {

    $("input[id^=total_item]").val()

    //产品价格统计
    $("[id^=total_item]").calc(

        "buynum * price",

        {
            buynum: $("input[name^=buynum]"),
            price: $("[id^=price_item_]")
        },

        function (s) {

            return "￥" + s.toFixed(2);
        },

        function ($this) {

            var sum = $this.sum();
            $("[id^=total_item]").text(
                "￥" + sum.toFixed(2)
            );
            $("#total_price").val($("[id^=total_item]").text());
        }
    );

    //产品积分统计
    $("[id^=total_points]").calc(

        "buynum * price",

        {
            qty: $("input[name^=buynum]"),
            price: $("[id^=price_item_]")
        },

        function (s) {
            return "" + s.toFixed(0);
        }

    );

};
</script>
				<h1 class="title"><?php echo $row['title']; ?></h1>
					<ul class="tb-meta">
						<li> <span>货号</span><strong ><?php echo $row['goodsid']; ?></strong> </li>
						<li> <span>市场价</span><strong class="lt"><?php echo $row['marketprice']; ?></strong>元 </li>
						<li> <span>促销价</span><strong class="price">
						<?php $row['salesprice'] = isset($_COOKIE['username']) ? $row['salesprice'] : '';if($row['salesprice'] != ''){?><strong><?php echo $row['salesprice']; ?></strong>
                        <?php }else{ ?> <a href="member.php?c=login">查看价格</a> <?php } ?>
						</strong>元 </li>
                        <li><span>规格</span><?php echo $row['unit'];?></li>
						<li> <span>浏览数</span><?php echo $row['hits']; ?> 次</li>
						<li> <span>库存</span><?php echo $row['housenum']; ?> 件</li>
						<li> <span>配　送</span><?php if($row['payfreight']==0){echo '买家承担运费';}else{echo '商家承担运费';} ?></li>
						<li> <span>起售量</span><strong class="bl"><?php echo $row['saleminnum']; ?></strong> 箱</li>
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
							
							<span>&nbsp;&nbsp;&nbsp;&nbsp;箱</span>
							<style type="text/css">
							
							 .add_chose a{float:left;margin:5px 0 0 0;display:block;width:15px;height:15px;line-height:99em;overflow:hidden;background:url(templates/default/images/reduce-add.gif) no-repeat;}
							 .add_chose a.reduce{background-position:0 0;}
							 .add_chose a.reduce:hover{background-position:0 -16px;}
							 .add_chose a.add{background-position:-16px 0;}
							 .add_chose a.add:hover{background-position: -16px;}
							 .text1{float:left;margin:0 5px;display:inline;border:solid 1px #ccc;padding:4px 3px 4px 8px;width:40px;line-height:18px;font-size:14px;color:#990000;font-weight:800;}
							
							</style>
							<div class="f_l  add_chose">
							
			<a class="reduce"  onClick="setAmount.reduce('#buynum')" href="javascript:void(0)">
			-</a>
			<input type="text" name="buynum" value="<?php echo $row['saleminnum']; ?>" id="buynum" onKeyUp="setAmount.modify('#buynum')" class="text1" />
			<a class="add" onClick="setAmount.add('#buynum')" href="javascript:void(0)">
			+</a>
			
		</div>

                            <div class="tb-action"> <a href="javascript:;" id="buynow" onclick="BuyNow();" title="点击此按钮，到下一步确认购买信息。">


                                    立刻购买</a> <a href="javascript:;" id="addcart" onclick="AddShoppingCart();" title="点击此按钮，将商品加入到购物车。">加入购物车</a></div>
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
			<div class="blank"></div>
				<UL id=tags>
					<LI class=selectTag><A onClick="selectTag('tagContent0',this)" 	href="javascript:void(0)">商品描述</A> </LI>
					<!--<LI><A onClick="selectTag('tagContent1',this)"  href="javascript:void(0)">规格参数</A> </LI>-->
					<LI><A onClick="selectTag('tagContent2',this)"   href="javascript:void(0)">宝贝评价</A> </LI>
					
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
			
					
					       <input type="hidden" name="aid" id="aid" value="<?php echo $id; ?>" />
					<input type="hidden" name="molds" id="molds" value="4" />
				</div>
				<!-- 相关文章结束 --> 
			</div>
			
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
						echo '该宝贝暂无评价！';
					}
					?>
				<div class="commnum"> <span> <i>
					<?php
						$r = $dosql->GetOne("SELECT COUNT(id) as n FROM `#@__usercomment` WHERE molds=4 AND aid=$id AND isshow=1 ORDER BY id DESC");
						echo $r['n'];
						?>
					</i> 条评论 </span> </div>
				<div class="commnet">
					<form name="form" id="form" action="" method="post">
						<div class="msg">
							<textarea name="comment" id="comment">说点什么吧...</textarea>
						</div>
						<div class="toolbar">
							<div class="options"> 不想登录？直接点击发布即可作为游客留言。 </div>
							<button class="button" type="button">发 布</button>
						</div>
					</form>
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
	
	
</div>
<!-- /mainbody--> 
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->
</body>
</html>
