<?php
require(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 9 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
</head>
<body>
<!-- header-->
<?php require('headero.php'); ?>
<!-- /header-->

<!-- notice-->

<!-- /notice-->
<!-- mainbody-->
<div class="subBody">
	<div class="subTitle"> <span class="catname"><?php echo GetCatName($cid); ?></span> <span class="fr">您当前所在位置：<?php echo GetPosStr($cid); ?></span>
		<div class="cl"></div>
	</div>
	<div class="ThreeOfTwos">
		<div class="subCont"> <?php echo Info($cid); ?> </div>
	</div>
	
	<div class="cl"></div>
</div>
<!-- /mainbody-->
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->
</body>
</html>