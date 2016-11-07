<?php	require(dirname(__FILE__).'/include/config.inc.php');
$cid = empty($cid) ? 0 : intval($cid);
$tid = empty($tid) ? 0 : intval($tid);
$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(0,0,'购物车'); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
</head>
<body class="index_body" >
<!-- header-->
<?php require('headero.php'); ?>
<!-- /header--> 



<div class="blank"></div> 

 
<div class="block950">  
    
  <div class="step step3">
    <ul class="ul1">
    我的购物车
    </ul>
    <ul class="ul1">
    填写购物信息
    </ul>
    <ul class="ul3">
    成功提交订单
    </ul>
    </div>
  <div class="cl"></div> 
  <div class="shoppingcartempty"><span>成功提交订单！扣除积分:800分，剩余积分1200分。</span></div>
   <a href="javascript:history.go(-1);" class="goback">&gt;&gt; 返回</a>

	    <div class="blank"></div>


    </div>
    <div class="blank5"></div>









<!-- /mainbody--> 
<!-- footer-->
<?php require('footer.php'); ?>
<!-- /footer-->
</body>
</html>