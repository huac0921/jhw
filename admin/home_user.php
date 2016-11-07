<?php	require(dirname(__FILE__).'/inc/config.inc.php');

//初始化参数
$action = isset($action) ? $action : '';

//是否保存便签
if($action == 'adminnotes')
{
	$uname    = $_SESSION['admin'];
	$posttime = time();
	$postip   = GetIP();

	if($dosql->GetOne("SELECT `uname` FROM `#@__adminnotes` WHERE uname='$uname'"))
	{
		$sql = "UPDATE `#@__adminnotes` SET body='$body', posttime='$posttime', postip='$postip' WHERE uname='$uname'";
		echo $sql;
		$dosql->ExecNoneQuery($sql);
		exit();
	}
	else
	{
		$sql = "INSERT INTO `#@__adminnotes` (uname, body, posttime, postip) VALUES ('$uname', '$body', '$posttime', '$postip')";
		$dosql->ExecNoneQuery($sql);
		exit();
	}
}
else if($action == 'deladminnotes')
{
	$sql = "DELETE FROM `#@__adminnotes` WHERE `uname`='".$_SESSION['admin']."'";
	$dosql->ExecNoneQuery($sql);
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".notewarn").fadeIn();
	$(".notewarn .close a").click(function(){
		$(".notewarn").fadeOut();
	});
	
	//控制便签
	$("#homeNote").focus(function(){
		if($(this).val() == "点击输入便签内容..."){
			$(this).val("");
		}
	}).blur(function(){
		if($(this).val() == ""){
			$.ajax({
				url : "home_user.php",
				type:'post',
				data:{"action":"deladminnotes"},
				dataType:'html',
				success:function(data){	
				}
			});
			$(this).val("点击输入便签内容...");
		}else{
			$.ajax({
				url : "home_user.php",
				type:'post',
				data:{"action":"adminnotes", "body":$(this).val()},
				dataType:'html',
				success:function(data){
				}
			});
		}
	});

	$("#showad").html('<iframe src="showad.php" width="100%" height="25" scrolling="no" frameborder="0" allowtransparency="true"></iframe>');
});
</script>
</head>
<body>

<div class="main_area">
	<div class="main_l">
		<div class="main_l_left">
			<div class="weladmin"> <span>Hi,</span> <strong><?php echo $_SESSION['admin']; ?></strong></div>
			<div class="logininfo">您上次登录的时间：<span><?php echo GetDateTime($_SESSION['lastlogintime']); ?></span><br />
				您上次登录的IP：<span><?php echo $_SESSION['lastloginip']; ?></span> <span><a href="admin_update.php?id=<?php $row = $dosql->GetOne("SELECT id FROM `#@__admin` WHERE username='".$_SESSION['admin']."'");echo $row['id'];?>" class="uppwd">修改密码</a></span></div>
			<div class="cl"></div>
			<div class="siteinfo">
				<h2 class="title">系统信息</h2>
				<?php
				function ShowResult($revalue)
				{
					if($revalue == 1) return '<span class="ture">支持</span>';
					else return '<span class="flase">不支持</span>';
				}
				?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="home_table">
					<tr>
						<td height="33" colspan="2">支持上传的最大文件：<?php echo ini_get('upload_max_filesize'); ?></td>
					</tr>
					<tr>
						<td width="50%" height="33">服务器版本： <span title="<?php echo $_SERVER['SERVER_SOFTWARE']; ?>"><?php echo ReStrLen($_SERVER['SERVER_SOFTWARE'],7,''); ?></span></td>
						<td width="50%">操作系统： <?php echo PHP_OS; ?></td>
					</tr>
					<tr>
						<td height="33">PHP版本号： <?php echo PHP_VERSION; ?></td>
						<td>GDLibrary： <?php echo ShowResult(function_exists('imageline')); ?></td>
					</tr>
					<tr>
						<td height="33">MySql版本： <?php echo $dosql->GetVersion(); ?></td>
						<td height="28">ZEND支持： <?php echo ShowResult(function_exists('zend_version')); ?></td>
					</tr>
					
				</table>
			</div>
		</div>
		<div class="main_l_right">
			<h2 class="lnktitle">快捷操作</h2>
			<div class="lnkarea">
				<div class="lnkarea_btn">[<a href="lnk.php">管理</a>]</div>
				<div class="lnkarea_btns">
					<?php
					$dosql->Execute("SELECT * FROM `#@__lnk` ORDER BY orderid ASC LIMIT 0, 8");
					while($row = $dosql->GetArray())
					{
						echo '<a href="'.$row['lnklink'].'">';
						if($row['lnkico'] != '') echo '<img src="'.$row['lnkico'].'" />';
						echo $row['lnkname'].'</a>';
					}
					?>
				</div>
			</div>
			<div class="countinfo">
				<h2 class="title">信息统计</h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="home_table">
					<tr>
						<td width="80" height="33">网站栏目数：</td>
						<td class="num"><?php echo $dosql->GetTableRow('#@__infoclass',$cfg_siteid); ?></td>
					</tr>
					<tr>
						<td height="33">单页信息数：</td>
						<td class="num">
						<?php
						$dosql->Execute("SELECT `id` FROM `#@__infoclass` WHERE `siteid`='$cfg_siteid' AND `infotype`=0");
						echo $dosql->GetTotalRow();
						?></td>
					</tr>
					<tr>
						<td height="33">列表信息数：</td>
						<td class="num"><?php echo $dosql->GetTableRow('#@__infolist',$cfg_siteid); ?></td>
					</tr>
					<tr>
						<td height="33">图片信息数：</td>
						<td class="num"><?php echo $dosql->GetTableRow('#@__infoimg',$cfg_siteid); ?></td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>