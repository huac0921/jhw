<?php require(dirname(__FILE__).'/include/config.inc.php'); 


//初始化未传递参数
$action  = isset($action) ? $action : '';
$keyword = isset($keyword) ? $keyword : '';



//删除单条记录
if($action == 'del')
{
	//栏目权限验证
	$r = $dosql->GetOne("SELECT `classid` FROM `#@__$tbname` WHERE `id`=$id");
	IsCategoryPriv($r['classid'],'del',1);

	$deltime = time();
	$dosql->ExecNoneQuery("UPDATE `#@__$tbname` SET delstate='true', deltime='$deltime' WHERE id=$id");
}


//删除选中记录
if($action == 'delall')
{
	if($ids != '')
	{
		//解析id,验证是否有删除权限
		$ids = explode(',',$ids);
		$idstr = '';
		foreach($ids as $id)
		{
			$r = $dosql->GetOne("SELECT `classid` FROM `#@__$tbname` WHERE `id`=$id");
			if(IsCategoryPriv($r['classid'],'del',1))
			{
				$idstr .= $id.',';
			}
		}
		$idstr .= trim($idstr,',');

		if($idstr != '')
		{
			$deltime = time();
			$dosql->ExecNoneQuery("UPDATE `#@__$tbname` SET delstate='true', deltime='$deltime' WHERE `id` IN ($idstr)");
		}
	}
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>快速购物通道</title>
<link href="admin/templates/style/admin.css" rel="stylesheet" type="text/css" />
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="admin/templates/js/listajax.js"></script>
<script type="text/javascript" src="admin/templates/js/loadimage.js"></script>
<script type="text/javascript" src="admin/templates/js/mgr.func.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript">
/* 加入购物车 */

/* 立即购买 */
function BuyNow()
{
	AddShoppingCart("buy");
}


/* 加入购物车 */
function AddShoppingCart(a)
{
	$.ajax({
		url  : 'shoppingcart.php?a=addshopingcart',
		type : 'post',
		
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
<?php require('headero.php'); ?>
<div class="mgr_header"> <span class="title">快速查询通道</span>

 <span class="s">
		<input name="keyword" id="keyword" type="text" title="输入商品名进行搜索" value="<?php echo $keyword; ?>" />
		</span> <span class="b"><a href="javascript:;" onclick="GetSearch();"><img src="admin/templates/images/search_btn.png" title="搜索" /></a></span>
</div>		
</div>
	<div class="block clearfix">	
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mgr_table" id="ajaxlist">
	<tr class="thead2" align="center">
		<td width="5%" height="25"><input type="checkbox" name="checkid" id="checkid" onclick="CheckAll(this.checked);"></td>
	
		<td width="10%">商品ID</td>
		<td width="10%">商品名称</td>
		<td width="10%">规格参数</td>
		<td width="15%">单价</td>
		<td width="12%">购买数量</td>
		<td width="10%">送积分</td>
		<td width="10%">小计</td>
		<td width="18%" class="noborder">操作</td>
	</tr>
	<?php

	//检查全局分页数
	if(empty($cfg_pagenum))  $cfg_pagenum = 20;


	
		//初始化参数
		$catgoryListPriv   = '';
		$catgoryUpdatePriv = array();
		$catgoryDelPriv    = array();

		

		$catgoryListPriv = trim($catgoryListPriv,',');



	//设置sql
	$sql = "SELECT * FROM `#@__goods` WHERE `delstate`=''";	

	if(!empty($catgoryListPriv)) $sql .= " AND classid IN ($catgoryListPriv)";
	if(!empty($cid))     $sql .= " AND (classid=$cid OR parentstr LIKE '%,$cid,%')";
	if(!empty($tid))     $sql .= " AND (typeid=$tid OR typepstr LIKE '%,$tid,%')";	
	if(!empty($flag))    $sql .= " AND $flagquery";
	if(!empty($keyword)) $sql .= " AND title LIKE '%$keyword%'";

	$dopage->GetPage($sql);
	while($row = $dosql->GetArray())
	{

		//获取商品名称
		$title = '<span style="color:'.$row['colorval'].';font-weight:'.$row['boldval'].'">'.$row['title'].'</span>';
		$title .= '<span class="titflag">';


		//获取商品品牌
		$r = $dosql->GetOne('SELECT `classname` FROM `#@__goodsbrand` WHERE `id`='.$row['brandid']);
		if(isset($r['classname']))
		{
			$title .= '['.$r['classname'].'] ';
		}


		//获取商品属性
		$flagarr = explode(',',$row['flag']);
		$flagnum = count($flagarr);
		for($i=0; $i<$flagnum; $i++)
		{
			$r = $dosql->GetOne("SELECT `flagname` FROM `#@__goodsflag` WHERE flag='".$flagarr[$i]."'");

			if(isset($r['flagname']))
			{
				$title .= $r['flagname'].' ';
			}
		}

		$title .= '</span>';


		//商品类型名称
		$r = $dosql->GetOne("SELECT `classname` FROM `#@__goodstype` WHERE `id`=".$row['typeid']);
		if(isset($r['classname']))
			$classname = $r['classname'].' ['.$row['classid'].']';
		else
			$classname = '<span class="red">分类已删 ['.$row['classid'].']</span>';


		//获取库存数量
		$housenum = $row['housenum'];
		if($row['housewarn'] == 'true')
		{
			if($housenum <= $row['warnnum'])
			{
				$housenum .= '<strong style="color:red;margin-left:6px;">库存不足</strong>';
			}
		}
         //获取返送积分数
		 $integral=$row['integral'];
          $salesprice=$row['salesprice'];
		

		
	?>
	<tr align="center" class="mgr_tr" onmouseover="this.className='mgr_tr_on'" onmouseout="this.className='mgr_tr'">
		<td height="70" align="center"><input type="checkbox" name="checkid[]" id="checkid[]" value="<?php echo $row['id']; ?>" /></td>
		
		<td><?php echo $row['goodsid']; ?></td>
		<td align="left"><span class="titles"><?php echo $title; ?></span></td>
		<td class="number"><?php echo GetDateTime($row['posttime']); ?></td>
		<td><?php echo $salesprice ?>  元</td>
		<form name="gform" id="gform" method="post">
		<td><input name="buynum" type="text" class="buynum" id="buynum" value="1" style="width:75px;" />
							&nbsp;&nbsp;件</td>
		<td><?php echo $integral; ?></td>
		<td></td>
		<td class="mgr_btn"><a href="javascript:;" id="buynow" onclick="BuyNow();" title="点击此按钮，到下一步确认购买信息。" style="float:left">立刻购买</a>      <a href="javascript:;" id="addcart" onclick="AddShoppingCart();" title="点击此按钮，将商品加入到购物车。">加入购物车</a></td>
			<input name="typeid" type="hidden" id="typeid" value="<?php echo $tid; ?>" />
	<input name="goodsid" type="hidden" id="goodsid" value="<?php echo $id; ?>" /></form>
	</tr>
	
						
	<?php
	}	
	?>
</table>
<?php
if($dosql->GetTotalRow() == 0)
{
	echo '<div class="mgr_nlist">暂时没有相关的记录</div>';
}
?>
<div class="mgr_divb">
	<div class="selall"><span>选择：</span> <a href="javascript:CheckAll(true);">全部</a> - <a href="javascript:CheckAll(false);">无</a> </div>
	<span class="mgr_btn"></span> </div>
<div class="page_area"> <?php echo $dopage->AjaxPage(); ?> </div>
