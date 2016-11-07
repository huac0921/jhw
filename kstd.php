<?php	require_once(dirname(__FILE__).'/admin/inc/config.inc.php');IsModelPriv('goods');



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
<script type="text/javascript" src="admin/templates/default/js/comment.js"></script>



<body onload="GetList('kstd','<?php echo ($cid = isset($cid) ? $cid : ''); ?>')">
<div class="header_bg" style=" height:60px;">
    <div class="block block950 clearfix">
    <div class="h1">
        <a href=index.php name="top" title="叫货网">叫货网</a>  
    </div>
    
    
   
	
	<div class="f_r header_flow_r" >
	<script type="text/javascript" src="js/transport.js"></script><script type="text/javascript" src="js/utils.js"></script>     <font id="ECS_MEMBERZONE"><div id="append_parent"></div>
 
 <span class="f_l">嗨，欢迎来到叫货网！</span><a href="member.php?c=login&uid=<?php echo $_COOKIE['username']; ?>">登录</a> 
 <a href="member.php?c=reg">注册</a>  
 </font>   
	 
	 <span style=" padding-left:15px;">咨询热线：<b><?php echo $cfg_hotline; ?></b></span>
    </div>   
    </div>
    </div>
</div>


<!-- /header--> 

<div class="mgr_header"> <span class="title">快速购物通道</span>
<span class="alltype" id="alltype" onmouseover="ShowAllType('alltype');" onmouseout="HideAllType('alltype');">
				<a href="javascript:;" onclick="GetType('','查看全部')" class="btn">查看全部</a>
				<span class="drop"><?php GetMgrAjaxType('#@__infoclass',4); ?></span>
		</span>
		<span class="alltype" id="alltype2" onmouseover="ShowAllType('alltype2');" onmouseout="HideAllType('alltype2');">
				<a href="javascript:;" onclick="GetType2('','查看全部')" class="btn">查看全部</a>
				<span class="drop"><?php GetMgrAjaxType('#@__goodstype'); ?></span>
		</span>
		<span class="reload"><a href="javascript:location.reload();">刷新</a></span></div>

</div>		

	<!--/header end-->
<form name="form" id="form" method="post">
		<div id="list_area">
				<div class="loading"><img src="admin/templates/images/loading.gif" />读取列表中...</div>
		</div>
</form>
<!--/list end-->

</body>