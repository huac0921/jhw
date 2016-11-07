<?php
require(dirname(__FILE__).'/include/config.inc.php');
//初始化未传递参数
$action  = isset($action) ? $action : '';
$keyword = isset($keyword) ? $keyword : '';
$styleal = '';
$stylec1 = '';
$stylec0 = '';
$styleah = '';+



$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY orderid DESC";
//删除单条记录
if($action == 'del')
{
	//栏目权限验证
	$r = $dosql->GetOne("SELECT `classid` FROM `#@__$tbname` WHERE `id`=$id");
	IsCategoryPriv($r['classid'],'del',1);

	$deltime = time();
	$dosql->ExecNoneQuery("UPDATE `#@__$tbname` SET delstate='true', deltime='$deltime' WHERE id=$id");
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="admin/templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript" src="templates/default/js/payfor.js"></script>
<script type="text/javascript" src="admin/templates/js/listajax.js"></script>
<script type="text/javascript"  src="js/order.js"></script>
</head>

<style type="text/css">
							
							 .add_chose a{float:left;margin:5px 0 0 0;display:block;width:15px;height:15px;line-height:99em;overflow:hidden;background:url(templates/default/images/reduce-add.gif) no-repeat;}
							 .add_chose a.reduce{background-position:0 0;}
							 .add_chose a.reduce:hover{background-position:0 -16px;}
							 .add_chose a.add{background-position:-16px 0;}
							 .add_chose a.add:hover{background-position: -16px;}
							 .text1{float:left;margin:0 5px;display:inline;border:solid 1px #ccc;padding:4px 3px 4px 8px;width:40px;line-height:18px;font-size:14px;color:#990000;font-weight:800;}
							
							</style>
<body>
<!-- header-->
<?php require('headero.php'); ?>
<form name="form" id="form" method="post" action="">
<div id="search" > <span class="s">
		<input name="keyword" id="keyword" type="text" title="输入商品名进行搜索" value="<?php echo $keyword; ?>" />
		</span> <span class="b"><a href="javascript:;" onclick="GetSearch();"><button type="submit" id="search_btn" class="sub"><span>搜索</span></button></a></span></div>
</div>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="shoppingcart">
		<tr class="thead">		
			<td width="15%" height="30" style="text-align:center;">&nbsp;&nbsp;&nbsp;商品货号</td>
			<td width="15%">商品名称</td>
			<td width="10%">包装规格</td>
			<td width="10%">单价/元</td>
			<td width="15%">起售量</td>
			<td width="15%">送积分</td>
			<td width="15%">小计</td>
			<td width="5%">操作</td>
		</tr>
		<tr>
			<td height="0" colspan="8"></td>
			
		</tr>
		<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,100);
				while($row = $dosql->GetArray())
				{
				
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
		
		<tr >
			<td height="50" style="text-align:center;" >
			
			<?php echo $row['goodsid']; ?>
			</td>
			<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['housenum']; ?></td>
					<td class="price-per-pallet">$<span><?php echo $row['salesprice']; ?></span></td>
						<td class="num-pallets"><input type="text" class="num-pallets-input"  style="width:75px;"></input></td>
							<td><?php echo $row['integral']; ?></td>
								<td class="row-total">
			<input type="text" class="row-total-input" id="turface-pro-league-row-total" disabled="disabled" style="width:75px;"></input>
		</td>
		
			<td><a href="shoppingcart.php?a=delrow&key=<?php echo $k; ?>">取消</a></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td height="60" colspan="4" align="right" valign="bottom"><strong class="total">总计：</strong><span class="totalprice"><input type="text" class="total-box" id="product-subtotal" disabled="disabled"></input></input></span><a href="order.php" class="next">下一步</a></td>
		</tr>
	</table>

				<?php
				
				if(!empty($tid))
					$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY orderid DESC";
				else
					$sql = "SELECT * FROM `#@__goods` WHERE delstate='' AND checkinfo=true ORDER BY orderid DESC";
				$dopage->GetPage($sql,100);
				while($row = $dosql->GetArray())
				{
				
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'goodsshow.php?cid='.$row['classid'].'&tid='.$row['typeid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'goodsshow-'.$row['classid'].'-'.$row['typeid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
				?>
				<li> 
					<div class="info"><a href="<?php echo $gourl; ?>"><?php echo ReStrLen($row['title'],20); ?></a>
						<p><span class="fl">价格 <i class="lt"><?php echo $row['marketprice']; ?></i><i><?php echo $row['salesprice']; ?></i></span><span class="fr">浏览<i class="hits"><?php echo $row['hits']; ?></i></span></p>
					</div>
				</li>
				<?php
				}
				?>
			</ul>

			<?php echo $dopage->GetList(); ?>
