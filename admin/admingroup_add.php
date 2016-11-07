<?php require(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('admingroup'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理组</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/checkf.func.js"></script>
<script type="text/javascript" src="templates/js/mgr.func.js"></script>
</head>
<body>
<div class="gray_header"> <span class="title">添加管理组</span> <span class="reload"><a href="javascript:location.reload();">刷新</a></span> </div>
<form name="form" id="form" method="post" action="admingroup_save.php" onsubmit="return cfm_admingroup();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form_table">
		<tr>
			<td width="25%" height="35" align="right">管理组名称：</td>
			<td width="75%"><input type="text" name="groupname" class="class_input" id="groupname" />
				<span class="maroon">*</span><span class="cnote">带<span class="maroon">*</span>号表示为必填项</span></td>
		</tr>
		<tr>
			<td height="116" align="right">管理组描述：</td>
			<td><textarea name="description" id="description" class="class_areatext"></textarea></td>
		</tr>
		<tr>
			<td height="35" align="right">管理组状态：</td>
			<td><input type="radio" name="checkinfo" value="true" checked="checked" />
				启用&nbsp;
				<input type="radio" name="checkinfo" value="false" />
				未启用</td>
		</tr>
		<tr>
			<td height="35" align="right">模块权限：</td>
			<td><div class="agtitle"><strong>网站系统管理</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="admin" />
					管理员管理</span> <span>
					<input type="checkbox" name="model[]" value="site" />
					站点配置管理</span> <span>
					<input type="checkbox" name="model[]" value="web_config" />
					网站信息配置</span> <span>
					<input type="checkbox" name="model[]" value="upload_filemgr_sql" />
					上传文件管理</span> <span>
					<input type="checkbox" name="model[]" value="database" />
					数据库管理</span></div>
				<div class="agtitle"><strong>栏目内容管理</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="infoclass" />
					栏目管理</span> <span>
					<input type="checkbox" name="model[]" value="maintype" />
					二级类别管理</span> <span>
					<input type="checkbox" name="model[]" value="info" />
					单页信息管理</span> <span>
					<input type="checkbox" name="model[]" value="infolist" />
					列表信息管理</span> <span>
					<input type="checkbox" name="model[]" value="infoimg" />
					图片信息管理</span> <span>
					<input type="checkbox" name="model[]" value="soft" />
					软件下载管理</span> <span>
					<input type="checkbox" name="model[]" value="fragment" />
					碎片数据管理</span> <span>
					<input type="checkbox" name="model[]" value="diymenu" />
					自定义菜单项</span> <span>
					<input type="checkbox" name="model[]" value="diyfield" />
					自定义字段</span> <span>
					<input type="checkbox" name="model[]" value="infosrc" />
					信息标记管理</span> <span>
					<input type="checkbox" name="model[]" value="infoflag" />
					信息来源管理</span></div>
				<div class="agtitle"><strong>模块扩展管理</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="member" />
					用户管理</span> <span>
					<input type="checkbox" name="model[]" value="usergroup" />
					用户组管理</span> <span>
					<input type="checkbox" name="model[]" value="userfavorite" />
					用户收藏管理</span> <span>
					<input type="checkbox" name="model[]" value="usercomment" />
					用户评论管理</span> <span>
					<input type="checkbox" name="model[]" value="message" />
					留言模块管理</span> <span>
					<input type="checkbox" name="model[]" value="admanage" />
					广告模块管理</span> <span>
					<input type="checkbox" name="model[]" value="adtype" />
					广告位管理</span> <span>
					<input type="checkbox" name="model[]" value="weblink" />
					友情链接管理</span> <span>
					<input type="checkbox" name="model[]" value="weblinktype" />
					友情链接分类</span> <span>
					<input type="checkbox" name="model[]" value="job" />
					招聘模块管理</span> <span>
					<input type="checkbox" name="model[]" value="vote" />
					投票模块管理</span> <span>
					<input type="checkbox" name="model[]" value="cascade" />
					级联数据管理</span> </div>
				<div class="agtitle"><strong>商品订单管理</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="goodstype" />
					商品类别管理</span> <span>
					<input type="checkbox" name="model[]" value="goodsbrand" />
					品牌类型管理</span> <span>
					<input type="checkbox" name="model[]" value="goods" />
					商品列表管理</span> <span>
					<input type="checkbox" name="model[]" value="goodsorder" />
					商品订单管理</span> <span>
					<input type="checkbox" name="model[]" value="postmode" />
					配送方式管理</span> <span>
					<input type="checkbox" name="model[]" value="paymode" />
					支付方式管理 </span> <span>
					<input type="checkbox" name="model[]" value="getmode" />
					货到方式管理</span> <span>
					<input type="checkbox" name="model[]" value="goodsflag" />
					商品信息属性管理</span></div>
				<div class="agtitle"><strong>模板界面管理</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="nav" />
					导航菜单设置</span> <span>
					<input type="checkbox" name="model[]" value="editfile" />
					默认模板设置</span></div>
				<div class="agtitle"><strong>帮助与更新</strong></div>
				<div class="agline"> <span>
					<input type="checkbox" name="model[]" value="upload_file" />
					上传新文件</span> <span>
					<input type="checkbox" name="model[]" value="check_bom" />
					BOM检查</span> <span>
					<input type="checkbox" name="model[]" value="help" />
					开发帮助</span></div>
				<div class="agsel"><a href="javascript:;" onclick="SelModel(true)">全选</a>&nbsp;&nbsp;<a href="javascript:;" onclick="SelModel(false)">反选</a></div></td>
		</tr>
		<tr class="nb">
			<td height="35" align="right">栏目权限：</td>
			<td><?php
			$dosql->Execute("SELECT * FROM `#@__site` ORDER BY id ASC");
			$i = 1;
			while($row = $dosql->GetArray())
			{
				echo '<div class="agtitle"><strong>'.$row['sitename'].'</strong></div>';
				Show($row['id']);
				echo '<div class="agsel"><a href="javascript:;" onclick="SelPriv('.$row['id'].',true)">全选</a>&nbsp;&nbsp;<a href="javascript:;" onclick="SelPriv('.$row['id'].',false)">反选</a></div>';
				$i++;
			}
			
			?></td>
		</tr>
		<?php
		if(empty($id) or $id != 1)
		{
		?>
		<tr class="nb">
			<td height="35" align="right">&nbsp;</td>
			<td><ul class="cache_tips">
			<li>选中【查看】权限，即有该栏目内容信息列表页查看权限，不选择则栏目内容在管理列表中会被隐藏</li>
			<li>选中【添加】权限，即有添加下级栏目与栏目内容权限</li>
			<li>选中【修改】权限，即有信息列表管理页审核权限与栏目和栏目内容修改权限</li>
			<li>选中【删除】权限，即有该栏目与栏目内容删除权限</li>
		</ul></td>
		</tr>
		<?php
		}
		?>
	</table>
	<div class="subbtn_area">
		<input type="submit" value="" class="blue_submit_btn" />
		<input type="button" value="" class="blue_back_btn" onclick="history.go(-1)" />
		<input type="hidden" name="action" id="action" value="add" />
	</div>
</form>
<?php

function Show($siteid=1, $id=0, $i=0)
{
	global $dosql;
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE siteid=$siteid AND parentid=$id ORDER BY orderid ASC", $id);
	$i++;

	while($row = $dosql->GetArray($id))
	{
		switch($row['infotype'])
		{
			case 0:
				$addurl   = 'info_update.php?id='.$row['id'];
				$infotype = ' <i title="栏目属于[单页]类型">[单页]</i>';
				break;  
			case 1:
				$addurl   = 'infolist_add.php?cid='.$row['id'];
				$infotype = ' <i title="栏目属于[列表]类型">[列表]</i>';
				break;
			case 2:
				$addurl   = 'infoimg_add.php?cid='.$row['id'];
				$infotype = ' <i title="栏目属于[图片]类型">[图片]</i>';
				break;
			case 3:
				$addurl   = 'soft_add.php?cid='.$row['id'];
				$infotype = ' <i title="栏目属于[下载]类型">[下载]</i>';
				break;
			case 4:
				$addurl   = 'soft_add.php?cid='.$row['id'];
				$infotype = ' <i title="栏目属于[商品]类型">[商品]</i>';
				break;
			default:
				$addurl   = 'javascript:;';
				$infotype = ' 没有获取到类型';
		}


		//设置classname区域
		$classname = '';

		if($row['parentid'] == '0')
			$classname .= '<span class="disimg" id="rowid_'.$row['id'].'" onclick="DisplayRows('.$row['id'].');">';
		else
			$classname .= '<span class="sub_type">';

		$classname .= $row['classname'].'</span>';


		$topid = GetTopID($row['parentstr']);
?>
<div rel="rowpid_<?php echo $topid ; ?>">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mgr_table">
		<tr align="center" class="mgr_tr">
			<td width="3%" height="32" align="left"><input type="checkbox" name="siteid[<?php echo $siteid; ?>]" value="<?php echo $siteid; ?>" onclick="SelRole(<?php echo $siteid; ?>,<?php echo $row['id']; ?>,this);" /></td>
			<td align="left"><?php
			for($n=1; $n<$i; $n++) echo '&nbsp;&nbsp;';
			echo $classname.'<span class="infotype">'.$infotype.'</span>';
			?></td>
			<td width="30%" class="priv"><span>
				<input type="checkbox" name="priv[<?php echo $siteid; ?>][<?php echo $row['id']; ?>][]" value="list" />
				查看</span> <span>
				<input type="checkbox" name="priv[<?php echo $siteid; ?>][<?php echo $row['id']; ?>][]" value="add" />
				添加</span> <span>
				<input type="checkbox" name="priv[<?php echo $siteid; ?>][<?php echo $row['id']; ?>][]" value="update" />
				修改</span> <span>
				<input type="checkbox" name="priv[<?php echo $siteid; ?>][<?php echo $row['id']; ?>][]" value="del" />
				删除</span></td>
		</tr>
	</table>
</div>
<?php
		Show($siteid, $row['id'], $i+2);
	}
}
?>
</body>
</html>